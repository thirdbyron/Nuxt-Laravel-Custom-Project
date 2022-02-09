<?php

namespace App\Models\item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defaults extends Model
{
    use HasFactory;

    protected $fillable = [ 'item_id', 'model_name', 'model_type', 'color' ];
}
