// // VALIDAÇÃO DO BOOTSTRAP
// (function () {
//     'use strict'
 
//     var forms = document.querySelectorAll('.needs-validation')
  
//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//       form.addEventListener('submit', function (event) {
//           if (!form.checkValidity()) {
//             event.preventDefault()
//             event.stopPropagation()
//           }
  
//           form.classList.add('was-validated')
//         }, false)
//       })
// })()  

// VALIDAÇÃO DOS CAMPOS
    validateForm = (formId) => {
      inputs = document.querySelectorAll(formId +' input, select')
      let response = true;
      values = []
      
      for(i = 0; i < inputs.length; i++){
          values += inputs[i].value 
          dataType = inputs[i].getAttribute('data-type-validation')
          if(inputs[i].value == ""){
              $(inputs[i]).addClass('is-invalid');
              $(inputs[i]).removeClass('is-valid');
              swal({
                title: "Verifique os Campos",
                icon: "warning",
                dangerMode: true,
              })
              response = false
          }else{
              $(inputs[i]).removeClass('is-invalid');
              $(inputs[i]).addClass('is-valid');
              
              switch(dataType){
  
                  case dataType = "name":
                      nameReg = /^[a-z]{2,}\ [a-z]{2,}/gi
                      if(nameReg.test(inputs[i].value)){
                          $(inputs[i]).removeClass('is-invalid');
                          $(inputs[i]).addClass('is-valid');                                           
                      }else{
                          $(inputs[i]).addClass('is-invalid');
                          $(inputs[i]).removeClass('is-valid'); 
                          swal({
                            title: "Verifique os Campos",
                            text: "Nome",
                            icon: "warning",
                            dangerMode: true,
                          })
                          response = false             
                      }                 
                  break;
                  case dataType = "name-card":
                    nameCReg = /^[a-z]{2,}\ [a-z]{2,}/gi                    
                      if(nameCReg.test(inputs[i].value)){
                          $(inputs[i]).removeClass('is-invalid');
                          $(inputs[i]).addClass('is-valid');                                           
                      }else{
                          $(inputs[i]).addClass('is-invalid');
                          $(inputs[i]).removeClass('is-valid'); 
                          swal({
                            title: "Verifique os Campos",
                            text: "Nome do cartao",
                            icon: "warning",
                            dangerMode: true,
                          })
                          response = false             
                      }                 
                  break;
  
                  case dataType = "email":               
                      let emailReg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g
                      if(emailReg.test(inputs[i].value)){
                          $(inputs[i]).removeClass('is-invalid');
                          $(inputs[i]).addClass('is-valid');  
                   
                      }else{
                          $(inputs[i]).addClass('is-invalid');
                          $(inputs[i]).removeClass('is-valid');
                          swal({
                            title: "Verifique os Campos",
                            text: "Email",
                            icon: "warning",
                            dangerMode: true,
                          })            
                      }
                  break;
  
                  case dataType = "cpf":
                  break;
  
                  case dataType = "cep":
                    break;
  
  
                  case dataType = "number-card":
                      
                    break;
  
                  default:
                                  
                  }             
              }   
          }
          return response
}
  



