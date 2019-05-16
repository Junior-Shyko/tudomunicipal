$(document).ready(function () {
    $("#createUser").modal('show');
    //ocutando load cidades
    hideReload();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //MASCARAS DOS CAMPOS
    $('#birth-date').mask('00/00/0000');
    $('#phone-number').mask('(00) 00000-0000');
    $('#number-cpf').mask('000.000.000-00');

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

$("#btn_save").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: domain_complet+"api/user",
        data: $("#formSaveUser").serialize(),
        dataType: "json",
        success: function (response) {
            successNotify();//MENSAGEM DE SUCESSO;
            $("#createUser").modal('hide');//FECHANDO O MODAL
            $('#formSaveUser')[0].reset();//RESETANDO O FORM
        }
    });
});
//PARA MENSAGEM DE SUCESSO
function successNotify(){
    $.notify({
        // options
        icon: 'fa fa-check',
        title: 'Sucesso',
        message: 'Usuário Cadastrado com sucesso!',              
       
    },{
        // settings
        type: 'success',
        offset: 20,
        spacing: 10,
       
        delay: 5000,
        timer: 1000
    });
}

function errorNotify(){
    $.notify({
        // options
        icon: 'fa fa-times',
        title: 'Ops!',
        message: 'Algo de errado, tente novamente!',              
       
    },{
        // settings
        type: 'danger',
        offset: 20,
        spacing: 10,
       
        delay: 5000,
        timer: 1000
    });
}
