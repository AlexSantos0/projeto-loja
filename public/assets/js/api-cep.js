$(document).ready(function(){
    $('#cep').blur(function (){
        var cep = $(this).val() ;
        $.ajax({
            url: "https://viacep.com.br/ws/"+cep+"/json/",
            type: 'GET',
            success: function(dados){
                $('#log').val(dados.logradouro);
                $('#comp').val(dados.complemento);
                $('#cidade').val(dados.localidade);
                $('#bairro').val(dados.bairro);
                $('#estado').val(dados.uf);
            },
            error: function(){
                
            }
        });
    });
    
    $("div.pix-pagamento").click(function() {
        $("div").removeClass('show');
      });
    $("div.cartao-pagamento").click(function() {
        $("div").removeClass('show');
      });
    $("div.boleto-pagamento").click(function() {
        $("div").removeClass('show');
      });
});

