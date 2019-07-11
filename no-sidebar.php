<?php
/*
Template Name: サイドバー無し
*/
?>

<?php get_header(); ?>
<div class="wrap">
<?php breadcrumb(); ?>
<div id="primary no-sidebar">
<main>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">
<?php if(have_posts()): while(have_posts()):the_post();
	if ( is_single() or is_page() ) { //個別ページの場合
		the_title( '<h1 class="entry-title">', '</h1>' );
	} elseif ( is_front_page() && is_home() ) { //トップページ（ホームとフロントページ）の場合
		the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
	} else { //それ以外
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}
endwhile; endif;
?>
</header>
<?php get_template_part('page/sns');
if ( has_post_thumbnail() ) {
	echo '<div class="single-featured-image-header"><div>';
	if ( is_single() ) {
		the_post_thumbnail( 'large' );
	} else {
		the_post_thumbnail();
	}
	echo '</div></div><!-- .single-featured-image-header -->';
} else { echo '<hr>'; }
?>
<div class="entry-content">
<?php the_content( '続きを読む '); ?>
</div><!-- .entry-content -->
<hr>
<?php get_template_part('page/sns'); ?>
</article>
</main>
</div><!-- #primary -->
</div><!-- .wrap -->
<?php get_footer(); ?>