<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $timestamps = false;

	public function scopegetUserCategories($query)
    {
        return $query->select('*')
            // ->where('type', '=', 2)
            ->where('status', '=', 1);
    }
}
