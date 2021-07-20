<div class="form-group">
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="marca">Marca del Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="marca_id" id="marca_id" class="form-control">
                @if ($modo == 'Editar')
                    @foreach ($data['marca'] as $item)
                        <option value="{{$item['marca_id']}}"" {{ isset($vehiculo->marca_id)? $vehiculo->marca_id == $item['marca_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @elseif($modo == 'Ver')
                    <option value="">{{isset($vehiculo->marca)?$vehiculo->marca:''}}</option>
                @else
                    <option value="">--Seleccione una opcion--</option>
                    @foreach ($data['marca'] as $item)
                        <option value="{{$item['marca_id']}}"" {{ isset($vehiculo->marca_id)? $vehiculo->marca_id == $item['marca_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @endif
            </select>
            @error('marca_id')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <input type="hidden" name="marca" id="marca" class="form-control" value="{{isset($vehiculo->marca)?$vehiculo->marca:''}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="submarca">Submarca del Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="subMarca_id" id="subMarca_id" class="form-control">
                @if ($modo == 'Editar')
                    <option value="{{isset($vehiculo->subMarca_id)?$vehiculo->subMarca_id:''}}">{{isset($vehiculo->subMarca_id)?$vehiculo->subMarca:''}}</option>
                @elseif($modo == 'Ver')
                    <option value="{{isset($vehiculo->subMarca_id)?$vehiculo->subMarca_id:''}}">{{isset($vehiculo->subMarca_id)?$vehiculo->subMarca:''}}</option>
                @else
                    <option value="">Cargando datos...</option>
                @endif
            </select>
            <input type="hidden" value="{{isset($vehiculo->subMarca)?$vehiculo->subMarca:''}}" name="subMarca" id="subMarca" class="form-control">
            @error('marca_id')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="modelo">Modelo: </label>
            @if ($modo == 'Ver')
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}" readonly>
            @else
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}" maxlength="4">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="color">Color:</label>
            <select  {{($modo == 'Ver')?'disabled="disabled"':''}} name="color_id" id="color_id" class="form-control">
                @if ($modo == 'Editar')
                    @foreach ($data['colores'] as $item)
                        <option value="{{$item['id']}}" {{ isset($vehiculo->color_id)? $vehiculo->color_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @elseif($modo == 'Ver')
                    <option value="">{{isset($vehiculo->color)?$vehiculo->color:''}}</option>
                @else
                    <option value="">--Seleccione una opcion--</option>
                    @foreach ($data['colores'] as $item)
                        <option value="{{$item['id']}}" {{ isset($vehiculo->color_id)? $vehiculo->color_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" name="color" id="color" class="form-control" value="{{isset($vehiculo->color)?$vehiculo->color:''}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="numSerie">Numero de Serie: </label>
            @if ($modo == 'Ver')
            <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{isset($vehiculo->numSerie)?$vehiculo->numSerie:''}}" readonly>
            @else
            <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{isset($vehiculo->numSerie)?$vehiculo->numSerie:''}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="placa">Numero de Placa: </label>
            @if ($modo == 'Ver')
                <input type="text" name="placa" id="placa" class="form-control" value="{{isset($vehiculo->placa)?$vehiculo->placa:''}}" readonly>
            @else
                <input type="text" name="placa" id="placa" class="form-control" value="{{isset($vehiculo->placa)?$vehiculo->placa:''}}" maxlength="10">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="tipoVehiculo">Tipo de Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoVehiculo_id" id="tipoVehiculo_id" class="form-control">
                @if ($modo == 'Editar')
                    @foreach ($data['tipoVehiculo'] as $item)
                        <option value="{{$item['tipoVehiculo_id']}}" {{ isset($vehiculo->tipoVehiculo_id)? $vehiculo->tipoVehiculo_id == $item['tipoVehiculo_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @elseif($modo == 'Ver')
                    <option value="">{{isset($vehiculo->tipoVehiculo)?$vehiculo->tipoVehiculo:''}}</option>
                @else
                    <option value="">--Seleccione una opcion--</option>
                    @foreach ($data['tipoVehiculo'] as $item)
                        <option value="{{$item['tipoVehiculo_id']}}" {{ isset($vehiculo->tipoVehiculo_id)? $vehiculo->tipoVehiculo_id == $item['tipoVehiculo_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" name="tipoVehiculo" id="tipoVehiculo" class="form-control" value="{{isset($vehiculo->tipoVehiculo)?$vehiculo->tipoVehiculo:''}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="claseVehiculo">Clase de Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="claseVehiculo_id" id="claseVehiculo_id" class="form-control">
                @if ($modo == 'Editar')
                    @foreach ($data['claseVehiculo'] as $item)
                        <option value="{{$item['claseVehiculo_id']}}" {{ isset($vehiculo->claseVehiculo_id)? $vehiculo->claseVehiculo_id == $item['claseVehiculo_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @elseif($modo == 'Ver')
                    <option value="">{{isset($vehiculo->claseVehiculo)?$vehiculo->claseVehiculo:''}}</option>
                @else
                    <option value="">--Seleccione una opcion--</option>
                    @foreach ($data['claseVehiculo'] as $item)
                        <option value="{{$item['claseVehiculo_id']}}" {{ isset($vehiculo->claseVehiculo_id)? $vehiculo->claseVehiculo_id == $item['claseVehiculo_id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" name="claseVehiculo" id="claseVehiculo" class="form-control" value="{{isset($vehiculo->claseVehiculo)?$vehiculo->claseVehiculo:''}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="tipoUso">Tipo de Uso: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoUso_id" id="tipoUso_id" class="form-control">
                @if ($modo == 'Editar')
                    @foreach ($data['tipoUso'] as $item)
                        <option value="{{$item['tipoUso_id']}}" {{ isset($vehiculo->tipoUso_id)? $vehiculo->tipoUso_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @elseif($modo == 'Ver')
                    <option value="">{{isset($vehiculo->tipoUso)?$vehiculo->tipoUso:''}}</option>
                @else
                    <option value="">--Seleccione una opcion--</option>
                    @foreach ($data['tipoUso'] as $item)
                        <option value="{{$item['tipoUso_id']}}">{{$item['descripcion']}}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" name="tipoUso" id="tipoUso"  class="form-control" value="{{isset($vehiculo->tipoUso)?$vehiculo->tipoUso:''}}">
            <br>
        </div>
    </div>
    
    <label for="señas">Señas: </label>
    @if ($modo == 'Ver')
        <textarea name="señas" id="señas" rows="5" class="form-control" readonly>{{isset($vehiculo->señas)?$vehiculo->señas:''}}</textarea>
    @else
    <textarea name="señas" id="señas" rows="5" class="form-control">{{isset($vehiculo->señas)?$vehiculo->señas:''}}</textarea>
    @endif
    <br>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="procedencia">Procedencia: </label>
            <select  {{($modo == 'Ver')?'disabled="disabled"':''}} name="procedencia_id" id="procedencia_id" class="form-control">
                @if ($modo == 'Editar')
                    @foreach ($data['procedencia'] as $item)
                        <option value="{{$item['id']}}" {{ isset($vehiculo->procedencia_id)? $vehiculo->procedencia_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @elseif($modo == 'Ver')
                    <option value="">{{isset($vehiculo->procedencia)?$vehiculo->procedencia:''}}</option>
                @else
                    <option value="">--Seleccione una opcion--</option>
                    @foreach ($data['procedencia'] as $item)
                        <option value="{{$item['id']}}" {{ isset($vehiculo->procedencia_id)? $vehiculo->procedencia_id == $item['id'] ? 'selected="selected"' : '':'' }}>{{$item['descripcion']}}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" name="procedencia" id="procedencia" class="form-control" value="{{isset($vehiculo->procedencia)?$vehiculo->procedencia:''}}">
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="aseguradora">Aseguradora: </label>
            @if ($modo == 'Ver')
                <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{isset($vehiculo->aseguradora)?$vehiculo->aseguradora:''}}" readonly>
            @else
                <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{isset($vehiculo->aseguradora)?$vehiculo->aseguradora:''}}">
            @endif
            <br>
        </div>
    </div>
</div>