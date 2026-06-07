<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';

    protected $fillable = [
        'diagnosis_id',
        'general indications',
        'start_date',
        'end_date',
    ];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }
}