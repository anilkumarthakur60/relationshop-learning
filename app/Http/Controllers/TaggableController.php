<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaggableRequest;
use App\Http\Requests\UpdateTaggableRequest;
use App\Models\Taggable;

class TaggableController extends Controller
{
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
     * @param  \App\Http\Requests\StoreTaggableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaggableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function show(Taggable $taggable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function edit(Taggable $taggable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaggableRequest  $request
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaggableRequest $request, Taggable $taggable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taggable $taggable)
    {
        //
    }
}
