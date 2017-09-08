<?php
/**
 * Plugin Name: Clean Post Meta Fields
 * Plugin URI: https://github.com/devgeniem/wp-clean-post-meta-fields
 * Description: WordPress plugin that keeps your post meta clean from unneeded custom field data
 * Version: 1.0.0
 * Author:  Anttoni Lahtinen / Ville Siltala / Geniem Oy
 * Author URI: https://geniem.fi
 **/

namespace Geniem;

if ( class_exists( 'acf' ) ) {
    // Acf is activated add filter.
    add_filter( 'wp_insert_post_data', __NAMESPACE__ . '\\filter_handler', 1, 2 );
} else {
    // Acf is not activated, show warning.
    add_action( 'admin_notices', __NAMESPACE__ . '\\error_acf_not_activated' );
}

/**
 * Runs before post is saved into database.
 * If post template change is detected we get all fields stored for current post and
 * delete them from post meta.
 * After this the data from current template's fields is stored back there automatically.
 * Codex: https://developer.wordpress.org/reference/hooks/wp_insert_post_data/
 *
 * @param array $data An array of slashed post data.
 * @param array $postarr An array of sanitized, but otherwise unmodified post data.
 *
 * @return array $data Unmodified array of slashed post data.
 */
function filter_handler( $data, $postarr ) {

    // Check if ACF is activated and we have post with page template.
    if ( function_exists( 'get_fields' ) && array_key_exists( 'page_template', $postarr ) ) {
        $post_id           = $postarr['ID'];
        // Get old and new template.
        $old_page_template = get_post_meta( $post_id, '_wp_page_template', true );
        $new_page_template = $postarr['page_template'];

        // If template has changed.
        if ( $old_page_template !== $new_page_template ) {
            // Get existing fields.
            $post_fields = get_fields( $post_id );
            foreach ( $post_fields as $key => $field ) {
                delete_post_meta( $post_id, $key );
                delete_post_meta( $post_id, '_' . $key );
            }
        }
    }

    return $data;
}

/**
 * Print out warning that Advanced Custom Fields is not installed or activated.
 */
function error_acf_not_activated() {
    $class = 'notice notice-warning is-dismissible';
    $message =
        __( 'Advanced Custom Fields is not installed or activated. 
         Because of that, this plugin does absolutely nothing.',
        'wp-clean-post-meta-fields' );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}
