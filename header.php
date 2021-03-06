<?php
/**
 * This is the template that displays all of the <head> section and everything up until <main class="wrap wrap-mobile" role="main">
 *
 * @package Malinky Media
 */

?><!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- Use latest IE engine --> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile viewport -->    
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Icons for mobile for touch home screens and bookmarks. Remember to upload favicon.ico too! -->

    <!-- Chrome and Android (192 x 192) -->
    <meta name="application-name" content="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
    <link rel="icon" sizes="192x192" href="<?php echo esc_url( home_url( 'chrome-touch-icon-192x192.png' ) ); ?>">

    <!-- Safari on iOS (152 x 152) -->
    <meta name="apple-mobile-web-app-title" content="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( home_url( 'apple-touch-icon.png' ) ); ?>">
    <meta name="format-detection" content="telephone=no">

    <!-- IE on Win8 (144 x 144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php echo esc_url( home_url( 'ms-touch-icon-144x144-precomposed.png' ) ); ?>">
    <meta name="msapplication-TileColor" content="#3372DF">

	<!-- Google Font Loader -->
	<!-- <script>
		WebFontConfig = {
			google: { families: ['PT+Sans:400,700'] }
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
			s.parentNode.insertBefore(wf, s);
		})(document);
   	</script> -->

	<!-- Meta -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<?php if ( WP_ENV != 'local' ) { ?>

		<style type="text/css">
			<?php
			//Load critical path CSS, replacing img/ with absolute urls.
			$critical_css = file_get_contents(get_template_directory() . '/style-critical.css');
			$critical_css = str_replace('url(img/', 'url(' . get_template_directory_uri() . '/img/', $critical_css);
			$critical_css = str_replace('url(fonts/', 'url(' . get_template_directory_uri() . '/fonts/', $critical_css);
			echo $critical_css;
			?>
		</style>

		<script>
		/*!
		loadCSS: load a CSS file asynchronously.
		[c]2014 @scottjehl, Filament Group, Inc.
		Licensed MIT
		*/
		function loadCSS( href, before, media, callback ){
			"use strict";
			// Arguments explained:
			// `href` is the URL for your CSS file.
			// `before` optionally defines the element we'll use as a reference for injecting our <link>
			// By default, `before` uses the first <script> element in the page.
			// However, since the order in which stylesheets are referenced matters, you might need a more specific location in your document.
			// If so, pass a different reference element to the `before` argument and it'll insert before that instead
			// note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
			var ss = window.document.createElement( "link" );
			var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];
			var sheets = window.document.styleSheets;
			ss.rel = "stylesheet";
			ss.href = href;
			// temporarily, set media to something non-matching to ensure it'll fetch without blocking render
			ss.media = "only x";
			// DEPRECATED
			if( callback ) {
				ss.onload = callback;
			}

			// inject link
			ref.parentNode.insertBefore( ss, ref );
			// This function sets the link's media back to `all` so that the stylesheet applies once it loads
			// It is designed to poll until document.styleSheets includes the new sheet.
			ss.onloadcssdefined = function( cb ){
				var defined;
				for( var i = 0; i < sheets.length; i++ ){
					if( sheets[ i ].href && sheets[ i ].href.indexOf( href ) > -1 ){
						defined = true;
					}
				}
				if( defined ){
					cb();
				} else {
					setTimeout(function() {
						ss.onloadcssdefined( cb );
					});
				}
			};
			ss.onloadcssdefined(function() {
				ss.media = media || "all";
			});
			return ss;
		}
		loadCSS('<?php echo get_template_directory_uri(); ?>/style.css', window.document.getElementsByTagName( 'script' )[ 1 ]);
		</script>
		<noscript><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" /></noscript>

	<?php } ?>

	<?php if ( WP_ENV == 'local' || WP_ENV == 'dev' ) { ?>
		<meta name="robots" content="noindex,nofollow">
	<?php } ?>

	<?php if ( WP_ENV == 'prod' ) { ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', "<?php echo get_field( 'malinky_settings_contact_google_analytics', 'option' ); ?>", 'auto');
		  ga('send', 'pageview');
		</script>
	<?php } ?>
	
	
	<?php
	/*
	 * Load contact form 7 scripts when needed.
	 * Removed in actions-filters.php.
	 * Set the page.
	 */
	// if ( is_page ( '' )) {
	//     if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	//         wpcf7_enqueue_scripts();
	//         wp_enqueue_script( 'jquery-ui-datepicker' );
	//     }	    
	// }
	?>

	<?php wp_head(); ?>

	<!--https://github.com/scottjehl/Respond-->
	<!--https://github.com/aFarkas/html5shiv-->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<![endif]-->

