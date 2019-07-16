<div id="comments" class="comments-area">
    <?php if (have_comments()): ?>
    <h3>コメント</h3>
    <ol class="commets-list">
        <?php wp_list_comments('avatar_size=0'); ?>
    </ol>
    <hr>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>