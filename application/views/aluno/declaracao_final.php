<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emissão de Declaração Final</title>

    <!-- CSS para Impressão -->
    <link href="<?= base_url("css/imprimir.css")?>" rel="stylesheet" media="print">

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("css/bootstrap.css")?>" rel='stylesheet' type='text/css' />
    <style>
        p{
            font-size: large;
            line-height: 35px;
        }
    </style>

</head>
<body>
<div class="container">
    <h3 class="text-right"><button class="btn btn-success" onclick="window.print();">IMPRIMIR</button></h3>
    <h3>
        <img src="<?=base_url('images/FatecLogo1.jpg')?>" align="left">
        <img src="<?=base_url('images/CPSLogo1.png')?>" align="right">
        <p>&#160;</p>
        <h3 class="text-center"><?=$unidade['nm_unidade']?></h3>
    </h3>
    <p>&#160;</p>
    <h2 class="text-center">Declaração</h2>
    <p class="text-justify">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
        Declaramos que o(a) aluno(a) <b><?=$aluno['nm_aluno']?></b>, do Curso Superior de Tecnologia em <?=$curso['nm_curso']?>,
        da Faculdade de Tecnologia de Praia Grande, em atendimento às exigências curriculares previstas no Projeto
        Pedagógico do Curso, cumpriu as 40 horas mínimas referentes às “Atividades Acadêmico Científico Culturais –
        AACCI”, distribuídas nas seguintes atividades:
    </p>
    <?php
    foreach($totalHoras as $total){
        echo "<b><p class='text-justify' style='line-height: normal'>";
        foreach($tiposAtividade as $tipo){
            if($tipo['id_tipo_atividade'] == $total['id_tipo_atividade']){
                echo "- ".$tipo['nm_tipo_atividade'].": ";
            }
        }
        echo $total['total_hora_atividade'];
        echo "</p></b>";
    }

    ?>
    <p>&#160;</p>
    <p class="text-center" style="line-height: normal;">Sem mais, firmamos a presente declaração.</p>
    <p class="text-center" style="line-height: normal;">Praia Grande, <?=strftime('%d de %B de %Y', strtotime('today'));?></p>
    <p>&#160;</p>
    <p>&#160;</p>
    <p class="text-left" style="line-height: normal;">____________________________________</p>
    <p class="text-left" style="line-height: normal;">Profª Esp. Renata Neves Ferreira</p>
    <p class="text-left" style="line-height: normal;">(Responsável coordenação de  AACCI)</p>
    <p>&#160;</p>
    <p class="text-left" style="line-height: normal;">____________________________________</p>
    <p class="text-left" style="line-height: normal;"><?=$curso['nm_coordenador_curso']?></p>
    <p class="text-left" style="line-height: normal;">(Coordenador do Curso de Gestão Empresarial)</p>
    <p>&#160;</p>
    <p class="text-left" style="line-height: normal;">____________________________________</p>
    <p class="text-left" style="line-height: normal;"><?=$unidade['nm_diretor']?></p>
    <p class="text-left" style="line-height: normal;">(Diretora da unidade)</p>
</div>
</body>
</html>