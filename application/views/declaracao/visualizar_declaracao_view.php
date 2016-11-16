<?php
//$declaracoes = null;
echo form_fieldset("<h1>Meus Relatórios de Atividades</h1>");
echo "<div class='row'>";
echo "<div class='col-md-10'>";
if(!empty($declaracoes)){ ?>
    <div>
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade de horas</th>
                <th>Data Relatório</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
            </thead>
            <?php
            foreach ($declaracoes as $declaracao) {
                if($declaracao['status_declaracao'] == "0"){
                    $declaracao['status_declaracao'] = "Pendente";
                }
                if($declaracao['status_declaracao'] == "1"){
                    $declaracao['status_declaracao'] = "Deferido";
                }
                $declaracao['dt_declaracao'] = date('d/m/Y',  strtotime($declaracao['dt_declaracao']));
                echo "<tr>";
                echo "<td class=''>{$declaracao['nm_evento_externo']}</td>";
                echo "<td class='' id='cidades'>{$declaracao['qt_horas_atividade']}</td>";
                echo "<td>{$declaracao['dt_declaracao']}</td>";
                echo "<td>{$declaracao['status_declaracao']}</td>";
                echo "<td >".
                    form_open('declaracao/alterarDeclaracao');
                echo form_input(array("name" => "id", "value" => set_value("id", $declaracao['id_declaracao']), "type" => "hidden"));
                echo form_input(array("name" => "status", "value" => set_value("id", $declaracao['status_declaracao']), "type" => "hidden"));
                echo form_input(array("name" => "enviar", "value" => "Alterar", "type" => "submit", "class"=>"btn btn-success"));
                form_close();
                form_open('declaracao/excluirDeclaracao');
                echo form_input(array("name" => "id", "value" => set_value("id", $declaracao['id_declaracao']), "type" => "hidden"));
                echo form_input(array("name" => "status", "value" => set_value("id", $declaracao['status_declaracao']), "type" => "hidden"));
                echo form_input(array("name" => "enviar", "value" => "Excluir", "type" => "submit","class"=>"btn btn-danger"));
                form_close();
                echo "</tr>";
            }
            ?>
        </table>
    </div>
<?php }else echo "<h2 class='text-center'>Não há relatórios</h2>" ?>
</div>
</div>