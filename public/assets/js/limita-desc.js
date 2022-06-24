$(document).ready(
    function(){
        desc = document.querySelectorAll('.descricao');     
        for(i = 0; i < desc.length; i++){ 
            let text = desc[i].textContent
            if(text.length > 10){
                text = text.substring(0,80) + "...";    
                desc[i].textContent = text  
            }           
        }
    }
    );