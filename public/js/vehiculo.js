$(document).ready(function(){
    $('#marca_id').change(function (){
        $.ajax({
            url: '/submarcas_id',
            type: 'GET',
            data: {
                id: $('#marca_id').val()
            },
            success: function(result){
               $('#subMarca_id').empty()
               $('#subMarca_id').prepend(result)
               
            }
        })
    })

    $('#marca_id').change(function() {
        $('#marca').val($('#marca_id :selected').text());
      });

    $('#subMarca_id').change(function() {
        $('#subMarca').val($('#subMarca_id :selected').text());
      });

    $('#color_id').change(function() {
        $('#color').val($('#color_id :selected').text());
      });

    $('#tipoVehiculo_id').change(function() {
        $('#tipoVehiculo').val($('#tipoVehiculo_id :selected').text());
      });

    $('#claseVehiculo_id').change(function() {
        $('#claseVehiculo').val($('#claseVehiculo_id :selected').text());
      });
      
    $('#procedencia_id').change(function() {
        $('#procedencia').val($('#procedencia_id :selected').text());
      });  

    
})
