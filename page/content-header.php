<header class="entry-header">
<?php
if ( is_single() ) {
	the_title( '<h1 class="entry-title">', '</h1>' );
} elseif ( is_front_page() && is_home() ) {
	the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
} else {
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
}
?>
<div class="entry-meta">
<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' ?><time><?php echo get_the_date(); ?></time></a>
<span class="cat-links"><i class="fas fa-folder"></i>：<?php the_category(', '); ?></span>
</div> <!-- .entry-meta -->
</header>