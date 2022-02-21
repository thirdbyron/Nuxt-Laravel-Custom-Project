<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatedItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'screenshot_id', 'category_id', 'gender_id', 'total_price'];

    public function selectedSettings() {
        return $this->hasMany(SelectedSetting::class);
    }
}
