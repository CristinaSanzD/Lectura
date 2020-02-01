@extends('../master') 

@section('title', 'Libros')

@section('content')

    <div>
        @if(Session::has('estado'))
             <div class="alert alert-success" role="alert">{{ Session::get('estado') }}</div>
        @endif          
    </div>    

    <div class="row">

    <div > 
        <table id="tabla" class="table table-striped table-hover table-responsive" >
            <thead class="thead-dark">
                <tr>
                        <th>Id</th>
                        <th>Nombre
                            <a href="{{ url('/ordAscNom') }}"><i class="blanco fas fa-arrow-up"></i></a>
                            <a href="{{ url('/ordDescNom') }}"><i class="blanco fas fa-arrow-down"></i></a>
                        </th>
                        <th>Descripcion</th>
                        <th>Genero
                            <a href="{{ url('/ordAscGen') }}"><i class="blanco fas fa-arrow-up"></i></a>
                            <a href="{{ url('/ordDescGen') }}"><i class="blanco fas fa-arrow-down"></i></a>
                        </th>
                        <th>Número de Páginas
                            <a href="{{ url('/ordAscPag') }}"><i class="blanco fas fa-arrow-up"></i></a>
                            <a href="{{ url('/ordDescPag') }}"><i class="blanco fas fa-arrow-down"></i></a>
                        </th>
                        <th>Autor
                            <a href="{{ url('/ordAscAut') }}"><i class="blanco fas fa-arrow-up"></i></a>
                            <a href="{{ url('/ordDescAut') }}"><i class="blanco fas fa-arrow-down"></i></a>
                        </th>
                        <th>Imagen portada</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->nombre }}</td>
                    <td>{{ $libro->descripcion }}</td>
                    @foreach($generos as $gen)
                        @if($gen->id == $libro->genero )
                            <td>{{ $gen->nombre }}</td>
                            @endif
                         @endforeach
                    
                    <td>{{ $libro->numpag }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td><img src="{{asset('imagenes/'.$libro->imagen)}}" heigth='80px' width='50px'></td>
                    <td><a class="btn btn-primary" href="{{ route('editar',[$libro->id]) }}">Modificar</a></td>
                    <td>
                        <form> <a onclick="return confirm('Seguro que desea eliminar {{ $libro->nombre }} ')" class="btn btn-danger" href="{{ route('eliminar',[$libro->id]) }}">Eliminar</a></form>  
                    </td>   
                </tr>
                @endforeach
            </tbody>    
        </table>
    </div> 
       
    </div>

    <div class="row">   
       {{ $libros->links() }}
    </div>
@endsection

