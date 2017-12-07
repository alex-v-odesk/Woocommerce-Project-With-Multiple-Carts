<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 

get_product_search_form();

?>

<div class="wrap">

	<header class="page-header">
	<?php 
    $search_arg=array('post_type'=>'product','s'=>get_search_query());
    $rp_search=new WP_Query($search_arg);
    ?>
		<?php if (  $rp_search->have_posts() ) : ?>
		<hr style="margin:5px 0px;background: #ddd; height: 2px;">
			<h1 class="page-title" style="font-family: 'ProximaNova-Semibold';font-size:28px;">Search Results for: <?php printf( __( '"%s"', 'twentyseventeen' ), '<span style="font-family: ProximaNova-regular;">' . get_search_query() . '</span>' ); ?></h1>
		<hr style="margin:5px 0px;background: #ddd; height: 2px;">
		<?php else : ?>
		<div class="gallery catalog_banner clearfix"></div>
			<h1 class="page-title rptitle"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!-- Start desktop gallery -->
				<div class="gallery pt50 clearfix hidden-xs">
					<ul class="list-inline clearfix">
		<?php
		if (  $rp_search->have_posts() ) :
			/* Start the Loop */
			while (  $rp_search->have_posts() ) :  $rp_search->the_post();
                       
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'search' );

			endwhile; // End of the loop.
            wp_reset_postdata();
			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else : ?>

			<p style="font-family: 'ProximaNova-Semibold';"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				//get_search_form();

		endif;
		?>

        </ul></div>
				
				<!-- Start mobile gallery -->
				<div class="gallery mob_gallery pt50 clearfix hidden-lg hidden-md hidden-sm">
					<ul class="list-inline clearfix">
					<?php
		if (  $rp_search->have_posts() ) :
			/* Start the Loop */
			while (  $rp_search->have_posts() ) :  $rp_search->the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'search' );

			endwhile; // End of the loop.
            wp_reset_postdata();
			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else : ?>

			<p style="font-family: 'ProximaNova-Semibold';"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				//get_search_form();

		endif;
		?>
         </ul></div>


		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->

<style>
    .catalog_banner {
    position: relative;
    background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/catalog_banner.jpg);
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center !important;
    min-height: 250px;
    margin-top: 25px;
}
    .out-of-stock-img img{opacity: .4;}
    .rp-product-meta{
        min-height: 75px;
        text-align: left;
        color: #000;       
    }
    .gallery a{
        text-decoration: none;
    }
    .gallery ul li{
        float: left;
    }
    p.stock.out-of-stock{top: 30%;}
    @media only screen and (max-width:480px){
        p.stock.out-of-stock{
            padding: 3px;
            margin-top: 0;
            top:33%;
        }
    }
</style>
<script>
jQuery(document).ready(function(){
    jQuery("div.rp-product-meta").find("p.rpShopCat").each(function(){
        $(this).parents("div.gallery_grid").addClass("out-of-stock-img");
    });;
});

</script>
<?php get_footer();
