<script type="text/javascript">
    function confirma(){
        return confirm("Confirmar informações e enviar?");
    }
    var url = "<?= base_url() ?>" + "index.php/Curso/buscaCursosByUnidade";
    function busca_cursos(id_unidade){
        $.post(url, {
            id_unidade : id_unidade
        }, function(data){
            $('#cursos').html(data);
        })
    }
    $(document).ready(function(){
        $("#cpf_coordenador").mask("999.999.999-99");
    });
</script>

<!--Função de mascara universal-->
<?php
function mask($val, $mask){ $maskared = '';  $k = 0; for($i = 0; $i<=strlen($mask)-1; $i++) {
 if($mask[$i] == '#') { if(isset($val[$k])) $maskared .= $val[$k++]; }
 else { if(isset($mask[$i])) $maskared .= $mask[$i]; } }
 return $maskared; } ?>

<?php

/*echo "<pre>";
print_r($curso);
echo "</pre>";*/

echo form_fieldset("<h1>Pesquisa de Curso</h1>");

echo form_open('curso/buscarDetalhesCursoPesquisa', array('class' => 'form-horizontal'));
echo "<div class='row'>";
echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
$unidades = $unidades;
if (!isset($unidade)) {
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));

} else {
    echo form_dropdown('Unidade', $unidades, $unidade, array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));
}
echo "</div>";
echo form_label("Curso", "curso", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
echo "<select name='cursos' id='cursos' class='form-control' required='required'></select>";
echo "</div>";

echo "<div class='col-md-2'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";

echo "</div>";
echo form_close();
//detalhes do curso
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

if(!isset($curso)){
}else { ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Codigo</th>
                <th>Abreviação</th>
                <th>Nome do Coordenador</th>
                <th>Cpf do Coordenador</th>
                <th>Quantidade de horas do curso de AACC</th>
            </tr>
            </thead>

           <?php
                $c = $curso['cd_cpf_coordenador_curso']; $cpf='';
                if (strlen($c) == 11) $cpf = mask($c,'###.###.###-##');
                if (strlen($c) > 11) $cpf = $c;
                echo "<tr>";
                echo "<td class='texto-esquerda'>{$curso['nm_curso']}</td>";
                echo "<td class='texto-esquerda' id=''>{$curso['cd_curso']}</td>";
                echo "<td>{$curso['nm_abreviacao']}</td>";
                echo "<td>{$curso['nm_coordenador_curso']}</td>";
                echo "<td>$cpf</td>";
                echo "<td>{$curso['qt_horas_aacc']}</td>";
                echo "</tr>";
             ?>
        </table>
    </div>
<?php } ?>

