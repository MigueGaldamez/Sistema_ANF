@extends('layouts.backend')
@section('content')
<div class="container mt-4 ">
    <div class="row">
        <div class="card shadow">
            <div class="card-body ">
                <h1>Ver estados Financieros de <b>{{Auth::user()->empresa->nombreEmpresa}}</b></h1>
                <h4>Tipo de empresa: <span class="badge bg-primary">{{Auth::user()->empresa->tipoEmpresa->nombre}}</span></h4>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="balances-tab" data-bs-toggle="tab" data-bs-target="#balances" type="button" role="tab" aria-controls="balances" aria-selected="true">Lista de Balances Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="estados-tab" data-bs-toggle="tab" data-bs-target="#estados" type="button" role="tab" aria-controls="estados" aria-selected="false">Lista de Estados de Resultados</button>
                    </li>
                 
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="balances" role="tabpanel" aria-labelledby="balances-tab"> 
                        <h4 class="mt-2">Balances</h4>
                            @if ($balances->isEmpty())
                                <div class="callout callout-danger my-1 py-2">
                                    <h4>No hay registros en el sistema</h4>
                                    No hay estados financieros en el sistema.<br>
                                    <a href="{{route('importar.balance')}}">Registrar?</a>
                                </div>
                            @endif
                          <div class="accordion" id="accordionExample">
                             
                            @foreach ($balances as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$item->idBalance}}" aria-expanded="true" aria-controls="collapseOne-{{$item->idBalance}}">
                                    {{$item->anio}}
                                </button>
                                </h2>
                               
                                <div id="collapseOne-{{$item->idBalance}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <table class="table table-responsive table-sm table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                        
                                            <th scope="col">Cuenta</th>
                                            <th class="text-center" scope="col">Debe</th>
                                            <th class="text-center" scope="col">Haber</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $debe = 0;
                                            $haber = 0; 
                                        @endphp
                                            @foreach ($item->detallesBalance as $elemento)
                                            <tr>
                                                @if($elemento->saldo==0)
                                                    <td colspan="3"><b>{{$elemento->cuenta->nombreCuenta}}<b></td>
                                                @else
                                                    <td>{{$elemento->cuenta->nombreCuenta}}</td>

                                                    @if($elemento->cuenta->naturaleza==1)
                                                        
                                                        <td class="text-center">{{number_format($elemento->saldo, 2, '.', ',');}}</td>
                                                    <td class="text-center">-</td>
                                                        @if (!$elemento->cuenta->clase==3)
                                                            @php
                                                                $debe = $debe+ $elemento->saldo;
                                                            @endphp
                                                        @endif
                                                       
                                                    @endif
                                                    @if($elemento->cuenta->naturaleza==2)
                                                        <td class="text-center">-</td>
                                                        <td class="text-center">{{number_format($elemento->saldo, 2, '.', ',');}}</td>
                                                        
                                                        @if (!$elemento->cuenta->clase==3)
                                                        @php
                                                            $haber = $haber+ $elemento->saldo;
                                                        @endphp
                                                        @endif
                                                    @endif
                                                @endif
                                                
                                                
                                            </tr>
                                            @endforeach
                                        
                                            
                                            
                                            <tr>
                                            @php
                                                $debe = number_format($debe, 2, '.', ',');;
                                                $haber = number_format($haber, 2, '.', ','); 
                                            @endphp
                                            <th scope="col" >S U M A</th>
                                            <th scope="col" class="text-center"><b>{{$debe}}</b></th>
                                            <th scope="col" class="text-center"><b>{{$haber}}</b></th>
                                            </tr>
                                            
                                        
                                        </tbody>
                                    </table>
                            
                                
                                </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                    {{--Fin de Balance--}}
                    <div class="tab-pane fade" id="estados" role="tabpanel" aria-labelledby="estados-tab"> 
                        <h4 class="mt-2">Estado de Resultados</h4>
                        @if ($estados->isEmpty())
                                <div class="callout callout-danger my-1 py-2">
                                    <h4>No hay registros en el sistema</h4>
                                    No hay estados financieros en el sistema.<br>
                                    <a href="{{route('importar.balance')}}">Registrar?</a>
                                </div>
                            @endif
                          <div class="accordion" id="accordionEstados">
                            @foreach ($estados as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="estadosHeader-{{$item->idEstadoResultado}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Estados-{{$item->idEstadoResultado}}" aria-expanded="true" aria-controls="Estados-{{$item->idEstadoResultado}}">
                                    {{$item->anio}}
                                </button>
                                </h2>
                                <div id="Estados-{{$item->idEstadoResultado}}" class="accordion-collapse collapse" aria-labelledby="estadosHeader-{{$item->idEstadoResultado}}" data-bs-parent="#accordionEstados">
                                <div class="accordion-body">

                                    <table class="table table-responsive table-sm table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                        
                                            <th scope="col">Cuenta</th>
                                            <th class="text-center" scope="col">Saldo</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $debe = 0;
                                            $haber = 0; 
                                        @endphp
                                            @foreach ($item->detallesEstadoResultado as $elemento)
                                            <tr>
                                                @if($elemento->saldo==0)
                                                    <td colspan="2"><b>{{$elemento->cuenta->nombreCuenta}}<b></td>
                                                @else                                                    
                                                    @if($elemento->cuenta->idCuenta==384)    
                                                        <th>{{$elemento->cuenta->nombreCuenta}}</th>  
                                                                                                         
                                                        <th class="text-center">{{number_format($elemento->saldo, 2, '.', ',');}}</th>                                                                                                                                                  
                                                    @else
                                                        <td>{{$elemento->cuenta->nombreCuenta}}</td>                                                   
                                                        <td class="text-center">{{number_format($elemento->saldo, 2, '.', ',');}}</td>   
                                                    @endif                                                   
                                                @endif                                                                                  
                                            </tr>
                                            @endforeach
                                        
                                        </tbody>
                                    </table>
                            
                                
                                </div>
                                </div>
                            </div>
                            @endforeach
                            </div>                  
                </div>
               

              
            </div>
        </div>
    </div>
</div>
@endsection