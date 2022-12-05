<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\TagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Tag extends Model
{
    use HasFactory;
    use  Sluggable;
    protected $guarded=['id'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

//    hasManyCategories
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function latestCategory(): HasOne
    {
        return $this->hasOne(Category::class)->latestOfMany();

    }

    public function oldestCategory(): HasOne
    {
        return $this->hasOne(Category::class)->oldestOfMany();

    }
}
