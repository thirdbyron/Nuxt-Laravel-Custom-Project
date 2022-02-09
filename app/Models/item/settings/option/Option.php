<?php

namespace App\Models\item\settings\option;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'element_id', 'name', 'image_url', 'model_type', ];
}
