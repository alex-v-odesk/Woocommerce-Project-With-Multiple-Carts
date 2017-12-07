<?php if( is_product_category() && !is_subcategory(get_queried_object()->term_id)) {?>
            <!-- Start mobile side -->
				<div class="save_order hidden-lg hidden-md">
					<h1>Save on your<br> order!</h1>
					<ul>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/date_icon.png">
							<div class="aa_right">
								<h3>Dating Program</h3>
								<p>Delayed payment plans for your seasonal orders.</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/clock_icon.png">
							<div class="aa_right">
								<h3>Early By Discount</h3>
								<p>Additional savings for orders placed early.</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/freight_icon.png">
							<div class="aa_right">
								<h3>Freight Program</h3>
								<p>Caps on shipping prices based on quantity.</p>
							</div>
						</li>
					</ul>
					<a href="#" class="learn_more">Learn More</a>
				</div>
				
				<div class="vendor_min_order  hidden-lg hidden-md">
					<h1>Vendor Order Minimums</h1>
					   <?php if($rp_root_cat!=false){ ?>
                                 <p class="lead_order">for <?php echo $rp_root_cat->name;?></p>
                            <ul class="order_price_side">
                                <li>
                                    <h5>Initial Order</h5>
                                    <p>
                                    <?php echo "<sup>".get_woocommerce_currency_symbol()."</sup>";
                                      echo trim(get_term_meta($rp_root_cat->term_id ,'minimum_amount',true));
                                        
                                         ?></p>
                                </li>
                                <li>
                                    <h5>Re-orders</h5>
                                    <p><?php echo "<sup>".get_woocommerce_currency_symbol()."</sup>";
                                     echo trim(get_term_meta($rp_root_cat->term_id ,'reorder_minimum_amount',true));
                                        ?></p>
                                </li>
                            </ul>
                                           
                               <?php }else{ ?>                             
                            
                            <p class="lead_order">for <?php echo get_queried_object()->name;?></p>
                            <ul class="order_price_side">
                                <li>
                                    <h5>Initial Order</h5>
                                    <p>
                                    <?php echo "<sup>".get_woocommerce_currency_symbol()."</sup>";
                                      echo trim(get_term_meta(get_queried_object_id(),'minimum_amount',true));
                                        
                                         ?></p>
                                </li>
                                <li>
                                    <h5>Re-orders</h5>
                                    <p><?php echo "<sup>".get_woocommerce_currency_symbol()."</sup>";
                                     echo trim(get_term_meta(get_queried_object_id(),'reorder_minimum_amount',true));
                                        ?></p>
                                </li>
                            </ul>
                            <?php }?>
					<p class="order_min_p">Product can begin shipping on 00/00/00.</p>
				</div>
				
				<div class="download_fall  hidden-lg hidden-md">
					<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/winter_img.png">
					<div class="aa_download_right">
						<h1>Fall & Winter 2018</h1>
						<p>Catalog</p>
					</div>
					<div class="clearfix">
						<a href="#" class="learn_more">Download PDF</a>
					</div>
				</div>
				
				<div class="download_summer  hidden-lg hidden-md">
					<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/summer_img.png">
					<div class="aa_download_right">
						<h1>Summer 2017</h1>
						<p>Catalog</p>
					</div>
					<div class="clearfix">
						<a href="#" class="learn_more">Download PDF</a>
					</div>
				</div>


<?php }?>


</div>
</div>
</div>
</section>
<!-- End hero section -->


