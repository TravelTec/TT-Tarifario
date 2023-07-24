jQuery(document).ready(function($){ 

    $("#button_save_roteiro").html("<button class='btn btn-primary' onclick='save_dados_roteiro(0)' style='float:right;font-size: 12px;text-transform: uppercase;font-weight: 600;letter-spacing: 1px;'>Salvar roteiro</button>");
    $(".tarifario .cx-settings__content").attr("style", "display:block !important");

    function getSearchParams(k){
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}

    var id = getSearchParams("post"); 
    var type = getSearchParams("post_type"); 
    list_tarifas_loop(id); 
	
	var pathname = window.location.search;  
	if(pathname.indexOf("&action=edit") != -1){
		setInterval(function()
		{	
			if($('#hold_remove_tarifa1').length > 0 ){
				save_dados_roteiro(2, 1); 
			}

		}, 300000)

	}
    list_termos_gerais(id);
    $("#slug").attr("disabled", "disabled");
    $("#slug").prop("disabled");

    $(".interface-interface-skeleton__content").attr("style", "overflow-x:hidden !important");

    $("#roteiros").addClass("show");
    $("#tarifario").removeClass("show");
    $("#acomodacoes2").removeClass("show"); 
    $("#informacoes").removeClass("show"); 
    $('.cx-component__button').removeClass("active");
    $('.cx-component__button[data-content-id="#roteiros"]').addClass("active");
    $('.cx-component__button[data-content-id="roteiros"]').addClass("active");

    $('.cx-component__button[data-content-id="#roteiros"]').attr("onclick", "change_tab(1)");
    $('.cx-component__button[data-content-id="#tarifario"]').attr("onclick", "change_tab(2)");
    $('.cx-component__button[data-content-id="#acomodacoes2"]').attr("onclick", "change_tab(3)");
    $('.cx-component__button[data-content-id="#informacoes"]').attr("onclick", "change_tab(4)");

    $("#hoteisdiv").attr("style", "display:none");
    $("#aptosdiv").attr("style", "display:none");
    $("#regimediv").attr("style", "display:none");
    $(".cx-control__description").attr("style", "display:none");

    $('#pacote-0').attr("onclick", "change_type_pacote(0)");
    $('#pacote-1').attr("onclick", "change_type_pacote(1)");

    $('.cx-control[data-control-name="valor_taxa"] .cx-control__info').attr("style", "padding-top: 5px;"); 
    $('.cx-control[data-control-name="dias"]').attr("style", "max-width: 16% !important;flex: 0 0 17% !important;"); 
    $('.cx-control[data-control-name="noites"]').attr("style", "max-width: 16% !important;flex: 0 0 17% !important;"); 
    $('.cx-control[data-control-name="tipo_roteiro"] .cx-control__info').attr("style", "margin-right:-37px;padding-top: 5px;"); 
    $('.cx-control[data-control-name="tipo_roteiro"] .cx-control__content').attr("style", "padding-top: 5px;"); 
    $('.cx-control[data-control-name="pacote"] .cx-control__info').attr("style", "margin-right:-37px;padding-top: 5px;flex: 0 1 42%;"); 
    $('.cx-control[data-control-name="pacote"] .cx-control__content').attr("style", "padding-top: 5px;"); 
    $('.cx-control[data-control-name="pacote"]').attr("style", "max-width: 50% !important;flex: 0 0 50% !important;"); 
    $('.cx-control[data-control-name="dias"] .cx-control__info').attr("style", "padding-top: 5px;"); 
    $('.cx-control[data-control-name="noites"] .cx-control__info').attr("style", "padding-top: 5px;"); 
    $('.cx-control[data-control-name="nome"] .cx-control__info').attr("style", "flex: 0 0 10% !important;padding-top: 5px;");  
    $('.cx-control[data-control-name="metodos-de-pagamento"] .cx-ui-control-container').attr("style", "display: flex;");  
    $('.cx-control[data-control-name="metodos-de-pagamento"] .cx-control__info').attr("style", "padding-top: 5px;"); 
    $('.cx-checkbox-item-wrap').attr("style", "width: 25%;flex: 0 0 25%;");  
    $('.cx-checkbox-label').attr("style", "padding-top: 5px;");  
 
    $(".cx-radio-group").attr("style", "display:flex; margin-right: -65%;");
    $(".cx-radio-item").attr("style", "margin-right: 10px;");
    $('.cx-control[data-control-name="nome_tarifario_ptt"]').attr("style", "display:none;"); 
    $('.cx-control[data-control-name="acomodacoes-repeater"]').attr("style", "display:none;"); 
    $("#valor_single, #valor_duplo, #valor_triplo, #valor_crianca1, #valor_crianca2, #valor_bebe, #valor_single_extra, #valor_duplo_extra, #valor_triplo_extra, #valor_chd1_extra, #valor_chd2_extra, #valor_bebe_extra").addClass("money");

    $(".tarifario").html('<div class="cx-ui-kit__content cx-settings__content" role="group" id="tarifario"> <div id="repeater_div_tarifario_tarifa" style="padding-bottom: 10px;margin-bottom: 10px;"><div class="container holder_tarifa" style=""><div class="row" style=""><div class="" style=" border-bottom: 3px solid #eee;padding: 12px;width: 100%;"><button type="button" class="button add_attribute" style="float: right;" onclick="adicionar_novo_tarifario_tarifa()">Adicionar tarifário</button></div></div> <div class="row repeater_tarifario" style="padding: 11px 10px;"><h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;width: 100%;margin-bottom: 12px;">Novo tarifário </h4><div class="" data-control-name="nome_tarifario" style="width: 46%;margin-right: 4%;display: flex;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Nome</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="nome_tarifario" class="widefat cx-ui-text" name="nome_tarifario2500" value="" placeholder="" autocomplete="off"></div></div></div><div class="" data-control-name="tipo_tarifario" style="width: 50%;display: flex;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" id="tipo_tarifario-0" class="cx-radio-input" name="tipo_tarifario2500" value="0"><label for="tipo_tarifario-0" style="margin-right:4%"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Cotação</span></label> <input type="radio" id="tipo_tarifario-1" class="cx-radio-input" name="tipo_tarifario2500" value="1"><label for="tipo_tarifario-1"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Reserva</span></label> </div><div class="clear"></div></div></div></div></div><div class="" data-control-name="moeda" style="width: 25%;margin-right: 4%;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Moeda</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><div class="cx-ui-select-wrapper"><select id="moeda" class="cx-ui-select" name="moeda2500" size="1" data-filter="false" data-placeholder="" style="width: 100%"> <option value="" selected="">Selecione...</option> <option value="R$">R$ - Real</option><option value="AU$">AU$ - Dólar australiano</option><option value="GBP">GBP - Libra esterlina</option><option value="$">$ - Dólar canadense</option><option value="USD">USD - Dólar americano</option><option value="EUR">EUR - Euro</option></select></div></div></div></div><div class="" data-control-name="data_inicial" style="margin-right: 4%;width: 30%;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data Inicial</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_inicial2500" class="widefat cx-ui-text" name="data_inicial2500" value="" placeholder="" autocomplete="off"></div></div></div><div class="" data-control-name="data_final" style="width: 30%;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data final</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_final2500" class="widefat cx-ui-text" name="data_final2500" value="" placeholder="" autocomplete="off"></div></div></div> <div class="" data-control-name="tipo_periodo" style="width: 50%;display: flex;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo do período</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" id="tipo_periodo-0" class="cx-radio-input" name="tipo_periodo2500" value="0"><label for="tipo_periodo-0" style="margin-right:4%"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Especial</span></label> <input type="radio" id="tipo_periodo-1" class="cx-radio-input" name="tipo_periodo2500" value="1"><label for="tipo_periodo-1"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Regular</span></label> </div><div class="clear"></div></div></div></div></div> </div>  </div></div> <div class="container listing_blocos_tarifas_cadastrados" style="margin-bottom:5px;"><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde... Carregando tarifários.</div><div style="width:100%"><button class=\'btn btn-primary\' onclick=\'save_dados_roteiro(1)\' style=\'float:right;font-size: 12px;text-transform: uppercase;font-weight: 600;letter-spacing: 1px;margin-right: 10px;margin-left: 10px;margin-bottom: 20px;\'>Salvar tarifário</button></div></div> '); 
    $(".tarifario").append('<script type="text/html" id="tmpl-wc-add-tarifario-row" > <div class="row repeater_tarifario" id="holder_remover_tarifario{{(data.key)}}" style="margin-top: 18px;border-top: 1px dashed #eee;padding: 11px 10px;"><h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;width: 100%;margin-bottom: 12px;">Novo tarifário <a onclick="remove_div_tarifario_tarifa(\'{{(data.key)}}\')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a></h4><div class="" data-control-name="nome_tarifario" style="width: 46%;margin-right: 4%;display: flex;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Nome</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="nome_tarifario" class="widefat cx-ui-text" name="nome_tarifario{{(data.key)}}" value="" placeholder="" autocomplete="off"></div></div></div><div class="" style="width: 50%;display: flex;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" class="cx-radio-input" id="tipo_tarifario-{{(data.key)}}a" name="tipo_tarifario{{(data.key)}}" value="0"><label style="margin-right:4%" for="tipo_tarifario-{{(data.key)}}a"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Cotação</span></label> <input type="radio" class="cx-radio-input" id="tipo_tarifario-{{(data.key)}}b" name="tipo_tarifario{{(data.key)}}" value="1"><label for="tipo_tarifario-{{(data.key)}}b"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Reserva</span></label> </div><div class="clear"></div></div></div></div></div><div class="" data-control-name="moeda" style="width: 25%;margin-right: 4%;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Moeda</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><div class="cx-ui-select-wrapper"><select id="moeda" class="cx-ui-select" name="moeda{{(data.key)}}" size="1" data-filter="false" data-placeholder="" style="width: 100%"> <option value="" selected="">Selecione...</option> <option value="R$">R$ - Real</option><option value="AU$">AU$ - Dólar australiano</option><option value="GBP">GBP - Libra esterlina</option><option value="$">$ - Dólar canadense</option><option value="USD">USD - Dólar americano</option><option value="EUR">EUR - Euro</option></select></div></div></div></div><div class="" data-control-name="data_inicial" style="margin-right: 4%;width: 30%;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data Inicial</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_inicial{{(data.key)}}" class="widefat cx-ui-text" name="data_inicial{{(data.key)}}" value="" placeholder="" autocomplete="off"></div></div></div><div class="" data-control-name="data_final" style="width: 30%;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data final</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_final{{(data.key)}}" class="widefat cx-ui-text" name="data_final{{(data.key)}}" value="" placeholder="" autocomplete="off"></div></div></div> <div class="" data-control-name="tipo_periodo{{(data.key)}}" style="width: 50%;display: flex;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo do período</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" class="cx-radio-input" name="tipo_periodo{{(data.key)}}" id="tipo_periodo-{{(data.key)}}a" value="0"><label for="tipo_periodo-{{(data.key)}}a" style="margin-right:4%"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Especial</span></label> <input type="radio" class="cx-radio-input" name="tipo_periodo{{(data.key)}}" id="tipo_periodo-{{(data.key)}}b" value="1"><label for="tipo_periodo-{{(data.key)}}b"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Regular</span></label> </div><div class="clear"></div></div></div></div></div> </div> </script>')

    $(".acomodacoes2").addClass("holder_div_tarifario");
    $(".acomodacoes2").html('<div class="cx-ui-kit__content cx-settings__content" role="group" id="acomodacoes2"> <div id="repeater_div_tarifario" style="padding-bottom: 10px;margin-bottom: 10px;"><div class="container holder" style=""><div class="row" style=""><div class="" style=" border-bottom: 3px solid #eee;padding: 12px;width: 100%;"> <input type="hidden" id="type_pacote" value=""> <button type="button" class="button add_attribute" style="float: right;" onclick="adicionar_novo_tarifario()">Adicionar acomodação</button></div></div>  <div class="repeater_tarifa" id="hold_remove_tarifa2500"> <div class="row" style="padding-top: 10px"> <div class="col-12" style="padding: 0px 10px;"> <h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;">Nova acomodação </h4> </div></div><div class="row" style="padding-top: 10px"> <div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Tarifário</span></label> </div><div class="col-4"> <select name="tarifario_option2500" id="tarifario_option2500" class="cx-ui-select"> <option value="" selected>Selecione...</option> </select> </div><div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Regime</span></label> </div><div class="col-4"> <select name="regime_roteiro2500" id="regime_roteiro2500" class="cx-ui-select"> <option value="" selected>Selecione...</option> </select> </div></div><div class="row" style="padding-top: 10px"> <div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Hotel</span></label> </div><div class="col-4"> <select name="hotel_roteiro2500" id="hotel_roteiro2500" class="cx-ui-select" onchange="alter_apto_hotel(\'2500\')"> <option value="" selected>Selecione...</option> </select> </div><div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Apartamento</span></label> </div><div class="col-4"> <select name="apto_roteiro2500" id="apto_roteiro2500" class="cx-ui-select" disabled> <option value="" selected>Selecione um hotel</option> </select> <div class="" id="loading2500" style="display: none;padding: 6px 10px; 0px;"> <span><small><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde...</small></span> </div></div></div>   <div class="row divdiarias" style="padding: 10px 0px">  <div class="col-2" style="padding: 5px 10px;">Distância </div>     <div class="col-4"> <input type="text" class="cx-ui-text" id="distancia2500" name="distancia2500"  style="font-size: 13px;width:100%;width:100%"> </div>    <div class="col-2" style="padding: 6px 10px"> <input type="checkbox" name="lotado2500" id="lotado2500" onchange=""> Lotado</div>    <div class="col-2" style="padding: 6px 10px"> <input type="checkbox" name="consulta2500" id="consulta2500" onchange=""> Sob Consulta</div>     </div>    <div class="row divdiarias" style="padding-top: 10px">  <div class="col-2" style="padding: 5px 10px;">Min. Diárias</div>     <div class="col-2"> <input type="number" class="cx-ui-text" id="min_diarias2500" name="min_diarias2500"  style="font-size: 13px;width:100%;width:100%"> </div>    <div class="col-1 text-center" style="padding: 5px 10px;">Pax</div>     <div class="col-2"> <input type="number" class="cx-ui-text" id="pax2500" name="pax2500"  style="font-size: 13px;width:100%;width:100%"> </div>   <div class="col-2 text-center" style="padding: 5px 10px;">Bloqueio</div>     <div class="col-2"> <input type="number" class="cx-ui-text" id="bloqueio2500" name="bloqueio2500"  style="font-size: 13px;width:100%;width:100%"> </div>   </div>    <div class="row divpacote" style="padding-top: 20px">  <div class="col-12" style="padding: 5px 10px;"> Valores do pacote</div>     <div class="col-2 " id="div_valor_pacote_single2500" style="padding:10px"> <label>Single</label><input type="text" class="cx-ui-text money" id="valor_pacote_single2500" name="valor_pacote_single2500" autocomplete="off" style="font-size: 13px;width:100%" placeholder="0,00"> </div>   <div class="col-2 " id="div_valor_pacote_double2500" style="padding:10px"> <label>Double</label><input type="text" class="cx-ui-text money" id="valor_pacote_double2500" name="valor_pacote_double2500" autocomplete="off" style="font-size: 13px;width:100%" placeholder="0,00"> </div>   <div class="col-2 " id="div_valor_pacote_triple2500" style="padding:10px"> <label>Triple</label><input type="text" class="cx-ui-text money" id="valor_pacote_triple2500" name="valor_pacote_triple2500" autocomplete="off" style="font-size: 13px;width:100%" placeholder="0,00"> </div> </div> <div class="row divdiarias">  <div class="col-2  col_valor_padrao2500" style="padding:10px"><input type="checkbox" name="check_valor_padrao2500" id="check_valor_padrao2500" onchange="toggle_field_valor_padrao(\'2500\')"> Valor padrão</div>     <div class="col-2 " id="div_valor_padrao2500" style="display:none"> <input type="text" class="cx-ui-text money" id="valor_padrao2500" name="valor_padrao2500"  style="font-size: 13px;width:100%" onchange="change_value_padrao_fields(\'2500\')" placeholder="0,00"> </div>    <div class="col-12 " style="padding: 0px"> <table id="valor_diarias2500" style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;"> <thead> <th style="padding: 16px 10px;">Dom</th> <th style=";text-align: left">Seg</th> <th style="text-align: left;">Ter</th> <th style="text-align: left;">Qua</th> <th style=";text-align: left">Qui</th> <th style="text-align: left;">Sex</th> <th style="text-align: left;">Sab</th> </thead> <tbody> <tr style="border: 1px solid #bdbdbd;"> <td style="padding: 8px 12px;"><input type="text" name="valor_dom2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"> </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_seg2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_ter2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_qua2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_qui2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_sex2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_sab2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td></tr></tbody> </table> </div>  <div class="col-2 col_noite_extra2500" style="padding:10px"><input type="checkbox" name="check_noite_extra2500" id="check_noite_extra2500" onchange="toggle_field_noite_extra(\'2500\')"> Noite extra</div> <table style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;display:none" id="table_noite_extra2500"> <thead> <th style="padding: 16px 10px;">Dom</th> <th style=";text-align: left">Seg</th> <th style="text-align: left;">Ter</th> <th style="text-align: left;">Qua</th> <th style=";text-align: left">Qui</th> <th style="text-align: left;">Sex</th> <th style="text-align: left;">Sab</th> </thead> <tbody> <tr style="border: 1px solid #bdbdbd;"> <td style="padding: 8px 12px;"><input type="text" name="valor_extra_dom2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"> </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_seg2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_ter2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_qua2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_qui2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_sex2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_sab2500" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td></tr> </tbody> </table> <div class="col-12 " style="padding: 10px;"><input type="checkbox" name="check_permite_crianca2500" id="check_permite_crianca2500" onchange="toggle_field_crianca(\'2500\')" /> Permitir crianças</div> <div class="col-2" id="div_crianca12500" style="display: none;"> <label>Criança 1</label><br> <input type="text" class="cx-ui-text money" id="crianca12500" name="crianca12500" style="font-size: 13px; width: 100%;" placeholder="0,00" /> </div> <div class="col-2" id="div_crianca22500" style="display: none;"> <label>Criança 2</label><br> <input type="text" class="cx-ui-text money" id="crianca22500" name="crianca22500" style="font-size: 13px; width: 100%;" placeholder="0,00" /> </div> <div class="col-2" id="div_crianca32500" style="display: none;"> <label>Bebê</label><br> <input type="text" class="cx-ui-text money" id="crianca32500" name="crianca32500" style="font-size: 13px; width: 100%;" placeholder="0,00" /> </div></div></div></div> <div class="listing_blocos_cadastrados" style="margin-bottom:5px;margin-top: 20px;"><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde... Carregando acomodações.</div> <button id="save_acomodations" class=\'btn btn-primary\' onclick=\'save_dados_roteiro(2)\' style=\'float:right;font-size: 12px;text-transform: uppercase;font-weight: 600;letter-spacing: 1px;margin-right: 11px;\'>Salvar acomodações</button></div> </div>  '); 

    $(".acomodacoes2").append('<script type="text/html" id="tmpl-wc-add-tarifa-row" > <div class="repeater_tarifa" id="hold_remove_tarifa{{(data.key)}}" style="margin-top: 18px;border-top: 1px dashed #eee;padding-top: 10px;">  <div class="row" style="padding-top: 10px"> <div class="col-12" style="padding: 0px 10px;"> <h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;">Nova acomodação </h4> </div></div><div class="row" style="padding-top: 10px"> <div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Tarifário</span></label> </div><div class="col-4"> <select name="tarifario_option{{(data.key)}}" id="tarifario_option{{(data.key)}}" class="cx-ui-select"> <option value="" selected>Selecione...</option> </select> </div><div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Regime</span></label> </div><div class="col-4"> <select name="regime_roteiro{{(data.key)}}" id="regime_roteiro{{(data.key)}}" class="cx-ui-select"> <option value="" selected>Selecione...</option> </select> </div></div><div class="row" style="padding-top: 10px"> <div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Hotel</span></label> </div><div class="col-4"> <select name="hotel_roteiro{{(data.key)}}" id="hotel_roteiro{{(data.key)}}" class="cx-ui-select" onchange="alter_apto_hotel(\'{{(data.key)}}\')"> <option value="" selected>Selecione...</option> </select> </div><div class="col-2" style="padding: 6px 10px;"> <label><span style="color:#555">Apartamento</span></label> </div><div class="col-4"> <select name="apto_roteiro{{(data.key)}}" id="apto_roteiro{{(data.key)}}" class="cx-ui-select" disabled> <option value="" selected>Selecione um hotel</option> </select> <div class="" id="loading{{(data.key)}}" style="display: none;padding: 6px 10px; 0px;"> <span><small><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde...</small></span> </div></div></div>   <div class="row divdiarias" style="padding: 10px 0px">  <div class="col-2" style="padding: 5px 10px;">Distância </div>     <div class="col-4" style="padding: 6px 10px"> <input type="text" class="cx-ui-text" id="distancia{{(data.key)}}" name="distancia{{(data.key)}}"  style="font-size: 13px;width:100%;width:100%"> </div>    <div class="col-4"> <input type="checkbox" name="lotado{{(data.key)}}" id="lotado{{(data.key)}}"> Lotado </div>   <div class="col-4"> <input type="checkbox" name="consulta{{(data.key)}}" id="consulta{{(data.key)}}"> Sob Consulta </div>       <div class="col-2" style="padding: 6px 10px"> <input type="checkbox" name="consulta{{(data.key)}}" id="consulta{{(data.key)}}" onchange=""> Sob Consulta</div>     </div>     <div class="row divdiarias" style="padding-top: 10px">  <div class="col-2" style="padding: 5px 10px;">Min. Diárias</div>     <div class="col-2"> <input type="number" class="cx-ui-text" id="min_diarias{{(data.key)}}" name="min_diarias{{(data.key)}}"  style="font-size: 13px;width:100%;width:100%"> </div>    <div class="col-1 text-center" style="padding: 5px 10px;">Pax</div>     <div class="col-2"> <input type="number" class="cx-ui-text" id="pax{{(data.key)}}" name="pax{{(data.key)}}"  style="font-size: 13px;width:100%;width:100%"> </div>   <div class="col-2 text-center" style="padding: 5px 10px;">Bloqueio</div>     <div class="col-2"> <input type="number" class="cx-ui-text" id="bloqueio{{(data.key)}}" name="bloqueio{{(data.key)}}"  style="font-size: 13px;width:100%;width:100%"> </div>   </div>    <div class="row divpacote" style="padding-top: 20px">  <div class="col-12" style="padding: 5px 10px;"> Valores do pacote</div>    <div class="col-2 " id="div_valor_pacote_single{{(data.key)}}" style="padding:10px">  <label>Single</label> <input type="text" class="cx-ui-text money" id="valor_pacote_single{{(data.key)}}" name="valor_pacote_single{{(data.key)}}"  autocomplete="off" style="font-size: 13px;width:100%" placeholder="0,00"> </div>   <div class="col-2 " id="div_valor_pacote_double{{(data.key)}}" style="padding:10px"><label>Double</label> <input type="text" class="cx-ui-text money" id="valor_pacote_double{{(data.key)}}" name="valor_pacote_double{{(data.key)}}"  autocomplete="off" style="font-size: 13px;width:100%" placeholder="0,00"> </div>    <div class="col-2 " id="div_valor_pacote_triple{{(data.key)}}" style="padding:10px"> <label>Triple</label> <input type="text" class="cx-ui-text money" id="valor_pacote_triple{{(data.key)}}" name="valor_pacote_triple{{(data.key)}}"  autocomplete="off" style="font-size: 13px;width:100%" placeholder="0,00"> </div> </div> <div class="row divdiarias">  <div class="col-2  col_valor_padrao{{(data.key)}}" style="padding:10px"><input type="checkbox" name="check_valor_padrao{{(data.key)}}" id="check_valor_padrao{{(data.key)}}" onchange="toggle_field_valor_padrao(\'{{(data.key)}}\')"> Valor padrão</div>     <div class="col-2 " id="div_valor_padrao{{(data.key)}}" style="display:none"> <input type="text" class="cx-ui-text money" id="valor_padrao{{(data.key)}}" name="valor_padrao{{(data.key)}}"  style="font-size: 13px;width:100%" onchange="change_value_padrao_fields(\'{{(data.key)}}\')" placeholder="0,00"> </div>    <div class="col-12 " style="padding: 0px"> <table id="valor_diarias{{(data.key)}}" style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;"> <thead> <th style="padding: 16px 10px;">Dom</th> <th style=";text-align: left">Seg</th> <th style="text-align: left;">Ter</th> <th style="text-align: left;">Qua</th> <th style=";text-align: left">Qui</th> <th style="text-align: left;">Sex</th> <th style="text-align: left;">Sab</th> </thead> <tbody> <tr style="border: 1px solid #bdbdbd;"> <td style="padding: 8px 12px;"><input type="text" name="valor_dom{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"> </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_seg{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_ter{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_qua{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_qui{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_sex{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_sab{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" onclick="this.value=\'0,00\'"></td></tr></tbody> </table> </div>  <div class="col-2 col_noite_extra{{(data.key)}}" style="padding:10px"><input type="checkbox" name="check_noite_extra{{(data.key)}}" id="check_noite_extra{{(data.key)}}" onchange="toggle_field_noite_extra(\'{{(data.key)}}\')"> Noite extra</div> <table style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;display:none" id="table_noite_extra{{(data.key)}}"> <thead> <th style="padding: 16px 10px;">Dom</th> <th style=";text-align: left">Seg</th> <th style="text-align: left;">Ter</th> <th style="text-align: left;">Qua</th> <th style=";text-align: left">Qui</th> <th style="text-align: left;">Sex</th> <th style="text-align: left;">Sab</th> </thead> <tbody> <tr style="border: 1px solid #bdbdbd;"> <td style="padding: 8px 12px;"><input type="text" name="valor_extra_dom{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"> </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_seg{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_ter{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_qua{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_qui{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_sex{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_extra_sab{{(data.key)}}" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" onclick="this.value=\'0,00\'"></td></tr> </tbody> </table>  <div class="col-12 " style="padding: 10px;"><input type="checkbox" name="check_permite_crianca{{(data.key)}}" id="check_permite_crianca{{(data.key)}}" onchange="toggle_field_crianca(\'{{(data.key)}}\')" /> Permitir crianças</div> <div class="col-2" id="div_crianca1{{(data.key)}}" style="display: none;"> <label>Criança 1</label><br> <input type="text" class="cx-ui-text money" id="crianca1{{(data.key)}}" name="crianca1{{(data.key)}}" style="font-size: 13px; width: 100%;" placeholder="0,00" /> </div> <div class="col-2" id="div_crianca2{{(data.key)}}" style="display: none;"> <label>Criança 2</label><br> <input type="text" class="cx-ui-text money" id="crianca2{{(data.key)}}" name="crianca2{{(data.key)}}" style="font-size: 13px; width: 100%;" placeholder="0,00" /> </div> <div class="col-2" id="div_crianca3{{(data.key)}}" style="display: none;"> <label>Bebê</label><br> <input type="text" class="cx-ui-text money" id="crianca3{{(data.key)}}" name="crianca3{{(data.key)}}" style="font-size: 13px; width: 100%;" placeholder="0,00" /> </div> </div></div></div> </script>')

    $('.money').mask('00.000.000,00', {
        reverse: true
    });

    jQuery(function($){
        $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});
 
    $('#data_inicial2500')
    .datepicker({
      language: 'pt-BR',
      locale: 'pt-BR',
      minDate: new Date(),
      autoClose: true,
      dateFormat: 'dd/mm/yy',
        onSelect: function (selectedDate) {
            //Limpamos a segunda data, para evitar problemas do usuário ficar trocando a data do primeiro datepicker e acabar burlando as regras definidas.
            $.datepicker._clearDate($("#data_final2500"));
            //Aqui está a "jogada" para somar os 7 dias para o próximo datepicker.
            var data = $.datepicker.parseDate('dd/mm/yy', selectedDate); 
            $("#data_final2500").datepicker("option", "minDate", data); //Aplica a data
        }
    });
    $('#data_final2500')
    .datepicker({
      language: 'pt-BR', 
      autoClose: true,
      dateFormat: 'dd/mm/yy',
    });

    

    

    $(".idade").mask("00/00");
    $(".idade").mask("00/00");
    $(".dias").mask("00");

    

});

