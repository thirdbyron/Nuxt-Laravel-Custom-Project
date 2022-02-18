<?php

namespace App\Models\Gender\Catalog\Category;

use App\Models\Gender\Catalog\Category\Item\FabricSet;
use App\Models\Gender\Catalog\Category\Item\Option;
use App\Models\Gender\Catalog\Category\Item\Section;
use App\Models\Gender\Catalog\Category\Item\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id', 'item_type', 'short_name', 'name', 'start_price', 'short_desc', 'desc', 'image_url', 'animation_url', 'model_position', 'in_stock' ];

    public function sizes() {
        return $this->hasMany(Size::class);
    }
    public function sections() {
        return $this->hasMany(Section::class);
    }
    public function options() {
        return $this->hasMany(Option::class);
    }
    public function fabricSets() {
        return $this->hasMany(FabricSet::class);
    }
    /*
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
