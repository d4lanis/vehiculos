<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.8/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.8/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/navegacion.js')}}"></script>
    <script src="{{asset('js/vehiculo.js')}}"></script>
    <script src="{{asset('js/robo.js')}}"></script>
    <script src="{{asset('js/denunciante.js')}}"></script>
  </head>

<div class="container">
    <br>
    <h1>Denuncia de Vehiculos Robados</h1>
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

  <form action="">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="paso1">
            <h3 class="">Información del Robo</h3>
            @include('robos.form',['modo'=>'Editar']);
            <div class="pull-right">
              <a class="btn btn-primary continue" id="continue">Continuar</a>
              <a class="btn btn-warning" href="">Cancelar</a>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="paso2">
            <h3 class="">Información del Vehiculo</h3>
            @include('vehiculos.form',['modo'=>'Editar']);
            <div class="pull-right">
              <a class="btn btn-primary back">Regresar</a>
              <a class="btn btn-primary continue">Continuar</a>
              <a class="btn btn-warning" href="">Cancelar</a>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="paso3">
            <h3 class="">Información del Denunciante</h3>
            @include('denunciantes.form',['modo'=>'Editar']);
            <div class="pull-right">
              <a class="btn btn-primary back">Regresar</a>
              <button class="btn btn-success" type="submit">Enviar</button>
              <a class="btn btn-warning">Cancelar</a>
            </div>
        </div>
    </div>
  </form>
</div>
<div id="push"></div>