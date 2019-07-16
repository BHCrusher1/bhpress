<form role="search" method="get" class="search-form"
    action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" class="search-field" placeholder="検索"
        value="<?php echo get_search_query(); ?>" name="s" />
    <input type="submit" class="search-submit fas fa-search" value="&#xf002;" />
</form>