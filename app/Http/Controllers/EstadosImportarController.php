<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Imports\DetalleBalanceImport;
use App\Imports\DetalleEstadoResultadoImport;
use App\Models\AccesoUsuario;
use App\Models\Balance;
use App\Models\DetalleBalance;
use App\Models\DetalleEstadoResultado;
use App\Models\DetalleRatio;
use App\Models\EstadoResultado;
use Excel;
use App\Models\Ratio;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use App\Models\OpcionCrud;
use App\Models\TipoEmpresa;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class EstadosImportarController extends Controller
{
    //
    public function comparacionDatos($anio){
        $ratiosNombres = Ratio::all();
        $ratiosMios = "";
        $ratiosMios = DetalleRatio::where('idEmpresa','=',Auth::user()->idEmpresa)->where('anio','=',$anio)->get();
        if($ratiosMios->isEmpty()){
            $this->calcular_Ratios($anio,Auth::user()->idEmpresa);
            $ratiosMios = DetalleRatio::where('idEmpresa','=',Auth::user()->idEmpresa)->where('anio','=',$anio)->get();
        }
        return view('ratios.comparacioninputs',compact('anio','ratiosMios','ratiosNombres'));
    }
    public function comparacioEmpresas($id,$anio){

        $ratiosNombres = Ratio::all();
        $ratiosOtros = "";
        $empresaOtra = Empresa::where('idEmpresa','=',$id)->first();
        $ratiosMios = DetalleRatio::where('idEmpresa','=',Auth::user()->idEmpresa)->where('anio','=',$anio)->get();


        $ratiosOtros = DetalleRatio::where('idEmpresa','=',$id)->where('anio','=',$anio)->get();
        if($ratiosOtros->isEmpty()){
            $this->calcular_Ratios($anio,$id);
            $ratiosOtros = DetalleRatio::where('idEmpresa','=',$id)->where('anio','=',$anio)->get();
        }

        return view('ratios.comparacion',compact('ratiosMios','ratiosOtros','empresaOtra','ratiosNombres','anio'));
       
    }
    public function compararRatio(){
        $ratiosNombres = Ratio::all();
        $empresas  = DB::table('balance')
        ->join('estadoResultado', function ($join) {
            $join->on('balance.anio', '=', 'estadoResultado.anio')
            ->On('balance.idEmpresa', '=', 'estadoResultado.idEmpresa');
        })
        ->join('empresa','balance.idEmpresa','=','empresa.idEmpresa')
        ->where('empresa.idEmpresa','!=',Auth::user()->idEmpresa)
        ->get();
        $empresaMia  = DB::table('balance')
        ->join('estadoResultado', function ($join) {
            $join->on('balance.anio', '=', 'estadoResultado.anio')
            ->On('balance.idEmpresa', '=', 'estadoResultado.idEmpresa');
        })
        ->join('empresa','balance.idEmpresa','=','empresa.idEmpresa')
        ->where('empresa.idEmpresa','=',Auth::user()->idEmpresa)
        ->get();
        $modelo = Empresa::first();
        return view('ratios.comparar',compact('empresas','modelo','ratiosNombres','empresaMia'));
    }
    public function importarBalance(){
        return view('estados.importar');
    }
    public function guardarBalance(Request $request){
        $file = $request->archivo;
        $ya = Balance::where('anio','=',$request->anio)->where('idEmpresa','=',Auth::user()->idEmpresa)->get();
        if(!$file){
            return redirect()->back()->with('error',"Ingrese un archivo valido");
        }
        if(!$ya->isEmpty()){
            return redirect()->back()->with('error',"Ese año ya tiene un balance ingresado");
        }
        $balance = new Balance();
        $balance->anio = $request->anio;      
        $balance->idEmpresa = Auth::user()->idEmpresa;
        $balance->save();
        session(['idBalance' => $balance->idBalance]);
        $importar = Excel::import(new DetalleBalanceImport,$file);

        if(!$importar){
            $balance->delete();
            return redirect()->back()->with('error',"Ingrese un archivo valido");
        }
        
        $pasivo = DetalleBalance::where('idCuenta','=',1)->where('idBalance','=',$balance->idBalance)->first();
        $activo = DetalleBalance::where('idCuenta','=',67)->where('idBalance','=',$balance->idBalance)->first();
        if($pasivo->saldo != $activo->saldo){
            $eliminar = DetalleBalance::where('idBalance','=',$balance->idBalance)->delete();
            $balance->delete();
            return redirect()->back()->with('error',"Balance no cuadra");
            
        }

        $mensaje = "Guardado con exito";
        session()->forget('idBalance');
        return redirect()->back()->with('mensaje',$mensaje);
      
    }
    public function guardarEstado(Request $request){
        $file = $request->archivo;
        $ya = EstadoResultado::where('anio','=',$request->anio)->where('idEmpresa','=',Auth::user()->idEmpresa)->get();
        if(!$file){
            return redirect()->back()->with('error',"Ingrese un archivo valido");
        }
        if(!$ya->isEmpty()){
            return redirect()->back()->with('error',"Ese año ya tiene un estado ingresado");
        }
        $estado = new EstadoResultado();
        $estado->anio = $request->anio;      
        $estado->idEmpresa = Auth::user()->idEmpresa;
        $estado->save();
        session(['idEstadoResultado' => $estado->idEstadoResultado]);
        $importar = Excel::import(new DetalleEstadoResultadoImport,$file);
        if(!$importar){
            $estado->delete();
            return redirect()->back()->with('error',"Ingrese un archivo valido");
        }
        $mensaje = "Guardado con exito";
        session()->forget('idEstadoResultado');
        return redirect()->back()->with('mensaje',$mensaje);
      
    }
    public function verRatios(){
        $modelo = DetalleRatio::first();
        $ratiosNombres = Ratio::all();
        $ratiosNombres1 = Ratio::where('idRazon','=',1)->get();
        $ratiosNombres2 = Ratio::where('idRazon','=',2)->get();
        $ratiosNombres3 = Ratio::where('idRazon','=',3)->get();
        $ratiosNombres4 = Ratio::where('idRazon','=',4)->get();
        $anios = DetalleRatio::select('anio')->orderBy('anio', 'asc')->where('idEmpresa','=',Auth::user()->idEmpresa)->distinct()->pluck('anio');
        $aniosR = DetalleRatio::select('anio')->orderBy('anio', 'desc')->distinct()->pluck('anio');
        $ratiosxAnios = DetalleRatio::all()->groupBy('anio');
        $ratios = DetalleRatio::all();
        return view('ratios.ver',
        compact('ratios','ratiosxAnios','anios','ratiosNombres','modelo',
        'aniosR','ratiosNombres1','ratiosNombres2','ratiosNombres3','ratiosNombres4'));
    }
    public function verEstados(){
        $balances = Balance::where('idEmpresa','=',Auth::user()->idEmpresa)->get();
        $estados = EstadoResultado::where('idEmpresa','=',Auth::user()->idEmpresa)->get();
        return view('estados.ver',compact('balances','estados'));
    }
    public function calcularRatios(){
        $validos = DB::table('balance')
        ->join('estadoResultado', 'estadoResultado.anio', '=', 'balance.anio')
        ->select('balance.*', 'estadoResultado.*')
        ->where('balance.idEmpresa','=',Auth::user()->idEmpresa)
        ->where('estadoResultado.idEmpresa','=',Auth::user()->idEmpresa)
        ->pluck('anio');
        $balances = Balance::whereNotIn('anio',$validos)->get();
        $estados = EstadoResultado::whereNotIn('anio',$validos)->get();
        /*$sizes = DB::table('balance')
            ->crossJoin('estadoResultado')
            ->select('balance.anio as anioBalance','estadoResultado.anio as anioEstado')
            ->get();*/
        return view('ratios.calcularRatio',compact('balances','estados','validos'));
    }
    //Razones de liquidez
    public function razonLiquidezCorriente($año,$empresa){
        $porCobrar = Cuenta::where('codigoCuenta','=','1102.04')->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $id = DetalleBalance::where('idBalance','=',$balance->idBalance)->where('idCuenta','=',$porCobrar->idCuenta)->orderBy('idDetalleBalance', 'desc')->first();

        $valores = ['0011'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idDetalleBalance','!=',$id->idDetalleBalance)->where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0021'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $razon = $detalle/$detalle2;     
        return $razon;
    }
    public function razonLiquidezRapida($año,$empresa){
        $porCobrar = Cuenta::where('codigoCuenta','=','1102.04')->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $id = DetalleBalance::where('idBalance','=',$balance->idBalance)->where('idCuenta','=',$porCobrar->idCuenta)->orderBy('idDetalleBalance', 'desc')->first();

        $valores = ['0011'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idDetalleBalance','!=',$id->idDetalleBalance)->where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0021'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['1104'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $inventarios = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = ($detalle-$inventarios)/$detalle2;     
        return $razon;
    }
    public function razonActivoNeto($año,$empresa){
       
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
       
        $valores = ['0011'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0021'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['0010'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $activosTotales = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = ($detalle-$detalle2)/$activosTotales;     
        return $razon;
    }
    public function razonEfectivo($año,$empresa){
        
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
       
        $valores = ['1101'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0021'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['2101','2102','2103','2104','2105','2106','2107','2108','2109','2110','2111','02101','02102','02103'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $activosTotales = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = ($detalle)/$activosTotales;     
        return $razon;
    }
    public function razonMediaIntervalo($año,$empresa){
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
       
        $valores = ['1101'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['01101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['04102','04103','04104','4105','4103'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $activosTotales = DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = ($detalle+$detalle2)/($activosTotales/365);     
        return $razon;
    }
    public function razonCapitalTrabajo($año,$empresa){
        $porCobrar = Cuenta::where('codigoCuenta','=','1102.04')->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $id = DetalleBalance::where('idBalance','=',$balance->idBalance)->where('idCuenta','=',$porCobrar->idCuenta)->orderBy('idDetalleBalance', 'desc')->first();

        $valores = ['0011'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idDetalleBalance','!=',$id->idDetalleBalance)->where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0021'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $razon = $detalle-$detalle2;     
        return $razon;
    }
     //Razones de actividad
    public function razonRotacionInventario($año,$empresa){
        $empresaR = Empresa::where('idEmpresa','=',$empresa)->first();
        $invProm = 0;
        $costo = 0;
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');

        $valores = ['1104'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');

        $detalle = DetalleBalance::whereIn('idCuenta',$cuentas)->whereIn('idBalance',$otroBalances)->sum('saldo');
        $inv = DetalleBalance::whereIn('idCuenta',$cuentas)->where('idBalance','=',$balance->idBalance)->first();
        if(!$inv){
            return $razon = 0;
        }else{
            if($detalle){
                $invProm = ($inv->saldo + $detalle)/2;
            }else{
                $invProm = ($inv->saldo);
            }
            if($empresaR->idTipoEmpresa==1){
                $valores2 = ['04101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }elseif($empresaR->idTipoEmpresa==2){
                $valores2 = ['4101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }
            $razon = $costo/$invProm;
        }
        return $razon;
    }


    public function razonRotacionDiasInventario($año,$empresa){
        $empresaR = Empresa::where('idEmpresa','=',$empresa)->first();
        $invProm = 0;
        $costo = 0;
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $valores = ['1104'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');

        $detalle = DetalleBalance::whereIn('idCuenta',$cuentas)->whereIn('idBalance',$otroBalances)->sum('saldo');
        $inv = DetalleBalance::whereIn('idCuenta',$cuentas)->where('idBalance','=',$balance->idBalance)->first();
        if(!$inv){
            return $razon =0;
        }else{
            if($detalle){
                $invProm = ($inv->saldo + $detalle)/2;
            }else{
                $invProm = ($inv->saldo);
            }
            if($empresaR->idTipoEmpresa==1){
                $valores2 = ['04101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }elseif($empresaR->idTipoEmpresa==2){
                $valores2 = ['4101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }
            $razon = $invProm/($costo/365);
        }
        return $razon;
    }
    public function razonRotacionCobros($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores2 = ['01101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $cobrar = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $detalle = DetalleBalance::where('idCuenta','=',$cuentas2)->whereIn('idBalance',$otroBalances)->sum('saldo');

        if(!$otroBalances->isEmpty()){
            $promCXC = ($detalle + $cobrar)/2;
        }else{
            $promCXC = ($cobrar);
        }
        $razon = $ventas/$promCXC;
        return $razon;
        
    }
    public function razonPeriodoCobranza($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores2 = ['01101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $cobrar = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $detalle = DetalleBalance::where('idCuenta','=',$cuentas2)->whereIn('idBalance',$otroBalances)->sum('saldo');

        if(!$otroBalances->isEmpty()){
            $promCXC = ($detalle + $cobrar)/2;
        }else{
            $promCXC = ($cobrar);
        }
        $razon = ($promCXC*365)/($ventas);
        return $razon;
    }
    public function razonRotacionCuentasPagar($año,$empresa){
        $CxPProm = 0;
        $costo = 0;
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');

        $valores = ['02101'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');

        $detalle = DetalleBalance::whereIn('idCuenta',$cuentas)->whereIn('idBalance',$otroBalances)->sum('saldo');
        $inv = DetalleBalance::whereIn('idCuenta',$cuentas)->where('idBalance','=',$balance->idBalance)->first();

        $detalle = DetalleBalance::whereIn('idCuenta',$cuentas)->whereIn('idBalance',$otroBalances)->sum('saldo');
        $inv = DetalleBalance::whereIn('idCuenta',$cuentas)->where('idBalance','=',$balance->idBalance)->first();
        if(!$inv){
           
            return $razon =0;
        }else{
            if($detalle){
                $CxPProm = ($inv->saldo + $detalle)/2;
            }else{
                $CxPProm = ($inv->saldo);
            }
            if(Auth::user()->empresa->idTipoEmpresa==1){
                $valores2 = ['04101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }elseif(Auth::user()->empresa->idTipoEmpresa==2){
                $valores2 = ['4101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }
            $razon =$costo/$CxPProm;
        }
        return $razon;
    }
    public function razonPeriodoPago($año,$empresa){
        $empresaR = Empresa::where('idEmpresa','=',$empresa)->first();
        $CxPProm = 0;
        $costo = 0;
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');

        $valores = ['02101'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');

        $detalle = DetalleBalance::whereIn('idCuenta',$cuentas)->whereIn('idBalance',$otroBalances)->sum('saldo');
        $inv = DetalleBalance::whereIn('idCuenta',$cuentas)->where('idBalance','=',$balance->idBalance)->first();

        $detalle = DetalleBalance::whereIn('idCuenta',$cuentas)->whereIn('idBalance',$otroBalances)->sum('saldo');
        $inv = DetalleBalance::whereIn('idCuenta',$cuentas)->where('idBalance','=',$balance->idBalance)->first();
        if(!$inv){
           
            return $razon =0;
        }else{
            if($detalle){
                $CxPProm = ($inv->saldo + $detalle)/2;
            }else{
                $CxPProm = ($inv->saldo);
            }
            if($empresaR->idTipoEmpresa==1){
                $valores2 = ['04101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }elseif($empresaR->idTipoEmpresa==2){
                $valores2 = ['4101'];
                $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
                $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
            }
            $razon =(365*$CxPProm)/$costo;
        }
        return $razon;
    }
    public function razonRotacionActivosTotales($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores2 = ['0010'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $cobrar = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $detalle = DetalleBalance::where('idCuenta','=',$cuentas2)->whereIn('idBalance',$otroBalances)->sum('saldo');

        if(!$otroBalances->isEmpty()){
            $promCXC = ($detalle + $cobrar)/2;
        }else{
            $promCXC = ($cobrar);
        }
        $razon = $ventas/$promCXC;
        return $razon;
    }
    public function razonRotacionActivosFijos($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores2 = ['01201'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $cobrar = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $detalle = DetalleBalance::where('idCuenta','=',$cuentas2)->whereIn('idBalance',$otroBalances)->sum('saldo');

        if(!$otroBalances->isEmpty()){
            $promCXC = ($detalle + $cobrar)/2;
        }else{
            $promCXC = ($cobrar);
        }
        $razon = $ventas/$promCXC;
        return $razon;
    }
    public function razonIndiceMargenBruto($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['05101'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $utilidad =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = $utilidad/$ventas;
        return $razon;
    }
    public function razonIndiceMargenOperativo($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['05102'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $utilidad =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = $utilidad/$ventas;
        return $razon;
    }
    public function razonGradoEndeudamiento($año,$empresa){
       
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
       
        $valores = ['0020'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0010'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');
        $razon = $detalle/$detalle2;
        return $razon;
    }
    public function razonGradoPropiedad($año,$empresa){
       
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
       
        $valores = ['0031'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0010'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');
        $razon = $detalle/$detalle2;
        return $razon;
    }
    public function razonEndeudamientoPatrimonial($año,$empresa){
       
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
       
        $valores = ['0031'];
        $cuentas = Cuenta::whereIn('codigoCuenta',$valores)->pluck('idCuenta');
        $detalle = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas)->sum('saldo');

        $valores2 = ['0020'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $detalle2 = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');
        $razon = $detalle2/$detalle;
        return $razon;
    }
    public function razonCoberturaGastosFinancieros($año,$empresa){
       
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['4105'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $gastos =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['05102'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $utilidad =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = ($utilidad+$gastos)/$gastos;
        return $razon;
    }
    public function razonRentabilidadPatrimonio($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['05103'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $utilidad=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores2 = ['0031'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $cobrar = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $detalle = DetalleBalance::where('idCuenta','=',$cuentas2)->whereIn('idBalance',$otroBalances)->sum('saldo');

        if(!$otroBalances->isEmpty()){
            $promCXC = ($detalle + $cobrar)/2;
        }else{
            $promCXC = ($cobrar);
        }
        $razon = $utilidad/$promCXC;
        return $razon;
    }
    public function razonRentabilidadAccion($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['05103'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $utilidad=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

      
        
        $razon = $utilidad/100;
        return $razon;
    }
    public function razonRentabilidadActivo($año,$empresa){
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['05103'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $utilidad=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores2 = ['0010'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $cobrar = DetalleBalance::where('idBalance','=',$balance->idBalance)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $otroBalances = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año-1)->pluck('idBalance');
        $detalle = DetalleBalance::where('idCuenta','=',$cuentas2)->whereIn('idBalance',$otroBalances)->sum('saldo');

        if(!$otroBalances->isEmpty()){
            $promCXC = ($detalle + $cobrar)/2;
        }else{
            $promCXC = ($cobrar);
        }
        $razon = $utilidad/$promCXC;
        return $razon;
    }
    public function razonRentabilidadVentas($año,$empresa){
 
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $gastos =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        $valores3 = ['05103'];
        $cuentas3 = Cuenta::whereIn('codigoCuenta',$valores3)->pluck('idCuenta');
        $utilidad =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas3)->sum('saldo');

        $razon = ($utilidad)/$gastos;
        return $razon;
    }

    public function razonRentabilidadInversion($año,$empresa){
        $empresaR = Empresa::where('idEmpresa','=',$empresa)->first();
        $costo =0;
        $estado = EstadoResultado::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        $balance = Balance::where('idEmpresa','=',$empresa)->where('anio','=',$año)->first();
        
        $valores2 = ['5101'];
        $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
        $ventas=  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');

        if($empresaR->idTipoEmpresa==1){
            $valores2 = ['04101'];
            $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
            $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
        }elseif($empresaR->idTipoEmpresa==2){
            $valores2 = ['4101'];
            $cuentas2 = Cuenta::whereIn('codigoCuenta',$valores2)->pluck('idCuenta');
            $costo =  DetalleEstadoResultado::where('idEstadoResultado','=',$estado->idEstadoResultado)->whereIn('idCuenta',$cuentas2)->sum('saldo');
        }
        $razon = ($ventas-$costo)/$costo;
        return $razon;
    }
    public function calculoRatios(Request $request){
        $idEmpresa = Auth::user()->empresa->idEmpresa;
        foreach($request->aniosRatio as $item){
            DetalleRatio::where('anio', '=', $item)->where('idEmpresa','=',$idEmpresa)->delete();
            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonLiquidezCorriente($item,$idEmpresa);
            $detalleRatio->idRatio = 1;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonLiquidezRapida($item,$idEmpresa);
            $detalleRatio->idRatio = 2;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonActivoNeto($item,$idEmpresa);
            $detalleRatio->idRatio = 3;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonEfectivo($item,$idEmpresa);
            $detalleRatio->idRatio = 4;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonMediaIntervalo($item,$idEmpresa);
            $detalleRatio->idRatio = 5;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonCapitalTrabajo($item,$idEmpresa);
            $detalleRatio->idRatio = 6;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionInventario($item,$idEmpresa);
            $detalleRatio->idRatio = 7;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionDiasInventario($item,$idEmpresa);
            $detalleRatio->idRatio = 8;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionCobros($item,$idEmpresa);
            $detalleRatio->idRatio = 9;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonPeriodoCobranza($item,$idEmpresa);
            $detalleRatio->idRatio = 10;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionCuentasPagar($item,$idEmpresa);
            $detalleRatio->idRatio = 11;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonPeriodoPago($item,$idEmpresa);
            $detalleRatio->idRatio = 12;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionActivosTotales($item,$idEmpresa);
            $detalleRatio->idRatio = 13;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionActivosFijos($item,$idEmpresa);
            $detalleRatio->idRatio = 14;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonIndiceMargenBruto($item,$idEmpresa);
            $detalleRatio->idRatio = 15;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonIndiceMargenOperativo($item,$idEmpresa);
            $detalleRatio->idRatio = 16;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonGradoEndeudamiento($item,$idEmpresa);
            $detalleRatio->idRatio = 17;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonGradoPropiedad($item,$idEmpresa);
            $detalleRatio->idRatio = 18;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonEndeudamientoPatrimonial($item,$idEmpresa);
            $detalleRatio->idRatio = 19;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonCoberturaGastosFinancieros($item,$idEmpresa);
            $detalleRatio->idRatio = 20;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadPatrimonio($item,$idEmpresa);
            $detalleRatio->idRatio = 21;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadAccion($item,$idEmpresa);
            $detalleRatio->idRatio = 22;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadActivo($item,$idEmpresa);
            $detalleRatio->idRatio = 23;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadVentas($item,$idEmpresa);
            $detalleRatio->idRatio = 24;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadInversion($item,$idEmpresa);
            $detalleRatio->idRatio = 25;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();
        }        
        return redirect('ratios/ver');
    }

    public function calcular_Ratios($anio,$empresa){
        $idEmpresa = $empresa;
        $item = $anio;
        DetalleRatio::where('anio', '=', $item)->where('idEmpresa','=',$idEmpresa)->delete();
            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonLiquidezCorriente($item,$idEmpresa);
            $detalleRatio->idRatio = 1;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonLiquidezRapida($item,$idEmpresa);
            $detalleRatio->idRatio = 2;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonActivoNeto($item,$idEmpresa);
            $detalleRatio->idRatio = 3;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonEfectivo($item,$idEmpresa);
            $detalleRatio->idRatio = 4;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonMediaIntervalo($item,$idEmpresa);
            $detalleRatio->idRatio = 5;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonCapitalTrabajo($item,$idEmpresa);
            $detalleRatio->idRatio = 6;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionInventario($item,$idEmpresa);
            $detalleRatio->idRatio = 7;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionDiasInventario($item,$idEmpresa);
            $detalleRatio->idRatio = 8;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionCobros($item,$idEmpresa);
            $detalleRatio->idRatio = 9;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonPeriodoCobranza($item,$idEmpresa);
            $detalleRatio->idRatio = 10;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionCuentasPagar($item,$idEmpresa);
            $detalleRatio->idRatio = 11;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonPeriodoPago($item,$idEmpresa);
            $detalleRatio->idRatio = 12;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionActivosTotales($item,$idEmpresa);
            $detalleRatio->idRatio = 13;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRotacionActivosFijos($item,$idEmpresa);
            $detalleRatio->idRatio = 14;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonIndiceMargenBruto($item,$idEmpresa);
            $detalleRatio->idRatio = 15;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonIndiceMargenOperativo($item,$idEmpresa);
            $detalleRatio->idRatio = 16;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonGradoEndeudamiento($item,$idEmpresa);
            $detalleRatio->idRatio = 17;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonGradoPropiedad($item,$idEmpresa);
            $detalleRatio->idRatio = 18;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonEndeudamientoPatrimonial($item,$idEmpresa);
            $detalleRatio->idRatio = 19;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonCoberturaGastosFinancieros($item,$idEmpresa);
            $detalleRatio->idRatio = 20;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadPatrimonio($item,$idEmpresa);
            $detalleRatio->idRatio = 21;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadAccion($item,$idEmpresa);
            $detalleRatio->idRatio = 22;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadActivo($item,$idEmpresa);
            $detalleRatio->idRatio = 23;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadVentas($item,$idEmpresa);
            $detalleRatio->idRatio = 24;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();

            $detalleRatio = new DetalleRatio();
            $detalleRatio->anio = $item;
            $detalleRatio->valorRatio = $this->razonRentabilidadInversion($item,$idEmpresa);
            $detalleRatio->idRatio = 25;
            $detalleRatio->idEmpresa = $idEmpresa;
            $detalleRatio->idComportamiento = 1;
            $detalleRatio->save();  
    }
    public function probarRatio(){
        return $this->razonRentabilidadInversion(2020,1);
    }
    public function catalogos(){
        $tipoEmpresas=TipoEmpresa::all();
        $empresas = Empresa::all();
        $ratios = Ratio::paginate(8);
        return view('catalogos.inicio', compact('tipoEmpresas','empresas','ratios'));
    }
    public function guardarTipo(Request $request){
        $tipo = TipoEmpresa::where('idTipoEmpresa','=',$request->idTipoEmpresa)->first();
        if($tipo){
            $tipo->nombre = $request->tipoEmpresa;
            $tipo->save();
        }
        else{
            $tipo2 = new TipoEmpresa();
            $tipo2->nombre = $request->tipoEmpresa;
            $tipo2->save();
        }
        return redirect()->back()->with('mensaje',"Guardado exitosamente");
    }

    public function guardarEmpresa(Request $request){
        $tipo = Empresa::where('idEmpresa','=',$request->idEmpresa)->first();
        if($tipo){
            $tipo->nombreEmpresa = $request->empresa;
            $tipo->save();
        }
        else{
            $empresa  = new Empresa();
            $empresa->nombreEmpresa = $request->empresa;
            $empresa->idTipoEmpresa=$request->idTipoEmpresa;
            $empresa->save();
        }
        
        return redirect()->back()->with('mensaje',"Guardado exitosamente");
    }
    public function guardarRatio(Request $request){
        $tipo = Ratio::findOrFail($request->idRatio);
        $tipo->mensajeMalo = $request->mensajeMalo;
        $tipo->mensajeBueno = $request->mensajeBueno;
        $tipo->save();
        return redirect()->back()->with('mensaje',"Guardado exitosamente");
    }

    public function cuentasVariacion(){
        $balances = Balance::where('idEmpresa','=',Auth::user()->idEmpresa)->pluck('idbalance');
        $estados =  EstadoResultado::where('idEmpresa','=',Auth::user()->idEmpresa)->pluck('idEstadoResultado');
        $cuentas1 = DetalleBalance::where('saldo','>',0)->whereIn('idBalance',$balances)->pluck('idCuenta');
        $cuentas2 = DetalleEstadoResultado::where('saldo','>',0)->whereIn('idEstadoResultado',$estados)->pluck('idCuenta');
        $cuentas = Cuenta::where(function ($query) use ($cuentas1,$cuentas2) {
            $query->whereIn('idCuenta',$cuentas1)
            ->orWhereIn('idCuenta',$cuentas2);
        })
        ->get();
        return view('cuentas.variacion',compact('cuentas'));
    }
    public function cuentasVariacionDatos($id){
        $balances = Balance::where('idEmpresa','=',Auth::user()->idEmpresa)->pluck('idbalance');
        $estados =  EstadoResultado::where('idEmpresa','=',Auth::user()->idEmpresa)->pluck('idEstadoResultado');
       
       
        $mensaje = Cuenta::where('idCuenta','=',$id)->first();
        $datos1  = DB::table('detalleBalance')
        ->join('balance','balance.idBalance', '=', 'detalleBalance.idBalance')
        ->where('idCuenta','=',$id)->whereIn('detalleBalance.idBalance',$balances)->orderBy('anio','asc')->get();
        $datos2  = DB::table('detalleEstadoResultado')
        ->join('estadoResultado','estadoResultado.idEstadoResultado', '=', 'detalleEstadoResultado.idEstadoResultado')
        ->where('idCuenta','=',$id)->whereIn('detalleEstadoResultado.idEstadoResultado',$estados)->orderBy('anio','asc')->get();
        
        if(!$datos1->isEmpty()){
          
            return response()->json([
                'detalles' => ($datos1),
                'mensaje' => ($mensaje->nombreCuenta),
            ]);
        }
        if(!$datos2->isEmpty()){
            return response()->json([
                'detalles' => ($datos2),
                'mensaje' => ($mensaje->nombreCuenta),
            ]);
        }
    }
    public function analisisInicio(){
       
       
        $empresaMia  = DB::table('balance')
        ->join('estadoResultado', function ($join) {
            $join->on('balance.anio', '=', 'estadoResultado.anio')
            ->On('balance.idEmpresa', '=', 'estadoResultado.idEmpresa');
        })
        ->join('empresa','balance.idEmpresa','=','empresa.idEmpresa')
        ->where('empresa.idEmpresa','=',Auth::user()->idEmpresa)
        ->get();
        $modelo = Empresa::first();
        return view('analisis.inicio',compact('modelo','empresaMia'));
    }
    public function analisisDatos( $anios){
        $anios = json_decode($anios);
        if(count($anios)<2){
            return view('analisis.error')->with('error',"Error");
        }
        $balances = Balance::whereIn('anio',$anios)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio','asc')->get();
        $estados = EstadoResultado::whereIn('anio',$anios)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio','asc')->get();
        $balancesids = Balance::whereIn('anio',$anios)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio','asc')->pluck('idBalance');
        $estadosids = EstadoResultado::whereIn('anio',$anios)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio','asc')->pluck('idEstadoResultado');
        
        $detalleBalances = DetalleBalance::whereIn('idBalance',$balancesids)->get();
        $detalleEstados = DetalleEstadoResultado::whereIn('idEstadoResultado',$estadosids)->get();
        $detalleBalancesids = DetalleBalance::whereIn('idBalance',$balancesids)->pluck('idCuenta');
        $detalleEstadosids = DetalleEstadoResultado::whereIn('idEstadoResultado',$estadosids)->pluck('idCuenta');
        $cuentasBalance = Cuenta::whereIn('idCuenta',$detalleBalancesids)->get();
        $cuentasEstado = Cuenta::whereIn('idCuenta',$detalleEstadosids)->get();
        
        $modeloBalance = Balance::first();
        $modeloEstado = EstadoResultado::first();

        return view('analisis.analisis',compact('balances','estados','cuentasBalance','cuentasEstado','anios','modeloBalance','modeloEstado'));
    }
    
    public function catalogoSubir(){
        return view('cuentas.subirCatalogo');
    }
    public function guardarCatalogo(Request $request){
        $empresa = Empresa::where('idEmpresa','=',Auth::user()->idEmpresa)->first();
        if($empresa->catalogo==0){
            $empresa->catalogo = 1;
            $empresa->save();
        }
        else{
            return redirect()->back()->with('error',"Esta empresa ya tiene un catalogo de cuentas ingresado");
        }
        return redirect()->back()->with('mensaje',"Guardado exitosamente");
    }
    public function permisosUsuario(){
        return view('permiso.index');
    }
    public function permisosData(){
        $usuarios = User::where('id','!=',Auth::user()->id)->get();
        $opciones = OpcionCrud::all();
        return view('permiso.tabla',compact('usuarios','opciones'));
    }
    public function permisosModificar(Request $request){

        $acceso = AccesoUsuario::where('idOpcion','=', $request->idOpcion)->where('idUsuario','=',$request->idUsuario)->first();
        if($acceso){
            $acceso->delete();
        }else{
            AccesoUsuario::create([
                'idOpcion'=>$request->idOpcion,
                'idUsuario'=>$request->idUsuario,
            ]);
        }
    }
}

