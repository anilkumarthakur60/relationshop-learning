<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreViewDataRequest;
use App\Http\Requests\UpdateViewDataRequest;
use App\Models\ViewData;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ViewDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $viewData1 = ViewData::query()
            ->whereHasMorph(
                relation: 'viewable',
                types: [Category::class],
                callback: function ($query) {
                    $query->where('names', 'as');
                }
            )->get();
        $viewData2 = ViewData::query()
            ->hasMorph(
                relation: 'viewable',
                types: [Category::class],
                callback: function ($query) {
                    $query->where('names', 'as');
                }
            )->get();

        $viewData3 = ViewData::query()
            ->whereMorphRelation(
                relation: 'viewable',
                types: [Category::class],
                column: 'names',
                operator: '=',
                value: 'as'
            )->get();
        $viewData4 = ViewData::query()
            ->whereHasMorph(
                relation: 'viewable',
                types: '*',
                callback: function ($query) {
                    $query->where('name', 'Category first name');
                }
            )->get();

        $viewData5 = ViewData::query()
            ->with([
                'viewable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Post::class => ['tags'],
                        Tag::class => ['categories'],
                        Category::class => ['tag'],
                    ]);
                },
            ])->get();

        $viewData6 = ViewData::with([
            'viewable' => function (MorphTo $morphTo) {
                $morphTo->morphWithCount([
                    Post::class => ['tags'],
                    Tag::class => ['categories'],
                    Category::class => ['tag'],
                ]);
            },
        ])->get();

        $viewData7 = ViewData::whereHasMorph(
            'viewable',
            [Post::class, Tag::class, Category::class],
            function (Builder $query, $type) {
                $column = $type === Category::class ? 'names' : 'name';

                $query->where($column, 'like', '%Category first name%');
            }
        )->get();

        return $viewData7;
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreViewDataRequest $request
     * @return Response
     */
    public function store(StoreViewDataRequest $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param ViewData $viewData
     * @return Response
     */
    public function show(ViewData $viewData)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param ViewData $viewData
     * @return Response
     */
    public function edit(ViewData $viewData)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateViewDataRequest $request
     * @param ViewData $viewData
     * @return Response
     */
    public function update(UpdateViewDataRequest $request, ViewData $viewData)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param ViewData $viewData
     * @return Response
     */
    public function destroy(ViewData $viewData)
    {
        //
    }
}
