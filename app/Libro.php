<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $fillable = ['nombre', 'descripcion', 'genero', 'numpag', 'autor', 'imagen'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }
}