window.setInterval(function(){ 
    if(localStorage.getItem("TIPOPACOTE") == 0){
        jQuery(".divdiarias").attr("style", "visibility:hidden;height:0px");
        jQuery(".divpacote").attr("style", "padding-top: 10px");
    }else{
        jQuery(".divpacote").attr("style", "visibility:hidden;height:0px");
        jQuery(".divdiarias").attr("style", "padding-top: 10px");
    }
}, 1500);

function change_type_pacote(type){
    jQuery("#type_pacote").val(type);
    localStorage.setItem("TIPOPACOTE", type);
}

function toggle_field_valor_padrao(id){
    jQuery("#div_valor_padrao"+id).toggle(500);
}

function toggle_field_noite_extra(id){
    jQuery("#table_noite_extra"+id).toggle(500);
}

function toggle_field_crianca(id){
    jQuery("#div_crianca1"+id).toggle(500);
    jQuery("#div_crianca2"+id).toggle(500);
    jQuery("#div_crianca3"+id).toggle(500);
}

function toggle_field_valor_pacote(id){
    jQuery("#div_valor_pacote_single"+id).toggle(500);
    jQuery("#div_valor_pacote_double"+id).toggle(500);
    jQuery("#div_valor_pacote_triple"+id).toggle(500);
    jQuery("#valor_diarias"+id).toggle(500);
    jQuery(".col_valor_padrao"+id).toggle(500);
    jQuery(".col_noite_extra"+id).toggle(500);
    if(jQuery("#check_valor_pacote"+id).is(':checked')){
        jQuery("#check_valor_padrao"+id).attr("disabled", "disabled");
        jQuery("#check_valor_padrao"+id).prop("disabled"); 
        jQuery("#check_noite_extra"+id).attr("disabled", "disabled");
        jQuery("#check_noite_extra"+id).prop("disabled"); 
    }else{
        jQuery("#check_valor_padrao"+id).removeAttr("disabled"); 
        jQuery("#check_noite_extra"+id).removeAttr("disabled"); 
    }
}

