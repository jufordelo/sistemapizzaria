<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalizado extends Model
{
    use HasFactory;
    protected $table = "personalizados";
    //app/Models/
    protected $fillable = [
        "nomec",
        "tel",
        "datareti",
        "horareti",
        "kg",
        "obs",
        "categoria_personalizado_id",
        "imagem",
    ];
    protected $casts=[
        'categoria_personalizado_id'=>'integer'
    ];
    public function categoria(){
        return $this->belongsTo(CategoriaPersonalizado::class, 'categoria_personalizado_id');//tabela interior da relação
    }
}
