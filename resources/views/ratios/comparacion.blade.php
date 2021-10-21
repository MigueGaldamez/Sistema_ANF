
<h2>Comparacion del año {{$anio}} 
</h2>
<h4>
Entre <span class="text-muted"> Mi empresa </span> 
<span class="badge bg-danger">{{Auth::user()->empresa->nombreEmpresa}} </span>
y
<span class="badge bg-danger">{{$empresaOtra->nombreEmpresa}}</span>
</h4>
<table class="table table-sm table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Ratios</th>
            <th class="text-center">{{Auth::user()->empresa->nombreEmpresa}} - Mi Empresa</th>
            <th class="text-center">{{$empresaOtra->nombreEmpresa}}</th>
            <th class="text-center">Resultado</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($ratiosNombres as $ratio)
        <tr>
            <td>{{$ratio->nombreRatio}}</td>
            @php
                $mia = $ratio->detallesRatioParticular(Auth::user()->idEmpresa,$anio)->valorRatio;
                $otra = $ratio->detallesRatioParticular($empresaOtra->idEmpresa,$anio)->valorRatio;
            @endphp
            @if($mia == 0 || $otra ==0)
                <td class="text-center"colspan="3" >No Aplica</td>
               
                
            @else
                @if ($ratio->evaluacion == 1)
                    
                    @if ($mia > $otra)
                        <td class="text-center"><b> {{number_format($mia, 2, '.', ',');}}</b></td>
                        <td class="text-center">{{number_format($otra, 2, '.', ',');}}</td>
                        <td class="text-center">Mi empresa, <b class="text-success"> {{$ratio->mensajeBueno}}</b></td>
                    @elseif($mia == $otra)
                        <td class="text-center"> {{number_format($mia, 2, '.', ',');}}</td>
                        <td class="text-center"> {{number_format($otra, 2, '.', ',');}}</td>
                        <td class="text-center text-dark"><b>Estamos iguales</b></td>
                    @elseif($mia<$otra)    
                        <td class="text-center">{{number_format($mia, 2, '.', ',');}}</td>
                        <td class="text-center"><b> {{number_format($otra, 2, '.', ',');}}</b></td>
                        <td class="text-center">Mi empresa, <b class="text-danger"> {{$ratio->mensajeMalo}}</b></td>
                    @endif
                    
                @elseif ($ratio->evaluacion == 2)
                     @if ($mia < $otra)
                        <td class="text-center"> {{number_format($mia, 2, '.', ',');}}</td>
                        <td class="text-center"><b> {{number_format($otra, 2, '.', ',');}}</b></td>
                        <td class="text-center">Mi empresa, <b class="text-success"> {{$ratio->mensajeBueno}}</b></td>
                    @elseif($mia == $otra)
                        <td class="text-center"><b> {{number_format($mia, 2, '.', ',');}}</b></td>
                        <td class="text-center"><b> {{number_format($otra, 2, '.', ',');}}</b></td>
                        <td class="text-center text-dark"><b>Estamos iguales</b></td>
                    @elseif($mia > $otra)    
                        <td class="text-center"><b>{{number_format($mia, 2, '.', ',');}}</b></td>
                        <td class="text-center">{{number_format($otra, 2, '.', ',');}}</td>
                        <td class="text-center">Mi empresa, <b class="text-danger"> {{$ratio->mensajeMalo}}</b></td>
                    @endif
                
                @endif
            @endif
        </tr>
        @endforeach
        
        
    </tbody>
</table>