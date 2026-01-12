<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Connectifii
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    <!-- Inter Google Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    </style>

	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
        @theme {
        /* Colors */
        --color-primaryGray: #36454F;
        --color-primaryGray-100: #4A5A67;

        --color-primaryBlue: #111827;
        --color-primaryBlue-100: #1c2634;
        --color-primaryBlue-500: #1C5189;
        --color-primaryBlue-900: #152A45;

        --color-secondaryGray: #4C545F;
        --color-secondaryGray-100: rgba(76,84,95,0.2);

        --color-lightbg: #F6F9FF;
        --color-lightGray: #ebf2fe;
        --color-searchbg: #FFF6F6;
        --color-border: #CCCCCC;
        --color-blogTagBg: rgba(59, 130, 246, 0.2);
        --color-btnprimary: #36454F;

        /* Fonts */
        --font-sans: "Inter", ui-sans-serif, system-ui, sans-serif;

        /* Screens */
        --screen-sm: 640px;
        --screen-md: 768px;
        --screen-lg: 1024px;
        --screen-xl: 1280px;
        --screen-2xl: 1536px;
    }
    </style>    
</head>

<body class="relative">
	<?php $theme_url= get_template_directory_uri(); ?>

    <!-- Header -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm transition-transform duration-300">
        <div class="mx-auto flex items-center justify-between px-4 md:px-6 lg:px-12 xl:px-24 py-4">
            <!-- Logos -->
            <div class="flex items-center gap-4 shrink-0">
                <a href="https://connectifii.au" aria-label="Company Logo 1">
                    <img src="<?php echo $theme_url; ?>/assets/logo-icon.webp" alt="Company Logo 1" class="h-8 md:h-10 w-auto object-contain">
                </a>
                <a href="https://connectifii.au" aria-label="Company Logo 2">
                    <img src="<?php echo $theme_url; ?>/assets/logo.webp" alt="Company Logo 2" class="h-8 md:h-10 w-auto object-contain">
                </a>
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-6 xl:gap-12 text-sm md:text-base font-semibold text-primaryGray">
                <a href="https://connectifii.au/" class="inline-block pb-1 border-b-2 border-transparent hover:border-primaryGray hover:text-gray-900 transition-colors">Home</a>
                <a href="https://connectifii.au/about" class="inline-block pb-1 border-b-2 border-transparent hover:border-primaryGray hover:text-gray-900 transition-colors">About</a>
                <a href="https://connectifii.au/services" class="inline-block pb-1 border-b-2 border-transparent hover:border-primaryGray hover:text-gray-900 transition-colors">Services</a>
                <a href="https://connectifii.au/contact" target="_blank" class="inline-block pb-1 border-b-2 border-transparent hover:border-primaryGray hover:text-gray-900 transition-colors">Contact</a>
                <a href="https://blog.connectifii.au" class="inline-block pb-1 border-b-2 border-transparent hover:border-primaryGray hover:text-gray-900 transition-colors">Blog</a>
                <a href="https://connectifii.au/contact" target="_blank" class="ml-4 rounded-md bg-primaryGray px-6 py-2 mb-1 text-sm font-medium text-white hover:bg-primaryGray-100 transition-colors">Book a Consultation</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-btn" aria-label="Toggle menu" class="lg:hidden p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primaryGray">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primaryGray" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primaryGray hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Nav -->
        <nav id="mobile-nav" class="lg:hidden bg-white shadow-md hidden overflow-hidden">
            <ul class="flex flex-col items-center space-y-4 px-6 py-6 text-base font-semibold text-primaryGray">
                <li><a href="https://connectifii.au" class="block w-full text-center hover:text-gray-900 transition-colors">Home</a></li>
                <li><a href="https://connectifii.au/about" class="block w-full text-center hover:text-gray-900 transition-colors">About</a></li>
                <li><a href="https://connectifii.au/services" class="block w-full text-center hover:text-gray-900 transition-colors">Services</a></li>
                <li><a href="https://connectifii.au/contact" target="_blank" class="block w-full text-center hover:text-gray-900 transition-colors">Contact</a></li>
                <li><a href="https://blog.connectifii.au" class="block w-full text-center hover:text-gray-900 transition-colors">Blog</a></li>
                <li><a href="https://connectifii.au/contact" target="_blank" class="block rounded-md bg-primaryGray px-6 py-2 text-sm font-medium text-white hover:bg-primaryGray-100 w-[200px] mx-auto text-center">Book a Consultation</a></li>
            </ul>
        </nav>
    </header>

    <script>
        // Mobile menu toggle
        const mobileBtn = document.getElementById("mobile-btn");
        const mobileNav = document.getElementById("mobile-nav");
        const menuIcon = document.getElementById("menu-icon");
        const closeIcon = document.getElementById("close-icon");

        mobileBtn.addEventListener("click", () => {
            mobileNav.classList.toggle("hidden");
            menuIcon.classList.toggle("hidden");
            closeIcon.classList.toggle("hidden");
        });

        // Hide/show header on scroll
        let lastScrollY = window.scrollY;
        const header = document.getElementById("header");

        window.addEventListener("scroll", () => {
            const currentScrollY = window.scrollY;
            if (currentScrollY > lastScrollY && currentScrollY > 100) {
                header.style.transform = "translateY(-100%)";
            } else {
                header.style.transform = "translateY(0)";
            }
            lastScrollY = currentScrollY;
        });
    </script>

