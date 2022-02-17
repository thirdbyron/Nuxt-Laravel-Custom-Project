<?php

namespace App\Models\Gender\Catalog\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id', 'item_type', 'short_name', 'name', 'start_price', 'short_desc', 'desc', 'image_url', 'animation_url', 'model_position', 'in_stock' ];

    /*public function sizes() {
        return $this->hasMany(Size::class);
    }
    public function defaults() {
        return $this->hasMany(Defaults::class);
    }

    public function elements() {
        return $this->hasMany(Element::class);
    }
    public function colors() {
        return $this->hasMany(Color::class);
    }
    public function pictures() {
        return $this->hasMany(Picture::class);
    }*/
}
