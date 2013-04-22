<?php
/**
 * The Header for our theme.
 *
 * @package progression
 * @since progression 1.0
 */
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<?php if(is_front_page() && of_get_option('home_title')): ?>
	<title><?php echo of_get_option('home_title'); ?></title>
	<?php else: ?>
	<title><?php global $page, $paged;  wp_title( '|', true, 'right' ); bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'progression' ), max( $paged, $page ) ); ?></title>
	<?php endif; ?>

	<?php if(is_front_page() && of_get_option('home_meta')): ?>
	<meta name="description" content="<?php echo of_get_option('home_meta'); ?>" /> 
	<?php endif; ?>

	<?php if(of_get_option('favicon')): ?><link href="<?php echo of_get_option('favicon'); ?>" rel="shortcut icon" /> <?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>

	<?php echo '<style type="text/css">'; ?>
		body #logo img {max-width:<?php echo of_get_option('logo_width'); ?>px;}
		body, .sf-menu li.sfHover li a, .sf-menu li.sfHover li a:visited, .sf-menu li.sfHover li li a, .sf-menu li.sfHover li li a:visited, .sf-menu li.sfHover li li li a, .sf-menu li.sfHover li li li a:visited, .sf-menu li.sfHover li li li li a, .sf-menu li.sfHover li li li li a:visited { font-family:"<?php echo of_get_option('main_font', 'Helvetica Neue'); ?>", Helvetica, Arial, Sans-Serif;}
		.sf-menu a, .button, input.submit, h5, .featured-text, .twitter-text, ul.filter-children li a, input.wpcf7-submit, #respond input#submit, #page-nav a, .twitter-post blockquote.twitter-tweet p a {font-family: '<?php echo of_get_option('navigation_font', 'PT Sans'); ?>', sans-serif; }
		h2, h3, h4, h6, .twitter-time-stamp, .tag-cloud, .blog-post-details, .pagination a, .twitter-post blockquote.twitter-tweet a {font-family: '<?php echo of_get_option('secondary_font', 'PT Sans Narrow'); ?>', sans-serif; }
		.flex-caption, h1 {font-family: '<?php echo of_get_option('caption_font', 'Dosis'); ?>', sans-serif; }
		.sf-menu a {padding-top:<?php echo of_get_option('navigation_height', "96") / 2 + 3; ?>px; padding-bottom:<?php echo of_get_option('navigation_height', "96") / 2 - 3; ?>px;}  
		.sf-menu li:hover ul, .sf-menu li.sfHover ul {top:<?php echo of_get_option('navigation_height', "96") + 15; ?>px;} 
		<?php if(of_get_option('custom_css')): ?>
			<?php echo of_get_option('custom_css'); ?>
		<?php endif; ?>
		<?php if(of_get_option('sticky_navigation', '0')): ?>#sticky-navigation-spacer {padding-top:<?php echo of_get_option('navigation_height', "96") + 15; ?>px;}<?php endif; ?>
	<?php echo '</style>'; ?>

</head>

<body <?php body_class(); ?>>
<?php if(of_get_option('sticky_navigation', '0')): ?><div id="sticky-navigation-spacer"></div><div id="sticky-navigation"><?php endif; ?>
<header class="header">
	<div class="width-container">
		
		<h1 id="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo of_get_option('logo', get_template_directory_uri() . '/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo of_get_option('logo_width'); ?>" />
		</a></h1>

		<!--<div class="social-icons">
				<?php if(of_get_option('rss_link')): ?>
				<a class="rss" href="<?php echo of_get_option('rss_link'); ?>" target="_blank">r</a>
				<?php endif; ?>
				<?php if(of_get_option('facebook_link')): ?>
				<a class="facebook" href="<?php echo of_get_option('facebook_link'); ?>" target="_blank">F</a>
				<?php endif; ?>
				<?php if(of_get_option('twitter_link')): ?>
				<a class="twitter" href="<?php echo of_get_option('twitter_link'); ?>" target="_blank">t</a>
				<?php endif; ?>
				<?php if(of_get_option('skype_link')): ?>
				<a class="skype" href="<?php echo of_get_option('skype_link'); ?>" target="_blank">s</a>
				<?php endif; ?>
				<?php if(of_get_option('vimeo_link')): ?>
				<a class="vimeo" href="<?php echo of_get_option('vimeo_link'); ?>" target="_blank">v</a>
				<?php endif; ?>
				<?php if(of_get_option('linkedin_link')): ?>
				<a class="linkedin" href="<?php echo of_get_option('linkedin_link'); ?>" target="_blank">l</a>
				<?php endif; ?>
				<?php if(of_get_option('dribbble_link')): ?>
				<a class="dribbble" href="<?php echo of_get_option('dribbble_link'); ?>" target="_blank">d</a>
				<?php endif; ?>
				<?php if(of_get_option('forrst_link')): ?>
				<a class="forrst" href="<?php echo of_get_option('forrst_link'); ?>" target="_blank">f</a>
				<?php endif; ?>
				<?php if(of_get_option('flickr_link')): ?>
				<a class="flickr" href="<?php echo of_get_option('flickr_link'); ?>" target="_blank">n</a>
				<?php endif; ?>
				<?php if(of_get_option('google_link')): ?>
				<a class="google" href="<?php echo of_get_option('google_link'); ?>" target="_blank">g</a>
				<?php endif; ?>
				<?php if(of_get_option('youtube_link')): ?>
				<a class="youtube" href="<?php echo of_get_option('youtube_link'); ?>" target="_blank">y</a>
				<?php endif; ?>
		</div><!-- close .social-icons -->

		<nav>
			<?php wp_nav_menu( array('theme_location' => 'primary', 'depth' => 4, 'menu_class' => 'sf-menu') ); ?>
		</nav>
		
		<div class="clearfix"></div>
	</div><!-- close .width-container -->
</header>
<?php if(of_get_option('sticky_navigation', '0')): ?></div><!-- close #sticky-navigation --><?php endif; ?>

<?php if( is_page_template('homepage.php') || is_page_template('page-blog-slider.php') ): ?>
	<?php get_template_part( 'slider', 'progression' ); ?>
<?php endif; ?>


<div id="main" class="site-main">
	<div class='page_header'><div class='page_header_title'>
		<div class="width-container">
		<?php 
		if ($post->post_type=='product') {
			echo $post->post_title;
		};
		?>
	</div>
		</div>
		<div class="clearfix"></div>
	<div class='silver_line'></div>
	</div>
	<div class="width-container">




