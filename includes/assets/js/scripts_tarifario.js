jQuery(document).ready(function(){ 
	
	see_tarifas(jQuery(".numero_do_post").val(), jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val());
 
  jQuery("#billing_cpf_cnpj").addClass("mascara_cpf_ou_cnpj")
  jQuery("#billing_cpf").addClass("mascara_cpf_ou_cnpj")
  jQuery("#billing_cnpj").addClass("mascara_cpf_ou_cnpj")
  jQuery("#shipping_postcode").mask("00000-000");
  jQuery("#billing_phone").addClass("mascara_telefone_nono_digito");
	jQuery("#billing_phone").mask("(99) 99999-9999");
	
  jQuery("#billing_company_field").attr("style", "display:none;");
  
if(parseInt(localStorage.getItem("TIPO_TARIFARIO")) == 0){
  jQuery("#billing_postcode_field").attr("style", "display:none;");
  jQuery("#billing_address_1_field").attr("style", "display:none;");
  jQuery("#billing_address_2_field").attr("style", "display:none;");
  jQuery("#billing_city_field").attr("style", "display:none;");
  jQuery("#billing_country_field").attr("style", "display:none;");
  jQuery("#billing_state_field").attr("style", "display:none;");
	
	jQuery(".woocommerce-billing-fields").append('<input type="hidden" id="billing_country" name="billing_country" value="BR">');
	jQuery(".woocommerce-billing-fields").append('<input type="hidden" id="billing_state" name="billing_state" value="SP">');
	jQuery(".woocommerce-billing-fields").append('<input type="hidden" id="billing_postcode" name="billing_postcode" value="31520000">');
  
  jQuery("#billing_postcode").val("0");
  jQuery("#billing_address_1").val("0");
  jQuery("#billing_address_2").val("0");
  jQuery("#billing_city").val("0");  
  jQuery("#billing_state").val("0");
  jQuery("#billing_company").val("0"); 
	
  jQuery("#shipping_postcode").val("0");
  jQuery("#shipping_address").val("0");
  jQuery("#shipping_address").val("0");
  jQuery("#shipping_city").val("0"); 
  jQuery("#shipping_state").val("0");
  jQuery("#shipping_company").val("0");
}
	
	//jQuery("#billing_company_field label").html('Nome da empresa <abbr class="required" title="obrigatório">*</abbr>')
	//jQuery("#billing_cnpj_field label").html('CNPJ <abbr class="required" title="obrigatório">*</abbr>')
  
  jQuery("#shipping_city").attr("onchange", "change_value_field('city')");
  jQuery("#shipping_country").attr("onchange", "change_value_field('country')");
  jQuery("#shipping_state").attr("onchange", "change_value_field('state')");
  jQuery("#shipping_neighborhood").attr("onchange", "change_value_field('neighborhood')");
  jQuery("#shipping_address_1").attr("onchange", "change_value_field('address_1')");
  jQuery("#shipping_address_2").attr("onchange", "change_value_field('address_2')");
  jQuery("#shipping_postcode").attr("onchange", "change_value_field('postcode')");

  jQuery('.countQ').prop('disabled', true);
    jQuery(document).on('click','.plusQ',function(){
    jQuery('.qtd_room').val(parseInt(jQuery('.countQ').val()) + 1 );

    jQuery('.countQ').val(parseInt(jQuery('.countQ').val()) + 1 );
    add_row_quarto(parseInt(jQuery('.countQ').val()));
    if (parseInt(jQuery('.countQ').val()) > 1) {
      jQuery('.qts_quarto').html(parseInt(jQuery('.countQ').val())+' quartos')
    }else{
      jQuery('.qts_quarto').html(parseInt(jQuery('.countQ').val())+' quarto')
    }
  });

  jQuery(document).on('click','.minusQ',function(){
    jQuery('.countQ').val(parseInt(jQuery('.countQ').val()) - 1 );

    jQuery('.qtd_room').val(parseInt(jQuery('.countQ').val()) - 1 );
    remove_row_quarto(parseInt(jQuery('.countQ').val()) + 1); 
    if (jQuery('.countQ').val() == 0) {
      jQuery('.countQ').val(1); 
    }
    if (jQuery('.countQ').val() == 0) {
      jQuery('.qts_quarto').html('1 quarto'); 
    }else{ 
      if (jQuery('.countQ').val() > 1 ) { 
        jQuery('.qts_quarto').html(parseInt(jQuery('.countQ').val())+' quartos')
      }else{
        jQuery('.qts_quarto').html(parseInt(jQuery('.countQ').val())+' quarto')
      }
    }
  }); 

  var url_atual = window.location;
	//console.log(url_atual);

  var url = window.location.href;
	if(url.indexOf("evento") !== -1){
		localStorage.clear();
	}
  if(url_atual.pathname !== "/" && url.indexOf("/checkout-page/") == -1){  
    //see_tarifas_inicial(jQuery(".post_id").val(), jQuery(".data").val());

  }
  if(url.indexOf("/finalizar-compra") !== -1){  
	  jQuery("label").attr("style", "font-family: 'Montserrat'")
	  if(url.indexOf("?key") !== -1){
		  var room_selected = localStorage.getItem("QUARTO_SELECTED");
		  var data_room_selected = localStorage.getItem("DADOS_QUARTO_"+room_selected);
		  var payment_type = localStorage.getItem("PAYMENT_TYPE");
		  change_bloqueio_order(data_room_selected, room_selected, payment_type, url_atual.pathname); 
	  }
    var options = jQuery('#cielo-installments');


      var retorno = ''; 
    jQuery("#cielo-installments option").each(function() {
      var text = jQuery(this).text();
      var val = jQuery(this).val();
      if(val <= localStorage.getItem("PARCELAS_SELECT")){
        retorno += '<option value="'+val+'" class="'+(val == 1 ? 'cielo-at-sight' : '')+'">'+text+'</option>';
      }    

    });
    jQuery("#cielo-installments").html(retorno);
  }
  if(url.indexOf("/cotacao/") !== -1){  
    jQuery(".elementor-button-link").attr("onclick", "send_cotacao_email()");
    jQuery(".elementor-button-link").removeAttr("href");
    jQuery(".elementor-button-link").attr("style", "cursor:pointer");
    jQuery("form").removeAttr("method");
    jQuery("form").removeAttr("name");

  }

  if(url.indexOf("/checkout-page/") !== -1){  
	  jQuery("#order_review_heading").append('<br> '+localStorage.getItem("NOMEROTEIRO"));
    show_options_conditional_payment();
  }
  if(url.indexOf("finalizar-compra") !== -1){  
	  jQuery("#order_review_heading").append('<br> <h5 style="font-size: 20px;margin: 8px 0;"> '+localStorage.getItem("NOMEROTEIRO")+'</h5>'); 
  }

  jQuery("#button-news").attr("onclick", "send_data_news()");
  jQuery("#send_cotacao").attr("onclick", "send_cotacao_email()");

  jQuery("#Serviço_1_field").attr("style", "display:none");
    jQuery("#Serviço_2_field").attr("style", "display:none");
    jQuery("#Serviço_3_field").attr("style", "display:none");
    jQuery("#Serviço_4_field").attr("style", "display:none"); 

  jQuery('input#Adicionar_Serviço_Opcional_Sim.input-radio').change(function(){
        jQuery("#Serviço_1_field").attr("style", "");
        jQuery("#Serviço_2_field").attr("style", "");
        jQuery("#Serviço_3_field").attr("style", "");
        jQuery("#Serviço_4_field").attr("style", "");
    }); 
  jQuery('input#Adicionar_Serviço_Opcional_Não.input-radio').change(function(){
        jQuery("#Serviço_1_field").attr("style", "display:none");
        jQuery("#Serviço_2_field").attr("style", "display:none");
        jQuery("#Serviço_3_field").attr("style", "display:none");
        jQuery("#Serviço_4_field").attr("style", "display:none");
    }); 

  jQuery("#form-field-whatsapp_news").mask("(00) 00000-0000");
  jQuery("#form-field-nome_news").attr("autocomplete", "off");
  jQuery("#form-field-email_news").attr("autocomplete", "off");
  jQuery("#form-field-whatsapp_news").attr("autocomplete", "off");

  jQuery("#form-field-nome_cotacao").attr("autocomplete", "off");
  jQuery("#form-field-email_cotacao").attr("autocomplete", "off");
  jQuery("#form-field-telefone_cotacao").attr("autocomplete", "off");
  jQuery("#form-field-telefone_cotacao").mask("(00) 00000-0000");
  jQuery("#form-field-mensagem_cotacao").attr("autocomplete", "off");

  jQuery("#destinos_nacionais").attr("onchange", "get_value_nacional()");
  jQuery("#destinos_internacionais").attr("onchange", "get_value_internacional()");
  jQuery("#hospedagens").attr("onchange", "get_value_hospedagens()"); 

  set_value_nacionais();
  set_value_internacionais();
  set_value_hospedagem();
 
    show_dados_cotacao(); 

  if(url.indexOf("/checkout-page/") == -1){ 

    var date = new Date();
  var currentMonth = date.getMonth();
  var currentDate = date.getDate();
  var currentYear = date.getFullYear(); 

  var startdate = currentDate+'/'+currentMonth+'/'+currentYear; 
 
  }

    if(url_atual.pathname == "/"){ 
    list_categories_posts();
  }

  if(url.indexOf("/checkout-page/") != -1){ 
    if(url.indexOf("/order-pay/") != -1){ 
      jQuery(".nv-page-title").html("<h1>Pagar pedido</h1>");
    }else{
      var tipo = localStorage.getItem("TIPO_TARIFARIO"); 
      if (tipo == 0) {
        jQuery(".nv-page-title").html("<h1>Solicitar reserva</h1>");
      }else{
        jQuery(".nv-page-title").html("<h1>Finalizar compra</h1>");
      } 
    }
  }

  jQuery("#billing_first_dateadt1_field_mask").mask("00/00/0000"); 
    jQuery("#billing_first_dateadt2_field_mask").mask("00/00/0000"); 
    jQuery("#billing_first_dateadt3_field_mask").mask("00/00/0000"); 
    jQuery("#billing_first_datechd1_field_mask").mask("00/00/0000"); 

    if(url.indexOf("/hospedagens/") != -1){ 
    jQuery(".elementor-button-link").removeAttr("href");
    jQuery(".elementor-button-link").attr("onclick", "set_cotacao_hotel()");
    jQuery(".elementor-button-link").attr("style", "color:#fff");
  }
  jQuery(".button-form-roteiros").attr("onclick", "list_posts()");

  jQuery(".button-form-aereo").attr("onclick", "set_cotacao_aereo()");
  jQuery(".button-form-hospedagem").attr("onclick", "set_cotacao_hotel()");
  jQuery(".button-form-veiculos").attr("onclick", "set_cotacao_veiculos()");
  jQuery(".cotar-seguro").attr("onclick", "set_cotacao_seguro()");

  jQuery(".submit-form-news").attr("onclick", "submit_form_revenda()");
  jQuery("#field_nome").attr("autocomplete", "off");
  jQuery("#field_email").attr("autocomplete", "off");

  jQuery("#field_Origem").attr("autocomplete", "off"); 
  jQuery("#field_Destino").attr("autocomplete", "off");
  
  jQuery("#field_destino").attr("autocomplete", "off");
  
  jQuery("#field_retirada").attr("autocomplete", "off");
  jQuery("#field_devolver").attr("autocomplete", "off");
  
  jQuery("#field_Destino").attr("autocomplete", "off"); 

  jQuery(".telefone").mask("(00) 00000-0000");

  jQuery(".product-quantity").attr("style", "display:none"); 
 

  var data = jQuery("#data_final_periodo_selecionado").val();  

  function getSearchParams(k){
    var p={};
    location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
    return k?p[k]:p;
  }

    var category_name = getSearchParams("category_name"); 
    var checkin = getSearchParams("field_checkin"); 
    var checkout = getSearchParams("field_Checkout"); 
    if (category_name != '') {
      list_posts_page_destin(category_name, checkin, checkout);
    } 

  

});

function change_bloqueio_order(data_room_selected, room_selected, payment_type, pathname){ 
	//console.log('aqui 1');
	//console.log(localStorage.getItem("CHECK_CHANGE_BLOQ"));
	if(parseInt(localStorage.getItem("CHECK_CHANGE_BLOQ")) !== 1){
		//console.log('aqui 2');
		localStorage.setItem("CHECK_CHANGE_BLOQ", 1);
		var post_id = localStorage.getItem("ID_POST_TARIFARIO");
		data_room_selected = JSON.parse(data_room_selected);
		if(parseInt(payment_type) == 3){
			jQuery.ajax({
				type: "POST",
				url: wp_ajax.ajaxurl,
				data: { action: "change_bloqueio_order", data_room_selected:data_room_selected, room_selected:room_selected, pathname:pathname, post_id:post_id },
				success: function( data ) {
					var retorno = data.slice(0,-1);
					//console.log(retorno);
				}
			});
		}
	}
	
}

function onlyOnLoadButton(){
  jQuery("button").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');
  jQuery("button").attr("disabled", "disabled");
  jQuery("button").prop("disabled");

  var datas = localStorage.getItem("DATAS_POMPTUR"); 
  var periodo = localStorage.getItem("PERIODO_POMPTUR"); 
  var roteiro = localStorage.getItem("ROTEIRO_POMPTUR"); 
  var adultos = localStorage.getItem("ADULTOS_POMPTUR"); 
  var criancas = localStorage.getItem("CRIANCAS_POMPTUR"); 
  var idade = localStorage.getItem("IDADE_POMPTUR"); 

  jQuery.ajax({
          type: "POST",
          url: wp_ajax.ajaxurl,
          data: { action: "send_mail_cotacao", datas:datas, datas:datas, datas:datas, datas:datas, datas:datas, datas:datas },
          success: function( data ) {
            var retorno = data.slice(0,-1);
              if(retorno == 1){
                window.location.href = '/obrigado?pagina='+inputFrom;
              }else{
                swal({
                        title: "Formulário não enviado",
                        text: "Sua mensagem não pode ser enviada. Tente novamente mais tarde.",
                        icon: "error"
                    }).then((value) => {
                    window.location.reload();
                });
              }
          }
      });
}

  function change_value_field(field){ 
  jQuery("#billing_"+field).val(jQuery("#shipping_"+field).val());
}

  window.setInterval(function(){ 
      show_options_conditional_payment();
  }, 6000);

function plus_room(i){ 

  
  var qtd_adt_room1 = parseInt(jQuery('.count1').val());
  var qtd_adt_room2 = (jQuery('.count2').val() != undefined ? parseInt(jQuery('.count2').val()) : 0);
  var qtd_adt_room3 = (jQuery('.count3').val() != undefined ? parseInt(jQuery('.count3').val()) : 0);
  var qtd_adt_room4 = (jQuery('.count4').val() != undefined ? parseInt(jQuery('.count4').val()) : 0);
  var qtd_adt_room5 = (jQuery('.count5').val() != undefined ? parseInt(jQuery('.count5').val()) : 0);
  var qtd_adt_room6 = (jQuery('.count6').val() != undefined ? parseInt(jQuery('.count6').val()) : 0);
  var qtd_adt_room7 = (jQuery('.count7').val() != undefined ? parseInt(jQuery('.count7').val()) : 0);
  var qtd_adt_room8 = (jQuery('.count8').val() != undefined ? parseInt(jQuery('.count8').val()) : 0);
  var qtd_adt_room9 = (jQuery('.count9').val() != undefined ? parseInt(jQuery('.count9').val()) : 0);
  var qtd_adt_room10 = (jQuery('.count10').val() != undefined ? parseInt(jQuery('.count10').val()) : 0);

  jQuery('.qtd_adt').val(parseInt(qtd_adt_room1+qtd_adt_room2+qtd_adt_room3+qtd_adt_room4+qtd_adt_room5+qtd_adt_room6+qtd_adt_room7+qtd_adt_room8+qtd_adt_room9+qtd_adt_room10) + 1); 

    if((parseInt(qtd_adt_room1+qtd_adt_room2+qtd_adt_room3+qtd_adt_room4+qtd_adt_room5+qtd_adt_room6+qtd_adt_room7+qtd_adt_room8+qtd_adt_room9+qtd_adt_room10) + 1) < 4){
    jQuery('.count'+i).val(parseInt(jQuery('.count'+i).val()) + 1 ); 
    if (jQuery('.qtd_adt').val() > 1) {
      jQuery('.adt_quarto').html(parseInt(jQuery('.qtd_adt').val())+' adultos')
    }else{
      jQuery('.adt_quarto').html(parseInt(jQuery('.qtd_adt').val())+' adulto')
    }
  }else{
    jQuery('.count'+i).val(3); 
    jQuery('.adt_quarto').html('3 adultos')
  }

}

