<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.css")?>">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <br/>
    <?php if($this->session->flashdata("success")) { ?>
        <p class="alert alert-success text-center"><?= $this->session->flashdata("success") ?></p>
    <?php } ?>
    <?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
    <?php } ?>
    <h1 class="text-center">Alteração de aluno</h1>
    <?php
    //Inicia Formulario
    echo form_open("aluno/novo");
    //Cria um label e um campo numerico
    echo form_label("Numero de Matricula", "matricula");
    echo form_input(array("name" => "matricula", "class" => "form-control", "id" => "matricula","type" => "number", "maxlength" => "255","value" => set_value("matricula"),""));
    echo form_error("matricula");
    echo form_button(array("class" => "btn", "content" => "Pesquisar", "type" => "button"));
    ?>
    <br>
    <?php

    echo form_label("Nome", "nome");
    echo form_input(array("name" => "nome", "class" => "form-control", "id" => "nome", "maxlength" => "255","value" => set_value("nome"),""));
    echo form_error("nome");

    echo form_label("Email", "email");
    echo form_input(array("name" => "email", "class" => "form-control", "id" => "email","type" => "email", "maxlength" => "255","value" => set_value("email"),""));
    echo form_error("email");

    echo form_label("Telefone Residencial", "telefone");
    echo form_input(array("name" => "telefone", "class" => "form-control", "id" => "telefone", "type" => "number","value" => set_value("telefone","")));
    echo form_error("telefone");

    echo form_label("Telefone Celular", "celular");
    echo form_input(array("name" => "celular", "class" => "form-control", "id" => "celular", "type" => "number","value" => set_value("celular","")));
    echo form_error("celular");

    //Dropdown list Estados

    $unidades = array_column($tb_unidade,'nm_unidade');
    $extra = array("class" => "form-control", "value" => "set_value");
    echo form_label("Unidade", "unidade");
    echo form_dropdown('id_unidade', $unidades, 'Fatec Praia Grande',$extra);


    $turmas = array_column($tb_turma,'id_turma','');
    $extra = array("class" => "form-control");
    echo form_label("Turma", "turma");
    echo form_dropdown('id_turma', $turmas, 'id_turma',$extra);

    $turno = array("manha" => "Manhã","tarde" => "Tarde","noite" => "Noite");
    $extra = array("class" => "form-control");
    echo form_label("Turno", "turno");
    echo form_dropdown('turno', $turno, 'Noite',$extra);

    ?>
    <br/>
    <?php
    //Cria um botão submit para enviar os dados
    echo form_button(array("class" => "btn btn-primary", "content" => "Cadastrar", "type" => "submit"));
    //Encerra formulario
    echo form_close();
    ?>
</div>
</body>
</html>