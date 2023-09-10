$(document).ready(function(){
on_load();
consultar()
});

var textoDetalhes = '';
var detalhes = false;


function consultar(){

load($('#OPCAO_FILTRO_CONTEUDO option:selected').val(),$('#FILTRO_CONTEUDO').val(),$('#OPCAO_FILTRO_CONTEUDO_FIXO option:selected').val(),$('#ATENDENTE_FILTRO_CONTEUDO_FIXO option:selected').val(),$('#PAGAMENTO_FILTRO_CONTEUDO_FIXO option:selected').val());

}

function consultar_2(){
on_load();
load($('#OPCAO_FILTRO_CONTEUDO option:selected').val(),$('#FILTRO_CONTEUDO').val(),$('#OPCAO_FILTRO_CONTEUDO_FIXO option:selected').val(),$('#ATENDENTE_FILTRO_CONTEUDO_FIXO option:selected').val(),$('#PAGAMENTO_FILTRO_CONTEUDO_FIXO option:selected').val());

}


function clear_consulta(){
     on_load();
    $('#FILTRO_CONTEUDO').val('');
    load('NomeEvento','','TODOS','TODOS','TODOS');
}

function load(coluna,conteudo,fixo,atendente,pagamento){
  if(atendente == 'undefined'){atendente = '';}else{var atendente = '&atendente='+atendente; }

  $.ajax({
    type: "POST",
    data: 'coluna='+coluna+"&conteudo="+conteudo+"&fixo="+fixo+atendente+"&pagamento="+pagamento,
    url: "../PHP/lista_solicitacao.php",
    success: function(resposta){
      $("#content").html(resposta);
    $("table td").hover(
        function(){
          $(this).parent().addClass("trhover");
        },
        function(){
          $(this).parent().removeClass("trhover");
        }
      );

      on_close();
    }
  });
  return false;
}



function Ticket(id){
respostas = 0;
    on_load();
		$.ajax({
          type: "POST",
          data: "id="+id,
          url: "../Forms/view_ticket.php",
          success: function(resposta){
            $('#leitor').remove();
            on_close();
            $("body").prepend("<div id='loading1'></div>");
        $("#wrapper").prepend("<div id='leitor'></div>");
        $("#leitor").html(resposta).hide();          
        $("#loading1").fadeIn(300);
         $("#leitor").fadeIn(1000);
        var w_box = $(window).width();
        var h_box = $(window).height(); 
        var w_total = (w_box - 800)/2;
        var h_total = (h_box - 600)/2;
        var top = mouseposition - 150 ;
        $("#leitor").css({ "left": w_total+"px", "top": top+"px"});
            

                    $('.botaocancelar').click(function(){
                      closeLeitor();

                    });
             show_todas_respostas_ticket();
          }

    });

}
var form = '';
function Mensagem(id){
respostas = 0;
    on_load();
 
		$.ajax({
          type: "POST",
          data: "idsolicitacao="+id,
          url: "../Forms/view_mensagem.php",
          success: function(resposta){
          
            form = $('#leitor').html();   
                     
        		$('#leitor').html(resposta);
         
            on_close();
            
            $('.botaocancelar_mensagem').click(function(){   
            	closeLeitor();            
        			Solicitacao(id);

           });
             
          }

    });

}

function Adicionar_Mensagem(id){

    on_load();
		$.ajax({
          type: "POST",
          data: "id="+id+"&mensagem="+$('#RESPOSTA').val(),
          url: "../PHP/interacao_mensagem.php",
          success: function(resposta){
				    $.ajax({
				    type: "POST",
				    data: "idsolicitacao="+id,
				    url: "../Forms/view_mensagem.php",
				    success: function(resposta){
					  	$('#leitor').html(resposta);
					  	
					  	on_close();
					  	
					 $('.botaocancelar_mensagem').click(function(){ 
					 		closeLeitor();            
        					Solicitacao(id);

           			});
				       
				 
          
         	 }

 		   });
		}
	});
}

