<?php

//cssの読み込み
function add_stylesheet()
{
    //wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', array(), null);
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), date('YmdHi', filemtime(get_stylesheet_directory() . '/style.css')));
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

//スクリプトの読み込み
function add_script()
{
    //WP標準のjQueryの読み込みを止める
    wp_deregister_script('jquery');
    //スクリプトの読み込み
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'add_script');

function insert_inline_script() {
	if ( function_exists( 'wp_add_inline_script' ) ) {
		$inlineScript = file_get_contents( get_template_directory_uri().'/inlineScript.js', true );

		wp_add_inline_script( 'jquery', $inlineScript );
	}
}
add_action('wp_footer', 'insert_inline_script');

//カスタムロゴを有効化
add_theme_support(
    'custom-logo',
    array(
        'height'      => 190,
        'width'       => 190,
        'flex-width'  => false,
        'flex-height' => false,
    )
);

// メニューの位置を指定
register_nav_menus(
    array(
        'headerMenu-1' => __('Header Menu', 'Header Menu'),
    )
);

add_theme_support('title-tag');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
add_theme_support('post-thumbnails');
set_post_thumbnail_size(825, 510, true);

function bhpress_setup()
{
    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Enqueue editor styles.
    add_editor_style('assets/css/editor-style.css');

    // Add support for Block Styles
    add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'bhpress_setup');

// oEmbedのカスタマイズ
remove_action('embed_head', 'print_embed_styles');
remove_action('embed_footer', 'print_embed_sharing_dialog');

//サイドバーにウィジェット追加
register_sidebar(array(
    'name'          => __('Blog Sidebar'),
    'id'            => 'sidebar-1',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="container bg-secondary text-white mb-0 widget-title">',
    'after_title'   => '</h4>',
));

// paginationの形式を指定
function bhpress_pagination_list($args = array())
{
    $navigation = '';

    // Don't print empty markup if there's only one page.
    if ($GLOBALS['wp_query']->max_num_pages > 1) {
        $args = wp_parse_args($args, array(
            'mid_size'      => 2,
            'prev_text'     => '←<span class="screen-reader-text">前へ',
            'next_text'     => '次へ→',
            'type'          => 'list',
        ));

        // Make sure we get a string back. Plain is the next best thing.
        if (isset($args['type']) && 'array' == $args['type']) {
            $args['type'] = 'plain';
        }

        // Set up paginated links.
        $links = paginate_links($args);

        if ($links) {
            $template = '<nav class="container navigation pagination justify-content-center bg-white my-3 py-3" role="navigation">%1$s</nav>';
            $navigation = sprintf($template, $links);
        }
    }

    echo $navigation;
}

