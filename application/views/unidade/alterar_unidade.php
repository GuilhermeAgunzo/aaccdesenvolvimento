<?php
echo form_fieldset("<h1>Alteração de Unidade</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open('unidade/buscarAlteraUnidade', $atributos);
echo "<div class='form-group'>";
echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cd_cpsouza", "value" => set_value("cd_cpsouza",""), "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo "</br>"."</br>";

echo form_close();

if(isset($unidade)) {

    echo form_open('unidade/alteraUnidade', $atributos);

    echo "<div class='form-group'>";
    echo form_label("Nome da Unidade", "nm_unidade", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_input(array("name" => "nm_unidade", "value" => $unidade['nm_unidade'], "id" => "nm_unidade", "class" => "form-control", "maxlength" => "100"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "cd_cpsouza","value" => $unidade['cd_cpsouza'], "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "80"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Endereço", "endereco", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_input(array("name" => "endereco","value" => $unidade['nm_endereco'], "id" => "endereco", "class" => "form-control", "maxlength" => "100"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("Número", "numero", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "numero", "value" => $unidade['cd_num_endereco'], "id" => "numero", "class" => "form-control", "maxlength" => "10"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("Complemento", "complemento", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "complemento", "value" => $unidade['nm_complemento_endereco'], "id" => "complemento", "class" => "form-control", "maxlength" => "40"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("Bairro", "bairro", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "bairro", "value" => $unidade['nm_bairro'], "id" => "bairro", "class" => "form-control", "maxlength" => "80"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("CEP", "cep", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "cep", "value" => $unidade['cd_cep_endereco'], "id" => "cep", "class" => "form-control", "maxlength" => "80"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("Cidade", "cidade", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "cidade", "value" => $unidade['nm_cidade'], "id" => "cidade", "class" => "form-control", "maxlength" => "80"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("UF", "uf", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-10'>";
    $opcao = array('AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MT' => 'MT', 'MS' => 'MS', 'MG' => 'MG', 'PR' => 'PR', 'PB' => 'PB', 'PA' => 'PA', 'PE' => 'PE', 'PI' => 'PI', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'RO' => 'RO', 'RR' => 'RR', 'SC' => 'SC', 'SE' => 'SE', 'SP' => 'SP', 'TO' => 'TO');
    echo form_dropdown('uf', $opcao, 'SP', array("class" => "form-control"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo form_label("Telefone da Unidade", "telefone", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "telefone", "value" => $unidade['cd_telefone'], "id" => "telefone", "class" => "form-control", "maxlength" => "80"));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo "<div class='col-sm-offset-2 col-sm-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
    echo "</div>";
    echo "</div>";

    echo form_close();

}
?>
