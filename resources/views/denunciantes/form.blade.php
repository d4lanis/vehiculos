<div class="form-group">
    <label for="nombre">Nombre: </label>
    @if ($modo == 'Ver')
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($denunciante->nombre)?$denunciante->nombre:''}}" readonly>
    @else
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($denunciante->nombre)?$denunciante->nombre:''}}">
    @endif
    <br><br>
    <label for="paterno">Apellido Paterno: </label>
    @if ($modo == 'Ver')
        <input type="text" name="paterno" id="paterno" class="form-control" value="{{isset($denunciante->paterno)?$denunciante->paterno:''}}" readonly>
    @else
        <input type="text" name="paterno" id="paterno" class="form-control" value="{{isset($denunciante->paterno)?$denunciante->paterno:''}}">
    @endif
    <br><br>
    <label for="materno">Apellido Materno: </label>
    @if ($modo == 'Ver')
        <input type="text" name="materno" id="materno" class="form-control" value="{{isset($denunciante->materno)?$denunciante->materno:''}}" readonly>
    @else
        <input type="text" name="materno" id="materno" class="form-control" value="{{isset($denunciante->materno)?$denunciante->materno:''}}">
    @endif
    <br><br>
    <label for="rfc">RFC: </label>
    @if ($modo == 'Ver')
        <input type="text" name="rfc" id="rfc" class="form-control" value="{{isset($denunciante->rfc)?$denunciante->rfc:''}}" readonly>
    @else
        <input type="text" name="rfc" id="rfc" class="form-control" value="{{isset($denunciante->rfc)?$denunciante->rfc:''}}">
    @endif
    <br><br>
    <label for="curp">CURP: </label>
    @if ($modo == 'Ver')
        <input type="text" name="curp" id="curp" class="form-control" value="{{isset($denunciante->curp)?$denunciante->curp:''}}" readonly>
    @else
        <input type="text" name="curp" id="curp" class="form-control" value="{{isset($denunciante->curp)?$denunciante->curp:''}}">
    @endif
    <br><br>
    <label for="licencia">Licencia de Conduccion: </label>
    @if ($modo == 'Ver')
        <input type="text" name="licencia" id="licencia" class="form-control" value="{{isset($denunciante->licencia)?$denunciante->licencia:''}}" readonly>
    @else
        <input type="text" name="licencia" id="licencia" class="form-control" value="{{isset($denunciante->licencia)?$denunciante->licencia:''}}">
    @endif
    <br><br>
    <label for="pasaporte">Pasaporte: </label>
    @if ($modo == 'Ver')
        <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{isset($denunciante->pasaporte)?$denunciante->pasaporte:''}}" readonly>
    @else
        <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{isset($denunciante->pasaporte)?$denunciante->pasaporte:''}}">
    @endif
    <br><br>
    <label for="telefono">Telefono: </label>
    @if ($modo == 'Ver')
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($denunciante->telefono)?$denunciante->telefono:''}}" readonly>
    @else
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($denunciante->telefono)?$denunciante->telefono:''}}">
    @endif
    <br><br>
    <label for="correo">Correo: </label>
    @if ($modo == 'Ver')
        <input type="email" name="correo" id="correo" class="form-control" value="{{isset($denunciante->correo)?$denunciante->correo:''}}" readonly>
    @else
        <input type="email" name="correo" id="correo" class="form-control" value="{{isset($denunciante->correo)?$denunciante->correo:''}}">
    @endif
    <br><br>
    <label for="domicilio">Domicilio: </label>
    @if ($modo == 'Ver')
        <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{isset($denunciante->domicilio)?$denunciante->domicilio:''}}" readonly>
    @else
        <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{isset($denunciante->domicilio)?$denunciante->domicilio:''}}">
    @endif
    <br><br>
    <label for="numExterior">Numero Exterior: </label>
    @if ($modo == 'Ver')
        <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{isset($denunciante->numExterior)?$denunciante->numExterior:''}}" readonly>
    @else
        <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{isset($denunciante->numExterior)?$denunciante->numExterior:''}}">
    @endif
    <br><br>
    <label for="numInterior">Numero Interior: </label>
    @if ($modo == 'Ver')
        <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{isset($denunciante->numInterior)?$denunciante->numInterior:''}}" readonly>
    @else
        <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{isset($denunciante->numInterior)?$denunciante->numInterior:''}}">
    @endif
    <br><br>
    <label for="codigoPostal">Codigo Postal: </label>
    @if ($modo == 'Ver')
        <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{isset($denunciante->codigoPostal)?$denunciante->codigoPostal:''}}" readonly>
    @else
        <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{isset($denunciante->codigoPostal)?$denunciante->codigoPostal:''}}">
    @endif
    <br><br>
    <label for="entidad">Entidad: </label>
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="entidad_idD" id="entidad_idD" class="form-control" >
        @if ($modo == 'Editar')
            @foreach ($data['entidad'] as $entidad)
                <option value="{{$entidad['entidad_id']}}"  {{ isset($denunciante->entidad_id)? $denunciante->entidad_id == $entidad['entidad_id'] ? 'selected="selected"' : '':'' }}>{{$entidad['nombre']}}</option>
            @endforeach
        @elseif($modo == 'Ver')
            <option value="">{{isset($denunciante->entidad)?$denunciante->entidad:''}}</option>
        @else
            <option value="" >--Seleccione una entidad--</option>
            @foreach ($data['entidad'] as $entidad)
                <option value="{{$entidad['entidad_id']}}"  {{ isset($denunciante->entidad_id)? $denunciante->entidad_id == $entidad['entidad_id'] ? 'selected="selected"' : '':'' }}>{{$entidad['nombre']}}</option>
            @endforeach
        @endif 
    </select>
    <input type="hidden" name="entidadD" id="entidadD" class="form-control" value="{{isset($denunciante->entidad)?$denunciante->entidad:''}}">
    <br><br>
    <label for="municipio">Municipio: </label>
    <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="municipio_idD" id="municipio_idD" class="form-control">
        @if ($modo == 'Editar')
            <option value="{{isset($denunciante->municipio_id)?$denunciante->municipio_id:''}}">{{isset($denunciante->municipio_id)?$denunciante->municipio:''}}</option>
        @elseif($modo == 'Ver')
            <option value="{{isset($denunciante->municipio_id)?$denunciante->municipio_id:''}}">{{isset($denunciante->municipio_id)?$denunciante->municipio:''}}</option>
        @else
            <option value="">Cargando datos...</option>
        @endif
    </select>
    <input type="hidden" name="municipioD" id="municipioD" class="form-control" value="{{isset($denunciante->municipio)?$denunciante->municipio:''}}">
    <br><br>
    <label for="colonia">Colonia: </label>
    @if ($modo == 'Ver')
        <input type="text" name="coloniaD" id="coloniaD" class="form-control" value="{{isset($denunciante->colonia)?$denunciante->colonia:''}}" readonly>
    @else
        <input type="text" name="coloniaD" id="coloniaD" class="form-control" value="{{isset($denunciante->colonia)?$denunciante->colonia:''}}">
    @endif
    <br><br> 
</div>
