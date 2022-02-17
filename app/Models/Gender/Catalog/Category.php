<?php

namespace App\Models\Gender\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'catalog_id', 'category_name' ];
    
}
