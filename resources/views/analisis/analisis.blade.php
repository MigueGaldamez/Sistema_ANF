<div class="card shadow mx-2 p-4 my-2">
    
    <table class="table table-sm table-hover table-striped table-bordered text-center">
        <thead >
            @php
                $contador = 1;
            @endphp
            @foreach ($anios as $anio)
                @php
                    $contador += 1;
                @endphp
            @endforeach
            <tr>
                <th colspan="100%" class="tabla-acentuada"><h2>{{Auth::user()->empresa->nombreEmpresa}}</h2></th>       
            
            </tr>
            <tr>
                <th colspan="{{$contador}}">Balance General</th>       
                <th colspan="{{($contador-2)*2}}">Analisis Horizontal </th>
                <th colspan="{{($contador-1)}}">Analisis Vertical </th>
            </tr>
            <tr>
                <th colspan="{{$contador}}">Al 31 de diciembre (expresado en dolares)</th>       
                <th colspan="{{$contador-2}}">Variacion Absoluta </th>
                <th colspan="{{$contador-2}}">Variacion Relativa</th>
                  <th colspan="{{($contador-1)}}"></th>
            </tr>
            <tr>           
                <th class="text-start" >Cuentas</th>
                @foreach ($anios as $anio)
                    <th>{{$anio}}</th>
                @endforeach
                @foreach ($anios as $anio)
                    @if($modeloBalance->anterior($anio,Auth::user()->idEmpresa))                  
                        <th>{{$anio-1}} al {{$anio}} </th>                
                    @endif  
                @endforeach
                @foreach ($anios as $anio)
                    @if($modeloBalance->anterior($anio,Auth::user()->idEmpresa))                  
                        <th>{{$anio-1}} al {{$anio}} </th>                
                    @endif  
                @endforeach
                @foreach ($anios as $anio)
                    <th>{{$anio}}</th>
                @endforeach
            <tr>
        </thead>
        <tbody>
            
            @foreach ($cuentasBalance as $cuenta)
             <tr>
                @php
                    $cuenta0 = false;
                    $tieneAnterior = false;
                @endphp
                @foreach ($anios as $anio)         

                    @if ($cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo==0)
                        @php
                            $cuenta0 = true;
                        @endphp
                    @endif  
                    
                @endforeach  
                @if ($cuenta0)
                    <td colspan="100%" class="text-start"><b>{{$cuenta->nombreCuenta}}</b></td>
                @else
                    <td class="text-start">{{$cuenta->nombreCuenta}}</td>
                @endif

                @foreach ($anios as $anio)

                    @php
                        @$actual = $cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo;                  
                    @endphp
                    @if($actual == 0)
                     
                    @else
                        <td>{{$actual}}</td>  
                    @endif
                @endforeach
                @foreach ($anios as $anio)
                     @php
                        @$actual = $cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo;
                        @$anterior = $cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio-1)->saldo;
                    @endphp
                        @if ($anterior!=0 && $anterior !=null  )
                            <td>{{$actual - $anterior}}</td>
                           
                        @endif    
                @endforeach
                   @foreach ($anios as $anio)
                     @php
                        @$actual = $cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo;
                        @$anterior = $cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio-1)->saldo;
                    @endphp
                        @if ($anterior!=0 && $anterior !=null  )
                          
                            <td>{{number_format((($actual - $anterior)/$anterior), 2, '.', ',');}}</td>  
                        @endif    
                @endforeach
                @foreach ($anios as $anio)

                    @php
                        @$activo = $modeloBalance->activoAnio($anio,Auth::user()->idEmpresa)->saldo;
                        @$pasivo = $modeloBalance->pasivoAnio($anio,Auth::user()->idEmpresa)->saldo;
                        @$actual = $cuenta->saldoBalanceAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio);
                      
                    @endphp
                    @if($actual->saldo != 0)                   
                        @if($cuenta->naturaleza == 1)
                        <td>{{number_format((($actual->saldo/$activo*100)), 2, '.', ',');}} %</td>
                        @endif
                         @if($cuenta->naturaleza == 2)
                        <td>{{number_format((($actual->saldo/$pasivo*100)), 2, '.', ',');}} %</td>
                        @endif
                    @endif
                @endforeach
            </tr>
            @endforeach  
        </tbody>
    </table>
