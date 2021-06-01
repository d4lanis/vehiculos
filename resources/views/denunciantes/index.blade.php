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


<a href="{{route('denunciantes.create')}}" class="btn btn-success">Nuevo</a>
<br><br>
<table id="denunciantes" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NOMBRE</th>
            <th>PATERNO</th>
            <th>MATERNO</th>
            <th>RFC</th>
            <th>CURP</th>
            <th>LICENCIA CONDUCCIÓN</th>
            <th>PASAPORTE</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>DOMICILIO</th>
            <th>NUM. EXTERIOR</th>
            <th>NUM. INTERIOR</th>
            <th>COLONIA</th>
            <th>CP</th>
            <th>ENTIDAD</th>
            <th>MUNICIPIO</th>
            <th>ACCIONES</th>
        </tr>
    <tbody>
        @foreach ($denunciantes as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->paterno}}</td>
                <td>{{$item->materno}}</td>
                <td>{{$item->rfc}}</td>
                <td>{{$item->curp}}</td>
                <td>{{$item->licencia}}</td>
                <td>{{$item->pasaporte}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->domicilio}}</td>
                <td>{{$item->numExterior}}</td>
                <td>{{$item->numInterior}}</td>
                <td>{{$item->colonia}}</td>
                <td>{{$item->codigoPostal}}</td>
                <td>{{$item->entidad}}</td>
                <td>{{$item->municipio}}</td>
                <td>
                    <a class="btn btn-warning" style="width: 40px" href="{{ route('denunciantes.edit',$item->id)}}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a class="btn btn-danger" href="{{route('denunciantes.destroy',$item->id)}}" onclick="return confirm('¿Seguro que desea borrar este regitro?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </thead>
</table>

<script>
    $(document).ready( function () {
    $('#denunciantes').DataTable({
        "lengthMenu": [[5,10,50,100,-1],[5,10,50,100,"All"]]
    });
    });
</script>