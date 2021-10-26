<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionCrud extends Model
{
    
    use HasFactory;
    protected $table = 'opcionCrud';
    protected $primaryKey = 'idOpcion';

    protected $fillable = [
        'opcion',   
    ];
}
 