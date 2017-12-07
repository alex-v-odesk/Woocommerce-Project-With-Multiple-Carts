<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<style>
    .email_banner{background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/hero.png)!important;} 
</style>

<?php 
$emailid="dts@dougthorsonsales.com";
if(get_field('company_email','option')){$emailid=get_field('company_email','option');}
$toll_free_number="1-800-726-8979";
if(get_field('toll_free_number','option')){$toll_free_number=get_field('toll_free_number','option');}
?>



<p><?php printf( __( 'Welcome to %1$s! We are thrilled that you have joinded our family. We will work diligently to earn and retain your trust and confidence. We hope this will be the beginning of a long-term relationship.', 'woocommerce' ), esc_html( $blogname ) ); ?></p>

<p><?php printf( __( 'If you need any assistance, please email %1$s, or call us toll-free at  %2$s.', 'woocommerce' ), '<strong>' .esc_html( $emailid ) . '</strong>', '<strong>' . esc_html( $toll_free_number ) . '</strong>' ); ?></p>
<!--
<p><?php printf( __( 'Your account username is %1$s.', 'woocommerce' ),'<strong>' . esc_html( $user_login ) . '</strong>' ); ?></p>

<p><?php printf( __( 'Thanks for creating an account on %1$s. Your username is %2$s', 'woocommerce' ), esc_html( $blogname ), '<strong>' . esc_html( $user_login ) . '</strong>' ); ?></p>-->

<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

	<p><?php printf( __( 'Your password has been automatically generated: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>

<?php endif; ?>

<!--	<p><?php printf( __( 'You can access your account area to view your orders and change your password here: %s.', 'woocommerce' ), make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p>
-->
<p>Thank you for registering!<br>
<strong>Sherry Thorson</strong></p>
<p style="text-align:center;">
    <a href="<?php echo bloginfo('url');?>" class="rpbutton">SHOP NOW</a>
    
</p>


<?php do_action( 'woocommerce_email_footer', $email ); ?>
<style>
.rptitle {
    color: #000;
    font-size: 90px;
    font-family: 'de-novembre' !important;
    margin-bottom: 10px;
    line-height: 80px;
}
</style>