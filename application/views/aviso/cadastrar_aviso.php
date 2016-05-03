            <?php
            echo "</br>";
            echo form_fieldset("<h1>Cadastro de Avisos</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Título", "titulo_aviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_input(array("name" => "titulo_aviso", "id" => "titulo_aviso" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Descrição", "descricaoAviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_textarea(array('name' => 'descricaoAviso', 'id' => 'descricaoAviso','class' => 'form-control', 'rows' => 3));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Vencimento", "vencimentoAviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-3'>";
            echo form_input(array("name" => "dtVencimentoAviso", "id" => "dtVencimentoAviso" ,"class" => "form-control", "maxlength" => "14"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Cadastrar", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>

