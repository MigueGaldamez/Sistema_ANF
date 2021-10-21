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
} 
