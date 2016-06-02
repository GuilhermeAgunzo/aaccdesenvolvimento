<?php

echo form_fieldset("<h1>Relatório de Aluno</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('', $atributos);

echo "<div class='row'>";
echo form_label("Unidade", "id_unidade", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-md-3'>";
array_unshift($dropDownUnidade, "Selecione");
echo form_dropdown('id_unidade',$dropDownUnidade, "", array("class" => "form-control", "onchange" => "turma(this.value)"));
echo form_error("id_unidade");
echo "</div>";
echo "</div>";

echo '<div id="turma"></div>';

echo form_close();

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
    function turma(valor){

        var url = "turma/"+valor+"/?"+Math.random();
        xmlRequest.open("GET",url,true);
        xmlRequest.onreadystatechange = mudancaEstado;
        xmlRequest.send(null);
        if (xmlRequest.readyState == 1) {
            document.getElementById("turma").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
        }
        return url;
    }

    function mudancaEstado(){
        if (xmlRequest.readyState == 4){
            document.getElementById("turma").innerHTML = xmlRequest.responseText;
        }
    }
</script>

<script>
    function alunos(valor){
        var url = "alunos/"+valor+"/?"+Math.random();
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