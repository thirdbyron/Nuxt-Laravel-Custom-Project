<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedSetting extends Model
{
    use HasFactory;

    protected $fillable = [ 'created_item_id', 'setting_id', 'setting_entity_name' ];
}
