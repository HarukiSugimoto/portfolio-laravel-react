<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogTagRequest;
use App\Http\Requests\UpdateBlogTagRequest;
use App\Models\BlogTag;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogTag $blogTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogTag $blogTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogTagRequest $request, BlogTag $blogTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogTag $blogTag)
    {
        //
    }
}
