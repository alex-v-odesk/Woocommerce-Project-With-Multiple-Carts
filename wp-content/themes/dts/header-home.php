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
         <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/animate.min.css" rel="stylesheet" media="all">
        <?php wp_head(); ?>
    </head>

    <body>
        <!-- Start desktop header -->
        <header class="desktop_header hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="clearfix serch_btn">
                           <?php //get_search_form();
                            get_product_search_form();?>                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="logo clearfix text-center">
                            <!--					<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/logo.png"></a>-->
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
                            <li>
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
                                <a href="#" class="bar_icon"><i class="fa fa-bars"></i></a>
                                <a href="#" class="cross_icon" style="display:none;"><i class="fa fa-times"></i></a>
                                <div class="slidingDiv">

                                    <?php  $nav_arg=array(
                                'menu' => "top_menu",
                                'container_class'=>"custom-menu"                                     
                                     );                    
                                wp_nav_menu($nav_arg);?>
                                  

                                </div>
                            </div>

                            <div class="search_mob">
                                <img class="mob_search_icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/search-icon.png">
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

                            <?php if(is_user_logged_in()):?>


                            <!--<a href="<?php echo bloginfo(" url ");?>" data-toggle="modal" data-target="#signoutpop">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/user-icon.png">
					        </a>-->
                           
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
                                 <li class="my_account dropdown">
                                 <a href="#" data-toggle="modal" data-target="#myModal">
								<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/user-icon.png">
								<p>Sign in</p>
							    </a>
                                </li>
                                 <li>
                                <a href="<?php echo bloginfo('url').'/register';?>">
								<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/register-icon.png">
								<p>Register</p>
							    </a>
                                </li>
                                <?php endif;?>
                              
                            </ul>
                           
                           
                           
                           
                            <?php else:?>
                               <a href="<?php echo bloginfo(" url ");?>" data-toggle="modal" data-target="#myModal">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/user-icon.png" class="user-icon" >
					    </a>
                          
                          
                       
                          
                          
                          
                            <?php endif;?>



                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End header -->

        <!-- Start hero section -->
        <section class="hero-img" style="background:url(<?php 
    if(get_field(" header_image ")){the_field("header_image ");}else{
    echo get_stylesheet_directory_uri().'/assets/images/hero.png';
}?>);    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php  $nav_arg=array(
                                'menu' => "top_menu",
                                'container_class'=>"custom-menu"                                     
                                     );                    
                    wp_nav_menu($nav_arg);?>                       

                    </div>

                    <div class="tagline">
                        <h1><?php if(get_field('tagline_heading')){the_field('tagline_heading');}?></h1>
                        <p>by <span style="font-family: 'Noticia Text', serif; font-size: 20px; letter-spacing: 0;"><?php if(get_field('tagline_subheading')){the_field('tagline_subheading');}?></span></p>
                    </div>

                    <div class="col-md-9 hero_shop_btn" style="min-height: 430px;">
                        <div class="shop_hero_btn">
                            <a href="<?php if(get_field('image_button_link')){the_field('image_button_link');}?>"><?php if(get_field('image_button_text')){the_field('image_button_text');}?></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End hero section -->
