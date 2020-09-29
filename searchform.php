<?php
/**
 * 検索フォーム
 */

?>
<form role="search" method="get" class="container-fluid d-flex py-3 mb-3 bg-white search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="sr-only" for="search">
		<span class="screen-reader-text">検索:</span>
	</label>
	<input id="search" class="form-control search-field" type="search" placeholder="検索" value="<?php echo get_search_query(); ?>" name="s">
	<input type="submit" class="btn btn-light border-primary ml-2 search-submit" value="&#x1F50D;" />
</form>
