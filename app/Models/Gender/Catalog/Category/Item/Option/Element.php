<?php

namespace App\Models\Gender\Catalog\Category\Item\Option;

use App\Models\Gender\Catalog\Category\Item\Option\Element\ModelOf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id', 'option_id', 'feature_id', 'is_default'
    ];

    public function modelOfs() {
        return $this->hasMany(ModelOf::class);
    }
}
