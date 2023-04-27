@extends('plantilla')

@section('contenido')
    <h1 class="text-center text-primary">Lista de Instructores</h2>
    
    <form action="{{ route('getInstructors') }}" method="POST">
        @method('GET')
        @csrf
        <label for="">Busqueda por nombre</label>
        <!-- la variable $buscar, hace referencia a la variable que esta en el metodo index del 
            InstructorController, lo que la persona me ingrese en el input se guardar en la variable $buscar 
            y va generar la consulta de la busqueda
         -->
        <input type="text" name="buscar" value="{{$buscar}}">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </form>

    <table class="table table-striped table-hover">
        <thead>
            <th>N°</th>
            <th>Nombre</th>
            <th>Correo</th>
        </thead>
        <tbody>
            @if (count($instructor) <= 0)
                <tr>
                    <td colspan="3">
                        <div class="alert alert-danger" role="alert">
                            No se encontraron resultados
                        </div>
                    </td>
                </tr>
            @else
                @foreach ($instructor as $item)
                    <tr>
                        <td></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection