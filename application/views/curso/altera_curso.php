<script type="text/javascript">
    $(document).ready(function(){
        $("#cpf_coordenador").mask("999.999.999-99");
    });
</script>
<?php

echo form_fieldset("<h1>Alteração de Curso</h1>");

echo form_open('curso/buscarCursosUnidade', array('class' => 'form-horizontal'));
echo "<div class='row'>";
echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
$unidades = array('' =>  "Selecione")+$unidades;
if (!isset($unid)) {
    echo form_dropdown('unidade', $unidades, "", array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));

} else {
    echo form_dropdown('unidade', $unidades, $unid, array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));
}
echo "</div>";

echo "<div class='col-md-2'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();

//detalhes do curso

if (isset($termo)){
    echo "<h1>{$termo['nm_unidade']}</h1>";
}

if(!isset($cursos)){
}else {?>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Codigo</th>
                <th>Abreviação</th>
                <th>Nome do Coordenador</th>
                <th>Cpf do Coordenador</th>
                <th>Quantidade de horas do curso de AACC</th>
                <th></th>
            </tr>
            </thead>
            <?php
            foreach ($cursos as $curso) :
                echo "<tr>";
                echo "<td class='texto-esquerda'>{$curso['nm_curso']}</td>";
                echo "<td class='texto-esquerda' id=''>{$curso['cd_curso']}</td>";
                echo "<td>{$curso['nm_abreviacao']}</td>";
                echo "<td>{$curso['nm_coordenador_curso']}</td>";
                echo "<td>{$curso['cd_cpf_coordenador_curso']}</td>";
                echo "<td>{$curso['qt_horas_aacc']}</td>";
                echo "<td>".anchor("curso/buscarAlteraCurso/{$curso['id_curso']}","Alterar", "class = 'btn btn-default btn-alterar btn-xs'")."</td>";
                echo "</tr>";
            endforeach;
            ?>

        </table>
    </div>
<?php }
if(!isset($cursoDetalhes)){
}else{
    echo form_fieldset("<h1>            </h1>");
    if (isset($unidade)){
        //echo "<h1>{$unidade['nm_unidade']}. " > ". {$cursoDetalhes['nm_abreviacao']}</h1>";
        echo "<h3 class='col-lg-offset-3'>{$unidade['nm_unidade']} - {$cursoDetalhes['nm_abreviacao']}</h3>";
    }
    echo form_open('curso/alterarCurso', array('class' => 'form-horizontal'));
    echo form_input(array("name" => "id_curso", "value" => set_value("nome_curso",$cursoDetalhes['id_curso']), "id" => "id_curso" ,"type" => "hidden", 'required' => 'required'));
    echo "<div class='row'>";
    echo form_label("Nome do Curso", "nome_curso", array("class" => "col-md-3 control-label"));
    echo "<div class='form-group col-md-6'>";
    echo form_input(array("name" => "nome_curso", "value" => set_value("nome_curso",$cursoDetalhes['nm_curso']), "id" => "nome_curso" ,"class" => "form-control", "maxlength" => "70", 'required' => 'required'));
    echo form_error("nome_curso");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Codigo do Curso", "codigo_curso", array("class" => "col-md-3 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "codigo_curso", "value" => set_value("codigo_curso",$cursoDetalhes['cd_curso']), "id" => "codigo_curso" ,"class" => "form-control", "maxlength" => "20", "readonly" => "readonly"));
    echo form_error("codigo_curso");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Abreviação do Curso", "abreviacao_curso", array("class" => "col-md-3 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "abreviacao_curso", "value" => set_value("abreviacao_curso",$cursoDetalhes['nm_abreviacao']), "id" => "abreviacao_curso" ,"class" => "form-control", "maxlength" => "70"));
    echo form_error("abreviacao_curso");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Nome do Coordenador", "nome_coordenador", array("class" => "col-md-3 control-label"));
    echo "<div class='form-group col-md-6'>";
    echo form_input(array("name" => "nome_coordenador", "value" => set_value("nome_coordenador",$cursoDetalhes['nm_coordenador_curso']), "id" => "nome_coordenador" ,"class" => "form-control", "maxlength" => "100", 'required' => 'required'));
    echo form_error("nome_coordenador");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Cpf do Coordenador", "cpf_coordenador", array("class" => "col-md-3 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "cpf_coordenador", "value" => set_value("cpf_coordenador",$cursoDetalhes['cd_cpf_coordenador_curso']), "id" => "cpf_coordenador" ,"class" => "form-control", "maxlength" => "50"));
    echo form_error("cpf_coordenador");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Quantidade de horas do curso de AACC", "qtd_horas_aacc", array("class" => "col-md-3 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "qtd_horas_aacc", "value" => set_value("qtd_horas_aacc",$cursoDetalhes['qt_horas_aacc']), "id" => "qtd_horas_aacc" ,"class" => "form-control","type" => "number", 'required' => 'required'));
    echo form_error("qtd_horas_aacc");
    echo "</div>";
    echo "</div>";

    echo "</br>";
    echo "</br>";

    echo "<div class='row'>";
    echo "<div class='form-group'>";
    echo "<div class='col-md-offset-2 col-md-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
    echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo form_close();
}
?>