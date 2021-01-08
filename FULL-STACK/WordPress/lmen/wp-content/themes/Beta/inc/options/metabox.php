<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

function rt_metabox_options_fields( $options ) {
  $options      = array();

  $rt_base_sidebar = array(

      array(
        'id'      => 'is_overwrite',
        'type'    => 'switcher',
        'label'   => esc_html__( 'Sử dụng cài đặt Thanh bên?', 'rt-theme' ),
        'default' => false,
      ),
      array(
        'id'        => 'area',
        'type'         => 'image_select',
        'title'        => 'Trang chủ',
        'options'      => array(
          'left'    => __RT_THEME_IMG .'/layout/sidebar_left-49x49.png',
          'right'    => __RT_THEME_IMG .'/layout/sidebar_right-49x49.png',
          'both'    => __RT_THEME_IMG .'/layout/2_sidebar-49x49.png',
          'none'    => __RT_THEME_IMG .'/layout/no_sidebar-49x49.png',
        ),
        'default'      => 'left',
        'dependency' => array( 'is_overwrite', '==', 'true' ),
        'attributes'   => array(
          'data-depend-id' => 'area',
        ),
      ),

      array(
        'id'         => 'left_sidebar_name',
        'type'       => 'select',
        'title'      => esc_html__( 'Thanh bên Trái', 'rt-theme' ),
        'options'    => __Rt_Widget_Area::registered_sidebars(),
        'default'    => 'sidebar-1',
        'dependency' => array( 'is_overwrite|area', '==|any', 'true|left,both' ),
      ),
      array(
        'id'         => 'right_sidebar_name',
        'type'       => 'select',
        'title'      => esc_html__( 'Thanh bên Phải', 'rt-theme' ),
        'options'    => __Rt_Widget_Area::registered_sidebars(),
        'default'    => 'sidebar-2',
        'dependency' => array( 'is_overwrite|area', '==|any', 'true|right,both' ),
      ),

  );

  // -----------------------------------------
  // Side Metabox Options               -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'rt_sidebar',
    'title'     => 'Kiểu hiển thị Thanh bên',
    'post_type' => array( 'post', 'page', 'product' ),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'overwrite_sidebar',
        'fields' => $rt_base_sidebar,
      ),

    ),
  );
  // // Example
  // $options[]    = array(
  //   'id'        => '_custom_post_options',
  //   'title'     => 'Custom Post Options',
  //   'post_type' => 'product',
  //   // 'post_id'   => '97', // add value option with post id 
  //   'context'   => 'normal',
  //   'priority'  => 'default',
  //   'sections'  => array(

  //     array(
  //       'name'   => 'Policy_item',
  //       'fields' => array(
  //     array(
  //       'id'    => 'Policy',
  //       'type'  => 'textarea',
  //       'title' => 'Chính sách bán hàng',
  //     ),
  //       ),
  //     ),

  //   ),
  // );

  return $options;
}

add_filter( 'cs_metabox_options', 'rt_metabox_options_fields' );