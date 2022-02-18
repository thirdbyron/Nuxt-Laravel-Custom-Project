<?php

namespace App\Models\Gender\Catalog\Category\Item\FabricSet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texture extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric_id',
        'model_id',
        'texture_path',
        'texture_name',
        'texture_mimetype',
    ];
}
