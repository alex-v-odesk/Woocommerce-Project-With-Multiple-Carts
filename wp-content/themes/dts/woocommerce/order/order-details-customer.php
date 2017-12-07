<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
					
	<!--Customer company information-->
	<h1 class="rpsubtitle-small">Customer Information</h1>
	<table>
	
	<?php if ( $order->get_billing_email() ) : ?>
		<tr>
			<th style="width:100px;">Email:</th>
			<td><p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p></td>
		</tr>
	<?php endif; ?>
	<?php if ( $order->get_billing_phone() ) : ?>
		<tr>
			<th style="width:100px;">Telephone:</th>
			<td><p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p></td>
		</tr>
	<?php endif; ?>
	</table>

	

<section class="woocommerce-customer-details">

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

				<?php endif; ?>

				<h2 class="woocommerce-column__title rpsubtitle-color"><?php _e( 'Billing address', 'woocommerce' ); ?></h2>

				<address>
					<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
					
				</address>

				<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

			</div><!-- /.col-1 -->

			<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">

				<h2 class="woocommerce-column__title rpsubtitle-color"><?php _e( 'Shipping address', 'woocommerce' ); ?></h2>

				<address>
					<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
				</address>

			</div><!-- /.col-2 -->

		</section><!-- /.col2-set -->

	<?php endif; ?>

</section>
