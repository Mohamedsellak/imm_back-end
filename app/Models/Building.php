<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'activity',
        'year_of_construction',
        'type',
        'level_count',
        'structure_state',
        'electricity_inventory',
        'plumbing_state',
        'cvc_state',
        'fire_safety_evaluation',
        'elevator_escalator_state',
        'site_id'
    ];

    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function components(){
        return $this->hasMany(Component::class);
    }
}


