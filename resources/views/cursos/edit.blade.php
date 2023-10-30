@extends('layouts.plantilla')

@section('title', 'Cursos Edit')

@section('content')
    <h1>En esta pagina podras editar un curso</h1>

    <form action="{{route('cursos.update', $curso)}}" method="POST">

        @csrf

        @method('PUT')

        <label >
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name',$curso->name)}}">
            <br>
        </label>

        @error('name')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <label >
            Descripcion:
            <br>
            <textarea name="descripcion"  cols="30" rows="10"> {{old('descripcion',$curso->descripcion)}} </textarea>
            <br>
        </label>

        @error('descripcion')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <label >
            Categoria:
            <br>
            <input type="text" name="categoria" value="{{old('categoria',$curso->categoria)}}">
        </label>
        <br>

        @error('categoria')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <button type="submit">Actualizar formulario</button>
    </form>
@endsection
