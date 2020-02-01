<?php

namespace App\Http\Controllers;
use App\Libro;
use App\Genero;
use Illuminate\Http\Request;
use Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        if ( !Auth::check() ) {
           \Session::flash('estado', 'Hay que logearse primero');
           return redirect('/'); 
        }
        
        $libros = Libro::paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar', compact('libros','generos'));
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
           \Session::flash('estado', 'Hay que logearse primero');
           return redirect('/');  
           
        }
        
        $reglas = [
            'nombre' => 'bail|required|max:40',
            'descripcion' => 'bail|required|max:2500',
            'genero' => 'bail|required',
            'numpag' => 'bail|required',
            'autor' => 'bail|required|max:40',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.max' => 'El nombre no puede superar los 40 caracteres',
            'descripcion.required' => 'La descripcion del libro es obligatorio',
            'descripcion.max' => 'La descripcion no puede superar los 2500 caracteres',
            'genero.required' => 'El genero es obligatorio',
            'numpag.required' => 'El numero de paginas es obligatorio',
            'autor.required' => 'El nombre del autor es obligatorio',
            'autor.max' => 'El nombre del autor no puede superar los 40 caracteres',
            'imagen' => 'El archivo no es un tipo de imagen válido'
        ];
        
        $this->validate($request, $reglas, $mensajes);
        $libro = new \App\Libro;
        
        
        $libro->id = $request->id;
        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->genero = $request->genero;
        $libro->numpag = $request->numpag;
        $libro->autor = $request->autor;
        if($request->imagen!=null){
            $libro->imagen = $request->imagen->getClientOriginalName();
        }
        
        
        // Obtiene el nombre de la imagen
               
        $libro->save();
        
        
        \Session::flash('estado', 'Libro ' . $libro->nombre .
                                             ' añadido con éxito !');  
        return redirect('/libro'); 
    }

    
    public function indexOrdNomAsc()
    {
        $libros = Libro::orderBy('nombre', 'asc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    public function indexOrdNomDesc()
    {
        $libros = Libro::orderBy('nombre', 'desc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros', 'generos'));
    }
    
    public function indexOrdGeneroAsc()
    {
        $libros = Libro::orderBy('genero', 'asc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    public function indexOrdGeneroDesc()
    {
        $libros = Libro::orderBy('genero', 'desc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    
    public function indexOrdPagAsc()
    {
        $libros = Libro::orderBy('numpag', 'asc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    public function indexOrdPagDesc()
    {
        $libros = Libro::orderBy('numpag', 'desc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    
    public function indexOrdAutAsc()
    {
        $libros = Libro::orderBy('autor', 'asc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    public function indexOrdAutDesc()
    {
        $libros = Libro::orderBy('autor', 'desc')->paginate(4);
        $generos = Genero::all();
        
        return view('libros.listar',compact('libros','generos'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ( !Auth::check() ) {
           \Session::flash('estado', 'Hay que logearse primero');
           return redirect('/'); 
        }
        $libro = Libro::find($id);
        
        return view('modificar', ['libro'=>$libro]);
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
        if ( !Auth::check() ) {
           return redirect('/login')->with('info', 'Autentíquese primero');  
        }
        
        $libro = Libro::find($request->id);
        
        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->genero = $request->genero;
        $libro->numpag = $request->numpag;
        $libro->autor = $request->autor;
        if($request->imagen!=null){
            $libro->imagen = $request->imagen->getClientOriginalName();
        }
        
        
        
        $reglas = [
            'nombre' => 'bail|required|max:40',
            'descripcion' => 'bail|required|max:2500',
            'genero' => 'bail|required',
            'numpag' => 'bail|required',
            'autor' => 'bail|required|max:40',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.max' => 'El nombre no puede superar los 40 caracteres',
            'descripcion.required' => 'La descripcion del libro es obligatorio',
            'descripcion.max' => 'La descripcion no puede superar los 2500 caracteres',
            'genero.required' => 'El genero es obligatorio',
            'numpag.required' => 'El numero de paginas es obligatorio',
            'autor.required' => 'El nombre del autor es obligatorio',
            'autor.max' => 'El nombre del autor no puede superar los 40 caracteres',
            'imagen' => 'El archivo no es un tipo de imagen válido'
        ];
        
        $this->validate($request, $reglas, $mensajes);
        
        // Obtiene el nombre de la imagen
        //$peli->imagen = $request->imagen->getClientOriginalName();       
        $libro->save();
        
        // Almacena el archivo en storage/app/public con el nombre $peli->imagen
        //$request->file('imagen')->storeAs('public',$peli->imagen);
        
        \Session::flash('estado', 'Modificación de ' . $libro->nombre .
                                             ' realizada con éxito !');  
        return redirect('/libro'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( !Auth::check() ) {
           \Session::flash('estado', 'Hay que logearse primero');
           return redirect('/');  
        }
        $libro = Libro::find($id); 
        $libro->delete();
        
        \Session::flash('estado', 'Eliminación libro ' . $libro->nombre .
                                             ' realizada con éxito !');        
        
        // volver a presentar la vista y, además, con mensaje flash 
        return redirect()->back();
    }
}
