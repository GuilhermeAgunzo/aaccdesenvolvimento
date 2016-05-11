            <?php

            echo form_fieldset("<h1>Desativação de Professor</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('professor/buscaDesativaProfessor', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Código de Professor", "cd_professor", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "cd_professor", "id" => "cd_professor" ,"class" => "form-control", "maxlength" => "80","value" => set_value("cd_professor", "")));
            echo "</div>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo form_close();

            if(isset($professor)){
            echo form_open("professor/desativaProfessor", $atributos);
            echo form_input(array(
                    "name" => "cd_professor",
                    "id" => "cd_professor",
                    "type" => "hidden",
                    "value" => $professor["id_professor"]
            ));
            echo "</br>"."</br>";
            echo "<div class='form-group'>";
            echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-8'>";
            echo form_input(array("name" => "nome", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "100", "value" => $professor["nm_professor"]));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Turma", "turma", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $turma = array('turma' => 'Selecione a turma','turma1' => '1º semestre, 1º Ciclo, ADS, 2012','turma2' => '1º semestre, 2º Ciclo, ADS, 2012', 'turma3' => '1º semestre, 3º Ciclo, ADS, 2012');
            echo form_dropdown('Turma', $turma, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $unidade = array('unidade' => 'Selecione','unidade1' => 'Fatec Praia Grande','unidade2' => 'Fatec Santos');
            echo form_dropdown('Unidade', $unidade, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-8'>";
            echo form_input(array("name" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "80", "value" => $professor["nm_email"]));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "telefone", "id" => "telefone" ,"class" => "form-control", "maxlength" => "80", "value" => $professor["cd_tel_residencial"]));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "celular", "id" => "celular" ,"class" => "form-control", "maxlength" => "80", "value" => $professor["cd_tel_celular"]));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Desativar", "type" => "submit"));

            echo "</div>";
            echo "</div>";

            echo form_close();
            }
            ?>

