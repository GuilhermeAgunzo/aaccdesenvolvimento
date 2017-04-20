 <?php
    echo form_fieldset("<h1>Pesquisa de Professor</h1>");

    if(isset($unidades) && !isset($professores)){
        echo form_open('professor/pesquisaProfessores','class = form-horizontal');
        echo "<div class='row'>";
        echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-3'>";
        //$unidades = array('' =>  "Selecione")+$unidades;
        echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", "required" => "required"));
        echo "</div>";
        echo "<div class='col-md-2'>";
        echo form_hidden("opcao", 'Pesquisar');
        echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
        echo "</div>";
        echo "</div>";
        echo form_close();

    }
    if(isset($professores)){
        if($professores !=null){
            echo form_open('professor/pesquisaNomeProfessor', 'class = form-horizontal');
            echo form_label("Nome do Professor", "nm_professor", array("class" => "col-md-2 control-label"));
            echo "<div class='col-md-4'>";
            echo "<div class='input-group'>";
            if (isset($termo)) {
                echo form_input(array("name" => "nm_professor", "value" => "{$termo}", "required" => "required", "id" => "nm_professor", "class" => "form-control", "maxlength" => "70"));
            } else {
                echo form_input(array("name" => "nm_professor", "required" => "required", "id" => "nm_professor", "class" => "form-control", "maxlength" => "70"));
            }
            echo "<span class='input-group-btn'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
            echo "</span>";
            echo "</div>";
            echo form_hidden("idUnidade", $unidade["id_unidade"]);
            echo form_hidden("opcao", 'Pesquisar');
            echo "</div>";
            echo form_close();

            echo "<div class='form-group'>";
            echo form_open('professor/pesquisaProfessores', 'class=form-horizontal');
            echo "<div class='col-md-2'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Mostrar Todos", "type" => "submit"));
            echo form_hidden("Unidade", $unidade["id_unidade"]);
            echo form_hidden("opcao", 'Pesquisar');
            echo "</div>";
            echo form_close();
        
            echo "<div class='col-md-2'>";
            echo anchor("professor/pesquisar_professor/", "Voltar", 'class = "btn btn-default"');
            echo "</div>";
            echo "</div>";

            echo "<br/><br/>";
            echo "<h3>Professores da ".$unidade["nm_unidade"]."</h3>";
            echo "<div class='table-responsive'>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Curso</th>";
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
                echo "<td>" . $cursos[$professor['id_curso']] . "</td>";
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
            echo "</div>";
        }else{
            echo "<p class='alert alert-danger'> Nenhum Professor cadastrado nessa Unidade.</p>";
            echo "</br>";
            echo anchor("professor/pesquisar_professor/","Voltar", 'class = "btn btn-default"');
        }
    }
 ?>