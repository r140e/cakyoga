<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $p = \App\Project::where('is_completed', true)
        ->limit(3)
        ->orderBy('created_at', 'desc');
        $projects = \App\Project::where('is_completed', false)
        ->limit(9)
        ->orderBy('created_at', 'desc')
        ->get();
        $data = [
            'posts' => \Canvas\Post::published()->orderByDesc('published_at')->simplePaginate(12),
        ];
        $quotes = \App\Quote::inRandomOrder()
            ->limit(1)
            ->get();
        return view('index', compact('projects', 'p', 'data','quotes'));
    }
}
