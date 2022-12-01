<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{

    public function index()
    {
        return Tag::query()
            ->withCount('categories')
            ->with('latestCategory')
            ->with('oldestCategory')
            ->with('categories')
            ->get();

    }

    public function latestCategory()
    {
        return Tag::with('latestCategory')->get();

    }
}
