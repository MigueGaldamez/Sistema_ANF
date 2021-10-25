
        <div class="position-fixed bottom-0 end-0 p-3 show" style="z-index: 11">
            <div id="toastError" class="toast notificacion" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                 <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#FF5C58"/></svg>
                <strong class="me-auto">Notificacion</strong>
                <small>hace 1 segundo </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
               Error, seleccione dos o mas años para analizar
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

