<?php

namespace App\Models\item\settings;

use App\Models\item\settings\option\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'item_id', 'name', 'model_name' ];

    public function options() {
        return $this->hasMany(Option::class);
    }
}
