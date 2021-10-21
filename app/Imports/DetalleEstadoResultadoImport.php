<?php

namespace App\Imports;

use App\Models\DetalleEstadoResultado;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Cuenta;

class DetalleEstadoResultadoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $existe = Cuenta::where('nombreCuenta','=',$row[0])->first();
        $estado= session('idEstadoResultado');
        
        if($existe){
            if($row[1]==""){
                return new DetalleEstadoResultado([
            
                    'idEstadoResultado'=>$estado,
                    'idCuenta'=> $existe->idCuenta,
                    'saldo'=>0,
                ]);
            }
            else{
                return new DetalleEstadoResultado([
            
                    'idEstadoResultado'=>$estado,
                    'idCuenta'=> $existe->idCuenta,
                    'saldo'=>$row[1],
                ]);
            }
           
        }
        else{
            return null;
        }
    }
}
