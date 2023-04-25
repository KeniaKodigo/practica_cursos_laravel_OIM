<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('plantilla');
});

//creando una ruta para el metodo index() del controlador cursos
Route::get('/courses', [CoursesController::class, 'index'])->name('getCourses'); //nombre de la ruta (name)