<header class="entry-header">
	<?php
if (is_single() or is_page()) { //個別ページの場合
    the_title('<h1 class="entry-title">', '</h1>');
} elseif (is_front_page() && is_home()) { //トップページ（ホームとフロントページ）の場合
    the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
} else { //それ以外
    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
}
if (! is_page()) : //固定ページを表示していない場合?>
	<div class="entry-meta">
		<time class="post-date">公開日:<?php echo get_the_date(); ?></time><?php if (get_the_date() != get_the_modified_date()) {
    echo '<time class="modified-date">最終更新日:';
    the_modified_date();
    echo'</time>';
} ?>
		<span class="cat-links"><i class="fas fa-folder"></i>：<?php the_category(', '); ?></span>
	</div> <!-- .entry-meta -->
	<?php endif; ?>
</header>