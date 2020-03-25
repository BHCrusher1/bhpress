<?php
/*
Template Name: サイドバー無し
*/
?>

<?php get_header(); ?>
<div class="container mb-auto">
	<?php breadcrumb(); ?>
	<div class="row">
		<section id="primary" class="col content-area">
			<main id="main" class="site-main">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white mb-3' ); ?>>
					<header class="container bg-primary text-white entry-header">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								if ( is_single() or is_page() ) { // 個別ページの場合
									the_title( '<h1 class="d-inline-block h2 text-white entry-title">', '</h1>' );
								} elseif ( is_front_page() && is_home() ) { // トップページ（ホームとフロントページ）の場合
									the_title( '<h3 class="d-inline-block h2 entry-title"><a class="text-white" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
								} else { // それ以外
									the_title( '<h2 class="d-inline-block h2 entry-title"><a class="text-white" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								}
							endwhile;
						endif;
						?>
					</header>
					<?php
					get_template_part( 'template-parts/content/sns' );
					if ( has_post_thumbnail() ) { // アイキャッチ画像がある
						echo '<div class="single-featured-image-header">';
						if ( is_single() ) { // 個別投稿のページを表示中
							the_post_thumbnail( 'large' );
						} else { // 個別投稿以外のページ
							the_post_thumbnail();
						}
						echo '</div><!-- .single-featured-image-header -->';
						echo '<div class="container entry-content border-bottom">';
					} else { // アイキャッチ画像無し
						echo '<div class="container entry-content border-top border-bottom">';
					}
					the_content( '続きを読む ' );
					?>
					</div><!-- .container entry-content -->
				<?php get_template_part( 'template-parts/content/sns' ); ?>
				</article>
			</main><!-- .site-main -->
		</section><!-- .content-area -->
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
