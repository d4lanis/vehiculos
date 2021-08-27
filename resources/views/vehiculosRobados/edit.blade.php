@extends('layouts.layout')
@section('content')
  <div class="container">
    <br>
    <div class="panel-body sticky-top" style="background-color: white">
      <h2> Edicion de registro de Vehiculo Robado</h2>
      <ul id="main-nav" class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item active" role="tablist">
          <a class="nav-link active" href="#paso1" aria-controls="paso1" role="tab" data-toggle="tab" aria-expanded="true">Paso 1</a>
        </li>
        <li class="nav-item" role="tablist">
          <a class="nav-link" href="#paso2" aria-controls="paso2" role="tab" data-toggle="tab" aria-expanded="false">Paso 2</a>
        </li>
        <li class="nav-item" role="tablist">
          <a class="nav-link" href="#paso3" aria-controls="paso3" role="tab" data-toggle="tab" aria-expanded="false">Paso 3</a>
        </li>
      </ul>
    </div>

  <form action="{{route('vehiculosRobados.update',$robo->id)}}" method="POST">
    @csrf
    {{ method_field('PATCH') }}
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="paso1">
            <h3 class="">Información del Robo</h3>
            @include('robos.form',['modo'=>'Editar']);
            <div class="pull-right">
              <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Seguro que desea cancelar se perdera la informacion ingresada?')">Cancelar</a>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="paso2">
            <h3 class="">Información del Vehiculo</h3>
            @include('vehiculos.form',['modo'=>'Editar']);
            <div class="pull-right">
              <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Seguro que desea cancelar se perdera la informacion ingresada?')">Cancelar</a>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="paso3">
            <h3 class="">Información del Denunciante</h3>
            @include('denunciantes.form',['modo'=>'Editar']);
            <div class="pull-right">
              <button class="btn btn-success" type="submit">Enviar</button>
              <a class="btn btn-warning" href="{{route('vehiculosRobados.index')}}" onclick="return confirm('¿Seguro que desea cancelar se perdera la informacion ingresada?')">Cancelar</a>
            </div>
        </div>
    </div>
  </form>
  </div>
  <div id="push"></div>    
@endsection
@push('scripts')
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
            $select.selectize();

        }).fail(function(){
            $('#getDiv').html('algo salio mal');
        });
    }

    function clearDropdown(select)
    {
        select.empty();
        let options = [];
        options.push(`<option value="" disabled selected> Cargando datos </option>`);
        var dropdown = select.selectize();
        var selectize = dropdown[0].selectize;
        selectize.clear();
        selectize.destroy();
        select.append(options);
    }
        //form robos
        dynamicDropdown("/get_estados", {{ old('entidad_id',isset($robo->entidad_id)?$robo->entidad_id: 0) ??  0 }}, 'entidad_id');
        dynamicDropdown('/get_municipios/'+{{ old('entidad_id',isset($robo->entidad_id)?$robo->entidad_id:0) ?? 0 }}, 
            {{ old('municipio_id',isset($robo->municipio_id)?$robo->municipio_id: 0) ?? 0 }}, 'municipio_id');
        dynamicDropdown('/get_poblaciones/'+{{ old('entidad_id',isset($robo->entidad_id)?$robo->entidad_id: 0) ?? 0 }}+'/'+{{ old('municipio_id',isset($robo->municipio_id)?$robo->municipio_id:0) ?? 0 }}, 
            {{ old('localidad_id',isset($robo->localidad_id)?$robo->localidad_id:0) ?? 0 }}, 'localidad_id');
        dynamicDropdown("/get_tipolugar", {{ old('tipoLugar_id',isset($robo->tipoLugar_id)?$robo->tipoLugar_id: -1) ?? -1}}, 'tipoLugar_id');
        dynamicDropdown("/get_modalidad", {{ old('modalidad_id',isset($robo->modalidad_id)?$robo->modalidad_id:-1) ?? -1}}, 'modalidad_id');
        
        //form vehiculos
        dynamicDropdown("/get_marcas", {{ old('marca_id',isset($vehiculo->marca_id)?$vehiculo->marca_id:-1)?? -1 }}, 'marca_id');
        dynamicDropdown('/get_submarcas/'+{{ old('marca_id',isset($vehiculo->marca_id)?$vehiculo->marca_id:-1) ?? -1 }}, 
          {{ old('subMarca_id',isset($vehiculo->subMarca_id)?$vehiculo->subMarca_id:-1) ?? -1 }}, 'subMarca_id');
        dynamicDropdown("/get_colores", {{ old('color_id',isset($vehiculo->color_id)?$vehiculo->color_id:-1)?? -1 }}, 'color_id');
        dynamicDropdown("/get_tipousos", {{ old('tipoUso_id',isset($vehiculo->tipoUso_id)?$vehiculo->tipoUso_id:-1)?? -1 }}, 'tipoUso_id');
        dynamicDropdown("/get_procedencias", {{ old('procedencia_id',isset($vehiculo->procedencia_id)?$vehiculo->procedencia_id:-1)?? -1 }}, 'procedencia_id');
        dynamicDropdown("/get_clasevehiculos", {{ old('claseVehiculo_id',isset($vehiculo->claseVehiculo_id)?$vehiculo->claseVehiculo_id:-1)?? -1 }}, 'claseVehiculo_id');
        dynamicDropdown('/get_tipovehiculos/'+{{ old('claseVehiculo_id',isset($vehiculo->claseVehiculo_id)?$vehiculo->claseVehiculo_id:-1) ?? -1 }}, 
          {{ old('tipoVehiculo_id',isset($vehiculo->tipoVehiculo_id)?$vehiculo->tipoVehiculo_id:-1) ?? -1 }}, 'tipoVehiculo_id');

        //form denunciantes
        dynamicDropdown("/get_estados/", {{ old('entidad_idD',isset($denunciante->entidad_id)?$denunciante->entidad_id:0) ?? 0 }}, 'entidad_idD');
        dynamicDropdown('/get_municipios/'+{{ old('entidad_idD',isset($denunciante->entidad_id)?$denunciante->entidad_id:0) ?? 0 }}, 
        {{ old('municipio_idD',isset($denunciante->municipio_id)?$denunciante->municipio_id:0) ?? 0 }}, 'municipio_idD');
        
        $('select[name="entidad_id"]').change(function(e){
            clearDropdown( $('select[name="municipio_id"]') );
            clearDropdown( $('select[name="localidad_id"]') );
            var optionId = $('select[name="entidad_id"] option:selected').val();
            //$('#entidad').val($('#entidad_id :selected').text());
            dynamicDropdown('/get_municipios/'+optionId, 0, 'municipio_id');
        });
        $('#main-nav li a').click(function(e) {
        var targetHref = $(this).attr('href');
        $('html, body').animate({
          scrollTop: $(targetHref).offset().top}, 1000);
          e.preventDefault();
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

      $('select[name="tipoVehiculo_id"]').change(function(e){
          var optionId = $('select[name="claseVehiculo"] option:selected').val();
          //$('#tipoVehiculo').val($('#tipoVehiculo_id :selected').text());
      });

      $('select[name="tipoUso_id"]').change(function(e){
          var optionId = $('select[name="tipoUso_id"] option:selected').val();
          //$('#tipoUso').val($('#tipoUso_id :selected').text());
      });

      $('select[name="procedencia_id"]').change(function(e){
          var optionId = $('select[name="procedencia_id"] option:selected').val();
          //$('#procedencia').val($('#procedencia_id :selected').text());
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
@endpush
