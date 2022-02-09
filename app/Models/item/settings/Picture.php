<?php

namespace App\Models\item\settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'item_id', 'name', 'price', 'image_url', 'location', ];
}
