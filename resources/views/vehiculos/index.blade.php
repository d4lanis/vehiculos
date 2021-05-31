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


<a href="{{route('vehiculos.create')}}" class="btn btn-success">Nuevo</a>
<br><br>
<table id="vehiculos" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>MARCA</th>
            <th>SUBMARCA</th>
            <th>MODELO</th>
            <th>COLOR</th>
            <th>NUM. SERIE</th>
            <th>TIPO VEHICULO</th>
            <th>CLASE VEHICULO</th>
            <th>SEÑAS</th>
            <th>PROCEDENCIA</th>
            <th>ASEGURADORA</th>
            <th>ACCIONES</th>
        </tr>
    <tbody>
        @foreach ($vehiculos as $item)
            <tr>
                <td>{{$item->marca}}</td>
                <td>{{$item->subMarca}}</td>
                <td>{{$item->modelo}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->numSerie}}</td>
                <td>{{$item->tipoVehiculo}}</td>
                <td>{{$item->claseVehiculo}}</td>
                <td>{{$item->señas}}</td>
                <td>{{$item->procedencia}}</td>
                <td>{{$item->procedencia}}</td>
                <td> 
                    <a class="btn btn-warning" style="width: 40px" href="{{ route('vehiculos.edit',$item->id)}}">
                        <span class="fa fa-edit"></span>
                    </a>
                        <form action="{{ route('vehiculos.destroy',$item->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}} 
                            <button class="fa fa-trash btn btn-danger" style="width: 40px"  type="submit" onclick="return confirm('¿Seguro que desea borrar este regitro?')" value="submit">
                        </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </thead>
</table>

<script>
    $(document).ready( function () {
    $('#vehiculos').DataTable({
        "lengthMenu": [[5,10,50,100,-1],[5,10,50,100,"All"]]
    });
    });
</script>