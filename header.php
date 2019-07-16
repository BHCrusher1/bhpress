<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- ここからwp_head -->
	<?php wp_head(); ?>
	<!-- wp_headここまで -->
</head>

<body <?php body_class('min-vh-100'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="bg-white">

		<div class="container site-branding-container">
			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		</div><!-- .site-branding-container -->

	</header><!-- #masthead -->