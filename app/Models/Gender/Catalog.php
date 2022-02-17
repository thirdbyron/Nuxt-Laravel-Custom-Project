<?php

namespace App\Models\Gender;

use App\Models\Gender\Catalog\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [ 'gender_id', 'name' ];

    public function categories() {
        return $this->hasMany(Category::class);
    }
}
