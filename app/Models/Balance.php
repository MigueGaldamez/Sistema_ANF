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
}
