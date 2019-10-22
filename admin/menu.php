<?php
add_action('admin_menu','drt_admin_menu'); // add drt_admin_menu function to admin_menu(built in) in wordpress
function drt_admin_menu(){
    $main = add_menu_page(esc_html__('پیام مستفیم','direct-message'),esc_html__('پیام مستفیم','direct-message'),'read','drt_main','drt_main_page');
    $main_sub = add_submenu_page('drt_main',esc_html__('پیام ها','direct-message'),esc_html__('پیام ها','direct-message'),'manage_options','drt_main');
    $setting = add_submenu_page('drt_main',esc_html__('تنظیمات','direct-message'),esc_html__('تنظیمات','direct-message'),'manage_options','drt_setting','drt_setting_page');
}