function showDetalhesSolicitacao(){
$('#resumo').animate({zindex: 1000},500,function(){

    if(detalhes == false){
        tamanhoantigo = $('#resumo').css('height');
        $('#detalhes_solicitacao_view').html(textoDetalhes).hide().fadeIn(300);
        $('.detalhes_botao').html('- Detalhes');
        size_lista_hospedes();
        size_resumo();
        detalhes = true;

    }else{
        $('#resumo').animate({height: tamanhoantigo},300,function(){
          $('#detalhes_solicitacao_view').html('');
          $('.detalhes_botao').html('+ Detalhes');
          detalhes = false;
          
        });
    }

});


//size_lista_hospedes();
//size_resumo();


}

function TrechoAereo(id){
      on_load();   
		$.ajax({
          type: "POST",
          data: "idsolicitacao="+id,
          url: "../Forms/trecho.php",
          success: function(resposta){
            $('#leitor').remove();
            Leitor(resposta); 

                     $('.valor_tarifa').attr('oninput','calcularTotalTrecho()');
                    $('.salvar').click(function(){
                      inserirTarifaTrecho(id);
                    });

                    $('.botaocancelar').click(function(){
                      closeLeitor();
                      return false;	
                    });
          on_close();
          }

    });

}

function calcularTotalTrecho(){
var total = 0;
 $('.valor_tarifa').each(function(){

          total = parseFloat(total) + parseFloat($(this).val().replace(',','.'));

  }
  );

  $('#VALORTOTAL').val(formataMoeda(total, 2));

}
function inserirTarifaTrecho(id){
  if(validacaoTrecho()){
   on_load();   
		$.ajax({
          type: "POST",
          data: "idsolicitacao="+id+"&"+$('#trecho_form').serialize(),
          url: "../PHP/trecho.php",
          success: function(resposta){
          closeLeitor();
          on_close();
          }

    });
  }

}

function validacaoTrecho(){
  var verif = true;
  $('.valor_tarifa').each(function(){
          if( $(this).val().length < 1){
           $(this).focus();
           verif = false;
         }
  });


  return verif;
}
function Solicitacao(id){ 
		$.ajax({
          type: "POST",
          data: "idsolicitacao="+id,
          url: "../Forms/solicitacao.php",
          success: function(resposta){
            console.log(resposta);
            $('#leitor').remove();
            Leitor(resposta); 
            //$('#resumo').css('height','310px');

                    $('.botaocancelar').click(function(){
                      closeLeitor();
                      return false;	
                    });
            textoDetalhes = $('#detalhes_solicitacao').html();

            $('#detalhes_solicitacao').html('');
          on_close();
          }

    });

}
function size_resumo(){

        var height = 0;
        $('div .descritivo').each(function(i){ 
              height = parseFloat(height) + $(this).height() + parseFloat(26); 
        });    
        height = height + parseFloat(150);
        $('#resumo').animate({height: height},1000);

       
}

function size_lista_hospedes(){

        var height = 0;
        $('div .quarto').each(function(i){ 
              height = parseFloat(height) + $(this).height() + parseFloat(46);
        });    
        height = height + parseFloat(130);

        $('#hospedes').css("height", height+"px")

}


function editarSolicitacao(idsolicitacao){
      on_load();   
      var envio ="acao=1"+
                  "&idsolicitacao="+idsolicitacao+
                  "&idstatus="+$('#STATUS').val();

      $.ajax({
      type: "POST",
      data: envio,
      url: "../PHP/form_solicitacao.php",
      success: function(resposta){
 		      if(resposta.indexOf('p')>=1 || resposta.indexOf('Voucher')>=1)alert(resposta);
          on_close(); 
          window.location.assign('lista_solicitacao.php');         
                  
        }
    });


}
function aviso(text,time){

  $("body").prepend("<div id='aviso'><div id='loading1'></div></div>");
  $("#wrapper").prepend("<div id='aviso2'><div id='loading3' style='z-index: 5000;line-height:52px;vertical-align:middle;text-align:center;display: block;position: fixed;left: 547.5px;top: 291px;height: 68px;width:144px;'></div></div>");

  $("#loading3").html(text);  
  
  $("#loading1").fadeIn();
  $("#loading3").fadeIn();
  var w_box = $(window).width();
  var h_box = $(window).height();	
  var w_total = (w_box - 170)/2;
  var h_total = (h_box - 80)/2;
  $("#loading3").css({"position": 'fixed', "left": w_total+"px", "top":h_total+"px"});
  $("#loading3").animate({zindex:1000},time,function(){
 		
   $("#aviso").remove(); $("#aviso2").remove();
   });
}


