<div class="form-group">
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="marca">Marca del Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="marca_id" id="marca_id" class="form-control">
                
            </select>
            @error('marca_id')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            @error('marca')
            <br>
            <small class="alert alert-warning" role="alert">{{$message}}</small>
            <br>
        @enderror
            <input type="hidden" name="marca" id="marca" class="form-control" value="{{old('marca',isset($vehiculo->marca)?$vehiculo->marca:'')}}">
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="submarca">Submarca del Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="subMarca_id" id="subMarca_id" class="form-control">

            </select>
            <input type="hidden" value="{{old('subMarca',isset($vehiculo->subMarca)?$vehiculo->subMarca:'')}}" name="subMarca" id="subMarca" class="form-control">
            @error('subMarca_id')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            @error('subMarca')
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
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo',isset($vehiculo->modelo)?$vehiculo->modelo:'')}}" maxlength="4">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="color">Color:</label>
            <select  {{($modo == 'Ver')?'disabled="disabled"':''}} name="color_id" id="color_id" class="form-control">
               
            </select>
            <input type="hidden" name="color" id="color" class="form-control" value="{{old('color',isset($vehiculo->color)?$vehiculo->color:'')}}">
            @error('color')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="numSerie">Numero de Serie: </label>
            @if ($modo == 'Ver')
            <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{isset($vehiculo->numSerie)?$vehiculo->numSerie:''}}" readonly>
            @else
            <input type="text" name="numSerie" id="numSerie" class="form-control" value="{{old('numSerie',isset($vehiculo->numSerie)?$vehiculo->numSerie:'')}}" maxlength="20">
            @endif
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="placa">Numero de Placa: </label>
            @if ($modo == 'Ver')
                <input type="text" name="placa" id="placa" class="form-control" value="{{isset($vehiculo->placa)?$vehiculo->placa:''}}" readonly>
            @else
                <input type="text" name="placa" id="placa" class="form-control" value="{{old('placa',isset($vehiculo->placa)?$vehiculo->placa:'')}}" maxlength="10">
            @endif
            <br>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="claseVehiculo">Clase de Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="claseVehiculo_id" id="claseVehiculo_id" class="form-control">
                
            </select>
            <input type="hidden" name="claseVehiculo" id="claseVehiculo" class="form-control" value="{{old('claseVehiculo',isset($vehiculo->claseVehiculo)?$vehiculo->claseVehiculo:'')}}">
            @error('claseVehiculo')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="tipoVehiculo">Tipo de Vehiculo: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoVehiculo_id" id="tipoVehiculo_id" class="form-control">
                
            </select>
            <input type="hidden" name="tipoVehiculo" id="tipoVehiculo" class="form-control" value="{{old('tipoVehiculo',isset($vehiculo->tipoVehiculo)?$vehiculo->tipoVehiculo:'')}}">
            @error('tipoVehiculo')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-4">
            <label for="tipoUso">Tipo de Uso: </label>
            <select {{($modo == 'Ver')?'disabled="disabled"':''}} name="tipoUso_id" id="tipoUso_id" class="form-control">
                
            </select>
            <input type="hidden" name="tipoUso" id="tipoUso"  class="form-control" value="{{old('tipoUso',isset($vehiculo->tipoUso)?$vehiculo->tipoUso:'')}}">
            @error('tipoUso')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
    </div>
    
    <label for="señas">Señas: </label>
    @if ($modo == 'Ver')
        <textarea name="señas" id="señas" rows="5" class="form-control" readonly>{{isset($vehiculo->señas)?$vehiculo->señas:''}}</textarea>
    @else
    <textarea name="señas" id="señas" rows="5" class="form-control">{{old('señas',isset($vehiculo->señas)?$vehiculo->señas:'')}}</textarea>
    @endif
    <br>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="procedencia">Procedencia: </label>
            <select  {{($modo == 'Ver')?'disabled="disabled"':''}} name="procedencia_id" id="procedencia_id" class="form-control">
                
            </select>
            <input type="hidden" name="procedencia" id="procedencia" class="form-control" value="{{old('procedencia',isset($vehiculo->procedencia)?$vehiculo->procedencia:'')}}">
            @error('procedencia')
                <br>
                <small class="alert alert-warning" role="alert">{{$message}}</small>
                <br>
            @enderror
            <br>
        </div>
        <div class="form-group col-md-6">
            <label for="aseguradora">Aseguradora: </label>
            @if ($modo == 'Ver')
                <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{isset($vehiculo->aseguradora)?$vehiculo->aseguradora:''}}" readonly>
            @else
                <input type="text" name="aseguradora" id="aseguradora" class="form-control" value="{{old('aseguradora',isset($vehiculo->aseguradora)?$vehiculo->aseguradora:'')}}">
            @endif
            <br>
        </div>
    </div>
</div>