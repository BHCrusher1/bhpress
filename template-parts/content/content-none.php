<?php
/**
 * 投稿が存在しなかった場合のページ（のはず）
 */
?>
<section class="container bg-white mb-3 no-results not-found">
	<header class="page-header">
		<h1 class="h2 page-title">何も見つかりませんでした</h1>
	</header><!-- .page-header -->
	<div class="page-content">
		<?php
		get_search_form(); // 検索フォームを表示
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
