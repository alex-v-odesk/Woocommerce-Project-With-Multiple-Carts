<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Woocommerce Categories', 'twentyseventeen' ),
		'id'            => 'rpwoocat',
		'description'   => __( 'To add woocommerce categories.', 'twentyseventeen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => __( 'Home Video', 'twentyseventeen' ),
		'id'            => 'home_video',
		'description'   => __( 'Add Home video here.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Vendor Video', 'twentyseventeen' ),
		'id'            => 'vendor_video',
		'description'   => __( 'Add Vendor video here.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );



/*ACF Option page*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
/*ACF Option page end*/


  add_action( 'wp_login_failed', 'my_login_fail' );  // hook failed login

            function my_login_fail( $username ) {
                //redirect to custom login page and append login error flag
                //wp_redirect(home_url(). "&login_error" );
                wp_redirect(home_url(). "/?q=loginerror" );

               
                exit;
            }



/*Woocommerce hooks*/


/***----------------------------Single product page hook start ----------------------------***/
add_filter( 'woocommerce_product_tabs', 'rp_woo_remove_reviews_tab', 98 );
	function rp_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'rp_woocommerce_breadcrumbs' );
function rp_woocommerce_breadcrumbs() {
  
    return array(
			'delimiter' => '',
			'before' => '<li>',
            'after' => '</li>',
            'wrap_before'=> '<ul class="breadcrumb hidden-sm hidden-xs">',
            'wrap_after'=>'</ul>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
    
}




add_action( 'woocommerce_single_product_summary', 'rp_social_link', 4 );
function rp_social_link(){
?>
    <div class="social-icon clearfix">
                        <ul class="list-inline pull-left">
                            <li><a target="_blank" href='<?php if(get_field("company_pinterest","option")){the_field("company_pinterest ","option");}else{echo "javascript:void(0);";}?>' title="pinterest"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/pinterest.png"></a></li>
                            <li><a target="_blank" href='<?php if(get_field("company_facebook","option")){the_field("company_facebook","option");}else{echo "javascript:void(0);";}?>' title="facebook"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/facebook.png"></a></li>
                            <li><a target="_blank" href='<?php if(get_field("company_instagram","option")){the_field("company_instagram","option");}else{echo "javascript:void(0);";}?>' title="Instagram"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/instagram.png"></a></li>
                        </ul>
    </div> 
 
<?php    
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6 );
add_action( 'woocommerce_single_product_summary', 'rp_show_sku', 5 );
function rp_show_sku(){
    global $product;
    if ( $product->is_in_stock() && $product->get_sku() ) {
        echo "<p class='productSku'># ".$product->get_sku()."</p>";
    }
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 5 );


/*Product by quantity in multiple or 3*/
add_filter( 'woocommerce_quantity_input_args', 'rp_set_quntity_step', 1, 2 );

function rp_set_quntity_step( $args, $product ) {
     $args['step'] = 3;     
     $args['min_value'] = 3;    
     return $args;
}

function rp_wishlist_button_action_woocommerce_after_add_to_cart_form(  ) { 
   echo "<a href='javasrcipt:void(0);' id='rp-add-to-wish-list' onclick='rpaddToWishlist(".get_the_ID().")'><img src='".get_stylesheet_directory_uri()."/assets/images/like.png'>Add to Wishlist </a>";
}; 
         

add_action( 'woocommerce_after_add_to_cart_form', 'rp_wishlist_button_action_woocommerce_after_add_to_cart_form', 10, 0 ); 



/*Product by quantity in multiple or 3 end*/


if(!is_user_logged_in()):
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

// define the woocommerce_short_description callback 
function filter_woocommerce_short_description( $post_post_excerpt ) { 
    if(is_product()):
    $post_post_excerpt="To view pricing, sign in to your account.";
    endif;    
    return $post_post_excerpt; 
}; 
         
// add the filter 
add_filter( 'woocommerce_short_description', 'filter_woocommerce_short_description', 10, 1 ); 
add_action( 'woocommerce_single_product_summary', 'rp_signin_btn', 30 );
function rp_signin_btn(){
    echo "<button class='button btn submit_btn' data-toggle='modal' data-target='#myModal'>Sign In</button>";
   
}



endif;


// display an 'Out of Stock'  on product pages

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $product ) {    
 
    if ( ! $product->is_in_stock() ) {
        $availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability; 
}



remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'rp_output_related_products', 20 );

function rp_output_related_products(){
    
$terms = get_the_terms( get_the_ID(), 'product_cat' ); 
$last=count($terms);
	
?>
<div class="col-md-12 product_slider clearfix pt50">
					<div class="clearfix prod_header">
						<h1 class="pull-left"><?php echo "More ".$terms[$last-1]->name;?></h1>
						<a href="<?php echo get_term_link($terms[$last-1]->term_id).'?view=all';?>" class="pull-right view_all">View all</a>
					</div>
   
<div class="clearfix">
<div class="prod_slide">					
<?php
$args = array(    
     	'post_type' => 'product',
        'posts_per_page' => 25,
        'product_cat' => $terms[$last-1]->slug
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
global $product; ?>

<div>
    <div class="gallery_grid">
       
       <?php if (has_post_thumbnail( $loop->post->ID )) 
        echo '<img src="'.get_the_post_thumbnail_url($loop->post->ID, 'shop_catalog').'">'; 
        else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="">'; ?>        
	</div>
</div>



<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
					
    </div></div></div>
    
<?php    
   
}

/***----------------------------Single product page hook end ----------------------------***/



/***----------------------------Archive and shop page hook start ----------------------------***/


/*Sub-category or product page and shop page hook start*/
add_action( 'woocommerce_before_shop_loop_item_title', 'rp_out_of_stock_product_page', 10 );
function rp_out_of_stock_product_page(){
    global $product;
    if (! $product->is_in_stock() )
        echo '<p class="stock out-of-stock rpShopCat">Sold Out</p>';
}

//remove price
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

/*Sub-category or product page and shop page hook end*/

/*Product Archive page hook start*/

add_filter( 'woocommerce_show_page_title', '', 10, 2 ); 
// Removes showing results 
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_action( 'woocommerce_before_main_content', 'rp_headerImage',20, 0 );
function rp_headerImage(){
    if(!is_search()){
?>
                <div class="selct_boxed clearfix">
                <?php $product_tags = get_terms( 'product_tag',array('hide_empty'=>false) );?>
                <select id="bytag" class="rpdrop">
                <option value="">SHOP BY COLLECTION</option>
                <?php foreach($product_tags as $tag){?>
                    <option value="<?php echo $tag->slug;?>"><?php echo $tag->name;?></option>
                  <?php  } ?>
                </select>
               
                        <?php if ( is_active_sidebar( 'rpwoocat' ) ) : ?>
   
                        <?php dynamic_sidebar( 'rpwoocat' ); ?>
   
                        <?php endif; ?>
            </div>
            
            <!-- Start mobile select box -->
				<div class="selct_boxed mob_sel_box clearfix">
					<select id="bytag" class="rpdrop">
                <option value="">SHOP BY COLLECTION</option>
                <?php foreach($product_tags as $tag){?>
                    <option value="<?php echo $tag->slug;?>"><?php echo $tag->name;?></option>
                  <?php  } ?>
                </select>
					
					<?php if ( is_active_sidebar( 'rpwoocat' ) ) : ?>
   
                        <?php dynamic_sidebar( 'rpwoocat' ); ?>
   
                        <?php endif; ?>
					
				</div>
            
            
<?php } ?>
<?php if(is_product_tag()){ ?>
   <div class="clearfix rpbanner"  style="background: url(<?php if(get_field('tag_page_banner','option')){the_field('tag_page_banner','option');}else{
        echo get_stylesheet_directory_uri().'/assets/images/cart_banner.jpg'; }?>);" >
                <div class="tagline">                  
                </div>
            </div>
<style>
    @media only screen and (max-width:480px){
        .mob_gallery ul.products li img{max-height: 150px;}
        .p.stock.out-of-stock{top:45%;}
    } 
</style>      
<?php } ?>         
<?php if((is_product_category() || is_shop()) && !is_search()):?>
            
         
   <?php if(is_shop()){?>
   <div class="clearfix rpbanner"  style="background: url(<?php if(get_field('shop_page_banner','option')){the_field('shop_page_banner','option');}else{
        echo get_stylesheet_directory_uri().'/assets/images/cart_banner.jpg'; }?>);" >
                <div class="tagline">                  
                </div>
            </div>      
    <?php } ?>
      <?php if(!rp_has_child() && !is_shop()){?>
   <div class="clearfix rpbanner"  style="background: url(<?php if(get_field('product_page_banner','option')){the_field('product_page_banner','option');}else{
        echo get_stylesheet_directory_uri().'/assets/images/cart_banner.jpg'; }?>);" >
                <div class="tagline">                  
                </div>
            </div>      
    <?php } ?> 
          
            
            
<?php if(rp_has_child() && !is_shop()){?>
       <div class="banner_bg clearfix">
                <div class="tagline">
                    <h1>
                        <?php single_cat_title();?>
                    </h1>
                    <p>by <span style="font-family: 'Noticia Text', serif; font-size: 20px; letter-spacing: 0;">RAZ IMPORTS INC.</span></p>
                </div>

                <div class="shop_hero_btn">
                    <a href="#">Shop Collection</a>
                </div>
            </div>        
<?php 
function rp_action_woocommerce_archive_description( ) { 
   echo '<h1 class="text-uppercase">Create eye-catching the entire holiday season.</h1>';
 
}; 
add_action( 'woocommerce_archive_description', 'rp_action_woocommerce_archive_description', 9, 2 ); ?>
            
            <?php }?>
