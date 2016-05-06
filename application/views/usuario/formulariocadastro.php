
    <?php

echo form_open("usuario/cadastrarUsuarioForm");

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

echo form_label("Nível de acesso", "nivelacesso");

    $opcoesNivel = array(
        '1'  => 'Aluno',
        '2'  => 'Professor',
    );
    echo form_dropdown('nivelacesso', $opcoesNivel, '1', 'class="form-control"');

echo form_error("nivelacesso");


    echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Cadastrar",
    "type" => "submit"
));

echo form_close();

?>
