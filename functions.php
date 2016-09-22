<?php

require_once 'src/setThemeGlobals.php';
require_once 'src/identifyEnvironmentFromIP.php';

// For Breadcrumbs and URLs
$environment = identifyEnvironmentFromIP($_SERVER['SERVER_ADDR'], $_SERVER['REMOTE_ADDR']);
setThemeGlobals($environment);

// Dequeue parent styles for re-enqueuing in the correct order
function dequeue_parent_style()
{
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}

add_action('wp_enqueue_scripts', 'dequeue_parent_style', 9999);
add_action('wp_head', 'dequeue_parent_style', 9999);

// Enqueue styles in correct order
function tna_child_styles()
{
    wp_register_style('tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(),
        EDD_VERSION, 'all');
    wp_register_style('tna-child-styles', get_stylesheet_directory_uri() . '/style.css', array(), '0.1', 'all');
	wp_register_style( 'tna-child-styles-cabinet-papers-100', get_stylesheet_directory_uri() . '/css/cabinet-papers-100.css', array(), '0.1', 'all' );
	wp_register_style('tna-child-styles-cabinet-documents-child', get_stylesheet_directory_uri() . '/css/documents.css', array(), '0.1', 'all');
	wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '0.1', 'all');
	wp_register_style( 'bx-slider-plugin-css', get_stylesheet_directory_uri() . '/js/lib/jquery.bxslider/jquery.bxslider.css', array(), '0.1', 'all' );
	wp_register_script( 'bx-slider-plugin', get_stylesheet_directory_uri() . '/js/lib/jquery.bxslider/jquery.bxslider.min.js', array( 'jquery' ),'','1.1', true);
	wp_register_script( 'bx-slider', get_stylesheet_directory_uri() . '/js/bx-slider.js', array( 'jquery' ),'','1.1', true);

	if (is_page_template ('default')) { wp_enqueue_style('bx-slider-plugin-css'); }
	if (is_page_template ('default')) { wp_enqueue_script( 'bx-slider-plugin' ); }
	if (is_page_template ('default')) { wp_enqueue_script( 'bx-slider' ); }
    wp_enqueue_style('tna-parent-styles');
    wp_enqueue_style('tna-child-styles');
	if (is_page_template ('default')){ wp_enqueue_style('font-awesome'); }
	if (is_page_template('page-cabinet-template.php')) { wp_enqueue_style('tna-child-styles-cabinet-papers-100'); }
	if (is_page_template ('default')) { wp_enqueue_style('tna-child-styles-cabinet-documents-child'); }
}

add_action('wp_enqueue_scripts', 'tna_child_styles');


add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
	if ( function_exists( 'add_theme_support' ) ) {
		add_image_size( 'custom-image', 612, 470, array('center','center') );
	}
}

//Adding the custom field for the  Additional boxes.
function additional_meta () {
	global $post;
	$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
	if ($pageTemplate == 'page-cabinet-template.php') {
		add_meta_box (
			'additional_meta',
			'Additional Content',
			'additional_meta_callback',
			'page',
			'normal',
			'default'
		);
	}
}
add_action('add_meta_boxes', 'additional_meta');
function additional_meta_callback( $post ) {
	wp_nonce_field(basename( __FILE__), 'additional_meta_monce');
	$additional_stored_meta = get_post_meta ($post->ID); ?>
	<div class="wrap">
		<h4 style="color: #009999; font-size: 15px;">Left column section</h4>
		<div class="meta-row">
			<div class="meta-td">
				<input placeholder="Enter the title for the left hand column" class="widefat" type="text" name="Left hand column title" id="Left hand column title" value=""/>
			</div>
		</div>
		<div class="meta-row">
			<div class="meta-th" style="margin-top: 2em;">
				<span><strong>Add content for left column box</strong></span>
			</div>
		</div>
		<div class="meta-editor" style="margin-top: 1em;">
			<?php
			$content = get_post_meta( get_the_id(), 'left_content', true );
			$editor_id = 'left_content';
			$settings = array(
				'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ),
				'textarea_rows' => 8
			);
			wp_editor( $content, $editor_id, $settings );
			?>
		</div>
		<hr style="margin-top: 2.5em;">
		<h4 style="color: #009999; font-size: 15px;">Right column section</h4>
		<div class="meta-row">
			<div class="meta-td">
				<input placeholder="Enter the title for the right hand column" class="widefat" type="text" name="Right hand column title" id="Right hand column title" value=""/>
			</div>
		</div>
		<div class="meta-editor" style="margin-top: 1em;">
			<?php
			$content = get_post_meta( get_the_id(), 'right_content', true );
			$editor_id = 'right_content';
			$settings = array(
				'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ),
				'textarea_rows' => 8
			);
			wp_editor( $content, $editor_id, $settings );
			?>
		</div>
	</div>
<?php } ?>