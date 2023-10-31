<?php

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

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

Route::get('/'                      ,   [HomeController::class  , 'home'])->name('home');

Route::get('cursos'                 ,   [CursoController::class , 'index'])->name('cursos.index');

Route::get('cursos/create'          ,   [CursoController::class , 'create'])->name('cursos.create');

Route::post('cursos'                ,   [CursoController::class , 'store'])->name('cursos.store');

Route::get('cursos/{curso}'         ,   [CursoController::class , 'show'])->name('cursos.show');

Route::get('cursos/{curso}/edit'    ,   [CursoController::class , 'edit'])->name('cursos.edit');

Route::put('cursos/{curso}/edit'    ,   [CursoController::class , 'update'])->name('cursos.update');

Route::delete('cursos/{curso}'      ,   [CursoController::class , 'destroy'])->name('cursos.destroy');

Route::view('nosotros', 'nosotros')->name('nosotros');

// Route::get('contactanos', function(){
//     Mail::to('oscarmadrid_98@outlook.com')->send(new ContactanosMailable);

//     return "mensaje enviado";
// })->name('contactanos');

Route::get('contactanos'            ,  [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos'           ,  [ContactanosController::class, 'store'])->name('contactanos.store');
