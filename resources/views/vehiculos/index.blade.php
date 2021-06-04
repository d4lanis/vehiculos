<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.8/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.8/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="container-xl">
    <a href="{{route('vehiculos.create')}}" class="btn btn-success">Nuevo</a>
<br><br>
<table id="vehiculos" class="table table-striped table-bordered">
    <thead class="table-info">
        <tr>
            <th data-priority="1">MARCA</th>
            <th data-priority="1">SUBMARCA</th>
            <th data-priority="1">MODELO</th>
            <th data-priority="1">COLOR</th>
            <th data-priority="2">NUM. SERIE</th>
            <th data-priority="2">TIPO VEHICULO</th>
            <th data-priority="1">CLASE VEHICULO</th>
            <th data-priority="2">SEÑAS</th>
            <th data-priority="2">PROCEDENCIA</th>
            <th data-priority="2">ASEGURADORA</th>
            <th data-priority="1">ACCIONES</th>
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
                <td>{{$item->aseguradora}}</td>
                <td> 
                    <a class="btn btn-warning" style="width: 40px" href="{{ route('vehiculos.edit',$item->id)}}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a class="btn btn-danger" href="{{route('vehiculos.destroy',$item->id)}}" onclick="return confirm('¿Seguro que desea borrar este regitro?')">
                    <span class="fa fa-trash"></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </thead>
</table>

<script>
    $(document).ready( function () {
        $('#vehiculos').DataTable({            
            "lengthMenu": [[5,10,50,100,-1],[5,10,50,100,"Todos"]],
            "responsive": true,
            "columnDefs": 
            [
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: -2 }
            ]
            
        });
    });

    $.extend( true, $.fn.dataTable.defaults, {
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    }           
} );
</script>
</div>