function change_value_padrao_fields(id){
    var valor = jQuery("#valor_padrao"+id).val();
    jQuery("input[name=valor_dom"+id+"]").val(valor);
    jQuery("input[name=valor_seg"+id+"]").val(valor);
    jQuery("input[name=valor_ter"+id+"]").val(valor);
    jQuery("input[name=valor_qua"+id+"]").val(valor);
    jQuery("input[name=valor_qui"+id+"]").val(valor);
    jQuery("input[name=valor_sex"+id+"]").val(valor);
    jQuery("input[name=valor_sab"+id+"]").val(valor);
}

jQuery('.money').mask('00.000.000,00', {
        reverse: true
    });

function change_tab(tab){
    jQuery('.cx-component__button').removeClass("active");
    if(tab == 1){
        jQuery('.cx-component__button[data-content-id="#roteiros"]').addClass("active");
        jQuery("#roteiros").addClass("show");
        jQuery("#tarifario").removeClass("show");
        jQuery("#acomodacoes2").removeClass("show"); 
        jQuery("#informacoes").removeClass("show"); 
    }else if(tab == 2){
        jQuery('.cx-component__button[data-content-id="#tarifario"]').addClass("active");
        jQuery("#roteiros").removeClass("show");
        jQuery("#tarifario").addClass("show");
        jQuery("#acomodacoes2").removeClass("show"); 
        jQuery("#informacoes").removeClass("show"); 
    }else if(tab == 3){
        jQuery('.cx-component__button[data-content-id="#acomodacoes2"]').addClass("active");
        jQuery("#roteiros").removeClass("show");
        jQuery("#tarifario").removeClass("show");
        jQuery("#acomodacoes2").addClass("show"); 
        jQuery("#informacoes").removeClass("show"); 
    }else if(tab == 4){
        jQuery('.cx-component__button[data-content-id="#informacoes"]').addClass("active");
        jQuery("#roteiros").removeClass("show");
        jQuery("#tarifario").removeClass("show");
        jQuery("#acomodacoes2").removeClass("show"); 
        jQuery("#informacoes").addClass("show"); 
    }
}



