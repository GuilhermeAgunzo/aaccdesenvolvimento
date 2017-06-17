<?php
    echo form_fieldset("<h1>Alteração de Aluno</h1>");
$atributos = array('class' => 'form-horizontal');

if(!isset($aluno)){

echo form_open('', $atributos);

echo "<div class='row'>";
echo form_label("Unidade", "id_unidade", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-md-3'>";

echo form_dropdown('id_unidade',$unidades, "", array("class" => "form-control", "onchange" => "curso(this.value)"));
echo form_error("id_unidade");
echo "</div>";
echo "</div>";

echo '<div id="curso"></div>';

echo form_close();

}

    // ------------------------------------------------------------------------------------------------------------------------------

    if(isset($aluno)) {
        if ($aluno != null) {
            echo form_open("aluno/alterarAluno", $atributos);
            echo form_hidden('id_aluno', $aluno['id_aluno']);
            echo "<div class='row'>";
            echo form_label("Número de matrícula", "matricula", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group col-sm-2'>";
            echo form_input(array("name" => "matricula", "value" => set_value("matricula", $aluno['cd_mat_aluno']), "required" => "required", "id" => "matricula", "class" => "form-control", "maxlength" => "13", "minlength" => "13", "min" => "0", "readonly" => "readonly"));
            echo form_error("matricula");
            echo "</div>";
            echo "<div class='col-sm-1'>";
            echo "</div>";
            echo form_label("Turma", "turma", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group  col-sm-3'>";
            echo form_dropdown('turma', $dropDownTurma, set_value("turma", $aluno['id_turma']), array("class" => "form-control"));
            echo form_error("turma");
            echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
            echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group col-sm-3'>";
            echo form_input(array("name" => "nome", "value" => set_value("nome", $aluno['nm_aluno']), "required" => "required", "id" => "nomeCompleto", "class" => "form-control", "maxlength" => "70"));
            echo form_error("nome");
            echo "</div>";
            echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group col-sm-2'>";
            echo form_input(array("name" => "telefone", "value" => set_value("telefone", $aluno['cd_tel_residencial']), "id" => "telefone", "class" => "form-control phone-mask", "maxlength" => "15"));
            echo form_error("telefone");
            echo "</div>";
            echo "</div>";


            echo "<div class='row'>";
            echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group col-sm-3'>";
            echo form_input(array("name" => "email", "value" => set_value("email", $aluno['nm_email']), "required" => "required", "type" => "email", "id" => "email", "class" => "form-control", "maxlength" => "70"));
            echo form_error("email");
            echo "</div>";
            echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group col-sm-2'>";
            echo form_input(array("name" => "celular", "value" => set_value("celular", $aluno['cd_tel_celular']), "id" => "celular", "class" => "form-control phone-mask", "maxlength" => "15"));
            echo form_error("celular");
            echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo form_close();

        }else{

        echo "ERRO";
        }
    }

?>

<script>
    //função ajax
    function GetXMLHttp() {
        if(navigator.appName == "Microsoft Internet Explorer") {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else {
            xmlHttp = new XMLHttpRequest();
        }
        return xmlHttp;
    } var xmlRequest = GetXMLHttp();
</script>

<script>
    function curso(valor){

        var url = "curso/"+valor+"/?"+Math.random();
        xmlRequest.open("GET",url,true);
        xmlRequest.onreadystatechange = mudancaEstadoCurso;
        xmlRequest.send(null);
        if (xmlRequest.readyState == 1) {
            document.getElementById("curso").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
        }
        return url;
    }

    function mudancaEstadoCurso(){
        if (xmlRequest.readyState == 4){
            document.getElementById("curso").innerHTML = xmlRequest.responseText;
        }
    }
</script>

<script>
    function turma2(valor){

        var url = "turma/"+valor+"/?"+Math.random();
        xmlRequest.open("GET",url,true);
        xmlRequest.onreadystatechange = mudancaEstadoTurma;
        xmlRequest.send(null);
        if (xmlRequest.readyState == 1) {
            document.getElementById("turma2").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
        }
        return url;
    }

    function mudancaEstadoTurma(){
        if (xmlRequest.readyState == 4){
            document.getElementById("turma2").innerHTML = xmlRequest.responseText;
        }
    }
</script>

<script>
    function alunos(valor){
        var url = "alunos2/"+valor+"/1/?"+Math.random();
        xmlRequest.open("GET",url,true);
        xmlRequest.onreadystatechange = mudancaEstadoAluno;
        xmlRequest.send(null);
        if (xmlRequest.readyState == 1) {
            document.getElementById("alunos").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
        }
        return url;
    }

    function mudancaEstadoAluno(){
        if (xmlRequest.readyState == 4){
            document.getElementById("alunos").innerHTML = xmlRequest.responseText;
        }
    }
</script>
