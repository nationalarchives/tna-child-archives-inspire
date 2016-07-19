<?php

// For breadcrumbs and URLs
// Edit as required
function tnatheme_globals() {
    global $pre_path;
    global $pre_crumbs;
    // If internal TNA
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $pre_path = '';
        $pre_crumbs = array(
            'Archives inspire' => '/'
        );
    // If external TNA
    } else {
        $pre_crumbs = array(
            'About' => '/about/',
            'Our role' => '/about/our-role/',
            'Plans, policies, performance and projects' => '/about/our-role/plans-policies-performance-and-projects/',
            'Our plans' => '/about/our-role/plans-policies-performance-and-projects/our-plans/',
            'Site home title' => '/about/our-role/plans-policies-performance-and-projects/our-plans/archives-inspire/'
        );
        $pre_path = '/about/our-role/plans-policies-performance-and-projects/our-plans/archives-inspire/';
    }
}
// If web development machine
if ( $_SERVER['SERVER_ADDR'] !== $_SERVER['REMOTE_ADDR'] ) {
        tnatheme_globals();
    } else {
        $pre_path = '';
        $pre_crumbs = array(
            'Archives inspire' => '/'
        );
}

// Dequeue parent styles for re-enqueuing in the correct order
function dequeue_parent_style() {
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );

// Enqueue styles in correct order
function tna_child_styles() {
    wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
    wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/style.css', array(), '0.1', 'all' );
    wp_enqueue_style( 'tna-parent-styles' );
    wp_enqueue_style( 'tna-child-styles' );
}
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );

//Assign Category and Tags to WordPress Page
function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_taxonomies_to_pages' );


//Custom field for feature video
function video_metabox() {
    add_meta_box(
        'video_editor_metabox',
        __( 'Feature Video', 'video_editor' ),
        'video_metabox_callback',
        'page',
        'side',
        'low'
    );
}
add_action( 'add_meta_boxes', 'video_metabox', 0 );

function video_metabox_callback( $post ) {
        wp_nonce_field(basename(__FILE__), 'video_metabox_nonce');
        //$video_stored_meta = get_post_meta($post->ID);
        $content = get_post_meta( $post->ID, 'video_metabox', true );
        $editor = 'video_metabox';
        $settings = array(
            'textarea_rows' => 3,
            'media_buttons' => false,
            'teeny'         => false,
            'dfw'           => false,
            'tinymce'       => false,
            'quicktags'     => false
        );
        wp_editor( $content, $editor, $settings);
    ?>
    <div class="meta-row">
        <div class="meta-th">
            <p class="howto">
                Copy and paste the required video.
            </p>
        </div>
    </div>
<?php }

function video_metabox_save($post_id){
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'video_metabox_nonce' ] ) && wp_verify_nonce( $_POST[ 'video_metabox_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'video_metabox' ] ) ) {
        update_post_meta( $post_id, 'video_metabox', sanitize_text_field( $_POST[ 'video_metabox' ] ) );
    }
}
add_action( 'save_post', 'video_metabox_save' );


//Custom meta Feature box with call to action
add_action( 'add_meta_boxes', 'featbox_color' );
function featbox_color()
{
    add_meta_box( 'featurebox_color-id', 'Feature box with call to action', 'featurebox_color_cb', 'page', 'normal', 'high' );
}

function featurebox_color_cb( $post ){
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['my_featurebox_select'] ) ? esc_attr( $values['my_featurebox_select'][0] ) : '';
    wp_nonce_field( 'my_featbox_editor_nonce', 'featbox_editor_nonce' );
    //creating the editor box
    $content = get_post_meta( $post->ID, 'featurebox_editor', true );
    $editor = 'featurebox_editor';
    $settings = array(
        'textarea_rows' => 6,
        'media_buttons' => false,
        'teeny'         => false,
        'dfw'           => false,
        'quicktags'     => false
    );
    wp_editor( $content, $editor, $settings);
    ?>
    <br>
        <label for="my_featurebox_select"><strong>Select background color.</strong></label>
        <select name="my_featurebox_select" id="my_featurebox_select" class="widefat">
            <option value="mid-light-grey" <?php selected( $selected, 'mid-light-grey' ); ?>>Mid light grey</option>
            <option value="light-grey" <?php selected( $selected, 'light-grey' ); ?>>Light grey</option>
            <option value="lighter-grey" <?php selected( $selected, 'lighter-grey' ); ?>>Lighter grey</option>
            <option value="lightest-grey" <?php selected( $selected, 'lightest-grey' ); ?>>Lightest grey</option>
        </select>
    <?php
}

add_action( 'save_post', 'featbox_save' );
function featbox_save( $post_id ) {
    // Bail if doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    // Bail if nonce is not varified
    if( !isset( $_POST['featbox_editor_nonce'] ) || !wp_verify_nonce( $_POST['featbox_editor_nonce'], 'my_featbox_editor_nonce' ) ) return;

    // Saving the editor field
    if ( isset( $_POST[ 'featurebox_editor' ] ) ) {
        update_post_meta( $post_id, 'featurebox_editor', sanitize_text_field( $_POST[ 'featurebox_editor' ] ) );
    }
    //Saving the select field
    if( isset( $_POST['my_featurebox_select'] ) ) {
        update_post_meta($post_id, 'my_featurebox_select', esc_attr($_POST['my_featurebox_select']));
    }
}