function atualiza_dados_hotel(key){
    var valor_hotel = jQuery("#hotel_roteiro"+key).val(); 
    var valor_apto = jQuery("#id_apto_roteiro"+key).val(); 

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "edit_apto_hotel", valor_hotel: valor_hotel, valor_apto: valor_apto },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#apto_roteiro"+key).html(retorno);
        }
    });
}

function preenche_select_hotel(id, i){  

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_hotel", id:id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#hotel_roteiro"+i).html(retorno); 

            //preenche_select_apto(id, i);
        }
    });
} 

function preenche_select_tarifario(id, i){ 

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_tarifario", id:id, i:i },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#tarifario_option"+i).html(retorno); 
        }
    });
}

function preenche_select_regime(id, i){ 

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_regime", id:id, i:i },
        success: function( data ) {
            var retorno = data.slice(0,-1); 

            jQuery("#regime_roteiro"+i).html(retorno); 
        }
    });
}


function alter_apto_hotel(contador){
    var valor_hotel = jQuery("#hotel_roteiro"+contador).val();
    jQuery("#loading"+contador).attr("style", "padding:10px 0px");
 
    jQuery("#apto").prop("disabled");
    jQuery("#apto").attr("disabled", "disabled");

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_apto_hotel", valor_hotel: valor_hotel },
        success: function( data ) {
            var retorno = data.slice(0,-1);
            jQuery("#loading"+contador).attr("style", "display:none;padding:10px 0px");

            jQuery("#apto_roteiro"+contador).html(retorno);
            jQuery("#apto_roteiro"+contador).removeAttr("disabled"); 
        }
    });
}

