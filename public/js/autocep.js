$(document).ready(function() {
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {

                        //Atualiza os campos com os valores da consulta e ativa o evento 'change' nos elementos para que o Angular os reconheça como validos
                        
                        $("#rua").val(dados.logradouro);
                        angular.element(jQuery('#rua')).triggerHandler('change')
                        
                        $("#bairro").val(dados.bairro);
                        angular.element(jQuery('#bairro')).triggerHandler('change')

                        $("#cidade").val(dados.localidade);
                        angular.element(jQuery('#cidade')).triggerHandler('change')
                        
                        $("#estado").val(dados.uf);
                        angular.element(jQuery('#estado')).triggerHandler('change')
                        
                    }
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            }
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});