@extends('plantilla')


@section('contenido')
    <h1 class="text-center text-success">Actualizando Curso</h1>
    <form action="" method="POST">
        <!-- el csrf le estamos indicando a laravel que estamos enviando informacion -->
        @csrf
        <label for="">Titulo</label>
        <input type="text" class="form-control" name="title">

        <label for="">Descripcion</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>

        <label for="">Precio</label>
        <input type="text" class="form-control" name="price">

        <label for="">Instructor</label>
        <select name="instructor" id="" class="form-control">
            <option value="">Seleccion un Instructor</option>
            @foreach ($instructor as $value)
                <option value={{$value->id}}>{{$value->name}}</option>
            @endforeach
        </select>

        <input type="submit" class="btn btn-success mt-3" value="Actualizar Curso">
    </form>
@endsection