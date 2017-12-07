<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 ?>

 <div class="banner_bg clearfix rpBanner">
    <div class="tagline">
    </div>
</div>

<form method="post" class="woocommerce-ResetPassword lost_reset_password">
<h2 class="woo-lost-password">Forgot your password?</h2>
	<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Please enter email address. You will receive an email with a link to create a new password.', 'woocommerce' ) ); ?></p>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="user_login"><?php _e( 'Email', 'woocommerce' ); ?></label>
		<input class="woocommerce-Input woocommerce-Input--text input-text" type="email" name="user_login" id="user_login" />
	</p>

	<div class="clear"></div>
<?php wc_print_notices();?>
	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'SUBMIT', 'woocommerce' ); ?>" />
	</p>

	<?php wp_nonce_field( 'lost_password' ); ?>

</form>

<style>
    .rpBanner{
        background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/hero-large.jpg);
    }
    .entry-title{display: none;}
</style>