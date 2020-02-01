@extends('../master')

@section('title', 'Género')

@section('content')

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
    
    <div class="row shadow p-4 mb-4 bg-white">   
        
        <form class="form-horizontal" role="form" method="post" 
                enctype="multipart/form-data" action="{{ route('generos.store') }}">
            {{ csrf_field() }}
           
            <div class="form-group">
                <label for="nombre">Nombre Género:</label>        
                    <input id="nombre" type="text" class="form-control col-12" name="nombre"
                           value="" autofocus/>
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
            </div>  
            
            <div class="form-group">            
                <div class="col-lg-offset-4 col-lg-8">
                    <button type="submit" class="btn btn-primary">Insertar</button>
                </div>
            </div>
        </form> 
        
    </div>    
          
@endsection