<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //nombre de la tabla de la bd
    protected $table = 'courses';
    //omitiendo los dos atributos que genera laravel update_at y create_at
    //hace referencia a la fecha en que guardo un registro y se actualizo
    public $timestamps = false;
}
