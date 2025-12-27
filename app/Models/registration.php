<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    protected $table = 'registration';
    protected $fillable = ['id', 'Name', 'Gender', 'DateofBirth', 'class', 'RollNo', 'SeatNo'];
}
