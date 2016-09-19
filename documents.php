<?php
/*
Template Name: Cabinet documents
*/
get_header();
get_template_part( 'breadcrumb' ); ?>
<main role="main">
	<section class="container">
		<div class="row">
			<h1><?php the_title() ?></h1>
			<div class="document-viewer">
				<?php
				$page_id = $post->ID;
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
				$childimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->post_parent), 'single-post-thumbnail');
				?>
				<a href="<?php echo make_path_relative_no_pre_path($image[0]); ?>" target="_blank">
					<div style="background-image: url('<?php
					if (has_post_thumbnail($page_id)) {
						echo make_path_relative_no_pre_path($image[0]);
					}
					?>')"></div>
				</a>
				<div class="overlay">
					<a target="_blank" class="button align-right" href="<?php echo make_path_relative_no_pre_path($image[0]); ?>">View full image</a>
				</div>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</section>

	<?php
		$page_id = $post->ID;
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
		$args = array(
			'post_parent'   => $page_id,
			'post_type'     => 'page',
			'post_per_page' => -1,
			'orderby'       => 'menu_order',
			'order'         => 'ASC'
		);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) : ?>
	<!-- while ( $the_query->have_posts() ) : $the_query->the_post(); -->
	<section class="container explore-records">
		<div class="row">
			<h2>Explore the records</h2>
			<span id="slider-prev"></span>
			<span id="slider-next"></span>
			<div class="bxslider">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<a href="<?php echo get_page_link(); ?>">
					<div class="document-slide-thumb" style="background-image: url('<?php
					$page_id = $post->ID;
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
					$childimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->post_parent), 'single-post-thumbnail');
					if (has_post_thumbnail($page_id)) {
						echo make_path_relative_no_pre_path($image[0]);
					} elseif (is_page($page_id)) {
						echo make_path_relative_no_pre_path($childimage[0]);
					}
					?>')">
					</div>
					<div><p><?php the_title(); ?></p></div>
				</a>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php endif; wp_reset_postdata(); ?>
	<section class="container">
		<div class="row">
			<a class="button align-right" href="<?php echo get_site_url(); ?>">Return to the Battle of Agincourt</a>
		</div>
	</section>
</main>
<?php get_footer(); ?>
