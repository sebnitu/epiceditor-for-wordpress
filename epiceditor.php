<?php
/*
Plugin Name: EpicEditor for WordPress
Plugin URI: http://sebnitu.com

Description: EpicEditor is a Markdown text editor. This plugin adds to the default WYSIWYG editor with EpicEditor for some awesome Markdown goodness. When activated, you'll see a new tab on your text editor for writing your posts and pages in Markdown.

Version: 1.0

Author: Sebastian Nitu
Author URI: http://sebnitu.com

License: GPL2
*/

// Display errors and warnings
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

// Initialise the plugin
add_action('init', 'epiceditor_init');

function epiceditor_init() {
	global $epiceditor_wordpress;
	require_once 'class-epiceditor-wordpress.php';

	if(is_admin()) {
		add_action('admin_print_scripts', array(&$epiceditor_wordpress, 'build_epiceditor'));
	}
	
}

/*
// Runs when plugin is activated
register_activation_hook(__FILE__,'epiceditor_install'); 
// Runs on plugin deactivation
register_deactivation_hook( __FILE__, 'epiceditor_remove' );

function epiceditor_install() {
	// Creates new database field
	add_option('epiceditor_options', 'This is the default output', '', 'yes');
}
function epiceditor_remove() {
	// Deletes the database field
	delete_option('epiceditor_options');
}


// Create custom plugin settings menu
add_action('admin_menu', 'epiceditor_admin_menu');
function epiceditor_admin_menu() {
	// Create options menu item
	add_options_page (
		'EpicEditor Options', 
		'EpicEditor', 
		'manage_options',
		'epiceditor', 
		'epiceditor_options_page'
	);
}
function epiceditor_options_page() {
	// Does the user have permission to do this?
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// Include the options page
	include('templates/options.php');
}
*/