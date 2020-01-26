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
        $p = \App\Project::where('is_completed', true)
        ->orderBy('updated_at', 'desc');
        $quotes = \App\Quote::inRandomOrder()
            ->limit(1)
            ->get();
        $this->client = $client;
        $query = (new \Contentful\Delivery\Query())
            ->setContentType('blogPost')
            ->orderBy('fields.title')            
            ->setLimit(10)
            ->setLocale('*');
        $entries = $client->getEntries($query);        
        $assets = $client->getAssets();
        if (!$entries || !$assets) {
            abort(404);
        }
        return view('index', compact('p', 'quotes', 'entries', 'assets'));
    }
}
