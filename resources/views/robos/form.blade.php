<div class="form-group">
    
    <label for="date">Fecha y Hora:</label>
    @if ($modo == 'Ver')
        <input type="datetime-local" name="date" class="form-control" value="{{isset($robo->dateTime)?$robo->dateTime:''}}" readonly>
    @else
        <input type="datetime-local" name="date" class="form-control" value="{{isset($robo->dateTime)?$robo->dateTime:''}}">
    @endif
    <br><br>
    <label for="entidad">Entidad: </label>
    <input type="hidden" name="entidad" id="entidad" value="{{isset($robo->entidad)?$robo->entidad:''}}">
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="entidad_id" id="entidad_id" class="form-control">
        @if ($modo == 'Editar')
            @foreach ($data['entidad'] as $entidad)
                <option value="{{$entidad['entidad_id']}}"  {{ isset($robo->entidad_id)? $robo->entidad_id == $entidad['entidad_id'] ? 'selected="selected"' : '':'' }}>{{$entidad['nombre']}}</option>
            @endforeach    
        @elseif($modo == 'Ver')
            <option value="">{{isset($robo->entidad)?$robo->entidad:''}}</option>
        @else
            <option value="" >--Seleccione una entidad--</option>
            @foreach ($data['entidad'] as $entidad)
                <option value="{{$entidad['entidad_id']}}"  {{ isset($robo->entidad_id)? $robo->entidad_id == $entidad['entidad_id'] ? 'selected="selected"' : '':'' }}>{{$entidad['nombre']}}</option>
            @endforeach 
        @endif 
    </select>
    <br><br>
    <label for="municipio">Municipio: </label>
    <input type="hidden" name="municipio" id="municipio" value="{{isset($robo->municipio)?$robo->municipio:''}}">
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="municipio_id" id="municipio_id" class="form-control">
        @if ($modo == 'Editar')
            <option value="{{isset($robo->municipio_id)?$robo->municipio_id:''}}">{{isset($robo->municipio_id)?$robo->municipio:''}}</option>  
        
        @elseif($modo == 'Ver')
            <option value="{{isset($robo->municipio_id)?$robo->municipio_id:''}}">{{isset($robo->municipio_id)?$robo->municipio:''}}</option>

        @else
            <option>Cargando datos...</option>
        @endif
    </select>
    <br><br>
    <label for="localidad">Localidad: </label>
    <input type="hidden" name="localidad" id="localidad" value="{{isset($robo->localidad)?$robo->localidad:''}}">
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="localidad_id" id="localidad_id" class="form-control">
        @if ($modo == 'Editar')
            <option value="{{isset($robo->localidad_id)?$robo->localidad_id:''}}">{{isset($robo->localidad_id)?$robo->localidad:''}}</option>
        
        @elseif($modo == 'Ver')
            <option value="{{isset($robo->localidad_id)?$robo->localidad_id:''}}">{{isset($robo->localidad_id)?$robo->localidad:''}}</option>

        @else
            <option>Cargando datos...</option>
        @endif
    </select>
    <br><br>
    <label for="calle">Calle: </label>
    @if ($modo == 'Ver')
        <input type="text" name="calle" id="calle" class="form-control" value="{{isset($robo->calle)?$robo->calle:''}}" readonly>
    @else
        <input type="text" name="calle" id="calle" class="form-control" value="{{isset($robo->calle)?$robo->calle:''}}">
    @endif
    <br><br>
    <label for="numExterior">Numero Exterior: </label>
    @if ($modo == 'Ver')
        <input type="text" name="numExterior" id="numExterior" class="form-control" value="{{ isset($robo->numExterior)?$robo->numExterior:'' }} " readonly>
    @else
        <input type="text" name="numExterior" id="numExterior" class="form-control" value="{{ isset($robo->numExterior)?$robo->numExterior:'' }} ">
    @endif
    <br><br>
    <label for="codigoPostal">Codigo Postal: </label>
    @if ($modo == 'Ver')
        <input type="text" name="codigoPostal" id="codigoPostal" class="form-control" value="{{isset($robo->codigoPostal)?$robo->codigoPostal:'' }}" readonly>
    @else
        <input type="text" name="codigoPostal" id="codigoPostal" class="form-control" value="{{isset($robo->codigoPostal)?$robo->codigoPostal:'' }}">
    @endif
    <br><br>
    <label for="tipoLugar">Tipo de lugar: </label>
    <input type="hidden" name="tipoLugar" id="tipoLugar" value="{{isset($robo->tipoLugar)?$robo->tipoLugar:''}}">
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoLugar_id" id="tipoLugar_id" class="form-control">
        @if ($modo == 'Editar')
            @foreach ($data['lugar'] as $lugar)
                <option value="{{$lugar['lugar_id']}}" {{ isset($robo->tipoLugar_id)? $robo->tipoLugar_id == $lugar['lugar_id'] ? 'selected="selected"' : '':'' }}>{{$lugar['descripcion']}}</option>
            @endforeach   
        @elseif($modo == 'Ver')
            <option value="">{{isset($robo->tipoLugar)?$robo->tipoLugar:''}}</option>
        @else
            <option value="" >--Seleccione el lugar de los hechos--</option>
            @foreach ($data['lugar'] as $lugar)
                <option value="{{$lugar['lugar_id']}}" {{ isset($robo->tipoLugar_id)? $robo->tipoLugar_id == $lugar['lugar_id'] ? 'selected="selected"' : '':'' }}>{{$lugar['descripcion']}}</option>
            @endforeach 
        @endif
    </select>
    <br><br>
    <label for="descLugar">Descripcion del Lugar: </label>
    @if ($modo == 'Ver')
        <textarea name="descLugar" id="descLugar" rows="10" class="form-control" readonly>
            {{isset($robo->descLugar)?$robo->descLugar:''}}
        </textarea>
    @else
        <textarea name="descLugar" id="descLugar" rows="10" class="form-control">
            {{isset($robo->descLugar)?$robo->descLugar:''}}
        </textarea>
    @endif
    <br><br>
    <label for="delito">Delito: </label>
    @if ($modo == 'Ver')
        <input type="text" name="delito" id="delito" class="form-control" value="{{isset($robo->delito)?$robo->delito:''}}" readonly>
    @else
        <input type="text" name="delito" id="delito" class="form-control" value="{{isset($robo->delito)?$robo->delito:''}}">
    @endif
    <br><br>
    <label for="arma">Arma asociada: </label>
    @if ($modo == 'Ver')
        <input type="text" name="armaAsociada" id="arma" class="form-control" value="{{isset($robo->armaAsociada)?$robo->armaAsociada:''}}" readonly>
    @else
        <input type="text" name="armaAsociada" id="arma" class="form-control" value="{{isset($robo->armaAsociada)?$robo->armaAsociada:''}}">
    @endif
    <br><br>
    <label for="estatus">Estatus: </label>
    <input type="hidden" name="estatus" id="estatus" value="{{isset($robo->estatus)?$robo->estatus:''}}">
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="estatus_id" id="estatus_id" class="form-control">
        @if ($modo == 'Editar')
            @foreach ($data['estatus'] as $estatus)
                <option value="{{$estatus['estatus_id']}}" {{ isset($robo->estatus_id)? $robo->estatus_id == $estatus['estatus_id'] ? 'selected="selected"' : '':'' }}>{{$estatus['descripcion']}}</option>
            @endforeach
        @elseif($modo == 'Ver')
            <option value="">{{isset($robo->estatus)?$robo->estatus:''}}</option>
        @else
            <option value="" >--Seleccione el estatus de la denuncia--</option>
            @foreach ($data['estatus'] as $estatus)
                <option value="{{$estatus['estatus_id']}}" {{ isset($robo->estatus_id)? $robo->estatus_id == $estatus['estatus_id'] ? 'selected="selected"' : '':'' }}>{{$estatus['descripcion']}}</option>
            @endforeach
        @endif
    </select>
    <br><br>
</div>
