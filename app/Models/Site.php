<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'activity',
        'address',
        'zipcode',
        'city',
        'country',
        'floor_area',
        'workspace_id',
    ];
    
    public function workspace(){
        return $this->belongsTo(Workspace::class);
    }

    public function buildings(){
        return $this->hasMany(Building::class);
    }
}
