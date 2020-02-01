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
        <div class="shadow p-4 mb-4 bg-white"> 
            <table class="table table-striped table-hover table-responsive" >
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                    <tr>
                        <td>{{ $genero->id }}</td>
                        <td>{{ $genero->nombre }}</td>
                        <td><a class="btn btn-primary" 
                               href="{{ route('generos.show',$genero->id) }}">Libros</a></td>
                    </tr>
                    @endforeach
                </tbody>    
            </table>
        </div> 
       
    </div>

@endsection