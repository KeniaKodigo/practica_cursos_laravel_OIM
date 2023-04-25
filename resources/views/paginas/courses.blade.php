@extends('plantilla') <!-- obtenemos el diseño del apartado de plantilla -->

<!-- Haciendo referencia a la variable contenido para almacenar la informacion en el div container -->

@section('contenido')
    <h1 class="text-center text-info">Lista de Cursos</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection