            <?php
            echo "</br>";
            echo form_fieldset("<h1>Cadastro de Avisos</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Título", "titulo_aviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_input(array("name" => "titulo_aviso" , "required" => "required", "id" => "titulo_aviso" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Data Inicial do Aviso", "dataInicialDoAviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "dtInicialAviso","required" => "required","type" => "date", "id" => "dtInicialAviso" ,"class" => "form-control", "maxlength" => "10"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Data Final do Aviso", "dataFinalDoAviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "dtFinalAviso","required" => "required","type" => "date", "id" => "dtFinalAviso" ,"class" => "form-control", "maxlength" => "10"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Descrição", "descricaoAviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_textarea(array('name' => 'descricaoAviso' , "required" => "required", 'id' => 'descricaoAviso','class' => 'form-control', 'rows' => 3));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Vencimento", "vencimento_aviso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-3'>";
            echo form_input(array('name' => 'vencimento_aviso' , "required" => "required", 'id' => 'vencimento_aviso','class' => 'form-control', "maxlength" => "8"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default" , "content" => "Salvar", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>


