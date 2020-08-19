<?php
/**
 * 各記事の下のフッター（同じカテゴリの記事）の部分
 */

?><footer class="container my-3 related">
	<p class="h5">同じカテゴリの記事</p>
	<ul class="nav flex-column">
		<?php
		$categories  = get_the_category( $post->ID );
		$category_ID = array();

		foreach ( $categories as $category ) {
			array_push( $category_ID, $category->cat_ID );
		}

		$posts_number = 5; // 表示したい件数を指定

		$args     = array(
			'post__not_in'   => array( $post->ID ), // 現在のページの投稿を除外
			'category__in'   => $category_ID,       // 現在の投稿のカテゴリーの関連記事を取得
			'orderby'        => 'date',             // 日付順に並べる
			'posts_per_page' => $posts_number,      // 表示する件数の指定
		);
		$wp_query = new WP_Query( $args );

		// 同じカテゴリの記事がある場合
		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();
				?>
				<li class="nav-item py-1"><a href="<?php the_permalink(); ?>">
					<?php
					if ( has_post_thumbnail() ) {
						echo '<div class="post-thumbnail">', the_post_thumbnail( 'thumbnail' ), '</div>';
						echo '<div class="d-flex flex-column related-meta ">';
					} else {
						echo '<div class="d-flex flex-column related-meta no-thumbnail">';
					}
					?>
					<h3 class="h6"><?php the_title(); ?></h3>
					<time datetime="<?php the_modified_time( 'c' ); ?>"><?php echo get_the_date(); ?></time>
					</div>
				</a></li>
				<?php
			endwhile;
		} else {
			echo '<p>同じカテゴリの記事がありません・・・</p>';
		}
		?>
		<?php wp_reset_query(); ?>
	</ul>
</footer>
