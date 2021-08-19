<!DOCTYPE html>
<html lang="es">
 <!--Header-->   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehiculos Robados y Recuperados</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <script src="{{asset('bootstrap-5/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('font_awesome/css/font-awesome.min.css')}}">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}"/>
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{asset('js/navegacion.js')}}" crossorigin="anonymous"></script>-->
</head>
<body>
    <!--Navbar-->    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img  style="width:50%"src="{{asset('storage/FGEC LOGO.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('vehiculosRobados.index')}}">Vehiculos Robados</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--Content-->
    @yield('content')
    @stack('scripts')
</body>
</html>