function list_tarifarios_loop(id){

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_tarifarios_loop", id:id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery(".listing_blocos_cadastrados").html(retorno);

            preenche_select_tarifario(id, 2500);
            preenche_select_regime(id, 2500);
            preenche_select_hotel(id, 2500); 
        }
    });
}

function list_termos_gerais(id){

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_termos_gerais", id:id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#termos-gerais").html(retorno);
        }
    });

}

function list_acomodacoes_loop(id){

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_tarifarios_loop", id:id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery(".listing_blocos_cadastrados").html(retorno);
        }
    });

}

function list_dados_roteiro(id){
    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_dados_roteiro", id:id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery("#roteiros").html(retorno);
             list_tarifas_loop(id)
        }
    });
}

function list_tarifas_loop(id){

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "list_tarifas_loop", id:id },
        success: function( data ) {
            var retorno = data.slice(0,-1);

            jQuery(".listing_blocos_tarifas_cadastrados").html(retorno);
             list_tarifarios_loop(id)
        }
    });
}

function div_linha_taxa(tipo){
    if (tipo == 0) {
        jQuery(".linha_taxa").attr("style", "border: 1px solid #bdbdbd;background-color: #f1f1f1;");
    }else{
        jQuery(".linha_taxa").attr("style", "display: none;border: 1px solid #bdbdbd;background-color: #f1f1f1;");
    }
}

function getSearchParamsR(k){
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}



function adicionar_novo_tarifario(){
    for (var i = 1; i < 50; i++) {
        jQuery(".tabela_tarifa_cadastro"+i).attr("style", "display:none");
    }

    var iti_index = jQuery(".repeater_tarifa").length + 1;

                var template = wp.template("wc-add-tarifa-row"); 

    jQuery("#repeater_div_tarifario .holder").append(template({ key: iti_index }));  

    jQuery("#qtd_acomodacoes").val(iti_index+1);
    var id = getSearchParamsR("post"); 

    preenche_select_tarifario(id, iti_index);
    preenche_select_regime(id, iti_index);
    preenche_select_hotel(id, iti_index); 

    jQuery('.money').mask('00.000.000,00', {
        reverse: true
    });
}

function adicionar_novo_tarifario_tarifa(){
    for (var i = 1; i < 50; i++) {
        jQuery(".tabela_tarifario_cadastro"+i).attr("style", "display:none");
    }

    var iti_index = jQuery(".repeater_tarifario").length + 1;

                var template = wp.template("wc-add-tarifario-row"); 

    jQuery("#repeater_div_tarifario_tarifa .holder_tarifa").append(template({ key: iti_index }));  

    jQuery('#data_inicial'+iti_index)
    .datepicker({
      language: 'pt-BR',
      locale: 'pt-BR',
      minDate: new Date(),
      autoClose: true,
      dateFormat: 'dd/mm/yy',
        onSelect: function (selectedDate) {
            //Limpamos a segunda data, para evitar problemas do usuário ficar trocando a data do primeiro datepicker e acabar burlando as regras definidas.
            jQuery.datepicker._clearDate(jQuery("#data_final"+iti_index));
            //Aqui está a "jogada" para somar os 7 dias para o próximo datepicker.
            var data = jQuery.datepicker.parseDate('dd/mm/yy', selectedDate); 
            jQuery("#data_final"+iti_index).datepicker("option", "minDate", data); //Aplica a data
        }
    });
    jQuery('#data_final'+iti_index)
    .datepicker({
      language: 'pt-BR', 
      autoClose: true,
      dateFormat: 'dd/mm/yy',
    });
}

function remove_div_tarifario(key){
    jQuery("#hold_remove_tarifa"+key).remove();
}

function remove_div_tarifario_tarifa(key){
    jQuery("#holder_remover_tarifario"+key).remove();
}

function exibe_div_tarifario(key){
    for (var i = 1; i < 50; i++) {
        if (i !== key) {
            jQuery(".tabela_tarifa_cadastro"+i).attr("style", "padding-top: 10px;display:none");
        }
    } 
    jQuery(".tabela_tarifa_cadastro"+key).attr("style", "padding-top: 10px;");
    jQuery('.money').mask('00.000.000,00', {
        reverse: true
    });
}

