<?php
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
    <p style="margin-bottom: 30px; margin-top: 30px">Selecione a declaracao para ver os detalhes:</p>

    <?php
    foreach ($declaracoes as $declaracao) {
        $declaracao['dt_declaracao'] = date('d/m/Y',  strtotime($declaracao['dt_declaracao']));
        $declaracao['dt_aprovacao_doc'] = date('d/m/Y',  strtotime($declaracao['dt_aprovacao_doc']));
        if($declaracao['status_declaracao'] == "1"){
            $declaracao['status_declaracao'] = "Deferido";
            $mensagem = "Data da Aprovação: ".$declaracao['dt_aprovacao_doc'];
        }
        ?>

        <div id="resumo_declaracao">
            <div name="dec" style="cursor: pointer" class="declaracao" id="<?= $declaracao['id_declaracao']?>" >
                <span class="col-md-2">Arquivo: <?= $declaracao['arquivo_declaracao'] ?> </span>
                <span class="col-md-2">Status: <br/><?= $declaracao['status_declaracao'] ?> </span>
                <span class="col-md-3">Data de cadastro: <?= $declaracao['dt_declaracao'] ?> </span>
                <span class="col-md-3"><?= $mensagem ?></span>
            </div>
            <div>
                <?php
                $endecoprint = base_url('index.php/declaracao/imprimirDeclaracao/'.$declaracao['id_declaracao']);
                echo form_button(array("class" => "btn btn-default", "content" => "Imprimir Relatório", "onClick" => "varWindow = window.open ('{$endecoprint}','imprimir','width=1024, height=655, top=10, left=110, scrollbars=no');"))
                ?>
            </div>
        </div>

    <?php }
    $atributos = array('id' => 'form_dec');
    echo form_open('declaracao/visualizarDetalhes', $atributos);
    echo form_input(array("name" => "id_dec", "id" => "id_dec" ,"type" => "hidden"));
    echo form_close();
    ?>
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