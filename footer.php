<footer id="colophon" class="bg-white py-2 site-footer">
	<div class="site-info">
		<p class="text-center"><?php $blog_info = get_bloginfo('name'); ?>
			<?php if (!empty($blog_info)) : ?>
				<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>,
			<?php endif; ?>
			このサイトは<a href="https://github.com/BHCrusher1/BHpress" class="imprint">BHpressテーマ</a>を使用しています,
			<?php
			if (function_exists('the_privacy_policy_link')) {
				the_privacy_policy_link('', '<span role="separator" aria-hidden="true"></span>');
			}
			?>
		</p>
		<p class="text-center mb-0">&copy; 2015-2019 <a href="https://twitter.com/BHCrusher1" target="_blank" rel="noopener">@BHCrusher1</a></p>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>