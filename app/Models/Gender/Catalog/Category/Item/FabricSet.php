<?php

namespace App\Models\Gender\Catalog\Category\Item;

use App\Models\Gender\Catalog\Category\Item\FabricSet\Fabric;
use App\Models\Gender\Catalog\Category\Item\FabricSet\FabricModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'name',
        'relate_to_option'
    ];

    public function fabrics() {
        return $this->hasMany(Fabric::class);
    }
    public function fabricModels() {
        return $this->hasMany(FabricModel::class);
    }
}
