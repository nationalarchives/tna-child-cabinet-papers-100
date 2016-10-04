<?php
get_header();
get_template_part( 'breadcrumb' ); ?>
<main role="main">
	<section class="container">
		<div class="row">
			<h1><?php the_title() ?></h1>
			<div class="document-viewer feature-img">
				<?php
				$page_id = $post->ID;
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
				$childimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->post_parent), 'single-post-thumbnail');
				?>
				<a href="<?php echo make_path_relative_no_pre_path($image[0]); ?>" target="_blank">
					<div>
						<?php
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						if ( has_post_thumbnail() ) : ?>
							<img src="<?php echo make_path_relative($image_url[0]); ?>" class="img-responsive" alt="<?php echo $post->post_title ?>">
						<?php endif; ?>
					</div>
				</a>
				<?php get_image_caption('top'); ?>
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
			'posts_per_page' => -1,
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
				<a href="<?php echo make_path_relative(get_page_link()); ?>">
					<div class="document-slide-thumb" style="background-image: url('<?php
					$page_id = $post->ID;
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
					//$childimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->post_parent), 'single-post-thumbnail');
					if (has_post_thumbnail($page_id)) {
						echo make_path_relative_no_pre_path($image[0]);

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
			<div class="col-md-12">
				<?php
				global $post;
				$parent = $post->post_parent;
				$home_title = get_the_title( get_option('page_on_front') );
				if (is_page() && $parent) : ?>
					<a class="button align-right" href="<?php echo make_path_relative(get_permalink( $parent )); ?>">
						<?php echo 'Return to '.get_the_title($parent); ?>
					</a>
				<?php else : ?>
					<a class="button align-right" href="<?php echo make_path_relative(get_site_url()); ?>">
						<?php echo 'Return to '.$home_title; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
