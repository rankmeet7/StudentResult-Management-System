<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    protected $table = '_result';
    protected $fillable = ['id', 'SeatNo', 'RollNo', 'Name', 'class', 'Gujarati', 'English', 'Eco', 'Spcc', 'Ba', 'Acc', 'Stat'];
}
