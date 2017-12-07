<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="rpmyaccount">
<h2 class='myaccountHeading'>My Account</h2>
<p class="rpmyaccount-message" style="margin-top:10px;">
    <b>Welcome to your account dashboard!</b> From here, you can peruse your wishlists, check in on orders, manage your account information and contact your very own personal representative. We're here to help if you need us.
    
</p>
   
       <div class="row rpmyaccount-navigations">
            <div class="col-md-3 col-sm-6 col-xs-6">
               <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) );?>">
                <div class="gallery_grid">
                    <img src="<?php if(get_field('account_setting_nav_image','option')){the_field('account_setting_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>My Account setting</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="<?php echo bloginfo('url');?>/wishlists">
                 <div class="gallery_grid">
                    <img src="<?php if(get_field('my_list_nav_image','option')){the_field('my_list_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>My Lists<br><img style="width: 24px;" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/like_white.png"></p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) );?>">
                 <div class="gallery_grid">
                    <img src="<?php if(get_field('orders_nav_image','option')){the_field('orders_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>Order History</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="">
                 <div class="gallery_grid">
                    <img src="<?php if(get_field('contact_my_rep_nav_image','option')){the_field('contact_my_rep_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>Contact my Rep</p>
                </div>
                </a>
            </div>
       </div>
     <hr class="main">
     

<?php
wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
//do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">

	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
</div>


