const body = $(document);
body.ready(function(){

    $('.formulario').submit(function(e){
        e.preventDefault()
        // transforma o valor total em centavos
        texTotal = document.getElementById('valtotal').innerText.replace('R$', '')
        totaln = parseFloat(texTotal)
        total = totaln * 100
        valores = $(this).serializeArray()
        
        
        data = {
            'valor' : total,      
            'card_name' : valores[9].value,
            'card_cvv' : valores[12].value,   
            'card_number' : valores[10].value.replace(/\D/g, ''),
            'card_exp' : valores[11].value.replace(/\D/g, ''),           
            'name' :  valores[0].value,           
            'number_cpf' : valores[2].value.replace(/\D/g, ''),
            'email' : valores[1].value,
            'name' : valores[0].value,
            'street' :  valores[4].value,
            'state' :  valores[8].value,
            'city' :  valores[7].value,
            'neighborhood' :  valores[5].value,
            'cep' : valores[3].value.replace(/\D/g, ''),
            'items' : []                       
          }
        // pega os itens
        valorItem = document.querySelectorAll('.valor-item')
        nomeItem = document.querySelectorAll('.nome-item')
        
        for(i = 0; i < valorItem.length; i++){
            valor = valorItem[i].textContent.replace('R$', '')
            valorCentavos = parseFloat(valor) * 100
            item = {
                'id' : '1',
                'title' : nomeItem[i].textContent,
                'unit_price' : valorCentavos,
                'quantity' : 1,
                'tangible' : true
            }
           data['items'].push(item)
        }

        if(validateForm('#dadosForm')){
          $.ajax({
              url:'http://localhost:8080/transactions',
              method: 'POST',
              data: {
                'data': data
          },
              type:'JSON',
               
              success: function(response){
                console.log(response)
                if(response == '200'){

                    swal({
                        title: "Pago com Sucesso",
                        text: "Clique no botão para voltar",
                        icon: "success",
                        button: "Voltar",
                      }).then((value) => {
                        window.location.href = 'http://localhost:8080/'
                      });
                }
              },
              error: function(e){
                  console.log(e.error)
              },
              fail: function(){
  
              }
          });
      }
    });
})

