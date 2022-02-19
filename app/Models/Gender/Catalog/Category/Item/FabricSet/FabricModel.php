<?php

namespace App\Models\Gender\Catalog\Category\Item\FabricSet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric_set_id',
        'model_id',
        'fabric_id',
    ];

    public function textures() {
        return $this->hasMany(Texture::class);
    }
}