function on_load(){

  $("body").prepend("<div id='loading1'></div>");
  $("#wrapper").prepend("<div id='loading3' style='z-index: 5000;text-align:center;display: block;position: fixed;left: 547.5px;top: 291px;height: 68px;width:144px;'></div>");

  $("#loading3").html('<img class="img_loading" src="../../../Layout/IMAGES/loading.gif">Por favor aguarde');  
  
  $("#loading1").fadeIn();
  $("#loading3").fadeIn();
  var w_box = $(window).width();
  var h_box = $(window).height();	
  var w_total = (w_box - 170)/2;
  var h_total = (h_box - 80)/2;
  $("#loading3").css({"position": 'fixed', "left": w_total+"px", "top":h_total+"px"});

}

function on_close(){

$("#loading3").remove();
$("#loading1").remove();


}


function informacao_status(id){

      $.ajax({
      type: "POST", 
      data: 'id='+id,
      url: "../PHP/select_historico_status.php",
      success: function(resposta){

                $("#wrapper").prepend("<div id='loading3' style='z-index: 5000;overflow:auto;text-align:center;display: block;position: fixed;left: 547.5px;top: 291px;width: 335px;height: 162px;padding-top: 2px;'></div>");
                $("#loading3").html(resposta);                 
                $("#loading3").fadeIn();
                var w_box = $(window).width() - 10;
                var h_box = 400;	
                var w_total = (w_box - 335)/2;
                var h_total = (h_box - 162)/2;
                $("#loading3").css({"position": 'fixed', "left": w_total+"px", "top":h_total+"px"});
                    $('.fechar_informacao').click(function(){
                      $("#loading3").remove();
                      return false;	
                    });

        }
    });

}

function informacao_cartao(id){

      $.ajax({
      type: "POST", 
      data: 'id='+id,
      url: "../PHP/select_informacao_cartao.php",
      success: function(resposta){

                $("#wrapper").prepend("<div id='loading3' style='z-index: 5000;overflow:auto;text-align:center;display: block;position: fixed;left: 547.5px;top: 291px;width: 390px;height: 399px;padding-top: 2px;'></div>");
                $("#loading3").html(resposta);                 
                $("#loading3").fadeIn();
                var w_box = $(window).width();
                var h_box = 400;	
                var w_total = (w_box - 390)/2;
                var h_total = (h_box - 399)/2;
                $("#loading3").css({"position": 'fixed', "left": w_total+"px", "top":h_total+"px"});
                    $('.fechar_informacao').click(function(){
                      $("#loading3").remove();
                      return false;	
                    });

        }
    });

}

function informacao_hospede(id){
     on_load();
      $.ajax({
      type: "POST",
      data: 'id='+id,
      url: "../PHP/select_informacao_hospede.php",
      success: function(resposta){
						on_close();								
                $("#wrapper").prepend("<div id='loading3' style='z-index: 5000;overflow:auto;text-align:center;display: block;position: fixed;left: 547.5px;top: 291px;width: 320px;height: 241px;padding-top: 2px;'></div>");
                $("#loading3").html(resposta);                 
                $("#loading3").fadeIn();
                var w_box = $(window).width();
                var h_box = 400;	
                var w_total = (w_box - 320)/2;
                var h_total = (h_box - 399)/2;
                $("#loading3").css({"position": 'fixed', "left": w_total+"px", "top":h_total+"px"});
                    $('.fechar_informacao').click(function(){
                      $("#loading3").remove();
                      return false;	
                    });
                  $('.salvar_informacao').click(function(){
                  		on_load();
								$.ajax({
								type: "POST",
								data: $('#hospedes_form').serialize(),
								url: "../PHP/editar_hospede.php",
								success: function(resposta){
									on_close();								
									alert(resposta);
								}});
                    });                    

        }
    });

}

