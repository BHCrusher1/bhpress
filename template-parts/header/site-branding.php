<div class="py-2 site-branding">

	<?php if (has_custom_logo()) : //カスタムロゴの有無を判定?>
		<div class="site-logo"><?php the_custom_logo(); ?>
	</div>
	<?php endif; ?>
	<?php $blog_info = get_bloginfo('name'); //サイトのタイトルを取得
	if (! empty($blog_info)) : //サイトのタイトルが存在する場合?>
		<?php if (is_front_page() && is_home()) : //デフォルト設定の最新の投稿を表示になっている場合?>
			<h1 class="h1 font-weight-bold d-inline site-title"><a class="text-dark"	href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
		<?php else : ?>
			<p class="h1 font-weight-bold d-inline site-title"><a class="text-dark" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
    $description = get_bloginfo('description', 'display'); //サイトのキャッチフレーズを取得
    if ($description || is_customize_preview()) : //サイトのキャッチフレーズが存在する場合?>
		<p class="text-secondary d-inline h5 site-description"><?php echo $description; ?></p>
	<?php endif; ?>

	<?php //以下twentyseventeenからコピペしたそのまま ?>
	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_class'     => 'main-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
					'depth'          => 1,
				)
			);
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>
</div><!-- .site-branding -->
