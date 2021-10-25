<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $table = 'cuenta';
    protected $primaryKey = 'idCuenta';

    protected $fillable = [
        'codigoCuenta',
        'nombreCuenta',
    ];
    public function saldoBalanceAnio($idCuenta,$idEmpresa,$anio){
        $balance = Balance::where('anio','=',$anio)->where('idEmpresa','=',$idEmpresa)->first();
        return DetalleBalance::where('idCuenta','=',$idCuenta)->where('idBalance','=',$balance->idBalance)->first();
    
    }
    public function saldoEstadoAnio($idCuenta,$idEmpresa,$anio){
        $estado = EstadoResultado::where('anio','=',$anio)->where('idEmpresa','=',$idEmpresa)->first();
        return DetalleEstadoResultado::where('idCuenta','=',$idCuenta)->where('idEstadoResultado','=',$estado->idEstadoResultado)->first();
    
    }
    
    
}
