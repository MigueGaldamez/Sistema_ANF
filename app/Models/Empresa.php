<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresa';
    protected $primaryKey = 'idEmpresa';

    protected $fillable = [
        'nombreEmpresa',
        'idTipoEmpresa',
        'catalogo',
    ];
    public function tipoEmpresa()
    {
        return $this->belongsTo(TipoEmpresa::class,'idTipoEmpresa');
    }
    public function usuarios()
    {
            return $this->hasMany(User::class, 'idEmpresa');
    } 
    public function balances()
    {
            return $this->hasMany(Balance::class, 'idEmpresa');
    } 
    public function encontrarEmpresa($idEmpresa)
    {
            return $this->where('idEmpresa','=',$idEmpresa)->first();
    } 
}
