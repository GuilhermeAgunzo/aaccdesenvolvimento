<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap2.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/sb-admin.css")?>">

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
    <h1 class="text-center">Cadastro de aluno</h1>
    <?php
    //Inicia Formulario
    echo form_open("aluno/novo");
    //Cria um label e um campo numerico
    echo form_label("Numero de Matricula", "matricula");
    echo form_input(array("name" => "matricula",
                          "class" => "form-control",
                          "id" => "matricula",
                          "type" => "number",
                          "maxlength" => "13",
                          "minlength" => "13",
                          "value" => set_value("matricula"),""));
    echo form_error("matricula");

    echo form_label("Nome", "nome");
    echo form_input(array("name" => "nome",
                          "class" => "form-control",
                          "id" => "nome",
                          "maxlength" => "70",
                          "minlength" => "3",
                          "value" => set_value("nome"),""));
    echo form_error("nome");

    echo form_label("Email", "email");
    echo form_input(array("name" => "email",
                          "class" => "form-control",
                          "id" => "email",
                          "type" => "email",
                          "maxlength" => "70",
                          "minlength" => "10",
                          "value" => set_value("email"),""));
    echo form_error("email");

    echo form_label("Telefone Residencial", "telefone");
    echo form_input(array("name" => "telefone",
                          "class" => "form-control",
                          "id" => "telefone",
                          "maxlength" => "15",
                          "minlength" => "10",
                          "type" => "number",
                          "value" => set_value("telefone","")));
    echo form_error("telefone");

    echo form_label("Telefone Celular", "celular");
    echo form_input(array("name" => "celular",
                          "class" => "form-control",
                          "maxlength" => "15",
                          "minlength" => "10",
                          "id" => "celular",
                          "type" => "number",
                          "value" => set_value("celular","")));
    echo form_error("celular");


   // $unidades = array(
     //   $tb_unidade['id_unidade'] => $tb_unidade['nm_unidade']
   // );
    $extra = array("class" => "form-control");
    echo form_label("Unidade", "unidade");
    //echo form_dropdown('unidade', $unidades, $unidades ,$extra);


    $turmas = array_column($tb_turma,'id_turma');
    $optTurmas = array('turma' => $turmas);
    $extra = array("class" => "form-control");

    echo form_label("Turma", "turma");
    echo form_dropdown('turma', $optTurmas, $optTurmas,$extra);

    $turno = array("manha" => "Manhã",
                   "tarde" => "Tarde",
                   "noite" => "Noite");
    $optTurno = array('turno' => $turno);
    $extra = array("class" => "form-control");


    echo form_label("Turno", "turno");
    echo form_dropdown('turno', $optTurno,"Noite",$extra);

    ?>
    <br/>
    <?php
    $unidades = array("unidade" => $tb_unidade);
    echo "<pre>";
    print_r($unidades);
    echo "</pre><br>";
    //Cria um botão submit para enviar os dados
    echo form_button(array("class" => "btn btn-primary",
                           "content" => "Cadastrar",
                           "type" => "submit"));
    //Encerra formulario
    echo form_close();
    ?>
</div>
</body>
</html>