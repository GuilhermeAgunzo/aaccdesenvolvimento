        <?php
        echo "<br/>";
        echo form_fieldset("<h1>Configurações</h1>");

        $atributos = array('class' => 'form-horizontal');
        echo form_open('email/send', $atributos);
        echo "<div class='form-group'>";
        echo form_label("Senha", "senha",array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-6'>";
        echo form_input(array("name" => "senha", "id" => "senha" ,"class" => "form-control", "maxlength" => "80"));
        echo form_label("<h6>Entre com a senha </h6>");
        echo form_input(array("name" => "confirmarSenha", "id" => "confirmarSenha" ,"class" => "form-control", "maxlength" => "80"));
        echo form_label("<h6>Confirmar senha </h6>");
        echo "</div>";
        echo "</div>";


        echo "<div class='form-group'>";
        echo "<div class='col-sm-offset-2 col-sm-10'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
        echo "</div>";
        echo "</div>";

        echo form_close();
        ?>

