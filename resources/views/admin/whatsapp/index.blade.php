@extends('adminlte::page')

@section('title', 'Mensajeria Whatsapp')

@section('content_header')
    
    <h1 class="text-bold">Mensajeria de Whatsapp</h1>

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-md-9 position-relative" style="margin-top: 25px">

            <div class="card items-center">
                <div class="card-header">
                    <h4>Formulario Whatsapp</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mensajeria') }}" method="get">
             
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Enviar a:</label>
                            <input type="text" name="phone" id="inputName"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Ingrese Número de telefono">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inputName">Mensaje:</label>
                            <textarea name="message" id="inputName"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="Ingrese notificación"></textarea>

                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success btn-submit">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
@stop

@section('js')
    @if (session('msj-whastapp') == 'enviado')
        <script>
            Swal.fire({
                icon: "success",
                title: "Mensaje Enviado!",
            })
        </script>
    @endif
    @if (session('msj-whastapp') == 'error')
        <script>
            Swal.fire({
                icon: "error",
                title: "Error al enviar el mensaje!",
            })
        </script>
    @endif

@stop
