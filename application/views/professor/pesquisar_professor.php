 <?php
    echo form_fieldset("<h1>Pesquisa de Professor</h1>");
    if(isset($unidades) && !isset($professores)){
        $atributos = array('class' => 'form-horizontal');
        echo form_open('professor/pesquisaProfessores',$atributos);
        echo "<div class='form-group'>";
        echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-3'>";
        echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control"));
        echo "</div>";
        echo "<div class='col-sm-2'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "</div>";
        echo "</div>";
        echo form_close();

    }
    if(isset($professores)){
        if($professores !=null){
            $atributos = array('class' => 'form-horizontal');
            echo form_open('professor/pesquisaNomeProfessor', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Nome do Professor", "nm_professor", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-3'>";
            if(isset($termo)){echo form_input(array("name" => "nm_professor", "value" => "{$termo}","required" => "required", "id" => "nm_professor" ,"class" => "form-control", "maxlength" => "70"));
            }else{echo form_input(array("name" => "nm_professor","required" => "required", "id" => "nm_professor" ,"class" => "form-control", "maxlength" => "70"));}
            echo "</div>";
            echo "<div class='col-sm-2'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
            echo form_hidden("idUnidade", $unidade["id_unidade"]);
            echo "</div>";
            echo form_close();
            
            echo form_open('professor/pesquisaProfessores', 'class=form-horizontal');
            echo "<div class='col-sm-2'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Mostrar Todos", "type" => "submit"));
            echo form_hidden("Unidade", $unidade["id_unidade"]);
            echo "</div>";
            echo form_close();
        
            echo "<div class='col-sm-2'>";
            echo anchor("professor/pesquisar_professor/", "Voltar", 'class = "btn btn-default"');
            echo "</div>";
            echo "</div>";

            echo "<br/>";
            echo "<br/>";
            echo "<h3>Professores da ".$unidade["nm_unidade"]."</h3>";
            echo "<br/>";

            echo "<table class='table-responsive table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Email</th>";
            echo "<th>Telefone</th>";
            echo "<th>Celular</th>";
            echo "<th>Entrada</th>";
            echo "<th>Saída</th>";
            echo "<th>Data de cadastro</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            echo "</thead>";
            foreach ($professores as $professor){
                echo "<tr>";
                echo "<td>" . $professor["nm_professor"] . "</td>";
                echo "<td>" . $professor["nm_email"] . "</td>";
                echo "<td>" . $professor["cd_tel_residencial"] . "</td>";
                echo "<td>" . $professor["cd_tel_celular"] . "</td>";
                echo "<td>" . dataMysqlParaPtBr($professor["dt_entrada"]). "</td>";
                echo "<td>" . dataMysqlParaPtBr($professor["dt_saida"]). "</td>";
                echo "<td>" . dataMysqlParaPtBr($professor["dt_cadastro"]). "</td>";

                if($professor["status_ativo"] != 0){
                    echo "<td>Ativo</td>";
                }else{
                    echo "<td>Inativo</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo "<p class='alert alert-danger'> Nenhum Professor cadastrado nessa Unidade.</p>";
            echo "</br>";
            echo anchor("professor/pesquisar_professor/","Voltar", 'class = "btn btn-default"');
        }
    }
 ?>