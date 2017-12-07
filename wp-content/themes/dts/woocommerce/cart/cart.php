<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

foreach ( WC()->cart->get_cart() as $rp_cart_item_key => $rp_cart_item ) {
    $rp_product   = apply_filters( 'woocommerce_cart_item_product', $rp_cart_item['data'], $rp_cart_item, $rp_cart_item_key );
    $rp_product_id = apply_filters( 'woocommerce_cart_item_product_id', $rp_cart_item['product_id'], $rp_cart_item, $rp_cart_item_key );

    if ( $rp_product && $rp_product->exists() && $rp_cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $rp_cart_item, $rp_cart_item_key ) ) {
        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $rp_product->is_visible() ? $rp_product->get_permalink( $rp_cart_item ) : '', $rp_cart_item, $rp_cart_item_key );
?>
					

			
<?php   
    $group_items[ sanitize_title( $rp_cart_item['item_category_group'] ) ][ $rp_cart_item_key ] = $rp_cart_item;

        }
    }

?>

<div style="text-align:left;"><?php wc_print_notices();?></div>   
<?php do_action( 'woocommerce_before_cart' );?>
<div class="cart_main">
    <div class="text-center cart_header">       
        <p>Orders will ship directly from selected vendor, each vendor will appear in a seperate cart below.</p>
    </div>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <div class="accordion-wrapper">

