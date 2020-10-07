<?php
/**
 * コメント欄
 */

if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

	<div id="comments" class="container-fluid my-3">
		<div class="comments-header section-inner small max-percentage">

			<h3 class="comments-title">
			<?php
				$comments_number = absint( get_comments_number() );
				echo $comments_number;
			?>件のコメント
			</h3><!-- .comments-title -->

		</div><!-- .comments-header -->

		<ol class="comment-list">
		<?php
		wp_list_comments(); // コメントを表示
		?>
		</ol>
		<?php
		the_comments_navigation(); // コメントの複数ページ
		?>
	</div><!-- #comments -->

	<?php
}

comment_form(
	array(
		'class_container'    => 'container-fluid my-3 pb-3',
	)
);
