<?php

namespace App\Imports;

use App\Models\DetalleBalance;
use App\Models\Cuenta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DetalleBalanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        
        $existe = Cuenta::where('nombreCuenta','=',$row[0])->first();
        $balance= session('idBalance');
        
        if($existe){
            if($row[1]==""){
                return new DetalleBalance([
            
                    'idBalance'=>$balance,
                    'idCuenta'=> $existe->idCuenta,
                    'saldo'=>0,
                ]);
            }
            else{
                return new DetalleBalance([
            
                    'idBalance'=>$balance,
                    'idCuenta'=> $existe->idCuenta,
                    'saldo'=>$row[1],
                ]);
            }
           
        }
        else{
            return null;
        }

      
      /*
        return new DetalleBalance([
                
            'anio'=>'2021',
            'nombreCuenta'=> $row[0],
            'saldo'=>$row[1],
        ]);
        */
        
    }
}
