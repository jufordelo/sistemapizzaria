<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model

{
    use HasFactory;

    protected $table = "reservas"; 
   
    protected $fillable = [
        
        "resp",
        "tel",
        "data",
        "hora",
        "pss",
        "categoria_reserva_id",
    ];
    protected $casts = [ 
        'categoria_reserva_id' => 'integer',
    ];
    public function categoria()  
    {
        return $this->belongsTo(CategoriaReserva::class, 'categoria_reserva_id');
    }
}
