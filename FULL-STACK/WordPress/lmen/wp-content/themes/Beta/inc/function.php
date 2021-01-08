<?php
/**
 * RT Aug-Sep 2017
 */
// load include funtion 
require_once( dirname( __FILE__ ) . '/rt_includes/load_admin.php' );

// add Widget 
// Wiget rebuild
require_once( dirname( __FILE__ ) . '/widgets/rt-support.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-image.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-facebook.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-product-slider.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-partner.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-archive.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-post-category.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-widget-text.php' );
require_once( dirname( __FILE__ ) . '/widgets/rt-widget-video.php' );
require_once( dirname( __FILE__ ) . '/shortcode/rt-blog.php' );

// the content limit
function the_content_limit($max_char, $more_link_text = '(more)', $stripteaser = 0, $more_file = '') { 
$content = get_the_content($more_link_text, $stripteaser, $more_file); 
$content = apply_filters('the_content', $content); $content = str_replace(']]>', ']]>', $content); 
$content = strip_tags($content); 
 if (strlen($_GET['p']) > 0) {
      echo $content;
    }
  else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) { 
  $content = substr($content, 0, $espacio); $content = $content; echo "<p>"; 
  echo $content;
        echo "...";
        echo "<a class='more-link' href='";
        the_permalink();
        echo "'>".$more_link_text."</a></p>";
  }else{
    echo "<p>".$content;
        echo "...";
        echo "<a class='more-link' href='";
        the_permalink();
        echo "'>".$more_link_text."</a></p>";
  } 
}

// Add Metaslider
function add_slide() {
  $idsl = cs_get_option( 'mts_slides' );
  if(is_home()) {
	  echo do_shortcode( "[metaslider id={$idsl}]" );
	}
}
add_action( 'rt_before_content', 'add_slide', 1 );

// breadcrumb
function rt_breadcrumb() {
  if(!is_home()) {
    if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p class="breadcrumbs">','</p>');
    }
  }
}
if($rt_option['enable_breadcrumb']) {
  add_action( 'rt_before_layout', 'rt_breadcrumb', 1  );
}

// search
function search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'post', 'product' ) );
    }
  }
}
add_action('pre_get_posts','search_filter');

// add paren menu 
function get_term_top_most_parent( $term_id, $taxonomy ) {
    $parent  = get_term_by( 'id', $term_id, $taxonomy );
    while ( $parent->parent != 0 ){
        $parent  = get_term_by( 'id', $parent->parent, $taxonomy );
    }
    return $parent;
}  
$args = array(
    'base' => '%_%',
    'format' => '?page=%#%',
    'total' => 1,
    'current' => 0,
    'show_all' => False,
    'end_size' => 1,
    'mid_size' => 2,
    'prev_next' => True,
    'prev_text' => esc_html('« Previous', 'rt-theme'),
    'next_text' => esc_html('Next »', 'rt-theme'),
    'type' => 'plain',
    'add_args' => False,
    'add_fragment' => ''
); 

function rt_page_navigation() { 
  ?>
    <div class="wp-pagenavi">
      <ul>
        <?php
            global $wp_query;
            $big = 999999999; 
            $args = array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?page=%#%',
                'total' => $wp_query->max_num_pages,
                'current' => max( 1, get_query_var( 'paged') ),
                'show_all' => false,
                'end_size' => 3,
                'mid_size' => 2,
                'prev_next' => True,
                'prev_text' => esc_html('&laquo;', 'rt-theme'),
                'next_text' => esc_html('&raquo;', 'rt-theme'),
                'type' => 'list',
                );
            echo paginate_links($args);
        ?>
        </ul>
    </div>
  <?php
}
add_action('rt_after_content_post_pagenavi','rt_page_navigation');