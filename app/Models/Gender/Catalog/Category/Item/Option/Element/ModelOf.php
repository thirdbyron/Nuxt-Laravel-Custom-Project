<?php

namespace App\Models\Gender\Catalog\Category\Item\Option\Element;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOf extends Model
{
    use HasFactory;

    protected $fillable = [
        'element_id',
        'model_path',
        'model_name',
        'articule',
    ];
}
