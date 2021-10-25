
@extends('layouts.backend')
@section('content')
<div class="container-fluid col-11 mt-4">
    <div class="row">
        <div class="col col-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card shadow mx-2 p-4">
                <h2 class="mb-0">Ver analisis</h2>
                <h5 class="mt-0">De la empresa: <span class="badge bg-primary">{{Auth::user()->empresa->nombreEmpresa}}</span> </h5>
                 
                        <div class="row" id="formcito">
                            <div class="col col-12">
                                  <h4 class="mt-2">Años disponibles de comparar</h4>
                            </div>
                            <div class="col col-12 mb-2">
                                <button class="btn btn-primary btn-sm text-light" type="button" onclick="analizar()">Analizar</button>
                            </div>
                          
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
                                                    <div class="col text-end">                                              
                                                        <label class="form-check-label" for="inlineCheckbox1">Incluir</label>
                                                        <input class="form-check-input" type="checkbox" id="anio-{{$item->anio}}" value="{{$item->anio}}"/>                                                
                                                    </div>
                                                </div>
                                                <span class="card-text">Tipo Empresa <span class="badge bg-info">{{$empresa->tipoEmpresa->nombre}}</span></span>
                                            </div>
                                        </div>
                                   </div>
                                  
                            @endforeach
                        </div>
                        
            </div>
             
               
            
        </div>
        <div class="my-4" id="tablita" name="tablita">
        </div>
    </div>
</div>
<script type="text/javascript">
    function analizar(){
         var anios = [];
        $('#formcito input:checked').each(function() {
            anios.push(this.value);
        });
        var envio = encodeURIComponent(JSON.stringify(anios));
      
        var url = '{{ route("analisis.datos", ['anios'=>":anios"]) }}';
        url = url.replace(':anios', envio);

        $.get(url,{},function(data,status){
            $("#tablita").html(data); 
        });
    }
</script>   
@endsection