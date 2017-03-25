<?php
/*echo "<pre>";
print_r($declaracoes);
echo "</pre>";*/
echo form_fieldset("<h1>Meus Relatórios</h1>");

if ($aluno['total_geral_hora'] == 0)
    $mensagem = "Você ainda não possui horas aprovadas na disciplina de AACC";
if($aluno['total_geral_hora'] >= $horasNecessarias['qt_horas_aacc'])
    $mensagem = "Parabéns, você tem ".$aluno['total_geral_hora']." horas aprovadas. Concluiu com sucesso a disciplina de AACC! ";
if($aluno['total_geral_hora'] > 0 && $aluno['total_geral_hora'] <   $horasNecessarias['qt_horas_aacc']){
    $mensagem = "Você já possui <span style='color: green'>". $aluno['total_geral_hora']. "</span> horas aprovadas na disciplina de AACC, vamos lá, falta pouco!";
}

$horasRestantes =  $horasNecessarias['qt_horas_aacc'] - $aluno['total_geral_hora'];
$horasRestantes = "Faltam <span style='color: green'>". $horasRestantes. "</span> horas para conclusão da disciplina de AACC, não desanime, você está quase lá!";

echo "<div class='row'>";
echo "<div class='col-md-10'>";
if(!empty($declaracoes)){ ?>
    <h4 class="text-center" style="margin-bottom: 40px"><?= $mensagem."<br>".$horasRestantes ?></h4>
    <table  class="table-responsive table-striped table-bordered">
        <thead>
        <tr class="info">
            <th>Tipo de Atividade</th>
            <th>Total Geral de horas deste tipo de atividade</th>
        </tr>
        </thead>
        <?php
        foreach ($horas as $hora) {
            echo "<tr>";
            echo "<td class=''>{$hora['nm_tipo_atividade']}</td>";
            echo "<td class=''>{$hora['total_hora_atividade']}</td>";
            echo "</tr>";
        }
        echo "<td style='font-weight: bold'>Total Geral</td>";
        echo "<td>{$aluno['total_geral_hora']}</td>"
        ?>
    </table>
    <p style="margin-bottom: 30px; margin-top: 30px; font-size: 20px">Selecione a declaracao para ver os detalhes:</p>

    <table class="table-responsive table-striped table-bordered">
        <tr class="info">
            <th>Arquivo</th>
            <th>Status</th>
            <th>Data de Cadastro</th>
            <th>Detalhes</th>
            <th>Impressão</th>
        </tr>
    <?php
    foreach ($declaracoes as $declaracao) {
        $declaracao['dt_declaracao'] = date('d/m/Y',  strtotime($declaracao['dt_declaracao']));
        //$declaracao['dt_aprovacao_doc'] = date('d/m/Y',  strtotime($declaracao['dt_aprovacao_doc']));
        if($declaracao['status_declaracao'] == "1"){
            $declaracao['status_declaracao'] = "Pendente";
        }else if($declaracao['status_declaracao'] == "2") {
            $declaracao['status_declaracao'] = "Aprovada";
        }else if ($declaracao['status_declaracao'] == "3") {
            $declaracao['status_declaracao'] = "Não Aprovada";
        }
        ?>

        <tr id="resumo_declaracao">
            <td class=".declaracao"><?= $declaracao['arquivo_declaracao'] ?></td>
            <td class=".declaracao"><?= $declaracao['status_declaracao'] ?></td>
            <td class=".declaracao"><?= $declaracao['dt_declaracao'] ?></td>
            <td>
                <?php
                $atributos = array('id' => 'form_dec');
                echo form_open('declaracao/visualizarDetalhes', $atributos);
                echo form_button(array("class" => "btn btn-default .declaracao", "content" => "Detalhes", "type" => "submit"));
                echo form_input(array("name" => "id_dec", "id" => "id_dec" ,"type" => "hidden", "value" => set_value("id_dec", $declaracao['id_declaracao'] )));
                ?>
            <td>
                <?php
                $endecoprint = base_url('index.php/declaracao/imprimirDeclaracao/'.$declaracao['id_declaracao']);
                echo form_button(array("class" => "btn btn-default", "content" => "Imprimir Relatório", "onClick" => "varWindow = window.open ('{$endecoprint}','imprimir','width=1024, height=655, top=10, left=110, scrollbars=no');"));
                echo form_close();
                ?>
            </td>
        </tr>

    <?php }
    ?>
    </table>
<?php }else echo "<h2 class='text-center'>Não há relatórios</h2>" ?>
</div>
</div>
<script>
    //requisicao da pagina php
    $(document).ready(function(){
        $('#resumo_declaracao .declaracao').click(function(){
            var id_declaracao = $(this).attr('id');
            $("#id_dec").val(id_declaracao);
            $("#form_dec").submit();
        });
    });
</script>