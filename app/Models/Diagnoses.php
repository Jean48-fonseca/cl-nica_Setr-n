<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnoses extends Model
{
    //
    protected $fillable = [
        'date_id', 'disease', 'description_clinical'
    ];
}
