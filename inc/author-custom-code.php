<?php

/**
 * ---------------------------------------------------------
 * AUTHOR META BOX: Job Title, Location, Author Description
 * ---------------------------------------------------------
 */

/**
 * Display custom fields on user profile
 */
function connectifii_author_meta_fields( $user ) {
    ?>
    <h2>Author Information</h2>

    <table class="form-table">

        <!-- Job Title -->
        <tr>
            <th><label for="job_title">Job Title</label></th>
            <td>
                <input type="text"
                       name="job_title"
                       id="job_title"
                       class="regular-text"
                       value="<?php echo esc_attr( get_user_meta( $user->ID, 'job_title', true ) ); ?>" />
                <p class="description">e.g. Director, Founder, Editor</p>
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
                <p class="description">e.g. Australia, New York</p>
            </td>
        </tr>

        <!-- Author Description -->
        <tr>
            <th><label for="author_desc">Author Description</label></th>
            <td>
                <textarea
                    name="author_desc"
                    id="author_desc"
                    rows="4"
                    class="large-text"
                ><?php echo esc_textarea( get_user_meta( $user->ID, 'author_desc', true ) ); ?></textarea>
                <p class="description">Short author bio shown on blog posts</p>
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

    update_user_meta(
        $user_id,
        'job_title',
        sanitize_text_field( $_POST['job_title'] ?? '' )
    );

    update_user_meta(
        $user_id,
        'location',
        sanitize_text_field( $_POST['location'] ?? '' )
    );

    update_user_meta(
        $user_id,
        'author_desc',
        sanitize_textarea_field( $_POST['author_desc'] ?? '' )
    );
}
add_action( 'personal_options_update', 'connectifii_save_author_meta_fields' );
add_action( 'edit_user_profile_update', 'connectifii_save_author_meta_fields' );
