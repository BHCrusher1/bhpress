<?php get_header(); ?>
<div class="wrap">
<?php if ( have_posts() ) : ?>
	<header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</header><!-- .page-header -->
<?php endif; ?>
<div id="primary">
<main>
<?php get_template_part('page/content'); ?>
<?php the_posts_pagination_list(); ?>
</main>
</div><!-- #primary -->
<?php get_sidebar(); ?> <!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer(); ?>