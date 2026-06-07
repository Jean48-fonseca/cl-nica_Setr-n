<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnoses';

    protected $fillable = [
        'date_id',
        'disease',
        'description_clinical',
    ];

    public function date()
    {
        return $this->belongsTo(Date::class);
    }
}