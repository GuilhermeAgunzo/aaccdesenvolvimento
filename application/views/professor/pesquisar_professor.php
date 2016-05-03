            <?php
            echo "</br>";
            echo form_fieldset("<h1>Pesquisa de Professor</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Código de Professor", "cd_professor", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "cd_professor", "id" => "cd_professor" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo form_close();
            ?>
