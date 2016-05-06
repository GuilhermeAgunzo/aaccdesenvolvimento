<h2>Resetar senha</h2>
<p>Entre com o email cadastrado para que seja enviada uma nova senha.</p>
<?php
echo form_open("usuario/resetarSenha");

echo form_label("Email", "email");
echo form_input(array(
    "name" => "email",
    "id" => "email",
    "class" => "form-control",
    "type" => "email",
    "required" => "required",
    "value" => set_value("email","")
));
echo form_error("email");

echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Enviar",
    "type" => "submit"
));

echo form_close();

?>