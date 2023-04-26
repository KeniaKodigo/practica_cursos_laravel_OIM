<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Instructor;

class CoursesController extends Controller
{
    //metodo que va obtener todos los cursos y los va retornar a una vista
    public function index(){
        //select * from courses => all()
        $course = Courses::all();

        //retornando una vista con la informacion de los cursos
        return view('paginas.courses', array("courses" => $course));
    }

    //metodo que retorna la vista del formulario de registrar un curso
    public function getForm(){
        //select * from instructor
        $instructor = Instructor::all();

        return view('paginas.registerCourse', array("instructor" => $instructor));
    }

    //metodo para registrar un curso
    public function store(Request $request){
        $course = new Courses();
        $course->title = $request->post('title');
        $course->description = $request->post('description');
        $course->price = $request->post('price');
        $course->id_instructor = $request->post('instructor');
        //insert into table(campos) values(valores)
        $course->save();

        //redireccionamos al apartado de cursos
        return redirect()->route('getCourses');
    }

    //metodo que retorna la vista para editar un curso
    public function edit(){
        //select * from instructor
        $instructor = Instructor::all();

        return view('paginas.editCourse', array("instructor" => $instructor));
    }
}
