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
