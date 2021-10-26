@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col col-12">
            <div class="card shadow mx-2 p-4">
               <h2 class="mb-0">Subir Catalogo de cuentas</h2>
          
           
            <form class="mt-4 col-sm-12 col-12  col-xl-6" method="post" action="{{ route('guardar.catalogo') }}" enctype="multipart/form-data">
                @csrf
                 <h5 class="mt-0">Este proceso solo se permite realizar una vez, asi que asegurese de hacerlo correctamente</h5>
                <div class="form-group">
                    <label for="archivo">Archivos permitidos .svc .svcx</label>
                    <input id="archivo" class="form-control" type="file" name="archivo"  @if(Auth::user()->empresa->catalogo == 1) disabled @endif accept=".xlsx, .xlsm">
                </div>
                 @if(Auth::user()->empresa->catalogo == 0)
                    <span class="text-danger"><b>Atecion! </b>Aun no ha subido un catalogo de cuentas</span><br>
                @elseif(Auth::user()->empresa->catalogo == 1)
                    <span class="text-success"><b>Listo! </b>Ya cuenta con un catalogo de cuentas</span><br>
                @endif
                    
                <button class="btn btn-primary mt-2 text-light" type="submit" @if(Auth::user()->empresa->catalogo == 1) disabled @endif>Subir</button>
 

            </form>
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

        @if(session()->has('error'))
        <div class="position-fixed bottom-0 end-0 p-3 show" style="z-index: 11">
            <div id="toastError" class="toast notificacion" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                 <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#FF5C58"/></svg>
                <strong class="me-auto">Notificacion</strong>
                <small>hace 1 segundo </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
               {{ session()->get('error') }}
                </div>
            </div>
        </div>
        <script>
            
            $( document ).ready(function() {
               
                var miToastEl = document.getElementById('toastError');
                var miToast = bootstrap.Toast.getOrCreateInstance(miToastEl);
                miToast.show();
        });
       
        </script>
        @endif
    </div>
</div>
@endsection