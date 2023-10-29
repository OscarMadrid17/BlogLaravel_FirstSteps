@extends('layouts.plantilla')

@section('title', 'Cursos Create')

@section('content')
    <h1>En esta pagina podras crear un curso</h1>

    <form action="{{route('cursos.store')}}" method="POST">

        @csrf

        <label >
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name')}}">
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
            <textarea name="descripcion"  cols="30" rows="10"> {{old('descripcion')}} </textarea>
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
            <input type="text" name="categoria" value="{{old('categoria')}}">
        </label>
        <br>

        @error('categoria')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <button type="submit">Enviar formulario</button>
    </form>
@endsection
