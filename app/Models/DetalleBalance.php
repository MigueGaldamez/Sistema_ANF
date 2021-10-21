<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBalance extends Model
{
    use HasFactory;
    protected $table = 'detalleBalance';
    protected $primaryKey = 'idDetalleBalance';

    protected $fillable = [
        'idBalance',
        'idCuenta',
        'saldo',
    ];
    public function balance()
    {
        return $this->belongsTo(Balance::class,'idBalance');
    }
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class,'idCuenta');
    }
}