function minus_room(i){

  var qtd_adt_room1 = parseInt(jQuery('.count1').val());
  var qtd_adt_room2 = (jQuery('.count2').val() != undefined ? parseInt(jQuery('.count2').val()) : 0);
  var qtd_adt_room3 = (jQuery('.count3').val() != undefined ? parseInt(jQuery('.count3').val()) : 0);
  var qtd_adt_room4 = (jQuery('.count4').val() != undefined ? parseInt(jQuery('.count4').val()) : 0);
  var qtd_adt_room5 = (jQuery('.count5').val() != undefined ? parseInt(jQuery('.count5').val()) : 0);
  var qtd_adt_room6 = (jQuery('.count6').val() != undefined ? parseInt(jQuery('.count6').val()) : 0);
  var qtd_adt_room7 = (jQuery('.count7').val() != undefined ? parseInt(jQuery('.count7').val()) : 0);
  var qtd_adt_room8 = (jQuery('.count8').val() != undefined ? parseInt(jQuery('.count8').val()) : 0);
  var qtd_adt_room9 = (jQuery('.count9').val() != undefined ? parseInt(jQuery('.count9').val()) : 0);
  var qtd_adt_room10 = (jQuery('.count10').val() != undefined ? parseInt(jQuery('.count10').val()) : 0);

  jQuery('.qtd_adt').val(parseInt(qtd_adt_room1+qtd_adt_room2+qtd_adt_room3+qtd_adt_room4+qtd_adt_room5+qtd_adt_room6+qtd_adt_room7+qtd_adt_room8+qtd_adt_room9+qtd_adt_room10) - 1);  

  jQuery('.count'+i).val(parseInt(jQuery('.count'+i).val()) - 1 );
  if (jQuery('.count'+i).val() == 0) {
    jQuery('.count'+i).val(1); 
  }
  if (parseInt(jQuery('.qtd_adt').val()) == 0) {
    jQuery('.adt_quarto').html('1 adulto'); 
  }else{ 
    if (jQuery('.count'+i).val() > 1 ) { 
      jQuery('.adt_quarto').html(parseInt(jQuery('.qtd_adt').val())+' adultos')
    }else{
      jQuery('.adt_quarto').html(parseInt(jQuery('.qtd_adt').val())+' adulto')
    }
  }
} 

function plus_room_chd(i){ 

  var qtd_chd_room1 = parseInt(jQuery('.countC1').val());
  var qtd_chd_room2 = (jQuery('.countC2').val() != undefined ? parseInt(jQuery('.countC2').val()) : 0);
  var qtd_chd_room3 = (jQuery('.countC3').val() != undefined ? parseInt(jQuery('.countC3').val()) : 0);
  var qtd_chd_room4 = (jQuery('.countC4').val() != undefined ? parseInt(jQuery('.countC4').val()) : 0);
  var qtd_chd_room5 = (jQuery('.countC5').val() != undefined ? parseInt(jQuery('.countC5').val()) : 0);
  var qtd_chd_room6 = (jQuery('.countC6').val() != undefined ? parseInt(jQuery('.countC6').val()) : 0);
  var qtd_chd_room7 = (jQuery('.countC7').val() != undefined ? parseInt(jQuery('.countC7').val()) : 0);
  var qtd_chd_room8 = (jQuery('.countC8').val() != undefined ? parseInt(jQuery('.countC8').val()) : 0);
  var qtd_chd_room9 = (jQuery('.countC9').val() != undefined ? parseInt(jQuery('.countC9').val()) : 0);
  var qtd_chd_room10 = (jQuery('.countC10').val() != undefined ? parseInt(jQuery('.countC10').val()) : 0);

  jQuery('.qtd_chd').val(parseInt(qtd_chd_room1+qtd_chd_room2+qtd_chd_room3+qtd_chd_room4+qtd_chd_room5+qtd_chd_room6+qtd_chd_room7+qtd_chd_room8+qtd_chd_room9+qtd_chd_room10) + 1); 
  
  jQuery('.countC'+i).val(parseInt(jQuery('.countC'+i).val()) + 1 ); 
  if (jQuery('.qtd_chd').val() > 1) {
    jQuery('.chd_quarto').html(parseInt(jQuery('.qtd_chd').val())+' crianças')
  }else{
    jQuery('.chd_quarto').html(parseInt(jQuery('.qtd_chd').val())+' criança')
  }

}

function minus_room_chd(i){ 

  var qtd_chd_room1 = parseInt(jQuery('.countC1').val());
  var qtd_chd_room2 = (jQuery('.countC2').val() != undefined ? parseInt(jQuery('.countC2').val()) : 0);
  var qtd_chd_room3 = (jQuery('.countC3').val() != undefined ? parseInt(jQuery('.countC3').val()) : 0);
  var qtd_chd_room4 = (jQuery('.countC4').val() != undefined ? parseInt(jQuery('.countC4').val()) : 0);
  var qtd_chd_room5 = (jQuery('.countC5').val() != undefined ? parseInt(jQuery('.countC5').val()) : 0);
  var qtd_chd_room6 = (jQuery('.countC6').val() != undefined ? parseInt(jQuery('.countC6').val()) : 0);
  var qtd_chd_room7 = (jQuery('.countC7').val() != undefined ? parseInt(jQuery('.countC7').val()) : 0);
  var qtd_chd_room8 = (jQuery('.countC8').val() != undefined ? parseInt(jQuery('.countC8').val()) : 0);
  var qtd_chd_room9 = (jQuery('.countC9').val() != undefined ? parseInt(jQuery('.countC9').val()) : 0);
  var qtd_chd_room10 = (jQuery('.countC10').val() != undefined ? parseInt(jQuery('.countC10').val()) : 0);

  if(parseInt(qtd_chd_room1+qtd_chd_room2+qtd_chd_room3+qtd_chd_room4+qtd_chd_room5+qtd_chd_room6+qtd_chd_room7+qtd_chd_room8+qtd_chd_room9+qtd_chd_room10) - 1 <= 0){
    jQuery('.qtd_chd').val(0);  
  }else{ 
    jQuery('.qtd_chd').val(parseInt(qtd_chd_room1+qtd_chd_room2+qtd_chd_room3+qtd_chd_room4+qtd_chd_room5+qtd_chd_room6+qtd_chd_room7+qtd_chd_room8+qtd_chd_room9+qtd_chd_room10) - 1);  
  }

  jQuery('.countC'+i).val(parseInt(jQuery('.countC'+i).val()) - 1 );
  if (jQuery('.countC'+i).val() <= 0) {
    jQuery('.countC'+i).val(0); 
  }
  if (parseInt(jQuery('.qtd_chd').val()) == 0) {
    jQuery('.chd_quarto').html('0 crianças'); 
  }else{ 
    if (jQuery('.qtd_chd').val() > 1 ) { 
      jQuery('.chd_quarto').html(parseInt(jQuery('.qtd_chd').val())+' crianças')
    }else{
      jQuery('.chd_quarto').html(parseInt(jQuery('.qtd_chd').val())+' criança')
    }
  }
} 


function remove_row_quarto(quarto){
  jQuery('.row_room'+quarto).remove();
}

function add_row_quarto(i){

  var retorno = "";

  retorno = '<div class="row row_room'+i+'">'+
        '<div class="col-12"><label><strong style="font-size: 13px;font-weight: 700;font-family: \'Montserrat\';">Quarto '+i+'</strong></label></div>'+
        '<div class="col-5"><label><strong style="font-size: 13px;font-weight: 500;font-family: \'Montserrat\';">Adultos</strong></label></div>'+
        '<div class="col-7">'+
            '<div class="qty " style="padding: 2px 0px;">'+
                '<span class="minus'+i+' bg-dark" onclick="minus_room('+i+')">-</span>'+
                '<input type="number" class="count'+i+'" name="qty" value="2" style="font-size: 17px;font-weight: 600;font-family: \'Montserrat\';">'+
                '<span class="plus'+i+' bg-dark" onclick="plus_room('+i+')">+</span>'+
            '</div>'+
        '</div>'+
        '<div class="col-5"><label><strong style="font-size: 13px;font-weight: 500;font-family: \'Montserrat\';">Crianças</strong></label></div>'+
        '<div class="col-7">'+
            '<div class="qty " style="padding: 2px 0px;">'+
                '<span class="minusC'+i+' bg-dark" onclick="minus_room_chd('+i+')">-</span>'+
                '<input type="number" class="countC'+i+'" name="qty" value="0" style="font-size: 17px;font-weight: 600;font-family: \'Montserrat\';">'+
                '<span class="plusC'+i+' bg-dark" onclick="plus_room_chd('+i+')">+</span>'+
            '</div>'+
        '</div>'+
        '<div class="col-12">'+
            '<hr>'+
        '</div>'+
    '</div>';

  jQuery(".add_qtd_pax").append(retorno);

}

function toggle_div_room(id){
  jQuery("#open_div_room"+id).toggle(1000);
}

function list_posts_page_destin(category, checkin, checkout){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_posts_page_destin", category:category, checkin:checkin, checkout:checkout },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#content .nv-content-none-wrap").html(retorno); 

            //preenche_select_apto(id, i);
        }
    });
}


function show_div_count(){
  jQuery(".dropdown").toggle(500);

  var contador_rooms = jQuery("#contador_rooms").val();
  contador_rooms = parseInt(contador_rooms)+1; 

  var qtd_total_adt = 0;
  var qtd_total_chd = 0;
  for (var i = 1; i < contador_rooms; i++) {
    qtd_total_adt += parseInt(jQuery(".count_adt"+i).val());
    qtd_total_chd += parseInt(jQuery(".count_chd"+i).val());
  }

  jQuery(".count_adultos").html("<strong>"+qtd_total_adt+" "+(qtd_total_adt > 1 ? 'adultos' : 'adulto')+"</strong>");
  jQuery(".count_criancas").html("<strong>"+qtd_total_chd+" "+(qtd_total_chd > 0 ? 'crianças' : 'criança')+"</strong>");
  jQuery(".count_quartos").html("<strong>"+(parseInt(contador_rooms)-1)+" "+(parseInt(contador_rooms)-1 > 1 ? 'quartos' : 'quarto')+"</strong>");
}

function strpos (haystack, needle, offset) {
  var i = (haystack+'').indexOf(needle, (offset || 0));
  return i === -1 ? false : i;
}

function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function getDayName(dateStr, locale)
{
    var date = new Date(dateStr);
    return date.toLocaleDateString(locale, { weekday: 'long' });        
}

