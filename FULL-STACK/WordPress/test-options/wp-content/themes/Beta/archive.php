<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __RT
 * @subpackage RT_Theme
 * @since 1.0
 * @version 1.0
 */

  get_header(); 
  $current_cat_id = get_query_var('cat');
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php do_action('rt_before_main'); ?>
    <div class="arc-news">
      <h1 class="heading"><span><?php echo get_cat_name( $current_cat_id );?></span></h1>
      <div class="new-list">
                <?php
                    $arg = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'id',
                            'terms' => $current_cat_id
                        )
                    ),
                    'paged'=> get_query_var('paged'),
                    );
                    $news_post = new WP_Query($arg);
                    while($news_post -> have_posts()) :
                        $news_post -> the_post();
                    ?>
                    <div class="news-post">
                           <h2 class="title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo the_title();?></a></h2>
                            <div class="date-time">
                              <span><i class="fa fa-user" aria-hidden="true"></i> By : <?php the_author_posts_link(); ?></span> <span><i class="fa fa-eye" aria-hidden="true"></i><?php echo get_post_views (get_the_ID());?></span><span><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('d/m/Y'); ?></span>
                            </div>
                            <div class="img-post">
                              <a href="<?php the_permalink();?>" title="<?php the_title();?>">

                           <?php if(has_post_thumbnail()) the_post_thumbnail("medium",array("alt" => get_the_title()));
                               else echo ""; ?>
                           </a>
                           <div class="mask">
                               <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo the_title();?></a></h2>

                                <p><?php the_excerpt() ;?></p>

                               
                           </div>
                            </div>
                           
                           <?php the_content_limit('800','Đọc Thêm');?>
                  <a class="read-more" href="<?php the_permalink();?>" title="<?php the_title();?>">Xem thêm</a>
                    </div>
                    <?php
                        endwhile; 
                        do_action('rt_after_content_post_pagenavi');
                        wp_reset_postdata();
            ?>
          </div>
         </div><!--End #news-wrap-->

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
