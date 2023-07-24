<?php

//Host vouchertec = 179.188.16.134 

function conectar_pgsql($banco, $host = "179.188.16.134"){
    if($banco == "Licencas"){
		$dbname = "licencas_site";
    $user = "licencas_site";
    $password = "Montenegro#19";
    $pg_options = "--client_encoding=UTF8";
	}else if($banco == "Roteiros"){
		$dbname = "roteiros_site";
    $user = "roteiros_site";
    $password = "Montenegro#19";
    $pg_options = "--client_encoding=UTF8";
	}else{
		$dbname = "cms_sites";
    $user = "cms_sites";
    $password = "Montenegro#19";
    $pg_options = "--client_encoding=UTF8";
	}
    $host = $host;
    $port = "5432";
    

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
 
    try{
        // create a PostgreSQL database connection
        $conn = new PDO($dsn);
        
        return $conn;
    }catch (PDOException $e){
     // report error message
     echo $e->getMessage();
    }
}


function connectDBLocalUbuntuHomolog(){
    $hostHomoloh = "montenegroev_Assistente360New2.sqlserver.dbaas.com.br";
    $dataBaseHomolog = "montenegroev_Assistente360New2";
    $userNameHomolog = "montenegroev_Assistente360New2";
    $passwordHomolog = "Assistente360#2021";
    $userHost = 'montenegroev_Assistente360New2.sqlserver.dbaas.com.br';
    try
    {
        // Conexao com banco Sql Server
        $conn = new PDO( "dblib:host=".$userHost."; dbname=".$dataBaseHomolog, $userNameHomolog, $passwordHomolog);
        //$conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_SYSTEM);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch ( PDOException $e )
    {
        // Caso ocorra uma exceção, exibe na tela
        return connectDBLocalWindowsHomolog();
    }
}
function connectDBHomolog(){
    $hostHomoloh = "montenegroev_Assistente360New2.sqlserver.dbaas.com.br";
    $dataBaseHomolog = "montenegroev_Assistente360New2";
    $userNameHomolog = "montenegroev_Assistente360New2";
    $passwordHomolog = "Assistente360#2021";
    $userHost = 'montenegroev_Assistente360New2.sqlserver.dbaas.com.br';
    try
    {
        // Conexao com banco Sql Server
        $conn = new PDO( "dblib:host=".$userHost."; dbname=".$dataBaseHomolog, $userNameHomolog, $passwordHomolog);
        //$conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_SYSTEM);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch ( PDOException $e )
    {
      // Caso ocorra uma exceção, exibe na tela
        return connectDBLocalUbuntuHomolog();
    }
}
function connectDBLocalWindowsHomolog(){
    $hostHomoloh = "montenegroev_Assistente360New2.sqlserver.dbaas.com.br";
    $dataBaseHomolog = "montenegroev_Assistente360New2";
    $userNameHomolog = "montenegroev_Assistente360New2";
    $passwordHomolog = "Assistente360#2021";
    $userHost = 'montenegroev_Assistente360New2.sqlserver.dbaas.com.br';
    try
    {
        // Conexao com banco Sql Server
        $conn = new PDO( "sqlsrv:Server=".$userHost."; Database=".$dataBaseHomolog, $userNameHomolog, $passwordHomolog);
        $conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_SYSTEM);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch ( PDOException $e )
    {
        // Caso ocorra uma exceção, exibe na tela
        echo $e->getMessage();
    }
}

function get_config_modelo($dominio){
  $url = str_replace("www.", "", 'soberanotours.com.br'); 

  try{
        $con = conectar_pgsql('Licencas', '179.188.16.134');
        $stmt = $con->prepare("SELECT DISTINCT E.favicon, C.cx_search, B.exibir_search, B.exibir_motor, B.exibir_decolar, B.exibir_rf, B.exibir_moedas, B.exibir_fatura, B.estilo_menu, B.estilo_rodape, B.estilo_roteiros, A.id_usuario, A.cpf_cnpj, C.status, B.id_modelo, B.hex1, B.hex2, B.hex3, B.hex4, B.hex5, B.hex6, B.modelocss, C.cpf_cnpj, C.url, C.iugu_subscription_id, E.fantasia, E.logo, E.logo_destaque, B.exibir_eventos,
                              E.rua, E.numero, E.cidade, E.email as emailcontato, E.complemento, E.bairro, E.estado, E.cep, E.telefone, E.celular_contato, F.email,
                              B.exibir_aereo, B.exibir_hoteis, B.exibir_campanhas, B.tamanho_banner, B.exibir_veiculos, B.exibir_roteiros, B.exibir_principal, B.exibir_servicos, B.exibir_roteiros, B.exibir_pacotes, B.exibir_selfbooking, B.exibir_galeria
                              , B.exibir_parallax, B.exibir_faixa_contato, B.exibir_popup, B.exibir_condgerais, B.exibir_dirconsumidor, B.exibir_cnpj, B.manutencao, B.exibir_news, B.exibir_sobrenos, B.exibir_contato, E.mais_contatos, E.latitude, E.longitude, B.tipo_servicos, B.tipo_galeria, B.exibir_destaque_aereo, B.exibir_destaque_hoteis, B.exibir_destaque_veiculos, E.loja_chave_wooba, E.loja_url_wooba, E.exibir_endereco, E.exibicao_fantasia, E.altura_logo, E.tipo_email, E.email_envio, B.ordenacao_roteiros, B.exibir_login, B.ordenacao_servicos, B.ordenacao_banner, B.ordenacao_pacotes, B.ordenacao_galeria, B.ordenacao_self, B.exibir_cookies, B.exibir_privacidade, B.exibir_condicoes, B.exibir_direitos, B.texto_cookies, B.texto_privacidade, B.texto_condicoes, E.client_id, E.trend_username, B.selecao_fornecedor_aereo, B.selecao_fornecedor_hoteis, B.selecao_fornecedor_veiculos, G.botoes_roteiro, G.cor_botao_roteiro, G.fundo_roteiro, G.fundo_interno_roteiro
                              FROM Usuarios A
                              INNER JOIN ModeloLicenca B ON A.cpf_cnpj = B.cpf_cnpj
                              INNER JOIN Licencas C ON C.cpf_cnpj = A.cpf_cnpj
                              INNER JOIN Contato E ON E.cpf_cnpj = C.cpf_cnpj
                              INNER JOIN Usuarios F ON F.cpf_cnpj = E.cpf_cnpj  
                        INNER JOIN estilomodulo G ON A.cpf_cnpj = G.cpf_cnpj
                              WHERE C.url LIKE '%$url%' AND A.tipo = 1");
        if($stmt->execute()){
            if($stmt->rowcount() != 0){
              $dados = $stmt->fetch(PDO::FETCH_OBJ);

              $diretorio = get_diretorio_cms($dados->id_modelo);
              $sobre_nos = get_sobre_nos($dados->cpf_cnpj);
              $redes_sociais = get_redes_sociais($dados->cpf_cnpj);
              $seo = get_seo($dados->cpf_cnpj); 
              $email_homolog = verificarLicenca($dados->emailcontato);
              $exibirNews = verificarNewsletter($email_homolog);

              define( "SELECAO_AEREO", $dados->selecao_fornecedor_aereo); 
              define( "SELECAO_HOTEL", $dados->selecao_fornecedor_hoteis);
              define( "SELECAO_CARRO", $dados->selecao_fornecedor_veiculos);

              define("BOTAOROTEIRO", $dados->botoes_roteiro); 
            define("CORROTEIRO", $dados->cor_botao_roteiro);
            define("FUNDOROTEIRO", $dados->fundo_interno_roteiro);

              define( "EXIBICAO_CNPJ", $dados->exibir_cnpj); 
              define( "EXIBIR_DESTAQUE_AEREO", $dados->exibir_destaque_aereo);
              define( "EXIBIR_POPUP", $dados->exibir_popup);
              define( "EXIBIR_DESTAQUE_HOTEIS", $dados->exibir_destaque_hoteis);
              define( "EXIBIR_DESTAQUE_VEICULOS", $dados->exibir_destaque_veiculos);
              define( "EXIBIR_LOGIN", $dados->exibir_login);
              define( "EXIBIR_ENDERECO", $dados->exibir_endereco);
              define( "EXIBICAO_FANTASIA", $dados->exibicao_fantasia);

              define( "FLYTOUR_CLIENT_ID", $dados->client_id);
              define( "TREND_USERNAME", $dados->trend_username);

              define( "ORDENACAO_ROTEIROS", $dados->ordenacao_roteiros);
              define( "ORDENACAO_SERVICOS", $dados->ordenacao_servicos);
              define( "ORDENACAO_BANNER", $dados->ordenacao_banner);
              define( "ORDENACAO_PACOTES", $dados->ordenacao_pacotes);
              define( "ORDENACAO_GALERIA", $dados->ordenacao_galeria);
              define( "ORDENACAO_SELF", $dados->ordenacao_self);

              define( "EXIBIR_COOKIES", $dados->exibir_cookies);
              define( "EXIBIR_PRIVACIDADE", $dados->exibir_privacidade);
              define( "EXIBIR_CONDICOES", $dados->exibir_condicoes);
              define( "EXIBIR_DIREITOS", $dados->exibir_direitos);
              define( "TEXTO_COOKIES", $dados->texto_cookies);
              define( "TEXTO_PRIVACIDADE", $dados->texto_privacidade);
              define( "TEXTO_CONDICOES", $dados->texto_condicoes);

              define( "TIPO_EMAIL", $dados->tipo_email);
              define( "EMAIL_ENVIO", $dados->email_envio);
              define( "ALTURA_LOGO", $dados->altura_logo);
              define( "CHAVE_WOOBA", $dados->loja_chave_wooba);
              define( "URL_WOOBA", $dados->loja_url_wooba);
              define( "MODELO", $diretorio);
              define( "MANUTENCAO", $dados->manutencao);
              define( "FAVICON", $dados->favicon);
              define( "LICENCA", $dados->cpf_cnpj);
              define( "LICENCIADOR", 1);
              define( "CX_SEARCH", $dados->cx_search);
              define( "FANTASIA", $dados->fantasia);
              define( "RAZAOSOCIAL", $dados->fantasia);
              define( "LOGO", $dados->logo);
              define( "DESTAQUELOGOTIPO", $dados->logo_destaque);
              define( "ENDERECO", $dados->rua.", ".$dados->numero);
              define( "COMPLEMENTO", $dados->complemento);
              define( "BAIRRO", $dados->bairro);
              define( "CIDADE", $dados->cidade);
              define( "ESTILO_MENU", $dados->estilo_menu);
              define( "ESTILO_RODAPE", $dados->estilo_rodape);
              define( "ESTILO_ROTEIROS", $dados->estilo_roteiros);
              define( "ESTADO", $dados->estado);
              define( "CEP", $dados->cep);
              define( "TELEFONE", $dados->telefone);
              define( "CELULAR", $dados->celular_contato);
              define( "EMAIL", $dados->emailcontato);
              define( "LICENCA_HOMOLOG", $email_homolog);
              define( "EXIBIRNEWS", $dados->exibir_news);
              define( "CSS", $dados->modelocss);
              define( "DIRETORIO", $dados->cpf_cnpj);
              define( "SOBREIMAGEM", $sobre_nos->imagem);
              define( "SOBRETEXTO",  $sobre_nos->texto);
              //define( "INFORMATIVO", $dados->Texto);              
              define( "MAISCONTATOS", $dados->mais_contatos);
              define("CNPJ", $dados->cpf_cnpj);
              define("StatusID", $dados->status);
              define("BANNERTAM", $dados->tamanho_banner);
              define("EXIBIRPRINCIPAL", $dados->exibir_principal); 
              define("EXIBIRBANNERMOTOR", $dados->exibir_decolar); 
              define("EXIBIRDESTAQUEAEREO", $dados->exibir_aereo); 
              define("EXIBIRDESTAQUEHOTEL", $dados->exibir_hoteis); 
              define("EXIBIRDESTAQUEVEICULOS", $dados->exibir_veiculos); 
              define("EXIBIRSERVICOS", $dados->exibir_servicos);
              define("TIPOSERVICOS", $dados->tipo_servicos);
              define("EXIBIRROTEIROS", $dados->exibir_roteiros);
              define("EXIBIRPACOTES", $dados->exibir_pacotes);
              define("EXIBIRINFORMATIVOS", $dados->exibir_campanhas);
              define("EXIBIRSELF", $dados->exibir_selfbooking);
              define("EXIBIRGALERIA", $dados->exibir_galeria);
              define("EXIBIRCONTATO", $dados->exibir_contato);
              define("TIPOGALERIA", $dados->tipo_galeria);
              define("EXIBIRPARALLAX", $dados->exibir_parallax);
              define("EXIBIRCONDGERAIS", $dados->exibir_condgerais);
              define("EXIBIRSOBRENOS", $dados->exibir_sobrenos);
              define("EXIBIRDIRCONSUMIDOR", $dados->exibir_dirconsumidor);
              define("EXIBIRCNPJ", $dados->exibir_cnpj); 
              define("EXIBIRFAIXACONTATO", $dados->exibir_faixa_contato); 
              define( "EXIBIRSEARCH", $dados->exibir_search);
              define( "EXIBIRRF", $dados->exibir_rf);
              define( "EXIBIRFATURA", $dados->exibir_fatura);
              define( "EXIBIRMOEDAS", $dados->exibir_moedas);
              define( "EXIBIRMOTORRESERVA", $dados->exibir_motor);
              define("NEWS", $dados->exibir_news);
              define("HEX1", $dados->hex1);
              define("HEX2", $dados->hex2);
              define("HEX3", $dados->hex3);
              define("HEX4", $dados->hex4);
              define("HEX5", $dados->hex5);
              define("HEX6", $dados->hex6);
              define("LATITUDE", $dados->latitude);
              define("LONGITUDE", $dados->longitude);
              $_SESSION['userLicenca'] = $dados->cpf_cnpj;
            }else{
              header('Location: traveltec.net');
            }
        }else{
            echo '2';
        }
    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}

function get_posicao_modulos(){ 
  $licenca = LICENCA;

  try{ 
    $con = conectar_pgsql('Licencas', '179.188.16.134');
    $stmt = $con->prepare("SELECT * FROM posicao_modulos WHERE cpf_cnpj = '$licenca'");    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);  
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function get_diretorio_cms($id){
  try{

    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT diretorio FROM site.modelos WHERE id_modelo = $id");    
    $stmt->execute();
    $dado = $stmt->fetch(PDO::FETCH_OBJ);

    return $dado->diretorio;

  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function get_sobre_nos($cpf_cnpj){
  try{

    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT texto, imagem FROM site.sobrenos WHERE cpf_cnpj = '$cpf_cnpj'");    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);

  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function get_redes_sociais($cpf_cnpj){
  try{

    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT facebook, twitter, instagram, blog, googleplus, flickr, linkedin, youtube, whatsapp, skype, googleplay, cadastur, appstore, facebookwidget, rss, exibir_whatsapp FROM site.redessociais WHERE cpf_cnpj = '$cpf_cnpj'");    
    
    if($stmt->execute()){
      $redes_sociais = $stmt->fetch(PDO::FETCH_OBJ);

      define( "FACEBOOK", trim($redes_sociais->facebook));
      define( "TWITTER", trim($redes_sociais->twitter));
      define( "INSTAGRAM", $redes_sociais->instagram);
      define( "BLOG", $redes_sociais->blog);
      define( "GOOGLEPLUS", $redes_sociais->googleplus);
      define( "FLICKR", $redes_sociais->flickr);
      define( "LINKEDIN", $redes_sociais->linkedin);
      define( "YOUTUBE", $redes_sociais->youtube);
      define( "WHATSAPP", $redes_sociais->whatsapp);
      define( "SKYPE", $redes_sociais->skype);
      define( "GOOGLEPLAY", $redes_sociais->googleplay);
      define( "APPSTORE", $redes_sociais->appstore);
      define( "CADASTUR", $redes_sociais->cadastur);
      define( "FACEBOOKWIDGET", $redes_sociais->facebookwidget);
      define( "RSS", $redes_sociais->rss);
      define( "EXIBICAOWHATSAPP", $redes_sociais->exibir_whatsapp);

    }

  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function get_seo($cpf_cnpj){
  try{

    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT analytics, metadesc, metakey, indexagem FROM site.seo WHERE cpf_cnpj = '$cpf_cnpj'");    
    $stmt->execute();
    $seo = $stmt->fetch(PDO::FETCH_OBJ);

      define("ANALYTICS", $seo->analytics);

      define("METADESCRIPTION", $seo->metadesc);

      define("METAKEYWORDS", $seo->metakey);

      define("NOINDEX", $seo->indexagem); 

  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function listarBannerMotor(){
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT TOP(3) id, cpf_cnpj, status, imagem, titulo, subtitulo, posicao, texto, link FROM site.banner WHERE status = '1' AND cpf_cnpj = :licenca AND localsite = '3' ORDER BY cadastro DESC");
    $licenca = LICENCA;
    $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function get_dados_popup(){
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT * FROM site.popup WHERE status = 1 AND cpf_cnpj = :licenca");
    $licenca = LICENCA;
    $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}


function getLicencaHomolog($dominio, $token, $id){
  $param = "";
  if($token != ""){
    $param = "OR licenca.Token = '".$token."' ";
  }else if($id != ""){
    $param = "OR licenca.cpf_cnpj = '".$id."' ";
  }else{
    $param = "";
  }
    try{
           $conn = conectar_pgsql('CMS');
           $stmt = $conn->prepare("SELECT licenca.cpf_cnpj, licenca.Diretorio, licenca.Logo, licenca.Dominio, licenca.ID_Licenciador, licenca.ID_Status,usu.VersaoSistema,
                                  modcms.Diretorio  as DiretorioCMS,modelo.modelocss,modelo.hex1,modelo.Hex2,modelo.Hex3,modelo.Hex4,modelo.Hex5,modelo.Hex6,empresa.Fantasia, empresa.RazaoSocial,empresa.CNPJ, contato.Endereco, contato.Numero, contato.Bairro, contato.Cidade,  contato.Estado, contato.Telefone, contato.Email, contato.CEP,contato.StatusSite, contato.StatusTel, informativo.texto, sobre.texto as SobreTexto,
                                  sobre.imagem as Sobreimagem, redes.Facebook, redes.Twitter, redes.Instagram, redes.Blog, redes.GooglePlus, redes.Flickr, redes.Linkedin,redes.Youtube,redes.WhatsApp,redes.Skype,redes.GooglePlay,redes.AppStore,redes.Cadastur, contato.Latitude,contato.MaisContatos, contato.Longitude, contato.Complemento, redes.FacebookWidget, redes.Rss, seo.Analytics, seo.MetaDesc, seo.MetaKey, ban.Conteudo, licenca.TamanhoBanner, licenca.ExibirRoteiros, licenca.ExibirServicos,licenca.ExibirPacotes,licenca.ExibirSelfBooking, licenca.ExibirGaleria,usu.nome,usu.Genero,licenca.ExibirNews, licenca.ExibirSobreNos,licenca.ExibirPrincipal,licenca.ExibirParallax,licenca.ExibirCondGerais,licenca.ExibirDirConsumidor,licenca.ExibirCNPJ, SUM(cred.AcessoSite) AS AcessoSite
                                  FROM Licencas.Licenca licenca
                                  LEFT JOIN Licencas.Empresa empresa ON licenca.cpf_cnpj = empresa.cpf_cnpj
                                  INNER JOIN CMS.ModeloLicenca modelo ON licenca.cpf_cnpj = modelo.cpf_cnpj
                                  INNER JOIN Usuarios.Usuario usu ON usu.cpf_cnpj = licenca.cpf_cnpj
                                  LEFT JOIN CMS.InformativoCentral informativo ON licenca.cpf_cnpj = informativo.cpf_cnpj
                                  LEFT JOIN CMS.SobreNos sobre ON licenca.cpf_cnpj = sobre.cpf_cnpj
                                  LEFT JOIN CMS.RedesSociais redes ON licenca.cpf_cnpj = redes.cpf_cnpj
                                  LEFT JOIN CMS.ContatoLocalizacao contato ON licenca.cpf_cnpj = contato.cpf_cnpj
                                  INNER JOIN CMS.Modelo modcms ON modelo.ModeloCMSID = modcms.ModeloCMSID
                                  LEFT JOIN CMS.SEO seo ON seo.cpf_cnpj = licenca.cpf_cnpj
                                  LEFT JOIN Creditos.Creditos cred ON licenca.cpf_cnpj = cred.cpf_cnpj AND cred.DataVencimento > GETDATE()
                                  LEFT JOIN CMS.BannerNovo ban ON ban.cpf_cnpj = licenca.cpf_cnpj
                                  WHERE licenca.Dominio LIKE '%".$dominio."%' AND licenca.Dominio IS NOT NULL ".$param." 
                                  GROUP BY licenca.cpf_cnpj, licenca.Diretorio, licenca.Logo, licenca.Dominio, licenca.ID_Licenciador, licenca.ID_Status,usu.VersaoSistema,
                                  modcms.Diretorio,modelo.modelocss,modelo.hex1,modelo.Hex2,modelo.Hex3,modelo.Hex4,modelo.Hex5,modelo.Hex6,empresa.Fantasia, empresa.RazaoSocial,empresa.CNPJ, contato.Endereco, contato.Numero, contato.Bairro, contato.Cidade,  contato.Estado, contato.Telefone, contato.Email, contato.CEP,contato.StatusSite, contato.StatusTel, informativo.texto, sobre.texto,
                                  sobre.imagem, redes.Facebook, redes.Twitter, redes.Instagram, redes.Blog, redes.GooglePlus, redes.Flickr, redes.Linkedin,redes.Youtube,redes.WhatsApp,redes.Skype,redes.GooglePlay,redes.AppStore,redes.Cadastur, contato.Latitude,contato.MaisContatos, contato.Longitude, contato.Complemento, redes.FacebookWidget, redes.Rss, seo.Analytics, seo.MetaDesc, seo.MetaKey, ban.Conteudo, licenca.TamanhoBanner, licenca.ExibirRoteiros, licenca.ExibirServicos,licenca.ExibirPacotes,licenca.ExibirSelfBooking, licenca.ExibirGaleria,usu.nome,usu.Genero, licenca.ExibirNews,licenca.ExibirSobreNos, licenca.ExibirPrincipal,licenca.ExibirParallax,licenca.ExibirCondGerais,licenca.ExibirDirConsumidor,licenca.ExibirCNPJ");
           $stmt->execute();
           if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
           }else{
              return false;
           }
           
         
          }catch (PDOException $e){
              echo "Error" . $e->getMessage();
          }
}


function consumirSite($licenca){
      try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("UPDATE Creditos.Creditos SET AcessoSite = AcessoSite-1
                                     WHERE  ID_Status = 2 AND DataVencimento > GETDATE()
                                     AND cpf_cnpj = ".$licenca." AND ID_Credito IN (SELECT TOP 1 ID_Credito FROM 
                                     Creditos.Creditos WHERE cpf_cnpj = ".$licenca." ORDER BY DataVencimento ASC)");
             $stmt->execute();
             if($stmt->rowCount() != 0){
                return $stmt->fetch(PDO::FETCH_OBJ);
             }else{
                return false;
             }
             
           
            }catch (PDOException $e){
                echo "Error" . $e->getMessage();
            }
}
function nomeGaleriaPorID($galeriaID){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT nome FROM site.galeria WHERE GaleriaID = $galeriaID AND cpf_cnpj = '$licenca'");
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}
function BuscarGaleria(){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT id,nome,imagem FROM site.galeria WHERE cpf_cnpj = '$licenca' AND destaque = 1 AND status = 1 ORDER BY Alteracao DESC LIMIT 3");
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function BuscarGaleria6(){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT id, nome, imagem FROM site.galeria WHERE cpf_cnpj = '$licenca' AND destaque = 1 AND status = 1 ORDER BY alteracao DESC LIMIT 6");
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function BuscarGaleriaUnica(){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT id FROM site.galeria WHERE cpf_cnpj = '$licenca' AND destaque = 1 AND status = 1 ORDER BY cadastro DESC LIMIT 1");
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function BuscarGaleriaUnicaCANSEI(){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT id FROM site.galeria WHERE cpf_cnpj = '$licenca' AND destaque = 1 AND status = 1 ORDER BY cadastro DESC LIMIT 1");
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}
 function BuscarImagensGaleriaUnica($galeriaID){
  $licenca = LICENCA;



    $ordenacao_pacotes = ORDENACAO_GALERIA;
    if ($ordenacao_pacotes == 1) {
      $ordem_pacotes = "info.id ASC";
    }else if ($ordenacao_pacotes == 2) {
      $ordem_pacotes = "info.id DESC"; 
    }else{
      $ordem_pacotes = "info.id DESC";
    }

  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT galeria.nome, galeria.status, info.imagem, info.id, info.tipo_imagem, info.imagem, info.texto_galeria
                      FROM site.galeria galeria
                      INNER JOIN site.imagens_galeria info ON info.id_galeria = galeria.id
                      WHERE galeria.id = $galeriaID AND galeria.status = 1 ORDER BY $ordem_pacotes");
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
} 
function BuscarTotalImagensGaleria($galeriaID){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT COUNT(imagem) AS count FROM  site.imagens_galeria WHERE id_galeria = $galeriaID");
    
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_OBJ);
    return $dados->count;
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}

function BuscarGaleriaGeral(){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT GaleriaID,nome,imagem FROM site.galeria WHERE cpf_cnpj = '$licenca' AND destaque = 1 AND status = 1 ORDER BY DataAlteracao DESC");
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}
function gerarNovoParallax(){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                              posicao, texto, link, tamanho, imagem
                            FROM site.Banner
                            WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = 4
                            ORDER BY cadastro DESC LIMIT 1"); 
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
} 
function parallaxTemplate($local){
  $licenca = LICENCA;
  try{
    $conn = conectar_pgsql('CMS');
    $stmt = $conn->prepare("SELECT TOP 1 id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                      posicao, texto, link, tamanho, imagem
                                    FROM site.banner
                                    WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = $local
                                    ORDER BY DataAlteracao DESC"); 
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo "Error".$e->getMessage();
  }
}
function gerarBannerRoteiro(){ 
    $cpf_cnpj = LICENCA;

    try{
        $conn = conectar_pgsql('CMS'); 
                $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                        posicao, texto, link, tamanho, imagem, tipolink
                                    FROM site.banner
                                    WHERE status = '1' AND cpf_cnpj = '$cpf_cnpj' AND tamanho = 5
                                    ORDER BY cadastro DESC LIMIT 9"); 
            

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }

}

function checarQtdBannerRoteiro(){
  $cpf_cnpj = LICENCA;
     try{
         $conn = conectar_pgsql('CMS');
 
         $sql = "SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                        posicao, texto, link, tamanho, imagem, tipolink
                                    FROM site.banner
                                    WHERE status = '1' AND cpf_cnpj = '$cpf_cnpj' AND tamanho = 5
                                    ORDER BY cadastro DESC LIMIT 9";
 
         $stmt = $conn->prepare($sql); 
 
         $stmt->execute();
 
         return $stmt->rowCount();
 
         $conn = null;
     }catch(PDOException $e){
         echo $e->getMessage();
     }
 }
function gerarNovoBanner($local){

    $tipoBanner = BANNERTAM;
    $cpf_cnpj = LICENCA;

    $ordenacao_principal = ORDENACAO_BANNER;
    if ($ordenacao_principal == 1) {
      $ordem_banner = "cadastro ASC";
    }else if ($ordenacao_principal == 2) {
      $ordem_banner = "cadastro DESC";
    }else if ($ordenacao_principal == 3) {
      $ordem_banner = "titulo ASC";
    }else if ($ordenacao_principal == 4) {
      $ordem_banner = "titulo DESC";
    }else{
      $ordem_banner = "cadastro DESC";
    }

    $ordenacao_pacotes = ORDENACAO_PACOTES;
    if ($ordenacao_pacotes == 1) {
      $ordem_pacotes = "cadastro ASC";
    }else if ($ordenacao_pacotes == 2) {
      $ordem_pacotes = "cadastro DESC";
    }else if ($ordenacao_pacotes == 3) {
      $ordem_pacotes = "titulo ASC";
    }else if ($ordenacao_pacotes == 4) {
      $ordem_pacotes = "titulo DESC";
    }else{
      $ordem_pacotes = "cadastro DESC";
    }

    try{
        $conn = conectar_pgsql('CMS');
        switch ($local) {
            case '1':
                $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                        posicao, texto, link, tamanho, imagem, tipolink
                                    FROM site.banner
                                    WHERE status = '1' AND cpf_cnpj = '$cpf_cnpj' AND localsite = $local AND tamanho = $tipoBanner
                                    ORDER BY $ordem_banner");
            break;
            default:
                $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                        posicao, texto, link, tamanho, imagem
                                    FROM site.banner
                                    WHERE status = '1' AND cpf_cnpj = '$cpf_cnpj' AND localsite = $local
                                    ORDER BY $ordem_pacotes LIMIT 9");
            break;
        }
            

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }

}

function gerarNovoBannerT($cpf_cnpj){
  try{
        $conn = conectar_pgsql('CMS'); 
                $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                        posicao, texto, link, tamanho, imagem
                                    FROM site.banner
                                    WHERE status = '1' AND cpf_cnpj = '$cpf_cnpj' AND localsite = '1'
                                    ORDER BY cadastro DESC"); 

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}



function buscarHoteis($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes 
                FROM Reservas.Hoteis hotel
                INNER JOIN Reservas.REL_Hoteis_Roteiro rel ON hotel.ID_Hotel = rel.ID_Hotel
                WHERE rel.id_roteiro = :id");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function buscarHoteisEvento($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes 
              FROM Reservas.Hoteis hotel
              INNER JOIN Reservas.REL_Hoteis_Eventos rel ON hotel.ID_Hotel = rel.ID_Hotel
              WHERE rel.ID_Evento = :id");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
 
function checarHotel($id){
     try{
         $conn = conectar_pgsql('CMS');
 
         $sql = "SELECT * FROM Reservas.REL_Hoteis_Roteiro WHERE id_roteiro = :id";
 
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
 
         $stmt->execute();
 
         return $stmt->rowCount();
 
         $conn = null;
     }catch(PDOException $e){
         echo $e->getMessage();
     }
 }

 function checarHotelServicos($id){
     try{
         $conn = conectar_pgsql('CMS');
 
         $sql = "SELECT * FROM A_Roteiros.RoteiroHoteis WHERE id_roteiro = :id";
 
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
 
         $stmt->execute();
 
         return $stmt->rowCount();
 
         $conn = null;
     }catch(PDOException $e){
         echo $e->getMessage();
     }
 }

 function listarAparatamentosRoteiros($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM Reservas.Hoteis hotel
              INNER JOIN Reservas.REL_Hoteis_Roteiro rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN Reservas.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.ID_Hotel = :id ORDER BY ap.PAX");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}


function listarAparatamentos($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes FROM A_Hoteis.Hoteis hotel
 INNER JOIN A_Eventos.EventoHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
 WHERE rel.ID_Evento = :id ORDER BY hotel.nome");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarAparatamentosHotelEspecifico($idHotel){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
 FROM A_Hoteis.Apartamentos ap
 WHERE ap.ID_Hotel = :idHotel ORDER BY ap.PAX");
             $stmt->bindParam(':idHotel', $idHotel, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}


function listarAparatamentosSingle($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM A_Hoteis.Hoteis hotel
              INNER JOIN A_Eventos.EventoHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN A_Hoteis.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.ID_Evento = :id AND ap.PAX = '1' ");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarAparatamentosDuplo($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM A_Hoteis.Hoteis hotel
              INNER JOIN A_Eventos.EventoHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN A_Hoteis.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.ID_Evento = :id AND ap.PAX = '2' ");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarAparatamentosTriplo($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM A_Hoteis.Hoteis hotel
              INNER JOIN A_Eventos.EventoHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN A_Hoteis.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.ID_Evento = :id AND ap.PAX = '3' ");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarApRoteiro($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM Reservas.Hoteis hotel
              INNER JOIN Reservas.REL_Hoteis_Roteiro rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN Reservas.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.id_roteiro = :id ORDER BY ap.PAX");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarAparatamentosSingleRoteiro($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM A_Hoteis.Hoteis hotel
              INNER JOIN A_Roteiros.RoteiroHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN A_Hoteis.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.id_roteiro = :id AND ap.PAX = '1' ");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarAparatamentosDuploRoteiro($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM A_Hoteis.Hoteis hotel
              INNER JOIN A_Roteiros.RoteiroHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN A_Hoteis.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.id_roteiro = :id AND ap.PAX = '2' ");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarAparatamentosTriploRoteiro($id){
        try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes, ap.ID_Apartamento,ap.Categoria,ap.PAX, ap.MinimoDiarias, ap.Bloqueio,ap.DiariaDom
              FROM A_Hoteis.Hoteis hotel
              INNER JOIN A_Roteiros.RoteiroHoteis rel ON hotel.ID_Hotel = rel.ID_Hotel
              INNER JOIN A_Hoteis.Apartamentos ap ON ap.ID_Hotel = rel.ID_Hotel
              WHERE rel.id_roteiro = :id AND ap.PAX = '3' ");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function listarInstalacoesHotel($id){
  try{
            $conn = conectar_pgsql('CMS');
            $stmt = $conn->prepare("SELECT insta.ID_Instalacao, insta.Icone, insta.nome
              FROM Reservas.InstalacoesAtribuidas hotel
              INNER JOIN Reservas.Instalacoes insta ON hotel.ID_Instalacao = insta.ID_Instalacao
              WHERE hotel.ID_Hotel = :id");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function gerarBannerModelo23($local){
        $tipoBanner = 2;
        $licenca = LICENCA;
        try{
             $conn = conectar_pgsql('CMS');
             switch ($local) {
               case '1':
                  $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                            posicao, texto, link, tamanho, imagem
                                          FROM site.banner
                                          WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = $local AND tamanho = $tipoBanner
                                          ORDER BY cadastro DESC");
                break;
               default:
                 $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,
                                          posicao, texto, link, tamanho, imagem
                                        FROM site.Banner
                                        WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = $local 
                                        ORDER BY cadastro DESC LIMIT 3");
                 break;
             }

             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function gerarNovoBannerPlugin($local){
        try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT Conteudo FROM CMS.BannerNovo WHERE cpf_cnpj = :licenca AND localsite = $local");
             $licenca = LICENCA;
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->execute();
             return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function gerarMenuSite(){

    $cpf_cnpj = LICENCA;

    try{
      $conn = conectar_pgsql('CMS','179.188.16.134');
      $stmt = $conn->prepare("SELECT json, id, cpf_cnpj,statusfinanciamento, nomefinanciamento, statusservicos,nomeservicos, statuscorporativo, nomecorporativo, statusroteiros, nomeroteiros, statuspacotes, nomepacotes, statussobrenos, nomesobrenos, statusinfo, nomeinfo, statuscontato, nomecontato, nomegaleria, statusgaleria, nomeorcamento, linkorcamento, statusorcamento, linkservicos, tipolink, tipolinkroteiros, linkroteiros, tipolinkpacotes, linkpacotes, tipolinkgaleria, linkgaleria, tipolinksobre, linksobre, tipolinkinfo, linkinfo, tipolinkcontato, linkcontato, tipolinkcorp, linkcorp
      FROM site.menuconfig WHERE cpf_cnpj = '$cpf_cnpj'");
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }catch (PDOException $e){
      echo "Error" . $e->getMessage();
    }

}

function gerarConteudoPagina($titulo){

    $cpf_cnpj = LICENCA;

    try{
      $conn = conectar_pgsql('CMS','179.188.16.134');
      $stmt = $conn->prepare("SELECT * FROM site.paginas WHERE cpf_cnpj = '$cpf_cnpj' AND titulo LIKE '%$titulo%'");
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }catch (PDOException $e){
      echo "Error" . $e->getMessage();
    }

}
 
function gerarConteudoPaginaCategoria($categoria){

    $cpf_cnpj = LICENCA;

    try{
      $conn = conectar_pgsql('CMS','179.188.16.134');
      $stmt = $conn->prepare("SELECT * FROM site.paginas WHERE cpf_cnpj = '$cpf_cnpj' AND categoria LIKE '%$categoria%' ORDER BY titulo ASC LIMIT 1");
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }catch (PDOException $e){
      echo "Error" . $e->getMessage();
    }

}

function gerarMenuCategoriaDinamico($categoria){
  $cpf_cnpj = LICENCA;

    try{
      $conn = conectar_pgsql('CMS','179.188.16.134');
      $stmt = $conn->prepare("SELECT DISTINCT titulo, titulo_pagina FROM site.paginas WHERE categoria LIKE '%$categoria%' AND cpf_cnpj = '$cpf_cnpj' ORDER BY titulo ASC");
      $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }catch (PDOException $e){
      echo "Error" . $e->getMessage();
    }
}

function get_estilo_geral(){
        try{

            $cpf_cnpj = LICENCA;

            $conn = conectar_pgsql('Licencas');
    
            $sql = "SELECT * FROM modulolicenca WHERE cpf_cnpj = '$cpf_cnpj'";
    
            $stmt = $conn->prepare($sql);

    
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ); 
            }else{
                return false;
            }
    
            $conn = null;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function get_estilo_modulos(){
        try{

            $cpf_cnpj = LICENCA;

            $conn = conectar_pgsql('Licencas');
    
            $sql = "SELECT * FROM estilomodulo WHERE cpf_cnpj = '$cpf_cnpj'";
    
            $stmt = $conn->prepare($sql);

    
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ); 
            }else{
                return false;
            }
    
            $conn = null;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function get_paginas_rodape(){
  

  try{
      $conn = conectar_pgsql('CMS', '179.188.16.134');

      $cpf_cnpj = LICENCA;

      //Busca dados do usuario
      $sql = $conn->prepare("SELECT * FROM site.paginas_rodape WHERE cpf_cnpj = '$cpf_cnpj'");

      if($sql->execute()){
          return $sql->fetch(PDO::FETCH_OBJ);
      }else{
          return false;
      }

  }catch (PDOException $e){
      echo "Error" . $e->getMessage();
  }
}


function get_cias_aereas(){
  

  try{
      $conn = conectar_pgsql('CMS', '179.188.16.134');

      $cpf_cnpj = LICENCA;

      //Busca dados do usuario
      $sql = $conn->prepare("SELECT nome_cia_aerea as nome, detalhes, id FROM site.financiamento WHERE cpf_cnpj = '$cpf_cnpj'");

      if($sql->execute()){
          return $sql->fetchALL(PDO::FETCH_OBJ);
      }else{
          return false;
      }

  }catch (PDOException $e){
      echo "Error" . $e->getMessage();
  }
}


function gerarNovoBanner340($local){
  try{
       $conn = conectar_pgsql('CMS');
       $stmt = $conn->prepare("SELECT id, cpf_cnpj, status, imagem, titulo, subtitulo,
                                posicao, texto, link
                              FROM site.banner
                              WHERE status = '1' AND cpf_cnpj = '340' AND localsite = $local
                              ORDER BY cadastro DESC");
       // $licenca = LICENCA;
       // $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch (PDOException $e){
      echo "Error" . $e->getMessage();
   }
}
function escreverNovoBanner(){
  $bannerPrincipal = gerarNovoBanner340(1); 
  $bannerNovo .= '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
  $bannerNovo .= '<div class="carousel-inner" role="listbox">';
  $active = 0;
  foreach ($bannerPrincipal as $principal){
    $bannerNovo .= '<div class="item'.($active == 0 ? 'active' : '').'">';
    $bannerNovo .= '<img src="'.$principal->imagem.'" alt="'.$principal->titulo.'">';
    $bannerNovo .= '</div>';
    $active++;   
  }
  $bannerNovo .= '</div>';
  $bannerNovo .= '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>';
  $bannerNovo .= '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
  $bannerNovo .= '</div>';
  echo $bannerNovo;
}
function mostrarRoteiros340(){
  try{
     $conn = conectar_pgsql('CMS');
     $stmt = $conn->prepare("SELECT DISTINCT TOP(3) * FROM Roteiros.Roteiro WHERE cpf_cnpj = '340' AND ID_Status = '1' AND destaque = '1'");
     $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}catch (PDOException $e){
    echo "Error" . $e->getMessage();
 }
}
function escreverSobreNos340(){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT imagem, texto FROM CMS.SobreNos WHERE cpf_cnpj = '340'");
             $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function escreverFooter340(){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT CEP, Endereco, Numero, Complemento, Bairro, Cidade, Estado, Telefone, Email FROM CMS.ContatoLocalizacao WHERE cpf_cnpj = '340'");
             $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
/*
function escrever_Banner_Simples(){
    $bannerPricipal = gerarNovoBanner(1);
    if($bannerPricipal[0] <> ''){
    $banner1 .= '<header id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
    $banner1 .= '<div class="carousel-inner" role="listbox">';
            $active = 0;
            foreach ($bannerPricipal as $principal) {
                  $button = '';
                  if(trim($principal->link) != ""){
                      $button = '<a href="'.$principal->link.'"><button class="btn botaoVejaMais">Veja mais</button></a>';
                  }
                        $img = getImageRoute($principal->imagem, 'imagens', DIRETORIO);
                        $banner1 .= '<div class="item '.($active == 0 ? 'active' : '').'">';
                        $banner1 .= '<img src="'.$img.'" alt="'.$principal->titulo.'" class="imagem-banner-tmo img-responsive">';
                        $banner1 .= '<div class="carousel-caption">';
                        $banner1 .= '<div class="row">';
                        $banner1 .= '<div class="container">';
                        $banner1 .= '<div class="col-lg-12 txt-banner" style="line-height: 50px; width: 70%; '.$principal->posicao.'">';
                        $banner1 .= '<h2 class="shad"> '.$principal->titulo.'</h2>';
                        $banner1 .= '<h3 class="shad"> '.$principal->subtitulo.'</h3>';
                        $banner1 .= '<a href="#" class="shad">'.$principal->texto.'</a><br>';
                        $banner1 .= ''.$button.'';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                $active++;
            }
          $banner1 .= '</div>';
          $banner1 .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
          $banner1 .= '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
          $banner1 .= '<span class="sr-only">Previous</span>';
          $banner1 .= '</a>';
          $banner1 .= '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">';
          $banner1 .= '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
          $banner1 .= '<span class="sr-only">Next</span>';
          $banner1 .= '</a>';
          $banner1 .= '</header>';
}
echo $banner1;
} */
/*
function escrever_Banner_Padrao(){
    $bannerPricipal = gerarNovoBanner(1);
    if($bannerPricipal[0] <> ''){
    $banner1 .= '<header id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
    $banner1 .= '<div class="carousel-inner" role="listbox">';
            $active = 0;
            foreach ($bannerPricipal as $principal) {
                  $button = '';
                  if(trim($principal->link) != ""){
                      $button = '<a href="'.$principal->link.'"><button class="btn botaoVejaMais">Veja mais</button></a>';
                  }
                        $img = getImageRoute($principal->imagem, 'imagens', DIRETORIO);
                        $banner1 .= '<div class="item '.($active == 0 ? 'active' : '').'">';
                        $banner1 .= '<img src="'.$img.'" alt="'.$principal->titulo.'" class="imagem-banner-tmo img-responsive">';
                        $banner1 .= '<div class="carousel-caption">';
                        $banner1 .= '<div class="row">';
                        $banner1 .= '<div class="container">';
                        $banner1 .= '<div class="col-lg-12 txt-banner" style="line-height: 50px; width: 70%; '.$principal->posicao.'">';
                        $banner1 .= '<h2 class="shad"> '.$principal->titulo.'</h2>';
                        $banner1 .= '<h3 class="shad"> '.$principal->subtitulo.'</h3>';
                        $banner1 .= '<a href="#" class="shad">'.$principal->texto.'</a><br>';
                        $banner1 .= ''.$button.'';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                $active++;
            }
          $banner1 .= '</div>';
          $banner1 .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
          $banner1 .= '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
          $banner1 .= '<span class="sr-only">Previous</span>';
          $banner1 .= '</a>';
          $banner1 .= '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">';
          $banner1 .= '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
          $banner1 .= '<span class="sr-only">Next</span>';
          $banner1 .= '</a>';
          $banner1 .= '</header>';
}
echo $banner1;
}
*/
function escrever_Motor_Formulario(){
          $motor .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-servicoModelo01.css">';
          $motor .= '<section class="slice slice_p slice_servicos" id="servicos">';
          $motor .= '<div class="row">';
          $motor .= '<div class="col-xs-12">';
          $motor .= '<h1 class="title-rot">Nossos Serviços</h1>';
          $motor .= '<h2 class="subTitle">Faça suas reservas nas melhores condições.</h2>';
          $motor .= '</div>';
          $motor .= '</div>'; 
          $motor .= '<div class="container">'; 
          $motor .= '<div class="row">'; 
          $motor .= '<div class="col-sm-6">';
          $motor .= '<div class="row boxFeature">';
          $motor .= '<div class="col-xs-3"><i class="icon-plane-outline iconBig"></i></div>';
          $motor .= '<div class="col-xs-9">';
          $motor .= '<h2 class="h2serv">Passagens aéreas</h2>';
          $motor .= '<p><a href="passagens-aereas">Compre passagens áreas internacionais e nacionais com o melhor preço.</a></p>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '<div class="col-sm-6">';
          $motor .= '<div class="row boxFeature">';
          $motor .= '<div class="col-xs-3"><i class="icon-tags  iconBig"></i></div>';
          $motor .= '<div class="col-xs-9">';
          $motor .= '<h2 class="h2serv">Reserva de Hotéis</h2>';
          $motor .= '<p><a href="reservas-de-hoteis">São diversos Hotéis com qualidade, ótimos preços e conforto.</a></p>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</div>'; 
          $motor .= '</div>'; 
          $motor .= '<div class="row">'; 
          $motor .= '<div class="col-sm-6">';
          $motor .= '<div class="row boxFeature">';
          $motor .= '<div class="col-xs-3"><i class="icon-user iconBig"></i></div>';
          $motor .= '<div class="col-xs-9">';
          $motor .= '<h2 class="h2serv">Locação de Veículos</h2>';
          $motor .= '<p><a href="locacao-de-veiculos">Alugue um carro, com a menor tarifa e da frota mais nova.</a></p>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '<div class="col-sm-6">';
          $motor .= '<div class="row boxFeature">';
          $motor .= '<div class="col-xs-3"><i class="icon-globe-outline  iconBig"></i></div>';
          $motor .= '<div class="col-xs-9">';
          $motor .= '<h2 class="h2serv">Seguro Viagem</h2>';
          $motor .= '<p><a href="seguro-viagem">Tenha uma viagem tranquila e sem preocupações. É simples e rápido!</a></p>';
          $motor .= '</div></div></div></div></div></section>';
          echo $motor;
}
function escrever_Motor_FormularioSimples(){
          $motor .= '<div class="row">';
          $motor .= '<div class="col-xs-12">';
          $motor .= '<h1 class="title-rot">Nossos Serviços</h1>';
          $motor .= '<h2 class="subTitle">Faça suas reservas nas melhores condições.</h2>';
          $motor .= '</div></div><br><br>';
          $motor .= '<section class="color4 slice tam1">';
          $motor .= '<div class="ctaBox ctaBoxFullwidth">';
          $motor .= '<div class="container">';
          $motor .= '<div class="row">';
          $motor .= '<div class="col-md-7">';
          $motor .= '<h1><strong>Maior comodidade</strong> para você adquirir nossos serviços sem precisar sair de seu lar.</h1>';
          $motor .= '<!--<h1>';
          $motor .= '<strong>Site Turístico da Montenegro</strong> dispõe de várias funcionalidades que ajudam o agente de viagens na captação de vendas!';
          $motor .= '</h1>-->';
          $motor .= '</div>';
          $motor .= '<div class="col-md-5">';
          $motor .= '<div class="mediaHover">';
          $motor .= '<div class="mask"></div>';
          $motor .= '<a class="btn btn-lg" href="#">';
          $motor .= '<i class="icon-globe"></i> VEJA MAIS SERVIÇOS';
          $motor .= '</a>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</div>';
          $motor .= '</section>';
          $motor .= '';
          echo $motor;
}
function escrever_Contato_Mapa(){
      $map .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-Contato.css">';
      $map .= '<section class="slice"  id="contactSlice" >';
      $map .= '<div class="container">';
      $map .= '<div class="row">';
      $map .= '<div class="col-sm-12">';
      $map .= '<h1 class="noSubtitle">Nosso Contato</h1>';
      $map .= '</div>';
      $map .= '<div class="col-sm-12">';
      $map .= '<div id="mapWrapper" class="mb30" style="display: none;" >';
      $map .= '<div class="dadosMapa" style="display: none;">';
      $map .= '<input type="text" id="enderecoFantasia" value="'.FANTASIA.'">';
      $map .= '<input type="text" id="endereco_map" value="'.ENDERECO.'">';
      $map .= '<input type="text" id="cidade_map" value="'.CIDADE.'">';
      $map .= '<input type="text" id="estado_map" value="<?=ESTADO?>">';
      $map .= '<input type="text" id="latitude_map" value="'.LATITUDE.'">';
      $map .= '<input type="text" id="longitude_map" value="'.LONGITUDE.'">';
      $map .= '</div></div>';
      $map .= '<div id="mapa" class="mapa mb30" style="height: 400px; width: 100%; '.$mostrarContato.'" >';
      $map .= '</div></div>';
      $map .= '<div class="col-sm-4">';
      
      $disp = '';
            if (strpos(FACEBOOK, '.com') !== false AND strpos(TWITTER, '.com') !== false) {
              $disp = 'display:none;';
            }
            
      $map .= '<h3 class="sociais" style="'.$disp.'">Redes Sociais</h3>';
      $map .= '<ul class="socialNetwork pull-left redes">';
            if (strpos(FACEBOOK, '.com') !== false) {
            $map .= '<a href="'.FACEBOOK.'" target="blank" class="tips" title="Siga-me no Facebook"><li><i class="icon-facebook-1 iconRounded"></i></li></a>';
            }
            if(strpos(TWITTER, '.com') !== false){
              $map .= '<a href="'.TWITTER.'" class="tips" title="Siga-me no Twitter" target="_blank"><li><i class="icon-twitter-bird iconRounded"></i></li></a>';
            }
            if(strpos(INSTAGRAM, '.com') !== false){
              $map .= '<a href="'.INSTAGRAM.'" class="tips" title="Siga-me no Instagram" target="_blank"><li><i class="fa fa-instagram iconRounded"></i></li></a>';
            }
            if(strpos(BLOG, '.com') !== false){
              $map .= '<a href="'.BLOG.'" class="tips" title="Acesse o nosso Blog" target="_blank"><li><i class="fa fa-rss iconRounded"></i></li></a>';
            }
            $map .= '</ul>';
            $map .= '<h4 class="end-rodape">Contato</h4>';
            $map .= '<address>';
            $map .= '<p>';
            $map .= '<span style="'.$mostrarContato.'">';
            $map .= '<i class="icon-location"></i>'.ENDERECO.' '.(trim(COMPLEMENTO) != ''  ? ' - '.COMPLEMENTO : '').'</span>';
            $map .= '<span style="'.$mostrarContato.'" '.BAIRRO.' - '.CIDADE.' / '.ESTADO.'</span><br>';
            $map .= '<i class="icon-phone"></i>'.TELEFONE.'<br>';
            $map .= '<i class="icon-mail-alt"></i><a href="mailto:'.EMAIL.'">'.EMAIL.'</a>';
            $map .= '</p></address>';
            $map .= '<p class="contratos"><a href="/condicoes-gerais-e-contrato">Condições Gerais e Contratos</a><br/><a href="http://www.planalto.gov.br/ccivil_03/leis/l8078.htm" target="_blank">Direitos do Consumidor</a></p>';
            $map .= '<span>CNPJ: <strong>'.CNPJ.'</strong></span>';
            $map .= '</div>';
            $map .= '<form id="contactfrm" role="form">';
            $map .= '<div class="col-sm-4">';
            $map .= '<div class="form-group">';
            $map .= '<label for="nome">nome:</label>';
            $map .= '<input type="text" class="form-control form-rodape validar nome" erro="Preencha o nome" name="name" id="nome" placeholder="Insira seu nome"/>';
            $map .= '</div><div class="form-group"><label for="email">E-mail:</label>';
            $map .= '<input type="email" class="form-control form-rodape validar nome" erro="Preencha o E-mail" name="email" id="email" placeholder="Insira seu e-mail"/>';
            $map .= '</div><div class="form-group">';
            $map .= '<label for="telefone">Telefone:</label>';
            $map .= '<input class="form-control form-rodape validar telefone" erro="Preencha o Telefone" type="tel" id="telefone" size="30" value="" placeholder="Insira seu telefone">';
            $map .= '<input class="form-control form-rodape empresa_email" type="hidden" value="'.EMAIL.'">';
            $map .= '</div>';
            $map .= '</div>';
            $map .= '<div class="col-sm-4">';
            $map .= '<div class="form-group">';
            $map .= '<label for="mensagem">Mensagem:</label>';
            $map .= '<textarea class="form-control form-rodape validar mensagem" erro="Preencha o campo Mensagem" id="mensagem" cols="3" rows="5" placeholder="Insira sua mensagem…"></textarea>';
            $map .= '<input type="hidden" id="'.email_hidden.'" value="'.EMAIL.'">';
            $map .= '<button type="button" class="btn btn-sm btn-enviar" onclick="enviarEmailContato()"> Enviar</button>';
            $map .= '</div></div></section>';
            echo $map;
}
function escrever_Rodape_Faixa(){
            $map .= '<div class="row">';
            $map .= '<div class="col-md-4 col-sm-4 col-xs-4 botao-enviar" style="bottom: -2px !important;">';
            $map .= '<div class="result"></div>';
            $map .= '</div></div></form>';
            $map .= '</div></div>';
            $map .= '<div class="lista color4"></div>';
            $map .= '<section id="footerRights">';
            $map .= '<div class="container">';
            $map .= '<div class="row assinatura">';
            $map .= '<div class="col-sm-6 col-xs-12">';
            $map .= '<p>Copyright © Montenegro Empresas Virtuais 2016</p>';
            $map .= '</div><div class="col-sm-6 col-xs-12">';
            $map .= '<ul class="pull-right">';
            $map .= '<li><a href="http://www.montenegroev.com.br" target="_blank"><img src="/CMS/Modelo02/images/logoMontenegro.png" alt="latest Little Neko news" id="footerLogo"></a></li>';
            $map .= '</ul></div></div></div></section>';
            
            echo $map;
}
function escreverBannerPrincipalModelo05(){
    $bannerPricipal = gerarNovoBanner(1);
    $banner1 .= '<div class="row reset-row tm_topo">';
    $banner1 .= '<div class="col-lg-12 acima_menu reset-col animated">';
    if($bannerPricipal[0] <> ''){
    $banner1 .= '<div class="container main-container">';
    $banner1 .= '<div id="carousel-example-generic" class="carousel slide">';
    $banner1 .= '<div class="carousel-inner" role="listbox">';
            $active = 0;
            foreach ($bannerPricipal as $principal) {
                  $button = '';
                  if(trim($principal->link) != ""){
                      $button = '<a href="'.$principal->link.'"><button class="btn">Veja mais</button></a>';
                  }
                        $img = getImageRoute($principal->imagem, 'imagens', DIRETORIO);
                        $banner1 .= '<div class="item '.($active == 0 ? 'active' : '').'">';
                        $banner1 .= '<img src="'.$img.'" alt="'.$principal->titulo.'" class="imagem-banner-tmo img-responsive">';
                        $banner1 .= '<div class="carousel-caption">';
                        $banner1 .= '<div class="row">';
                        $banner1 .= '<div class="container">';
                        $banner1 .= '<div class="col-lg-12 txt-banner" style="line-height: 50px; width: 70%; '.$principal->posicao.'">';
                        $banner1 .= '<h2 class="shad"><span class="title-desc">'.$principal->titulo.'</span></h2>';
                        $banner1 .= '<h3 class="shad animated bounceInUp" data-animation="animated bounceInUp">'.$principal->subtitulo.'</h3>';
                        $banner1 .= '<a href="#" class="shad">'.$principal->texto.'</a><br>';
                        $banner1 .= ''.$button.'';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                $active++;
                }
          $banner1 .= '</div>';
          $banner1 .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-chevron-left" style="margin-top: 130px;"></i></a>';
          $banner1 .= '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-chevron-right" style="margin-top: 130px;"></i></a>';
          $banner1 .= '</div></div>';
    }
    $banner1 .= '</div></div>';
    echo $banner1;
}
function escreverBannerPrincipalModelo03(){
    $bannerPricipal = gerarNovoBanner(1);
    if($bannerPricipal[0] <> ''){
    $banner1 .= '<div class="container top">';
    $banner1 .= '<div class="row">';
    $banner1 .= '<div class="col-md-12  reset-col animated animated_tm">';
    $banner1 .= '<div class="container main-container">';
    $banner1 .= '<div id="carousel-example-generic" class="carousel slide">';
    $banner1 .= '<ol class="carousel-indicators">';
    $banner1 .= '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
    $banner1 .= '<li data-target="#carousel-example-generic" data-slide-to="1"></li>';
    $banner1 .= '<li data-target="#carousel-example-generic" data-slide-to="2"></li>';
    $banner1 .= '</ol>';
    $banner1 .= '<div class="carousel-inner" role="listbox">';
            $active = 0;
            foreach ($bannerPricipal as $principal) {
                  $button = '';
                  if(trim($principal->link) != ""){
                      $button = '<a href="'.$principal->link.'"><button class="btn">Veja mais</button></a>';
                  }
                        $img = getImageRoute($principal->imagem, 'imagens', DIRETORIO);
                        $banner1 .= '<div class="item '.($active == 0 ? 'active' : '').'" deepskyblue>';
                        $banner1 .= '<img src="'.$img.'" alt="'.$principal->titulo.'" class="imagem-banner-tmo img-responsive">';
                        $banner1 .= '<div class="carousel-caption">';
                        $banner1 .= '<div class="row">';
                        $banner1 .= '<div class="container">';
                        $banner1 .= '<div class="col-lg-5 new_bloco1" style="line-height: 50px; width: 70%; '.$principal->posicao.'">';
                        $banner1 .= '<span style = "'.($principal->titulo == '' ? 'display:none;' : '').'" class="cmd1_tit" data-animation="animated bounceInRight">'.$principal->titulo.'</span><br>';
                        $banner1 .= '<span style = "'.($principal->subtitulo == '' ? 'display:none;' : '').'" class="tit_bloco1" data-animation="animated bounceInLeft"><i class="fa fa-2x fa-check"></i>'.$principal->subtitulo.'</span><br>';
                        $banner1 .= '<span style = "'.($principal->texto == '' ? 'display:none;' : '').'" class="tit_bloco1" data-animation="animated bounceInUp"><i class="fa fa-2x fa-check"></i>'.$principal->texto.'</span><br/>';
                        $banner1 .= '<span style = "'.($principal->link == '' ? 'display:none;' : '').'" class="tit_bloco1" data-animation="animated bounceInUp">'.$button.'</span>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                        $banner1 .= '</div>';
                $active++;
                }
          $banner1 .= '</div>';
          $banner1 .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left" style="margin-top: 130px;"></i>
                        </a>';
          $banner1 .= '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-chevron-right" style="margin-top: 130px;"></i>
                        </a>';
          $banner1 .= '</header>';
          $banner1 .= '</div>';
          $banner1 .= '</div>';
          $banner1 .= '</div>';
}
echo $banner1;
}
function escreverPacotesModelo07(){
    $bannerPacotes = gerarNovoBanner(2);
    if($bannerPacotes[0] <> ''){
        foreach ($bannerPacotes as $pacote)  {
            $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
            $pacote7 .= '<div class="col-md-4 pacotes">';
            $pacote7 .= '<h2 class="page-header header-home">'.$pacote->titulo.'</h2>';
            $pacote7 .= '<figure>';
            $pacote7 .= '<img src="'.$img.'" alt="'.$pacote->texto.'" class="img-responsive">';
            $pacote7 .= '</figure>';
            $pacote7 .= '<p class="this_p2">'.$pacote->texto.'</p>';
            $pacote7 .= '<p class="esquerda"><a href="'.$pacote->link.'" class="btn btn-primary">Saiba Mais</a></p>';
            $pacote7 .= '</div>';
        }
        $pacote7 .= '</div>';
    }
    $pacote7 .= '</div></div>';
    echo $pacote7;
}
function escreverPacotesModelo04(){
    $bannerPacotes = gerarNovoBanner(2);
    $pacote1 .= '<section class="row reset-row conteudo">';
    $pacote1 .= '<div class="col-md-8">';
    if($bannerPacotes[0] <> ''){
        $pacote1 .= '<div class="row reset-row conteudo">';
            $pacote1 .= '<div class="destaque">';
                $pacote1 .= '<h2>Viagens a Lazer</h2>';
        foreach ($bannerPacotes as $pacote) {
            
                $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
                $pacote1 .= '<div class="col-md-4 col-sm-4 only3">';
                    $pacote1 .= '<div>';
                        $pacote1 .= '<div>';
                            $pacote1 .= '<figure><img src="'.$img.'" alt="'.$pacote->texto.'" class="img-responsive"></figure>';
                            $pacote1 .= '<div><h2><'.$pacote->titulo.'</h2></div>';
                            $pacote1 .= '<p>'.$pacote->texto.'</p>';
                            $pacote1 .= '<p class="direita"><a href="'.$pacote->link.'" class="btn btn-primary">Saiba Mais</a></p>';
                        $pacote1 .= '</div>';
                    $pacote1 .= '</div>';
                $pacote1 .= '</div>';
        }
        $pacote1 .= '</div></div>';
    }
    $pacote1 .= '</div>';
    $pacote1 .= '<div class="col-md-4">';
    $pacote1 .= '<div class="destaque3">';
    $pacote1 .= '<div class="fume">';
    $pacote1 .= '<h2 class="ecologicos">Resorts</h2>';
    $pacote1 .= '<p>Conheça e desfrute de lugares paradisíacos, com muita diversão e serviços personalizados.</p>';
    $pacote1 .= '<p><a class="btn btn-primary btn botao" href="/reserva-de-hoteis" role="button">Saiba Mais »</a></p>';
    $pacote1 .= '</div></div></div>';
    $pacote1 .= '</section>';
    
    echo $pacote1;
}
function escrever_Pacotes_Padrao(){
    $bannerPacotes = gerarNovoBanner(2);
    if($bannerPacotes[0] <> ''){
    $pacote1 .= '<div class="row">';
    $pacote1 .= '<div class="container">';
    $pacote1 .= '<div class="col-lg-12">';
    $pacote1 .= '<h1 class="page-header header-home">Pacotes</h1>';
    $pacote1 .= '</div>';
    foreach ($bannerPacotes as $pacote) {
    $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
    $pacote1 .= '<div class="col-md-4">';
    $pacote1 .= '<div class="panel panel-default">';
    $pacote1 .= '<div class="panel-heading">';
    $pacote1 .= '<h4>'.$pacote->titulo.'</h4>';
    $pacote1 .= '</div>';
    $pacote1 .= '<div class="panel-body">';
    $pacote1 .= '<figure>';
    $pacote1 .= '<img src="'.$img.'" alt="'.$pacote->texto.'">';
    $pacote1 .= '</figure>';
    $pacote1 .= '<p>'.$pacote->texto.'</p>';
    $pacote1 .= '<p class="direita"><a href="'.$pacote->link.'" class="btn btn-primary">Saiba Mais</a></p>';
    $pacote1 .= '</div></div></div>';
    }
    $pacote1 .= '</div>';
    }
    $pacote1 .= '</div>';
    echo $pacote1;
}
function escreverPacotesModelo03(){
    $bannerPacotes = gerarNovoBanner(2);
    if($bannerPacotes[0] <> ''){
    $pacote1 .= '<div class="row">';
    $pacote1 .= '<div class="container">';
    $pacote1 .= '<div class="col-lg-12">';
    $pacote1 .= '<h1 class="page-header header-home titPac">Pacotes</h1>';
    $pacote1 .= '</div>';
    foreach ($bannerPacotes as $pacote) {
    $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
    $pacote1 .= '<div class="pacotes">';
    $pacote1 .= '<div class="col-md-3 col-sm-6 painel">';
    $pacote1 .= '<div class="panel panel-default">';
    $pacote1 .= '<div class="panel-heading">';
    $pacote1 .= '<h4>'.$pacote->titulo.'</h4>';
    $pacote1 .= '</div>';
    $pacote1 .= '<div class="panel-body">';
    $pacote1 .= '<figure>';
    $pacote1 .= '<img src="'.$img.'" alt="'.$pacote->texto.'">';
    $pacote1 .= '</figure>';
    $pacote1 .= '<p>'.$pacote->texto.'</p>';
    $pacote1 .= '<p class="direita"><a href="'.$pacote->link.'" class="btn btn-primary">Saiba Mais</a></p>';
    $pacote1 .= '</div></div></div>';
    }
    $pacote1 .= '</div></div>';
    }
    $pacote1 .= '</div>';
    echo $pacote1;
}
function escrever_Servicos_Padrao(){
    $bannerMotores = gerarNovoBanner(3);
    $motor1 .= '<div class="container">';
    $motor1 .= '<section class="row reset-row conteudo">';
    foreach ($bannerMotores as $motor) {
    $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
    $motor1 .= '<div class="col-md-3 col-sm-6">';
    $motor1 .= '<div class="destaque2">';
    $motor1 .= '<figure><img src="'.$img.'" alt="'.$motor->titulo.'"/></figure>';
    $motor1 .= '<h2>'.$motor->titulo.'</h2>';
    $motor1 .= '<p>'.$motor->texto.'</p>';
    $motor1 .= '<p class="direita"><a href="'.$motor->link.'" class="btn btn-primary">Saiba mais</a></p></div></div>';
    }
    $motor1 .= '</section></div>';
    echo $motor1;
}
function escreverMotoresModelo3(){
    $bannerMotores = gerarNovoBanner(3);
    $motor1 .= '<div class="row">';
    $motor1 .= '<section class="row reset-row conteudo">';
    foreach ($bannerMotores as $motor) {
         $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
         $topo = "<h2 class='page-header new-header another_h this_size serv1'>Serviços</h2>";
         $motor1 .= "<div class = 'col-md-3 col-sm-6'>";
         $motor1 .= "<div class = 'panel panel-default'>";
         $motor1 .= "<div class = 'panel-heading'>";
         $motor1 .= "<h4>".$motor->titulo."</h4>";
         $motor1 .= "</div>";
         $motor1 .= "<div class ='panel-body'>";
         $motor1 .= "<figure>";
         $motor1 .= "<img class = 'img-responsive' src = '$img' alt = ".$motor->titulo."/>";
         $motor1 .= "</figure>";
         $motor1 .= "<p>".$motor->texto."</p>";
         $motor1 .= "<p class = 'esquerda'><a href = ".$motor->link." class = 'btn btn-primary'>Saiba mais</a></p>";
         $motor1 .= "</div>";
         $motor1 .= "</div>";
         $motor1 .= "</div>";
    }
    $motor1 .= '</section>';
    $motor1 .= '</div>';
    echo $topo;
    echo $motor1;
}
function escreverMotoresModelo04(){
    $bannerMotores = gerarNovoBanner(3);
    $motor1 .= '<section class="row reset-row conteudo">';
    foreach ($bannerMotores as $motor) {
    $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
    $motor1 .= '<div class="col-md-3 col-sm-6">';
    $motor1 .= '<div class="destaque2">';
    $motor1 .= '<figure><img src="'.$img.'" alt="'.$motor->titulo.'"/></figure>';
    $motor1 .= '<h2>'.$motor->titulo.'</h2>';
    $motor1 .= '<p>'.$motor->texto.'</p>';
    $motor1 .= '<p class="direita"><a href="'.$motor->link.'" class="btn btn-primary">Saiba mais</a></p></div></div>';
    }
    $motor1 .= '</section>';
    echo $motor1;
}
function escreverMotoresModelo07(){
    $bannerMotores = gerarNovoBanner(3);
    $motor7 .= '<div class="container">';
    $motor7 .= '<section class="row reset-row conteudo">';
    $motor7 .= '<div class="row">';
    $motor7 .= '<div class="col-lg-12">';
    $motor7 .= '<h1 class="page-header header-home">Serviços</h1>';
    $motor7 .= '</div></div>';
    foreach ($bannerMotores as $motor) {
        $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
        $motor7 .= '<div class="col-md-4 col-sm-12">';
        $motor7 .= '<div class="panel panel-default">';
        $motor7 .= '<div class="panel-heading">';
        $motor7 .= '<h4>'.$motor->titulo.'</h4>';
        $motor7 .= '</div>';
        $motor7 .= '<div class="panel-body">';
        $motor7 .= '<figure><img src="'.$img.'" alt="'.$motor->titulo.'"/></figure>';
        $motor7 .= '<p>'.$motor->texto.'</p>';
        $motor7 .= '<p class="esquerda"><a href="'.$motor->link.'" class="btn btn-primary">Saiba mais</a></p>';
        $motor7 .= '</div></div></div>';
    }
    $motor7 .= '</section></div>';
    echo $motor7;
}
function escreverMotoresModelo05(){
    $bannerMotores = gerarNovoBanner(3);
    $motor1 .= '<div class="row">';
    $motor1 .= '<div class="col-md-12"><h1 class="page-header new-header">Serviços</h1></div>';
    foreach ($bannerMotores as $motor) {
         $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
         $motor1 .= '<div class = "col-md-4 col-sm-6">';
         $motor1 .= '<div class = "panel panel-default">';
         $motor1 .= '<div class = "panel-heading">';
         $motor1 .= '<h4>'.$motor->titulo.'</h4>';
         $motor1 .= '</div>';
         $motor1 .= '<div class ="panel-body">';
         $motor1 .= '<figure>';
         $motor1 .= '<img class = "img-responsive" src = '.$img.' alt = '.$motor->titulo.'/>';
         $motor1 .= '</figure>';
         $motor1 .= '<p>'.$motor->texto.'</p>';
         $motor1 .= '<p class = "esquerda"></p><p class="direita"><a href = '.$motor->link.' class = "btn btn-primary">Saiba mais</a></p>';
         $motor1 .= '</div>';
         $motor1 .= '</div>';
         $motor1 .= '</div>';
    }
    $motor1 .= '</div>';
    echo $motor1;
}
function mostrarDestaques(){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT DISTINCT TOP(3) roteiro.id_roteiro, roteiro.cadastro, roteiro.ID_Status, roteiro.destaque,
                                              roteiro.nome, roteiro.validade, roteiro.preco,
                                              roteiro.precodescritivo, roteiro.imagem, roteiro.descritivo, roteiro.moeda,
                                              roteiro.cpf_cnpj, licenca.Diretorio
                                              FROM Roteiros.Roteiro roteiro
                                              LEFT JOIN Roteiros.Match match ON match.cpf_cnpj = :licenca AND match.RoteiroID = roteiro.id_roteiro
                                              INNER JOIN Licencas.Licenca licenca ON licenca.cpf_cnpj = roteiro.cpf_cnpj
                                              WHERE roteiro.destaque = 1 AND roteiro.ID_Status = 1 AND
                                              roteiro.validade > now()
                                              AND (roteiro.cpf_cnpj = :licenca2
                                              OR (SELECT MatchID FROM Roteiros.Match WHERE cpf_cnpj = :licenca3 AND RoteiroID = roteiro.id_roteiro AND destaque = 1) <> '')
                                              ORDER BY roteiro.cadastro ASC");
              $licenca = LICENCA;
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':licenca2', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':licenca3', $licenca, PDO::PARAM_STR);
             $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function mostrardestaquesSistemaNovo(){
    $cpf_cnpj = LICENCA;
    try{
        $conn = conectar_pgsql('Roteiros', '179.188.16.134 ');

        $stmt = $conn->prepare("SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                            FROM roteiros_site_view
                            WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() LIMIT 3");
                            
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}

function mostrardestaquesSistemaNovo6(){
    $cpf_cnpj = LICENCA;
    try{
        $conn = conectar_pgsql('Roteiros', '179.188.16.134 ');

        $stmt = $conn->prepare("SELECT *
                            FROM roteiros
                            WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1 LIMIT 9");
                            
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}

function mostrardestaquesPosts(){
  $licenca = LICENCA;
   try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT cpf_cnpj, id, titulo, descricao, imagem, link, status, Rede, Data FROM site.Posts
             WHERE cpf_cnpj = '$licenca' AND status = 1 LIMIT 5");
             
             $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function mostrardestaquesSistemaNovoModelos(){
    $cpf_cnpj = LICENCA;

    $ordenacao = ORDENACAO_ROTEIROS;
      if ($ordenacao == '1') {
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY cadastro DESC LIMIT 12";
      }else if ($ordenacao == '2') {
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY nome ASC LIMIT 12";
      }else if ($ordenacao == '3') {
        $sq_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY preco ASC LIMIT 12";
      }else if ($ordenacao == '4') {
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY validade ASC LIMIT 12";
      }else{
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY validade DESC LIMIT 12";
      }

   try{
        $conn = conectar_pgsql('Roteiros', '179.188.16.134');
        $stmt = $conn->prepare($sql_roteiros);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}

function mostrardestaquesSistemaNovoModelosComBanner(){
    $cpf_cnpj = LICENCA;

    $ordenacao = ORDENACAO_ROTEIROS;
      if ($ordenacao == '1') {
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY cadastro DESC LIMIT 9";
      }else if ($ordenacao == '2') {
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY nome ASC LIMIT 9";
      }else if ($ordenacao == '3') {
        $sq_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY preco ASC LIMIT 9";
      }else if ($ordenacao == '4') {
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY validade DESC LIMIT 9";
      }else{
        $sql_roteiros = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
                                FROM roteiros
                                WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now() AND destaque = 1  ORDER BY validade DESC LIMIT 9";
      }

   try{
        $conn = conectar_pgsql('Roteiros', '179.188.16.134');
        $stmt = $conn->prepare($sql_roteiros);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}

function mostrardestaquesMaior(){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT DISTINCT TOP(6) roteiro.id_roteiro, roteiro.cadastro, roteiro.ID_Status, roteiro.destaque,
                                              roteiro.nome, roteiro.validade, roteiro.preco,
                                              roteiro.precodescritivo, roteiro.imagem, roteiro.descritivo, roteiro.moeda,
                                              roteiro.cpf_cnpj, licenca.Diretorio
                                              FROM Roteiros.Roteiro roteiro
                                              LEFT JOIN Roteiros.Match match ON match.cpf_cnpj = :licenca AND match.RoteiroID = roteiro.id_roteiro
                                              INNER JOIN Licencas.Licenca licenca ON licenca.cpf_cnpj = roteiro.cpf_cnpj
                                              WHERE roteiro.destaque = 1 AND roteiro.ID_Status = 1 AND
                                              roteiro.validade > CAST(GETDATE() AS DATE)
                                              AND (roteiro.cpf_cnpj = :licenca2
                                              OR (SELECT MatchID FROM Roteiros.Match WHERE cpf_cnpj = :licenca3 AND RoteiroID = roteiro.id_roteiro AND destaque = 1) <> '')
                                              ORDER BY roteiro.cadastro DESC");
              $licenca = LICENCA;
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':licenca2', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':licenca3', $licenca, PDO::PARAM_STR);
             $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function escrever_Roteiros_Padrao(){
    $destaques = mostrardestaques();
    $roteiro1 .= '<div class="container">';
    if($destaques[0] <> ''){
    
    $roteiro1 .= '<div class="row">';
    foreach ($destaques as $destaque){
    $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
    $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
    if($destaque->preco == 0 OR $destaque->preco == '0,00'){
    $preco = "Sob consulta";
    }
    $roteiro1 .= '<article class="col-sm-4 mobi">';
    $roteiro1 .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
    $roteiro1 .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$destaque->nome.'</p>';
    $roteiro1 .= '<div class="col-md-12 margin_desconto pos_pacote2">';
    $roteiro1 .= '<div class="col-md-12">';
    $roteiro1 .= '<p class="preco">'.$preco.'</p>';
    $roteiro1 .= '</div>';
    $roteiro1 .= '</div>';
    $roteiro1 .= '</section>';
    $roteiro1 .= '<section class="newsText color4 descritivo-pacote">';
    $roteiro1 .= '<p>'.$destaque->descritivo.'</p>';
    $roteiro1 .= '<a href="/roteiro/'.$destaque->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
    $roteiro1 .= '</section></article>';
    
    }
    $roteiro1 .= '</div>';
    }
    $roteiro1 .= '</div>';
    echo $roteiro1;
}
function escrever_Roteiro_destaque(){
    $destaques = mostrardestaques();
    $rt .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-roteirodestaque.css">';
    $rt .= '<section class="slice slice_roteiros" id="news">';
    $rt .= '<div class="container imgHover">';
    $rt .= '<div class="row">';
    $rt .= '<div class="col-xs-12">';
    $rt .= '<h1 class="title-rot">Nossos Roteiros</h1>';
    $rt .= '<h2 class="subTitle">Nossas melhores ofertas você encontra aqui.</h2>';
    $rt .= '</div></div></div>';
    $rt .= '</section>';
    
    echo $rt;
    $roteiro1 .= '<div class="container">';
    if($destaques[0] <> ''){
    
    $roteiro1 .= '<div class="row">';
    foreach ($destaques as $destaque){
    $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
    $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
    if($destaque->preco == 0 OR $destaque->preco == '0,00'){
    $preco = "Sob consulta";
    }
    $roteiro1 .= '<article class="col-sm-4 mobi">';
    $roteiro1 .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
    $roteiro1 .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$destaque->nome.'</p>';
    $roteiro1 .= '<div class="col-md-12 margin_desconto pos_pacote2">';
    $roteiro1 .= '<div class="col-md-12">';
    $roteiro1 .= '<p class="preco">'.$preco.'</p>';
    $roteiro1 .= '</div>';
    $roteiro1 .= '</div>';
    $roteiro1 .= '</section>';
    $roteiro1 .= '<section class="newsText color4 descritivo-pacote">';
    $roteiro1 .= '<p>'.$destaque->descritivo.'</p>';
    $roteiro1 .= '<a href="/roteiro/'.$destaque->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
    $roteiro1 .= '</section></article>';
    
    }
    $roteiro1 .= '</div>';
    }
    $roteiro1 .= '</div>';
    echo $roteiro1;
    $rt2 .= '<section class="color4 slice tam1">';
    $rt2 .= '<div class="ctaBox ctaBoxFullwidth">';
    $rt2 .= '<div class="container">';
    $rt2 .= '<div class="row">';
    $rt2 .= '<div class="col-md-7">';
    $rt2 .= '<h1>';
    $rt2 .= '<strong>Roteiros Turísticos</strong> para lazer, corporativo ou momentos especiais.';
    $rt2 .= '</h1><!--<h1>';
    $rt2 .= '<strong>Site Turístico da Montenegro</strong> dispõe de várias funcionalidades que ajudam o agente de viagens na captação de vendas!';
    $rt2 .= '</h1>-->';
    $rt2 .= '</div>';
    $rt2 .= '<div class="col-md-5">';
    $rt2 .= '<div class="mediaHover">';
    $rt2 .= '<div class="mask"></div>';
    $rt2 .= '<a class="btn btn-lg" href="/mais-roteiros">';
    $rt2 .= '<i class="icon-globe"></i> Veja mais Roteiros</a>';
    $rt2 .= '</div></div></div></div></section>';
    echo $rt2;
}
function escreverLogo(){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT Logo FROM Licencas.Licenca WHERE cpf_cnpj = '1'"); 
             $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function escrever_Roteiros_Modelo21(){
    $destaques = mostrardestaques();
    $roteiro1 .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-roteirosModelo21.css">';
    $roteiro1 .= '<section id="roteiros" class="container js-list-item roteirosIndex">';
    $roteiro1 .= '<h1 class="head-title">Promoções <span></span></h1>';
    $roteiro1 .= '<span class="dest"></span>';
    if($destaques[0] <> ''){
    foreach ($destaques as $destaque){
    $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
    $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
    if($destaque->preco == 0 OR $destaque->preco == '0,00'){
    $preco = "Sob consulta";
    }
    $roteiro1 .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $roteiro1 .= '<figure style="background-image:url(\''.$img.'\')" class="roteiros">';
    $roteiro1 .= '<a href="/pr-roteiro/'.$destaque->id_roteiro.'" class="link_caixa">';
    $roteiro1 .= '<figcaption>';
    $roteiro1 .= '<div class="wrapper caixa">';
    $roteiro1 .= '<h1 class="txt_caixa" align="center"><span class="cifrao"></span>'.$preco.'</h1>';
    $roteiro1 .= '</div></figcaption></a></figure>';
    $roteiro1 .= '<h4>'.$destaque->nome.'</h4>';
    $roteiro1 .= '<p>'.$destaque->descritivo.'</p>';
    $roteiro1 .= '<p><a href="/pr-roteiro/'.$destaque->id_roteiro.'" class="btn botaoRoteiroPR">Saiba Mais</a></p></div>';
    $roteiro1 .= '</div>';
    }
    $roteiro1 .= '</section>';
    }
    $roteiro1 .= '</section>';
    echo $roteiro1;
}
function escrever_Roteiros_Modelo21_Maior(){
    $destaques = mostrardestaquesMaior();
    $roteiro1 .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-roteirosModelo21.css">';
    $roteiro1 .= '<section id="roteiros" class="container js-list-item roteirosIndex">';
    $roteiro1 .= '<h1 class="head-title">Pacotes <span></span></h1>';
    $roteiro1 .= '<span class="dest"></span>';
    if($destaques[0] <> ''){
    foreach ($destaques as $destaque){
    $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
    $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
    if($destaque->preco == 0 OR $destaque->preco == '0,00'){
    $preco = "Sob consulta";
    }
    $roteiro1 .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $roteiro1 .= '<figure style="background-image:url(\''.$img.'\')" class="roteiros">';
    $roteiro1 .= '<a href="/pr-roteiro/'.$destaque->id_roteiro.'" class="link_caixa">';
    $roteiro1 .= '<figcaption>';
    $roteiro1 .= '<div class="wrapper caixa">';
    $roteiro1 .= '<h1 class="txt_caixa" align="center"><span class="cifrao"></span>'.$preco.'</h1>';
    $roteiro1 .= '</div></figcaption></a></figure>';
    $roteiro1 .= '<h4>'.$destaque->nome.'</h4>';
    $roteiro1 .= '<p>'.$destaque->descritivo.'</p>';
    $roteiro1 .= '<p><a href="/pr-roteiro/'.$destaque->id_roteiro.'" class="btn botaoRoteiroPR">Saiba Mais</a></p></div>';
    $roteiro1 .= '</div>';
    }
    $roteiro1 .= '</section>';
    }
    $roteiro1 .= '</section>';
    echo $roteiro1;
}
function escrever_Pacotes_Modelo21(){
    $pacotes .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-pacotesModelo21.css">';
    $pacotes .= '<section id="destination" class="container js-list-item">';
    $pacotes .= '<h1 class="head-title">Roteiros <span></span></h1>';
    $pacotes .= '<span class="dest"></span>';
    $bannerPacotes = gerarNovoBanner(2);
    foreach ($bannerPacotes as $pacote) {
    $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
    $pacotes .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $pacotes .= '<figure style="background-image:url(\''.$img.'\')" class="roteiros">';
    $pacotes .= '<a href="http://'.$_SERVER['SERVER_NAME'].''.$pacote->link.'" class="link_caixa"><figcaption>';
    $pacotes .= '<div class="wrapper caixa">';
    $pacotes .= '<h1 class="txt_caixa" align="center">Veja Mais</h1>';
    $pacotes .= '</div></figcaption></a></figure>';
    $pacotes .= '<h4>'.$pacote->titulo.'</h4>';
    $pacotes .= '<p style="height: 46px !important;">'.$pacote->texto.'</p>';
    //$pacotes .= '<p class="pacotes"><a href="/pr-pacotes/'.$pacote->id.'" class="btn">Saiba Mais</a></p></div>';
    $pacotes .= '<p class="pacotes"><a href=" http://'.$_SERVER['SERVER_NAME'].''.$pacote->link.'" class="btn botaoPacotePR">Saiba Mais</a></p><br></div>';
    
    }
    
    $pacotes .= '</section>';
    echo $pacotes;
}
function escreverMotoresModelo12(){
    $bannerMotores = gerarNovoBanner(3);
    $motor12 .= '<div class="row pacotes">';
    foreach ($motorBanner as $motor) {
        $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
        $motor12 .= '<div class="col-md-4 col-sm-4">';
        $motor12 .= '<div class="panel panel-default">';
        $motor12 .= '<div class="panel-heading"><h4>'.$motor->titulo.'</h4></div>';
        $motor12 .= '<div class="panel-body">';
        $motor12 .= '<figure><img src="'.$img.'" alt="'.$motor->titulo.'"/></figure>';
        $motor12 .= '<p>'.$motor->texto.'</p>';
        $motor12 .= '<p class="esquerda"><a href="'.$motor->link.'" class="btn btn-primary">Saiba mais</a></p>';
        $motor12 .= '</div></div></div>';
    }
    $motor12 .= '</div>';
    echo $motor12;
}
function escrever_Parallax_Cruzeiros(){
    $parallax .= '<link href="/CMS/Modelo01/source/bootstrap/bootstrap.css" rel="stylesheet">';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/style/style.css"/>';
    $parallax .= '<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->';
    $parallax .= '<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->';
    $parallax .= '<!--[if lt IE 9]>';
    $parallax .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
    $parallax .= '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
    $parallax .= '<![endif]-->';
    $parallax .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/dzsscroller/scroller.css"/>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/dzsparallaxer/dzsparallaxer.css"/>';
    $parallax .= '<div class="dzsparallaxer auto-init simple-parallax use-loading" style="height: 400px;">';
    $parallax .= '<div class="divimage dzsparallaxer--target " data-src="http://portobello.taurusmulticanal.com.br/CMS/portobello/images/parallaxTraveler2.jpg" style="">';
    $parallax .= '</div>';
    $parallax .= '<div class="semi-black-overlay"></div> -->';
    $parallax .= '<div class="preloader-semicircles"></div>';
    $parallax .= '<div class="big-text center-it">CRUZEIROS FLUVIAIS<br><a href="/pr-pacote/356"><button class="exp">Saiba Mais</button></a></div></div>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/fontawesome/font-awesome.min.css"/>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/advancedscroller/plugin.css"/>';
    $parallax .= '<script src="/CMS/Modelo01/source/advancedscroller/plugin.js" type="text/javascript"></script>';
    $parallax .= '<script src="/CMS/Modelo01/source/dzsparallaxer/dzsparallaxer.js" type="text/javascript"></script>';
    $parallax .= '<script src="/CMS/Modelo01/source/dzsscroller/scroller.js" type="text/javascript"></script>';
    echo $parallax;
}
function escrever_Parallax_Experiencias(){
    $parallax .= '<link href="/CMS/Modelo01/source/bootstrap/bootstrap.css" rel="stylesheet">';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/style/style.css"/>';
    $parallax .= '<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->';
    $parallax .= '<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->';
    $parallax .= '<!--[if lt IE 9]>';
    $parallax .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
    $parallax .= '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
    $parallax .= '<![endif]-->';
    $parallax .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/dzsscroller/scroller.css"/>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/dzsparallaxer/dzsparallaxer.css"/>';
    $parallax .= '<div class="dzsparallaxer auto-init simple-parallax use-loading" style="height: 400px;">';
    $parallax .= '<div class="divimage dzsparallaxer--target " data-src="http://portobello.taurusmulticanal.com.br/CMS/portobello/images/parallaxTraveler1.jpg" style="">';
    $parallax .= '</div>';
    $parallax .= '<!-- <div class="semi-black-overlay"></div> -->';
    $parallax .= '<<div class="preloader-semicircles"></div>';
    $parallax .= '<div class="big-text center-it">EXPERIÊNCIAS INESQUECÍVEIS<br><a href="#"><button class="exp">Em breve</button></a></div></div>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/fontawesome/font-awesome.min.css"/>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/advancedscroller/plugin.css"/>';
    $parallax .= '<script src="/CMS/Modelo01/source/advancedscroller/plugin.js" type="text/javascript"></script>';
    $parallax .= '<script src="/CMS/Modelo01/source/dzsparallaxer/dzsparallaxer.js" type="text/javascript"></script>';
    $parallax .= '<script src="/CMS/Modelo01/source/dzsscroller/scroller.js" type="text/javascript"></script>';
    echo $parallax;
}
function escrever_Parallax_Experiencias_NX(){
    $parallax .= '<link href="/CMS/Modelo01/source/bootstrap/bootstrap.css" rel="stylesheet">';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/style/style.css"/>';
    $parallax .= '<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->';
    $parallax .= '<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->';
    $parallax .= '<!--[if lt IE 9]>';
    $parallax .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
    $parallax .= '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
    $parallax .= '<![endif]-->';
    $parallax .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/dzsscroller/scroller.css"/>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/dzsparallaxer/dzsparallaxer.css"/>';
    $parallax .= '<div class="dzsparallaxer auto-init simple-parallax use-loading" style="height: 400px;">';
    $parallax .= '<div class="divimage dzsparallaxer--target " data-src="/CMS/Modelo01/images/parallax1.jpg" style="">';
    $parallax .= '</div>';
    $parallax .= '<!-- <div class="semi-black-overlay"></div> -->';
    $parallax .= '<<div class="preloader-semicircles"></div>';
    $parallax .= '<div class="big-text center-it">EXPERIÊNCIAS INESQUECÍVEIS<br><a href="/pr-promocoes"><button class="exp">CONFIRA</button></a></div></div>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/fontawesome/font-awesome.min.css"/>';
    $parallax .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/source/advancedscroller/plugin.css"/>';
    $parallax .= '<script src="/CMS/Modelo01/source/advancedscroller/plugin.js" type="text/javascript"></script>';
    $parallax .= '<script src="/CMS/Modelo01/source/dzsparallaxer/dzsparallaxer.js" type="text/javascript"></script>';
    $parallax .= '<script src="/CMS/Modelo01/source/dzsscroller/scroller.js" type="text/javascript"></script>';
    echo $parallax;
}
function escrever_SobreNos_Padrao(){
    $sbr .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-sobreNosPadrao.css">';
    $sbr .= '<section class="slice" id="about">';
    $sbr .= '<div class="container">';
    $sbr .= '<div class="row">';
    $sbr .= '<div class="col-xs-12">';
    $sbr .= '<h1 class="title-rot">SOBRE NOSSA AGÊNCIA</h1>';
    $sbr .= '<h2 class="subTitle"></h2>';
    $sbr .= '</div></div>';
    $sbr .= '<div class="row">';
    $sbr .= '<div class="col-sm-8 sobreTexto">';
    $sbr .= '<p>'.SOBRETEXTO.'</p>';
    $sbr .= '</div></div></div>';
    $sbr .= '</section>';
    echo $sbr;
}
function escreve_SobreNos_imagem(){
    $sbr .= '<section class="slice" id="about">';
    $sbr .= '<div class="container">';
    $sbr .= '<div class="row">';
    $sbr .= '<div class="col-xs-12">';
    $sbr .= '<h1 class="title-rot">SOBRE NOSSA AGÊNCIA</h1>';
    $sbr .= '<h2 class="subTitle"></h2>';
    $sbr .= '</div></div>';
    $sbr .= '<div class="row">';
    $sbr .= '<div class="col-sm-4"> <img src="'.getImageRoute(SOBREIMAGEM, 'imagens', DIRETORIO).'" alt="services" class="img-responsive"> </div>';
    $sbr .= '<div class="col-sm-8 sobreTexto">';
    $sbr .= '<p>'.SOBRETEXTO.'</p>';
    $sbr .= '</div></div></div></section>';
    echo $sbr;
}
function escrever_Newsletter_Padrao(){
    $news .= '<link rel="stylesheet" type="text/css" href="/CMS/Modelo01/css/css-NewsletterPadrao.css">';
    $news .= '<div id="paralaxSlice4" data-stellar-background-ratio="0.5" >';
    $news .= '<div class="maskParent">';
    $news .= '<div class="paralaxMask" style="height: auto;"></div>';
    $news .= '<div class="paralaxText">';
    $news .= '<blockquote>Assine nossas Newsletters!</blockquote>';
    $news .= '<div class="container">';
    $news .= '<div class="row news">';
    $news .= '<form  class="form-group formParalax" method="post" action="#">';
    $news .= '<div class="row">';
    $news .= '<div class="col-md-12" style="margin-left: -1%;">';
    $news .= '<p class="col-md-2 formHome">';
    $news .= '<input type="text" name="nome" value="" id="newsletternome" class="form-control input-sm formparalax" placeholder="Digite seu nome" required />';
    $news .= '</p>';
    $news .= '<p class="col-md-4 formHome">';
    $news .= '<input type="text" name="email" value="" id="newsletterEmail" class="form-control input-sm formparalax" placeholder="Digite seu e-mail" required />';
    $news .= '<input type="hidden" name="format" value="" id="validEmail" />';
    $news .= '</p>';
    $news .= '<p class="col-md-4 formHome">';
    $news .= '<img src="../../captcha.php?l=80&a=30&tf=14&ql=4" class="capcha">';
    $news .= '<input type="text" class="form-control input-sm formparalax" id="palavra_captcha" placeholder="Digite o texto da imagem" name="palavra_captcha" />';
    $news .= '</p><p class="col-md-2 formHome"><input type="button" value="Cadastre-se" class="pull-right aqui" onclick="gravarMailing()"/></p>';
    $news .= '</div></div></form></div</div></div></div></div>';
    echo $news;
}
function escreverPacotesModelo12(){
    $bannerPacotes = gerarNovoBanner(2);
    if($bannerPacotes[0] <> ''){
        $banner .= '<div class="row pacotes">';
        foreach ($bannerPacotes as $pacote) {
            $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
            $banner .= '<div class="col-md-4 col-sm-4">';
            $banner .= '<div class="panel panel-default n_border">';
            $banner .= '<div class="panel-heading n_border"><h4>'.$pacote->titulo.'</h4></div>';
            $banner .= '<div class="panel-body">';
            $banner .= '<figure><img src="'.$img.'" alt="'.$pacote->texto.'"></figure>';
            $banner .= '<p>'.$pacote->texto.'</p>';
            $banner .= '<a href="'.$pacote->link.'" class="btn btn-primary">Saiba Mais</a>';
            $banner .= '</div></div></div>';
        }
        $banner .= '</div>';
    }
    echo $banner;
}
/*function escreverMotoresModelo12(){
    $bannerMotores = gerarNovoBanner(3);
    $motor12 .= '<div class="row pacotes">';
    foreach ($motorBanner as $motor) {
        $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
        $motor12 .= '<div class="col-md-4 col-sm-4">';
        $motor12 .= '<div class="panel panel-default">';
        $motor12 .= '<div class="panel-heading"><h4>'.$motor->titulo.'</h4></div>';
        $motor12 .= '<div class="panel-body">';
        $motor12 .= '<figure><img src="'.$img.'" alt="'.$motor->titulo.'"/></figure>';
        $motor12 .= '<p>'.$motor->texto.'</p>';
        $motor12 .= '<p class="esquerda"><a href="'.$motor->link.'" class="btn btn-primary">Saiba mais</a></p>';
        $motor12 .= '</div></div></div>';
    }
    $motor12 .= '</div>';
    echo $motor12;
}*/
function escreverRoteirosModelo12(){
    $destaques = mostrardestaques();
    $roteiros12 .= '<div class="row">';
    if($destaques[0] <> ''){
        $roteiros12 .= '<div class="container roteiros2">';
        foreach ($destaques as $destaque){
            $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
            $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
            if($destaque->preco == 0){
                $preco = "Sob consulta";
            }
            $roteiros12 .= '<article class="col-sm-4 mobi">';
            $roteiros12 .= '<section class="imgWrapper" style="background-image:url('.$img.')">';
            $roteiros12 .= '<p class="maceio">'.$destaque->nome.'</p>';
            $roteiros12 .= '<p class="dest">'.$destaque->descritivo.'</p>';
            $roteiros12 .= '<div class="col-md-12 margin_desconto pos_pacote2">';
            $roteiros12 .= '<div class="col-md-6 col-xs-6 col-sm-6">';
            $roteiros12 .= '<p class="preco">'.$preco.'</p>';
            $roteiros12 .= '</div>';
            $roteiros12 .= '<div class="col-md-6 col-xs-6 col-sm-6">';
            $roteiros12 .= '<a href="/roteiro/'.$destaque->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
            $roteiros12 .= '</div></div></section>';
            $roteiros12 .= '<section class="newsText color4 descritivo-pacote"></section>';
            $roteiros12 .= '</article>';
        }
        $roteiros12 .= '</div>';
    }
    $roteiros12 .= '</div>';
    echo $roteiros12;
}
function escreverRoteirosModelo04(){
    $destaques = mostrardestaques();
    $roteiro1 .= '<div class="container">';
    if($destaques[0] <> ''){
    
    $roteiro1 .= '<div class="row">';
    $roteiro1 .= '<div class="col-lg-12">';
    $roteiro1 .= '<h1 class="page-header header-home">Roteiros</h1></div></div>';
    $roteiro1 .= '<div class="row">';
    foreach ($destaques as $destaque){
    $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
    $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
    if($destaque->preco == 0 OR $destaque->preco == '0,00'){
    $preco = "Sob consulta";
    }
    $roteiro1 .= '<article class="col-sm-4 mobi">';
    $roteiro1 .= '<div class="coluna-conteudo">';
    $roteiro1 .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
    $roteiro1 .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$destaque->nome.'</p>';
    $roteiro1 .= '<div class="col-md-12 margin_desconto pos_pacote2">';
    $roteiro1 .= '<div class="col-md-12">';
    $roteiro1 .= '<p class="preco"><?=$preco?></p>';
    $roteiro1 .= '</div>';
    $roteiro1 .= '</div>';
    $roteiro1 .= '</section>';
    $roteiro1 .= '<section class="newsText color4 descritivo-pacote">';
    $roteiro1 .= '<p>'.$destaque->descritivo.'</p>';
    $roteiro1 .= '<a href="/roteiro/'.$destaque->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
    $roteiro1 .= '</section></div></article>';
    
    }
    $roteiro1 .= '</div>';
    }
    $roteiro1 .= '</div>';
    echo $roteiro1;
}
function escreverRoteirosModelo03(){
    $destaques = mostrardestaques();
    $roteiro1 .= '<div class = "container">';
    $roteiro1 .= '<div class="row reset-row">';
    if($destaques[0] <> ''){
        $roteiro1 .= '<div class="row">';
        $roteiro1 .= '<div class="col-lg-12">';
        $roteiro1 .= '<h1 class="page-header header-home titrot">Roteiros</h1>';
        $roteiro1 .= '</div></div>';
        $roteiro1 .= '<div class="row">';
        foreach ($destaques as $destaque){
             $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
             $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
             if($destaque->preco == 0){
                $preco = "Sob consulta";
             }
            $roteiro1 .= '<article class="col-sm-6 col-md-4 mobi">';
            $roteiro1 .= '<section class="imgWrapper" style="background-image:url('.$img.')">';
            $roteiro1 .= '<p class="maceio">'.$destaque->nome.'</p>';
            $roteiro1 .= '<p class="dest">'.$destaque->descritivo.'</p>';
            $roteiro1 .= '<div class="col-md-12 margin_desconto pos_pacote2">';
            $roteiro1 .= '<div class="col-md-6 col-xs-6 col-sm-6">';
            $roteiro1 .= '<p class="preco">'.$preco.'</p>';
            $roteiro1 .= '</div>';
            $roteiro1 .= '<div class="col-md-6 col-xs-6 col-sm-6">';
            $roteiro1 .= '<a href="/roteiro/'.$destaque->id_roteiro.'" class="btn btn-sm pull-right">';
            $roteiro1 .= '<i class="icon-right-open-mini"></i>Saiba Mais';
            $roteiro1 .= '</a>';
            $roteiro1 .= '</div></div></section>';
            $roteiro1 .= '<section class="newsText color4 descritivo-pacote"></section></article>';
        }
        $roteiro1 .= '</div>';
    }
    $roteiro1 .= '</div></div>';
    echo $roteiro1;
}
function escreverGuiadoViajante(){
    $guia .= '<div class = "container">';
    $guia .= '<div class="row">';
    $guia .= '<div class="col-md-12">';
    $guia .= '<h2 class="page-header new-header another_h pacot2 ttviaj">Guia do <span>viajante</span></h2>';
    $guia .= '</div>';
    $guia .= '<div class="col-md-6 img xp_img">';
    $guia .= '<figure><img src="CMS/Modelo03/images/guia.png" alt="Guia do Viajante" class = "img img-responsive imguia"></figure>';
    $guia .= '</div>';
    $guia .= '<div class="col-md-6">';
    $guia .= '<h3 class="guia media ttguia">Faça o download do <span>guia</span></h3>';
    $guia .= '<div class="media mediaguia">';
    $guia .= '<div class="pull-left"><span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-briefcase fa-stack-1x fa-inverse"></i></span></div>';
    $guia .= '<div class="media-body"><h4 class="media-heading">Informações sobre bagagem</h4><p><a class = "aguia" href="bagagem">Aqui você encontra todas as informações necessárias sobre extravio de bagagem, bagagem danificada e furto de bagagem.</a></p></div>';
    $guia .= '</div>';
    $guia .= '<div class="media mediaguia">';
    $guia .= '<div class="pull-left"><span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-plane fa-stack-1x fa-inverse"></i></span></div>';
    $guia .= '<div class="media-body"><h4 class="media-heading">Check-in online</h4><p><a class = "aguia" href="web-checkin">Com o Web Check-in, você realiza o seu check-in em voos operados pelas melhores companhias aéreas.</a></p></div>';
    $guia .= '</div>';
    $guia .= '<div class="media mediaguia">';
    $guia .= '<div class="pull-left"><span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span></div>';
    $guia .= '<div class="media-body"><h4 class="media-heading">Direitos do passageiro</h4><p><a class = "aguia" href="documentos">Confira toda a documentação necessária para sua viagem. </a></p></div>';
    $guia .= '</div>';
    $guia .= '<p class="buttom media"><a href="http://abear.com.br/experiencia-de-voar/guia-de-passageiros" class="btn btn-primary" target="_blank">Download</a></p>';
    $guia .= '</div></div></div></div></div>';
    echo $guia;
}
function escreverMapa(){
    $mapa .= '<input type="hidden" id="email_hidden" value='.EMAIL.'>';
    if (strpos(LATITUDE, '1') !== false && (strpos(LONGITUDE, '1') !== false)) {
        $mapa .= '<div class="google-map">';
        $mapa .= '<input type="hidden" id="latitude_map" value='.LATITUDE.'>';
        $mapa .= '<input type="hidden" id="longitude_map" value='.LONGITUDE.'>';
        $mapa .= '<input type="hidden" id="endereco_map" value='.ENDERECO.'>';
        $mapa .= '<input type="hidden" id="cidade_map" value='.CIDADE.'>';
        $mapa .= '<input type="hidden" id="estado_map" value='.ESTADO.'>';
        $mapa .= '<div id="mapa" class="mapa" style="height: 250px; width: 100% "></div>';
        $mapa .= '</div></div>';
    }
    echo $mapa;
}
function escreverBlog(){
    if(trim(RSS) <> ''){
        $blog .= '<div class="col-md-6">';
        $blog .= '<h2 class="page-header">Notícias</h2>';
        // permite requisições a urls externas
        ini_set('allow_url_fopen', 1);
        ini_set('allow_url_include', 1);
        // caminho do feed do meu blog
        //$feed = 'http://www.panrotas.com.br/feeds/';
        $feed = RSS;
        // leitura do feed
        $rss = simplexml_load_file($feed);
        // limite de itens
        $limit = 7;
        // contador
        $count = 0;
        $noticia = '';
        // imprime os itens do feed
        if($rss){
            foreach ( $rss->channel->item as $item ){
                // formata e imprime uma string
                $blog .=  "<div class='panrotas_destaque'><span><a target='blank' href='".$item->link."'>".$item->title."</a></span></div>";
                // incrementamos a variável $count
                $count++;
                // caso nosso contador seja igual ao limite paramos a iteração
                if($count == $limit) break;
            }
        }else{
            echo 'Não foi possível acessar o blog.';
        }
        $blog .= '</div>';
        echo $blog;
    }
}
function escreverRoteirosModelo02(){
    $roteiro = mostrardestaques();
    $roteiro .= '<div class="container top_dif">';
    $roteiro .= '<div class="row pct">';
    $roteiro .= '<div class="row pct">';
    if($destaques[0] <> ''){
        $roteiro .= '<div class="row">';
        $roteiro .= '<div class="col-lg-12">';
        $roteiro .= '<h1 class="page-header header-home">Roteiros</h1>';
        $roteiro .= '</div></div>';
        $roteiro .= '<div class="row">';
        foreach ($destaques as $destaque){
            $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
            $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
            if($destaque->preco == 0){
                $preco = "Sob consulta";
            }
            $roteiro .= '<article class="col-sm-4 mobi">';
            $roteiro .= '<section class="imgWrapper" style="background-image:url('.$img.')">';
            $roteiro .= '<p class="maceio">'.$destaque->nome.'</p>';
            $roteiro .= '<p class="dest">'.$destaque->descritivo.'</p>';
            $roteiro .= '<div class="col-md-12 margin_desconto pos_pacote2">';
            $roteiro .= '<div class="col-md-6 col-xs-6 col-sm-6">';
            $roteiro .= '<p class="preco">'.$preco.'</p>';
            $roteiro .= '</div>';
            $roteiro .= '<div class="col-md-6 col-xs-6 col-sm-6">';
            $roteiro .= '<a href="/roteiro/'.$destaque->id_roteiro.'" class="btn btn-sm pull-right">';
            $roteiro .= '<i class="icon-right-open-mini"></i>Saiba Mais';
            $roteiro .= '</a>';
            $roteiro .= '</div></div></section>';
            $roteiro .= '<section class="newsText color4 descritivo-pacote"></section>';
            $roteiro .= '</article>';
        }
        $roteiro .= '</div>';
    }
    $roteiro .= '</div></div></div>';
    echo $roteiro;
}
function escreveParallaxModelo2(){
    $prl .= '<div class="container-fluid">';
    $prl .= '<div class="row parallax">';
    $prl .= '<div class="col-md-12 text">';
    $prl .= '<h2 class="page-header">Conheça nossos serviços!</h2>';
    $prl .= '<p>Para você que deseja realizar reservas em hotéis, comprar passagens, alugar um carro ou contrar seguro viagem para ter uma viagem tranquila, ofercemos os melhores produtos com as melhores condições!</p>';
    $prl .= '<p>';
    $prl .= '<a class="btn btn-primary btn-lg botao" href="/servicos" role="button">Saiba Mais »</a>';
    $prl .= '</p>';
    $prl .= '</div>';
    $prl .= '</div>';
    $prl .= '</div>';
    echo $prl;
}
function escreverMotoresModelo2(){
    $motor .= '<div class=row>';
    $motor .= '<section class="row reset-row conteudo">';
    foreach ($bannerMotores as $motor) {
        $img = getImageRoute($motor->imagem, 'imagens', DIRETORIO);
        $motor .= '<div class="col-md-4 col-sm-6">';
        $motor .= '<div class="destaque2">';
        $motor .= '<h2 class="page-header">'.$motor->titulo.'</h2>';
        $motor .= '<figure><img src="'.$img.'" alt="'.$motor->titulo.'" class="img-responsive"/></figure>';
        $motor .= '<p class="esquerda"><?=$motor->texto?></p>';
        $motor .= '<p class="direita"><a href="<?=$motor->link?>" class="btn btn-primary">Saiba mais</a></p>';
        $motor .= '</div></div>';
    }
    $motor .= '</section></div>';
    echo $motor;
}
function roteiroView($roteiro){
                  $licenca = LICENCA;
        try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT roteiro.id_roteiro, roteiro.nome, roteiro.ID_Categoria, roteiro.validade, roteiro.preco,
                                    roteiro.precodescritivo, roteiro.imagem, roteiro.descritivo, roteiro.moeda, roteiro.cpf_cnpj,
                                    licenca.Diretorio
                                    FROM Roteiros.Roteiro roteiro
                                    INNER JOIN Licencas.Licenca licenca ON roteiro.cpf_cnpj = licenca.cpf_cnpj
                                    WHERE roteiro.id_roteiro = :roteiro AND roteiro.ID_Status = '1'");
             $stmt->bindParam(':roteiro', $roteiro, PDO::PARAM_STR);
             if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
              }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function roteiroViewNovo($id){
        $licenca = LICENCA;
        try{
          $conn = conectar_pgsql('Roteiros', '179.188.16.134');
          $stmt = $conn->prepare("SELECT id_roteiro, nome, validade, preco,
                                precodescritivo, imagem, descritivo, moeda, TipoDetalhe,saida
                                FROM roteiros
                                WHERE id_roteiro = $id AND ID_Status = '1' AND validade > now()");
                                
          if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
          }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function buscaPost($id){
        $licenca = LICENCA;
        try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id, cpf_cnpj,Rede, titulo, descricao, link,status, imagem,Data
             FROM site.Posts
             WHERE id = $id AND status = '1'");
             
             if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
              }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function roteiroViewNovoServicos($id){
        $licenca = LICENCA;
        try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id_roteiro, nome, validade, preco,
                                    precodescritivo, imagem, descritivo, moeda, TipoDetalhe,saida
                                    FROM A_Roteiros.Roteiros
                                    WHERE id_roteiro = :id AND ID_Status = '1'");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
              }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function eventoDados($id){
        $licenca = LICENCA;
        try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT * FROM A_Eventos.Eventos
                                    WHERE ID_Evento = :id AND ID_Status = '1'");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
              }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function hotelQuartoDados($id){
        $licenca = LICENCA;
        try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT hotel.ID_Hotel, hotel.ID_Status, hotel.Logo, hotel.nome, hotel.Estrelas, hotel.Taxas, hotel.TaxasOpcional, hotel.ISS, hotel.Endereco, hotel.Numero, hotel.Cidade, hotel.Estado, hotel.Complemento, hotel.Latitude, hotel.Longitude, hotel.Informacoes,ap.ID_Apartamento,ap.Categoria, ap.PAX, ap.MinimoDiarias, cast(ap.DiariaDom AS NUMERIC(15,2)) AS Diaria,  ap.DiariaDom, ap.DiariaSeg, ap.DiariaTer, ap.DiariaQua, ap.DiariaQui, ap.DiariaSex, ap.DiariaSab, ap.Bloqueio
              FROM Reservas.Hoteis hotel
              INNER JOIN Reservas.Apartamentos ap ON hotel.ID_Hotel = ap.ID_Hotel
              WHERE ap.ID_Apartamento = :id AND ap.ID_Status = '1'");
             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
             if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
              }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function mostrarMotor($MotorDescricaoID){
             $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id, link, id_descricao, destaque, id_tipo
             FROM Motores.Motor
             WHERE cpf_cnpj = '$licenca' AND id_descricao = $MotorDescricaoID");
             
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function mostrarMotorUnico(){
    $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT TOP 1 * FROM  Motores.Motor where cpf_cnpj = :licenca AND Motordestaque = 1 ORDER BY Alteracao DESC");
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
 
function mostrarGaleriaTitulo($galeriaID){
    $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT nome FROM  site.galeria where GaleriaID = :galeriaID");
             $stmt->bindParam(':galeriaID', $galeriaID, PDO::PARAM_STR);
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function mostrarMotorFormulario($MotorDescricaoID){
             $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT MotorID, link, MotorDescricaoID, Motordestaque, TipoID
                                    FROM Motores.Motor
                                    WHERE cpf_cnpj = :licenca AND Motordestaque = :MotorDescricaoID");
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':MotorDescricaoID', $MotorDescricaoID, PDO::PARAM_STR);
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function escreveParallaxModelo1(){
  $prl .= '<link rel="stylesheet" type="text/css" href="/CMS/modelo01/css/css-ParallaxModelo1.css">';
  $prl .= '<div class="container-fluid">';
  $prl .= '<div class="row parallax">';
  $prl .= '<div class="col-md-12 text">';
  $prl .= '<h2 class="page-header">Conheça nossos pacotes!</h2>';
  $prl .= '<p>Para você que deseja conhecer novos destinos nacionais e internacionais, oferecemos os melhores pacotes com roteiros de tirar o fôlego! Tudo isso com as melhores condições e tarifas!</p>';
  $prl .= '<p>';
  $prl .= '<a class="btn" href="/pacotes" role="button">Saiba Mais »</a>';
  $prl .= '</p>';
  $prl .= '</div>';
  $prl .= '</div>';
  $prl .= '</div>';
  echo $prl;
}
function acessoFaturaDelivery(){
             $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT link FROM SelfBooking.Links 
             WHERE id_descricao = '6' AND cpf_cnpj = '$licenca'");
             
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function selfBookingIndex(){
    $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT * FROM SelfBooking.Links WHERE cpf_cnpj = '$licenca' AND destaque = '1' ORDER BY alteracao DESC LIMIT 1");
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function mostraMotorPorTipo(){
             $licenca = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id, link, id_descricao, destaque, id_tipo
             FROM Motores.Motor
             WHERE cpf_cnpj = '$licenca' AND id_tipo = '1'");
             
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetch(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function mostraMotorIcone(){

    $cpf_cnpj = LICENCA;

    try{

        $conn = conectar_pgsql('CMS');
        $stmt = $conn->prepare("SELECT * FROM motores.motor WHERE cpf_cnpj = '$cpf_cnpj' AND exibiritem = '1' ORDER BY alteracao DESC");
        $stmt->execute();

        if($stmt->rowCount() != 0){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}

function mostraMotorIconeQuatro(){
             $cpf_cnpj = LICENCA;
     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT * FROM Motores.Motor WHERE cpf_cnpj = '$cpf_cnpj' AND ExibirItem = '1' ORDER BY Alteracao DESC LIMIT 4");
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetchAll(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function mostraMotorIconeSemLimitessss(){
             $cpf_cnpj = LICENCA;



    $ordenacao_pacotes = ORDENACAO_SERVICOS;
    if ($ordenacao_pacotes == 1) {
      $ordem_pacotes = "Alteracao ASC";
    }else if ($ordenacao_pacotes == 2) {
      $ordem_pacotes = "Alteracao DESC"; 
    }else if ($ordenacao_pacotes == 3) {
      $ordem_pacotes = "Titulo ASC"; 
    }else if ($ordenacao_pacotes == 4) {
      $ordem_pacotes = "Titulo DESC"; 
    }else{
      $ordem_pacotes = "Alteracao ASC";
    }

     try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT * FROM Motores.Motor WHERE cpf_cnpj = '$cpf_cnpj' AND ExibirItem = '1' ORDER BY $ordem_pacotes");
             $stmt->execute();
             if($stmt->rowCount() != 0){
              return $stmt->fetchAll(PDO::FETCH_OBJ);
             }
          }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function listarCategorias($nivel){
    $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT categoria.CategoriaID, categoria.nome,
          categoria.CategoriaPai, categoria.Nivel,
          categoria.descricao, categoria.imagem, categoria.status
          FROM Links.LicencaMatch match
          INNER JOIN Links.Categoria categoria
          ON categoria.CategoriaID = match.CategoriaID
          WHERE categoria.CategoriaPai = :nivel AND categoria.status = 1
          AND match.cpf_cnpj = '$licenca'
          ORDER BY nome";
        $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nivel', $nivel, PDO::PARAM_STR);
            $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetchAll( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listarCategoriasExibir(){
  $cpf_cnpj = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
     
        $sql = "SELECT DISTINCT match.id_categoria, categoria.nome 
        FROM Links.match match
        INNER JOIN Links.Categoria categoria ON match.id_categoria = categoria.id
        WHERE categoria.status = 1
        AND match.cpf_cnpj = '$cpf_cnpj'";
      
      
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetchAll( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listarCategorias2($nivel){
    $cpf_cnpj = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
     
        $sql = "SELECT DISTINCT match.id_categoria, categoria.nome,
        categoria.Nivel1, categoria.Nivel2,
        categoria.descricao, categoria.imagem, categoria.status
        FROM Links.match match
        INNER JOIN Links.Categoria categoria
        ON categoria.id = match.ID_Categoria
        WHERE categoria.Nivel1 = $nivel AND categoria.status = 1
        AND match.cpf_cnpj = '$cpf_cnpj'";
      
      
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetchAll( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listarRoteiros($categoria){
    $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT LinkID, nome, Categoria, destaque, status, Operadora, Iframe
          FROM Links.link
          WHERE Categoria = :categoria AND status = 1
          ORDER BY nome";
        $stmt = $conn->prepare($sql);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetchAll( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function listarnomeCaminho($nivel){
    $cpf_cnpj = LICENCA;
    try{
      $conn = conectar_pgsql('CMS');
      $sql = "SELECT categoria.nome,cat.nome AS Categoria1, cat.id AS ID_Categoria1,categoria.status
      FROM Links.match match
      INNER JOIN Links.Categoria categoria
      ON categoria.id = match.ID_Categoria
      INNER JOIN Links.Categoria cat
      ON cat.id = categoria.Nivel1
      WHERE categoria.Nivel1 = $nivel AND categoria.status = 1
      AND match.cpf_cnpj = '$cpf_cnpj' LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetch( PDO::FETCH_OBJ );
        }else{
          return 2;
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function listarnomeCaminho2($nivel){
    $cpf_cnpj = LICENCA;
  try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT categoria.nome,cat.nome AS Categoria1, cat.id AS ID_Categoria1,cat1.nome AS Categoria2, cat1.id AS ID_Categoria2,categoria.status
        FROM Links.match match
        INNER JOIN Links.Categoria categoria
        ON categoria.id = match.ID_Categoria
        INNER JOIN Links.Categoria cat
        ON cat.id = categoria.Nivel1
        INNER JOIN Links.Categoria cat1
        ON cat1.id = cat.Nivel1
        WHERE categoria.Nivel1 = $nivel AND categoria.status = 1
        AND match.cpf_cnpj = '$cpf_cnpj' LIMIT 1";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetch( PDO::FETCH_OBJ );
        }else{
          return 2;
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function listarnomeCaminho3($nivel){
    $licenca = LICENCA;
    try {
      $conn = conectar_pgsql('CMS');
        $sql = "SELECT link.id AS id_link, link.nome, link.ID_Categoria, link.status, 
        link.ID_Operadora, link.Iframe,cat.nome AS Categoria1,
        cat.id AS ID_Categoria1,cat1.nome AS Categoria2, cat1.id AS ID_Categoria2,cat2.nome AS Categoria3, cat2.id AS ID_Categoria3
        FROM Links.link link
        INNER JOIN Links.Categoria cat
        ON cat.id = link.ID_Categoria
        INNER JOIN Links.Categoria cat1
        ON cat1.id = cat.Nivel1
        INNER JOIN Links.Categoria cat2
        ON cat2.id = cat1.Nivel1
        WHERE link.ID_Categoria = $nivel AND link.status = 1 LIMIT 1";
        $stmt = $conn->prepare($sql);
        
            $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetch( PDO::FETCH_OBJ );
        }
      $conn = null;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
}

function listarRoteiros2($categoria){
    $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT id, nome, ID_Categoria, status, ID_Operadora, Iframe
      FROM Links.link
      WHERE ID_Categoria = $categoria AND status = 1";
        $stmt = $conn->prepare($sql);
            $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetchAll( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function buscarPacote($pacote){
    $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT link.LinkID, link.nome, link.Categoria, link.destaque, link.status, link.Operadora, link.Iframe,
          licenca.Token
          FROM Links.link link
          LEFT JOIN Links.Licenca licenca ON licenca.Operadora = link.Operadora
          AND licenca.cpf_cnpj = '$licenca'
          WHERE link.LinkID = :pacote
          ORDER BY link.nome";
        $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pacote', $pacote, PDO::PARAM_STR);
            $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetch( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function buscarPacote2($pacote){
    $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT link.id, link.nome, link.ID_Categoria, link.status, lic.id_status as status_token,
      link.ID_Operadora, link.Iframe,
      lic.Token, lic.cpf_cnpj, link.ID_Operadora, op.nome AS Operadora
      FROM Links.link link
      INNER JOIN Links.Operadora op ON op.id = link.ID_Operadora
      LEFT JOIN Links.token lic ON lic.ID_Operadora = op.id
      AND cpf_cnpj = '$licenca'
      WHERE link.id = $pacote
      ORDER BY link.nome";
        $stmt = $conn->prepare($sql);
        
            $stmt->execute();
        if($stmt->rowCount() != 0){
              return $stmt->fetch( PDO::FETCH_OBJ );
        }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function buscarPacoteCaminho($pacote){
  $licenca = LICENCA;
  try {
      $conn = conectar_pgsql('CMS');
      $sql = "SELECT link.id AS id_link, link.nome, link.ID_Categoria, link.status, 
      link.ID_Operadora, link.Iframe,cat.nome AS Categoria1,cat.id AS ID_Categoria1,cat2.nome AS Categoria2,cat2.id AS ID_Categoria2,cat3.nome AS Categoria3, cat3.id AS ID_Categoria3,
      lic.Token, lic.cpf_cnpj, link.ID_Operadora, op.nome AS Operadora
      FROM Links.link link
      INNER JOIN Links.Operadora op ON op.id = link.ID_Operadora
      INNER JOIN Links.Categoria cat ON cat.id = link.ID_Categoria
      INNER JOIN Links.Categoria cat2 ON cat2.id = cat.Nivel1
      INNER JOIN Links.Categoria cat3 ON cat3.id = cat2.Nivel2
      LEFT JOIN Links.token lic ON lic.ID_Operadora = op.id
      AND cpf_cnpj = '$licenca'
      WHERE link.id = $pacote
      ORDER BY link.nome";
      $stmt = $conn->prepare($sql);
        
      $stmt->execute();
      if($stmt->rowCount() != 0){
        return $stmt->fetch( PDO::FETCH_OBJ );
      }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


function listarCategoriasPai(){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT cat.RoteiroCategoriaID, cat.nome, cat.NivelPai, cat.Nivel,
          cat.descricao, cat.imagem, cat.status
          FROM Roteiros.Categoria cat
          LEFT JOIN Roteiros.Roteiro rot ON cat.RoteirocategoriaID = rot.ID_Categoria
          WHERE cat.Nivel = 0 AND cat.status = 1
          AND cat.cpf_cnpj = '$licenca'
          ORDER BY cat.nome";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', DIRETORIO);
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  if($contChar > 150){
                      $term = '...';
                  }
            $content .= "<div class='col-md-4 col-sm-4 col-xs-12'>";
            $content .= "<div class='quadro_categoria thumbnail'>";
            $content .= "<div class='quadro_destaque_categoria'>";
            $content .= "<img src='".$img."' class='img-responsive' alt=''>";
            $content .= "<div class='col-md-12'>";
            $content .= "<h4 class='titulo_categoria' style='margin-top: 10px;'>".$linha['nome']."</h4>";
            $content .= "<p><span class='info_categoria'>".substr($linha['descricao'], 0, 140).$term."</span></p>";
            $content .= "</div>";
            $content .= "<a href='/mais-roteiros/".$linha['RoteiroCategoriaID']."'><button type='button' class='btn btn-sm col-md-offset-8'><span class='texto_botao2'></span> <span class='texto_botao'> Saiba Mais</span></button></a></div></div></div>";
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listarRoteirosSemCategoria(){
    $licenca = LICENCA;
    try {
      $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT CategoriaPadrao, StatusCategoriaPadrao FROM Roteiros.Categoria WHERE cpf_cnpj = '$licenca'";
      $consulta = $conn->query($sql);
      $linha = $consulta->fetch( PDO::FETCH_OBJ );
      $padrao = $linha->CategoriaPadrao;
      $statusPadrao = $linha->StatusCategoriaPadrao;
      if($statusPadrao == 1){
      $content1 .= "<div class='col-md-4 col-sm-4 col-xs-12'>";
      $content1 .= "<div class='quadro_categoria thumbnail'>";
      $content1 .= "<div class='quadro_destaque_categoria'>";
      $content1 .= "<img src='/Dashboard/Files/Geral/sistema/Moldura-categorias.jpg' class='img-responsive' alt=''>";
      $content1 .= "<div class='col-md-12'>";
      $content1 .= "<h4 class='titulo_categoria' style='margin-top: 10px;'>$padrao</h4>";
      $content1 .= "<p><span class='info_categoria'>Confira aqui diversos roteiros direto das principais operadoras com destinos e condições imperdíveis!</span></p>";
      $content1 .= "</div>";
      $content1 .= "<a class = 'but' href='/mais-roteiros/0'><button type='button' class='but btn btn-sm col-md-offset-8'><span class='texto_botao2'></span> <span class='texto_botao'> Saiba Mais</span></button></a></div>  </div></div>";      
        echo $content1;
      }
      $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function  mostrarnomeCategoria($categoria){
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT nome
          FROM Roteiros.Categoria
          WHERE RoteiroCategoriaID = $categoria
          ORDER BY nome";
          $consulta = $conn->query($sql);
             $linha = $consulta->fetch( PDO::FETCH_ASSOC );
            echo "<div class='col-md-12'><h3 class='titulo_categoria_desc color4'>".$linha['nome']."</h3></div>";
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listaRoteirosPersonalizados($categoria){
 
    $licenca = LICENCA;
 
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id_roteiro, cadastro, ID_Status, destaque, nome, validade, preco,
                                        precodescritivo, imagem, descritivo, moeda
                                        FROM Roteiros.Roteiro
                                        WHERE ID_Status = 1 AND
                                        validade > CAST(GETDATE() AS DATE) AND cpf_cnpj = :licenca
                                        And ID_Categoria = :categoria
                                        ORDER BY cadastro DESC");
 
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
 
             $stmt->execute();
 
             $retornar = '';
 
          if($stmt->rowCount() != 0){
 
 
                    while($roteiro = $stmt->fetch(PDO::FETCH_OBJ)){
 
                                $img = getImageRoute($roteiro->imagem, 'roteiros', DIRETORIO);
                                $preco = '<span class="cifrao">'.$roteiro->moeda.'</span>' .$roteiro->preco;
 
                                if($roteiro->preco == 0 || $roteiro->preco == '0,00'){
                                  $preco = 'Sob consulta';
                                }
 
                                $retornar .= '<article class="col-sm-4" style="margin-bottom: 60px;">';
                                $retornar .=  '<div class="coluna-conteudo">';
                                $retornar .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
                                $retornar .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$roteiro->nome.'</p>';
 
                                $retornar .= '<div class="col-md-12 margin_desconto pos_pacote2">';
                                $retornar .= '<div class="col-md-12">';
                                if($roteiro->preco == 0 OR $roteiro->preco == '0,00'){
                                
                                  $preco_val = 'Sob consulta';
                                  $retornar .= '<p class="preco">'.$preco_val.'</p>';
                                }else{
                                  
                                  $preco_val = $roteiro->preco;
                                  $preco = $roteiro->moeda;
                                  $retornar .= '<p class="preco">'.'<span class = "cifrao">'.$preco.'</span>'.$preco_val.'</p>';
                                
                                }
                                
 
 
                                
                                $retornar .= '</div>';
  
 
                                $retornar .= '</div>';
                                $retornar .= '</section>';
                                $retornar .= '<section class="newsText color4 descritivo-pacote">';
                                $retornar .= '<p>'.$roteiro->descritivo.'</p>';
                                $retornar .= '<a href="/roteiro/'.$roteiro->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
                                $retornar .= '</section>';
                                $retornar .= '</div>';
 
                                $retornar .= '</article>';
 
 
                            }
 
             echo $retornar;
 
             }
 
        }catch (SQLException $e){
            echo "Error" . $e->getMessage();
         }
 
}
function listaRoteirosMelloFaro($categoria){ 
    try{
             $conn = conectar_pgsql('Roteiros', '179.188.16.134');
             $stmt = $conn->prepare("SELECT id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido FROM Roteiro_View
                WHERE id_nivel2 = $categoria AND validade > now()");
 
             $stmt->execute();
 
             $retornar = '';
 
          if($stmt->rowCount() != 0){
 
 
                    while($roteiro = $stmt->fetch(PDO::FETCH_OBJ)){
 
                                $img = getImageRoute($roteiro->imagem, 'roteiros', DIRETORIO);
                                $preco = '<span class="cifrao">'.$roteiro->moeda.'</span>' .$roteiro->preco;
 
                                if($roteiro->preco == 0 || $roteiro->preco == '0,00'){
                                  $preco = 'Sob consulta';
                                }
 
                                $retornar .= '<article class="col-sm-4" style="margin-bottom: 60px;">';
                                $retornar .=  '<div class="coluna-conteudo">';
                                $retornar .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
                                $retornar .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$roteiro->nome.'</p>';
 
                                $retornar .= '<div class="col-md-12 margin_desconto pos_pacote2">';
                                $retornar .= '<div class="col-md-12">';
                                if($roteiro->preco == 0 OR $roteiro->preco == '0,00'){
                                
                                  $preco_val = 'Sob consulta';
                                  $retornar .= '<p class="preco">'.$preco_val.'</p>';
                                }else{
                                  
                                  $preco_val = $roteiro->preco;
                                  $preco = $roteiro->moeda;
                                  $retornar .= '<p class="preco">'.'<span class = "cifrao">'.$preco.'</span>'.$preco_val.'</p>';
                                
                                }
                                
 
 
                                
                                $retornar .= '</div>';
  
 
                                $retornar .= '</div>';
                                $retornar .= '</section>';
                                $retornar .= '<section class="newsText color4 descritivo-pacote">';
                                $retornar .= '<p>'.$roteiro->descritivo.'</p>';
                                $retornar .= '<a href="/roteiro/'.$roteiro->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
                                $retornar .= '</section>';
                                $retornar .= '</div>';
 
                                $retornar .= '</article>';
 
 
                            }
 
             echo $retornar;
 
             }
 
        }catch (SQLException $e){
            echo "Error" . $e->getMessage();
         }
 
}
function listaRoteirosPersonalizadosArt($categoria){
 
    $licenca = LICENCA;
 
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id_roteiro, cadastro, ID_Status, destaque, nome, validade, preco,
                                        precodescritivo, imagem, descritivo, moeda
                                        FROM Roteiros.Roteiro
                                        WHERE ID_Status = 1 AND
                                        validade > CAST(GETDATE() AS DATE) AND cpf_cnpj = :licenca
                                        And ID_Categoria = :categoria
                                        ORDER BY validade ASC");
 
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
             $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
 
             $stmt->execute();
 
             $retornar = '';
 
          if($stmt->rowCount() != 0){
 
 
                    while($roteiro = $stmt->fetch(PDO::FETCH_OBJ)){
 
                                $img = getImageRoute($roteiro->imagem, 'roteiros', DIRETORIO);
                                $preco = '<span class="cifrao">'.$roteiro->moeda.'</span>' .$roteiro->preco;
 
                                if($roteiro->preco == 0 || $roteiro->preco == '0,00'){
                                  $preco = 'Sob consulta';
                                }
 
                                $retornar .= '<article class="col-sm-6">';
                                $retornar .=  '<div class="coluna-conteudo">';
                                $retornar .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\');border:3px solid #f0ad4e">';
                                $retornar .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$roteiro->nome.'</p>';
                                $retornar .= '<p style="color:#fff;margin-left:7px;">'.$roteiro->descritivo.'</p>';
 
                                $retornar .= '<div class="col-md-12 margin_desconto pos_pacote2" style="background: rgba(0, 0, 0, 0.7);height: 62px;width: 93.6%;margin-left: 0.2%;position: absolute;bottom: 35px;">';
                                $retornar .= '<div class="col-md-12">';
                                if($roteiro->preco == 0 OR $roteiro->preco == '0,00'){
                                
                                  $preco_val = 'Sob consulta';
                                  $retornar .= '<p class="preco">'.$preco_val.'</p>';
                                }else{
                                  
                                  $preco_val = $roteiro->preco;
                                  $preco = $roteiro->moeda;
                                  $retornar .= '<p class="preco">'.'<span class = "cifrao">'.$preco.'</span>'.$preco_val.'</p>';
                                
                                }
                                
 
 
                                
                                $retornar .= '</div>';
  
 
                                $retornar .= '</div>';
                                $retornar .= '</section>';
                                $retornar .= '<section class="newsText color4 descritivo-pacote" style="height:0px;">';
                                $retornar .= '<a href="/roteiro/'.$roteiro->id_roteiro.'" class="btn btn-sm pull-right" style="margin-top: -52px;position: relative;background-color: #f0ad4e;padding:10px 10px;border:0px;">Mais Informações</a>';
                                $retornar .= '</section>';
                                $retornar .= '</div>';
 
                                $retornar .= '</article>';
 
 
                            }
 
             echo $retornar;
 
             }
 
        }catch (SQLException $e){
            echo "Error" . $e->getMessage();
         }
 
}
function listarApenasCategoriasPorID($idCategoria){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT id_roteiro, cpf_cnpj, ID_Licenciador, ID_Fornecedor, ID_Categoria, ID_Status, cadastro, Alteracao, validade, nome, imagem, destaque, moeda, preco, precodescritivo, descritivo FROM Roteiros.Roteiro WHERE ID_Categoria = $idCategoria AND cpf_cnpj = '$licenca' AND ID_Status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', DIRETORIO);
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  if($contChar > 150){
                      $term = '...';
                  }
            $content .= "<div class='col-lg-4 col-md-4 col-sm-6 destinos'>";
            $content .= '<figure style="background-image:url(\''.$img.'\')" class="roteiros">';
            $content .= "<a href='/pr-roteiro/".$linha['id_roteiro']."' class='link_caixa'>";
            $content .= "<figcaption><div class='wrapper caixa'><h1 class='txt_caixa' align='center'>Saiba Mais</h1></div></figcaption>";
            $content .= "</a></figure>";
            $content .= "<h4 class='textoPromocao'>".$linha['nome']."</h4>";
            $content .= "<p class='center'>".substr($linha['descritivo'], 0, 140).$term."</p>";
            $content .= "<p><a href='/pr-roteiro/".$linha['id_roteiro']."' class='btn btn-primary botaoPromocao'>Saiba Mais</a></p><br></div>";
            }
            $content .= "</section>";
            
            
            echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listarCategoriasFilho($categoria){
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT cat.RoteirocategoriaID, cat.nome, cat.NivelPai, cat.Nivel,
          cat.descricao, cat.imagem, cat.status
          FROM Roteiros.Categoria cat
          INNER JOIN Roteiros.Roteiro rot ON rot.ID_Categoria = cat.roteiroCategoriaID
          WHERE cat.Nivel = 1 AND cat.status = 1 AND cat.NivelPai = $categoria
          ORDER BY cat.nome";
          $consulta = $conn->query($sql);
            while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              echo "<div class='col-md-12'><h3 class='titulo_categoria_desc'>".$linha['nome']."</h3></div>";
              listaRoteirosPersonalizados($linha['RoteirocategoriaID']);
              }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function infoView($roteiro){
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT Ordem, titulo, Informacao
            FROM Roteiros.Informacao
            WHERE RoteiroID = '$roteiro'
            ORDER BY Ordem ASC";
        $consulta = $conn->query($sql);
      return $consulta->fetchAll(PDO::FETCH_OBJ);
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function infoViewNovo($roteiro){
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT Itinerario, Inclue, NInclue, Observacoes,Lamina FROM Roteiros WHERE id_roteiro = '$roteiro'";
        $consulta = $conn->query($sql);
      return $consulta->fetchAll(PDO::FETCH_OBJ);
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function exibeFeira(){
      $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT Token FROM Links.Licenca WHERE ID_Operadora = '15' AND cpf_cnpj = '$cpf_cnpj'";
        $consulta = $conn->query($sql);
        return $consulta->fetch(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function galeriaView($roteiro, $diretorio){
      try {
        $conn = conectar_pgsql('CMS');
          $sql = "SELECT TOP(6) site.galeriaID, galeria.DataAlteracao, galeria.cpf_cnpj, galeria.RoteiroID, galeria.imagem, galeria.status, licenca.Diretorio
          FROM Roteiros.Galeria galeria
          INNER JOIN Roteiros.Roteiro roteiro ON roteiro.id_roteiro = galeria.RoteiroID
          INNER JOIN Licencas.licenca licenca ON licenca.cpf_cnpj = roteiro.cpf_cnpj
          WHERE galeria.RoteiroID = '$roteiro'
          AND galeria.status <> 2
          ORDER BY site.galeriaID";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', $linha['Diretorio']);
        $images .= "<div class='col-md-2 col-sm-4 col-xs-4'><a href='$img' title='Montenegro' data-gallery><img src='$img' alt='Montenegro' class='img-thumbnail img-responsive' style='height:91px;'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function galeriaViewNovo($id){
      try {
        $conn = conectar_pgsql('Roteiros', '179.188.16.134');
          $sql = "SELECT galeria.ID_Galeria, galeria.id_roteiro, galeria.imagem
          FROM galeria
          INNER JOIN roteiros roteiro ON roteiro.id_roteiro = galeria.id_roteiro
          WHERE galeria.id_roteiro = $id
          ORDER BY galeria.ID_Galeria LIMIT 6";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img =  $linha['imagem'];
        $images .= "<div class='col-md-2 col-sm-4 col-xs-4'><a href='$img' data-gallery><img src='$img' class='img-thumbnail img-responsive' style='height:91px;'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}

function galeriaViewNx($id){
      try {
        $conn = conectar_pgsql('Roteiros', '179.188.16.134');
          $sql = "SELECT galeria.ID_Galeria, galeria.id_roteiro, galeria.imagem
          FROM galeria
          INNER JOIN Roteiros roteiro ON roteiro.id_roteiro = galeria.id_roteiro
          WHERE galeria.id_roteiro = $id
          ORDER BY galeria.id_galeria LIMIT 6";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img =  $linha['imagem'];
        $images .= "<div class='col-md-3' align='center'><a href='$img' data-gallery><img src='$img' class='img-thumbnail img-responsive' style='height: 135px;width:  250px;margin-top: 9px;'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}

function galeriaRoteiroIsolado($id){
      try {
        $conn = conectar_pgsql('CMS');
          $sql = "SELECT galeria.ID_Galeria, galeria.id_roteiro, galeria.imagem
          FROM Roteiros_Galeria galeria
          INNER JOIN Roteiros_Roteiro roteiro ON roteiro.id_roteiro = galeria.id_roteiro
          WHERE galeria.id_roteiro = '$id'
          ORDER BY galeria.ID_Galeria";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img =  $linha['imagem'];
        $images .= "<div class='col-md-6 col-sm-6 col-xs-6'><a href='$img' data-gallery><img src='$img' class='img-thumbnail img-responsive galeriaIsolada' style='width: 100%;margin-bottom: 10px;'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}

function galeriaRoteiroIsoladoServicos($id){
      try {
        $conn = conectar_pgsql('CMS');
          $sql = "SELECT galeria.ID_Galeria, galeria.id_roteiro, galeria.imagem
          FROM A_Roteiros.Galeria galeria
          INNER JOIN A_Roteiros.Roteiros roteiro ON roteiro.id_roteiro = galeria.id_roteiro
          WHERE galeria.id_roteiro = '$id'
          ORDER BY galeria.ID_Galeria";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img =  $linha['imagem'];
        $images .= "<div class='col-md-6 col-sm-6 col-xs-6'><a href='$img' data-gallery><img src='$img' class='img-thumbnail img-responsive galeriaIsolada' style='width: 100%;margin-bottom: 10px;'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}

function exibeDetalhes($id){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT Itinerario, Inclue, NInclue, Observacoes,Lamina FROM detalhes WHERE id_roteiro = $id");
              
             $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function exibeDetalhesServicos($id){
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT Itinerario, Inclue, NInclue, Observacoes,Lamina FROM A_Roteiros.Detalhes WHERE id_roteiro = '$id'");
              
             $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}

function galeriaViewMF($roteiro){
      try {
        $conn = conectar_pgsql('CMS');
          $sql = "SELECT TOP(6) site.galeriaID, galeria.DataAlteracao, galeria.cpf_cnpj, galeria.RoteiroID, galeria.imagem, galeria.status, licenca.Diretorio
          FROM Roteiros.Galeria galeria
          INNER JOIN Roteiros.Roteiro roteiro ON roteiro.id_roteiro = galeria.RoteiroID
          INNER JOIN Licencas.licenca licenca ON licenca.cpf_cnpj = roteiro.cpf_cnpj
          WHERE galeria.RoteiroID = '$roteiro'
          AND galeria.status <> 2
          ORDER BY site.galeriaID";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', $linha['Diretorio']);
        $images .= "<div class='col-md-2 col-sm-4 col-xs-4'><a href='$img' title='Montenegro' data-gallery><img src='$img' alt='Montenegro' class='img-thumbnail img-responsive'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function galeriaViewMelloFaro($roteiro){
      try {
        $conn = conectar_pgsql('CMS');
          $sql = "SELECT TOP(6) site.galeriaID, galeria.DataAlteracao, galeria.cpf_cnpj, galeria.RoteiroID, galeria.imagem, galeria.status, licenca.Diretorio
          FROM Roteiros.Galeria galeria
          INNER JOIN Roteiros.Roteiro roteiro ON roteiro.id_roteiro = galeria.RoteiroID
          INNER JOIN Licencas.licenca licenca ON licenca.cpf_cnpj = roteiro.cpf_cnpj
          WHERE galeria.RoteiroID = '$roteiro'
          AND galeria.status <> 2
          ORDER BY site.galeriaID";
          $consulta = $conn->query($sql);
          $images = "";
               while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', $linha['Diretorio']);
        $images .= "<div class='col-md-2 col-sm-4 col-xs-4'><a href='$img' title='Montenegro' data-gallery><img src='$img' alt='Montenegro' class='img-thumbnail img-responsive roteiroMelloIndex'></a></div>";
              }
              echo $images;
      $conn = null;
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function menuAtivo($url, $item){
if($url == $item){
echo 'active';
}
}
function menuInformacoesAtivo($url){
if($url == '/alfandega' ||
    $url == '/bagagem' ||
    $url ==  '/consulta-de-voos' ||
    $url == '/conversor-de-moedas' ||
    $url == '/documentos' ||
    $url == '/documentacao-para-menores' ||
    $url == '/passaporte' ||
    $url == '/vacinas' ||
    $url == '/vistos' ||
    $url == '/embaixadas' ||
    $url == '/habilitacao-internacional' ||
    $url == '/transporte-de-animais' ||
    $url == '/fuso-horario' ||
    $url == '/web-checkin'){
    echo 'active';
}
}
function linkServicos($tipo){
      $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT m.link, m.MotorDescricaoID, m.NameMotor, c.Email
                FROM Motores.Motor m
                INNER JOIN CMS.ContatoLocalizacao c ON c.cpf_cnpj = m.cpf_cnpj
                WHERE m.cpf_cnpj = '$cpf_cnpj'  AND m.TipoID = $tipo";
        $consulta = $conn->query($sql);
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}
function linkServicosIcone($id){
      $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('Licencas');

        $sql = "SELECT email FROM contato WHERE cpf_cnpj = '$cpf_cnpj'";
        $consulta = $conn->query($sql);
        $consulta->execute();
        $dado = $consulta->fetch(PDO::FETCH_OBJ);



        $conn = conectar_pgsql('CMS');
        $sql = "SELECT m.link, m.id_descricao, m.nome,m.titulo,m.descricao, '$dado->email' AS email
                FROM Motores.Motor m
                WHERE m.cpf_cnpj = '$cpf_cnpj'  AND m.id = $id";

        $consulta = $conn->query($sql);

        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);

        }catch (PDOException $e){
          echo "Erro: ". $e;
      }
}
function listarRoteirosMatch(){
 
          $licenca = LICENCA;
 
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT roteiro.id_roteiro, roteiro.cadastro, roteiro.ID_Status, roteiro.destaque, roteiro.nome,
                                    roteiro.validade, roteiro.preco, roteiro.precodescritivo,
                                    roteiro.imagem, roteiro.descritivo, roteiro.moeda, licenca.Diretorio
                                    FROM Roteiros.Match match
                                    INNER JOIN Roteiros.Roteiro roteiro
                                    ON roteiro.id_roteiro = match.roteiroID
                                    INNER JOIN Licencas.Licenca licenca ON roteiro.cpf_cnpj = licenca.cpf_cnpj
                                    WHERE roteiro.ID_Status = 1
                                    AND roteiro.validade > CAST(GETDATE() AS DATE)
                                    AND match.cpf_cnpj = :licenca
                                    ORDER BY roteiro.cadastro DESC");
 
 
 
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
 
             $stmt->execute();
 
             $retornar = '';
 
          if($stmt->rowCount() != 0){
 
 
 
 
 
 
                    while($roteiro = $stmt->fetch(PDO::FETCH_OBJ)){
 
                                $img = getImageRoute($roteiro->imagem, 'roteiros', $roteiro->Diretorio);
 
                                $preco = '<span class="cifrao">'.$roteiro->moeda.'</span>'.$roteiro->preco;
 
                                if($roteiro->preco == 0 || $roteiro->preco == '0,00'){
                                  $preco = 'Sob consulta'; 
                                }
 
                                $retornar .= '<article class="col-sm-4" style="margin-bottom: 60px;">';
                                $retornar .=  '<div class="coluna-conteudo">';
                                $retornar .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
                                $retornar .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$roteiro->nome.'</p>';
                                $retornar .= '<div class="col-md-12 margin_desconto pos_pacote2">';
                                $retornar .= '<div class="col-md-12">';
                                $retornar .= '<p class="preco">'.$preco.'</p>';
                                $retornar .= '</div>';
                                $retornar .= '</div>';
                                $retornar .= '</section>';
                                $retornar .= '<section class="newsText color4 descritivo-pacote">';
                                $retornar .= '<p>'.$roteiro->descritivo.'</p>';
                                $retornar .= '<a href="/roteiro/'.$roteiro->id_roteiro.'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
                                $retornar .= '</section>';
                                $retornar .= '</div>';
                                $retornar .= '</article>';
 
                            }
 
 
 
 
                    echo $retornar;
 
             }
 
 
 
        }catch (SQLException $e){
            echo "Error" . $e->getMessage();
         }
 
}
function verificaLicenciador($cpf_cnpj){
    try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT ID_Licenciador FROM Licencas.Licenca WHERE cpf_cnpj = '$cpf_cnpj'";
        $stmt = $conn->prepare($sql);
            $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        $conn = null;
    } catch (PDOException $e) {
             echo $e->getMessage();
    }
}
function selfBooking(){
      $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT SelfBookingID, SelfBookingDescricao FROM SelfBooking.descricao";
        $consulta = $conn->query($sql);
        return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}
function selfCadastrado($tipo){
      $cpf_cnpj = LICENCA; 

      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT link.id_descricao, link.link, link.cpf_cnpj, dsc.descricao, link.reserve_id, link.reserve_fantasia, link.status, link.destaque, link.Token, link.cadastro
        FROM SelfBooking.Links link INNER JOIN SelfBooking.descricao dsc ON dsc.id = link.id_descricao
        WHERE link.cpf_cnpj = '$cpf_cnpj' AND link.id_descricao = $tipo AND link.status = '1' AND destaque = '1' ORDER BY descricao";
        $consulta = $conn->query($sql);
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}
//SELF-BOOKING DA INDEX DO MODELO LANDINGPAGE
function selfCadastradoIndex(){
    $cpf_cnpj = LICENCA;

    try{
        
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT id, url  FROM selfBooking.links WHERE cpf_cnpj = '$cpf_cnpj' AND destaque = 1 order by alteracao DESC LIMIT 3";
        $consulta = $conn->query($sql);
        return $consulta->fetchAll(PDO::FETCH_OBJ);

    }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function selfGeral(){
  $cpf_cnpj = LICENCA;
    try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT id FROM SelfBooking.Links WHERE destaque = '1' AND cpf_cnpj = '$cpf_cnpj'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
        $conn = null;
    } catch (PDOException $e) {
             echo $e->getMessage();
    }
}
function selfActive($tipo){
  $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT destaque FROM SelfBooking.Links WHERE cpf_cnpj = '$cpf_cnpj' AND destaque = 1 AND SelfBookingDescricaoID = '$tipo'";
        $consulta = $conn->query($sql);
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}
function selfActiveCorporativo(){
  $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT id_descricao, destaque FROM SelfBooking.Links WHERE cpf_cnpj = '$cpf_cnpj' AND destaque = 1 LIMIT 1";
        $consulta = $conn->query($sql);
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}
function getImageRoute($image, $caminho, $diretorio){
    if(strpos($image, "https://") === 0){
        $img = $image;
      }else{
          $img = "/Dashboard/Files/".$diretorio."/".$caminho."/".$image;
      }
      return $img;
}
//Newsletter na landingpage
function ExibicaoNewsSite(){
      $licencaID = 1581;
      try {
        $conn = connectDBHomolog();
        $sql = "SELECT NewsletterID, Status,Validade,NewsInformativa,Token, dbo.UTF8_TO_NVARCHAR(Nome) AS Nome, NewsHTML  FROM Marketing.Newsletter WHERE LicencaID = '$licencaID' AND Status = 1 AND NewsInformativa = 1 AND Validade > GETDATE() ORDER BY Validade ASC";
        $consulta = $conn->query($sql);
        return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}  
function ExibicaoNewsSiteModelos(){
      $licencaID = LICENCA_HOMOLOG;
      try {
        $conn = connectDBHomolog();
        $sql = "SELECT TOP 10 Token, Nome, Validade
FROM Marketing.Newsletter WHERE LicencaID = '$licencaID' AND Status = 1 
AND Validade > GETDATE() ORDER BY Validade ASC";
        $consulta = $conn->query($sql);
        return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}  
function ListarInformativo(){
try {
     $licenca = LICENCA;
     $conn = conectar_pgsql('CMS');
      $sql = "SELECT NewsletterID, cpf_cnpj, CONVERT(VARCHAR(10), cadastro, 103) as cadastro, Capa, titulo, subtitulo, Token, NewsInformativa,
          Convert(VARCHAR(20), validade, 103) as validade, nome
          FROM Marketing.Newsletter
                  WHERE cpf_cnpj =  $licenca
                  AND validade > GETDATE() AND NewsInformativa = '1'
          ORDER BY YEAR(cadastro) DESC, MONTH(cadastro) DESC, DAY(cadastro) DESC";
          
      $consulta = $conn->query($sql);
      $options = "";
          while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              $NewsletterID = $linha['NewsletterID'];
              $cpf_cnpj = $linha['cpf_cnpj'];
              $cadastro = $linha['cadastro'];
              $Capa = $linha['Capa'];
              $titulo = $linha['titulo'];
              $subtitulo = $linha['subtitulo'];
              $Token = $linha['Token'];
              $validade = $linha['validade'];
              $nome = $linha['nome'];
              //$options .= "<tr><td>$NewsletterID</td> <td>$nome</td> <td>$validade</td><td><a href='news_view_info.php?id=$Token&Tkn=".$_SESSION['userToken']."' target='blank'>Ver News</a><td><a href='assistente-marketing-enviar-news.php?newsletter=$Token'>Enviar</a></td><td><a href='assistente-marketing-envio.php?newsletter=$Token'>Visualizar</a></td>";
          
              $options .= "<tr><td>$cadastro</td><td><a href='Dashboard/news_view_info.php?id=$Token&Tkn=P9KAVYEGI6TRN4JFX0C2' target='blank'>$nome</a></td></tr>";
          }
         echo $options;
         $conn = null;
    } catch (PDOException $e) {
         echo $e->getMessage();
    }
}
function ListarPromocao(){
try {
     $licenca = LICENCA;
     $conn = conectar_pgsql('CMS');
      $sql = "SELECT NewsletterID, CONVERT(VARCHAR(10), cadastro, 103) as cadastro, cpf_cnpj, Capa, titulo, subtitulo, Token, NewsInformativa,
          Convert(VARCHAR(20), validade, 103) as validade, nome
          FROM Marketing.Newsletter
                  WHERE cpf_cnpj =  $licenca
                  AND Promocao = '1'
                  AND validade > GETDATE() AND NewsInformativa = '1'
          ORDER BY titulo ASC";
      $consulta = $conn->query($sql);
      $options = "";
          while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              $NewsletterID = $linha['NewsletterID'];
              $cpf_cnpj = $linha['cpf_cnpj'];
              $cadastro = $linha['cadastro'];
              $Capa = $linha['Capa'];
              $titulo = $linha['titulo'];
              $subtitulo = $linha['subtitulo'];
              $Token = $linha['Token'];
              $validade = $linha['validade'];
              $nome = $linha['nome'];
              //$options .= "<tr><td>$NewsletterID</td> <td>$nome</td> <td>$validade</td><td><a href='news_view_info.php?id=$Token&Tkn=".$_SESSION['userToken']."' target='blank'>Ver News</a><td><a href='assistente-marketing-enviar-news.php?newsletter=$Token'>Enviar</a></td><td><a href='assistente-marketing-envio.php?newsletter=$Token'>Visualizar</a></td>";
          
              $options .= "<tr><td>$cadastro</td><td><a href='Dashboard/news_view_info.php?id=$Token&Tkn=P9KAVYEGI6TRN4JFX0C2' target='blank'>$nome</a></td></tr>";
          }
         echo $options;
         $conn = null;
    } catch (PDOException $e) {
         echo $e->getMessage();
    }
}
function ListarCambioAereo(){
try {
     $conn = conectar_pgsql('CMS');
      $sql = "SELECT Convert(VARCHAR(20), DataInicial, 103) as DataInicial, ValorInicial, Convert(VARCHAR(20), DataFinal, 103) as DataFinal, ValorFinal FROM CMS.CambioAereo";
      $consulta = $conn->query($sql);
      $options = "";
      $linha = $consulta->fetch( PDO::FETCH_ASSOC );
      $DataInicial = $linha['DataInicial'];
      $ValorInicial = $linha['ValorInicial'];
      $DataFinal = $linha['DataFinal'];
      $ValorFinal = $linha['ValorFinal'];
          
      $options = "<b>$DataInicial - $ValorInicial <br>$DataFinal - $ValorFinal</b>";
      echo $options;
      $conn = null;
    } catch (PDOException $e) {
         echo $e->getMessage();
    }
}
function galeriaListar(){
  $cpf_cnpj = LICENCA;
  try {
     $conn = conectar_pgsql('CMS');
        
      $sql = "SELECT id, nome, imagem, status
      FROM site.galeria
      WHERE cpf_cnpj = '$cpf_cnpj'
      ORDER BY cadastro DESC";
      $consulta = $conn->query($sql);
       $options = "";
          while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              $id = $linha['GaleriaID'];
              $nome = $linha['nome'];
              $imagem = $linha['imagem'];
              $status = $linha['status'];
              if($status == 1){
                $status = 'Ativo';
              }else{
                $status = 'Inativo';
              }
              $options .= '<div class="col-md-3 col-sm-4 col-xs-6 mr_bottom">
                            <a class="gal" href="/galeria-exibicao/'.$id.'"style="background-image:url('.$imagem.')"></a>
                            <p class="text-center gal-text">'.$nome.'</p>
                            </div>';
          }
  
           echo $options;
               $conn = null; 
      
    } catch (PDOException $e) {
         echo $e->getMessage();
  
    }
}
 
function galeriaListar22(){
  $cpf_cnpj = LICENCA;
  try {
     $conn = conectar_pgsql('CMS');
        
      $sql = "SELECT id, nome, imagem, status
      FROM site.galeria
      WHERE cpf_cnpj = '$cpf_cnpj'
      ORDER BY cadastro DESC";
      $consulta = $conn->query($sql);
       $options = "";
          while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              $id = $linha['id'];
              $nome = $linha['nome'];
              $imagem = $linha['imagem'];
              $status = $linha['status'];
              if($status == 1){
                $status = 'Ativo';
              }else{
                $status = 'Inativo';
              }
              $options .= '<div class="col-md-4 col-sm-4 col-xs-6">
                            <h4 class="head-title" align="center" style="height: 62px;">'.$nome.'</h4>
                            <a href="galeria-exibicao/'.$id.'">
                              <p align="center"><img src="'.$imagem.'" alt="" class="img-responsive mb-30 imagemGaleria"></p>
                            </a>
                            </div>';
          }
  
           echo $options;
               $conn = null; 
      
    } catch (PDOException $e) {
         echo $e->getMessage();
  
    }
}
 
function galeriaListarFlytour(){
  $cpf_cnpj = LICENCA;
  try {
     $conn = conectar_pgsql('CMS');
        
      $sql = "SELECT id, nome, imagem, status
      FROM site.galeria
      WHERE cpf_cnpj = '$cpf_cnpj'
      ORDER BY cadastro DESC";
      $consulta = $conn->query($sql);
       $options = "";
          while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              $id = $linha['GaleriaID'];
              $nome = $linha['nome'];
              $imagem = $linha['imagem'];
              $status = $linha['status'];
              if($status == 1){
                $status = 'Ativo';
              }else{
                $status = 'Inativo';
              }
              $options .= '<div class="col-md-4 col-sm-4 col-xs-6">
                            <h2 style="color:#<?=hex1?>" align="center"><strong>'.$nome.'</strong></h2>
                            <a href="galeria-exibicao/'.$id.'">
                              <p align="center"><img src="'.$imagem.'" alt="" class="img-responsive mb-30 imagemGaleria"></p>
                            </a>
                            </div>';
          }
  
           echo $options;
               $conn = null; 
      
    } catch (PDOException $e) {
         echo $e->getMessage();
  
    }
}
function listarEventosMelloFaro(){
  try{
    $conn = conectar_pgsql('CMS');
    $sql = "SELECT Anos FROM Eventos_Finalizados_Anos ORDER BY Anos DESC";
    $consulta = $conn->query($sql);
    $options = "";
    while($linha = $consulta->fetchAll(PDO::FECHT_ASSOC)){
      $ano = $linha['Anos'];
      $options .= '<a href="/eventos-'.$ano.'" class="list-group-item"><i class="ion-arrow-right-c" aria-hidden="true"></i>'.$ano.'</a>';
    }
    echo $options;
    $conn = null;
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}
function galeriaListarPorID($galeriaID){
  try {
     $conn = conectar_pgsql('CMS');
              
      $sql = "SELECT galeria.nome, galeria.status, img.imagem 
              FROM site.galeria galeria
              INNER JOIN site.imagens_galeria img ON img.id_galeria = galeria.id
              WHERE galeria.id = $galeriaID AND galeria.status = '1' ORDER BY img.id";
      $consulta = $conn->query($sql);
       $options = "";
          while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              $imagem = $linha['imagem'];
              $titulo = $linha['nome'];
              $options .= '<div class="col-md-3 col-sm-4 col-xs-6 mr_bottom">
                           <a class="gal" href="'.$imagem.'" title="'.$titulo.'" data-gallery="" style="background-image:url('.$imagem.')">
                           </a>
                           </div>';
          }
 
           echo $options;
               $conn = null; 
      
    } catch (PDOException $e) {
         echo $e->getMessage();
  
    }
}
function ordemSite(){
      $cpf_cnpj = LICENCA;
      try {
        $conn = conectar_pgsql('CMS');
        $sql = "SELECT Estilo, Topo, Posicao1, Posicao2, Posicao3, Posicao4, Posicao5, Posicao6, Rodape FROM CMS.Site WHERE cpf_cnpj = '$cpf_cnpj'";
        $consulta = $conn->query($sql);
        return $consulta->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
          echo "Erro: ". $e;
      }
}
function escreverFacebook(){
    $facebook .= '<div class="row redes">';
    if(trim(FACEBOOKWIDGET) <> ''){
        $facebook .= '<div class="col-md-6 img">';
        $facebook .= '<h2 class="page-header">Facebook</h2>';
        $facebook .= '<div id="fb-root"></div>';
        $facebook .= '<script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));</script>';
        $facebook .= '<div class="fb-page" data-href="'.FACEBOOKWIDGET.'" data-width="500" data-height="214" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="'.FACEBOOKWIDGET.'"><a href="'.FACEBOOKWIDGET.'">'.FANTASIA.'</a></blockquote></div></div>';
        $facebook .= '</div>';
    }
    echo $facebook;
}
function home19(){
    $home .= '<section id="home">';
    $home .= '<div class="full-screen-block">';
    $home .= '<div class="bg-dark"></div>';
    $home .= '<div class="welcome-video">';
    $home .= '<div class="container">';
    $home .= '<div class="row">';
    $home .= '<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 ">';
    $home .= '<div class="fade-ticker clearfix">';
    $home .= '<div class="big-text textFade"><h1 class="head-title"><span>Destinos</span> Espetaculares!</h1></div>';
    $home .= '<div class="big-text textFade"><h1 class="head-title textFade">Gerenciamos <span> a sua viagem corporativa</span></h1></div>';
    $home .= '<div class="big-text textFade"><h1 class="head-title">Os melhores <span>cruzeiros estão aqui!</span></h1></div>';
    $home .= '</div></div></div></div></div>';
    $home .= '<div class="home-video">';
    $home .= '<video class="cover-video" id="cover-video" loop autoplay>';
    $home .= '<source src="CMS/Modelo19/video/destino.webm" type="video/webm">';
    $home .= '<source src="CMS/Modelo19/video/destino.mp4" type="video/mp4">';
    $home .= '</video>';
    $home .= '</div></div>';
    $home .= '</section>';
    echo $home;
}
function lazer19(){
    $lazer .= '<section  id="lazer" class="paralax">';
    $lazer .= '<div class="section-block-title">';
    $lazer .= '<div class="section-title">';
    $lazer .= '<div class="container">';
    $lazer .= '<div class="row">';
    $lazer .= '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">';
    $lazer .= '<article class="section-title-body">';
    $lazer .= '<h1 class="head-title">Lazer</h1>';
    $lazer .= '<p class="head-text">Veja os melhores pacotes!</p>';
    $lazer .= '</article>';
    $lazer .= '</div></div></div></div></div>';
    $lazer .= '<div class="block2">';
    $lazer .= '<div class="container">';
    $lazer .= '<div id="owl-projects"  class="owl-carousel owl-carousel-with-dots">';
    $lazer .= '<div class="item">';
    $lazer .= '<div class="portfolio-cell">';
    $lazer .= '<div class="portfolio-item">';
    $lazer .= '<div class="image-overlay">';
    $lazer .= '<a href="/modelos_responsivos/modelo14/pacotes.php?categoria=11"></a>';
    $lazer .= '<div class="image-overlay-content"><h4>Destinos Nacionais</h4><p>Paisagens de tirar o fôlego</p></div>';
    $lazer .= '</div>';
    $lazer .= '<img src="CMS/Modelo19/img/destinosNacionais.jpg" alt="image" class="img-responsive">';
    $lazer .= '</div></div></div>';
    $lazer .= '<div class="item">';
    $lazer .= '<div class="portfolio-cell">';
    $lazer .= '<div class="portfolio-item">';
    $lazer .= '<div class="image-overlay">';
    $lazer .= '<a href="/modelos_responsivos/modelo14/pacotes.php?categoria=1"></a>';
    $lazer .= '<div class="image-overlay-content"><h4>Destinos Internacionais</h4><p>Conheça lugares espetaculares</p></div>';
    $lazer .= '</div>';
    $lazer .= '<img src="CMS/Modelo19/img/destinosInternacionais.jpg" alt="image" class="img-responsive">';
    $lazer .= '</div></div></div>';
    $lazer .= '<div class="item">';
    $lazer .= '<div class="portfolio-cell">';
    $lazer .= '<div class="portfolio-item">';
    $lazer .= '<div class="image-overlay">';
    $lazer .= '<a href="/modelos_responsivos/modelo14/rt_cruzeiros.php"></a>';
    $lazer .= '<div class="image-overlay-content"><h4>Cruzeiros Marítimos</h4><p>Navegue por mares magníficos</p></div>';
    $lazer .= '</div>';
    $lazer .= '<img src="CMS/Modelo19/img/cruzeirosMaritimos.jpg" alt="image" class="img-responsive">';
    $lazer .= '</div></div></div>';
    $lazer .= '</div></div></div></div></section>';
    echo $lazer;
}
function servicos19(){
    $servicos .= '<section  id="servicos" class="paralax">';
    $servicos .= '<div class="section-block-title">';
    $servicos .= '<div class="section-title">';
    $servicos .= '<div class="container">';
    $servicos .= '<div class="row">';
    $servicos .= '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">';
    $servicos .= '<article class="section-title-body"><h1 class="head-title">Serviços</h1><p class="head-text">Veja os serviços que oferecemos!</p></article>';
    $servicos .= '</div></div></div></div></div>';
    $servicos .= '<div class="block2">';
    $servicos .= '<div class="container">';
    $servicos .= '<div class="block-product-tab">';
    $servicos .= '<nav>';
    $servicos .= '<ul class="nav nav-tabs nav-justified  center"><li class="active"><a href="#passagens" data-toggle="tab"><i class="ion-android-plane"></i>Passagens Aéreas</a></li><li><a href="#hoteis" data-toggle="tab"><i class="ion-ios-pricetags"></i>Hospedagem</a></li><li><a href="#seguro" data-toggle="tab"><i class="ion-paper-airplane"></i>Seguro Viagem</a></li><li><a href="#veiculosInternacionais" data-toggle="tab"><i class="ion-model-s"></i>Locação de Veículos</a></li><li><a href="#trens" data-toggle="tab"><i class="ion-android-train"></i>Tickets de Trens</a></li></ul>';
    $servicos .= '</nav>';
    $servicos .= '<div class="tab-content">';
    $servicos .= '<div class="tab-pane active animated fadeInDown" id="passagens">';
    $servicos .= '<div class="row"><div class="col-md-4"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title">Passagens <span>Aéreas</span></h1><p class="justy-text">Faça sua reserva com rapidez, conforto e segurança! Oferecemos as melhores condições e ofertas para você comprar suas passagens.<p><a href="http://www.e-agencias.com.br/ag34134" class="btn-default">Reservas passagens</a></p></p><br></article></div></div><div class="col-md-8"><img alt="" class="img-responsive mb-30" src="/CMS/Modelo19/img/passagens.png"></div></div>';
    $servicos .= '</div>';
    $servicos .= '<div class="tab-pane animated fadeInDown" id="hoteis">';
    $servicos .= '<div class="row"><div class="col-md-4"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title"><span>Reserva</span> de Hotéis</h1><p>Consulte propostas e preços de diárias dos hotéis do destino que você vai viajar. Contamos com amplo cadastro de hotéis faça sua reserva agora!</p><p><a href="http://megatravel.cangooroo.net/SiteOperadora/AcessoDireto.aspx?U=3VEKzxrmvUF8us9j2J0%2fJq08M4R%2fFG3vEXBnZpS5EOg%3d&S=oMmr9Oj3ltxj7hCnXKCKA0WPTt0XgxcRIf%2bUc1%2bx0AQOZX%2bLJCB5ShNvmfC6Gbqe3ijlWDD5OjTGGWfMK7mljCgsKMmp7fI7&init=hotel" class="btn-default">Reservas hotéis</a></p></article></div></div><div class="col-md-8"><img alt="" class="img-responsive mb-30" src="CMS/Modelo19/img/hoteisNacionais.jpg"></div></div>';
    $servicos .= '</div>';
    $servicos .= '<div class="tab-pane animated fadeInDown" id="seguro">';
    $servicos .= '<div class="row"><div class="col-md-4"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title"><span>Seguro</span> Viagem</h1><p>Oferecemos o serviço de seguro viagem!<br/> Tenha uma viagem tranquila e sem preocupações. Faça a compra do seu seguro conosco é simples e rápido!</p><p><a href="http://coris-emissoes.com.br/b2w_v4/auth/default.asp?id=624&user=B2W624&key=108624" class="btn-default">Compre aqui o seu seguro</a></p></article></div></div><div class="col-md-8"><img alt="" class="img-responsive mb-30" src="/CMS/Modelo19/img/seguro.jpg"></div></div>';
    $servicos .= '</div>';
    $servicos .= '<div class="tab-pane animated fadeInDown" id="veiculosInternacionais">';
    $servicos .= '<div class="row"><div class="col-md-4"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title"><span>Reserva</span> de Veículos</h1><p>Na frota disponível encontram-se veículos que vão desde os carros convencionais, os mini, os esportivos, os conversíveis e os carros de luxo. Faça sua reserva!</p><p><a href="http://vetor.movida.com.br/movida/portal/pf2/rentacar.php?AgenciaID=570968" class="btn-default">Reserve seu veículo</a></p><br></article></div></div><div class="col-md-8"><img alt="" class="img-responsive mb-30" src="/CMS/Modelo19/img/carrosInt.jpg"></div></div>';
    $servicos .= '</div>';
    $servicos .= '<div class="tab-pane animated fadeInDown" id="trens">';
    $servicos .= '<div class="row"><div class="col-md-4"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title">Tickets de <span>Trens</span></h1><p>Viaje pela Europa com trens de alta velocidade! Existem diversos tipos de passes de trem que são como "passaportes" que permitem viagens dentro de um período segundo determinadas regras, sem que haja necessidade de comprar tickets a cada viagem. Esses passes possibilitam uma infinidade de conexões e destinos. Oferecemos a opção de tickets também conforme a sua necessidade.</p><p><a href="#contato" class="btn-default">Entre em contato conosco</a></p></article></div></div><div class="col-md-8"> <img alt="" src="CMS/Modelo20/img/trem.jpg" class="img-responsive image"></div></div>';
    $servicos .= '</div>';
    $servicos .= '</div></div></div></div>';
    $servicos .= '</section>';
    echo $servicos;
}
function sobrenos19(){
    $sobrenos .= '<section  id="sobre-nos" class="paralax">';
    $sobrenos .= '<div class="section-block-title">';
    $sobrenos .= '<div class="section-title">';
    $sobrenos .= '<div class="container">';
    $sobrenos .= '<div class="row">';
    $sobrenos .= '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"><article class="section-title-body"><h1 class="head-title">Sobre Nós</h1><p class="head-text">Conheça nossos valores!</p></article></div>';
    $sobrenos .= '</div></div></div></div>';
    $sobrenos .= '<div class="block">';
    $sobrenos .= '<div class="container">';
    $sobrenos .= '<div class="section-sub-title center">';
    $sobrenos .= '<div class="row"><div class="col-lg-12"><h1 class="page-header">A Empresa<small></small></h1></div></div>';
    $sobrenos .= '<div class="row"><div class="col-md-6 img"><figure><img src="'.getImageRoute(SOBREIMAGEM, 'imagens', DIRETORIO).'" class="img-responsive"></figure></div><div class="col-md-6"><h2 class="title2">Nossa História</h2><p>'.SOBRETEXTO.'</p></div></div>';
    $sobrenos .= '<hr></div></div></div>';
    $sobrenos .= '<div class="block-feature2">';
    $sobrenos .= '<div class="bg-50-l"></div>';
    $sobrenos .= '<div class="container">';
    $sobrenos .= '<div class="row"><div class="col-md-6 col-sm-6"><div class="block"><div class="section-sub-title center pad-r-15"><article class="section-title-body"><h1 class="head-title">Sites para <span>Agências</span> de viagens! </h1><p class="head-text">O nosso site para agência de viagens é desenvolvido sobre modelos testados e que podem ser altamente personalizados conforme o gosto e necessidade do cliente. Entretanto criamos site para agência de viagens baseado no projeto gráfico apresentado pelo cliente ou desenvolvido internamente por nós. Outra opção diferenciada no mercado é o gerenciamento de site de agência de viagens, onde o marketing digital, as newsletters, o SEO, os anúncios no Google Adwords e a inclusão de novos conteúdos fazem parte do escopo do gerenciamento.</p></article></div></div></div><div class="col-md-6 col-sm-6"></div></div></div></div>';
    $sobrenos .= '<div class="block-feature1">';
    $sobrenos .= '<div class="bg-50-r"></div>';
    $sobrenos .= '<div class="container">';
    $sobrenos .= '<div class="row"><div class="col-md-6 col-sm-6 col-md-offset-6  col-sm-offset-6"><div class="block pad-l-15"><div class="section-sub-title center"><article class="section-title-body"><h1 class="head-title">Nosso <span>propósito</span> é garantir qualidade </h1><p class="head-text">E para fechar todo o ciclo de serviços, oferecemos a manutenção reparatória no site de agência de viagens, que é executada em até 48 horas após a sua solicitação e o melhor serviço de hospedagem do mercado, onde o site da agência de viagens tem a sua disposição uma infra-estrutura de servidores balanceado e com redundância, garantindo assim alto nível de disponibilidade e de velocidade no acesso.</p></article></div></div></div></div></div></div>';
    $sobrenos .= '</section>';
    echo $sobrenos;
}
function contato19(){
    $contato .= '<section  id="contato" class="paralax">';
    $contato .= '<div class="section-block-title">';
    $contato .= '<div class="section-title"><div class="container"><div class="row"><div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"><article class="section-title-body"><h1 class="head-title">Contato</h1><p class="head-text">Entre em contato com a Montenegro!</p></article></div></div></div></div>';
    $contato .= '</div>';
    $contato .= '<div class="block2">';
    $contato .= '<div class="container">';
    $contato .= '<div class="row">';
    $contato .= '<div class="col-md-6 col-sm-6"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title"><span>Nossos</span> Contatos</h1></article></div><p>Se você pretende viajar não deixe de entrar em contato com a Montenegro. Dedicamos o melhor atendimento a nossos clientes e queremos que você comprove essa qualidade.</p><br><h4 class="widget-title"><i class="ion-android-call"></i>Telefone:</h4><p>+55 '.TELEFONE.'<br/></p><br><h4 class="widget-title"><i class="ion-email"></i>Email:</h4><p><a href="mailto:'.EMAIL.'">'.EMAIL.'</a></p><br/></div>';
    $contato .= '<div class="col-md-6"><div class="section-sub-title"><article class="section-title-body"><h1 class="head-title letra"><span>Formulário de</span> Contato</h1></article></div><div class="col-md-'.$tamanhoForm.'"><form name="sentMessage" id="contactForm" method="POST" class="formulario"><input type="hidden" id="val"><div class="control-group form-group"><div class="controls"><label></label><input type="text" class="form-control form-rodape validar nome" erro="Preencha o nome" name="name" id="nome" placeholder="Insira seu nome"/></div></div><div class="control-group form-group"><div class="controls"><input type="email" class="form-control form-rodape validar email" erro="Preencha o E-mail" name="email" id="email" placeholder="Insira seu e-mail"/><input class="form-control form-rodape empresa_email" type="hidden" value="'.EMAIL.'"></div></div><div class="control-group form-group"><div class="controls"><input class="form-control form-rodape validar telefone" erro="Preencha o Telefone" type="tel" id="telefone" size="30" value="" placeholder="Insira seu telefone"></div></div><div class="control-group form-group"><div class="controls"><textarea class="form-control form-rodape validar mensagem" erro="Preencha o campo Mensagem" id="mensagem" cols="3" rows="5" placeholder="Insira sua mensagem…"></textarea><button type="button" class="btn btn-primary btn-enviar" onclick="enviarEmailContato()"> Enviar</button></form></div></div>';
    $contato .= '</div></div></div></div>';
    $contato .= '<div id="google-map"><input type="hidden" id="email_hidden" value="'.EMAIL.'"><input type="hidden" id="latitude_map" value="'.LATITUDE.'"><input type="hidden" id="longitude_map" value="'.LONGITUDE.'"><input type="hidden" id="endereco_map" value="'.ENDERECO.'"><input type="hidden" id="cidade_map" value="'.CIDADE.'"><input type="hidden" id="estado_map" value="'.ESTADO.'"><div id="mapa" class="mapa" style="height: 500px; width: 100%"></div></div>';
    $contato .= '</div></div></div></div></div>';
    echo $contato;
}
function newsletter19(){
    $news .= '<div class="block color-scheme-4">';
    $news .= '<div class="container">';
    $news .= '<div class="section-sub-title center">';
    $news .= '<div class="col-md-4 "><article class="section-title-body"><h3>Nossas Newsletters</h3><form lass="form-group" method="post" action="#" class="form"><p class="col-sm-12 formHome"><input type="text" name="nome" id="newsletternome" value="" class="form-control input-sm" placeholder="Digite seu nome" required></p><p class="col-sm-12 formHome"><input type="email" name="email" value="" id="newsletterEmail" class="form-control input-sm" placeholder="Digite seu e-mail" required /></p><p class="col-sm-6 formHome"><input type="text" class="form-control input-sm" id="palavra_captcha" placeholder="Digite o código" name="palavra_captcha" /></p><div class="col-sm-6 formHome"><p class="cap2"><img src="captcha.php?l=80&a=30&tf=14&ql=4" class="capcha"></p><input type="hidden" name="format" value="" id="validEmail" /><p class="col-sm-12 formHome"><input type="button" value="Cadastre-se" class="pull-right" onclick="gravarMailing()"/></p></div></form></div>';
    $news .= '</div></div></div>';
    $news .= '</div></div></div></div></div></div></div></section>';
    echo $news;
}
function home20(){
    $home20 .= '<section id="home">';
    $home20 .= '<div class="tp-banner-container">';
    $home20 .= '<div class="tp-banner" >';
    $home20 .= '<ul class="list-unstyled"> ';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/corporativo.jpg"  alt="slidebg2" data-bgposition="center center"><div class="tp-caption white_heavy_70 sft skewtobottom text-center  rs-parallaxlevel-1" data-x="center" data-y="265" data-speed="1000" data-start="600" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Power1.easeIn" >Conheça nosso </div><div class="tp-caption active_heavy_100 sfb skewtobottom text-center  rs-parallaxlevel-1" data-x="center" data-y="360" data-speed="1000" data-start="1000" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Power1.easeIn">Corporativo</div><div class="tp-caption customin skewtobottom  rs-parallaxlevel-1" data-x="center" data-y="540" data-speed="1000" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-start="1500" data-easing="Back.easeOut" data-endspeed="400" data-endeasing="Power1.easeIn"><a href="#corporativo" class="btn-default white current">Saiba mais</a></div></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner1.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner2.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner3.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner4.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner5.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner6.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner7.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner8.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner9.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner10.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '<li data-transition="fade" data-slotamount="7"  data-delay="6000"><img src="CMS/Modelo20/img/preview/slider/banner11.jpg"  alt="slidebg2" data-bgposition="center center" class = "img img-responsive"></li>';
    $home20 .= '</ul></div></div></section>';
    echo $home20;
}
function pacotes20(){
    $bannerPacotes = gerarNovoBanner(2);
    if($bannerPacotes[0] <> ''){
        $pacote20 .= '<section  id="lazer" class="paralax">';
        $pacote20 .= '<div class="section-block-title">';
        $pacote20 .= '<div class="section-title">';
        $pacote20 .= '<div class="container">';
        $pacote20 .= '<div class="row">';
        $pacote20 .= '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"><article class="section-title-body"><h1 class="head-title t1">Lazer</h1><p class="head-text">Veja os melhores pacotes!</p></article></div>';
        $pacote20 .= '</div></div></div></div>';
        $pacote20 .= '<div class="block2">';
        $pacote20 .= '<div class="container">';
        $pacote20 .= '<div id="owl-projects"  class="owl-carousel owl-carousel-with-dots">';
        foreach ($bannerPacotes as $pacote) {
            $img = getImageRoute($pacote->imagem, 'imagens', DIRETORIO);
            $pacote20 .= '<div class="item">';
            $pacote20 .= '<div class="portfolio-cell">';
            $pacote20 .= '<div class="portfolio-item">';
            $pacote20 .= '<div class="image-overlay"><a href="'.$pacote->link.'"></a><div class="image-overlay-content"><h4>'.$pacote->titulo.'</h4><p>'.$pacote->texto.'</p></div></div><img src="'.$img.'" alt="'.$pacote->texto.'" class="img-responsive"></div>';
            $pacote20 .= '</div></div>';
        }
        $pacote20 .= '</div></div></div></section>';
  $roteiroTT .= '<section id="roteiros" class="container js-list-item">';
  $roteiroTT .= '<h1 class="head-title">Roteiros <span></span></h1>';
  $roteiroTT .= '<span class="dest"></span>';
  if($destaques[0] <> ''){
    foreach ($destaques as $destaque){
      $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
      $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
      if($destaque->preco == 0 OR $destaque->preco == '0,00'){
        $preco = "Sob consulta";
      }
      $roteiroTT .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
      $roteiroTT .= '<figure style="background-image:url('.$img.')" class="roteiros">';
      $roteiroTT .= '<a href="roteiro/'.$destaque->id_roteiro.'" class="link_caixa">';
      $roteiroTT .= '<figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">'.$preco.'</h1></div></figcaption>';
      $roteiroTT .= '</a>';
      $roteiroTT .= '</figure>';
      $roteiroTT .= '<h4>'.$destaque->nome.'</h4>';
      $roteiroTT .= '<p style="height: 20px;">'.$destaque->descritivo.'</p>';
      $roteiroTT .= '<p><a href="roteiro/'.$destaque->id_roteiro.'" class="btn btn-primary">Saiba Mais</a></p>';
      $roteiroTT .= '</div>';
    }
    echo $pacote20;
}
}
}
function sobre20(){
    $sobre20 .= '<section  id="sobre-nos" class="paralax">';
    $sobre20 .= '<div class="section-block-title"><div class="section-title"><div class="container"><div class="row"><div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"><article class="section-title-body"><h1 class="head-title t1">Sobre Nós</h1><p class="head-text">Conheça nossos valores!</p></article></div></div></div></div></div>';
    $sobre20 .= '<div class="block responsivo-ajuste"><div class="container"><div class="section-sub-title center"><article class="section-title-body"><h1 class="head-title" style="text-align:center!important;">A <span>Montenegro</span></h1><p class="head-text">A Montenegro é uma empresa especializada na produção e criação de site para agência de viagens e na prestação de serviços correlatos, principalmente no segmento de Marketing Digital e de sistemas. Atuamos no mercado a 18 anos e possuimos uma carteira de agências de viagens com mais de 250 clientes. Entre essas agências temos desde pequenos Home Office até grandes agências corporativas.</p></article></div></div></div>';
    $sobre20 .= '<div class="block-feature4"><div class="bg-50-l"></div><div class="container"><div class="row"><div class="col-md-6 col-sm-12"><div class="block responsivo-ajuste1"><div class="section-sub-title center pad-r-15"><article class="section-title-body"><h1 class="head-title title4">Sites para <span>Agências</span> de viagens!</h1><p class="head-text text4">O nosso site para agência de viagens é desenvolvido sobre modelos testados e que podem ser altamente personalizados conforme o gosto e necessidade do cliente. Entretanto criamos site para agência de viagens baseado no projeto gráfico apresentado pelo cliente ou desenvolvido internamente por nós. Outra opção diferenciada no mercado é o gerenciamento de site de agência de viagens, onde o marketing digital, as newsletters, o SEO, os anúncios no Google Adwords e a inclusão de novos conteúdos fazem parte do escopo do gerenciamento.</p></article></div></div></div><div class="col-md-6 col-sm-12"></div></div></div></div>';
    $sobre20 .= '<div class="block-feature5"><div class="bg-50-r"></div><div class="container"><div class="row"><div class="col-md-6 col-sm-12 col-md-offset-6  col-sm-offset-0"><div class="block pad-l-15 visao"><div class="section-sub-title center"><article class="section-title-body"><h1 class="head-title title5">Nosso <span>propósito</span> é garantir qualidade</h1><p class="head-text text5">E para fechar todo o ciclo de serviços, oferecemos a manutenção reparatória no site de agência de viagens, que é executada em até 48 horas após a sua solicitação e o melhor serviço de hospedagem do mercado, onde o site da agência de viagens tem a sua disposição uma infra-estrutura de servidores balanceado e com redundância, garantindo assim alto nível de disponibilidade e de velocidade no acesso.</p></article></div></div></div></div></div></div>';
    $sobre20 .= '</section>';
    echo $sobre20;
}
function listarCategoriasPaiModelo21(){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT TOP(6) cat.RoteiroCategoriaID, cat.nome, cat.NivelPai, cat.Nivel,
          cat.descricao, cat.imagem, cat.status
          FROM Roteiros.Categoria cat
          LEFT JOIN Roteiros.Roteiro rot ON cat.RoteirocategoriaID = rot.ID_Categoria
          WHERE cat.Nivel = 0 AND cat.status = 1
          AND cat.cpf_cnpj = '$licenca'
          ORDER BY cat.nome";
          $consulta = $conn->query($sql);
          $content = "";
          $content .= "<section id='roteiros' class='container js-list-item roteiroPromocao'>";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', DIRETORIO);
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  if($contChar > 150){
                      $term = '...';
                  }
            $content .= "<div class='col-lg-4 col-md-4 col-sm-6 destinos'>";
            $content .= '<figure style="background-image:url(\''.$img.'\')" class="roteiros roteirosPromocoes">';
            $content .= "<a href='/mais-roteiros/".$linha['RoteiroCategoriaID']."' class='link_caixa'>";
            $content .= "<figcaption><div class='wrapper caixa caixaPromocoes'><h1 class='txt_caixa botaoMaisProm' align='center'>Saiba Mais</h1></div></figcaption>";
            $content .= "</a></figure>";
            $content .= "<h4>".$linha['nome']."</h4>";
            $content .= "<p>".substr($linha['descricao'], 0, 140).$term."</p>";
            $content .= "<p><a href='/mais-roteiros/".$linha['RoteiroCategoriaID']."' class='btn btn-primary'>Saiba Mais</a></p></div>";
            }
            $content .= "</section>";
            echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listarCategoriasPaiModelo21Ilimitado(){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT cat.RoteiroCategoriaID, cat.nome, cat.NivelPai, cat.Nivel,
          cat.descricao, cat.imagem, cat.status
          FROM Roteiros.Categoria cat
          LEFT JOIN Roteiros.Roteiro rot ON cat.RoteirocategoriaID = rot.ID_Categoria
          WHERE cat.Nivel = 0 AND cat.status = 1
          AND cat.cpf_cnpj = '$licenca'
          ORDER BY cat.nome";
          $consulta = $conn->query($sql);
          $content = "";
          $content .= "<section id='roteiros' class='container js-list-item roteiroPromocao'>";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = getImageRoute($linha['imagem'], 'roteiros', DIRETORIO);
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  if($contChar > 150){
                      $term = '...';
                  }
            $content .= "<div class='col-lg-4 col-md-4 col-sm-6 destinos'>";
            $content .= '<figure style="background-image:url(\''.$img.'\')" class="roteiros roteirosPromocoes">';
            $content .= "<a href='/pr-mais-roteiros/".$linha['RoteiroCategoriaID']."' class='link_caixa'>";
            $content .= "<figcaption><div class='wrapper caixa caixaPromocoes'><h1 class='txt_caixa botaoMaisProm' align='center'>Saiba Mais</h1></div></figcaption>";
            $content .= "</a></figure>";
            $content .= "<h4>".$linha['nome']."</h4>";
            $content .= "<p>".substr($linha['descricao'], 0, 140).$term."</p>";
            $content .= "<p><a href='/pr-mais-roteiros/".$linha['RoteiroCategoriaID']."' class='btn btn-primary'>Saiba Mais</a></p></div>";
            }
            $content .= "</section>";
            echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function verificador(){
    $verificador .= '<div class="verificador fundo">';
    $verificador .= '<div id="nav-icon3" style="cursor:pointer;" onclick="showMenu()"><span></span><span></span><span></span><span></span></div>';
    $verificador .= '<ul class="hover"><li class="current m1"><a href="#home">Home</a></li><li><a class="m1" href="#corporativo">Corporativo</a></li><li><a class="m1" href="#servicos">Serviços</a></li><li><a class="m1" href="#lazer">Lazer</a></li><li><a class="m1" href="/mais-roteiros" class="external">Promoções</a></li><li><a class="m1" href="#sobre-nos">Sobre Nós</a></li><li><a class="m1" href="/alfandega" class="external">Informações</a></li><li><a class="m1" href="#contato">Contato</a></li></ul>';
    $verificador .= '</div>';
    echo $verificador;
}
/* alterações em caso de sync */
function header21(){
    $header21 .= '<header id="header">';
    $header21 .= '<div class="main-container">';
    $header21 .= '<div id="carousel-example-generic" class="carousel slide carousel-fade js-list-item js-current-panel">';
    $header21 .= '<div class="col-md-6 logo"><a href="/index.php#home" class="header-logo"> <img src="'.getImageRoute(LOGO, 'logo', DIRETORIO).'" alt="'.FANTASIA.'"></a></div>';
    $header21 .= '<div class="carousel-inner">';
    $header21 .= '<div class="item active">';
    $header21 .= '<img src="CMS/Modelo21/images/bannerNorte.jpg">';
    $header21 .= '<div class="carousel-caption">';
    $header21 .= '<h3 data-animation="animated fadeInLeft"> América do Norte<br/>';
    $header21 .= '<span class="sub-text">São inúmeras atrações, desertos, vulcões e florestas<br/></span>';
    $header21 .= '<ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0"></li><li data-target="#carousel-example-generic" data-slide-to="1"></li><li data-target="#carousel-example-generic" data-slide-to="2"></li><li data-target="#carousel-example-generic" data-slide-to="3"></li><li data-target="#carousel-example-generic" data-slide-to="4"></li></ol>';
    $header21 .= '</h3>';
    $header21 .= '</div></div>';
    $header21 .= '<div class="item">';
    $header21 .= '<img src="CMS/Modelo21/images/bannerEuropa.jpg"><div class="carousel-caption"><h3 data-animation="animated fadeInLeft"> Europa<br/><span class="sub-text">Com seus castelos medievais e praias do Mediterrâneo <br/></span><ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0"></li><li data-target="#carousel-example-generic" data-slide-to="1"></li><li data-target="#carousel-example-generic" data-slide-to="2"></li><li data-target="#carousel-example-generic" data-slide-to="3"></li><li data-target="#carousel-example-generic" data-slide-to="4"></li></ol></h3></div>';
    $header21 .= '</div>';
    $header21 .= '<div class="item">';
    $header21 .= '<img src="CMS/Modelo21/images/bannerSul.jpg"><div class="carousel-caption"><h3 data-animation="animated fadeInLeft"> América do Sul <br/><span class="sub-text">Escolha os melhores destinos da América do Sul! <br/></span><ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0"></li> <li data-target="#carousel-example-generic" data-slide-to="1"></li><li data-target="#carousel-example-generic" data-slide-to="2"></li><li data-target="#carousel-example-generic" data-slide-to="3"></li><li data-target="#carousel-example-generic" data-slide-to="4"></li></ol></h3></div>';
    $header21 .= '</div>';
    $header21 .= '<div class="item">';
    $header21 .= '<img src="CMS/Modelo21/images/banner-oceania.png"><div class="carousel-caption"><h3 data-animation="animated fadeInLeft"> Oceania<br/><span class="sub-text">Um continente formado por belas ilhas! <br/></span><ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0"></li><li data-target="#carousel-example-generic" data-slide-to="1"></li><li data-target="#carousel-example-generic" data-slide-to="2"></li><li data-target="#carousel-example-generic" data-slide-to="3"></li><li data-target="#carousel-example-generic" data-slide-to="4"></li></ol></h3></div>';
    $header21 .= '</div>';
    $header21 .= '<div class="item">';
    $header21 .= '<img src="CMS/Modelo21/images/bannerBlog.jpg"><div class="carousel-caption"><h3 data-animation="animated fadeInLeft"> The Blog<br/><span class="sub-text">Acesse nosso blog e fique por dentro das novidades! <br/></span><ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0"></li><li data-target="#carousel-example-generic" data-slide-to="1"></li><li data-target="#carousel-example-generic" data-slide-to="2"></li><li data-target="#carousel-example-generic" data-slide-to="3"></li><li data-target="#carousel-example-generic" data-slide-to="4"></li></ol></h3></div>';
    $header21 .= '</div></div></div></div>';
    $header21 .= '<div class="col-sm-12 buttomScrol"> <a href="#scroll" class="scroll"><i  class="fa fa-angle-double-down" aria-hidden="true"></i><br/><span>Scroll para explorar</span></a> </div>';
    $header21 .= '<div class="menu">';
    $header21 .= '<ul><li class="topo"><a href="#header" id="topo" class="scroll">Top</a></li><li><a href="#" id="panel_prev" class="link js-anterior verificador"><i class="fa fa-angle-up" aria-hidden="true"></i></a></li><li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><li><a href="#scroll" class="scroll"><i class="fa fa-share-square-o" aria-hidden="true"></i></a></li><li><a href="#" class="link js-proximo"><i class="fa fa-angle-down" aria-hidden="true"></i></a></li></ul>';
    $header21 .= '</div></div></div>';
    $header21 .= '</header>';
    echo $header21;
}
function newsletter21(){
    $news21 .= '<div class="container">';
    $news21 .= '<div class="row js-list-item" id="scroll">';
    $news21 .= '<section id="NewsletterContent" class="col-md-8 col-md-offset-2">';
    $news21 .= '<h1 class="head-title scrollAj">Nossas <span>Newsletters</span> </h1>';
    $news21 .= '<form lass="form-group" method="post" action="#" class="form"><p class="col-sm-12 formHome"><input type="text" name="nome" id="newsletternome" value="" class="form-control input-sm" placeholder="Digite seu nome" required></p><p class="col-sm-12 formHome"><input type="email" name="email" value="" id="newsletterEmail" class="form-control input-sm" placeholder="Digite seu e-mail" required /></p><p class="col-sm-6 formHome"><input type="text" class="form-control input-sm" id="palavra_captcha" placeholder="Digite o código" name="palavra_captcha" /></p><div class="col-sm-6 formHome"><p class="cap2"><img src="../../captcha.php?l=80&a=30&tf=14&ql=4" class="capcha"></p><input type="hidden" name="format" value="" id="validEmail" /><p class="col-sm-12 formHome"><input type="button" value="Cadastre-se" class="pull-right" onclick="gravarMailing()"/></p></div></form>';
    $news21 .= '</div></div></section>';
    echo $news21;
}
function parallax121(){
    $parallax1 .= '<section class="container-fluid"><div class="row parallaxOne"> </div></section>';
    echo $parallax1;
}
function parallax221(){
    $parallax2 .= '<section class="container-fluid js-list-item"><div class="row parallaxTwo"> </div></section>';
    echo $parallax2;
}
function destinos21(){
    $destinos .= '<section id="destination" class="container js-list-item">';
    $destinos .= '<h1 class="head-title">Destination <span></span></h1>';
    $destinos .= '<span class="dest"></span>';
    $destinos .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $destinos .= '<figure><img src="CMS/Modelo21/images/europaTraveler.jpg" alt="Keukenhof Package" class="img-responsive im_hover"><a href="#" class="link_caixa"><figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">Veja Mais</h1></div></figcaption></a></figure><h4>Europa</h4><p>Stroll through an unequalled scenery, surrounded by more than 7 million flower</p><p><a href="#" class="btn btn-primary">Saiba Mais</a></p>';
    $destinos .= '</div>';
    $destinos .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $destinos .= '<figure><img src="CMS/Modelo21/images/oceania-home.png" alt="Keukenhof Package" class="img-responsive im_hover"><a href="#" class="link_caixa"><figcaption><div class="wrapper caixa"><h1 class="txt_caixa textMobile" align="center">Veja Mais</h1></div></figcaption></a></figure><h4>Oceania</h4><p>Stroll through an unequalled scenery, surrounded by more than 7 million flower</p><p><a href="#" class="btn btn-primary">Saiba Mais</a></p>';
    $destinos .= '</div>';
    $destinos .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $destinos .= '<figure><img src="CMS/Modelo21/images/asia-home.png" alt="Keukenhof Package" class="img-responsive im_hover"><a href="#" class="link_caixa"><figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">Veja Mais</h1></div></figcaption></a></figure></a><h4>Ásia</h4><p>Stroll through an unequalled scenery, surrounded by more than 7 million flower</p><p><a href="#" class="btn btn-primary">Saiba Mais</a></p>';
    $destinos .= '</div>';
    $destinos .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $destinos .= '<figure><img src="CMS/Modelo21/images/norteTraveler.jpg" alt="Keukenhof Package" class="img-responsive im_hover"><a href="#" class="link_caixa"><figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">Veja Mais</h1></div></figcaption></a></figure><h4>América do Norte</h4><p>Stroll through an unequalled scenery, surrounded by more than 7 million flower</p><p><a href="#" class="btn btn-primary">Saiba Mais</a></p>';
    $destinos .= '</div>';
    $destinos .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $destinos .= '<figure><img src="CMS/Modelo21/images/americaCentral-home.png" alt="Keukenhof Package" class="img-responsive im_hover"><a href="#" class="link_caixa"><figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">Veja Mais</h1></div></figcaption></a></figure><h4>América Central</h4><p>Stroll through an unequalled scenery, surrounded by more than 7 million flower</p><p><a href="#" class="btn btn-primary">Saiba Mais</a></p>';
    $destinos .= '</div>';
    $destinos .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
    $destinos .= '<figure><img src="CMS/Modelo21/images/sulTraveler.jpg" alt="Keukenhof Package" class="img-responsive im_hover"><a href="#" class="link_caixa"><figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">Veja Mais</h1></div></figcaption></a></figure><h4>América do Sul</h4><p>Stroll through an unequalled scenery, surrounded by more than 7 million flower</p><p><a href="#" class="btn btn-primary">Saiba Mais</a></p>';
    $destinos .= '</div>';
    $destinos .= '</section>';
    echo $destinos;
}
function header17(){
    $header17 .= '<div class="row pos1">';
    $header17 .= '<div class="container cont_1">';
    $header17 .= '<div class="row">';
    $header17 .= '<div class="col-lg-4">';
    $header17 .= '<div class="tabs1">';
    $header17 .= '<ul class="nav nav-tabs topo_tab" role="tablist"><li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Reserva Online</a></li><li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Fatura Online</a></li></ul><div class="tab-content"><div role="tabpanel" class="tab-pane active img" id="home"><p><form><h3 class="center">Reserva Online</h3><div class="form-group rsrv_form"><input type="email" class="form-control" id="" placeholder="Usuário"></div><div class="form-group rsrv_form"><input type="password" class="form-control" id="" placeholder="Senha"></div><button type="submit" class="btn btn-default btn1_pos">Acessar</button></form></p></div><div role="tabpanel" class="tab-pane img" id="profile"><p><form><h3 class="center">Fatura Online</h3><div class="form-group rsrv_form"><input type="email" class="form-control" id="" placeholder="Usuário"></div><div class="form-group rsrv_form"><input type="password" class="form-control" id="" placeholder="Senha"></div><button type="submit" class="btn btn-default btn1_pos">Acessar</button></form></p></div></div>';
    $header17 .= '</div>';
    $header17 .= '<div class="cambio"><p class="top_m">Câmbio</p><p>US$ 1,00 = R$ 3,4826</p><p id="inf_aer">13/08/2015</p></div>';
    $header17 .= '</div>';
    $header17 .= '<div class="col-lg-8">';
    $header17 .= '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
    $header17 .= '<ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><li data-target="#carousel-example-generic" data-slide-to="1"></li></ol><div class="carousel-inner" role="listbox"><div class="item active"><img src="CMS/Modelo17/images/bannerMonte.jpg" alt="..."></div><div class="item"><img src="CMS/Modelo17/images/bannerMonte2.jpg" alt="..."></div></div><a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-chevron-left line_arrow"></i><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-chevron-right line_arrow"></i><span class="sr-only">Next</span></a>';
    $header17 .= '</div>';
    $header17 .= '</div>';
    $header17 .= '</div>';
    $header17 .= '</div>';
    $header17 .= '</div>';
    $header17 .= '</div>';
    echo $header17;
}
function aliancas(){
    $aliancas .= '<div class="row">';
    $aliancas .= '<div class="container aliancas">';
    $aliancas .= '<div class="col-lg-12 reset_col resp_center">';
    $aliancas .= '<h3 class="tit_principal">Alianças Aéreas</h3><div class="row"><div class="col-lg-2"></div><div class="col-lg-8 center"><img src="CMS/Modelo17/images/star.png" alt="" onclick="caixaFinalizar2()"><img src="CMS/Modelo17/images/one_world.png" alt="" class="choice_img" onclick="caixaFinalizar3()"><img src="CMS/Modelo17/images/skyteam.png" alt="" onclick="caixaFinalizar4()"></div><div class="col-lg-2"></div></div>';
    $aliancas .= '</div>';
    $aliancas .= '</div>';
    $aliancas .= '</div>';
    echo $aliancas;
}
function background1(){
    $back1 .= '<div class="background-finalizar" style="display: block;" onclick="fecha_F()">';
    $back1 .= '<div class="msg_excluir">';
    $back1 .= '<div class="msg_excluir_txt">';
    $back1 .= '<div class="texto_msg_alert">';
    $back1 .= '<div class="ope_icons" style="padding: 8px;">';
    $back1 .= '<a href="http://www.aerolineas.com.ar/arg/main.asp?idSitio=BR&amp;idPagina=113&amp;idIdioma=po&amp;gclid=CPafj53LyLgCFcdr7AodzC8Akw" target="_blank"><img src="CMS/Modelo17/images/aerolineas.jpg" alt="" border="0"></a><a href="http://www.aeromexico.com/br/seu-voo/comprando-seu-voo/web-check-in.html" target="_blank"><img src="CMS/Modelo17/images/aeromexico.jpg" alt="" border="0"></a><a href="http://www.aircanada.com/en/travelinfo/traveller/checkin/index.html" target="_blank"><img src="CMS/Modelo17/images/aircanada.jpg" alt="" border="0"></a><a href="http://www.airchina.de/en/checkin/" target="_blank"><img src="CMS/Modelo17/images/arichina.jpg" alt="airchina"></a><a href="http://www.aireuropa.com/waeam/xwaea/1/facturacion/xfacturacion_v7.inicio_embarque.html?p_codidi=PT&amp;p_codmer=PT" target="_blank"><img src="CMS/Modelo17/images/aireuropa.jpg" alt="" width="110" height="68" border="0"></a><a href="https://www.airfrance.com.br/BR/pt/local/guidevoyageur/e_services/e_services_echeckin_airfrance.htm" target="_blank"><img src="CMS/Modelo17/images/airfrance.jpg" alt="" border="0"></a><a href="https://check-in.alitalia.com/WebCheckIn/br_pt" target="_blank"><img src="CMS/Modelo17/images/alitalia.jpg" alt="" border="0"></a><a href="http://www.ana.co.jp/wws/japan/e/asw_common/checkin/click/guide.html" target="_blank"><img src="CMS/Modelo17/images/ana.jpg" alt="ana" width="104" height="64"></a><a href="https://www.aa.com/reservation/flightCheckInViewReservationsAccess.do?v_locale=en_US&amp;v_mobileUAFlag=AA" target="_blank"><img src="CMS/Modelo17/images/americanairlines1.jpg" alt="americanairlines1" width="104" height="64"></a><a href="http://www.avianca.com.br/web-check-in1" target="_blank"><img src="CMS/Modelo17/images/avianca.jpg" alt="" border="0"></a><a href="http://viajemais.voeazul.com.br/CheckinOnLine.aspx" target="_blank"><img src="CMS/Modelo17/images/azul.jpg" alt="azul"></a><a href="https://portal.iberia.es/webcki_handling/busquedaLoader.do?aerolinea=OB" target="_blank"><img src="CMS/Modelo17/images/boa.jpg" alt="boa" width="104" height="64"></a><a href="http://www.britishairways.com/travel/olcilandingpageauthreq/public/pt_ao" target="_blank"><img src="CMS/Modelo17/images/britishairways.jpg" alt="" border="0"></a><a href="https://checkin.copaair.com/web/check-in?execution=e1s1" target="_blank"><img src="CMS/Modelo17/images/copa.jpg" alt="" border="0"></a><a href="http://pt.delta.com/index.jsp?lang=pt&amp;loc=br" target="_blank"><img src="images/delta.jpg" alt="" border="0"></a><a href="http://www.elal.co.il/elal/english/allaboutyourflight/beforeyourflight/en_checkin_lobby_210413.html" target="_blank"><img src="CMS/Modelo17/images/el.jpg" alt="" border="0"></a><a href="https://fly4.emirates.com/CKIN/OLCI/FlightInfo.aspx" target="_blank"><img src="CMS/Modelo17/images/emirates.jpg" alt="" border="0"></a><a href="http://www.ethiopianairlines.com/en/travel/checkin/onlinecheckin.aspx" target="_blank"><img src="CMS/Modelo17/images/ethiopian.jpg" alt="ethiopian" width="104" height="64"></a><a href="http://www.etihad.com/en/before-you-fly/check-in-online/" target="_blank"><img src="CMS/Modelo17/images/etihad.jpg" alt="" border="0"></a><a href="http://checkininternet.voegol.com.br/in" target="_blank"><img src="CMS/Modelo17/images/gol.jpg" alt="gol" width="104" height="64"></a><a href="http://www.iberia.com/pt/autocheckin-online/" target="_blank"><img src="CMS/Modelo17/images/iberia.jpg" alt="" border="0"></a><a href="https://www.klm.com/travel/gb_en/prepare_for_travel/checkin_options/internet_checkin/ici_jffp_app.htm" target="_blank"><img src="CMS/Modelo17/images/klm.jpg" alt="" border="0"></a><a href="https://www.koreanair.com/global/pt_br/offers-promotion/promotions-hidden/web-mobile-check-in.html" target="_blank"><img src="CMS/Modelo17images/korean.jpg" alt="korean" width="104" height="64"></a><a href="http://www.lan.com/pt_br/sitio_personas/programe-sua-viagem/economize-tempo/check-in/index.html" target="_blank"><img src="CMS/Modelo17/images/lan.jpg" alt="" border="0"></a><a href="http://www.lufthansa.com/br/pt/Check-in-online-info" target="_blank"><img src="CMS/Modelo17/images/lufthansa.jpg" alt="" border="0"></a><a href="http://www.qantas.com.au/travel/airlines/checkin/global/en" target="_blank"><img src="CMS/Modelo17images/qantas.jpg" alt="" border="0"></a><a href="http://www.qatarairways.com/global/en/check-in-online.page" target="_blank"><img src="CMS/Modelo17/images/qatar.jpg" alt="" border="0"></a><a href="http://www.singaporeair.com/checkIN-flow.form?execution=e1s1" target="_blank"><img src="CMS/Modelo17images/singapore.jpg" alt="" border="0"></a><a href="https://www.skyairline.cl/(S(xy3z41rb4jmo23bupirqjy55))/en/index.aspx" target="_blank"><img src="CMS/Modelo17images/SkyAirline.jpg" alt=""></a><a href="https://checkin.si.amadeus.net/1ASIHSSCWEBSA/sscwsa/checkin" target="_blank"><img src="CMS/Modelo17/images/southafrican.jpg" alt="" border="0"></a><a href="https://www.swiss.com/ch/EN/profile/login" target="_blank"><img src="CMS/Modelo17images/swiis.jpg" alt=""></a><a href="http://www.taag.com/pt/online-checkin.aspx" target="_blank"><img src="CMS/Modelo17/images/taag.jpg" alt="" border="0"></a><a href="https://checkin.si.amadeus.net/1ASIHSSCWEBJJ/sscwjj/checkin" target="_blank"><img src="CMS/Modelo17images/tam.jpg" alt="tam" width="104" height="64"></a><a href="http://www.flytap.com/Portugal/pt/PlanearEReservar/PrepararAViagem/Checkin/CheckinOnline" target="_blank"><img src="CMS/Modelo17/images/tap.jpg" alt="" border="0"></a><a href="https://www4.thy.com/onlinecheckin/start.tk?lang=en" target="_blank"><img src="CMS/Modelo17/images/turkishairlines.jpg" alt="" border="0"></a><a href="http://www.united.com/travel/checkin/start.aspx?LangCode=en-US&amp;SID=EDD6C5F8C0FA401298C43FEBC71285FB" target="_blank"><img src="CMS/Modelo17/images/united1.jpg" alt="united1" width="104" height="64"></a>';
    $back1 .= '</div></div></div></div></div>';
    echo $back1;
}
function background2(){
    $back2 .= '<div class="background-finalizar2" style="display: block;" onclick="fecha_F2()">';
    $back2 .= '<div class="msg_excluir">';
    $back2 .= '<div class="msg_excluir_txt">';
    $back2 .= '<div class="texto_msg_alert">';
    $back2 .= '<div class="ope_icons2" style="padding: 8px;">';
    $back2 .= '<a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/aircanada.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/arichina.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/ana.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/avianca.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/ethiopian.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/luft.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/fc_singapore.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/SAAAilineLogo2015.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/swiis.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/taca.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/TAPSTAR.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/TurkshLogo2015.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/united.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/CopaAirlinesLogo2015.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/thai_TG.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/adriaairways_JP.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/aegean_A3.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/airindia_AI.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/airnewzealand_NZ.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/asianaairlines_OZ.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/austrian_OS.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/lotpolishairlines_LO.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/croatiaairlines_OV.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/egyptair_MS.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/evaair_BR.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/scandinavianairlines_SK.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/shenzhen_ZH.jpg" alt="" onclick="fecha_F2()"></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/LOGO_SN_BRUSSELSss.jpg" alt="" onclick="fecha_F2()"></a>';
    $back2 .= '</div></div></div></div></div>';
    echo $back2;
}
function background3(){
    $back3 .= '<div class="background-finalizar3" style="display: block;" onclick="fecha_F3()">';
    $back3 .= '<div class="msg_excluir">';
    $back3 .= '<div class="msg_excluir_txt">';
    $back3 .= '<div class="texto_msg_alert">';
    $back3 .= '<div class="ope_icons2" style="padding: 8px;">';
    $back3 .= '<a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/british.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/lan.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/iberia.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/QantasLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/qatar.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/tam.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/american_airlines.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/Logo-Cathaiy-Pacific.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/Lalaysia.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/airberlin-logo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/logo-finnar.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/japanairlines-.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/s7_airlines_logo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/srilanka-logo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/royaljordanian_logo.jpg" alt=""></a>';
    $back3 .= '</div></div></div></div></div>';
    echo $back3;
}
function background4(){
    $back4 .= '<div class="background-finalizar4" style="display: block;" onclick="fecha_F4()">';
    $back4 .= '<div class="msg_excluir">';
    $back4 .= '<div class="msg_excluir_txt">';
    $back4 .= '<div class="texto_msg_alert">';
    $back4 .= '<div class="ope_icons2" style="padding: 8px;">';
    $back4 .= '<a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/AeroMexicoLogo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/AirEuropeLogo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/AirFranceLogo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/AlitaliaLogo.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/KlmAirlines.png" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/KoreanLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/DeltaLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/Aerolineasargentinas.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/AeroflotAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/ChinaAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/ChinaEasterm.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/ChinaSouthernAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/CsaAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/GarudaIndonesiaAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/KenyaAirlinelogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/MEAAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/SaudiaAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/TaromAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/VietnamAilineLogo2015.jpg" alt=""></a><a href="index#inf_aer"><img src="CMS/Modelo17/operadoras/XiamenairAIlineLogo2015.jpg" alt=""></a>';
    $back4 .= '</div></div></div></div></div>';
    echo $back4;
}
function servicos13(){
    $servicos13 .= '<section class="slice" id="servicos">';
    $servicos13 .= '<div class="row">';
    $servicos13 .= '<div class="col-xs-12"><h1 class="title-rot">Nossos Serviços</h1><h2 class="subTitle">Faça suas reservas com as melhores condições.</h2></div>';
    $servicos13 .= '</div>';
    $servicos13 .= '<div class="container">';
    $servicos13 .= '<div class="row">';
    $servicos13 .= '<div class="col-sm-6"><div class="row boxFeature"><div class="col-xs-3"><i class="icon-plane-outline iconBig"></i></div><div class="col-xs-9"><h2>Passagens aéreas</h2><p><a href="passagens-aereas">Compre passagens áreas internacionais e nacionais com o melhor preço.</a></p></div></div></div>';
    $servicos13 .= '<div class="col-sm-6"><div class="row boxFeature"><div class="col-xs-3"><i class="icon-tags  iconBig"></i></div><div class="col-xs-9"><h2>Reserva de Hotéis</h2><p><a href="reservas-de-hoteis">São diversos Hotéis com qualidade, ótimos preços e conforto.</a></p></div></div></div>';
    $servicos13 .= '</div>';
    $servicos13 .= '<div class="row">';
    $servicos13 .= '<div class="col-sm-6"><div class="row boxFeature"><div class="col-xs-3"><i class=" icon-user iconBig"></i></div><div class="col-xs-9"><h2>Locação de Veículos</h2><p><a href="locacao-de-veiculos">Alugue um carro, com a menor tarifa e da frota mais nova.</a></p></div></div></div>';
    $servicos13 .= '<div class="col-sm-6"><div class="row boxFeature"><div class="col-xs-3"><i class="icon-globe-outline  iconBig"></i></div><div class="col-xs-9"><h2>Seguro Viagem</h2><p><a href="seguro-viagem">Tenha uma viagem tranquila e sem preocupações. É simples e rápido!</a></p></div></div></div>';
    $servicos13 .= '</div>';
    $servicos13 .= '</div>';
    $servicos13 .= '</section>';
    echo $servicos13;
}
function corporativo13(){
    $corporativo13 .= '<section class="slice" id="corporativo">';
    $corporativo13 .= '<div class="row">';
    $corporativo13 .= '<div class="col-xs-12"><h1 class="title-rot">Viagens Corporativas</h1><h2 class="subTitle">Fazemos a gestão da sua viagem de negócios.</h2></div>';
    $corporativo13 .= '</div>';
    $corporativo13 .= '<div class="container" style="margin-top: 30px;">';
    $corporativo13 .= '<div class="col-sm-4"><figure><img src="/CMS/Modelo13/images/corp2.png" align="aeroporto" class="img-responsive"></figure></div>';
    $corporativo13 .= '<div class="col-md-8 col-sm-12 col-xs-12"><ul><li>Focada na rotina de viagens de cada cliente, a P2 Viagens é completa e flexível, e está permanentemente pronta para adequar-se às necessidades específicas do cliente. </li><li>Viagens Corporativas exigem confiança, agilidade, praticidade e eficiência. Para atendermos estes requisitos, oferecemos ferramentas on –line para o gerenciamento e gestão a ser aplicado a empresa. </li><li>Como a área de viagens está em constante transformação, continuamente treinamos nossa equipe para que nossos serviços possam se manter atualizados.</li><li>Nossa área comercial está pronta para ministrar o treinamento sobre o portal corporativo diretamente na sua empresa, visando reduzir o tempo de adaptação ao novo sistema tanto para os solicitantes quanto para os viajantes de sua organização.</li></ul></div>';
    $corporativo13 .= '</div>';
    $corporativo13 .= '</section>';
    echo $corporativo13;
}
function escrever_Roteiro_Semdestaque(){
    
  $roteiros .= '<link rel="stylesheet" type="text/css" href="/CMS/modelo01/css/css-servicoModelo01.css">';
  $roteiros .= '<section class="slice" id="news">';
  $roteiros .= '<div class="container imgHover">';
  $roteiros .= '<div class="row">';
  $roteiros .= '<div class="col-xs-12">';
  $roteiros .= '<h1 class="title-rot">Nossos Roteiros</h1>';
  $roteiros .= '<h2 class="subTitle">Nossas melhores ofertas você encontra aqui.</h2>';
  $roteiros .= '</div></div></div></section>';
  $roteiros .= '<section class="color4 slice tam1">';
  $roteiros .= '<div class="ctaBox ctaBoxFullwidth">';
  $roteiros .= '<div class="container">';
  $roteiros .= '<div class="row">';
  $roteiros .= '<div class="col-md-7">';
  $roteiros .= '<h1>';
  $roteiros .= '<strong>Roteiros Turísticos</strong> para lazer, corporativo ou momentos especiais.';
  $roteiros .= '</h1>';
  $roteiros .= '<!--<h1>';
  $roteiros .= '<strong>Site Turístico da Montenegro</strong> dispõe de várias funcionalidades que ajudam o agente de viagens na captação de vendas!';
  $roteiros .= '</h1>-->';
  $roteiros .= '</div>';
  $roteiros .= '<div class="col-md-5"><div class="mediaHover"><div class="mask"></div>';
  $roteiros .= '<a style="margin-top:0px;" class="btn btn-lg" href="/mais-roteiros">';
  $roteiros .= '<i class="icon-globe"></i> Veja mais Roteiros';
  $roteiros .= '</a>';
  $roteiros .= '</div></div></div></div></div></section>';
    echo $roteiros;
}
function informativo13(){
    if(INFORMATIVO != ''){
        $informativo .= '<div id="paralaxSlice1" data-stellar-background-ratio="0.5">';
        $informativo .= '<div class="maskParent color4">';
        $informativo .= '<div class="paralaxMask"></div>';
        $informativo .= '<div class="paralaxText container">';
        $informativo .= '<i class="icon-megaphone "></i>';
        $informativo .= '<blockquote class="bigTitle">'.INFORMATIVO.'</blockquote>';
        $informativo .= '</div>';
        $informativo .= '</div>';
        $informativo .= '</div>';
    }
    echo $informativo;
}
function newsletter13(){
    $newsletter13 .= '<div id="paralaxSlice4" data-stellar-background-ratio="0.5" >';
    $newsletter13 .= '<div class="maskParent">';
    $newsletter13 .= '<div class="paralaxMask"></div>';
    $newsletter13 .= '<div class="paralaxText">';
    $newsletter13 .= '<blockquote>Assine nossas Newsletters!</blockquote>';
    $newsletter13 .= '<div class="container">';
    $newsletter13 .= '<div class="row news">';
    $newsletter13 .= '<form  class="form-group" method="post" action="#">';
    $newsletter13 .= '<div class="row"><div class="col-md-12" style="margin-left: -1%;"><p class="col-md-2 formHome"><input type="text" name="nome" value="" id="newsletternome" class="form-control input-sm" placeholder="Digite seu nome" required /></p><p class="col-md-4 formHome"><input type="text" name="email" value="" id="newsletterEmail" class="form-control input-sm" placeholder="Digite seu e-mail" required /><input type="hidden" name="format" value="" id="validEmail" /></p><p class="col-md-4 formHome"><img src="../../captcha.php?l=80&a=30&tf=14&ql=4" class="capcha"><input type="text" class="form-control input-sm" id="palavra_captcha" placeholder="Digite o texto da imagem" name="palavra_captcha" /></p><p class="col-md-2 formHome"><input type="button" value="Cadastre-se" class="pull-right aqui" onclick="gravarMailing()"/></p></div></div>';
    $newsletter13 .= '</form>';
    $newsletter13 .= '</div></div></div></div></div>';
    echo $newsletter13;
}
function contato13(){
    $contato13 .= '<section class="slice"  id="contactSlice" >';
    $contato13 .= '<div class="container">';
    $contato13 .= '<div class="row">';
    $contato13 .= '<div class="col-sm-12">';
    $contato13 .= '<h1 class="noSubtitle">Nossos Contatos</h1>';
    $contato13 .= '<div class="col-sm-12"><div id="mapWrapper" class="mb30" style="display: none;"><div class="dadosMapa" style="display: none;"><input type="text" id="enderecoFantasia" value="'.FANTASIA.'"><input type="text" id="endereco_map" value="'.ENDERECO.'"><input type="text" id="cidade_map" value="'.CIDADE.'"><input type="text" id="estado_map" value="'.ESTADO.'"><input type="text" id="latitude_map" value="'.LATITUDE.'"><input type="text" id="longitude_map" value="'.LONGITUDE.'"></div></div><div id="mapa" class="mapa mb30" style="height: 400px; width: 100%"></div></div>';
    $contato13 .= '<div class="col-sm-4">';
    $disp = '';
    if (strpos(FACEBOOK, '.com') !== false AND strpos(TWITTER, '.com') !== false) {
        $disp = 'display:none;';
    }
    $contato13 .= '<h3 class="sociais" style="'.$disp.'">Redes Sociais</h3>';
    $contato13 .= '<ul class="socialNetwork pull-left redes">';
    if (strpos(FACEBOOK, '.com') !== false) {
        echo '<a href="'.FACEBOOK.'" target="blank" class="tips" title="Siga-me no Facebook"><li><i class="icon-facebook-1 iconRounded"></i></li></a>';
    }
     if(strpos(TWITTER, '.com') !== false){
        echo '<a href="'.TWITTER.'" class="tips" title="Siga-me no Twitter" target="_blank"><li><i class="icon-twitter-bird iconRounded"></i></li></a>';
    }
    if(strpos(INSTAGRAM, '.com') !== false){
        echo '<a href="'.INSTAGRAM.'" class="tips" title="Siga-me no Instagram" target="_blank"><li><i class="fa fa-instagram iconRounded"></i></li></a>';
    }
    if(strpos(BLOG, '.com') !== false){
        echo '<a href="'.BLOG.'" class="tips" title="Acesse o nosso Blog" target="_blank"><li><i class="fa fa-rss iconRounded"></i></li></a>';
    }
    $contato13 .= '</ul>';
    $contato13 .= '<h4 class="end-rodape">Endereço</h4>';
    $contato13 .= '<address><p><i class="icon-location"></i>'.ENDERECO.''.(trim(COMPLEMENTO) != ''  ? ' - '.COMPLEMENTO : '').'<br>'.BAIRRO.' - '.CIDADE.' / '.ESTADO.'<br><i class="icon-phone"></i>'.TELEFONE.' <br><i class="icon-mail-alt"></i><a href="mailto:'.EMAIL.'">'.EMAIL.'</a></p></address>';
    $contato13 .= '</div>';
    $contato13 .= '<form id="contactfrm" role="form"><div class="col-sm-4"><div class="form-group"><label for="nome">nome</label><input type="text" class="form-control form-rodape validar nome" erro="Preencha o nome" name="name" id="nome" placeholder="Insira seu nome"/></div><div class="form-group"><label for="email">E-mail</label><input type="email" class="form-control form-rodape validar email" erro="Preencha o E-mail" name="email" id="email" placeholder="Insira seu e-mail"/></div><div class="form-group"><label for="telefone">Telefone</label><input class="form-control form-rodape validar telefone" erro="Preencha o Telefone" type="tel" id="telefone" size="30" value="" placeholder="Insira seu telefone"><input class="form-control form-rodape empresa_email" type="hidden" value="'.EMAIL.'"></div></div><div class="col-sm-4"><div class="form-group"><label for="mensagem">Mensagem</label><textarea class="form-control form-rodape validar mensagem" erro="Preencha o campo Mensagem" id="mensagem" cols="3" rows="5" placeholder="Insira sua mensagem…"></textarea></div></div><div class="row"><div class="col-md-4 botao-enviar" style="bottom: -2px; !important"><div class="result"></div><input type="hidden" id="email_hidden" value='.EMAIL.'><button type="button" class="btn btn-lg btn-enviar" onclick="enviarEmailContato()"> Enviar</button></div></div></form>';
    $contato13 .= '</div>';
    $contato13 .= '</div>';
    $contato13 .= '</section>';
    echo $contato13;
}
/* FUNÇÃO QUE ESCREVE O BLOCO LAZER */
/*function lazerMelloFaro(){
  $lazerMF .= '<div class=tela960>';
  $lazerMF .= '<section id=lazer class=paralax>';
  $lazerMF .= '<div class=block2>';
  $lazerMF .= '<div class=container>';
  $lazerMF .= '<div class=row>';
  $lazerMF .= '<div class="section-sub-title center">';
  $lazerMF .= '<article class=section-title-body>';
  $lazerMF .= '<h1 class=head-title><span>Operamos</span> qualquer programação de viagem no <span>Brasil</span><br/> ou em qualquer parte do <span>Mundo</span>.</h1><p class="col-md-12 col-md-offset-ajuste">Programas clássicos, destinos exóticos, roteiros especiais, cruzeiros maritmos e pacotes de viagem convencionais.</p>';
  $lazerMF .= '<div class="col-md-11 col-md-offset-ajuste">';
  $lazerMF .= '<ul class="col-md-5 col-sm-12 col-md-offset-1 lista lista1"><li>Expertise na <strong>SUGESTÃO DE DESTINOS</strong> diferenciados, especialmente agradáveis, exóticos, pitorescos ou históricos em qualquer lugar do Mundo</li><li>Busca dos melhores <strong>PACOTES DE VIAGEM</strong> disponibilizados por <strong>OPERADORAS NACIONAIS</strong> e <strong>INTERNACIONAIS</strong></li></ul>';
  $lazerMF .= '<ul class="col-md-5 col-sm-12 lista lista2"><li><strong>OPERAÇÃO PRÓPRIA</strong> para programações pelo Brasil ou em qualquer parte do Mundo</li><li>Assessoria na <strong>ELABORAÇÃO DO MELHOR ITINERÁRIO</strong></li><li>Assessoria na compra de <strong>CRUZEIROS MARÍTIMOS</strong> e <strong>FLUVIAIS</strong></li></ul>';
  $lazerMF .= '</div>';
  $lazerMF .= '</article></div></div>';
  $lazerMF .= '<div id=owl-projects class="owl-carousel owl-carousel-with-dots ev2">';
  $lazerMF .= '<div class=item>';
  $lazerMF .= '<div class=portfolio-cell><div class=portfolio-item><div class=image-overlay><a href=/mf-destinos-nacionais?categoria=139></a><div class=image-overlay-content><h4>Destinos Nacionais</h4></div></div><img src=/CMS/mellofaro/img/destinosNacionais.jpg alt=image class=img-responsive></div></div>';
  $lazerMF .= '</div>';
  $lazerMF .= '<div class=item>';
  $lazerMF .= '<div class=portfolio-cell><div class=portfolio-item><div class=image-overlay><a href=/mf-destinos-internacionais?categoria=138></a><div class=image-overlay-content><h4>Destinos Internacionais</h4></div></div><img src=/CMS/mellofaro/img/destinosInternacionais.jpg alt=image class=img-responsive></div></div>';
  $lazerMF .= '</div>';
  $lazerMF .= '<div class=item>';
  $lazerMF .= '<div class=portfolio-cell><div class=portfolio-item><div class=image-overlay><a href=/lua-de-mel></a><div class=image-overlay-content><h4>Lua de Mel</h4></div></div><img src=/CMS/mellofaro/img/lua-de-mel.jpg alt=image class=img-responsive>';
  $lazerMF .= '</div>';
  $lazerMF .= '</div></div></div></div></div></div>';
  echo $lazerMF;
}*/
function escreverRoteirosTicketsTour(){
  $destaques = mostrardestaques();
  $roteiroTT .= '<section id="roteiros" class="container js-list-item">';
  $roteiroTT .= '<h1 class="head-title">Roteiros <span></span></h1>';
  $roteiroTT .= '<span class="dest"></span>';
  if($destaques[0] <> ''){
    foreach ($destaques as $destaque){
      $img = getImageRoute($destaque->imagem, 'roteiros', $destaque->Diretorio);
      $preco = "<span class='cifrao'>".$destaque->moeda."</span>".$destaque->preco;
      if($destaque->preco == 0 OR $destaque->preco == '0,00'){
        $preco = "Sob consulta";
      }
      $roteiroTT .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
      $roteiroTT .= '<figure style="background-image:url('.$img.')" class="roteiros">';
      $roteiroTT .= '<a href="roteiro/'.$destaque->id_roteiro.'" class="link_caixa">';
      $roteiroTT .= '<figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">'.$preco.'</h1></div></figcaption>';
      $roteiroTT .= '</a>';
      $roteiroTT .= '</figure>';
      $roteiroTT .= '<h4>'.$destaque->nome.'</h4>';
      $roteiroTT .= '<p>'.$destaque->descritivo.'</p>';
      $roteiroTT .= '<p><a href="roteiro/'.$destaque->id_roteiro.'" class="btn btn-primary">Saiba Mais</a></p>';
      $roteiroTT .= '</div>';
    }
    $roteiroTT .= '</section>';
  }
  
  echo $roteiroTT;
}
function contadorBanner(){
  try{
     $conn = conectar_pgsql('CMS');
     $stmt = $conn->prepare("SELECT COUNT(id) AS Total FROM site.banner WHERE cpf_cnpj = :licenca AND localsite = '1'");
     $licenca = LICENCA;
     $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
     $stmt->execute();
     return $stmt->fetch(PDO::FETCH_OBJ);
  }catch (PDOException $e){
    echo "Error" . $e->getMessage();
  }
}
function listarRoteirosSemCategoriaModelo21(){
    $licenca = LICENCA;
    try {
      $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT CategoriaPadrao, StatusCategoriaPadrao FROM Roteiros.Categoria WHERE cpf_cnpj = '$licenca'";
      $consulta = $conn->query($sql);
      $linha = $consulta->fetch( PDO::FETCH_OBJ );
      $padrao = $linha->CategoriaPadrao;
      $statusPadrao = $linha->StatusCategoriaPadrao;
      if($statusPadrao == 1){
      $content1 .= "<section id='roteiros' class='container js-list-item'>";
      $content1 .= "<span class='dest'></span>";
      $content1 .= "<div class='col-lg-4 col-md-4 col-sm-6 destinos'>";
      $content1 .= "<figure style='background-image:url('/Dashboard/Files/Geral/sistema/Moldura-categorias.jpg')' class='roteiros'>";
      $content1 .= "<a href='/mais-roteiros/0' class='link_caixa'>";
      $content1 .= "<figcaption><div class='wrapper caixa'><h1 class='txt_caixa' align='center'>'$padrao'</h1></div></figcaption></a></figure>";
      $content1 .= "<p>Confira aqui diversos roteiros direto das principais operadoras com destinos e condições imperdíveis!</p>";
      $content1 .= "<p><a href='/mais-roteiros/0'> <button type='button' class='btn btn-sm col-md-offset-8'><span class='texto_botao2'></span> <span class='texto_botao'> Saiba Mais</span></button></a></div></div></div></section>";      
        echo $content1;
      }
      $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function listaRoteirosPersonalizadosModelo21($categoria){
 
    $licenca = LICENCA;
 
    try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT id_roteiro, cadastro, ID_Status, destaque, nome, validade, preco,
                                        precodescritivo, imagem, descritivo, moeda
                                        FROM Roteiros.Roteiro
                                        WHERE ID_Status = 1 AND
                                        validade > CAST(GETDATE() AS DATE) AND cpf_cnpj = :licenca
                                        And ID_Categoria = $categoria
                                        ORDER BY cadastro DESC");
 
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
 
             $stmt->execute();
 
             $retornar = '';
 
          if($stmt->rowCount() != 0){
 
                                $retornar .= '<section id="roteiros" class="container js-list-item">';
                                $retornar .= '<span class="dest"></span>';
                                
                    while($roteiro = $stmt->fetch(PDO::FETCH_OBJ)){
 
                                $img = getImageRoute($roteiro->imagem, 'roteiros', DIRETORIO);
                                $preco = '<span class="cifrao">'.$roteiro->moeda.'</span>' .$roteiro->preco;
 
                                if($roteiro->preco == 0 || $roteiro->preco == '0,00'){
                                  $preco = 'Sob consulta';
                                }
                                $retornar .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
                                $retornar .= '<figure style="background-image:url('.$img.')" class="roteiros">';
                                $retornar .= '<a href="/roteiro/'.$roteiro->id_roteiro.'" class="link_caixa">';
                                if($roteiro->preco == 0 OR $roteiro->preco == '0,00'){
                                  $preco_val = 'Sob consulta';
                                  $retornar .= '<figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">'.$preco_val.'</h1></div></figcaption>';
                                }else{
                                  $preco_val = $roteiro->preco;
                                  $preco = $roteiro->moeda;
                                  $retornar .= '<figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center"><span class = "cifrao">'.$preco.'</span>'.$preco_val.'</h1></div></figcaption>';
                                }
                                $retornar .='</a></figure>';
                                $retornar .= '<h4>'.$roteiro->nome.'</h4>';
                                $retornar .= '<p>'.$roteiro->descritivo.'</p>';
                                $retornar .= '<p><a href="/roteiro/'.$roteiro->id_roteiro.'" class="btn btn-primary">Saiba Mais</a></p></div>';
                                
                            }
                            $retornar .= '</section>';
 
             echo $retornar;
 
             }
 
        }catch (SQLException $e){
            echo "Error" . $e->getMessage();
         }
 
}
function listarRoteirosMatchModelo21(){
 
          $licenca = LICENCA;
 
    try{
             $conn = conectar_pgsql('Roteiros', '179.188.16.134');
             $stmt = $conn->prepare("SELECT roteiro.id_roteiro, roteiro.cadastro, roteiro.ID_Status, roteiro.destaque, roteiro.nome,
                                    roteiro.validade, roteiro.preco, roteiro.precodescritivo,
                                    roteiro.imagem, roteiro.descritivo, roteiro.moeda, licenca.Diretorio
                                    FROM Roteiros.Match match
                                    INNER JOIN Roteiros.Roteiro roteiro
                                    ON roteiro.id_roteiro = match.roteiroID
                                    INNER JOIN Licencas.Licenca licenca ON roteiro.cpf_cnpj = licenca.cpf_cnpj
                                    WHERE roteiro.ID_Status = 1
                                    AND roteiro.validade > now()
                                    AND match.cpf_cnpj = :licenca
                                    ORDER BY roteiro.cadastro DESC");
 
 
 
             $stmt->bindParam(':licenca', $licenca, PDO::PARAM_STR);
 
             $stmt->execute();
 
             $retornar = '';
 
          if($stmt->rowCount() != 0){
                                $retornar .= '<section id="roteiros" class="container js-list-item">';
                                $retornar .= '<span class="dest"></span>';
 
                    while($roteiro = $stmt->fetch(PDO::FETCH_OBJ)){
 
                                $img = getImageRoute($roteiro->imagem, 'roteiros', $roteiro->Diretorio);
 
                                $preco = '<span class="cifrao">'.$roteiro->moeda.'</span>'.$roteiro->preco;
 
                                if($roteiro->preco == 0 || $roteiro->preco == '0,00'){
                                  $preco = 'Sob consulta'; 
                                }
 
                                
                                $retornar .= '<div class="col-lg-4 col-md-4 col-sm-6 destinos">';
                                $retornar .= '<figure style="background-image:url('.$img.')" class="roteiros">';
                                $retornar .= '<a href="#" class="link_caixa">';
                                $retornar .= '<figcaption><div class="wrapper caixa"><h1 class="txt_caixa" align="center">'.$preco.'</h1></div></figcaption>';
                                $retornar .='</a></figure>';
                                $retornar .= '<h4>'.$roteiro->nome.'</h4>';
                                $retornar .= '<p>'.$roteiro->descritivo.'</p>';
                                $retornar .= '<p><a href=""/roteiro/'.$roteiro->id_roteiro.'" class="btn btn-primary">Saiba Mais</a></p>';
                                $retornar .= '</div>';
 
                            }
 
                          $retornar .= '</section>';
 
 
                    echo $retornar;
 
             }
 
 
 
        }catch (SQLException $e){
            echo "Error" . $e->getMessage();
         }
 
}
function listarCategoriasFilhoModelo21($categoria){
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT DISTINCT cat.RoteirocategoriaID, cat.nome, cat.NivelPai, cat.Nivel,
          cat.descricao, cat.imagem, cat.status
          FROM Roteiros.Categoria cat
          INNER JOIN Roteiros.Roteiro rot ON rot.ID_Categoria = cat.roteiroCategoriaID
          WHERE cat.Nivel = 1 AND cat.status = 1 AND cat.NivelPai = $categoria
          ORDER BY cat.nome";
          $consulta = $conn->query($sql);
            while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              echo "<div class='col-md-12'><h3 class='titulo_categoria_desc'>".$linha['nome']."</h3></div>";
              listaRoteirosPersonalizadosModelo21($linha['RoteirocategoriaID']);
              }
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function escreverNivel1Site(){
  
   $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE mat.cpf_cnpj = '$licenca' AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  if($contChar > 150){
                      $term = '...';
                  }
            $content .= '<article class="col-sm-4" style="margin-bottom:12px;">';
            $content .= '<section class="imgWrapper" style="background-image:url('.$img.')">
                                  <p class="maceio" style="text-shadow: 1px 1px #000;background-color: rgba(148, 145, 145, 0.79)">'.$linha['nome'].'</p>
                            </section>
                            <section class="newsText rotNivl1 color4 descritivo-pacote">
                              <p>'.substr($linha['descricao'], 0, 140).$term.'</p>
                              <a href="/mais-roteiros/'.$linha['id_nivel1'].'" class="btn btn-sm pull-right" style="border-radius: 0px;font-weight: bold;padding: 6px 12px;">SAIBA MAIS
                              </a> 
                            </section>';
            $content .= '</article>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
 function ListarCambio(){
        $licenca = LICENCA;
        try{
            $conn = conectar_pgsql('CMS');
            $sql = "SELECT * FROM Cambio WHERE cpf_cnpj = '$licenca'";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
    }
}
function escreverNivel1SiteMenu(){
   $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT lic.Dominio, niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
              FROM Licencas.Licenca lic
              INNER JOIN Roteiros_Match mat ON mat.cpf_cnpj = lic.cpf_cnpj
              INNER JOIN Roteiros_Nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
              WHERE lic.cpf_cnpj = '$licenca' AND status = '1' ORDER BY niv1.nome ASC";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
            $content .= '<a class="dropdown-item text-white" href="/mais-roteiros/'.$linha['id_nivel1'].'" style="text-transform: uppercase;">'.$linha['nome'].'</a>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function escreverNivel1ModeloNx(){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT lic.Dominio, niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
              FROM Licencas.Licenca lic
              INNER JOIN Roteiros_Match mat ON mat.cpf_cnpj = lic.cpf_cnpj
              INNER JOIN Roteiros_Nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
              WHERE lic.cpf_cnpj = '$licenca' AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= '<div class="col-lg-3 col-md-12 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/mais-roteiros/'.$linha['id_nivel1'].'"><p style="margin-bottom: 0;height: 46px;display: table-cell;vertical-align: middle;font-size: 18px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p></a>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle;font-family: Open Sans, sans-serif; color: #484848;height:91px;">'.$linha['descricao'].'</p>';
                  $content .= '</h3>'; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'"><button class="btn botao-roteiro-index" style="    background-color: #d0a46d;border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 31px;font-family: Open Sans;">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel1SiteModelo01(){
  //$server = $_SERVER['HTTP_HOST'];
  $licenca = LICENCA;
 try {
  $conn = conectar_pgsql('Roteiros', '179.188.16.134');
     $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem 
              FROM match mat
              INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
              WHERE mat.cpf_cnpj = '$licenca' AND status = '1'";

         $consulta = $conn->query($sql);
         $content = "";
            while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                 $img = $linha['imagem'];
                 $contChar = strlen($linha['descricao']);
                 $term = '';
                 if($contChar > 150){
                     $term = '...';
                 }
           $content .= '<article class="col-sm-4">';
           $content .= '<section class="imgWrapper" style="border-radius: 0.25rem;background-image:url('.$img.')"></section>
                           <section class="newsText rotNivl1 color4 descritivo-pacote" style="border-radius: 0.25rem;">
                             <h2 style="font-size: 25px;height: 35px;"><strong>'.$linha['nome'].'</strong></h2>
                             <p style="height: 60px;">'.substr($linha['descricao'], 0, 140).$term.'</p>
                             <a href="/mais-roteiros/'.$linha['id_nivel1'].'" class="btn btn-sm pull-right botaoRoteiro" style="border-radius: 0px;">SAIBA MAIS
                             </a> 
                           </section>';
           $content .= '</article>';
             }
             echo $content;
   $conn = null;
 } catch (PDOException $e) {
   echo $e->getMessage();
 }
}


function escreverNivel2ModeloNx($categoria){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat 
      INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= '<div class="col-lg-3 col-md-12 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/roteiros-nivel2/'.$linha['id_nivel2'].'"><p style="margin-bottom: 0;height: 46px;display: table-cell;vertical-align: middle;font-size: 18px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p></a>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle;font-family: Open Sans, sans-serif; color: #484848;height:91px">'.$linha['descricao'].'</p>';
                  $content .= '</h3>'; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'"><button class="btn botao-roteiro-index" style="    background-color: #d0a46d;border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 31px;font-family: Open Sans;">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function escreverRoteirosModeloNx($categoria){
  $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
      FROM Roteiro_View
      WHERE id_nivel2 = $categoria AND validade > now()";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              if($linha['validade'] < date('Y-m-d') && $linha['exibirvencido'] == '0'){ }else{
                  $var = ".";
                    if($linha['preco'] == 0){
                    $preco = "<p class='preco-roteiro consultaCelular' style='color: #378295;font-size: 20px;padding-left: 10px;'>Sob Consulta</p>";
                    $altura = '72px;'; 
                    }else{  
                      $preco = explode(".",$linha['preco']);
                      if(strpos($var, $linha['preco'])){
                        $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295;font-family: Open Sans;padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$linha['moeda']." ".$preco[0].",".$preco[1]."<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                          $altura = '50px;';
                      }else{
                        $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295;font-family: Open Sans;padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$linha['moeda']." ".$preco[0].",00<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                          $altura = '50px;';
                      }
                    }
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descritivo']);
                  $content .= ' <div class="col-lg-3 col-md-6 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/roteiroNovo/'.$linha['id_roteiro'].'"><p style="margin-bottom: 0;height: 46px;display: table-cell;vertical-align: middle;font-size: 18px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p></a>';
                  $content .= '<span class="card-title" style="font-size: 14px;font-weight: 100;text-transform: uppercase;font-family: Open Sans;"><br>'.$linha['saida'].'</span>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;font-family: Open Sans, sans-serif; color: #484848;height:'.$altura.'">'.$linha['descritivo'].'</p>';
                  $content .= '</h3>'; 
                  $content .= $preco; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/roteiroNovo/'.$linha['id_roteiro'].'"><button class="btn botao-roteiro-index" style="    background-color: #d0a46d;border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 30px;font-family: Open Sans;">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  }
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function escreverdestaquesRoteirosModeloNx(){
  $licenca = LICENCA; 
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134'); 
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido, saida
              FROM roteiro_view
              WHERE cpf_cnpj = '$licenca' AND validade > now() LIMIT 4";
          $consulta = $conn->query($sql);
          $content = "";
              while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                if($linha['validade'] < date('Y-m-d') && $linha['exibirvencido'] == '0'){ }else{
                    $var = ".";
                    if($linha['preco'] == 0){
                    $preco = "<p class='preco-roteiro consultaCelular' style='color: #378295;font-size: 20px;padding-left: 10px;'>Sob Consulta</p>";
                    $altura = '72px;';
                    }else{  
                      $preco = explode(".",$linha['preco']);
                      if(strpos($var, $linha['preco'])){
                        $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295;font-family: Open Sans;padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$linha['moeda']." ".$preco[0].",".$preco[1]."<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                          $altura = '50px;';
                      }else{
                        $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295;font-family: Open Sans;padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$linha['moeda']." ".$preco[0].",00<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                          $altura = '50px;';
                      }
                    }
                  
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descritivo']);
                  $content .= ' <div class="col-lg-3 col-md-6 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/roteiroNovo/'.$linha['id_roteiro'].'"><p style="margin-bottom: 0;height: 71px;display: table-cell;vertical-align: middle;font-size: 18px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p></a>';
                  $content .= '<span class="card-title" style="font-size: 14px;font-weight: 100;text-transform: uppercase;font-family: Open Sans;"><br>'.$linha['saida'].'</span>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;font-family: Open Sans, sans-serif; color: #484848;height:'.$altura.'">'.$linha['descritivo'].'</p>';
                  $content .= '</h3>'; 
                  $content .= $preco; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/roteiroNovo/'.$linha['id_roteiro'].'"><button class="btn botao-roteiro-index" style="    background-color: #d0a46d;border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 30px;font-family: Open Sans;">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                }
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

//PORTOBELLO ROTEIROS

function escreverNivel1ModeloPorto(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat 
      INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE mat.cpf_cnpj = '$licenca' AND status = '1'"; 
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card h-100">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<div class="card-body">';
                  $content .= '<h4 class="card-title" style="height: 55px;">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'" class="titulo-roteiro">'.$linha['nome'].'</a>';
                  $content .= '</h4>';
                  $content .= '<p class="card-text">'.$linha['descricao'].'</p>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'"><button class="btn botao-roteiro">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel2ModeloPorto($categoria){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat 
      INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card h-100">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<div class="card-body">';
                  $content .= '<h4 class="card-title" style="height: 55px;">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'" class="titulo-roteiro">'.$linha['nome'].'</a>';
                  $content .= '</h4>';
                  $content .= '<p class="card-text">'.$linha['descricao'].'</p>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'"><button class="btn botao-roteiro">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverRoteirosModeloPorto($categoria){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade 
      FROM Roteiro_View
      WHERE id_nivel2 = $categoria  AND validade > now()";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              if($linha['validade'] < date('Y-m-d') && $linha['exibirvencido'] == '0'){ }else{
                  $preco = explode(".",$linha['preco']);
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]);
                  
                  $preco = "<span style='font-size:16px;' class='container-fluid'><b>Preços a partir de</b></span><p class='container-fluid preco-roteiro'><span style='font-size:15px;'>".$linha['moeda']."</span> ".$preco[0].",<span style='font-size:14px;'>".$preco[1]."</span></p>";
                  $altura = '91px';
                  if($linha['preco'] == 0){
                    $preco = "<p class='container-fluid sob-consulta-roteiro'>Sob Consulta</p>";
                    $altura = '115px';
                  }
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card h-100">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height: '.$altura.';">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'" style="color: black;">'.$linha['nome'].'</a>';
                  $content .= '<span class="card-title" style="font-size: 22px;"><br>'.$linha['descritivo'].'</span>';
                  $content .= '</h3></div>';
                  $content .= $preco;
                  $content .= '<div class="container-fluid">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro">Veja Mais</button><br><br></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
            }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel1Modelo02(){
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE mat.cpf_cnpj = '$licenca' AND status = '1'"; 
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= '<div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="color:#'.HEX2.';border:1px solid #'.hex1.'">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'" style="color: #'.hex1.';font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;">'.$linha['descricao'].'</p>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'"><button  class="btn botao-roteiro" style="border-radius:0;border:2px solid #'.HEX2.'">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
 function escreverNivel1Modelo04(){
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE mat.cpf_cnpj = '$licenca' AND status = '1'"; 
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= '<div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="background-color:#'.HEX2.';">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'" style="color: #fff;font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;color: #fff;">'.$linha['descricao'].'</p>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'"><button  class="btn botao-roteiro">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel2Modelo02($categoria){ 
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE niv1.id_nivel1 = $categoria AND status = '1'";

          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= '<div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="color:#'.HEX2.';border:1px solid #'.hex1.'">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'" style="color: #'.hex1.';font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;">'.$linha['descricao'].'</p>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'"><button  class="btn botao-roteiro" style="border-radius:0;border:2px solid #'.HEX2.'">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverRoteirosNovosModelo02($categoria){
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade, exibirvencido
                FROM roteiro_view
                WHERE id_nivel2 = $categoria";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              if($linha['validade'] < date('Y-m-d') && $linha['exibirvencido'] == '0'){ }else{
                  $preco = explode(".",$linha['preco']);
                  
                  $preco = '<h4 style="font-size: 23px;"><p style="font-size:13px;margin-bottom:0;font-weight:100">preços a partir de </p><span class="cifrao" style="font-size:14px;">'.$linha['moeda'].' </span>'.$preco[0].',<span style="font-size:14px;">'.$preco[1].'</span></h4>';
                  $altura = '91px';
                  if($linha['preco'] == 0){
                    $preco = '<h4 style="font-size: 17px;font-weight:400;line-height: 34px;"><p style="font-size:20px;">Sob consulta </p>';
                    $altura = '115px';
                  }
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]); 
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descritivo']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="color:#'.HEX2.';border:1px solid #'.hex1.'">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'" style="color: #'.hex1.';font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;">'.$linha['descritivo'].'</p></div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-6 col-6 my-1">';  
                  $content .= $preco;
                  $content .= '</div>';
                  $content .= '<div class="col-sm-6 col-6" style="text-align: right;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro" style="border-radius:0;border:2px solid #'.HEX2.'">Confira</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                }
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
 function escreverRoteirosNovosModelo04($categoria){
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade, exibirvencido
                FROM roteiro_view
                WHERE id_nivel2 = $categoria";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              if($linha['validade'] < date('Y-m-d') && $linha['exibirvencido'] == '0'){ }else{
                  $preco = explode(".",$linha['preco']);                  
                $preco = '<h4 style="font-size: 23px;color: #fff;"><p style="font-size:13px;margin-bottom:0;font-weight:100">preços a partir de </p><span class="cifrao" style="font-size:14px;">'.$linha['moeda'].' </span>'.$preco[0].',<span style="font-size:14px;">'.$preco[1].'</span></h4>';
                $altura = '91px';
                if($linha['preco'] == 0){
                  $preco = '<h4 style="font-size: 17px;font-weight:400;line-height: 34px;color: #fff;"><p style="font-size:20px;">Sob consulta </p>';
                  $altura = '115px';
              }
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]);
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="background-color:#'.HEX2.';">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:55px;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'" style="color: #fff;font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;color: #fff;">'.$linha['descritivo'].'</p></div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-6 col-6 my-1">';  
                  $content .= $preco;
                  $content .= '</div>';
                  $content .= '<div class="col-sm-6 col-6" style="text-align: right;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro">Confira</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                }
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel2Modelo04($categoria){ 
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= '<div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="background-color:#'.HEX2.';">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'" style="color: #fff;font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;color: #fff;">'.$linha['descricao'].'</p>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/roteiros-nivel2/'.$linha['id_nivel2'].'"><button  class="btn botao-roteiro">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverDestaquesRoteirosModeloPorto(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade
      FROM roteiros_site_view
      WHERE cpf_cnpj = '$licenca' LIMIT 3";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
              if($linha['Validade'] < date('Y-m-d') && $linha['ExibirVencido'] == '0'){ }else{
                  $preco = explode(".",$linha['preco']);
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]);
                  
                  $preco = "<span style='font-size:16px;' class='container-fluid'><b>Preços a partir de</b></span><p class='container-fluid preco-roteiro'><span style='font-size:15px;'>".$linha['moeda']."</span> ".$preco[0].",<span style='font-size:14px;'>".$preco[1]."</span></p>";
                  $altura = '91px';
                  if($linha['preco'] == 0){
                    $preco = "<p class='container-fluid sob-consulta-roteiro'>Sob Consulta</p>";
                    $altura = '115px';
                  }
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card h-100">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height: '.$altura.';">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'" style="color: black;">'.$linha['nome'].'</a>';
                  $content .= '<span class="card-title" style="font-size: 22px;"><br>'.$linha['descritivo'].'</span>';
                  $content .= '</h3></div>';
                  $content .= $preco;
                  $content .= '<div class="container-fluid">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro">Veja Mais</button><br><br></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                }
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverDestaquesRoteirosModeloExibicaoAes(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade
      FROM roteiros_geral_view
      WHERE cpf_cnpj = '$licenca' AND destaque = 1 LIMIT 9";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $preco = explode(".",$linha['preco']);
                  
                  $preco = '<h4 style="font-size: 23px;"><p style="font-size:13px;margin-bottom:0;font-weight:100">preços a partir de </p><span class="cifrao" style="font-size:14px;color:#555">'.$linha['moeda'].' </span>'.$preco[0].',<span style="font-size:14px;">'.$preco[1].'</span></h4>';
                  $altura = '91px';
                  if($linha['preco'] == 0){
                    $preco = '<h4 style="font-size: 17px;font-weight:400;line-height: 34px;color:#555"><p style="font-size:20px;">Sob consulta </p>';
                    $altura = '115px';
                  }
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]);
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="color:#'.HEX2.';border:1px solid #'.HEX1.'">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'" style="color: #'.HEX1.';font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;color:#555">'.$linha['descritivo'].'</p></div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-6 col-6 my-1">';  
                  $content .= $preco;
                  $content .= '</div>';
                  $content .= '<div class="col-sm-6 col-6" style="text-align: right;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro" style="border-radius:0;border:2px solid #'.HEX2.'">Confira</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


function escreverDestaquesRoteirosModeloExibicao(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade
      FROM roteiros_geral_view
      WHERE cpf_cnpj = '$licenca' AND destaque = 1 LIMIT 9";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $preco = explode(".",$linha['preco']);
                  
                  $preco = '<h4 style="font-size: 23px;"><p style="font-size:13px;margin-bottom:0;font-weight:100">preços a partir de </p><span class="cifrao" style="font-size:14px;">'.$linha['moeda'].' </span>'.$preco[0].',<span style="font-size:14px;">'.$preco[1].'</span></h4>';
                  $altura = '91px';
                  if($linha['preco'] == 0){
                    $preco = '<h4 style="font-size: 17px;font-weight:400;line-height: 34px;"><p style="font-size:20px;">Sob consulta </p>';
                    $altura = '115px';
                  }
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]);
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card" style="color:#'.HEX2.';border:1px solid #'.HEX1.'">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="container-fluid"><br>';
                  $content .= '<h3 class="card-title" style="height:40px;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'" style="color: #'.HEX1.';font-size:23px;">'.$linha['nome'].'</a>';
                  $content .= '</h3></div><div class="container-fluid">';
                  $content .= '<p style="height: 40px;">'.$linha['descritivo'].'</p></div>';
                  $content .= '<div class="card-footer" style="background-color: transparent;border-top: none;">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-6 col-6 my-1">';  
                  $content .= $preco;
                  $content .= '</div>';
                  $content .= '<div class="col-sm-6 col-6" style="text-align: right;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro" style="border-radius:0;border:2px solid #'.HEX3.'">Confira</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverRoteirosIsoladoAdmin(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida
              FROM roteiro_view 
              WHERE cpf_cnpj = '$licenca' AND ID_Status = '1' LIMIT 4";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $preco = explode(".",$linha['preco']);
                  if($linha['moeda'] == 'R$'){
                    $moeda = 'BRL';
                  }else{
                    $moeda = $linha['moeda'];
                  }
                  $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295; padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$moeda." ".$preco[0].",".$preco[1]."<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                  $altura = '90px;';
                  if($linha['preco'] == 0){
                    $preco = "<p class='preco-roteiro' style='color: #378295;font-size: 20px;padding-left: 10px;'>Sob Consulta</p>";
                    $altura = '109px;';
                  }  
                  $datas = explode(';', $linha['saida']);
                  $inicio = $datas[0];
                  $termino = $datas[1];
                  $dataInicioUrl = str_replace("/", "-", $inicio);
                  $dataFinalUrl = str_replace("/", "-", $termino);
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descritivo']);
                  $content .= ' <div class="col-lg-3 col-md-3 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/roteiro/'.$linha['id_roteiro'].'"><p style="margin-bottom: 0;height: 46px;display: table-cell;vertical-align: middle;font-size: 18px; ">'.$linha['nome'].'</p></a>';
                  $content .= '<span class="card-title" style="font-size: 14px;font-weight: 100;text-transform: uppercase; "><br>'.$inicio.' - '.$termino.'</span>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle; color: #484848;height:'.$altura.'">'.$linha['descritivo'].'</p>';
                  $content .= '</h3>'; 
                  $content .= $preco; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/ofertas-hotel?/roteiro/'.$linha['id_roteiro'].'/'.$dataInicioUrl.'/'.$dataFinalUrl.'"><button class="btn botao-roteiro-index" style="    background-color: #'.hex1.';border-radius: 0px;color: #ffffff;font-size: 12px;padding: 10px 45px; ">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>'; 
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverRoteirosIsolado(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade, exibirvencido
              FROM roteiros_geral_view
              WHERE cpf_cnpj = '$licenca' AND id_status = '1'";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                 if($linha['validade'] < date('Y-m-d') && $linha['exibirvencido'] == '0'){ }else{
                  $preco = explode(".",$linha['preco']);
                  $saidas = explode(";",$linha['saida']);
                  $dataInicio = str_replace('/', '-', $saidas[0]);
                  $dataTermino = str_replace('/', '-', $saidas[1]);
                  if($linha['moeda'] == 'R$'){
                    $moeda = 'BRL';
                  }else{
                    $moeda = $linha['moeda'];
                  }
                  $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295;font-family: Open Sans;padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$moeda." ".$preco[0].",".$preco[1]."<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                  $altura = '90px;';
                  if($linha['preco'] == 0){
                    $preco = "<p class='preco-roteiro' style='color: #378295;font-size: 20px;padding-left: 10px;'>Sob Consulta</p>";
                    $altura = '109px;';
                  }  
                  $datas = explode(';', $linha['saida']);
                  $inicio = $datas[0];
                  $termino = $datas[1];
                  if($inicio == '' || $inicio == ' ' || $inicio == NULL){ 
                    $periodo = '<span class="card-title" style="font-size: 14px;font-weight: 100;text-transform: uppercase;font-family: Open Sans;"><br><br></span>';
                  }else{
                    $periodo = '<span class="card-title" style="font-size: 14px;font-weight: 100;text-transform: uppercase;font-family: Open Sans;"><br>'.$inicio.' - '.$termino.'</span>';
                  }
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descritivo']);
                  $content .= ' <div class="col-lg-3 col-md-3 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/roteiro/'.$linha['id_roteiro'].'"><p class="textoRoteiroTitulo" style="margin-bottom: 0;height: 46px;display: table-cell;vertical-align: middle;font-size: 18px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p></a>';
                  $content .= $periodo;
                  $content .= '<p class="textoRoteiroDesc" style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle;font-family: Open Sans, sans-serif; color: #484848;height:'.$altura.'">'.$linha['descritivo'].'</p>';
                  $content .= '</h3>'; 
                  $content .= $preco; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/demo/exibir-hotel/1/'.$linha['id_roteiro'].'/'.$dataInicio.'/'.$dataTermino.'"><button class="btn botao-roteiro-index" style="    background-color: #'.HEX2.';border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 45px;font-family: Open Sans;">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>'; 
                  $content .= '</div>';
                  $content .= '</div>';
              }
            }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverRoteirosIframe($licenca){ 
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida, validade, exibirvencido
              FROM roteiro_view
              WHERE cpf_cnpj = '$licenca' AND validade > now() LIMIT 4";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $preco = explode(".",$linha['preco']);
                  if($linha['moeda'] == 'R$'){
                    $moeda = 'BRL';
                  }else{
                    $moeda = $linha['moeda'];
                  }
                  $preco = "<span style='font-size: 13px;font-weight: 500;color: #378295;font-family: Open Sans;padding-left: 10px; padding-right: 10px;'>a partir de</span><p class='preco-roteiro' style='font-size: 21px;color: #378295;padding-left: 10px;'>".$moeda." ".$preco[0].",".$preco[1]."<span style='font-size:16px;font-weight: 100;'> por pessoa</span></p>";
                  $altura = '90px;';
                  if($linha['preco'] == 0){
                    $preco = "<p class='preco-roteiro' style='color: #378295;font-size: 20px;padding-left: 10px;'>Sob Consulta</p>";
                    $altura = '109px;';
                  }  
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descritivo']);
                  $content .= ' <div class="col-lg-3 col-md-3 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/roteiro/'.$linha['id_roteiro'].'"><p style="margin-bottom: 0;height: 46px;display: table-cell;vertical-align: middle;font-size: 18px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p></a>';
                  $content .= '<span class="card-title" style="font-size: 14px;font-weight: 100;text-transform: uppercase;font-family: Open Sans;"><br>'.$linha['saida'].'</span>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle;font-family: Open Sans, sans-serif; color: #484848;height:'.$altura.'">'.$linha['descritivo'].'</p>';
                  $content .= '</h3>'; 
                  $content .= $preco; 
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/roteiro/'.$linha['id_roteiro'].'"><button class="btn botao-roteiro-index" style="    background-color: #d0a46d;border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 45px;font-family: Open Sans;">SAIBA MAIS</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverEventoIsolado(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT * FROM Reservas.Evento
              WHERE cpf_cnpj = '$licenca' AND ID_Status = '1'";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['Foto'];
                  $dataInicio = date("d/m/Y", strtotime ($linha['Inicio']));
                  $dataFinal = date("d/m/Y", strtotime ($linha['Termino']));
                  $content .= '<div class="col-lg-3 col-md-3 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="/evento/'.$linha['ID_Evento'].'"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/evento/'.$linha['ID_Evento'].'">';
                  $content .= '<p style="margin-bottom: 0;height: 68px;display: table-cell;vertical-align: middle;font-size: 17px;font-family: Open Sans, sans-serif;">'.$linha['nome'].'</p>';
                  $content .= '</a></h3>'; 
                  $content .= '<h2 class="card-title" style="font-size: 14px;font-weight: 600;text-transform: uppercase;font-family: Open Sans;padding-left: 10px; padding-right: 10px;">'.$dataInicio.' - '.$dataFinal.'</h2>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle;font-family: Open Sans, sans-serif; color: #484848;height:48px;padding-left: 10px; padding-right: 10px;">'.$linha['Local'].'</p>';
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="https://servicos.montenegrodigital.com.br/ofertas-hotel?/evento/'.$linha['ID_Evento'].'">';
                  $content .= '<button class="btn btn-success" style="border-radius: 5px;color: #ffffff;font-size: 12px;padding: 10px 14px;font-family: Open Sans;">RESERVE SUA HOSPEDAGEM</button>';
                  $content .= '</a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverEventoIsoladoAdmin(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT TOP(4) * FROM A_Eventos.Eventos
              WHERE cpf_cnpj = '$licenca' AND ID_Status = '1'";
          $consulta = $conn->query($sql);
          $content = ""; 
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['Foto'];
                  $dataInicio = date("d/m/Y", strtotime ($linha['Inicio']));
                  $dataFinal = date("d/m/Y", strtotime ($linha['Termino']));
                  $dataInicioUrl = str_replace("/", "-", $dataInicio);
                  $dataFinalUrl = str_replace("/", "-", $dataFinal);
                  $content .= '<div class="col-lg-3 col-md-3 mb-4">';
                  $content .= '<div class="card h-100" style="background: #e5e5e5;">';
                  $content .= '<a href="/evento/'.$linha['ID_Evento'].'"><img class="card-img-top" src="'.$img.'" alt="" style="height: 180px;"></a>';
                  $content .= '<h3 class="card-title my-1" style="padding-left: 10px; padding-right: 10px;">';
                  $content .= '<a style="color: #000;" href="/evento/'.$linha['ID_Evento'].'">';
                  $content .= '<p style="margin-bottom: 0;height: 68px;display: table-cell;vertical-align: middle;font-size: 17px; ">'.$linha['nome'].'</p>';
                  $content .= '</a></h3>'; 
                  $content .= '<h2 class="card-title" style="font-size: 14px;font-weight: 600;text-transform: uppercase; padding-left: 10px; padding-right: 10px;">'.$dataInicio.' - '.$dataFinal.'</h2>';
                  $content .= '<p style="font-size: 15px;font-weight: 200;margin-bottom: 0;display: table-cell;vertical-align: middle; color: #484848;height:48px;padding-left: 10px; padding-right: 10px;">'.$linha['Local'].'</p>';
                  $content .= '<div class="row" align="center" style="padding-left: 10px; padding-right: 10px;padding-bottom: 15px;">';
                  $content .= '<div class="col-sm-12">';
                  $content .= '<a href="/exibir-hotel?/evento/'.$linha['ID_Evento'].'/'.$dataInicioUrl.'/'.$dataFinalUrl.'">';
                  $content .= '<button class="btn btn-success" style="border-radius: 0px;color: #ffffff;font-size: 12px;padding: 10px 14px; background-color: #'.hex1.';border-color: #'.hex1.';">RESERVE SUA HOSPEDAGEM</button>';
                  $content .= '</a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverdestaquesPacotesModeloPorto(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,posicao, texto, link, tamanho, imagem
      FROM site.Banner WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = '2'
      ORDER BY cadastro DESC LIMIT 6";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                 $img = $linha['imagem'];
                  $contChar = strlen($linha['texto']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card h-100">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="card-body">';
                  $content .= '<h3 class="card-title" style="height: 55px;">';
                  $content .= '<a href="'.$linha['link'].'" class="titulo-roteiro">'.$linha['titulo'].'</a>';
                  $content .= '</h3>';
                  $content .= '<h5 class="card-text">'.$linha['texto'].'</h5>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="'.$linha['link'].'"><button class="btn botao-roteiro">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  } 
}
//FIM PORTOBELLO ROTEIROS
 
function escreverdestaquesPacotes3x1(){
  $licenca = LICENCA;

  try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT TOP 3 id, cpf_cnpj, status, imagem2, titulo, subtitulo,posicao, texto, link, tamanho, imagem
              FROM site.banner WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = '2'
              ORDER BY cadastro DESC";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                 $img = $linha['imagem'];
                  $contChar = strlen($linha['texto']);
                  $content .= ' <div class="col-lg-4 col-md-4 mb-4">';
                  $content .= '<div class="card h-100">';
                  $content .= '<a href="#"><img class="card-img-top" src="'.$img.'" alt="" style="height: 205px;"></a>';
                  $content .= '<div class="card-body">';
                  $content .= '<h3 class="card-title" style="height: 55px;">';
                  $content .= '<a href="'.$linha['link'].'" class="titulo-roteiro">'.$linha['titulo'].'</a>';
                  $content .= '</h3>';
                  $content .= '<h5 class="card-text">'.$linha['texto'].'</h5>';
                  $content .= '</div>';
                  $content .= '<div class="card-footer">';
                  $content .= '<div class="row">';
                  $content .= '<div class="col-sm-12" style="text-align: right;">';
                  $content .= '<a href="'.$linha['link'].'"><button class="btn botao-roteiro">Veja Mais</button></a>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  } 
}

function escreverDestaquesPacotesModelo05(){
  $licenca = LICENCA;
   try {
    $conn = conectar_pgsql('CMS');
      $sql = "SELECT id, cpf_cnpj, status, imagem2, titulo, subtitulo,posicao, texto, link, tamanho, imagem
      FROM site.banner WHERE status = '1' AND cpf_cnpj = '$licenca' AND localsite = '2'
      ORDER BY cadastro DESC LIMIT 6";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                 $img = $linha['imagem'];
                  $contChar = strlen($linha['texto']);
                  $content .= '<div class="col-lg-6">';
                  $content .= '<div class="one-half column-block overowt" style="margin-left: 1.2% !important;margin-right: 1.2% !important;margin-bottom: 30px !important;position: relative; z-index: initial;    display: inline-block;background-color: rgba(0,0,0,0.2);">';
                  $content .= '<a href="'.$linha['link'].'"><div class="titlebox2" style="position: absolute;width: 99%;padding: 28% 0%;margin: 0 auto;z-index: 99999;">';
                  $content .= '<h6 style="font-size: 30px !important;color: #fff !important;text-align: center; font: normal normal 13px Verdana,Open Sans,Arial,sans-serif;color: #000000;line-height: 29px;letter-spacing: 2px;text-transform: uppercase;"><strong>'.$linha['titulo'].'</strong></h6>';
                  $content .= '</div></a>';
                  $content .= '<div class="element-inner" style="margin-bottom: 0 !important;">';
                  $content .= '<a href="'.$linha['link'].'"><span class="linkbox2home" style="  bottom: 10px;display: block;text-align: center;position: absolute;width: 100%;color: #FFF !important;   font-family: georgia-italic-owt !important;font-size: 18px !important;text-shadow: 1px 1px #000;z-index: 99999; font-style: italic;">saiba mais</span>';
                  $content .= '<div class="overowt" style="background-color: rgba(0,0,0,0.2);"><img class="imgbox2home" src="'.$img.'" alt="" style="filter: brightness(0.6);box-shadow: 5px -4px;color: #fffafa80;width: 100%;"></div>';
                  $content .= '</a>';
                  $content .= '</div>'; 
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  } 
}

function escreverNivel1Site22(){
  
   $licenca = LICENCA;
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE mat.cpf_cnpj = '$licenca' AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  if($contChar > 150){
                      $term = '...';
                  }
                  $content .= '<article class="col-sm-4" style="margin-bottom: 60px;">';
                  $content .=  '<div class="coluna-conteudo">';
                  $content .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
                  $content .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$linha['nome'].'</p>';
                  $content .= '<div class="col-md-12 margin_desconto pos_pacote2">';
                  $content .= '<div class="col-md-12">';
                  $content .= '<p class="preco">'.'<span class = "cifrao">'.$preco.'</span>'.$preco_val.'</p>';
                  $content .= '</div>'; 
                  $content .= '</div>';
                  $content .= '</section>';
                  $content .= '<section class="newsText color4 descritivo-pacote">';
                  $content .= '<p>'.substr($linha['descricao'], 0, 140).$term.'</p>';
                  $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
                  $content .= '</section>';
                  $content .= '</div>';
                  $content .= '</article>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel1SiteCorp(){

  $cpf_cnpj = LICENCA;

  try{
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');

    $sql = "SELECT niv1.id_nivel1, niv1.nome, niv1.descricao, niv1.imagem 
    FROM match mat
    INNER JOIN nivel1 niv1 ON niv1.id_nivel1 = mat.id_nivel1
    WHERE mat.cpf_cnpj = '$cpf_cnpj' AND status = '1'";

    $consulta = $conn->query($sql);

    $content = "";

    while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
      $img = $linha['imagem'];
      $contChar = strlen($linha['descricao']);
      $term = '';
      if($contChar > 150){
        $term = '...';
      }
        $content .= '<div class="col-sm-4 my-4 text-center">';
        $content .=  '<div class="card" style="width: 100%;">';
        $content .= '<img class="card-img-top" src="'.$img.'" alt="Card image cap" style="height: 250px;">';
        $content .= '<div class="card-body">';
        $content .= '<h5 class="card-title">'.$linha['nome'].'</h5>';
        $content .= '<p class="card-text">'.substr($linha['descricao'], 0, 140).$term.'</p>';
        $content .= '<div class="text-right">';
        $content .= '<a href="/mais-roteiros/'.$linha['id_nivel1'].'" class="btn btn-danger corBotao">Saiba mais</a>'; 
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
    }
    echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel2Site($categoria){
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat
      INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $term = '';
            $content .= '<article class="col-sm-4" style="margin-bottom:12px;">';
            $content .= '<section class="imgWrapper" style="background-image:url('.$img.')">
                                  <p class="maceio" style="text-shadow: 1px 1px #000;background-color: rgba(148, 145, 145, 0.79)">'.$linha['nome'].'</p>
                            </section>
                            <section class="newsText rotNivl1 color4 descritivo-pacote">
                              <p>'.$linha['descricao'].'</p>
                              <a href="/roteiros-nivel2/'.$linha['id_nivel2'].'" class="btn btn-sm pull-right" style="border-radius: 0px;font-weight: bold;padding: 6px 12px;">SAIBA MAIS
                              </a> 
                            </section>';
            $content .= '</article>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function escreverNivel2Site22($categoria){
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
    $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
    FROM match mat 
    INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
    WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                  $content .= '<article class="col-sm-4" style="margin-bottom: 60px;">';
                  $content .=  '<div class="coluna-conteudo">';
                  $content .= '<section class="imgWrapper" style="background-image:url(\''.$img.'\')">';
                  $content .= '<p class="maceio" style="text-shadow: 1px 1px #000;">'.$linha['nome'].'</p>';
                  $content .= '<div class="col-md-12 margin_desconto pos_pacote2">';
                  $content .= '<div class="col-md-12">';
                  $content .= '<p class="preco">'.'<span class = "cifrao">'.$preco.'</span>'.$preco_val.'</p>';
                  $content .= '</div>'; 
                  $content .= '</div>';
                  $content .= '</section>';
                  $content .= '<section class="newsText color4 descritivo-pacote">';
                  $content .= '<p>'.substr($linha['descricao'], 0, 140).$term.'</p>';
                  $content .= '<a href="/lista-roteiros/'.$linha['id_nivel2'].'" class="btn btn-sm pull-right"><i class="icon-right-open-mini"></i>Saiba Mais</a>';
                  $content .= '</section>';
                  $content .= '</div>';
                  $content .= '</article>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function escreverNivel2SiteCorp($categoria){
  try {

    $conn = conectar_pgsql('Roteiros', '179.188.16.134');

      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
              FROM match mat 
              INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
              WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $term = '';
                    $content .= '<div class="col-sm-4 my-4 text-center">';
                  $content .=  '<div class="card" style="width: 100%;">';
                  $content .= '<img class="card-img-top" src="'.$img.'" alt="Card image cap" style="height: 250px;">';
                  $content .= '<div class="card-body">';
                  $content .= '<h5 class="card-title">'.$linha['nome'].'</h5>';
                  $content .= '<p class="card-text">'.substr($linha['descricao'], 0, 140).$term.'</p>';
                  $content .= '<div class="text-right">';
                  $content .= '<a href="/lista-roteiros/'.$linha['id_nivel2'].'" class="btn btn-danger corBotao">Saiba mais</a>'; 
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
                  $content .= '</div>';
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
function escreverRoteirosSite($categoria){
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sqlb = "SELECT id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido,saida
                FROM roteiro_View
                WHERE id_nivel2 = $categoria AND validade > now()";
      $stmtb = $conn->prepare($sqlb);
      $stmtb->execute();
            return $stmtb->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
}
function contagemSelf(){
    $cpf_cnpj = LICENCA;
    try {
      $conn = conectar_pgsql('CMS');
      $sql = "SELECT COUNT(id) AS Self FROM SelfBooking.Links WHERE cpf_cnpj = '$cpf_cnpj' AND destaque = 1";
      $stmtb = $conn->prepare($sql);
      $stmtb->execute();
      return $stmtb->fetch(PDO::FETCH_OBJ);
      
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}
function listarRoteirosSite(){
    $cpf_cnpj = LICENCA;
    try {
      $conn = conectar_pgsql('CMS');
      $sql = "SELECT TOP 3 id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, validade, exibirvencido
                FROM roteiro_view
                WHERE cpf_cnpj = '$cpf_cnpj' AND destaque = 1";
      $stmtb = $conn->prepare($sql);
      $stmtb->execute();
      return $stmtb->fetchAll(PDO::FETCH_OBJ);
      
      }catch (PDOException $e) {
        echo "Erro: ". $e;
    }
}

function escreverNivel2SiteModelo01($categoria){
  try {
    $conn = conectar_pgsql('Roteiros', '179.188.16.134');
      $sql = "SELECT niv1.id_nivel2, niv1.nome, niv1.descricao, niv1.imagem
      FROM match mat 
      INNER JOIN nivel2 niv1 ON niv1.id_nivel1 = mat.id_nivel1
      WHERE niv1.id_nivel1 = $categoria AND status = '1'";
          $consulta = $conn->query($sql);
          $content = "";
             while ( $linha = $consulta->fetch( PDO::FETCH_ASSOC ) ){
                  $img = $linha['imagem'];
                  $contChar = strlen($linha['descricao']);
                  $term = '';
             $content .= '<article class="col-sm-4">';
            $content .= '<section class="imgWrapper" style="border-radius: 0.25rem;background-image:url('.$img.')"></section>
                            <section class="newsText rotNivl1 color4 descritivo-pacote" style="border-radius: 0.25rem;">
                              <h2 style="font-size: 25px;height: 35px;"><strong>'.$linha['nome'].'</strong></h2>
                              <p style="height: 60px;">'.substr($linha['descricao'], 0, 140).$term.'</p>
                              <a href="/roteiros-nivel2/'.$linha['id_nivel2'].'" class="btn btn-sm pull-right botaoRoteiro" style="border-radius: 0px;">SAIBA MAIS
                              </a> 
                            </section>';
            $content .= '</article>';
             
              }
              echo $content;
    $conn = null;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function listarSubRoteirosSite(){
    $cpf_cnpj = LICENCA;
    try{
        $conn = conectar_pgsql('Roteiros', '179.188.16.134 ');

        $stmt = $conn->prepare("SELECT *
                            FROM roteiros
                            WHERE cpf_cnpj = '$cpf_cnpj' AND validade > now()");
                            
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
}
function ListarMotorTipo($tipo){
  $licenca = LICENCA;
  try {
                $conn = conectar_pgsql('CMS');
                $sql = "SELECT link,ExibirItem FROM Motores.Motor WHERE cpf_cnpj = '$licenca' AND TipoID = $tipo";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
                $conn = null;
        } catch (PDOException $e) {
                   echo $e->getMessage();
        }
}
function ListarExibicaoOperadoras(){
$licenca = LICENCA;
  try {
                $conn = conectar_pgsql('CMS');
                $sql = "SELECT * FROM site.Exibicao_Operadoras WHERE cpf_cnpj = '$licenca'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
                $conn = null;
        } catch (PDOException $e) {
                   echo $e->getMessage();
        }
}
function ListarTextoFaixa(){
$licenca = LICENCA;
  try {
                $conn = conectar_pgsql('CMS');
                $sql = "SELECT * FROM site.FaixaTemplate WHERE cpf_cnpj = '$licenca'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
                $conn = null;
        } catch (PDOException $e) {
                   echo $e->getMessage();
        }
}
function verificaFaixa(){ 
$licenca = LICENCA;
        try{
                $con = conectar_pgsql('CMS');
                $stmt = $con->prepare("SELECT * FROM CMS.FaixaTemplate WHERE cpf_cnpj = '$licenca'");
                $stmt->execute();
                if($stmt->rowCount() != 0){
                    return '1';
                }else{
                    return '2';
                }
                $con = NULL;
            }catch (PDOException $e){
                    echo $e->getMessage();
            }
    } 
function verificaCorp(){ 
$licenca = LICENCA;
        try{
                $con = conectar_pgsql('CMS');
                $stmt = $con->prepare("SELECT titulo, descricao,imagem FROM site.corporativo WHERE cpf_cnpj = '$licenca'");
                $stmt->execute();
                if($stmt->rowCount() != 0){
                    return '1';
                }else{
                    return '2';
                }
                $con = NULL;
            }catch (PDOException $e){
                    echo $e->getMessage();
            }
    } 
function ListarCorp(){
   $cpf_cnpj = LICENCA;
  try {
    $conn = conectar_pgsql('CMS');
    $sql = "SELECT titulo, descricao,imagem FROM site.corporativo WHERE cpf_cnpj = '$licenca'";
    $consulta = $conn->query($sql);
    return $consulta->fetch(PDO::FETCH_OBJ);
    }catch (PDOException $e) {
      echo "Erro: ". $e;
  }
}

function getLicencaServicos($dominio){
  
  try{
             $conn = conectar_pgsql('CMS');
             $stmt = $conn->prepare("SELECT A.id_usuario, A.cpf_cnpj, B.id_modelo, B.hex1, B.Hex2, B.Hex3,
B.Hex4, B.Hex5, B.Hex6, B.cpf_cnpj AS cpf_cnpj, B.modelocss, C.cpf_cnpj, C.url, C.iugu_subscription_id,
D.id_modelo, D.Diretorio, 
D.nome, D.status, E.fantasia, E.logo, B.exibir_eventos,
E.rua, E.numero, E.cidade, E.complemento, E.bairro, E.estado, E.cep, E.telefone, F.email,
B.exibir_aereo, B.exibir_hoteis, B.exibir_veiculos, B.exibir_roteiros 
FROM A_Licencas.Usuarios A
INNER JOIN A_Licencas.ModeloLicenca B ON A.cpf_cnpj = B.cpf_cnpj
INNER JOIN A_Licencas.Licencas C ON C.cpf_cnpj = A.cpf_cnpj
INNER JOIN A_Licencas.Modelos D ON D.id_modelo = B.id_modelo
INNER JOIN A_Licencas.Contato E ON E.cpf_cnpj = C.cpf_cnpj
INNER JOIN A_Licencas.Usuarios F ON F.id_usuario = E.id_usuario 
WHERE C.url LIKE '%$dominio%'");
             $stmt->execute();
             if($stmt->rowCount() == 0){
              return false;
             }else{
                return $stmt->fetch(PDO::FETCH_OBJ);
             }
             
           
            }catch (PDOException $e){
                echo "Error" . $e->getMessage();
            }
  
  }

function ListarEventosAdmin(){
  $licenca = LICENCA;
  try{

      $conn = conectar_pgsql('CMS');
      $sql = $conn->prepare("SELECT  * FROM A_Eventos.Eventos
              WHERE cpf_cnpj = '$licenca' AND ID_Status = '1' ORDER BY nome");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_OBJ);

    }catch(PDOException $e){
      echo $e->getMessage();
    }
}

function ListarCambioBannerModulo(){ 
    $licenca = LICENCA;
  try{

      $conn = conectar_pgsql('CMS');
      $sql = $conn->prepare("SELECT  * FROM site.cambio WHERE cpf_cnpj = '$licenca' ORDER BY id DESC LIMIT 12");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_OBJ);

    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }

function ListarRoteirosAdmin(){
  $licenca = LICENCA;
  try{

      $conn = conectar_pgsql('CMS');
      $sql = $conn->prepare("SELECT cpf_cnpj AS cpf_cnpj, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida
              FROM A_Roteiros.Exibir_Roteiro_View
              WHERE cpf_cnpj = '$licenca' AND ID_Status = '1'");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_OBJ);

    }catch(PDOException $e){
      echo $e->getMessage();
    }
}

function verificarLicenca($email_hidden){
  $email_busca = explode("@", $email_hidden);
  $like_busca = $email_busca[1];


  try {
        $conn = connectDBHomolog();

        $sql = "SELECT * FROM Usuarios.Usuario WHERE EmailPrincipal LIKE '%$like_busca%'";

        $stmt = $conn->prepare($sql); 
  
            $stmt->execute();

        if($stmt->rowCount() != 0){
          $retorno = $stmt->fetch(PDO::FETCH_OBJ);

          return $retorno->ID_Licenca;

        }else{
          return 0;
        }
            
        $conn = null;
          
    } catch (PDOException $e) {
             echo $e->getMessage();
    }



}

function verificarNewsletter($licenca){
  try {
        $conn = connectDBHomolog();

        $sql = "SELECT ExibirNews FROM Licencas.Licenca WHERE ID_Licenca = '$licenca'";

        $stmt = $conn->prepare($sql); 
  
            $stmt->execute();

        if($stmt->rowCount() != 0){
          $retorno = $stmt->fetch(PDO::FETCH_OBJ);

          return $retorno->ExibirNews;

        }else{
          return 0;
        }
            
        $conn = null;
          
    } catch (PDOException $e) {
             echo $e->getMessage();
    }
}

function verificarCambio($licenca){
  try {
        $conn = connectDBHomolog();

        $sql = "SELECT Nome, Valor, StatusSite FROM dbo.Cambio WHERE ID_Licenca = '$licenca'";

        $stmt = $conn->prepare($sql); 
  
            $stmt->execute();

        if($stmt->execute()){
          return $stmt->fetch(PDO::FETCH_OBJ);
        }else{
          return 0;
        }
            
        $conn = null;
          
    } catch (PDOException $e) {
             echo $e->getMessage();
    }
}

function ExibirOfertasAereoNacionaisAdmin2(){
    try{

      $conn = connectDBHomolog();
      $sql = $conn->prepare("SELECT TOP 4 * FROM dbo.OfertasAereo WHERE Fornecedor = 'Flytour' AND Cidade_Ida <> '' ORDER BY NEWID()");
      $sql->execute();
      return $sql->fetchALL(PDO::FETCH_OBJ);

    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }

    function ExibirOfertasAereoInternacionaisAdmin2(){
    try{

      $conn = connectDBHomolog();
      $sql = $conn->prepare("SELECT TOP 4 * FROM dbo.OfertasAereo WHERE Fornecedor = 'Amadeus' ORDER BY NEWID()");
      $sql->execute();
      return $sql->fetchALL(PDO::FETCH_OBJ);

    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  function escreverTagsRoteiros($licenca){
        try{
            $con = conectar_pgsql('Roteiros');
            $stmt = $con->prepare("SELECT * FROM tags WHERE cpf_cnpj = '$licenca' order by nome asc");
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
      }

      function escreverRoteirosPorTag($idtag, $licenca){
            define("DOMINIO", $_SERVER['HTTP_HOST']);
            $user = get_config_modelo(DOMINIO);
      
            $ordenacao = $user->ordenacao_roteiros;
            if ($ordenacao == '1') {
              $ordem = 'A.cadastro DESC';
            }else if ($ordenacao == '2') {
              $ordem = 'A.nome ASC';
            }else if ($ordenacao == '3') {
              $ordem = 'A.preco ASC';
            }else if ($ordenacao == '4') {
              $ordem = 'A.validade DESC';
            }else{
              $ordem = 'A.validade DESC';
            }
      
            try{
                  $con = conectar_pgsql('Roteiros');
                  $stmt = $con->prepare("SELECT A.cpf_cnpj AS ID_Licenca, A.id_roteiro, A.nome as nome_roteiro, substring(A.descritivo, 0, 140) as descritivo, A.imagem, 
      A.moeda, A.preco, A.precodescritivo, A.destaque, A.saida, B.id_tag
      FROM roteiros A
      inner join roteirotags B on B.id_roteiro = A.id_roteiro
       WHERE A.cpf_cnpj = '$licenca' AND A.id_status = '1' AND B.id_tag = '$idtag'
       ORDER BY $ordem");
                  if($stmt->execute()){
                      return $stmt->fetchAll(PDO::FETCH_OBJ);
                  }else{
                      echo '2';
                  }
              }catch (PDOException $e){
                  echo "Error" . $e->getMessage();
              }
          }

          function escreverRoteirosNovoBanco($licenca){
        try{
            $con = conectar_pgsql('Roteiros');
            $stmt = $con->prepare("SELECT cpf_cnpj AS ID_Licenca, id_roteiro, nome, descritivo, imagem, moeda, preco, precodescritivo, destaque, saida FROM roteiros WHERE cpf_cnpj = '$licenca' AND id_status = '1' AND tipo_roteiro = 2");
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    function buscar_roteiro_nome($licenca, $nome_destino){
      try{
            $con = conectar_pgsql('Roteiros');
            $stmt = $con->prepare("SELECT * FROM roteiros WHERE cpf_cnpj = '$licenca' AND tipo_roteiro = 2 AND nome LIKE '%$nome_destino%'");
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    function checarHotelNovoBanco($id){
        try{
            $con = conectar_pgsql('Hoteis');
            $stmt = $con->prepare("SELECT * FROM apartamentos WHERE id_roteiro = '$id'");
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    function exibeDetalhesNovoBanco($id){
        try{
            $con = conectar_pgsql('Roteiros');
            $stmt = $con->prepare("SELECT itinerario, inclue, ninclue, observacoes, lamina FROM Detalhes WHERE id_roteiro = '$id'");
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    function listarDicasNovoBanco($id){
    try{

          $conn = conectar_pgsql('Roteiros');

          $stmt = $conn->prepare("SELECT * FROM dicas WHERE id_roteiro = $id ORDER BY titulo ASC");      

          if($stmt->execute()){
              return $stmt->fetchAll(PDO::FETCH_OBJ); 
          }else{
              echo 2;
          }
      }catch(PDOException $e){
           echo $e->getMessage();
      }
} 

function listarQtdDicasNovoBanco($id){
    try{

          $conn = conectar_pgsql('Roteiros');

          $stmt = $conn->prepare("SELECT titulo FROM dicas WHERE id_roteiro = $id ORDER BY titulo ASC");      

          $stmt->execute();
          if($stmt->rowCount() != 0){
            return 1;
           }else{
            return 0;
           } 
      }catch(PDOException $e){
           echo $e->getMessage();
      }
}

function roteiroViewNovoBanco($id){
        try{
            $con = conectar_pgsql('Roteiros');
            $stmt = $con->prepare("SELECT id_roteiro, nome, validade, preco, precodescritivo, imagem, descritivo, moeda, tipodetalhe, saida, id_galeria, tipo_tarifario, hoteis_busca_externa, exibicao_aereo, duracao_roteiro, cidade_destino, tipo_roteiro, exibicao_veiculos, veiculos_busca_externa, exibicao_hoteis, tipo_dicas, tipo_galeria, exibicao_referencia FROM Roteiros WHERE id_roteiro = '$id' AND id_status = '1'");
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    function escreverRoteirosDestino($licenca, $cidade_destino){ 

      $ordenacao = ORDENACAO_ROTEIROS;
      if ($ordenacao == '1') {
        $ordem = 'cadastro DESC';
      }else if ($ordenacao == '2') {
        $ordem = 'nome ASC';
      }else if ($ordenacao == '3') {
        $ordem = 'preco ASC';
      }else if ($ordenacao == '4') {
        $ordem = 'validade DESC';
      }else{
        $ordem = 'validade DESC';
      }

        try{
            $con = conectar_pgsql('Roteiros');
            $stmt = $con->prepare("SELECT * FROM Roteiros WHERE cpf_cnpj = '$licenca' AND id_status = '1' AND cidade_destino LIKE '%$cidade_destino%' ORDER BY $ordem");
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else{
                echo '2';
            }
        }catch (PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }
 


