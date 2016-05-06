<?php

echo form_open("usuario/alterarUsuarioForm");

echo form_label("Email atual", "emailantigo");
echo form_input(array(
    "name" => "emailantigo",
    "id" => "emailantigo",
    "class" => "form-control",
    "type" => "email",
    "required" => "required",
    "value" => set_value("emailantigo","")
));
echo form_error("emailantigo");

echo form_label("Novo email (deixe em branco para não alterar)", "emailnovo");
echo form_input(array(
    "name" => "emailnovo",
    "id" => "emailnovo",
    "class" => "form-control",
    "type" => "email",
    "value" => set_value("emailnovo","")
));
echo form_error("emailnovo");

echo form_label("Usuário ativo", "ativo");

$opcoesNivel = array(
    '0'  => 'Desativado',
    '1'  => 'Ativado',
);
echo form_dropdown('ativo', $opcoesNivel, '1', array("class" => "form-control"));

echo form_error("ativo");

echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Alterar",
    "type" => "submit"
));

echo form_close();

?>