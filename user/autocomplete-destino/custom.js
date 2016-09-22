$(function () {

    // Atribui evento e função para limpeza dos campos
    $('#buscad').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $("#buscad").autocomplete({
        minLength: 2,
        source: function (request, response) {
            $.ajax({
                url: "autoconsulta-d.php",
                dataType: "json",
                data: {
                    acao: 'autocomplete',
                    parametro: $('#buscad').val()
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        focus: function (event, ui) {
            $("#buscad").val(ui.item.nome_usuario);
            carregarDados();
            return false;
        },
        select: function (event, ui) {
            $("#buscad").val(ui.item.nome_usuario);
            return false;
        }
    })
            .autocomplete("instance")._renderItem = function (ul, item) {
        return $("<li>")
                .append("<a>" + item.nome_usuario + "</a><br>")
                .appendTo(ul);
    };

    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados() {
        var busca = $('#buscad').val();

        if (busca != "" && busca.length >= 2) {
            $.ajax({
                url: "autoconsulta-d.php",
                dataType: "json",
                data: {
                    acao: 'consulta',
                    parametro: $('#buscad').val()
                },
                success: function (data) {
                    $('#idtb_usuario').val(data[0].idtb_usuario);
                    
                 }
            });
        }
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos() {
        var busca = $('#buscad').val();

        if (busca == "") {
            $('#idtb_usuario').val('');
            
        }
    }
});
