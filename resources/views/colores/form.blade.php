<h1>{{ $modo }}</h1>

<div class="form-group">
    <label for="descripcion">DESCRIPCION: </label>
    <input type="text" class="form-control" name="descripcion" placeholder="ingrese el nombre del color" id="descripcion" value="{{isset($color->descripcion)?$color->descripcion:''}}">
    <input type="submit" class="btn btn-success" value="{{ $modo }}">

    <a href="{{ url('colores/')}}"> Regresar</a>
</div>