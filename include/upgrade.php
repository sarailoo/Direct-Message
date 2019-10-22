<?php
global $wpdb,$table_prefix;
$sql ="CREATE TABLE {$table_prefix}drt_msg (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(20) COLLATE utf8_bin NOT NULL,
  `usermessage` text COLLATE utf8_bin NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";

require_once ABSPATH.'/wp-admin/includes/upgrade.php';
dbDelta($sql);