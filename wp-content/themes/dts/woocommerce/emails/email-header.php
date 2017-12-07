<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
        <title>
            <?php echo get_bloginfo( 'name', 'display' ); ?>
        </title>

        
    </head>

    <body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'?>">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tr>
                    <td align="center" valign="top">
                        <div id="template_header_image">
                            <?php
								if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
									echo '<p style="margin-top:0;"><img src="' . esc_url( $img ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" /></p>';
								}
							?>
                        </div>
                        <table style="padding: 50px;" border="0" cellpadding="0" cellspacing="0" width="800" id="template_container">
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Header -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="800" id="template_header">
                                        <tr>
                                            <td style="vertical-align: bottom;"><h1 id="seenew">SEE WHAT'S NEW</h1></td>
                                            <td>
                                               
                                                    <a href="<?php echo get_bloginfo( 'url', 'display' ); ?>"><img src="http://profusenx.com/7/dts/wp-content/uploads/2017/09/logo.png"></a>
                                                
                                            </td>
                                            <td style="vertical-align: bottom;">
                                                <div class="social-icon clearfix">
                                                    <ul class="list-inline pull-right">
                                                        <li><a href="<?php if(get_field(" company_pinterest ","option ")){the_field("company_pinterest ","option ");}else{echo "javascript:void(0); ";}?>" title="pinterest"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/pinterest.png"></a></li>
                                                        <li><a href="<?php if(get_field(" company_facebook ","option ")){the_field("company_facebook ","option ");}else{echo "javascript:void(0); ";}?>" title="facebook"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/facebook.png"></a></li>
                                                        <li><a href="<?php if(get_field(" company_instagram ","option ")){the_field("company_instagram ","option ");}else{echo "javascript:void(0); ";}?>" title="Instagram"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/instagram.png"></a></li>
                                                    </ul>
                                                </div>


                                            </td>

                                        </tr>
                                       
                                      <!--  <tr>
                                            <td id="header_wrapper">

                                                <h1>
                                                    <?php echo $email_heading; ?>
                                                </h1>
                                            </td>
                                        </tr>-->
                                    </table>
                                    <!-- End Header -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Body -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="800" id="template_body">
                                        <tr>
                                            <td valign="top" id="body_content">
                                                <!-- Content -->
                                               <?php $customer_id = get_current_user_id();?>


<table border="0" cellpadding="0" cellspacing="0" width="800" id="template_body_inner">
<tr>
    <td colspan="3" style="padding:0;">
        <div class=" email_banner">                                            
        </div>
        <hr class="main">
         <h1 class="rptitle" style="
    color: #000;
    font-size: 25px;
    font-family: 'de-novembre' !important;
    margin-bottom: 10px;
    line-height: 80px;">
            <?php echo ucwords( "Hello ".esc_html( get_user_meta( $customer_id, 'first_name', true ) )).",";?>
        </h1>                                       
    </td>                                           
</tr>
<tr>
    <td valign="top" id="body_content_inner" style="padding:0;">