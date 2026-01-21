<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Connectifii
 */

get_header();
$theme_url= get_template_directory_uri(); 
?>

<article class="bg-white">

    <!-- ========================= HERO SECTION ========================= -->

    <?php
    $banner_image   = get_post_meta(get_the_ID(), '_blog_banner_image', true);
    $heading        = get_post_meta(get_the_ID(), '_blog_banner_heading', true);
    $heading_span        = get_post_meta(get_the_ID(), '_blog_banner_heading_span', true);
    $content        = get_post_meta(get_the_ID(), '_blog_banner_content', true);
    $primary_text   = get_post_meta(get_the_ID(), '_blog_primary_btn_text', true);
    $primary_url    = get_post_meta(get_the_ID(), '_blog_primary_btn_url', true);
    $secondary_text = get_post_meta(get_the_ID(), '_blog_secondary_btn_text', true);
    $secondary_url  = get_post_meta(get_the_ID(), '_blog_secondary_btn_url', true);
    ?>
    <!-- ========================= HERO SECTION ========================= -->
     <?php if ($banner_image || $heading || $heading_span || $content) : ?>
    <section
        class="relative mt-16 flex min-h-screen items-center bg-[url('<?php echo esc_url($banner_image); ?>')] bg-cover bg-center md:min-h-[70vh]" role="banner">
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 grid w-full grid-cols-1 gap-6 px-4 py-10 text-white sm:px-8 md:grid-cols-2 lg:px-24">
            <div class="flex flex-col justify-center gap-2">
            <?php if ($heading) : ?>
                <h1 class="text-3xl font-bold sm:text-4xl lg:text-5xl leading-snug"><?php echo esc_html($heading); ?>
                    <span class="text-blue-400"> <?php echo esc_html($heading_span); ?> </span>
                </h1>
            <?php endif; ?>

            <?php if ($content) : ?>
                <div class="bannerContent">
                    <?php echo wp_kses_post(wpautop($content)); ?>
                </div>
            <?php endif; ?>


            <div class="flex flex-col gap-4 md:flex-row mt-4">
                <?php if ($primary_text && $primary_url) : ?>
                    <a href="<?php echo esc_url($primary_url); ?>"
                       class="inline-flex items-center justify-center gap-2 rounded-lg border-2 border-white bg-white px-6 py-3 text-gray-800 hover:bg-opacity-90 transition">
                        <?php echo esc_html($primary_text); ?>
                    </a>
                <?php endif; ?>

                <?php if ($secondary_text && $secondary_url) : ?>
                    <a href="<?php echo esc_url($secondary_url); ?>"
                       class="inline-flex items-center justify-center gap-2 rounded-lg border-2 border-white px-6 py-3 text-white hover:bg-gray-100/20">
                        <?php echo esc_html($secondary_text); ?>
                    </a>
                <?php endif; ?>
            </div>            
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================= BLOG LAYOUT ========================= -->
    <div class="relative bg-lightbg min-h-screen">
        <section class="grid grid-cols-1 gap-6 px-4 py-10 md:grid-cols-[350px_1fr] xl:grid-cols-[350px_1fr_350px] lg:px-12 xl:px-24">

            <!-- ================= LEFT SIDEBAR ================= -->
            <aside class="order-2 md:order-1 md:sticky top-5 h-fit pr-3">

                <!-- Google Reviews Placeholder -->
                <section class="flex flex-col items-center justify-center py-10 px-4 bg-gray-50">

                    <!-- Google Logo & Rating -->
                    <div class="flex flex-col items-center text-center">
                        <img src="<?php echo $theme_url; ?>/assets/icons/google.svg" alt="Google Logo" class="h-10 w-10 mb-2" />
                        <h2 class="text-xl font-semibold">5.0</h2>
                        <p class="text-sm text-gray-600">(Based On Reviews)</p>

                        <div class="flex mt-1">
                            <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-5 w-5" />
                        </div>
                    </div>

                    <!-- Desktop Reviews -->
                    <div class="hidden md:block mt-6 w-full max-w-md">
                        <div class="h-[60vh] overflow-y-scroll pr-2 space-y-4">

                            <?php
                            $args = array( 'post_type'      => 'google_reviews', 'posts_per_page' => -1, );
                            $query = new WP_Query($args);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    $reviewer_name = get_post_meta(get_the_ID(), 'reviewer_name', true);
                                    $rating        = (int) get_post_meta(get_the_ID(), 'rating', true);
                                    ?>

                                    <!-- Review item -->
                                    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-4 flex flex-col gap-2">
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <h3 class="font-semibold text-sm"> <?php echo esc_html($reviewer_name); ?> </h3>

                                                <div class="flex items-center gap-1">
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rating) : ?>
                                                            <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                        <?php else : ?>
                                                            <p></p>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="text-xs lg:text-sm text-gray-700 leading-relaxed">
                                            <?php echo wp_kses_post(get_the_content()); ?>
                                        </p>

                                    </div>

                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>


                            <!-- Copy same block for more reviews OR ask me to auto-generate -->
                        </div>
                    </div>

                    <!-- Mobile Swiper -->
                    <div class="w-full mt-6 md:hidden">
                        <div class="swiper mySwiper w-full max-w-xl h-52">
                            <div class="swiper-wrapper">

                                <!-- Slide 1 -->
                                <div class="swiper-slide">
                                    <div class="bg-white shadow-md border border-gray-200 rounded-lg p-5 flex flex-col gap-3">
                                        <div class="flex items-center gap-3">
                                            <img src="<?php echo $theme_url; ?>/assets/images/user.png" class="h-12 w-12 rounded-full object-cover" />
                                            <div>
                                                <h3 class="font-semibold text-sm">Patrick Sarkis</h3>
                                                <div class="flex items-center gap-1">
                                                    <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="<?php echo $theme_url; ?>/assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <span class="text-xs text-gray-500 ml-1">(4 Weeks ago)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xs text-gray-700 leading-relaxed">
                                            Mical and the CONNECTIFII® team were able to create meaningful partnerships with industry leaders that made my project a success.
                                        </p>
                                    </div>
                                </div>

                                <!-- Add more slides here -->
                            </div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </section>


                <!-- Newsletter -->
                <div class="hidden bg-gray-700 mt-4 rounded p-5 text-center space-y-3">
                    <img src="<?php echo $theme_url; ?>/assets/icons/email.svg" class="mx-auto" />
                    <h2 class="text-lg font-semibold text-white">Get the Latest Updates First</h2>
                    <p class="text-sm text-white">Updates delivered to your inbox!</p>
                    <input
                        type="email"
                        placeholder="Enter your email address"
                        class="w-full rounded-md border-2 border-white bg-transparent px-4 py-2 text-white text-center" />
                    <button class="w-full border-2 border-white bg-white py-2 text-gray-700 rounded-md hover:bg-opacity-90">
                        Keep me notified
                    </button>
                </div>
            </aside>

            <!-- ================= MAIN CONTENT ================= -->
            <main class="order-1 md:order-2 px-2 space-y-6">

                <!-- Author Info -->
				<?php $author_id = get_post_field( 'post_author', get_the_ID() ); ?>
				
				<div class="flex items-center gap-2">
				
					<!-- Author Avatar -->
					<?php echo get_avatar(
						$author_id,
						48,
						'',
						'',
						[ 'class' => 'h-12 w-12 rounded-full object-cover' ]
					); ?>
				
					<div>
						<!-- Author Name -->
						<span class="text-lg font-semibold opacity-75">
							<?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?>
						</span>
				
						<?php
						$job_title = get_user_meta( $author_id, 'job_title', true );
						$location  = get_user_meta( $author_id, 'location', true );
						?>
				
						<?php if ( $job_title || $location ) : ?>
							<div class="flex items-center gap-2 text-xs opacity-75">
				
								<?php if ( $job_title ) : ?>
									<span><?php echo esc_html( $job_title ); ?></span>
								<?php endif; ?>
				
								<?php if ( $job_title && $location ) : ?>
									<span class="h-1 w-1 bg-black rounded-full"></span>
								<?php endif; ?>
				
								<?php if ( $location ) : ?>
									<span>
										<?php echo esc_html( $location ); ?>,
										Updated on <?php echo esc_html( get_the_modified_date( 'M d, Y' ) ); ?>
									</span>
								<?php endif; ?>
				
							</div>
						<?php endif; ?>
					</div>
				</div>
									
				<!-- Author Description -->
				<?php $author_desc = get_user_meta( $author_id, 'author_desc', true );
					if ( $author_desc ) : ?>
					<p class="border-b pb-2 text-xs opacity-60">
						<?php echo esc_html( $author_desc ); ?>
					</p>
				<?php endif; ?>


                <!-- Hero Image -->
                <div class="w-full h-80 overflow-hidden rounded-lg">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="h-full w-full object-cover" />
                </div>

                <!-- Article Sections -->
                <div class="space-y-6 single-blog-content">
					<?php the_content(); ?>
                </div>
            </main>

            <!-- ================= RIGHT SIDEBAR ================= -->
            <aside class="order-3 hidden xl:block sticky top-5 h-fit pl-3">
             
                <div class=" space-y-4 pl-3">
                <?php
                    $ceo_image     = get_theme_mod( 'ceo_image' );
                    $ceo_name      = get_theme_mod( 'ceo_name' );
                    $ceo_role      = get_theme_mod( 'ceo_role' );
                    $ceo_content   = get_theme_mod( 'ceo_content' );
                    $facebook_link = get_theme_mod( 'ceo_facebook_link' );
                    $linkedin_link = get_theme_mod( 'ceo_linkedin_link' );
                    $instagram_link= get_theme_mod( 'ceo_instagram_link' );
                ?>

                <div class="bg-white rounded-md shadow-sm p-4 flex flex-col items-center gap-4">
                    <?php if ( ! empty( $ceo_image ) ) : ?>
                        <div class="ceo-image">
                            <img src="<?php echo esc_url( $ceo_image ); ?>" alt="<?php echo esc_attr( $ceo_name ); ?>" class="w-40">
                        </div>
                    <?php endif; ?>    

                    <div class="text-center">

                        <?php if ( ! empty( $ceo_name ) ) : ?>
                            <h1 class="text-primaryBlue-500 text-sm">
                                <?php echo esc_html( $ceo_name ); ?>
                            </h1>
                        <?php endif; ?>        

                        <?php if ( ! empty( $ceo_role ) ) : ?>
                            <p class="text-primaryBlue-500 text-sm">
                                <?php echo esc_html( $ceo_role ); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ( ! empty( $ceo_content ) ) : ?>
                            <p class="text-xs font-light mt-2">
                                <?php echo wp_kses_post( $ceo_content ); ?>
                            </p>
                        <?php endif; ?>

                    </div>
                    
                    <?php if ( ! empty( $facebook_link ) || ! empty( $linkedin_link ) || ! empty( $instagram_link ) ) : ?>
                        <div class="flex gap-2" style=" align-items: center; ">

                            <?php if ( ! empty( $facebook_link ) ) : ?>
                                <a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank" rel="noopener">
                                    <img src="https://blog.connectifii.au/wp-content/themes/connectifii/assets/icons/fb.svg">
                                </a>
                            <?php endif; ?>

                            <?php if ( ! empty( $linkedin_link ) ) : ?>
                                <a href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank" rel="noopener">
                                    <img src="https://blog.connectifii.au/wp-content/themes/connectifii/assets/icons/linkedin.svg">
                                </a>
                            <?php endif; ?>

                            <?php if ( ! empty( $instagram_link ) ) : ?>
                                <a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank" rel="noopener">
                                    <img src="https://blog.connectifii.au/wp-content/themes/connectifii/assets/icons/insta.svg">
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                </div>  


                    <!-- Blog Sidebar Placeholder -->
                    <aside class="flex flex-col gap-6 w-full max-w-sm mx-auto">

                        <!-- Services Section -->
                        <div class="bg-white p-5 rounded-xl shadow-md">
                            <h3 class="font-semibold text-gray-800 mb-4">Services We Offer</h3>

                            <div class="space-y-3">

                            <?php
                            $args = array(
                                'posts_per_page' => 4,
                                'post_type'      => 'services',
                            );

                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    $service_link = get_post_meta(get_the_ID(), '_services_custom_link', true);
                                    ?>
                                    
                                    <div class="flex items-start gap-3">
                                        <img 
                                            src="<?php the_post_thumbnail_url(); ?>" 
                                            alt="<?php the_title_attribute(); ?>"
                                            class="w-16 h-16 rounded-md object-cover flex-shrink-0"
                                        />

                                        <div>
                                            <h4 class="text-sm font-semibold">
                                                <?php the_title(); ?>
                                            </h4>

                                            <div class="text-xs text-gray-600">
                                                <?php echo wp_trim_words(get_the_content(), 20); ?>
                                                <?php if ($service_link) : ?>
                                                    <a 
                                                        href="<?php echo esc_url($service_link); ?>" 
                                                        target="_blank"
                                                        class="text-blue-600 font-medium inline-block mt-1"
                                                    >
                                                        Learn More
                                                    </a>
                                                <?php endif; ?>                                                
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                endwhile;
                            else :
                                echo '<p>Sorry, no services found.</p>';
                            endif;

                            wp_reset_postdata();
                            ?>                         



                            </div>

                            <!-- Explore Button -->
                            <a href="https://connectifii.au/services" target="_blank">
                                <button class="w-full mt-5 bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium py-2 rounded-md">
                                    Explore All Services
                                </button>
                            </a>
                        </div>

                        <!-- Case Studies (Hidden like in React) -->
                        <div class="bg-white p-5 rounded-xl shadow-md border border-gray hidden">
                            <h3 class="font-semibold text-gray-800 mb-4">Case Studies</h3>

                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <img src="<?php echo $theme_url; ?>/assets/images/service1.webp" alt="Case Study 1"
                                        class="w-16 h-16 rounded-md object-cover flex-shrink-0">
                                    <div>
                                        <h4 class="text-sm font-semibold">How artificial intelligence transforming?</h4>
                                        <p class="text-xs text-gray-600">
                                            He is known for expert knowledge, attention to detail...
                                            <a href="#" class="text-blue-600 font-medium">Read More</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <img src="<?php echo $theme_url; ?>/assets/images/service2.webp" alt="Case Study 2"
                                        class="w-16 h-16 rounded-md object-cover flex-shrink-0">
                                    <div>
                                        <h4 class="text-sm font-semibold">How artificial intelligence transforming?</h4>
                                        <p class="text-xs text-gray-600">
                                            He is known for expert knowledge, attention to detail...
                                            <a href="#" class="text-blue-600 font-medium">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>

            </aside>

        </section>
    </div>

</article>


<script>
    new Swiper(".mySwiper", {
        spaceBetween: 20,
        slidesPerView: 1.2,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>



<?php
get_footer();
