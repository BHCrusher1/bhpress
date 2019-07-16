<?php get_header(); ?>
<div class="wrap">
	<?php breadcrumb(); ?>
	<div id="primary">
		<main>
			<?php while (have_posts()) : the_post();
    get_template_part('page/content');
endwhile; ?>
			<?php comments_template(); ?>
		</main>
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer();
