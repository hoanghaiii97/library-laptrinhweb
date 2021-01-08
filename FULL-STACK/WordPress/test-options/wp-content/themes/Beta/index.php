<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __RT
 * @subpackage RT_Theme
 * @since 1.0
 * @version 1.0
 */
global $rt_option;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    	<?php do_action('rt_before_main'); ?>

	  	<div class="rt-info container">
	  		<div class="row">
		  		<div class="info-tranfer">
	                <?php  
	                    $info = $rt_option['info_gr'];
	                    if(!empty($info)){
	                    foreach ($info as $info_gr) {
	                    $image = wp_get_attachment_image_src( $info_gr['image_icon'], 'full' );
	                    $title = $info_gr['info_title'];
	                    $decr = $info_gr['info_des'];
	                ?>
	                    <div class="item">
	        
	                            <div class="left"><img src="<?php echo $image[0] ; ?>"></div>
	                            <div class="right">
	                            	<h5><?php echo $title; ?></h5>
	                                <div><?php echo wpautop($decr); ?></div>
	                            </div>
	            
	                    </div>
	                <?php
	                        }
	                    }
	                ?>
	           	</div>
		  		</div>
		</div>


		<div class="product_home clear container">
			<?php  
				$product_cat = $rt_option['product_cat'];
		        $num_product = $rt_option['numberproduct'];
		        $style_prd = $rt_option['style_prd'];
		        foreach($product_cat as $products_cat) :
		        $product = $products_cat['product_cat_sub'];
		    	if(!empty($product)) {
		    	$getcat = get_term_by( 'id', $product , 'product_cat' );
		    	$Id_Pro = $getcat->term_id;
		    	$slogan = $products_cat['slogan-cate'];
		    	// var_dump($slogan);
		    ?>
		    	<div class="product_list clear">
		    		<h2 class="heading">
		    			<a href="<?php echo get_term_link($Id_Pro); ?>">
			           		<?php echo $getcat->name; ?>
			           	</a>
			        </h2>
			        <?php if (!empty($slogan)): ?>
			        	<span class="slogan-cate"><?php echo $slogan; ?></span>
			        <?php endif ?>
		            <div class="home-product">
		                <?php 
		                 $argscat = new WP_Query(array(
		                    'post_type' => 'product',
		                    'tax_query' => array(
		                      	array(
		                          	'taxonomy' => 'product_cat',
		                          	'field' => 'id',
		                          	'terms' => $product
		                      	)
		                  	),
		                  	'posts_per_page' => $num_product
		                  ));
		                ?>
		                <ul class="woocommerce product-style <?php echo $style_prd; ?>">
		                     <?php
		                         while($argscat -> have_posts()):
		                             $argscat -> the_post();
		                     ?>
		                    <?php get_template_part( 'woocommerce/content', 'product' ); ?>
		                    <?php  endwhile; wp_reset_postdata(); ?>
		                </ul>
		            </div>
		    	</div>
			<?php
				}
		        endforeach;
			?>
		</div>
		<div class="clear"></div>
		<!-- End Product -->

		<div class="slogan-text">
			<div class="container">
				<?php
				$sl = $rt_option['title_tuvan'];
				$sl2 = $rt_option['mota'];
				$des = $rt_option['description'];
				$link = $rt_option['link_url'];
				?>
				<h2 class='text-slo'><?php echo $sl; ?></h2>
				<h2 class='text-slo2'><?php echo $sl2; ?></h2>
				<div class="des"><?php echo $des; ?></div>
				<div class="xemxem"><a href="<?php echo $link ; ?>"> Xem sản phẩm</a></div>
			</div>
		</div>

		<div class="clear"></div>

		<div class="product_home clear container">
			<?php  
				$product_cate = $rt_option['product_cat_cate'];
				$slogan_cate = $rt_option['mota_cate'];
		    	  // var_dump($product_cate);
		    	 ?>
		    	 <h2 class="heading"><a href="#">đồ da nam cao cấp</a></h2>
		    	 <?php if (!empty($slogan_cate)): ?>
			        	<span class="slogan-cate"><?php echo $slogan_cate; ?></span>
			        <?php endif ?>
		    	 <?php
		    	echo "<div class='list-cate-pro'>";
		        foreach($product_cate as $product_cate) :
		        $product2 = $product_cate['product_cat_sub_cate'];
		    	$img_cate = $product_cate['img_cate'];

				$attachment = wp_get_attachment_image_src( $img_cate, 'full' );

		    	
		    	// var_dump($img_cate);
		    	if(!empty($product2)) {
		    	$getcat = get_term_by( 'id', $product2 , 'product_cat' );
		    	$Id_Pro2 = $getcat->term_id;
		    	$count_sp = $getcat->count;
		    	// var_dump($getcat);
		    ?>
		    	<div class="product_list">
		    		<div class="list-cate">
		    		<div class="rt-thumb">
		    			<?php
		    			echo "<a class='img-pro' href='". get_term_link($Id_Pro2)  ."'><img src='". $attachment[0] ."'></a>";
		    			?>
		    			<a href="<?php echo get_term_link($Id_Pro2); ?>" class="count-pro"><?php echo $count_sp; ?> product</a>
		    		</div>
		    		<h2>
		    			<a href="<?php echo get_term_link($Id_Pro2); ?>">
			           		<?php echo $getcat->name; ?>
			           	</a>
			        </h2>
			        <div class="vews-all"><a href="<?php echo get_term_link($Id_Pro2); ?>">
			           		Xem sản phẩm
			           	</a></div>
		    		</div>
		    	</div>
			<?php
				}
		        endforeach;
		       echo "</div>";
			?>
		</div>



		<div class="news-home clear container">
			<?php  
				$new = $rt_option['product_category']; 
		        $num_post = $rt_option['numberpost']; 
		    	$style_post = $rt_option['style_category'];
		        foreach($new as $news) :
		        if(!empty($news)) {
		        $news_post = $news['product_category_sub'];
		        $slogan_category = $news['slogan-category'];
		          // var_dump($slogan_category);
		    ?>
		    	<div class="list <?php echo $style_post; ?> clear">
		    		<h2 class="heading">
		    			<a href="<?php echo get_category_link($news_post); ?>">
			           		<?php echo get_cat_name($news_post); ?>
			           	</a>
			        </h2>
			        <?php if (!empty($slogan_category)): ?>
			        	<span class="slogan-cate"><?php echo $slogan_category; ?></span>
			        <?php endif ?>

			        <div class="list-news">
			         <?php echo do_shortcode('[rtblog style="'.$style_post.'" posts_per_page="' . $num_post . '" categories="' . $news_post . '" custom_text="Xem Thêm"]'); ?>
		            </div>
		    	</div>
		    	<?php
		    		}
		            endforeach;
				?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
