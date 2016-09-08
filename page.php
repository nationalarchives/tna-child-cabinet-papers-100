<?php get_header(); ?>
	<div>
		<div class="banner" role="banner" style="background-image: url('<?php
		$page_id = $post->ID;
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
		$childimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->post_parent), 'single-post-thumbnail');
		if (has_post_thumbnail($page_id)) {
			echo make_path_relative_no_pre_path($image[0]);
		} elseif (is_page($page_id)) {
			echo make_path_relative_no_pre_path($childimage[0]);
		}
		?>')">
			<?php get_template_part('breadcrumb'); ?>
			<div class="heading-banner text-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="super-heading"><?php echo get_the_title(); ?></h1>
							<?php $sub_heading = get_post_meta($page_id, 'sub_heading_sub_heading', true);
							if ($sub_heading) : ?>
								<h2 class="super-heading"><?php echo $sub_heading; ?></h2>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>