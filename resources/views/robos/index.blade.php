<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<a href="{{route('robos.create')}}" class="btn btn-success">Nuevo</a>
<br><br>
<table id="robos" class="table table-striped table-light table-bordered mt-4">
    <thead>
        <tr>
            <th>FECHA Y HORA</th>
            <th>ENTIDAD</th>
            <th>MUNICIPIO</th>
            <th>LOCALIDAD</th>
            <th>CALLE</th>
            <th>NUMERO EXTERIOR</th>
            <th>CP</th>
            <th>TIPO DE LUGAR</th>
            <th>DESCRIPCION</th>
            <th>DELITO</th>
            <th>ARMA ASOCIADA</th>
            <th>ESTATUS</th>
            <th>Acciones</th>
        </tr>

    <tbody>
        @foreach ($robos as $robo)
            <tr>
                <td>{{$robo->dateTime}}</td>
                <td>{{$robo->entidad}}</td>
                <td>{{$robo->municipio}}</td>
                <td>{{$robo->localidad}}</td>
                <td>{{$robo->calle}}</td>
                <td>{{$robo->numExterior}}</td>
                <td>{{$robo->codigoPostal}}</td>
                <td>{{$robo->tipoLugar}}</td>
                <td>{{$robo->descLugar}}</td>
                <td>{{$robo->delito}}</td>
                <td>{{$robo->armaAsociada}}</td>
                <td>{{$robo->estatus}}</td>
                <td> 
                    <a class="btn btn-warning" style="width: 40px" href="{{ route('robos.edit',$robo->id)}}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a>
                        <form action="{{ route('robos.destroy',$robo->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}} 
                            <button class="fa fa-trash btn btn-danger" style="width: 40px"  type="submit" onclick="return confirm('¿Seguro que desea borrar este regitro?')" value="">
                        </form>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </thead>
</table>

<script>
    $(document).ready( function () {
    $('#robos').DataTable();
    } );
</script>