<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    use HasFactory;
    protected $table = 'comportamiento';
    protected $primaryKey = 'idComportamiento';

    protected $fillable = [
        'nombreComportamiento',
    ];
}
