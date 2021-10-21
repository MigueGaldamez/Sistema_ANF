$( document ).ready(function() {
    div ="graficoRatio1";
    var mensajes = [];
    mensajes.push("Razón de circulante o razón de liquidez corriente");
    mensajes.push("Razón de liquidez rápida o prueba acida");
    mensajes.push("Razón de activo neto de trabajo");
    mensajes.push("Razón de efectivo");
    mensajes.push("Media del intervalo");
    mensajes.push("Activo neto o capital de trabajo");
    obtenerDatosGrafico1(div,mensajes);

    div ="graficoRatio2";
    var mensajes = [];
    mensajes.push("Razón de rotación de inventario");
    mensajes.push("Razón de rotación de días de inventarios");
    mensajes.push("Razón de rotación de cobros");
    mensajes.push("Razón de periodo medio de cobranza");
    mensajes.push("Razón de rotación de las cuentas por pagar");
    mensajes.push("Razón del periodo medio de pago");
    mensajes.push("Razón de rotación de activos totales");
    mensajes.push("Razón de rotación de activos fijos");
    mensajes.push("Indice de margen bruto");
    mensajes.push("Indice de margen operativo");
    obtenerDatosGrafico2(div,mensajes);

    div ="graficoRatio3";
    var mensajes = [];
    mensajes.push("Razón de grado de endeudamiento");
    mensajes.push("Razón de grado de propiedad");
    mensajes.push("Razón de endeudamiento patrimonial");
    mensajes.push("Razón de cobertura de gastos financieros");
    obtenerDatosGrafico3(div,mensajes);

    div ="graficoRatio4";
    var mensajes = [];
    mensajes.push("Razón de rentabilidad del patrimonio");
    mensajes.push("Razón de rentabilidad por acción");
    mensajes.push("Razón de rentabilidad del activo");
    mensajes.push("Razón de rentabilidad sobre ventas");
    mensajes.push("Razón de rentabilidad sobre la inversión");
    obtenerDatosGrafico4(div,mensajes);
 });

 //RENDERIZAR
 function renderizarGrafico1(datos,labels,div,mensajes) {
    var ctx = document.getElementById(div).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: mensajes[0],
                data: datos[0],
                    backgroundColor: [                    
                        'rgba(0,110,144, 0.5)',                     
                    ],
                borderColor: [
                    'rgba(0,110,144, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[1],
                data: datos[1],
                    backgroundColor: [        
                        'rgba(241, 143, 1, 0.5)',
                    ],
                borderColor: [                   
                    'rgba(241, 143, 1, 1)',                    
                ],
                borderWidth: 3,
            },{
                label: mensajes[2],
                data: datos[2],
                    backgroundColor: [                              
                        'rgba(173, 202, 214, 0.5)',
                    ],
                borderColor: [               
                    'rgba(173, 202, 214,1)',      
                ],
                borderWidth: 3,
            },{
                label: mensajes[3],
                data: datos[3],
                    backgroundColor: [                              
                        'rgba(153,194,77, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(153,194,77, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[4],
                data: datos[4],
                    backgroundColor: [                              
                        'rgba(65,187,217, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(65,187,217, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[5],
                data: datos[5],
                    backgroundColor: [                              
                        'rgba(226,69,69, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(226,69,69, 1)',                   
                ],
                borderWidth: 3,
            },]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true                        
                    }
                }]
            },
            title: {
                display: true,
                text:mensajes[0]
            },
        }
    });
}

