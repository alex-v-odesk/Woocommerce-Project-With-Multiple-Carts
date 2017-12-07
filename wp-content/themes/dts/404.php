<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<style>
    .rpBanner{
        background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/hero-large.jpg);
    }
    .page-title-main{
    font-family: 'de-novembre';
    font-size: 126px;
    color: #000;
    }
    .page-title{
        color: #000;
        font-family: 'ProximaNova-Semibold';
        margin-bottom: 100px;
    }
</style>    
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
            <div class="banner_bg clearfix rpBanner">
                <div class="tagline">
                  
                </div>

            </div>
				<h1 class="page-title-main"><?php _e( 'Oops!', 'twentyseventeen' ); ?></h1>
				
				
					<h2 class="page-title"><?php _e( 'The page you are looking for can&rsquo;t be found.', 'twentyseventeen' ); ?></h2>
				</header><!-- .page-header -->
				<!--<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>

					<?php //get_search_form(); ?>

				</div>--><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
