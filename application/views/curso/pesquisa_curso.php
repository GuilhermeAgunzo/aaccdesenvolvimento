<script type="text/javascript">
    function confirma(){
        return confirm("Confirmar informações e enviar?");
    }
    var url = "<?= base_url() ?>" + "index.php/Curso/buscaCursosByUnidade";
    function busca_cursos(id_unidade){
        $.post(url, {
            id_unidade : id_unidade
        }, function(data){
            $('#cursos').html(data);
        })
    }
</script>
<?php
echo form_fieldset("<h1>Pesquisa de Curso</h1>");

echo form_open('curso/buscarDetalhesCursoPesquisa', array('class' => 'form-horizontal'));
echo "<div class='row'>";
echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
$unidades = array('' =>  "Selecione")+$unidades;
if (!isset($unidade)) {
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));

} else {
    echo form_dropdown('Unidade', $unidades, $unidade, array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));
}
echo "</div>";
echo form_label("Curso", "curso", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
echo "<select name='cursos' id='cursos' class='form-control' required='required'></select>";
echo "</div>";

echo "<div class='col-md-2'>";
echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
echo "</div>";

echo "</div>";

//detalhes do curso
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

if(!isset($curso)){
}else{
    echo "<div class='row'>";
    echo form_label("Nome do Curso", "nome_curso", array("class" => "col-md-4 control-label"));
    echo "<div class='form-group col-md-6'>";
    echo form_input(array("name" => "nome_curso", "value" => set_value("nome_curso",$curso['nm_curso']), "id" => "nome_curso" ,"class" => "form-control", "maxlength" => "70","Disabled" => "Disabled"));
    echo form_error("nome_curso");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Abreviaçaõ do Curso", "abreviacao_curso", array("class" => "col-md-4 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "abreviacao_curso", "value" => set_value("abreviacao_curso",$curso['nm_abreviacao']), "id" => "abreviacao_curso" ,"class" => "form-control", "maxlength" => "70","Disabled" => "Disabled"));
    echo form_error("abreviacao_curso");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Nome do Coordenador", "nome_coordenador", array("class" => "col-md-4 control-label"));
    echo "<div class='form-group col-md-6'>";
    echo form_input(array("name" => "nome_coordenador", "value" => set_value("nome_coordenador",$curso['nm_coordenador_curso']), "id" => "nome_coordenador" ,"class" => "form-control", "maxlength" => "100","Disabled" => "Disabled"));
    echo form_error("nome_coordenador");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Cpf do Coordenador", "cpf_coordenador", array("class" => "col-md-4 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "cpf_coordenador", "value" => set_value("cpf_coordenador",$curso['cd_cpf_coordenador_curso']), "id" => "cpf_coordenador" ,"class" => "form-control", "maxlength" => "50","Disabled" => "Disabled"));
    echo form_error("cpf_coordenador");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Quantidade de horas do curso de AACC", "qtd_horas_aacc", array("class" => "col-md-4 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "qtd_horas_aacc", "value" => set_value("qtd_horas_aacc",$curso['qt_horas_aacc']), "id" => "qtd_horas_aacc" ,"class" => "form-control","type" => "number","Disabled" => "Disabled"));
    echo form_error("qtd_horas_aacc");
    echo "</div>";
    echo "</div>";
    echo form_close();
}
?>