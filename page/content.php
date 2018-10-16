<?php if(have_posts()): while(have_posts()): the_post(); ?> <!-- ループ開始 -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('page/content-header'); ?>
<?php get_template_part('page/sns'); ?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="single-featured-image-header"><div>
	<?php the_post_thumbnail(); ?>
	</div></div><!-- .single-featured-image-header -->
<?php endif; ?>
<hr>
<div class="entry-content">
<?php the_content('続きを読む'); ?>
</div><!-- .entry-content -->
<hr>
<?php get_template_part('page/sns'); ?>
</article>
<?php endwhile; endif; ?> <!-- ループ終了 -->