<?php
    endif;
}




/*Product Archive page hook end*/


/*Category page hook start*/
add_action( 'woocommerce_after_shop_loop_item', 'rp_remove_add_to_cart_buttons', 10 );

    function rp_remove_add_to_cart_buttons() {
      if( is_product_category() && rp_has_child()) {
          
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        
         
      }
    }
add_action( 'woocommerce_before_shop_loop', 'rp_bestsellers_slider', 10 );
function rp_bestsellers_slider(){
     if( is_product_category() && !rp_has_child()) {
?>
<span class="rpsubtitle"><?php single_cat_title();?></span>
<?php
}
     if( is_product_category() && rp_has_child()) {
?>
            <!--Sliding products-->
            <div class="product_slider clearfix pt50">
                <div class="clearfix prod_header">
                    <h1 class="pull-left">Top 25 Bestsellers</h1>
                    <a href="<?php echo get_term_link(get_queried_object_id()).'?view=all';?>" class="pull-right view_all">View all</a>
                </div>
                   <div class="clearfix">
                    <div class="prod_slide">
<?php
$args = array(
    'product_cat'=>get_queried_object()->slug,
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 25,
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
global $product; ?> 
<div>
    <div class="gallery_grid">
        <?php if (has_post_thumbnail( $loop->post->ID )) 
        echo '<img src="'.get_the_post_thumbnail_url($loop->post->ID, 'shop_catalog').'" alt="" class="img-responsive">'; 
        else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="" class="img-responsive">'; ?>
    </div>
</div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
                    </div>
                </div></div>    
<?php    
}}

add_filter('woocommerce_product_subcategories_hide_empty', 'woocommerce_show_empty_categories', 10, 1);

function woocommerce_show_empty_categories($show_empty){
    return false;
}

add_filter( 'woocommerce_subcategory_count_html', 'rp_hide_category_count' );
function rp_hide_category_count() {
	// No count
}
add_action( 'woocommerce_after_main_content', 'rp_vendor_video', 9 );
function rp_vendor_video(){
if( is_product_category() && !is_subcategory()) {    
?>
             <!-- Start video section -->
             <div class="video_sec vendor_video pt50">
					<h1 class="text-uppercase text-center hidden-lg hidden-md hidden-sm">Take a peek at some<br> of our favorites</h1>
											
						<?php if ( is_active_sidebar( 'vendor_video' ) ) : ?>

		                <?php dynamic_sidebar( 'vendor_video' ); ?>
	
                    <?php endif; ?>
					
				</div>
             
             
           
            
<?php            
    }
    } 
/**Category page hook end*/
add_action( 'woocommerce_shop_loop_item_title', 'rp_add_sku', 9 );
function rp_add_sku(){
    if( (is_product_category() && !rp_has_child()) || is_shop()) {
        global $product;
	
	if ( $product->get_sku() ) {
		echo '<div class="product-meta"># ' . $product->get_sku() . '</div>';
	}
        if(is_search()){
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        }
        
    }
}

/***----------------------------Archive and shop page hook end ----------------------------***/



/***---------------------------------Cart Page Hook------------------------------------***/

add_filter( 'woocommerce_cart_item_name', 'add_sku_in_cart', 20, 3);

function add_sku_in_cart( $title, $values, $cart_item_key ) {
    $sku = $values['data']->get_sku();
    return $sku ? sprintf("<h3>%s</h3>", $sku) . $title : $title;
}
/****---------------------------------Cart page hook end----------------------------------------------**/



/***------------------------------------Wp_footer start-------------------------------------------------------**/
add_action( 'wp_footer', 'rp_footer' );
function rp_footer(){
/*Category and shop page style start*/
if(is_product_category() || is_shop()):
?>


 <style>
                
.banner_bg {
                    position: relative;
                    background: url(<?php 
                    echo get_stylesheet_directory_uri().'/assets/images/vendor_banner.png';
                    ?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    min-height: 460px;
                }
                
                .vendor_video .inner_video {
                    position: relative;
                    background: url(<?php echo get_stylesheet_directory_uri();
                    ?>/assets/images/vendor_video_bg.jpg);
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    min-height: 500px;
                    padding: 60px 0px;
                    text-align: center;
                }
          
                
                @media only screen and (max-width: 490px) {
                    .banner_bg {
                        background: url(<?php 
 echo get_stylesheet_directory_uri().'/assets/images/mob_vendor_banner.jpg';
                        ?>);
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                    }
                }
 
</style>

<script>
jQuery(document).ready(function(){
     //jQuery("ul.products").addClass("list-inline clearfix");
     //jQuery("ul.products li a:first-child").wrapInner("<div class='gallery_grid'></div>");
     jQuery("ul.products li a img").addClass("img-responsive");
});
</script> 

<?php
endif;  

/*Category and shop page style end*/

/*Main Category page style start*/
if(is_product_category() && rp_has_child()):
?>
<style>
.gallery_grid h2 {
    position: absolute;
    top: 40%;
    text-align: center;
    margin-bottom: 0px;
    width: 100%;
    color: #fff;
    font-size: 20px;
    font-family: 'ProximaNova-Bold';
    text-transform: uppercase;
    padding: 0px;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    letter-spacing: 2px;
    line-height: 28px;
    text-shadow: 10px 13px 50px #080707;
}
    
</style>

<?php
endif;
/*Main Category page style end*/  
/* sub Category and shop page style start*/
if((is_product_category() && !rp_has_child() ) || is_shop() || is_product_tag()):
?>
<style>
.gallery ul.products li{
    min-height:385px;
    }
.product-meta {
    padding-top: 5px;
    font-weight: normal;
    color: #000;
}

h2.woocommerce-loop-product__title {
    text-transform: capitalize;
    color: #000;
    font-size: 15px;
    font-weight: normal;
    margin-top: 5px;
}

.product-add-to-cart {
    float: right;
    font-weight: bold;
    font-size: 20px;
}

.product-add-to-cart i {
    padding-left: 3px;
}

.product-add-to-cart a {
    font-size: 20px;
    color: #999;
}   
.gallery ul.products li a {
    text-decoration: none;
}
@media only screen and (max-width:480px){
   .gallery ul.products li {
        min-height: 300px;
    }
    .woocommerce-ordering {
        float: left;
    }
    .product-title{text-align: left;}
    p.stock.out-of-stock{
        padding: 6px 0px;
        margin-top: 0px;
    }
}       
      
</style>
<?php
endif;
/* sub Category and shop page style end*/    

    
/*cart*/
    if(is_cart()){
?>
<style>
    .woocommerce{text-align: center;}
</style>
<?php        
    }
/*cart end*/
    
/*cart and checkout page style and script start*/    
if(is_cart() || is_checkout()){
?>
<style>
[type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
    position: relative;
    padding-left: 1.95em;
    cursor: pointer;
}
[type="radio"]:not(:checked) + label:before, [type="radio"]:checked + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 5px;
    width: 20px;
    height: 20px;
    border: 2px solid #000;
    background: #fff;
    border-radius: 0px;
}
[type="radio"]:not(:checked), [type="radio"]:checked {
    position: absolute;
    left: -9999px;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    transform: scale(0);
}    
[type="radio"]:not(:checked) + label:after, [type="radio"]:checked + label:after {
    content: '';
    position: absolute;
    top: 8px;
    left: 2px;
    font-size: 20px;
    line-height: 0.8;
    color: #000;
    transition: all .2s;
    background: url(https://image.flaticon.com/icons/png/128/59/59836.png);
    background-size: 100%;
    height: 15px;
    width: 15px;
}
</style>
<?php        
}    
/*cart and checkout page style and script end*/     
}/*wp_footer end*/

/***---------------------------------Wp_footer end-----------------------------------------------------------**/


/***--------------------------------My account start-------------------------------------------------**/
 
add_filter( 'woocommerce_localisation_address_formats', 'change_order_of_fields' );
function change_order_of_fields( $formats ) {
   
    $formats['US'] = "<b>{name}</b>\n{company}\n{address_1} {address_2}\n{city}, {state} {postcode}\n{country}";
     $formats['default'] = "<b>{name}</b>\n{company}\n{address_1} {address_2}\n{city}, {state} {postcode}\n{country}";

    return $formats;
}

/***--------------------------------My account end-------------------------------------------------**/


/***--------------------------------checkout hook start------------------------------------**/

//add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

add_filter( 'woocommerce_package_rates', 'rp_unset_shipping_when_free_is_available_all_zones', 10, 2 );  
function rp_unset_shipping_when_free_is_available_all_zones( $rates, $package ) {     
    $all_free_rates = array();     
        foreach ( $rates as $rate_id => $rate ) {
        if ( 'free_shipping' === $rate->method_id ) {
            $all_free_rates[ $rate_id ] = $rate;
            break;
        }
    }     
    if ( empty( $all_free_rates )) {
        return $rates;
        } else {
        return $all_free_rates;
        } 
}

// define the woocommerce_after_edit_account_address_form callback 
function rp_action_woocommerce_after_edit_account_address_form( $array ) {
    global $wpdb;   
    $rp_uri=explode("/",$_SERVER['REQUEST_URI']); 
    $rp_last=count($rp_uri)-2;
    if($rp_uri[$rp_last]=="shipping"){
?>

   <?php 
        $result=$wpdb->get_results("SELECT * FROM  `rp_shipping_additional_address` WHERE `user_id`= ".get_current_user_id());
        if($result!==null){ ?>
<hr style="margin:50px 0px 20px; background:#ccc;">
        
    <h1 class="rpsubtitle">Additional Shiping Addresses</h1>
    <div class="row">
       <?php 
            
              foreach($result as $add){
        ?>
        <div class="col-md-6">
       
        <h3 style="text-transform: capitalize;"><?php echo $add->shipping_address_nickname;?></h3>
           <p><a href="javascript:void(0);" class="rp_delete_additional_shipping_address" data-address-id="<?=$add->id;?>" data-address-name="<?=$add->shipping_address_nickname;?>" style="color:#971a4a;font-weight:700;">Delete</a></p>
            <p><?php echo $add->shipping_company."<br><b>".$add->shipping_first_name." ".
            $add->shipping_last_name."</b><br>".$add->shipping_address_1.", ".$add->shipping_address_2."<br>".$add->shipping_city.", ".$add->shipping_state." ".$add->shipping_country.", ".$add->shipping_postcode;?></p>
            
        </div>
        <?php }?>
    </div>
    

<script>
    jQuery(document).ready(function(){
        jQuery(".rp_delete_additional_shipping_address").click(function(){
            var del_id=jQuery(this).attr("data-address-id");           
            var r = confirm("Do you want to delete '"+jQuery(this).attr("data-address-name")+"' address?");
            if (r == true) {                 
                 jQuery.ajax({
                     type : "post",
                     dataType : "json",
                     url :"<?php echo admin_url('admin-ajax.php');?>",
                     data : {action: "delete_rp_additional_shipping_address", del_id : del_id},
                     success: function(res) {                         
                       window.location.reload();
                     },
                     error:function(errr){
                        alert("Error:"+errr);
                    }
                  });
                
            } else {
                txt = "You pressed Cancel!";
            }
          
        });
    });
</script>
<?php }}?>

<?php    
} 

add_action( 'woocommerce_after_edit_account_address_form', 'rp_action_woocommerce_after_edit_account_address_form', 10, 1 );

add_action( 'wp_ajax_delete_rp_additional_shipping_address', 'delete_rp_additional_shipping_address' );

function delete_rp_additional_shipping_address() {	
    $id=$_POST['del_id'];    
    global $wpdb;
    $wpdb->delete( "rp_shipping_additional_address", array('id'=>$id));
    wp_send_json('Deleted');
	
}


// define the woocommerce_customer_save_address callback 
function rp_action_woocommerce_customer_save_address( $user_id, $load_address ) {
      
    global $wpdb;
    $rp_save=array(
    'user_id'=>$user_id,
    'shipping_company'=> get_user_meta($user_id,'shipping_company',true),
    'shipping_address_nickname'=>get_user_meta($user_id,'shipping_address_nickname',true),
    'shipping_first_name'=>get_user_meta($user_id,'shipping_first_name',true),   
    'shipping_last_name'=>get_user_meta($user_id,'shipping_last_name',true),
    'shipping_address_1'=>get_user_meta($user_id,'shipping_address_1',true),
    'shipping_address_2'=>get_user_meta($user_id,'shipping_address_2',true),
    'shipping_city'=>get_user_meta($user_id,'shipping_city',true),
    'shipping_country'=>get_user_meta($user_id,'shipping_country',true),
    'shipping_postcode'=>get_user_meta($user_id,'shipping_postcode',true),
    'shipping_state'=>get_user_meta($user_id,'shipping_state',true)       
    );
    
   
    $mylink = $wpdb->get_row( "SELECT * FROM  `rp_shipping_additional_address` WHERE  `shipping_address_nickname` =  '".get_user_meta($user_id,'shipping_address_nickname',true)."'");
    
    
    if ( null !== $mylink ) {
         $wpdb->update('rp_shipping_additional_address',$rp_save, 
            array('shipping_address_nickname'=>get_user_meta($user_id,'shipping_address_nickname',true)));
        
    } else {
        $wpdb->insert('rp_shipping_additional_address',$rp_save);
    }
    wp_safe_redirect(get_permalink( get_option('woocommerce_myaccount_page_id') ));
    exit();
} 
 
add_action( 'woocommerce_customer_save_address', 'rp_action_woocommerce_customer_save_address', 10, 2 );

add_action( 'woocommerce_new_order', 'rp_create_invoice_for_wc_order',20, 1  );
function rp_create_invoice_for_wc_order( $order_id ) {
    $order = new WC_Order( $order_id );
    echo "<pre>";print_r($order );echo "</pre>";
    $rp_c_user_id=get_current_user_id();
    global $wpdb;
    $shipping_nickname= ($order->shipping_address_nickname!="") ? $order->shipping_address_nickname : "Same as Billing";
    $rp_save=array(
    'user_id'=>$rp_c_user_id,
    'shipping_company'=>  $order->shipping_company,
    'shipping_address_nickname'=>$shipping_nickname,
    'shipping_first_name'=>$order->shipping_first_name,   
    'shipping_last_name'=>$order->shipping_last_name,
    'shipping_address_1'=>$order->shipping_address_1,
    'shipping_address_2'=>$order->shipping_address_2,
    'shipping_city'=>$order->shipping_city,
    'shipping_country'=>$order->shipping_country,
    'shipping_postcode'=>$order->shipping_postcode,
    'shipping_state'=>$order->shipping_state       
    );
    
   
    $mylink = $wpdb->get_row( "SELECT * FROM  `rp_shipping_additional_address` WHERE  `shipping_address_nickname` =  '".$shipping_nickname."'");
    
    
    if ( null !== $mylink ) {
         $wpdb->update('rp_shipping_additional_address',$rp_save, 
                       array('shipping_address_nickname'=>$shipping_nickname));
        
    } else {
        $wpdb->insert('rp_shipping_additional_address',$rp_save);
    }
    
    
}

add_action('wp_footer','rp_fill_select');
function rp_fill_select(){
    //if(is_page('registration') || is_checkout()){
    $rp_c_user_id=get_current_user_id();
    global $wpdb;
    $saved_adresses=$wpdb->get_results( 'SELECT * FROM  `rp_shipping_additional_address` 
        WHERE  `user_id`='.$rp_c_user_id.' ORDER BY  `date_created` DESC',ARRAY_A);
        
    $rp_c_shipping_add=array();
    
    foreach($saved_adresses as $k=>$add){
        $rp_key=$add['shipping_address_nickname'];
        foreach($add as $key=>$val){
            
            $rp_c_shipping_add[$rp_key][$key]=$val;
        }
    }    
   
   //echo "<pre>"; print_r($saved_adresses);  echo "</pre>";  
   //echo "<pre>"; print_r($rp_c_shipping_add);  echo "</pre>";  
    $rp_val=array();
    foreach($rp_c_shipping_add as $k=>$add){
        $rp_val_single="";
        $rp_val_single="[{";
        foreach($add as $key=>$value){
            $rp_val_single.='"'.$key.'"'.":".'"'.$value.'",';
        }
         $rp_val_single.='"rp_address_nickname":"'.$saved_adresses[0]['shipping_address_nickname'].'"';
        $rp_val_single.="}]";
        $rp_val[$k][]=$rp_val_single;
    }
   //echo "<pre>"; print_r($rp_val);  echo "</pre>"; 
    
?>
<script>
jQuery(document).ready(function(){
    jQuery("#billing_country_field").insertAfter("#billing_address_2_field");
    jQuery("#shipping_country_field").insertAfter("#shipping_address_2_field");
    jQuery("#shipping_company_field").insertBefore("#shipping_first_name_field");
   
    
    <?php if(!is_page_template('registration')){?>
            jQuery("#shipping_address_nickname_field").css("display","none");
            jQuery("#select_shipping_address_nickname_field").insertBefore("#shipping_company_field");
      
    <?php } ?>
    <?php $n=0;
    foreach($rp_val as $k=>$add){ $rp_key=$k;?>
    <?php foreach($add as $rp_v){?>
        jQuery('#select_shipping_address_nickname option:last').before(jQuery('<option>', {
        value:'<?=$rp_v;?>',        
        text: '<?=$rp_key;?>',
        selected: '<?php if($n++==0)echo "selected"?>'
        }));
    <?php }} ?>   
 
    if(jQuery("#select_shipping_address_nickname").val()==-2){
        jQuery("#shipping_address_nickname_field").css("display","block");
    }
    
    jQuery("#select_shipping_address_nickname").change(function(){
        
    	if(jQuery(this).val()==-2){
            jQuery("#shipping_address_nickname_field").css("display","block");
            jQuery("#shipping_address_nickname").val("");
            jQuery("#shipping_company").val("");
            jQuery("#shipping_first_name").val("");
            jQuery("#shipping_last_name").val("");
            jQuery("#shipping_address_1").val("");
            jQuery("#shipping_address_2").val("");
            jQuery("#shipping_city").val("");           
            jQuery("#shipping_country").val("").trigger('change');
            jQuery("#shipping_postcode").val("");
            jQuery("#shipping_state").val("").trigger('change');
            
        }else if(jQuery(this).val()==-1){
            jQuery("#shipping_address_nickname_field").css("display","none");
            jQuery("#shipping_address_nickname").val("");
            jQuery("#shipping_company").val("");
            jQuery("#shipping_first_name").val("");
            jQuery("#shipping_last_name").val("");
            jQuery("#shipping_address_1").val("");
            jQuery("#shipping_address_2").val("");
            jQuery("#shipping_city").val("");           
            jQuery("#shipping_country").val("").trigger('change');
            jQuery("#shipping_postcode").val("");
            jQuery("#shipping_state").val("").trigger('change');
           
        }
        else{
        	var ob=JSON.parse(jQuery(this).val());
            jQuery("#shipping_company").val(ob[0].shipping_company);
            jQuery("#shipping_first_name").val(ob[0].shipping_first_name);
            jQuery("#shipping_last_name").val(ob[0].shipping_last_name);
            jQuery("#shipping_address_1").val(ob[0].shipping_address_1);
            jQuery("#shipping_address_2").val(ob[0].shipping_address_2);
            jQuery("#shipping_city").val(ob[0].shipping_city);           
            jQuery("#shipping_country").val(ob[0].shipping_country).trigger('change');
            jQuery("#shipping_postcode").val(ob[0].shipping_postcode);
            jQuery("#shipping_state").val(ob[0].shipping_state).trigger('change');
            jQuery("#shipping_address_nickname").val(ob[0].shipping_address_nickname);
            <?php if(!is_page_template('registration')){?>
                jQuery("#shipping_address_nickname_field").css("display","none");
            <?php } ?>
        }
    });
    
});    
</script>
<style>
    @media only screen and (max-width:480px){
        .form-row{width: 100%!important;}
    }
</style>
<?php    
//}

}

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'rp_custom_checkout_field_display_admin_order_meta', 20, 1 );

function rp_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Shipping Address Nickname').':</strong> ' . get_post_meta( $order->get_id(), '_shipping_address_nickname', true ) . '</p>';    
}

add_filter( 'woocommerce_checkout_fields' , 'rp_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function rp_custom_override_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
   
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_email-2']);
     return $fields;
}

// Billing Fields.

add_filter( 'woocommerce_billing_fields', 'rp_reorder_filter_woocommerce_billing_fields', 20, 2 ); 
function rp_reorder_filter_woocommerce_billing_fields( $fields,$int ) {
   //if(is_page('registration')){  
   		 $fields['billing_first_name']['priority'] = 10;
		$fields['billing_last_name']['priority'] = 20;      
        $fields['billing_address_1']['priority'] = 20;
        $fields['billing_address_2']['priority'] = 20;
         $fields['billing_city']['priority'] = 30;
        $fields['billing_country']['priority'] =80;
        $fields['billing_state']['priority'] = 100;
        $fields['billing_postcode']['priority'] = 110; 
   //}
  
	return $fields;
}
// shipping Fields.

add_filter( 'woocommerce_shipping_fields', 'rp_reorder_filter_woocommerce_shipping_fields', 20, 2 ); 
function rp_reorder_filter_woocommerce_shipping_fields( $fields,$int ) {
    
      $fields['select_shipping_address_nickname'] = array(
    'type' => 'select',
    'options' => array( '-1' => 'Select nickname...', '-2' => 'Add New'),
    'label'     => __('Address Nickname', 'woocommerce'),   
    'required'  => false,
    'class'     => array('form-row-first') 
    
     );
     $fields['shipping_address_nickname'] = array(   
    'label'     => __('New Address Nickname', 'woocommerce'),
    'placeholder'=>__('Add New (Home, Work, Office, Store)', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row-first clear')
   
     );
    
   //if(is_page('registration')){
        $fields['shipping_company']['priority'] = 9;
        $fields['shipping_first_name']['priority'] = 10;
        $fields['shipping_last_name']['priority'] = 20;    
        $fields['shipping_address_1']['priority'] = 30;
        $fields['shipping_address_2']['priority'] = 30;
         $fields['shipping_city']['priority'] = 50;
        $fields['shipping_country']['priority'] = 80;
        $fields['shipping_state']['priority'] = 110;
        $fields['shipping_postcode']['priority'] = 100;
        $fields['shipping_company']['class']=array('form-row-last'); 
   // }

	return $fields;
}

// Hook in
add_filter( 'woocommerce_default_address_fields' , 'rp_custom_override_default_address_fields' );

// Our hooked in function - $address_fields is passed via the filter!
function rp_custom_override_default_address_fields( $address_fields ) {
    //if(is_page('registration')){
        $address_fields['first_name']['class'] = array('form-row-first clear');
        $address_fields['address_1']['label'] = 'Address Line 1';
        $address_fields['address_2']['label'] = 'Address Line 2';
        $address_fields['address_1']['class'] = array('form-row-first');
        $address_fields['address_2']['class'] = array('form-row-last');
        $address_fields['city']['class'] = array('form-row-first');
        $address_fields['country']['class'] = array('form-row-last');
        $address_fields['postcode']['class'] = array('form-row-first');
        $address_fields['state']['class'] = array('form-row-last clear'); 
             
    //}
    return $address_fields;
} 

// hide coupon field on cart page
function hide_coupon_field_on_cart( $enabled ) {
	if ( is_cart() ) {
		$enabled = false;
	}
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_cart' );
// hide coupon field on checkout page
function hide_coupon_field_on_checkout( $enabled ) {
	if ( is_checkout() ) {
		$enabled = false;
	}
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_checkout' );
/***--------------------------------Checkout hook end---------------------------------------**/

/**********************************Search Page hook start*************************************/
if(is_search()):
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
endif;
/***************-----------------------Search Page hook end----------------------------**********/


/****-----------------------Ultimate member hook start--------------------------------- ***/
add_action('um_submit_form_errors_hook_','um_custom_validate_username', 999, 1);
function um_custom_validate_username( $args ) {
	global $ultimatemember;
	
	if ( isset( $args['user_email'] ) && $args['user_email']!="" ) {
		$email=$args['user_email'];
	}
    if ( isset( $args['secondary_user_email'] ) && $args['secondary_user_email']!=="" ) {
		$confirm_email=$args['secondary_user_email'];
	}
    if ( $email != $confirm_email) {
		$ultimatemember->form->add_error( 'secondary_user_email', 'Email not matched.' );
	}
}

/****---------------------------------Ultimate member hook end--------------------- ***/

/***** Change product price by quantity start*****/


/***** Change product price by quantity end*****/


/********* Add to Cart only same top most categoty product ********/

function is_product_the_same_cat($valid, $product_id, $quantity) {
    global $woocommerce;
    if($woocommerce->cart->cart_contents_count == 0){
		 return true;
	}
    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];
        
		$terms = get_the_terms( $_product->id, 'product_cat' );		
        $target_terms = get_the_terms( $product_id, 'product_cat' );		 
		$rpterms= get_ancestors( $terms[0]->term_id, 'product_cat');		
		$rptarget_terms=get_ancestors( $target_terms[0]->term_id, 'product_cat');
		$rpterms_count=count($rpterms);
		$rptarget_terms_count=count($rptarget_terms);	
	
    }
	
	if($rpterms[$rpterms_count-1] == $rptarget_terms[$rptarget_terms_count-1]) return $valid;
    else {
        wc_add_notice( '<p class="same_cat_product_error">You can add to cart products of single vendor at a time!</p>', 'error' );
		
		return false;
    }
}
//add_filter( 'woocommerce_add_to_cart_validation', 'is_product_the_same_cat',10,3);




/****** Pagination view all *******/

//NUMBER OF PRODUCTS TO DISPLAY ON SHOP PAGE
add_filter('loop_shop_per_page', 'rp_view_all_products');

function rp_view_all_products(){
	if($_GET['view'] === 'all'){
		return '9999';
	}
}


/*********To chack present category has child category *********/
function rp_has_child($cat_id = null){
	if (is_tax('product_cat')) {
	
			if($cat_id!=null){
				if (empty($cat_id)){
            		$term_id = get_queried_object_id();
				}else{
					$term_id=$cat_id;
				}
				
				$children = get_terms(  'product_cat', array(
				'parent'    => $term_id,
				'hide_empty' => false
				) );
				if($children) {
				   return true;
				}else{
					return false;
				}

			}else{
				$term= get_queried_object();
				$children = get_terms( $term->taxonomy, array(
				'parent'    => $term->term_id,
				'hide_empty' => false
				) );
				if($children) {
				   return true;
				}else{
					return false;
				}

			}

			

	}
		return false;

}


/********To chack present category is subcategory ********/

function is_subcategory ($cat_id = null) {
   if (is_tax('product_cat')) {
	   
	   if($cat_id!=null){
			if (empty($cat_id)){
				$cat_id = get_queried_object_id(); 
			}		   
	   }else{
		   $cat_id = get_queried_object_id();
	   }
     
        $cat = get_term($cat_id, 'product_cat');
        if ( empty($cat->parent) ){
            return false;
        }else{
            return true;
        }
    }
    return false;
}

/***************get root category of given category ****************/
function rp_get_root_cat_id($rpcat_id){
    $ancestors=get_ancestors( $rpcat_id,'product_cat');   
    $ancestors=array_reverse($ancestors);
    if(!$ancestors){
        return false; 
    }    
    return $ancestors[0];
}
function rp_get_root_cat($rpcat_id){ 
    $ancestors=get_ancestors( $rpcat_id,'product_cat');   
    $ancestors=array_reverse($ancestors);  
    $rp_the_term = get_term( $ancestors[0], 'product_cat' );
    if($rp_the_term->errors[invalid_term][0]=="Empty Term"){
        return false;
    }
   //echo "<pre>";print_r( $rp_the_term);echo "</pre>";
    return $rp_the_term;
}

/***********get cart product root category**********/

	
	function rp_get_cart_root_cat(){
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
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
						return $root_cat;
                        
                    }
                    else {
                        // no category assigned to the product
						return false;
                    }
                   
				   }
				   }	
}