function show_div_count_atualizar(data_id_div, code){ 
	localStorage.setItem("ID_POST_TARIFARIO", code);
  //toggle_div_room(code);
	 
  if (jQuery("#tipo_diarias_"+code+"_"+data_id_div).val() == 0) { 

    var data_checkin = jQuery("#data_form_inicial_"+code+"_"+data_id_div).val();

    var loop_data_checkin = JSON.parse(jQuery("#datas_inicial_"+code+"_"+data_id_div).val());      

    var datasiniciaiscalendario = JSON.parse(jQuery(".datas_iniciais_calendario_"+code+"_"+data_id_div).val()); 
    var datasfinaiscalendario = JSON.parse(jQuery(".datas_finais_calendario_"+code+"_"+data_id_div).val());    
    var datasperiodoscalendario = JSON.parse(jQuery(".datas_periodos_calendario_"+code+"_"+data_id_div).val());     
    var nomesperiodoscalendario = JSON.parse(jQuery(".nomes_periodos_calendario_"+code+"_"+data_id_div).val());  

    var periodo_mensal_selecionado = data_checkin.split("/");
    var mes_selecionado = periodo_mensal_selecionado[1];
    var ano_selecionado = periodo_mensal_selecionado[2];  

    var contador_tarifas = 0;
    for (var x = 0; x < loop_data_checkin.length; x++) {
      jQuery(".div_tarifario_data_"+loop_data_checkin[x].replace("/", "-").replace("/", "-")+"_"+code).attr("style", "display:none"); 

      var periodo_mensal = loop_data_checkin[x].split("/");
      var mes = periodo_mensal[1];
      var ano = periodo_mensal[2];   

      if ((moment(jQuery("#field_checkin_"+code+"_"+data_id_div).val(), "DD/MM/YYYY") >= moment(loop_data_checkin[x], "DD/MM/YYYY"))) {
        contador_tarifas = contador_tarifas+1; 
      } 
   
    }   

    var contador_periodos_intercalados = 0;
    var periodos_encontrados = '';

    var tipo_periodo = jQuery(".tipo_periodo_"+code.replace("/", "-").replace("/", "-")+'_'+data_id_div).val();

    if (tipo_periodo == 1) {

      if (datasiniciaiscalendario.length > 1) { 

        for (var x = 0; x < datasiniciaiscalendario.length; x++) {

          var data_inicio_agrupamento = datasiniciaiscalendario[x]; 

          var data_selecionada_inicial = moment(jQuery("#data_form_inicial_"+code+"_"+data_id_div).val(), "DD/MM/YYYY"); 
          var data_periodo_inicial = moment(datasiniciaiscalendario[x], "DD/MM/YYYY"); 
          var data_periodo_final = moment(datasfinaiscalendario[x], "DD/MM/YYYY"); 

          var dateFrom = jQuery("#data_form_inicial_"+code+"_"+data_id_div).val(); 
          var dateCheck = datasiniciaiscalendario[x];
          var dateCheck2 = datasfinaiscalendario[x];

          var d1 = dateFrom.split("/"); 
          var c = dateCheck.split("/"); 
          var c2 = dateCheck2.split("/"); 

          var from = new Date(d1[2], parseInt(d1[1])-1, d1[0]);  // -1 because months are from 0 to 11 
          var check = new Date(c[2], parseInt(c[1])-1, c[0]); 
          var check2 = new Date(c2[2], parseInt(c2[1])-1, c2[0]); 
 
          
          if ((from >= check && from <= check2) && (datasperiodoscalendario[x] == 0)) {
 
            contador_periodos_intercalados = 1; 

            periodos_encontrados += nomesperiodoscalendario[x]+"<br>"; 
          }

        } 

      }
    } 

    var data_inicio = jQuery("#data_form_"+code+"_"+data_id_div).val().split("/");
	data_inicio = data_inicio[2]+"-"+data_inicio[1]+"-"+data_inicio[0];
	var data_fim = jQuery("#data_form_inicial_"+code+"_"+data_id_div).val().split("/");
	data_fim = data_fim[2]+"-"+data_fim[1]+"-"+data_fim[0];

	var agora = moment(data_inicio); // Data de hoje 
	var antes = moment(data_fim); // Outra data no passado 
	var duracao = moment.duration(agora.diff(antes)); 

	// Mostra a diferença em dias
	var dias = duracao.asDays();
	var noitesSSS = parseInt(dias); 

    var qtd_noites_calculo = noitesSSS;  

    if (contador_tarifas == 0) {
      swal({
              title: "Nenhuma tarifa encontrada para o período selecionado.",
              icon: "warning",
          }); 
      }else if (contador_periodos_intercalados > 0) {
        var myhtml = document.createElement("div");
      myhtml.innerHTML = "<strong>PERÍODOS ENCONTRADOS:</strong><br>"+periodos_encontrados;  

      swal({
              title: "O seu período passa por mais de uma temporada e por isso precisará de uma cotação especial:",
              content: myhtml, 
              icon: "warning",
              buttons: {
            cancel: "Cancelar",
            confirm: "Solicitar", 
          }, 
          }).then(function(isConfirm) {
              if (isConfirm) { 

                var url = window.location.href;
                var destino = url.split("/");
                destino = ucwords(destino[3].replace("-", " "));

          var PERIODO_POMPTUR = jQuery(".nome_periodo_"+code+"_"+data_id_div).val();  
          var ROTEIRO_POMPTUR = jQuery(".nome_roteiro_"+code+"_"+data_id_div).val();   

                localStorage.setItem("DESTINO_POMPTUR", destino);
                localStorage.setItem("DATAS_POMPTUR", jQuery("#data_form_inicial_"+code+"_"+data_id_div).val()+' a '+jQuery("#data_form_"+code+"_"+data_id_div).val());
                localStorage.setItem("ROTEIRO_POMPTUR", ROTEIRO_POMPTUR);
                localStorage.setItem("PERIODO_POMPTUR", PERIODO_POMPTUR);
                localStorage.setItem("ADULTOS_POMPTUR", jQuery("#field_adt_"+code+"_"+data_id_div).val());
                localStorage.setItem("CRIANCAS_POMPTUR", jQuery("#field_chd_"+code+"_"+data_id_div).val());
              } 
          });
    }else{
      for (var i = 0; i < 21; i++) {
          jQuery(".div_bloco_hotelaria_"+code+"_"+i).attr("style", "display:none");
        } 

      var json_quartos = JSON.parse(jQuery("#tarifa_quartos_"+data_id_div+"_"+code).val());  
      var contador_rooms = parseInt(jQuery(".qtd_room").val()); 
      var contador_pax_room = parseInt(jQuery(".qtd_room").val())+1; 

      var retorno = "";


      retorno += "<h5>Opções disponíveis:</h5>";

      for (var i = 0; i < json_quartos.length; i++) {
        var dados_quarto = json_quartos[i];  
	
		  	if(parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val()) == parseInt(dados_quarto.qtd_pax_apto)){
        var pax_por_quarto = 1;
        var desc_quarto = "Single";
        var valor_quarto = 0;   

        var localizacao = "";
        if (dados_quarto.localizacao_hotel != null) {
          localizacao = '<h2 class="elementor-heading-title elementor-size-default" style="margin-top: 6px;font-size:13px;"> '+dados_quarto.localizacao_hotel+'</h2>';
        } 
		    
        retorno += '<section class="elementor-section elementor-top-section elementor-element elementor-element-739dedd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="739dedd" data-element_type="section" style="border: 1px solid #ddd;border-radius: 4px;padding: 10px;"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-a56b981" data-id="a56b981" data-element_type="column" style="width: 25%;"> <div class="elementor-widget-wrap elementor-element-populated" style="padding:10px 4px;"> <div class="elementor-element elementor-element-fda57c5 elementor-widget elementor-widget-image" data-id="fda57c5" data-element_type="widget" data-widget_type="image.default" style="height:100%"> <div class="elementor-widget-container" style="height:100%"> <image width="800" height="533" src="'+(dados_quarto.foto_hotel == "" || dados_quarto.foto_hotel == 0 ? 'https://www.freeiconspng.com/uploads/no-image-icon-4.png' : dados_quarto.foto_hotel)+'" style="height:150px;border-radius:4px"></div> </div> </div> </div>   <div class="elementor-column elementor-col-'+(dados_quarto.foto_hotel == 0 ? '30' : '20')+' elementor-top-column elementor-element elementor-element-94b74d9" data-id="94b74d9" data-element_type="column" style="width:45%"> <div class="elementor-widget-wrap elementor-element-populated" style="padding:0px;"> <section class="elementor-section elementor-inner-section elementor-element elementor-element-ed40d30 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ed40d30" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-8eb33fe" data-id="8eb33fe" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated"> <div class="elementor-element elementor-element-6ec8aad elementor-widget elementor-widget-heading" data-id="6ec8aad" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" style="font-size: 17px;font-weight: 700;color: var(--e-global-color-primary);">'+(dados_quarto.categoria_apto != null ? dados_quarto.categoria_apto : '')+' <br> <small style="font-size:12px;font-weight:500">'+localizacao+'</small></h2> </div> </div> <div class="elementor-element elementor-element-64b43e0 elementor-widget elementor-widget-heading" data-id="64b43e0" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container" style="border-left: 1px solid #a1a1a1;padding: 4px 16px;font-family:\'Montserrat\'"> <h2 class="elementor-heading-title elementor-size-default" style="margin-bottom:6px !important"><strong>'+(dados_quarto.nome_hotel.replace("%ap", "'"))+'</strong></h2> <small>'+(dados_quarto.regime_apto != null ? dados_quarto.regime_apto : '')+'</small> </div> </div> <div class="elementor-element elementor-element-63c9731 elementor-widget elementor-widget-heading" data-id="63c9731" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default"></h2> </div> </div>  </div> </div> </div> </section> </div> </div>  <div class="elementor-column elementor-col-30 elementor-top-column elementor-element elementor-element-490f7fe" data-id="490f7fe" data-element_type="column" style="width: 30%;"> <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 4px;"> <section class="elementor-section elementor-inner-section elementor-element elementor-element-44c2ad5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="44c2ad5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" style="background-color:#fff !important"> <div class="elementor-container elementor-column-gap-default">  <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6252797" data-id="6252797" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 6px 10px 0px;"> <div class="elementor-element elementor-element-192b0e4 elementor-widget elementor-widget-heading" data-id="192b0e4" data-element_type="widget" data-widget_type="heading.default" style="margin-bottom: 5px !important;"><p style="margin-bottom: 8px;font-size: 11px;font-family: \'Montserrat\';font-weight: 500;">'+qtd_noites_calculo+' noites, '+jQuery("#field_adt_"+code+"_"+data_id_div).val()+' '+(jQuery("#field_adt_"+code+"_"+data_id_div).val() > 1 ? 'adultos' : 'adulto')+' '+(jQuery("#field_chd_"+code+"_"+data_id_div).val() > 0 ? (jQuery("#field_chd_"+code+"_"+data_id_div).val()+' '+(jQuery("#field_chd_"+code+"_"+data_id_div).val() > 1 ? 'crianças' : 'criança')) : '')+'</p> '+(dados_quarto.valor_pacote_single == 0 ? '' : '<div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" id="0_subtotal01-10-2022_196" style="font-size:22px">'+dados_quarto.moeda+' '+dados_quarto.valor_pacote_single+'</h2> </div> </div>')+' '+(dados_quarto.valor_pacote_double == 0 ? '' : '<div class="elementor-element elementor-element-192b0e4 elementor-widget elementor-widget-heading" data-id="192b0e4" data-element_type="widget" data-widget_type="heading.default" style="margin-bottom: 5px !important;"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" id="0_subtotal01-10-2022_196" style="font-size:22px">'+dados_quarto.moeda+' '+dados_quarto.valor_pacote_double+'</h2> </div> </div>')+'  '+(dados_quarto.valor_pacote_triple == 0 ? '' : '<div class="elementor-element elementor-element-192b0e4 elementor-widget elementor-widget-heading" data-id="192b0e4" data-element_type="widget" data-widget_type="heading.default" style="margin-bottom: 5px !important;"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" id="0_subtotal01-10-2022_196" style="font-size:22px">'+dados_quarto.moeda+' '+dados_quarto.valor_pacote_triple+'</h2> </div> </div>')+' <p style="margin-bottom: 8px;font-size: 11px;font-family: \'Montserrat\';font-weight: 500;">Impostos já incluídos</p>  '+(dados_quarto.taxas == "" ? '' : '<div class="elementor-element elementor-element-ced2e60 elementor-widget elementor-widget-heading" data-id="ced2e60" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default valor_total" id="0_taxas_01-10-2022_196">'+dados_quarto.moeda+' '+dados_quarto.taxas+'</h2> </div> </div>');
			  if(dados_quarto.valor_pacote_single == 0 && dados_quarto.valor_pacote_double == 0){
				  var priceCheck = dados_quarto.valor_pacote_triple;
			  }else if(dados_quarto.valor_pacote_single == 0 && dados_quarto.valor_pacote_triple == 0){
				  var priceCheck = dados_quarto.valor_pacote_double;
			  }else if(dados_quarto.valor_pacote_double == 0 && dados_quarto.valor_pacote_triple == 0){
				  var priceCheck = dados_quarto.valor_pacote_single;
			  }
				if(dados_quarto.tipo_periodo == 1){
			  retorno += '<button class="btn btn-primary check_set_'+data_id_div+'_'+code+'" id="check_set_'+data_id_div+'_'+code+'" name="check_set_'+data_id_div+'_'+code+'" onclick="send_reserva(\''+dados_quarto.nome_hotel+'\', \''+dados_quarto.categoria_apto+'\', \''+dados_quarto.tipo_pacote+'\', \''+jQuery("#data_form_inicial_"+code+'_'+data_id_div).val()+'\', \''+qtd_noites_calculo+'\', \''+dados_quarto.valor_pacote_single+'\', \''+priceCheck+'\', \''+dados_quarto.valor_pacote_triple+'\', \''+dados_quarto.nome_roteiro+'\', \''+dados_quarto.regime_apto+'\', \''+dados_quarto.tipo_periodo+'\', \''+jQuery("#field_adt_"+code+"_"+data_id_div).val()+'\', \''+jQuery("#field_chd_"+code+"_"+data_id_div).val()+'\', \''+dados_quarto.data_final+'\')">Reservar</button>';
		  }else{
		  	retorno += '<button class="btn btn-primary check_set_'+data_id_div+'_'+code+'" id="check_set_'+data_id_div+'_'+code+'" name="check_set_'+data_id_div+'_'+code+'" onclick="change_set_value(\''+dados_quarto.nome_hotel+'\', \''+dados_quarto.categoria_apto+'\', \''+dados_quarto.tipo_pacote+'\', \''+jQuery("#data_form_inicial_"+code+'_'+data_id_div).val()+'\', \''+qtd_noites_calculo+'\', \''+dados_quarto.valor_pacote_single+'\', \''+priceCheck+'\', \''+dados_quarto.valor_pacote_triple+'\', \''+dados_quarto.nome_roteiro+'\', \''+dados_quarto.regime_apto+'\', \''+dados_quarto.tipo_periodo+'\', \''+jQuery("#field_adt_"+code+"_"+data_id_div).val()+'\', \''+jQuery("#field_chd_"+code+"_"+data_id_div).val()+'\', \''+dados_quarto.data_final+'\')">Solicitar cotação</button>';
		  } 
		  retorno += '</div> </div> </div> </section> </div> </div> </div> </section>'; 

      retorno += '<hr>';

      }

      jQuery(".div_interno_tarifario_data_"+data_id_div+"_"+code).html(retorno);
      jQuery(".div_tarifario_data_"+data_id_div+"_"+code).attr("style", "");

      goToByScroll('scroll', data_id_div, code);
    }
	 
  }
     

  }else{ 

    var data_checkin = jQuery("#data_form_inicial_"+code+"_"+data_id_div).val();
    var data_checkout = jQuery("#data_form_"+code+"_"+data_id_div).val();

    var data = jQuery('#data_form_inicial_'+code+"_"+data_id_div).val()+' - '+jQuery('#data_form_'+code+"_"+data_id_div).val();
    data = data.split(" - ");
    var data_inicio = data[0].split("/");
    data_inicio = data_inicio[2]+"-"+data_inicio[1]+"-"+data_inicio[0];
    var data_fim = data[1].split("/");
    data_fim = data_fim[2]+"-"+data_fim[1]+"-"+data_fim[0];

    const now = moment(data_fim); // Data de hoje
    const past = moment(data_inicio); // Outra data no passado
    const duration = moment.duration(now.diff(past));

    // Mostra a diferença em dias
    const days = duration.asDays();
    const noites = (parseInt(days) == 1 ? parseInt(days) : parseInt(days)); 
    //console.log('noites', jQuery(".noites_pacote"+code).val());

    var loop_data_checkin = JSON.parse(jQuery("#datas_inicial_"+code+"_"+data_id_div).val());  
    var loop_data_checkout = JSON.parse(jQuery("#datas_final_"+code+"_"+data_id_div).val());     

    var datasiniciaiscalendario = JSON.parse(jQuery(".datas_iniciais_calendario_"+code+"_"+data_id_div).val()); 
    var datasfinaiscalendario = JSON.parse(jQuery(".datas_finais_calendario_"+code+"_"+data_id_div).val());    
    var datasperiodoscalendario = JSON.parse(jQuery(".datas_periodos_calendario_"+code+"_"+data_id_div).val());     
    var nomesperiodoscalendario = JSON.parse(jQuery(".nomes_periodos_calendario_"+code+"_"+data_id_div).val());  

    var periodo_mensal_selecionado = data_checkin.split("/");
    var mes_selecionado = periodo_mensal_selecionado[1];
    var ano_selecionado = periodo_mensal_selecionado[2];  

    var contador_tarifas = 0;
    for (var x = 0; x < loop_data_checkin.length; x++) {
      jQuery(".div_tarifario_data_"+loop_data_checkin[x].replace("/", "-").replace("/", "-")+"_"+code).attr("style", "display:none"); 

      var periodo_mensal = loop_data_checkin[x].split("/");
      var mes = periodo_mensal[1];
      var ano = periodo_mensal[2];   

      if ((moment(jQuery("#data_form_inicial_"+code+"_"+data_id_div).val(), "DD/MM/YYYY") >= moment(loop_data_checkin[x], "DD/MM/YYYY"))) {
        contador_tarifas = contador_tarifas+1; 
      } 
   
    }   

    var contador_periodos_intercalados = 0;
    var periodos_encontrados = '';

    var tipo_periodo = jQuery(".tipo_periodo_"+code.replace("/", "-").replace("/", "-")+'_'+data_id_div).val();

    if (tipo_periodo == 1) {

      if (datasiniciaiscalendario.length > 1) { 

        for (var x = 0; x < datasiniciaiscalendario.length; x++) {

          var data_inicio_agrupamento = datasiniciaiscalendario[x]; 

          var data_selecionada_inicial = moment(jQuery("#data_form_inicial_"+code+"_"+data_id_div).val(), "DD/MM/YYYY"); 
          var data_periodo_inicial = moment(datasiniciaiscalendario[x], "DD/MM/YYYY"); 
          var data_periodo_final = moment(datasfinaiscalendario[x], "DD/MM/YYYY"); 

          var dateFrom = jQuery("#data_form_inicial_"+code+"_"+data_id_div).val(); 
          var dateCheck = datasiniciaiscalendario[x];
          var dateCheck2 = datasfinaiscalendario[x];

          var d1 = dateFrom.split("/"); 
          var c = dateCheck.split("/"); 
          var c2 = dateCheck2.split("/"); 

          var from = new Date(d1[2], parseInt(d1[1])-1, d1[0]);  // -1 because months are from 0 to 11 
          var check = new Date(c[2], parseInt(c[1])-1, c[0]); 
          var check2 = new Date(c2[2], parseInt(c2[1])-1, c2[0]);  
          
          if ((from >= check && from <= check2) && (datasperiodoscalendario[x] == 0)) {
 
            contador_periodos_intercalados = 1; 

            periodos_encontrados += nomesperiodoscalendario[x]+"<br>"; 
          }

        } 

      }
    } 
	  
	  var data_inicio = jQuery("#data_form_"+code+"_"+data_id_div).val().split("/");
	data_inicio = data_inicio[2]+"-"+data_inicio[1]+"-"+data_inicio[0];
	var data_fim = jQuery("#data_form_inicial_"+code+"_"+data_id_div).val().split("/");
	data_fim = data_fim[2]+"-"+data_fim[1]+"-"+data_fim[0];

	var agora = moment(data_inicio); // Data de hoje
	  console.log('agora '+agora);
	var antes = moment(data_fim); // Outra data no passado
	  console.log('antes '+antes);
	var duracao = moment.duration(agora.diff(antes));
	  console.log('duracao '+duracao);

	// Mostra a diferença em dias
	var dias = duracao.asDays();
	var noitesSSS = parseInt(dias); 

    var qtd_noites_calculo = noitesSSS; 
	  console.log('noites '+noitesSSS);

      var json_quartos = JSON.parse(jQuery("#tarifa_quartos_diaria_"+data_id_div+"_"+code).val());  
 
    if(4 > 4){ 
      var myhtml = document.createElement("div");
      myhtml.innerHTML = "Você pode selecionar uma data diferente do que a do período cadastrado, mas precisamos confirmar que as datas selecionadas estão disponíveis. <br><br> Deseja enviar uma cotação personalizada?";  

      swal({
              title: "O seu período selecionado tem datas diferentes:",
              content: myhtml, 
              icon: "warning",
              buttons: {
            cancel: "Cancelar",
            confirm: "Solicitar", 
          }, 
          }).then(function(isConfirm) {
              if (isConfirm) {  

          var PERIODO_POMPTUR = jQuery(".nome_periodo_"+code+"_"+data_id_div).val();  
          var ROTEIRO_POMPTUR = jQuery(".nome_roteiro_"+code+"_"+data_id_div).val();   
 
                localStorage.setItem("DATAS_POMPTUR", jQuery("#data_form_inicial_"+code+"_"+data_id_div).val()+' a '+jQuery("#data_form_"+code+"_"+data_id_div).val());
                localStorage.setItem("ROTEIRO_POMPTUR", ROTEIRO_POMPTUR);
                localStorage.setItem("PERIODO_POMPTUR", PERIODO_POMPTUR);
                localStorage.setItem("ADULTOS_POMPTUR", parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val()));
                localStorage.setItem("CRIANCAS_POMPTUR", parseInt(jQuery("#field_chd_"+code+"_"+data_id_div).val()));

                window.location = '/cotacao';
              } 
          });
    }else if (contador_tarifas == 0) { 
      swal({
              title: "Nenhuma tarifa encontrada para o período selecionado.",
              icon: "warning",
          }); 
      }else if (contador_periodos_intercalados > 0) { 
        var myhtml = document.createElement("div");
      myhtml.innerHTML = "<strong>PERÍODOS ENCONTRADOS:</strong><br>"+periodos_encontrados;  

      swal({
              title: "O seu período passa por mais de uma temporada e por isso precisará de uma cotação especial:",
              content: myhtml, 
              icon: "warning",
              buttons: {
            cancel: "Cancelar",
            confirm: "Solicitar", 
          }, 
          }).then(function(isConfirm) {
              if (isConfirm) {  

          var PERIODO_POMPTUR = jQuery(".nome_periodo_"+code+"_"+data_id_div).val();  
          var ROTEIRO_POMPTUR = jQuery(".nome_roteiro_"+code+"_"+data_id_div).val();   
 
                localStorage.setItem("DATAS_POMPTUR", jQuery("#data_form_inicial_"+code+"_"+data_id_div).val()+' a '+jQuery("#data_form_"+code+"_"+data_id_div).val());
                localStorage.setItem("ROTEIRO_POMPTUR", ROTEIRO_POMPTUR);
                localStorage.setItem("PERIODO_POMPTUR", PERIODO_POMPTUR);
                localStorage.setItem("ADULTOS_POMPTUR", parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val()));
                localStorage.setItem("CRIANCAS_POMPTUR", parseInt(jQuery("#field_chd_"+code+"_"+data_id_div).val()));

                window.location = '/cotacao';
              } 
          });
    }else if ((moment(jQuery("#data_form_inicial_"+code+"_"+data_id_div).val(), "DD/MM/YYYY") < moment(loop_data_checkin[0], "DD/MM/YYYY")) || (moment(jQuery("#data_form_"+code+"_"+data_id_div).val(), "DD/MM/YYYY") > moment(loop_data_checkout[0], "DD/MM/YYYY"))) { 
      var myhtml = document.createElement("div");
      myhtml.innerHTML = "Você pode selecionar uma data diferente do que a do período cadastrado, mas precisamos confirmar que as datas selecionadas estão disponíveis. <br><br> Deseja enviar uma cotação personalizada?";  

      swal({
              title: "O seu período selecionado tem datas diferentes:",
              content: myhtml, 
              icon: "warning",
              buttons: {
            cancel: "Cancelar",
            confirm: "Solicitar", 
          }, 
          }).then(function(isConfirm) {
              if (isConfirm) { 

                var url = window.location.href;
                var destino = url.split("/");
                destino = ucwords(destino[3].replace("-", " "));

          var PERIODO_POMPTUR = jQuery(".nome_periodo_"+code+"_"+data_id_div).val();  
          var ROTEIRO_POMPTUR = jQuery(".nome_roteiro_"+code+"_"+data_id_div).val();   

                localStorage.setItem("DESTINO_POMPTUR", destino);
                localStorage.setItem("DATAS_POMPTUR", jQuery("#data_form_inicial_"+code+"_"+data_id_div).val()+' a '+jQuery("#data_form_"+code+"_"+data_id_div).val());
                localStorage.setItem("ROTEIRO_POMPTUR", ROTEIRO_POMPTUR);
                localStorage.setItem("PERIODO_POMPTUR", PERIODO_POMPTUR);
                localStorage.setItem("ADULTOS_POMPTUR", parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val()));
                localStorage.setItem("CRIANCAS_POMPTUR", parseInt(jQuery("#field_chd_"+code+"_"+data_id_div).val()));

                window.location = '/cotacao';
              } 
          });
    }else{ 

      for (var i = 0; i < 21; i++) {
          jQuery(".div_bloco_hotelaria_"+code+"_"+i).attr("style", "display:none");
        } 
      var contador_pax = parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val())+parseInt(jQuery("#field_chd_"+code+"_"+data_id_div).val());  

      var retorno = "";

      retorno += "<input type='hidden' id='nome_hotel' value=''>";
      retorno += "<input type='hidden' id='categoria_apto' value=''>";
      retorno += "<input type='hidden' id='tipo_pacote' value=''>";
      retorno += "<input type='hidden' id='datas_periodo' value=''>";
      retorno += "<input type='hidden' id='noites_pacote' value=''>";
      retorno += "<input type='hidden' id='valor_soma_dias_select' value=0>"; 
      retorno += "<input type='hidden' id='nome_roteiro' value=''>"; 
      retorno += "<input type='hidden' id='regime_apto' value=''>";
      retorno += "<input type='hidden' id='tipo_periodo' value=''>"; 
      retorno += "<input type='hidden' id='description' value=''>";  
      retorno += "<input type='hidden' id='qtd_adt_pesquisa' value='"+jQuery("#field_adt_"+code+"_"+data_id_div).val()+"'>";  
      retorno += "<input type='hidden' id='qtd_chd_pesquisa' value='"+jQuery("#field_chd_"+code+"_"+data_id_div).val()+"'>";  
      retorno += "<input type='hidden' id='valor_taxas_total' value=''>";  

      retorno += "<input type='hidden' id='primeira_diaria' value=''>";  
      retorno += "<input type='hidden' id='segunda_diaria' value=''>";  
      retorno += "<input type='hidden' id='terceira_diaria' value=''>";  
      retorno += "<input type='hidden' id='quarta_diaria' value=''>";  
      retorno += "<input type='hidden' id='quinta_diaria' value=''>";  
      retorno += "<input type='hidden' id='sexta_diaria' value=''>";  
      retorno += "<input type='hidden' id='setima_diaria' value=''>";  
 
         
 

        for (var i = 0; i < json_quartos.length; i++) {

          var dados_quarto = json_quartos[i];  

          var soma_dias = 0;
          var valor_dia = [];
          var valores_diarias = [];

          for(var cnt_noites = 0; cnt_noites < noitesSSS; cnt_noites++){
            var day = moment(moment(jQuery("#data_form_inicial_"+code+'_'+data_id_div).val(), "DD-MM-YYYY").add(cnt_noites, 'days'), "YYYY-MM-DD HH:mm:ss").format('dddd');
            var day_formated = moment(moment(jQuery("#data_form_inicial_"+code+'_'+data_id_div).val(), "DD-MM-YYYY").add(cnt_noites, 'days'), "YYYY-MM-DD HH:mm:ss").format('DD/MM');
            if(day == "Sunday"){
              soma_dias += parseFloat(dados_quarto.valor_dom);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Domingo ("+day_formated+")</strong></div> <div class=\"col-lg-6\"></strong> "+parseFloat(dados_quarto.valor_dom).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_dom);
            }else if(day == "Monday"){
              soma_dias += parseFloat(dados_quarto.valor_seg);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Segunda ("+day_formated+") </strong></div> <div class=\"col-lg-6\">  "+parseFloat(dados_quarto.valor_seg).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_seg);
            }else if(day == "Tuesday"){
              soma_dias += parseFloat(dados_quarto.valor_ter);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Terça ("+day_formated+") </strong></div> <div class=\"col-lg-6\"> "+parseFloat(dados_quarto.valor_ter).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_ter);
            }else if(day == "Wednesday"){
              soma_dias += parseFloat(dados_quarto.valor_qua);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Quarta ("+day_formated+") </strong></div> <div class=\"col-lg-6\"> "+parseFloat(dados_quarto.valor_qua).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_qua);
            }else if(day == "Thursday"){
              soma_dias += parseFloat(dados_quarto.valor_qui);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Quinta ("+day_formated+") </strong></div> <div class=\"col-lg-6\"> "+parseFloat(dados_quarto.valor_qui).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_qui);
            }else if(day == "Friday"){
              soma_dias += parseFloat(dados_quarto.valor_sex);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Sexta ("+day_formated+") </strong></div> <div class=\"col-lg-6\"> "+parseFloat(dados_quarto.valor_sex).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_sex);
            }else if(day == "Saturday"){
              soma_dias += parseFloat(dados_quarto.valor_sab);
              valor_dia.push("<div class=\"row\"><div class=\"col-lg-6\"><strong>Sábado ("+day_formated+") </strong></div> <div class=\"col-lg-6\">  "+parseFloat(dados_quarto.valor_sab).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+"</div></div>");

              valores_diarias.push(dados_quarto.valor_sab);
            }
          }
          localStorage.setItem("VALORES_DIARIAS_"+i, valores_diarias);
          localStorage.setItem("VALOR_POR_DIA_"+i, valor_dia);
			
			var tarifa_atualizar_valor = JSON.parse(jQuery("#tarifa_atualizar_valor_"+data_id_div+"_"+code).val());
			
			  localStorage.setItem("DADOS_QUARTO_"+i, JSON.stringify(tarifa_atualizar_valor));

          if(contador_pax == dados_quarto.qtd_pax){
            var localizacao = "";
            if (dados_quarto.localizacao_hotel != null) {
              localizacao = '<h2 class="elementor-heading-title elementor-size-default" style="margin-top: 6px;font-size:13px;"> '+dados_quarto.localizacao_hotel+'</h2>';
            } 
			   
				var bloqueio = parseInt(tarifa_atualizar_valor[i].bloqueio); 

            if(dados_quarto.taxas != "" || dados_quarto.taxas != 0){
              var valor_taxas = parseInt(soma_dias)*(parseInt(dados_quarto.taxas)/100);
              var valor_total = parseInt(soma_dias)+valor_taxas;
            }else{
              var valor_taxas = 0;
              var valor_total = soma_dias;
            }
			   

            retorno += '<section class="elementor-section elementor-top-section elementor-element elementor-element-739dedd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="739dedd" data-element_type="section" style="margin-bottom"> <div class="elementor-container elementor-column-gap-default">   <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-a56b981" data-id="a56b981" data-element_type="column" style="width: 17%;"> <div class="elementor-widget-wrap elementor-element-populated" style="padding:10px 4px;"> <div class="elementor-element elementor-element-fda57c5 elementor-widget elementor-widget-image" data-id="fda57c5" data-element_type="widget" data-widget_type="image.default"> <div class="elementor-widget-container"> <div class="foto_hotel" style="background-image: url('+dados_quarto.foto_hotel+');background-color: #fff;height: 150px;background-position: center;background-repeat: no-repeat;background-size: contain;"></div> <small style="font-size: 10px;font-weight: 700;">'+(dados_quarto.distancia == null || dados_quarto.distancia == "" || dados_quarto.distancia == "null" ? "" : dados_quarto.distancia)+'</small></div> </div> </div> </div> <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-94b74d9" data-id="94b74d9" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated" style="padding:0px;"> <section class="elementor-section elementor-inner-section elementor-element elementor-element-ed40d30 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ed40d30" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-8eb33fe" data-id="8eb33fe" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated"> <div class="elementor-element elementor-element-64b43e0 elementor-widget elementor-widget-heading" data-id="64b43e0" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default"><strong>'+dados_quarto.nome_hotel+'</strong></h2>'+localizacao+'  </div> </div> <div class="elementor-element elementor-element-63c9731 elementor-widget elementor-widget-heading" data-id="63c9731" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default"><strong>'+dados_quarto.regime_apto+'</strong></h2> </div> </div> <div class="elementor-element elementor-element-6ec8aad elementor-widget elementor-widget-heading" data-id="6ec8aad" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default">'+dados_quarto.categoria_apto+'</h2> </div> </div> </div> </div> </div> </section> </div> </div> <div class="elementor-column elementor-col-30 elementor-top-column elementor-element elementor-element-b83a3f6" data-id="b83a3f6" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated" style="padding:0px;"> <section class="elementor-section elementor-inner-section elementor-element elementor-element-b62506c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b62506c" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-102ba43" data-id="102ba43" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated"> <div class="elementor-element elementor-element-813ad84 elementor-widget elementor-widget-heading" data-id="813ad84" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" id="roteiro_01-10-2022">'+jQuery("#field_adt_"+code+"_"+data_id_div).val()+' '+(jQuery("#field_adt_"+code+"_"+data_id_div).val() > 1 ? 'adultos' : 'adulto')+'</h2> </div> </div>   <div class="elementor-element elementor-element-a61d8e3 elementor-widget elementor-widget-heading" data-id="a61d8e3" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default desc_datas">'+jQuery("#data_form_inicial_"+code+'_'+data_id_div).val()+' a '+jQuery("#data_form_"+code+'_'+data_id_div).val()+' </h2> </div> </div>   <div class="elementor-element elementor-element-a61d8e3 elementor-widget elementor-widget-heading" data-id="a61d8e3" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default desc_datas">'+noitesSSS+' '+(noitesSSS > 1 ? 'noites' : 'noite')+'</h2> </div> </div> </div> </div> </div> </section> </div> </div> <div class="elementor-column elementor-col-30 elementor-top-column elementor-element elementor-element-490f7fe" data-id="490f7fe" data-element_type="column" style="width: 33%;"> <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 4px;"> <section class="elementor-section elementor-inner-section elementor-element elementor-element-44c2ad5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="44c2ad5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"> <div class="elementor-container elementor-column-gap-default">    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-f822133434e" data-id="f822133434e" data-element_type="column" style="'+(dados_quarto.lotado == 0 || dados_quarto.lotado == null ? "display:none" : '')+'"> <div class="elementor-widget-wrap elementor-element-populated"> <div class="elementor-element elementor-element-e26c72b elementor-widget elementor-widget-heading" data-id="e26c72b" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" style="text-align: center;padding: 40px 0px;font-size: 42px;font-weight: 700;color: #ff000052;letter-spacing: 5px;"><strong>LOTADO</strong></h2> </div> </div></div> </div>     <div class="elementor-column elementor-col-85 elementor-inner-column elementor-element elementor-element-f82213e" data-id="f82213e" data-element_type="column" style="'+(dados_quarto.lotado == 1 ? "display:none" : '')+'"> <div class="elementor-widget-wrap elementor-element-populated"> <div class="elementor-element elementor-element-e26c72b elementor-widget elementor-widget-heading" data-id="e26c72b" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default desc_diarias_valor" id="0_desc_diarias_valor_01-10-2022_196" style="    font-size: 13px;">'+noitesSSS+' '+(noitesSSS > 1 ? 'noites' : 'noite')+'</h2> </div> </div> <div class="elementor-element elementor-element-849a035 elementor-widget elementor-widget-heading" data-id="849a035" data-element_type="widget" data-widget_type="heading.default" style="height:30px;margin-bottom: 0 !important;"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" style="    font-size: 13px;">Tx e impostos ('+(dados_quarto.taxas == 0 || dados_quarto.taxas == "" ? "0" : dados_quarto.taxas)+'%)</h2> </div> </div>  <div class="elementor-element elementor-element-849a035 elementor-widget elementor-widget-heading" data-id="849a035" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default"><strong>TOTAL</strong></h2> </div> </div></div> </div> <div class="elementor-column elementor-col-80 elementor-inner-column elementor-element elementor-element-6252797" data-id="6252797" data-element_type="column"  style="'+(dados_quarto.lotado == 1 ? "display:none" : '')+'"> <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 6px 10px 0px;"> <div class="elementor-element elementor-element-192b0e4 elementor-widget elementor-widget-heading" data-id="192b0e4" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default" id="0_subtotal01-10-2022_196"> '+parseFloat(soma_dias).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</h2> </div> </div> <div class="elementor-element elementor-element-ced2e60 elementor-widget elementor-widget-heading" data-id="ced2e60" data-element_type="widget" data-widget_type="heading.default" style="height:30px;'+(dados_quarto.consulta == 1 ? 'margin-bottom: 0 !important;visibility:hidden' : 'margin-bottom: 0 !important;')+'"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default valor_total" id="0_taxas_01-10-2022_196"> '+(valor_taxas == 0 ? '' : parseFloat(valor_taxas).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}))+'</h2> </div> </div> <div class="elementor-element elementor-element-ced2e60 elementor-widget elementor-widget-heading" data-id="ced2e60" data-element_type="widget" data-widget_type="heading.default"> <div class="elementor-widget-container"> <h2 class="elementor-heading-title elementor-size-default valor_total" id="0_taxas_01-10-2022_196"><strong> '+(dados_quarto.consulta == 1 ? 'Sob Consulta' : parseFloat(valor_total).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}))+'</strong></h2> <button style="font-weight: 600;font-size: 8px;padding: 5px;border-radius: 4px;background-color: green;border: 1px solid green;color: #fff;margin-top:10px;text-transform: uppercase;'+(dados_quarto.consulta == 1 ? 'visibility:hidden;' : '')+'" onclick="value_per_night(\''+dados_quarto.iss+'\', \''+dados_quarto.taxas_hotel+'\', \''+dados_quarto.taxas_opcional_hotel+'\', \''+parseFloat(valor_total).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'\', \''+soma_dias+'\', \''+i+'\')">Ver detalhe</button></div> </div>  </div> </div> </div> </section> </div> </div> </div> </section>  '; 

            var button_reserve = "";
            if(dados_quarto.consulta == 1){
              var PERIODO_POMPTUR = jQuery(".nome_periodo_"+code+"_"+data_id_div).val();  
          var ROTEIRO_POMPTUR = jQuery(".nome_roteiro_"+code+"_"+data_id_div).val();   
 
                localStorage.setItem("DATAS_POMPTUR", jQuery("#data_form_inicial_"+code+"_"+data_id_div).val()+' a '+jQuery("#data_form_"+code+"_"+data_id_div).val());
                localStorage.setItem("ROTEIRO_POMPTUR", ROTEIRO_POMPTUR);
                localStorage.setItem("PERIODO_POMPTUR", PERIODO_POMPTUR);
                localStorage.setItem("ADULTOS_POMPTUR", parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val()));
                localStorage.setItem("CRIANCAS_POMPTUR", parseInt(jQuery("#field_chd_"+code+"_"+data_id_div).val()));

                button_reserve = '<a href="/cotacao" class="elementor-button-link elementor-button elementor-size-sm btn-tarifa-visualizar 0_button_send_orcamento" role="button" style="color:#fff!important;text-decoration:none!important;"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-left"> <i aria-hidden="true" class="far fa-arrow-alt-circle-right"></i> </span> <span class="elementor-button-text">Solicitar cotação</span> </span> </a>';

            }else{

                button_reserve = '<a onclick="select_payment_method(\''+dados_quarto.nome_hotel+'\', \''+dados_quarto.categoria_apto+'\', \''+dados_quarto.tipo_pacote+'\', \''+jQuery("#data_form_inicial_"+code+'_'+data_id_div).val()+' a '+jQuery("#data_form_"+code+'_'+data_id_div).val()+'\', \''+qtd_noites_calculo+'\', \''+parseInt(dados_quarto.valor_dom)+'\', \''+soma_dias+'\', \''+dados_quarto.valor_pacote_triple+'\', \''+dados_quarto.nome_roteiro+'\', \''+dados_quarto.regime_apto+'\', \''+dados_quarto.tipo_periodo+'\', \''+data_id_div+'\', \''+code+'\', \''+dados_quarto.id_hotel+'\', \''+valor_taxas+'\', \''+i+'\', \''+dados_quarto.noites_pacote+'\', \''+noitesSSS+'\', \''+i+'\')" class="elementor-button-link elementor-button elementor-size-sm btn-tarifa-visualizar 0_button_send_orcamento" role="button" style="color:#fff!important;text-decoration:none!important;"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-left"> <i aria-hidden="true" class="far fa-arrow-alt-circle-right"></i> </span> <span class="elementor-button-text">'+(json_quartos[0].tipo_tarifario == 0 ? 'Solicitar cotação' : 'Reserve agora')+'</span> </span> </a>';
            }

            retorno += '<section class="elementor-section elementor-top-section elementor-element elementor-element-2a1e0c1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2a1e0c1" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-02ac004" data-id="02ac004" data-element_type="column"> <div class="elementor-widget-wrap elementor-element-populated"> <div class="elementor-element elementor-element-6688f6d elementor-align-right elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="6688f6d" data-element_type="widget" data-widget_type="button.default"> <div class="elementor-widget-container"> <div class="elementor-button-wrapper" style="'+(dados_quarto.lotado == 1 ? "display:none" : '')+'">  <input type="hidden" id="0_tipo_tarifario_'+data_id_div+'_'+code+'" value="0"> '+button_reserve+'<br><a style="font-size:11px;cursor: pointer;" onclick="ver_termos(\''+code+'\')">Ver termos e condições</a>';
			   
			  retorno += '</div> </div> </div> </div> </div> </div> </section>';

            retorno += '<hr>'; 
          }
        }

      if(retorno == ""){ 
        retorno = "Nenhum quarto disponível para a busca informada.";
      }

      jQuery(".div_interno_tarifario_data_"+data_id_div+"_"+code).html(retorno);
      jQuery(".div_tarifario_data_"+data_id_div+"_"+code).attr("style", "");

      goToByScroll('scroll', data_id_div, code);

    }

  }
}

