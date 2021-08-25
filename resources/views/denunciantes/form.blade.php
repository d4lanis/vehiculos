<div class="form-group">
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="nombre">Nombre: </label>
            @if ($modo == 'Ver')
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($denunciante->nombre)?$denunciante->nombre:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre',isset($denunciante->nombre)?$denunciante->nombre:'')}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="paterno">Apellido Paterno: </label>
            @if ($modo == 'Ver')
                <input type="text" name="paterno" id="paterno" class="form-control" value="{{isset($denunciante->paterno)?$denunciante->paterno:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="paterno" id="paterno" class="form-control" value="{{old('paterno',isset($denunciante->paterno)?$denunciante->paterno:'')}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="materno">Apellido Materno: </label>
            @if ($modo == 'Ver')
                <input type="text" name="materno" id="materno" class="form-control" value="{{isset($denunciante->materno)?$denunciante->materno:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="materno" id="materno" class="form-control" value="{{old('materno',isset($denunciante->materno)?$denunciante->materno:'')}}" maxlength="20">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="rfc">RFC: </label>
            @if ($modo == 'Ver')
                <input type="text" name="rfc" id="rfc" class="form-control" value="{{isset($denunciante->rfc)?$denunciante->rfc:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="rfc" id="rfc" class="form-control" value="{{old('rfc',isset($denunciante->rfc)?$denunciante->rfc:'')}}" placeholder="Ingrese su RFC" maxlength="13">
            @endif
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="curp">CURP: </label>
            @if ($modo == 'Ver')
                <input type="text" name="curp" id="curp" class="form-control" value="{{isset($denunciante->curp)?$denunciante->curp:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="curp" id="curp" class="form-control" value="{{old('curp',isset($denunciante->curp)?$denunciante->curp:'')}}" placeholder="Ingrese su CURP" maxlength="18">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="licencia">Licencia de Conduccion: </label>
            @if ($modo == 'Ver')
                <input type="text" name="licencia" id="licencia" class="form-control" value="{{isset($denunciante->licencia)?$denunciante->licencia:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="licencia" id="licencia" class="form-control" value="{{old('licencia',isset($denunciante->licencia)?$denunciante->licencia:'')}}">
            @endif
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="pasaporte">Pasaporte: </label>
            @if ($modo == 'Ver')
                <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{isset($denunciante->pasaporte)?$denunciante->pasaporte:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="pasaporte" id="pasaporte" class="form-control" value="{{old('pasaporte',isset($denunciante->pasaporte)?$denunciante->pasaporte:'')}}" maxlength="15">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-8">
            <label for="correo">Correo: </label>
            @if ($modo == 'Ver')
                <input type="email" name="correo" id="correo" class="form-control" value="{{isset($denunciante->correo)?$denunciante->correo:'SIN INFORMACION'}}" readonly>
            @else
                <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo',isset($denunciante->correo)?$denunciante->correo:'')}}" placeholder="ejemplo@correo.com">
            @endif
            @error('email')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="telefono">Telefono: </label>
            @if ($modo == 'Ver')
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($denunciante->telefono)?$denunciante->telefono:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono',isset($denunciante->telefono)?$denunciante->telefono:'')}}" maxlength="12" placeholder="(999) 9999999">
            @endif
            @error('telefono')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="domicilio">Domicilio: </label>
            @if ($modo == 'Ver')
                <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{isset($denunciante->domicilio)?$denunciante->domicilio:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{old('domicilio',isset($denunciante->domicilio)?$denunciante->domicilio:'')}}" maxlength="80">
            @endif
            <br>
        </div>
        <div class="form-group col-md-2">
            <label for="numExterior">Numero Exterior: </label>
            @if ($modo == 'Ver')
                <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{isset($denunciante->numExterior)?$denunciante->numExterior:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="numExteriorD" id="numExteriorD" class="form-control" value="{{old('numExteriorD',isset($denunciante->numExterior)?$denunciante->numExterior:'')}}">
            @endif
            @error('numExteriorD')
                <br>
                <small class="d-flex alert alert-warning" role="alert">{{$message}}</small>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-2">
            <label for="numInterior">Numero Interior: </label>
            @if ($modo == 'Ver')
                <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{isset($denunciante->numInterior)?$denunciante->numInterior:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="numInteriorD" id="numInteriorD" class="form-control" value="{{old('numInteriorD',isset($denunciante->numInterior)?$denunciante->numInterior:'')}}">
            @endif
            @error('numExteriorD')
                <br>
                <small class="d-flex alert alert-warning" role="alert">{{$message}}</small>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-2">
            <label for="codigoPostal">Codigo Postal: </label>
            @if ($modo == 'Ver')
                <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{isset($denunciante->codigoPostal)?$denunciante->codigoPostal:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="codigoPostalD" id="codigoPostalD" class="form-control" value="{{old('codigoPostalD',isset($denunciante->codigoPostal)?$denunciante->codigoPostal:'')}}" maxlength="10">
            @endif
            @error('codigoPostalD')
                <br>
                <small class="d-flex alert alert-warning" role="alert">{{$message}}</small>
            @enderror
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="entidad">Entidad: </label>
            <select placeholder="Selecciona una opcion..." {{($modo == 'Ver')?'disabled="disabled"':''}} name="entidad_idD" id="entidad_idD" class="form-control" >
                
            </select>
            <!--<input type="hidden" name="entidadD" id="entidadD" class="form-control" value="{{isset($denunciante->entidad)?$denunciante->entidad:''}}">-->
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="municipio">Municipio: </label>
            <select placeholder="Selecciona una opcion..." {{($modo == 'Ver')?'disabled="disabled"':''}} name="municipio_idD" id="municipio_idD" class="form-control">
            </select>
            <!--<input type="hidden" name="municipioD" id="municipioD" class="form-control" value="{{isset($denunciante->municipio)?$denunciante->municipio:''}}">-->
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="colonia">Colonia: </label>
            @if ($modo == 'Ver')
                <input type="text" name="coloniaD" id="coloniaD" class="form-control" value="{{isset($denunciante->colonia)?$denunciante->colonia:'SIN INFORMACION'}}" readonly>
            @else
                <input type="text" name="coloniaD" id="coloniaD" class="form-control" value="{{old('coloniaD',isset($denunciante->colonia)?$denunciante->colonia:'')}}" maxlength="60">
            @endif
            <br>
        </div>
    </div>
</div>
