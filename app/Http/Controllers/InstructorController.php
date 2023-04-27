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
        /***
         * el metodo compact(): es otra manera de mandar informacion de un arreglo un poco mas optimizado
         * 
         * en vez de hacer: array("instructor" => $instructor, "buscar" => $buscar) lo resumimos por medio
         * 
         * del compact('instructor','buscar') donde se hace referencia a los 2 variables que estan arriba
         */
        return view("paginas.instructors", compact('instructor','buscar'));
    }
}
