<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Connectifii
 */
 $theme_url= get_template_directory_uri(); 
?>

<footer class="relative w-full px-6 py-10 text-neutral-50 sm:px-10 md:px-14 xl:px-20">

    <img src="<?php echo $theme_url; ?>/assets/images/footer-bg.svg" alt="" aria-hidden="true"
        class="absolute inset-0 -z-10 h-full w-full object-cover" />

    <div class="grid gap-12 lg:grid-cols-[auto_1fr]">

        <!-- Logo Section -->
        <div class="flex flex-col items-start">
            <img src="<?php echo $theme_url; ?>/assets/logo-icon-white.webp" alt="CONNECTIFII logo" class="w-24 object-contain lg:w-16" />
            <img src="<?php echo $theme_url; ?>/assets/logo-white.webp" alt="CONNECTIFII tagline" class="mt-6 w-64 object-contain lg:w-48" />
        </div>

        <!-- Footer Links -->
        <div class="grid gap-10 sm:grid-cols-2 md:grid-cols-3">

            <!-- New to CONNECTIFII -->
            <nav aria-label="New to CONNECTIFII®" class="text-left">
                <h3 class="mb-4 text-base font-semibold text-white">New to CONNECTIFII®?</h3>
                <ul class="space-y-2 text-sm leading-6">
                    <li><a href="#why-connectifii" class="hover:underline">Why CONNECTIFII®</a></li>
                    <li><a href="/services.php" class="hover:underline">Explore Our Services</a></li>
                </ul>
            </nav>

            <!-- About CONNECTIFII -->
            <nav aria-label="About CONNECTIFII®" class="text-left">
                <h3 class="mb-4 text-base font-semibold text-white">About CONNECTIFII®</h3>
                <ul class="space-y-2 text-sm leading-6">
                    <li><a href="/about.php#our-story" class="hover:underline">Our Story</a></li>
                    <li><a href="/contact.php" class="hover:underline">Join CONNECTIFII®</a></li>
                </ul>
            </nav>

            <!-- Contact Details -->
            <address class="not-italic text-left text-sm leading-6">
                <h3 class="mb-4 text-base font-semibold text-white">Contact Details</h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-2">
                        <img src="<?php echo $theme_url; ?>/assets/icons/phone.svg" class="w-5" alt="">
                        <a href="tel:+61490167928" class="hover:underline">+61 4 9016 7928</a>
                    </li>

                    <li class="flex items-center gap-2">
                        <img src="<?php echo $theme_url; ?>/assets/icons/mail.svg" class="w-5" alt="">
                        <a href="mailto:hello@connectifii.au" class="hover:underline">hello@connectifii.au</a>
                    </li>

                    <li class="flex items-start gap-2">
                        <img src="<?php echo $theme_url; ?>/assets/icons/address.svg" class="w-5 pt-1" alt="">
                        <a href="https://www.google.com/maps/place/Pyrmont+NSW+2009"
                            target="_blank" class="hover:underline">
                            PO Box 261 Pyrmont NSW 2009
                        </a>
                    </li>
                </ul>
            </address>

        </div>
    </div>

    <!-- Social + Copyright -->
    <div class="mt-10 flex flex-col items-start gap-6 border-t border-gray-600 pt-6 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex items-center gap-4">
            <a href="https://www.facebook.com/connectifii" target="_blank">
                <img src="<?php echo $theme_url; ?>/assets/icons/facebook.svg" class="w-6 sm:w-8" alt="facebook icon">
            </a>
            <a href="https://www.linkedin.com/company/connectifii-partnerships/" target="_blank">
                <img src="<?php echo $theme_url; ?>/assets/icons/linked.svg" class="w-6 sm:w-8" alt="linkedin icon">
            </a>
            <a href="https://www.instagram.com/connectifii/" target="_blank">
                <img src="<?php echo $theme_url; ?>/assets/icons/instagram.svg" class="w-6 sm:w-8" alt="instagram icon">
            </a>
        </div>

        <p class="text-left text-xs text-gray-400">
            © 2025 <span class="uppercase">CONNECTIFII® PTY LTD</span> |
            All rights reserved |
            <a href="/privacy-policy.php" class="hover:underline">Privacy Policy</a> |
            Terms of Service
        </p>

        <div class="flex items-center gap-3">
            <span class="text-sm font-semibold text-neutral-50 inline-block">Marketed By</span>
            <img src="<?php echo $theme_url; ?>/assets/tekgro.webp" class="w-[90px] object-contain" alt="Marketing partner logo">
        </div>
    </div>

    <!-- Aboriginal Statement -->
    <section class="mt-8 text-left text-xs text-gray-400">
        <div class="flex items-start gap-4">
            <img src="<?php echo $theme_url; ?>/assets/images/aboriginal-flag.webp" class="w-12 object-contain" alt="Aboriginal flag" />

            <p>
                <span class="uppercase">CONNECTIFII®</span> recognises the Aboriginal and Torres Strait Islander peoples
                as the Traditional Owners of the lands on which we work.
                We pay our respects to their Elders past and present.
            </p>
        </div>
    </section>

</footer>

<?php wp_footer(); ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll(".single-blog-content h2, .single-blog-content h3, .single-blog-content h4, .single-blog-content h5")
    .forEach(function(el) {
      el.classList.add("text-primaryBlue-500", "text-2xl", "font-semibold");
    });
  document.querySelectorAll(".single-blog-content p")
    .forEach(function(el) {
      el.classList.add("font-light", "text-justify");
    });
  document.querySelectorAll(".single-blog-content ul", ".single-blog-content ol")
    .forEach(function(el) {
      el.classList.add("list-decimal", "pl-5", "space-y-1", "text-sm", "font-light");
    });
});
</script>

</body>
</html>
