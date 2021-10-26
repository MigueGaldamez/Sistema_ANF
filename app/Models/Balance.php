<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $table = 'balance';
    protected $primaryKey = 'idBalance';

    protected $fillable = [
        'anio',
        'idEmpresa',
    ];
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'idEmpresa');
    }
    public function detallesBalance()
    {
            return $this->hasMany(DetalleBalance::class, 'idBalance');
    }
    public function anterior($anio,$empresa){
        return $this->where('anio','=',$anio-1)->where('idEmpresa','=',$empresa)->first();
    }
    public function activoAnio($anio,$empresa){
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$anio)->first();
        $valores2 = ['0010'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->first();
        return $detalle2;

    }
    public function pasivoAnio($anio,$empresa){
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$anio)->first();
        $valores2 = ['0030'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->first();
        return $detalle2;

    }
}
