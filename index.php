<?php get_header(); ?>
<div class="wrap">
<div id="primary">
<main>
<?php get_template_part('page/content'); ?>
<?php bhpress_pagination_list(); ?>
</main>
</div><!-- #primary -->
<?php get_sidebar(); ?> <!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer(); ?>