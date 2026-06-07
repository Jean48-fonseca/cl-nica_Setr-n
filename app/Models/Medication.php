<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $table = 'medications';

    protected $fillable = [
        'treatment_id',
        'name_medication',
        'dosage',
        'frequency',
        'duration',
    ];

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}