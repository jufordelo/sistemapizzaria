<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaSugestao extends Model
{
    use HasFactory;

    protected $table = "categoria_sugestao";
    //app/Models/
    protected $fillable = [
        "tipo",
    ];
}
