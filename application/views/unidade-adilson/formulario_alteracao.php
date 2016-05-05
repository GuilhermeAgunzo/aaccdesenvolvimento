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
    <h1 class="text-center">Alteração de unidade</h1>
    <?php
    //Inicia Formulario
    echo form_open("unidade/altera");

    //Cria um label e um campo de texto
    //Cria um label e um campo de texto
    echo form_label("Codigo Centro Paula Souza", "codigo");
    echo form_input(array("name" => "codigo",
                          "class" => "form-control",
                          "type" => "number",
                          "value"=> set_value($unidade['cd_cpsouza']),
                          "id" => "codigo",
                          "maxlength" => "5",
                          "value" => set_value("codigo",$unidade['cd_cpsouza'])));
    echo form_error('codigo');

    //Cria um label e um campo numerico
    echo form_label("Nome", "nome");
    echo form_input(array("name" => "nome",
                          "class" => "form-control",
                          "id" => "nome",
                          "maxlength" => "50",
                          "value" => set_value("nome",$unidade['nm_unidade'])));
    echo form_error("nome");

    //Dropdown list Estados
    $uf = array("SP"=>"São Paulo",
                "AC"=>"Acre",
                "AL"=>"Alagoas",
                "AM"=>"Amazonas",
                "AP"=>"Amapá",
                "BA"=>"Bahia",
                "CE"=>"Ceará",
                "DF"=>"Distrito Federal",
                "ES"=>"Espírito Santo",
                "GO"=>"Goiás",
                "MA"=>"Maranhão",
                "MT"=>"Mato Grosso",
                "MS"=>"Mato Grosso do Sul",
                "MG"=>"Minas Gerais",
                "PA"=>"Pará",
                "PB"=>"Paraíba",
                "PR"=>"Paraná",
                "PE"=>"Pernambuco",
                "PI"=>"Piauí",
                "RJ"=>"Rio de Janeiro",
                "RN"=>"Rio Grande do Norte",
                "RO"=>"Rondônia",
                "RS"=>"Rio Grande do Sul",
                "RR"=>"Roraima",
                "SC"=>"Santa Catarina",
                "SE"=>"Sergipe",
                "TO"=>"Tocantins");
    $extra = array("class" => "form-control");
    echo form_label("Estado", "uf");
    echo form_dropdown('uf', $uf, $unidade['UF_estado'],$extra);


    echo form_label("Cidade", "cidade");
    echo form_input(array(  "name" => "cidade",
                            "class" => "form-control",
                            "id" => "cidade",
                            "maxlength" => "50",
                            "value" => set_value("cidade",$unidade['nm_cidade'])));
    echo form_error("cidade");

    echo form_label("Bairro", "bairro");
    echo form_input(array(  "name" => "bairro",
                            "class" => "form-control",
                            "id" => "bairro",
                            "maxlength" => "50",
                            "value" => set_value("bairro",$unidade['nm_bairro'])));
    echo form_error("bairro");

    //Cria um label e um textarea
    echo form_label("Endereço", "endereco");
    echo form_input(array(  "name" => "endereco",
                            "class" => "form-control",
                            "id" => "endereco",
                            "maxlength" => "50",
                            "value" => set_value("endereco",$unidade['nm_endereco'])));
    echo form_error("endereco");

    echo form_label("Numero", "numero");
    echo form_input(array(  "name" => "numero",
                            "class" => "form-control",
                            "type" => "number",
                            "id" => "numero",
                            "maxlength" => "8",
                            "value" => set_value("numero", $unidade['cd_num_endereco'])));
    echo form_error("numero");

    echo form_label("Complemento", "complemento");
    echo form_input(array(  "name" => "complemento",
                            "class" => "form-control",
                            "id" => "complemento",
                            "maxlength" => "50",
                            "value" => set_value("complemento", $unidade['nm_complemento_endereco'])));
    echo form_error("complemento");

    echo form_label("CEP", "cep");
    echo form_input(array(  "name" => "cep",
                            "class" => "form-control",
                            "id" => "cep",
                            "type" => "number",
                            "maxlength" => "8",
                            "value" => set_value("cep", $unidade['cd_cep_endereco'])));
    echo form_error("cep");

    echo form_label("Telefone", "telefone");
    echo form_input(array(  "name" => "telefone",
                            "class" => "form-control",
                            "id" => "telefone",
                            "type" => "number",
                            "maxlength" => "15" ,
                            "value" => set_value("cep", $unidade['cd_telefone'])));
    echo form_error("telefone");

    echo form_label("Status Ativação", "status");
    $status = array(
                        '0'  => 'Desativado',
                        '1'  => 'Ativado',
    );
    echo form_dropdown('status', $status, $unidade['status_ativo'], 'class="form-control"');
    echo form_error("status");

    //Exibindo o Array
    echo "<br/>";
    $unidades = array("unidade" => $unidade);
    echo "<pre>";
        print_r($unidades);
    echo "</pre><br>";


   // $unidades = array_column($tb_unidade,'nm_unidade');
    ?>

    <br/>
    <?php
    //Cria um botão submit para enviar os dados
    echo form_button(array( "class" => "btn btn-primary",
                            "content" => "Alterar",
                            "type" => "submit"));
    //Encerra formulario
    echo form_close();
    ?>
</div>
</body>
</html>