<?php get_header(); ?>
<div class="wrap">
<header class="page-header">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1 class="page-title">何も見つかりませんでした</h1>
	<?php endif; ?>
</header><!-- .page-header -->

<div id="primary">
<main>
<?php
		if ( have_posts() ) :
			get_template_part( 'page/content-excerpt' );

			bhpress_pagination_list();

		else : ?>
			<p>検索キーワードに一致するものが見つかりませんでした。 別のキーワードで試してみてください。</p>
			<?php
				get_search_form();
		endif;
		?>
</main>
</div><!-- #primary -->
<?php get_sidebar(); ?> <!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer(); ?>