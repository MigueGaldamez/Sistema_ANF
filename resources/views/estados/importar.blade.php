@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col col-12 col-md-6 col-lg-6 col-sm-12">
            <div class="card shadow mx-2 p-4">
               <h2 class="mb-0">Subir Balance General</h2>
            <h5 class="mt-0">Tambien llamado estado de situacion financiera</h5>
            <form class="mt-4" method="post" action="{{ route('guardar.balance') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="anio">Text</label>
                    <input id="anio" class="form-control" name="anio" type="number" min="{{date('Y')-20}}" max="{{date('Y')+80}}" step="1" value="{{date('Y')}}">
                </div>
                <div class="form-group">
                    <label for="archivo">Archivos permitidos .svc .svcx</label>
                    <input id="archivo" class="form-control" type="file" name="archivo"  accept=".xlsx, .xlsm">
                </div>
              
                    
                <button class="btn btn-primary mt-2 text-light" type="submit">Importar</button>
 

            </form>
            </div>
            
        </div>
         <div class="col col-12 col-md-6 col-lg-6 col-sm-12 mt-4 mt-md-0">
            <div class="card p-4 mx-2 shadow">
                <h2 class="mb-0">Subir Estado de Resultados</h2>
                <h5 class="mt-0">Tambien llamado estado de pérdidas y ganancias</h5>
                <form class="mt-4" method="post" action="{{ route('guardar.estado') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="anio">Text</label>
                        <input id="anio" class="form-control" name="anio" type="number" min="{{date('Y')-20}}" max="{{date('Y')+80}}" step="1" value="{{date('Y')}}">
                    </div>
                    <div class="form-group">
                        <label for="archivo">Archivos permitidos .svc .svcx</label>
                        <input id="archivo" class="form-control" type="file" name="archivo" accept=".xlsx, .xlsm">
                    </div>
                    <button class="btn btn-primary mt-2 text-light" type="submit">Importar</button>
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