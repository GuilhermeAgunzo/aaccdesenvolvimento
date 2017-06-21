<?php

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($titulo);
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $titulo, PDF_HEADER_STRING);
$obj_pdf->SetHeaderData('', '',''. $titulo, '');

$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
// we can have any view part here like HTML, PHP etc
$tabela = "<h1>Foifoifoi</h1>";
$content .= '
<table cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td> Matricula</td>
        <td> Nome</td>
        <td> Email</td>
        <td> Telefone</td>
        <td> Celular</td>
        <td> Status</td>
        <td> Horas Aprovadas</td>
        <td> Horas Não Aprovadas</td>
        <td> Horas Pendentes</td>
    </tr>';


foreach ($alunos as $aluno){
    $content .='<tr>';

    $content .= "<td>" . $aluno["cd_mat_aluno"] . "</td>";
    $content .= "<td>" . $aluno["nm_aluno"] . "</td>";
    $content .= "<td>" . $aluno["nm_email"] . "</td>";
    $content .= "<td>" . $aluno["cd_tel_residencial"] . "</td>";
    $content .= "<td>" . $aluno["cd_tel_celular"] . "</td>";

    if ($aluno["status_ativo"] != 0) {
        $content .= "<td>Ativo</td>";
    } else {
        $content .= "<td>Inativo</td>";
    }

    if($aluno["total_geral_hora"] == 1 || $aluno["total_geral_hora"] == '1'){
        $content .= "<td>". $aluno["total_geral_hora"] . " hora</td>";
    }else{
        $content .= "<td>". $aluno["total_geral_hora"] . " horas</td>";
    }

    foreach($horas as $hora){
        if($aluno['id_aluno'] == $hora['id_aluno']){
            if($hora['status_declaracao'] == 3){
                if($hora['soma'] == 1){
                    $content .= "<td>". $hora['soma'] ." hora</td>";
                }else{
                    if($hora['soma'] == null){
                        $content .= "<td>0 horas</td>";
                    }else{
                        $content .= "<td>". $hora['soma'] ." horas</td>";
                    }
                }

            }
        }
    }

    foreach($horas as $hora){
        if($aluno['id_aluno'] == $hora['id_aluno']){
            if($hora['status_declaracao'] == 1){
                if($hora['soma'] == 1){
                    $content .= "<td>". $hora['soma'] ." hora</td>";
                }else{
                    if($hora['soma'] == null){
                        $content .= "<td>0 horas</td>";
                    }else{
                        $content .= "<td>". $hora['soma'] ." horas</td>";
                    }

                }

            }
        }
    }





    $content .='</tr>';
}


$content .='</table>';
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output($arquivo.'.pdf', 'I');