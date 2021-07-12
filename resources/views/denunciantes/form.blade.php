<div class="form-group">
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="nombre">Nombre: </label>
            @if ($modo == 'Ver')
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($denunciante->nombre)?$denunciante->nombre:''}}" readonly>
            @else
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($denunciante->nombre)?$denunciante->nombre:''}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="paterno">Apellido Paterno: </label>
            @if ($modo == 'Ver')
                <input type="text" name="paterno" id="paterno" class="form-control" value="{{isset($denunciante->paterno)?$denunciante->paterno:''}}" readonly>
            @else
                <input type="text" name="paterno" id="paterno" class="form-control" value="{{isset($denunciante->paterno)?$denunciante->paterno:''}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="materno">Apellido Materno: </label>
            @if ($modo == 'Ver')
                <input type="text" name="materno" id="materno" class="form-control" value="{{isset($denunciante->materno)?$denunciante->materno:''}}" readonly>
            @else
                <input type="text" name="materno" id="materno" class="form-control" value="{{isset($denunciante->materno)?$denunciante->materno:''}}" maxlength="20">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="rfc">RFC: </label>
            @if ($modo == 'Ver')
                <input type="text" name="rfc" id="rfc" class="form-control" value="{{isset($denunciante->rfc)?$denunciante->rfc:''}}" readonly>
            @else
                <input type="text" name="rfc" id="rfc" class="form-control" value="{{isset($denunciante->rfc)?$denunciante->rfc:''}}" maxlength="13">
            @endif
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="curp">CURP: </label>
            @if ($modo == 'Ver')
                <input type="text" name="curp" id="curp" class="form-control" value="{{isset($denunciante->curp)?$denunciante->curp:''}}" readonly>
            @else
                <input type="text" name="curp" id="curp" class="form-control" value="{{isset($denunciante->curp)?$denunciante->curp:''}}" maxlength="18">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="licencia">Licencia de Conduccion: </label>
            @if ($modo == 'Ver')
                <input type="text" name="licencia" id="licencia" class="form-control" value="{{isset($denunciante->licencia)?$denunciante->licencia:''}}" readonly>
            @else
                <input type="text" name="licencia" id="licencia" class="form-control" value="{{isset($denunciante->licencia)?$denunciante->licencia:''}}">
            @endif
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="pasaporte">Pasaporte: </label>
            @if ($modo == 'Ver')
                <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{isset($denunciante->pasaporte)?$denunciante->pasaporte:''}}" readonly>
            @else
                <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{isset($denunciante->pasaporte)?$denunciante->pasaporte:''}}" maxlength="15">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-8">
            <label for="correo">Correo: </label>
            @if ($modo == 'Ver')
                <input type="email" name="correo" id="correo" class="form-control" value="{{isset($denunciante->correo)?$denunciante->correo:''}}" readonly>
            @else
                <input type="email" name="correo" id="correo" class="form-control" value="{{isset($denunciante->correo)?$denunciante->correo:''}}" placeholder="ejemplo@correo.com">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="telefono">Telefono: </label>
            @if ($modo == 'Ver')
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($denunciante->telefono)?$denunciante->telefono:''}}" readonly>
            @else
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($denunciante->telefono)?$denunciante->telefono:''}}" maxlength="12" placeholder="(999) 9999999">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="domicilio">Domicilio: </label>
            @if ($modo == 'Ver')
                <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{isset($denunciante->domicilio)?$denunciante->domicilio:''}}" readonly>
            @else
                <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{isset($denunciante->domicilio)?$denunciante->domicilio:''}}" maxlength="80">
            @endif
            <br>
        </div>
        <div class="form-group col-md-2">
            <label for="numExterior">Numero Exterior: </label>
            @if ($modo == 'Ver')
                <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{isset($denunciante->numExterior)?$denunciante->numExterior:''}}" readonly>
            @else
                <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{isset($denunciante->numExterior)?$denunciante->numExterior:''}}">
            @endif
            <br>
        </div>
        <div class="form-group col-md-2">
            <label for="numInterior">Numero Interior: </label>
            @if ($modo == 'Ver')
                <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{isset($denunciante->numInterior)?$denunciante->numInterior:''}}" readonly>
            @else
                <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{isset($denunciante->numInterior)?$denunciante->numInterior:''}}">
            @endif
            <br>
        </div>
        <div class="form-group col-md-2">
            <label for="codigoPostal">Codigo Postal: </label>
            @if ($modo == 'Ver')
                <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{isset($denunciante->codigoPostal)?$denunciante->codigoPostal:''}}" readonly>
            @else
                <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{isset($denunciante->codigoPostal)?$denunciante->codigoPostal:''}}" maxlength="10">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
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
            <br>
        </div>
        <div class="form-group col-md-4">
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
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="colonia">Colonia: </label>
            @if ($modo == 'Ver')
                <input type="text" name="coloniaD" id="coloniaD" class="form-control" value="{{isset($denunciante->colonia)?$denunciante->colonia:''}}" readonly>
            @else
                <input type="text" name="coloniaD" id="coloniaD" class="form-control" value="{{isset($denunciante->colonia)?$denunciante->colonia:''}}" maxlength="60">
            @endif
            <br>
        </div>
    </div>
</div>
