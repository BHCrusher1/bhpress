<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php add_action('wp_head', function() {?>
<link rel="preload" href="<?php echo get_stylesheet_uri(); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"></noscript>
<link rel="preload" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></noscript>
<?php css_rel_preload_js();
});
function css_rel_preload_js() { //多用できるように関数化 ?>
<script>/*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
!function(t){"use strict";t.loadCSS||(t.loadCSS=function(){});var e=loadCSS.relpreload={};if(e.support=function(){var e;try{e=t.document.createElement("link").relList.supports("preload")}catch(a){e=!1}return function(){return e}}(),e.bindMediaToggle=function(t){function e(){t.addEventListener?t.removeEventListener("load",e):t.attachEvent&&t.detachEvent("onload",e),t.setAttribute("onload",null),t.media=a}var a=t.media||"all";t.addEventListener?t.addEventListener("load",e):t.attachEvent&&t.attachEvent("onload",e),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(e,3e3)},e.poly=function(){if(!e.support())for(var a=t.document.getElementsByTagName("link"),n=0;n<a.length;n++){var o=a[n];"preload"!==o.rel||"style"!==o.getAttribute("as")||o.getAttribute("data-loadcss")||(o.setAttribute("data-loadcss",!0),e.bindMediaToggle(o))}},!e.support()){e.poly();var a=t.setInterval(e.poly,500);t.addEventListener?t.addEventListener("load",function(){e.poly(),t.clearInterval(a)}):t.attachEvent&&t.attachEvent("onload",function(){e.poly(),t.clearInterval(a)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:t.loadCSS=loadCSS}("undefined"!=typeof global?global:this);
</script>
<?php }; ?>
<!-- ここからwp_head -->
<?php wp_head(); ?>
<!-- wp_headここまで -->
</head>
<body>
<header id="masthead">
<div class="wrap site-branding-text">
<?php if ( is_front_page() ) : //フロントページ（トップページ）の場合 ?>
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : //フロントページ以外の場合 ?>
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