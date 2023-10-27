<?php
/*
Plugin Name: Chirag Plugin
Plugin URI: https://wordpress.com/
Description: Custom Wordpress Admin Frontend Code Management.
Version: 1.0.0
Author: Chirag Patel
Author URI: https://wordpress.com/
	Copyright 2023 Chirag Patel
	This program is free plugin; You can easily used admin shortcode on Frontend
	and	admin side you can manage everythings.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

function activate_plugin_chirag() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-chirag-activator.php';
	Plugin_Chirag_Activator::activate();
}

function deactivate_plugin_chirag() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-chirag-deactivate.php';
	Plugin_Chirag_Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_chirag' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_chirag' );

require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-chirag.php';

function run_plugin_chirag() {

	$plugin = new Plugin_Chirag();
	$plugin->run();

}
run_plugin_chirag();
