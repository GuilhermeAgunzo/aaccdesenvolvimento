<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap2.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/sb-admin.css")?>">

    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <br/>
    <?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
    <?php } ?>
    <h1 class="text-center">Cadastro de unidade</h1>
    <?php
    //Inicia Formulario
    echo form_open("unidade/novo");

    //Cria um label e um campo de texto
    echo form_label("Codigo Centro Paula Souza", "codigo");
    echo form_input(array(  "name" => "codigo",
                            "class" => "form-control",
                            "type" => "number",
                            "id" => "codigo",
                            "maxlength" => "5",
                            "value" => set_value("codigo","")));
    echo form_error('codigo');

    //Cria um label e um campo numerico
    echo form_label("Nome", "nome");
    echo form_input(array(  "name" => "nome",
                            "class" => "form-control",
                            "id" => "nome",
                            "maxlength" => "50",
                            "value" => set_value("nome"),""));
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
    echo form_dropdown('uf', $uf, 'SP',$extra);


    echo form_label("Cidade", "cidade");
    echo form_input(array(  "name" => "cidade",
                            "class" => "form-control",
                            "id" => "cidade",
                            "maxlength" => "50",
                            "value" => set_value("cidade","")));
    echo form_error("cidade");

    echo form_label("Bairro", "bairro");
    echo form_input(array(  "name" => "bairro",
                            "class" => "form-control",
                            "id" => "bairro",
                            "maxlength" => "50",
                            "value" => set_value("bairro","")));
    echo form_error("bairro");

    //Cria um label e um textarea
    echo form_label("Endereço", "endereco");
    echo form_input(array(  "name" => "endereco",
                            "class" => "form-control",
                            "id" => "endereco",
                            "maxlength" => "50",
                            "value" => set_value("endereco","")));
    echo form_error("endereco");

    echo form_label("Numero", "numero");
    echo form_input(array(  "name" => "numero",
                            "class" => "form-control",
                            "type" => "number",
                            "id" => "numero",
                            "maxlength" => "8",
                            "value" => set_value("numero","")));
    echo form_error("numero");

    echo form_label("Complemento", "complemento");
    echo form_input(array(  "name" => "complemento",
                            "class" => "form-control",
                            "id" => "complemento",
                            "maxlength" => "50",
                            "value" => set_value("complemento","")));
    echo form_error("complemento");

    echo form_label("CEP", "cep");
    echo form_input(array(  "name" => "cep",
                            "class" => "form-control",
                            "id" => "cep",
                            "type" => "number",
                            "maxlength" => "8",
                            "value" => set_value("cep","")));
    echo form_error("cep");

    echo form_label("Telefone", "telefone");
    echo form_input(array(  "name" => "telefone",
                            "class" => "form-control",
                            "id" => "telefone",
                            "type" => "number",
                            "maxlength" => "15" ,
                            "value" => set_value("telefone","")));
    echo form_error("telefone");

    ?>
    <br/>
    <?php
    //Cria um botão submit para enviar os dados
    echo form_button(array( "class" => "btn btn-primary",
                            "content" => "Cadastrar",
                            "type" => "submit"));
    //Encerra formulario
    echo form_close();
    //echo anchor('unidade/verificacao-cadastro','Voltar', array("class" => "btn btn-primary"))
    ?>
</div>
</body>
</html>