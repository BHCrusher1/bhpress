<?php
/**
 * ページのheadと、headerを読み込む部分
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- ここからwp_head -->
	<?php wp_head(); ?>
	<!-- wp_headここまで -->
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="d-flex flex-column min-vh-100 site">
		<header id="masthead" class="mb-3 bg-white">
			<div class="container site-branding-container">
				<?php get_template_part('template-parts/header/site', 'branding'); ?>
			</div><!-- .site-branding-container -->
		</header><!-- #masthead -->