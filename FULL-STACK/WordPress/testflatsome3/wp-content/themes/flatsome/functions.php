<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */


/** ADD FONT AWESOME */
function wpb_load_fa() {
wp_enqueue_script( 'wpb-fa', 'https://use.fontawesome.com/1ad2a7dd98.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpb_load_fa' );