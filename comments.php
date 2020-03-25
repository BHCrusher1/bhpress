<?php
/**
 * コメント欄
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="container bg-white my-3 py-3 <?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
	<?php
	if ( have_comments() ) : // コメントがある場合
		?>
		<h3 class="comments-title">コメント</h3>
		<ol class="comment-list">
			<?php
			wp_list_comments(); // コメントを表示
			?>
		</ol>
		<?php
		the_comments_navigation(); // コメントの複数ページ
		?>
	<?php endif; ?>
	<?php
	comment_form(); // コメントを書き込む部分
	?>
</div><!-- #comments -->
