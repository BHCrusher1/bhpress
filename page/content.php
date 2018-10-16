<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
get_template_part('page/content-header');
get_template_part('page/sns');
if ( has_post_thumbnail() ) {
	echo '<div class="single-featured-image-header"><div>';
	if ( is_single() ) {
		the_post_thumbnail( 'large' );
	} else {
		the_post_thumbnail();
	}
	echo '</div></div><!-- .single-featured-image-header -->';
} else { echo '<hr>'; }
?>
<div class="entry-content">
<?php
	if ( is_single() ) {the_content();}
	else {the_content( '続きを読む ');}
?>
</div><!-- .entry-content -->
<hr>
<?php get_template_part('page/sns');
if ( is_single() ) {
	get_template_part('page/post-navigation');
	echo '<hr>';
	get_template_part('page/content-related');} ?>
</article>