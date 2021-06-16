<div class="form-group">
    <label for="marca">Marca del Vehiculo: </label>
    <select name="marca_id" id="marca_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['marca'] as $item)
            <option value="{{$item['marca_id']}}"" {{ isset($vehiculo->marca_id)? $vehiculo->marca_id == $item['marca_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" name="marca" id="marca" class="form-control" value="{{isset($vehiculo->marca)?$vehiculo->marca:''}}">
    <br><br>
    <label for="submarca">Submarca del Vehiculo: </label>
    <select name="subMarca_id" id="subMarca_id" class="form-control">
        @if ($modo == 'Editar')
        <option value="{{isset($vehiculo->subMarca_id)?$vehiculo->subMarca_id:''}}">{{isset($vehiculo->subMarca_id)?$vehiculo->subMarca:''}}</option>
        @endif
    </select>
    <input type="hidden" value="{{isset($vehiculo->subMarca)?$vehiculo->subMarca:''}}" name="subMarca" id="subMarca" class="form-control">
    <br><br>
    <label for="modelo">Modelo: </label>
    <input type="text" name="modelo" id="modelo" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}">
    <br><br>
    <label for="color">Color:</label>
    <select name="color_id" id="color_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['colores'] as $item)
            <option value="{{$item['id']}}" {{ isset($vehiculo->color_id)? $vehiculo->color_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" name="color" id="color" class="form-control" value="{{isset($vehiculo->color)?$vehiculo->color:''}}">
    <br><br>
    <label for="numSerie">Numero de Serie: </label>
    <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{isset($vehiculo->numSerie)?$vehiculo->numSerie:''}}">
    <br><br>
    <label for="tipoVehiculo">Tipo de Vehiculo: </label>
    <select name="tipoVehiculo_id" id="tipoVehiculo_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['tipoVehiculo'] as $item)
            <option value="{{$item['tipoVehiculo_id']}}" {{ isset($vehiculo->tipoVehiculo_id)? $vehiculo->tipoVehiculo_id == $item['tipoVehiculo_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" name="tipoVehiculo" id="tipoVehiculo" class="form-control" value="{{isset($vehiculo->tipoVehiculo)?$vehiculo->tipoVehiculo:''}}">
    <br><br>
    <label for="claseVehiculo">Clase de Vehiculo: </label>
    <select name="claseVehiculo_id" id="claseVehiculo_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['claseVehiculo'] as $item)
            <option value="{{$item['claseVehiculo_id']}}" {{ isset($vehiculo->claseVehiculo_id)? $vehiculo->claseVehiculo_id == $item['claseVehiculo_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" name="claseVehiculo" id="claseVehiculo" class="form-control" value="{{isset($vehiculo->claseVehiculo)?$vehiculo->claseVehiculo:''}}">
    <br><br>
    <label for="señas">Señas: </label>
    <textarea name="señas" id="señas" cols="30" rows="10" class="form-control" value="{{isset($vehiculo->señas)?$vehiculo->señas:''}}"></textarea>
    <label for="procedencia">Procedencia: </label>
    <select name="procedencia_id" id="procedencia_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['procedencia'] as $item)
            <option value="{{$item['id']}}" {{ isset($vehiculo->procedencia_id)? $vehiculo->procedencia_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" name="procedencia" id="procedencia" class="form-control" value="{{isset($vehiculo->procedencia)?$vehiculo->procedencia:''}}">
    <br><br>
    <label for="aseguradora">Aseguradora: </label>
    <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{isset($vehiculo->aseguradora)?$vehiculo->aseguradora:''}}">
    <br><br>
</div>