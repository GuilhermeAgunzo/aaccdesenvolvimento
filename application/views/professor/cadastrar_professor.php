           <?php

            echo form_fieldset("<h1>Cadastro de Professor</h1>");
           if($this->session->flashdata("cadastrado"))
               echo "<p class='alert alert-success'>" . $this->session->flashdata("cadastrado") . "</p>";
           if($this->session->flashdata("naoCadastrado"))
               echo "<p class='alert alert-danger'>" . $this->session->flashdata("naoCadastrado") . "</p>";

            $atributos = array('class' => 'form-horizontal');
            echo form_open('professor/cadastroProfessor', $atributos);

            echo "<div class='form-group'>";
            echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-8'>";
            echo form_input(array("name" => "nome","required" => "required", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "100"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-8'>";
            echo form_input(array("name" => "email", "required" => "required","type" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Telefone Residencial", "tel", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "telefone", "id" => "tel" ,"class" => "form-control phone-mask", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "celular", "id" => "celular" ,"class" => "form-control phone-mask", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";

           echo "<div class='form-group'>";
           echo form_label("Data de entrada", "data_entrada", array("class" => "col-sm-2 control-label"));
           echo "<div class='col-sm-6'>";
           echo form_input(array("name" => "data_entrada", "type" => "text", "id" => "data_entrada" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy"));
           echo "</div>";
           echo "</div>";

           echo "<div class='form-group'>";
           echo form_label("Data de saída", "data_saida", array("class" => "col-sm-2 control-label"));
           echo "<div class='col-sm-6'>";
           echo form_input(array("name" => "data_saida", "type" => "text", "id" => "data_saida" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy"));
           echo "</div>";
           echo "</div>";

            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>
