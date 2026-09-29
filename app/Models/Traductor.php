<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traductor extends Model
{
    use HasFactory;

    protected $table = 'traductores';
    protected $primaryKey = 'ID_traductores';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Apellidos', 'idioma_nativo', 'idiomas_traduccion', 'certificaciones'];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'ID_traductor', 'ID_traductores');
    }
}