function renderizarGrafico2(datos,labels,div,mensajes) {
    var ctx = document.getElementById(div).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: mensajes[0],
                data: datos[0],
                    backgroundColor: [                    
                        'rgba(0,110,144, 0.5)',                     
                    ],
                borderColor: [
                    'rgba(0,110,144, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[1],
                data: datos[1],
                    backgroundColor: [        
                        'rgba(241, 143, 1, 0.5)',
                    ],
                borderColor: [                   
                    'rgba(241, 143, 1, 1)',                    
                ],
                borderWidth: 3,
            },{
                label: mensajes[2],
                data: datos[2],
                    backgroundColor: [                              
                        'rgba(173, 202, 214, 0.5)',
                    ],
                borderColor: [               
                    'rgba(173, 202, 214,1)',      
                ],
                borderWidth: 3,
            },{
                label: mensajes[3],
                data: datos[3],
                    backgroundColor: [                              
                        'rgba(153,194,77, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(153,194,77, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[4],
                data: datos[4],
                    backgroundColor: [                              
                        'rgba(65,187,217, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(65,187,217, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[5],
                data: datos[5],
                    backgroundColor: [                              
                        'rgba(226,69,69, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(226,69,69, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[6],
                data: datos[6],
                    backgroundColor: [                              
                        'rgba(247,193,187, 0.5)',
                    ],
                borderColor: [               
                    'rgba(247,193,187,1)',      
                ],
                borderWidth: 3,
            },{
                label: mensajes[7],
                data: datos[7],
                    backgroundColor: [                              
                        'rgba(53,58,71, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(53,58,71, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[8],
                data: datos[8],
                    backgroundColor: [                              
                        'rgba(237,125,58, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(237,125,58, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[9],
                data: datos[9],
                    backgroundColor: [                              
                        'rgba(233,196,106, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(233,196,106, 1)',                   
                ],
                borderWidth: 3,
            },]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true                        
                    }
                }]
            },
            title: {
                display: true,
                text:mensajes[0]
            },
        }
    });
}

function renderizarGrafico3(datos,labels,div,mensajes) {
    var ctx = document.getElementById(div).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: mensajes[0],
                data: datos[0],
                    backgroundColor: [                    
                        'rgba(0,110,144, 0.5)',                     
                    ],
                borderColor: [
                    'rgba(0,110,144, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[1],
                data: datos[1],
                    backgroundColor: [        
                        'rgba(241, 143, 1, 0.5)',
                    ],
                borderColor: [                   
                    'rgba(241, 143, 1, 1)',                    
                ],
                borderWidth: 3,
            },{
                label: mensajes[2],
                data: datos[2],
                    backgroundColor: [                              
                        'rgba(173, 202, 214, 0.5)',
                    ],
                borderColor: [               
                    'rgba(173, 202, 214,1)',      
                ],
                borderWidth: 3,
            },{
                label: mensajes[3],
                data: datos[3],
                    backgroundColor: [                              
                        'rgba(153,194,77, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(153,194,77, 1)',                   
                ],
                borderWidth: 3,
            },]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true                        
                    }
                }]
            },
            title: {
                display: true,
                text:mensajes[0]
            },
        }
    });
}
function renderizarGrafico4(datos,labels,div,mensajes) {
    var ctx = document.getElementById(div).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: mensajes[0],
                data: datos[0],
                    backgroundColor: [                    
                        'rgba(0,110,144, 0.5)',                     
                    ],
                borderColor: [
                    'rgba(0,110,144, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[1],
                data: datos[1],
                    backgroundColor: [        
                        'rgba(241, 143, 1, 0.5)',
                    ],
                borderColor: [                   
                    'rgba(241, 143, 1, 1)',                    
                ],
                borderWidth: 3,
            },{
                label: mensajes[2],
                data: datos[2],
                    backgroundColor: [                              
                        'rgba(173, 202, 214, 0.5)',
                    ],
                borderColor: [               
                    'rgba(173, 202, 214,1)',      
                ],
                borderWidth: 3,
            },{
                label: mensajes[3],
                data: datos[3],
                    backgroundColor: [                              
                        'rgba(153,194,77, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(153,194,77, 1)',                   
                ],
                borderWidth: 3,
            },{
                label: mensajes[4],
                data: datos[4],
                    backgroundColor: [                              
                        'rgba(65,187,217, 0.5)',                       
                    ],
                borderColor: [               
                    'rgba(65,187,217, 1)',                   
                ],
                borderWidth: 3,
            },]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true                        
                    }
                }]
            },
            title: {
                display: true,
                text:mensajes[0]
            },
        }
    });
}

 //OBTERNER DATOS GRAFICO 1