function ver_termos(code){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "ver_termos", code:code },
        success: function( data ) {
            var retorno = data.slice(0,-1);  

            bootbox.dialog({
          title: 'Termos e Condições',
          message: retorno
      });
        }
    });
}

function value_per_night(iss, taxas, opcionais, total, total_dias, count){
  var valor_por_dia = localStorage.getItem("VALOR_POR_DIA_"+count).split("</div>,");

  var valor = "";
  for (var i = 0; i < valor_por_dia.length; i++) {
    valor += valor_por_dia[i]+"</div>";
  }
  var retorno = "";

  retorno += valor;
  retorno += '<div class="row"><div class="col-lg-12"><hr></div></div>';
  retorno += '<div class="row"><div class="col-lg-12"><strong>Taxas e impostos</strong></div></div>';
  if(iss > 0){
    retorno += '<div class="row"><div class="col-lg-6"><strong>ISS ('+iss+'%)</strong></div> <div class="col-lg-6">'+parseFloat((total_dias*parseInt(iss)/100)).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+' </div></div>';
  }
  if(taxas > 0){
    retorno += '<div class="row"><div class="col-lg-6"><strong>Taxas ('+taxas+'%)</strong></div> <div class="col-lg-6">'+parseFloat((total_dias*parseInt(taxas)/100)).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+' </div></div>';
  }
  if(opcionais > 0){
    retorno += '<div class="row"><div class="col-lg-6"><strong>Opcionais ('+opcionais+'%)</strong></div> <div class="col-lg-6">'+parseFloat((total_dias*parseInt(opcionais)/100)).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+' </div></div>';
  }
  retorno += '<div class="row"><div class="col-lg-12"><hr></div></div>';
  retorno += '<div class="row"><div class="col-lg-6"><strong>TOTAL</strong></div> <div class="col-lg-6"> '+total+'</div></div>';

  bootbox.dialog({
      title: 'Valores por período',
      message: retorno
  });
}

