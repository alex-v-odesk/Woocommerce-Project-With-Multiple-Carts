<?php 
/*
* Template name: Registration    
*/
get_header();
?>
<div class="banner_bg clearfix rpbanner">
    <div class="tagline">                  
    </div>
</div>

<?php while(have_posts()):the_post();the_content();endwhile;?>
<style>
    .registration-form > h2{display: none;}   
</style>
<?php get_footer(); ?>
