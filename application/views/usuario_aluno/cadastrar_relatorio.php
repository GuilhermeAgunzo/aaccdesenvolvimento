            <?php
            echo "</br>";
            echo form_fieldset("<h1>Cadastro de Relatório</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Nome do Aluno:", "nm_aluno", array("class" => "col-sm-2 control-label"));
            echo "</div>";
            echo "<div class='form-group'>";
            echo form_label("Turma:", "nm_turma", array("class" => "col-sm-2 control-label"));
            echo "</div>";
            echo "<div class='form-group'>";
            echo form_label("Professor(a):", "nm_professor", array("class" => "col-sm-2 control-label"));
            echo "</div>";
            echo "<div class='form-group'>";
            echo form_label("Email:", "email", array("class" => "col-sm-2 control-label"));
            echo "</div>";
            echo "<div class='form-group'>";
            echo form_label("Telefone:", "telefone", array("class" => "col-sm-2 control-label"));
            echo "</div>";
            echo "</br>"."</br>"."</br>";

            echo "<div class='form-group'>";
            echo form_label("Identifique a Atividade", "atividade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $atividade = array('Selecione','Palestras','Visitas Técnicas');
            echo form_dropdown('atividade', $atividade, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Data da atividade", "dataAtividade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "data", "id" => "data" ,"class" => "form-control", "maxlength" => "8"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Horário de duração da realização da atividade", "horarioAtividade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "horarioAtividade", "id" => "horarioAtividade" ,"class" => "form-control", "maxlength" => "12"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label('Faça um resumo da atividade.','tituloResumo', array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_textarea(array('name' => 'texto', 'class' => 'form-control', 'id' => 'tituloResumo', 'row' => 2, 'placeholder' => 'Identifique  a  relevância e contribuição desta atividade para a sua formação profissional.'));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Anexar Documento comprobatório", "anexarDocumento",  array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_upload();
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Data", "data", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "data", "id" => "data" ,"class" => "form-control", "maxlength" => "8"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
            echo form_button(array("class" => "btn btn-default", "content" => "Imprimir", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>
