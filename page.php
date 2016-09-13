<?php get_header(); ?>
	<main>
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
							<h1><span><?php echo get_the_title(); ?></span></h1>
						</div>
					</div>
				</div>
			</div>
			<section class="container parent-content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</section>
			<section class="container">
				<div class="col-md-6 cabinet-documents">
					<div class="caption">
						<a href="#">
							<h2>Thumbnail label</h2>
						</a>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p>
					</div>
					<div class="thumbnail">
						<a href="#"><img src="http://www.nationalarchives.gov.uk/wp-content/uploads/2015/10/feature-agincourt-Henry-V-seal-720x553.jpg" alt="Why the battle of Agincourt happened"></a>
					</div>
				</div>
				<div class="col-md-6 cabinet-documents">
					<div class="caption">
						<a href="#">
							<h2>Thumbnail label</h2>
						</a>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p>
					</div>
					<div class="thumbnail">
						<a href="#"><img src="http://www.nationalarchives.gov.uk/wp-content/uploads/2015/10/Feature-pouch-of-Sir-Simon-Felbrigge-720x553.jpg" alt="Preparing to fight: Raising soldiers and supplies"></a>
					</div>
				</div>
				<div class="col-md-6 cabinet-documents">
					<div class="caption">
						<a href="#">
							<h2>Thumbnail label</h2>
						</a>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p>
					</div>
					<div class="thumbnail">
						<a href="#"><img src="http://www.nationalarchives.gov.uk/wp-content/uploads/2015/10/feature-agincourt-Henry-V-seal-720x553.jpg" alt="Why the battle of Agincourt happened"></a>
					</div>
				</div>
				<div class="col-md-6 cabinet-documents">
					<div class="caption">
						<a href="#">
							<h2>Thumbnail label</h2>
						</a>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p>
					</div>
					<div class="thumbnail">
						<a href="#"><img src="http://www.nationalarchives.gov.uk/wp-content/uploads/2015/10/feature-agincourt-Henry-V-seal-720x553.jpg" alt="Why the battle of Agincourt happened"></a>
					</div>
				</div>
			</section>
			<section class="container">
				<div class="col-md-6">
					<div class="thumbnail">
						<p>
							is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<p>
							is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<p>
							is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<p>
							is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
						</p>
					</div>
				</div>
			</section>
		</div>
	</main>
<?php get_footer(); ?>