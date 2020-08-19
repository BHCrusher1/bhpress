<?php
/**
 * 各記事の本体
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white mb-3' ); ?>>
	<?php
	get_template_part( 'template-parts/article-header' );
	get_template_part( 'template-parts/sns' );
	get_template_part( 'template-parts/featured-image' );
	?>

	<div class="container p-3 entry-content">

	<?php
	// 個別投稿のページを表示中
	if ( is_single() ) {
		the_content(); // 全部を表示
	} else {
		the_content( '続きを読む ' ); // moreまで表示
	}
	?>

	</div><!-- .container entry-content -->

	<?php
	// 個別投稿のページを表示中
	if ( is_single() ) {
		get_template_part( 'template-parts/post-navigation' ); // 前後の記事
		get_template_part( 'template-parts/article-related' ); // 同じカテゴリの記事
		get_template_part( 'template-parts/sns' ); // SNSボタン
	}
	?>
</article>
