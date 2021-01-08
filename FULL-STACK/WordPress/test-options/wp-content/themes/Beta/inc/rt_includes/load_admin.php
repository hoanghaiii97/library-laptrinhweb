<?php
// Remove Menu
global $rt_option;
function remove_menus() {
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'plugins.php' );
  remove_menu_page( 'update-core.php' );                  //Plugins
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'tools.php' );
}
add_action( 'admin_menu', 'remove_menus' );

// remove 
function my_remove_sub_menus() {
  global $submenu;
  remove_submenu_page( 'index.php', 'update-core.php' ); 
  if ( isset( $submenu[ 'themes.php' ] ) ) {
      foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
          if ( in_array( 'customize', $menu_item ) ) {
              unset( $submenu[ 'themes.php' ][ $index ] );
          }
      }
  }
  remove_submenu_page( 'themes.php', 'themes.php' ); 
  remove_submenu_page( 'themes.php', 'theme-editor.php' ); 
  remove_submenu_page( 'users.php', 'users-user-role-editor.php' );
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' ); 
}
add_action( 'admin_menu', 'my_remove_sub_menus', 999 );

// remove widget
// remove widget default
function my_unregister_widgets() {
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Calendar');
}
add_action( 'widgets_init', 'my_unregister_widgets' );

// remove widgets not use to
function remove_woo_widgets() {
  unregister_widget( 'WC_Widget_Recent_Products' );
  unregister_widget( 'WC_Widget_Featured_Products' );
  unregister_widget( 'WC_Widget_Products' );
  unregister_widget( 'WC_Widget_Product_Categories' );
  unregister_widget( 'WC_Widget_Product_Tag_Cloud' );
  unregister_widget( 'WC_Widget_Cart' );
  unregister_widget( 'WC_Widget_Layered_Nav' );
  unregister_widget( 'WC_Widget_Layered_Nav_Filters' );
  //unregister_widget( 'WC_Widget_Price_Filter' );
  unregister_widget( 'WC_Widget_Top_Rated_Products' );
  unregister_widget( 'WC_Widget_Recent_Reviews' );
  unregister_widget( 'WC_Widget_Recently_Viewed' );
  unregister_widget( 'WC_Widget_Best_Sellers' );
  unregister_widget( 'WC_Widget_Onsale' );
  //unregister_widget( 'WC_Widget_Random_Products' );
}
add_action( 'widgets_init', 'remove_woo_widgets' );

// shortcode to widget
add_filter('widget_text', 'do_shortcode');
// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_filter('xmlrpc_enabled', '__return_false');

// add css - js to admin
function add_my_js(){
  wp_enqueue_script( "my-upload", get_theme_file_uri( "/assets/js/upload.js"),  'jquery' );
  wp_enqueue_media();
}
add_action('admin_enqueue_scripts','add_my_js');

function my_custom_css() {
  wp_enqueue_style( "my-css", get_theme_file_uri( "/assets/css/admin.css") );
}
add_action('admin_head', 'my_custom_css');


// admin style options
add_action( 'admin_enqueue_scripts', 'load_options_styles' );
 function load_options_styles() {
   wp_enqueue_style( 'admin_css_options', get_template_directory_uri() . '/inc/options.css' );
 } 

if ( ! current_user_can('administrator') ) {
 // admin options
 add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
       function load_admin_styles() {
         wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/inc/options_admin.css' );
       } 
}

// hide noti YoastSeo update

add_action( 'admin_notices', 'jt_remove_admin_notices', -999 );
function jt_remove_admin_notices() {
  jt_remove_object_filter( 'admin_notices', 'renderMessage' );
}
function jt_remove_object_filter( $hook, $method, $priority = 10 ) {
  global $wp_filter;
  if ( ! isset( $wp_filter[ $hook ][ $priority ] ) || ! is_array( $wp_filter[ $hook ][ $priority ] ) )
    return;
  foreach ( $wp_filter[ $hook ][ $priority ] as $id => $filter_array ) {
    if ( isset( $filter_array['function'] ) && is_array( $filter_array['function'] ) ) {
      if ( is_object( $filter_array['function'][0] ) && get_class( $filter_array['function'][0]) && $filter_array['function'][1] == $method ) {
        if ( is_a( $wp_filter[ $hook ], 'WP_Hook' ) )
          unset( $wp_filter[ $hook ]->callbacks[ $priority ][ $id ] );
      }
    }
  }
}