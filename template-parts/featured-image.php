<?php
/**
 * アイキャッチ画像
 */

if ( has_post_thumbnail() && ! post_password_required() ) {

	echo '<figure class="mb-0 featured-media">';

	// 個別投稿のページを表示中
	if ( is_single() || is_page() ) {
		the_post_thumbnail( 'bh-large' );
	} else {
		the_post_thumbnail();
	}

	echo '</figure><!-- .featured-media -->';

}
