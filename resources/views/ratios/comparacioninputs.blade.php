<table class="table table-sm table-striped table-responsive table-hover">
    <thead class="table-dark">
        <tr>
            <th>Ratio</th>
            <th>{{$anio}}</th>
            <th>Datos de prueba</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ratiosNombres as $ratio)
        <tr>
            @php
                    $valor =$ratio->detallesRatioParticular(Auth::user()->idEmpresa,$anio)->valorRatio;
            @endphp
            <td>{{$ratio->nombreRatio}}</td>
            
            @if ($valor == 0)
                <td colspan="3">
               
                 <b>No Aplica<b>
                </td>
            
            @else
                <td>
                
                    {{$valor}}
                </td>
                <td>
                    <input class="form-control ingreso" max="{{$ratio->valorMax}}" min="{{$ratio->valorMin}}" type="number" name="ratio-{{$ratio->idRatio}}" id="ratio-{{$ratio->idRatio}}" onkeyup="responder({{$ratio->idRatio}},{{$valor}},{{$ratio->evaluacion}})">
                </td>
                <td>
                <b> <span id="respuesta-{{$ratio->idRatio}}"></span></b>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        
        
    });
    function responder(ratio,valor,evaluacion){
        var url = 'ratio-:ratio';
        url = url.replace(':ratio', ratio);
        var respuesta = '#respuesta-:ratio';
        respuesta = respuesta.replace(':ratio', ratio);
        var valorIngresado = document.getElementById(url);
        if(evaluacion == 1){
            if(valorIngresado.value>valor){
            $(respuesta).text("En comparacion Andamos Mal").addClass("text-danger").removeClass("text-success");
            }else{
                $(respuesta).text("En comparacion Andamos Bien").addClass("text-success").removeClass("text-danger");
            }
        }
         if(evaluacion == 2){
            if(valorIngresado.value<valor){
            $(respuesta).text("En comparacion Andamos Mal").addClass("text-danger").removeClass("text-success");
            }else{
                $(respuesta).text("En comparacion Andamos Bien").addClass("text-success").removeClass("text-danger");
            }
        }
        
    }
</script>