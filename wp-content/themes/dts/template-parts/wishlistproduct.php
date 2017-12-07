<?php
/*
Template name: Single Wishlist
*/
get_header();
?>
<style>
	
	.firstplusbutton {
   
    margin-top: 20px;
}
	h4.createheading {
    font-family: 'ProximaNova-Extrabld';
    color: #fff;
}
	.productgep {
     min-height: 250px
}
	.productbackimage{
	background-position: center center;
    background-repeat: no-repeat;
    background-size: 100%;
	}
	.pricespan{
		    float: right;
    top: 17px;
    right: 0;
        background: #afa198;
    padding: 6px 25px;
    color: #fff;
    font-family: 'ProximaNova-Extrabld';
    z-index: 1;
    position: absolute;
	}
	.fs{
		font-family: 'ProximaNova-Extrabld';
	}
    #foldernamespan{font-size: 23px;text-transform: uppercase;}
    .page{
        color: #000;
        font-size: 18px;
        font-weight: 700;
        float: right;
    }
    .page a, .page a:hover {
        color: #000;
        text-decoration: none;
    }
    .image-box img {
        max-height: 170px;
    }
</style>
<?php if(!isset($_GET['folder_id'])){
	?>
	<script>
   window.location.href='<?php echo home_url(); ?>';
</script>
	<?php
} ?>
<!-- Start myaccount header -->
<h2 class='myaccountHeading'>My Account</h2>
<p class="rpmyaccount-message" style="margin-top:10px;">
    <b>Welcome to your account dashboard!</b> From here, you can peruse your wishlists, check in on orders, manage your account information and contact your very own personal representative. We're here to help if you need us.
    
