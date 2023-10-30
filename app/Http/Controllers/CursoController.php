<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Http\Requests\StoreCursoUpdate;
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

    public function store(StoreCurso $request){

        // $curso = new Curso();

        // $curso->name        = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria   = $request->categoria;

        // $curso->save();

        // return $request->all();

        // $curso = Curso::create([
        //     'name'          =>$request->name,
        //     'descripcion'   =>$request->descripcion,
        //     'categoria'     =>$request->categoria
        // ]);
        $curso = Curso::Create($request->all()); //De esta manera podemos guardar todos los campos en nuestras tablas como se visualiza en las lineas de codigo superiores, pero de manera automatica y en una sola linea de codigo -> hay que asignar los campos que se van a llenar en el modelo curso con la propiedad $fillable

        return redirect()->route('cursos.show', $curso->id);
    }

    public function show(Curso $curso){     //Al hacer la instancia de la clase curso, recuperamos el el registro completo
        // $curso = Curso::find($id); //Recuperar un registro por su id

        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }

    public function update(StoreCursoUpdate $request,Curso $curso){

        // $curso->name        = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria   = $request->categoria;

        // $curso->save();

        $curso->update($request->all()); //Asignacion masiva que ejecuta el mismo procedimiento que las lineas de codigo comentadas de arriba

        return redirect()->route('cursos.show', $curso->id);
    }
}
