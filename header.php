<?php
/**
 * ページのheadと、headerを読み込む部分
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<!-- ここからwp_head -->
	<?php wp_head(); ?>
	<!-- wp_headここまで -->
</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<div id="page" class="d-flex flex-column min-vh-100">
		<header id="site-header" class="bg-white" role="banner">
			<div class="container-xl site-branding-container">
				<div class="header-titles my-2">

					<?php if ( has_custom_logo() ) : // カスタムロゴがある場合 ?>
						<div class="site-logo"><?php the_custom_logo(); ?></div>
					<?php endif; ?>

					<?php
						$blog_info = get_bloginfo( 'name' ); // サイトのタイトルを取得
						if ( ! empty( $blog_info ) ) : // サイトのタイトルが空でない場合
					?>
						<?php if ( is_front_page() && is_home() ) : // デフォルト設定の最新の投稿を表示になっている場合 ?>
							<h1 class="h3 font-weight-bold site-title"><a class="text-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="h3 font-weight-bold site-title"><a class="text-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php
						$description = get_bloginfo( 'description', 'display' ); // サイトのキャッチフレーズを取得
						if ( $description || is_customize_preview() ) : // サイトのキャッチフレーズが空でない場合
					?>
						<p class="text-secondary h5 site-description"><?php echo ( esc_attr( $description ) ); ?></p>
					<?php endif; ?>

				</div><!-- .header-titles -->

				<?php if ( has_nav_menu( 'headerMenu-1' ) ) : // メニューがある場合メニューを表示 ?>
					<nav id="site-navigation" class="header-navigation my-2" role="navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'headerMenu-1',
							'container'      => '',
							'menu_class'     => 'headerMenu-1',
							'items_wrap'     => '<ul id="%2$s" class="nav justify-content-around">%3$s</ul>',
						)
					);
					?>
					</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .site-branding-container -->
		</header><!-- #site-header -->
