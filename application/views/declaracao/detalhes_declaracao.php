 <h1 class="text-center"">Detalhes do relatório de AACC</h1>
    <?php
    $usuario = $dadosUsuario;
    echo "<div class='row' >";
    $atributos = array('class' => 'form-horizontal');
    echo "<div class='form-horizontal'>";
    echo "<div class='form-group'>";
    echo form_label("Nome", "nome", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-10'>";
    echo form_input(array("name" => "txtNome", "id" => "txtNome" ,"class" => "form-control","value" => set_value("txtNome", $usuario['dadosUsuario']['nm_aluno']), "Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Semestre", "semestre", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "txtSemestre", "id" => "txtSemestre" ,"class" => "form-control","value" => set_value("txtSemestre", $usuario['dadosUsuario']['dt_semestre']."º Semestre"),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Disciplina", "disciplina", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_input(array("name" => "txtDisciplina", "id" => "txtDisciplina" ,"class" => "form-control","value" => set_value("txtDisciplina", "AACC"),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Professor", "professor", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-10'>";
    echo form_input(array("name" => "txtProfessor", "id" => "txtProfessor" ,"class" => "form-control","value" => set_value("txtProfessor", $professor['nm_professor']), "Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Email:", "email", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_input(array("name" => "txtEmail", "id" => "txtEmail" ,"class" => "form-control" ,"value" => set_value("txtEmail", $usuario['dadosUsuario']['nm_email']),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "</br>"."</br>"."</br>";
    //echo "<div class='col-sm-6'>";
    echo "<div class='form-group'>";
    echo form_label("Tipo de Atividade:", "txtTipoAtividade", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_input(array("name" => "txtTipoAtividade", "id" => "txtTipoAtividade" ,"class" => "form-control" ,"value" => set_value("txtTipoAtividade", $tipoAtividade),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";
    //echo "</div>";
    echo "<div class='form-group'>";
    echo form_label("Tipo de Evento:", "txtTipoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    if($declaracao['nm_evento_externo'] == null){
        echo form_input(array("name" => "txtTipoAtividade", "id" => "txtTipoEvento" ,"class" => "form-control" ,"value" => set_value("txtTipoEvento", "INTERNO"),"Disabled" => "Disabled"));
    }else{
        echo form_input(array("name" => "txtTipoAtividade", "id" => "txtTipoEvento" ,"class" => "form-control" ,"value" => set_value("txtTipoEvento", "EXTERNO"),"Disabled" => "Disabled"));
    }

    echo "</div>";
    echo "</div>";

    //echo "<div class='col-sm-6'>";
    echo "<div class='form-group'>";
    echo form_label("Total de horas:", "txtTotal", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    echo form_input(array("name" => "txtTotal", "id" => "txtTotal" ,"class" => "form-control" ,"value" => set_value("txtTotal", $declaracao['qt_horas_atividade']),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";
    //echo "</div>";

    echo "<div class='form-group'>";
    echo form_label('Observação do Professor:','obs', array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    if(isset($ctrlDeclaracao) && $ctrlDeclaracao != null){
        echo form_textarea(array('name' => 'obs', 'class' => 'form-control', "value" => $ctrlDeclaracao[0]['ds_observacao'],'id' => 'obs', 'row' => 2, 'required' => 'required', "Disabled" => "Disabled"));
    }else{
        echo form_textarea(array('name' => 'obs', 'class' => 'form-control', 'id' => 'obs', 'row' => 2, 'required' => 'required', "Disabled" => "Disabled"));
    }
    echo form_error("obs");
    echo "</div>";
    echo "</div>";

    if($evento){
        include ('detalhes_evento_interno.php');
    }else{
        include ('detalhes_evento_externo.php');
    }
    if($declaracao['status_declaracao'] == 3){
    echo "<div class='form-group'>";
    echo form_label("Status do relatório:", "txtStatus", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-4'>";
    echo form_input(array("name" => "txtStatus", "id" => "txtStatus" ,"class" => "form-control" ,"value" => set_value("txtStatus", "NÃO APROVADO"),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Data da não aprovação:", "txtData", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    echo form_input(array("name" => "txtData", "id" => "txtData" ,"class" => "form-control" ,"value" => set_value("txtData", dataMysqlParaPtBr($ctrlDeclaracao[0]['dt_aprovacao_doc'])),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Motivo Indeferimento:", "txtMotivo", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    echo form_input(array("name" => "txtMotivo", "id" => "txtMotivo" ,"class" => "form-control" ,"value" => $motivo['nm_motivo'],"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";
    }
     echo "</div>";
     echo "<br><br><br>";
     echo "<div class='form-group'>";
     echo "<div class='col-sm-2'>";
     echo anchor("declaracao/visualiza_declaracao","Voltar", array("class" => "btn btn-default"));
     echo "</div>";

    ?>
</div>
