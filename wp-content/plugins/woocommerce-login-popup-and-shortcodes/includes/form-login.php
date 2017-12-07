<?php
/**
 * Login Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !function_exists( 'woo_login_popup_sc_login' ) ):
	add_action( 'woo_login_popup_sc_modal', 'woo_login_popup_sc_login' );
	function woo_login_popup_sc_login( $visible ){ ?>

		<div id="woo-login-popup-sc-login" class="woo-login-popup-sc <?php echo ( $visible == 'login' ) ? 'woo-login-popup-sc-show' : '';?> ">
			<h2><?php _e( 'SIGN IN', 'woo-login-popup-shortcodes' ); ?></h2>
			<p class="lead_txt">
			<?php _e( 'Please sign in to see pricing, download catalogs and place your order.', 'woo-login-popup-shortcodes' ); ?></p>

			<form method="post" class="login">

				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="username"><?php _e( 'Email Address:', 'woo-login-popup-shortcodes' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="password"><?php _e( 'Password:', 'woo-login-popup-shortcodes' ); ?> <span class="required">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
				</p>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<p class="form-row">				   
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<p>
					<a href="#woo-login-popup-sc-password" class="woo-login-popup-sc-toggle pull-left rpforget"><?php _e( 'Forgot your password?', 'woo-login-popup-shortcodes' ); ?></a>
					 
						<label for="rememberme" class="inline pull-right">
							<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woo-login-popup-shortcodes' ); ?>
						</label>
					</p>
					<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log In', 'woo-login-popup-shortcodes' ); ?>" />
				</p>
				<p class="woocommerce-LostPassword lost_password">
					<?php if( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) :?>
						<a href="#woo-login-popup-sc-register" class="woo-login-popup-sc-toggle rpregister" >Don't have an account?<span>
                            <?php _e( " Register Here.", 'woo-login-popup-shortcodes' ); ?></span></a>
					<?php endif;?>
					
				</p>

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>
		</div>

	<?php }
endif;

?>
