<?php

namespace App\Models\Gender\Catalog\Category\Item;

use App\Models\Gender\Catalog\Category\Item\Option\Element;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'name'];

    public function elements() {
        return $this->hasMany(Element::class);
    }
    public function options() {
        return $this->hasMany(Option::class);
    }
}
