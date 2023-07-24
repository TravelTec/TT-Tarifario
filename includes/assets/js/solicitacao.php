<?php 
include("../../../conexao/conect.php");
include("../../Principal/PHP/valores_cobranca.php");

$con = conect_BD();
$idsolicitacao = $_POST['idsolicitacao'];
$status = '';
$user = $_SESSION['tipousuario'];
$prereserva = '';

######################################################################################################################################################
//SELECT no Trecho Solicitado
######################################################################################################################################################
 

    $tabela = $con->prepare('SELECT IDSolicitacao, BandeiraCartao, NumeroCartao, CodCartao, 
                                  MesVencimento, AnoVencimento, NomeTitular, EmailTitular, 
                                  IDTrecho
                           FROM Cartao_Trecho_View 
                           WHERE IDSolicitacao = '.$idsolicitacao .'');
    $tabela->execute();
    $linha = $tabela->fetch( PDO::FETCH_ASSOC );
    if(count($linha) > 0) {  
         $trecho_conteudo = '  
       <div style="height:120px;" class="descritivo  descritivo_1">          
         	<span class="subtitulo">Cartão para emissão de passagem</span>	

		      <div class="left size_descritivo">
         	<span class="subtitulo1">Cartão</span>	
				              <div class="detalhes left reserva_administrativo">
					                        Numero:<br>
					                        Cod:<br>
					                        Validade:<br> 
				               </div> 
				               <div class="detalhes right reserva_administrativo">
	                                '.$linha['NumeroCartao'].'<br>
                                  '.$linha['CodCartao'].'<br>
                                  '.$linha['MesVencimento'].'/'.$linha['AnoVencimento'].'<br>
                             
			                 </div> 
			      </div> 
		      <div class="right size_descritivo">
         	<span class="subtitulo1">Titular</span>	
				              <div class="detalhes left reserva_administrativo">
					                        Titular:<br>
					                        E-mail:<br> 
				               </div> 
				               <div class="detalhes right reserva_administrativo">
	                                '.$linha['NomeTitular'].'<br>
                                  '.$linha['EmailTitular'].'<br> 
			                 </div> 
			      </div> 
      </div>
        ';

    }else{

      $trecho_conteudo = '';


    }

    //Obtendo Informações do Trecho
    $cont = 1;
    $tabela = $con->prepare('SELECT IDTrecho,IDSolicitacao, TipoTrecho,HoraPartida,HoraChegada FROM TrechoAereo_View WHERE IDSolicitacao = '.$idsolicitacao .'');
    $tabela->execute();
    $total_usuarios = $tabela->fetchAll( PDO::FETCH_ASSOC );
        for ($i=0; $i < count($total_usuarios); $i++) 
    {  
      $linha = $total_usuarios[$i];
                
                //Obtendo Informações do Trecho
                $tipoTrecho = ($linha['TipoTrecho']==1)?'Apenas Ida':'Ida/Volta';
                $horaPartida = ($linha['HoraPartida']==1)?'Madrugada':($linha['HoraPartida']==2)?'Manha':($linha['HoraPartida']==3)?'Tarde':'Noite';
               
                $horaVolta = '';
                if($linha['TipoTrecho']==0){
                  $horaVolta ='<span class="labelcolor">Hora Chegada: </span><span class="hora">';
                  $horaVolta .=($linha['HoraChegada']==1)?'Madrugada<br>':($linha['HoraChegada']==2)?'Manha<br>':($linha['HoraChegada']==3)?'Tarde<br>':'Noite<br>';
                  $horaVolta .='</span>';
                }
                
                $informacao = '<span class="labelcolor">Tipo de trecho: </span><span class="hora">'.$tipoTrecho.'</span><br>
                               <span class="labelcolor">Hora de Partida:</span><span class="hora"> '.$horaPartida.' </span>
                               '.$horaVolta.'
                              ';

                    //Obtendo lista de rotas do trecho
                    $rotaPartida = '';
                    $rotaChegada = '';
                    $rotaTransferencia = '';
                    $rota = '';
                    $tabela2 = $con->prepare('SELECT CidadePartida, CidadeChegada, IDTrecho,transferencia FROM Rota_Trecho_View WHERE IDTrecho ='.$linha['IDTrecho'].'');
                    $tabela2->execute();
                    $total_usuarios2 = $tabela2->fetchAll( PDO::FETCH_ASSOC );
                    for ($i2=0; $i2 < count($total_usuarios2); $i2++) 
                    {  
                      $linha2 = $total_usuarios2[$i2];
                      $tmp = ($linha2['transferencia']==0)?'Não':'Sim';  
                      $rota .='<div id="rota">
                                <span class="labelcolor">De:</span> '.$linha2['CidadePartida'].'<br>
                                <span class="labelcolor">Para:</span> '.$linha2['CidadeChegada'].'<br>
                                <span class="labelcolor">Transfer:</span> '.$tmp.'<br>
                              </div>';

                    }

                    //Obtendo lista de Hospedes
                    $hospede = '';
                    $idade ='';
                    $tabela3 = $con->prepare('SELECT Nome,Idade, IDTrecho FROM Pax_Trecho_View WHERE IDTrecho ='.$linha['IDTrecho'].'');
                    $tabela3->execute();
                    $total_usuarios3 = $tabela3->fetchAll( PDO::FETCH_ASSOC );
                    for ($i3=0; $i3 < count($total_usuarios3); $i3++) 
                    {  
                      $linha3 = $total_usuarios3[$i3];
                         $idade .= $linha3['Idade'].' Anos<br>';
                         $hospede .=''.$linha3['Nome'].'<br>';
                    }

                    $trecho_conteudo .='
                                        <div class="descritivo  descritivo_1"> 
                                          <span class="subtitulo">'.$cont.'º Trecho</span>   
                                      		<div class="left size_hospedes_trecho">   
                                              <span class="subtitulo">Hospedes</span>   
                                                  <div class="row_hospedes_trecho">
			                                                <div id="clear"class="detalhes left">
                                                        
                                                        '.$hospede.'
				                                               
			                                                </div>
			                                                <div class="detalhes right texto_direita">

                                                        '.$idade.'

			                                                </div>	
                                                  </div>	

                                          

                                          <div id="informacao_trecho">

                                               '. $informacao.'

                                          </div>
			                                  </div>

	                                      <div class="left size_descritivo_reserva_discriminacoes_rota">   
                                              <span class="subtitulo"> Rotas</span>
                                              <div class="row_rotas">
			                                           
                                                    '.$rota.'
				                                           
			                                            

			                               		                                            
                                              </div>	
                                        </div>
                                  </div>
			                               
                                      ';
                    $cont++;

        }


//Obtendo relação de quartos e hospedes
//================================================================================================================
              $sql = $con->prepare('SELECT IDQuarto,Nec1,Nec2, Nec3, Nec4, Criancas, Nec,QuartoOpcao FROM  Resumo_Quarto_View WHERE IDSolicitacao='.$idsolicitacao.'');
              $tabela->execute();
              $total_usuarios = $tabela->fetchAll( PDO::FETCH_ASSOC );
              $cont = 1;
              $quartos = '';
                 for ($i=0; $i < count($total_usuarios); $i++) 
                  {  
                    $linha = $total_usuarios[$i];

                      if($linha['Nec1'] == 1) {$Nec1 = 'Não Fumante<br>';}else{$Nec1 = '';}
                      if($linha['Nec2'] == 1) {$Nec2 = 'Anti Alergico<br>';}else{$Nec2 = '';}
                      if($linha['Nec3'] == 1) {$Nec3 = 'Deficiente Fisico<br>';}else{$Nec3 = '';}
                      if($linha['Nec4'] != '') {$Nec4 = $linha['Nec4'].'<br>';}else{$Nec4 ='';}
                      if($linha['Criancas']== 1) { $Criancas = 'Para Crianças<br>';}else{ $Criancas = '';}
                      if($linha['QuartoOpcao']==0){$quatoopcao = '';}elseif($linha['QuartoOpcao']==1){$quatoopcao = 'Cama Solteiro';}else{$quatoopcao = 'Cama Casal';}
                      $detalhes_quarto =  $Nec1.''.$Nec2.''.$Nec3.''.$Nec4.'';
                      $prereserva = (strlen($detalhes_quarto)>1)?'Opções Adicionais<br>':'';
                      
                      
                      $detalhes_quarto =  $Nec1.''.$Nec2.''.$Nec3.''.$Nec4.''.$Criancas.''.$quatoopcao;
                      
                      $prereserva .= (strlen($Criancas)>1)?' Criancas<br>':'';
                      
                      
                    $proc = $con->prepare('SELECT CONVERT(VARCHAR(10),Entrada,103) AS Entrada,CONVERT(VARCHAR(10),Saida,103) AS Saida, CONVERT(VARCHAR(10),Inicio,103) AS Inicio, CONVERT(VARCHAR(10),Termino,103) AS Termino  FROM Solicitacao INNER JOIN Tarifa_Fixa_Apto ON Solicitacao.IDSolicitacao = Tarifa_Fixa_Apto.IDSolicitacao WHERE Solicitacao.IDSolicitacao ='.$idsolicitacao.'');
                    $proc->execute();
                    $linha_pre = $proc->fetch( PDO::FETCH_ASSOC );
                    if(count($linha_pre) > 0)
                    {   
                    $prereserva .= (convert_data_to_compare($linha_pre['Entrada']) < convert_data_to_compare($linha_pre['Inicio']) || convert_data_to_compare($linha_pre['Saida']) > convert_data_to_compare($linha_pre['Termino']))?'Periodo de tarifa<br>':'';
                    

                    }
                 
                                       
                    $proc = $con->prepare('SELECT dbo.Solicitacao.Quantidade_Quartos, dbo.Solicitacao.IDApto, dbo.Solicitacao.IDSolicitacao, dbo.Tarifa_Fixa_Apto.Bloqueio, dbo.Tarifa_Fixa_Apto.Reserva, 
dbo.Tarifa_Fixa_Apto.Ocupado, (SELECT TOP 1 Bloqueio FROM Configuracao) AS BloqueioConfiguracao
FROM dbo.Solicitacao INNER JOIN
  dbo.Tarifa_Fixa_Apto ON dbo.Solicitacao.IDSolicitacao= dbo.Tarifa_Fixa_Apto.IDSolicitacao
 WHERE Solicitacao.IDSolicitacao ='.$idsolicitacao.'');
                    $proc->execute();
                    $linha_pre = $proc->fetch( PDO::FETCH_ASSOC );
                    if(count($linha_pre) > 0)
                    {   
                          $prereserva .= ($linha_pre['Bloqueio']<=$linha_pre['BloqueioConfiguracao'])?'Lista de Esperas<br>':'';

                    }
        
                      
                      

	                    $quartos .= ' <div class="descritivo  descritivo_1 hospedes">
                                      	<span class="subtitulo">'.$cont.'º Quarto</span>	
			                                   <div class="left size_descritivo_hospedes">
                                      	    <span class="subtitulo1">Hospedes</span>
				                                    <div class="row_hospedes">
	                    ';

	                    $hospede = '';
                      $tabela2 = $con->prepare('SELECT Nome,Idade,IDPax FROM Pax_View WHERE IDQuarto='.$linha['IDQuarto'].'');
                      $tabela2->execute();
                      $total_usuarios2 = $tabela2->fetchAll( PDO::FETCH_ASSOC );
                      for ($i2=0; $i2 < count($total_usuarios2); $i2++) 
                      {  
                        $linha2 = $total_usuarios2[$i2];
                 					$idade_label = ($linha2['Idade'] != "")?'Idade: <br>':'<br>';
                        		$hospede .= '
			                                      <div id="clear"class="detalhes left campos_espaco labelcolor">

				                                      Nome:<br>						
		                                        </div>

		                                        <div class="detalhes left texto_direita campos_espaco detalhe_hospede_click" title="Click para obter informações sobre o hospede"  onClick="informacao_hospede('.$linha2['IDPax'].');">
				                                      '.$linha2['Nome'].'
                                         		</div>
		                                        <div class="detalhes right_idade campos_espaco">
				                                      <br>
                                         		</div>
		                                        <div class="detalhes right campos_espaco">
				                                      '.$idade_label.'
                                         		</div>			
		                    ';
	                    }

	                    $quartos .= $hospede . '
				                                          </div>
			                                          </div>

			                                          <div class="right size_descritivo_detalhes">
				                                          <span class="subtitulo1">Necessidades especiais</span>
					                                          <div class="detalhes right">
					                                              '.$detalhes_quarto.'
				                                            </div>
		                                           	</div>

	                                          </div>
                    ';


                  
                    $cont++;
              }



      //Selecionando detalhes da reserva
      //==============================================================================================================================

          $tabela_reserva = $con->prepare( '
                      SELECT IDSolicitacao ,IDStatusReserva ,
                                            CONVERT(VARCHAR(10),DataReserva,103) AS  DataReserva, 
                                            CONVERT(VARCHAR(10),DataReserva,108) AS  HoraReserva, 
                                            CONVERT(VARCHAR(10),ValidadeReserva,103) AS ValidadeReserva,
                                            CONVERT(VARCHAR(10),ValidadeReserva,108) AS HoraValidadeReserva,
                            IDTipoReserva ,IDTipoPagamento ,IDFormaPagamento,NomeFormaPagamento,ValorReserva ,IDReserva,Chave, Parcelas
                      FROM  Reserva_View
                      WHERE IDSolicitacao = '.$idsolicitacao.'');


          $tabela_reserva->execute();
          $linha_reserva = $tabela_reserva->fetch( PDO::FETCH_ASSOC );

          $idstatusreserva = '';
          $idpagamentoreserva = '';
          $valorreserva = '';
          $datareserva = '';
          $reserva='';
          $validadereserva='';
          $idtiporeserva = '';$idformaPagamento = '';$chave = '';

          if (count($linha_reserva) > 0)
          { 
          $reserva =$linha_reserva['IDReserva']; 
          $idstatusreserva = $linha_reserva['IDStatusReserva'];
          $idpagamentoreserva = $linha_reserva['IDTipoPagamento'];
          $valorreserva = $linha_reserva['ValorReserva'];
          $datareserva = $linha_reserva['DataReserva'].' as '. $linha_reserva['HoraReserva'];
          $validadereserva=$linha_reserva['ValidadeReserva'].' as '. $linha_reserva['HoraValidadeReserva'];
          $idtiporeserva = $linha_reserva['IDTipoReserva'];
			 $nomeformapagamento = $linha_reserva['NomeFormaPagamento'];
			 $idformaPagamento = $linha_reserva['IDFormaPagamento'];
			 $chave = $linha_reserva['Chave'];
       $parcelas_venda = $linha_reserva['Parcelas'];
          }
          

################################################################################
//Obtendo Valores para cobrança
################################################################################

  $idtipopagamento = 0;
  $parcelasPagar = 0;
  $parcelasTotal = 0;
  $taxaCobranca = 0;
  $valorTotal = 0;
  $valorTotalDiaria = 0;
  

  $tabela = $con->prepare( "SELECT TotalParcelas,Cobrar,Taxas,IDTipoPagamento,IDFormaPagamento FROM FormaPagamento_View WHERE IDFormaPagamento = $idformaPagamento");
  $tabela->execute();
$linha = $tabela->fetch( PDO::FETCH_ASSOC );
  if (count($linha) > 0)
  {
    
        $parcelasPagar = $linha['Cobrar'];
        $parcelasTotal = $linha['TotalParcelas'];
        $taxaCobranca = $linha['Taxas'];       
        $idtipopagamento = $linha['IDTipoPagamento'];  

  }

  $retorno = '';
  $valorcobrar ='';
  if($parcelasTotal == 0 & $parcelasPagar == 0){//Pagamento do Valor Total

    $retorno = obterValoresFixados($idsolicitacao);
    $valorcobrar = $retorno['totalReserva'];

  }else if($parcelasTotal == 0 & $parcelasPagar != 0){

    $retorno = obterValoresDiariasFixados($idsolicitacao,$parcelasPagar);
    $valorcobrar =str_replace($dezena,".",str_replace($milhar,"",$retorno['totalDiariaSelecionada']));
    $valorcobrar = number_format($valorcobrar,2,$dezena,$milhar);

  }else if($parcelasTotal != 0 & $parcelasPagar != 0){

    $retorno = obterValoresFixados($idsolicitacao);
    $valorFinal = (str_replace($dezena,$milhar,str_replace($milhar,'',$retorno['totalReserva']))/$parcelasTotal)*$parcelasPagar;
    $valorcobrar = $valorFinal;
    $valorcobrar = number_format($valorcobrar,2,$dezena,$milhar);

  }
  


         
          
          
          
          
      //==============================================================================================================================
      // Prenchendo os Selects da reserva
      //==============================================================================================================================
          $pago_=0;
          $tabela = $con->prepare("SELECT IDStatusReserva FROM Historico_Status WHERE  IDSolicitacao = $idsolicitacao AND IDStatusReserva = 7 ");
    $tabela->execute();
    $linha = $tabela->fetch( PDO::FETCH_ASSOC );
          if (count($linha) > 0)
          { 
               $pago_ =1;
          }

      $tabela_reserva = $con->prepare( 'SELECT IDStatusReserva, NomeStatusReserva FROM  StatusReserva');
    $tabela_reserva->execute();
    $tabela_reserva = $tabela_reserva->fetchAll( PDO::FETCH_ASSOC );

      $select_status = '';
      for ($i=0; $i < count($tabela_reserva); $i++) 
    {  
      $linha_reserva = $tabela_reserva[$i];

        $selected = ($linha_reserva['IDStatusReserva'] == $idstatusreserva)?'selected':'';

		  if($linha_reserva['IDStatusReserva'] != 8 && $linha_reserva['IDStatusReserva'] != 9){

        		     $select_status .= '<option value="'.$linha_reserva['IDStatusReserva'].'" '.$selected .'> '.$linha_reserva['NomeStatusReserva'].'</option>';        }
             
        


      }

      $tabela_reserva = $con->prepare( 'SELECT IDTipoReserva, NomeTipoReserva 
                                      FROM   TipoReserva 
                                      WHERE  IDTipoReserva = '.$idtiporeserva.'');
    $tabela_reserva->execute();
    $linha_reserva = $tabela_reserva->fetch( PDO::FETCH_ASSOC );

      if (count($linha_reserva) > 0)
      { 

        $tipo_reserva = $linha_reserva['NomeTipoReserva'];

      }

      $tabela_reserva = $con->prepare( 'SELECT IDTipoPagamento, NomeTipoPagamento FROM  TipoPagamento');
    $tabela_reserva->execute();
    $tabela_reserva = $tabela_reserva->fetchAll( PDO::FETCH_ASSOC );

      $tipo_pagamento = '';
      for ($i=0; $i < count($tabela_reserva); $i++) 
    {  
      $linha_reserva = $tabela_reserva[$i];
         if($linha_reserva['IDTipoPagamento'] == $idpagamentoreserva){
	  $tabela_cartao2 = $con->prepare( "SELECT NomeBandeiraCartao FROM Solicitacao A INNER JOIN Cartao B ON B.IDSolicitacao = A.IDSolicitacao INNER JOIN BandeiraCartao C ON C.IDBandeiraCartao = B.BandeiraCartao WHERE A.IDSolicitacao = $idsolicitacao");
    $tabela_cartao2->execute();
    $tabela_cartao = $tabela_cartao2->fetchAll( PDO::FETCH_ASSOC );
	       $operadora_cartao='';
	       for ($i=0; $i < count($tabela_cartao); $i++) 
    {  
      $linha_cartao = $tabela_cartao[$i];
		  
		    $operadora_cartao='<span class="detalhes_cartao">'.$linha_cartao['NomeBandeiraCartao'].'</span>';
	      }

	     $tipo_pagamento = $operadora_cartao;
            $tipo_pagamento .= ($linha_reserva['IDTipoPagamento'] != 1 && $linha_reserva['IDTipoPagamento'] != 6)?$linha_reserva['NomeTipoPagamento'].'</span>':'<span class="detalhes_cartao">'.$linha_reserva['NomeTipoPagamento'].' / </span><img title="informações do Cartão de Crédito" onClick="informacao_cartao('.$idsolicitacao.');" style="width: 17px;cursor:pointer;" src="../../../Layout/IMAGES/lupa.png"></span>';
      
	       
         }

     }

      //==============================================================================================================================
?>
<div id="detalhes_solicitacao">
    <div class="descritivo size_descritivo_solicitante">
                  <span class="subtitulo">Informações do Solicitante</span>

<?php


$sql = $con->prepare('SELECT Titulo,Nome,Cpf,Endereco,Cep,Numero,Complemento,Cidade,Estado,Pais,Email,Telefone, Celular,NomeEmpresa,Fax,Cnpj,Ramal FROM Resumo_Dados_Cliente_View WHERE IDSolicitacao = '.$idsolicitacao.'');
$sql->execute();
    $tabela = $sql->fetch( PDO::FETCH_ASSOC );

    if(count($tabela) > 0)
    {  

?>
         
 <div id="clear"class="detalhes left ">
		              <div class="left labelcolor">
				Nome: <br>
				<?php echo ($linha['Cpf']=='')?'':'CPF:<br>';?>
				E-mail: <br>
				Telefone: <br>
				<?php echo ($linha['Ramal']=='')?'':'Ramal:<br>';?>
				<?php echo ($linha['Celular']=='')?'':'Celular:<br>';?>
				<?php echo ($linha['Fax']=='')?'':'Fax:<br>';?>
				<?php echo ($linha['NomeEmpresa']=='')?'':'Empresa:<br>';?>
			    </div>
			     <div class="right texto_direita">
				<?php echo $linha['Titulo'] .' '. $linha['Nome'];?><br>
				<?php echo ($linha['Cpf']=='')?'':$linha['Cpf']."<br>";?>
				<?php echo $linha['Email'];?><br>
				<?php echo $linha['Telefone'];?><br>
				<?php echo ($linha['Ramal']=='')?'':$linha['Ramal']."<br>";?>
				<?php echo ($linha['Celular']=='')?'':$linha['Celular']."<br>";?>
				<?php echo ($linha['Fax']=='')?'':$linha['Fax']."<br>";?> 
				<?php echo ($linha['NomeEmpresa']=='')?'':$linha['NomeEmpresa']."<br>";?>				
			    </div>
	    	</div>

                <div class="detalhes right_center">

		              <div class="left texto_direita labelcolor">
				<?php echo ($linha['Pais']=='')?'':"País:<br>";?> 
				Cidade: <br>
				Estado: <br>
				Endereço: <br>
				Nº: <br>
				<?php echo ($linha['Complemento']=='')?'':'Complemento:<br>';?>
				Cep: <br>
				<?php echo ($linha['Cnpj']=='')?'':'CNPJ:<br>';?>
			    </div>

			     <div style="float: left;" class="right texto_direita ">
				<?php echo ($linha['Pais']=='')?'':$linha['Pais']."<br>";?> 
				<?php echo $linha['Cidade'];?><br>
				<?php echo $linha['Estado'];?><br>
				<?php echo $linha['Endereco'];?><br>
				<?php echo $linha['Numero'];?><br>
				<?php echo ($linha['Complemento']=='')?'':$linha['Complemento']."<br>";?>
				<?php echo $linha['Cep'];?><br>
				<?php echo ($linha['Cnpj']=='')?'':$linha['Cnpj']."<br>";?>					
			    </div>

	    	</div>





<?php
        }

$sql = $con->prepare('SELECT Nome,Foto,Descricao,NomeEvento,NomeApto,Texto1,Texto2,CONVERT(VARCHAR(10),Entrada,103) As Entrada,CONVERT(VARCHAR(10),Saida,103) As Saida FROM Resumo_Hospedagem_View WHERE IDSolicitacao='.$idsolicitacao.'');
$sql->execute();
    $tabela = $sql->fetch( PDO::FETCH_ASSOC );

    

     $nomeapto ='';
     $nomehotel = '';
     $nomeevento = '';$entrada = ''; $saida = '';
    if(count($tabela) > 0)
    {  
        $nomeapto = $linha['NomeApto'];
        $nomehotel =  $linha['Nome'];    
        $nomeevento =  $linha['NomeEvento'];
        $entrada = $linha['Entrada'];
        $saida =  $linha['Saida'];
	 }


 ?>			

          </div>        

<?php

$diaria_array = obterValoresFixados($idsolicitacao);



?>
        <div class="descritivo  descritivo_1">

			<div class="left size_descritivo_reserva_discriminacoes_administrativo">
                   	<span class="subtitulo">Período reservado</span>	
				            <div class="row_discriminacoes">
				            <div id="clear"class="detalhes left">
	
					<?php echo  $diaria_array['dataDiscriminacaoDiaria']; ?>

				            </div>
				            <div class="detalhes right texto_direita">
	            <?php echo  $diaria_array['valorDiscriminacaoDiaria']; ?>
				            </div>	
				</div>



      </div>

			<div class="left size_descritivo">
              	<span class="subtitulo">Informações da Reserva</span>	
				        <div class="detalhes left">
					                  Total Diárias<br>
					                  ISS<br>
					                  Taxa de Serviço<br>
					                  Taxa de Turismo<br>
					                  Total<br>
						
				         </div>

				         <div class="detalhes right">
					<?php echo   $moeda.$diaria_array['totalDiaria']; ?><br>
					<?php echo str_replace($milhar,$dezena,$diaria_array['diariaIss']); ?>%<span class="calculo"><?php echo $moeda.$diaria_array['diariaIssTotal']; ?></span><br>
					<?php echo str_replace($milhar,$dezena,$diaria_array['diariaTax']);  ?>%<span class="calculo"><?php echo $moeda.$diaria_array['diariaTaxTotal']; ?></span><br>
					<?php echo $moeda.str_replace($milhar,$dezena,$diaria_array['taxaOpcionalFixa']); ?><span class="calculo"><?php echo $moeda.$diaria_array['taxaOptional']; ?></span><br>
					<?php echo $moeda.$diaria_array['totalReserva']; ?><br>
                       
			           </div>

        			</div>    

        </div>


   	<?php echo $quartos; ?>

  <?php echo $trecho_conteudo; ?>
   <p style="visibility: hidden">.</b>	

	
</div>
  

<div id='resumo' class='formulario'>
	  <div id="Fundo">
	  <span class='tituloform' style="margin-bottom: 0px;">Protocolo - Nº <?php echo $reserva;  ?></span>

 <div style="" class="descritivo  descritivo_1">

			<div class="left size_descritivo_reserva_discriminacoes_administrativo">
              	<span class="subtitulo">Informações da Reserva</span>	

			            <div id="clear"class="detalhes left reserva_administrativo labelcolor">
                   Evento:<br>
                   Hotel:<br>
                   Apto:<br>
                   Entrada:<br>
                   Saída:<br>
                   Obs:<br>




			            </div>
			            <div style="width: 268px;" class="detalhes right reserva_administrativo">
                  <?php echo $nomeevento ; ?><br>
                   <?php echo substr($nomehotel, 0, 35); echo (strlen($nomehotel)>= 35)?'...':''; ?><br>
                   <?php echo $nomeapto ; ?><br>
                   <?php echo $entrada ; ?><br>
                   <?php echo $saida ; ?><br>
                   <?php echo $prereserva ; ?><br>
			            </div>	




      </div>

			<div class="left size_descritivo">
              	<span class="subtitulo">Status</span>	
				        <div class="detalhes left reserva_administrativo labelcolor">
					                  Status da Reserva:<br>
					                  Tipo:<br>
					                  Forma de Pagamento:<br>
					                  Data:<br>
					                  <?php echo ($idpagamentoreserva != 1  && $idpagamentoreserva != 6)?'Validade:<br>':'';?>
					                  
					                  Total da Reserva:<br>
					                  Total Cobrado:<br>
                            Parcelas:
						
				         </div>

				         <div class="detalhes right reserva_administrativo">
	
					           <select id="STATUS" name="STATUS"  <?php echo (5==$idstatusreserva || $user==2 || $user==4)?'disabled':''; ?> ><?php echo $select_status;?></select><img title="Historico de alterações do status" onClick="informacao_status(<?php echo $idsolicitacao; ?>)" style="width: 17px;cursor:pointer;" src="../../../Layout/IMAGES/lupa.png"><br>

					       <span  ><?php echo $tipo_reserva;?></span><br>
					       <span title="<?php echo $nomeformapagamento;?>"><?php echo $tipo_pagamento;?><br>
                      <span><?php echo $datareserva; ?></span><br>
                      <?php echo ($idpagamentoreserva != 1  && $idpagamentoreserva != 6)?'<span>'.$validadereserva.'</span><br>':'';?>


							<span> <?php echo $moeda.$diaria_array['totalReserva']; ?><br></span><br>
							<span id="clear"> <?php echo $moeda.$valorcobrar; ?></span><br>
              <span><?php echo $parcelas_venda; ?></span>
                       
			           </div>
			
			</div>
		</div>
<?php



   if($idstatusreserva != 5 && $user!=2 && $user!=4){
             $link = ''.$predomain.$domain.'/Modulos/Principal/Forms/'.$nome_voucher.'.php?SO='.$idsolicitacao.'&K='.$chave;
		$btvoucher = '<span id="btvoucher" onclick="EnviarVoucher('.$idsolicitacao.')"> Enviar Voucher</span>
		              <span id="btvoucher" onclick=\'window.open("'.$link.'")\'>Visualizar Voucher</span>';
	}else{
		$btvoucher = '';
	}
	
	$btboleto = '';
	if($idtiporeserva == 1 || $idtiporeserva == 4  ){
	     if(($idpagamentoreserva == 1 || $idpagamentoreserva == 5) && $idstatusreserva != 5 && $idstatusreserva != 6 )
          $btboleto = '<span id="btboleto" onclick="emitirBoleto('.$idsolicitacao.')"> Emitir Boleto</span>';
		             
	}
	
$tabela = $con->prepare("SELECT * FROM  Historico_Alteracao_Status
                       WHERE  IDSolicitacao = $idsolicitacao ");
    $tabela->execute();
    $total_usuarios = $tabela->fetchAll( PDO::FETCH_ASSOC );

for ($i=0; $i < count($total_usuarios); $i++) 
    {  
      $linha = $total_usuarios[$i];
	if($linha['IDStatus']== 8){
		
		$link = ''.$predomain.$domain.'/Modulos/Principal/Forms/'.$nome_voucher.'.php?SO='.$idsolicitacao.'&K='.$chave;
		$btvoucher = '<span id="btvoucher" onclick="EnviarVoucher('.$idsolicitacao.')"> Reenviar Voucher</span>
		              <span id="btvoucher" onclick=\'window.open("'.$link.'")\'>Visualizar Voucher</span>';
	}
}
if($idstatusreserva != 5 && $user!=2 && $user!=4){//Reserva Cancelada - Atendente - Financeiro
echo $btvoucher;
}

echo $btboleto ;
?>			



          <div id="bt" class="botaocancelar" onclick="closeLeitor();" >Fechar</div>
          
          <?php
					if($idstatusreserva != 5 && $user!=2 && $user!=4){//Reserva Cancelada - Atendente - Financeiro
						echo '<div id="bt" class="salvar" onclick="editarSolicitacao('.$idsolicitacao.')" >Salvar</div>';
					}
          
          
          ?>

          <div id="bt" class="detalhes_botao" onclick="showDetalhesSolicitacao()" >+ Detalhes</div>
          <div id="bt" class="mensagem" onclick="Mensagem(<?php echo $idsolicitacao; ?>)" >Mensagens</div>
  <p style="visibility: hidden;height: 2px;">.</p>
<div id="detalhes_solicitacao_view"></div>



	</div>



</div>

	

	
