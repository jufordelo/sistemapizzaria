<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaReserva extends Model
{
    use HasFactory;

    protected $table = "categoria_reservas";
    //app/Models/
    protected $fillable = [
        "nome",
    ];
}
