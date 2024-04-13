var fecha = new Date();
// console.log(fecha);

var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];

var meses = ['Enero', 'Febrero', 'Marzo', 'Abril',
    'Mayo', 'Junio', 'Julio', 'Agosto',
    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

var dia = semana[fecha.getDay()];
var numero = fecha.getDate();
var mes = meses[fecha.getMonth()];
var año = fecha.getFullYear();

// console.log(dia)

function tiempo() {
    var fecha = new Date();

    var hora = fecha.getHours(); 
    var minutos = fecha.getMinutes(); 
    var segundos = fecha.getSeconds();

   
    if(hora >=12) {
        hora = hora - 12;
        var ampm = 'PM';
    }
    else {
        ampm = 'AM';
    }

    if(hora == 0) {
        hora = 12;
    }

    if(minutos < 10) {
        minutos = '0' + minutos;
    }

    if(segundos < 10) {
        segundos = '0' + segundos;
    }


    var mostrar = dia + ' ' + numero + ' de' + ' ' + mes + ' del ' + año;
    var mostrarHora = hora + ':' + minutos + ':' + segundos + ' ' + ampm;

    var pFecha = document.getElementById('fecha');
    var pHora = document.getElementById('hora');

    pFecha.innerHTML = mostrar;
    pHora.innerHTML = mostrarHora;

}

setInterval(tiempo,100);