</div>
<div class="card shadow mx-2 p-4 my-2">

   
    <table class="table table-sm table-hover table-striped table-bordered text-center">
        <thead >
            @php
                $contador = 1;
            @endphp
            @foreach ($anios as $anio)
                @php
                    $contador += 1;
                @endphp
            @endforeach
            <tr>
                <th colspan="100%" class="tabla-acentuada"><h2>{{Auth::user()->empresa->nombreEmpresa}}</h2></th>       
            
            </tr>
            <tr>
                <th colspan="{{$contador}}">Estado de Resultados</th>       
                <th colspan="{{($contador-2)*2}}">Analisis Horizontal </th>
                <th colspan="{{($contador-1)}}">Analisis Vertical </th>
            </tr>
            <tr>
                <th colspan="{{$contador}}">Al 31 de diciembre (expresado en dolares)</th>       
                <th colspan="{{$contador-2}}">Variacion Absoluta </th>
                <th colspan="{{$contador-2}}">Variacion Relativa</th>
                 <th colspan="{{($contador-1)}}"></th>
            </tr>
            <tr>           
                <th class="text-start" >Cuentas</th>
                @foreach ($anios as $anio)
                    <th>{{$anio}}</th>
                @endforeach
                @foreach ($anios as $anio)
                    @if($modeloEstado->anterior($anio,Auth::user()->idEmpresa))                  
                        <th>{{$anio-1}} al {{$anio}} </th>                
                    @endif  
                @endforeach
                @foreach ($anios as $anio)
                    @if($modeloEstado->anterior($anio,Auth::user()->idEmpresa))                  
                        <th>{{$anio-1}} al {{$anio}} </th>                
                    @endif  
                @endforeach
                @foreach ($anios as $anio)
                    <th>{{$anio}}</th>
                @endforeach
            <tr>
        </thead>
        <tbody>
            
            @foreach ($cuentasEstado as $cuenta)
            <tr>
                @php
                    $cuenta0 = false;
                    $tieneAnterior = false;
                @endphp
                @foreach ($anios as $anio)         

                    @if ($cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo==0)
                        @php
                            $cuenta0 = true;
                        @endphp
                    @endif  
                    
                @endforeach  
                @if ($cuenta0)
                    <td colspan="100%" class="text-start"><b>{{$cuenta->nombreCuenta}}</b></td>
                @else
                    <td class="text-start">{{$cuenta->nombreCuenta}}</td>
                @endif

                @foreach ($anios as $anio)

                    @php
                        @$actual = $cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo;                  
                    @endphp
                    @if($actual == 0)
                     
                    @else
                        <td>{{$actual}}</td>  
                    @endif
                @endforeach
                @foreach ($anios as $anio)
                     @php
                        @$actual = $cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo;
                        @$anterior = $cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio-1)->saldo;
                    @endphp
                        @if ($anterior!=0 && $anterior !=null  )
                            <td>{{$actual - $anterior}}</td>
                           
                        @endif    
                @endforeach
                   @foreach ($anios as $anio)
                     @php
                        @$actual = $cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio)->saldo;
                        @$anterior = $cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio-1)->saldo;
                    @endphp
                        @if ($anterior!=0 && $anterior !=null  )
                          
                            <td>{{number_format((($actual - $anterior)/$anterior), 2, '.', ',');}}</td>  
                        @endif    
                @endforeach
                  @foreach ($anios as $anio)

                    @php
                       
                        @$ventas = $modeloEstado->ventasAnio($anio,Auth::user()->idEmpresa)->saldo;
                        @$actual = $cuenta->saldoEstadoAnio($cuenta->idCuenta,Auth::user()->idEmpresa,$anio);
                      
                    @endphp
                    @if($actual->saldo != 0)                   
                      
                        <td>{{number_format((($actual->saldo/$ventas*100)), 2, '.', ',');}} %</td>
                       
                    @endif
                @endforeach
            </tr>
            @endforeach  
        </tbody>
    </table>
</div>