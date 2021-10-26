
@extends('layouts.backend')
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col col-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card shadow mx-2 p-4">
                <h2 class="mb-0">Permisos de usuario</h2>
                <h5 class="mt-0">De la empresa: <span class="badge bg-primary">{{Auth::user()->empresa->nombreEmpresa}}</span></h5>
                <div class="my-4" id="tablita" name="tablita">
                            
                </div>
            </div>
        </div>
         
    </div>
</div>
 <script type="text/javascript">
    $(document).ready(function(){
        
        recargar();
    });
    function recargar() {
        var url = '{{ route("permisos.data")}}';
     
        $.get(url,{},function(data,status){
            $("#tablita").html(data); 
        });
    }
</script>   
@endsection