<!-- Start footer -->
<footer class="pt50">

    <section class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php  $nav_left_arg=array(
                                'menu' => "footer_top_menu",
                                'container'=>false,
                                'menu_class'=>'list-inline footer_main_menu'
                                     );                    
                                wp_nav_menu($nav_left_arg);?>
                </div>
                <div class="col-md-3">
                    <div class="clearfix serch_btn">
                       <?php  get_product_search_form();?>                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="signup_news_div">
                        <h1>Stay in the loop.</h1>
                        <h3>Sign up for our mailing list.</h3>
                        <div class="newsletter">
                            <div class="news_l">
                                <input type="text" placeholder="ENTER YOUR EMAIL HERE">
                                <img class="email-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/email-icon.png">
                                <div class="submit_btn_news">
                                    <button type="button" class="btn"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/play-icon-news.png"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="custom_menu_f row">
                        <?php  $nav_left_arg=array(
                                'menu' => "shop_our_lines_left_footer",
                                'container'=>false,
                                'menu_class'=>'uline1'
                                     );                    
                                wp_nav_menu($nav_left_arg);?>

                        <?php  $nav_right_arg=array(
                                'menu' => "shop_our_lines_right_footer",
                                'container'=>false,
                                'menu_class'=>'uline2'
                                     );                    
                                wp_nav_menu($nav_right_arg);?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="social-icon clearfix">
                        <ul class="list-inline pull-right">
                            <li><a href="<?php if(get_field(" company_pinterest ","option ")){the_field("company_pinterest ","option ");}else{echo "javascript:void(0); ";}?>" title="pinterest"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/pinterest.png"></a></li>
                            <li><a href="<?php if(get_field(" company_facebook ","option ")){the_field("company_facebook ","option ");}else{echo "javascript:void(0); ";}?>" title="facebook"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/facebook.png"></a></li>
                            <li><a href="<?php if(get_field(" company_instagram ","option ")){the_field("company_instagram ","option ");}else{echo "javascript:void(0); ";}?>" title="Instagram"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/instagram.png"></a></li>
                        </ul>
                    </div>
                    <div class="contact-detail clearfix">
                        <ul class="pull-right">
                            <?php if(get_field("company_phone","option")){?>
                            <li>
                                <img class="pull-right" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/calling-icon.png">
                                <div class="text-right call">
                                    <a href="javascript:void(0);">
                                        <h3>Call</h3>
                                        <p>
                                            <?php the_field("company_phone","option");?>
                                        </p>
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if(get_field("company_email","option")){?>
                            <li>
                                <img class="pull-right" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/mailing-icon.png">
                                <div class="text-right email">
                                    <a href="mailto:<?php the_field(" company_email ","option ");?>">
                                        <h3>Email</h3>
                                        <p>
                                            <?php the_field("company_email","option");?>
                                        </p>
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="clearfix footer-logo">
                        <a href="<?php echo bloginfo('url');?>"><img src="<?php if(get_field("footer_company_logo","option")){the_field("footer_company_logo","option");}?>"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php  $nav_footer_arg=array(
                                'menu' => "footer_menu",
                                'container'=>false,
                                'menu_class'=>'list-inline clearfix footer_bottom_menu'
                                     );                    
                                wp_nav_menu($nav_footer_arg);?>
                </div>
                <div class="col-md-4">
                    <div class="clearfix text-right address">
                        <p>
                            <?php if(get_field("company_address","option")){the_field("company_address","option");}?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

</footer>
<!-- End footer -->

<!-- Sign up popup -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cross-icon.png"></button>
            <div class="modal-body">
                <div class="pop-header">
                    <h1 class="text-uppercase">Sign In</h1>
                    <p class="lead_txt">Please sign in to see pricing, download catalogs and place your order. </p>
                </div>

                <div class="pop-contnet">
                    <?php if(isset($_GET["q"]) &&  $_GET["q"]=="loginerror" && !is_user_logged_in()):?>
                    <div class="loginerror alert-warning" style="padding:5px;">
                        <?php echo "Email or Password is Wrong!";?>
                    </div>
                    <?php endif;?>

                    <?php woocommerce_login_form();?>

                </div>

                <div class="pop-footer">
                    <p>Don't have an account? <a href="<?php if(get_field('registration_page_url','option')){the_field('registration_page_url','option');}else{echo bloginfo('url').'/registration';}?>">Register Here.</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
<!--Signout popup start-->
<div id="signoutpop" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cross-icon.png"></button>
            <div class="modal-body">
                <div class="pop-header">
                    <h1 class="text-uppercase">Sign Out</h1>
                    <p class="lead_txt">Are you sure you want to sign out of your account. </p>
                </div>

                <div class="contnet">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php $logout_string = wp_logout_url(home_url()); ?>
                            <a href="<?php echo $logout_string;?>" class="btn logout_btn">Yes, Sign Out</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="button" class="btn cancle_btn" data-dismiss="modal">No, Thanks!</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Signout popup end-->

<!-- Wishlist Modal -->
<div id="rpwishlistModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_big_heart_plus.png"></h4>
      </div>
      <div class="modal-body">
          <div class="row"><div class="col-md-12 product-already-in-wishlist"></div></div>
        
         <?php 
          global $wpdb;
          $rp_current_user_id=get_current_user_id();
          $rows=$wpdb->get_results("SELECT * FROM `rp_wishlist_folder` WHERE `user_id`='$rp_current_user_id' and `status`=0 ");
          $num=0;
            foreach($rows as $row){            
              $num++;
            }
          ?>
          
          <?php if($num==0){
            ?>
          <div class="row">
                <div id="firsttimecreatwishlist">
                 <div class="col-md-6">
                     <input type="text" id="rpnewwishlistfolder"  class="form-control" placeholder="New List Name"></div>
                  <div class="col-md-6">
                      <button id="rpnewwishlistfolderBtn" class="rpbutton">Add</button>
                      </div>
              </div>
               <div style="display:none;" id="firsttimeclosefolder">
                <div class="col-md-12" style="text-align:left;">Choose Wishlist:</div>
                <div class="col-md-6">
                    <select id="rpwishlistfolderlist"  class="wishlistselect form-control"></select>
                </div>
                <div class="col-md-6">
                         <input type="hidden" id="rppid">
                        <button id="addToWishListBtn" class="btn btn-success">Add to wishlist</button>
              </div>
              </div>
          </div>
            <?php
            }else{
            ?>
            <div class="row">
            <div class="col-md-12" style="text-align:left;">Choose Wishlist:</div>
            <div class="col-md-6 col-sm-6">
                    <select id="rpwishlistfolderlist" class="wishlistselect form-control">
                    <option value='-1'>Select List</option>
                  <?php
                  foreach($rows as $row){
                    echo "<option value='$row->id'>$row->title</option>";

                  }    
    
                  ?>
                  <option value='-2'>Create new</option>
                  </select>
            </div>
            <div class="col-md-6 col-sm-6">
                    <input type="hidden" id="rppid">
                    <button id="addToWishListBtn" class="btn btn-success">Add to wishlist</button>
            </div>
            <div class="col-md-12 col-sm-12" style="padding:0;margin-top:10px;">                
                  <div id="addnewwishlistsection" style="display:none;">
                  <div class="col-md-6">
                      <input type="text" id="rpnewwishlistfolder" class="form-control" placeholder="New List Name"></div>
                   <div class="col-md-6">
                    <button id="rpnewwishlistfolderBtn" class='btn btn-success'>Add</button>
                      </div>
                  </div>
                </div>
          </div>
            <?php    
            }
          
          ?>
         
      </div>
      <div class="modal-footer">
       <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
           </div>
        </div>
      </div>
    </div>
 
  </div>
</div>

<script>
    jQuery(document).ready(function(){
      
        jQuery("#rpnewwishlistfolderBtn").click(function(){
            if(jQuery("#rpnewwishlistfolder").val() ==""){
                alert("Need value");
                return false;
            }
            jQuery.ajax({
            url:"<?php echo admin_url('admin-ajax.php');?>",
            data:{ action:"add_new_wish_list_folder" , rpnewwishlistfolder:jQuery("#rpnewwishlistfolder").val() },
            type:'post',           
            success:function(res){
                jQuery("#rpwishlistfolderlist").html(res);
                jQuery("#firsttimeclosefolder").css('display','block');
                jQuery("#firsttimecreatwishlist").css('display','none');
                jQuery("#addnewwishlistsection").slideUp(); 
                jQuery("#rpnewwishlistfolder").val("");
            }
            });
            
        });
        
        jQuery("#rpwishlistfolderlist").change(function(){
            if(jQuery("#rpwishlistfolderlist").val()==-2){
            jQuery("#addnewwishlistsection").slideDown();
            }else{
               jQuery("#addnewwishlistsection").slideUp(); 
            }
        });
        
        
          jQuery("#addToWishListBtn").click(function(){
            if(jQuery("#rpwishlistfolderlist").val() ==-1){
                alert("Need a folder");
                return false;
            }
            if(jQuery("#rpwishlistfolderlist").val() ==-2){
                alert("Need a folder");
                return false;
            }
            jQuery.ajax({
            url:"<?php echo admin_url('admin-ajax.php');?>",
            data:{ action:"add_new_wish_list" , rpwishlistfolderlist:jQuery("#rpwishlistfolderlist").val() ,pid:jQuery("#rppid").val()},
            type:'post',           
            success:function(res){ 
              
                jQuery("#rpwishlistModal").modal("hide");
                
            }
            });
            
        });
		jQuery("#rpnewwishlistfolderBtn2").click(function(){
            if(jQuery("#rpnewwishlistfolder2").val() ==""){
                alert("Need value");
                return false;
            }
            jQuery.ajax({
            url:"<?php echo admin_url('admin-ajax.php');?>",
            data:{ action:"add_new_wish_list_folder" , rpnewwishlistfolder:jQuery("#rpnewwishlistfolder2").val() },
            type:'post',           
            success:function(res){                
                jQuery("#rpnewwishlistfolder2").val('');
				jQuery("#errormsgid").html("<span class='text text-success'>Add Success..</span>");
				location.reload();
                
            }
            });
            
        });
		jQuery("#rpnewwishlisteditfolderBtn").click(function(){
            if(jQuery("#rpnewwishlisteditfolder").val() ==""){
                alert("Need value");
                return false;
            }
            jQuery.ajax({
            url:"<?php echo admin_url('admin-ajax.php');?>",
            data:{ action:"edit_new_wish_list_folder" , rpnewwishlistfolder:jQuery("#rpnewwishlisteditfolder").val(),rpnewwishlistfolderid:jQuery("#rpnewwishlisteditfolderid").val() },
            type:'post',           
            success:function(res){
                //jQuery("#rpwishlistfolderlist").html(res);
				var folname=jQuery("#rpnewwishlisteditfolder").val();
                jQuery("#foldernamespan").html(folname);
				jQuery("#errormsgid").html("<span class='text text-success'>Edit Success..</span>");
				//location.reload();
                
            }
            });
            
        });
        
    });
</script>



<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/slick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/dropdown-menu.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/countries.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/accordion.js"></script>
<script>
    jQuery(document).ready(function($) {

        $('.bar_icon').click(function() {
            $(".slidingDiv").addClass("slide");
            $(".bar_icon").hide();
            $(".cross_icon").show();
        });

        $('.cross_icon').click(function() {
            $(".slidingDiv").removeClass("slide");
            $(".cross_icon").hide();
            $(".bar_icon").show();
        });

        $('.mob_search_icon').click(function() {
            $(".search_filed").toggleClass("open_search");
        });

        $('.prod_slide').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        $('select.rpdropp').each(function() {

            // Cache the number of options
            var $this = $(this),
                numberOfOptions = $(this).children('option').length;

            // Hides the select element
            $this.addClass('s-hidden');

            // Wrap the select element in a div
            $this.wrap('<div class="select"></div>');

            // Insert a styled div to sit over the top of the hidden select element
            $this.after('<div class="styledSelect"></div>');

            // Cache the styled div
            var $styledSelect = $this.next('div.styledSelect');

            // Show the first select option in the styled div
            $styledSelect.text($this.children('option').eq(0).text());

            // Insert an unordered list after the styled div and also cache the list
            var $list = $('<ul />', {
                'class': 'options'
            }).insertAfter($styledSelect);

            // Insert a list item into the unordered list for each select option
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            // Cache the list items
            var $listItems = $list.children('li');

            // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
            $styledSelect.click(function(e) {
                e.stopPropagation();
                $('div.styledSelect.active').each(function() {
                    $(this).removeClass('active').next('ul.options').hide();
                });
                $(this).toggleClass('active').next('ul.options').toggle();
            });

            // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
            // Updates the select element to have the value of the equivalent option
            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                /* alert($this.val()); Uncomment this for demonstration! */
            });

            // Hides the unordered list when clicking outside of it
            $(document).click(function() {
                $styledSelect.removeClass('active');
                $list.hide();
            });

        });


    });