<?php
//echo "Group Items:<pre>";print_r($group_items);echo "</pre>";
// Then loop through each of the groups and output your cart tables
krsort($group_items);
$rp_itteration=0;
foreach ( $group_items as $group_name => $group ) {
	// start your table
   // echo "Group name:<pre>";print_r($group_name);echo "</pre>";
    
    $rp_sub_total=0;
    $rp_vendore=get_term($group_name,'product_cat');
      
    
    $reorder_minimum_cart_total = get_term_meta($group_name,'reorder_minimum_amount',true) ?get_term_meta($group_name,'reorder_minimum_amount',true) : 250;
   $minimum_cart_total = get_term_meta($group_name,'minimum_amount',true) ?get_term_meta($group_name,'minimum_amount',true) : 500;
?>





						<div class="ac-pane <?php if($rp_itteration++==0){echo 'active';}?>">
							<a href="#" class="ac-title" data-accordion="true">
								<span class="vendor_name_<?=$group_name;?>"><?php echo $rp_vendore->name;?></span>
								<p class=""></p>
							</a>
							<div class="ac-content">
								<h3>Have you placed previous orders with this vendor?<span style="color:#971a4a">*</span></h3>
                                <p id="woocommerce-error-<?=$group_name;?>" class="rp-woocommerce-error"></p>
								<div class="one_selt clearfix">
									<div class="check_box">
										<input type="radio" id="re_order_minimim_<?=$group_name;?>" name="radio_<?=$group_name;?>" value="
										<?php echo $reorder_minimum_cart_total;?>"/>
										<label for="re_order_minimim_<?=$group_name;?>">Yes, I am eligible for the re-order minimum of <?php echo get_woocommerce_currency_symbol()."".$reorder_minimum_cart_total; ?>.</label>
									</div>
									<div class="check_box">
										<input type="radio" id="order_minimim_<?=$group_name;?>" name="radio_<?=$group_name;?>" value="<?php echo $minimum_cart_total; ?>" checked/>
										<label for="order_minimim_<?=$group_name;?>">No, this is my first order from this vendor, my order minimum is <?php echo get_woocommerce_currency_symbol()."".$minimum_cart_total; ?>.</label>
									</div>
								</div>
<?php do_action( 'woocommerce_before_cart_table' ); ?>
								<!-- Start desktop table format -->
								<div class="table">
									<table class="shop_table_responsive table table-striped table-hover ">
										<thead>
											<tr>
												<th colspan="2">Product</th>
												<th>Qty</th>
												<th>Price</th>
												
												<th>Total</th>
										  </tr>
										</thead>
										<tbody>
<?php
	foreach( $group as $cart_item_key => $cart_item ) {
		// out put your items
     //echo "<pre>";print_r($cart_item);echo "</pre>";   
    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

?>
<?php 
    $terms = wc_get_product_terms( $product_id, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
        if ( ! empty( $terms ) ) {
            $main_term = $terms[0];
            $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
            if ( ! empty( $ancestors ) ) {
                $ancestors = array_reverse( $ancestors );
                // first element in $ancestors has the root category ID
                // get root category object
                $root_cat = get_term( $ancestors[0], 'product_cat' );
                }
            else {
                    // root category would be $main_term if no ancestors exist
                    $root_cat=$main_term;
                }
                        
            }
            else {
                // no category assigned to the product
                }
            
?>								
							
<?php do_action( 'woocommerce_before_cart_contents' ); ?>
							<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); 
                               echo ' product-cat-'.$root_cat->slug; ?>">
                               
                         
                        
						<td class="product-remove">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
					
						<td class="product-thumbnail width_td">
							<div class="table_img">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
							</div>
							<div class="table_prod_desc" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								
								<p class="product-name">	<?php
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?></p>
							</div>
						</td>

					
				        <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
										'class'		  => 'qty_input'
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td>

						<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</td>

					

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>
					</tr> 
										
										
										
<?php $rp_sub_total +=$_product->get_price() * $cart_item['quantity'];?>									
<?php } ?>	
									</tbody>
								</table>
				        </div>
<?php do_action( 'woocommerce_cart_contents' ); ?>
                            
    <?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
								<!-- Start desktop Shipping setail -->
								<div class="ship_detail clearfix ">
								<div class="ship_right clearfix">
		
                                    </div>
                                    <div class="ship_left"><p style="visibility: hidden;">RP</p></div>
									<!--<div class="ship_left">
										<div class="date_preffrd">
											<span>Preferred Shipping Date<strong style="color: #971a4a;">*</strong></span>
											<input type="text" value="00/00/00">
										</div>
										<p>Products can begin shipping after 00/00/00.</p>
										<p class="requir_txt">*required to place order.</p>
									</div>-->
									
									<div class="ship_right">
										<ul class="clearfix">
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Cart Subtotal</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup><?php echo $rp_sub_total;?></p>
												</div>
											</li>											
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Order Total</h3>
												</div>
												<div class="ship_price text-right">
                                                    <p><sup>$</sup><span class="rpordertotal_<?=$group_name;?>"><?php echo $rp_sub_total;?></span></p>
												</div>
											</li>
										</ul>
									</div>
								</div>
						
               
                               <div class="cart_btn">
									<ul class="list-inline text-right">
										<li><input type="submit" class="button rpbutton" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" /></li>
										<li><?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
										    <input type="hidden" id="rp_group_id" value="<?php echo $cart_item['item_category_group'];?>">
										</li>
									</ul>
								</div>                   
					            <?php do_action( 'woocommerce_cart_actions' ); ?>

					            <?php wp_nonce_field( 'woocommerce-cart' ); ?>
					            

<?php do_action( 'woocommerce_after_cart_contents' ); ?>
</div>					
</div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>
<?php
}
?>
</div>
</form>
</div>
<style>
input[type="radio"] {
  -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
  -moz-appearance: checkbox;    /* Firefox */
  -ms-appearance: checkbox;     /* not currently supported */
}
.rp-woocommerce-error{
    margin: 0 0 10px;
    font-size: 17px;
    color: #971a4a;
    font-family: 'ProximaNova-Regular';
    }
td.product-price del {
    display: none!important;
}
td.product-price ins {
    text-decoration: none;
}
.table_prod_desc a{color: #000;text-decoration: none;}
    
    .ac-pane.active .ac-content{display: block;}    
 
</style>

<script>
jQuery(document).ready(function(){
    jQuery( document.body ).on( 'updated_cart_totals', function(){
            location.reload();
        });
    
});
</script>