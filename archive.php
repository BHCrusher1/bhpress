<?php get_header(); ?>
<div class="container mb-auto">
    <?php breadcrumb(); ?>
    <div class="row">
        <section id="primary" class="col-md-9 content-area">
            <main id="main" class="site-main">
                <?php
                if (have_posts()) {
                    echo '<header class="page-header">';
                    the_archive_title('<h1 class="h2 page-title">', '</h1>');
                    echo '</header><!-- .page-header -->';
                    //コンテンツがあればループ
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content/content', 'excerpt');
                    }
                    //前後ページのナビゲーション
                    bhpress_pagination_list();
                } else {
                    //コンテンツがない場合は"投稿が見つかりません"というテンプレートを含めます
                    get_template_part('template-parts/content/content', 'none');
                }
                ?>
            </main><!-- .site-main -->
        </section><!-- .content-area -->
        <?php get_sidebar(); ?>
    </div><!-- .row -->
</div><!-- .container -->
<?php get_footer();
