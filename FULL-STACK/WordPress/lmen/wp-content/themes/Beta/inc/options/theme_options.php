<?php if ( ! defined( 'ABSPATH' ) ) { die; }

function rt_theme_options_settings() {
  $settings           = array(
    'menu_title'      => 'RT Options',
    'menu_type'       => 'menu', 
    'menu_slug'       => 'rt-option',
    'menu_icon'       => __RT_THEME_IMG .'/logort.png',
    'ajax_save'       => true,
    'show_reset_all'  => false,
    'framework_title' => 'Cài đặt Website',
  );
  return $settings;
}

add_filter( 'cs_framework_settings', 'rt_theme_options_settings' );

// Options

function rt_theme_options_fields() {

  $active_widgets = apply_filters('__rt_active_widget', 'rt_active_widget');
  $rt_base_sidebar = array(
    'left'    => __RT_THEME_IMG .'/layout/sidebar_left.png',
    'right'   => __RT_THEME_IMG .'/layout/sidebar_right.png',
    'both'    => __RT_THEME_IMG .'/layout/2_sidebar.png',
    'none'    => __RT_THEME_IMG .'/layout/no_sidebar.png',
  );
  $options        = array();

  $options[]    = array(
      'name'      => 'user_option',
      'title'     => 'Cài đặt',
      'fields'    => array(
        // Favicon
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => 'Ảnh Favicon.',
        ),
        array(
          'id'    => 'favicon',
          'type'  => 'image',
          'title' => 'Favicon',
          'add_title' => 'Chọn ảnh Favicon',
        ),
        // Banner - Logo
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => 'Chọn ảnh Banner',
        ),
        array(
          'id'    => 'logo',
          'type'  => 'image',
          'title' => 'Banner',
          'add_title' => 'Chọn ảnh Banner',
        ),
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => 'Chọn ảnh banner mobile.',
        ),
        array(
          'id'    => 'logo_mobile',
          'type'  => 'image',
          'title' => 'Logo mobile',
          'add_title' => 'Chọn ảnh Logo Mobile',
        ),
        // Chọn slide hiển thị
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => 'Chọn slide hiển thị trang chủ',
        ),
        array(
          'id'             => 'mts_slides',
          'type'           => 'select',
          'title'          => 'Chọn slide hiển thị đã tạo ở Metaslider',
          'options'        => 'posts',
          'query_args'     => array(
              'post_type'    => 'ml-slider',
              'orderby'      => 'post_date',
              'order'        => 'DESC',
          ),
          'default_option' => '',
        ),
      )
    );

    $options[]    = array(
      'name'      => 'home_setting_option',
      'title'     => 'Trang chủ',
      'sections'  => array(
                array(
                  'name'      => 'setting_info',
                  'title'     => 'Thông tin hỗ trợ',
                  'icon'      => 'fa fa-diamond',
                  'fields'    => array(
                              array(
                                'id'              => 'info_gr',
                                'type'            => 'group',
                                'title'           => 'Thông tin chính sách',
                                'button_title'    => 'Thêm',
                                'accordion_title' => 'Thêm mới',
                                'fields'          => array(
                                      array(
                                        'id'    => 'info_title',
                                        'type'  => 'text',
                                        'title' => 'Tiêu đề thông tin',
                                      ),
                                      array(
                                        'id'    => 'info_des',
                                        'type'  => 'textarea',
                                        'title' => 'Mô tả',
                                      ),
                                      array(
                                        'id'    => 'image_icon',
                                        'type'  => 'image',
                                        'title' => 'Ảnh minh họa',
                                      ),
                                ),
                              ),
                    ),
                  ),
                  // chuyên mục sản phẩm
                    array(
                    'name'      => 'setting_product',
                    'title'     => 'Chọn chuyên mục sản phẩm',
                    'icon'      => 'fa fa-check',
                    'fields'    => array(
                              array(
                                'id'              => 'product_cat',
                                'type'            => 'group',
                                'title'           => 'Chọn chuyên mục sản phẩm',
                                'button_title'    => 'Thêm chuyên mục',
                                'fields'          => array(
                                  array(
                                    'id'             => 'product_cat_sub',
                                    'type'           => 'select',
                                    'title'          => 'Chọn chuyên mục',
                                    'options'        => 'categories',
                                    'query_args'     => array(
                                      'taxonomy'     => 'product_cat',
                                      'order'        => 'DESC',
                                    ),
                                  'default_option' => '',
                                  ),
                                ),
                              ),
                              array(
                                'id'    => 'numberproduct', 
                                'type'  => 'text',
                                'title' => 'Số sản phẩm hiển thị',
                              ),
                      ),
                    ),
                    
                  // chuyên mục trong chuyên mục
                   array(
                    'name'      => 'setting_pro',
                    'title'     => 'Chọn danh mục lớn ',
                    'icon'      => 'fa fa-check',
                    'fields'    => array(
                           array(
                                'id'              => 'product_cat_cate',
                                'type'            => 'group',
                                'title'           => 'Chọn chuyên mục sản phẩm',
                                'button_title'    => 'Thêm chuyên mục',
                                'fields'          => array(
                                  array(
                                    'id'             => 'product_cat_sub_cate',
                                    'type'           => 'select',
                                    'title'          => 'Chọn chuyên mục',
                                    'options'        => 'categories',
                                    'query_args'     => array(
                                      'taxonomy'     => 'product_cat',
                                      'order'        => 'DESC',
                                    ),
                                  'default_option' => '',
                                  ),
                                  array(
                                  'id'    => 'img_cate',
                                  'type'  => 'image',
                                  'title' => 'Image cate',
                                ),
                                ),
                              ),
                           array(
                          'id'    => 'mota_cate',
                          'type'  => 'textarea',
                          'title' => 'mô tả chuyên mục',
                        ),
                              
                    ),
                    ),

                    // chuyên mục sản phẩm
                    array(
                    'name'      => 'setting_category',
                    'title'     => 'Chọn chuyên mục tin ',
                    'icon'      => 'fa fa-check',
                    'fields'    => array(
                               array(
                                'id'             => 'product_category',
                                'type'           => 'group',
                                'title'           => 'Chọn chuyên mục tin tức',
                                'button_title'    => 'Thêm chuyên mục',
                                'fields'          => array(

                                  array(
                                    'id'             => 'product_category_sub',
                                    'type'           => 'select',
                                    'title'          => 'Chọn chuyên mục',
                                    'options'        => 'categories',
                                    'query_args'     => array(
                                      'hide_empty'   => false,
                                    ),
                                    'default_option' => '',
                                  ),
                                    array(
                                    'id'    => 'slogan-category', // this is must be unique
                                    'type'  => 'textarea',
                                    'title' => 'slogan cate',
                                  ),
                                ),
                              ),
                              array(
                                'id'    => 'numberpost', 
                                'type'  => 'text',
                                'title' => 'Số bài viết hiển thị',
                              ),
                    ),
                    ),

                    //           // Chuyên mục bài viết
                    // array(
                    //   'type'    => 'notice',
                    //   'class'   => 'info',
                    //   'content' => 'Chọn chuyên mục bài viết.',
                    // ),
                    // array(
                    //   'id'             => 'product_category',
                    //   'type'           => 'group',
                    //   'title'           => 'Chọn chuyên mục tin tức',
                    //   'button_title'    => 'Thêm chuyên mục',
                    //   'fields'          => array(

                    //     array(
                    //       'id'             => 'product_category_sub',
                    //       'type'           => 'select',
                    //       'title'          => 'Chọn chuyên mục',
                    //       'options'        => 'categories',
                    //       'query_args'     => array(
                    //         'hide_empty'   => false,
                    //       ),
                    //       'default_option' => '',
                    //     ),
                    //       array(
                    //       'id'    => 'slogan-category', // this is must be unique
                    //       'type'  => 'textarea',
                    //       'title' => 'slogan cate',
                    //     ),
                    //   ),
                    // ),
                    // array(
                    //   'id'    => 'numberpost', 
                    //   'type'  => 'text',
                    //   'title' => 'Số bài viết hiển thị',
                    // ),

        ),
      );



    // Chuyên viên tư vấn
    $options[]    = array(
      'name'      => 'chuyenvien',
      'title'     => 'Chuyên viên tư vấn',
      'icon'      => 'fa fa-users',
      'fields'    => array(
        // // add tư vấn
        // array(
        //   'id'             => 'add_tuvan',
        //   'type'           => 'group',
        //   'title'           => 'slogan home',
        //   'button_title'    => 'Thêm slogan',
        //   'fields'          => array(
              array(
                    'id'    => 'title_tuvan',
                    'type'  => 'text',
                    'title' => 'Tên mô tả',
                    'attributes' => array(
                        'style'    => 'min-width: 100%;',
                       ),
                    'default' =>'LUXURY MEN',
                  ),
              array(
              'id'    => 'mota', // this is must be unique
              'type'  => 'text',
              'title' => 'Text mô tả',
            ),
              array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'description text',
          ),
              array(
            'id'    => 'link_url', // this is must be unique
            'type'  => 'text',
            'title' => 'link cate',
          ),
           // ),
         // ),

      )
    );

      $options[]    = array(
     'name'      => 'admin_setting_option',
     'title'     => 'Admin Setting',
     'sections'  => array(
                // Setting general
                array(
                'name'      => 'setting_general',
                'title'     => 'Cài đặt tổng quan',
                'icon'      => 'fa fa-check',
                'fields'    => array(
                      array(
                        'id'    => 'responsive',
                        'type'  => 'switcher',
                        'title' => 'Bật tắt responsive',
                        'default' => true,
                      ), 
                      array(
                        'id'           => 'site_full',
                        'type'         => 'switcher',
                        'title'        => 'Website Fullwidth',
                        'default'      => false,
                      ),
                      array(
                        'id'           => 'banner_full',
                        'type'         => 'switcher',
                        'title'        => 'Banner Fullwidth',
                        'default'      => false,
                        'dependency'   => array( 'site_full', '==', 'true' ),
                      ),                   
                      array(
                        'id'      => 'layout_width',
                        'type'    => 'radio',
                        'title'   => 'Chiều rộng website',
                        'class'   => 'horizontal',
                        'options' => array(
                          '1000'   => '1000px',
                          '1170'    => '1170px',
                          '1200'    => '1200px',
                          'custom'    => 'Tùy chọn',
                        ),
                        'default' => '1000',
                      ),
                      array(
                        'id'      => 'layout_custom',
                        'type'    => 'number',
                        'default'    => 1000,
                        'title'   => 'Chiều rộng tùy chỉnh',
                        'after'   => ' <i class="cs-text-muted">(px)</i>',
                        'dependency'   => array( 'layout_width_custom', '==', 'true' ),
                      ),
                      array(
                          'type'    => 'notice',
                          'class'   => 'info',
                          'content' => 'Lưu nhanh cài đặt',
                        ),
                      array(
                        'id'           => 'layout_home',
                        'type'         => 'image_select',
                        'title'        => 'Trang chủ',
                        'options'      => $rt_base_sidebar,
                        'default'      => 'left'
                      ),
                      array(
                        'id'           => 'layout_category',
                        'type'         => 'image_select',
                        'title'        => 'Chuyên mục',
                        'options'      => $rt_base_sidebar,
                        'default'      => 'left'
                      ),
                      // array(
                      //   'id'           => 'layout_archive',
                      //   'type'         => 'image_select',
                      //   'title'        => 'Lưu trữ chung',
                      //   'options'      => $rt_base_sidebar,
                      //   'default'      => 'left'
                      // ),
                      array(
                        'id'           => 'layout_single',
                        'type'         => 'image_select',
                        'title'        => 'Bài viết,sản phẩm',
                        'options'      => $rt_base_sidebar,
                        'default'      => 'left'
                      ),
                      array(
                        'id'           => 'layout_page',
                        'type'         => 'image_select',
                        'title'        => 'Trang',
                        'options'      => $rt_base_sidebar,
                        'default'      => 'left'
                      ),
                      // array(
                      //   'id'           => 'layout_product_cat',
                      //   'type'         => 'image_select',
                      //   'title'        => 'Danh mục sản phẩm',
                      //   'options'      => $rt_base_sidebar,
                      //   'default'      => 'left'
                      // ),
                      // array(
                      //   'id'           => 'layout_product',
                      //   'type'         => 'image_select',
                      //   'title'        => 'Sản phẩm',
                      //   'options'      => $rt_base_sidebar,
                      //   'default'      => 'left'
                      // ),array(
                      array(
                          'type'    => 'notice',
                          'class'   => 'info',
                          'content' => 'Lưu nhanh cài đặt',
                        ),
                    ),
                  ),
                // background
                array(
                'name'      => 'color_background_setting',
                'title'     => 'Màu nền',
                'icon'      => 'fa fa-check',
                'fields'    => array(
                  array(
                    'id'      => 'main_color',
                    'type'    => 'color_picker',
                    'title'   => 'Chọn màu chủ đạo',
                  ),
                  array(
                    'id'           => 'background',
                    'type'         => 'background',
                    'title'        => 'Màu nền / Ảnh nền website',
                  ),
                  
                  // Background Menu
                  array(
                    'type'    => 'notice',
                    'class'   => 'info',
                    'content' => 'Nền menu top.',
                  ),

                  array(
                    'id'         => 'bg_menu_type',
                    'type'       => 'radio',
                    'title'      => 'Màu nền Menu top',
                    'options' => array(
                      'color_bg'   => 'Màu nền /ảnh nền',
                      'gradient'    => 'Gradient',
                    ),
                  ),
                  array(
                    'id'           => 'gr_mennu',
                    'type'         => 'textarea',
                    'title'        => ' ',
                    'after'        => 'Nền Gradient Menu chính',
                    'default'        => 
                          'background-image: -moz-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                          background-image: -webkit-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                          background-image: -ms-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);',
                    'dependency'   => array( 'bg_menu_type_gradient', '==', 'true' ),
                  ),
                  array(
                    'id'           => 'bg_menu',
                    'type'         => 'background',
                    'title'        => ' ',
                    'after'        => 'Màu nền / Ảnh nền Menu chính',
                    'dependency'   => array( 'bg_menu_type_color_bg', '==', 'true' ),
                  ),


                  // Background widget title
                  array(
                    'type'    => 'notice',
                    'class'   => 'info',
                    'content' => 'Nền tiêu đề widget.',
                  ),
                  array(
                    'id'         => 'bg_widget_type',
                    'type'       => 'radio',
                    'title'      => 'Màu nền tiêu đề Widget',
                    'options' => array(
                      'color_bg'   => 'Màu nền /ảnh nền',
                      'gradient'    => 'Gradient',
                    ),
                  ),
                  array(
                    'id'           => 'gr_widget_title',
                    'type'         => 'textarea',
                    'title'        => ' ',
                    'after'        => 'Nền Gradient Widget',
                    'default'        => 
                          'background-image: -moz-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                          background-image: -webkit-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                          background-image: -ms-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);',
                    'dependency'   => array( 'bg_widget_type_gradient', '==', 'true' ),
                  ),
                  array(
                    'id'           => 'bg_widget_title',
                    'type'         => 'background',
                    'title'        => ' ',
                    'after'        => 'Màu nền / Ảnh nền Widget',
                    'dependency'   => array( 'bg_widget_type_color_bg', '==', 'true' ),
                  ),


                  // Background category title
                  array(
                    'type'    => 'notice',
                    'class'   => 'info',
                    'content' => 'Nền tiêu đề danh mục( Content ).',
                  ),
                  array(
                    'id'         => 'bg_category_type',
                    'type'       => 'radio',
                    'title'      => 'Nền tiêu đề danh mục dạng( Content )',
                    'options' => array(
                      'color_bg'   => 'Màu nền /ảnh nền ',
                      'gradient'    => 'Gradient',
                    ),
                  ),
                  array(
                    'id'           => 'bg_category_title',
                    'type'         => 'background',
                    'title'         => ' ',
                    'after'        => 'Màu nền / Ảnh nền Danh mục',
                    'default'      => array(
                      'repeat'     => 'no-repeat',
                      'position'   => 'left center',
                    ),
                    'dependency'   => array( 'bg_category_type_color_bg', '==', 'true' ),
                  ),
                  array(
                    'id'           => 'gr_category_title',
                    'type'         => 'textarea',
                    'title'        => ' ',
                    'after'        => 'Nền Gradient Danh mục',
                    'default'        => 
                    'background-image: -moz-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                    background-image: -webkit-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                    background-image: -ms-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);',
                    'dependency'   => array( 'bg_category_type_gradient', '==', 'true' ),
                  ),

                  // Background Footer
                  array(
                    'type'    => 'notice',
                    'class'   => 'info',
                    'content' => 'Nền chân trang.',
                  ),
                  
                  array(
                    'id'         => 'bg_footer_type',
                    'type'       => 'radio',
                    'title'      => 'Nền Chân trang dạng',
                    'options' => array(
                      'color_bg'   => 'Màu nền /ảnh nền',
                      'gradient'    => 'Gradient',
                    ),
                  ),
                  array(
                    'id'           => 'bg_footer',
                    'type'         => 'background',
                    'title'         => ' ',
                    'after'        => 'Màu nền / Ảnh nền Chân trang',
                    'default'      => array(
                      'repeat'     => 'no-repeat',
                      'position'   => 'center center',
                    ),
                    'dependency'   => array( 'bg_footer_type_color_bg', '==', 'true' ),
                  ),
                  array(
                    'id'           => 'gr_footer',
                    'type'         => 'textarea',
                    'title'        => ' ',
                    'after'        => 'Nền Gradient Danh mục',
                    'default'        => 
                    'background-image: -moz-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                    background-image: -webkit-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);
                    background-image: -ms-linear-gradient( 90deg, rgb(220,34,39) 0%, rgb(238,58,63) 100%);',
                    'dependency'   => array( 'bg_footer_type_gradient', '==', 'true' ),
                  ),

                  
                  array(
                    'id'           => 'bg_submenu',
                    'type'         => 'background',
                    'title'        => 'Màu nền Submenu',
                  ),
                  array(
                    'id'           => 'bg_hover_menu',
                    'type'         => 'background',
                    'title'        => 'Màu nền hover menu',
                  ),
                  array(
                    'type'    => 'notice',
                    'class'   => 'info',
                    'content' => 'Lưu nhanh',
                  ),
                  
                    ),
                  ),
                // header
                array(
                'name'      => 'header_setting',
                'title'     => 'Định dạng Menu',
                'icon'      => 'fa fa-check',
                'fields'    =>  array(
                  array(
                    'id'           => 'layout_header',
                    'type'         => 'image_select',
                    'title'        => 'Giao diện Logo/ Menu',
                    'options'      => array(
                        'default' => __RT_THEME_IMG .'/header/logo-center.gif',
                        'logo_menu' => __RT_THEME_IMG .'/header/logo-left.gif',
                      ),
                    'default'      => 'default'
                  ),

                  //Top bar
                  array(
                    'id'           => 'top_bar',
                    'type'         => 'switcher',
                    'title'        => 'Hiển thị widget Top bar',
                    'default'      => false,
                  ),
                  array(
                      'type'    => 'notice',
                      'class'   => 'info',
                      'content' => 'Lưu nhanh cài đặt',
                    ),
                  //Sticky Nav Menu
                  array(
                    'id'           => 'sticky_nav_menu',
                    'type'         => 'switcher',
                    'title'        => 'Menu Fixed',
                    'default'      => false,
                  ),

                  //Vertical Mega Menu
                  array(
                    'id'           => 'vertical_mega_menu',
                    'type'         => 'switcher',
                    'title'        => 'Mega Menu Ngang',
                    'default'      => false,
                  ),

                  //Vertical Mega Menu Title
                  array(
                    'id'           => 'vertical_mega_menu_title',
                    'type'         => 'text',
                    'title'        => 'Tiêu đề Mega Menu Ngang',
                    'default'      => 'Danh mục sản phẩm',
                    'dependency' => array( 'vertical_mega_menu', '==', 'true' ),

                  ),

                  //Header Search
                  array(
                    'id'           => 'enable_header_search',
                    'type'         => 'switcher',
                    'title'        => 'Hiển thị ô tìm kiếm',
                    'default'      => false,
                  ),

                  ),
                ),
                
                
                  // Product
                  array(
                  'name'      => 'product_setting',
                  'title'     => 'Sản phẩm',
                  'icon'      => 'fa fa-check',
                  'fields'    =>  array(
                    // style prodcut
                    array(
                      'id'             => 'style_prd',
                      'type'           => 'select',
                      'title'          => 'Chọn dạng style hiển thị sản phẩm',
                      'options'        => array(
                        'product_style_1'  => 'Giao diện 1',
                        'product_style_2'  => 'Giao diện 2',
                        'product_style_3'  => 'Giao diện 3',
                        // 'product_style_4'  => 'Giao diện 4',
                        // 'product_style_5'  => 'Giao diện 5',
                        ),
                      'default'            =>'product_style_1',
                      ),
                    array(
                      'id'    => 'colums_product_lg',
                      'type'    => 'select',
                      'title'    => esc_html('Số sản phẩm 1 hàng trên màn hình cỡ lớn ( > 1200px )'),
                      'options' => array(
                        'col-lg-3 lg-4-cl'  => esc_html__( '4 Cột', 'rt-theme' ),
                        'col-lg-4 lg-3-cl'  => esc_html__( '3 Cột', 'rt-theme' ),
                      ),
                    ),
                    array(
                      'id'    => 'colums_product_md',
                      'type'    => 'select',
                      'title'    => esc_html('Số sản phẩm 1 hàng trên màn hình cỡ vừa'),
                      'options' => array(
                        'col-md-3 md-4-cl'  => esc_html__( '4 Cột', 'rt-theme' ),
                        'col-md-4 md-3-cl'  => esc_html__( '3 Cột', 'rt-theme' ),
                        'col-md-6 md-2-cl'  => esc_html__( '2 Cột', 'rt-theme' ),
                      ),
                    ),
                    array(
                      'id'    => 'colums_product_sm',
                      'type'    => 'select',
                      'title'    => esc_html('Số sản phẩm 1 hàng trên màn hình cỡ nhỏ'),
                      'options' => array(
                        'col-sm-4 sm-3-cl'  => esc_html__( '3 Cột', 'rt-theme' ),
                        'col-sm-6 sm-2-cl'  => esc_html__( '2 Cột', 'rt-theme' ),
                        'col-sm-12 sm-1-cl' => esc_html__( '1 Cột', 'rt-theme' ),
                      ),
                    ),     
                    array(
                      'id'    => 'colums_product_xs',
                      'type'    => 'select',
                      'title'    => esc_html('Số sản phẩm 1 hàng trên màn hình điện thoại'),
                      'options' => array(
                        'col-xs-6 xs-2-cl'  => esc_html__( '2 Cột', 'rt-theme' ),
                        'col-xs-12 xs-1-cl' => esc_html__( '1 Cột', 'rt-theme' ),
                      ),
                    ),          
                    array(
                      'type'    => 'notice',
                      'class'   => 'info',
                      'content' => 'Các chức năng.',
                    ),
                    array(
                      'id'    => 'on_cart',
                      'type'    => 'switcher',
                      'title'    => 'Bật/ tắt các chức năng giỏ hàng',
                      'default'    => false,
                    ),
                    // Buy button          
                    array(
                      'id'    => 'buy_now_btn',
                      'type'    => 'switcher',
                      'title'    => 'Nút mua',
                      'default'    => false,
                      'dependency' => array( 'on_cart', '==', 'true' ),
                    ),
                    // info buy single
                    array(
                      'id'    => 'info_btn',
                      'type'    => 'switcher',
                      'title'    => 'Thông điệp mua hàng(Single)',
                      'default'    => false,
                      'dependency' => array( 'on_cart', '==', 'true' ),
                    ),
                    // Quick view          
                    array(
                      'id'    => 'quickview',
                      'type'    => 'switcher',
                      'title'    => 'Xem nhanh',
                      'default'    => false,
                    ),          
                    array(
                      'id'    => 'quickview_mobile',
                      'type'    => 'switcher',
                      'title'    => 'Xem nhanh trên mobile',
                      'default'    => false,
                      'dependency' => array( 'quickview', '==', 'true' ),
                      'dependency' => array( 'on_cart', '==', 'true' ),
                    ),
                    
                    // Tooltip          
                    array(
                      'id'    => 'tooltip',
                      'type'    => 'switcher',
                      'title'    => 'Tooltip',
                      'default'    => false,
                    ),          
                    array(
                      'id'    => 'tooltip_image',
                      'type'    => 'switcher',
                      'title'    => 'Hình ảnh trong Tooltip',
                      'default'    => false,
                      'dependency' => array( 'tooltip', '==', 'true' ),
                    ),              
                    array(
                      'id'    => 'tooltip_title',
                      'type'    => 'switcher',
                      'title'    => 'Tiêu đề trong Tooltip',
                      'default'    => false,
                      'dependency' => array( 'tooltip', '==', 'true' ),
                    ),
                    array(
                      'id'    => 'tooltip_price',
                      'type'    => 'switcher',
                      'title'    => 'Giá cả trong Tooltip',
                      'default'    => false,
                      'dependency' => array( 'tooltip', '==', 'true' ),
                    ),
                    // cmt fb 
                    array(
                      'id'    => 'check_using_cmt_fb',
                      'type'    => 'switcher',
                      'title'    => 'Comment Facebook',
                      'default'    => false,
                    ),
                    // Zoom and slide product thumbnails
                    array(
                      'type'    => 'notice',
                      'class'   => 'info',
                      'content' => 'Zoom ảnh và slide ảnh sản phẩm',
                    ),
                    // zoom image 
                    array(
                      'id'    => 'zoomimg',
                      'type'    => 'switcher',
                      'title'    => 'Zoom ảnh sản phẩm',
                      'default'    => false,
                    ),
                    array(
                        'id'       => 'zoomimg_style',
                        'type'     => 'select',
                        'title'    => 'Chọn dạng slide hiển thị ảnh nhỏ',
                        'options'  => array(
                          'horizon'  => 'Ngang',
                          'vertical'   => 'Dọc',
                        ),
                        'default'  => 'horizon',
                        'dependency' => array( 'zoomimg', '==', 'true' ),
                    ),
                    array(
                      'id'    => 'rt_options_archive',
                      'type'    => 'switcher',
                      'title'    => 'Bật chuyên mục trong chuyên mục',
                      'default'    => false,
                    ),
                    array(
                        'id'       => 'rt_options_archive_image',
                        'type'     => 'switcher',
                        'title'    => 'Bật/ tắt ảnh chuyên mục',
                        'default'    => false,
                        'dependency' => array( 'rt_options_archive', '==', 'true' ),
                    ),
                  ),
                ),
                // post
                array(
                  'name'     => 'post_setting',
                  'title'    => 'Bài viết + Khác',
                  'icon'     => 'fa fa-check',
                  'fields'   => array(
                      // Style bài viết
                      array(
                      'id'             => 'style_category',
                      'type'           => 'select',
                      'title'          => 'Chọn dạng style hiển thị bài viết',
                      'options'        => array(
                        '1'  => 'Giao diện 1',
                        '2'  => 'Giao diện 2',
                        '3'  => 'Giao diện 3',
                        '4'  => 'Giao diện 4',
                        '5'  => 'Giao diện 5',
                        '6'  => 'Giao diện 6',
                        '7'  => 'Giao diện 7',
                        '8'  => 'Giao diện 8',
                        
                        ),
                      ),
                    // breadcrumb
                      array(
                        'id'           => 'enable_breadcrumb',
                        'type'         => 'switcher',
                        'title'        => 'Hiển thị breadcrumb',
                        'default'      => false,
                      ),
                    ),
                  ),

                // footer
                array(
                  'name'      => 'footer_setting',
                  'title'     => 'Chân trang',
                  'icon'      => 'fa fa-check',
                  'fields'    =>  array(
                    array(
                      'id'    => 'before_footer_widget',
                      'type'    => 'number',
                      'title'    => 'Số Sidebar Widget trước chân trang',
                      'default'    => '0',
                      'after'    => 'Tối thiểu: 0, Tối đa: 10',
                      'attributes' => array(
                        'min' => '0',
                        'max'    => '10',
                      ),
                    ),
                    array(
                      'id'    => 'footer_column',
                      'type'    => 'number',
                      'title'    => 'Số cột Widget Chân trang',
                      'default'    => '1',
                      'after'    => 'Tối thiểu: 1, Tối đa: 10',
                      'attributes' => array(
                        'min' => '1',
                        'max'    => '10',
                      ),
                    ),
                    array(
                      'id'           => 'copyright',
                      'type'         => 'wysiwyg',
                      'title'        => 'Copyright',
                      'settings' => array(
                        'textarea_rows' => 5,
                        'media_buttons' => false,
                      ),
                      'default'      => '<a rel="nofollow" target="_blank" href="http://thietkewebmienphi.com/" title="thiet ke website">Design by RT Group</a>',
                    ),
                  ),
                  ),
                // Code
                array(
                  'name'      => 'code_setting',
                  'title'     => 'Chèn thêm code',
                  'icon'      => 'fa fa-check',
                  'fields'    =>  array(
                    
                    array(
                      'id'              => 'rt_header_script',
                      'type'            => 'group',
                      'title'           => 'Chèn code đầu trang',
                      'button_title'    => 'Thêm mới',
                      'accordion_title' => 'Code script',
                      'fields'          => array(
                        array(
                            'id'    => 'header_script_value',
                            'type'  => 'textarea',
                            'title' => 'Thêm code',
                          ),
                      ),
                    ),
                    array(
                      'id'              => 'rt_footer_script',
                      'type'            => 'group',
                      'title'           => 'Chèn code chân trang',
                      'button_title'    => 'Thêm mới',
                      'accordion_title' => 'Code script',
                      'fields'          => array(
                        array(
                            'id'    => 'footer_script_value',
                            'type'  => 'textarea',
                            'title' => 'Thêm code',
                          ),
                      ),
                    ),
                  ),
                ),

          ),
        );
  


  return $options;
}
add_filter( 'cs_framework_options', 'rt_theme_options_fields' );