/****************************Remove Tax ************************************/
// Remove the Tax Line item from the cart.
function wc_remove_cart_tax_totals( $tax_totals, $instance ) {
	if( is_cart() ) {
		$tax_totals = array();
	}
	return $tax_totals;
}
add_filter( 'woocommerce_cart_tax_totals', 'wc_remove_cart_tax_totals', 10, 2 );
// Show the cart total excluding tax.
function wc_exclude_tax_cart_total( $total, $instance ) {
	// If it is the cart subtract the tax
	if( is_cart() ) {
		$total = round( WC()->cart->cart_contents_total + WC()->cart->shipping_total + WC()->cart->fee_total, WC()->cart->dp );
	}
	return $total;
}
add_filter( 'woocommerce_calculated_total', 'wc_exclude_tax_cart_total', 10, 2 );
add_filter( 'woocommerce_subscriptions_calculated_total', 'wc_exclude_tax_cart_total', 10, 2 );

/*********************** Customer already bought ******************************/
function has_bought($rpuser_id=0) {
    $rp_customer_id = ($rpuser_id==0) ? get_current_user_id() : $rpuser_id;
    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $rp_customer_id,
        'post_type'   => 'shop_order', // WC orders post type
        'post_status' => 'wc-completed' // Only orders with status "completed"
    ) );
    // return "true" when customer has already one order
    //return count( $customer_orders ) > 0 ? true : false;
    return $customer_orders;
}
/***********************Set minimum cart total **********************************/

