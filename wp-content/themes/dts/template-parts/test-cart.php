<?php
/*
Template name: Test Cart
*/
get_header();
?>
<style>
	.cart_banner{
		    background: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_banner.jpg);
	}
</style>

<!-- Start banner -->
				<div class="gallery catalog_banner cart_banner clearfix">
				</div>
				
				<div class="cart_main">
				
					<div class="text-center cart_header">
						<h1>Cart</h1>
						<p>Orders will ship directly from selected vendor, each vendor will appear in a seperate cart below.</p>
					</div>
					
					<div class="accordion-wrapper">
						<div class="ac-pane active">
							<a href="#" class="ac-title" data-accordion="true">
								<span>Raz Imports Inc.</span>
								<p class=""></p>
							</a>
							<div class="ac-content">
								<h3>Have you placed previous orders with this vendor?<span style="color:#971a4a">*</span></h3>
								<div class="one_selt clearfix">
									<div class="check_box">
										<input type="checkbox" id="test1" />
										<label for="test1">Yes, I am eligible for the re-order minimum of $250.</label>
									</div>
									<div class="check_box">
										<input type="checkbox" id="test2" />
										<label for="test2">No, this is my first order from this vendor, my order minimum is $500.</label>
									</div>
								</div>
								<!-- Start desktop table format -->
								<div class="table-responsive hidden-xs">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>Product</th>
												<th>Qty</th>
												<th>List</th>
												<th>Actual</th>
												<th>Total</th>
										  </tr>
										</thead>
										<tbody>
											<tr>
												<td class="width_td">
													<div class="table_img">
														<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
													</div>
													<div class="table_prod_desc">
														<h3># 000000</h3>
														<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
													</div>
												</td>
												<td><input class="qty_input" type="number" value="1" min="0" max="100"></td>
												<td>$60.00 each</td>
												<td>$60.00 each</td>
												<td>$180.00</td>
											</tr>
											<tr>
												<td class="width_td">
													<div class="table_img">
														<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
													</div>
													<div class="table_prod_desc">
														<h3># 000000</h3>
														<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
													</div>
												</td>
												<td><input class="qty_input" type="number" value="1" min="0" max="100"></td>
												<td>$60.00 each</td>
												<td>$60.00 each</td>
												<td>$180.00</td>
											</tr>
											<tr>
												<td class="width_td">
													<div class="table_img">
														<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
													</div>
													<div class="table_prod_desc">
														<h3># 000000</h3>
														<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
													</div>
												</td>
												<td><input class="qty_input" type="number" value="1" min="0" max="100"></td>
												<td>$60.00 each</td>
												<td>$60.00 each</td>
												<td>$180.00</td>
											</tr>
											<tr>
												<td class="width_td">
													<div class="table_img">
														<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
													</div>
													<div class="table_prod_desc">
														<h3># 000000</h3>
														<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
													</div>
												</td>
												<td><input class="qty_input" type="number" value="1" min="0" max="100"></td>
												<td>$60.00 each</td>
												<td>$60.00 each</td>
												<td>$180.00</td>
											</tr>
										</tbody>
										
									</table>
								</div>
								<!-- Start mobile table format -->
								<div class="mobile_table hidden-lg hidden-md hidden-sm">
									<h1>Product</h1>
									<ul class="clearfix">
										<li>
											<div class="mob_left_width">
												<div class="table_img">
													<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
												</div>
												<div class="table_prod_desc">
													<h3># 000000</h3>
													<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
												</div>
											</div>
											<div class="mob_right_width">
												<div class="mob_qty text-right">
													<span>QTY</span>
													<input class="qty_input" type="number" value="1" min="0" max="100">
												</div>
												<div class="mob_tab_right text-right">
													<span>List</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Actual</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Total</span>
													<p>$180.00</p>
												</div>
											</div>
										</li>
										
										<li>
											<div class="mob_left_width">
												<div class="table_img">
													<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
												</div>
												<div class="table_prod_desc">
													<h3># 000000</h3>
													<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
												</div>
											</div>
											<div class="mob_right_width">
												<div class="mob_qty text-right">
													<span>QTY</span>
													<input class="qty_input" type="number" value="1" min="0" max="100">
												</div>
												<div class="mob_tab_right text-right">
													<span>List</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Actual</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Total</span>
													<p>$180.00</p>
												</div>
											</div>
										</li>
										<li>
											<div class="mob_left_width">
												<div class="table_img">
													<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
												</div>
												<div class="table_prod_desc">
													<h3># 000000</h3>
													<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
												</div>
											</div>
											<div class="mob_right_width">
												<div class="mob_qty text-right">
													<span>QTY</span>
													<input class="qty_input" type="number" value="1" min="0" max="100">
												</div>
												<div class="mob_tab_right text-right">
													<span>List</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Actual</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Total</span>
													<p>$180.00</p>
												</div>
											</div>
										</li>
										<li>
											<div class="mob_left_width">
												<div class="table_img">
													<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart_prod.jpg">
												</div>
												<div class="table_prod_desc">
													<h3># 000000</h3>
													<p>Product Name Goes Here. Try to not exceed sixty characters.</p>
												</div>
											</div>
											<div class="mob_right_width">
												<div class="mob_qty text-right">
													<span>QTY</span>
													<input class="qty_input" type="number" value="1" min="0" max="100">
												</div>
												<div class="mob_tab_right text-right">
													<span>List</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Actual</span>
													<p>$60.00 EA</p>
												</div>
												<div class="mob_tab_right text-right">
													<span>Total</span>
													<p>$180.00</p>
												</div>
											</div>
										</li>
										
									</ul>
								</div>
								
								<!-- Start desktop Shipping setail -->
								<div class="ship_detail clearfix hidden-xs">
									<div class="ship_left">
										<div class="date_preffrd">
											<span>Preferred Shipping Date<strong style="color: #971a4a;">*</strong></span>
											<input type="text" value="00/00/00">
										</div>
										<p>Products can begin shipping after 00/00/00.</p>
										<p class="requir_txt">*required to place order.</p>
									</div>
									
									<div class="ship_right">
										<ul class="clearfix">
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Cart Subtotal</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup>720.00</p>
												</div>
											</li>
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Tax</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup>0.00</p>
												</div>
											</li>
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Order Total</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup>720.00</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
								
								<!-- Start mobile Shipping setail -->
								<div class="ship_detail clearfix hidden-lg hidden-md hidden-sm">
									
									<div class="ship_right">
										<ul class="clearfix">
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Cart Subtotal</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup>720.00</p>
												</div>
											</li>
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Tax</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup>0.00</p>
												</div>
											</li>
											<li class="clearfix">
												<div class="ship_field text-left">
													<h3>Order Total</h3>
												</div>
												<div class="ship_price text-right">
													<p><sup>$</sup>720.00</p>
												</div>
											</li>
										</ul>
									</div>
									
									<div class="ship_left">
										<div class="date_preffrd">
											<span>Preferred Shipping Date<strong style="color: #971a4a;">*</strong></span>
										</div>
										<p>Products can begin shipping after 00/00/00.</p>
										<p class="requir_txt">*required to place order.</p>
										<input type="text" value="00/00/00">
									</div>
									
								</div>
								
								<div class="cart_btn">
									<ul class="list-inline text-right">
										<li><a href="#" class="register_btn">Update Cart</a></li>
										<li><a href="#" class="register_btn">Checkout</a></li>
									</ul>
								</div>
								
							</div>
						</div>
						
						<div class="ac-pane">
							<a href="#" class="ac-title" data-accordion="true">
								<span>M & B Products</span>
								<p class=""></p>
							</a>
							<div class="ac-content">
							
							</div>
						</div>
						
						<div class="ac-pane">
							<a href="#" class="ac-title" data-accordion="true">
								<span>The light garden</span>
								<p class=""></p>
							</a>
							<div class="ac-content">
								
							</div>
						</div>
						
						<div class="ac-pane">
							<a href="#" class="ac-title" data-accordion="true">
								<span>LCP Gifts</span>
								<p class=""></p>
							</a>
							<div class="ac-content">
						
							</div>
						</div>
						
						
					</div>
					
				</div>



<?php get_footer();?>