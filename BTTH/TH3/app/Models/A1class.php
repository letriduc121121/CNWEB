<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A1class extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',    
        'body',


    ] ;
}