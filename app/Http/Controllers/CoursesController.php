<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    //metodo que va obtener todos los cursos y los va retornar a una vista
    public function index(){
        //select * from courses => all()
        $course = Courses::all();

        //retornando una vista con la informacion de los cursos
        return view('paginas.courses', array("courses" => $course));
    }
}
