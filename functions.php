<?php
/**
 * Connectifii functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Connectifii
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function connectifii_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Connectifii, use a find and replace
		* to change 'connectifii' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'connectifii', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'connectifii' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'connectifii_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'connectifii_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function connectifii_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'connectifii_content_width', 640 );
}
add_action( 'after_setup_theme', 'connectifii_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function connectifii_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'connectifii' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'connectifii' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'connectifii_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function connectifii_scripts() {
	wp_enqueue_style( 'connectifii-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'connectifii-style', get_stylesheet_uri() .'/asset/css/index.css', array(), _S_VERSION );

	wp_enqueue_script( 'connectifii-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'connectifii-navigation', get_template_directory_uri() . '/js/blog-banner-media.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'connectifii_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Author position and location
 */
require get_template_directory() . '/inc/author-custom-code.php';

/**
 * Blog Inner Metabox
 */
require get_template_directory() . '/inc/inner-blog-metabox.php';

/**
 * CPT Services We Offer
 */
require get_template_directory() . '/inc/services-we-offer.php';

/**
 * CPT Services We Offer
 */
require get_template_directory() . '/inc/blog-page-metabox.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function connectifii_enqueue_scripts() {
    wp_enqueue_script('connectifii-scripts', get_template_directory_uri() . '/script.js', [], '1.0', true);

    // Pass AJAX URL to JS
    wp_localize_script('connectifii-scripts', 'ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'connectifii_enqueue_scripts');



// Search load Ajax
// AJAX handler for blog search
function connectifii_blog_search() {
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    $args = [
        'post_type' => 'post',
        'posts_per_page' => 12,
        's' => $search,
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>
            
            <a href="<?php the_permalink(); ?>" class="block border border-border h-full max-w-[350px] overflow-hidden rounded bg-white p-4 hover:shadow-lg transition-all">
                <div class="h-[160px] w-full overflow-hidden rounded">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('medium', ['class' => 'h-full w-full object-cover blog-image', 'alt' => esc_attr(get_the_title())]);
                    } ?>
                </div>
                <div class="mt-2 flex w-full flex-col gap-2">
                    <div class="flex items-center justify-between text-xs opacity-75">
                        <p class="blog-date"><?php echo get_the_date(); ?></p>
                        <p class="blog-readTime">
                            <?php
                            $content = get_post_field('post_content', get_the_ID());
                            $word_count = str_word_count(wp_strip_all_tags($content));
                            $read_time = ceil($word_count / 200);
                            echo esc_html($read_time . ' min');
                            ?>
                        </p>
                    </div>
                    <div>
                        <div class="flex items-start justify-between gap-5">
                            <h2 class="text-base font-bold blog-title"><?php the_title(); ?></h2>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/linkArrow.svg" alt="Arrow Icon" class="w-6 h-6 object-cover" />
                        </div>
                        <p class="text-xs font-light blog-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    </div>
                    <div class="flex items-center gap-2">
                        <?php echo get_avatar(get_the_author_meta('ID'), 20, '', '', ['class' => 'h-5 w-5 rounded-full blog-authorImage']); ?>
                        <span class="text-xs opacity-75 blog-authorName"><?php the_author(); ?></span>
                    </div>
                    <?php $tags = get_the_tags(); if ($tags): ?>
                        <div class="flex flex-wrap gap-3 text-xs blog-tags">
                            <?php foreach ($tags as $tag): ?>
                                <span class="opacity-75"><?php echo esc_html($tag->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </a>

        <?php }
    } else {
        echo '<p>No posts found.</p>';
    }

    wp_die(); // end AJAX request
}
add_action('wp_ajax_blog_search', 'connectifii_blog_search');
add_action('wp_ajax_nopriv_blog_search', 'connectifii_blog_search');
