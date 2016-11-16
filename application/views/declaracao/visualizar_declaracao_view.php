<?php
echo form_fieldset("<h1>Minhas Declarações</h1>");

if ($aluno['total_geral_hora'] == 0)
    $mensagem = "Você ainda não possui horas aprovadas na disciplina de AACC";

if($aluno['total_geral_hora'] >= $horasNecessarias['qt_horas_aacc'])
    $mensagem = "Parabéns, você tem ".$aluno['total_geral_hora']." horas aprovadas. Concluiu com sucesso a disciplina de AACC! ";

if($aluno['total_geral_hora'] > 0 && $aluno['total_geral_hora'] <   $horasNecessarias['qt_horas_aacc']){
    $mensagem = "Você já possui ". $aluno['total_geral_hora']. " horas aprovadas na disciplina de AACC, vamos lá, falta pouco!";
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
            echo "<td class=''>{$hora['soma_por_atividade']}</td>";
            echo "</tr>";
        }
        echo "<td style='font-weight: bold'>Total Geral</td>";
        echo "<td>{$total}</td>"
        ?>
    </table>
    <p style="margin-bottom: 30px; margin-top: 30px">Selecione a declaracao para ver os detalhes:</p>
        <?php
        foreach ($declaracoes as $declaracao) {
            $declaracao['dt_declaracao'] = date('d/m/Y',  strtotime($declaracao['dt_declaracao']));
            if($declaracao['status_declaracao'] == "0"){
                $declaracao['status_declaracao'] = "Pendente";
                $alert = "alert-warning";
                $mensagem = "Aguardando validação do coodernador da disciplina";
             }
            if($declaracao['status_declaracao'] == "1"){
                $declaracao['status_declaracao'] = "Deferido";
                $alert = "alert-success";
                $mensagem = "Data da Aprovação: ".$declaracao['dt_declaracao'];
            }
            if($declaracao['status_declaracao'] == "2"){
                $declaracao['status_declaracao'] = "Indeferido";
                $alert = "alert-danger";
                $mensagem = "Motivo de Indeferimento: Não reconhecido pelo MEC";
                $mensagem = "Motivo de Indeferimento: ".$declaracao['nm_motivo'];
            }
            ?>
            <div id="resumo_declaracao">
                <div name="dec" style="cursor: pointer" class="declaracao alert <?=$alert?>" id="<?= $declaracao['id_declaracao']?>" >
                        <?= $declaracao['status_declaracao'] ?>
                         &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                         Data de cadastro: <?= $declaracao['dt_declaracao'] ?>
                         &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?= $mensagem ?>
                 </div>
            </div>
       <?php }
        $atributos = array('id' => 'form_dec');
       echo form_open('declaracao/visualizarDetalhes', $atributos);
    echo form_input(array("name" => "id_dec", "id" => "id_dec" ,"type" => "hidden"));
       echo form_close();
    ?>
<?php }else echo "<h2 class='text-center'>Não há declarações</h2>" ?>
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