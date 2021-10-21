<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRatio extends Model
{
    use HasFactory;
    protected $table = 'detalleRatio';
    protected $primaryKey = 'idDetalleRatio';

    protected $fillable = [
        'anio',
        'valorRatio',
        'idRatio',
        'idEmpresa',
        'idComportamiento',
    ];
    public function ratio()
    {
        return $this->belongsTo(Ratio::class,'idRatio');
    }
    public function empresa()
    {
        return $this->belongsTo(Ratio::class,'idEmpresa');
    }
    public function comportamiento()
    {
        return $this->belongsTo(Comportamiento::class,'idComportamiento');
    }
    public function anteriorValor(DetalleRatio $detalleRatio)
    {
        
        return $this->where('anio','=',$detalleRatio->anio - 1)
                    ->where('idRatio','=',$detalleRatio->idRatio)
                    ->where('idEmpresa','=',$detalleRatio->idEmpresa)
                    ->where('idcomportamiento','=',$detalleRatio->idComportamiento)->first();
    }
    public function registros($anio,$idRazon,$idEmpresa){
        $ratios = Ratio::where('idRazon','=',$idRazon)->pluck('idRatio');
        return $this->where('anio','=',$anio)
                    ->where('idEmpresa','=',$idEmpresa)
                    ->whereIn('idRatio',$ratios)->get();
    }
}
