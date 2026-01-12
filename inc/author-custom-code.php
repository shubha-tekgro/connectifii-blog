<?php
/**
 * ---------------------------------------------------------
 * AUTHOR META BOX: Profile Image, Bio, Social Links
 * ---------------------------------------------------------
 */

/**
 * Display custom fields on user profile
 */
function connectifii_author_meta_fields( $user ) {
    ?>
    <h2>Author Information</h2>

    <table class="form-table">

        <!-- Extra Profile Image -->
        <tr>
            <th><label for="extra_profile_image">Extra Profile Image</label></th>
            <td>
                <?php
                $image_id  = get_user_meta( $user->ID, 'extra_profile_image', true );
                $image_url = $image_id ? wp_get_attachment_url( $image_id ) : '';
                ?>

                <img id="extra-profile-image-preview"
                     src="<?php echo esc_url( $image_url ); ?>"
                     style="max-width:150px; display:block; margin-bottom:10px;" />

                <input type="hidden"
                       name="extra_profile_image"
                       id="extra_profile_image"
                       value="<?php echo esc_attr( $image_id ); ?>" />

                <button type="button" class="button" id="upload-extra-profile-image">
                    Upload Image
                </button>

                <p class="description">Upload an additional author profile image</p>
            </td>
        </tr>

        <!-- Job Title -->
        <tr>
            <th><label for="job_title">Job Title</label></th>
            <td>
                <input type="text"
                       name="job_title"
                       id="job_title"
                       class="regular-text"
                       value="<?php echo esc_attr( get_user_meta( $user->ID, 'job_title', true ) ); ?>" />
            </td>
        </tr>

        <!-- Location -->
        <tr>
            <th><label for="location">Location</label></th>
            <td>
                <input type="text"
                       name="location"
                       id="location"
                       class="regular-text"
                       value="<?php echo esc_attr( get_user_meta( $user->ID, 'location', true ) ); ?>" />
            </td>
        </tr>

        <!-- Author Description -->
        <tr>
            <th><label for="author_desc">Author Description</label></th>
            <td>
                <textarea name="author_desc"
                          id="author_desc"
                          rows="4"
                          class="large-text"><?php
                    echo esc_textarea( get_user_meta( $user->ID, 'author_desc', true ) );
                ?></textarea>
            </td>
        </tr>

        <!-- Author Words -->
        <tr>
            <th><label for="author_words">Author Words</label></th>
            <td>
                <textarea name="author_words"
                          id="author_words"
                          rows="4"
                          class="large-text"><?php
                    echo esc_textarea( get_user_meta( $user->ID, 'author_words', true ) );
                ?></textarea>
            </td>
        </tr>

        <!-- Facebook Link -->
        <tr>
            <th><label for="facebook_link">Facebook Link</label></th>
            <td>
                <input type="url"
                       name="facebook_link"
                       id="facebook_link"
                       class="regular-text"
                       value="<?php echo esc_url( get_user_meta( $user->ID, 'facebook_link', true ) ); ?>" />
            </td>
        </tr>

        <!-- LinkedIn Link -->
        <tr>
            <th><label for="linkedin_link">LinkedIn Link</label></th>
            <td>
                <input type="url"
                       name="linkedin_link"
                       id="linkedin_link"
                       class="regular-text"
                       value="<?php echo esc_url( get_user_meta( $user->ID, 'linkedin_link', true ) ); ?>" />
            </td>
        </tr>

        <!-- Instagram Link -->
        <tr>
            <th><label for="insta_link">Instagram Link</label></th>
            <td>
                <input type="url"
                       name="insta_link"
                       id="insta_link"
                       class="regular-text"
                       value="<?php echo esc_url( get_user_meta( $user->ID, 'insta_link', true ) ); ?>" />
            </td>
        </tr>

    </table>
    <?php
}
add_action( 'show_user_profile', 'connectifii_author_meta_fields' );
add_action( 'edit_user_profile', 'connectifii_author_meta_fields' );

/**
 * Save author meta fields
 */
function connectifii_save_author_meta_fields( $user_id ) {

    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return;
    }

    update_user_meta( $user_id, 'extra_profile_image', absint( $_POST['extra_profile_image'] ?? 0 ) );
    update_user_meta( $user_id, 'job_title', sanitize_text_field( $_POST['job_title'] ?? '' ) );
    update_user_meta( $user_id, 'location', sanitize_text_field( $_POST['location'] ?? '' ) );
    update_user_meta( $user_id, 'author_desc', sanitize_textarea_field( $_POST['author_desc'] ?? '' ) );
    update_user_meta( $user_id, 'author_words', sanitize_textarea_field( $_POST['author_words'] ?? '' ) );

    update_user_meta( $user_id, 'facebook_link', esc_url_raw( $_POST['facebook_link'] ?? '' ) );
    update_user_meta( $user_id, 'linkedin_link', esc_url_raw( $_POST['linkedin_link'] ?? '' ) );
    update_user_meta( $user_id, 'insta_link', esc_url_raw( $_POST['insta_link'] ?? '' ) );
}
add_action( 'personal_options_update', 'connectifii_save_author_meta_fields' );
add_action( 'edit_user_profile_update', 'connectifii_save_author_meta_fields' );

/**
 * Media uploader script (FIXED)
 */
function connectifii_user_profile_media_script( $hook ) {

    if ( ! in_array( $hook, [ 'profile.php', 'user-edit.php' ], true ) ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script( 'jquery' );

    wp_add_inline_script(
        'jquery',
        "
        jQuery(document).ready(function ($) {
            let mediaUploader;

            $('#upload-extra-profile-image').on('click', function (e) {
                e.preventDefault();

                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media({
                    title: 'Select Profile Image',
                    button: { text: 'Use this image' },
                    multiple: false
                });

                mediaUploader.on('select', function () {
                    const attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#extra_profile_image').val(attachment.id);
                    $('#extra-profile-image-preview').attr('src', attachment.url);
                });

                mediaUploader.open();
            });
        });
        "
    );
}
add_action( 'admin_enqueue_scripts', 'connectifii_user_profile_media_script' );
