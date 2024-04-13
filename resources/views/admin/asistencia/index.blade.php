<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Tell the browser to be responsive to screen width -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html {
            background: #fff;
            /* ges Hoehe der Seite -> weitere Hoehenangaben werden relativ hierzu ausgewertet */
            body {
                justify-content: center;
                align-items: center;
                font-family: "Calibri";                
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background: #B3212E;
                text-align: center;
            }
        }
    </style>
</head>
<body onload="setFocusToTextBox()" style="width: 100%">
    <header class="text-center">
        <nav style="background-color: #B3212E; margin-bottom: 10px;">
            <div class="" style="padding-top: 15px;padding-bottom: 10px;">
                <a href="{{ route('admin.home') }}" class="btn btn-light"
                    style="font-size: 24px; float: right; color: #D90000; margin-right: 40px">
                    <i class="bi bi-backspace"></i><strong>Cerrar</strong>
                </a>
                <button href=""class="btn btn-light" id="regFaltas" hidden
                style="font-size: 24px; float: right; color: #D90000; margin-right: 20px" onclick="confirmarAccion()">
                    <i class="fas fa-undo"></i><strong>Registrar Faltas</strong>
                </button>
                <h2 style="color: white; margin-left: 100px;font-size:40px;">Gestión de Asistencia</h2>
        
            </div>
        </nav>
    </header>

    <div class="container" style="width: 560px; height: 510px;">
        <div class="container">
            @livewire('admin.asistencia-reloj-index')
            <div style="margin: 10px 0px"></div>
            <form action="/gEntrada" method="get" class="form-control f-asistencia">
                @csrf
                <div class="container text-center" >
                    <label class="form-label fw-bolder fs-4">Registrar Entrada</label><br>
                    <input type="int" maxlength="8" id="idestudiante" name="estudiante" class="form-control ">
                </div>

            </form>
            <div style="margin: 10px 0px"></div>
            <div class="card text-center fs-3" style="height: 90px; width:auto;">
                <span class="fw-semibold" style="margin-top: 20px;">
                    Total Asistencias:
                    <span
                        style="position: relative ; padding: 10px 60px; width:60px; height: 40px;
                    border: 1px solid #B9B9C8;">
                        {{ $bsd_asistencia->count() }}</span>
                </span>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="hour" style="color: #fff; font-size: 2rem;margin-bottom: -10px">
                <div id="hora">11:05:23 am</div>
            </div>
            <div class="date" style="color: #fff; font-size: 2rem">
                <div id="fecha">Miercoles 02 de agosto del 2023</div>
            </div>
        </div>
    </footer>
    <script src="/js/time.js"></script>
    
    <script>
        setTimeout(function() {
            document.getElementById('registroAsistencia').style.display = 'none';
            document.getElementById('esperando').style.display = 'block';
        }, 5000);
    </script>
</body>

@if (session('') == 'ok')
    <script>
        Swal.fire({
            icon: "success",
            title: "Se registró tu asistencia",
            showConfirmButton: false,
            timer: 500
        });
    </script>
@endif

@if (session('error') == 'vacio')
    <script>
        Swal.fire({
            icon: "error",
            title: "No existe ese código",
            showConfirmButton: false,
            timer: 500
        });
    </script>
@endif

@if (session('error') == 'duplicado')
    <script>
        Swal.fire({
            icon: "warning",
            title: "El alumno ya registro su asistencia",
            showConfirmButton: false,
            timer: 500
        });
    </script>
@endif

<script>
    $('.f-asistencia').submit(function(e) {
        e.preventDefault();
        this.submit();
    });
</script>
<script>
    function setFocusToTextBox() {
        document.getElementById("idestudiante").focus();
    };
</script>
<script>
    function confirmarAccion() {   
    if (confirm("Se registraran a todos los que no se registraron.\n¿Quiere Continuar?")) {
        window.location.href = "{{ route('admin.asistencia.faltaTurnoM') }}";
    }
}  
</script>
<script>
        function clickAutomatico() {
            var fechaActual = new Date();
            var horaDeseada = 1;

            if (fechaActual.getHours() == horaDeseada) {
                // Obtiene el botón por su ID
                var boton = document.getElementById('');
                boton.click();
            }elseif(fechaActual.getHours() === horaDeseada2){
                var boton = document.getElementById('');
                boton.click();
            }
        }
        // Establece un intervalo de tiempo para verificar la hora actual y realizar el clic automático
        setInterval(clickAutomatico, 60000); // Verificar cada minuto (ajusta según lo necesario)
    </script>
</html>
