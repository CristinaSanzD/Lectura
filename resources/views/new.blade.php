
<?php
use App\Genero;
?>
@extends('master')
@section('content')
<h3>Nuevo Libro</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
    
    <form method="post" action="{{ url('libro') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre"
               value="{{ old('nombre') }}" required autofocus/>
        <label for="descripcion">Descripción:</label>
        <input id="descripcion" type="text" name="descripcion"
               value="{{ old('descripcion') }}" required autofocus/>
        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <?php $generos = Genero::all(); ?>
            @foreach($generos as $gen)
            <option value="{{ $gen->id }}">{{ $gen->nombre }}</option>
            @endforeach  
        </select>
        <label for="numpag">Número de páginas:</label>
        <input id="numpag" type="text" name="numpag"
               value="{{ old('numpag') }}" required autofocus/>
        <label for="autor">Autor:</label>
        <input id="autor" type="text" name="autor"
               value="{{ old('autor') }}" required autofocus/>
        <label for="imagen">Imagen:</label>
        <input id="imagen" type="file" name="imagen"
               value="{{ old('imagen') }}" required autofocus/>
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
</div></div></div></div>
@endsection

