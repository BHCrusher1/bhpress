<?php
/**
 * 各記事の本体
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {
	$navigation_title = '前後の記事';

	?>
<nav class="container my-3 navigation post-navigation" aria-label="<?php printf( esc_attr( $navigation_title ) ); ?>" role="navigation">
	<h4 class="h5"><?php printf( $navigation_title ); ?></h4>
	<ul class="nav nav-pills nav-justified nav-links">
		<li class="nav-item nav-previous"><span>前の記事</span><br>
		<?php if ( $prev_post ) : // 前の記事の有無 ?>
			<a class="previous-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
			<span class="arrow" aria-hidden="true">&larr;</span><span><?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?></span></a>
		<?php else : ?>
			<span>前の記事がありません</span>
		<?php endif; ?>
		</li>

		<li class="nav-item nav-next"><span>次の記事</span><br>
		<?php if ( get_next_post() ) : // 後ろの記事の有無 ?>
			<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
			<span><?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?></span><span class="arrow" aria-hidden="true">&rarr;</span></a>
		<?php else : ?>
			<span>次の記事がありません</span>
		<?php endif; ?>
		</li>
	</ul>
</nav>

	<?php
}
