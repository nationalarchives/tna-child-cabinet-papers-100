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
			<section class="container boxes">
				<div class="col-md-6">
					<div class="thumbnail">
						<h2>Bookshop</h2>
						<div class="img-box">
							<div class="col-md-4">
								<a href="#"><img src="http://images.nitrosell.com/product_images/15/3652/9781843835110.jpg" alt="" border="0"></a>
							</div>
							<div class="col-md-4">
								<a href="#"><img src="http://images.nitrosell.com/product_images/15/3652/9781444792119.jpg" alt="" border="0"></a>
							</div>
							<div class="col-md-4">
								<a href="#"><img src="http://images.nitrosell.com/product_images/15/3652/9781845950972.jpg" alt="" border="0"></a>
							</div>
						</div>
						<p>
							Discover more books about Agincourt in The National Archives' bookshop.
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<h2>Related links</h2>
						<ul>
							<li><a href="http://www.agincourt600.com/" title="Agincourt600 website">Agincourt600</a></li>
							<li><a href="http://www.medievalsoldier.org/" title="The soldier in later Medieval England">The soldier in later Medieval England</a></li>
							<li><a href="http://www.nationalarchives.gov.uk/help-with-your-research/research-guides/medieval-early-modern-soldiers/" title="Research guide: Medieval and early modern soldiers">Research guide: Medieval and early modern soldiers</a></li>
						</ul>
					</div>
				</div>
			</section>
		</div>
	</main>
<?php get_footer(); ?>