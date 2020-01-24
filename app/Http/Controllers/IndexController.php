<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Contentful\Delivery\Client as DeliveryClient;

class IndexController extends Controller
{
    private $client;

    public function index(DeliveryClient $client)
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
        $quotes = \App\Quote::inRandomOrder()
            ->limit(1)
            ->get();

        $this->client = $client;
        $query = (new \Contentful\Delivery\Query())
            ->setContentType('blogPost')
            ->orderBy('fields.title')
            ->setLocale('*');
        $entries = $client->getEntries($query);
        
        $assets = $client->getAssets();
        if (!$entries || !$assets) {
            abort(404);
        }
        return view('index', compact('p1', 'p2','p3', 'quotes', 'entries', 'assets'));
    }
}
