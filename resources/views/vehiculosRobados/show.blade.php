<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap-theme.min.css')}}" crossorigin="anonymous">
    <script src="{{asset('bootstrap-5/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('font_awesome/css/font-awesome.min.css')}}">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}"/>
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}"></script>
    <script src="{{asset('js/navegacion.js')}}"></script>
  </head>

<div class="container">
    <br>
    <h1>Denuncia de Vehiculos Robados</h1>
  <ul class="nav nav-tabs nav-fill mb-3" role="tablist">
    <li class="nav-item active" role="presentation">
      <a class="nav-link active" href="#paso1" aria-controls="paso1" role="tab" data-bs-toggle="tab" aria-expanded="true">Información del Robo</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" href="#paso2" aria-controls="paso2" role="tab" data-bs-toggle="tab" aria-expanded="false">Información del Vehiculo</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" href="#paso3" aria-controls="paso3" role="tab" data-bs-toggle="tab" aria-expanded="false">Informacion del Denunciante</a>
    </li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="paso1">
        @include('robos.form',['modo'=>'Ver']);
        <div class="pull-right">
          <a class="btn btn-primary continue" id="continue">Pagina siguiente</a>
          <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Regresar a la Pagina Principal?')">Regresar</a>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="paso2">
        @include('vehiculos.form',['modo'=>'Ver']);
        <div class="pull-right">
          <a class="btn btn-primary back">Pagina anterior</a>
          <a class="btn btn-primary continue">Pagina Siguiente</a>
          <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Regresar a la Pagina Principal?')">Regresar</a>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="paso3">
        @include('denunciantes.form',['modo'=>'Ver']);
        <div class="pull-right">
          <a class="btn btn-primary back">Pagina anterior</a>
          <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Regresar a la Pagina Principal?')">Regresar</a>
        </div>
    </div>
</div>
</div>
<div id="push"></div>