/**
 * Altera os possiveis valores do select de cidade baseado no estado
 * @param cidade_id - Valor default a ser selecionado após a operação
 */
function getcidades(cidade_id) {
    if ($('#estado').val() !== '') {
        let select = $('#estado').attr("id");
        let value = $('#estado').val();
        let dependent = $('#estado').data('dependent');
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/ajax_cidades",
            method: "POST",
            data: {select: select, value: value, _token: _token, dependent: dependent},
            success: function (result) {
                $('#' + dependent).html(result);
                if (cidade_id != null)
                    $('#cidade').val(cidade_id);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })
    }
}

$(document).ready(function () {

    // Quando o usuário selecionar um estado, mostre as cidades de tal no select de cidades
    $('#estado').change(function () {
        getcidades(null);
    }),

        // Quando o usuário preencher o CEP faz o autocomplete
        $("#cep").blur(function () {

            // Remove caracteres não numéricos
            let cep = this.value.replace(/[^0-9]/, "");

            // URL do local de busca por CEP
            let url = "https://viacep.com.br/ws/" + cep + "/json/";

            // Token CSRF do Laravel
            let _token = $('input[name="_token"]').val();

            $.getJSON(url, function (dadosRetorno) {
                try {

                    // Preencha o bairro e rua
                    $("#rua").val(dadosRetorno.logradouro);
                    $("#bairro").val(dadosRetorno.bairro);

                    let cidade = dadosRetorno.localidade;
                    let uf = dadosRetorno.uf;

                    // Busca pelo id do estado e da cidade de acordo com seus nomes nas váriaveis acima
                    $.ajax({
                        url: "/ajax_estado_cidade",
                        method: "POST",
                        data: {uf: uf, cidade: cidade, _token: _token},
                        success: function (result) {

                            // Separa o resultado JSON em um array
                            let resul_array = $.parseJSON(result);

                            // Debug
                            console.log('COD: ' + uf + ' = ' + resul_array[0] + '\nCOD: ' + cidade + ' = ' + resul_array[1]);

                            // Altera o Campo do estado
                            $('#estado').val(resul_array[0]);

                            // Chama essa função para setar
                            getcidades(resul_array[1]);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                } catch (ex) {
                    console.log('Erro ao pegar JSON do CEP');
                }
            });
        });
});


