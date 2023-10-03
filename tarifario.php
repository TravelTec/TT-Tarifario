<?php  



/*



Plugin Name: Voucher Tec - Tarifário



Plugin URI: https://traveltec.com.br



GitHub Plugin URI: https://traveltec.com.br



Description: Voucher Tec - Tarifário permite o cadastro de tarifários de hotéis de forma manual.


 
Version: 2.0.2



Author: Travel Tec



Author URI: https://traveltec.com.br



License: GPLv2



*/







/*



 * Plugin Update Checker



 * 



 * Note: If you're using the Composer autoloader, you don't need to explicitly require the library.



 * @link https://github.com/YahnisElsts/plugin-update-checker



 */

 

 
require_once plugin_dir_path(__FILE__) . 'includes/tarifario-functions.php';
require_once 'plugin-update-checker-4.10/plugin-update-checker.php'; 


/*



 * Plugin Update Checker Setting



 *



 * @see https://github.com/YahnisElsts/plugin-update-checker for more details.



 */



function shortcode_puc_tarifario() {
    if ( ! is_admin() || ! class_exists( 'Puc_v4_Factory' ) ) { 
        return; 
    } 

    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker( 
        'https://github.com/TravelTec/TT-Tarifario', 
        __FILE__, 
        'TT-Tarifario' 
    ); 

    // (Opcional) Set the branch that contains the stable release. 
    $myUpdateChecker->setBranch('main');
}
add_action( 'admin_init', 'shortcode_puc_tarifario' );


// Adiciona abas de detalhes ao plugin
function tarifario_details_tabs($links, $file) {
    // Verifica se é o plugin desejado
    if (strpos($file, 'tarifario.php') !== false) {
        // Adiciona a aba "Documentação" antes do link de desativar
        $documentation_link = '<span style="font-weight: bold;"><a href="https://traveltec.freshdesk.com/support/solutions/folders/43000585539" target="_blank">Documentação</a></span>';
        
        // Encontra a posição do link de desativar
        $deactivate_position = array_search('deactivate', array_keys($links));
        
        // Insere o link de documentação diretamente na posição desejada
        array_splice($links, $deactivate_position, 0, $documentation_link);
    }

    return $links;
}
add_filter('plugin_action_links', 'tarifario_details_tabs', 10, 2);






 
