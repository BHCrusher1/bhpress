<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('page/content-header'); ?>
<div class="entry-excerpt">
<?php the_post_thumbnail('thumbnail'); ?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-summary">
<?php else : ?>
	<div class="entry-summary no-thumbnail">
<?php endif; ?>
<?php the_excerpt(); ?>
</div><!-- .entry-summary -->
</div><!-- .entry-excerpt -->
</article><!-- #post-## -->