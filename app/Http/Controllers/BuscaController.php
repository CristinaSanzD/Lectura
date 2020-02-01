<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class BuscaController extends Controller
{
    public function indexDescripcion(Request $request)
    {        
        if ( $request->ajax() )
        { 
            $libros = Libro::where('nombre','like',$request->busca.'%')->get();
 
            if ( $libros->count() > 0 )
                return response()->json($libros);
            else
                return response()->json(['id' => 'n']);
        }      
       
    }
}
