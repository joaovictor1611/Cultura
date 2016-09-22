$(function () {

    // Atribui evento e função para limpeza dos campos
    $('#busca').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $("#busca").autocomplete({
        minLength: 2,
        source: function (request, response) {
            $.ajax({
                url: "autoconsulta.php",
                dataType: "json",
                data: {
                    acao: 'autocomplete',
                    parametro: $('#busca').val()
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        focus: function (event, ui) {
            $("#busca").val(ui.item.nome_interessado);
            carregarDados();
            return false;
        },
        select: function (event, ui) {
            $("#busca").val(ui.item.nome_interessado);
            return false;
        }
    })
            .autocomplete("instance")._renderItem = function (ul, item) {
        return $("<li>")
                .append("<a>" + item.nome_interessado + "</a><br>")
                .appendTo(ul);
    };

    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados() {
        var busca = $('#busca').val();

        if (busca != "" && busca.length >= 2) {
            $.ajax({
                url: "autoconsulta.php",
                dataType: "json",
                data: {
                    acao: 'consulta',
                    parametro: $('#busca').val()
                },
                success: function (data) {
                    $('#idtb_interessado').val(data[0].idtb_interessado);
                    $('#nome_interessado').val(data[0].nome_interessado);
                    $('#orgao_interessado').val(data[0].orgao_interessado);
                    $('#cpf_interessado').val(data[0].cpf_interessado);
                    $('#cnpj_interessado').val(data[0].cnpj_interessado);
                    $('#bairro_interessado').val(data[0].bairro_interessado);
                    $('#cidade_interessado').val(data[0].cidade_interessado);
                    $('#endereco_interessado').val(data[0].endereco_interessado);
                    $('#telefone_interessado').val(data[0].telefone_interessado);
                    $('#email_interessado').val(data[0].email_interessado);
                }
            });
        }
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos() {
        var busca = $('#busca').val();

        if (busca == "") {
            $('#idtb_interessado').val('');
            $('#nome_interessado').val('');
            $('#orgao_interessado').val('');
            $('#cpf_interessado').val('');
            $('#cnpj_interessado').val('');
            $('#bairro_interessado').val('');
            $('#cidade_interessado').val('');
            $('#endereco_interessado').val('');
            $('#telefone_interessado').val('');
            $('#email_interessado').val('');
        }
    }
});
