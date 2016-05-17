 <?php

            echo form_fieldset("<h1>Pesquisa de Professor</h1>");
            if(!isset($professores)){
                echo "<table class='table-striped'>";
                foreach($unidades as $unidade){
                    echo "<tr>";
                    echo "<td>". anchor("professor/pesquisaProfessores/{$unidade['id_unidade']}", "{$unidade['cd_cpsouza']} - {$unidade['nm_unidade']}") ."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            if(isset($professores)){
            $atributos = array('class' => 'form-horizontal');
            echo form_open('professor/pesquisaNomeProfessor', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Nome do Professor", "nm_professor", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "nm_professor","required" => "required", "id" => "nm_professor" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo anchor("professor/pesquisaProfessores/{$unidadeAtual}","Mostrar todos");
            echo "</div>";
            echo form_hidden("idUnidade", $unidadeAtual);
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo form_close();





                echo "<table>";
                echo "<tr>";
                echo "<th>Código de professor</th>";
                echo "<th>Unidade</th>";
                echo "<th>Nome</th>";
                echo "<th>Email</th>";
                echo "<th>Telefone</th>";
                echo "<th>Celular</th>";
                echo "<th>Entrada</th>";
                echo "<th>Saída</th>";
                echo "<th>Data de cadastro</th>";
                echo "<th>Status</th>";
                echo "</tr>";

                foreach ($professores as $professor){
                    echo "<tr>";
                    echo "<td>" . $professor["id_professor"] . "</td>";
                    foreach ($unidades as $unidade){
                        if($unidade['id_unidade'] == $professor['id_unidade'])
                            echo "<td>".$unidade['nm_unidade']."</td>";
                    }
                    echo "<td>" . $professor["nm_professor"] . "</td>";
                    echo "<td>" . $professor["nm_email"] . "</td>";
                    echo "<td>" . $professor["cd_tel_residencial"] . "</td>";
                    echo "<td>" . $professor["cd_tel_celular"] . "</td>";
                    echo "<td>" . date('d/m/Y',strtotime($professor["dt_entrada"])) . "</td>";
                    echo "<td>" . implode("/", array_reverse(explode("-",$professor["dt_saida"]))) . "</td>";
                    echo "<td>" . date('d/m/Y H:m:s',strtotime($professor["dt_cadastro"])) . "</td>";

                    if($professor["status_ativo"] != 0){

                        echo "<td>Ativo</td>";
                        echo "</tr>";

                    }else{

                        echo "<td>Inativo</td>";
                        echo "</tr>";

                    }
                }
                echo "</table>";

            }

            ?>

