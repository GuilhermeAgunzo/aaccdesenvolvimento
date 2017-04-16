                      <?php

            echo form_fieldset("<h1>Validação de AACC's</h1>");
            $atributos = array('class' => 'form-horizontal');
            echo form_open('relatorioAacc/alunos2', $atributos);

            echo "<div class='row'>";
            echo form_label("Unidade", "id_unidade", array("class" => "col-sm-2 control-label"));
            echo "<div class='form-group col-md-3'>";

            echo form_dropdown('id_unidade',$dropDownUnidade, "", array("class" => "form-control", "onchange" => "curso(this.value)", "required" => "required"));
            echo form_error("id_unidade");

            echo "</div>";
            echo "</div>";

            echo '<div id="curso"></div>';

            echo form_close();

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
                    
                    if(valor != null || valor != "" || valor !== "---" || valor != "0" || valor != 0){
                            var url = "curso/"+valor+"/?"+Math.random();
                        xmlRequest.open("GET",url,true);
                        xmlRequest.onreadystatechange = mudancaEstadoCurso;
                        xmlRequest.send(null);
                        if (xmlRequest.readyState == 1) {
                            document.getElementById("curso").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                        }
                        return url;
                    }
                    
                }

                function mudancaEstadoCurso(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("curso").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>


            <script>
                function turma2(valor){
                    
                        var url = "turma2/"+valor+"/?"+Math.random();
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
                    }
                }
            </script>

            <script>
                function statusDeclaracao(valor){

                    var url = "statusDeclaracao/"+valor+"/?"+Math.random();
                    xmlRequest.open("GET",url,true);
                    xmlRequest.onreadystatechange = mudancaEstadoStatusDeclaracao;
                    xmlRequest.send(null);
                    if (xmlRequest.readyState == 1) {
                        document.getElementById("statusDeclaracao").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                    }
                    return url;
                }

                function mudancaEstadoStatusDeclaracao(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("statusDeclaracao").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>

            <script>
                function alunos2(valor){
                    var url = "alunos2/"+valor+"/?"+Math.random();
                    xmlRequest.open("GET",url,true);
                    xmlRequest.onreadystatechange = mudancaEstadoAluno;
                    xmlRequest.send(null);
                    if (xmlRequest.readyState == 1) {
                        document.getElementById("alunos2").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                    }
                    return url;
                }

                function mudancaEstadoAluno(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("alunos2").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>

            <script>
                function lista_declaracao_alunos(valor){

                    var url = "lista_declaracao_alunos/"+valor+"/?"+Math.random();
                    xmlRequest.open("GET",url,true);
                    xmlRequest.onreadystatechange = mudancaEstadoLista;
                    xmlRequest.send(null);
                    if (xmlRequest.readyState == 1) {
                        document.getElementById("lista_declaracao_alunos").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                    }
                    return url;
                }

                function mudancaEstadoLista(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("lista_declaracao_alunos").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>

            <script>
                function lista_declaracao_alunos_selecionados(valor){

                    var url = "lista_declaracao_alunos_selecionados/"+valor+"/?"+Math.random();
                    xmlRequest.open("GET",url,true);
                    xmlRequest.onreadystatechange = mudancaEstadoListaSel;
                    xmlRequest.send(null);
                    if (xmlRequest.readyState == 1) {
                        document.getElementById("lista_declaracao_alunos_selecionados").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                    }
                    return url;
                }

                function mudancaEstadoListaSel(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("lista_declaracao_alunos_selecionados").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>
