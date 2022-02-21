<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'front_image_url', 'back_image_url', 'left_image_url', 'right_image_url', ];
}