// the_excerptで続きを読むを表示
function new_excerpt_more($more)
{
    return ' <p><a class="read-more" href="' . get_permalink(get_the_ID()) . '">続きを読む</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// 絵文字表示の削除
function disable_emoji()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

// RSSフィードを削除 link rel="alternate" type="application/rss+xml"
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
// EditURLを削除 link rel="EditURI" type="application/rsd+xml" title="RSD"
remove_action('wp_head', 'rsd_link');
// wlwmanifestを削除 link rel="wlwmanifest" type="application/wlwmanifest+xml"
remove_action('wp_head', 'wlwmanifest_link');
// stortlinkを削除 <link rel='shortlink'
remove_action('wp_head', 'wp_shortlink_wp_head');
// WPバージョン表記の削除 meta name="generator"
remove_action('wp_head', 'wp_generator');
// 謎のインラインスタイルを削除 <style type="text/css">.recentcomments a
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');

// パンくずリスト
function breadcrumb()
{
    global $post;
    $str = '';
    $pNum = 2;

    $str .= '<nav aria-label="breadcrumb">';
    $str .= '<ol id="breadcrumb" class="breadcrumb my-0" itemprop="Breadcrumb" itemscope itemtype="http://data-vocabulary.org/BreadcrumbList">';
    $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . home_url('/') . '" class="home">&#x1F3E0;<span itemprop="name">HOME</span></a><meta itemprop="position" content="1"></li>';

    /* 通常の投稿ページ */
    if (is_singular('post')) {
        $categories = get_the_category($post->ID);
        $cat = $categories[0];

        if ($cat->parent != 0) {
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
            foreach ($ancestors as $ancestor) {
                $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_category_link($ancestor) . '"><span itemprop="name">' . get_cat_name($ancestor) . '</span></a><meta itemprop="position" content="' . $pNum . '"></li>';
                $pNum++;
            }
        }
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_category_link($cat->term_id) . '"><span itemprop="name">' . $cat->cat_name . '</span></a><meta itemprop="position" content="' . $pNum . '"></li>';
        $pNum++;
        $str .= '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . $post->post_title . '</span><meta itemprop="position" content="' . $pNum . '"></li>';
    }

    /* カスタムポスト */ elseif (is_single() && !is_singular('post')) {
        $cp_name = get_post_type_object(get_post_type())->label;
        $cp_url = home_url('/') . get_post_type_object(get_post_type())->name;
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . $cp_url . '"><span itemprop="name">' . $cp_name . '</span></a><meta itemprop="position" content="2"></li>';
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . $post->post_title . '</span><meta itemprop="position" content="3"></li>';
    }

    /* 固定ページ */ elseif (is_page()) {
        $pNum = 2;
        if ($post->post_parent != 0) {
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach ($ancestors as $ancestor) {
                $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_permalink($ancestor) . '"><span itemprop="name">' . get_the_title($ancestor) . '</span></a><meta itemprop="position" content="' . $pNum . '"></li>';
                $pNum++;
            }
        }
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . $post->post_title . '</span><meta itemprop="position" content="' . $pNum . '"></li>';
    }

    /* カテゴリページ */ elseif (is_category()) {
        $cat = get_queried_object();
        $pNum = 2;
        if ($cat->parent != 0) {
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
            foreach ($ancestors as $ancestor) {
                $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_category_link($ancestor) . '"><span itemprop="name">' . get_cat_name($ancestor) . '</span></a><meta itemprop="position" content="' . $pNum . '"></li>';
            }
        }
        $str .= '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . $cat->name . '</span><meta itemprop="position" content="' . $pNum . '"></li>';
    }

    /* タグページ */ elseif (is_tag()) {
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . single_tag_title('', false) . '</span><meta itemprop="position" content="2"></li>';
    }

    /* 時系列アーカイブページ */ elseif (is_date()) {
        if (get_query_var('day') != 0) {
            $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_year_link(get_query_var('year')) . '"><span itemprop="name">' . get_query_var('year') . '年</span></a><meta itemprop="position" content="2"></li>';
            $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_month_link(get_query_var('year'), get_query_var('monthnum')) . '"><span itemprop="name">' . get_query_var('monthnum') . '月</span></a><meta itemprop="position" content="3"></li>';
            $str .= '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . get_query_var('day') . '</span>日<meta itemprop="position" content="4"></li>';
        } elseif (get_query_var('monthnum') != 0) {
            $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_year_link(get_query_var('year')) . '"><span itemprop="name">' . get_query_var('year') . '年</span></a><meta itemprop="position" content="2"></li>';
            $str .= '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . get_query_var('monthnum') . '</span>月<meta itemprop="position" content="3"></li>';
        } else {
            $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . get_query_var('year') . '年</span><meta itemprop="position" content="2"></li>';
        }
    }

    /* 投稿者ページ */ elseif (is_author()) {
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">投稿者 : ' . get_the_author_meta('display_name', get_query_var('author')) . '</span><meta itemprop="position" content="2"></li>';
    }

    /* 添付ファイルページ */ elseif (is_attachment()) {
        $pNum = 2;
        if ($post->post_parent != 0) {
            $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_permalink($post->post_parent) . '"><span itemprop="name">' . get_the_title($post->post_parent) . '</span></a><meta itemprop="position" content="' . $pNum . '"></li>';
            $pNum++;
        }
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . $post->post_title . '</span><meta itemprop="position" content="' . $pNum . '"></li>';
    }

    /* 検索結果ページ */ elseif (is_search()) {
        $str .= '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">「' . get_search_query() . '」で検索した結果</span><meta itemprop="position" content="2"></li>';
    }

    /* 404 Not Found ページ */ elseif (is_404()) {
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">お探しの記事は見つかりませんでした。</span><meta itemprop="position" content="2"></li>';
    }

    /* その他のページ */ else {
        $str .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . wp_title('', false) . '</span><meta itemprop="position" content="2"></li>';
    }

    $str .= '</ol>';
    $str .= '</nav>';
    echo $str;
}
