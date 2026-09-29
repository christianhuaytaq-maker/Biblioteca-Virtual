<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $primaryKey = 'ID_prestamo';
    public $timestamps = false;

    protected $fillable = ['ID_libro', 'ID_usuario', 'fecha_prestamo', 'fecha_devolucion', 'estado'];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'ID_libro', 'ID_libro');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_usuario', 'ID_usuario');
    }
}