// Set a minimum dollar amount per order

add_action( 'woocommerce_check_cart_items', 'rp_set_min_total' );
function rp_set_min_total() {
	// Only run in the Cart or Checkout pages
	if( is_cart() || is_checkout() ) {
		global $woocommerce;
    
		
?>
<?php
    $myposts= has_bought();
    $has_bought_cat_ids=array();                            
    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <?php $order = wc_get_order($post->ID); ?>
    <?php foreach ($order->get_items() as $item_key => $item_values):
        $product_id = $item_values->get_product_id();
            $term_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
            $root_cat=rp_get_root_cat_id($term_list[0]);
            $has_bought_cat_id = $root_cat;             
    endforeach;
    $has_bought_cat_ids[]=$has_bought_cat_id;                            
?>  
<?php endforeach; wp_reset_postdata(); ?>   
 
<?php
$current_cart_product_cat_id = rp_get_cart_root_cat()->term_id;

if(in_array(rp_get_cart_root_cat()->term_id,$has_bought_cat_ids)){
   
    $minimum_cart_total = get_term_meta(rp_get_cart_root_cat()->term_id,'reorder_minimum_amount',true) ?get_term_meta(rp_get_cart_root_cat()->term_id,'reorder_minimum_amount',true) : 250;
   
}else{
    
    // Set minimum cart total
        $minimum_cart_total = get_term_meta(rp_get_cart_root_cat()->term_id,'minimum_amount',true) ?get_term_meta(rp_get_cart_root_cat()->term_id,'minimum_amount',true) : 500;
}        

?>   
     

<?php		 
	     
		// This is before taxes and shipping charges
		$total = WC()->cart->subtotal;		
		
		if( $total <= $minimum_cart_total  ) {
			// Display our error message
            if(is_checkout()){
			wc_add_notice( sprintf( '<strong>A Minimum of %s %s is required for %s before checking out.</strong>'
				.'<br />Current cart\'s total: %s %s',              
                get_woocommerce_currency_symbol(),                  
				$minimum_cart_total,
                rp_get_cart_root_cat()->name,
				get_woocommerce_currency_symbol(),
				$total
				 ),
			'error' );
		}
        } 
	}
}

