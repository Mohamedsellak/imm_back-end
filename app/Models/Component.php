<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        code 	name 	quantity 	unit 	last_rehabilitation_year 	condition 	severity_max 	risk_level 	description 	building_id
    ];

    public function building(){
        return $this->belongsTo(Building::class);
    }
}