function show_dados_tarif(key){
    for (var i = 0; i < 50; i++) { 
        jQuery(".div_dados_tarifario_nome"+i).attr("style", "display:none");
        jQuery(".div_dados_tarifariotipo"+i).attr("style", "display:none");
        jQuery(".div_dados_tarifariomoeda"+i).attr("style", "display:none");
        jQuery(".div_dados_tarifario_dataini"+i).attr("style", "display:none");
        jQuery(".div_dados_tarifario_datafim"+i).attr("style", "display:none"); 
    }
    jQuery(".div_dados_tarifario_nome"+key).attr("style", "width: 46%;margin-right: 4%;display: flex;");
    jQuery(".div_dados_tarifariotipo"+key).attr("style", "width: 50%;display: flex;");
    jQuery(".div_dados_tarifariomoeda"+key).attr("style", "width: 25%;margin-right: 4%;");
    jQuery(".div_dados_tarifario_dataini"+key).attr("style", "margin-right: 4%;width: 30%;");
    jQuery(".div_dados_tarifario_datafim"+key).attr("style", "width: 30%;"); 
}

function importar_roteiros(){ 
swal({
        title: "Importação iniciada.",
        text: 'A página será recarregada assim que a importação finalizar.',
        buttons: false,
        closeOnClickOutside: false,
        content: "html",
        icon: "success",
    }); 

    var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://api.traveltec.com.br/serv/packages/import_manual",
  "method": "GET",
  "headers": {  'Access-Control-Allow-Origin': 'http://The web site allowed to access' }
}
jQuery.ajax({
    type: "POST",
    url: "/wp-content/plugins/tarifario-tec/includes/ajax-import.php", 
    success: function(result){  
        window.location.reload(); 
    }

});

}

