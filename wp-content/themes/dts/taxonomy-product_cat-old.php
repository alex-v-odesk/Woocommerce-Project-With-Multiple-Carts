<?php
/*
Template name: Test
*/
/*
$strURL = $_SERVER['REQUEST_URI'];
echo $strURL;
$arrVals = explode("/",$strURL);
echo "<pre>";print_r($arrVals);echo "</pre>";
$ct=count($arrVals);
echo $ct;
if(!is_numeric($arrVals[$ct-1])){
$ctt=get_term_by( 'slug', $arrVals[$ct-2], 'product_cat');
    echo $ctt->term_id;
echo "<pre>";print_r($ctt);echo "</pre>";
$categoryId=$ctt->term_id;
}else{
    $page=$arrVals[$ct-1];
    $ctt=get_term_by( 'slug', $arrVals[$ct-3], 'product_cat');
    $categoryId=$ctt->term_id;
}*/

get_header();
?>

    <?php

if( get_query_var('paged') ) {
  $page = get_query_var( 'paged' );
} else {
  $page = 1;
}




$obj = get_queried_object();
$categoryId=$obj->term_id;

$children = get_terms( $term->taxonomy, array(
'parent'    => $categoryId,
'hide_empty' => false
) );

?>

        <?php
	$args = array(
			'delimiter' => '',
			'before' => '<li>',
            'after' => '</li>',
            'wrap_before'=> '<ul class="breadcrumb hidden-sm hidden-xs">',
            'wrap_after'=>'</ul>'
	);
?>

            <?php woocommerce_breadcrumb( $args ); ?>


            <div class="selct_boxed">
                <select id="selectbox1">
						<option value="">SHOP BY COLLECTION</option>
						<option value="Camp">Camp Harvest</option>
						<option value="Orchand">Christmas Tree Orchand</option>
						<option value="Mountain">Copper Mountain</option>
						<option value="Deck">Deck The Shore</option>
						<option value="Merry">Everything Merry</option>
						<option value="Snow">First Snow</option>
						<option value="Harvest">Garden Harvest</option>
						<option value="Tidings">Glad Tidings</option>
						<option value="Botanical">Golden Botanical</option>
						<option value="Greenery">Greenery</option>
						<option value="Halloween">Halloween</option>
					</select>

                <select id="selectbox2">
						<option value="">SHOP BY CATEGORY</option>
						<option value="c1">Category One</option>
						<option value="c2">Category Two</option>
						<option value="c3">Category Three</option>
						<option value="c4">Category Four</option>
					</select>

            </div>


            <div class="banner_bg clearfix">
                <div class="tagline">
                    <h1>
                        <?php single_cat_title();?>
                    </h1>
                    <p>by <span style="font-family: 'Noticia Text', serif; font-size: 20px; letter-spacing: 0;">RAZ IMPORTS INC.</span></p>
                </div>

                <div class="shop_hero_btn">
                    <a href="#">Shop Collection</a>
                </div>
            </div>
            <?php if(!is_subcategory($categoryId)):?>
            <div class="banner_about_bottom about text-center pt50 clearfix">
                <h1 class="text-uppercase">Create eye-catching the entire holiday season.</h1>
                <p>Raz Imports' many themes and styles make it easy for you to create your individual look. Invite in Fall with florals, garlands and wreaths. Create spooky Halloween decor with our pumpkins, witches, crows and candles. The Christmas line offers everything you need to tie your winter and holiday looks together. Raz Imports Christmas line debuts yearly at our January shows, and ships to you June or later.</p>
            </div>
            <?php endif;?>

 <?php if(!is_subcategory($categoryId)):?>
            <!--Sliding products-->
            <div class="product_slider clearfix pt50">
                <div class="clearfix prod_header">
                    <h1 class="pull-left">Top 25 Bestsellers</h1>
                    <a href="#" class="pull-right view_all">View all</a>
                </div>


               
                <div class="clearfix">
                    <div class="prod_slide">
                        <?php
