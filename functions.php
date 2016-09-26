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
	if (is_page_template('page-homepage-template.php')) { wp_enqueue_style('tna-child-styles-cabinet-papers-100'); }
	if (is_page_template ('default')) { wp_enqueue_style('tna-child-styles-cabinet-documents-child'); }
}

add_action('wp_enqueue_scripts', 'tna_child_styles');


add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
	if ( function_exists( 'add_theme_support' ) ) {
		add_image_size( 'custom-image', 612, 470, array('center','top') );
	}
}

//Adding the custom field for the  Additional boxes.
function additional_meta () {
	global $post;
	$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
	if ($pageTemplate == 'page-homepage-template.php') {
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
	wp_nonce_field(basename( __FILE__), 'additional_meta_nonce');
	$additional_stored_meta = get_post_meta ($post->ID); ?>
	<div class="wrap">
		<h4 style="color: #009999; font-size: 15px;">1st column section</h4>
		<div class="meta-row">
			<div class="meta-td">
				<input placeholder="Enter the title for the 1st column" class="widefat" type="text" name="left_column_title" id="left-column-title" value="<?php if ( ! empty ( $additional_stored_meta['left_column_title'] ) ) {
					echo esc_attr( $additional_stored_meta['left_column_title'][0] );
				} ?>"/>
			</div>
		</div>
		<div class="meta-row">
			<div class="meta-th" style="margin-top: 2em;">
				<span><strong>Add content for 1st column box</strong></span>
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
		<span><i><strong>Note:</strong> If 2nd column is empty the 1st column will be full width.</i></span>
		<h4 style="color: #009999; font-size: 15px;">2nd column section</h4>
		<div class="meta-row">
			<div class="meta-td">
				<input placeholder="Enter the title for the 2nd column" class="widefat" type="text" name="right_column_title" id="right-column-title" value="<?php if ( ! empty ( $additional_stored_meta['right_column_title'] ) ) {
					echo esc_attr( $additional_stored_meta['right_column_title'][0] );
				} ?>"/>
			</div>
		</div>
		<div class="meta-row">
			<div class="meta-th" style="margin-top: 2em;">
				<span><strong>Add content for 2nd column box</strong></span>
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
<?php }
function additional_meta_save ( $post_id ) {
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'additional_meta_nonce' ] ) && wp_verify_nonce( $_POST[ 'additional_meta_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}
	//Left column save and update
	if ( isset( $_POST[ 'left_column_title' ] ) ) {
		update_post_meta( $post_id, 'left_column_title', sanitize_text_field( $_POST[ 'left_column_title' ] ) );
	}
	if ( isset( $_POST[ 'left_content' ] ) ) {
		update_post_meta( $post_id, 'left_content', sanitize_text_field( $_POST[ 'left_content' ] ) );
	}
	//Right column save and update
	if ( isset( $_POST[ 'right_column_title' ] ) ) {
		update_post_meta( $post_id, 'right_column_title', sanitize_text_field( $_POST[ 'right_column_title' ] ) );
	}
	if ( isset( $_POST[ 'right_content' ] ) ) {
		update_post_meta( $post_id, 'right_content', sanitize_text_field( $_POST[ 'right_content' ] ) );
	}
}
add_action( 'save_post', 'additional_meta_save' );
//End //Adding the custom field for the  Additional boxes.


// Remove page templates inherited from the parent theme.
function remove_page_template( $page_templates ) {
	unset( $page_templates['page-section-landing.php'], $page_templates['page-level-1-landing.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'remove_page_template' );
//End // Remove page templates inherited from the parent theme.