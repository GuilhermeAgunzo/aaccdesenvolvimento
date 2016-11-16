 <h1 class="text-center"">Detalhes</h1>
    <?php
    $usuario = $dadosUsuario;
    echo "<div class='row'>";
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
    echo form_input(array("name" => "txtProfessor", "id" => "txtProfessor" ,"class" => "form-control","Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Email:", "email", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_input(array("name" => "txtEmail", "id" => "txtEmail" ,"class" => "form-control" ,"value" => set_value("txtEmail", $usuario['dadosUsuario']['nm_email']),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";

    echo "</br>"."</br>"."</br>";
    echo "<div class='col-sm-6'>";
    echo "<div class='form-group'>";
    echo form_label("Tipo de Atividade:", "txtTipoAtividade", array("class" => "col-sm-6 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "txtTipoAtividade", "id" => "txtTipoAtividade" ,"class" => "form-control" ,"value" => set_value("txtTipoAtividade", $tipoAtividade),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";
    echo "</div>";


    echo "<div class='col-sm-6'>";
    echo "<div class='form-group'>";
    echo form_label("Total de horas:", "txtTotal", array("class" => "col-sm-6 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "txtTotal", "id" => "txtTotal" ,"class" => "form-control" ,"value" => set_value("txtTotal", $declaracao['qt_horas_atividade']),"Disabled" => "Disabled"));
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label('Observação do Professor:','obs', array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-8'>";
    echo form_textarea(array('name' => 'obs', 'class' => 'form-control', 'id' => 'obs', 'row' => 2, 'required' => 'required', "Disabled" => "Disabled"));
    echo form_error("obs");
    echo "</div>";
    echo "</div>";

    if($evento){
        include ('detalhes_evento_interno.php');
    }else{
        include ('detalhes_evento_externo.php');
    }
     echo "</div>";
     echo anchor("declaracao/visualiza_declaracao","Voltar", array("class" => "btn btn-default"));
     echo "</div>";
    ?>
</div>