$args = array(
    'category'=>$categoryId,
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 25,
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
global $product; ?>

                            <div>
                                <div class="gallery_grid">

                                    <?php if (has_post_thumbnail( $loop->post->ID )) 
        echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
        else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="65px" height="115px" />'; ?>
                                </div>
                            </div>



                            <?php endwhile; ?>

                            <?php wp_reset_postdata(); ?>

                    </div>
                </div>
                

            </div>


            <!-- Start Desktop gallery -->
            <?php 
                    $product_arg=array('category' =>$categoryId,'post_type'=>'product','posts_per_page'=>4,
                                       'paged' => $page );
                    $product_cat_q=new WP_Query($product_arg);
    
                    if($product_cat_q->have_posts()):
                ?>
            <div class="gallery pt50 clearfix hidden-sm hidden-xs">
                <ul class="list-inline clearfix">
                    <?php while($product_cat_q->have_posts()):$product_cat_q->the_post();?>
                    <li>
                        <a href="<?php the_permalink();?>">
                            <div class="gallery_grid">
                                <img src="<?php echo get_the_post_thumbnail_url();?>">
                                <p>
                                    <?php the_title();?>
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php endwhile;?>

                    <div style="text-align:right;">
                        <?php //wp_pagenavi( array( 'query' =>$product_cat_q  ) );  ?>
                    </div>

                    <?php   wp_reset_postdata(); ?>
                </ul>
            </div>
            <?php endif;?>



            <!-- Start mobile gallery -->

            <?php 
                    $product_arg=array('category' =>$categoryId,'post_type'=>'product','posts_per_page'=>24,
                                       'paged' => $page );
                    $product_cat_q=new WP_Query($product_arg);
    
                    if($product_cat_q->have_posts()):
                ?>
            <div class="gallery mob_gallery pt50 clearfix hidden-lg hidden-md hidden-sm">
                <ul class="list-inline clearfix">
                    <?php while($product_cat_q->have_posts()):$product_cat_q->the_post();?>
                    <li>
                        <a href="<?php the_permalink();?>">
                            <div class="gallery_grid">
                                <img src="<?php echo get_the_post_thumbnail_url();?>">
                                <p>
                                    <?php the_title();?>
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <div style="text-align:right;">
                        <?php wp_pagenavi( array( 'query' =>$product_cat_q  ) );  ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                </ul>

                <div class="mob_gallry_pagination">
                    <ul class="pagination">
                        <li><a href="#">View All</a></li>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><span>1/4</span></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>

            </div>
            <?php endif;?>
            
                        

            <!--Video-->
            <div class="video_sec vendor_video pt50">
                <h1 class="text-uppercase text-center hidden-lg hidden-md hidden-sm">Take a peek at some<br> of our favorites</h1>
                <div class="inner_video">
                    <h1 class="text-uppercase text-center hidden-xs">Take a peek at some<br> of our favorites</h1>
                    <a href="#"><img class="video_icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/play-icon.png"></a>
                </div>
            </div>

<?php endif;?>

            <style>
                <?php $url=wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                ?>.banner_bg {
                    position: relative;
                    background: url(<?php 
 echo get_stylesheet_directory_uri().'/assets/images/vendor_banner.png';
                    ?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    min-height: 460px;
                }
                
                .vendor_video .inner_video {
                    position: relative;
                    background: url(<?php echo get_stylesheet_directory_uri();
                    ?>/assets/images/vendor_video_bg.jpg);
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    min-height: 500px;
                    padding: 60px 0px;
                    text-align: center;
                }
                
                @media only screen and (max-width: 490px) {
                    .banner_bg {
                        background: url(<?php 
 echo get_stylesheet_directory_uri().'/assets/images/mob_vendor_banner.jpg';
                        ?>);
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                    }
                }

            </style>

            <?php 
function is_subcategory ($catid) {
    $cat_data = get_category($catid);
    if ( $cat_data->parent )
        return true;
    else
        return false;
}?>
            <?php get_footer();?>
