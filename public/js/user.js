$(document).ready(function () {
    $("#createUser").modal('show');
    hideReload();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#selectState").on('change', function () {
        //MOSTRANDO O LOAD
        showReload();
        //DEIXANDO O SELECT VAZIO PARA RECEBER OS OPTINS
        $('#selectCity').empty();
        //ID DO ESTADO
        var idCity = $("#selectState").val();
        //REQUISIÇÃO AJAX
        $.ajax({
            type: "post",
            url: domain_complet+'getCity/'+idCity,
            data: {id: idCity},
            dataType: "json",
            success: function (data) {
                //ocultando a div com load
                hideReload();
                //LOOP NO OBJETO DATA
                $.each(data, function (indexInArray, value) { 
                    //PREENCHENDO AS OPÇÕES
                   $('#selectCity').append('<option value="'+value.id+'">'+value.name+'</option>');
                });                
            }
        });
    });
});
//FUNCAO PARA OCUTAR A DIV COM LOAD
function hideReload()
{
    $("#loadCity").css('display', 'none');
}
//MOSTRANDO A DIV
function showReload()
{
    $("#loadCity").css('display', 'block');
}