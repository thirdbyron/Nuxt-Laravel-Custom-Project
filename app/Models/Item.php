<?php

namespace App\Models;

use App\Models\item\Defaults;
use App\Models\item\settings\Color;
use App\Models\item\settings\Element;
use App\Models\item\settings\Picture;
use App\Models\item\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id', 'short_name', 'name', 'start_price', 'short_desc', 'desc', 'image_url', 'animation_url', 'type', 'model_position' ];

    public function sizes() {
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
    }
}
