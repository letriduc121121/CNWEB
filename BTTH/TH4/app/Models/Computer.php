<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'computer_name', 'model', 'operating_system', 'processor', 'memory', 'available',
    ];

    /**
     * Define the relationship with the Issue model.
     * A Computer has many Issues.
     */
}
