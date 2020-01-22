<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
        $p1 = \App\Project::where('is_completed', true)
        ->orderBy('updated_at', 'desc')
        ->first();
        $p2 = \App\Project::where('is_completed', true)
        ->orderBy('updated_at', 'desc')
        ->skip(1)
        ->first();
        $p3 = \App\Project::where('is_completed', true)
        ->orderBy('updated_at', 'desc')
        ->skip(2)
        ->first();
        $posts = \App\Post::published()->get();
        $quotes = \App\Quote::inRandomOrder()
            ->limit(1)
            ->get();
        return view('index', compact('p1', 'p2','p3', 'quotes', 'posts'));
    }
}
