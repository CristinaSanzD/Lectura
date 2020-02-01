@extends('master')
@section('title', 'Libros')
@section('content')

    <div class="row">
        <div class="shadow p-4 mb-4 bg-white"> 
            
            <div class="form-group">
                Nombre: <input type="text" class="form-controller" id="search" name="search"><i class=" fas fa-search"></i></input>
            </div>

            <table class="table table-bordered table-hover table-responsive">
                <thead class="thead-dark">
                    <tr>
                         <th>Id</th>
                         <th>Nombre</th>
                         <th>Descripcion</th>
                         <th>Genero</th>
                         <th>Número de páginas</th>
                         <th>Autor</th>
                    </tr>
                </thead>
                <tbody></tbody>    
            </table>
        </div>
    </div>
@endsection
