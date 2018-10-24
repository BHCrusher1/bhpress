<?php get_header(); ?>
<div class="wrap">
<?php if(is_home()):?>
    <nav>
    <ol id="breadcrumb" itemprop="Breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><i class="fas fa-home"></i><a itemprop="item" href="<?php esc_url( home_url( '/' ) );?>" class="home"><span itemprop="name">HOME</span></a><meta itemprop="position" content="1"></li>
    </ol>
    </nav>
<?php elseif(is_page()) : ?>
    <?php breadcrumb(); ?>
<?php endif;?>
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