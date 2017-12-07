<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<style>
    .rpbanner{
        background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/hero-large.jpg);        
    }
    <?php if(is_account_page()):?>
    .entry-header > h1.entry-title{
     display: none;
    }
    <?php endif;?>
</style>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
     
          <?php if(is_checkout()):?>
                       <?php if(get_field('checkout_page_banner','option')){$checkout_banner=get_field('checkout_page_banner','option');}else{
            $checkout_banner=get_stylesheet_directory_uri().'/assets/images/hero-large.jpg';
        }?>
           <div class="banner_bg clearfix rpbanner" style="background:url(<?php echo $checkout_banner;?>);">
                <div class="tagline">                  
                </div>
            </div>
            <style>
            .entry-header > h1.entry-title {                
                display: none;               
            }
            </style>
           <?php endif;?>
            <?php if(is_cart()):?>
             <?php if(get_field('cart_page_banner','option')){$cart_banner=get_field('cart_page_banner','option');}else{
            $cart_banner=get_stylesheet_directory_uri().'/assets/images/hero-large.jpg';
        }?>
              <div class="banner_bg clearfix rpbanner" style="background:url(<?php echo $cart_banner;?>);">
                <div class="tagline">                  
                </div>
            </div>
            
            <style>
            .entry-header > h1.entry-title {                
                text-align: center;               
            }
            </style>
            <?php endif;?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
