<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="resource-type" content="document" />
<meta property="fb:admins" content="1219546768" />
<meta property="og:image" content="http://tap.dj/_lib/images/tapdj-big-icon.jpg"/>
<meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
<meta http-equiv="content-language" content="en-us" />
<meta http-equiv="author" content="laan labs" />
<meta http-equiv="contact" content="labs@laan.com" />
<meta name="copyright" content="Copyright (c)2011 Laan Labs. All Rights Reserved." />
<meta name="description" content="Tap DJ is the Ultimate DJ App for iPhone and iPod! Mix and Scratch your iPod Library, add effects and equalize your tracks. Record your mixes and discover new music." />
<meta name="keywords" content="iphone, dj, dj app, iphone dj app, tapdj, tap.dj, tap dj app" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged, $show_big_header;

	$show_big_header = 0;
	
	// if contest page, or front, show big header
	if ( is_page('141') || is_front_page() ) {
		$show_big_header = 1;
	}
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<script src="/_lib/js/AC_Quicktime.js" language="JavaScript" type="text/javascript"></script>
<script src="/_lib/js/LLQTPlayer.js" language="JavaScript" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>-->

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/fancybox/jquery.easing-1.3.pack.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />


<script src="<?php echo get_template_directory_uri() ?>/tapdj.js"></script>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/tapdj.css" />

<?php if (  !$show_big_header ) { ?>			
<style>
/*corrections for subpages */
body {
	/*background: url(images/background-header-linen.png) top left repeat-x;*/
	background: url('<?php echo get_template_directory_uri() ?>/images/page-noise-bg.png') top left repeat;
	background-color: #e3e6e8;
}
#main {top:0px;}
</style>
<?php }?>

<?php if (  is_page('141') ) { ?>			
<style>
#primary {
	background:none;
}
</style>
<?php }?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<?php include_once("analyticstracking.php") ?>

<?php if ( $show_big_header ) { ?>
<div id="header-image">
</div>
<?php } else { ?>	
<div id="page-header-image">
</div>
<?php } ?>

<div id="wrapper" class="hfeed" >
	
	<div id="header" >
		
		<?php if ( !$show_big_header ) { ?>
			<div style="top:4px; position:relative; float:left; height:98px;">
			<a href="/"><img src="<?php echo get_template_directory_uri() ?>/images/page-logo.png" border="0" width="132" height="50"/></a>	
			</div>
		<?php }  ?>
		
		<?php if ( $show_big_header ) { ?>
		<div style="position:absolute; right:100px; z-index:999;">
			<div id="fb_like" style="padding-top:10px; width:100px; height:30px;float:left;z-index:999;"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Flabs.laan.com%2F&amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px;" allowTransparency="true"></iframe></div>
			<div style="float:left;padding-top:12px;">
			<a href="http://twitter.com/tapdjapp" target="_new"><img src="<?php echo get_template_directory_uri() ?>/images/twitter_bird.png" border="0" width="91" height="20"/></a>
			</div>
		</div>
		
		<div id="masthead" >
		<?php } else {  ?>
			<div id="page-sale-button" align="center" style="margin-top:-4px; position:absolute; right:226px; z-index:999;" >
			<a href="/"><img src="<?php echo get_template_directory_uri() ?>/images/page-sale-tag.png" border="0" width="132" height="82"/></a>
			</div>
			<div id="page-buy-now-button" align="center" style="margin-top:2px; position:absolute; right:70px; z-index:999; ">
			<a href="http://itunes.apple.com/us/app/tap-dj-mix-scratch-your-music/id405088414?mt=8" target="_new"><img src="<?php echo get_template_directory_uri() ?>/images/page-buy-now.png" border="0" width="128" height="48"/></a>
			</div>
		<?php } ?>
			
	<?php if ( $show_big_header ) { ?>			
			 <div id="branding" role="banner">	
			
			<div style="top:0px; position:relative; height:330px;">
			
			<div style="float:left;margin-top:5px"><a href="/"><img src="<?php echo get_template_directory_uri() ?>/images/logo-image.png" border="0" width="334" height="168"/></a>

			<div id="buy-now-button" align="center" style="margin-top:0px">
			<a href="http://itunes.apple.com/us/app/tap-dj-mix-scratch-your-music/id405088414?mt=8" target="_new"><img src="<?php echo get_template_directory_uri() ?>/images/buy-now.png" border="0" width="216" height="80"/></a>
			</div>


			</div>
			
			<!--<div style="float:left; margin-top:52px; width:606px; overflow:show; height:260px;background: url(<?php echo get_template_directory_uri() ?>/images/iphone-sale.png) top left no-repeat;"></div>-->
			<div style="position:relative; width:612px; top:52px; left:338px; height:260px;background: url(<?php echo get_template_directory_uri() ?>/images/iphone-sale.png) top left no-repeat;"></div>
			
			<!--
			<div id="iPhoneScreen" style="position:absolute; width:390px; height:260px; top:24px; left:108px; background:#ccc"><img src="<?php echo get_template_directory_uri() ?>/images/screen/screen_default.png" border="0" width="390" height="260"/></div>
			-->
			
			<div id="iPhoneScreen" style="position:absolute; width:301px; height:200px; top:77px; left:566px; background: url(<?php echo get_template_directory_uri() ?>/images/screen/iphone-video-thumbnail.png) top left no-repeat;">
				<!--<img src="<?php echo get_template_directory_uri() ?>/images/screen/iphone-video-thumbnail.png" border="0" width="300" height="200"/>-->
				<video autoplay autobuffer loop id="video_1" style="width:300px; height:200px;"> 
										<source src="<?php echo get_template_directory_uri() ?>/images/overview-300.mov" type="video/mp4" poster="<?php echo get_template_directory_uri() ?>/images/screen/screen_default.png" width="300" height="200"> 
										<!--<source src="video/luxylight.ogg" type="video/ogg" poster="img/poster.jpg" width="270" height="403">-->
				</video>
			</div>
			 
			
			</div>
			</div><!-- #branding -->		


			<?php }  ?>			


		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">