</head>

<body <?php body_class(); ?>>

<header class="main-header" role="banner">

	<!-- Main Navigation Desktop -->
	<div class="wrap-full main-navigation-bar main-navigation-bar--bkg">
		<div class="wrap">

		<div id="main-navigation-id" class="col">
			<div class="col-item col-item-full">
				<nav class="main-navigation" role="navigation">
					<?php
			        $args = array(
			            'theme_location'    => 'main_navigation',
			            'container'   		=> false
			        );
			        ?>
					<?php wp_nav_menu( $args ); ?>
				</nav><!-- .main-navigation -->
			</div>
		</div><!-- .col -->

		</div><!-- .wrap -->
	</div><!-- .wrap-full -->

	<!-- Main Navigation Desktop Fixed -->
	<div class="wrap-full wrap-full--full-fixed main-navigation-bar main-navigation-bar--bkg">
		<div class="wrap">

			<div id="main-navigation-fixed-id" class="col">
				<div class="col-item col-item-full">
					<nav class="main-navigation main-navigation--fixed" role="navigation">
						<?php
				        $args = array(
				            'theme_location'    => 'main_navigation',
				            'container'   		=> false
				        );
				        ?>
						<?php wp_nav_menu( $args ); ?>
					</nav><!-- .main-navigation -->
				</div>
			</div><!-- .col -->	

		</div><!-- .wrap -->
	</div><!-- .nav-wrap-full -->

	<!-- Main Navigation Mobile -->
	<div class="wrap-full mobile-navigation-bar">

		<div id="mobile-navigation-id" class="col col--gutterless">
			<div class="col-item col-item-4-10">
				<a href="" id="mobile-navigation-toggle-id" class="mobile-navigation-toggle collapsed" aria-expanded="false">
					<span class="mobile-navigation-toggle__bar"></span>
					<span class="mobile-navigation-toggle__bar"></span>
					<span class="mobile-navigation-toggle__bar"></span>
					<span class="mobile-navigation-toggle__text">Menu</span>
				</a>
			</div><!--
			--><div class="col-item col-item-6-10 col-item--align-right">
				<div class="mobile-navigation-bar__social">
					<a href="tel:+44<?php echo esc_html( str_replace( ' ', '', get_field( 'malinky_settings_contact_phone_number', 'option' ) ) ); ?>" class="image-font"><span class="image-font__fontawesome fa-phone"></span></a>
					<a href="mailto:<?php echo esc_html( str_replace( ' ', '', get_field( 'malinky_settings_contact_email_address', 'option' ) ) ); ?>" class="image-font"><span class="image-font__fontawesome fa-envelope"></span></a>
				</div>
	  		</div>
			<div class="col-item col-item-full">
				<nav class="mobile-navigation" role="navigation">
					<?php
			        $args = array(
			            'theme_location'    => 'mobile_navigation',
			            'container'   		=> false
			        );
			        ?>
					<?php wp_nav_menu( $args ); ?>
				</nav><!-- .main-navigation -->
			</div>
		</div><!-- .col -->

	</div><!-- .wrap-full -->

</header><!-- .main-header -->

<main class="wrap wrap-mobile" role="main">
