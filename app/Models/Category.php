<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Schema;

class Category extends Model
{
    use HasFactory;
    use  Sluggable;

    protected $guarded = ['id'];
    protected $hidden = ['updated_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];


    /**
     *
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setFillable();
    }


    //


    public static function withTagData(): Category
    {
        return self::append('tag_name');
    }


    public function setFillable()
    {
        $fields = Schema::getColumnListing('categories');

        $this->fillable[] = $fields;
    }


    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }


    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }


    public
    function tagName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->tag->name,
        );
    }


    public function withTagName(): Category
    {
        return $this->append('tag_name');
    }


    public function viewData(): MorphMany
    {
        return $this->morphMany(ViewData::class, 'viewable');
    }
}
