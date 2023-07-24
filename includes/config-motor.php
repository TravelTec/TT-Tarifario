<div class="wrap">
		        <div id="icon-themes" class="icon32"></div>  
		        <h2>Configuração</h2>  
		         <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
		        <form method="POST" action="options.php">  
		            <?php 
		                settings_fields( 'plugin_name_general_settings' );
		                do_settings_sections( 'plugin_name_general_settings' ); 
		            ?>             
		            <?php submit_button(); ?>  
		        </form> 
</div>