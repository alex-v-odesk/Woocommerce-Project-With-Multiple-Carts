<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
           <div class="woocommerce-order-header">
           
			<h1 class="rptitle"><?php _e( 'Thank you!', 'woocommerce' ); ?></h1>
			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order has been received. We appreciate your business, please contact us with any questions.', 'woocommerce' ), $order ); ?></p>
			
			<p class="return-to-shop">
                <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_get_cart_url', wc_get_page_permalink( 'cart' ) ) ); ?>">
                    <?php _e( 'Return to cart', 'woocommerce' ) ?>
                </a>
	        </p>
	        
			<hr style="height:2px; background:#ccc;margin:10px 0px;">
            </div>
            <h2 class="woocommerce-order-details__title rpsubtitle-small"><?php _e( 'Order details', 'woocommerce' ); ?></h2>
        
            
			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php _e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php _e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<li class="woocommerce-order-overview__total total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>

				<li class="woocommerce-order-overview__payment-method method">
					<?php _e( 'Payment method:', 'woocommerce' ); ?>
					<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
				</li>

				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>
    <div class="woocommerce-order-header">
        
        <h1 class="rptitle"><?php _e( 'Thank you!', 'woocommerce' ); ?></h1>
		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order has been received.', 'woocommerce' ), null ); ?></p>
    </div>
	<?php endif; ?>

</div>


<style>
    .entry-title{display: none;}
    .woocommerce-order-header{text-align: center;}
    .woocommerce-order p{font-family: 'ProximaNova-Semibold';}
    .rpbanner{
        position: relative;
        background: url(<?php if(get_field('thank_you_page_banner','option')){the_field('thank_you_page_banner','option');}else{
        echo get_stylesheet_directory_uri().'/assets/images/cart_banner.jpg'; }?>);
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        min-height: 250px;
        margin-top: 25px;
    }
    
ul.woocommerce-order-overview.woocommerce-thankyou-order-details.order_details li {
    width: 22%;
    border: none;
}
a.button.wc-backward{margin-bottom: 30px;}
table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details td {
    width: 25%;
    text-align: center;
}
table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details th {
  text-align: center;
}
    
table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details,table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details td, table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details th {
    border: none;
}
table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details a {
    color: #000;
    text-decoration: none;
}	
table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details tbody tr:nth-child(even) {background:#f0eceb;}
    
@media only screen and (max-width:480px){
    ul.woocommerce-order-overview.woocommerce-thankyou-order-details.order_details li {
        width:100%;
        margin-bottom: 10px;
    }
    table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details td {
       padding: 4px 3px;
    }
}

</style>