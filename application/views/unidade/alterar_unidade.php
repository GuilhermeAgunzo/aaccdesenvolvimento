<?php
echo form_fieldset("<h1>Alteração de Unidade</h1>");

if(!isset($unidade)){
echo form_open('unidade/pesquisaFiltroUnidade', 'class = form-horizontal');
echo form_label("Pesquisar Unidade", "termo", array("class" => "col-md-2 control-label"));
echo "<div class='col-md-4'>";
echo "<div class='input-group'>";
if (isset($termo)){echo form_input(array("name" => "termo", "value" => "{$termo}" ,"required" => "required", "class" => "form-control", "maxlength" => "70"));
}else{echo form_input(array("name" => "termo", "required" => "required", "class" => "form-control", "maxlength" => "70"));}
echo "<span class='input-group-btn'>";
echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
echo "</span>";
echo "</div>";
echo form_hidden("opcao", 'Alterar');
echo form_close();
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-md-2'>";
echo "<td>". anchor("unidade/alterar_unidade/", "Mostrar Todos", 'class = "btn btn-default"')."</td>";
echo "</div>";
echo "</div>";

echo "<br/><br/>";

}


if(isset($unidades)) { ?>
    <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
        <th>Unidade</th>
        <th>Cidade</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>CEP</th>
        <th></th>
    </tr>
    </thead>
    <?php
    foreach ($unidades as $unidades) {
        echo "<tr>";
        echo "<td class='texto-esquerda'>{$unidades['cd_cpsouza']} - {$unidades['nm_unidade']}</td>";
        echo "<td class='texto-esquerda' id='cidades'>{$unidades['nm_cidade']}</td>";
        echo "<td>{$unidades['cd_telefone']}</td>";
        echo "<td>{$unidades['nm_endereco']}, {$unidades['cd_num_endereco']}</td>";
        echo "<td>{$unidades['nm_complemento_endereco']}</td>";
        echo "<td>{$unidades['nm_bairro']}</td>";
        echo "<td>{$unidades['cd_cep_endereco']}</td>";
        echo "<td>".anchor("unidade/buscarAlteraUnidade/{$unidades['cd_cpsouza']}","Alterar", "class = 'btn btn-default btn-alterar btn-xs'")."</td>";
        echo "</tr>";
    }
        ?>
    </table>
</div>

<?php
}
    if(isset($unidade)){
        echo form_open('unidade/alteraUnidade','class = form-horizontal');
        echo form_hidden('id_unidade', $unidade['id_unidade']);

        echo "<div class='row'>";
        echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_input(array("name" => "cd_cpsouza", "value" => set_value("cd_cpsouza",$unidade['cd_cpsouza']), "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "10", "readonly" => "readonly"));
        echo form_error("cd_cpsouza");
        echo "</div>";
        echo form_label("Nome da Unidade", "nm_unidade", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-3'>";
        echo form_input(array("name" => "nm_unidade", "value" => set_value("nm_unidade",$unidade['nm_unidade']), "id" => "nm_unidade", "class" => "form-control", "maxlength" => "50"));
        echo form_error("nm_unidade");
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("Endereço", "endereco", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-3'>";
        echo form_input(array("name" => "endereco", "value" => set_value("endereco",$unidade['nm_endereco']), "id" => "endereco", "class" => "form-control", "maxlength" => "50"));
        echo form_error("endereco");
        echo "</div>";
        echo form_label("Número", "numero", array("class" => "col-md-1 control-label"));
        echo "<div class='form-group col-md-1'>";
        echo form_input(array("name" => "numero", "value" => set_value("numero",$unidade['cd_num_endereco']), "id" => "numero", "class" => "form-control", "maxlength" => "10"));
        echo form_error("numero");
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("Complemento", "complemento", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_input(array("name" => "complemento", "value" => set_value("complemento",$unidade['nm_complemento_endereco']), "id" => "complemento", "class" => "form-control", "maxlength" => "50"));
        echo form_error("complemento");
        echo "</div>";
        echo form_label("Bairro", "bairro", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_input(array("name" => "bairro", "value" => set_value("bairro",$unidade['nm_bairro']), "id" => "bairro", "class" => "form-control", "maxlength" => "50"));
        echo form_error("bairro");
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("CEP", "cep", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_input(array("name" => "cep", "value" => set_value("cep",$unidade['cd_cep_endereco']), "id" => "cep", "class" => "form-control cep", "maxlength" => "9"));
        echo form_error("cep");
        echo "</div>";
        echo "<div class='col-md-1'>";
        echo "</div>";
        echo form_label("Cidade", "cidade", array("class" => "col-md-1 control-label"));
        echo "<div class='form-group col-md-2'>";

        $cidades = array('Adamantina' => 'Adamantina', 'Adolfo' => 'Adolfo', 'Aguaí' => 'Aguaí', 'Águas da Prata' => 'Águas da Prata', 'Águas de Lindóia' => 'Águas de Lindóia', 'Águas de Santa Barbara' => 'Águas de Santa Barbara', 'Águas de São Pedro' => 'Águas de São Pedro', 'Agudos' => 'Agudos', 'Alambari' => 'Alambari', 'Alfredo Marcondes' => 'Alfredo Marcondes', 'Altair' => 'Altair', 'Altinópolis' => 'Altinópolis', 'Alto Alegre' => 'Alto Alegre', 'Alumínio' => 'Alumínio', 'Álvares Florence' => 'Álvares Florence', 'Álvares Machado' => 'Álvares Machado', 'Álvaro de Carvalho' => 'Álvaro de Carvalho', 'Alvinlândia' => 'Alvinlândia', 'Americana' => 'Americana', 'Américo Brasiliense' => 'Américo Brasiliense', 'Américo de Campos' => 'Américo de Campos', 'AMPARO' => 'AMPARO', 'Analândia' => 'Analândia', 'ANDRADINA' => 'ANDRADINA', 'Angatuba' => 'Angatuba', 'Anhembi' => 'Anhembi', 'Anhumas' => 'Anhumas', 'Aparecida' => 'Aparecida', 'Aparecida d&#39;Oeste' => 'Aparecida d&#39;Oeste', 'Apiaí' => 'Apiaí', 'Araçariguama' => 'Araçariguama', 'ARAÇATUBA' => 'ARAÇATUBA', 'Araçoiaba da Serra' => 'Araçoiaba da Serra', 'Aramina' => 'Aramina', 'Arandu' => 'Arandu', 'Arapeí' => 'Arapeí', 'ARARAQUARA' => 'ARARAQUARA', 'Araras' => 'Araras', 'Arco-Íris' => 'Arco-Íris', 'Arealva' => 'Arealva', 'Areias' => 'Areias', 'Areiópolis' => 'Areiópolis', 'Ariranha' => 'Ariranha', 'Artur Nogueira' => 'Artur Nogueira', 'Arujá' => 'Arujá', 'Aspásia' => 'Aspásia', 'ASSIS' => 'ASSIS', 'Atibaia' => 'Atibaia', 'AURIFLAMA' => 'AURIFLAMA', 'Avaí' => 'Avaí', 'Avanhandava' => 'Avanhandava', 'AVARÉ' => 'AVARÉ', 'Bady Bassitt' => 'Bady Bassitt', 'Balbinos' => 'Balbinos', 'Bálsamo' => 'Bálsamo', 'BANANAL' => 'BANANAL', 'Barão de Antonina' => 'Barão de Antonina', 'Barbosa' => 'Barbosa', 'Bariri' => 'Bariri', 'Barra Bonita' => 'Barra Bonita', 'Barra do Chapéu' => 'Barra do Chapéu', 'Barra do Turvo' => 'Barra do Turvo', 'BARRETOS' => 'BARRETOS', 'Barrinha' => 'Barrinha', 'Barueri' => 'Barueri', 'Bastos' => 'Bastos', 'BATATAIS' => 'BATATAIS', 'BAURU' => 'BAURU', 'Bebedouro' => 'Bebedouro', 'Bento de Abreu' => 'Bento de Abreu', 'Bernardino de Campos' => 'Bernardino de Campos', 'Bertioga' => 'Bertioga', 'Bilac' => 'Bilac', 'BIRIGUI' => 'BIRIGUI', 'Biritiba-Mirim' => 'Biritiba-Mirim', 'Boa Esperança do Sul' => 'Boa Esperança do Sul', 'Bocaina' => 'Bocaina', 'Bofete' => 'Bofete', 'Boituva' => 'Boituva', 'Bom Jesus dos Perdões' => 'Bom Jesus dos Perdões', 'Bom Sucesso de Itararé' => 'Bom Sucesso de Itararé', 'Borá' => 'Borá', 'Boracéia' => 'Boracéia', 'Borborema' => 'Borborema', 'Borebi' => 'Borebi', 'BOTUCATU' => 'BOTUCATU', 'BRAGANÇA PAULISTA' => 'BRAGANÇA PAULISTA', 'Braúna' => 'Braúna', 'Brejo Alegre' => 'Brejo Alegre', 'Brodowski' => 'Brodowski', 'Brotas' => 'Brotas', 'Buri' => 'Buri', 'Buritama' => 'Buritama', 'Buritizal' => 'Buritizal', 'Cabrália Paulista' => 'Cabrália Paulista', 'Cabreúva' => 'Cabreúva', 'Caçapava' => 'Caçapava', 'Cachoeira Paulista' => 'Cachoeira Paulista', 'Caconde' => 'Caconde', 'Cafelândia' => 'Cafelândia', 'Caiabu' => 'Caiabu', 'Caieiras' => 'Caieiras', 'Caiuá' => 'Caiuá', 'Cajamar' => 'Cajamar', 'Cajati' => 'Cajati', 'Cajobi' => 'Cajobi', 'Cajuru' => 'Cajuru', 'Campina de Monte Alegre' => 'Campina de Monte Alegre', 'CAMPINAS' => 'CAMPINAS', 'Campo Limpo Paulista' => 'Campo Limpo Paulista', 'CAMPOS DO JORDÃO' => 'CAMPOS DO JORDÃO', 'Campos Novos Paulista' => 'Campos Novos Paulista', 'Cananéia' => 'Cananéia', 'Canas' => 'Canas', 'Cândido Mota' => 'Cândido Mota', 'Cândido Rodrigues' => 'Cândido Rodrigues', 'Canitar' => 'Canitar', 'CAPÃO BONITO' => 'CAPÃO BONITO', 'Capela do Alto' => 'Capela do Alto', 'Capivari' => 'Capivari', 'CARAGUATATUBA' => 'CARAGUATATUBA', 'Carapicuíba' => 'Carapicuíba', 'Cardoso' => 'Cardoso', 'Casa Branca' => 'Casa Branca', 'Cássia dos Coqueiros' => 'Cássia dos Coqueiros', 'Castilho' => 'Castilho', 'CATANDUVA' => 'CATANDUVA', 'Catiguá' => 'Catiguá', 'Cedral' => 'Cedral', 'Cerqueira César' => 'Cerqueira César', 'Cerquilho' => 'Cerquilho', 'Cesário Lange' => 'Cesário Lange', 'Charqueada' => 'Charqueada', 'Chavantes' => 'Chavantes', 'Clementina' => 'Clementina', 'Colina' => 'Colina', 'Colômbia' => 'Colômbia', 'Conchal' => 'Conchal', 'Conchas' => 'Conchas', 'Cordeirópolis' => 'Cordeirópolis', 'Coroados' => 'Coroados', 'Coronel Macedo' => 'Coronel Macedo', 'Corumbataí' => 'Corumbataí', 'Comdópolis' => 'Comdópolis', 'Comdorama' => 'Comdorama', 'Cotia' => 'Cotia', 'Cravinhos' => 'Cravinhos', 'Cristais Paulista' => 'Cristais Paulista', 'Cruzália' => 'Cruzália', 'Cruzeiro' => 'Cruzeiro', 'Cubatão' => 'Cubatão', 'Cunha' => 'Cunha', 'Descalvado' => 'Descalvado', 'Diadema' => 'Diadema', 'Dirce Reis' => 'Dirce Reis', 'Divinolândia' => 'Divinolândia', 'Dobrada' => 'Dobrada', 'Dois Córregos' => 'Dois Córregos', 'Dolcinópolis' => 'Dolcinópolis', 'Dourado' => 'Dourado', 'DRACENA' => 'DRACENA', 'Duartina' => 'Duartina', 'Dumont' => 'Dumont', 'Echaporã' => 'Echaporã', 'Eldorado' => 'Eldorado', 'Elias Fausto' => 'Elias Fausto', 'Elisiário' => 'Elisiário', 'Embaúba' => 'Embaúba', 'Embu' => 'Embu', 'Embu-Guaçu' => 'Embu-Guaçu', 'Emilianópolis' => 'Emilianópolis', 'Engenheiro Coelho' => 'Engenheiro Coelho', 'Espírito Santo do Pinhal' => 'Espírito Santo do Pinhal', 'Espírito Santo do Turvo' => 'Espírito Santo do Turvo', 'Estiva Gerbi' => 'Estiva Gerbi', 'Estrela do Norte' => 'Estrela do Norte', 'Estrela d&#39;Oeste' => 'Estrela d&#39;Oeste', 'Euclides da Cunha Paulista' => 'Euclides da Cunha Paulista', 'Fartura' => 'Fartura', 'Fernando Prestes' => 'Fernando Prestes', 'FERNANDÓPOLIS' => 'FERNANDÓPOLIS', 'Fernão' => 'Fernão', 'Ferraz de Vasconcelos' => 'Ferraz de Vasconcelos', 'Flora Rica' => 'Flora Rica', 'Floreal' => 'Floreal', 'Flórida Paulista' => 'Flórida Paulista', 'Florínia' => 'Florínia', 'FRANCA' => 'FRANCA', 'Francisco Morato' => 'Francisco Morato', 'FRANCO DA ROCHA' => 'FRANCO DA ROCHA', 'Gabriel Monteiro' => 'Gabriel Monteiro', 'Gália' => 'Gália', 'Garça' => 'Garça', 'Gastão Vidigal' => 'Gastão Vidigal', 'Gavião Peixoto' => 'Gavião Peixoto', 'General Salgado' => 'General Salgado', 'Getulina' => 'Getulina', 'Glicério' => 'Glicério', 'Guaiçara' => 'Guaiçara', 'Guaimbê' => 'Guaimbê', 'Guaíra' => 'Guaíra', 'Guapiaçu' => 'Guapiaçu', 'Guapiara' => 'Guapiara', 'Guará' => 'Guará', 'Guaraçaí' => 'Guaraçaí', 'Guaraci' => 'Guaraci', 'Guarani d&#39;Oeste' => 'Guarani d&#39;Oeste', 'Guarantã' => 'Guarantã', 'Guararapes' => 'Guararapes', 'Guararema' => 'Guararema', 'GUARATINGUETÁ' => 'GUARATINGUETÁ', 'Guareí' => 'Guareí', 'Guariba' => 'Guariba', 'Guarujá' => 'Guarujá', 'GUARULHOS' => 'GUARULHOS', 'Guatapará' => 'Guatapará', 'Guzolândia' => 'Guzolândia', 'Herculândia' => 'Herculândia', 'Holambra' => 'Holambra', 'Hortolândia' => 'Hortolândia', 'Iacanga' => 'Iacanga', 'Iacri' => 'Iacri', 'Iaras' => 'Iaras', 'Ibaté' => 'Ibaté', 'Ibirá' => 'Ibirá', 'Ibirarema' => 'Ibirarema', 'Ibitinga' => 'Ibitinga', 'Ibiúna' => 'Ibiúna', 'Icém' => 'Icém', 'Iepê' => 'Iepê', 'Igaraçu do Tietê' => 'Igaraçu do Tietê', 'Igarapava' => 'Igarapava', 'Igaratá' => 'Igaratá', 'Iguape' => 'Iguape', 'Ilha Comprida' => 'Ilha Comprida', 'Ilha Solteira' => 'Ilha Solteira', 'Ilhabela' => 'Ilhabela', 'Indaiatuba' => 'Indaiatuba', 'Indiana' => 'Indiana', 'Indiaporã' => 'Indiaporã', 'Inúbia Paulista' => 'Inúbia Paulista', 'Ipaussu' => 'Ipaussu', 'Iperó' => 'Iperó', 'Ipeúna' => 'Ipeúna', 'Ipiguá' => 'Ipiguá', 'Iporanga' => 'Iporanga', 'Ipuã' => 'Ipuã', 'Iracemápolis' => 'Iracemápolis', 'Irapuã' => 'Irapuã', 'Irapuru' => 'Irapuru', 'Itaberá' => 'Itaberá', 'Itaí' => 'Itaí', 'Itajobi' => 'Itajobi', 'Itaju' => 'Itaju', 'ITANHAÉM' => 'ITANHAÉM', 'Itaóca' => 'Itaóca', 'ITAPECERICA DA SERRA' => 'ITAPECERICA DA SERRA', 'ITAPETININGA' => 'ITAPETININGA', 'ITAPEVA' => 'ITAPEVA', 'Itapevi' => 'Itapevi', 'Itapira' => 'Itapira', 'Itapirapuã Paulista' => 'Itapirapuã Paulista', 'Itápolis' => 'Itápolis', 'Itaporanga' => 'Itaporanga', 'Itapuí' => 'Itapuí', 'Itapura' => 'Itapura', 'Itaquaquecetuba' => 'Itaquaquecetuba', 'Itararé' => 'Itararé', 'Itariri' => 'Itariri', 'Itatiba' => 'Itatiba', 'Itatinga' => 'Itatinga', 'Itirapina' => 'Itirapina', 'Itirapuã' => 'Itirapuã', 'Itobi' => 'Itobi', 'Itu' => 'Itu', 'Itupeva' => 'Itupeva', 'ITUVERAVA' => 'ITUVERAVA', 'Jaborandi' => 'Jaborandi', 'JABOTICABAL' => 'JABOTICABAL', 'Jacareí' => 'Jacareí', 'Jaci' => 'Jaci', 'Jacupiranga' => 'Jacupiranga', 'Jaguariúna' => 'Jaguariúna', 'JALES' => 'JALES', 'Jambeiro' => 'Jambeiro', 'Jandira' => 'Jandira', 'Jardinópolis' => 'Jardinópolis', 'Jarinu' => 'Jarinu', 'JAÚ' => 'JAÚ', 'Jeriquara' => 'Jeriquara', 'Joanópolis' => 'Joanópolis', 'João Ramalho' => 'João Ramalho', 'José Bonifácio' => 'José Bonifácio', 'Júlio Mesquita' => 'Júlio Mesquita', 'Jumirim' => 'Jumirim', 'JUNDIAÍ' => 'JUNDIAÍ', 'Junqueirópolis' => 'Junqueirópolis', 'Juquiá' => 'Juquiá', 'Juquitiba' => 'Juquitiba', 'Lagoinha' => 'Lagoinha', 'Laranjal Paulista' => 'Laranjal Paulista', 'Lavínia' => 'Lavínia', 'Lavrinhas' => 'Lavrinhas', 'Leme' => 'Leme', 'Lençóis Paulista' => 'Lençóis Paulista', 'LIMEIRA' => 'LIMEIRA', 'Lindóia' => 'Lindóia', 'LINS' => 'LINS', 'Lorena' => 'Lorena', 'Lourdes' => 'Lourdes', 'Louveira' => 'Louveira', 'Lucélia' => 'Lucélia', 'Lucianópolis' => 'Lucianópolis', 'Luís Antônio' => 'Luís Antônio', 'Luiziânia' => 'Luiziânia', 'Lupércio' => 'Lupércio', 'Lutécia' => 'Lutécia', 'Macatuba' => 'Macatuba', 'Macaubal' => 'Macaubal', 'Macedônia' => 'Macedônia', 'Magda' => 'Magda', 'Mairinque' => 'Mairinque', 'Mairiporã' => 'Mairiporã', 'Manduri' => 'Manduri', 'Marabá Paulista' => 'Marabá Paulista', 'Maracaí' => 'Maracaí', 'Marapoama' => 'Marapoama', 'Mariápolis' => 'Mariápolis', 'MARÍLIA' => 'MARÍLIA', 'Marinópolis' => 'Marinópolis', 'Martinópolis' => 'Martinópolis', 'Matão' => 'Matão', 'Mauá' => 'Mauá', 'Mendonça' => 'Mendonça', 'Meridiano' => 'Meridiano', 'Mesópolis' => 'Mesópolis', 'Miguelópolis' => 'Miguelópolis', 'Mineiros do Tietê' => 'Mineiros do Tietê', 'Mira Estrela' => 'Mira Estrela', 'Miracatu' => 'Miracatu', 'Mirandópolis' => 'Mirandópolis', 'Mirante do Paranapanema' => 'Mirante do Paranapanema', 'Mirassol' => 'Mirassol', 'Mirassolândia' => 'Mirassolândia', 'Mococa' => 'Mococa', 'MOGI DAS CRUZES' => 'MOGI DAS CRUZES', 'Mogi Guaçu' => 'Mogi Guaçu', 'MOGI-MIRIM' => 'MOGI-MIRIM', 'Mombuca' => 'Mombuca', 'Monções' => 'Monções', 'Mongaguá' => 'Mongaguá', 'Monte Alegre do Sul' => 'Monte Alegre do Sul', 'Monte Alto' => 'Monte Alto', 'Monte Aprazível' => 'Monte Aprazível', 'Monte Azul Paulista' => 'Monte Azul Paulista', 'Monte Castelo' => 'Monte Castelo', 'Monte Mor' => 'Monte Mor', 'Monteiro Lobato' => 'Monteiro Lobato', 'Morro Agudo' => 'Morro Agudo', 'Morungaba' => 'Morungaba', 'Motuca' => 'Motuca', 'Murutinga do Sul' => 'Murutinga do Sul', 'Nantes' => 'Nantes', 'Narandiba' => 'Narandiba', 'Natividade da Serra' => 'Natividade da Serra', 'Nazaré Paulista' => 'Nazaré Paulista', 'Neves Paulista' => 'Neves Paulista', 'NHANDEARA' => 'NHANDEARA', 'Nipoã' => 'Nipoã', 'Nova Aliança' => 'Nova Aliança', 'Nova Campina' => 'Nova Campina', 'Nova Canaã Paulista' => 'Nova Canaã Paulista', 'Nova Castilho' => 'Nova Castilho', 'Nova Europa' => 'Nova Europa', 'Nova Granada' => 'Nova Granada', 'Nova Guataporanga' => 'Nova Guataporanga', 'Nova Independência' => 'Nova Independência', 'Nova Luzitânia' => 'Nova Luzitânia', 'Nova Odessa' => 'Nova Odessa', 'Novais' => 'Novais', 'NOVO HORIZONTE' => 'NOVO HORIZONTE', 'Nuporanga' => 'Nuporanga', 'Ocauçu' => 'Ocauçu', 'Óleo' => 'Óleo', 'Olímpia' => 'Olímpia', 'Onda Verde' => 'Onda Verde', 'Oriente' => 'Oriente', 'Orindiúva' => 'Orindiúva', 'Orlândia' => 'Orlândia', 'OSASCO' => 'OSASCO', 'Oscar Bressane' => 'Oscar Bressane', 'Osvaldo Cruz' => 'Osvaldo Cruz', 'OURINHOS' => 'OURINHOS', 'Ouro Verde' => 'Ouro Verde', 'Ouroeste' => 'Ouroeste', 'Pacaembu' => 'Pacaembu', 'Pedrinhas Paulista' => 'Pedrinhas Paulista', 'Palestina' => 'Palestina', 'Palmares Paulista' => 'Palmares Paulista', 'Palmeira d&#39;Oeste' => 'Palmeira d&#39;Oeste', 'Palmital' => 'Palmital', 'Panorama' => 'Panorama', 'Paraguaçu Paulista' => 'Paraguaçu Paulista', 'PARAIBUNA' => 'PARAIBUNA', 'Paraíso' => 'Paraíso', 'Paranapanema' => 'Paranapanema', 'Paranapuã' => 'Paranapuã', 'Parapuã' => 'Parapuã', 'Pardinho' => 'Pardinho', 'Pariquera Açú' => 'Pariquera Açú', 'Parisi' => 'Parisi', 'Patrocínio Paulista' => 'Patrocínio Paulista', 'Paulicéia' => 'Paulicéia', 'Paulínia' => 'Paulínia', 'Paulistânia' => 'Paulistânia', 'Paulo de Faria' => 'Paulo de Faria', 'Pederneiras' => 'Pederneiras', 'Pedra Bela' => 'Pedra Bela', 'Pedranópolis' => 'Pedranópolis', 'Pedregulho' => 'Pedregulho', 'Pedreira' => 'Pedreira', 'Pedro de Toledo' => 'Pedro de Toledo', 'Penápolis' => 'Penápolis', 'Pereira Barreto' => 'Pereira Barreto', 'Pereiras' => 'Pereiras', 'Peruíbe' => 'Peruíbe', 'Piacatu' => 'Piacatu', 'PIEDADE' => 'PIEDADE', 'Pilar do Sul' => 'Pilar do Sul', 'Pindamonhangaba' => 'Pindamonhangaba', 'Pindorama' => 'Pindorama', 'Pinhalzinho' => 'Pinhalzinho', 'Piquerobi' => 'Piquerobi', 'Piquete' => 'Piquete', 'Piracaia' => 'Piracaia', 'PIRACICABA' => 'PIRACICABA', 'Piraju' => 'Piraju', 'Pirajuí' => 'Pirajuí', 'Pirangi' => 'Pirangi', 'Pirapora do Bom Jesus' => 'Pirapora do Bom Jesus', 'Pirapozinho' => 'Pirapozinho', 'PIRASSUNUNGA' => 'PIRASSUNUNGA', 'Piratininga' => 'Piratininga', 'Pitangueiras' => 'Pitangueiras', 'Planalto' => 'Planalto', 'Platina' => 'Platina', 'Poá' => 'Poá', 'Poloni' => 'Poloni', 'Pompéia' => 'Pompéia', 'Pongaí' => 'Pongaí', 'Pontal' => 'Pontal', 'Pontalinda' => 'Pontalinda', 'Pontes Gestal' => 'Pontes Gestal', 'Populina' => 'Populina', 'Porangaba' => 'Porangaba', 'Porto Feliz' => 'Porto Feliz', 'Porto Ferreira' => 'Porto Ferreira', 'Potim' => 'Potim', 'Potirendaba' => 'Potirendaba', 'Pracinha' => 'Pracinha', 'Pradópolis' => 'Pradópolis', 'Praia Grande' => 'Praia Grande', 'Pratânia' => 'Pratânia', 'Presidente Alves' => 'Presidente Alves', 'Presidente Bernardes' => 'Presidente Bernardes', 'Presidente Epitácio' => 'Presidente Epitácio', 'PRESIDENTE PRUDENTE' => 'PRESIDENTE PRUDENTE', 'Presidente Venceslau' => 'Presidente Venceslau', 'Promissão' => 'Promissão', 'Quadra' => 'Quadra', 'Quatá' => 'Quatá', 'Queiroz' => 'Queiroz', 'Queluz' => 'Queluz', 'Quintana' => 'Quintana', 'Rafard' => 'Rafard', 'Rancharia' => 'Rancharia', 'Redenção da Serra' => 'Redenção da Serra', 'Regente Feijó' => 'Regente Feijó', 'Reginópolis' => 'Reginópolis', 'REGISTRO' => 'REGISTRO', 'Restinga' => 'Restinga', 'Ribeira' => 'Ribeira', 'Ribeirão Bonito' => 'Ribeirão Bonito', 'Ribeirão Branco' => 'Ribeirão Branco', 'Ribeirão Corrente' => 'Ribeirão Corrente', 'Ribeirão do Sul' => 'Ribeirão do Sul', 'Ribeirão dos Índios' => 'Ribeirão dos Índios', 'Ribeirão Grande' => 'Ribeirão Grande', 'Ribeirão Pires' => 'Ribeirão Pires', 'RIBEIRÃO PRETO' => 'RIBEIRÃO PRETO', 'Rifaina' => 'Rifaina', 'Rincão' => 'Rincão', 'Rinópolis' => 'Rinópolis', 'RIO CLARO' => 'RIO CLARO', 'Rio das Pedras' => 'Rio das Pedras', 'Rio Grande da Serra' => 'Rio Grande da Serra', 'Riolândia' => 'Riolândia', 'Riversul' => 'Riversul', 'Rosana' => 'Rosana', 'Roseira' => 'Roseira', 'Rubiácea' => 'Rubiácea', 'Rubinéia' => 'Rubinéia', 'Sabino' => 'Sabino', 'Sagres' => 'Sagres', 'Sales' => 'Sales', 'Sales Oliveira' => 'Sales Oliveira', 'Salesópolis' => 'Salesópolis', 'Salmourão' => 'Salmourão', 'Saltinho' => 'Saltinho', 'Salto' => 'Salto', 'Salto de Pirapora' => 'Salto de Pirapora', 'Salto Grande' => 'Salto Grande', 'Sandovalina' => 'Sandovalina', 'Santa Adélia' => 'Santa Adélia', 'Santa Albertina' => 'Santa Albertina', 'Santa Bárbara d&#39;Oeste' => 'Santa Bárbara d&#39;Oeste', 'Santa Branca' => 'Santa Branca', 'Santa Clara d&#39;Oeste' => 'Santa Clara d&#39;Oeste', 'Santa Cruz da Conceição' => 'Santa Cruz da Conceição', 'Santa Cruz da Esperança' => 'Santa Cruz da Esperança', 'Santa Cruz das Palmeiras' => 'Santa Cruz das Palmeiras', 'Santa Cruz do Rio Pardo' => 'Santa Cruz do Rio Pardo', 'Santa Ernestina' => 'Santa Ernestina', 'Santa Fé do Sul' => 'Santa Fé do Sul', 'Santa Gertrudes' => 'Santa Gertrudes', 'Santa Isabel' => 'Santa Isabel', 'Santa Lúcia' => 'Santa Lúcia', 'Santa Maria da Serra' => 'Santa Maria da Serra', 'Santa Mercedes' => 'Santa Mercedes', 'Santa Rita do Passa Quatro' => 'Santa Rita do Passa Quatro', 'Santa Rita d&#39;Oeste' => 'Santa Rita d&#39;Oeste', 'Santa Rosa do Viterbo' => 'Santa Rosa do Viterbo', 'Santa Salete' => 'Santa Salete', 'Santana da Ponte Pensa' => 'Santana da Ponte Pensa', 'Santana de Parnaíba' => 'Santana de Parnaíba', 'Santo Anastácio' => 'Santo Anastácio', 'Santo André' => 'Santo André', 'Santo Antônio da Alegria' => 'Santo Antônio da Alegria', 'Santo Antônio da Posse' => 'Santo Antônio da Posse', 'Santo Antônio do Aracanguá' => 'Santo Antônio do Aracanguá', 'Santo Antônio do Jardim' => 'Santo Antônio do Jardim', 'Santo Antônio do Pinhal' => 'Santo Antônio do Pinhal', 'Santo Expedito' => 'Santo Expedito', 'Santópolis do Aguapeí' => 'Santópolis do Aguapeí', 'Santos' => 'Santos', 'São Bento do Sapucaí' => 'São Bento do Sapucaí', 'São Bernardo do Campo' => 'São Bernardo do Campo', 'São Caetano do Sul' => 'São Caetano do Sul', 'SÃO CARLOS' => 'SÃO CARLOS', 'São Francisco' => 'São Francisco', 'SÃO JOÃO DA BOA VISTA' => 'SÃO JOÃO DA BOA VISTA', 'São João das Duas Pontes' => 'São João das Duas Pontes', 'São João de Iracema' => 'São João de Iracema', 'São João do Pau d&#39;Alho' => 'São João do Pau d&#39;Alho', 'SÃO JOAQUIM DA BARRA' => 'SÃO JOAQUIM DA BARRA', 'São José da Bela Vista' => 'São José da Bela Vista', 'São José do Barreiro' => 'São José do Barreiro', 'São José do Rio Pardo' => 'São José do Rio Pardo', 'SÃO JOSÉ DO RIO PRETO' => 'SÃO JOSÉ DO RIO PRETO', 'SÃO JOSÉ DOS CAMPOS' => 'SÃO JOSÉ DOS CAMPOS', 'São Lourenço da Serra' => 'São Lourenço da Serra', 'São Luís do Paraitinga' => 'São Luís do Paraitinga', 'São Manuel' => 'São Manuel', 'São Miguel Arcanjo' => 'São Miguel Arcanjo', 'SÃO PAULO' => 'SÃO PAULO', 'São Pedro' => 'São Pedro', 'São Pedro do Turvo' => 'São Pedro do Turvo', 'São Roque' => 'São Roque', 'São Sebastião' => 'São Sebastião', 'São Sebastião da Grama' => 'São Sebastião da Grama', 'São Simão' => 'São Simão', 'São Vicente' => 'São Vicente', 'Sarapuí' => 'Sarapuí', 'Sarutaiá' => 'Sarutaiá', 'Sebastianópolis do Sul' => 'Sebastianópolis do Sul', 'Serra Azul' => 'Serra Azul', 'Serra Negra' => 'Serra Negra', 'Serrana' => 'Serrana', 'Sertãozinho' => 'Sertãozinho', 'Sete Barras' => 'Sete Barras', 'Severínia' => 'Severínia', 'Silveiras' => 'Silveiras', 'Socorro' => 'Socorro', 'SOROCABA' => 'SOROCABA', 'Sud Mennucci' => 'Sud Mennucci', 'Sumaré' => 'Sumaré', 'Suzanápolis' => 'Suzanápolis', 'Suzano' => 'Suzano', 'Tabapuã' => 'Tabapuã', 'Tabatinga' => 'Tabatinga', 'Taboão da Serra' => 'Taboão da Serra', 'Taciba' => 'Taciba', 'Taguaí' => 'Taguaí', 'Taiaçu' => 'Taiaçu', 'Taiúva' => 'Taiúva', 'Tambaú' => 'Tambaú', 'Tanabi' => 'Tanabi', 'Tapiraí' => 'Tapiraí', 'Tapiratiba' => 'Tapiratiba', 'Taquaral' => 'Taquaral', 'Taquaritinga' => 'Taquaritinga', 'Taquarituba' => 'Taquarituba', 'Taquarivaí' => 'Taquarivaí', 'Tarabai' => 'Tarabai', 'Tarumã' => 'Tarumã', 'TATUÍ' => 'TATUÍ', 'Taubaté' => 'Taubaté', 'Tejupá' => 'Tejupá', 'Teodoro Sampaio' => 'Teodoro Sampaio', 'Terra Roxa' => 'Terra Roxa', 'Tietê' => 'Tietê', 'Timburi' => 'Timburi', 'Torre de Pedra' => 'Torre de Pedra', 'Torrinha' => 'Torrinha', 'Trabijú' => 'Trabijú', 'Tremembé' => 'Tremembé', 'Três Fronteiras' => 'Três Fronteiras', 'Tuiuti' => 'Tuiuti', 'TUPÃ' => 'TUPÃ', 'Tupi Paulista' => 'Tupi Paulista', 'Turiúba' => 'Turiúba', 'Turmalina' => 'Turmalina', 'Ubarana' => 'Ubarana', 'Ubatuba' => 'Ubatuba', 'Ubirajara' => 'Ubirajara', 'Uchoa' => 'Uchoa', 'União Paulista' => 'União Paulista', 'Urânia' => 'Urânia', 'Uru' => 'Uru', 'Urupês' => 'Urupês', 'Valentim Gentil' => 'Valentim Gentil', 'Valinhos' => 'Valinhos', 'Valparaíso' => 'Valparaíso', 'Vargem' => 'Vargem', 'Vargem Grande do Sul' => 'Vargem Grande do Sul', 'Vargem Grande Paulista' => 'Vargem Grande Paulista', 'Várzea Paulista' => 'Várzea Paulista', 'Vera Cruz' => 'Vera Cruz', 'Vinhedo' => 'Vinhedo', 'Viradouro' => 'Viradouro', 'Vista Alegre do Alto' => 'Vista Alegre do Alto', 'Vitória Brasil' => 'Vitória Brasil', 'Votorantim' => 'Votorantim', 'VOTUPORANGA' => 'VOTUPORANGA', 'Zacarias' => 'Zacarias');
        echo form_dropdown('cidade', $cidades, set_value("cidade",$unidade['nm_cidade']), array("class" => "form-control", "id" => "cidades"));
        echo form_error("cidade");
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("UF", "uf", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-1'>";
        echo form_dropdown('uf', 'SP', set_value("uf",$unidade['UF_estado']), array("class" => "form-control"));
        echo form_error("uf");
        echo "</div>";
        echo "<div class='col-md-1'>";
        echo "</div>";
        echo form_label("Telefone da Unidade", "telefone", array("class" => "col-md-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_input(array("name" => "telefone", "value" => set_value("tel",$unidade['cd_telefone']), "id" => "telefone", "class" => "form-control phone-mask", "maxlength" => "15"));
        echo form_error("telefone");
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='form-group'>";
        echo "<div class='col-md-offset-2 col-md-10'>";
        echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
        echo "        ";
        echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo form_close();
    }
?>