$(document).ready(
    function(){
        valores = document.querySelectorAll('#valor'); 
        total = 0
        valorTotal = document.getElementById('valtotal');  
        for(i = 0; i < valores.length; i++){
            let valor = parseFloat(valores[i].textContent.replace('R$',''));
            total += valor
        }  
        valorTotal.textContent = "R$ "+total.toFixed(2).replace('.', ',')
    }   
);
    