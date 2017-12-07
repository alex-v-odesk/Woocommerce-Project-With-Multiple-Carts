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
                    <!--<ul class="list-inline footer_main_menu">
						<li><a href="#"><span style="color:#fff;">&#x0002F;</span> Showroom</a></li>
						<li><a href="#"><span style="color:#fff;">&#x0002F;</span> Find Your Rep</a></li>
						<li><a href="#"><span style="color:#fff;">&#x0002F;</span> Catalogs</a></li>
						<li><a href="#"><span style="color:#fff;">&#x0002F;</span> Contact</a></li>
					</ul>-->
                </div>
                <div class="col-md-3">
                    <div class="clearfix serch_btn">
                        <?php get_product_search_form();?>
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

                        <!--<ul class="uline1">
							<li><a href="#">RAZ IMPORTS INC.</a></li>
							<li><a href="#">RAZ SPRING</a></li>
							<li><a href="#">M & B PRODUCTS</a></li>
							<li><a href="#">THE LIGHT GARDEN</a></li>
							<li><a href="#">LCP GIFTS</a></li>
						</ul>                      
						<ul class="uline2">
							<li><a href="#">ROBERT ALLEN HOME & GARDEN</a></li>
							<li><a href="#">TERRIOR CHOCOLATE</a></li>
							<li><a href="#">UPPER DECK, LTD</a></li>
							<li><a href="#">VIP HOME & GARDEN</a></li>
						</ul>-->
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
                        <a href="<?php echo bloginfo('url' );?>"><img src="<?php if(get_field("footer_company_logo","option")){the_field("footer_company_logo","option");}?>"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php  $nav_footer_arg=array(
                                'menu' => "footer_menu",
                                'container'=>false,
                                'menu_class'=>'list-inline clearfix footer_bottom_menu'
                                     );                    
                                wp_nav_menu($nav_footer_arg);?>

                    <!--<ul class="list-inline clearfix footer_bottom_menu">
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Sign In</a></li>
						<li><a href="#">Register</a></li>
					</ul>-->
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
                    <!--<form action="#">
				
				
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd">
					</div>
					<div class="clearfix forgot_pass">
						<p class="pull-left">Forgot your password?</p>
						<div class="checkbox pull-right">
							<label><input type="checkbox"> Remember me.</label>
						</div>
					</div>
					<button type="button" class="btn submit_btn">Sign In</button>
				</form>-->
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
</div></div>
        <!--Signout popup end-->
        <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/dropdown-menu.js"></script>

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
      jQuery(".footerLoginLink a").attr("data-target",'#signoutpop');
        jQuery(".footerLoginLink a").text("Sign Out");
     
     <?php else:?>
     jQuery(".footerLoginLink a").attr("data-target",'#myModal');
     <?php endif;?>
    jQuery(".footerLoginLink a").attr("data-toggle",'modal');     
     jQuery(".woocommerce-product-search input[type='search']").attr("placeholder",'SEARCH');    

 });
</script>
       
<style>
.dropdown-menu>li>a {    
    color: #000;
    font-family: 'ProximaNova-Semibold';
    letter-spacing: 1px;
    text-decoration: none;
    }
</style>
        <?php wp_footer(); ?>

        </body>

        </html>
