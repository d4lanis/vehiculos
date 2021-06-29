<div class="form-group">
    
    <label for="date">Fecha y Hora:</label>
    <input type="datetime-local" name="date" class="form-control" value="{{isset($robo->dateTime)?$robo->dateTime:''}}">
    <br><br>
    <label for="entidad">Entidad: </label>
    <input type="hidden" name="entidad" id="entidad" value="{{isset($robo->entidad)?$robo->entidad:''}}">
    <select name="entidad_id" id="entidad_id" class="form-control">
        @if ($modo == 'Ingresar')
            <option value="" >--Seleccione una entidad--</option>
        @endif 
    
        @foreach ($data['entidad'] as $entidad)
            <option value="{{$entidad['entidad_id']}}"  {{ isset($robo->entidad_id)? $robo->entidad_id == $entidad['entidad_id'] ? 'selected="selected"' : '':'' }}>{{$entidad['nombre']}}</option>
        @endforeach
    </select>
    <br><br>
    <label for="municipio">Municipio: </label>
    <input type="hidden" name="municipio" id="municipio" value="{{isset($robo->municipio)?$robo->municipio:''}}">
    <select name="municipio_id" id="municipio_id" class="form-control">
        @if ($modo == 'Editar')
        <option value="{{isset($robo->municipio_id)?$robo->municipio_id:''}}">{{isset($robo->municipio_id)?$robo->municipio:''}}</option>  
        @else
            <option>Cargando datos...</option>
        @endif
    </select>
    <br><br>
    <label for="localidad">Localidad: </label>
    <input type="hidden" name="localidad" id="localidad" value="{{isset($robo->localidad)?$robo->localidad:''}}">
    <select name="localidad_id" id="localidad_id" class="form-control">
        @if ($modo == 'Editar')
        <option value="{{isset($robo->localidad_id)?$robo->localidad_id:''}}">{{isset($robo->localidad_id)?$robo->localidad:''}}</option>
            
        @else
            <option>Cargando datos...</option>
        @endif
    </select>
    <br><br>
    <label for="calle">Calle: </label>
    <input type="text" name="calle" id="calle" class="form-control" value="{{isset($robo->calle)?$robo->calle:''}}">
    <br><br>
    <label for="numExterior">Numero Exterior: </label>
    <input type="text" name="numExterior" id="numExterior" class="form-control" value="{{ isset($robo->numExterior)?$robo->numExterior:'' }} ">
    <br><br>
    <label for="codigoPostal">Codigo Postal: </label>
    <input type="number" name="codigoPostal" id="codigoPostal" class="form-control" value="{{isset($robo->codigoPostal)?$robo->codigoPostal:'' }}">
    <br><br>
    <label for="tipoLugar">Tipo de lugar: </label>
    <input type="hidden" name="tipoLugar" id="tipoLugar" value="{{isset($robo->tipoLugar)?$robo->tipoLugar:''}}">
    <select name="tipoLugar_id" id="tipoLugar_id" class="form-control">
        @if ($modo == 'Ingresar')
            <option value="" >--Seleccione el lugar de los hechos--</option>
        @endif
        
        @foreach ($data['lugar'] as $lugar)
            <option value="{{$lugar['lugar_id']}}" {{ isset($robo->tipoLugar_id)? $robo->tipoLugar_id == $lugar['lugar_id'] ? 'selected="selected"' : '':'' }}>{{$lugar['descripcion']}}</option>
        @endforeach
    </select>
    <br><br>
    <label for="descLugar">Descripcion del Lugar: </label>
    <textarea name="descLugar" id="descLugar" cols="15" rows="10" class="form-control">
        {{isset($robo->descLugar)?$robo->descLugar:''}}
    </textarea>
    <br><br>
    <label for="delito">Delito: </label>
    <input type="text" name="delito" id="delito" class="form-control" value="{{isset($robo->delito)?$robo->delito:''}}">
    <br><br>
    <label for="arma">Arma asociada: </label>
    <input type="text" name="armaAsociada" id="arma" class="form-control" value="{{isset($robo->armaAsociada)?$robo->armaAsociada:''}}">
    <br><br>
    <label for="estatus">Estatus: </label>
    <input type="hidden" name="estatus" id="estatus" value="{{isset($robo->estatus)?$robo->estatus:''}}">
    <select name="estatus_id" id="estatus_id" class="form-control">
        @if ($modo == 'Ingresar')
            <option value="" >--Seleccione el estatus de la denuncia--</option>
        @endif
        @foreach ($data['estatus'] as $estatus)
            <option value="{{$estatus['estatus_id']}}" {{ isset($robo->estatus_id)? $robo->estatus_id == $estatus['estatus_id'] ? 'selected="selected"' : '':'' }}>{{$estatus['descripcion']}}</option>
        @endforeach
    </select>
    <br><br>
</div>
