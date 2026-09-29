<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';
    protected $primaryKey = 'ID_autores';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Apellidos', 'telefono', 'correo'];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'ID_autor', 'ID_autores');
    }
}
