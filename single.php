<?php get_header(); ?>
<div class="wrap">
<div id="primary">
<main>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('page/content-header'); ?>
<?php get_template_part('page/sns'); ?>
<?php
if ( has_post_thumbnail() ) {
	echo '<div class="single-featured-image-header">';
	echo '<div>';
	echo the_post_thumbnail();
	echo '</div>';
	echo '</div><!-- .single-featured-image-header -->';
}
?>
<hr>
<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->
<hr>
<?php get_template_part('page/sns'); ?>
<?php get_template_part('page/post-navigation'); ?>
<hr>
<?php endwhile; endif; ?>
<?php if ( is_single() ) {
	get_template_part('page/content-related');
}
?>
</article>
</main>
</div><!-- #primary -->
<?php get_sidebar(); ?> <!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer(); ?>