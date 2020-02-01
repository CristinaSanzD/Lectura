@extends('../master')
@section('title', 'Géneros de libros')
@section('content')

    <div>
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

    <div class="row"> 
        <h3>Géneros de libros</h3> 
    </div>    

    <div id="vistas" class="row">    

        @foreach ($generos as $genero)
            <div id="vista3" class="shadow p-4 mb-4 bg-indigo-light" 
                 style="width:250px; margin:20px; border-radius:20%; "> 

                <a id="over" href="{{ route('generos.show',$genero->id) }}">
                    <h5>{{ $genero->nombre }}</h5></a>            
            </div>    
        @endforeach

    </div>
      
    
@endsection