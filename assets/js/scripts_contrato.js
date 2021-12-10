$(document).ready(function()
   {
      $(".dinheiro").mask("000.000.000.000.000,00",{reverse: true});

    //Validador de campos obrigatórios
    (function() {
      'use strict';
      window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
          }
          form.classList.add('was-validated');
          }, false);
      });
      }, false);
  })();

  //Exibe erro de form_validation para campos de data
  var data = $('.dt_fim p').text();
  var msg1 = 'A data de início do contrato não pode ser após a data final.';//Mensagem de erro da função de validação na controle
  var msg2 = 'Preencha a data de início do contrato.';//Mensagem de erro da função de validação na controle
  if(data == msg1 || data == msg2)
  {
    $('#inicio_contrato').addClass('is-invalid');
    $('#fim_contrato').addClass('is-invalid');
  }
  });

function limpar_data_inicial()
{
  let dt_in = document.getElementById('inicio_contrato')
  dt_in.value = ""
}

function limpar_data_final()
{
  let dt_fm = document.getElementById('fim_contrato')
  dt_fm.value = ""
}