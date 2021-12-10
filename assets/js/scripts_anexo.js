$(document).ready(function()
{

// //Validador de campos obrigatórios
// (function() {
//   'use strict';
//   window.addEventListener('load', function() {
//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   var forms = document.getElementsByClassName('needs-validation');
//   // Loop over them and prevent submission
//   var validation = Array.prototype.filter.call(forms, function(form) {
//       form.addEventListener('submit', function(event) {
//       if (form.checkValidity() === false) {
//           event.preventDefault();
//           event.stopPropagation();
//       }
//       form.classList.add('was-validated');
//       }, false);
//   });
//   }, false);
// })();

//Exibe erro de form_validation para campo de anexo
var anexo = $('.anexo p').text() ? $('.anexo p').text() : null;
  if(anexo!=null)
  {
    $('#anexo').addClass('is-invalid');
  }
});