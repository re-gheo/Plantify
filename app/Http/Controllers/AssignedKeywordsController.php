<?php

namespace App\Http\Controllers;

use App\Models\Assigned_keywords;
use App\Models\Keyword;
use Illuminate\Http\Request;

class AssignedKeywordsController extends Controller
{
    public function searchResults(Request $request){
         $keywords = [];

        foreach($request->keywords as $id){
            $key = Keyword::find($id);
            $keyword = $key->products;

        }

        return view('search.result', compact('keywords'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigned_keywords  $assigned_keywords
     * @return \Illuminate\Http\Response
     */
    public function show(Assigned_keywords $assigned_keywords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assigned_keywords  $assigned_keywords
     * @return \Illuminate\Http\Response
     */
    public function edit(Assigned_keywords $assigned_keywords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigned_keywords  $assigned_keywords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assigned_keywords $assigned_keywords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigned_keywords  $assigned_keywords
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigned_keywords $assigned_keywords)
    {
        //
    }
}
