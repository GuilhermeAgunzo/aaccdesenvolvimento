<?php

            echo form_fieldset("<h1>Validação de AACC's</h1>");
            $atributos = array('class' => 'form-horizontal');
           

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
                function turma(valor){

                    var url = "turma/"+valor+"/?"+Math.random();
                    xmlRequest.open("GET",url,true);
                    xmlRequest.onreadystatechange = mudancaEstado;
                    xmlRequest.send(null);
                    if (xmlRequest.readyState == 1) {
                        document.getElementById("turma").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                    }
                    return url;
                }

                function mudancaEstado(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("turma").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>
            <script>
                function alunos(valor){
                    var url = "alunos/"+valor+"/?"+Math.random();
                    xmlRequest.open("GET",url,true);
                    xmlRequest.onreadystatechange = mudancaEstadoAluno;
                    xmlRequest.send(null);
                    if (xmlRequest.readyState == 1) {
                        document.getElementById("alunos").innerHTML = "<div style='text-align:center; margin-top:20px;'><img src='<?= base_url("images/carregando.gif")?>'></div>";
                    }
                    return url;
                }

                function mudancaEstadoAluno(){
                    if (xmlRequest.readyState == 4){
                        document.getElementById("alunos").innerHTML = xmlRequest.responseText;
                    }
                }
            </script>
