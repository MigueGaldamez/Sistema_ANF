
@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col col-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card shadow mx-2 p-4">
                <h2 class="mb-0">Ver variacion de cuentas</h2>
                <h5 class="mt-0">De la empresa: <span class="badge bg-primary">{{Auth::user()->empresa->nombreEmpresa}}</span></h5>
                @if($cuentas->isEmpty())   
                     <h4 class="text-danger"><b>Alerta</b> No hay datos</h4>
                @endif           
                <div class="col-4">
                    <select class="form-select" aria-label="Default select example" id="seleccionarCuenta"  @if($cuentas->isEmpty()) disabled  @endif  >
                        <option selected>Selecciona una cuenta</option>
                        @foreach ($cuentas as $cuenta)
                            <option value="{{$cuenta->idCuenta}}">{{$cuenta->nombreCuenta}}</option>
                        @endforeach
                    </select>
                </div>

                <span class="mt-2"><button class="btn btn-success" type="button"  onClick="variacion()"  @if($cuentas->isEmpty()) disabled  @endif>Generar grafico</button></span> 
               
                <canvas id="graficoCuentas"  height="215" width="700"></canvas>
            </div>
          
        </div>
         
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){       
       
    });


    function variacion() {
        
        var valor = $('#seleccionarCuenta').val();
     
        obtenerDatosGraficoCuenta(valor);
    }
     let myChart;
    function renderizarGraficoCuentas(datos,labels,div,mensajes) {
        var ctx = document.getElementById(div).getContext('2d');
         if (myChart) {
            myChart.destroy();
        }
         myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: mensajes,
                    data: datos,
                        backgroundColor: [                    
                            'rgba(0,110,144, 0.5)',                     
                        ],
                    borderColor: [
                        'rgba(0,110,144, 1)',                   
                    ],
                    borderWidth: 3,
                },]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true                        
                        }
                    }]
                },
                title: {
                    display: true,
                    text:mensajes
                },
            }
        });
        
    }
    function obtenerDatosGraficoCuenta(id) {   
    $.ajax({
        url: '/cuentas/variacion/datos/'+id,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        dataType: 'json',
        success: function (data) {

            //console.log(data);
            var titulos = [];
            var datos = [];    
           
            
            for (var i in data.detalles) {
                datos.push(data.detalles[i].saldo);
                titulos.push(data.detalles[i].anio);
            }
            console.log(titulos);
            mensaje = data.mensaje;
            div = "graficoCuentas";
            renderizarGraficoCuentas(datos, titulos,div,mensaje);  
           
        },
        error: function (data) {

            console.log(data);
        }
    });

}
    
</script>   
@endsection