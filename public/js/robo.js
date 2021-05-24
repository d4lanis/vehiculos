$(document).ready(function(){
    $('#entidad_id').change(function (){
        $.ajax({
            url: '/municipios_id',
            type: 'GET',
            data: {
                id: $('#entidad_id').val()
            },
            success: function(result){
               $('#municipio_id').empty()
               $('#municipio_id').prepend(result)
               
            }
        })
    })

    $('#entidad_id').change(function() {
        $('#entidad_nombre').val($('#entidad_id :selected').text());
      });

    $('#municipio_id').change(function (){
        $.ajax({
            url: '/localidades_id',
            type: 'GET',
            data: {
                id: $('#municipio_id').val()
            },
            success: function(result){
               $('#localidad_id').empty()
               $('#localidad_id').prepend(result)
            }
        })
    })

    $('#municipio_id').change(function() {
        $('#municipio_nombre').val($('#municipio_id :selected').text());
    });

    $('#localidad_id').change(function() {
        $('#localidad_nombre').val($('#localidad_id :selected').text());
    });

    $('#tipoLugar_id').change(function() {
        $('#tipoLugar_nombre').val($('#tipoLugar_id :selected').text());
    });

    $('#estatus_id').change(function() {
        $('#estatus_nombre').val($('#estatus_id :selected').text());
    });
})
