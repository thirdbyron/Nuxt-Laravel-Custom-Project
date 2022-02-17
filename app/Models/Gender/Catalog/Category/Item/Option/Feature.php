<?php

namespace App\Models\Gender\Catalog\Category\Item\Option;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_id', 'name'
    ];
}
