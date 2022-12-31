<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

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


    public function create()
    {
        return view('tags.create');

    }


    public function store(Request $request)
    {
        $blog = Tag::create(['name' => $request->name]);

        $blog->addAllMediaFromTokens();
                    return back();

    }


    public function latestCategory()
    {
        return Tag::with('latestCategory')->get();
    }
}