/******************/

add_action( 'wp_ajax_add_new_wish_list_folder', 'add_new_wish_list_folder' );

function add_new_wish_list_folder(){
    $folder_title=strtolower( trim($_POST["rpnewwishlistfolder"]) );
    $folder_title=ucwords($folder_title);
    $rp_current_user_id=get_current_user_id();
    global $wpdb;
    $rp_check=$wpdb->get_results("SELECT * FROM  `rp_wishlist_folder` WHERE  `title` = '$folder_title'
    AND  `user_id` =$rp_current_user_id");
    if($wpdb->num_rows==0){
    $wpdb->insert('rp_wishlist_folder',array('user_id'=>$rp_current_user_id,'title'=>$folder_title));
     }
    $rows=$wpdb->get_results("SELECT * FROM `rp_wishlist_folder` WHERE `user_id`='$rp_current_user_id'");
          $num=0;
           ?>
           <option value='-1'>Select List</option>
           <?php
            foreach($rows as $row){            
              echo "<option value='$row->id'>$row->title</option>";
            }
            ?>
            <option value='-2'>Create new</option>
            <?php
   
    //wp_send_json($folder_title);
}

add_action( 'wp_ajax_add_new_wish_list', 'add_new_wish_list' );
function add_new_wish_list(){
     $folder_id=$_POST["rpwishlistfolderlist"];
     $pid=$_POST["pid"];
    $rp_current_user_id=get_current_user_id();
    global $wpdb;
    $rp_check=$wpdb->get_results("select `folder_id` from `rp_wishlist` where `folder_id`=$folder_id and `product_id`=$pid");   
    
    if($wpdb->num_rows==0){ 
        $wpdb->insert('rp_wishlist',array('user_id'=>$rp_current_user_id,'folder_id'=>$folder_id,'product_id'=>$pid));
    }    
    echo "Success";
}
add_action( 'wp_ajax_rp_check_product_in_wishlist', 'rp_check_product_in_wishlist' );
function rp_check_product_in_wishlist(){
    $pid=$_POST['rppid'];
    global $wpdb;
    $rp_current_user_id=get_current_user_id();
    $rows=$wpdb->get_results("select title from rp_wishlist_folder where id in (select folder_id from rp_wishlist where product_id=$pid and user_id=$rp_current_user_id)");
    if($rows){
    ?>
    <h4>Product already in Wishlist</h4>
    <ul style="list-style: disc;color:#971a4a;">
        <?php foreach($rows as $row){ ?>
        <li><a href="#"><?php echo $row->title;?></a></li>
        <?php }?>
    </ul>
    <?php } wp_die(); 
}





/*************************** Group Product befor add to cart *************************/
// On Add to cart add the item custom data
add_filter( 'woocommerce_add_cart_item_data', 'filter_woocommerce_add_cart_item_data', 10, 3 ); 
function filter_woocommerce_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
	// Add your logic to find the item category group.
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
	$category_group =$root_cat->term_id;
    
	$cart_item_data['item_category_group'] = $category_group;
        
	return $cart_item_data; 
}
/**************************************/
add_action( 'wp_ajax_edit_new_wish_list_folder', 'edit_new_wish_list_folder' );
function edit_new_wish_list_folder(){
    $folder_title=$_POST["rpnewwishlistfolder"];
$folder_id=$_POST["rpnewwishlistfolderid"];
   global $wpdb;
   $wpdb->update( 'rp_wishlist_folder', array('title'=>$folder_title), array('id'=>$folder_id) );
   echo "Success";
}
/******************************/
add_action( 'woocommerce_proceed_to_checkout', 'rpwoocommerce_button_proceed_to_checkout', 20 );
function rpwoocommerce_button_proceed_to_checkout(){
?>
<script>
jQuery(document).ready(function(){
    jQuery("a.checkout-button").each(function(){
        jQuery(this).attr("id",jQuery(this).siblings('input[type=hidden]').val());
    });
      
    jQuery("a.checkout-button").click(function(e){
        
      var rp_group_id= $(this).attr("id");
        var check_min=parseInt(jQuery(".ac-content input[name=radio_"+rp_group_id+"]:checked").val());
        var order_tot=parseInt(jQuery(".rpordertotal_"+rp_group_id).text());
        if(check_min > order_tot){
            jQuery("#woocommerce-error-"+rp_group_id).html("*You have not reached the order minimum of <?=get_woocommerce_currency_symbol();?>"+check_min+" for "+jQuery(".vendor_name_"+rp_group_id).text()+".");
            jQuery(".rpordertotal_"+rp_group_id).css("color","#971a4a");
            jQuery('html, body').animate({
                scrollTop: jQuery("#woocommerce-error-"+rp_group_id).offset().top
            }, 700);
            return false;
            
        }else{
            jQuery("#woocommerce-error-"+rp_group_id).html("");
            jQuery(".rpordertotal_"+rp_group_id).css("color","#000");
        }
        
        
        jQuery.ajax({
            url: "<?php echo admin_url('admin-ajax.php');?>",
            dataType: 'json',    
            data: {action: 'save_cart_and_proceed', rp_group_id:rp_group_id},
            type: 'POST',
            success:function(resp){
                    console.log('done');
                    console.log(resp);                
                    window.location.href="<?php echo wc_get_checkout_url();?>";
            },
            error:function(rperr){
                console.log('error');
                console.log(rperr);
            }
        });
        e.preventDefault();
    });
    


});
</script>
<?php    
}


