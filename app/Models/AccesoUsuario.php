<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class AccesoUsuario extends Model
{
    use HasFactory;
    protected $table = 'accesoUsuario';
    protected $primaryKey = 'idAcceso';

    protected $fillable = [
        'idOpcion',
        'idUsuario',   
    ];

    
}