</script>


<?php if(isset($_GET["q"]) &&  $_GET["q"]=="loginerror" && !is_user_logged_in()):?>
<script>
    jQuery(document).ready(function() {
        jQuery('#myModal').modal('show');

    });

</script>

<?php endif;?>
<script>
    jQuery(document).ready(function() {
        <?php if(is_user_logged_in()):?>
        jQuery(".footerLoginLink a").attr("data-target", '#signoutpop');
        jQuery(".footerLoginLink a").text("Sign Out");
        <?php else:?>
        jQuery(".footerLoginLink a").attr("data-target", '#myModal');
        <?php endif;?>
        jQuery(".footerLoginLink a").attr("data-toggle", 'modal');
        
        jQuery(".woocommerce-breadcrumb").addClass('breadcrumb hidden-sm hidden-xs');
        jQuery(".woocommerce-product-search input[type='search']").attr("placeholder",'SEARCH');
        
    });
</script>

<?php wp_footer(); ?>

 <?php if(is_product()):?>
       <script>
           jQuery(document).ready(function(){
               jQuery(".woocommerce-product-gallery").addClass("col-md-5");
                jQuery(".summary").addClass("col-md-7");
               jQuery("section.related.products").addClass("col-md-12");
                jQuery("section.related.products li").addClass("col-md-4");
                jQuery(".quantity").addClass("col-md-4 col-sm-4 col-xs-6");
                jQuery(".quantity").prepend("<b class='qnt-text'>QTY</b>");
                jQuery("input.input-text.qty.text").css('width','50px');
                jQuery(".single_add_to_cart_button").addClass("col-md-6 col-sm-6 col-xs-6");
                
               
               
           });
       </script>
       <style>
           .product_title{
               font-size: 23px!important;
                color: #000!important;
                text-transform: uppercase!important;
                font-weight: 600!important;
                margin-bottom: 0px;
                font-family: 'ProximaNova-Semibold'!important;
           }
           .entry-summary{
              font-family: 'ProximaNova-Semibold'!important;
               font-size: 16px;
           }
           p.productSku {
                font-size: 18px;
            }
           
            p.stock.out-of-stock {
                background: #971a4a;
                color: #fff;
                text-transform: uppercase;
                font-size: 18px;
                letter-spacing: 1px;
                border-radius: 0px;
                padding: 10px 40px;
                display: inline-block;
                margin-top: 20px;
                font-family: 'ProximaNova-Semibold'!important;
            }
           .single_add_to_cart_button{
                background: #971a4a;
                color: #fff;
                text-transform: uppercase;
                font-size: 18px;
                letter-spacing: 1px;
                border-radius: 0px;
                padding: 10px 0px;
                border: none;
                font-weight: 700;
           }
           .quantity{padding: 0;}
           .quantity input[type='number']{
                width: 70px!important;
                padding: 8px 1px;
                margin-left: 3px;
                text-align: center;
                font-size: 20px;
                font-weight: 700;
           }
           .qnt-text{
               font-weight: 700;
                font-size: 20px;
           }
           span.woocommerce-Price-currencySymbol {
                vertical-align: super;
                font-size: 18px;
               font-family: 'ProximaNova-Bold'!important;
            }
           span.woocommerce-Price-amount.amount {
                font-family: 'ProximaNova-Bold'!important;
                font-size: 29px;
            }
           @media only screen and (max-width:480px){               
               .single_add_to_cart_button{font-size: 16px;}
           }
           @media only screen and (min-width:480px) and (max-width:768px){
               .quantity{width: 30%;}
           }
            @media only screen and (max-width:768px){
               .pt50{margin-top: 60px;}
                
           }
           
       </style>
       
