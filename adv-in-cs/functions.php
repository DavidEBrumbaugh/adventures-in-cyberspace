<?php

/**
 * Adventures in Cyberspace functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Adventures in Cyberspace
 * @since 0.1.0
 */

// Useful global constants
define( 'ADVINCS__VERSION',      '0.1.0' );
define( 'ADVINCS__URL',          get_stylesheet_directory_uri() );
define( 'ADVINCS__TEMPLATE_URL', get_template_directory_uri() );
define( 'ADVINCS__PATH',         get_template_directory() . '/' );
define( 'ADVINCS__INC',          ADVINCS__PATH . 'includes/' );

// Include compartmentalized functions
require_once ADVINCS__INC . 'functions/core.php';
require_once ADVINCS__INC . 'functions/navigation.php';

// Include lib classes

// Run the setup functions
TenUp\Adventures_in_Cyberspace\Core\setup();