function obtenerDatosGrafico1(div,mensajes) {   

    $.ajax({
        url: '/grafico/ratio1',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        dataType: 'json',
        success: function (data) {

            console.log(data.detalles1[0].valorRatio);
            var titulos = [];
            var datos = [];    
            var datosTotales = [];
            
            for (var i in data.detalles1) {
                datos.push(data.detalles1[i].valorRatio);
                titulos.push(data.detalles1[i].anio);
            }
            datosTotales.push(datos);
            var datos = [];
            
            for (var i in data.detalles2) {
                datos.push(data.detalles2[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles3) {
                datos.push(data.detalles3[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles4) {
                datos.push(data.detalles4[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles5) {
                datos.push(data.detalles5[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles6) {
                datos.push(data.detalles6[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            renderizarGrafico1(datosTotales, titulos,div,mensajes);  
           
        },
        error: function (data) {

            console.log(data);
        }
    });

}
 //OBTERNER DATOS GRAFICO 2
function obtenerDatosGrafico2(div,mensajes) {   
    $.ajax({
        url: '/grafico/ratio2',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        dataType: 'json',
        success: function (data) {

            console.log(data.detalles1[0].valorRatio);
            var titulos = [];
            var datos = [];    
            var datosTotales = [];
            
            for (var i in data.detalles1) {
                datos.push(data.detalles1[i].valorRatio);
                titulos.push(data.detalles1[i].anio);
            }
            datosTotales.push(datos);
            var datos = [];
            
            for (var i in data.detalles2) {
                datos.push(data.detalles2[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles3) {
                datos.push(data.detalles3[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles4) {
                datos.push(data.detalles4[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles5) {
                datos.push(data.detalles5[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles6) {
                datos.push(data.detalles6[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles7) {
                datos.push(data.detalles7[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles8) {
                datos.push(data.detalles8[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles9) {
                datos.push(data.detalles9[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles10) {
                datos.push(data.detalles10[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            renderizarGrafico2(datosTotales, titulos,div,mensajes);  
           
        },
        error: function (data) {

            console.log(data);
        }
    });

}
function obtenerDatosGrafico3(div,mensajes) {   
    $.ajax({
        url: '/grafico/ratio3',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        dataType: 'json',
        success: function (data) {

            console.log(data.detalles1[0].valorRatio);
            var titulos = [];
            var datos = [];    
            var datosTotales = [];
            
            for (var i in data.detalles1) {
                datos.push(data.detalles1[i].valorRatio);
                titulos.push(data.detalles1[i].anio);
            }
            datosTotales.push(datos);
            var datos = [];
            
            for (var i in data.detalles2) {
                datos.push(data.detalles2[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles3) {
                datos.push(data.detalles3[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles4) {
                datos.push(data.detalles4[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            renderizarGrafico3(datosTotales, titulos,div,mensajes);  
           
        },
        error: function (data) {

            console.log(data);
        }
    });

}

function obtenerDatosGrafico4(div,mensajes) {   
    $.ajax({
        url: '/grafico/ratio4',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        dataType: 'json',
        success: function (data) {

            console.log(data.detalles1[0].valorRatio);
            var titulos = [];
            var datos = [];    
            var datosTotales = [];
            
            for (var i in data.detalles1) {
                datos.push(data.detalles1[i].valorRatio);
                titulos.push(data.detalles1[i].anio);
            }
            datosTotales.push(datos);
            var datos = [];
            
            for (var i in data.detalles2) {
                datos.push(data.detalles2[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles3) {
                datos.push(data.detalles3[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles4) {
                datos.push(data.detalles4[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            for (var i in data.detalles5) {
                datos.push(data.detalles5[i].valorRatio);               
            }
            datosTotales.push(datos);
            var datos = [];

            renderizarGrafico4(datosTotales, titulos,div,mensajes);  
           
        },
        error: function (data) {

            console.log(data);
        }
    });

}