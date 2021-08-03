$(document).ready(function (){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});

    function dynamicDropdown(url, id = null, target, otro = null) {

    let data = {
        "_token": "{{ csrf_token() }}",
        id: id
    }

    $.post(url, data, function(result){
        let default_value = 0;
        let $select = $("#"+target);
        $select.empty();
        let options = [];

        if(null == data.id){
            options.push(`<option value="" selected>`+target+
                ` - seleccione una opción</option>`);
        } else {
            options.push(`<option value=""> -------------- </option>`);
            default_value = data.id;
        }

        if(result.status === 'ok'){
            $.each(result.data, function(i, item) {
                item_name = item.name.toUpperCase();
                if(item.id == default_value){
                    options.push(`<option value="${item.id}" selected>${item_name}</option>`);
                } else {
                    options.push(`<option value="${item.id}">${item_name}</option>`);
                }

            });
            if (null != otro) {
                 options.push(`<option value="1">`+otro+`</option>`);
            }
        }
        
        $select.append(options);

    }).fail(function(){
        $('#getDiv').html('algo salio mal');
    });
}

function clearDropdown(select)
{
    select.empty();
    let options = [];
    options.push(`<option value="" disabled selected> Cargando datos </option>`);
    select.append(options);
}
})