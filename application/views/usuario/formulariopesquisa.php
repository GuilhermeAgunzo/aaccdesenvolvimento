<h2>Pesquisar usuário</h2>

<?php

echo form_open("usuario/pesquisarUsuario");

echo form_label("Email", "email");
echo form_input(array(
    "name" => "email",
    "id" => "email",
    "class" => "form-control",
    "type" => "email",
    "required" => "required",
    "value" => set_value("email",""),
    "minlength" => "6",
    "maxlength" => "70"
));
echo form_error("email");


echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Pesquisar",
    "type" => "submit"
));

echo form_close();

?>