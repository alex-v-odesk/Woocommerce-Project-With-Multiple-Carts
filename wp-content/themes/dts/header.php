<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?> class="no-js no-svg">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <title></title>
        <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/style.css" rel="stylesheet">
        <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/responsive.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noticia+Text:400,700" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/slick.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/slick-theme.css" />
        <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/animate.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/accordian.css">

      
       
       
        <?php wp_head(); ?>
    </head>

    <body>
        <!-- Start desktop header -->
        <header class="desktop_header hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="clearfix serch_btn">
                           <?php get_product_search_form();?>
                            <!--<input type="text" placeholder="SEARCH" class="">
                            <img class="search_icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/search-icon.png">-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="logo clearfix text-center">
                            <a href="<?php echo bloginfo('url');?>"><img src="<?php if(get_field("company_logo","option")){the_field("company_logo","option");}?>"></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pull-right clearfix account_detl text-center">
                            <ul class="list-inline">
                                <?php  global $current_user;
                                    get_currentuserinfo(); ?> 
                                <?php if(is_user_logged_in()):?>
                                <li class="my_account dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img class="sherry_icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/sherry_icon.png">
								<img class="sherry_icon_hover" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/sherry_icon_hover.png">
								<p>Hi, <?php if($current_user->user_firstname){echo 
                                    ucwords($current_user->user_firstname);}else{
                                        $parts = explode("@",$current_user->user_login);                  
                                    echo ucwords($parts[0]); }?>!</p>
							</a>
                                    <ul class="dropdown-menu" data-dropdown-in="fadeInUp" data-dropdown-out="fadeOutDown">
                                       
                                        <li><a href="<?php echo wc_get_account_endpoint_url( 'dashboard' );?>">My Account</a></li>
                                        <li><a href="<?php echo bloginfo('url');?>/wishlists">My Lists</a></li>
                                        <li><a href="<?php echo wc_get_account_endpoint_url( 'orders' );?>">My Orders</a></li>
                                        
                                        <li><a href="#" data-toggle="modal" data-target="#signoutpop">Sign out</a></li>
                                    </ul>
                                </li>
                                <li>
                                   <?php $cart_url=WC()->cart->get_cart_url();?>
                                    <a href="<?php echo $cart_url;?>">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart-icon.png">
                                    <p>Cart</p>
                                    </a>
                                </li>
                                <?php else:?>
                                 <li class="my_account dropdown">
                                 <a href="#" data-toggle="modal" data-target="#myModal">
								<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/user-icon.png">
								<p>Sign in</p>
							    </a>
                                </li>
                                 <li>
                                <a href="<?php if(get_field('registration_page_url','option')){the_field('registration_page_url','option');}else{echo "javascript:void(0);";}?>">
								<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/register-icon.png">
								<p>Register</p>
							    </a>
                                </li>
                                <?php endif;?>
                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Start mobile header -->
        <header class="hidden-lg hidden-md mobile_header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        <div class="mob_head_left">
                            <div class="toggle_bar">
                                <a href="#" class="bar_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/bar-icon.png"></a>
                                <a href="#" class="cross_icon" style="display:none;"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cross-icon.png"></a>
                                <div class="slidingDiv">
                                    <div class="custom-menu">
                                        <?php  $nav_arg=array(
                                'menu' => "top_menu",
                                'container_class'=>"custom-menu"                                     
                                     );                    
                                wp_nav_menu($nav_arg);?>
                                    </div>
                                </div>
                            </div>
                            <div class="search_mob">
                                <img class="mob_search_icon" src="<?php echo get_stylesheet_directory_uri();
                                                          ?>/assets/images/search-icon.png">
                                <div class="search_filed">
                                    <div class="inner_search_vs">
                                        <?php get_product_search_form();?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-5 col-xs-4">
                        <div class="clearfix mobile_logo">
                            <a href="<?php echo bloginfo('url');?>"><img src="<?php if(get_field("mobile_logo","option")){the_field("mobile_logo","option");}?>"></a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-4">
                        <div class="pull-right clearfix account_detl user_mob">
                           
                             <ul class="list-inline">
                                <?php  global $current_user;
                                    get_currentuserinfo(); ?> 
                                <?php if(is_user_logged_in()):?>
                                <li class="my_account dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img class="sherry_icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/sherry_icon.png">
								<img class="sherry_icon_hover" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/sherry_icon_hover.png">
								
							</a>
                                    <ul class="dropdown-menu" data-dropdown-in="fadeInUp" data-dropdown-out="fadeOutDown">
                                        <li>
                                            <a>Hi, <?php if($current_user->user_firstname){echo 
                                    ucwords($current_user->user_firstname);}else{
                                        $parts = explode("@",$current_user->user_login);                  
                                        echo ucwords($parts[0]); }?>!</a>
                                        </li>
                                        <li><a href="<?php echo wc_get_account_endpoint_url( 'dashboard' );?>">My Account</a></li>
                                        <li><a href="#">My Lists</a></li>
                                        <li><a href="<?php echo wc_get_account_endpoint_url( 'orders' );?>">My Orders</a></li>
                                        
                                        <li><a href="#" data-toggle="modal" data-target="#signoutpop">Sign out</a></li>
                                    </ul>
                                </li>
                                <li>
                                   <?php $cart_url=WC()->cart->get_cart_url();?>
                                    <a href="<?php echo $cart_url;?>">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cart-icon.png">                                    
                                    </a>
                                </li>
                                <?php else:?>
                               
                               <a href="<?php echo bloginfo(" url ");?>" data-toggle="modal" data-target="#myModal">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/user-icon.png" class="user-icon" >
					    </a>
                              
                                <?php endif;?>
                              
                            </ul>
                            
                            
                            
                            
                           
                          
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- End mobile header -->










        <!-- Start hero section -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php  $nav_arg=array(
                                'menu' => "top_menu",
                                'container_class'=>"custom-menu"                                     
                                     );                    
                                wp_nav_menu($nav_arg);?>

                        <?php if(is_product_category()):?>
                        <div class="save_order">
                            <h1>Save on your order!</h1>
                            <ul>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/date_icon.png">
                                    <h3>Dating Program</h3>
                                    <p>Delayed payment plans for your seasonal orders.</p>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/clock_icon.png">
                                    <h3>Early By Discount</h3>
                                    <p>Additional savings for orders placed early.</p>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/freight_icon.png">
                                    <h3>Freight Program</h3>
                                    <p>Caps on shipping prices based on quantity.</p>
                                </li>
                            </ul>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>

                        <div class="vendor_min_order">
                            <h1>Vendor Order Minimums</h1>                            
                            <?php $rp_root_cat=rp_get_root_cat(get_queried_object_id());?>
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

                        <div class="download_fall">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/winter_img.png">
                            <h1>Fall & Winter 2018</h1>
                            <p>Catalog</p>
                            <a href="#" class="learn_more">Download PDF</a>
                        </div>

                        <div class="download_summer">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/summer_img.png">
                            <h1>Summer 2017</h1>
                            <p>Catalog</p>
                            <a href="#" class="learn_more">Download PDF</a>
                        </div>
                        <?php endif;?>

                    </div>

                    <div class="col-md-9 main_sm_center">
