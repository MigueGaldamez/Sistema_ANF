<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoResultado extends Model
{
    use HasFactory;
    protected $table = 'estadoResultado';
    protected $primaryKey = 'idEstadoResultado';

    protected $fillable = [
        'anio',
        'idEmpresa',
    ];
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'idEmpresa');
    }
    public function detallesEstadoResultado()
    {
            return $this->hasMany(DetalleEstadoResultado::class, 'idEstadoResultado');
    }
    public function anterior($anio,$empresa){
        return $this->where('anio','=',$anio-1)->where('idEmpresa','=',$empresa)->first();
    }
    public function ventasAnio($anio,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$anio)->first();
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->first();
        return $detalle2;

    }
} 

