<?php get_header(); ?>
<div class="container mb-auto">
	<?php if ( is_search() ) : // 検索結果ページの場合 ?>
		<header class="page-header">
			<?php if ( have_posts() ) : // 検索結果が存在したか ?>
				<h1 class="h2 page-title my-1"><?php printf( '検索:“<span>' . get_search_query() . '</span>”' ); ?></h1>
			<?php else : // 無かった場合 ?>
				<h1 class="h2 page-title my-1">何も見つかりませんでした</h1>
			<?php endif; ?>
		</header><!-- .page-header -->
	<?php endif; ?>
	<?php breadcrumb(); ?>
	<div class="row">
		<main id="main" class="col-md-9 content-area" role="main">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				if ( is_search() ) {
					get_template_part( 'template-parts/content/content', 'excerpt' );
				} else {
					get_template_part( 'template-parts/content/content' );
				}
			}
			bhpress_pagination_list();
		} else {
			if ( is_search() ) {
				echo '<p>検索キーワードに一致するものが見つかりませんでした。 別のキーワードで試してみてください。</p>';
				get_search_form();
			} else {
				// コンテンツがない場合は"投稿が見つかりません"というテンプレートを含めます
				get_template_part( 'template-parts/content/content', 'none' );
			}
		}
		?>
		</main><!-- .content-area -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
