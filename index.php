<?php
/**
 * The main template file
 *
 * Used to display the home page with blog posts
 *
 * @package Connectifii
 */

get_header();
$theme_url = get_template_directory_uri();
?>

<article class="bg-white">

<?php
// Fetch metabox values from home page (optional)
$bg_image        = get_post_meta(get_the_ID(), 'blog_page_bg_image', true);
$heading         = get_post_meta(get_the_ID(), 'blog_page_banner_heading', true);
$span_heading    = get_post_meta(get_the_ID(), 'blog_page_banner_span_heading', true);
$description     = get_post_meta(get_the_ID(), 'blog_page_banner_description', true);

$primary_text    = get_post_meta(get_the_ID(), 'blog_page_primary_btn_text', true);
$primary_url     = get_post_meta(get_the_ID(), 'blog_page_primary_btn_url', true);

$secondary_text  = get_post_meta(get_the_ID(), 'blog_page_secondary_btn_text', true);
$secondary_url   = get_post_meta(get_the_ID(), 'blog_page_secondary_btn_url', true);

// Fallbacks
$bg_image      = $bg_image ?: get_template_directory_uri() . '/assets/images/blogheroimg.png';
$heading       = $heading ?: 'The Complete Guide to';
$span_heading  = $span_heading ?: 'Property Management';
$description   = $description ?: 'Connect with the expertise and services you need for success';
$primary_text  = $primary_text ?: 'Book a Discovery Call';
$primary_url   = $primary_url ?: 'tel:+61490167928';
$secondary_text = $secondary_text ?: 'Explore All Services';
$secondary_url  = $secondary_url ?: 'https://connectifii.au/services';
?>

<!-- HERO SECTION -->
<section
    class="relative mt-16 flex min-h-screen items-center bg-cover bg-center md:min-h-[70vh]"
    style="background-image: url('<?php echo esc_url($bg_image); ?>');"
    role="banner">
    
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 grid w-full grid-cols-1 gap-6 px-4 py-10 text-white sm:px-8 md:grid-cols-2 lg:px-24">
        <div class="flex flex-col justify-center gap-3">
            <h1 class="text-3xl font-bold sm:text-4xl lg:text-5xl">
                <?php echo esc_html($heading); ?> <br>
                <span class="text-[#60A5FA]"><?php echo esc_html($span_heading); ?></span>
            </h1>

            <div class="flex flex-col gap-5">
                <p class="max-w-sm text-lg font-light sm:text-xl">
                    <?php echo esc_html($description); ?>
                </p>

                <!-- SEARCH BAR -->
                <div class="bg-searchbg flex max-w-sm items-center overflow-hidden rounded-[4px] bg-[#F2F2F2]">
                    <input
                        type="text"
                        id="blogSearch"
                        placeholder="Search..."
                        class="w-full border-none bg-transparent px-4 py-2 text-black focus:outline-none" />
                    <button id="searchBtn" class="mr-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/searchicon.svg" alt="Search" class="h-5 w-5" />
                    </button>
                </div>


                <div class="flex flex-col gap-5 md:flex-row">
                    <a
                        href="<?php echo esc_url($primary_url); ?>"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg border-2 border-white bg-white px-6 py-3 text-primaryGray transition hover:bg-opacity-90 sm:w-auto sm:justify-start">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/phone-dark.svg" class="h-4 w-4" />
                        <span class="text-md font-medium"><?php echo esc_html($primary_text); ?></span>
                    </a>

                    <a
                        href="<?php echo esc_url($secondary_url); ?>"
                        target="_blank"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg border-2 border-white px-6 py-3 text-white transition hover:bg-primaryGray-100 sm:w-auto sm:justify-start">
                        <span class="text-md font-medium"><?php echo esc_html($secondary_text); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BLOG GRID SECTION -->
<section class="bg-lightbg bg-[#F5F7FA]">
    <div class="flex flex-col items-center justify-center gap-1 py-12 text-center">
        <h2 class="text-2xl font-bold text-[#1C5189] lg:text-3xl">
            Browse Our Resource Hub
        </h2>
        <p class="text-sm leading-relaxed opacity-75 lg:text-base">
            Find everything you need to know from sourcing capital to managing property assets.
        </p>
    </div>

    <div id="blogGrid" class="grid w-full grid-cols-1 place-items-center gap-5 px-4 pb-5 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:px-8 xl:px-20">
        <?php
        // Custom query to show posts if using a static page as home
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $blog_query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 12,
            'paged' => $paged
        ]);

        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
                <a href="<?php the_permalink(); ?>" class="block border border-border h-full max-w-[350px] overflow-hidden rounded bg-white p-4 hover:shadow-lg transition-all">

                    <!-- Featured Image -->
                    <div class="h-[160px] w-full overflow-hidden rounded">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(
                                'medium',
                                [
                                    'class' => 'h-full w-full object-cover blog-image',
                                    'alt'   => esc_attr(get_the_title())
                                ]
                            ); ?>
                        <?php endif; ?>
                    </div>

                    <div class="mt-2 flex w-full flex-col gap-2">
                        <!-- Date & Read Time -->
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

                        <!-- Title & Excerpt -->
                        <div>
                            <div class="flex items-start justify-between gap-5">
                                <h2 class="text-base font-bold blog-title"><?php the_title(); ?></h2>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/linkArrow.svg" alt="Arrow Icon" class="w-6 h-6 object-cover" />
                            </div>
                            <p class="text-xs font-light blog-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </div>

                        <!-- Author -->
                        <div class="flex items-center gap-2">
                            <?php echo get_avatar(get_the_author_meta('ID'), 20, '', '', ['class' => 'h-5 w-5 rounded-full blog-authorImage']); ?>
                            <span class="text-xs opacity-75 blog-authorName"><?php the_author(); ?></span>
                        </div>

                        <!-- Tags -->
                        <?php $tags = get_the_tags(); ?>
                        <?php if ($tags) : ?>
                            <div class="flex flex-wrap gap-3 text-xs blog-tags">
                                <?php foreach ($tags as $tag) : ?>
                                    <span class="opacity-75"><?php echo esc_html($tag->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
        <?php
            endwhile;

            // Pagination
            echo '<div class="mt-8">';
            echo paginate_links([
                'total' => $blog_query->max_num_pages,
            ]);
            echo '</div>';

        else :
            echo '<p>No posts found.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
</article>

<?php get_footer(); ?>
