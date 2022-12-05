<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\PostFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;
    use  Sluggable;

//belongsToMany    tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    protected $guarded=['id'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



}
