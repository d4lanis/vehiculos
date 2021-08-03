<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <script src="{{asset('bootstrap-5/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('font_awesome/css/font-awesome.min.css')}}">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}"/>
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}"></script>
    <script src="{{asset('js/navegacion.js')}}"></script>
  </head>

<div class="container">
    <br>
    <h1> Registro de Vehiculo Robado</h1>
  <ul class="nav nav-tabs nav-fill mb-3" role="tablist">
    <li class="nav-item active" role="presentation">
      <a class="nav-link active" href="#paso1" aria-controls="paso1" role="tab" data-bs-toggle="tab" aria-expanded="true">Paso 1</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" href="#paso2" aria-controls="paso2" role="tab" data-bs-toggle="tab" aria-expanded="false">Paso 2</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" href="#paso3" aria-controls="paso3" role="tab" data-bs-toggle="tab" aria-expanded="false">Paso 3</a>
    </li>
  </ul>

  <form action="{{route('vehiculosRobados.store')}}" method="POST">
    @csrf
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="paso1">
            <h3 class="">Información del Robo</h3>
            @include('robos.form',['modo'=>'Ingresar']);
            <div class="pull-right">
              <a class="btn btn-primary continue" id="continue">Continuar</a>
              <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Seguro que desea cancelar se perdera la informacion ingresada?')">Cancelar</a>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="paso2">
            <h3 class="">Información del Vehiculo</h3>
            @include('vehiculos.form',['modo'=>'Ingresar']);
            <div class="pull-right">
              <a class="btn btn-primary back">Regresar</a>
              <a class="btn btn-primary continue">Continuar</a>
              <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Seguro que desea cancelar se perdera la informacion ingresada?')">Cancelar</a>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="paso3">
            <h3 class="">Información del Denunciante</h3>
            @include('denunciantes.form',['modo'=>'Ingresar']);
            <div class="pull-right">
              <a class="btn btn-primary back">Regresar</a>
              <button class="btn btn-success" type="submit">Enviar</button>
              <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Seguro que desea cancelar se perdera la informacion ingresada?')">Cancelar</a>
            </div>
        </div>
    </div>
  </form>
</div>
<div id="push"></div>