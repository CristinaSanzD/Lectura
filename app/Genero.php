<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = "generos";
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function libros()
    {
        return $this->hasMany('App\Libro','genero');
    }        
}