add_action("wp_ajax_save_cart_and_proceed", "save_cart_and_proceed");
function save_cart_and_proceed() {  
  
  $rp_group_id = isset($_POST['rp_group_id']) ? $_POST['rp_group_id'] : rp_get_cart_root_cat()->term_id;  

 global $woocommerce;
$return=array();
  // get user details
  global $current_user;
  get_currentuserinfo();

  if (is_user_logged_in())
  {
    $user_id = $current_user->ID;
    $cart_contents = $woocommerce->cart->get_cart();
    $meta_key = 'rp_saved_cart';
    $meta_value = $cart_contents;
    update_user_meta( $user_id, $meta_key, $meta_value);
  }
    $remaining_cart_items = array();
  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      if($cart_item['item_category_group'] != $rp_group_id){
          $remaining_cart_items[$cart_item_key]=$cart_item;        
            WC()->cart->remove_cart_item($cart_item_key);
      }     
  }
    
if (is_user_logged_in())
  {
    $user_id = $current_user->ID;
    $meta_key = 'rp_saved_remaining_cart';
    $meta_value = $remaining_cart_items;
    update_user_meta( $user_id, $meta_key, $meta_value);
  }
    
    $return['msg'] = "Saved cart".$rp_group_id;    
    die(json_encode($return));   
}

function rp_save_cart(){
   
    global $woocommerce;
    global $current_user;
    get_currentuserinfo();
if (is_user_logged_in())
  {
    $user_id = $current_user->ID;
    
    if ( WC()->cart->get_cart_contents_count() == 0 ) {
        update_user_meta( $user_id, 'rp_saved_remaining_cart', "");
        update_user_meta( $user_id, 'rp_saved_cart', "");
        header('Location: '.$_SERVER['REQUEST_URI']);
    }else{
        $cart_contents = $woocommerce->cart->get_cart();
        $meta_key = 'rp_saved_cart';
        $meta_value = $cart_contents;
        update_user_meta( $user_id, $meta_key, $meta_value);
    }
  }
}



function filter_woocommerce_update_cart_action_cart_updated( $cart_updated ) { 
    rp_save_cart();
    return $cart_updated; 
}; 
         

//add_filter( 'woocommerce_update_cart_action_cart_updated','filter_woocommerce_update_cart_action_cart_updated', 10, 1 ); 
//add_action( 'woocommerce_cart_item_removed', 'rp_reload' ,100); 


add_action('template_redirect','rp_check_saved_cart');
function rp_check_saved_cart(){ 
   
if(is_cart()){
    global $woocommerce;  
    global $current_user;
    get_currentuserinfo();

  if (is_user_logged_in())
  {
    $user_id = $current_user->ID;  
    $meta_key = 'rp_saved_cart';
    $rp_saved_cart=get_user_meta($user_id,$meta_key,true);  
    if($rp_saved_cart){           

          // clear current cart, incase you want to replace cart contents, else skip this step
          $woocommerce->cart->empty_cart(true);

          // add cart contents
          foreach ( $rp_saved_cart as $cart_item_key => $values )
          {
            $id =$values['product_id'];
            $quant=$values['quantity'];
            $woocommerce->cart->add_to_cart( $id, $quant);
          }
        
    }
      update_user_meta( $user_id, 'rp_saved_remaining_cart', "");
      update_user_meta( $user_id, 'rp_saved_cart', "");
  }
    
}
}



add_action('woocommerce_checkout_order_processed', 'rp_send_order');

function rp_send_order($order_id) {
  
    global $woocommerce;  
    global $current_user;
    get_currentuserinfo();

  if (is_user_logged_in())
  {
    $user_id = $current_user->ID;  
    $meta_key = 'rp_saved_remaining_cart';
    $rp_saved_cart=get_user_meta($user_id,$meta_key,true);  
    if($rp_saved_cart){           

          // clear current cart, incase you want to replace cart contents, else skip this step
          $woocommerce->cart->empty_cart(true);

          // add cart contents
         /* foreach ( $rp_saved_cart as $cart_item_key => $values )
          {
            $id =$values['product_id'];
            $quant=$values['quantity'];
            $woocommerce->cart->add_to_cart( $id, $quant);
          }*/
        $meta_value=array();
        update_user_meta( $user_id, $meta_key, $meta_value);
        $meta_value=$rp_saved_cart;
        update_user_meta( $user_id, 'rp_saved_cart', $meta_value);
    }
  }
    
} 

remove_action("woocommerce_cart_collaterals","woocommerce_cart_totals",10);



/************************Billing and shiiping on Registration page************************/

function rp_action_woocommerce_register_form_start(  ) {
    echo "<h1 class='rpsubtitle'>Create and account</h1>"; 
    echo "<div>";
    echo "<h1 class='rpsubtitle-small'>Login Information</h1>";
    echo "<span style='color:#971a4a;'>*Required</span>";
    echo "</div>";
}; 
add_action( 'woocommerce_register_form_start', 'rp_action_woocommerce_register_form_start', 10, 0 ); 


// Function to check starting char of a string
function startsWith($haystack, $needle){
    return $needle === '' || strpos($haystack, $needle) === 0;
}


