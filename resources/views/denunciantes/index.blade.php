<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.8/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.8/datatables.min.js"></script>
</head>

<div class="container-xl">
    <a href="{{route('denunciantes.create')}}" class="btn btn-success">Nuevo</a>
<br><br>
<table id="denunciantes" class="table table-striped table-bordered table-responsive">
    <thead class="table-info">
        <tr>
            <th data-priority="1">NOMBRE</th>
            <th data-priority="1">PATERNO</th>
            <th data-priority="1">MATERNO</th>
            <th data-priority="2">RFC</th>
            <th data-priority="2">CURP</th>
            <th data-priority="2">LICENCIA CONDUCCIÓN</th>
            <th data-priority="2">PASAPORTE</th>
            <th data-priority="1">TELEFONO</th>
            <th data-priority="1">CORREO</th>
            <th data-priority="1">ENTIDAD</th>
            <th data-priority="1">MUNICIPIO</th>
            <th data-priority="2" >DOMICILIO</th>
            <th data-priority="2">NUM. EXTERIOR</th>
            <th data-priority="2">NUM. INTERIOR</th>
            <th data-priority="2">COLONIA</th>
            <th data-priority="2">CP</th>
            <th data-priority="1">ACCIONES</th>
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
                <td>{{$item->entidad}}</td>
                <td>{{$item->municipio}}</td>
                <td>{{$item->domicilio}}</td>
                <td>{{$item->numExterior}}</td>
                <td>{{$item->numInterior}}</td>
                <td>{{$item->colonia}}</td>
                <td>{{$item->codigoPostal}}</td>
                
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