<?php endif;?>
<script>
jQuery(document).ready(function(){
    jQuery("select.dropdown_product_cat").wrap("<div class='selectcarat'></div>");
    jQuery("select.orderby").wrap("<div class='selectcarat'></div>");
    jQuery("select#bytag").wrap("<div class='selectcarat'></div>");
    jQuery("select#bytag").change(function(){   
        window.location.href="<?php echo bloginfo('url').'/product-tag/';?>"+jQuery(this).val();
    });
    jQuery("select.dropdown_product_cat option:first-child").text("SHOP BY CATEGORY");
    jQuery('select').click(function(){         
        jQuery('div.selectcarat:before').css('border-color','#337ab7 transparent transparent!important');   
    });
    jQuery(".um-form .um-row-heading").addClass("rpsubtitle");
    jQuery(".image-overlay").find(".rpShopCat").each(function(){
        jQuery(this).parent().find("img").css("opacity",".4");
    });
    
    jQuery('.um-field-checkbox input[type="checkbox"]').change(function() {
     if(this.checked) {
         fillShipping();
     }else{
         emptyShipping();
     }
    });
     jQuery('#ship-to-different-address-checkbox').change(function() {
     if(this.checked) {
         fillShipping();
     }else{
         emptyShipping();
     }
    });
    jQuery("select.orderby").parents(".selectcarat").addClass("full-width");
    
});
    
