           <?php
            echo "</br>";
            echo form_fieldset("<h1>Cadastro de Professor</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);

            echo "<div class='form-group'>";
            echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-8'>";
            echo form_input(array("name" => "nome", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "100"));
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
            echo form_input(array("name" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "telefone", "id" => "telefone" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "celular", "id" => "celular" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>
