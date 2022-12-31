<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\TagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Tag extends Model implements HasMedia
{
    use HasFactory;
    use  Sluggable;
    use InteractsWithMedia, HasUploader;

    protected $fillable = ['name', 'slug'];


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
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


    public function viewData(): MorphMany
    {
        return $this->morphMany(ViewData::class, 'viewable');
    }
}
