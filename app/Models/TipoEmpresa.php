<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{
    use HasFactory;
    protected $table = 'tipoEmpresa';
    protected $primaryKey = 'idTipoEmpresa';

    protected $fillable = [
        'nombre',
    ];
    public function empresas()
    {
            return $this->hasMany(Empresa::class, 'idTipoEmpresa');
    } 
}
