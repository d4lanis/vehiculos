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
        
        <script type="text/javascript">
          $(document).ready(function() {
      
              
              $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }});
          
              function dynamicDropdown(url, id = null, target, otro = null) {
  
              let data = {
                  "_token": "{{ csrf_token() }}",
                  id: id
              }
      
              $.post(url, data, function(result){
                  let default_value = 0;
                  let $select = $("#"+target);
                  $select.empty();
                  let options = [];
      
                  if(null == data.id){
                      options.push(`<option value="" selected>`+
                          ` - seleccione una opción</option>`);
                  } else {
                      options.push(`<option value=""> -------------- </option>`);
                      default_value = data.id;
                  }
      
                  if(result.status === 'ok'){
                      $.each(result.data, function(i, item) {
                          item_name = item.name.toUpperCase();
                          if(item.id == default_value){
                              options.push(`<option value="${item.id}" selected>${item_name}</option>`);
                          } else {
                              options.push(`<option value="${item.id}">${item_name}</option>`);
                          }
      
                      });
                      if (null != otro) {
                           options.push(`<option value="1">`+otro+`</option>`);
                      }
                  }
                  
                  $select.append(options);
      
              }).fail(function(){
                  $('#getDiv').html('algo salio mal');
              });
          }
      
          function clearDropdown(select)
          {
              select.empty();
              let options = [];
              options.push(`<option value="" disabled selected> Cargando datos </option>`);
              select.append(options);
          }
              //form robos
              dynamicDropdown('/get_estados',{{ old('entidad_id')?? 0}}, 'entidad_id')
              dynamicDropdown('/get_municipios/'+{{ old('entidad_id') ??  0 }},{{ old('municipio_id') ??  0 }}, 'municipio_id');
              dynamicDropdown('/get_poblaciones/'+{{ old('entidad_id') ??  0 }}+'/'+{{ old('municipio_id') ??  0 }}, 
                  {{ old('localidad_id') ??  0 }}, 'localidad_id');
              dynamicDropdown("/get_tipolugar", {{ old('tipoLugar_id') ??  -1}}, 'tipoLugar_id');
              dynamicDropdown("/get_modalidad", {{ old('modalidad_id') ?? -1}}, 'modalidad_id');
              
              //form vehiculos
              dynamicDropdown("/get_marcas", {{ old('marca_id')??  -1 }}, 'marca_id');
              dynamicDropdown('/get_submarcas/'+{{ old('marca_id') ??  -1 }}, 
                {{ old('subMarca_id') ??  -1 }}, 'subMarca_id');
              dynamicDropdown("/get_colores", {{ old('color_id')??  -1 }}, 'color_id');
              dynamicDropdown("/get_tipousos", {{ old('tipoUso_id') ?? -1 }}, 'tipoUso_id');
              dynamicDropdown("/get_procedencias", {{ old('procedencia_id')??  -1 }}, 'procedencia_id');
              dynamicDropdown("/get_clasevehiculos", {{ old('claseVehiculo_id')??  -1 }}, 'claseVehiculo_id');
              dynamicDropdown('/get_tipovehiculos/'+{{ old('claseVehiculo_id') ??  -1 }}, 
                {{ old('tipoVehiculo_id') ??  -1 }}, 'tipoVehiculo_id');

              //form denunciantes
              dynamicDropdown("/get_estados/", {{ old('entidad_idD') ??  0 }}, 'entidad_idD');
              dynamicDropdown('/get_municipios/'+{{ old('entidad_idD') ??  0 }}, 
              {{ old('municipio_idD') ??  0 }}, 'municipio_idD');
              
              $('select[name="entidad_id"]').change(function(e){
                  clearDropdown( $('select[name="municipio_id"]') );
                  clearDropdown( $('select[name="localidad_id"]') );
                  var optionId = $('select[name="entidad_id"] option:selected').val();
                  //$('#entidad').val($('#entidad_id :selected').text());
                  dynamicDropdown('/get_municipios/'+optionId, 0, 'municipio_id');
              });
  
          
              $('select[name="municipio_id"]').change(function(e){
                  clearDropdown( $('select[name="localidad_id"]') );
                  var entidadId = $('select[name="entidad_id"] option:selected').val();
                  var municipioId = $('select[name="municipio_id"] option:selected').val();
                  //$('#municipio').val($('#municipio_id :selected').text());
                  dynamicDropdown('/get_poblaciones/'+entidadId+'/'+municipioId, 0, 'localidad_id');
                  
              });
      
              $('select[name="localidad_id"]').change(function(e){
                  var optionId = $('select[name="localidad_id"] option:selected').val();
                  //$('#localidad').val($('#localidad_id :selected').text());
              });
  
              $('select[name="tipoLugar_id"]').change(function(e){
                  var optionId = $('select[name="tipoLugar_id"] option:selected').val();
                  //$('#tipoLugar').val($('#tipoLugar_id :selected').text());
              });
  
              $('select[name="modalidad_id"]').change(function(e){
                  var optionId = $('select[name="modalidad_id"] option:selected').val();
                  //$('#modalidad').val($('#modalidad_id :selected').text()); 
              });

              $('select[name="marca_id"]').change(function(e){
                clearDropdown( $('select[name="subMarca_id"]') );
                clearDropdown( $('select[name="subMarca_id"]') );
                var optionId = $('select[name="marca_id"] option:selected').val();
                //$('#marca').val($('#marca_id :selected').text());
                dynamicDropdown('/get_submarcas/'+optionId, -1, 'subMarca_id');
            });
    
            $('select[name="subMarca_id"]').change(function(e){
                var optionId = $('select[name="marca_id"] option:selected').val();
                //$('#subMarca').val($('#subMarca_id :selected').text());
            });

            $('select[name="color_id"]').change(function(e){
                var optionId = $('select[name="color_id"] option:selected').val();
                //$('#color').val($('#color_id :selected').text());
            });

            $('select[name="claseVehiculo_id"]').change(function(e){
                clearDropdown( $('select[name="tipoVehiculo_id"]') );
                clearDropdown( $('select[name="tipoVehiculo_id"]') );
                var optionId = $('select[name="claseVehiculo_id"] option:selected').val();
                //$('#claseVehiculo').val($('#claseVehiculo_id :selected').text());
                dynamicDropdown('/get_tipovehiculos/'+optionId, -1, 'tipoVehiculo_id');
            });
    
            $('select[name="tipoVehiculo"]').change(function(e){
                var optionId = $('select[name="claseVehiculo_id"] option:selected').val();
               // $('#tipoVehiculo').val($('#tipoVehiculo_id :selected').text());
            });

            $('select[name="tipoUso_id"]').change(function(e){
                var optionId = $('select[name="tipoUso_id"] option:selected').val();
               // $('#tipoUso').val($('#tipoUso_id :selected').text());
            });

            $('select[name="procedencia_id"]').change(function(e){
                var optionId = $('select[name="procedencia_id"] option:selected').val();
               // $('#procedencia').val($('#procedencia_id :selected').text());
            });

            $('select[name="entidad_idD"]').change(function(e){
              clearDropdown( $('select[name="municipio_idD"]') );
              clearDropdown( $('select[name="localidad_idD"]') );
              var optionId = $('select[name="entidad_idD"] option:selected').val();
              //$('#entidadD').val($('#entidad_idD :selected').text());
              dynamicDropdown('/get_municipios/'+optionId, 0, 'municipio_idD');
            });

            $('select[name="municipio_idD"]').change(function(e){
              clearDropdown( $('select[name="localidad_idD"]') );
              var optionId = $('select[name="municipio_idD"] option:selected').val();
              //$('#municipioD').val($('#municipio_idD :selected').text());
            });

          });
      </script>
    </div>
  </form>
</div>
<div id="push"></div>