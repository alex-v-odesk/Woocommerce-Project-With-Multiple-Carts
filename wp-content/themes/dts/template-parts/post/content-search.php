<?php  global $product; ?>
						<li>
							<a href="<?php the_permalink();?>">
								<div class="gallery_grid">
									<img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id( get_the_ID()));?>">
                                 
                                  <div class="rp-product-meta">
                                   <?php $rp_available=$product->get_availability();?>
                                    <?php if($rp_available['availability']!='In stock' && $rp_available['class']!='in-stock'){?>
                                        <p class="stock out-of-stock rpShopCat"><?php echo $rp_available['availability']; ?></p>
                                    <?php }?>
                                     
                                       <h5><?php echo $product->get_sku();?></h5>								
                                        <h5><?php echo $product->get_name();?></h5>
                                    </div>
                                    
								</div>
							</a>
						</li>




