<?php

namespace App\Models\Gender\Catalog\Category\Item;

use App\Models\Gender\Catalog\Category\Item\Option\Feature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'section_id', 'section_name', 'name', 'price', 'in_stock', 'image_url', 'order_name'
    ];

    public function features() {
        return $this->hasMany(Feature::class);
    }
}
