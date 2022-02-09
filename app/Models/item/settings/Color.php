<?php

namespace App\Models\item\settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [ 'item_id', 'name', 'hex' ];
}
