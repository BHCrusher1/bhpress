<?php
/**
 * 各記事の本体
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white mb-3' ); ?>>
	<?php
	get_template_part( 'template-parts/content/article-header' );
	get_template_part( 'template-parts/content/sns' );
	if ( has_post_thumbnail() ) { // アイキャッチ画像がある
		echo '<div class="single-featured-image-header">';
		if ( is_single() ) { // 個別投稿のページを表示中
			the_post_thumbnail( 'large' );
		} else { // 個別投稿以外のページ
			the_post_thumbnail();
		}
		echo '</div><!-- .single-featured-image-header -->';
		echo '<div class="container entry-content border-bottom">';
	} else { // アイキャッチ画像無し
		echo '<div class="container entry-content border-top pt-3 border-bottom">';
	}
	if ( is_single() ) { // 個別投稿のページを表示中
		the_content(); // 全部を表示
	} else {
		the_content( '続きを読む ' ); // moreまで表示
	}
	?>
	</div><!-- .container entry-content -->
	<?php
	get_template_part( 'template-parts/content/sns' );
	if ( is_single() ) { // 個別投稿のページを表示中
		get_template_part( 'template-parts/content/post-navigation' ); // 前後の記事
		get_template_part( 'template-parts/content/article-related' ); // 同じカテゴリの記事
	}
	?>
</article>
