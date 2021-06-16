$(document).ready(function(){
    $('#entidad_idD').change(function (){
        $.ajax({
            url: '/municipios_id',
            type: 'GET',
            data: {
                id: $('#entidad_idD').val()
            },
            success: function(result){
               $('#municipio_idD').empty()
               $('#municipio_idD').prepend(result)
               
            }
        })
    })

    $('#entidad_idD').change(function() {
        $('#entidadD').val($('#entidad_idD :selected').text());
      });

    $('#municipio_idD').change(function (){
        $.ajax({
            url: '/localidades_id',
            type: 'GET',
            data: {
                id: $('#municipio_idD').val()
            },
            success: function(result){
               $('#localidad_idD').empty()
               $('#localidad_idD').prepend(result)
            }
        })
    })

    $('#municipio_idD').change(function() {
        $('#municipioD').val($('#municipio_idD :selected').text());
    });
})
