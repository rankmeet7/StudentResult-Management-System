<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    protected $fillable = [
        'seat', 'roll', 'name', 'class',
        'gujarati', 'english', 'math', 'evs',
        'science', 'socialscience',
        'physics', 'chemistry', 'mathbiology'
    ];
}
