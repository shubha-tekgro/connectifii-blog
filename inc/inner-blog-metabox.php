<?php
/**
 * Blog Banner Metabox with Image Upload + WYSIWYG Editor
 */

/*--------------------------------------------------------------
# Add Metabox
--------------------------------------------------------------*/
function blog_banner_metabox() {
    add_meta_box(
        'blog_banner_metabox',
        'Blog Banner Settings',
        'blog_banner_metabox_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'blog_banner_metabox');


/*--------------------------------------------------------------
# Metabox Callback
--------------------------------------------------------------*/
function blog_banner_metabox_callback($post) {

    wp_nonce_field('blog_banner_nonce', 'blog_banner_nonce_field');

    $banner_image   = get_post_meta($post->ID, '_blog_banner_image', true);
    $heading        = get_post_meta($post->ID, '_blog_banner_heading', true);
    $heading_span    = get_post_meta($post->ID, '_blog_banner_heading_span', true);
    $content        = get_post_meta($post->ID, '_blog_banner_content', true);
    $primary_text   = get_post_meta($post->ID, '_blog_primary_btn_text', true);
    $primary_url    = get_post_meta($post->ID, '_blog_primary_btn_url', true);
    $secondary_text = get_post_meta($post->ID, '_blog_secondary_btn_text', true);
    $secondary_url  = get_post_meta($post->ID, '_blog_secondary_btn_url', true);
    ?>

    <p>
        <label><strong>Banner Content Heading</strong></label>
        <input type="text"
               name="blog_banner_heading"
               value="<?php echo esc_attr($heading); ?>"
               style="width:100%;">
    </p>

    <p>
        <label><strong>Banner Content Heading Span</strong></label>
        <input type="text"
            name="blog_banner_heading_span"
            value="<?php echo esc_attr($heading_span); ?>"
            style="width:100%;">
    </p>


    <p><strong>Banner Content</strong></p>

    <?php
    wp_editor(
        $content,
        'blog_banner_content_editor',
        [
            'textarea_name' => 'blog_banner_content',
            'media_buttons' => true,
            'textarea_rows' => 6,
            'teeny'         => false,
            'quicktags'     => true,
        ]
    );
    ?>

    <p>
        <label><strong>Primary Button</strong></label><br>
        <input type="text"
               name="blog_primary_btn_text"
               placeholder="Button Text"
               value="<?php echo esc_attr($primary_text); ?>"
               style="width:48%;">
        <input type="url"
               name="blog_primary_btn_url"
               placeholder="Button URL"
               value="<?php echo esc_url($primary_url); ?>"
               style="width:48%;float:right;">
    </p>

    <p>
        <label><strong>Secondary Button</strong></label><br>
        <input type="text"
               name="blog_secondary_btn_text"
               placeholder="Button Text"
               value="<?php echo esc_attr($secondary_text); ?>"
               style="width:48%;">
        <input type="url"
               name="blog_secondary_btn_url"
               placeholder="Button URL"
               value="<?php echo esc_url($secondary_url); ?>"
               style="width:48%;float:right;">
    </p>

    <p style="clear:both;">
        <label><strong>Upload Blog Banner Image</strong></label><br><br>

        <input type="hidden"
               name="blog_banner_image"
               id="blog_banner_image"
               value="<?php echo esc_attr($banner_image); ?>">

        <button type="button" class="button" id="blog_banner_upload">
            Upload Image
        </button>

        <button type="button" class="button" id="blog_banner_remove">
            Remove
        </button>

        <br><br>

        <img id="blog_banner_preview"
             src="<?php echo esc_url($banner_image); ?>"
             style="max-width:100%;<?php echo empty($banner_image) ? 'display:none;' : ''; ?>">
    </p>

    <?php
}


/*--------------------------------------------------------------
# Save Metabox Data
--------------------------------------------------------------*/
function save_blog_banner_metabox($post_id) {

    if (
        !isset($_POST['blog_banner_nonce_field']) ||
        !wp_verify_nonce($_POST['blog_banner_nonce_field'], 'blog_banner_nonce')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = [
        '_blog_banner_heading'     => 'blog_banner_heading',
        '_blog_banner_heading_span'     => 'blog_banner_heading_span',
        '_blog_banner_content'     => 'blog_banner_content',
        '_blog_banner_image'       => 'blog_banner_image',
        '_blog_primary_btn_text'   => 'blog_primary_btn_text',
        '_blog_primary_btn_url'    => 'blog_primary_btn_url',
        '_blog_secondary_btn_text' => 'blog_secondary_btn_text',
        '_blog_secondary_btn_url'  => 'blog_secondary_btn_url',
    ];

    foreach ($fields as $meta_key => $post_key) {

        if (!isset($_POST[$post_key])) continue;

        $value = $_POST[$post_key];

        if ($post_key === 'blog_banner_content') {
            $value = wp_kses_post($value);
        } elseif (strpos($post_key, '_url') !== false) {
            $value = esc_url_raw($value);
        } else {
            $value = sanitize_text_field($value);
        }

        update_post_meta($post_id, $meta_key, $value);
    }
}
add_action('save_post', 'save_blog_banner_metabox');


/*--------------------------------------------------------------
# Enqueue Media Uploader Script
--------------------------------------------------------------*/
function blog_banner_admin_scripts($hook) {

    if ($hook !== 'post.php' && $hook !== 'post-new.php') {
        return;
    }

    wp_enqueue_media();

    wp_enqueue_script(
        'blog-banner-media',
        get_template_directory_uri() . '/js/blog-banner-media.js',
        ['jquery'],
        null,
        true
    );
}
add_action('admin_enqueue_scripts', 'blog_banner_admin_scripts');
