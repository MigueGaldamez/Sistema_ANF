<?php

namespace App\Http\Controllers;

use App\Models\DetalleRatio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GraficosController extends Controller
{
    //
    public function probarGrafico(){
        $detalles = DetalleRatio::where('idRatio','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->get();
        return $detalles;
    }
    public function graficoRatio1(){
        $detalles1 = DetalleRatio::where('idRatio','=',1)->where('idComportamiento','=',1)->where('valorRatio','!=',404)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles2 = DetalleRatio::where('idRatio','=',2)->where('idComportamiento','=',1)->where('valorRatio','!=',404)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles3 = DetalleRatio::where('idRatio','=',3)->where('idComportamiento','=',1)->where('valorRatio','!=',404)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles4 = DetalleRatio::where('idRatio','=',4)->where('idComportamiento','=',1)->where('valorRatio','!=',404)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles5 = DetalleRatio::where('idRatio','=',5)->where('idComportamiento','=',1)->where('valorRatio','!=',404)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles6 = DetalleRatio::where('idRatio','=',6)->where('idComportamiento','=',1)->where('valorRatio','!=',404)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        return response()->json([
            'detalles1' => ($detalles1),
            'detalles2' => ($detalles2),
            'detalles3' => ($detalles3),
            'detalles4' => ($detalles4),
            'detalles5' => ($detalles5),
            'detalles6' => ($detalles6)
        ]); 
    }

    public function graficoRatio2(){
        $detalles1 = DetalleRatio::where('idRatio','=',7)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles2 = DetalleRatio::where('idRatio','=',8)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles3 = DetalleRatio::where('idRatio','=',9)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles4 = DetalleRatio::where('idRatio','=',10)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles5 = DetalleRatio::where('idRatio','=',11)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles6 = DetalleRatio::where('idRatio','=',12)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles7 = DetalleRatio::where('idRatio','=',13)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles8 = DetalleRatio::where('idRatio','=',14)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles9 = DetalleRatio::where('idRatio','=',15)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles10 = DetalleRatio::where('idRatio','=',16)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        return response()->json([
            'detalles1' => ($detalles1),
            'detalles2' => ($detalles2),
            'detalles3' => ($detalles3),
            'detalles4' => ($detalles4),
            'detalles5' => ($detalles5),
            'detalles6' => ($detalles6),
            'detalles7' => ($detalles7),
            'detalles8' => ($detalles8),
            'detalles9' => ($detalles9),
            'detalles10' => ($detalles10),
            
        ]); 
    }
    public function graficoRatio3(){
        $detalles1 = DetalleRatio::where('idRatio','=',17)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles2 = DetalleRatio::where('idRatio','=',18)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles3 = DetalleRatio::where('idRatio','=',19)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles4 = DetalleRatio::where('idRatio','=',20)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
         return response()->json([
            'detalles1' => ($detalles1),
            'detalles2' => ($detalles2),
            'detalles3' => ($detalles3),
            'detalles4' => ($detalles4),      
        ]); 
    }
    public function graficoRatio4(){
        $detalles1 = DetalleRatio::where('idRatio','=',7)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles2 = DetalleRatio::where('idRatio','=',8)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles3 = DetalleRatio::where('idRatio','=',9)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles4 = DetalleRatio::where('idRatio','=',10)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        $detalles5 = DetalleRatio::where('idRatio','=',11)->where('idComportamiento','=',1)->where('idEmpresa','=',Auth::user()->idEmpresa)->orderBy('anio')->get();
        return response()->json([
            'detalles1' => ($detalles1),
            'detalles2' => ($detalles2),
            'detalles3' => ($detalles3),
            'detalles4' => ($detalles4),
            'detalles5' => ($detalles5),            
        ]); 
    }
    
}
