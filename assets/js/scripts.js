//Máscara para CPF e CNPJ
var options = {
  onKeyPress: function (cpf, ev, el, op) {
      var masks = ['000.000.000-000', '00.000.000/0000-00'],
          mask = (cpf.length > 14) ? masks[1] : masks[0];
      el.mask(mask, op);
  }
}

$('#cpf_cnpj').mask('000.000.000-000', options);


//Máscara para celular
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.mask-celular').mask(SPMaskBehavior, spOptions);


//Máscara para o campo de número do endereço aceitar apenas números
function onlynumber(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /^[0-9.]+$/;
  if( !regex.test(key) ) {
     theEvent.returnValue = false;
     if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


//Máscaras para cep e telefone
$(document).ready(function() {
  $(".mask-cep").mask("99999-999");
  $(".mask-telefone").mask("(99) 9999-9999");
  
});