// Custom function to display the Billing Address form to registration page
function rp_add_billing_form_to_registration(){
    global $woocommerce;
    $checkout = $woocommerce->checkout();
    ?>
      <p class="form-row form-row-last" id="confirm-email-box">
		<label for="reg_email2"><?php _e( 'Confirm Email', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="email" class="input-text" name="email2" id="reg_email2" value="<?php if ( ! empty( $_POST['email2'] ) ) echo esc_attr( $_POST['email2'] ); ?>" required/>
	</p>
    <p class="form-row form-row-last" id="confirm-password-box">
		<label for="reg_password2"><?php _e( 'Confirm Password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" required/>
	</p>
    <div class="clear"></div>
      <hr style="height:2px; background:#AFA198;magin:20px 0px">
    <h2 class="rpsubtitle-small">Customer Information</h2>
<div class="rp-customer-fields"> 
    <p class="form-row form-row-first"> 
		<label for="additional_company_name"><?php _e( 'Company Name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="additional_company_name" id="additional_company_name" value="<?php if ( ! empty( $_POST['additional_company_name'] ) ) echo esc_attr( $_POST['additional_company_name'] ); ?>"/>
	</p>
	<!-- <p class="form-row form-row-last">
		<label for="additional_company_type"><?php _e( 'Company Type', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="additional_company_type" id="additional_company_type" value="<?php if ( ! empty( $_POST['additional_company_type'] ) ) echo esc_attr( $_POST['additional_company_type'] ); ?>" />		
	</p>-->
	<p class="form-row form-row-last">
        <label for="additional_company_type"><?php _e( 'Company Type', 'woocommerce' ); ?> <span class="required">*</span></label>
        <select name="additional_company_type" id="additional_company_type">
            <option value="Gift Store" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Gift Store" ) echo 'selected="selected"'; ?>>
            Gift Store</option>
            <option value="Floral" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Floral" ) echo 'selected="selected"'; ?>>
            Floral</option>
            <option value="Nursery/Garden Center" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Nursery/Garden Center" ) echo 'selected="selected"'; ?>>Nursery/Garden Center</option>
            <option value="Home Decor" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Home Decor" ) echo 'selected="selected"'; ?>>
            Home Decor</option>
            <option value="Manufacturing" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Manufacturing" ) echo 'selected="selected"'; ?>>
            Manufacturing</option>
            <option value="Catalog" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Catalog" ) echo 'selected="selected"'; ?>>
            Catalog</option>
            <option value="Hospital Gift Shop" <?php if ( ! empty( $_POST['additional_company_type'] ) && $_POST['additional_company_type'] =="Hospital Gift Shop" ) echo 'selected="selected"'; ?>>
            Hospital Gift Shop</option>
           
        </select>
    </p>
	
	<p class="form-row form-row-first clear">
		<label for="additional_company_fname"><?php _e( 'First Name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="additional_company_fname" id="additional_company_fname" value="<?php if ( ! empty( $_POST['additional_company_fname'] ) ) echo esc_attr( $_POST['additional_company_fname'] ); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="additional_company_lname"><?php _e( 'Last Name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="additional_company_lname" id="additional_company_lname" value="<?php if ( ! empty( $_POST['additional_company_lname'] ) ) echo esc_attr( $_POST['additional_company_lname'] ); ?>" />
	</p>
	<p class="form-row form-row-first clear">
		<label for="additional_company_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="additional_company_phone" id="additional_company_phone" value="<?php if ( ! empty( $_POST['additional_company_phone'] ) ) echo esc_attr( $_POST['additional_company_phone'] ); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="additional_fax"><?php _e( 'Fax', 'woocommerce' ); ?> </label>
		<input type="text" class="input-text" name="additional_fax" id="additional_fax" value="<?php if ( ! empty( $_POST['additional_fax'] ) ) echo esc_attr( $_POST['additional_fax'] ); ?>"/>
	</p>
	<p class="form-row form-row-first clear">
		<label for="additional_tax_id"><?php _e( 'Tax', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="additional_tax_id" id="additional_tax_id" value="<?php if ( ! empty( $_POST['additional_tax_id'] ) ) echo esc_attr( $_POST['additional_tax_id'] ); ?>" />
	</p>
</div>
  <div class="clear"></div>
   <hr style="height:2px; background:#AFA198;magin:20px 0px">
    <h2 class="rpsubtitle-small">Billing Address</h2>
    <div class="woocommerce-billing-fields">
        <div class="woocommerce-billing-fields__field-wrapper">
    <?php foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) : ?>

        <?php /*if($key!='billing_email'){ 
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
        } */?>
        <?php if($key!='billing_company' && $key!='billing_email' && $key!='billing_phone' && $key!='billing_first_name' && $key!='billing_last_name' && $key!='billing_email-2'){ 
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
        } ?>

    <?php endforeach; ?>
</div></div>
<div class="clear"></div>
<hr style="height:2px; background:#AFA198;magin:20px 0px"> 
<h2 class="rpsubtitle-small">Shipping Address</h2>
<div class="billing_shipping_same check_box" style="margin:5px 0px 20px">
   <input type="checkbox" id="billing_to_shipping">
    <label for="billing_to_shipping">My Shipping address is same as billing address.</label></div>

<div class="shipping_address">            
            <div class="woocommerce-shipping-fields__field-wrapper">
    <?php foreach ( $checkout->get_checkout_fields( 'shipping' ) as $key => $field ) : ?>

        <?php /*if($key!='billing_email'){ 
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
        } */?>
        <?php 
            if($key!='select_shipping_address_nickname'){
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); 
            }
        ?>

    <?php endforeach;?>
</div></div>
<div class="clear"></div>
<?php    
$handle = 'wc-country-select';
wp_enqueue_script($handle, get_site_url().'/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js', array('jquery'), true);
?>
<script>
jQuery(document).ready(function(){
    jQuery("#reg_email").parent('p').addClass("form-row-first");
    jQuery("#reg_password").parent('p').addClass("form-row-first");
    jQuery("#reg_password").parent('p').addClass("password-box");
    jQuery("#confirm-email-box").insertBefore(".password-box");
    jQuery("#confirm-password-box").insertAfter(".password-box");
    jQuery("#billing_country_field").insertAfter("#billing_address_2_field");
    jQuery("#shipping_country_field").insertAfter("#shipping_address_2_field");
    jQuery("#shipping_company_field").insertBefore("#shipping_first_name_field");
    
    jQuery("#shipping_address_nickname_field").insertBefore("#shipping_company_field");
    jQuery("#shipping_address_nickname_field").css("display","block");
    
    
    jQuery("input[type=text]").each(function(){
        jQuery(this).parent().append("<span class='rp_field_error' id='"+jQuery(this).attr('id')+"_error'></span>");      
    });
    jQuery("input[type=email]").each(function(){
        jQuery(this).parent().append("<span class='rp_field_error' id='"+jQuery(this).attr('id')+"_error'></span>");      
    });
     jQuery("input[type=password]").each(function(){ 
        jQuery(this).parent().append("<span class='rp_field_error' id='"+jQuery(this).attr('id')+"_error'></span>");      
    });
      jQuery("input[type=tel]").each(function(){ 
        jQuery(this).parent().append("<span class='rp_field_error' id='"+jQuery(this).attr('id')+"_error'></span>");      
    });
      jQuery("select").each(function(){ 
        jQuery(this).parent().append("<span class='rp_field_error' id='"+jQuery(this).attr('id')+"_error'></span>");      
    });
    
    jQuery("form.register").submit(function(){
        var rp_flag=true;
                                                
        jQuery("input[name='email']",this).each(function(){
              var id=jQuery(this).attr('id');
                if(jQuery.trim(jQuery(this).val())==""){                    
                    jQuery(this).siblings("#"+id+"_error").html("Please enter email address!");
                    rp_flag=false;
                }else if(!isValidEmailAddress(jQuery.trim(jQuery(this).val()))){
                     jQuery(this).siblings("#"+id+"_error").html("Please enter valid email address.");
                }else{                  
                    jQuery(this).siblings("#"+id+"_error").html("");
                }
                
            }); 
        jQuery("input[name='email2']",this).each(function(){
                var id=jQuery(this).attr('id');
                if(jQuery.trim(jQuery(this).val())==""){                    
                    jQuery(this).siblings("#"+id+"_error").html("Required");
                    rp_flag=false;
                }else if(!isValidEmailAddress(jQuery.trim(jQuery(this).val()))){
                     jQuery(this).siblings("#"+id+"_error").html("Please enter valid email address.");
                }
            else if(jQuery.trim(jQuery(this).val())!=jQuery.trim(jQuery("input[name='email']").val())){    
                jQuery(this).siblings("#"+id+"_error").html("Please check and re-enter.");
                rp_flag=false;
                }else{                    
                    jQuery(this).siblings("#"+id+"_error").html("");
                }
                
            });
            
        jQuery("input[name='password']",this).each(function(){
            var id=jQuery(this).attr('id');
            if(jQuery.trim(jQuery(this).val())==""){                
                jQuery(this).siblings("#"+id+"_error").html("Please enter password!");
                rp_flag=false;
            }else{               
                jQuery(this).siblings("#"+id+"_error").html("");
            }            
        });
        jQuery("input[name='password2']",this).each(function(){
            var id=jQuery(this).attr('id');
            if(jQuery.trim(jQuery(this).val())==""){                
                jQuery(this).siblings("#"+id+"_error").html("Required");
                rp_flag=false;
            }else if(jQuery.trim(jQuery(this).val())!=jQuery.trim(jQuery("input[name='password']").val())){ 
                jQuery(this).siblings("#"+id+"_error").html("Please check and re-enter.");
                rp_flag=false;
            }else{                
                jQuery(this).siblings("#"+id+"_error").html("");
            }           
        });
     
        jQuery("input[type='text']",this).each(function(){
            if((jQuery(this).attr("id")=="trap") || (jQuery(this).attr("id")=="billing_address_2") || (jQuery(this).attr("id")=="shipping_address_2") || (jQuery(this).attr("id")=="additional_fax")){}else{
                if(jQuery.trim(jQuery(this).val())==""){
                    var id=jQuery(this).attr('id');
                    id_text=id.replace(/_/g, ' ');              
                    jQuery(this).siblings("#"+id+"_error").html("Please enter "+id_text);
                    rp_flag=false;
                }else{
                    var id=jQuery(this).attr('id');                              
                    jQuery(this).siblings("#"+id+"_error").html("");
                }
            }
        });
        
         jQuery("input[type='tel']",this).each(function(){
            if(jQuery.trim(jQuery(this).val())==""){
                var id=jQuery(this).attr('id');
                id_text=id.replace(/_/g, ' ');              
                jQuery(this).siblings("#"+id+"_error").html("Please enter "+id_text);
                rp_flag=false;
            }else{
                var id=jQuery(this).attr('id');                              
                jQuery(this).siblings("#"+id+"_error").html("");
            }
        });
         jQuery("select",this).each(function(){
            if(jQuery.trim(jQuery(this).val())==""){
                var id=jQuery(this).attr('id');
                id_text=id.replace(/_/g, ' ');              
                jQuery(this).siblings("#"+id+"_error").html("Please select "+id_text);
                rp_flag=false;
            }else{
                var id=jQuery(this).attr('id');                              
                jQuery(this).siblings("#"+id+"_error").html("");
            }
        });
          jQuery("input[name='billing_email']",this).each(function(){
            if(jQuery.trim(jQuery(this).val())==""){
                var id=jQuery(this).attr('id');
                id_text=id.replace(/_/g, ' ');              
                jQuery(this).siblings("#"+id+"_error").html("Please enter "+id_text);
                rp_flag=false;
            }else{
                var id=jQuery(this).attr('id');                              
                jQuery(this).siblings("#"+id+"_error").html("");
            }
        });
     
        
       
        if(rp_flag==false){
            return false;
        }
    
    });

  
 jQuery('#billing_to_shipping').change(function() {
     if(this.checked){
         rp_fillShipping();
     }else{
         rp_emptyShipping();
     }
 });
   
     
function rp_fillShipping(){  
   jQuery("input[name='shipping_address_1']").val(jQuery("input[name='billing_address_1']").val());
    jQuery("input[name='shipping_address_2']").val(jQuery("input[name='billing_address_2']").val()); 
    jQuery("input[name='shipping_city']").val(jQuery("input[name='billing_city']").val());    
    jQuery("#shipping_country").val(jQuery("#billing_country").val()).trigger('change');
    jQuery("input[name='shipping_postcode']").val(jQuery("input[name='billing_postcode']").val());   
    jQuery("#shipping_state").val(jQuery("#billing_state").val()).trigger('change');
}
function rp_emptyShipping(){  
   jQuery("input[name='shipping_address_1']").val("");
    jQuery("input[name='shipping_address_2']").val(""); 
    jQuery("input[name='shipping_city']").val("");      
    jQuery("#shipping_country").val("").trigger('change');
    jQuery("#shipping_state").val("");    
    jQuery("input[name='shipping_postcode']").val(""); 
}     
});
    
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}    

</script>

<style>
.woocommerce form.register{border: none;}
.register input {
    height: 40px;
    border: 2px solid;
    padding: 5px;
} 
.register select {
    height: 40px;
    border: 2px solid;
    padding: 5px;
}
.register input[name="register"] {
    background: transparent!important;
    border: 2px solid #000!important;
    border-radius: 0!important;
    color: #000!important;
    font-weight: 700!important;
    text-transform: uppercase!important;
    letter-spacing: 4px;
    float: left;
    padding: 0px 40px;
}
.register input[name="register"]:hover{
        color: #fff!important;
        background: #000!important;
}
.register .woocommerce-simple-registration-login-link{display: none;}
.register .rp_field_error{
        font-style: italic;
    }
.register #shipping_address_nickname_field{display:block!important;}
@media only screen and (max-width: 480px){
    .rpsubtitle {
        font-size: 20px!important;
    }
    p.form-row {
            width: 100%!important;
        }
}
</style>
<?php
}

add_action( 'woocommerce_register_form', 'rp_add_billing_form_to_registration', 10, 0 );



// Custom function to save Usermeta or Billing Address of registered user

function rp_action_woocommerce_created_customer( $user_id, $new_customer_data, $password_generated ) { 
    global $woocommerce;
    global $wpdb;
    $address = $_POST;
    $rp_additional_shipping=array();
    foreach ($address as $key => $field){
        if(startsWith($key,'billing_')){
            // Condition to add firstname and last name to user meta table
           /* if($key == 'billing_first_name' || $key == 'billing_last_name'){
                $new_key = explode('billing_',$key);
                update_user_meta( $user_id, $new_key[1], sanitize_text_field($_POST[$key]) );
            }*/
            update_user_meta( $user_id, $key, sanitize_text_field($_POST[$key]) );
        }
        if(startsWith($key,'shipping_')){
            // Condition to add firstname and last name to user meta table
           /* if($key == 'shipping_first_name' || $key == 'shipping_last_name'){
                $new_key = explode('shipping_',$key);
                update_user_meta( $user_id, $new_key[1], sanitize_text_field($_POST[$key]) );
            }*/
            update_user_meta( $user_id, $key, sanitize_text_field($_POST[$key]) );
            $rp_additional_shipping[$key]=sanitize_text_field($_POST[$key]);
           
        }
        if(startsWith($key,'additional_')){           
            update_user_meta( $user_id, $key, sanitize_text_field($_POST[$key]) );
             if($key == 'additional_company_fname'){ 
                update_user_meta( $user_id, "first_name", sanitize_text_field($_POST[$key]) );
                update_user_meta( $user_id, "billing_first_name", sanitize_text_field($_POST[$key]) );
            }
            if($key == 'additional_company_lname'){
                update_user_meta( $user_id, "last_name", sanitize_text_field($_POST[$key]) );
                update_user_meta( $user_id, "billing_last_name", sanitize_text_field($_POST[$key]) );
            }
            if($key == 'additional_company_name'){               
                update_user_meta( $user_id, "billing_company", sanitize_text_field($_POST[$key]) );
            }
            if($key == 'additional_company_phone'){               
                update_user_meta( $user_id, "billing_phone", sanitize_text_field($_POST[$key]) );
            }
        }
        
         $rp_additional_shipping["user_id"]=$user_id;
     
    }
    
    $wpdb->insert('rp_shipping_additional_address',$rp_additional_shipping);
    
    

}

add_action( 'woocommerce_created_customer', 'rp_action_woocommerce_created_customer', 10, 3 ); 


// Registration page billing address form Validation
function rp_action_woocommerce_register_post( $username, $email, $validation_errors ) {
    global $woocommerce;
    $address = $_POST;
    foreach ($address as $key => $field) :
        // Validation: Required fields
            if(startsWith($key,'billing_')){
            if($key == 'billing_country' && trim($field) == ''){
                
                $validation_errors->add( 'billing_country_error', __( '<strong>Error</strong>: Please select a country!', 'woocommerce' ) );
            }
            if($key == 'billing_first_name' && trim($field) == ''){
                
                $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: Please enter first name!', 'woocommerce' ) );
            }
            if($key == 'billing_last_name' && trim($field) == ''){
                
                $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Please enter last name!', 'woocommerce' ) );
            }
            if($key == 'billing_address_1' && trim($field) == ''){
                
                $validation_errors->add( 'billing_address_1_error', __( '<strong>Error</strong>: Please enter address Line 1!', 'woocommerce' ) );
            }
            if($key == 'billing_city' && trim($field) == ''){
                
                $validation_errors->add( 'billing_city_error', __( '<strong>Error</strong>: Please enter city!', 'woocommerce' ) );
            }
            if($key == 'billing_state' && trim($field) == ''){               
                $validation_errors->add( 'billing_state_error', __( '<strong>Error</strong>: Please enter state!', 'woocommerce' ) ); 
            }
            if($key == 'billing_postcode' && trim($field) == ''){
                
                 $validation_errors->add( 'billing_postcode_error', __( '<strong>Error</strong>: Please enter a postcode!', 'woocommerce' ) );
            }
            
            if($key == 'billing_email' && trim($field) == ''){
               
                $validation_errors->add( 'billing_email_error', __( '<strong>Error</strong>: Please enter billing email address!', 'woocommerce' ) );
            }
            
            if($key == 'billing_phone' && trim($field) == ''){               
                 $validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Please enter phone number!', 'woocommerce' ) );
            }

        }

        if(startsWith($key,'shipping_')){
            if($key == 'shipping_country' && trim($field) == ''){
                
                 $validation_errors->add( 'shipping_country_error', __( '<strong>Error</strong>: Please select a country!', 'woocommerce' ) );
            }
            if($key == 'shipping_first_name' && trim($field) == ''){
                
                $validation_errors->add( 'shipping_first_name_error', __( '<strong>Error</strong>: Please enter first name!', 'woocommerce' ) );
            }
            if($key == 'shipping_last_name' && trim($field) == ''){
              
                 $validation_errors->add( 'shipping_last_name_error', __( '<strong>Error</strong>: Please enter last name!', 'woocommerce' ) );
            }
            if($key == 'shipping_address_1' && trim($field) == ''){
          
                  $validation_errors->add( 'shipping_address_1_error', __( '<strong>Error</strong>: Please enter address line 1!', 'woocommerce' ) );
            }
            if($key == 'shipping_city' && trim($field) == ''){
               
                $validation_errors->add( 'shipping_city_error', __( '<strong>Error</strong>: Please enter city!', 'woocommerce' ) );
            }
            if($key == 'shipping_state' && trim($field) == ''){
                
                  $validation_errors->add( 'shipping_state_error', __( '<strong>Error</strong>: Please enter state!', 'woocommerce' ) );
            }
            if($key == 'shipping_postcode' && trim($field) == ''){
            
                $validation_errors->add( 'shipping_postcode_error', __( '<strong>Error</strong>: Please enter a postcode!', 'woocommerce' ) );
            }          

        }
       if(startsWith($key,'additional_')){
            if($key == 'additional_company_name' && trim($field) == ''){
                
                 $validation_errors->add( 'additional_company_name_error', __( '<strong>Error</strong>: Please Enter Company Name!', 'woocommerce' ) );
            }
            if($key == 'additional_company_type' && trim($field) == ''){
                
                $validation_errors->add( 'additional_company_type_error', __( '<strong>Error</strong>: Please enter Company Type!', 'woocommerce' ) );
            }
            if($key == 'additional_company_fname' && trim($field) == ''){
              
                 $validation_errors->add( 'additional_company_fname_error', __( '<strong>Error</strong>: Please enter Company First Name!', 'woocommerce' ) );
            }
            if($key == 'additional_company_lname' && trim($field) == ''){
          
                  $validation_errors->add( 'additional_company_lname_error', __( '<strong>Error</strong>: Please enter company Last Name!', 'woocommerce' ) );
            }
            if($key == 'additional_company_phone' && trim($field) == ''){
               
                $validation_errors->add( 'additional_company_phone_error', __( '<strong>Error</strong>: Please enter Company Phone', 'woocommerce' ) );
            }
            if($key == 'additional_tax_id' && trim($field) == ''){
                
                  $validation_errors->add( 'additional_tax_id_error', __( '<strong>Error</strong>: Please enter Tax_id!', 'woocommerce' ) );
            }                    

        }
    
    endforeach;
}

add_action( 'woocommerce_register_post', 'rp_action_woocommerce_register_post', 10, 3 ); 

add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
    if ( strcmp( $email, $email2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Email do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}

  
/******************************Remove Produt From Wishlist ************************************/
function rp_remove_item_from_wishlist() {
    global $wpdb;
    $pid = $_POST['product_id'];
    $fid = $_POST['folder_id'];
    
    $total_deleted_rows=$wpdb->delete("rp_wishlist", array( 'folder_id'=>$fid,'product_id' => $pid));    
    if($total_deleted_rows){      
        return true;
    }else{
        return false;
    }
   
}
add_action('wp_ajax_rp_remove_item_from_wishlist', 'rp_remove_item_from_wishlist');


