            <?php

            echo form_fieldset("<h1>Cadastro do Motivo de Indeferimento</h1>");

            if($this->session->flashdata("success"))
                echo "<p class='alert alert-success'>". $this->session->flashdata("success") ."</p>";
            if($this->session->flashdata("danger"))
                echo "<p class='alert alert-danger'>". $this->session->flashdata("danger") ."</p>";

            $atributos = array('class' => 'form-horizontal');
            echo form_open('indeferimento/cadastraMotivo', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Motivo do Indeferimento", "motivoInd", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "motivoInd", "required" => "required","id" => "motivoInd" ,"class" => "form-control", "maxlength" => "40"));
            echo "</div>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo form_close();

            ?>