</p>
   
       <div class="row rpmyaccount-navigations">
            <div class="col-md-3 col-sm-6 col-xs-6">
               <a href="<?php echo esc_url(  wc_customer_edit_account_url());?>">
                <div class="gallery_grid">
                    <img src="<?php if(get_field('account_setting_nav_image','option')){the_field('account_setting_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>My Account setting</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="<?php echo bloginfo('url');?>/wishlists">
                 <div class="gallery_grid">
                    <img src="<?php if(get_field('my_list_nav_image','option')){the_field('my_list_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>My Lists</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="<?php echo esc_url(wc_get_account_endpoint_url( 'orders' ));?>">
                 <div class="gallery_grid">
                    <img src="<?php if(get_field('orders_nav_image','option')){the_field('orders_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>Order History</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="">
                 <div class="gallery_grid">
                    <img src="<?php if(get_field('contact_my_rep_nav_image','option')){the_field('contact_my_rep_nav_image','option');}else{echo get_stylesheet_directory_uri().'/assets/images/g1.png';}?>" class="img-responsive">
                    <p>Contact my Rep</p>
                </div>
                </a>
            </div>
       </div>
     <hr class="main">
     <!---end myaccount header-->
				
				<div class="single_wishlist_main">
				   <?php global $wpdb,$product; 
					  $fold=$_GET['folder_id'];
					  $rp_current_user_id=get_current_user_id();
					  $folder=$wpdb->get_results("SELECT * FROM `rp_wishlist_folder` WHERE `user_id`='$rp_current_user_id' and `id`='$fold'");
					  $num=0;
					  $foldername=$folder[0]->title;
						foreach($folder as $row){            
								  $num++;
						}
					if($num >=1){
					?>
					
					<?php 
                    
                    $rec_limit = 2;
                     $getproductids=$wpdb->get_results("SELECT * FROM `rp_wishlist` WHERE `folder_id`='$fold' ");
                         $rec_count=$wpdb->num_rows;
                    if(isset($_GET['page']) && $_GET['page']=="viewall" ){
                        $getproductid=$wpdb->get_results("SELECT * FROM `rp_wishlist` WHERE `folder_id`='$fold' ");
                        $rec_limit=$rec_count;
                    }else{
                         
                        
                        if( isset($_GET{'page'} ) ) {
                            $page = $_GET{'page'} + 1;
                            $offset = $rec_limit * $page ;
                         }else {
                            $page = 0;
                            $offset = 0;
                         }
                                    
                         $left_rec = $rec_count - ($page * $rec_limit);
                        
                        
								$foldername=$folder[0]->title;
								 $num=0;
                        $getproductid=$wpdb->get_results("SELECT * FROM `rp_wishlist` WHERE `folder_id`='$fold' LIMIT $offset, $rec_limit ");
                    }    
					
                      $rec_count_page=$wpdb->num_rows;   
                       
                    
                    
                    ?>
					<div class="text-left">
						
						 <div class="dropdown">
							<span class="fs dropdown-toggle" type="button" data-toggle="dropdown"><span id='foldernamespan'> <?php echo $foldername; ?> </span> <span class="caret"> </span>						
							</span>
							<div class="page">
                               <??>
                                
                            <?php 
                            echo "<a href =\"$_PHP_SELF?folder_id=$fold&page=viewall\">View All</a> ";
                            $total_page=ceil($rec_count/$rec_limit);
                       if( $page > 0) {
                                $last = $page - 2;
                                echo "<a href =\"$_PHP_SELF?folder_id=$fold&page=$last\"> < </a> ";
                                echo ($page+1)." / ".$total_page;
                                echo " <a href =\"$_PHP_SELF?folder_id=$fold&page=$page\"> ></a>";
                             }else if( ($page == 0) && ($left_rec > $rec_limit) ) {
                                echo "< ".($page+1)." / ".$total_page;
                                echo " <a href =\"$_PHP_SELF?folder_id=$fold&page=$page\"> ></a>";
                                
                             }else if( $page < 0 &&$left_rec < $rec_limit ) {
                                $last = $page - 2;
                                echo "<a href =\"$_PHP_SELF?folder_id=$fold&page=$last\">< </a> ";
                                echo ($page+1)." / ".$total_page." >";
                            }else{
                                    echo "< ".($page+1)." / ".$total_page." >";
                                }
                            ?>
                            
                        </div>
							<ul class="dropdown-menu">
							  <li><a>Manage List:</a></li>
							  <li><a href="javascript:void(0)" data-toggle="modal" data-target="#kseditFolderModal">RENAME LIST</a></li>
							  <li><a href="javascript:void(0)" onclick="deleteFolderFun(<?php echo $fold ?>)">DELETE</a></li>
							</ul>
						  </div>
                       
					</div>
					<!-- Modal -->
								  <div class="modal fade" id="kseditFolderModal" role="dialog">
									<div class="modal-dialog">

									  <!-- Modal content-->
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title">Edit Folder</h4>
										  
										</div>
										<div class="modal-body">
										  <div class="row">
												<div id="">
												
												 <div class="col-md-8">
												    
												 
													 <input type="text" id="rpnewwishlisteditfolder"  class="form-control" value="<?php echo $foldername; ?>">
													 <input type="hidden" id="rpnewwishlisteditfolderid"  class="form-control" value="<?php echo $fold; ?>">
												 </div>
												 <div class="col-md-4">
													  <button id="rpnewwishlisteditfolderBtn" class="btn btn-success">Edit</button>
												</div>
												<br>
												<div id="errormsgid"></div>
											  </div>
										</div> 
										
									  </div>

									</div>
								  </div>
					            </div>
					<!-- Modal end -->
					
				   <div class="row">
				   
				   
				   
				   
					 <?php 
                        
                    
						foreach($getproductid as $row3){            
								$product_id=$row3->product_id;
								 if ( has_post_thumbnail( $product_id ) ) {
								$attachment_ids[0] = get_post_thumbnail_id( $product_id );
								 $attachment = wp_get_attachment_image_src($attachment_ids[0], 'thumbanil' ); 
								 } 
					     $product = wc_get_product( $product_id );
							//$product->get_title();
							// $product->get_price_html();
					   ?>    
						
                          <?php $min_stock=get_post_meta($product_id,'minimum_allowed_quantity',true) ? get_post_meta($product_id,'minimum_allowed_quantity',true) : '';
                            if($min_stock!=''){
                                if($product->get_stock_quantity()<$min_stock){
                                    $stock_labal="Sold Out";
                                }
                            }else if($product->get_stock_quantity()< 1){
                                    $stock_labal="Sold Out";
                            }else{
                                $stock_labal='';
                            }
                       ?>            
					   <div class="col-md-3 col-sm-2  firstplusbutton">
							<div class="image-box">                           
                            <?php if($stock_labal!=''){?><p class="out-of-stock"><?php echo $stock_labal;?></p><?php } ?>
                             <img class="img img-responsive" src="<?php  echo $attachment[0]; ?>">
                              
                              
							<p class="rp-product-title"><?php echo $product->get_title(); ?></p>
                           </div>	
							<div class=''>
                                <p ><span style="float:left;"><a href="javascript:void(0);" 
                                   class="rp-remove-from-wishlist-btn" data-product-id="<?=$product_id;?>" data-folder-id="<?=$fold;?>"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/waste-bin.png"></a>                                 
                                   
                                   </span>
                                    <span style="float:right;">
                                    <span style="color:#AFA198;font-size: 19px;margin-right: 5px;    vertical-align: bottom;"><?php echo $product->get_price();?></span>
                                    
                    <?php echo apply_filters('woocommerce_add_to_cart_link',
                             sprintf('<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="button product_type_%s %s ajax_add_to_cart">%s</a>',         
                                esc_url( $product->add_to_cart_url() ),
                               esc_attr( get_post_meta($product_id,'minimum_allowed_quantity',true) ? get_post_meta($product_id,'minimum_allowed_quantity',true) : 1 ),
                                esc_attr( $product->id ),
                                esc_attr( $product->get_sku() ),
                                esc_attr( $product->product_type ),
                                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',            
                                '<img src="'.get_stylesheet_directory_uri().'/assets/images/shopping-cart24.png">'
                            ),
                            $product
                        );
                    ?>
                                 </span>
                                </p>
								
							</div>	
					   </div>
						<?php $num++; } 
                        
					    if($num==0){
							?>
							<center><h2 class="rptitle">Oops! No Product in this list.</h2></center>
							<?php
						}
					   ?>
					</div>
					
					<?php }else{ 
						?>
						<div class="text-center ">
						  <h1 class="fs rptitle">Oops! Wishlist not found.</h1>
						</div>
						<?php
					} ?>
					
				</div>