function select_payment_method(nome_hotel, nome_apto, pacote, data_roteiro, noites, single, valores_diarias, triplo, nome_roteiro, regime, periodo, data, id, id_hotel, taxas, i, qtd_noites, noites_calculo, i){
  jQuery("#nome_hotel").val(nome_hotel);
  jQuery("#categoria_apto").val(nome_apto);
  jQuery("#tipo_pacote").val(pacote);
  jQuery("#tipo_periodo").val(periodo);
  jQuery("#datas_periodo").val(data_roteiro);
  jQuery("#noites_pacote").val(noites);
  jQuery("#valor_soma_dias_select").val(valores_diarias);
  jQuery("#nome_roteiro").val(nome_roteiro);
  jQuery("#regime_apto").val(regime);
  jQuery("#valor_taxas_total").val(taxas);
	
	localStorage.setItem("QUARTO_SELECTED", i);

  var valores_diarias = localStorage.getItem("VALORES_DIARIAS_"+i).split(",");

  jQuery("#primeira_diaria").val((valores_diarias[0] !== "" ? valores_diarias[0] : 0));
  jQuery("#segunda_diaria").val((valores_diarias[1] !== "" ? valores_diarias[0] : 0));
  jQuery("#terceira_diaria").val((valores_diarias[2] !== "" ? valores_diarias[0] : 0));
  jQuery("#quarta_diaria").val((valores_diarias[3] !== "" ? valores_diarias[0] : 0));
  jQuery("#quinta_diaria").val((valores_diarias[4] !== "" ? valores_diarias[0] : 0));
  jQuery("#sexta_diaria").val((valores_diarias[5] !== "" ? valores_diarias[0] : 0));
  jQuery("#setima_diaria").val((valores_diarias[6] !== "" ? valores_diarias[0] : 0));
	
if(noites_calculo >= qtd_noites){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "select_payment_method", id_hotel:id_hotel },
        success: function( data ) {
            var retorno = data.slice(0,-1);  

            bootbox.dialog({
          title: 'Selecione um método de pagamento',
          message: retorno
      });
        }
    });
}else{
	var myhtml = document.createElement("div");
      myhtml.innerHTML = "Você pode selecionar uma data diferente do que a do período cadastrado, mas precisamos confirmar que as datas selecionadas estão disponíveis. <br><br> Deseja enviar uma cotação personalizada?";  

      swal({
              title: "O seu período selecionado tem datas diferentes:",
              content: myhtml, 
              icon: "warning",
              buttons: {
            cancel: "Cancelar",
            confirm: "Solicitar", 
          }, 
          }).then(function(isConfirm) {
              if (isConfirm) {  

          var PERIODO_POMPTUR = jQuery(".nome_periodo_"+code+"_"+data_id_div).val();  
          var ROTEIRO_POMPTUR = jQuery(".nome_roteiro_"+code+"_"+data_id_div).val();   
 
                localStorage.setItem("DATAS_POMPTUR", jQuery("#data_form_inicial_"+code+"_"+data_id_div).val()+' a '+jQuery("#data_form_"+code+"_"+data_id_div).val());
                localStorage.setItem("ROTEIRO_POMPTUR", ROTEIRO_POMPTUR);
                localStorage.setItem("PERIODO_POMPTUR", PERIODO_POMPTUR);
                localStorage.setItem("ADULTOS_POMPTUR", parseInt(jQuery("#field_adt_"+code+"_"+data_id_div).val()));
                localStorage.setItem("CRIANCAS_POMPTUR", parseInt(jQuery("#field_chd_"+code+"_"+data_id_div).val()));

                window.location = '/cotacao';
              } 
          });
}
}

function set_payment_method(tipo, id_hotel){ 
	localStorage.setItem("PAYMENT_TYPE", tipo);
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "value_payment_method", tipo:tipo, id_hotel:id_hotel },
        success: function( data ) {
            var retorno = data.slice(0,-1); 
            jQuery("#show_payment_methods").html('<br><h6>Selecione uma forma para pagamento:</h6><hr>'+retorno); 
        }
    });
}

function get_payment_method(forma, methodo, id){
  var nome_hotel = jQuery("#nome_hotel").val(); 
  var nome_apto = jQuery("#categoria_apto").val(); 
  var pacote = jQuery("#tipo_pacote").val(); 
  var datas_periodo = jQuery("#datas_periodo").val();  
  var noites = jQuery("#noites_pacote").val();  
  var taxas = jQuery("#valor_taxas_total").val();
  /*
    formas:
    1. 1ª diárias + taxas
    2. 2 diarias + taxas
    3. 3 diárias + taxas
    4. todas as diárias + taxas
    5. todas as diárias + taxas em 2 parcelas
    6. todas as diárias + taxas em 3 parcelas
  */
  if(forma == 1){
    var valores_diarias = parseFloat(jQuery("#primeira_diaria").val())+parseFloat(taxas);
    var parcelas = 1;
  }else if(forma == 2){
    var valores_diarias = parseFloat(jQuery("#primeira_diaria").val())+parseFloat(jQuery("#segunda_diaria").val())+parseFloat(taxas);
    var parcelas = 1;
  }else if(forma == 3){
    var valores_diarias = parseFloat(jQuery("#primeira_diaria").val())+parseFloat(jQuery("#segunda_diaria").val())+parseFloat(jQuery("#terceira_diaria").val())+parseFloat(taxas);
    var parcelas = 1;
  }else if(forma == 4){
    var valores_diarias = parseFloat(jQuery("#valor_soma_dias_select").val())+parseFloat(taxas);
    var parcelas = 1;
  }else if(forma == 5){
    var valores_diarias = parseFloat(jQuery("#valor_soma_dias_select").val())+(parseFloat(taxas)/2); 
    var parcelas = 2;
  }else if(forma == 6){
    var valores_diarias = parseFloat(jQuery("#valor_soma_dias_select").val())+(parseFloat(taxas)/3);
    var parcelas = 3;
  } 
  var nome_roteiro = jQuery("#evento_selected").val(); 
  var regime = jQuery("#regime_apto").val(); 
  var periodo = jQuery("#tipo_periodo").val(); 
  var description = jQuery("#description").val(); 

  var qtd_adt = jQuery("#qtd_adt_pesquisa").val(); 
  var qtd_chd = jQuery("#qtd_chd_pesquisa").val(); 

  jQuery('.bootbox.modal').modal('hide')

  swal({
        title: "Aguarde!",
        text: "Estamos processando a sua solicitação. Você será redirecionado ao checkout para continuar.",
        icon: "success",
    });

    localStorage.setItem("TIPO_TARIFARIO", periodo);
    localStorage.setItem("PARCELAS_SELECT", parcelas);

    jQuery(".0_button_send_orcamento").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');

  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_roteiros", nome_roteiro:nome_roteiro, nome_hotel: nome_hotel, nome_apto: nome_apto, valores_diarias:valores_diarias, periodo:periodo },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: jQuery("#urlAjax").val()+"ajax-periodo.php",
                data: {nome_hotel:nome_hotel, nome_apto:nome_apto, nome_roteiro:nome_roteiro, pacote:pacote, datas_periodo:datas_periodo, noites:noites, valores_diarias:valores_diarias, nome_roteiro:nome_roteiro, regime:regime, periodo:periodo, description:description, methodo:methodo, qtd_adt:qtd_adt, qtd_chd:qtd_chd, forma:forma}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/finalizar-compra';
                    });
                }

            });
        }
    });
}

