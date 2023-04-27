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
    public function edit($id){
        //SELECT * FROM courses WHERE id = $id
        //select * from instructor
        //$course = Courses::find($id); //id

        #consulta uniendo 2 tablas
        /**
         * SELECT courses.id, courses.title, courses.price, courses.id_instructor, instructor.name FROM courses INNER JOIN instructor ON courses.id_instructor = instructor.id WHERE courses.id = $id;
         */
        $course = Courses::join('instructor','courses.id_instructor','instructor.id')
                    ->select('instructor.name as instructor','courses.id as id_course','courses.title','courses.description','courses.price','courses.id_instructor')->find($id);
                    
        $instructor = Instructor::all();
        //Instructor::select('id','name')->get(); // el metodo get() me ayuda a retornar lo que me devuelve la consulta

        //retornamos la informacion de las 2 consultas sql
        return view('paginas.editCourse', array("instructor" => $instructor, "course" => $course));
    }

    //metodo para actualizar un curso
    public function update($id, Request $request){
        $courses = Courses::find($id); //select * from course where id = $id
        $courses->title = $request->post('title');
        $courses->description = $request->post('description');
        $courses->price = $request->post('price');
        $courses->id_instructor = $request->post('instructor');
        $courses->update();//UPDATE table SET title = '' .. WHERE id = ?

        //redireccionamos al apartado de cursos
        return redirect()->route('getCourses');
    }

    //metodo para eliminar un curso
    public function destroy($id){
        //DELETE FROM courses WHERE id = $id
        //delete() = DELETE FROM courses
        $course = Courses::where("id","=",$id)->delete();

        return redirect()->route('getCourses');
    }
}
