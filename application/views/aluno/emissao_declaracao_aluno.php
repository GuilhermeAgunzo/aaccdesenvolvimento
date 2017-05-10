             <?php

            echo form_fieldset("<h1>Emissão de Declaração de Aluno</h1>");

            if(!isset($alunos)){

                     $atributos = array('class' => 'form-horizontal');
                     echo form_open('aluno/buscaAlunosTotalConcluido', $atributos);

                     echo "<div class='row'>";
                     echo form_label("Unidade", "id_unidade", array("class" => "col-sm-2 control-label"));
                     echo "<div class='form-group col-md-3'>";

                     echo form_dropdown('id_unidade',$unidades, "", array("class" => "form-control", "onchange" => "curso(this.value)"));
                     echo form_error("id_unidade");
                     echo "</div>";
                     echo "</div>";

                     echo '<div id="curso"></div>';

                     echo form_close();

            }else{
                $textoTurma = "{$turma['aa_ingresso']} - {$turma['dt_semestre']}º sem - {$turma['nm_turno']}";
                    echo "<h3>Unidade: {$unidade['nm_unidade']} - Curso: {$curso['nm_curso']} - Turma: {$textoTurma}</h3>";

                    $qtAlunosHorasConcluidas = 0;
                    foreach($alunos as $aluno){
                        if($aluno['total_geral_hora'] >= $curso['qt_horas_aacc']){
                            $qtAlunosHorasConcluidas++;
                        }
                    }

                    if($qtAlunosHorasConcluidas >= 1){
                        echo "<table class='table table-bordered'>";
                            echo "<th>Aluno</th>";
                            echo "<th>Total de Horas</th>";
                            echo "<th></th>";
                            foreach($alunos as $aluno){
                                if($aluno['total_geral_hora'] >= $curso['qt_horas_aacc']){
                                    echo "<tr>";
                                    echo "<td>{$aluno['nm_aluno']}</td>";
                                    echo "<td>{$aluno['total_geral_hora']}</td>";
                                    echo "<td>".anchor("aluno/declaracaoFinal/{$aluno['id_aluno']}",'Emitir Declaração',array("class" => "btn btn-default", "target" => "_blank"))."</td>";
                                    echo "</tr>";
                                }
                            }

                        echo "</table>";
                    } else {
                        echo "<p class='alert alert-danger'>Nenhuma informação encontrada.</p>";
                    }
            }
             ?>

             <script>
                 //função ajax
                 function GetXMLHttp() {
                     if(navigator.appName == "Microsoft Internet Explorer") {
                         xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                     }
                     else {
                         xmlHttp = new XMLHttpRequest();
                     }
                     return xmlHttp;
                 } var xmlRequest = GetXMLHttp();
             </script>

             <script>
                 function curso(valor){

                     var url = "curso/"+valor+"/?"+Math.random();
                     xmlRequest.open("GET",url,true);
                     xmlRequest.onreadystatechange = mudancaEstadoCurso;
                     xmlRequest.send(null);
                     if (xmlRequest.readyState == 1) {
                         document.getElementById("curso").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                     }
                     return url;
                 }

                 function mudancaEstadoCurso(){
                     if (xmlRequest.readyState == 4){
                         document.getElementById("curso").innerHTML = xmlRequest.responseText;
                     }
                 }
             </script>

             <script>
                 function turma2(valor){

                     var url = "turma/"+valor+"/?"+Math.random();
                     xmlRequest.open("GET",url,true);
                     xmlRequest.onreadystatechange = mudancaEstadoTurma;
                     xmlRequest.send(null);
                     if (xmlRequest.readyState == 1) {
                         document.getElementById("turma2").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                     }
                     return url;
                 }

                 function mudancaEstadoTurma(){
                     if (xmlRequest.readyState == 4){
                         document.getElementById("turma2").innerHTML = xmlRequest.responseText;

                         var divAluno = document.getElementById("alunos");

                         divAluno.setAttribute("class", "col-md-offset-2");

                         var element = document.createElement("button");

                         element.type = "submit";
                         element.className = "btn btn-default";
                         element.name = "btnEnviar";
                         element.id = "btnEnviar";

                         var div = document.getElementById("alunos");
                         div.appendChild(element);

                         var textnode = document.createTextNode("Enviar");
                         document.getElementById("btnEnviar").appendChild(textnode);

                         $("#btnEnviar").hide();

                         document.getElementById("turma2").onchange = function(){
                             $("#btnEnviar").show();
                         }



                     }
                 }
             </script>
