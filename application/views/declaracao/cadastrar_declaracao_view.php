            <?php
            $usuario = $dadosUsuario;
            echo form_fieldset("<h1>Cadastrar Declaração</h1>");

            echo "<div class='row'>";
            $atributos = array('class' => 'form-horizontal');
            echo form_open_multipart('declaracao/cadastrar_declaracao', $atributos);

           echo "<div class='form-group'>";
                echo form_label("Nome", "nome", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "txtNome", "id" => "txtNome" ,"class" => "form-control","value" => set_value("txtNome", $usuario['dadosUsuario']['nm_aluno']), "Disabled" => "Disabled"));
                
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label("Semestre", "semestre", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "txtSemestre", "id" => "txtSemestre" ,"class" => "form-control","value" => set_value("txtSemestre", $usuario['dadosUsuario']['dt_semestre']."º Semestre"),"Disabled" => "Disabled"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label("Disciplina", "disciplina", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "txtDisciplina", "id" => "txtDisciplina" ,"class" => "form-control","value" => set_value("txtDisciplina", "AACC"),"Disabled" => "Disabled"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label("Professor", "professor", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "txtProfessor", "id" => "txtProfessor" ,"class" => "form-control","Disabled" => "Disabled"));
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label("Email:", "email", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "txtEmail", "id" => "txtEmail" ,"class" => "form-control" ,"value" => set_value("txtEmail", $usuario['dadosUsuario']['nm_email']),"Disabled" => "Disabled"));
            echo "</div>";
            echo "</div>";

            echo "</br>"."</br>"."</br>";

            echo "<div class='form-group'>";
                echo form_label("Identifique a Atividade", "atividade", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                    echo form_dropdown("atividade", $tipoAtividade, array("class" => "form-control"));
                    echo form_error("atividade");
                echo "</div>";
            echo "</div>";

            echo "<div class='form-group' id='tipoEvento'>";
            echo form_label("Tipo de Evento", "tipoEvento", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                    $opcoes = array('0'=>'Interno','1'=>'Externo');
                    echo form_dropdown('evento', $opcoes, array("class" => "form-control"));
                    echo form_error("evento");
                echo "</div>";
            echo "</div>";
            
            echo "<div class='form-group' id='interno'>";
            echo form_label("Eventos Internos", "eventoInterno", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                    $dropdownEvento = array('' =>  "Selecione") + $eventos;
                    echo form_dropdown('eventoInterno', $dropdownEvento, "", array("class" => "form-control"));
                    echo form_error("eventoInterno");
                echo "</div>";
            echo "</div>";
            
            echo "<div id='dadosExternos'>";
            echo "<div class='form-group'>";
                echo form_label("Data do Evento", "dataEvento", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "data", "id" => "data" ,"class" => "form-control", "type" => "date"));
                echo form_error("data");
            echo "</div>";
            echo "</div>";

             echo "<div class='form-group'>";
            echo form_label("Local do Evento", "localEvento", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtLocalEvento", "id" => "txtLocalEvento" ,"class" => "form-control"));
            echo form_error("txtLocalEvento");
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Nome do Evento", "nomeEvento", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtNomeEvento", "id" => "txtNomeEvento" ,"class" => "form-control"));
            echo form_error("txtNomeEvento");
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Descrição do Evento", "descricaoEvento", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtDescricaoEvento", "id" => "txtDescricaoEvento" ,"class" => "form-control"));
            echo form_error("txtDescricaoEvento");
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Quantidade de Horas", "quantidadeHoras", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtQuantidadeHoras", "id" => "txtQuantidadeHoras" ,"class" => "form-control", "maxlength" => "4" ,"type" => "number",  "min" => "1"));
            echo form_error("txtQuantidadeHoras");
            echo "</div>";
            echo "</div>";

            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label('Faça um resumo da atividade.','tituloResumo', array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                    echo form_textarea(array('name' => 'resumo', 'class' => 'form-control', 'id' => 'tituloResumo', 'row' => 2, 'placeholder' => 'Identifique  a  relevância e contribuição desta atividade para a sua formação profissional.', 'required' => 'required'));
                    echo form_error("resumo");
                echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label("Anexar Documento comprobatório", "anexarDocumento",  array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                    echo "<input type='file' name='anexo' required />";
                    echo form_error("anexo");
                echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo "<div class='col-sm-offset-2 col-sm-10'>";
                    echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
                echo "</div>";
            echo "</div>";
            
            echo form_close();
            echo "</div>"
            ?>
            <script>
                $('#tipoEvento').click(function (){
             var current = $('#tipoEvento :selected').val();
               
             if(current == 1){
                    $('#interno').hide();
             }else{
                  $('#interno').show();
             }
            });
             $('#tipoEvento').ready(function (){
             var current = $('#tipoEvento :selected').val();
               
             if(current == 1){
                    $('#interno').hide();
             }else{
                  $('#interno').show();
             }
            });
            $('#tipoEvento').ready(function (){
             var current = $('#tipoEvento :selected').val();
             if(current == 0){
                    $('#dadosExternos').hide();
             }else{
                    $('#dadosExternos').show();
             }
            });
             $('#tipoEvento').click(function (){
             var current = $('#tipoEvento :selected').val();
             if(current == 0){
                    $('#dadosExternos').hide();
             }else{
                    $('#dadosExternos').show();
             }
            });
            </script>