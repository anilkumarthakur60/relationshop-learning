<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewData extends Model
{
    use HasFactory;


    public function __construct()
    {
        $this->setFillable();
    }


    public function setFillable()
    {
        $fields = Schema::getColumnListing('view_datas');

        $this->fillable[] = $fields;
    }


     public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }


    public function viewable():MorphTo
    {
        return $this->morphTo();

    }

}
