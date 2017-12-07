<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
	return;
}

?>
  
  <?php 
$notices=wc_get_notices('error');
if(count($notices)):?>
    <script>
     jQuery(document).ready(function(){
     jQuery('#myModal').modal('show');
         
     });
  

    </script>
    
<?php endif;?> 
  
   <?php wc_print_notices(); 
   // print_r(wc_get_notices('error'));?>
    <form class="woocomerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

        <?php do_action( 'woocommerce_login_form_start' ); ?>

        <?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; ?>

        <p class="form-row form-row-first">
            <label for="username"><?php _e( 'Email Address:', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="email" class="input-text form-control" name="username" id="username" />
        </p>
        <p class="form-row form-row-last">
            <label for="password"><?php _e( 'Password:', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input class="input-text form-control" type="password" name="password" id="password" />
        </p>
        <div class="clear"></div>
        <div class="clearfix forgot_pass">            
            
            <p class="lost_password pull-left">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
                        <?php _e( 'Forgot your password?', 'woocommerce' ); ?>
                    </a>
            </p>
            <div class="checkbox pull-right">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" / style="position:initial;"> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
		</label>
            </div>
        </div>
        <?php do_action( 'woocommerce_login_form' ); ?>

        <p class="form-row rploginbtnBox">
            <?php wp_nonce_field( 'woocommerce-login' ); ?>
            <input type="submit" class="button btn submit_btn" name="login" value="<?php esc_attr_e( 'Sign In', 'woocommerce' ); ?>" />            
            <input type="hidden" id="loginbtn" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />

        </p>
        

        <div class="clear"></div>

        <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>



  

