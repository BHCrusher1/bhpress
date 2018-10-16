<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if(is_tag() || is_date() || is_search() || is_404()) : ?>
	<meta name="robots" content="noindex"/>
<?php endif; ?>
<link rel="preload" href="<?php echo get_stylesheet_uri(); ?>" as="style">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><!-- ここからwp_head -->
<?php wp_head(); ?>
<!-- wp_headここまで -->
</head>
<body>
<header id="masthead">
<div class="wrap site-branding-text">
<?php if ( is_front_page() ) : ?>
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : ?>
	<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
<?php endif; ?>

<?php
$description = get_bloginfo( 'description', 'display' );

if ( $description || is_customize_preview() ) :
?>
	<p class="site-description"><?php echo $description; ?></p>
<?php endif; ?>
</div><!-- .wrap .site-branding-text -->
</header><!-- #masthead -->