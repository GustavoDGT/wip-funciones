<?php
/*
Add-on Name: Generate Sections
Author: Thomas Usborne
Author URI: http://edge22.com
*/

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define the version
if ( ! defined( 'GENERATE_SECTIONS_VERSION' ) ) {
	define( 'GENERATE_SECTIONS_VERSION', '1.0' );
}

// Include functions identical between standalone addon and GP Premium
require plugin_dir_path( __FILE__ ) . 'functions/generate-sections.php';