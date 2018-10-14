<?php if(have_posts()): while(have_posts()): the_post(); ?> <!-- ループ開始 -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('page/content-header'); ?>
<div class="entry-excerpt">
<?php the_post_thumbnail('thumbnail'); ?>
<?php
if ( has_post_thumbnail() ) {
	echo '<div class="entry-summary">';
	the_excerpt();
}else{
	echo '<div class="entry-summary no-thumbnail">';
	the_excerpt();} ?>
</div><!-- .entry-summary -->
</div> <!-- entry-content -->
</article><!-- #post-## -->
<?php endwhile; endif; ?> <!-- ループ終了 -->