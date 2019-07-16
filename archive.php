<?php get_header(); ?>
<div class="wrap">
	<?php if (have_posts()) : ?>
	<header class="page-header">
		<?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="taxonomy-description">', '</div>');
        ?>
	</header><!-- .page-header -->
	<?php endif; ?>
	<?php breadcrumb(); ?>
	<div id="primary">
		<main>
			<?php if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('page/content');
    endwhile;
    bhpress_pagination_list();
else : echo '<p>投稿が見つかりませんでした。</p>';
endif;
?>
		</main>
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer();
