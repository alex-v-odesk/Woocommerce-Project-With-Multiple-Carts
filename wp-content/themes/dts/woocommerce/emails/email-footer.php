<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
												
												</td>
												</tr>
												</table>
												<!-- End Content -->
												<hr class="footer">
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Footer -->
									<table border="0" cellpadding="10" cellspacing="0" width="800" id="template_footer">
										
										<tr>
											<td valign="middle">
												<a href="http://profusenx.com/7/dts"><img src="http://profusenx.com/7/dts/wp-content/uploads/2017/09/footer-logo.png"></a>
											</td>
											<td valign="middle">
												<div class="social-icon clearfix">
                                                    <ul class="list-inline pull-right">
                                                        <li><a href="<?php if(get_field(" company_pinterest ","option ")){the_field("company_pinterest ","option ");}else{echo "javascript:void(0); ";}?>" title="pinterest"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/pinterest.png"></a></li>
                                                        <li><a href="<?php if(get_field(" company_facebook ","option ")){the_field("company_facebook ","option ");}else{echo "javascript:void(0); ";}?>" title="facebook"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/facebook.png"></a></li>
                                                        <li><a href="<?php if(get_field(" company_instagram ","option ")){the_field("company_instagram ","option ");}else{echo "javascript:void(0); ";}?>" title="Instagram"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/instagram.png"></a></li>
                                                    </ul>
                                                </div>
                                                <h5 style="display:inline-block;float: right;">
                                                <?php if(get_field('company_address','option')){the_field('company_address','option');}?></h5>
											</td>
										</tr>
									</table>
									<!-- End Footer -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>


<!--<table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tr>
														<td colspan="2" valign="middle" id="credit">
															<?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
														</td>
													</tr>
												</table>-->
