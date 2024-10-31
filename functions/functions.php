<?php
function pbc_divi_woocommerce_menu_styles(){

    wp_enqueue_script( 'pbc-divi-woo-main-script', plugin_dir_url( __DIR__ ) . 'scripts/main-script.js' );

}


add_action('wp_enqueue_scripts', 'pbc_divi_woocommerce_menu_styles', 99999);
?>
