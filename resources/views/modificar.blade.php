@extends('../master')
@section('title', 'Modificación Libros')
@section('content')
 <?php
use App\Genero;
?>
    <div id="p" class="row">
        <h4>Modificar Libro nº {{ $libro->id }}</h4>
    </div>    
      
    <div class="row shadow p-4 mb-4 bg-white">   
        <div id="izq">  
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                                           action="{{ route('update',[$libro->id]) }}">

                    {{ method_field('POST') }}
                    {{ csrf_field() }}

                <input id="id" type="hidden" name="id" value="{{ $libro->id }}"/>                
               
                <div class="form-group">
                    <label for="nombre">Nombre:</label>        
                    <input id="nombre" type="text" class="form-control col-9" name="nombre"
                           value="{{ $libro->nombre }}" autofocus/>
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div> 
                
                <div class="row" >
                                
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>                    
                        <input id="descripcion" type="text" class="form-control col-10" name="descripcion"
                                value="{{ $libro->descripcion }}" autofocus>
                        @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    </div>    
                    <div class="form-group">
                        <label for="genero">Género:</label>                    
                        <?php $generos = Genero::all(); ?>
                            @foreach($generos as $gen)
                                @if($gen->id == $libro->genero )
                                    {{ $gen->nombre }}
                                @endif
                            @endforeach
                        <select id="genero" name="genero">    
                                @foreach($generos as $gen)
                                    <option value="{{ $gen->id }}">{{ $gen->nombre }}</option>
                                @endforeach  
                        </select>
                        @if ($errors->has('genero'))
                            <span class="help-block">
                                <strong>{{ $errors->first('genero') }}</strong>
                            </span>
                        @endif
                    </div>    
                    <div class="form-group">
                        <label for="numpag">Número de páginas:</label>                    
                        <input id="numpag" type="text" class="form-control col-6" name="numpag"
                                value="{{ $libro->numpag }}" autofocus>
                        @if ($errors->has('numpag'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numpag') }}</strong>
                            </span>
                        @endif
                    </div>    
                     <div class="form-group">
                        <label for="autor">Autor:</label>                    
                        <input id="autor" type="text" class="form-control col-6" name="autor"
                                value="{{ $libro->autor }}" autofocus>
                        @if ($errors->has('autor'))
                            <span class="help-block">
                                <strong>{{ $errors->first('autor') }}</strong>
                            </span>
                        @endif
                    </div>    
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <img src="{{asset('imagenes/'.$libro->imagen)}}" height="50px" width="50px"/>
                        <input id="imagen" type="file" name="imagen"/>
                    </div>
                
                <div class="form-group">            
                    <div class="col-lg-offset-4 col-8">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="row">    
         @if(Session::has('exito'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('exito') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif   
        @if(Session::has('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ Session::get('info') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif   
    </div>      
@endsection