<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model 
{
   protected $table = 'doctors';
      
    protected $fillable = [
        'name', 'surname', 'specialization', 'cmp', 'phone_number', 'email'
    ];
}