function show_options_conditional_payment(){
  var tipo_tarifario = localStorage.getItem("TIPO_TARIFARIO");
  var post_id = localStorage.getItem("POST_ID");

  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "show_options_conditional_payment", post_id:post_id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            var dados_metodo = JSON.parse(retorno); 
            if(dados_metodo[0] == 0){
              jQuery(".payment_method_iugu-credit-card").attr("style", "display:none");
            }else{
              
              jQuery.ajax({
              type: "POST",
              url: wp_ajax.ajaxurl,
              data: { action: "show_data_payment", post_id:post_id, tipo:1 },
              success: function( data_cartao ) {
                  var retorno_cartao = data_cartao.slice(0,-1); 
 
                  if(jQuery(".payment_options_check").length){
                 
                  }else{
                    jQuery("div.payment_box.payment_method_iugu-credit-card").prepend('<div class="payment_options_check" style="margin-bottom: 20px;">'+retorno_cartao+'</div>'); 
                  }

              }
          });
            }
            if(dados_metodo[1] == 0){
              jQuery(".payment_method_iugu-bank-slip").attr("style", "display:none");
            }
            if(dados_metodo[2] == 0){
              jQuery(".payment_method_iugu-pix").attr("style", "display:none");
            }
        }
    });
}

function change_value_order(forma){
  localStorage.setItem("FORMA_PAGAMENTO", forma); 
  var valores_diarias = [];
  for(var i = 1; i < 11; i++){
    if(localStorage.getItem("VALOR_DIARIA_"+i) != null){
        valores_diarias.push(localStorage.getItem("VALOR_DIARIA_"+i));
      }
  }
  var noites = localStorage.getItem("NOITES"); 

  jQuery.ajax({
        type: "POST",
        url: jQuery("#urlAjax").val()+"ajax-forma-pagamento.php",
        data: {forma:forma, valores_diarias:valores_diarias, noites:noites}, 
        success: function(result){ 
            jQuery.ajax({
            type: "POST",
            url: wp_ajax.ajaxurl,
            data: { action: "change_value_order" },
            success: function( data ) {
                var retorno = data.slice(0,-1);  

            }
        });
        }

    }); 
  
}

function change_set_diarias(x, data, code, nome_hotel, nome_apto, pacote, data, noites, valores_diarias, nome_roteiro, regime, periodo, qtd_quartos, valor_dia, moeda, post_id){

    localStorage.setItem("POST_ID", post_id);
    localStorage.setItem("VALOR_DIARIA_"+x, valor_dia);
    localStorage.setItem("NOITES", noites);

  var description = "";
  description += "<br><strong>QUARTO "+x+"</strong><br>";
  description += nome_hotel+'<br> Apto. '+nome_apto+'<br>';
  description += 'Regime: '+regime+'<br>';
  description += 'Diária: '+moeda+' '+valor_dia+'<br>';
  
  jQuery("#description").val(jQuery("#description").val()+''+description); 

  if(jQuery("#nome_hotel").val() != ""){
    jQuery("#nome_hotel").val(jQuery("#nome_hotel").val()+'/'+nome_hotel); 
  }else{
    jQuery("#nome_hotel").val(nome_hotel); 
  }
  if(jQuery("#categoria_apto").val() != ""){
    jQuery("#categoria_apto").val(jQuery("#categoria_apto").val()+'/'+nome_apto); 
  }else{
    jQuery("#categoria_apto").val(nome_apto); 
  }
  if(jQuery("#regime_apto").val() != ""){
    jQuery("#regime_apto").val(jQuery("#regime_apto").val()+'/'+regime); 
  }else{
    jQuery("#regime_apto").val(regime); 
  }
   
  jQuery("#tipo_pacote").val(pacote); 
  jQuery("#datas").val(data); 
  jQuery("#noites_pacote").val(noites); 
  jQuery("#valor_soma_dias_select").val(parseInt(jQuery("#valor_soma_dias_select").val())+parseInt(valores_diarias));
  jQuery("#nome_roteiro").val(nome_roteiro);  
  jQuery("#tipo_periodo").val(periodo); 
} 

function send_reserva(nome_hotel, nome_apto, pacote, data_roteiro, noites, single, valores_diarias, triplo, nome_roteiro, regime, periodo, qtd_adt, qtd_chd, data_final){ 

	var total = parseInt(valores_diarias);
	if(total == 0){
		if(parseInt(single) == 0){
			total = parseInt(triplo);
		}
		if(parseInt(triplo) == 0){
			total = parseInt(single);
		}
	}
	
	jQuery(".check_set_"+jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val()+"_"+jQuery(".numero_do_post").val()).html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');
  jQuery(".check_set_"+jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val()+"_"+jQuery(".numero_do_post").val()).attr("disabled", "disabled");
  jQuery(".check_set_"+jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val()+"_"+jQuery(".numero_do_post").val()).prop("disabled");
	
	console.log(total);
	data_roteiro = data_roteiro+' a '+data_final;
  swal({
        title: "Aguarde!",
        text: "Estamos processando a sua solicitação. Você será redirecionado ao checkout para continuar.",
        icon: "success",
    });

    localStorage.setItem("TIPO_TARIFARIO", periodo);  
	
	var roteiro_page_title = jQuery("#roteiro_buy").val();
    localStorage.setItem("ROTEIRO_PAGE_TITLE", roteiro_page_title);

  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_roteiros", nome_roteiro:jQuery("#roteiro_buy").val(), nome_hotel: nome_hotel, nome_apto: nome_apto, valores_diarias:total, periodo:periodo },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: jQuery("#urlAjax").val()+"ajax-periodo.php",
                data: {nome_hotel:nome_hotel, nome_apto:nome_apto, nome_roteiro:nome_roteiro, pacote:pacote, data_roteiro:data_roteiro, noites:noites, single:single, valores_diarias:total, triplo:triplo, nome_roteiro:nome_roteiro, regime:regime, periodo:periodo, qtd_adt:qtd_adt, qtd_chd:qtd_chd, nome_roteiro:jQuery("#roteiro_buy").val(), roteiro_page_title:roteiro_page_title}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/finalizar-compra';
                    });
                }

            });
        }
    });
}

function change_set_value(nome_hotel, nome_apto, pacote, data_roteiro, noites, single, valores_diarias, triplo, nome_roteiro, regime, periodo, qtd_adt, qtd_chd, data_final){ 
	
	localStorage.setItem("NOMEROTEIRO", jQuery("#roteiro_buy").val());
  var myhtml = document.createElement("div");
    myhtml.innerHTML = "Deseja solicitar uma cotação para o hotel selecionado?";  
	
	data_roteiro = data_roteiro+' a '+data_final;
  swal({
        title: "Solicitar cotação",
        content: myhtml, 
        icon: "warning",
        showLoaderOnConfirm: true,
        buttons: {
        cancel: "Cancelar",
        confirm: "Solicitar", 
      }, 
    }).then(function(isConfirm) {
        if (isConfirm) {  
			
			jQuery(".check_set_"+jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val()+"_"+jQuery(".numero_do_post").val()).html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');
  jQuery(".check_set_"+jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val()+"_"+jQuery(".numero_do_post").val()).attr("disabled", "disabled");
  jQuery(".check_set_"+jQuery(".data_do_post_"+jQuery(".numero_do_post").val()).val()+"_"+jQuery(".numero_do_post").val()).prop("disabled");

          jQuery(".swal-button--confirm").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');

          swal({
              title: "Aguarde!",
              text: "Estamos processando a sua solicitação. Você será redirecionado ao checkout para continuar.",
              icon: "success",
          });

      jQuery.ajax({
            type: "POST",
            url: wp_ajax.ajaxurl,
            data: { action: "send_data_roteiros", nome_roteiro:jQuery("#roteiro_buy").val(), nome_hotel: nome_hotel, nome_apto: nome_apto, valores_diarias:valores_diarias, periodo:periodo },
            success: function( data ) {
                var id = data.slice(0,-1);  
                jQuery.ajax({
                    type: "POST",
                    url: jQuery("#urlAjax").val()+"ajax-periodo.php",
                    data: {nome_hotel:nome_hotel, nome_apto:nome_apto, nome_roteiro:nome_roteiro, pacote:pacote, data_roteiro:data_roteiro, noites:noites, single:single, valores_diarias:valores_diarias, triplo:triplo, nome_roteiro:nome_roteiro, regime:regime, periodo:periodo, qtd_adt:qtd_adt, qtd_chd:qtd_chd, nome_roteiro:jQuery("#roteiro_buy").val()}, 
                    success: function(result){ 
						console.log(result.slice(0,-1));
                        jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                            window.location.href = '/finalizar-compra';
                        });
                    }

                });
            }
        });
    }
  });

}

function goToByScroll(id, data, code) {
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    jQuery('html,body').animate({
        scrollTop: jQuery(".div_tarifario_data_" + data+"_"+code).offset().top
    }, 2700);
}

function add_room(data){
  var contador = jQuery("#contador_rooms").val();

  if (contador == 4) {
    jQuery("#button_add_room_"+data).attr("style", "display:none");
  }else{
    jQuery("#button_add_room_"+data).attr("style", "");
  }

  var contador_atual = parseInt(contador)+1;

  jQuery("#div_append_quartos_"+data).append('<div class="copy_quartos'+contador_atual+'"> <div class="row" style="margin-bottom:8px"> <div class="col-lg-12 col-12 text-left"> <p style="font-size: 16px;border-bottom: 1px solid #ccc;padding-bottom: 5px;width: 100%;margin-bottom: 5px;">QUARTO '+contador_atual+' <a onclick="remove_room('+contador_atual+')" style="float: right;cursor: pointer;"><i class="fa fa-trash"></i></a></p></div></div><div class="row" style="margin-bottom:8px"> <div class="col-lg-6 col-6 text-left"> <strong style="font-size:14px;">Adultos</strong> </div><div class="col-lg-6 col-6 text-right"> <div class="qty_adt'+contador_atual+'" style="float:right"> <span class="minus_adt'+contador_atual+' bg-dark">-</span> <input type="number" class="count_adt'+contador_atual+'" name="qty_adt'+contador_atual+'" value="2"> <span class="plus_adt'+contador_atual+' bg-dark">+</span> </div></div></div><div class="row rowchd'+contador_atual+'" style="margin-bottom:8px"> <div class="col-lg-6 col-6 text-left"> <strong style="font-size:14px;">Crianças</strong> </div><div class="col-lg-6 col-6 text-right"> <div class="qty_chd'+contador_atual+'" style="float:right"> <span id="minus_chd'+contador_atual+'_'+data+'" class="minus_chd'+contador_atual+' bg-dark"  style="cursor:no-drop;">-</span> <input type="number" id="count_chd'+contador_atual+'_'+data+'" class="count_chd'+contador_atual+'" name="qty_chd'+contador_atual+'" value="1" disabled> <span id="plus_chd'+contador_atual+'_'+data+'" class="plus_chd'+contador_atual+' bg-dark" style="cursor:no-drop;">+</span> </div></div></div><div class="row idade_chd'+contador_atual+'" id="idade_chd'+contador_atual+'" style="padding: 6px 0px;"> <div class="col-lg-6 col-6 text-left"> <strong style="font-size:12px;">Idade da criança</strong> </div><div class="col-lg-6 col-6 text-right"> <select id="idd_chd'+contador_atual+'_'+data+'" class="form-control" style="font-size:12px;width: 62%;float: right;"> <option value="0" disabled selected>Idade</option> <option value="00">Até 1 ano</option> <option value="01">1 ano</option> <option value="02">2 anos</option> <option value="03">3 anos</option> <option value="04">4 anos</option> <option value="05">5 anos</option> <option value="06">6 anos</option> <option value="07">7 anos</option> <option value="08">8 anos</option> <option value="09">9 anos</option> <option value="10">10 anos</option> <option value="11">11 anos</option> <option value="12">12 anos</option> </select> </div></div> </div>');

  jQuery("#contador_rooms").val(contador_atual);
}

function remove_room(key){
  jQuery(".copy_quartos"+key).remove();

  var contador = jQuery("#contador_rooms").val();

  var contador_atual = parseInt(contador)-1;
  jQuery("#contador_rooms").val(contador_atual);
}

