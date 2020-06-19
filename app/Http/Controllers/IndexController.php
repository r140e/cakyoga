<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ContentfulQuery as CQuery;

class IndexController extends Controller
{
    /**
     * @var CQuery
     */
    private $CQUERY;

    /**
     * @var Contentful\RichText\Renderer
     */
    private $renderer;

    public function __construct(CQuery $query)
    {
        $this->CQUERY = $query;
        $this->renderer = new \Contentful\RichText\Renderer();
    }
    public function index()
    {
        $p = \App\Project::where('is_completed', true)
        ->limit(3)
        ->orderBy('created_at', 'desc');
        
        $projects = \App\Project::where('is_completed', false)
        ->limit(9)
        ->orderBy('created_at', 'desc')
        ->get();

        $entries = $this->CQUERY->getEntriesByContentType('projects');

        $data = [
            'posts' => \Canvas\Post::published()->orderByDesc('published_at')->simplePaginate(12),
        ];

        $quotes = \App\Quote::inRandomOrder()
            ->limit(1)
            ->get();
        
        return view('index', [
            'entries'       => $entries,
            'renderer'      => $this->renderer,
        ], compact('projects', 'p', 'data','quotes'));
    }
}
