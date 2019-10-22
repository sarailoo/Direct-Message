<?php
add_action('wp_enqueue_scripts','drt_load_user_assets');
function drt_load_user_assets(){
    wp_register_style('drt_user_style',DRT_CSS_URL. 'drt_user_style.css');
    wp_enqueue_style('drt_user_style');
}