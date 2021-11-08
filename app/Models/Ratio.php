<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratio extends Model
{
    use HasFactory;
    protected $table = 'ratio';
    protected $primaryKey = 'idRatio';

    protected $fillable = [
        'nombreRatio',
        'mensajeBueno',
        'mensajeMalo',
        'valorEstandar',
        'evaluacion',
    ];

    public function detallesRatios()
    {
            return $this->hasMany(DetalleRatio::class, 'idRatio')->orderBy('anio', 'asc');
    }
    public function detallesRatiosE($idEmpresa)
    {
            return $this->hasMany(DetalleRatio::class, 'idRatio')->where('idEmpresa','=',$idEmpresa)->orderBy('anio', 'asc')->get();
    }
    public function detallesRatioParticular($idEmpresa,$anio)
    {
            return $this->hasOne(DetalleRatio::class, 'idRatio')->where('idEmpresa','=',$idEmpresa)->where('anio','=',$anio)->first();
    }
    public function detallesRatiosPromedio()
    {   
        $detalle = DetalleRatio::where('idRatio','=',$this->idRatio)->avg('valorRatio');
        return $detalle;
    }
}
