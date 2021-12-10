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

  //Exibe erro de form_validation para campo de valor
  var val = $('.val p').text();
  if(val == 'Saldo de contrato insuficiente.')
  {
    $('#valor').addClass('is-invalid');
  }
});

function limpar_vencimento()
{
  let vencimento = document.getElementById('vencimento')
  vencimento.value = ""
}
