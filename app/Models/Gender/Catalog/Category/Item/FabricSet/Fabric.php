<?php

namespace App\Models\Gender\Catalog\Category\Item\FabricSet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric_set_id',
        'image_url',
        'price',
        'name', 'in_stock',
        'settings',
        'order_name',
    ];
}
