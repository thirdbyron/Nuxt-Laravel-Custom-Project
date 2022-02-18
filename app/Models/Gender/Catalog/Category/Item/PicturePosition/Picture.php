<?php

namespace App\Models\Gender\Catalog\Category\Item\PicturePosition;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture_set_id',
        'name',
        'price',
        'in_stock',
        'settings',
        'order_name',
    ];
}
