$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: true
    });

    // Buscar CEP
    $('#ipt-zipcode').blur(function() {
        var zipcode = $(this).val().replace(/\D/g, '');

        if(zipcode != '') {
            var check = /^[0-9]{8}$/;

            if(check.test(zipcode)) {
                fillDiv('.div-address', '...');

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ zipcode +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#ipt-street").val(dados.logradouro);
                        $("#ipt-neighborhood").val(dados.bairro);
                        $("#ipt-city").val(dados.localidade);
                        $("#ipt-state").val(dados.uf);
                    }
                    else {
                        fillDiv('.div-address', '');
                        alert("CEP não encontrado.");
                    }
                });
            }
            else {
                fillDiv('.div-address', '');
                alert('Formato de CEP inválido.');
            }
        }
        else {
            fillDiv('.div-address', '');
        }
    });

    // Excluir registro da tabela
    $('#btn-delete').on('click', function() {
        var id = $('#delete-modal').data('id');

        $.ajax({
            url: window.location.href+'/imoveis',
            type: 'DELETE',
            data: {
                'id': id
            },
            dataType: 'json',
            statusCode: {
                200: function(response) {
                    $.notify({
	                   icon: "ti-check",
                       message: "Registro excluído com sucesso! Sua página será atualizada após 5 segundos."
                    },{
                        type: 'success',
                        timer: 5000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });

                    window.setTimeout(function() {
                        window.location.href = '/';
                    }, 5000);
                },
                400: function(response) {
                    $.notify({
	                   icon: "ti-info",
                       message: "Requisição inválida!"
                    },{
                        type: 'info',
                        timer: 5000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                404: function(response) {
                    $.notify({
	                   icon: "ti-info",
                       message: "Registro não encontrado!"
                    },{
                        type: 'info',
                        timer: 5000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                500: function(response) {
                    $.notify({
	                   icon: "ti-close",
                       message: "Um erro ocorreu e não foi possível excluir o registro!"
                    },{
                        type: 'danger',
                        timer: 5000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            }
        });

        $('#delete-modal').modal('hide');
    });

});

function actionDelete(id) {
    $('#delete-modal').data('id', id).modal('show');
}

function fillDiv(div, value) {
    $(div).find('input:text').val(value);
}
