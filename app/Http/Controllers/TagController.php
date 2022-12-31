<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tag1 = Tag::query()
            ->withCount('categories')
            ->with('latestCategory')
            ->with('oldestCategory')
            ->with('categories')
            ->with('largestOrder')
            ->with('smallestOrder')
            ->with('futureCategory')
            ->get();

        $tagA = Tag::first();

         $tagA->categories()->save(
            new Category(['name' => 'A new comment.']),
        );

        $tagB = Tag::latest()->first();


        $tagB->categories()->saveMany([
            new Category(['name' => 'A new comment.']),
            new Category(['name' => 'Another new comment.']),
        ]);
        $tagB->refresh();

        return $tagB->categories;
    }


    public function store(Request $request)
    {
        $blog = Tag::create(['name' => $request->name]);

        $blog->addAllMediaFromTokens();

        return back();
    }


    public function create()
    {
        return view('tags.create');
    }


    public function latestCategory()
    {
        return Tag::with('latestCategory')->get();
    }
}
