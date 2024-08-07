<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $table = "encomendas";
    //app/Models/
    protected $fillable = [
        "nome",
        "contato",
        "qtn",
        "categoria_id",
    ];
    protected $casts=[
        'categoria_id'=>'integer'
    ];
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');//tabela interior da relação
    }
}
