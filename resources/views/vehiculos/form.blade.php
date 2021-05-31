<div class="form-group">
    <label for="marca">Marca del Vehiculo: </label>
    <select name="marca_id" id="marca_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['marca'] as $item)
            <option value="{{$item['marca_id']}}">{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" value="" name="marca" id="marca" class="form-control">
    <br><br>
    <label for="submarca">Submarca del Vehiculo: </label>
    <select name="subMarca_id" id="subMarca_id" class="form-control">

    </select>
    <input type="hidden" value="" name="subMarca" id="subMarca" class="form-control">
    <br><br>
    <label for="modelo">Modelo: </label>
    <input type="text" name="modelo" id="modelo" class="form-control">
    <br><br>
    <label for="color">Color:</label>
    <select name="color_id" id="color_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['colores'] as $item)
            <option value="{{$item['id']}}">{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" value="" name="color" id="color" class="form-control">
    <br><br>
    <label for="numSerie">Numero de Serie: </label>
    <input type="text" name="numSerie" id="numSerie" class="form-control">
    <br><br>
    <label for="tipoVehiculo">Tipo de Vehiculo: </label>
    <select name="tipoVehiculo_id" id="tipoVehiculo_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['tipoVehiculo'] as $item)
            <option value="{{$item['tipoVehiculo_id']}}">{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" value="" name="tipoVehiculo" id="tipoVehiculo" class="form-control">
    <br><br>
    <label for="claseVehiculo">Clase de Vehiculo: </label>
    <select name="claseVehiculo_id" id="claseVehiculo_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['claseVehiculo'] as $item)
            <option value="{{$item['claseVehiculo_id']}}">{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" value="" name="claseVehiculo" id="claseVehiculo" class="form-control">
    <br><br>
    <label for="señas">Señas: </label>
    <textarea name="señas" id="señas" cols="30" rows="10" class="form-control"></textarea>
    <label for="procedencia">Procedencia: </label>
    <select name="procedencia_id" id="procedencia_id" class="form-control">
        <option value="">--Seleccione una opcion--</option>
        @foreach ($data['procedencia'] as $item)
            <option value="{{$item['id']}}">{{$item['descripcion']}}</option>
        @endforeach
    </select>
    <input type="hidden" value="" name="procedencia" id="procedencia" class="form-control">
    <br><br>
    <label for="aseguradora">Aseguradora: </label>
    <input type="text" name="aseguradora" id="aseguradora" class="form-control">
    <br><br>
    <input type="submit" value="Enviar" class="btn btn-success">
    <a href="{{ route('vehiculos.index')}}" class="btn btn-default btn-outline-dark">Regresar</a>
</div>