function fillShipping() {  
   jQuery("input[data-key='shipping_address_1']").val(jQuery("input[data-key='billing_address_1']").val());
    jQuery("input[data-key='shipping_address_2']").val(jQuery("input[data-key='billing_address_2']").val()); 
    jQuery("input[data-key='shipping_city']").val(jQuery("input[data-key='billing_city']").val()); 
    jQuery("input[data-key='shipping_state']").val(jQuery("input[data-key='billing_state']").val()); 
    jQuery("input[data-key='shipping_country']").val(jQuery("input[data-key='billing_country']").val()); 
    jQuery("input[data-key='shipping_postcode']").val(jQuery("input[data-key='billing_postcode']").val()); 
}
function emptyShipping() {  
   jQuery("input[data-key='shipping_address_1']").val("");
    jQuery("input[data-key='shipping_address_2']").val(""); 
    jQuery("input[data-key='shipping_city']").val(""); 
    jQuery("input[data-key='shipping_state']").val(""); 
    jQuery("input[data-key='shipping_country']").val(""); 
    jQuery("input[data-key='shipping_postcode']").val(""); 
}
    
function rpaddToWishlist(pid){
    jQuery.ajax({
            url:"<?php echo admin_url('admin-ajax.php');?>",
            data:{ action:"rp_check_product_in_wishlist" ,rppid:pid },
            type:'post',           
            success:function(res){
               jQuery(".product-already-in-wishlist").html(res);
            }
            });
    jQuery("#rpwishlistModal").modal("show");
    jQuery("#rppid").val(pid);
    
        
}    
    
