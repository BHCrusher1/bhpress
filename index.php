<?php get_header(); ?>
<div class="container mb-auto">
	<?php if ( is_home() ) : ?>
		<nav aria-label="breadcrumb">
			<!-- 上に表示されるパンくずリスト -->
			<ol id="breadcrumb" class="breadcrumb my-0" itemprop="Breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/BreadcrumbList">
				<li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php esc_url( home_url( '/' ) ); ?>" class="home">&#x1F3E0;<span itemprop="name">HOME</span></a><meta itemprop="position" content="1"></li>
			</ol>
		</nav>
	<?php elseif ( is_page() ) : ?>
		<?php breadcrumb(); ?>
	<?php endif; ?>
	<div class="row">
		<section id="primary" class="col-md-9 content-area">
			<main id="main" class="site-main">
				<?php
				if ( have_posts() ) {
					// コンテンツがあればループ
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content/content' );
					}

					// 前後ページのナビゲーション
					bhpress_pagination_list();
				} else {

					// コンテンツがない場合は"投稿が見つかりません"というテンプレートを含めます
					get_template_part( 'template-parts/content/content', 'none' );
				}
				?>
			</main><!-- .site-main -->
		</section><!-- .content-area -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
