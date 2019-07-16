<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- ここからwp_head -->
	<?php wp_head(); ?>
	<!-- wp_headここまで -->
</head>

<body>
	<header id="masthead">
		<div class="wrap site-branding-text">
			<?php if (is_front_page()) : //フロントページ（トップページ）の場合?>
			<h1 class="site-title"><a
					href="<?php echo esc_url(home_url('/')); ?>"
					rel="home"><?php bloginfo('name'); ?></a>
			</h1>
			<?php else : //フロントページ以外の場合?>
			<p class="site-title"><a
					href="<?php echo esc_url(home_url('/')); ?>"
					rel="home"><?php bloginfo('name'); ?></a></p>
			<?php endif; ?>

			<?php
$description = get_bloginfo('description', 'display');

if ($description || is_customize_preview()) :
?>
			<p class="site-description"><?php echo $description; ?>
			</p>
			<?php endif; ?>
		</div><!-- .wrap .site-branding-text -->
	</header><!-- #masthead -->