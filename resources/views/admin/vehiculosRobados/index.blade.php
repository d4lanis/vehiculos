@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Vehiculos Robados</h2>
       <form action="{{route('status')}}" method="POST" id="form">
        @csrf
            <div class="form-group">

                <div class="form-row">
                    <div class="col-md-0">
                        <a href="{{route('vehiculos_robados.create')}}" class="btn btn-success">Nuevo Registro</a>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="estatus" required>
                            <option value="">Seleccione un estatus...</option>
                            <option value="0">Pre-proceso</option>
                            <option value="1">Procesar a plataforma Mexico</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" type="submit">Cambiar Estatus</button>
                    </div> 
                    
                    @error('registro')
                    <div class="col-md-0">
                        <small class="alert alert-warning" role="alert">Por favor seleccione uno o mas registros</small>
                    </div>
                    @enderror
                </div>
            </div>
            
            <br>
            
            <table id="index" class="table table-striped table-bordered" style="width: 100%;">
                <thead class="table-info">
                    <tr>
                        <th data-priority="1"><input type="checkbox" id="select-all"></th>
                        <th data-priority="1">Id</th>
                        <th data-priority="2">Fecha/Hora</th>
                        <th data-priority="2">Municipio</th>
                        <th data-priority="2">Marca/Submarca</th>
                        <th>Modelo</th>
                        <th data-priority="1">Numero de Serie</th>
                        <th data-priority="2">Placa</th>
                        <th>Nombre Denunciante</th>
                        <th data-priority="1">Acciones</th>
                    </tr>
                </thead>
            </table>
        </form>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
        var selectedIds = [];
        var table;
        table = $('#index').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "lengthMenu": [[5,10,50,100],[5,10,50,100]],
            "ajax": "/fillData",
            "columns": [
                {data:  'checkboxes', orderable: false, searchable:false, render: function(data,style,row,meta){
                        return $("<div/>").html(data).text();
                    }},
                {data: 'id', orderable: false, searchable: false},
                {data: 'dateAveriguacion', orderable: true, searchable: true},
                {data: 'municipio', orderable: true, searchable: true},
                {data: 'marca', orderable: true, searchable: true},
                {data: 'modelo', orderable: true, searchable: true},
                {data: 'numSerie', orderable: true, searchable: true},
                {data: 'placa', orderable: true, searchable: true},
                {data: 'nombre', orderable: true, searchable: true},
                {data: 'acciones', name:'acciones', searchable:false, orderable:false,
                    render: function(data,style,row,meta){
                        return $("<div/>").html(data).text();
                    }},
            ],
            "columnDefs": 
            [   
                
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: -2 },
            ],
            retrieve : false,      
        });

        table.on('change','#select-all', function(){
            if(this.checked)
            {
                $('.checkboxes').attr("checked", true);
            }
            else
            {
                $('.checkboxes').attr("checked", false);
            }
        });

        /*$(".checkboxes").click(function(){
            var numberOfCheckboxes = $(".checkboxes").length;
            var numberOfCheckboxesChecked = $('.checkboxes:checked').length;
            if(numberOfCheckboxes == numberOfCheckboxesChecked) {
                $(".checkAll").prop("checked", true);
            } else {
                $(".checkAll").prop("checked", false);
            }
        });*/

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
});
</script>
@endpush