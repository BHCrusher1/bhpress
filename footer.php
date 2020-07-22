<?php
/**
 * 各記事の本体
 */
$since  = '2015';
$until  = '2020';
$link   = 'https://twitter.com/BHCrusher1';
$author = 'BHCrusher1';
?>
<footer id="site-footer" role="contentinfo" class="bg-white py-2 site-footer">
	<div class="site-info">
		<p class="text-center"><?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
			このサイトは<a href="https://github.com/BHCrusher1/BHpress" class="imprint">BHpressテーマ</a>を使用しています
			<?php
			// プライバシーポリシーが存在する場合リンクを表示
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?>
		</p>
		<p class="text-center mb-0">&copy; <?php echo( $since ); ?>-<?php echo( $until ); ?> <a href="<?php echo( $link ); ?>" target="_blank" rel="noopener"><?php echo( $author ); ?></a></p>
	</div><!-- .site-info -->
</footer><!-- #site-footer -->
</div><!-- #page -->
<!-- ここからwp_footer -->
<?php wp_footer(); ?>
<!-- wp_footerここまで -->
</body>
</html>
