<?php

namespace App\Models\Gender\Catalog\Category\Item;

use App\Models\Gender\Catalog\Category\Item\PicturePosition\PictureSet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicturePosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 
        'name',
        'image_url',
        'relate_to_option'
    ];

    public function pictureSets() {
        return $this->hasMany(PictureSet::class);
    }
}
