<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $p = \App\Project::limit(3)
        ->orderBy('updated_at', 'desc');
        $data = [
            'posts' => \Canvas\Post::published()->orderByDesc('published_at')->simplePaginate(12),
        ];
        $quotes = \App\Quote::inRandomOrder()
            ->limit(1)
            ->get();
        return view('index', compact('p', 'data','quotes'));
    }
}
