<?php
/**
 * Blog Page Banner Metabox (with Image Preview + Description)
 */

/*--------------------------------------------------
 Add Metabox
--------------------------------------------------*/
function blog_page_banner_metabox() {
    add_meta_box(
        'blog_page_banner_meta',
        'Blog Page Banner Settings',
        'blog_page_banner_meta_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'blog_page_banner_metabox');


/*--------------------------------------------------
 Metabox Callback
--------------------------------------------------*/
function blog_page_banner_meta_callback($post) {

    wp_nonce_field('blog_page_banner_meta_nonce', 'blog_page_banner_meta_nonce');

    $bg_image      = get_post_meta($post->ID, 'blog_page_bg_image', true);
    $heading       = get_post_meta($post->ID, 'blog_page_banner_heading', true);
    $span_heading  = get_post_meta($post->ID, 'blog_page_banner_span_heading', true);
    $description   = get_post_meta($post->ID, 'blog_page_banner_description', true);

    $primary_text   = get_post_meta($post->ID, 'blog_page_primary_btn_text', true);
    $primary_url    = get_post_meta($post->ID, 'blog_page_primary_btn_url', true);
    $secondary_text = get_post_meta($post->ID, 'blog_page_secondary_btn_text', true);
    $secondary_url  = get_post_meta($post->ID, 'blog_page_secondary_btn_url', true);
    ?>

    <!-- Background Image -->
    <p>
        <label><strong>Background Image</strong></label><br>
        <input type="text"
               name="blog_page_bg_image"
               id="blog-page-bg-image"
               value="<?php echo esc_attr($bg_image); ?>"
               style="width:70%;">
        <button type="button" class="button blog-page-bg-upload">Upload</button>
    </p>

    <!-- Image Preview -->
    <div style="margin-bottom:15px;">
        <img id="blog-page-bg-preview"
             src="<?php echo esc_url($bg_image); ?>"
             style="max-width:100%; height:auto; <?php echo empty($bg_image) ? 'display:none;' : ''; ?>">
    </div>

    <p>
        <label><strong>Banner Heading</strong></label><br>
        <input type="text" name="blog_page_banner_heading" value="<?php echo esc_attr($heading); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Banner Span Heading</strong></label><br>
        <input type="text" name="blog_page_banner_span_heading" value="<?php echo esc_attr($span_heading); ?>" style="width:100%;">
    </p>

    <!-- NEW DESCRIPTION FIELD -->
    <p>
        <label><strong>Banner Description</strong></label><br>
        <textarea name="blog_page_banner_description"
                  rows="4"
                  style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <hr>

    <p>
        <label><strong>Primary Button Text</strong></label><br>
        <input type="text" name="blog_page_primary_btn_text" value="<?php echo esc_attr($primary_text); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Primary Button URL</strong></label><br>
        <input type="url" name="blog_page_primary_btn_url" value="<?php echo esc_url($primary_url); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Secondary Button Text</strong></label><br>
        <input type="text" name="blog_page_secondary_btn_text" value="<?php echo esc_attr($secondary_text); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Secondary Button URL</strong></label><br>
        <input type="url" name="blog_page_secondary_btn_url" value="<?php echo esc_url($secondary_url); ?>" style="width:100%;">
    </p>

    <?php
}


/*--------------------------------------------------
 Save Metabox Data
--------------------------------------------------*/
function save_blog_page_banner_meta($post_id) {

    if (!isset($_POST['blog_page_banner_meta_nonce'])) return;
    if (!wp_verify_nonce($_POST['blog_page_banner_meta_nonce'], 'blog_page_banner_meta_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $fields = [
        'blog_page_bg_image',
        'blog_page_banner_heading',
        'blog_page_banner_span_heading',
        'blog_page_banner_description',
        'blog_page_primary_btn_text',
        'blog_page_primary_btn_url',
        'blog_page_secondary_btn_text',
        'blog_page_secondary_btn_url'
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_blog_page_banner_meta');


/*--------------------------------------------------
 Admin Scripts (Media + Preview)
--------------------------------------------------*/
function blog_page_banner_admin_scripts($hook) {

    if ($hook !== 'post.php' && $hook !== 'post-new.php') {
        return;
    }

    wp_enqueue_media();

    wp_add_inline_script('jquery', "
        jQuery(document).ready(function($){

            $('.blog-page-bg-upload').on('click', function(e){
                e.preventDefault();

                var frame = wp.media({
                    title: 'Select Background Image',
                    button: { text: 'Use this image' },
                    multiple: false
                });

                frame.on('select', function(){
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#blog-page-bg-image').val(attachment.url);
                    $('#blog-page-bg-preview').attr('src', attachment.url).show();
                });

                frame.open();
            });

        });
    ");
}
add_action('admin_enqueue_scripts', 'blog_page_banner_admin_scripts');
