<?php
echo form_fieldset("<h1>Cadastro de Unidade</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('unidade/cadastrarUnidade', $atributos);

echo "<div class='form-group'>";
echo form_label("Nome da Unidade", "nm_unidade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "nm_unidade", "value" => set_value("nm_unidade",""), "id" => "nm_unidade" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("nm_unidade");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cd_cpsouza", "value" => set_value("cd_cpsouza",""), "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("cd_cpsouza");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Endereço", "endereco", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "endereco", "value" => set_value("endereco",""), "id" => "endereco" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("endereco");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Número", "numero", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "numero", "value" => set_value("numero",""), "type"=> "number", "id" => "numero" ,"class" => "form-control", "maxlength" => "10"));
echo form_error("numero");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Complemento", "complemento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "complemento", "value" => set_value("complemento",""), "id" => "complemento" ,"class" => "form-control", "maxlength" => "40"));
echo form_error("complemento");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Bairro", "bairro", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "bairro", "value" => set_value("bairro",""), "id" => "bairro" ,"class" => "form-control", "maxlength" => "80"));
echo form_error("bairro");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("CEP", "cep", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cep", "value" => set_value("cep",""), "id" => "cep" ,"class" => "form-control cep", "maxlength" => "80"));
echo form_error("cep");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Cidade", "cidade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cidade", "value" => set_value("cidade",""), "id" => "cidade" ,"class" => "form-control", "maxlength" => "80"));
echo form_error("cidade");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("UF", "uf", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
$opcao = array('AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MT' => 'MT', 'MS' => 'MS', 'MG' => 'MG', 'PR' => 'PR', 'PB' => 'PB', 'PA' => 'PA', 'PE' => 'PE', 'PI' => 'PI', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'RO' => 'RO', 'RR' => 'RR', 'SC' => 'SC', 'SE' => 'SE', 'SP' => 'SP', 'TO' => 'TO');
echo form_dropdown('uf', $opcao, 'SP', array("class" => "form-control"));
echo form_error("uf");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Telefone da Unidade", "tel", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "telefone", "value" => set_value("telefone",""), "id" => "tel" ,"class" => "form-control phone-mask", "maxlength" => "80"));
echo form_error("telefone");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>
