<?php
/**
 * @package Raothue
 * @subpackage RT_Theme
 * @since 1.0
 * @version 1.0
 */
global $rt_option;
$new = $rt_option['product_category']; 
$num_post = $rt_option['numberpost'];
$style_post = $rt_option['style_category'];
$i=0;
foreach($new as $news) :
$i++;
$news_post = $news['product_category_sub'];
$news_title = $news['product_category_title']; 
?>
<div class="list list-<?php echo $i; ?>  <?php echo $style_post; ?> clear">
	<h2 class="heading">
		<a href="<?php echo get_category_link($news_post); ?>">
       		<?php if(!empty($news_title)) echo $news_title;else echo get_cat_name($news_post); ?>
       	</a>
    </h2>
    <div class="list-news row">
		<?php
			$main_post = new WP_Query( 'cat='.$news_post.'&showposts='.$num_post );
			$i=0;
		    while ( $main_post -> have_posts() ) :
		    $main_post -> the_post();
			$i++;
			if( $i == 1 ) {
		?>
		<div class="left col-md-6">
			<div class="news-post news-post-big news-post-<?php echo $i; ?>" >
				<?php if ( get_the_post_thumbnail() && ! is_single() ) : ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'large' ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="content">
				    <a href="<?php the_permalink();?>" class="news-title" title="<?php the_title();?>"><?php echo the_title(); ?></a>
					<?php the_content_limit('200','Xem thêm');?>
				</div>
			</div>
		</div>
		<div class="right col-md-6">
		<?php }else{ ?>
		<div class="news-post news-post-small news-post-<?php echo $i; ?>" >
			<?php if ( get_the_post_thumbnail() && ! is_single() ) : ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'medium' ); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="content">
			    <a class="news-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo the_title(); ?></a>
				<?php the_content_limit('100','Xem thêm');?>
			</div>
		</div>
		<?php } ?>
		<?php
			endwhile; wp_reset_postdata(); 
		?>
		</div>
	</div>
</div>
<?php endforeach; ?>