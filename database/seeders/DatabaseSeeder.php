<?php

namespace Database\Seeders;

use App\Models\AccesoUsuario;
use App\Models\Comportamiento;
use App\Models\Empresa;
use App\Models\OpcionCrud;
use Illuminate\Database\Seeder;
use App\Models\TipoEmpresa;
use App\Models\User;
use App\Models\Ratio;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Comportamiento::create([
            'nombreComportamiento'=>'Comparado Con Si Mismo.',
        ]);
        //Crear ratios
        Ratio::create([
            'idRatio'=>'1',
            'nombreRatio'=>'Razón de circulante o razón de liquidez corriente.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'1',
        ]);
        Ratio::create([
            'idRatio'=>'2',
            'nombreRatio'=>'Razón de liquidez rápida o prueba acida.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'1',
        ]);
        Ratio::create([
            'idRatio'=>'3',
            'nombreRatio'=>'Razón de activo neto de trabajo / Activos totales Razón de capital de trabajo.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'1',
        ]);
        Ratio::create([
            'idRatio'=>'4',
            'nombreRatio'=>'Razón de efectivo.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'1',
        ]);
        Ratio::create([
            'idRatio'=>'5',
            'nombreRatio'=>'Media del intervalo.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'1',
        ]);
        Ratio::create([
            'idRatio'=>'6',
            'nombreRatio'=>'Activo neto o capital de trabajo.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'1',
        ]);
        Ratio::create([
            'idRatio'=>'7',
            'nombreRatio'=>'Razón de rotación de inventario.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'8',
            'nombreRatio'=>'Razón de rotación de días de inventarios.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'2',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'9',
            'nombreRatio'=>'Razón de rotación de cobros /rotación de cuentas por cobrar.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'2',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'10',
            'nombreRatio'=>'Razón de periodo medio de cobranza.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'2',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'11',
            'nombreRatio'=>'Razón de rotación de las cuentas por pagar.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'2',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'12',
            'nombreRatio'=>'Razón del periodo medio de pago.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'2',
        ]);

        Ratio::create([
            'idRatio'=>'13',
            'nombreRatio'=>'Razón de rotación de activos totales.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'14',
            'nombreRatio'=>'Razón de rotación de activos fijos.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'15',
            'nombreRatio'=>'Indice de margen bruto.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'16',
            'nombreRatio'=>'Indice de margen operativo.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'2',
        ]);
        Ratio::create([
            'idRatio'=>'17',
            'nombreRatio'=>'Razón de grado de endeudamiento.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'2',
            'idRazon'=>'3',
        ]);
        Ratio::create([
            'idRatio'=>'18',
            'nombreRatio'=>'Razón de grado de propiedad.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'3',
        ]);
        Ratio::create([
            'idRatio'=>'19',
            'nombreRatio'=>'Razón de endeudamiento patrimonial.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'2',
            'idRazon'=>'3',
        ]);
        Ratio::create([
            'idRatio'=>'20',
            'nombreRatio'=>'Razón de cobertura de gastos financieros.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'3',
        ]);
        Ratio::create([
            'idRatio'=>'21',
            'nombreRatio'=>'Razón de rentabilidad del patrimonio ROE = Return on equity.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'4',
        ]);
        Ratio::create([
            'idRatio'=>'22',
            'nombreRatio'=>'Razón de rentabilidad por acción.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'4',
        ]);
        Ratio::create([
            'idRatio'=>'23',
            'nombreRatio'=>'Razón de rentabilidad del activo.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'4',
        ]);
        Ratio::create([
            'idRatio'=>'24',
            'nombreRatio'=>'Razón de rentabilidad sobre ventas.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'4',
        ]);
        Ratio::create([
            'idRatio'=>'25',
            'nombreRatio'=>'Razón de rentabilidad sobre la inversión ROi.',
            'mensajeBueno'=>'Andamos bien',
            'mensajeMalo'=>'Andamos mal',
            'valorEstandar'=>'8.5',
            'evaluacion'=>'1',
            'idRazon'=>'4',
        ]);
        //FIN crear rtios

        TipoEmpresa::create(['nombre'=>'Servicios']);
        TipoEmpresa::create(['nombre'=>'Comercial']);

        Empresa::create(['nombreEmpresa'=>'Empresa 1','idTipoEmpresa'=>1 ,'catalogo'=>0]);
        Empresa::create(['nombreEmpresa'=>'Empresa 2','idTipoEmpresa'=>1 ,'catalogo'=>0]);
        Empresa::create(['nombreEmpresa'=>'Empresa 3','idTipoEmpresa'=>2 ,'catalogo'=>0]);
        Empresa::create(['nombreEmpresa'=>'Empresa 4','idTipoEmpresa'=>2 ,'catalogo'=>0]);

        // \App\Models\User::factory(10)->create();
        

        $user = User::factory()->count(20)->create();
        $user = User::find(1);  
        $user->email = "migue.galdamez@hotmail.com";
        $user->name = "Migue Galdámez";
        $user->password = '$2y$10$s/cUX.6cLzYoUNTwYFL.rOpsvNNDFnuAlP7HC90obhv4DPAdBJMmy';
        $user->idEmpresa = 1;
        $user->save();

        $user = User::find(2);  
        $user->email = "usuarioEmpresa1@hotmail.com";
        $user->name = "Usuario Empresa 1";
        $user->password = '$2y$10$s/cUX.6cLzYoUNTwYFL.rOpsvNNDFnuAlP7HC90obhv4DPAdBJMmy';
        $user->idEmpresa = 1;
        $user->save();

        $user = User::find(3);  
        $user->email = "usuarioEmpresa2@hotmail.com";
        $user->name = "Usuario Empresa 2";
        $user->password = '$2y$10$s/cUX.6cLzYoUNTwYFL.rOpsvNNDFnuAlP7HC90obhv4DPAdBJMmy';
        $user->idEmpresa = 2;
        $user->save();

        $user = User::find(4);  
        $user->email = "usuarioEmpresa3@hotmail.com";
        $user->name = "Usuario Empresa 3";
        $user->password = '$2y$10$s/cUX.6cLzYoUNTwYFL.rOpsvNNDFnuAlP7HC90obhv4DPAdBJMmy';
        $user->idEmpresa = 3;
        $user->save();

        $user = User::find(5);  
        $user->email = "usuarioEmpresa4@hotmail.com";
        $user->name = "Usuario Empresa 4";
        $user->password = '$2y$10$s/cUX.6cLzYoUNTwYFL.rOpsvNNDFnuAlP7HC90obhv4DPAdBJMmy';
        $user->idEmpresa = 4;
        $user->save();

        OpcionCrud::factory()->make();
        $opciones = OpcionCrud::get();
        foreach($opciones as $opcion){
          
                AccesoUsuario::create([
                    'idOpcion'=>$opcion->idOpcion,
                    'idUsuario'=>1
                ]);
           
        }
        foreach($opciones as $opcion){
            if($opcion->idOpcion!=12){
                AccesoUsuario::create([
                    'idOpcion'=>$opcion->idOpcion,
                    'idUsuario'=>2
                ]);
            }
        }
        foreach($opciones as $opcion){
            if($opcion->idOpcion!=12){
                AccesoUsuario::create([
                    'idOpcion'=>$opcion->idOpcion,
                    'idUsuario'=>3
                ]);
            }
        }
        foreach($opciones as $opcion){
            if($opcion->idOpcion!=12){
                AccesoUsuario::create([
                    'idOpcion'=>$opcion->idOpcion,
                    'idUsuario'=>4
                ]);
            }
        }
        foreach($opciones as $opcion){
            if($opcion->idOpcion!=12){
                AccesoUsuario::create([
                    'idOpcion'=>$opcion->idOpcion,
                    'idUsuario'=>5
                ]);
            }
        }


        $path = 'app/Models/cuenta_finale.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cuentas creadas!');

      
    }
}
