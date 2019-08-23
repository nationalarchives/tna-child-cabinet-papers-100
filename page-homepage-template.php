<?php
/*
Template Name: Homepage template
*/
get_header(); ?>
<main role="main">
    <div class="banner feature-img" style="background-image: url('<?php
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
        <section class="container heading-banner text-left">
            <div class="row">
                <div class="col-md-12">
                    <?php get_image_caption('top'); ?>
                    <div class="entry-header">
                        <h1 class="super-heading"><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>


        <?php if (have_posts()) : ?>
        <section class="container">
            <div class="row">
                <div class="col-md-12 content-wrapper">
                    <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <section class="container padding-fix">
            <div class="row">
                <?php
					$parent_id = get_the_ID();
					$args = array(
						'category_name' => 'homepage',
						'post_type'     => 'page',
						'posts_per_page' => -1,
						'orderby'       => 'menu_order',
						'order'         => 'ASC'
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
                <div class="col-md-6">
                    <div class="cabinet-documents">
                        <div class="thumbnail">
                            <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                            <a href="<?php echo make_path_relative(get_page_link()); ?>"
                                title="<?php echo get_the_title(); ?>">
                                <img src="<?php echo make_path_relative_no_pre_path($image_url[0]); ?>"
                                    class="img-responsive" alt="<?php echo $post->post_title ?>">
                            </a>
                        </div>
                        <div class="caption">
                            <a href="<?php echo make_path_relative(get_page_link()); ?>"
                                title="<?php echo get_the_title(); ?>">
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
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>
        </section>
        <?php
			$left_title = get_post_meta($page_id, 'left_column_title', true);
			$left_content = get_post_meta($page_id, 'left_content', true);
			$right_title = get_post_meta($page_id, 'right_column_title', true);
			$right_content = get_post_meta($page_id, 'right_content', true);
			if ( !empty($left_title) || !empty($left_content)  ) : ?>
        <section class="container">
            <div class="row">
                <div
                    class="<?php if ( empty($right_title) || empty($right_content ) ) { echo 'col-md-12 content-wrapper'; } else { echo 'col-md-6 content-wrapper'; } ?>">
                    <div class="thumbnail end-box">
                        <h2><?php echo $left_title; ?></h2>
                        <div class="img-box">
                            <?php echo wpautop($left_content); ?>
                        </div>
                    </div>
                </div>
                <?php if( !empty($right_content) || !empty($right_content) ) : ?>
                <div class="col-md-6">
                    <div class="thumbnail end-box">
                        <h2><?php echo $right_title; ?></h2>
                        <div class="img-box">
                            <?php echo wpautop($right_content); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>