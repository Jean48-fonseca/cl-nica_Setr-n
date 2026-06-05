<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    protected $table = 'treatments';
    protected $fillable = [
        'diagnosis_id', 'general_indications', 'start_date', 'end_date'
    ];
}
