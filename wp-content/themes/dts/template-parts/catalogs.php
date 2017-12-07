<?php
/*

Template name: Catalogs
*/
get_header();
?>

<?php

if( get_query_var('paged') ) {
  $page = get_query_var( 'paged' );
} else {
  $page = 1;
}

?>  
   
   
    <!-- Start banner -->
    <div class="gallery catalog_banner clearfix">
    </div>

    <?php $catalog_arg=array('post_type'=>'vendor_catalogs','posts_per_page'=>2,'paged' => $page);?>
    <?php $catelogs=new WP_Query($catalog_arg);?>
    <?php if($catelogs->have_posts()):?>
    <div class="gallery vendor_gallery hidden-xs">
        <h1 class="text-uppercase">Vendor Catalogs</h1>
        <ul class="list-inline clearfix">
            <?php  while($catelogs->have_posts()): $catelogs->the_post();  ?>
                <li>
                    <div class="cat_img">
                        <img src="<?php echo get_the_post_thumbnail_url();?>">
                    </div>
                    <h3>
                        <?php the_title();?>
                    </h3>
                    <p>
                        <?php the_content();?>
                    </p>
                    <a class="download_link" href="<?php if(get_field("vendors_catalogs")){the_filed("vendors_catalogs");}else{
                            echo 'javascript:void(0);';
                            }?>"><i class="fa fa-download"></i> Download</a>
                </li>
                
                <?php endwhile;?>
            
            <div style="text-align:right;"><?php wp_pagenavi( array( 'query' =>$catelogs  ) );  ?></div>
            <?php wp_reset_postdata();?>
               
                
        </ul>
  
    </div>
    <?php else : ?>
    <h1>No Catalog Found!</h1>
    <?php endif; ?>



   <?php $catelogs=new WP_Query($catalog_arg);?>
    <?php if($catelogs->have_posts()):?>
    <!-- Start mobile gallery -->
    <div class="vendor_gallery mob_gallery pt50 clearfix hidden-lg hidden-md hidden-sm">

        <h1 class="text-uppercase">Vendor Catalogs</h1>
        <ul class="list-inline clearfix">
           <?php  while($catelogs->have_posts()): $catelogs->the_post();  ?>
                <li>
                    <div class="cat_img">
                        <img src="<?php echo get_the_post_thumbnail_url();?>">
                    </div>
                    <h3>
                        <?php the_title();?>
                    </h3>
                    <p>
                        <?php the_content();?>
                    </p>
                    <a class="download_link" href="<?php if(get_field("vendors_catalogs")){the_filed("vendors_catalogs");}else{
                            echo 'javascript:void(0);';
                            }?>"><i class="fa fa-download"></i> Download</a>
                </li>
                 <?php endwhile; wp_reset_postdata();?>
        </ul>

        <div class="mob_gallry_pagination">
            <p class="pull-left back_to_top"><a href="#">Back to top</a></p>
            
            
            
            <ul class="pagination">
                <li><a href="#">View All</a></li>
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li><span>1/8</span></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>

    </div>
    <?php else : ?>
    <h1>No Catalog Found!</h1>
    <?php endif; ?>





    <style>
        .catalog_banner {
            position: relative;
            <?php $url=wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            ?>background: url(<?php if($url) {
                echo $url;
            }
            else {
                echo get_stylesheet_directory_uri().'/assets/images/catalog_banner.jpg';
            }
            ?>);
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            min-height: 250px;
            margin-top: 25px;
        }

    </style>

    <?php get_footer();?>
