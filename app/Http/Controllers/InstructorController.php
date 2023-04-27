<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    //metodo para la busqueda de instructores
    public function index(Request $request){
        //trim() => elimna espacios al principio y al final
        //a  n a = ana
        $buscar = trim($request->post('buscar'));
        //SELECT name, email FROM instructor WHERE name LIKE '%$buscar%';
        $instructor = Instructor::select('name','email')->where('name','LIKE','%'.$buscar.'%')->get();

        //retornando a una vista
        return view();
    }
}
