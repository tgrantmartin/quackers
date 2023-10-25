<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duck extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'age',
        'mass',
        'stomach_capacity',
        'stomach_fill',
        'stomach_empty_rate',
        'lay_rate',
        'growth_rate',
        'speed',
        'endurance',
        'luck',
        'intelligence',
        'strength',
        'feathers',
        'volume',
        'demeanor',
        'status',
    ];

    const STATUSES = [
        'egg',
        'alive',
        'ill',
        'angry',
    ];

    const DEMEANORS = [
        'buddha',
        'docile',
        'calm',
        'violent',
        'psychopath',
    ];

    const GENDERS = [
        'Male',
        'Female',
        'Other',
    ];

}
