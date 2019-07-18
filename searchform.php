<form role="search" method="get" class="container d-flex py-3 mb-3 search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only" for="search">
        <span class="screen-reader-text">検索:</span>
    </label>
    <input id="search" class="form-control search-field" type="search" placeholder="検索" value="<?php echo get_search_query(); ?>" name="s">
    <input type="submit" class="btn btn-primary ml-2 search-submit fas fa-search" style="font-weight:900;" value="&#xf002;" />
</form>