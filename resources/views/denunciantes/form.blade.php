<div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" class="form-control">
    <br><br>
    <label for="paterno">Apellido Paterno: </label>
    <input type="text" name="paterno" id="paterno" class="form-control">
    <br><br>
    <label for="materno">Apellido Materno: </label>
    <input type="text" name="materno" id="materno">
    <br><br>
    <label for="rfc">RFC: </label>
    <input type="text" name="rfc" id="rfc">
    <br><br>
    <label for="curp">CURP: </label>
    <input type="text" name="curp" id="curp">
    <br><br>
    <label for="licencia">Licencia de Conduccion: </label>
    <input type="text" name="licencia" id="licencia">
    <br><br>
    <label for="pasaporte">Pasaporte: </label>
    <input type="text" name="pasaporte" id="pasaporte">
    <br><br>
    <label for="telefono">Telefono: </label>
    <input type="text" name="telefono" id="telefono">
    <br><br>
    <label for="correo">Correo: </label>
    <input type="email" name="correo" id="correo">
    <br><br>
    <label for="domicilio">Domicilio: </label>
    <input type="text" name="domicilio" id="domicilio">
    <br><br>
    <label for="numExterior">Numero Exterior: </label>
    <input type="text" name="numExterior" id="numExterior">
    <br><br>
    <label for="numInterior">Numero Interior: </label>
    <input type="text" name="numInterior" id="numInterior">
    <br><br>
    <label for="codigoPostal">Codigo Postal: </label>
    <input type="text" name="codigoPostal" id="codigoPostal">
    <br><br>
    <label for="entidad">Entidad: </label>
    <select name="entidad_id" id="entidad_id">

    </select>
    <input type="text" name="entidad" id="entidad">
    <br><br>
    <label for="municipio">Municipio: </label>
    <select name="municipio_id" id="municipio_id">
        
    </select>
    <input type="text" name="municipio" id="municipio">
    <br><br>
    <label for="colonia">Colonia: </label>
    <input type="text" name="colonia" id="colonia">
    <br><br>
    <input type="submit" value="Enviar" class="btn btn-success">
    <a href="{{ route('denunciantes.index')}}" class="btn btn-default btn-outline-dark">Regresar</a>
</div>