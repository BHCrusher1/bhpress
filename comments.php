<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="container bg-white my-3 <?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">コメント</h3>
        <ol class="comment-list">
            <?php wp_list_comments(); ?>
        </ol>
        <?php the_comments_navigation(); ?>
    <?php endif; ?>
    <?php comment_form(); ?>
</div><!-- #comments -->