<?php

namespace App\Models;

use App\Models\Gender\Catalog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'dummy_url' ];

    public function catalogs() {
        return $this->hasMany(Catalog::class);
    }

    public function sizeTable() {

        return $this->hasOne(SizeTable::class);
    }
}