/* função que salva os dados do roteiro */
function save_dados_roteiro(tipo, origem = null){
    if(tipo == 2){ 
        jQuery("#save_acomodations").attr("disabled", "disabled");
        jQuery("#save_acomodations").prop("disabled");
        jQuery("#save_acomodations").html('<img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height: 21px;"> Salvando...');
    }

    /* ********************* ROTEIRO ********************* */

        var post_ID = jQuery("#post_ID").val();
        var tipo_roteiro = 0;
        var valor_taxa = 0;
        if(jQuery('#tipo_roteiro-1').is(':checked')){
            tipo_roteiro = 1;
            valor_taxa = jQuery("#valor_taxa").val();
        }
        var dias = jQuery("#dias").val();
        var noites = jQuery("#noites").val();
        var nome = jQuery("#nome").val();
        var destino = jQuery("#destino").val();

    /* ********************* ROTEIRO ********************* */

    /* ******************** TARIFÁRIO ******************** */

        var nome_tarifario2500 = jQuery("input[name=nome_tarifario2500]").val();
        if(jQuery('#tipo_tarifario-0').is(':checked')){
            var tipo_tarifario2500 = 0;
        }else{
            var tipo_tarifario2500 = 1;
        }
        var moeda2500 = jQuery("input[name=moeda2500]").val();
        var data_inicial2500 = jQuery("input[name=data_inicial2500]").val();
        var data_final2500 = jQuery("input[name=data_final2500]").val();
        if(jQuery('#tipo_periodo-0').is(':checked')){
            var tipo_periodo2500 = 0;
        }else{
            var tipo_periodo2500 = 1;
        }

        var nome_tarifario = [];
        var tipo_tarifario = [];
        var moeda = [];
        var data_inicial = [];
        var data_final = [];
        var tipo_periodo = [];

        if(jQuery("input[name=nome_tarifario2500]").val() != ""){ 
            nome_tarifario.push(jQuery("input[name=nome_tarifario2500]").val());
            tipo_tarifario.push(tipo_tarifario2500);
            moeda.push(jQuery("input[name=moeda2500]").val());
            data_inicial.push(jQuery("input[name=data_inicial2500]").val());
            data_final.push(jQuery("input[name=data_final2500]").val());
            tipo_periodo.push(tipo_periodo2500);
        }
        for (var i = 1; i < 50; i++) {
            if(jQuery("input[name=nome_tarifario"+i+"]").val() != undefined){ 

                nome_tarifario.push(jQuery("input[name=nome_tarifario"+i+"]").val());
                if(jQuery("#tipo_tarifario-"+i+"a").is(':checked')){
                    var tipo_tarifario_interno = 0;
                }else{
                    var tipo_tarifario_interno = 1;
                }
                tipo_tarifario.push(tipo_tarifario_interno);
                moeda.push(jQuery("input[name=moeda"+i+"]").val());
                console.log(jQuery("input[name=moeda"+i+"]").val())
                data_inicial.push(jQuery("input[name=data_inicial"+i+"]").val());
                data_final.push(jQuery("input[name=data_final"+i+"]").val());
                if(jQuery("#tipo_periodo-"+i+"a").is(':checked')){
                    var tipo_periodo_interno = 0;
                }else{
                    var tipo_periodo_interno = 1;
                }
                tipo_periodo.push(tipo_periodo_interno);

            }
        }

        var json_nome = JSON.stringify(nome_tarifario);
        var json_tipo = JSON.stringify(tipo_tarifario);
        var json_moeda = JSON.stringify(moeda);
        var json_data_inicial = JSON.stringify(data_inicial);
        var json_data_final = JSON.stringify(data_final);
        var json_tipo_periodo = JSON.stringify(tipo_periodo);

    /* ******************** TARIFÁRIO ******************** */

    /* ******************* ACOMODAÇÕES ******************* */

        var tarifario_option2500 = jQuery("#tarifario_option2500").val();
        var regime_roteiro2500 = jQuery("#regime_roteiro2500").val();
        var hotel_roteiro2500 = jQuery("#hotel_roteiro2500").val();
        var distancia2500 = jQuery("#distancia2500").val();

        if(jQuery('#lotado2500').is(':checked')){
            var lotado2500 = 1;
        }else{
            var lotado2500 = 0;
        } 

        if(jQuery('#consulta2500').is(':checked')){
            var consulta2500 = 1;
        }else{
            var consulta2500 = 0;
        } 

        var apto_roteiro2500 = jQuery("#apto_roteiro2500").val();

        var min_diarias2500 = jQuery("input[name=min_diarias2500]").val();
        var pax2500 = jQuery("input[name=pax2500]").val();
        var bloqueio2500 = jQuery("input[name=bloqueio2500]").val();

        var check_valor_pacote2500 = 0;

        var valor_dom2500 = jQuery("input[name=valor_dom2500]").val();
        var valor_seg2500 = jQuery("input[name=valor_seg2500]").val();
        var valor_ter2500 = jQuery("input[name=valor_ter2500]").val();
        var valor_qua2500 = jQuery("input[name=valor_qua2500]").val();
        var valor_qui2500 = jQuery("input[name=valor_qui2500]").val();
        var valor_sex2500 = jQuery("input[name=valor_sex2500]").val();
        var valor_sab2500 = jQuery("input[name=valor_sab2500]").val();

        var valor_pacote_single2500 = jQuery("input[name=valor_pacote_single2500]").val();
        var valor_pacote_double2500 = jQuery("input[name=valor_pacote_double2500]").val();
        var valor_pacote_triple2500 = jQuery("input[name=valor_pacote_triple2500]").val();

        if(jQuery('#check_valor_padrao2500').is(':checked')){
            var check_valor_padrao2500 = 1;
        }else{
            var check_valor_padrao2500 = 0;
        } 
        var valor_padrao2500 = jQuery("input[name=valor_padrao2500]").val();

        if(jQuery('#check_noite_extra2500').is(':checked')){

            var check_noite_extra2500 = 1;

            var valor_extra_dom2500 = jQuery("input[name=valor_extra_dom2500]").val();
            var valor_extra_seg2500 = jQuery("input[name=valor_extra_seg2500]").val();
            var valor_extra_ter2500 = jQuery("input[name=valor_extra_ter2500]").val();
            var valor_extra_qua2500 = jQuery("input[name=valor_extra_qua2500]").val();
            var valor_extra_qui2500 = jQuery("input[name=valor_extra_qui2500]").val();
            var valor_extra_sex2500 = jQuery("input[name=valor_extra_sex2500]").val();
            var valor_extra_sab2500 = jQuery("input[name=valor_extra_sab2500]").val(); 

        }else{

            var check_noite_extra2500 = 0;

            var valor_extra_dom2500 = 0;
            var valor_extra_seg2500 = 0;
            var valor_extra_ter2500 = 0;
            var valor_extra_qua2500 = 0;
            var valor_extra_qui2500 = 0;
            var valor_extra_sex2500 = 0;
            var valor_extra_sab2500 = 0; 

        }

        if(jQuery("#check_permite_crianca2500").is(':checked')){
            var check_permite_crianca2500 = 1;

            var crianca12500 = jQuery("#crianca12500").val();
            var crianca22500 = jQuery("#crianca22500").val();
            var crianca32500 = jQuery("#crianca32500").val();
        }else{
            var check_permite_crianca2500 = 0;

            var crianca12500 = 0;
            var crianca22500 = 0;
            var crianca32500 = 0;
        }

        var tarifario_option = [];
        var regime_roteiro = [];
        var hotel_roteiro = [];
		var distancia = [];
        var lotado = [];
        var consulta = [];
        var apto_roteiro = [];

        var min_diarias = [];
        var pax = [];
        var bloqueio = [];

        var check_valor_pacote = [];
        var valor_pacote_single = [];
        var valor_pacote_double = [];
        var valor_pacote_triple = [];

        var check_valor_padrao = [];
        var valor_padrao = [];

        var valor_dom = [];
        var valor_seg = [];
        var valor_ter = [];
        var valor_qua = [];
        var valor_qui = [];
        var valor_sex = [];
        var valor_sab = [];

        var check_noite_extra = [];

        var valor_extra_dom = [];
        var valor_extra_seg = [];
        var valor_extra_ter = [];
        var valor_extra_qua = [];
        var valor_extra_qui = [];
        var valor_extra_sex = [];
        var valor_extra_sab = [];

        var check_permite_crianca = [];
        var crianca1 = [];
        var crianca2 = [];
        var crianca3 = [];  

        if(jQuery("#tarifario_option2500").val() != ""){ 
            tarifario_option.push(tarifario_option2500);
            regime_roteiro.push(regime_roteiro2500);
            hotel_roteiro.push(hotel_roteiro2500);
			distancia.push(distancia2500);
            lotado.push(lotado2500);
            consulta.push(consulta2500);
            apto_roteiro.push(apto_roteiro2500);

            min_diarias.push(min_diarias2500);
            pax.push(pax2500);
            bloqueio.push(bloqueio2500);

            check_valor_pacote.push(check_valor_pacote2500);
            valor_pacote_single.push(valor_pacote_single2500);
            valor_pacote_double.push(valor_pacote_double2500);
            valor_pacote_triple.push(valor_pacote_triple2500);
            
            check_valor_padrao.push(check_valor_padrao2500);
            valor_padrao.push(valor_padrao2500);

            valor_dom.push(valor_dom2500);
            valor_seg.push(valor_seg2500);
            valor_ter.push(valor_ter2500);
            valor_qua.push(valor_qua2500);
            valor_qui.push(valor_qui2500);
            valor_sex.push(valor_sex2500);
            valor_sab.push(valor_sab2500);

            check_noite_extra.push(check_noite_extra2500);
            
            valor_extra_dom.push(valor_extra_dom2500);
            valor_extra_seg.push(valor_extra_seg2500);
            valor_extra_ter.push(valor_extra_ter2500);
            valor_extra_qua.push(valor_extra_qua2500);
            valor_extra_qui.push(valor_extra_qui2500);
            valor_extra_sex.push(valor_extra_sex2500);
            valor_extra_sab.push(valor_extra_sab2500);

            check_permite_crianca.push(check_permite_crianca2500);

            crianca1.push(crianca12500); 
            crianca2.push(crianca22500); 
            crianca3.push(crianca32500);
        }
        for (var i = 1; i < 50; i++) { 
            if(jQuery("#apto_roteiro"+i).val() != undefined){ 

                tarifario_option.push(jQuery("#tarifario_option"+i).val());
                regime_roteiro.push(jQuery("#regime_roteiro"+i).val());
                hotel_roteiro.push(jQuery("#hotel_roteiro"+i).val());
				distancia.push(jQuery("#distancia"+i).val());

                if(jQuery('#lotado'+i).is(':checked')){
                    lotado.push(1);
                }else{
                    lotado.push(0);
                }

                if(jQuery('#consulta'+i).is(':checked')){
                    consulta.push(1);
                }else{
                    consulta.push(0);
                }
                apto_roteiro.push(jQuery("#apto_roteiro"+i).val());

                min_diarias.push(jQuery("input[name=min_diarias"+i+"]").val());
                pax.push(jQuery("input[name=pax"+i+"]").val());
                bloqueio.push(jQuery("input[name=bloqueio"+i+"]").val());

                if(jQuery('#check_valor_padrao'+i).is(':checked')){
                    check_valor_padrao.push(1);
                }else{
                    check_valor_padrao.push(0);
                }
                valor_padrao.push(jQuery("input[name=valor_padrao"+i+"]").val());  

                check_valor_pacote.push(0);
            
                valor_dom.push(jQuery("input[name=valor_dom"+i+"]").val());
                valor_seg.push(jQuery("input[name=valor_seg"+i+"]").val());
                valor_ter.push(jQuery("input[name=valor_ter"+i+"]").val());
                valor_qua.push(jQuery("input[name=valor_qua"+i+"]").val());
                valor_qui.push(jQuery("input[name=valor_qui"+i+"]").val());
                valor_sex.push(jQuery("input[name=valor_sex"+i+"]").val());
                valor_sab.push(jQuery("input[name=valor_sab"+i+"]").val());

                valor_pacote_single.push(jQuery("input[name=valor_pacote_single"+i+"]").val()); 
                valor_pacote_double.push(jQuery("input[name=valor_pacote_double"+i+"]").val()); 
                valor_pacote_triple.push(jQuery("input[name=valor_pacote_triple"+i+"]").val());  

                if(jQuery('#check_noite_extra'+i).is(':checked')){
                    check_noite_extra.push(1);
                }else{
                    check_noite_extra.push(0);
                }
                
                valor_extra_dom.push(jQuery("input[name=valor_extra_dom"+i+"]").val());
                valor_extra_seg.push(jQuery("input[name=valor_extra_seg"+i+"]").val());
                valor_extra_ter.push(jQuery("input[name=valor_extra_ter"+i+"]").val());
                valor_extra_qua.push(jQuery("input[name=valor_extra_qua"+i+"]").val());
                valor_extra_qui.push(jQuery("input[name=valor_extra_qui"+i+"]").val());
                valor_extra_sex.push(jQuery("input[name=valor_extra_sex"+i+"]").val());
                valor_extra_sab.push(jQuery("input[name=valor_extra_sab"+i+"]").val()); 

                if(jQuery('#check_permite_crianca'+i).is(':checked')){
                    check_permite_crianca.push(1);

                    crianca1.push(jQuery("input[name=crianca1"+i+"]").val()); 
                    crianca2.push(jQuery("input[name=crianca2"+i+"]").val()); 
                    crianca3.push(jQuery("input[name=crianca3"+i+"]").val());
                }else{
                    check_permite_crianca.push(0);

                    crianca1.push(0); 
                    crianca2.push(0); 
                    crianca3.push(0);
                } 
            }
        }  

        var json_tarifario_option = JSON.stringify(tarifario_option);
        var json_regime_roteiro = JSON.stringify(regime_roteiro);
        var json_hotel_roteiro = JSON.stringify(hotel_roteiro);
        var json_distancia = JSON.stringify(distancia);
        var json_lotado = JSON.stringify(lotado);
        var json_consulta = JSON.stringify(consulta);
        var json_apto_roteiro = JSON.stringify(apto_roteiro);

        var json_min_diarias = JSON.stringify(min_diarias);
        var json_pax = JSON.stringify(pax);
        var json_bloqueio = JSON.stringify(bloqueio);

        var json_check_valor_pacote = JSON.stringify(check_valor_pacote);
        var json_valor_pacote_single = JSON.stringify(valor_pacote_single);
        var json_valor_pacote_double = JSON.stringify(valor_pacote_double);
        var json_valor_pacote_triple = JSON.stringify(valor_pacote_triple);

        var json_check_valor_padrao = JSON.stringify(check_valor_padrao);
        var json_valor_padrao = JSON.stringify(valor_padrao);

        var json_valor_dom = JSON.stringify(valor_dom);
        var json_valor_seg = JSON.stringify(valor_seg);
        var json_valor_ter = JSON.stringify(valor_ter);
        var json_valor_qua = JSON.stringify(valor_qua);
        var json_valor_qui = JSON.stringify(valor_qui);
        var json_valor_sex = JSON.stringify(valor_sex);
        var json_valor_sab = JSON.stringify(valor_sab);

        var json_check_noite_extra = JSON.stringify(check_noite_extra);

        var json_valor_extra_dom = JSON.stringify(valor_extra_dom);
        var json_valor_extra_seg = JSON.stringify(valor_extra_seg);
        var json_valor_extra_ter = JSON.stringify(valor_extra_ter);
        var json_valor_extra_qua = JSON.stringify(valor_extra_qua);
        var json_valor_extra_qui = JSON.stringify(valor_extra_qui);
        var json_valor_extra_sex = JSON.stringify(valor_extra_sex);
        var json_valor_extra_sab = JSON.stringify(valor_extra_sab);

        var json_check_permite_crianca = JSON.stringify(check_permite_crianca);

        var json_crianca1 = JSON.stringify(crianca1);
        var json_crianca2 = JSON.stringify(crianca2);
        var json_crianca3 = JSON.stringify(crianca3);

    /* ******************* ACOMODAÇÕES ******************* */

    console.log(json_moeda);
    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "save_dados_roteiro", post_ID:post_ID, tipo_roteiro:tipo_roteiro, valor_taxa:valor_taxa, dias:dias, noites:noites, nome:nome, destino:destino, json_nome:json_nome, json_tipo:json_tipo, json_moeda:json_moeda, json_data_inicial:json_data_inicial, json_data_final:json_data_final, json_tipo_periodo:json_tipo_periodo, json_tarifario_option:json_tarifario_option, json_regime_roteiro:json_regime_roteiro, json_hotel_roteiro:json_hotel_roteiro, json_distancia:json_distancia, json_lotado:json_lotado, json_consulta:json_consulta, json_apto_roteiro:json_apto_roteiro, json_min_diarias:json_min_diarias, json_pax:json_pax, json_bloqueio:json_bloqueio, json_valor_dom:json_valor_dom, json_valor_seg:json_valor_seg, json_valor_ter:json_valor_ter, json_valor_qua:json_valor_qua, json_valor_qui:json_valor_qui, json_valor_sex:json_valor_sex, json_valor_sab:json_valor_sab, json_valor_extra_dom:json_valor_extra_dom, json_valor_extra_seg:json_valor_extra_seg, json_valor_extra_ter:json_valor_extra_ter, json_valor_extra_qua:json_valor_extra_qua, json_valor_extra_qui:json_valor_extra_qui, json_valor_extra_sex:json_valor_extra_sex, json_valor_extra_sab:json_valor_extra_sab, json_check_valor_pacote:json_check_valor_pacote, json_valor_pacote_single:json_valor_pacote_single, json_valor_pacote_double:json_valor_pacote_double, json_valor_pacote_triple:json_valor_pacote_triple, json_check_valor_padrao:json_check_valor_padrao, json_valor_padrao:json_valor_padrao, json_check_noite_extra:json_check_noite_extra, json_check_permite_crianca:json_check_permite_crianca, json_crianca1:json_crianca1, json_crianca2:json_crianca2, json_crianca3:json_crianca3 },
        success: function( data ) {
            var retorno = data.slice(0,-1); 
            list_tarifas_loop(post_ID);
				jQuery("input[name=nome_tarifario2500]").val('');
				jQuery("input[name=data_inicial2500]").val('');
				jQuery("input[name=data_final2500]").val('');
				jQuery("input[name=moeda2500]").val('');

                jQuery("#valor_pacote_single2500").val('');
                jQuery("#valor_pacote_double2500").val('');
                jQuery("#valor_pacote_triple2500").val('');
                
                jQuery("#tarifario_option2500").val('');
                jQuery("#regime_roteiro2500").val('');
                jQuery("#hotel_roteiro2500").val('');
                jQuery("#distancia2500").val('');
                jQuery("#lotado2500").removeAttr('checked');
                jQuery("#consulta2500").removeAttr('checked');
                jQuery("#apto_roteiro2500").val('');
                
                jQuery("#min_diarias2500").val('');
                jQuery("#pax2500").val('');
                jQuery("#bloqueio2500").val('');

            if(tipo == 0){
                var name = "Dados do roteiro salvos!";
                var desc = 'Os dados do roteiro foram salvos com sucesso.';
            }else if(tipo == 1){
                var name = "Dados dos tarifários salvos!";
                var desc = 'Os dados dos tarifários cadastrados para o roteiro foram salvos com sucesso.';
            }else if(tipo == 2){

                jQuery("#valor_pacote_single2500").val('');
                jQuery("#valor_pacote_double2500").val('');
                jQuery("#valor_pacote_triple2500").val('');
                
                jQuery("#tarifario_option2500").val('');
                jQuery("#regime_roteiro2500").val('');
                jQuery("#hotel_roteiro2500").val('');
                jQuery("#apto_roteiro2500").val('');
                jQuery("#lotado2500").removeAttr('checked');
                
                jQuery("#min_diarias2500").val('');
                jQuery("#pax2500").val('');
                jQuery("#bloqueio2500").val('');

                for(var i = 1; i < 50; i++){
                    remove_div_tarifario(i);
                }

                list_acomodacoes_loop(post_ID);

                var name = "Dados das acomodações salvos!";
                var desc = 'Os dados das acomodações cadastradas para os tarifários do roteiro foram salvos com sucesso.';

                jQuery("#save_acomodations").removeAttr("disabled");
                jQuery("#save_acomodations").html('Salvar acomodações');
            }
			
			if(origem != 1){
				swal({
					title: name,
					text: desc, 
					icon: "success",
				}); 
			}
        }
    });

}
/* ************************************ */

/* função que salva os dados do tarifário */
function save_dados_tarifario(){

    

    var tipo_roteiro = "none";

    var json_nome = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";

    jQuery.ajax({
        type: "POST",
        url: wp_ajax.ajaxurl,
        data: { action: "save_dados_roteiro", post_ID:post_ID, json_nome:json_nome },
        success: function( data ) {
            //console.log(data.slice(0,-1));
        }
    });

}
/* ************************************** */