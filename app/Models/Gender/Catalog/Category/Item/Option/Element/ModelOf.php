<?php

namespace App\Models\Gender\Catalog\Category\Item\Option\Element;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOf extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'section_name',
        'settings', 'name', 'price', 'in_stock', 'image_url', 'order_name'
    ];
}
