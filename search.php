<?php get_header(); ?>
<div class="wrap">
<header class="page-header">
<?php if ( have_posts() ) : ?>
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php else : ?>
	<h1 class="page-title">何も見つかりませんでした</h1>
<?php endif; ?>
</header><!-- .page-header -->
<?php breadcrumb(); ?>
<div id="primary">
<main>
<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		get_template_part( 'page/content-excerpt' );
	endwhile;
	bhpress_pagination_list();
} else {
	echo '<p>検索キーワードに一致するものが見つかりませんでした。 別のキーワードで試してみてください。</p>';
	get_search_form();
}
?>
</main>
</div><!-- #primary -->
<?php get_sidebar(); ?> <!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer(); ?>