<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Estos son los únicos campos que existen en tu base de datos
    protected $fillable = [
        'name', 'surname', 'dni', 'telephone', 'email', 'date_of_birth', 'address'
    ];
}