<div class="form-group">
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="marca">Marca del Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="marca_id" id="marca_id" class="form-control">
                
            </select>
            @error('marca_id')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <input type="hidden" name="marca" id="marca" class="form-control" value="{{old('marca',isset($vehiculo->marca)?$vehiculo->marca:'')}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="submarca">Submarca del Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="subMarca_id" id="subMarca_id" class="form-control">

            </select>
            <input type="hidden" value="{{old('subMarca',isset($vehiculo->subMarca)?$vehiculo->subMarca:'')}}" name="subMarca" id="subMarca" class="form-control">
            @error('marca_id')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="modelo">Modelo: </label>
            @if ($modo == 'Ver')
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}" readonly>
            @else
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo',isset($vehiculo->modelo)?$vehiculo->modelo:'')}}" maxlength="4">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="color">Color:</label>
            <select  {{($modo == 'Ver')?'disabled="disabled"':''}} name="color_id" id="color_id" class="form-control">
               
            </select>
            <input type="hidden" name="color" id="color" class="form-control" value="{{old('color',isset($vehiculo->color)?$vehiculo->color:'')}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="numSerie">Numero de Serie: </label>
            @if ($modo == 'Ver')
            <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{isset($vehiculo->numSerie)?$vehiculo->numSerie:''}}" readonly>
            @else
            <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{old('numSerie',isset($vehiculo->numSerie)?$vehiculo->numSerie:'')}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="placa">Numero de Placa: </label>
            @if ($modo == 'Ver')
                <input type="text" name="placa" id="placa" class="form-control" value="{{isset($vehiculo->placa)?$vehiculo->placa:''}}" readonly>
            @else
                <input type="text" name="placa" id="placa" class="form-control" value="{{old('placa',isset($vehiculo->placa)?$vehiculo->placa:'')}}" maxlength="10">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="claseVehiculo">Clase de Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="claseVehiculo_id" id="claseVehiculo_id" class="form-control">
                
            </select>
            <input type="hidden" name="claseVehiculo" id="claseVehiculo" class="form-control" value="{{old('claseVehiculo',isset($vehiculo->claseVehiculo)?$vehiculo->claseVehiculo:'')}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="tipoVehiculo">Tipo de Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoVehiculo_id" id="tipoVehiculo_id" class="form-control">
                
            </select>
            <input type="hidden" name="tipoVehiculo" id="tipoVehiculo" class="form-control" value="{{old('tipoVehiculo',isset($vehiculo->tipoVehiculo)?$vehiculo->tipoVehiculo:'')}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="tipoUso">Tipo de Uso: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoUso_id" id="tipoUso_id" class="form-control">
                
            </select>
            <input type="hidden" name="tipoUso" id="tipoUso"  class="form-control" value="{{old('tipoUso',isset($vehiculo->tipoUso)?$vehiculo->tipoUso:'')}}">
            <br>
        </div>
    </div>
    
    <label for="señas">Señas: </label>
    @if ($modo == 'Ver')
        <textarea name="señas" id="señas" rows="5" class="form-control" readonly>{{isset($vehiculo->señas)?$vehiculo->señas:''}}</textarea>
    @else
    <textarea name="señas" id="señas" rows="5" class="form-control">{{old('señas',isset($vehiculo->señas)?$vehiculo->señas:'')}}</textarea>
    @endif
    <br>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="procedencia">Procedencia: </label>
            <select  {{($modo == 'Ver')?'disabled="disabled"':''}} name="procedencia_id" id="procedencia_id" class="form-control">
                
            </select>
            <input type="hidden" name="procedencia" id="procedencia" class="form-control" value="{{old('procedencia',isset($vehiculo->procedencia)?$vehiculo->procedencia:'')}}">
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="aseguradora">Aseguradora: </label>
            @if ($modo == 'Ver')
                <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{isset($vehiculo->aseguradora)?$vehiculo->aseguradora:''}}" readonly>
            @else
                <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{old('aseguradora',isset($vehiculo->aseguradora)?$vehiculo->aseguradora:'')}}">
            @endif
            <br>
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
    
            dynamicDropdown("/get_marcas", {{ old('marca_id')?? isset($vehiculo->marca_id)?$vehiculo->marca_id:-1 }}, 'marca_id');
            dynamicDropdown('/get_submarcas/'+{{ old('marca_id') ?? isset($vehiculo->marca_id)?$vehiculo->marca_id:-1 }}, 
                {{ old('subMarca_id') ?? isset($vehiculo->subMarca_id)?$vehiculo->subMarca_id:-1 }}, 'subMarca_id');
            dynamicDropdown("/get_colores", {{ old('color_id')?? isset($vehiculo->color_id)?$vehiculo->color_id:-1 }}, 'color_id');
            dynamicDropdown("/get_tipousos", {{ old('tipoUso_id')?? isset($vehiculo->tipoUso_id)?$vehiculo->tipoUso_id:-1 }}, 'tipoUso_id');
            dynamicDropdown("/get_procedencias", {{ old('procedencia_id')?? isset($vehiculo->procedencia_id)?$vehiculo->procedencia_id:-1 }}, 'procedencia_id');
            dynamicDropdown("/get_clasevehiculos", {{ old('claseVehiculo_id')?? isset($vehiculo->claseVehiculo_id)?$vehiculo->claseVehiculo_id:-1 }}, 'claseVehiculo_id');
            dynamicDropdown('/get_tipovehiculos/'+{{ old('claseVehiculo_id') ?? isset($vehiculo->claseVehiculo_id)?$vehiculo->claseVehiculo_id:-1 }}, 
                {{ old('tipoVehiculo_id') ?? isset($vehiculo->tipoVehiculo_id)?$vehiculo->tipoVehiculo_id:-1 }}, 'tipoVehiculo_id');
            
            $('select[name="marca_id"]').change(function(e){
                clearDropdown( $('select[name="subMarca_id"]') );
                clearDropdown( $('select[name="subMarca_id"]') );
                var optionId = $('select[name="marca_id"] option:selected').val();
                $('#marca').val($('#marca_id :selected').text());
                dynamicDropdown('/get_submarcas/'+optionId, -1, 'subMarca_id');
            });
    
            $('select[name="subMarca_id"]').change(function(e){
                var optionId = $('select[name="marca_id"] option:selected').val();
                $('#subMarca').val($('#subMarca_id :selected').text());
            });

            $('select[name="color_id"]').change(function(e){
                var optionId = $('select[name="color_id"] option:selected').val();
                $('#color').val($('#color_id :selected').text());
            });

            $('select[name="claseVehiculo_id"]').change(function(e){
                clearDropdown( $('select[name="tipoVehiculo_id"]') );
                clearDropdown( $('select[name="tipoVehiculo_id"]') );
                var optionId = $('select[name="claseVehiculo_id"] option:selected').val();
                $('#marca').val($('#claseVehiculo_id :selected').text());
                dynamicDropdown('/get_tipovehiculos/'+optionId, -1, 'tipoVehiculo_id');
            });
    
            $('select[name="tipoVehiculo"]').change(function(e){
                var optionId = $('select[name="claseVehiculo"] option:selected').val();
                $('#subMarca').val($('#tipoVehiculo :selected').text());
            });

            $('select[name="tipoUso_id"]').change(function(e){
                var optionId = $('select[name="tipoUso_id"] option:selected').val();
                $('#tipoUso').val($('#tipoUso_id :selected').text());
            });

            $('select[name="procedencia_id"]').change(function(e){
                var optionId = $('select[name="procedencia_id"] option:selected').val();
                $('#procedencia').val($('#procedencia_id :selected').text());
            });
        });
    </script>
</div>