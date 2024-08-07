<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEstoque extends Model
{
    use HasFactory;

    protected $table = "categoria_estoque";
    //app/Models/
    protected $fillable = [
        "tipo",
    ];
}
