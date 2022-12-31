<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];

     public function tags():MorphToMany
    {
        return $this->morphToMany(Tag::class,'taggable');

    }

}
