<?php

/**
 * スタイルシートの読み込み
 */
function add_stylesheet() {
	wp_enqueue_style( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), date( 'YmdHi', filemtime( get_stylesheet_directory() . '/style.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'add_stylesheet' );

/**
 * スクリプトの読み込み
 */
function add_script() {
	// WP標準のjQueryの読み込みを止める
	wp_deregister_script( 'jquery' );
	// スクリプトの読み込み
	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true );
	wp_enqueue_script( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'add_script' );

/**
 * footerにインラインのスクリプトを追加
 */
function insert_inline_script() {
	if ( function_exists( 'wp_add_inline_script' ) ) {
		$inlineScript = file_get_contents( get_template_directory_uri() . '/inlineScript.js', true );

		wp_add_inline_script( 'jquery', $inlineScript );
	}
}
add_action( 'wp_footer', 'insert_inline_script' );



// メニューの位置を指定
register_nav_menus(
	array(
		'headerMenu-1' => __( 'Header Menu', 'Header Menu' ),
	)
);

function bhpress_setup() {

	// <head>に<title>タグを追加
	add_theme_support( 'title-tag' );

	// 検索フォーム、コメントフォーム、コメントのデフォルトのコアマークアップを切り替えて、有効なHTML5を出力する
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	// 投稿のサムネイル有効化
	add_theme_support( 'post-thumbnails' );

	// サムネイルサイズの設定
	set_post_thumbnail_size( 825, 510, true );

	// カスタムロゴを有効化
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 190,
			'width'       => 190,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'assets/css/editor-style.css' );

	// Add support for Block Styles
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'bhpress_setup' );

// oEmbedのカスタマイズ
remove_action( 'embed_head', 'print_embed_styles' );
remove_action( 'embed_footer', 'print_embed_sharing_dialog' );

// サイドバーにウィジェット追加
register_sidebar(
	array(
		'name'          => __( 'Blog Sidebar' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="container bg-secondary text-white mb-0 widget-title">',
		'after_title'   => '</h4>',
	)
);

// paginationの形式を指定
function bhpress_pagination_list( $args = array() ) {
	$navigation = '';

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
		$args = wp_parse_args(
			$args,
			array(
				'mid_size'  => 2,
				'prev_text' => '←<span class="screen-reader-text">前へ',
				'next_text' => '次へ→',
				'type'      => 'list',
			)
		);

		// Make sure we get a string back. Plain is the next best thing.
		if ( isset( $args['type'] ) && 'array' == $args['type'] ) {
			$args['type'] = 'plain';
		}

		// Set up paginated links.
		$links = paginate_links( $args );

		if ( $links ) {
			$template   = '<nav class="container navigation pagination justify-content-center bg-white my-3 py-3" role="navigation">%1$s</nav>';
			$navigation = sprintf( $template, $links );
		}
	}

	echo $navigation;
}

// the_excerptで続きを読むを表示
function new_excerpt_more( $more ) {
	return ' <p><a class="read-more" href="' . get_permalink( get_the_ID() ) . '">続きを読む</a></p>';
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
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
// EditURLを削除 link rel="EditURI" type="application/rsd+xml" title="RSD"
remove_action( 'wp_head', 'rsd_link' );
// wlwmanifestを削除 link rel="wlwmanifest" type="application/wlwmanifest+xml"
remove_action( 'wp_head', 'wlwmanifest_link' );
// stortlinkを削除 <link rel='shortlink'
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
// WPバージョン表記の削除 meta name="generator"
remove_action( 'wp_head', 'wp_generator' );
// 謎のインラインスタイルを削除 <style type="text/css">.recentcomments a
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

/**
 * テンプレートファイルを分離
 */

// パンくずリスト
require get_template_directory() . '/inc/template-breadcrumb.php';
