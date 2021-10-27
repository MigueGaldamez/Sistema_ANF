@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col col-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card shadow mx-2 p-12">
               <h2 class="mb-0">Tablas catalogo</h2>
                         @php
                         $usuario = Auth::user();
                        @endphp
                        <nav class="mt-4">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @if($usuario->permisoSi(7))
                             <button class="nav-link @if(!$usuario->permisoSi(8) && !$usuario->permisoSi(9)) active @endif" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tipos de Empresas</button>
                            @endif
                            @if($usuario->permisoSi(8))
                                
                                <button class="nav-link  @if(!$usuario->permisoSi(9)) active @endif" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Empresas</button>
                            @endif 
                            @if($usuario->permisoSi(9))
                                <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Ratios</button>
                            @endif 
                            </div>
                        </nav>
                       
                        
       
                        <div class="tab-content" id="nav-tabContent">
                            {{--Inicio--}}

                            <div class="tab-pane fade   @if(!$usuario->permisoSi(8) && !$usuario->permisoSi(9) && $usuario->permisoSi(7)) show active @endif mt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row mb-4">
                                    <div class="col">
                                        <h3>Tipo de Empresas</h3>
                                    </div>
                                    <div class="col text-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tipo">
                                            Nuevo
                                        </button>
                                        
                                    </div> 
                                <!-- Modal -->
                                    <div class="modal fade" id="tipo" tabindex="-1" aria-labelledby="tipo-label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="" method="post" action="{{ route('guardar.tipo') }}" enctype="multipart/form-data">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tipo-label">Aregar tipo de Empresa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Nuevo:<span class="text-muted">Tipo</span></h4>
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="tipoEmpresa">Tipo Empresa</label>
                                                            <input id="tipoEmpresa" class="form-control" name="tipoEmpresa" type="text"  value="">
                                                        </div>
                                                       
                                                        
                                                        <div class="form-group d-none">
                                                            <label for="idTipoEmpresa">id</label>
                                                            <input id="idTipoEmpresa" class="form-control" name="idTipoEmpresa" type="number" value="0">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button class="btn btn-primary"  type="submit">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <table class="table table-sm text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Tipo de empresa</th>
                                            <th>Empresas</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($tipoEmpresas as $tipoEmpresa)
                                        
                                        <tr>
                                            <td>{{$tipoEmpresa->nombre}}</td>
                                            <td>
                                                
                                                @foreach ($tipoEmpresa->empresas as $empresa)
                                                    <span class="badge bg-primary">{{$empresa->nombreEmpresa}}</span>
                                                @endforeach
                                                
                                            </td>
                                            <td>
                                               <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tipo-{{$tipoEmpresa->idTipoEmpresa}}">
                                                    Modificar
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                            <div class="modal fade" id="tipo-{{$tipoEmpresa->idTipoEmpresa}}" tabindex="-1" aria-labelledby="tipo-{{$tipoEmpresa->idTipoEmpresa}}-label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" method="post" action="{{ route('guardar.tipo') }}" enctype="multipart/form-data">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="tipo-{{$tipoEmpresa->idTipoEmpresa}}-label">Modificar tipo de empresa</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Valor actual:<span class="text-muted">  {{$tipoEmpresa->nombre}} </span></h4>
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="tipoEmpresa">Nuevo Valor</label>
                                                                    <input id="tipoEmpresa" class="form-control" name="tipoEmpresa" type="text"  value=" {{$tipoEmpresa->nombre}}">
                                                                </div>
                                                                  <div class="form-group d-none">
                                                                    <label for="idTipoEmpresa">id</label>
                                                                    <input id="idTipoEmpresa" class="form-control" name="idTipoEmpresa" type="number" value="{{$tipoEmpresa->idTipoEmpresa}}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-primary"  type="submit">Guardar Cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                            {{--FIN--}}
                            <div class="tab-pane fade @if($usuario->permisoSi(8) && !$usuario->permisoSi(9)) show active @endif mt-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                {{--Inicio--}}
                                 <div class="row mb-4">
                                   <div class="col">
                                       <h3>Empresas</h3>
                                   </div>
                                   <div class="col text-end">
                                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empresa">
                                        Nueva
                                        </button>
                                       
                                   </div> 
                                    <!-- Modal -->
                                        <div class="modal fade" id="empresa" tabindex="-1" aria-labelledby="empresa-label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="" method="post" action="{{ route('guardar.empresa') }}" enctype="multipart/form-data">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="empresa--label">Modificar Empresa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Nueva:<span class="text-muted">Empresa</span></h4>
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="empresa">Empresa</label>
                                                                <input id="empresa" class="form-control" name="empresa" type="text"  value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="empresa">Empresa</label>
                                                                <select class="form-select" aria-label="Default select example" id="idTipoEmpresa" name="idTipoEmpresa">
                                                                    <option selected>Selecciona</option>                                                                   
                                                                    @foreach ($tipoEmpresas as $tipo)
                                                                        <option value="{{$tipo->idTipoEmpresa}}">{{$tipo->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group d-none">
                                                                <label for="idEmpresa">id</label>
                                                                <input id="idEmpresa" class="form-control" name="idEmpresa" type="number" value="0">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button class="btn btn-primary"  type="submit">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                </div>
                                <table class="table table-sm text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Nombre empresa</th>
                                            <th>Tipo Empresa</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($empresas as $empresa)
                                        
                                        <tr>
                                            <td>{{$empresa->nombreEmpresa}}</td>
                                            <td> 
                                                <span class="badge bg-primary">{{$empresa->tipoEmpresa->nombre}}</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#empresa-{{$empresa->idEmpresa}}">
                                                    Modificar
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                            <div class="modal fade" id="empresa-{{$empresa->idEmpresa}}" tabindex="-1" aria-labelledby="empresa-{{$empresa->idEmpresa}}-label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" method="post" action="{{ route('guardar.empresa') }}" enctype="multipart/form-data">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="empresa-{{$empresa->idEmpresa}}-label">Modificar Empresa</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Valor actual:<span class="text-muted">  {{$empresa->nombreEmpresa}} </span></h4>
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="empresa">Nuevo Valor</label>
                                                                    <input id="empresa" class="form-control" name="empresa" type="text"  value=" {{$empresa->nombreEmpresa}}">
                                                                </div>
                                                                
                                                                <div class="form-group d-none">
                                                                    <label for="idEmpresa">id</label>
                                                                    <input id="idEmpresa" class="form-control" name="idEmpresa" type="number" value="{{$empresa->idEmpresa}}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-primary"  type="submit">Guardar Cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                            {{--Fin--}}
                        
                            <div class="tab-pane fade mt-4 @if( $usuario->permisoSi(9)) show active @endif" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                {{--Inicio--}}
                                <div class="row mb-4">
                                   <div class="col">
                                       <h3>Ratios</h3>
                                   </div>
                                   <div class="col text-end d-none">
                                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratio">
                                        Nueva
                                        </button>
                                   </div> 
                                </div>
                                
                                 
                                
                                <table class="table table-sm text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-start">Nombre Ratio</th>
                                            <th>Mensaje Bueno</th>
                                            <th>Mensaje Malo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($ratios as $ratio)
                                        
                                        <tr>
                                            <td class="text-start">{{$ratio->nombreRatio}}</td>
                                            <td> 
                                                {{$ratio->mensajeBueno}}
                                            </td>
                                              <td> 
                                                {{$ratio->mensajeMalo}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ratio-{{$ratio->idRatio}}">
                                                    Modificar
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                            <div class="modal fade" id="ratio-{{$ratio->idRatio}}" tabindex="-1" aria-labelledby="ratio-{{$ratio->idRatio}}-label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" method="post" action="{{ route('guardar.ratio') }}" enctype="multipart/form-data">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ratio-{{$ratio->idRatio}}-label">Modificar Empresa</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Editar:<span class="text-muted">  {{$ratio->nombreRatio}} </span></h4>
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="mensajeBueno">Mensaje Bueno</label>
                                                                    <input id="mensajeBueno" class="form-control" name="mensajeBueno" type="text"  value="{{$ratio->mensajeBueno}}">
                                                                </div>
                                                                  <div class="form-group">
                                                                    <label for="mensajeMalo">Mensaje Malo</label>
                                                                    <input id="mensajeMalo" class="form-control" name="mensajeMalo" type="text"  value="{{$ratio->mensajeMalo}}">
                                                                </div>
                                                                <div class="form-group d-none">
                                                                    <label for="idRatio">id</label>
                                                                    <input id="idRatio" class="form-control" name="idRatio" type="number" value="{{$ratio->idRatio}}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-primary"  type="submit">Guardar Cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                                {{ $ratios->links() }}
                                {{--Fin--}}
                            </div>
                        </div>
                        @if(session()->has('mensaje'))
                            <div class="position-fixed bottom-0 end-0 p-3 show" style="z-index: 11">
                                <div id="liveToast" class="toast notificacion" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#43ff76"/></svg>
                                    <strong class="me-auto">Notificacion</strong>
                                    <small>hace 1 segundo </small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                {{ session()->get('mensaje') }}
                                    </div>
                                </div>
                            </div>
                            
                            
                            <script>
                                $( document ).ready(function() {
                                    var myToastEl = document.getElementById('liveToast');
                                    var myToast = bootstrap.Toast.getOrCreateInstance(myToastEl);
                                    myToast.show();
                            });
                        
                            </script>
                        @endif
            </div>            
        </div>
    </div>
</div>
@endsection