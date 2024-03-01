<?php
/**
 * Plugin Name: Elementor Additional Blocks
 * Description: Elementor Additional Blocks (combines previously used plugin).
 * Author:      Reva Athallah
 * Version:		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once 'includes/template-tags.php';
require_once 'includes/enqueue-assets.php';
require_once 'includes/register-widget.php';
require_once 'includes/ajax-handler.php';
