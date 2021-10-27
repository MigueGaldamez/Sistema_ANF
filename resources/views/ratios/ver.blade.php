@extends('layouts.backend')
@section('content')
<script src="{{ asset('js/graficos.js') }}" defer></script>
<div class="container mt-4 ">
    <div class="row">
        <div class="card shadow mb-4 p-4">
            <div class="card-body ">
                <h1>Ver Ratios financieros de <b>{{Auth::user()->empresa->nombreEmpresa}}</b></h1>
                <h4>Tipo de empresa: <span class="badge bg-primary">{{Auth::user()->empresa->tipoEmpresa->nombre}}</span></h4>
                @if($anios->isEmpty())
                    <h4 class="text-danger"><b>Alerta</b> No hay datos</h4>
                @endif
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="balances-tab" data-bs-toggle="tab" data-bs-target="#balances" type="button" role="tab" aria-controls="balances" aria-selected="true">Razones de liquidez</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="estados-tab" data-bs-toggle="tab" data-bs-target="#estados" type="button" role="tab" aria-controls="estados" aria-selected="false">Razones de actividad</button>
                    </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tipo3-tabH" data-bs-toggle="tab" data-bs-target="#tipo3-tab" type="button" role="tab" aria-controls="tipo3-tab" aria-selected="false">Razones de endeudamiento</button>
                    </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tipo4-tabH" data-bs-toggle="tab" data-bs-target="#tipo4-tab" type="button" role="tab" aria-controls="tipo4-tab" aria-selected="false">Razones de rentabilidad</button>
                    </li>
                 
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="balances" role="tabpanel" aria-labelledby="balances-tab"> 
                        <div class="accordion mt-4" id="accordionUno">
                            @if(!$anios->isEmpty())                
                            <h2>Historico</h2>
                             <table class="table table-sm table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Ratio</th>
                                        
                                        @foreach ($anios as $record)
                                            <th class="text-center">{{$record}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%"><b>Razones de liquidez   </b></td>
                                    </tr>
                                    @foreach ($ratiosNombres1 as $record)
                                
                                    <tr>                                                                          
                                        <td>{{$record->nombreRatio}}</td>
                                        @foreach ($record->detallesRatiosE(Auth::user()->idEmpresa) as $item)  
                                            
                                            @if ($item->valorRatio==0)
                                                 <td class="text-warning text-center text-dark"><b>No Aplica</b></td>
                                            @else                              
                                                @if ($item->anteriorValor($item))                                
                                                @if($item->ratio->evaluacion==1)
                                                        @if ($item->anteriorValor($item)->valorRatio > $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif
                                                    @elseif ($item->ratio->evaluacion==2)
                                                        @if ($item->anteriorValor($item)->valorRatio < $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif                                                      
                                                    @endif
                                                @else
                                                    <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                @endif
                                            @endif                                                                                
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                            <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#grafico1">
                               Ver Grafico
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="grafico1" tabindex="-1" aria-labelledby="grafico1Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Grafico de las razones de liquidez</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <canvas id="graficoRatio1"  height="250" width="700"></canvas>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Entendido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin modal-->
                            <h2>Ver detalles</h2>
                            {{--INICIO--}}
                            <div class="d-flex align-items-start mb-4">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="inicio-1-tab" data-bs-toggle="pill" data-bs-target="#inicio-1" type="button" role="tab" aria-controls="inicio-1" aria-selected="true">Inicio</button>

                                    @foreach ($aniosR as $record)
                                        <button class="nav-link" id="tab-{{$record}}-1" data-bs-toggle="pill" data-bs-target="#c-{{$record}}-1" type="button" role="tab" aria-controls="c-{{$record}}-1" aria-selected="false">{{$record}}</button>
                                    @endforeach
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="inicio-1" role="tabpanel" aria-labelledby="inicio-1-tab">
                                        <div class="card card-body">
                                            <h6 class="">Consultar detalle de las Razones de liquidez</h6>
                                            <h6>De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                        </div>
                                    </div>
                                    
                                    @foreach ($aniosR as $record)
                                        <div class="tab-pane fade" id="c-{{$record}}-1" role="tabpanel" aria-labelledby="tab-{{$record}}-1">
                                            <div class="card card-body">
                                            <h6 class="">Detalle de las Razones de liquidez del año <b>{{$record}} </b></h6>
                                            <h6 class="mb-4">De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                            @php
                                                $datos1 =$modelo->registros($record,1,Auth::user()->idEmpresa);
                                            @endphp
                                            <ul>
                                            @foreach ($datos1 as $elemento)
                                                <li><p> <b>-</b>
                                                {{$elemento->ratio->nombreRatio}}: <span class="badge bg-primary">{{number_format($elemento->valorRatio, 2, '.', ',');}}</span>
                                                @if($elemento->valorRatio==0)
                                                     <span class="badge bg-warning text-dark">No Aplica</span>
                                                @else
                                                   
                                                    @if ($elemento->anteriorValor($elemento))      
                                                         <b>{{$elemento->comportamiento->nombreComportamiento}} </b>                                                                                              
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>
                                                            @endif      
                                                        
                                                        @endif
                                                    @else
                                                        <b>Comparado con el estandar</b>
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->ratio->valorEstandar > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>  
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->ratio->valorEstandar < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span> 
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>  
                                                            @endif      
                                                        
                                                        @endif
                                                    @endif    
                                                @endif 
                                                </p></li>
                                            @endforeach
                                            </ul>
                                            </div>
                                        </div>   
                                    @endforeach
                                
                                </div>
                            </div>
                            {{--FIN--}}
                            @endif
                        </div>                       
                    </div>
                    {{--Fin de Balance--}}
                    <div class="tab-pane fade" id="estados" role="tabpanel" aria-labelledby="estados-tab"> 
                        {{--Inicio--}}
                        <div class="accordion mt-4" id="accordiondos">
                            @if(!$anios->isEmpty())       
                            <h2>Historico</h2>
                             <table class="table table-sm table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Ratio</th>
                                        @foreach ($anios as $record)
                                            <th class="text-center">{{$record}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%"><b>Razones de actividad  </b></td>
                                    </tr>
                                    @foreach ($ratiosNombres2 as $record)
                                
                                    <tr>                                                                          
                                        <td>{{$record->nombreRatio}}</td>
                                        @foreach ($record->detallesRatiosE(Auth::user()->idEmpresa) as $item)  
                                            
                                            @if ($item->valorRatio==0)
                                                 <td class="text-warning text-center text-dark"><b>No Aplica</b></td>
                                            @else                              
                                                @if ($item->anteriorValor($item))                                
                                                @if($item->ratio->evaluacion==1)
                                                        @if ($item->anteriorValor($item)->valorRatio > $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif
                                                    @elseif ($item->ratio->evaluacion==2)
                                                        @if ($item->anteriorValor($item)->valorRatio < $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif                                                      
                                                    @endif
                                                @else
                                                    <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                @endif
                                            @endif                                                                                
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#grafico2">
                               Ver Grafico
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="grafico2" tabindex="-1" aria-labelledby="grafico2Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Grafico de las razones de actividad</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <canvas id="graficoRatio2"  height="250" width="700"></canvas>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Entendido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin modal-->    
                            <h2>Ver detalles</h2>
                            {{--INICIO--}}
                            <div class="d-flex align-items-start mb-4">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="inicio-2-tab" data-bs-toggle="pill" data-bs-target="#inicio-2" type="button" role="tab" aria-controls="inicio-2" aria-selected="true">Inicio</button>

                                    @foreach ($aniosR as $record)
                                        <button class="nav-link" id="tab-{{$record}}-2" data-bs-toggle="pill" data-bs-target="#c-{{$record}}-2" type="button" role="tab" aria-controls="c-{{$record}}-2" aria-selected="false">{{$record}}</button>
                                    @endforeach
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="inicio-2" role="tabpanel" aria-labelledby="inicio-2-tab">
                                        <div class="card card-body">
                                            <h6 class="">Consultar detalle de las Razones de Actividad</h6>
                                            <h6>De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                        </div>
                                    </div>
                                    
                                    @foreach ($aniosR as $record)
                                        <div class="tab-pane fade" id="c-{{$record}}-2" role="tabpanel" aria-labelledby="tab-{{$record}}-2">
                                            <div class="card card-body">
                                            <h6 class="">Detalle de las Razones de Actividad del año <b>{{$record}} </b></h6>
                                            <h6 class="mb-4">De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                            @php
                                                $datos2 =$modelo->registros($record,2,Auth::user()->idEmpresa);
                                            @endphp
                                            <ul>
                                            @foreach ($datos2 as $elemento)
                                               <li><p> <b>-</b>
                                               {{$elemento->ratio->nombreRatio}}: <span class="badge bg-primary">{{number_format($elemento->valorRatio, 2, '.', ',');}}</span>
                                                @if($elemento->valorRatio==0)
                                                     <span class="badge bg-warning text-dark">No Aplica</span>
                                                @else
                                                  
                                                    @if ($elemento->anteriorValor($elemento))     
                                                          <b>{{$elemento->comportamiento->nombreComportamiento}} </b>                                                                                                
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>
                                                            @endif      
                                                        
                                                        @endif
                                                    @else
                                                        <b>Comparado con el estandar</b>
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->ratio->valorEstandar > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span> 
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->ratio->valorEstandar < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span> 
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span> 
                                                            @endif      
                                                        
                                                        @endif
                                                    @endif    
                                                @endif 
                                                </p></li>
                                            @endforeach
                                            </ul>
                                            </div>
                                        </div>   
                                    @endforeach
                                
                                </div>
                            </div>
                            @endif
                            {{--FIN--}}
                            
                        </div>
                        {{--Fin--}}
                    </div>
                     <div class="tab-pane fade" id="tipo3-tab" role="tabpanel" aria-labelledby="tipo3-tab"> 
                        {{--Inicio--}}
                        <div class="accordion mt-4" id="accordiontres">
                            @if(!$anios->isEmpty())       
                            <h2>Historico</h2>
                             <table class="table table-sm table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Ratio</th>
                                        @foreach ($anios as $record)
                                            <th class="text-center">{{$record}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%"><b>Razones de endeudamiento   </b></td>
                                    </tr>
                                    @foreach ($ratiosNombres3 as $record)
                                
                                    <tr>                                                                          
                                        <td>{{$record->nombreRatio}}</td>
                                        @foreach ($record->detallesRatiosE(Auth::user()->idEmpresa) as $item)  
                                            
                                            @if ($item->valorRatio==0)
                                                 <td class="text-warning text-center text-dark"><b>No Aplica</b></td>
                                            @else                              
                                                @if ($item->anteriorValor($item))                                
                                                @if($item->ratio->evaluacion==1)
                                                        @if ($item->anteriorValor($item)->valorRatio > $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif
                                                    @elseif ($item->ratio->evaluacion==2)
                                                        @if ($item->anteriorValor($item)->valorRatio < $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif                                                      
                                                    @endif
                                                @else
                                                    <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                @endif
                                            @endif                                                                                
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#grafico3">
                               Ver Grafico
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="grafico3" tabindex="-1" aria-labelledby="grafico3Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Grafico de las razones de endeudamiento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <canvas id="graficoRatio3"  height="250" width="700"></canvas>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Entendido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin modal-->        
                            <h2>Ver detalles</h2>
                             {{--INICIO--}}
                            <div class="d-flex align-items-start mb-4">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="inicio-3-tab" data-bs-toggle="pill" data-bs-target="#inicio-3" type="button" role="tab" aria-controls="inicio-3" aria-selected="true">Inicio</button>

                                    @foreach ($aniosR as $record)
                                        <button class="nav-link" id="tab-{{$record}}-3" data-bs-toggle="pill" data-bs-target="#c-{{$record}}-3" type="button" role="tab" aria-controls="c-{{$record}}-3" aria-selected="false">{{$record}}</button>
                                    @endforeach
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="inicio-3" role="tabpanel" aria-labelledby="inicio-3-tab">
                                        <div class="card card-body">
                                            <h6 class="">Consultar detalle de las Razones de Endeudamiento</h6>
                                            <h6>De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                        </div>
                                    </div>
                                    
                                    @foreach ($aniosR as $record)
                                        <div class="tab-pane fade" id="c-{{$record}}-3" role="tabpanel" aria-labelledby="tab-{{$record}}-3">
                                            <div class="card card-body">
                                            <h6 class="">Detalle de las Razones de Endeudamiento del año <b>{{$record}} </b></h6>
                                            <h6 class="mb-4">De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                            @php
                                                $datos3 =$modelo->registros($record,3,Auth::user()->idEmpresa);
                                            @endphp
                                            <ul>
                                            @foreach ($datos3 as $elemento)
                                               <li><p> <b>-</b>
                                                {{$elemento->ratio->nombreRatio}}: <span class="badge bg-primary">{{number_format($elemento->valorRatio, 2, '.', ',');}}</span>
                                                @if($elemento->valorRatio==0)
                                                     <span class="badge bg-warning text-dark">No Aplica</span>
                                                @else
                                                    
                                                    @if ($elemento->anteriorValor($elemento))    
                                                        <b>{{$elemento->comportamiento->nombreComportamiento}} </b>                                                                                                
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>
                                                            @endif      
                                                        
                                                        @endif
                                                    @else
                                                        <b>Comparado con el estandar</b> 
                                                       @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->ratio->valorEstandar > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span> 
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>  
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->ratio->valorEstandar < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span>  
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>  
                                                            @endif      
                                                        
                                                        @endif
                                                    @endif    
                                                @endif 
                                                </p></li>
                                            @endforeach
                                            </ul>
                                            </div>
                                        </div>   
                                    @endforeach
                                
                                </div>
                            </div>
                            {{--FIN--}}
                        </div>
                        @endif
                        {{--Fin--}}
                    </div>
                     <div class="tab-pane fade" id="tipo4-tab" role="tabpanel" aria-labelledby="tipo4-tab"> 
                         {{--Inicio--}}
                        <div class="accordion mt-4" id="accordioncuatro">
                            @if(!$anios->isEmpty())       
                            <h2>Historico</h2>
                             <table class="table table-sm table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Ratio</th>
                                        @foreach ($anios as $record)
                                             <th class="text-center">{{$record}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%"><b>Razones de rentabilidad   </b></td>
                                    </tr>
                                    @foreach ($ratiosNombres4 as $record)
                                
                                    <tr>                                                                          
                                         <td>{{$record->nombreRatio}}</td>
                                        @foreach ($record->detallesRatiosE(Auth::user()->idEmpresa) as $item)  
                                            
                                            @if ($item->valorRatio==0)
                                                 <td class="text-warning text-center text-dark"><b>No Aplica</b></td>
                                            @else                              
                                                @if ($item->anteriorValor($item))                                
                                                @if($item->ratio->evaluacion==1)
                                                        @if ($item->anteriorValor($item)->valorRatio > $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif
                                                    @elseif ($item->ratio->evaluacion==2)
                                                        @if ($item->anteriorValor($item)->valorRatio < $item->valorRatio)
                                                            <td class="text-danger text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @else
                                                            <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                        @endif                                                      
                                                    @endif
                                                @else
                                                    <td class="text-success text-center"><b>{{number_format($item->valorRatio, 2, '.', ',');}}</b></td>
                                                @endif
                                            @endif                                                                                
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#grafico4">
                               Ver Grafico
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="grafico4" tabindex="-1" aria-labelledby="grafico4Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Grafico de las razones de rentabilidad</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <canvas id="graficoRatio4"  height="250" width="700"></canvas>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Entendido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin modal-->      
                            <h2>Ver detalles</h2>
                             {{--INICIO--}}
                            <div class="d-flex align-items-start mb-4">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="inicio-4-tab" data-bs-toggle="pill" data-bs-target="#inicio-4" type="button" role="tab" aria-controls="inicio-4" aria-selected="true">Inicio</button>

                                    @foreach ($aniosR as $record)
                                        <button class="nav-link" id="tab-{{$record}}-4" data-bs-toggle="pill" data-bs-target="#c-{{$record}}-4" type="button" role="tab" aria-controls="c-{{$record}}-4" aria-selected="false">{{$record}}</button>
                                    @endforeach
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="inicio-4" role="tabpanel" aria-labelledby="inicio-4-tab">
                                        <div class="card card-body">
                                            <h6 class="">Consultar detalle de las Razones de Rentabilidad</h6>
                                            <h6>De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                        </div>
                                    </div>
                                    
                                    @foreach ($aniosR as $record)
                                        <div class="tab-pane fade" id="c-{{$record}}-4" role="tabpanel" aria-labelledby="tab-{{$record}}-4">
                                            <div class="card card-body">
                                            <h6 class="">Detalle de las Razones de Rentabilidad del año <b>{{$record}} </b></h6>
                                            <h6 class="mb-4">De la empresa <b>{{ Auth::user()->empresa->nombreEmpresa}}</b></h6>
                                            @php
                                                $datos4 =$modelo->registros($record,4,Auth::user()->idEmpresa);
                                            @endphp
                                            <ul>
                                            @foreach ($datos4 as $elemento)
                                               
                                                <li><p> <b>-</b>
                                                {{$elemento->ratio->nombreRatio}}: <span class="badge bg-primary">{{number_format($elemento->valorRatio, 2, '.', ',');}}</span>
                                                @if($elemento->valorRatio==0)
                                                     <span class="badge bg-warning">No Aplica</span>
                                                @else
                                                  
                                                    @if ($elemento->anteriorValor($elemento))      
                                                          <b>{{$elemento->comportamiento->nombreComportamiento}} </b>                                                                                              
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->anteriorValor($elemento)->valorRatio < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span>
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>
                                                            @endif      
                                                        
                                                        @endif
                                                    @else
                                                        <b>Comparado con el estandar</b> 
                                                        @if($elemento->ratio->evaluacion==1)
                                                            @if ($elemento->ratio->valorEstandar > $elemento->valorRatio)
                                                            <span class="badge bg-danger">Andamos mal</span> 
                                                            @else
                                                            <span class="badge bg-success">Andamos bien</span>  
                                                            @endif
                                                        @elseif ($elemento->ratio->evaluacion==2)
                                                            @if ($elemento->ratio->valorEstandar < $elemento->valorRatio)
                                                                <span class="badge bg-danger">Andamos mal</span>  
                                                            @else
                                                                <span class="badge bg-success">Andamos bien</span>  
                                                            @endif      
                                                        
                                                        @endif
                                                       
                                                    @endif    
                                                @endif 
                                                </p></li>
                                            @endforeach
                                            </ul>
                                            </div>
                                        </div>   
                                    @endforeach
                                
                                </div>
                            </div>
                            {{--FIN--}}
                        </div>
                        {{--Fin--}}
                        @endif
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection