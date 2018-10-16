<?php get_header(); ?>
<div class="wrap">
<div id="primary">
<main>
<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part('page/content');
    endwhile;
    bhpress_pagination_list();
else :
    echo '<p>投稿が見つかりませんでした。</p>';
endif; 
?>
</main>
</div><!-- #primary -->
<?php get_sidebar(); ?> <!-- サイドバー -->
</div><!-- .wrap -->
<?php get_footer(); ?>