function cancelar(id){
      var ques = confirm("Deseja realmente cancelar esta solicitação");
      if(ques==true){
      $.ajax({
      type: "POST",
      data: 'id='+id+'&acao=5',
      url: "../PHP/confirmarPagamento.php",
      success: function(resposta){
        console.log(resposta);
            if(resposta=='true'){
              $('#status_reserva_'+id).html('Cancelada');
      
              $('#cancelar_'+id).html("<img  title='Solicitação Cancelada' class='cancelar' src='../../../Layout/IMAGES/cancelada.jpg'>");

            }

        }
    });
    }

}

function flag(id,protocolo){


      $('.flag').remove();

      $('#content').append('<div id="flag" class="flag formulario"> <span class="titulo_flag"> Transferir Solicitação Nº'+protocolo+'</span><div id="select_atendente"></div><span id="bt" class="salvar"> Salvar</span> <span id="bt"  class="cancelar"> Cancelar</span> </div>');
      $('#select_atendente').load('../PHP/select_atendente.php');

      $('.cancelar').click(function(){
         $('.flag').remove();
      });

      $('.salvar').click(function(){setFlag(id);});


}

function setFlag(id){
      var idatendente = $('#ATENDENTES').val();
      $.ajax({
      type: "POST",
      data: 'id='+id+'&idatendente='+idatendente,
      url: "../PHP/setFlag.php",
      success: function(resposta){
           $('.img_usuario_'+id).attr('src','../../../Layout/IMAGES/flag.png');
           $('.img_usuario_'+id).attr('title','');
          $('.flag').remove();

        }
    });

}

function EnviarVoucher(id){
    if(confirm('Deseja realmente enviar o Voucher?')){
      $.ajax({
      type: "POST",
      data: 'id='+id,
      url: "../PHP/enviar_voucher.php",
      success: function(resposta){

				alert(resposta);
        }
    });
	}
}


function emitirBoleto(id){


      $('.boleto').remove();

      $('#content').append('<div id="botelo" class="emissao_boleto formulario">  </div>');
      $('#botelo').load('../Forms/select_forma_pagamento.php?idsolicitacao='+id,function(){
      
          $('.cancelar_emissao').click(function(){
               $('#boleto,.emissao_boleto').remove();
          });

          $('.salvar_emissao').click(function(){gerarBoleto(id);});
      });




}

function detalhesPagamento(id,pagamento){

     $('#detalhes_cobranca').load('../PHP/detalhe_pagamento.php?idsolicitacao='+id+'&formapagamento='+pagamento);
}

function gerarBoleto(id){
     email = $('input:radio[name=TIPO_EMISSAO]:checked').val();
     pagamento = $('input:radio[name=FORMA_PAGAMENTO]:checked').val();
     $('#opcoes_cobranca').html('');$('#opcoes_pagamento').html('');$('.salvar_emissao').remove();$('.cancelar_emissao').html('Fechar');
     $('#detalhes_cobranca').load('../PHP/gerar_boleto.php?idsolicitacao='+id+'&formapagamento='+pagamento+'&email='+email);
}



function formataMoeda(numero, casasDecimais, separadorDecimal, separadorMilhar, unidadeMoeda){
	casasDecimais = isNaN(casasDecimais = Math.abs(casasDecimais)) ? 2 : casasDecimais;
	separadorDecimal = separadorDecimal == undefined ? "," : separadorDecimal;
	separadorMilhar = separadorMilhar == undefined ? "." : separadorMilhar;
	unidadeMoeda = unidadeMoeda == undefined ? "" : unidadeMoeda + " ";
	var sinal = numero < 0 ? "-" : "";
	var parteInteira = parseInt(numero = Math.abs(+numero || 0).toFixed(casasDecimais)) + "";

	var j = (j = parteInteira.length) > 3 ? j % 3 : 0;
	return unidadeMoeda + sinal + (j ? parteInteira.substr(0, j) + separadorMilhar : "") + parteInteira.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + separadorMilhar) + (casasDecimais ? separadorDecimal + Math.abs(numero - parteInteira).toFixed(casasDecimais).slice(2) : "");
 }


