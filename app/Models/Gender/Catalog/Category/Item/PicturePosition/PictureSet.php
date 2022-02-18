<?php

namespace App\Models\Gender\Catalog\Category\Item\PicturePosition;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture_position_id',
        'name'
    ];

    public function pictures() {
        return $this->hasMany(Picture::class);
    }
}
