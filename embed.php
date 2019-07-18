<?php
if (! headers_sent()) {
    header('X-WP-embed: true');
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php echo wp_get_document_title(); ?>
	</title>
	<?php do_action('embed_head'); ?>
	<style>
		.wp-embed{display:flex;align-items:center;text-decoration:none;background-color:#FFF;color:#00369C;padding:0.5em;border-radius:1em;border:solid 2px #9E9E9E}
		.wp-embed-featured-image img{vertical-align:bottom;width:100px;max-width:100%;height:auto;}
		.wp-embed-heading{padding:0.5em;}
	</style>
</head>

<body <?php body_class(); ?>>

	<?php
        if (have_posts()) :
            while (have_posts()) : the_post();
    ?>
	<a href="<?php the_permalink(); ?>" <?php post_class('wp-embed'); ?>>
		<?php
        $thumbnail_id = 0;
        if (has_post_thumbnail()) {
            $thumbnail_id = get_post_thumbnail_id();
        }
        if ('attachment' === get_post_type() && wp_attachment_is_image()) {
            $thumbnail_id = get_the_ID();
        }
        $image_size = 'thumbnail';
    ?>
		<div class="wp-embed-featured-image"><?php echo wp_get_attachment_image($thumbnail_id, $image_size); ?></div>
		<div class="wp-embed-heading"><?php the_title(); ?></div>

		<?php
endwhile;
endif;
do_action('embed_footer');
