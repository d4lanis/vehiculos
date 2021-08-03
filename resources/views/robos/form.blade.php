<div class="form-group">
    <label for="date">Fecha y Hora del Robo:</label>
    @if ($modo == 'Ver')
        <input type="datetime-local" name="date" class="form-control" value="{{isset($robo->dateTime)?$robo->dateTime:''}}" readonly>
    @else
        <input type="datetime-local" name="date" class="form-control" value="{{old('date',isset($robo->dateTime)?$robo->dateTime:'')}}">
    @endif

    @error('date')
        <br>
        <small class="alert alert-warning" role="alert">{{$message}}</small>
        <br>
    @enderror
    <br>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="entidad">Entidad: </label>
            <input type="hidden" name="entidad" id="entidad" value="{{old('entidad',isset($robo->entidad)?$robo->entidad:'')}}">
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="entidad_id" id="entidad_id" class="form-control">

            </select>
        </div>
        <br>
        <div class="form-group col-md-4">
            <label for="municipio">Municipio: </label>
            <input type="hidden" name="municipio" id="municipio" value="{{old('municipio',isset($robo->municipio)?$robo->municipio:'')}}">
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="municipio_id" id="municipio_id" class="form-control">
                
            </select>
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="localidad">Localidad: </label>
            <input type="hidden" name="localidad" id="localidad" value="{{old('localidad',isset($robo->localidad)?$robo->localidad:'')}}">
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="localidad_id" id="localidad_id" class="form-control">
                
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="form group col-md-6">
            <label for="calle">Calle: </label>
            @if ($modo == 'Ver')
                <input type="text" name="calle" id="calle" class="form-control" value="{{isset($robo->calle)?$robo->calle:''}}" readonly>
            @else
                <input type="text" name="calle" id="calle" class="form-control" value="{{old('calle',isset($robo->calle)?$robo->calle:'')}}" maxlength="80">
            @endif
            <br>
        </div>
        <div class="form group col-md-6">
            <label for="numExterior">Numero Exterior: </label>
            @if ($modo == 'Ver')
                <input type="text" name="numExterior" id="numExterior" class="form-control" value="{{ isset($robo->numExterior)?$robo->numExterior:'' }} " readonly>
            @else
                <input type="text" name="numExterior" id="numExterior" class="form-control" value="{{ old('numExterior',isset($robo->numExterior)?$robo->numExterior:'') }} ">
            @endif
            @error('numExterior')
            <br>
            <small class="alert alert-warning" role="alert">{{$message}}</small>
            <br>
            @enderror
            <br>
        </div>
        
    </div>
    <div class="form-group row">
        <div class="form gropu col-md-6">
            <label for="colonia">Colonia: </label>
            @if ($modo == 'Ver')
                <input type="text" name="colonia" id="colonia" class="form-control" value="{{isset($robo->colonia)?$robo->colonia:''}}" readonly>
            @else
                <input type="text" name="colonia" id="colonia" class="form-control" value="{{old('colonia',isset($robo->colonia)?$robo->colonia:'')}}" maxlength="60">
            @endif
        </div>
        <div class="form-group col-md-6">
            <label for="codigoPostal">Codigo Postal: </label>
            @if ($modo == 'Ver')
                <input type="text" name="codigoPostal" id="codigoPostal" class="form-control" value="{{isset($robo->codigoPostal)?$robo->codigoPostal:'' }}" readonly>
            @else
                <input type="text" name="codigoPostal" id="codigoPostal" class="form-control" value="{{old('codigoPostal',isset($robo->codigoPostal)?$robo->codigoPostal:'') }}">
            @endif
            @error('codigoPostal')
            <br>
            <small class="alert alert-warning" role="alert">{{$message}}</small>
            <br>
            @enderror
        </div>
    </div>
    <br>
    <label for="tipoLugar">Tipo de lugar: </label>
    <input type="hidden" name="tipoLugar" id="tipoLugar" value="{{isset($robo->tipoLugar)?$robo->tipoLugar:''}}">
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoLugar_id" id="tipoLugar_id" class="form-control">
        
    </select>
    <br>
    <label for="descLugar">Descripcion del Lugar: </label>
    @if ($modo == 'Ver')
        <textarea name="descLugar" id="descLugar" rows="5" class="form-control" readonly>
            {{isset($robo->descLugar)?$robo->descLugar:''}}
        </textarea>
    @else
        <textarea name="descLugar" id="descLugar" rows="5" class="form-control">
            {{old('descLugar',isset($robo->descLugar)?$robo->descLugar:'')}}
        </textarea>
    @endif
    <br>
    <div class="form-group row">
        <div class="form group col-md-4">
            <label for="delito">Delito: </label>
            @if ($modo == 'Ver')
                <input type="text" name="delito" id="delito" class="form-control" value="{{isset($robo->delito)?$robo->delito:''}}" readonly>
            @else
                <input type="text" name="delito" id="delito" class="form-control" value="{{old('delito',isset($robo->delito)?$robo->delito:'')}}">
            @endif
            <br>
        </div>
        <div class="form group col-md-4">
            <label for="modalidad">Modalidad: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="modalidad_id" id="modalidad_id" class="form-control">
                
            </select>
            <input type="hidden" name="modalidad" id="modalidad">
            <br>
        </div>
        <div class="form group col-md-4">
            <label for="arma">Arma asociada: </label>
            @if ($modo == 'Ver')
                <input type="text" name="armaAsociada" id="arma" class="form-control" value="{{isset($robo->armaAsociada)?$robo->armaAsociada:''}}" readonly>
            @else
                <input type="text" name="armaAsociada" id="arma" class="form-control" value="{{old('armaAsociada',isset($robo->armaAsociada)?$robo->armaAsociada:'')}}">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="dateAveriguacion">Fecha y Hora de Averiguacion: </label>
            @if ($modo == 'Ver')
                <input type="datetime-local" name="dateAveriguacion" id="dateAveriguacion" value="{{isset($robo->dateAveriguacion)?$robo->dateAveriguacion:''}}" class="form-control" readonly>
            @else
                <input type="datetime-local" name="dateAveriguacion" id="dateAveriguacion" class="form-control" value="{{old('dateAveriguacion', isset($robo->dateAveriguacion)?$robo->dateAveriguacion:'')}}">
            @endif

            @error('dateAveriguacion')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="averiguacion">Averiguacion: </label>
            @if ($modo == 'Ver')
                <input type="text" name="averiguacion" id="averiguacion" class="form-control" value="{{isset($robo->averiguacion)?$robo->averiguacion:''}}" readonly>
            @else
                <input type="text" name="averiguacion" id="averiguacion" class="form-control" value="{{old('averiguacion',isset($robo->averiguacion)?$robo->averiguacion:'')}}" maxlength="30">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="agencia_mp">Agencia Ministerio Publico: </label>
            @if ($modo == 'Ver')
                <input type="text" name="agencia_mp" id="agencia_mp" class="form-control" value="{{isset($robo->agencia_mp)?$robo->agencia_mp:''}}" readonly>
            @else
                <input type="text" name="agencia_mp" id="agencia_mp" class="form-control" value="{{old('agencia_mp',isset($robo->agencia_mp)?$robo->agencia_mp:'')}}" maxlength="40">
            @endif
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="agente_mp">Agente del Ministerio Publico</label>
            @if ($modo == 'Ver')
                <input type="text" name="agente_mp" id="agente_mp" class="form-control" value="{{isset($robo->agente_mp)?$robo->agente_mp:''}}" readonly>
            @else
                <input type="text" name="agente_mp" id="agente_mp" class="form-control" value="{{old('agente_mp',isset($robo->agente_mp)?$robo->agente_mp:'')}}" maxlength="60">
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
    
            dynamicDropdown("/get_estados", {{ old('entidad_id,') ?? isset($robo->entidad_id)?$robo->entidad_id: 0 }}, 'entidad_id');
            dynamicDropdown('/get_municipios/'+{{ old('entidad_id') ?? isset($robo->entidad_id)?$robo->entidad_id:0 }}, 
                {{ old('municipio_id') ?? isset($robo->municipio_id)?$robo->municipio_id:0 }}, 'municipio_id');
            dynamicDropdown('/get_poblaciones/'+{{ old('entidad_id') ?? isset($robo->entidad_id)?$robo->entidad_id:0 }}+'/'+{{ old('municipio_id') ?? isset($robo->municipio_id)?$robo->municipio_id:0 }}, 
                {{ old('localidad_id') ?? isset($robo->localidad_id)?$robo->localidad_id:0 }}, 'localidad_id');
            dynamicDropdown("/get_tipolugar", {{ old('tipoLugar_id') ?? isset($robo->tipoLugar_id)?$robo->tipoLugar_id:-1}}, 'tipoLugar_id');
            dynamicDropdown("/get_modalidad", {{ old('modalidad_id') ?? isset($robo->modalidad_id)?$robo->modalidad_id:-1}}, 'modalidad_id');
            
            $('select[name="entidad_id"]').change(function(e){
                clearDropdown( $('select[name="municipio_id"]') );
                clearDropdown( $('select[name="localidad_id"]') );
                var optionId = $('select[name="entidad_id"] option:selected').val();
                $('#entidad').val($('#entidad_id :selected').text());
                dynamicDropdown('/get_municipios/'+optionId, 0, 'municipio_id');
            });

        
            $('select[name="municipio_id"]').change(function(e){
                clearDropdown( $('select[name="localidad_id"]') );
                var entidadId = $('select[name="entidad_id"] option:selected').val();
                var municipioId = $('select[name="municipio_id"] option:selected').val();
                $('#municipio').val($('#municipio_id :selected').text());
                dynamicDropdown('/get_poblaciones/'+entidadId+'/'+municipioId, 0, 'localidad_id');
                
            });
    
            $('select[name="localidad_id"]').change(function(e){
                var optionId = $('select[name="localidad_id"] option:selected').val();
                $('#localidad').val($('#localidad_id :selected').text());
            });

            $('select[name="tipoLugar_id"]').change(function(e){
                var optionId = $('select[name="tipoLugar_id"] option:selected').val();
                $('#tipoLugar').val($('#tipoLugar_id :selected').text());
            });

            $('select[name="modalidad_id"]').change(function(e){
                var optionId = $('select[name="modalidad_id"] option:selected').val();
                $('#modalidad').val($('#modalidad_id :selected').text()); 
            });
        });
    </script>
</div>
