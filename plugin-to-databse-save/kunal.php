<?php
/**
 * Plugin Name: Kunal Test Plugin.
 * Plugin URI: http://ikunal.in
 * Description: A brief description of the plugin.
 * Version: 0.1
 * Author: Kunal Gautam
 * Author URI: http://blog.ikunal.in
 */


global $kunal_db_version;
$kunal_db_version = '1.0';

function db_install() {
	global $wpdb;
	global $kunal_db_version;

	$table_name = $wpdb->prefix . 'kunal';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		text text NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'kunal_db_version', $kunal_db_version );
}

function db_install_data() {
	global $wpdb;
	
	$text = 'Congratulations, you just completed the installation!';
	
	$table_name = $wpdb->prefix . 'kunal';
	
	$wpdb->insert( 
		$table_name, 
		array( 		'text' => $text		) 
	);
}

register_activation_hook( __FILE__, 'db_install' );
register_activation_hook( __FILE__, 'db_install_data' );
?>