<script>
    jQuery(document).ready(function(){
        
        jQuery(".rp-remove-from-wishlist-btn").click(function(){
            var product_id=jQuery(this).attr("data-product-id");
            var folder_id=jQuery(this).attr("data-folder-id");
            
             jQuery.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php');?>",
                    data: {action : 'rp_remove_item_from_wishlist','product_id' :product_id,'folder_id':folder_id},
                    success: function (res) {
                        if (res) {
                            alert('Removed Successfully');
                            window.location.reload();
                        }
                    }
                });
        });
        
        
   
    });
    
function deleteFolderFun(folid){
	  if(confirm("Are You Sure For delete This Folder")){
		 window.location.href="<?php echo bloginfo("url");?>/wishlists/?deleteId="+folid; 
	  }
	 
} 
	
</script>

<style>
    .added_to_cart{color:#AFA198;text-decoration: none; }
    .added_to_cart:hover{color:#AFA198;text-decoration: none; }
    .image-box{position: relative;}
    p.out-of-stock+img {
    opacity: .6;
    }
    p.out-of-stock {
    background: #971a4a;
    color: #fff;
    text-transform: uppercase;
    font-size: 18px;
    letter-spacing: 1px;
    border-radius: 0px;
    padding: 10px 40px;
    display: inline-block;
    margin-top: 20px;
    top: 30%;
    left: 0;
    position: absolute;
    width: 100%;
    z-index: 1!important;
}
 .rp-product-title{
     color: #000;
    letter-spacing: 0.5px;
    line-height: 22px;
    font-family: 'ProximaNova-Regular';
    }
</style>
<?php get_footer();?>