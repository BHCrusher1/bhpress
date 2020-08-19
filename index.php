<?php get_header(); ?>
<div class="container mb-auto">
	<?php
	$archive_header = '';
	if ( is_search() ) {
		$archive_header = sprintf( '検索:“<span>' . get_search_query() . '</span>”' );
	} elseif ( is_date() ) {
		$archive_header = get_the_archive_title();
	}
	if ( $archive_header ) {
		echo ( '<header class="page-header"><h1 class="h2 page-title my-1">' . $archive_header . '</h1></header><!-- .page-header -->' );
	}
	breadcrumb();
	?>
	<div class="row">
		<main id="main" class="col-md-9 content-area" role="main">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				if ( is_search() || is_date() ) {
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
