<?php

namespace App\Models\Gender\Catalog;

use App\Models\Gender\Catalog\Category\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'catalog_id', 'category_name' ];

    public function items() {
        return $this->hasMany(Item::class);
    }
    
}
