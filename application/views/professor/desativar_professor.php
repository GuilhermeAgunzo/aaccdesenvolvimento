<?php
    echo form_fieldset("<h1>Desativação de Professor</h1>");

    if(isset($unidades) && !isset($professores) && !isset($professor)){
        echo form_open('professor/pesquisaProfessores','class = form-horizontal');
        echo "<div class='form-group'>";
        echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-3'>";
        echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control"));
        echo "</div>";
        echo "<div class='col-sm-2'>";
        echo form_hidden("opcao", 'Desativar');
        echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "</div>";
        echo "</div>";
        echo form_close();
    }

    if(isset($professores)) {
        if ($professores != null) {
            echo form_open('professor/pesquisaNomeProfessor', 'class = form-horizontal');
            echo form_label("Nome do Professor", "nm_professor", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo "<div class='input-group'>";
            if (isset($termo)) {
                echo form_input(array("name" => "nm_professor", "value" => "{$termo}", "required" => "required", "id" => "nm_professor", "class" => "form-control", "maxlength" => "70"));
            } else {
                echo form_input(array("name" => "nm_professor", "required" => "required", "id" => "nm_professor", "class" => "form-control", "maxlength" => "70"));
            }
            echo "<span class='input-group-btn'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
            echo "</span>";
            echo "</div>";
            echo form_hidden("idUnidade", $unidade["id_unidade"]);
            echo form_hidden("opcao", 'Desativar');
            echo "</div>";
            echo form_close();

            echo "<div class='form-group'>";
            echo form_open('professor/pesquisaProfessores', 'class=form-horizontal');
            echo "<div class='col-sm-2'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Mostrar Todos", "type" => "submit"));
            echo form_hidden("Unidade", $unidade["id_unidade"]);
            echo form_hidden("opcao", 'Desativar');
            echo "</div>";
            echo form_close();

            echo "<div class='col-sm-2'>";
            echo anchor("professor/desativar_cadastro_professor/", "Voltar", 'class = "btn btn-default"');
            echo "</div>";
            echo "</div>";

            echo "<br/><br/>";
            echo "<h3>Professores da " . $unidade["nm_unidade"] . "</h3>";

            echo "<div class='table-responsive'>";
            echo "<table class='table'>";
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
            foreach ($professores as $professores){
                echo "<tr>";
                echo "<td>" . anchor("professor/buscaDesativaProfessor/{$professores['id_professor']}",$professores["nm_professor"]) . "</td>";
                echo "<td>" . $professores["nm_email"] . "</td>";
                echo "<td>" . $professores["cd_tel_residencial"] . "</td>";
                echo "<td>" . $professores["cd_tel_celular"] . "</td>";
                echo "<td>" . dataMysqlParaPtBr($professores["dt_entrada"]). "</td>";
                echo "<td>" . dataMysqlParaPtBr($professores["dt_saida"]). "</td>";
                echo "<td>" . dataMysqlParaPtBr($professores["dt_cadastro"]). "</td>";

                if($professores["status_ativo"] != 0){
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
            echo anchor("professor/desativar_cadastro_professor/","Voltar", 'class = "btn btn-default"');
        }
    }
    //------------Formulario de Deativação----------------
    if(isset($professor)){
        echo form_open("professor/desativaProfessor", 'class = form-horizontal');
        echo form_input(array("name" => "cd_professor", "id" => "cd_professor", "type" => "hidden", "value" => $professor["id_professor"]));
        echo "<div class='row'>";
        echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-sm-3'>";
        echo form_dropdown('Unidade', $unidades, $professor['id_unidade'] , array("class" => "form-control"));
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-sm-3'>";
        echo form_input(array("name" => "nome", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "70", "value" => $professor["nm_professor"]));
        echo "</div>";
        echo "<div class='col-sm-1'>";
        echo "</div>";
        echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-sm-2'>";
        echo form_input(array("name" => "telefone", "id" => "telefone" ,"class" => "form-control", "maxlength" => "15", "value" => $professor["cd_tel_residencial"]));
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-sm-3'>";
        echo form_input(array("name" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "70", "value" => $professor["nm_email"]));
        echo "</div>";
        echo "<div class='col-sm-1'>";
        echo "</div>";
        echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-sm-2'>";
        echo form_input(array("name" => "celular", "id" => "celular" ,"class" => "form-control", "maxlength" => "15", "value" => $professor["cd_tel_celular"]));
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='form-group'>";
        echo "<div class='col-sm-offset-2 col-sm-10'>";
        echo form_button(array("class" => "btn btn-danger", "content" => "Desativar", "type" => "submit"));
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo form_close();
    }
    ?>