<?php

echo form_open("usuario/alterarSenha");

echo form_label("Nova senha", "senha");
echo form_input(array(
    "name" => "senha",
    "id" => "senha",
    "class" => "form-control",
    "type" => "password",
    "required" => "required",
    "minlength" => "6",
    "maxlength" => "14"
));
echo form_error("senha");

echo form_label("Confirmar nova senha", "confirmasenha");
echo form_input(array(
    "name" => "confirmasenha",
    "id" => "confirmasenha",
    "class" => "form-control",
    "type" => "password",
    "required" => "required",
    "minlength" => "6",
    "maxlength" => "14"
));
echo form_error("confirmasenha");

echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Alterar",
    "type" => "submit"
));

echo form_close();

?>

