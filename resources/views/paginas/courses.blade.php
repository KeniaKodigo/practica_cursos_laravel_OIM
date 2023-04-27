@extends('plantilla') <!-- obtenemos el diseño del apartado de plantilla -->

<!-- Haciendo referencia a la variable contenido para almacenar la informacion en el div container -->

@section('contenido')
    <h1 class="text-center text-info">Lista de Cursos</h1>
    <a href="{{ url('/form')}}" class="btn btn-secondary mb-3">Registrar Curso</a>
    <div class="row mb-5">
        @foreach ($courses as $item)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/') }}/image/course.jpg" class="card-img-top" alt="course">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text"><b>Descripcion: </b>{{ $item->description }}</p>
                        <p><b>Precio: </b> ${{ $item->price }}</p>
                        
                        <!-- hacemos referencia al nombre de la ruta para editar el curso -->
                        <form action="{{ route('edit', $item->id) }}" method="POST">
                            <!-- especificando el tipo de peticion -->
                            @method('GET')
                            @csrf <!-- token para autorizar la peticion -->
                            <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</button>
                        </form>
                        
                        <form action="{{ route('deleteCourse', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection