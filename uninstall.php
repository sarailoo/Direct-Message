<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$option_name = 'drt_active';
delete_option($option_name);


// for site options in Multisite
// delete_site_option($option_name);

// drop a custom database table
global $wpdb,$table_prefix;
$wpdb->query("DROP TABLE IF EXISTS {$table_prefix}drt_msg");