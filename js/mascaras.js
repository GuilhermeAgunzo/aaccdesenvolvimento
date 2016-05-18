$(document).ready(function () {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
});





var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {onKeyPress: function(val, e, field, options) {
        field.mask(maskBehavior.apply({}, arguments), options);
    }
    };

$('.phone-mask').mask(maskBehavior, options);
$('.cep').mask('00000-000');
$('.date').mask('0000-00-00');

function desmascara(){
    $('.celular').unmask();
    $('.cep').unmask();
}






/*

$('.phone-mask').mask('(99) 9999-9999?9').live('focusout', function(event) {
    var target, phone, element;
    target = (event.currentTarget) ? event.currentTarget : event.srcElement;
    phone = target.value.replace(/\D/g, '');
    element = $(target);
    element.unmask();
    if(phone.length > 10) {
        element.mask("(99) 99999-999?9");
    } else {
        element.mask("(99) 9999-9999?9");
    }
});


$('.cep').mask("99999-999");


function desmascara(){
    $('.phone-mask').mask("9999999999?9");
}

*/