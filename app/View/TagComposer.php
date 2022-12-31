<?php

namespace App\View;

use App\Models\Tag;
use Illuminate\View\View;

class TagComposer
{
    public function compose(View $view)
    {
        $tags = Tag::orderBy('name')->get();
        $view->with('tags', $tags);
    }

}