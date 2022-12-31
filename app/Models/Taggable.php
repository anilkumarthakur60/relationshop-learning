<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    use HasFactory;
      public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setFillable();
    }
    public function setFillable():void
    {
        $fields = Schema::getColumnListing('taggables');

        $this->fillable[] = $fields;
    }
    public function getFillable():array
    {
        return Schema::getColumnListing($this->getTable());
    }


}
