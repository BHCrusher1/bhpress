<?php
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 893, 552, true );

//サイドバーにウィジェット追加
register_sidebar( array(
	'name'          => __( 'Blog Sidebar' ),
	'id'            => 'sidebar-1',
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) );

function bhpress_pagination_list( $args = array() ) {
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
	<nav class="navigation pagination" role="navigation">%1$s</nav>';
			$navigation = sprintf( $template, $links );
		}
	}
 
	echo $navigation;
}

// the_excerptで続きを読むを表示
function new_excerpt_more( $more ) {
	return ' <p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">続きを読む</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// 絵文字表示の削除
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

// RSSフィードを削除 link rel="alternate" type="application/rss+xml"
remove_action('wp_head','feed_links',2);
remove_action('wp_head','feed_links_extra',3);
// EditURLを削除 link rel="EditURI" type="application/rsd+xml" title="RSD"
remove_action('wp_head', 'rsd_link');
// wlwmanifestを削除 link rel="wlwmanifest" type="application/wlwmanifest+xml"
remove_action('wp_head','wlwmanifest_link');
// stortlinkを削除 <link rel='shortlink'
remove_action('wp_head', 'wp_shortlink_wp_head');
// WPバージョン表記の削除 meta name="generator"
remove_action('wp_head','wp_generator');
// 謎のインラインスタイルを削除 <style type="text/css">.recentcomments a
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );