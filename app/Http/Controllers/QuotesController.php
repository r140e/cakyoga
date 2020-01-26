<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {
        $quotes = Quote::get();
        return view('/quotes/quotes', ['quotes_tables' => $quotes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes/quote_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'author' => 'required',
            'quote' => 'required',
        ]);
        Quote::create([
            'author' => $request->author,
            'quote' => $request->quote,
        ]);        
    	return redirect('/quotes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        $quotes = \App\Quote::inRandomOrder()
            ->get();
        return view('/quotes', ['quotes_tables' => $quotes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Quote $quote)
    {
        $quote = Quote::where('id', $id)->first();
        return view('quotes/quote_edit', ['quotes_tables' => $quote]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Quote $quote)
    {
        $this->validate($request,[
            'author' => 'required',
            'quote' => 'required',
        ]);

        $quote = Quote::find($id);
        $quote->author = $request->author;
        $quote->quote = $request->quote;
        $quote->save();
        return redirect('/quotes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Quote $quote)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return redirect('/quotes');
    }
}
