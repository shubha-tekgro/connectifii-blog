<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Details</title>

</head>


<?php include 'header.php'; ?>

<body class="bg-white">

    <!-- ========================= HERO SECTION ========================= -->
    <section
        class="relative mt-16 flex min-h-screen items-center bg-[url('assets/images/blogheroimg.png')] bg-cover bg-center md:min-h-[70vh]"
        role="banner">
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 grid w-full grid-cols-1 gap-6 px-4 py-10 text-white sm:px-8 md:grid-cols-2 lg:px-24">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-3xl font-bold sm:text-4xl lg:text-5xl leading-snug">
                    How to Maximise <br />
                    <span class="text-blue-400">Rental Income from Your <br /> Investment Property</span>
                </h1>

                <p class="max-w-xl text-lg font-light sm:text-xl">
                    Explore expert tips, market insights, and actionable strategies...
                </p>

                <!-- Bullet Points -->
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2 text-sm font-light">
                        <img src="assets/icons/green-tick.svg" class="h-5 w-5" />
                        Fully Managed Service
                    </div>
                    <div class="flex items-center gap-2 text-sm font-light">
                        <img src="assets/icons/green-tick.svg" class="h-5 w-5" />
                        Strategic Tenant Selection
                    </div>
                    <div class="flex items-center gap-2 text-sm font-light">
                        <img src="assets/icons/green-tick.svg" class="h-5 w-5" />
                        Rental Yield Optimisation
                    </div>
                    <div class="flex items-center gap-2 text-sm font-light">
                        <img src="assets/icons/green-tick.svg" class="h-5 w-5" />
                        Preventive Maintenance Planning
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col gap-4 md:flex-row mt-4">
                    <a
                        href="tel:+61490167928"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border-2 border-white bg-white px-6 py-3 text-gray-800 hover:bg-opacity-90 transition">
                        Get a Free Property Assessment
                    </a>

                    <a
                        href="#articles"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border-2 border-white px-6 py-3 text-white hover:bg-gray-100/20">
                        Explore More Articles
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= BLOG LAYOUT ========================= -->
    <div class="relative bg-lightbg min-h-screen">
        <section class="grid grid-cols-1 gap-6 px-4 py-10 md:grid-cols-[350px_1fr] xl:grid-cols-[350px_1fr_350px] lg:px-12 xl:px-24">

            <!-- ================= LEFT SIDEBAR ================= -->
            <aside class="order-2 md:order-1 md:sticky top-5 h-fit pr-3">

                <!-- Google Reviews Placeholder -->
                <section class="flex flex-col items-center justify-center py-10 px-4 bg-gray-50">

                    <!-- Google Logo & Rating -->
                    <div class="flex flex-col items-center text-center">
                        <img src="assets/icons/google.svg" alt="Google Logo" class="h-10 w-10 mb-2" />
                        <h2 class="text-xl font-semibold">5.0</h2>
                        <p class="text-sm text-gray-600">(Based On 125 Reviews)</p>

                        <div class="flex mt-1">
                            <img src="assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="assets/icons/star-yellow.svg" class="h-5 w-5" />
                            <img src="assets/icons/star-yellow.svg" class="h-5 w-5" />
                        </div>
                    </div>

                    <!-- Desktop Reviews -->
                    <div class="hidden md:block mt-6 w-full max-w-md">
                        <div class="h-[60vh] overflow-y-scroll pr-2 space-y-4">

                            <!-- Review item 1 -->
                            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-4 flex flex-col gap-2">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <h3 class="font-semibold text-sm">Patrick Sarkis</h3>
                                        <div class="flex items-center gap-1">
                                            <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                            <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                            <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                            <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                            <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                            <span class="text-xs text-gray-500 ml-1">(4 Weeks ago)</span>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-xs lg:text-sm text-gray-700 leading-relaxed">
                                    Mical and the CONNECTIFII® team were able to create meaningful partnerships with industry leaders that made my project a success.
                                </p>
                            </div>

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
                                            <img src="assets/images/user.png" class="h-12 w-12 rounded-full object-cover" />
                                            <div>
                                                <h3 class="font-semibold text-sm">Patrick Sarkis</h3>
                                                <div class="flex items-center gap-1">
                                                    <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
                                                    <img src="assets/icons/star-yellow.svg" class="h-4 w-4" />
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
                    <img src="assets/icons/email.svg" class="mx-auto" />
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
                <div class="flex items-center gap-2">
                    <img src="assets/images/founder.webp" class="h-12 w-12 rounded-full object-cover" />
                    <div>
                        <span class="text-lg font-semibold opacity-75">Mical Hader</span>
                        <div class="flex items-center gap-2 text-xs opacity-75">
                            <span>Director</span>
                            <p class="h-1 w-1 bg-black rounded-full"></p>
                            <span>Australia, Updated on Nov 24, 2025</span>
                        </div>
                    </div>
                </div>

                <p class="border-b pb-2 text-xs opacity-60">
                    Mical’s career is a masterclass in strategic growth, operational excellence...
                </p>

                <!-- Hero Image -->
                <div class="w-full h-80 overflow-hidden rounded-lg">
                    <img src="assets/images/blogbg.png" class="h-full w-full object-cover" />
                </div>

                <!-- Article Sections -->
                <div class="space-y-6">

                    <div>
                        <h2 class="text-primaryBlue-500 text-2xl font-semibold">
                            Welcome to CONNECTIFII: Where Success Starts with Connections
                        </h2>
                        <p class="font-light text-justify">
                            today’s fast-paced world, success is built on strong
                            connections and that’s exactly why CONNECTIFII exists. We’re
                            here to bridge the gap between property, finance, and
                            strategic partnerships, creating opportunities that drive
                            growth and innovation.
                        </p>
                    </div>

                    <div>
                        <h2 class="text-primaryBlue-500 text-2xl font-semibold">Why Choose CONNECTIFII?</h2>
                        <p class="font-light text-justify">We’re not just another service provider. CONNECTIFII is a
                            boutique firm with over 20 years of expertise in Real Estate,
                            Finance, and Property Services. Our mission is simple: to
                            connect you with expert solutions that make a real impact.</p>

                        <ol class="list-decimal pl-5 space-y-1 text-sm font-light">
                            <li>Finance Services</li>
                            <li>Property Solutions</li>
                            <li>Access to Off-Market Sites</li>
                            <li>Hotel Partnerships</li>
                            <li>Flexible Head Lease Agreements</li>
                            <li>Insurance</li>
                            <li>Building Maintenance Services</li>
                            <li>Strategic Partnerships</li>
                        </ol>

                        <p class="font-light text-justify">Every service is designed to help you achieve more whether
                            you’re an investor, property owner, or business leader.</p>
                    </div>

                    <div>
                        <h2 class="text-primaryBlue-500 text-2xl font-semibold">
                            The Face Behind CONNECTIFII
                        </h2>
                        <p class="font-light text-justify">
                            At the heart of CONNECTIFII is Mical, a visionary entrepreneur
                            with a proven track record in finance and property innovation.
                            She began her career at Byblos Finance (now bf money), laying
                            a strong foundation in finance before co-founding Byblos
                            Realty as Director and Licensee in Charge. Her entrepreneurial
                            spirit led to the launch of Perfect Strata Maintenance, where
                            she scaled operations from 20 to over 150 buildings in just 12
                            months a remarkable achievement in the strata services space.
                        </p>
                        <p class="font-light text-justify">
                            Today, Mical leads CONNECTIFII, leveraging her extensive
                            industry network to deliver integrated, high-impact solutions
                            across property and finance sectors.
                        </p>
                        <p class="font-light text-justify">Ready to connect? Explore how CONNECTIFII can help you unlock
                            new opportunities. Contact us today</p>
                    </div>

                </div>
            </main>

            <!-- ================= RIGHT SIDEBAR ================= -->
            <aside class="order-3 hidden xl:block sticky top-5 h-fit pl-3">

                <div class=" space-y-4 pl-3">
                    <div class="bg-white rounded-md shadow-sm p-4 flex flex-col items-center gap-4">
                        <img src="assets/images/cc-logo.webp" class="w-40" />

                        <div class="text-center">
                            <h1 class="font-semibold">Mical Hader</h1>
                            <p class="text-primaryBlue-500 text-sm">Director</p>
                            <p class="text-xs font-light mt-2">
                                Mical’s career is a masterclass in strategic growth,
                                operational excellence, and industry innovation. She started
                                her journey at Byblos Finance (now bf money) — one of
                                Australia’s leading brokerage firms — where she built a
                                solid foundation in finance.
                            </p>
                        </div>

                        <!-- Social Icons -->
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com/connectifii">
                                <img src="assets/icons/fb.svg" />
                            </a>
                            <a href="https://www.linkedin.com/company/connectifii-partnerships/">
                                <img src="assets/icons/linkedin.svg" />
                            </a>
                            <a href="https://www.instagram.com/connectifii/">
                                <img src="assets/icons/insta.svg" />
                            </a>
                        </div>
                    </div>

                    <!-- Blog Sidebar Placeholder -->
                    <aside class="flex flex-col gap-6 w-full max-w-sm mx-auto">

                        <!-- Services Section -->
                        <div class="bg-white p-5 rounded-xl shadow-md">
                            <h3 class="font-semibold text-gray-800 mb-4">Services We Offer</h3>

                            <div class="space-y-3">

                                <!-- Service 1 -->
                                <div class="flex items-start gap-3">
                                    <img src="assets/images/service1.webp" alt="Finance"
                                        class="w-16 h-16 rounded-md object-cover flex-shrink-0" />
                                    <div>
                                        <h4 class="text-sm font-semibold">Finance</h4>
                                        <p class="text-xs text-gray-600">
                                            CONNECTIFII® is your finance pathway access to Australia's leading Tier 1 lending institutions
                                            and private family offices...
                                            <a href="/services/#finance" class="text-blue-600 font-medium">Learn More</a>
                                        </p>
                                    </div>
                                </div>

                                <!-- Service 2 -->
                                <div class="flex items-start gap-3">
                                    <img src="assets/images/service2.webp" alt="Access to Sites Off Market"
                                        class="w-16 h-16 rounded-md object-cover flex-shrink-0" />
                                    <div>
                                        <h4 class="text-sm font-semibold">Access to Sites Off Market</h4>
                                        <p class="text-xs text-gray-600">
                                            With CONNECTIFII®'s extensive network of lenders, developers, lead consultants...
                                            <a href="/services/#access-to-sites-off-market" class="text-blue-600 font-medium">Learn More</a>
                                        </p>
                                    </div>
                                </div>

                                <!-- Service 3 -->
                                <div class="flex items-start gap-3">
                                    <img src="assets/images/service3.webp" alt="Access to Development JV Partners"
                                        class="w-16 h-16 rounded-md object-cover flex-shrink-0" />
                                    <div>
                                        <h4 class="text-sm font-semibold">Access to Development JV Partners</h4>
                                        <p class="text-xs text-gray-600">
                                            CONNECTIFII® conducts end-to-end reviews of each project to determine viable structures...
                                            <a href="/services/#access-to-development-jv-partners"
                                                class="text-blue-600 font-medium">Learn More</a>
                                        </p>
                                    </div>
                                </div>

                                <!-- Service 4 -->
                                <div class="flex items-start gap-3">
                                    <img src="assets/images/service4.webp" alt="Hotel Partnerships"
                                        class="w-16 h-16 rounded-md object-cover flex-shrink-0" />
                                    <div>
                                        <h4 class="text-sm font-semibold">Hotel Partnerships</h4>
                                        <p class="text-xs text-gray-600">
                                            For many developers, converting residential apartments into short-term accommodation...
                                            <a href="/services/#hotel-partnerships" class="text-blue-600 font-medium">Learn More</a>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!-- Explore Button -->
                            <a href="/services">
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
                                    <img src="assets/images/service1.webp" alt="Case Study 1"
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
                                    <img src="assets/images/service2.webp" alt="Case Study 2"
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

</body>

<?php include 'footer.php'; ?>

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


</html>