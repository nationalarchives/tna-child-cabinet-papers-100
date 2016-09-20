<?php
/*
Template Name: Cabinet documents
*/
get_header(); ?>
	<main role="main">
		<div class="banner" style="background-image: url('<?php
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
							<?php get_image_caption(); ?>
							<h1><span><?php echo get_the_title(); ?></span></h1>
						</div>
					</div>
				</div>
			</div>
			<section class="container parent-content">
				<div class="row">
					<div class="col-md-12">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</section>
			<section class="container">
				<div class="row">
					<?php
					$parent_id = get_the_ID();
					$args = array(
						'post_parent'   => $parent_id,
						'post_type'     => 'page',
						'post_per_page' => -1,
						'orderby'       => 'menu_order',
						'order'         => 'ASC'
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
						<div class="col-md-6 cabinet-documents">
							<div class="caption">
								<a href="<?php echo get_page_link(); ?>" title="<?php echo get_the_title(); ?>">
									<h2><?php echo get_the_title(); ?></h2>
								</a>
								<?php
									if (has_excerpt()) {
										the_excerpt();
									}
									else {
										echo first_sentence(get_the_content());
									}
								?>
							</div>
							<div class="thumbnail">
								<a href="<?php echo get_page_link(); ?>" title="<?php echo get_the_title(); ?>">
									<?php the_post_thumbnail( 'custom-image', array('class' => 'img-responsive'));  ?>
								</a>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</section>
			<section class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="thumbnail">
							<h2>Bookshop</h2>
							<div class="img-box">
								<div class="col-md-4 col-xs-4">
									<a href="#">
										<img class="img-responsive" src="http://images.nitrosell.com/product_images/15/3652/9781843835110.jpg" alt="battle of agincourt" border="0"></a>
								</div>
								<div class="col-md-4 col-xs-4">
									<a href="#"><img class="img-responsive" src="http://images.nitrosell.com/product_images/15/3652/9781444792119.jpg" alt="agincourt-ranulph fiennes" border="0"></a>
								</div>
								<div class="col-md-4 col-xs-4">
									<a href="#"><img class="img-responsive" src="http://images.nitrosell.com/product_images/15/3652/9781845950972.jpg" alt="1415-Henry-V-Year_of_glory" border="0"></a>
								</div>
							</div>
							<p>Discover more books about Agincourt in The National Archives' bookshop.</p>
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
				</div>
			</section>
		</div>
	</main>
<?php get_footer(); ?>