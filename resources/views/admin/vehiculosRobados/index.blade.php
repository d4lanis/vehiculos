@extends('layouts.adminlayout')
@section('content')
    <div class="container">
        <br>
        <h2>Vehiculos Robados</h2>
        <a href="{{route('vehiculos_robados.create')}}" class="btn btn-success">Nuevo</a>
    <br><br>
    <table id="index" class="table table-striped table-bordered" style="width: 100%;">
        <thead class="table-info">
            <tr>
                <th></th>
                <th data-priority="1">Id</th>
                <th data-priority="2">Fecha/Hora</th>
                <th data-priority="2">Municipio</th>
                <th data-priority="2">Marca/Submarca</th>
                <th>Modelo</th>
                <th data-priority="1">Numero de Serie</th>
                <th data-priority="1">Placa</th>
                <th>Nombre Denunciante</th>
                <th data-priority="1">Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
        $('#index').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "lengthMenu": [[5,10,50,100],[5,10,50,100]],
            "ajax": "/fillData",
            "columns": [
                {data:  null, defaultContent: '', orderable: false, searchable:false,},
                {data: 'id', orderable: false, searchable: false},
                {data: 'dateAveriguacion', orderable: true, searchable: true},
                {data: 'municipio', orderable: true, searchable: false},
                {data: 'marca', orderable: true, searchable: true},
                {data: 'modelo', orderable: true, searchable: true},
                {data: 'numSerie', orderable: true, searchable: true},
                {data: 'placa', orderable: true, searchable: true},
                {data: 'nombre', orderable: true, searchable: true},
                {data: 'acciones', name:'acciones', searchable:false, orderable:false,
                    render: function(data,style,row,meta){
                        return $("<div/>").html(data).text();
                    }
                }
            ],
            "columnDefs": 
            [
                { orderable: false, className: 'select-checkbox', targets: 0},
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: -2 }
            ],
            retrieve : true,
            select: {
                        style: 'multi',
                        selector: 'td:first-child'
                    }        
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
@endpush