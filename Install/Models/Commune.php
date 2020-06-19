<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'id',
        'code_erp',
        'code_shipping_1',
        'code_shipping_2',
        'name',
        'province_id'
    ];


    public function province(){
        return $this->belongsTo(Province::class);
    }
}
