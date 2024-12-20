<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'computer_id', 'reported_by', 'reported_date', 'description', 'urgency', 'status',
    ];

    /**
     * Define the relationship with the Computer model.
     * An Issue belongs to a Computer.
     */
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
