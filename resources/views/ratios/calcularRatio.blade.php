@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col card shadow mx-2 p-4">
            <div class="row">
                <h2 class="mb-0">Calcular Ratios</h2>
                <h5 class="mt-0">De la empresa  <span class="badge bg-primary">{{Auth::user()->empresa->nombreEmpresa}}</span></h5>
                <div class="col col-6 mt-2">
                    <form class="form-inline" method="post" action="{{route('ratios.calculo')}}" enctype="multipart/form-data">
                      @csrf
                    
                    <div class="card py-2 px-4">
                        <h5 class="card-title">Calcular Ratios</h5>
                        <h6> Se muestra a continuacion un detalle de los años disponibles para calcular los ratios</h6>    
                            @php
                                $contador = 0;
                            @endphp
                            
                            <div class="d-inline">
                             @foreach ($validos as $elemento)
                                {{--<div class="form-check">--}}
                                    <input class="form-check-input" type="checkbox" value=" {{$elemento}}" id="aniosRatio[]" name="aniosRatio[]">
                                    <label class="form-check-label" for="aniosRatio[]">
                                            {{$elemento}}
                                        @php
                                             $contador++;
                                        @endphp
                                    </label>
                                {{--</div>--}}
                            @endforeach
                            </div>
                            @if ($contador<1)
                                <span class="text-danger">Error, no hay estados financieros en el sistema</span>
                            @else
                                <span><button class="btn btn-success btn-sm text-light" type="submit">Calcular</button></span>
                            @endif              
                        </div>
                    </form>
                </div>
                
                @if (!$balances->isEmpty()||!$estados->isEmpty())
                     <div class="col col-12 mb-2 mt-4">
                        <h3 class="mb-0">Problemas Encontrados</h3>
                        <div class="titulohr w-25 mt-0"></div>
                    </div>
                @endif

                <div class="col col-lg-6 col-md-6">  
                    @foreach ($balances as $balance)
                        <div class="callout callout-danger my-1 py-2">
                            <h4>Estado Financiero Faltante</h4>
                            El año <b>{{$balance->anio}}</b> no tiene un estado de Resultados ingresado.<br>
                            <a href="{{route('importar.balance')}}">Registrar</a>
                        </div>
                    @endforeach
                </div>
                <div class="col col-lg-6 col-md-6">
                    @foreach ($estados as $estado)
                        <div class="callout callout-danger my-1 py-2">
                            <h4>Estado Financiero Faltante</h4>
                            El año <b>{{$estado->anio}}</b> no tiene un Balance general ingresado.<br>
                            <a href="{{route('importar.balance')}}">Registrar</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>     
    </div>
</div>
@endsection