function set_value(code){
  var data_selecionada = jQuery("#data_form_inicial_"+code).val(); 
  var data_selecionada_periodo = jQuery("#data_form_"+code).val();

  jQuery("#data_final_periodo_selecionado").val(data_selecionada_periodo);
  jQuery("#data_inicial_periodo_selecionado").val(data_selecionada);
  jQuery("#data_selecionada").val(data_selecionada+' - '+data_selecionada_periodo);
  jQuery("#data_form_"+code).val(data_selecionada_periodo);
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

function send_orcamento(id, data, code){ 
  jQuery("."+id+"_button_send_orcamento_"+data).html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 91px;">');

  var tipo_tarifario = jQuery("#"+id+"_tipo_tarifario_"+data+"_"+code).val();

  localStorage.setItem("TIPO_TARIFARIO", tipo_tarifario);

  var nome_roteiro = jQuery("."+id+"_nome_roteiro_orcamento_"+data+"_"+code).val();

  var nome_hotel = jQuery("."+id+"_nome_hotel_orcamento_"+data+"_"+code).val();
  var nome_regime = jQuery("."+id+"_nome_regime_orcamento_"+data+"_"+code).val();
  var nome_apto = jQuery("."+id+"_nome_apto_orcamento_"+data+"_"+code).val();

  var nome_pacote = jQuery("."+id+"_nome_pacote_orcamento_"+data+"_"+code).val();
  var nome_descritivo = jQuery("."+id+"_nome_descritivo_orcamento_"+data).val();
  var nome_datas = jQuery("."+id+"_nome_datas_orcamento_"+data+"_"+code).val();
  var nome_diarias = jQuery("."+id+"_nome_diarias_orcamento_"+data+"_"+code).val();
  var qtd_diarias = jQuery("."+id+"_qtd_diarias_unit_"+data).val();

  var valor_subtotal = jQuery("#"+id+"_valor_subtotal_"+data+"_"+code).val();
  var valor_taxas = jQuery("#"+id+"_valor_taxas_"+data).val();
  var valor_noites_extras = jQuery("#"+id+"_valor_extra_"+data).val();
  var valor_total = jQuery("#"+id+"_valor_total_"+data).val();
  var valor_diaria = jQuery("#"+id+"_valor_diaria"+data).val();
  var valores_diarias = jQuery("#"+id+"_valores_diarias_"+data).val();

  var valor_total_nao_formatado = jQuery("#"+id+"_valor_total_nao_formatado_"+data+"_"+code).val();
  var total_pax = jQuery("#"+id+"_total_pax_"+data).val(); 

  //descritivo
  var total_noites_adt = localStorage.getItem("TOTAL_NOITES_ADT_"+id+"_"+code); 
  var valor_total_noites_adt = localStorage.getItem("VALOR_TOTAL_NOITES_ADT_"+id+"_"+code); 
  var total_noites_chd = localStorage.getItem("TOTAL_NOITES_CHD_"+id+"_"+code); 
  var valor_total_noites_chd = localStorage.getItem("VALOR_TOTAL_NOITES_CHD_"+id+"_"+code); 

  var total_noites_extras_adt = localStorage.getItem("TOTAL_NOITES_EXTRAS_ADT_"+id+"_"+code); 
  var valor_total_noites_extras_adt = localStorage.getItem("VALOR_TOTAL_NOITES_EXTRAS_ADT_"+id+"_"+code); 
  var total_noites_extras_chd = localStorage.getItem("TOTAL_NOITES_EXTRAS_CHD_"+id+"_"+code); 
  var valor_total_noites_extras_chd = localStorage.getItem("VALOR_TOTAL_NOITES_EXTRAS_CHD_"+id+"_"+code); 

  var total_chd = localStorage.getItem("TOTAL_CHD_"+id+"_"+code); 

  var taxas = localStorage.getItem("VALOR_TAXAS_"+id+"_"+code); 

  var valor_total = localStorage.getItem("VALOR_TOTAL_"+id+"_"+code); 

  var qtd_adt = jQuery("#field_adt_"+code+"_"+data).val();
  var qtd_chd = jQuery("#field_chd_"+code+"_"+data).val(); 

  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_roteiros", nome_roteiro:nome_roteiro, nome_hotel: nome_hotel, nome_apto: nome_apto, valor_total_nao_formatado: valor_total_nao_formatado, valor_diaria:valor_diaria, valores_diarias:valor_total_nao_formatado },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: jQuery("#urlAjax").val()+"ajax-periodo.php",
                data: {nome_hotel:nome_hotel, nome_apto:nome_apto, nome_regime:nome_regime, nome_pacote:nome_pacote, nome_descritivo:nome_descritivo, nome_datas:nome_datas, nome_diarias:nome_diarias, tipo_tarifario:tipo_tarifario, total_noites_adt:total_noites_adt, valor_total_noites_adt:valor_total_noites_adt, total_noites_chd:total_noites_chd, valor_total_noites_chd:valor_total_noites_chd, total_noites_extras_adt:total_noites_extras_adt, valor_total_noites_extras_adt:valor_total_noites_extras_adt, total_noites_extras_chd:total_noites_extras_chd, valor_total_noites_extras_chd:valor_total_noites_extras_chd, taxas:taxas, valor_total:valor_total, total_chd:total_chd, qtd_adt: qtd_adt, qtd_chd: qtd_chd}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/checkout-page';
                    });
                }

            });
        }
    });
 
}

function check_value_adt(code, data){
  var adt = jQuery("#field_adt_"+code+"_"+data).val();
  if (adt > 3) {
    jQuery("#field_adt_"+code+"_"+data).val(3);
  }
  if (adt == 1) {
    jQuery("#field_chd_"+code+"_"+data).val(0);
    jQuery("#field_idade_"+code+"_"+data).attr("disabled", "disabled");
    jQuery("#field_idade_"+code+"_"+data).prop("disabled", true);
  }
}

function check_value_chd(code, data){
  var adt = jQuery("#field_adt_"+code+"_"+data).val();
  var chd = jQuery("#field_chd_"+code+"_"+data).val();
	console.log(chd);
	if (chd > 1) {
    jQuery("#field_chd_"+code+"_"+data).val(1);
  }
  if (adt > 1) { 
    jQuery("#field_idade_"+code+"_"+data).removeAttr("disabled");
    if (chd == 0) {
      jQuery("#field_idade_"+code+"_"+data).attr("disabled", "disabled");
      jQuery("#field_idade_"+code+"_"+data).prop("disabled", true);
    }else{
      jQuery("#field_idade_"+code+"_"+data).removeAttr("disabled");
    }
  }else{
    jQuery("#field_chd_"+code+"_"+data).val(0);
    jQuery("#field_idade_"+code+"_"+data).attr("disabled", "disabled");
    jQuery("#field_idade_"+code+"_"+data).prop("disabled", true);
  }

}

function check_value_qts(code){
  var adt = jQuery("#field_quartos_"+code).val();
  if (adt > 1) {
    jQuery("#field_quartos_"+code).val(1);
  }
  jQuery("#qtd_quartos_"+code).val(adt);
}

function open_box_formulario(data){
  jQuery("#bloco_form_data_"+data).toggle(750);
}

function list_categories_posts(){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_categories_posts" },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#category_name").html(retorno); 

            //preenche_select_apto(id, i);
        }
    });
}

function list_posts(){
  var category = jQuery("#category_name").val();
  var checkin = jQuery("#field_checkin").val();
  var checkout = jQuery("#field_Checkout").val();
  window.location.href = '/destinos/?category_name'+category+'&checkin='+checkin+'&checkout='+checkout;
}

function submit_form_revenda() {
    var name = jQuery("#field_nome").val();
    var email = jQuery("#field_email").val();

    if (name === "") {
        swal({
            title: "O campo nome não pode ser vazio.",
            icon: "error",
        });
    } else if (email === "") {
        swal({
            title: "O campo e-mail não pode ser vazio.",
            icon: "error",
        });
    } else if (!isValidEmailAddress(email)) {
        swal({
            title: "Preencha o campo e-mail com um valor válido.",
            icon: "error",
        });
    } else {
        var token = "MTY0NjYyO0RUTWJESlp0cTdIV3M5RXpEU0VMdzY0UWs3cXVteGtLR0d2VXA5RGtRQjRy";

        var settings = {
            async: true,
            crossDomain: true,
            url: "https://api.traveltec.com.br/serv/marketing/cadastro_revenda",
            method: "POST",
            headers: {
                token: token,
                name: name,
                email: email,
                "cache-control": "no-cache",
            },
        };

        $.ajax(settings).done(function (response) {
            swal({
                text: "Contato cadastrado com sucesso.",
                icon: "success",
            });

            jQuery("#field_nome").val("");
            jQuery("#field_email").val("");
        });
    }
}

function set_cotacao_aereo(){
  jQuery(".button-form-aereo button").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 26px;">');

  var tipo_tarifario = 0;

  var nome_produto = 'Passagem Aérea - '+jQuery("#field_Origem").val()+' a '+jQuery("#field_Destino").val()+' - '+(jQuery("#field_tipo").val() == 1 ? 'Somente Ida' : 'Ida e volta');
  var valor_produto = "0.00"; 
  
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_produto", nome_produto:nome_produto, valor_produto: valor_produto },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: jQuery("#urlAjax").val()+"ajax-periodo-aereo.php",
                data: {local: jQuery("#field_Origem").val()+' a '+jQuery("#field_Destino").val(), tipo: jQuery("#field_tipo").val(), data1: jQuery("#field_DataDesembarque").val(), data2: jQuery("#field_DataEmbarque").val(), pax: jQuery("#field_pessoas").val(), classe: jQuery("#field_Classe").val(), tipo_tarifario:tipo_tarifario}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/checkout-page';
                    });
                }

            });
        }
    });
}
function set_cotacao_hotel(){
  jQuery(".button-form-hospedagem button").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 15px;">');

  var tipo_tarifario = 0;

  var nome_produto = 'Hospedagem - '+jQuery("#field_destino").val();
  var valor_produto = "0.00"; 
  
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_produto", nome_produto:nome_produto, valor_produto: valor_produto },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: "/wp-content/plugins/tarifario-tec/includes/ajax-periodo-hotel.php",
                data: {local: jQuery("#field_destino").val(), data1: jQuery("#field_checkin").val(), data2: jQuery("#field_checkout").val(), pax: jQuery("#field_pessoas").val(), quartos: jQuery("#field_quartos").val(), tipo_tarifario:tipo_tarifario}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/checkout-page';
                    });
                }

            });
        }
    });
}
function set_cotacao_veiculos(){
  jQuery(".button-form-veiculos button").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 26px;">');

  var tipo_tarifario = 0;

  var nome_produto = 'Veículos - '+jQuery("#field_retirada").val();
  var valor_produto = "0.00"; 

  var devolucao = 0;
  if (jQuery("input[name='field_outrolugar']").is(':checked') == true) {
    devolucao = 1;
  }
  
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_produto", nome_produto:nome_produto, valor_produto: valor_produto },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: "/wp-content/plugins/tarifario-tec/includes/ajax-periodo-veiculos.php",
                data: {local: jQuery("#field_retirada").val(), data1: jQuery("#field_retirar").val(), data2: jQuery("#field_entrega").val(), devolucao: devolucao, local_devolver: jQuery("#field_devolver").val(), tipo_tarifario:tipo_tarifario}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/checkout-page';
                    });
                }

            });
        }
    });
}
function set_cotacao_seguro(){
  jQuery(".cotar-seguro button").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 26px;">');

  var tipo_tarifario = 0;

  var nome_produto = 'Seguro Viagem - '+jQuery("#field_Destino").val();
  var valor_produto = "0.00"; 
 
  
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_produto", nome_produto:nome_produto, valor_produto: valor_produto },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: "/wp-content/plugins/tarifario-tec/includes/ajax-periodo-seguro.php",
                data: {local: jQuery("#field_Destino").val(), data1: jQuery("#field_ida").val(), data2: jQuery("#field_volta").val(), pax: jQuery("#field_passageiros").val(), tipo_tarifario:tipo_tarifario}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/checkout-page';
                    });
                }

            });
        }
    });
}
function set_cotacao_hotel(){
  jQuery(".elementor-button-link").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 26px;">');
  
  var url_atual = window.location;
  url_atual = url_atual.pathname.split("/");

  var tipo_tarifario = 0;

  var nome_produto = 'Hotel - '+url_atual[2].replace(/-/g, " ").toLowerCase().replace(/\b[a-z]/g, function(letter) {
      return letter.toUpperCase();
  });
  var valor_produto = "0.00";  
  
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "send_data_produto", nome_produto:nome_produto, valor_produto: valor_produto },
        success: function( data ) {
            var id = data.slice(0,-1); 
            jQuery.ajax({
                type: "POST",
                url: "/wp-content/plugins/tarifario-tec/includes/ajax-periodo-hotelaria.php",
                data: {local: nome_produto, tipo_tarifario:tipo_tarifario}, 
                success: function(result){ 
                    jQuery.get('/?add-to-cart=' + id +'&quantity=1', function(response) { 
                        window.location.href = '/checkout-page';
                    });
                }

            });
        }
    });
}

