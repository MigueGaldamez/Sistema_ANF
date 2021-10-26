<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEstadoResultado extends Model
{
    use HasFactory;
    protected $table = 'detalleEstadoResultado';
    protected $primaryKey = 'idDetalleEstadoResultado';

    protected $fillable = [
        'idEstadoResultado',
        'idCuenta',
        'saldo', 
    ];
    public function estadoResultado()
    {
        return $this->belongsTo(Balance::class,'idEstadoResultado');
    }
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class,'idCuenta');
    }
 
}
