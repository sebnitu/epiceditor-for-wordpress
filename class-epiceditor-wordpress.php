<?php

class epiceditor_wordpress {
	
	private static $instance;
	public $plugin_path = '';
	public $epiceditor_path = '';
	
	/**
	 * Build on new instance
	 */
	public function __construct() {
		if (DEFINED('WP_PLUGIN_URL')) {
			$this->plugin_path = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/';
		} else if (DEFINED('WP_PLUGIN_DIR')) {
			$this->plugin_path = $siteurl . '/' . WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/';
		} else {
			$this->plugin_path = $siteurl . 'wp-content/plugins/' . basename(dirname(__FILE__)) . '/';
		}
		if(is_ssl()) {
			$siteurl = str_replace('http:', 'https:', $siteurl);
			$this->plugin_path = str_replace('http:', 'https:', $this->plugin_path);
		}
		define('EPICEDITOR_PLUGIN_URL', $this->plugin_path);
		$this->epiceditor_path = $this->plugin_path;
	}
	
	/**
	 * Build EpicEditor
	 */
	public function build_epiceditor() {
		
		// Make sure we're on post.php or post-new.php
		if ( $this->is_edit_page() ) {
		
			$params = array(
				'base_path' => $this->epiceditor_path,
			);
			
			// Include Scripts
			wp_enqueue_script('epiceditor', $this->epiceditor_path . 'epiceditor/js/epiceditor.min.js');
			wp_enqueue_script('epiceditor.parser.html-to-markdown', $this->epiceditor_path . 'assets/js/to-markdown.js');
			wp_enqueue_script('epiceditor.config', $this->epiceditor_path . 'assets/js/epiceditor.js');
			
			// Include Styles
			wp_enqueue_style('epiceditor.css', $this->epiceditor_path . 'assets/css/epiceditor.css');
			wp_enqueue_style('overlay.css', $this->epiceditor_path . 'assets/css/overlay.css');
			
			// Pass PHP paramaters
			wp_localize_script( 'epiceditor.config', 'php_params', $params );
		}
	}
	
	/**
	 * Is edit page 
	 * function to check if the current page is a post edit/new page
	 */
	function is_edit_page($new_edit = null) {
	
		global $pagenow;
		
		//make sure we are on the backend
		if (!is_admin()) return false;
		
		if($new_edit == "edit") {
			return in_array( $pagenow, array( 'post.php' ) );
		} elseif($new_edit == "new") {
			return in_array( $pagenow, array( 'post-new.php' ) );
		} else {
			return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
		}
	}
	
}

$epiceditor_wordpress = new epiceditor_wordpress;