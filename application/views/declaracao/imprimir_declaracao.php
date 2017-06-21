<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=strftime('%d%m%Y', strtotime('today'));?>_<?= str_replace(':','',date('H:i'))?>_<?=str_replace(' ','',$aluno['nm_aluno']);?></title>
    <link href="<?= base_url("css/bootstrap.css")?>" rel='stylesheet' type='text/css' />
    <link href="<?= base_url("css/imprimir.css")?>" rel="stylesheet" media="print">
</head>
<body>
<div class="container">
    <p>&#160;</p>
    <p class="text-right"><button class="btn btn-success" onclick="window.print();">IMPRIMIR</button></p>
    <div align="center">
        <img src="<?=base_url('images/CPSLogo1.png')?>">
        <img src="<?=base_url('images/FatecLogo1.jpg')?>">

    </div>
    <div align="center">
        <h4><b>FATEC PRAIA GRANDE</b></h4>
        <h4><b>Curso Superior de Tecnologia em <?=$curso['nm_curso']?></b></h4>
        <p>&#160;</p>
        <p>&#160;</p>
        <h4>RELATÓRIO DAS ATIVIDADES ACADÊMICO CIENTÍFICO CULTURAIS I – CH 40</h4>

    </div>
    <div class="align-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <td><b>Nome do Aluno: </b><?=$aluno['nm_aluno']?></td>
                    <td><b>Semestre: </b><?=$turma['dt_semestre']?>º</td>
                </tr>
                <tr>
                    <td><b>Disciplina: </b>AACC I</td>
                    <td><b>Professor(a): </b><?=$professor['nm_professor']?></td>
                </tr>
                <tr>
                    <td><b>E-mail: </b><?=$aluno['nm_email']?></td>
                    <td><b>Telefone: </b><?=$aluno['cd_tel_residencial']?> / <?=$aluno['cd_tel_celular']?></td>
                </tr>
            </table>
            <p>&#160;</p>
            <table class="table table-bordered">
                <tr>
                    <td class="col-md-12"><b>Tipo de Atividade: </b><?=$tipoAtividade['nm_tipo_atividade']?></td>
                </tr>
                <tr>
                    <td>&#160;</td>
                </tr>
                <tr>
                    <td>
                        <p><b>Especifique a data e duração da realização da Atividade: </b></p>
                        <?php if($declaracao['dt_evento_externo'] != null && $declaracao['dt_evento_externo'] != ""){
                            echo "<p>".dataMysqlParaPtBr($declaracao['dt_evento_externo'])."</p>";
                            echo "<p>".$declaracao['qt_horas_atividade']." horas</p>";
                        }else{
                            echo "<p>".dataMysqlParaPtBr($evento['dt_inicio_evento'])."</p>>";
                            echo "<p>".$evento['qt_horas_evento']."</p>>";
                        }?>
                    </td>
                </tr>
                <tr>
                    <td><b>Relate os objetivos da atividade. Faça um resumo do que viu, estudou e aprendeu com esta
                            atividade e relacione com o aprendizado teórico proporcionado no seu Curso. Identifique a
                            relevância e contribuição desta atividade para a sua formação profissional.</b>
                    </td>
                </tr>
                <tr>
                    <td>&#160;&#160;&#160;&#160;<?=$declaracao['resumo_atividade']?></td>
                </tr>
                <tr>
                    <td>
                        <p><b>Assinatura do aluno:  </b></p>
                        <p><b>Data: </b><?php if($ctrl_dec != null) echo dataMysqlParaPtBr($ctrl_dec[0]['dt_aprovacao_doc'])?></p>
                    </td>
                </tr>
            </table>
            <p>&#160;</p>
            <table class="table table-bordered">
                <tr>
                    <td><b>Parecer do Professor e/ou Coordenador do Curso</b></td>
                </tr>
                <tr>
                    <td>
                        <p>Esta atividade equivale a <b><?php if($ctrl_dec != null) echo $ctrl_dec[0]['qt_horas_aprovadas']?></b> hora(s).
                            Avaliação: <?php if($declaracao['status_declaracao'] == 2){
                                echo "Satisfatória";
                            }else if($declaracao['status_declaracao'] == 3){
                                echo "Insatisfatória";
                            }?>
                        </p>
                        <p><b>Data: </b><?php if($ctrl_dec != null) echo dataMysqlParaPtBr($ctrl_dec[0]['dt_aprovacao_doc'])?> &#160;&#160;&#160;&#160;&#160;&#160;&#160;<b>Assinatura do professor: </b>______________________________</p>
                        <p><b>Observações: </b><?php if($ctrl_dec != null) echo $ctrl_dec[0]['ds_observacao']?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>