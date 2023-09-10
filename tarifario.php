<?php  



/*



Plugin Name: Voucher Tec - Tarifário



Plugin URI: https://traveltec.com.br



GitHub Plugin URI: https://traveltec.com.br



Description: Voucher Tec - Tarifário permite o cadastro de tarifários de hotéis de forma manual.


 
Version: 2.0.1



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









 
