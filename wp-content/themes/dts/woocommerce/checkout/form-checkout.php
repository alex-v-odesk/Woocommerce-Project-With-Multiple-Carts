<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">			
				<?php do_action( 'woocommerce_checkout_billing' ); ?>			
		</div>
		<div class="col2-set" id="customer_details">			
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>		
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
    <hr style="background:#000;height:1px;margin:30px 0px;">
	<h3 class="rpsubtitle-small" id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
	<h1 class="rpsubtitle-color"><?php echo rp_get_cart_root_cat()->name;?></h1>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
<style>

.rpbanner{		    
        background: url(<?php if(get_field('checkout_page_banner','option')){the_field('checkout_page_banner','option');}else{
       echo get_stylesheet_directory_uri().'/assets/images/cart_banner.jpg'; }?>);
}
[type="checkbox"]:not(:checked) + label, [type="checkbox"]:checked + label {
    padding-top: 4px;
}
</style>

<script>
    jQuery(document).ready(function(){        
     jQuery('#ship-to-different-address-checkbox').change(function() {
                if(this.checked){   
                    // rp_emptyShipping();                    
                    jQuery("#select_shipping_address_nickname").val("-1").trigger("change");
                }else{
                    rp_fillShipping();
                    jQuery("#shipping_address_nickname").val("Same as Billing");
                }
        });

jQuery("#billing_country").change(function(){
            setTimeout(function(){
        if(jQuery("#billing_state_field").is(':visible')){
            jQuery("#billing_postcode_field").removeClass("clear");
            
        }else{
            jQuery("#billing_postcode_field").addClass("clear");
            
        }
    },1000);
            setTimeout(function(){
                jQuery("#billing_postcode_field").insertAfter("#billing_state_field");
                jQuery("#billing_country_field").insertAfter("#billing_city_field");
            },1100);

    });
jQuery("#shipping_country").change(function(){
            setTimeout(function(){
        if(jQuery("#shipping_state_field").is(':visible')){
            jQuery("#shipping_postcode_field").removeClass("clear");
            
        }else{
            jQuery("#shipping_postcode_field").addClass("clear");
            
        }
    },1000);
            setTimeout(function(){
                jQuery("#shipping_postcode_field").insertAfter("#shipping_state_field");
                jQuery("#shipping_country_field").insertAfter("#shipping_city_field");
            },1100);

    });


});

function rp_fillShipping(){  
   jQuery("input[name='shipping_address_1']").val(jQuery("input[name='billing_address_1']").val());
    jQuery("input[name='shipping_address_2']").val(jQuery("input[name='billing_address_2']").val()); 
    jQuery("input[name='shipping_city']").val(jQuery("input[name='billing_city']").val());    
    jQuery("#shipping_country").val(jQuery("#billing_country").val()).trigger('change');
    jQuery("input[name='shipping_postcode']").val(jQuery("input[name='billing_postcode']").val());   
    jQuery("#shipping_state").val(jQuery("#billing_state").val()).trigger('change');
}
function rp_emptyShipping(){  
   jQuery("input[name='shipping_address_1']").val("");
    jQuery("input[name='shipping_address_2']").val(""); 
    jQuery("input[name='shipping_city']").val("");      
    jQuery("#shipping_country").val("").trigger('change');
    jQuery("#shipping_state").val("");    
    jQuery("input[name='shipping_postcode']").val(""); 
}
</script>

<style type="text/css">
    .clear{
        clear:both;
    }
</style>