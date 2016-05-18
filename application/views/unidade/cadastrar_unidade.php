<?php
echo form_fieldset("<h1>Cadastro de Unidade</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('unidade/cadastrarUnidade', $atributos);

echo "<div class='form-group'>";
echo form_label("Nome da Unidade", "nm_unidade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "nm_unidade", "value" => set_value("nm_unidade",""), "id" => "nm_unidade" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("nm_unidade");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cd_cpsouza", "value" => set_value("cd_cpsouza",""), "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("cd_cpsouza");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Endereço", "endereco", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "endereco", "value" => set_value("endereco",""), "id" => "endereco" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("endereco");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Número", "numero", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "numero", "value" => set_value("numero",""), "type"=> "number", "id" => "numero" ,"class" => "form-control", "maxlength" => "10"));
echo form_error("numero");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Complemento", "complemento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "complemento", "value" => set_value("complemento",""), "id" => "complemento" ,"class" => "form-control", "maxlength" => "40"));
echo form_error("complemento");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Bairro", "bairro", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "bairro", "value" => set_value("bairro",""), "id" => "bairro" ,"class" => "form-control", "maxlength" => "80"));
echo form_error("bairro");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("CEP", "cep", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cep", "value" => set_value("cep",""), "id" => "cep" ,"class" => "form-control cep", "maxlength" => "80"));
echo form_error("cep");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("UF", "uf", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
$opcao = array('AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MT' => 'MT', 'MS' => 'MS', 'MG' => 'MG', 'PR' => 'PR', 'PB' => 'PB', 'PA' => 'PA', 'PE' => 'PE', 'PI' => 'PI', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'RO' => 'RO', 'RR' => 'RR', 'SC' => 'SC', 'SE' => 'SE', 'SP' => 'SP', 'TO' => 'TO');
echo form_dropdown('uf', $opcao, 'SP', array("class" => "form-control"));
echo form_error("uf");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Cidade", "cidade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
//echo form_input(array("name" => "cidade", "value" => set_value("cidade",""), "id" => "cidade" ,"class" => "form-control", "maxlength" => "80"));

?>

<select name="cidade" class="form-control">

    <option>Adamantina</option><option>Adolfo</option>
    <option>Aguaí</option><option>Águas da
        Prata</option><option>Águas de
        Lindóia</option><option>Águas de
        Santa Barbara</option><option>Águas de
        São Pedro</option><option>Agudos</option><option>Alambari</option><option>Alfredo
        Marcondes</option><option>Altair</option><option>Altinópolis</option><option>Alto
        Alegre</option><option>Alumínio</option><option>Álvares
        Florence</option><option>Álvares
        Machado</option><option>Álvaro
        de Carvalho</option><option>Alvinlândia</option><option>Americana</option><option>Américo
        Brasiliense</option><option>Américo
        de Campos</option><option>AMPARO</option><option>Analândia</option><option>ANDRADINA</option><option>Angatuba</option><option>Anhembi</option><option>Anhumas</option><option>Aparecida</option><option>Aparecida
        d'Oeste</option><option>Apiaí</option><option>Araçariguama</option><option>ARAÇATUBA</option><option>Araçoiaba
        da Serra</option><option>Aramina</option><option>Arandu</option><option>Arapeí</option><option>ARARAQUARA</option><option>Araras</option><option>Arco-Íris</option><option>Arealva</option><option>Areias</option><option>Areiópolis</option><option>Ariranha</option><option>Artur
        Nogueira</option><option>Arujá</option><option>Aspásia</option><option>ASSIS</option><option>Atibaia</option><option>AURIFLAMA</option><option>Avaí</option><option>Avanhandava</option><option>AVARÉ</option><option>Bady
        Bassitt</option><option>Balbinos</option><option>Bálsamo</option><option>BANANAL</option><option>Barão de
        Antonina</option><option>Barbosa</option><option>Bariri</option><option>Barra
        Bonita</option><option>Barra do
        Chapéu</option><option>Barra do
        Turvo</option><option>BARRETOS</option><option>Barrinha</option><option>Barueri</option><option>Bastos</option><option>BATATAIS</option><option>BAURU</option><option>Bebedouro</option><option>Bento de
        Abreu</option><option>Bernardino
        de Campos</option><option>Bertioga</option><option>Bilac</option><option>BIRIGUI</option><option>Biritiba-Mirim</option><option>Boa
        Esperança do Sul</option><option>Bocaina</option><option>Bofete</option><option>Boituva</option><option>Bom
        Jesus dos Perdões</option><option>Bom
        Sucesso de Itararé</option><option>Borá</option><option>Boracéia</option><option>Borborema</option><option>Borebi</option><option>BOTUCATU</option><option>BRAGANÇA
        PAULISTA</option><option>Braúna</option><option>Brejo
        Alegre</option><option>Brodowski</option><option>Brotas</option><option>Buri</option><option>Buritama</option><option>Buritizal</option><option>Cabrália
        Paulista</option><option>Cabreúva</option><option>Caçapava</option><option>Cachoeira
        Paulista</option><option>Caconde</option><option>Cafelândia</option><option>Caiabu</option><option>Caieiras</option><option>Caiuá</option><option>Cajamar</option><option>Cajati</option><option>Cajobi</option><option>Cajuru</option><option>Campina
        de Monte Alegre</option><option>CAMPINAS</option><option>Campo
        Limpo Paulista</option><option>CAMPOS
        DO JORDÃO</option><option>Campos
        Novos Paulista</option><option>Cananéia</option><option>Canas</option><option>Cândido
        Mota</option><option>Cândido
        Rodrigues</option><option>Canitar</option><option>CAPÃO
        BONITO</option><option>Capela
        do Alto</option><option>Capivari</option><option>CARAGUATATUBA</option><option>Carapicuíba</option><option>Cardoso</option><option>Casa
        Branca</option><option>Cássia
        dos Coqueiros</option><option>Castilho</option><option>CATANDUVA</option><option>Catiguá</option><option>Cedral</option><option>Cerqueira
        César</option><option>Cerquilho</option><option>Cesário
        Lange</option><option>Charqueada</option><option>Chavantes</option><option>Clementina</option><option>Colina</option><option>Colômbia</option><option>Conchal</option><option>Conchas</option><option>Cordeirópolis</option><option>Coroados</option><option>Coronel
        Macedo</option><option>Corumbataí</option><option>Cosmópolis</option><option>Cosmorama</option><option>Cotia</option><option>Cravinhos</option><option>Cristais
        Paulista</option><option>Cruzália</option><option>Cruzeiro</option><option>Cubatão</option><option>Cunha</option><option>Descalvado</option><option>Diadema</option><option>Dirce
        Reis</option><option>Divinolândia</option><option>Dobrada</option><option>Dois
        Córregos</option><option>Dolcinópolis</option><option>Dourado</option><option>DRACENA</option><option>Duartina</option><option>Dumont</option><option>Echaporã</option><option>Eldorado</option><option>Elias
        Fausto</option><option>Elisiário</option><option>Embaúba</option><option>Embu</option><option>Embu-Guaçu</option><option>Emilianópolis</option><option>Engenheiro
        Coelho</option><option>Espírito
        Santo do Pinhal</option><option>Espírito
        Santo do Turvo</option><option>Estiva
        Gerbi</option><option>Estrela
        do Norte</option><option>Estrela
        d'Oeste</option><option>Euclides
        da Cunha Paulista</option><option>Fartura</option><option>Fernando
        Prestes</option><option>FERNANDÓPOLIS</option><option>Fernão</option><option>Ferraz
        de Vasconcelos</option><option>Flora
        Rica</option><option>Floreal</option><option>Flórida
        Paulista</option><option>Florínia</option><option>FRANCA</option><option>Francisco
        Morato</option><option>FRANCO
        DA ROCHA</option><option>Gabriel
        Monteiro</option><option>Gália</option><option>Garça</option><option>Gastão
        Vidigal</option><option>Gavião
        Peixoto</option><option>General
        Salgado</option><option>Getulina</option><option>Glicério</option><option>Guaiçara</option><option>Guaimbê</option><option>Guaíra</option><option>Guapiaçu</option><option>Guapiara</option><option>Guará</option><option>Guaraçaí</option><option>Guaraci</option><option>Guarani
        d'Oeste</option><option>Guarantã</option><option>Guararapes</option><option>Guararema</option><option>GUARATINGUETÁ</option><option>Guareí</option><option>Guariba</option><option>Guarujá</option><option>GUARULHOS</option><option>Guatapará</option><option>Guzolândia</option><option>Herculândia</option><option>Holambra</option><option>Hortolândia</option><option>Iacanga</option><option>Iacri</option><option>Iaras</option><option>Ibaté</option><option>Ibirá</option><option>Ibirarema</option><option>Ibitinga</option><option>Ibiúna</option><option>Icém</option><option>Iepê</option><option>Igaraçu
        do Tietê</option><option>Igarapava</option><option>Igaratá</option><option>Iguape</option><option>Ilha
        Comprida</option><option>Ilha
        Solteira</option><option>Ilhabela</option><option>Indaiatuba</option><option>Indiana</option><option>Indiaporã</option><option>Inúbia
        Paulista</option><option>Ipaussu</option><option>Iperó</option><option>Ipeúna</option><option>Ipiguá</option><option>Iporanga</option><option>Ipuã</option><option>Iracemápolis</option><option>Irapuã</option><option>Irapuru</option><option>Itaberá</option><option>Itaí</option><option>Itajobi</option><option>Itaju</option><option>ITANHAÉM</option><option>Itaóca</option><option>ITAPECERICA
        DA SERRA</option><option>ITAPETININGA</option><option>ITAPEVA</option><option>Itapevi</option><option>Itapira</option><option>Itapirapuã
        Paulista</option><option>Itápolis</option><option>Itaporanga</option><option>Itapuí</option><option>Itapura</option><option>Itaquaquecetuba</option><option>Itararé</option><option>Itariri</option><option>Itatiba</option><option>Itatinga</option><option>Itirapina</option><option>Itirapuã</option><option>Itobi</option><option>Itu</option><option>Itupeva</option><option>ITUVERAVA</option><option>Jaborandi</option><option>JABOTICABAL</option><option>Jacareí</option><option>Jaci</option><option>Jacupiranga</option><option>Jaguariúna</option><option>JALES</option><option>Jambeiro</option><option>Jandira</option><option>Jardinópolis</option><option>Jarinu</option><option>JAÚ</option><option>Jeriquara</option><option>Joanópolis</option><option>João
        Ramalho</option><option>José
        Bonifácio</option><option>Júlio
        Mesquita</option><option>Jumirim</option><option>JUNDIAÍ</option><option>Junqueirópolis</option><option>Juquiá</option><option>Juquitiba</option><option>Lagoinha</option><option>Laranjal
        Paulista</option><option>Lavínia</option><option>Lavrinhas</option><option>Leme</option><option>Lençóis
        Paulista</option><option>LIMEIRA</option><option>Lindóia</option><option>LINS</option><option>Lorena</option><option>Lourdes</option><option>Louveira</option><option>Lucélia</option><option>Lucianópolis</option><option>Luís
        Antônio</option><option>Luiziânia</option><option>Lupércio</option><option>Lutécia</option><option>Macatuba</option><option>Macaubal</option><option>Macedônia</option><option>Magda</option><option>Mairinque</option><option>Mairiporã</option><option>Manduri</option><option>Marabá
        Paulista</option><option>Maracaí</option><option>Marapoama</option><option>Mariápolis</option><option>MARÍLIA</option><option>Marinópolis</option><option>Martinópolis</option><option>Matão</option><option>Mauá</option><option>Mendonça</option><option>Meridiano</option><option>Mesópolis</option><option>Miguelópolis</option><option>Mineiros
        do Tietê</option><option>Mira
        Estrela</option><option>Miracatu</option><option>Mirandópolis</option><option>Mirante
        do Paranapanema</option><option>Mirassol</option><option>Mirassolândia</option><option>Mococa</option><option>MOGI DAS
        CRUZES</option><option>Mogi
        Guaçu</option><option>MOGI-MIRIM</option><option>Mombuca</option><option>Monções</option><option>Mongaguá</option><option>Monte
        Alegre do Sul</option><option>Monte
        Alto</option><option>Monte
        Aprazível</option><option>Monte
        Azul Paulista</option><option>Monte
        Castelo</option><option>Monte
        Mor</option><option>Monteiro
        Lobato</option><option>Morro
        Agudo</option><option>Morungaba</option><option>Motuca</option><option>Murutinga
        do Sul</option><option>Nantes</option><option>Narandiba</option><option>Natividade
        da Serra</option><option>Nazaré
        Paulista</option><option>Neves
        Paulista</option><option>NHANDEARA</option><option>Nipoã</option><option>Nova
        Aliança</option><option>Nova
        Campina</option><option>Nova
        Canaã Paulista</option><option>Nova
        Castilho</option><option>Nova
        Europa</option><option>Nova
        Granada</option><option>Nova
        Guataporanga</option><option>Nova
        Independência</option><option>Nova
        Luzitânia</option><option>Nova
        Odessa</option><option>Novais</option><option>NOVO
        HORIZONTE</option><option>Nuporanga</option><option>Ocauçu</option><option>Óleo</option><option>Olímpia</option><option>Onda
        Verde</option><option>Oriente</option><option>Orindiúva</option><option>Orlândia</option><option>OSASCO</option><option>Oscar
        Bressane</option><option>Osvaldo
        Cruz</option><option>OURINHOS</option><option>Ouro
        Verde</option><option>Ouroeste</option><option>Pacaembu</option><option>Pedrinhas
        Paulista</option><option>Palestina</option><option>Palmares
        Paulista</option><option>Palmeira
        d'Oeste</option><option>Palmital</option><option>Panorama</option><option>Paraguaçu
        Paulista</option><option>PARAIBUNA</option><option>Paraíso</option><option>Paranapanema</option><option>Paranapuã</option><option>Parapuã</option><option>Pardinho</option><option>Pariquera
        Açú</option><option>Parisi</option><option>Patrocínio
        Paulista</option><option>Paulicéia</option><option>Paulínia</option><option>Paulistânia</option><option>Paulo de
        Faria</option><option>Pederneiras</option><option>Pedra
        Bela</option><option>Pedranópolis</option><option>Pedregulho</option><option>Pedreira</option><option>Pedro de
        Toledo</option><option>Penápolis</option><option>Pereira
        Barreto</option><option>Pereiras</option><option>Peruíbe</option><option>Piacatu</option><option>PIEDADE</option><option>Pilar do
        Sul</option><option>Pindamonhangaba</option><option>Pindorama</option><option>Pinhalzinho</option><option>Piquerobi</option><option>Piquete</option><option>Piracaia</option><option>PIRACICABA</option><option>Piraju</option><option>Pirajuí</option><option>Pirangi</option><option>Pirapora
        do Bom Jesus</option><option>Pirapozinho</option><option>PIRASSUNUNGA</option><option>Piratininga</option><option>Pitangueiras</option><option>Planalto</option><option>Platina</option><option>Poá</option><option>Poloni</option><option>Pompéia</option><option>Pongaí</option><option>Pontal</option><option>Pontalinda</option><option>Pontes
        Gestal</option><option>Populina</option><option>Porangaba</option><option>Porto
        Feliz</option><option>Porto
        Ferreira</option><option>Potim</option><option>Potirendaba</option><option>Pracinha</option><option>Pradópolis</option><option>Praia
        Grande</option><option>Pratânia</option><option>Presidente
        Alves</option><option>Presidente
        Bernardes</option><option>Presidente
        Epitácio</option><option>PRESIDENTE
        PRUDENTE</option><option>Presidente
        Venceslau</option><option>Promissão</option><option>Quadra</option><option>Quatá</option><option>Queiroz</option><option>Queluz</option><option>Quintana</option><option>Rafard</option><option>Rancharia</option><option>Redenção
        da Serra</option><option>Regente
        Feijó</option><option>Reginópolis</option><option>REGISTRO</option><option>Restinga</option><option>Ribeira</option><option>Ribeirão
        Bonito</option><option>Ribeirão
        Branco</option><option>Ribeirão
        Corrente</option><option>Ribeirão
        do Sul</option><option>Ribeirão
        dos Índios</option><option>Ribeirão
        Grande</option><option>Ribeirão
        Pires</option><option>RIBEIRÃO
        PRETO</option><option>Rifaina</option><option>Rincão</option><option>Rinópolis</option><option>RIO
        CLARO</option><option>Rio das
        Pedras</option><option>Rio
        Grande da Serra</option><option>Riolândia</option><option>Riversul</option><option>Rosana</option><option>Roseira</option><option>Rubiácea</option><option>Rubinéia</option><option>Sabino</option><option>Sagres</option><option>Sales</option><option>Sales
        Oliveira</option><option>Salesópolis</option><option>Salmourão</option><option>Saltinho</option><option>Salto</option><option>Salto de
        Pirapora</option><option>Salto
        Grande</option><option>Sandovalina</option><option>Santa
        Adélia</option><option>Santa
        Albertina</option><option>Santa
        Bárbara d'Oeste</option><option>Santa
        Branca</option><option>Santa
        Clara d'Oeste</option><option>Santa
        Cruz da Conceição</option><option>Santa
        Cruz da Esperança</option><option>Santa
        Cruz das Palmeiras</option><option>Santa
        Cruz do Rio Pardo</option><option>Santa
        Ernestina</option><option>Santa Fé
        do Sul</option><option>Santa
        Gertrudes</option><option>Santa
        Isabel</option><option>Santa
        Lúcia</option><option>Santa
        Maria da Serra</option><option>Santa
        Mercedes</option><option>Santa
        Rita do Passa Quatro</option><option>Santa
        Rita d'Oeste</option><option>Santa
        Rosa do Viterbo</option><option>Santa
        Salete</option><option>Santana
        da Ponte Pensa</option><option>Santana
        de Parnaíba</option><option>Santo
        Anastácio</option><option>Santo
        André</option><option>Santo
        Antônio da Alegria</option><option>Santo
        Antônio da Posse</option><option>Santo
        Antônio do Aracanguá</option><option>Santo
        Antônio do Jardim</option><option>Santo
        Antônio do Pinhal</option><option>Santo
        Expedito</option><option>Santópolis
        do Aguapeí</option><option>SANTOS</option><option>São
        Bento do Sapucaí</option><option>São
        Bernardo do Campo</option><option>São
        Caetano do Sul</option><option>SÃO
        CARLOS</option><option>São
        Francisco</option><option>SÃO JOÃO
        DA BOA VISTA</option><option>São João
        das Duas Pontes</option><option>São João
        de Iracema</option><option>São João
        do Pau d'Alho</option><option>SÃO
        JOAQUIM DA BARRA</option><option>São José
        da Bela Vista</option><option>São José
        do Barreiro</option><option>São José
        do Rio Pardo</option><option>SÃO JOSÉ
        DO RIO PRETO</option><option>SÃO JOSÉ
        DOS CAMPOS</option><option>São
        Lourenço da Serra</option><option>São Luís
        do Paraitinga</option><option>São
        Manuel</option><option>São
        Miguel Arcanjo</option><option>SÃO
        PAULO</option><option>São
        Pedro</option><option>São
        Pedro do Turvo</option><option>São
        Roque</option><option>São
        Sebastião</option><option>São
        Sebastião da Grama</option><option>São
        Simão</option><option>São
        Vicente</option><option>Sarapuí</option><option>Sarutaiá</option><option>Sebastianópolis
        do Sul</option><option>Serra
        Azul</option><option>Serra
        Negra</option><option>Serrana</option><option>Sertãozinho</option><option>Sete
        Barras</option><option>Severínia</option><option>Silveiras</option><option>Socorro</option><option>SOROCABA</option><option>Sud
        Mennucci</option><option>Sumaré</option><option>Suzanápolis</option><option>Suzano</option><option>Tabapuã</option><option>Tabatinga</option><option>Taboão
        da Serra</option><option>Taciba</option><option>Taguaí</option><option>Taiaçu</option><option>Taiúva</option><option>Tambaú</option><option>Tanabi</option><option>Tapiraí</option><option>Tapiratiba</option><option>Taquaral</option><option>Taquaritinga</option><option>Taquarituba</option><option>Taquarivaí</option><option>Tarabai</option><option>Tarumã</option><option>TATUÍ</option><option>Taubaté</option><option>Tejupá</option><option>Teodoro
        Sampaio</option><option>Terra
        Roxa</option><option>Tietê</option><option>Timburi</option><option>Torre de
        Pedra</option><option>Torrinha</option><option>Trabijú</option><option>Tremembé</option><option>Três
        Fronteiras</option><option>Tuiuti</option><option>TUPÃ</option><option>Tupi
        Paulista</option><option>Turiúba</option><option>Turmalina</option><option>Ubarana</option><option>Ubatuba</option><option>Ubirajara</option><option>Uchoa</option><option>União
        Paulista</option><option>Urânia</option><option>Uru</option><option>Urupês</option><option>Valentim
        Gentil</option><option>Valinhos</option><option>Valparaíso</option><option>Vargem</option><option>Vargem
        Grande do Sul</option><option>Vargem
        Grande Paulista</option><option>Várzea
        Paulista</option><option>Vera
        Cruz</option><option>Vinhedo</option><option>Viradouro</option><option>Vista
        Alegre do Alto</option><option>Vitória
        Brasil</option><option>Votorantim</option><option>VOTUPORANGA</option><option>Zacarias</option>

</select>
<?php
echo form_error("cidade");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Telefone da Unidade", "tel", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "telefone", "value" => set_value("telefone",""), "id" => "tel" ,"class" => "form-control phone-mask", "maxlength" => "80"));
echo form_error("telefone");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>
