@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col card shadow mx-2 p-4">
            <div class="row">
                <h2 class="mb-0">Comparar Ratios</h2>
                <h5 class="mt-0">De la empresa  <span class="badge bg-primary">{{Auth::user()->empresa->nombreEmpresa}}</span></h5>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Comparar con otra empresa</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ingresar datos para comparar</button>
                       
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                             <h4 class="mt-2">Empresas y años disponibles de comparar</h4>
                            @foreach ($empresas as $item)
                                   @php
                                        $empresa = $modelo->encontrarEmpresa($item->idEmpresa);
                                   @endphp
                                   <div class="col col-lg-4 col-sm-12">
                                         <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                     <h5 class="card-title mb-0">{{$empresa->nombreEmpresa}},  {{$item->anio}}</h5>
                                                      <small class="text-muted mt-0">Otra empresa</small><br>
                                                </div>
                                                <div class="col col-4 text-end">
                                                    <button class="btn btn-sm  btn-success boton" id="{{$empresa->idEmpresa}}-{{$item->anio}}" onClick="recargar({{$empresa->idEmpresa}},{{$item->anio}})">Comparar</button>    
                                                </div>
                                            </div>
                                           
                                        
                                            <span class="card-text">Tipo Empresa <span class="badge bg-info">{{$empresa->tipoEmpresa->nombre}}</span></span>
                                        </div>
                                    </div>
                                   </div>
                                  
                            @endforeach
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function(){
                           
                            
                        });

                         function recargar(id,anio) {
                            var url = '{{ route("empresas.comparar", ['id'=>":id",'anio'=>":anio"]) }}';
                            url = url.replace(':id', id);
                            url = url.replace(':anio', anio);

                           $.get(url,{},function(data,status){
                               $("#tablita").html(data); 
                           });
                        }
                        function recargarSegundo(anio) {
                            var url = '{{ route("datos.comparar", ['anio'=>":anio"]) }}';
                        
                            url = url.replace(':anio', anio);

                           $.get(url,{},function(data,status){
                               $("#tablita2").html(data); 
                           });
                        }
                        </script>   
                        <div class="my-4" id="tablita" name="tablita">
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
                       
                        <div class="row">
                             <h4 class="mt-2">Años disponibles de comparar</h4>
                            @foreach ($empresaMia as $item)
                                   @php
                                        $empresa = $modelo->encontrarEmpresa($item->idEmpresa);
                                   @endphp
                                   <div class="col col-lg-4 col-sm-12">
                                         <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                 <h5 class="card-title mb-0">{{$empresa->nombreEmpresa}},  {{$item->anio}}</h5> 
                                                   <small class="text-muted mt-0">Mi empresa</small><br>
                                            </div>
                                            <div class="col text-end ">
                                                <button class="btn btn-sm  btn-success" id="{{$empresa->idEmpresa}}-{{$item->anio}}" onClick="recargarSegundo({{$item->anio}})">Comparar</button>
                                            </div>
                                        </div>
                                           
                                            

                                          
                                            <span class="card-text">Tipo Empresa <span class="badge bg-info">{{$empresa->tipoEmpresa->nombre}}</span></span>
                                        </div>
                                    </div>
                                   </div>
                                  
                            @endforeach
                        </div>
                        <div class="my-4" id="tablita2" name="tablita2">
                        </div>
                       
                    </div>
                    
                 </div>
                

                
                
                

                
            </div>
        </div>     
    </div>
</div>
@endsection