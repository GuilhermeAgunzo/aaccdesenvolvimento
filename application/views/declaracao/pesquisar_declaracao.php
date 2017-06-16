<script type="text/javascript">
    var url = "<?= base_url() ?>" + "index.php/Declaracao/buscaDeclaracoesByStatus";
    function busca_cursos(id_unidade){
        $.post(url, {
            id_unidade : id_unidade
        }, function(data){
            $('#cursos').html(data);
        })
    }
</script>
<?php
echo form_fieldset("<h1>Meus Relatórios</h1>");

$horasRestantes =  $horasNecessarias['qt_horas_aacc'] - $aluno['total_geral_hora'];

if ($aluno['total_geral_hora'] == 0)
    $mensagem = "Você ainda não possui horas aprovadas na disciplina de AACC";
if($aluno['total_geral_hora'] >= $horasNecessarias['qt_horas_aacc'])
    $mensagem = "Parabéns, você tem ".$aluno['total_geral_hora']." horas aprovadas. Concluiu com sucesso a disciplina de AACC! ";
if($aluno['total_geral_hora'] > 0 && $aluno['total_geral_hora'] < $horasNecessarias['qt_horas_aacc']){
    $mensagem = "Você já possui <span style='color: green'>". $aluno['total_geral_hora']. "</span> horas aprovadas na disciplina de AACC, vamos lá, falta pouco!".
                "<br>".
                "Faltam <span style='color: green'>". $horasRestantes. "</span> horas para conclusão da disciplina de AACC, não desanime, você está quase lá!";
}




echo "<div class='row'>";
echo "<div class='col-md-10'>";
if(!empty($declaracoes)){ ?>
    <h4 class="text-center" style="margin-bottom: 40px"><?= $mensagem?></h4>
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
    <div class="row">
        <div style="margin-bottom: 30px; margin-top: 30px; font-size: 20px" class="col-md-8">
            Selecione a declaracao para ver os detalhes:
        </div>
       <div class="col-md-4" id="tabela">
           Filtros:
        <select name="status" id="txtBusca">
            <option value="">Todos</option>
            <option value="1">Pendente</option>
            <option value="2">Aprovada</option>
            <option value="3">Não aprovada</option>
        </select>
       </div>
    </div>


    <table class="table-responsive table-striped table-bordered table-declaracao" id="filtro">
        <tr class="info">
            <th>Arquivo</th>
            <th>Status</th>
            <th>Data de Cadastro</th>
            <th>Detalhes</th>
            <th>Impressão</th>
        </tr>
    <?php
    $impressao = 1;
    foreach ($declaracoes as $declaracao) {
        $declaracao['dt_declaracao'] = date('d/m/Y',  strtotime($declaracao['dt_declaracao']));
        //$declaracao['dt_aprovacao_doc'] = date('d/m/Y',  strtotime($declaracao['dt_aprovacao_doc']));
        if($declaracao['status_declaracao'] == "1"){
            $impressao = 0;
            $classeAprovacao = "Pendente";
            $declaracao['status_declaracao'] = "Pendente";
        }else if($declaracao['status_declaracao'] == "2") {
            $impressao = 1;
            $classeAprovacao = "Aprovada";
            $declaracao['status_declaracao'] = "Aprovada";
        }else if ($declaracao['status_declaracao'] == "3") {
            $impressao = 1;
            $classeAprovacao = "nAprovada";
            $declaracao['status_declaracao'] = "Não aprovada";
        }
        ?>

        <tr id="resumo_declaracao" class="<?=$classeAprovacao?>">
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
                if($impressao != 0){
                    echo form_button(array("class" => "btn btn-default", "content" => "Imprimir Relatório", "onClick" => "varWindow = window.open ('{$endecoprint}','imprimir','width=1024, height=655, top=10, left=110, scrollbars=no');"));
                } else{
                    echo form_button(array("class" => "btn btn-default", "content" => "Imprimir Relatório", "disabled" => "disabled"));
                }
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

    //Filtrando tabela de declarações
    $(function(){
        $("#txtBusca").change(function(){
            var texto = $(this).val();
            $("#filtro ").css("display", "block");

            if($('#txtBusca').val() === ''){
                $('.Aprovada').show();
                $('.Pendente').show();
                $('.nAprovada').show();
            }

            if($('#txtBusca').val() == 1){
                $('.Aprovada').hide();
                $('.Pendente').show();
                $('.nAprovada').hide();
            }

            if($('#txtBusca').val() == 2){
                $('.Aprovada').show();
                $('.Pendente').hide();
                $('.nAprovada').hide();
            }

            if($('#txtBusca').val() == 3){
                $('.Aprovada').hide();
                $('.Pendente').hide();
                $('.nAprovada').show();
            }

            $("#filtro ").each(function(){
                //$('#resumo_declaracao').hide();

                //if($(this).text().indexOf(texto) < 0){
                  //  $(this).css("display", "none");
                //}
            });
        });
    });
</script>