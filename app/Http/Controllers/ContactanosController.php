<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }
    public function store(Request $request){

        // $request->all();
        // return $request;

        $request->validate([
            'name'      => 'required',
            'correo'    => 'required',
            'mensaje'   => 'required'
        ]);

        Mail::to('oscarmadrid_98@outlook.com')->send(new ContactanosMailable($request->all()));

        session()->flash('info','Mensaje enviado correctamente');

        return redirect()->route('contactanos.index');
    }
}
