<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
        protected $table = 'medications';
    protected $fillable = [
        'treatment_id', 'name_medication', 'dosage', 'frequency', 'duration'
    ];
}
