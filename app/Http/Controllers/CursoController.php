<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::orderBy('id','desc')->paginate();


        return view('cursos.index', compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'          => 'required|min:3',
            'descripcion'   => 'required',
            'categoria'     => 'required'
        ]);

        $curso = new Curso();

        $curso->name        = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria   = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso->id);
    }

    public function show(Curso $curso){     //Al hacer la instancia de la clase curso, recuperamos el el registro completo
        // $curso = Curso::find($id); //Recuperar un registro por su id

        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request,Curso $curso){
        $request->validate([
            'name'          => 'required|min:3',
            'descripcion'   => 'required',
            'categoria'     => 'required'
        ]);

        $curso->name        = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria   = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso->id);
    }
}
