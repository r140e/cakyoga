<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ContentfulQuery as CQuery;

class ProjectsController extends Controller
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
        $entries = $this->CQUERY->getEntriesByContentType('projects');

        return view('projects.projects', [
            'entries'       => $entries,
            'renderer'      => $this->renderer,
        ]);
    }
    public function show($slug)
    {
        $entries = $this->CQUERY->getEntriesByContentType('projects');
        $entry = $this->CQUERY->getEntry('projects', $slug);

        if ($entry === null) {
            abort(404);
        }

        return view('projects.projectsdetail', [
            'entries'   => $entries,
            'entry'     => $entry,
            'renderer'  => new \Contentful\RichText\Renderer(),
        ]);
    }
}