function send_data_news(){
  var nome = jQuery("#form-field-nome_news").val();
  var email = jQuery("#form-field-email_news").val();
  var whatsapp = jQuery("#form-field-whatsapp_news").val();

  if (nome == '') {
    swal({
            title: "É necessário informar o nome.",
            icon: "warning",
        }); 
  }else if (email == '') {
    swal({
            title: "É necessário informar o e-mail.",
            icon: "warning",
        }); 
  }else if (!isValidEmailAddress(email)) {
    swal({
            title: "É necessário informar um e-mail válido.",
            icon: "warning",
        }); 
  }else if (whatsapp == '') {
    swal({
            title: "É necessário informar um número de whatsapp.",
            icon: "warning",
        }); 
  }else{
    setTimeout( function() { 

          jQuery(".elementor-message-success").attr("style", "display:none"); 

      }, 1000 );
    jQuery.ajax({
          type: "POST",
          url: "/wp-content/plugins/tarifario-tec/includes/send_data_news.php",
          data: {nome:nome, email:email, whatsapp:whatsapp}, 
          success: function(result){ 
            jQuery("#form-field-nome_news").val('');
            jQuery("#form-field-email_news").val('');
            jQuery("#form-field-whatsapp_news").val('');

              if (result == "1") { 
                  swal({
                      title: "Agradecemos o contato!",
                      text: "Sua mensagem foi enviada com sucesso e em breve retornaremos.",
                      icon: "success"
                  }).then((value) => {
              window.location.reload();
          });

              }else{ 
                  swal({
                      title: "Erro ao enviar contato",
                      text: "Sua mensagem não pode ser enviada. Tente novamente mais tarde.",
                      icon: "success"
                  }).then((value) => {
              window.location.reload();
          });
              }
          }

      });
  }

}
function see_tarifas_inicial(code, data){  

  var date = new Date();
  var currentMonth = date.getMonth();
  var currentDate = date.getDate();
  var currentYear = date.getFullYear();
  var add_days = parseInt(jQuery(".noites_pacote"+code.replace("/", "-").replace("/", "-")).val())+1;

  var tipo_periodo = jQuery(".tipo_periodo_"+code.replace("/", "-").replace("/", "-")+'_'+data).val();

  var agrupamento_datas_iniciais = JSON.parse(jQuery(".agrupamento_datas_iniciais_"+code+"_"+data).val());  
  var agrupamento_datas_finais = JSON.parse(jQuery(".agrupamento_datas_finais_"+code+"_"+data).val());   
  var agrupamento_datas_periodos = JSON.parse(jQuery(".agrupamento_datas_periodos_"+code+"_"+data).val());  

  var datasiniciaiscalendario = JSON.parse(jQuery(".datas_iniciais_calendario_"+code+"_"+data).val());   
  var datasfinaiscalendario = JSON.parse(jQuery(".datas_finais_calendario_"+code+"_"+data).val());   
  var datasperiodoscalendario = JSON.parse(jQuery(".datas_periodos_calendario_"+code+"_"+data).val());   

  var startdate = currentDate+'/'+currentMonth+'/'+currentYear; 

  if(tipo_periodo == 1){ 

    jQuery('#field_checkout_'+code+'_'+data).daterangepicker({ 

      singleDatePicker: true,
      isInvalidDate: function(date) {
        var mes_comparacao = moment(date.format('MM/YYYY'));

              var dateRanges = [
                  { 'start': moment('2021-10-10'), 'end': moment('2021-10-15') }  
              ]; 
            var someObj = []; 
            
    
        if (datasiniciaiscalendario.length > 1) { 
 
          for (var x = 0; x < datasperiodoscalendario.length; x++) {

            var data_inicio_agrupamento = datasiniciaiscalendario[x];
            var data_final_agrupamento = datasfinaiscalendario[x]; 

            var d1 = data_inicio_agrupamento.split("/");
            var d2 = data_final_agrupamento.split("/"); 
            var d1_start = moment(d1[2]+"-"+d1[1]+"-"+d1[0]);
            var d1_end = moment(d2[2]+"-"+d2[1]+"-"+d2[0]);
            
            if (datasperiodoscalendario[x].indexOf("Feriado") >= 0) {

              var innerObj = {};
              
              innerObj["start"] = d1_start;
              innerObj["end"] = d1_end;
              someObj.push(innerObj);  

            } 

          }

        } 

              return someObj.reduce(function(bool, range) {
                  return bool || (date >= range.start && date <= range.end);
              }, false);
          },
      showDropdowns: true,
      autoApply: true,
      minDate: jQuery("#data_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),   
      maxDate: jQuery(".data_max_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),  
          locale: {
              format: 'DD/MM/YYYY',
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "De",
            "toLabel": "Até",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
          }
    }, function(start, end, label) {
      jQuery("#data_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(start.format('DD/MM/YYYY')); 
    });
    
    jQuery('#field_checkin_'+code+'_'+data).daterangepicker({ 

      singleDatePicker: true,
      isInvalidDate: function(date) {
        var mes_comparacao = moment(date.format('MM/YYYY'));

              var dateRanges = [
                  { 'start': moment('2021-10-10'), 'end': moment('2021-10-15') }  
              ]; 
            var someObj = []; 
            
    
        if (datasiniciaiscalendario.length > 1) { 
 
          for (var x = 0; x < datasperiodoscalendario.length; x++) {

            var data_inicio_agrupamento = datasiniciaiscalendario[x];
            var data_final_agrupamento = datasfinaiscalendario[x]; 

            var d1 = data_inicio_agrupamento.split("/");
            var d2 = data_final_agrupamento.split("/"); 
            var d1_start = moment(d1[2]+"-"+d1[1]+"-"+d1[0]);
            var d1_end = moment(d2[2]+"-"+d2[1]+"-"+d2[0]);
            
            if (datasperiodoscalendario[x] == 0) {

              var innerObj = {};
              
              innerObj["start"] = d1_start;
              innerObj["end"] = d1_end;
              someObj.push(innerObj);  

            } 

          }

        } 

              return someObj.reduce(function(bool, range) {
                  return bool || (date >= range.start && date <= range.end);
              }, false);
          },
      showDropdowns: true,
      autoApply: true,
      minDate: jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),  
      maxDate: jQuery(".data_max_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),     
            locale: {
                format: 'DD/MM/YYYY',
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Até",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sáb"
        ],
        "monthNames": [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
            }
    }, function(start, end, label) {
      jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(start.format('DD/MM/YYYY'));  
        jQuery('#field_checkout_'+code+'_'+data).daterangepicker({ 

        singleDatePicker: true,
      isInvalidDate: function(date) {
        var mes_comparacao = moment(date.format('MM/YYYY'));

              var dateRanges = [
                  { 'start': moment('2021-10-10'), 'end': moment('2021-10-15') }  
              ]; 
            var someObj = []; 
            
    
        if (datasiniciaiscalendario.length > 1) { 
 
          for (var x = 0; x < datasperiodoscalendario.length; x++) {

            var data_inicio_agrupamento = datasiniciaiscalendario[x];
            var data_final_agrupamento = datasfinaiscalendario[x]; 

            var d1 = data_inicio_agrupamento.split("/");
            var d2 = data_final_agrupamento.split("/"); 
            var d1_start = moment(d1[2]+"-"+d1[1]+"-"+d1[0]);
            var d1_end = moment(d2[2]+"-"+d2[1]+"-"+d2[0]);
            
            if (datasperiodoscalendario[x].indexOf("Feriado") >= 0) {

              var innerObj = {};
              
              innerObj["start"] = d1_start;
              innerObj["end"] = d1_end;
              someObj.push(innerObj);  

            } 

          }

        } 

              return someObj.reduce(function(bool, range) {
                  return bool || (date >= range.start && date <= range.end);
              }, false);
          },
        showDropdowns: true,
        autoApply: true,
        startDate: jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),   
        minDate: jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),   
        maxDate: jQuery(".data_max_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),     
              locale: {
                  format: 'DD/MM/YYYY',
          "applyLabel": "Aplicar",
          "cancelLabel": "Cancelar",
          "fromLabel": "De",
          "toLabel": "Até",
          "customRangeLabel": "Custom",
          "daysOfWeek": [
              "Dom",
              "Seg",
              "Ter",
              "Qua",
              "Qui",
              "Sex",
              "Sáb"
          ],
          "monthNames": [
              "Janeiro",
              "Fevereiro",
              "Março",
              "Abril",
              "Maio",
              "Junho",
              "Julho",
              "Agosto",
              "Setembro",
              "Outubro",
              "Novembro",
              "Dezembro"
          ],
              }
      }, function(start, end, label) {
        jQuery("#data_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(start.format('DD/MM/YYYY')); 
      });  
    }); 
  }else{ 
    jQuery('#field_checkout_'+code+'_'+data).daterangepicker({ 

      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      startDate: jQuery("#data_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),   
      minDate: jQuery("#data_form_today_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),  
            locale: {
                format: 'DD/MM/YYYY',
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Até",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sáb"
        ],
        "monthNames": [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
            }
    }, function(start, end, label) {
      jQuery("#data_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(start.format('DD/MM/YYYY')); 
    });

    jQuery('#field_checkin_'+code+'_'+data).daterangepicker({ 

      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      startDate: jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),  
      minDate: jQuery("#data_form_today_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),  
            locale: {
                format: 'DD/MM/YYYY',
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Até",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sáb"
        ],
        "monthNames": [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
            }
    }, function(start, end, label) {
      jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(start.format('DD/MM/YYYY'));  
        jQuery('#field_checkout_'+code+'_'+data).daterangepicker({ 

        singleDatePicker: true,
        showDropdowns: true,
        autoApply: true,
        startDate: jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),   
        minDate: jQuery("#data_form_inicial_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(),  
              locale: {
                  format: 'DD/MM/YYYY',
          "applyLabel": "Aplicar",
          "cancelLabel": "Cancelar",
          "fromLabel": "De",
          "toLabel": "Até",
          "customRangeLabel": "Custom",
          "daysOfWeek": [
              "Dom",
              "Seg",
              "Ter",
              "Qua",
              "Qui",
              "Sex",
              "Sáb"
          ],
          "monthNames": [
              "Janeiro",
              "Fevereiro",
              "Março",
              "Abril",
              "Maio",
              "Junho",
              "Julho",
              "Agosto",
              "Setembro",
              "Outubro",
              "Novembro",
              "Dezembro"
          ],
              }
      }, function(start, end, label) {
        jQuery("#data_form_"+code.replace("/", "-").replace("/", "-")+'_'+data).val(start.format('DD/MM/YYYY')); 
      });  
    }); 
  }

  
 

  jQuery('#field_checkin_'+code+'_'+data).on('cancel.daterangepicker', function(ev, picker) {
      jQuery(this).val('');
  });
}
function see_tarifas(code, data){   
	console.log(data);
  jQuery("."+code+"_bloco_tarifas").slideToggle(550);
  jQuery("."+code+"_bloco_tarifas_tarifario").attr("style", "display:none");

  var date = new Date();
  var currentMonth = date.getMonth();
  var currentDate = date.getDate();
  var currentYear = date.getFullYear();
  var add_days = parseInt(jQuery(".noites_pacote"+code.replace("/", "-").replace("/", "-")).val())+1;

  
}

function set_value_nacionais(){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "set_value_nacionais" },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#destinos_nacionais").html(retorno); 

            //preenche_select_apto(id, i);
        }
    });
}
function set_value_internacionais(){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "set_value_internacionais" },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#destinos_internacionais").html(retorno); 

            //preenche_select_apto(id, i);
        }
    });
}
function set_value_hospedagem(){
  jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "set_value_hospedagem" },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#hospedagens").html(retorno); 

            //preenche_select_apto(id, i);
        }
    });
}

function get_value_nacional(){
  window.location.href = jQuery("#destinos_nacionais").val();
}
function get_value_internacional(){
  window.location.href = jQuery("#destinos_internacionais").val();
}
function get_value_hospedagens(){
  window.location.href = jQuery("#hospedagens").val();
}



function see_tarifa_periodo(code, data){
  jQuery(".div_bloco_hotelaria_"+code+"_0").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_1").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_2").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_3").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_4").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_5").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_6").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_7").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_8").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_9").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_10").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_11").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_12").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_13").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_14").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_15").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_16").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_17").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_18").attr("style", "display:none");
  jQuery(".div_bloco_hotelaria_"+code+"_19").attr("style", "display:none");

    for (var i = 0; i < 21; i++) { 
        jQuery(".search_tarifas_"+i).attr("style", "display:none");
    }
  jQuery(".form_tarifario_"+code+"_"+data).toggle(500);
	
	jQuery('#field_checkin_'+code+'_'+data).daterangepicker({ 

    singleDatePicker: true,
    showDropdowns: true,
    autoApply: true,
    startDate: data,   
    minDate: data,  
          locale: {
              format: 'DD/MM/YYYY',
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "fromLabel": "De",
      "toLabel": "Até",
      "customRangeLabel": "Custom",
      "daysOfWeek": [
          "Dom",
          "Seg",
          "Ter",
          "Qua",
          "Qui",
          "Sex",
          "Sáb"
      ],
      "monthNames": [
          "Janeiro",
          "Fevereiro",
          "Março",
          "Abril",
          "Maio",
          "Junho",
          "Julho",
          "Agosto",
          "Setembro",
          "Outubro",
          "Novembro",
          "Dezembro"
      ],
          }
  }, function(start, end, label) {
    jQuery("#data_form_"+code+"_"+data).val(start.format('DD/MM/YYYY')); 
  });  
 
  jQuery('#field_checkin_'+code+'_'+data).on('cancel.daterangepicker', function(ev, picker) {
      jQuery(this).val('');
  });
}

function show_dados_cotacao(){ 
  var datas = localStorage.getItem("DATAS_POMPTUR"); 
  var periodo = localStorage.getItem("PERIODO_POMPTUR"); 
  var roteiro = localStorage.getItem("ROTEIRO_POMPTUR"); 
  var adultos = localStorage.getItem("ADULTOS_POMPTUR"); 
  var criancas = localStorage.getItem("CRIANCAS_POMPTUR"); 
  var idade = localStorage.getItem("IDADE_POMPTUR"); 
  if (idade == "00") {
    idade = "até 1 ano";
  }else if (idade == "01") {
    idade = "1 ano";
  }else if (idade == "02") {
    idade = "2 anos";
  }else if (idade == "03") {
    idade = "3 anos";
  }else if (idade == "04") {
    idade = "4 anos";
  }else if (idade == "05") {
    idade = "5 anos";
  }else if (idade == "06") {
    idade = "6 anos";
  }else if (idade == "07") {
    idade = "7 anos";
  }else if (idade == "08") {
    idade = "8 anos";
  }else if (idade == "09") {
    idade = "9 anos";
  }else if (idade == "10") {
    idade = "10 anos";
  }else if (idade == "11") {
    idade = "11 anos";
  }else if (idade == "12") {
    idade = "12 anos";
  }

  var html = '';

  var html_criancas = '';
  if (criancas > 0) {
        if (criancas == 1) {
            html_criancas = ' e '+criancas+' criança';
        }else{
            html_criancas = ' e '+criancas+' crianças';
        } 
    }else{
        html_criancas = '';
    }
 
  html += '<p style="margin-bottom:0"><strong>Dados solicitados:</strong><br>';  
  html += '<strong>Evento:</strong> '+roteiro+'<br>';
  html += '<strong>Período:</strong> '+periodo+'<br>';
  html += '<strong>Datas selecionadas:</strong> '+datas+'<br>';
  html += '<strong>Pax:</strong> '+adultos+' '+(adultos > 0 ? 'adultos' : 'adulto')+''+html_criancas+'<br><br>Informe seus dados de contato para receber sua cotação ou entrar na lista de espera do hotel:</p>';

  jQuery("#dados_solicitacao").html('<div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e94adde" data-id="e94adde" data-element_type="column"><div class="elementor-widget-wrap" style="padding: 15px">'+html+'</div></div></div>');

}

function send_cotacao_email(){ 

  jQuery(".elementor-button-link").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 22px;margin-right: 0;padding: 0px 10px;">');
  jQuery(".elementor-button-link").attr("disabled", "disabled");
  jQuery(".elementor-button-link").prop("disabled");
 
  jQuery(".elementor-button-link").on("click", false);

  var datas = localStorage.getItem("DATAS_POMPTUR"); 
  var periodo = localStorage.getItem("PERIODO_POMPTUR"); 
  var roteiro = localStorage.getItem("ROTEIRO_POMPTUR"); 
  var adultos = localStorage.getItem("ADULTOS_POMPTUR"); 
  var criancas = localStorage.getItem("CRIANCAS_POMPTUR"); 
  var idade = localStorage.getItem("IDADE_POMPTUR"); 

  var nome = jQuery("#form-field-name").val();
  var email = jQuery("#form-field-email").val();
  var telefone = jQuery("#form-field-field_344be72").val(); 
  var mensagem = jQuery("#form-field-message").val();

  if (nome === "") {
        swal({
            title: "O campo nome não pode ser vazio.",
            icon: "error",
        });
        jQuery(".elementor-button-link").html('SOLICITAR COTAÇÃO');
        jQuery(".elementor-button-link").removeAttr("disabled");

        jQuery(".elementor-button-link").off("click");
    } else if (email === "") {
        swal({
            title: "O campo e-mail não pode ser vazio.",
            icon: "error",
        });
        jQuery(".elementor-button-link").html('SOLICITAR COTAÇÃO');
        jQuery(".elementor-button-link").removeAttr("disabled");

        jQuery(".elementor-button-link").off("click");
    } else if (!isValidEmailAddress(email)) {
        swal({
            title: "Preencha o campo e-mail com um valor válido.",
            icon: "error",
        });
        jQuery(".elementor-button-link").html('SOLICITAR COTAÇÃO');
        jQuery(".elementor-button-link").removeAttr("disabled");

        jQuery(".elementor-button-link").off("click");
    } else if (telefone === "") {
        swal({
            title: "O campo telefone não pode ser vazio.",
            icon: "error",
        });
        jQuery(".elementor-button-link").html('SOLICITAR COTAÇÃO');
        jQuery(".elementor-button-link").removeAttr("disabled");

        jQuery(".elementor-button-link").off("click");
    } else {
      if (idade == "00") {
    idade = "até 1 ano";
  }else if (idade == "01") {
    idade = "1 ano";
  }else if (idade == "02") {
    idade = "2 anos";
  }else if (idade == "03") {
    idade = "3 anos";
  }else if (idade == "04") {
    idade = "4 anos";
  }else if (idade == "05") {
    idade = "5 anos";
  }else if (idade == "06") {
    idade = "6 anos";
  }else if (idade == "07") {
    idade = "7 anos";
  }else if (idade == "08") {
    idade = "8 anos";
  }else if (idade == "09") {
    idade = "9 anos";
  }else if (idade == "10") {
    idade = "10 anos";
  }else if (idade == "11") {
    idade = "11 anos";
  }else if (idade == "12") {
    idade = "12 anos";
  }

  var html = '';

  var html_criancas = '';
  if (criancas > 0) {
        if (criancas == 1) {
            html_criancas = ' e '+criancas+' criança';
        }else{
            html_criancas = ' e '+criancas+' crianças';
        } 
    }else{
        html_criancas = '';
    }
  
  html += '<strong>Evento:</strong> '+roteiro+'<br>';
  html += '<strong>Período:</strong> '+periodo+'<br>';
  html += '<strong>Datas selecionadas:</strong> '+datas+'<br>';
  html += '<strong>Pax:</strong> '+adultos+' '+(adultos > 0 ? 'adultos' : 'adulto')+''+html_criancas;

      jQuery.ajax({
          type: "POST",
          url: wp_ajax.ajaxurl,
          data: { action: "send_mail", periodo:periodo, datas:datas, roteiro:roteiro, adultos:adultos, criancas:criancas, idade:idade, nome:nome, email:email, telefone:telefone, mensagem:mensagem, html:html },
          success: function( data ) {   
              swal({
                title: "Solicitação enviada com sucesso!",
                  text: "Aguarde, em breve entraremos em contato.",
                  icon: "success" 
                }).then((value) => {
            window.location.href = '/';
        });
          }
      });

    }
}