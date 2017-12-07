<?php
/*
Template name: Wishlists
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
</style>
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
				
				<div class="wishlist_main">
				
					
						<h1 class="rptitle">My Lists</h1>
						
					
					
				   <div class="row">
					 <div class="col-md-3 col-sm-2 ">
							<div class="" data-toggle="modal" data-target="#ksAddFolderModal" style="background:#006e7c;min-height: 231px;margin-top: 20px;">
								<center><img src="<?php echo get_template_directory_uri(); ?>/assets/images/plusicon.png" class='img img-responsive'></center>
								<center><h4 class="createheading">CREATE NEW</h4></center>
							</div>
					 </div>
					  <?php 
						  global $wpdb , $product; 
					      if(isset($_GET['deleteId'])){
							  $deletid=$_GET['deleteId'];
							  $updated = $wpdb->delete( 'rp_wishlist_folder', array('id'=>$deletid) );
                              $total_deleted_rows=$wpdb->delete("rp_wishlist", array( 'folder_id'=>$deletid)); 
							 
						  }
                       
                       
						  $rp_current_user_id=get_current_user_id();
						  $rows=$wpdb->get_results("SELECT * FROM `rp_wishlist_folder` WHERE `user_id`='$rp_current_user_id'");
                       if($rows!==null){
						  $num=0;
							foreach($rows as $folder){  
							  $folderid=$folder->id;
							  $getproductid=$wpdb->get_results("SELECT * FROM `rp_wishlist` WHERE `folder_id`='$folderid' ");
								$foldername=$folder->title;
								 $num=0;
								foreach($getproductid as $row3){            
								  $num++;
								}
								if($num!=0){
								$product_id=$getproductid[0]->product_id;
								 if ( has_post_thumbnail( $product_id ) ) {
                        $attachment_ids[0] = get_post_thumbnail_id( $product_id );
                         $attachment = wp_get_attachment_image_src($attachment_ids[0], 'thumbanil' ); ?>    
                        
                    <?php } 
								  ?>
					         <div class="col-md-3 col-sm-2  firstplusbutton">
					         <a href="<?php echo bloginfo('url');?>/single-wishlist/?folder_id=<?php  echo  $folderid; ?>">
								<div class="productgep productbackimage" >
								<img class="img img-responsive" src="<?php  echo $attachment[0]; ?>">
									<p class="pricespan"><?php echo $num; ?></p>
								</div>
							    <center><?php  echo " ".$foldername ; ?></center>
                            </a>
					        </div>
					        <?php }
								else{
									?>
									  <div class="col-md-3 col-sm-2  firstplusbutton">
									  <a href="<?php echo bloginfo('url');?>/single-wishlist/?folder_id=<?php  echo  $folderid; ?>">
										<div class="productgep">
											<center><img src='<?php echo get_template_directory_uri(); ?>/assets/images/no_product.jpg' class="img img-responisve"></center>
										</div>
										<center><?php echo $foldername; ?></center>
										</a>
									 </div>
							       <?php
								}
							
							
							}}else{
                           echo "<h1 class='rptitle'>Oops! No wishlist found.</h1>";
                       } ?>
					</div>
					 <!-- Modal -->
								  <div class="modal fade" id="ksAddFolderModal" role="dialog">
									<div class="modal-dialog">

									  <!-- Modal content-->
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title">Add Folder</h4>
										  
										</div>
										<div class="modal-body">
										  <div class="row">
												<div id="">
												
												 <div class="col-md-8">
												    
												 
													 <input type="text" id="rpnewwishlistfolder2"  class="form-control" placeholder="New List Name">
												 </div>
												 <div class="col-md-4">
													  <button id="rpnewwishlistfolderBtn2" class="btn btn-success">Add</button>
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
					
				</div>

<style>
    a{
    color: #000;
    text-decoration: none;
    text-transform: capitalize;
    }
    a:hover{
    color: #000;
    text-decoration: none;
    text-transform: capitalize;
    }
</style>

<?php get_footer();?>