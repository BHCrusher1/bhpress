<?php get_header(); ?>
<div class="container">
	<?php breadcrumb(); ?>
	<div class="row">
		<section id="primary" class="col-md-9 content-area">
			<main id="main" class="site-main">
				<?php
					while (have_posts()) : the_post();
					get_template_part('template-parts/content/content');
					endwhile;
				?>
				<?php comments_template(); ?>
				</main><!-- .site-main -->
        </section><!-- .content-area -->
        <?php get_sidebar(); ?> 
    </div><!-- .row -->
</div><!-- .container -->
<?php get_footer();
