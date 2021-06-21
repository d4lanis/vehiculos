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


<div class="container-fluid">
    <br>
    <a href="{{route('vehiculosRobados.create')}}" class="btn btn-success">Nuevo</a>
<br><br>
<table id="index" class="table table-striped table-bordered" style="width: 100%;">
    <thead class="table-info">
        <tr>
            <th rowspan="2" data-priority="1">Id</th>
            <th colspan="4">Informacion del Robo</th>
            <th colspan="5">Informacion del Vehiculo</th>
            <th></th>
        </tr>
        <tr>
            <th data-priority="1">Fecha/Hora</th>
            <th data-priority="1">Entidad</th>
            <th data-priority="1">Municipio</th>
            <th>Localidad</th>
            <th data-priority="1">Calle</th>
            <th>Lugar</th>
            <th data-priority="1">Marca</th>
            <th data-priority="1">Submarca</th>
            <th data-priority="1">modelo</th>
            <th data-priority="1">color</th>
            <th> Señas del Vehiculo:</th>
            <th>Tipo de Vehiculo</th>
            <th data-priority="1">Procendencia</th>
            <th>Nombre</th>
            <th>RFC</th>
            <th>CURP</th>
            <th>Licencia</th>
            <th>Pasaporte</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Domicilio del Denunciante</th>
            <th>Numero Interior</th>
            <th>Entidad del Denunciante</th>
            <th>Municipio del Denunciante</th>
            <th data-priority="1">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['robos'] as $robo)
            <tr>
                <td>{{$robo->id}}</td>
                <td>{{$robo->dateTime}}</td>
                <td>{{$robo->entidad}}</td>
                <td>{{$robo->municipio}}</td>
                <td>{{$robo->localidad}}</td>
                <td>{{$robo->calle.' '.$robo->numExterior}}</td>
                <td>{{$robo->tipoLugar}}</td>
                
    
        @endforeach
        @foreach ($data['vehiculos'] as $vehiculo)

                <td>{{$vehiculo->marca}}</td>
                <td>{{$vehiculo->subMarca}}</td>
                <td>{{$vehiculo->modelo}}</td>
                <td>{{$vehiculo->color}}</td>
                <td>{{$vehiculo->señas}}</td>
                <td>{{$vehiculo->tipoVehiculo}}</td>
                <td>{{$vehiculo->procedencia}}</td>
        @endforeach
        @foreach ($data['denunciantes'] as $denunciante)
                <td>
                    {{$denunciante->nombre.' '.$denunciante->paterno.' '.$denunciante->materno}}
                </td>
                <td>{{$denunciante->rfc}}</td>
                <td>{{$denunciante->curp}}</td>
                <td>{{$denunciante->licencia}}</td>
                <td>{{$denunciante->pasaporte}}</td>
                <td>{{$denunciante->telefono}}</td>
                <td>{{$denunciante->correo}}</td>
                <td>{{$denunciante->domicilio.' '.$denunciante->numExterior.', '.$denunciante->colonia}}</td>
                <td>{{$denunciante->numInterior}}</td>
                <td>{{$denunciante->entidad}}</td>
                <td>{{$denunciante->municipio}}</td>
                <td> 
                    <a class="btn btn-warning" style="width: 40px" href="{{ route('vehiculosRobados.edit',$robo->id)}}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a class="btn btn-danger" href="#" onclick="return confirm('¿Seguro que desea borrar este regitro?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
        @endforeach
        
    </tr>
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#index').DataTable({            
            "lengthMenu": [[5,10,50,100,-1],[5,10,50,100,"Todos"]],
            "responsive": true,
            "columnDefs": 
            [
                { responsivePriority: 1, targets: 0 },
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