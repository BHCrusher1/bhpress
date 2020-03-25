<?php
/**
 * 検索結果画面
 */
?>
<?php get_header(); ?>
<div class="container mb-auto">
	<header class="page-header">
		<?php
		if ( have_posts() ) : // 検索結果が存在したか
			?>
			<h1 class="h2 page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
		else : // 無かった場合
			?>
			<h1 class="h2 page-title">何も見つかりませんでした</h1>
		<?php endif; ?>
	</header><!-- .page-header -->
	<?php breadcrumb(); ?>
	<div class="row">
		<section id="primary" class="col-md-9 content-area">
			<main id="main" class="site-main">
				<?php
				if ( have_posts() ) { // 検索ワードに一致するものがある場合
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'excerpt' );
					endwhile;
					bhpress_pagination_list();
				} else {
					echo '<p>検索キーワードに一致するものが見つかりませんでした。 別のキーワードで試してみてください。</p>';
					get_search_form();
				}
				?>
			</main><!-- .site-main -->
		</section><!-- .content-area -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