</script>

<?php if(is_page('register')):?>
<script language="javascript">
	populateCountries("billing_country", "billing_state"); 
	populateCountries("shipping_country", "shipping_state"); 
</script>
<style>
    .entry-title{display: none;}
</style>
<?php endif;?>

<style>
/* ultimate member style start*/
.um-222.um .um-form input[type=text], .um-222.um .um-form input[type=tel], .um-222.um .um-form input[type=password], .um-222.um .um-form textarea {
    color: #000;
    border: 2px solid #000!important;
    font-family: 'ProximaNova-Regular'!important;
    height: 44px!important;
}
.um-222.um .um-form input[type=text]:focus, .um-222.um .um-form input[type=tel]:focus, .um-222.um .um-form input[type=password]:focus, .um-222.um .um-form textarea:focus {   
    border: 2px solid #000!important;   
}
.um-form label{color: #000;text-transform: capitalize;}
    
.um-form input[type='submit'] {
    background: transparent!important;
    border: 2px solid #000!important;
    border-radius: 0!important;
    color: #000!important;
    font-weight: 700!important;
    text-transform: uppercase!important;
    letter-spacing: 4px;
    float: left;
}
.um-form input[type='submit']:hover {
    background: #000!important;
    color: #fff!important;
    }
    
.um-field-error{
    background: transparent;
    margin: 0;
    color: rgba(0, 0, 0, 0.61);
    font-style: italic;
    text-transform: capitalize;
    padding: 0;
    font-family: 'ProximaNova-Regular'!important;
}
.um-field-arrow {
    color: transparent;
}
.um-field-error .required {
    display: none;
}
/* Ultimate member style end*/
</style>
</body>

</html>
