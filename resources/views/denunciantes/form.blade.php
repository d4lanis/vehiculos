<div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($denunciante->nombre)?$denunciante->nombre:''}}">
    <br><br>
    <label for="paterno">Apellido Paterno: </label>
    <input type="text" name="paterno" id="paterno" class="form-control" value="{{isset($denunciante->paterno)?$denunciante->paterno:''}}">
    <br><br>
    <label for="materno">Apellido Materno: </label>
    <input type="text" name="materno" id="materno" class="form-control" value="{{isset($denunciante->materno)?$denunciante->materno:''}}">
    <br><br>
    <label for="rfc">RFC: </label>
    <input type="text" name="rfc" id="rfc" class="form-control" value="{{isset($denunciante->rfc)?$denunciante->rfc:''}}">
    <br><br>
    <label for="curp">CURP: </label>
    <input type="text" name="curp" id="curp" class="form-control" value="{{isset($denunciante->curp)?$denunciante->curp:''}}">
    <br><br>
    <label for="licencia">Licencia de Conduccion: </label>
    <input type="text" name="licencia" id="licencia" class="form-control" value="{{isset($denunciante->licencia)?$denunciante->licencia:''}}">
    <br><br>
    <label for="pasaporte">Pasaporte: </label>
    <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{isset($denunciante->pasaporte)?$denunciante->pasaporte:''}}">
    <br><br>
    <label for="telefono">Telefono: </label>
    <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($denunciante->telefono)?$denunciante->telefono:''}}">
    <br><br>
    <label for="correo">Correo: </label>
    <input type="email" name="correo" id="correo" class="form-control" value="{{isset($denunciante->correo)?$denunciante->correo:''}}">
    <br><br>
    <label for="domicilio">Domicilio: </label>
    <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{isset($denunciante->domicilio)?$denunciante->domicilio:''}}">
    <br><br>
    <label for="numExterior">Numero Exterior: </label>
    <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{isset($denunciante->numExterior)?$denunciante->numExterior:''}}">
    <br><br>
    <label for="numInterior">Numero Interior: </label>
    <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{isset($denunciante->numInterior)?$denunciante->numInterior:''}}">
    <br><br>
    <label for="codigoPostal">Codigo Postal: </label>
    <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{isset($denunciante->codigoPostal)?$denunciante->codigoPostal:''}}">
    <br><br>
    <label for="entidad">Entidad: </label>
    <select name="entidad_idD" id="entidad_idD" class="form-control" >
        @if ($modo == 'Ingresar')
            <option value="" >--Seleccione una entidad--</option>
        @endif 
    
        @foreach ($data['entidad'] as $entidad)
            <option value="{{$entidad['entidad_id']}}"  {{ isset($denunciante->entidad_id)? $denunciante->entidad_id == $entidad['entidad_id'] ? 'selected="selected"' : '':'' }}>{{$entidad['nombre']}}</option>
        @endforeach
    </select>
    <input type="hidden" name="entidadD" id="entidadD" class="form-control" value="{{isset($denunciante->entidad)?$denunciante->entidad:''}}">
    <br><br>
    <label for="municipio">Municipio: </label>
    <select name="municipio_idD" id="municipio_idD" class="form-control">
        @if ($modo == 'Editar')
            <option value="{{isset($denunciante->municipio_id)?$denunciante->municipio_id:''}}">{{isset($denunciante->municipio_id)?$denunciante->municipio:''}}</option>
        @endif
    </select>
    <input type="hidden" name="municipioD" id="municipioD" class="form-control" value="{{isset($denunciante->municipio)?$denunciante->municipio:''}}">
    <br><br>
    <label for="colonia">Colonia: </label>
    <input type="text" name="colonia" id="colonia" class="form-control" value="{{isset($denunciante->colonia)?$denunciante->colonia:''}}">
    <br><br> 
</div>
