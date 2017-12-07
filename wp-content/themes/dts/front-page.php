<?php
/**
Template name: Home
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header("home"); ?>

    <!-- Start about section -->
    <section class="about pt50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase">
                        <?php if(get_field("about_heading")){ the_field("about_heading");} ?>
                    </h1>
                    <?php if(get_field("about_content")){ the_field("about_content");} ?>
                    <?php if(get_field("about_button_text")){ ?>
                    <a href="<?php if(get_field(" about_button_link ")){ the_field("about_button_link "); }
                        else{  echo "javascript:void(0); ";}?>" class="register_btn">
                        <?php the_field("about_button_text");?>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End about section -->


      
    <section class="gallery pt50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 padding0">
                    <ul class="list-inline clearfix rphomecatpic">    
    <?php 

	$cat_arg=array('hide_empty' => false,'parent' => 0);
	foreach( get_terms('product_cat', $cat_arg) as $category) {
	//echo "<pre>";print_r($category);echo "</pre>";
	
?>
							
                        <li>
                            <a href="<?php echo get_category_link($category->term_id);?>">
                                <div class="gallery_grid">
                    <?php 
                        $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
	                    $image = wp_get_attachment_url( $thumbnail_id );
                    ?>
                                    <img src="<?php echo $image; ?>" class="img-responsive">
                                    <p><?php echo $category->name;?></p>
                                </div>
                            </a>
                        </li>
                               
                               
                            
<?php }wp_reset_query(); ?>    
         
          
           
            
    


                    </ul>
                </div>
            </div>
        </div>
    </section>
   
   
   
   
    <!-- Start gallery section -->
   <!-- <?php if( have_rows('home_gallery_images') ): ?>
    <section class="gallery pt50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 padding0">
                    <ul class="list-inline clearfix">


                        <?php while ( have_rows('home_gallery_images') ) : the_row();
                        $image=get_sub_field('galley_image');
                        $image_heading=get_sub_field('gallery_image_heading');
                        $image_link=get_sub_field('image_link');
                        ?>
                        <li>
                            <a href="<?php if($image_link){echo $image_link;}else{echo "javascript:void(0);";}?>">
                                <div class="gallery_grid">
                                    <img src="<?php echo $image; ?>">
                                    <p><?php echo $image_heading; ?></p>
                                </div>
                            </a>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>-->
    <!-- End gallery section -->

    <!-- Start video section -->
    <section class="video_sec pt50">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                <h1 class="text-uppercase text-center hidden-lg hidden-md hidden-sm">Take a peek at some<br> of our favorites</h1>
                
                <?php if ( is_active_sidebar( 'home_video' ) ) : ?>

		<?php dynamic_sidebar( 'home_video' ); ?>
	
<?php endif; ?>
               
               <!--
                
                
            <?php if(get_field("home_video_upload") || get_field("embed_video")){ ?>
                 
                 <?php if(get_field("upload__embade_video")=="Upload"):?>
					<?php if(get_field("home_video_upload")){ ?>            
                        <video width="100%" height="500" controls>
                          <source src="<?php the_field('home_video_upload');?>" type="video/mp4">
                          <source src="movie.ogg" type="video/ogg">
                          Your browser does not support the video tag.
                        </video>
                   <?php 
                    } ?>
                    <?php else:?>
                    <?php if(get_field("embed_video")){the_field("embed_video");}?>
                    <?php endif;?>
                <?php }else{ ?>
                   <h1 class="text-uppercase text-center hidden-lg hidden-md hidden-sm">
                   <?php if(get_field("video_heading")){the_field("video_heading");}?>
                    </h1>
				<div class="inner_video" style="background:url(<?php 
                        echo get_stylesheet_directory_uri()."/assets/images/video_bg2.png";?>)">
					<h1 class="text-uppercase text-center hidden-xs">
					<?php if(get_field("video_heading")){the_field("video_heading");}?></h1>
					<a href="#"><img class="video_icon" src="<?php 
                        echo get_stylesheet_directory_uri()."/assets/images/play-icon.png";?>"></a>
				</div>
                  
                   
                <?php } ?>
                   
                  -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End video section -->

    <?php get_footer('home'); ?>
