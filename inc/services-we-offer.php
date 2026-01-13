<?php
/**
 * Services We Offer – Custom Post Type with Custom Link Metabox
 */

/*--------------------------------------------------------------
# 1. Register Custom Post Type
--------------------------------------------------------------*/
add_action('init', 'register_services_post_type');
function register_services_post_type() {

    $labels = array(
        'name'               => 'Services We Offer',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'edit_item'          => 'Edit Service',
        'new_item'           => 'New Service',
        'view_item'          => 'View Service',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found',
        'not_found_in_trash' => 'No services found in Trash',
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_icon'     => 'dashicons-hammer',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'services'),
        'show_in_rest'  => true, // Gutenberg support
    );

    register_post_type('services', $args);
}

/*--------------------------------------------------------------
# 2. Add Custom Link Metabox
--------------------------------------------------------------*/
add_action('add_meta_boxes', 'services_add_custom_link_metabox');
function services_add_custom_link_metabox() {

    add_meta_box(
        'services_custom_link',
        'Service Custom Link',
        'services_custom_link_callback',
        'services',
        'normal',
        'default'
    );
}

/*--------------------------------------------------------------
# 3. Metabox HTML Callback
--------------------------------------------------------------*/
function services_custom_link_callback($post) {

    wp_nonce_field('services_save_custom_link', 'services_custom_link_nonce');

    $custom_link = get_post_meta($post->ID, '_services_custom_link', true);
    ?>
    <p>
        <label for="services_custom_link">
            <strong>Service Link URL</strong>
        </label>
        <input
            type="url"
            id="services_custom_link"
            name="services_custom_link"
            value="<?php echo esc_attr($custom_link); ?>"
            style="width:100%;"
            placeholder="https://example.com"
        />
    </p>
    <?php
}

/*--------------------------------------------------------------
# 4. Save Metabox Data
--------------------------------------------------------------*/
add_action('save_post', 'services_save_custom_link');
function services_save_custom_link($post_id) {

    // Verify nonce
    if (!isset($_POST['services_custom_link_nonce'])) return;
    if (!wp_verify_nonce($_POST['services_custom_link_nonce'], 'services_save_custom_link')) return;

    // Prevent autosave overwrite
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Save data
    if (isset($_POST['services_custom_link'])) {
        update_post_meta(
            $post_id,
            '_services_custom_link',
            esc_url_raw($_POST['services_custom_link'])
        );
    }
}


/*
=== Display the code

$service_link = get_post_meta(get_the_ID(), '_services_custom_link', true);

if ($service_link) {
    echo '<a href="' . esc_url($service_link) . '" target="_blank">Learn More</a>';
}

*/ 