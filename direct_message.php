<?php
/*
Plugin Name: پیام مستفیم
Plugin URI: http://sarailoo.ir/
Description: افزونه ای قدرتمند جهت دریافت پیام مستفیم از کاربران
Version: 1.0.0
Author: Reza Sarailoo
Author URI: http://sarailoo.ir/
Text Domain: direct-message
Domain Path: /languages
 */
defined('ABSPATH') || exit(esc_html__('دسترسی مستفیم غیر مجاز است', 'direct-message')); // for forbid users access plugin code by url
define('DRT_DIR', plugin_dir_path(__FILE__)); // direct message folder in plugins folder
define('DRT_URL', plugin_dir_url(__FILE__)); 
define('DRT_CSS_URL',trailingslashit(DRT_URL. 'assets/css')); // for add slash at the end of url
define('DRT_INC_DIR',trailingslashit(DRT_DIR. 'include'));
define('DRT_ADMIN_DIR',trailingslashit(DRT_DIR. 'admin'));
define('DRT_TPL_DIR',trailingslashit(DRT_DIR. 'template'));
function drt_load_plugin_textdomain() {
    load_plugin_textdomain( 'direct-message', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'drt_load_plugin_textdomain' );

register_activation_hook(__FILE__,'drt_activation');
register_deactivation_hook(__FILE__,'drt_deactivation');


if(is_admin()){
    require DRT_ADMIN_DIR. 'page.php';
    require DRT_ADMIN_DIR. 'menu.php';
}
else{
    include DRT_INC_DIR. 'shortcodes.php';
    include DRT_INC_DIR. 'frontend.php';
}

function drt_activation(){

    require DRT_INC_DIR . 'upgrade.php';
}
function drt_deactivation(){

}
?>