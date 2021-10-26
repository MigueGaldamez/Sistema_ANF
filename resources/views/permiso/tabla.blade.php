<table class="table table-sm table-hover table-responsive table-striped table-bordered">
    <thead class="table-light text-center tabla-acentuada">
        <tr>        
            <th>Usuario</th>
            @foreach ($opciones as $opcion)
                <th>{{$opcion->opcion}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>  
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->name}}</td>
            @foreach ($opciones as $opcion)                                    
                <td class="text-center">
                    <div class=" form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="sw-{{$usuario->id}}-{{$opcion->idOpcion}}"  onchange="modificar({{$usuario->id}},{{$opcion->idOpcion}})" @if ($usuario->permisoVer($opcion->idOpcion,$usuario->id)) checked @endif>
                    
                    </div>
                </td>                
            @endforeach
        </tr>
        @endforeach      
    </tbody>
</table>
        <div class="position-fixed bottom-0 end-0 p-3 show" style="z-index: 11">
            <div id="liveToast" class="toast notificacion" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                 <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#43ff76"/></svg>
                <strong class="me-auto">Notificacion</strong>
                <small>hace 1 segundo </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Guardado con exito
                </div>
            </div>
        </div>
         
        
       
<script>
function modificar(usuario, opcion){
   event.preventDefault();
    $.ajax({
        url: "{{route('permisos.modificar')}}",
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",
            idUsuario:usuario,
            idOpcion:opcion,
        },
        success:function(response){
            var myToastEl = document.getElementById('liveToast');
            var myToast = bootstrap.Toast.getOrCreateInstance(myToastEl);
            myToast.show();
        },
        error: function (jqXHR, textStatus, errorThrown) 
        { 
           
        }
    })
                            
}
</script>