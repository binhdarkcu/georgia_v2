<?php 
add_action('admin_init','create_table_countries');
function  create_table_countries()
{
	global $wpdb;
	$tb_country=$wpdb->prefix .'cities';
if ($wpdb->get_var("SHOW TABLES LIKE '$tb_country'") != $tb_country) {
		$wpdb->query("CREATE TABLE {$tb_country}(
			code char(2)  PRIMARY KEY,
			country varchar(128) NOT NULL
		)ENGINE=MyISAM DEFAULT CHARSET=utf8");

	}
}