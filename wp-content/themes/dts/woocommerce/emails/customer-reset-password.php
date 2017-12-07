<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<style>
    .email_banner{background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/hero.png)!important;} 
</style>

<p><?php printf( __( '<b>Username:</b> %s', 'woocommerce' ), $user_email ); ?></p>
<p><?php _e( 'A request to reset password for this account has been submitted. If you wish to continue with resetting password, click the button below.', 'woocommerce' ); ?></p>

<p><?php _e( 'If this was a mistake, just ignore this email and nothing will happen.', 'woocommerce' ); ?></p>


<p>Thank you for registering!<br>
<strong>Sherry Thorson</strong></p>
<p style="text-align:center;">
	<a class="rpbutton" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
			<?php _e( 'reset password', 'woocommerce' ); ?></a>
</p>



<?php do_action( 'woocommerce_email_footer', $email ); ?>
