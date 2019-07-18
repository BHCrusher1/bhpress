<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white mb-3'); ?>>
<?php
	get_template_part('template-parts/content/article-header'); ?>
	<div class="entry-excerpt">
		<?php if (has_post_thumbnail()) { //アイキャッチ画像がある場合
			echo '<div class="post-thumbnail">',the_post_thumbnail('thumbnail'),'</div>';
			echo '<div class="entry-content">';
		} else { //アイキャッチ画像が無い場合.no-thumbnailを追加
			echo '<div class="entry-content no-thumbnail">';
		}
		the_excerpt(); ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-excerpt -->
</article><!-- #post-<?php the_ID(); ?> -->