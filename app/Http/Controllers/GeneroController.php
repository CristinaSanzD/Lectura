<?php

namespace App\Http\Controllers;

use App\Genero;
use Auth;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $generos = Genero::orderBy('nombre')->get();
        
        return view('generos.index2', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( !Auth::check() ) {
           return redirect('/login')
                   ->with('info', 'Para dar de alta autentíquese primero');  
        }
        
        $generos = Genero::all();
        
        return view('libros.nueva',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( !Auth::check() ) {
           return redirect('/')
                   ->with('info', 'Para dar de alta autentíquese primero');  
        }
        
        $reglas = [
            'nombre' => 'bail|required|unique:generos|max:40',
        ];
        
        $mensajes = [
            'nombre.required' => 'El nombre de género es obligatorio',
            'unique' => ':attribute ya existe en géneros',
            'nombre.max' => 'El nombre no puede superar los 40 caracteres',
        ];
                  
        $this->validate($request, $reglas, $mensajes);
        
        $genero = new Genero;
         
        $genero->nombre = $request->nombre;
      //  $genero->imagen = '';
           
        $genero->save();  // Guarda datos en la BD
         
         
        \Session::flash('estado', 'Genero ' . $genero->nombre .
                                             ' añadido con éxito !'); 
        return redirect('generos')
                ->with('exito', 'Inserción realizada con éxito !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generos = Genero::all();
        $libros = Genero::find($id)->libros()->paginate(4);   
    
        return view('libros.listar',compact('generos','libros'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
