<?php
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'post-thumbnails' );
add_image_size( 'bhpress-image', 1920, 1280, true );

//サイドバーにウィジェット追加
register_sidebar( array(
    'name'          => __( 'Blog Sidebar' ),
    'id'            => 'sidebar-1',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );

function the_posts_pagination_list( $args = array() ) {
    $navigation = '';
 
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        $args = wp_parse_args( $args, array(
            'mid_size'      => 2,
            'prev_text'     => '<i class="fas fa-arrow-left"></i><span class="screen-reader-text">前へ',
            'next_text'     => '次へ<i class="fas fa-arrow-right"></i>',
            'type'          => 'list',
        ) );
 
        // Make sure we get a string back. Plain is the next best thing.
        if ( isset( $args['type'] ) && 'array' == $args['type'] ) {
            $args['type'] = 'plain';
        }
 
        // Set up paginated links.
        $links = paginate_links( $args );
 
        if ( $links ) {
            $template = '
    <nav class="navigation pagination" role="navigation">
        <div class="nav-links">%1$s</div>
    </nav>';
            $navigation = sprintf( $template, $links );
        }
    }
 
    echo $navigation;
}

function disable_emoji() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );
