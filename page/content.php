<?php if(have_posts()): while(have_posts()): the_post(); ?> <!-- ループ開始 -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('page/content-header'); ?>
<?php get_template_part('page/sns'); ?>
<?php
if ( has_post_thumbnail() ) {
    echo '<div class="single-featured-image-header">';
    echo '<div>';
    echo the_post_thumbnail();
    echo '</div>';
    echo '</div><!-- .single-featured-image-header -->';
}
?>
<hr>
<div class="entry-content">
    <?php
    if ( is_single() ) {the_content();}
    else {the_content(続きを読む);}
    ?>
</div><!-- .entry-content -->
<hr>
<?php get_template_part('page/sns'); ?>
<?php if ( is_single() ) {
    get_template_part('page/content-related');
	}
?>
</article>
<?php endwhile; endif; ?> <!-- ループ終了 -->