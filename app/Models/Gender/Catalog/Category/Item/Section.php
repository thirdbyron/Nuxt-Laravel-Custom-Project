<?php

namespace App\Models\Gender\Catalog\Category\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'name'];
}
