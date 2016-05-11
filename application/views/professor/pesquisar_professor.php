            <?php
            echo form_fieldset("<h1>Pesquisa de Professor</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('professor/pesquisaProfessor', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Código de Professor", "cd_professor", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-6'>";
            echo form_input(array("name" => "cd_professor","required" => "required", "id" => "cd_professor" ,"class" => "form-control", "maxlength" => "80"));
            echo "</div>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo form_close();

            if(isset($professor)){


                echo "<table>";

                echo "<tr>";
                echo "<td>Código de professor</td>";
                echo "<td>" . $professor["id_professor"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Nome</td>";
                echo "<td>" . $professor["nm_professor"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Email</td>";
                echo "<td>" . $professor["nm_email"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Telefone</td>";
                echo "<td>" . $professor["cd_tel_residencial"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Celular</td>";
                echo "<td>" . $professor["cd_tel_celular"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Data de entrada</td>";
                echo "<td>" . implode("/", array_reverse(explode("-",$professor["dt_entrada"]))) . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Data de saída</td>";
                echo "<td>" . implode("/", array_reverse(explode("-",$professor["dt_saida"]))) . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Data do cadastro</td>";
                echo "<td>" . implode("/",explode("-",$professor["dt_cadastro"])) . "</td>";
                echo "</tr>";

                if($professor["status_ativo"] != 0){

                    echo "<tr>";
                    echo "<td>Status</td>";
                    echo "<td>Ativo</td>";
                    echo "</tr>";

                }else{
                    echo "<tr>";
                    echo "<td>Status</td>";
                    echo "<td>Desativado</td>";
                    echo "</tr>";

                }

                echo "</table>";

            }


            ?>

