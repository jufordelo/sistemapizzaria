<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    use HasFactory;

    protected $table = "sugestao";

    protected $fillable = [
        "assunto",
        "tipo",
        "comentario",
        "categoria_sugestao_id",
    ];

}
