<?php get_header(); ?>

<?php while (have_posts()):
    the_post(); ?>
    <?php
    // Get product meta data
    $price = get_post_meta(get_the_ID(), '_product_price', true);
    $factory_name = get_post_meta(get_the_ID(), '_factory_name', true);
    $gallery_images = get_post_meta(get_the_ID(), '_product_gallery', true);
    $gallery_images = $gallery_images ? $gallery_images : array();
    $technical_details = get_post_meta(get_the_ID(), '_product_technical_details', true);
    $technical_details = $technical_details ? $technical_details : array();
    $product_variations = get_post_meta(get_the_ID(), '_product_variations', true);
    $product_variations = $product_variations ? $product_variations : array();
    $shipping_methods = get_post_meta(get_the_ID(), '_product_shipping_methods', true);
    $shipping_methods = $shipping_methods ? $shipping_methods : array();
    $quantity_options = get_post_meta(get_the_ID(), '_product_quantity_options', true);
    $quantity_options = $quantity_options ? $quantity_options : array();

    // Define shipping method names for display
    $shipping_method_names = array(
        'express' => 'شحن سريع (1-2 أيام)',
        'standard' => 'شحن عادي (3-5 أيام)',
        'economy' => 'شحن اقتصادي (5-7 أيام)',
        'pickup' => 'استلام من المعرض',
        'sea_freight' => 'شحن بحري (15-30 يوم)',
        'air_freight' => 'شحن جوي (3-7 أيام)',
        'custom' => 'طريقة شحن مخصصة'
    );

    // Define quantity option names for display
    $quantity_option_names = array(
        '1' => 'قطعة واحدة',
        '1-5' => '1-5 قطع',
        '10-50' => '10-50 قطعة',
        '100-500' => '100-500 قطعة',
        '1000+' => '1000+ قطعة',
        'custom' => 'كمية مخصصة'
    );

    // Generate consistent random supplier metrics for this product
    function generateSupplierMetrics($product_id)
    {
        // Use product ID as seed for consistent randomization
        mt_srand($product_id);

        $metrics = array(
            'delivery_rate' => mt_rand(840, 970) / 10, // 84.0% to 97.0%
            'total_sales' => mt_rand(50000, 500000), // $50,000 to $500,000
            'response_hours' => mt_rand(1, 6), // 1 to 6 hours
            'rating' => mt_rand(43, 50) / 10 // 4.3 to 5.0
        );

        // Reset random seed
        mt_srand();

        return $metrics;
    }

    $supplier_metrics = generateSupplierMetrics(get_the_ID());



    // Get featured image
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
    ?>

    <div class="bg-white pt-6 min-h-screen single-product-page"
        style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI3MzIiIGhlaWdodD0iMTM1OCIgdmlld0JveD0iMCAwIDczMiAxMzU4IiBmaWxsPSJub25lIj4KICA8ZyBmaWx0ZXI9InVybCgjZmlsdGVyMF9mXzE0MzNfMzE1OSkiPgogICAgPHBhdGggZD0iTTMxOS41OTIgNjg5LjQ2N0MzMTMuNzAzIDY5Mi4zNzkgMzA1Ljk5OCA2OTQuODY4IDI5Ni45NzkgNjk2LjE0NEwtNTQ2LjYzNiA5NDUuMjU1TC02NDguNDQgNjk2LjkwMUMtNjA5LjA5NyA2NTEuNTQ3IC01MTIuMDY2IDU3Mi41Mi00MzguNjc4IDYxOS4yNEMtMzQ2Ljk0MiA2NzcuNjQgLTIyMC44NDUgNTUxLjA2OSAtOTYuMjUxMSA0NDcuMzU3QzI4LjM0MjcgMzQzLjY0NSA5MS40MjMxIDQ5MC43NzEgMTYyLjU5NCA2MTEuMzM3QzIwNy44MTEgNjg3LjkzNSAyNjIuMTgxIDcwMS4wNjggMjk2Ljk3OSA2OTYuMTQ0TDMxOS41OTIgNjg5LjQ2N1oiIGZpbGw9IiM5M0IzRTIiLz4KICA8L2c+CiAgPGRlZnM+CiAgICA8ZmlsdGVyIGlkPSJmaWx0ZXIwX2ZfMTQzM18zMTU5IiB4PSItMTA2MC4yNCIgeT0iMC4zOTI1MTciIHdpZHRoPSIxNzkxLjYzIiBoZWlnaHQ9IjEzNTYuNjYiIGZpbHRlclVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY29sb3ItaW50ZXJwb2xhdGlvbi1maWx0ZXJzPSJzUkdCIj4KICAgICAgPGZlRmxvb2QgZmxvb2Qtb3BhY2l0eT0iMCIgcmVzdWx0PSJCYWNrZ3JvdW5kSW1hZ2VGaXgiLz4KICAgICAgPGZlQmxlbmQgbW9kZT0ibm9ybWFsIiBpbj0iU291cmNlR3JhcGhpYyIgaW4yPSJCYWNrZ3JvdW5kSW1hZ2VGaXgiIHJlc3VsdD0ic2hhcGUiLz4KICAgICAgPGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iMjA1LjkiIHJlc3VsdD0iZWZmZWN0MV9mb3JlZ3JvdW5kQmx1cl8xNDMzXzMxNTkiLz4KICAgIDwvZmlsdGVyPgogIDwvZGVmcz4KPC9zdmc+'), url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NjAiIGhlaWdodD0iODkwIiB2aWV3Qm94PSIwIDAgNTYwIDg5MCIgZmlsbD0ibm9uZSI+CiAgPGcgZmlsdGVyPSJ1cmwoI2ZpbHRlcjBfZl8xNDMzXzMxNTgpIj4KICAgIDxwYXRoIGQ9Ik0xMzgwLjU5IDIyMS40NjdDMTM3NC43IDIyNC4zNzkgMTM2NyAyMjYuODY4IDEzNTcuOTggMjI4LjE0NEw1MTQuMzY2IDQ3Ny4yNTVMNDEyLjU2MiAyMjguOTAxQzQ1MS45MDUgMTgzLjU0NyA1NDguOTM2IDEwNC41MiA2MjIuMzI0IDE1MS4yNEM3MTQuMDYgMjA5LjY0IDg0MC4xNTcgODMuMDY5MyA5NjQuNzUxIC0yMC42NDI4QzEwODkuMzQgLTEyNC4zNTUgMTE1Mi40MyAyMi43NzExIDEyMjMuNiAxNDMuMzM3QzEyNjguODEgMjE5LjkzNSAxMzIzLjE4IDIzMy4wNjggMTM1Ny45OCAyMjguMTQ0TDEzODAuNTkgMjIxLjQ2N1oiIGZpbGw9IiM5M0IzRTIiLz4KICA8L2c+CiAgPGRlZnM+CiAgICA8ZmlsdGVyIGlkPSJmaWx0ZXIwX2ZfMTQzM18zMTU4IiB4PSIwLjc2MjUxMiIgeT0iLTQ2Ny42MDciIHdpZHRoPSIxNzkxLjYzIiBoZWlnaHQ9IjEzNTYuNjYiIGZpbHRlclVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY29sb3ItaW50ZXJwb2xhdGlvbi1maWx0ZXJzPSJzUkdCIj4KICAgICAgPGZlRmxvb2QgZmxvb2Qtb3BhY2l0eT0iMCIgcmVzdWx0PSJCYWNrZ3JvdW5kSW1hZ2VGaXgiLz4KICAgICAgPGZlQmxlbmQgbW9kZT0ibm9ybWFsIiBpbj0iU291cmNlR3JhcGhpYyIgaW4yPSJCYWNrZ3JvdW5kSW1hZ2VGaXgiIHJlc3VsdD0ic2hhcGUiLz4KICAgICAgPGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iMjA1LjkiIHJlc3VsdD0iZWZmZWN0MV9mb3JlZ3JvdW5kQmx1cl8xNDMzXzMxNTgiLz4KICAgIDwvZmlsdGVyPgogIDwvZGVmcz4KPC9zdmc+'); background-repeat: no-repeat, no-repeat; background-position: left 30%, top right; background-size: 400px auto, 300px auto;">
        <div class="max-w-7xl mx-auto px-4 pt-8  flex flex-col gap-4">
            <div class=" gap-6 flex flex-col-reverse md:flex-row">



                <div class="md:w-1/2 justify-center flex flex-col md:gap-6 gap-4">
                    <!-- Supplier Badge -->
                    <?php if ($factory_name): ?>
                        <div
                            class="hidden md:flex md:flex-row md:gap-0 gap-2 flex-col-reverse items-center justify-between w-full font-roboto ">
                            <div class="flex flex-row items-center justify-center gap-1">
                                <span class="text-xs font-medium">CN</span>


                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 13.5C18 14.0304 17.7893 14.5391 17.4142 14.9142C17.0391 15.2893 16.5304 15.5 16 15.5H2C1.46957 15.5 0.960859 15.2893 0.585786 14.9142C0.210714 14.5391 0 14.0304 0 13.5V4.5C0 3.96957 0.210714 3.46086 0.585786 3.08579C0.960859 2.71071 1.46957 2.5 2 2.5H16C16.5304 2.5 17.0391 2.71071 17.4142 3.08579C17.7893 3.46086 18 3.96957 18 4.5V13.5Z"
                                        fill="#DE2910" />
                                    <path
                                        d="M5.56855 4.4885L5.93655 4.6665L6.23105 4.3835L6.17555 4.7885L6.53555 4.9815L6.13355 5.0535L6.06155 5.4555L5.86855 5.0955L5.46355 5.151L5.74655 4.8565L5.56855 4.4885ZM7.90105 5.959L7.72305 6.3265L8.00605 6.6215L7.60155 6.5655L7.40855 6.926L7.33655 6.5235L6.93405 6.4515L7.29455 6.2585L7.23855 5.854L7.53355 6.137L7.90105 5.959ZM7.42255 7.8485L7.55655 8.2345L7.96505 8.243L7.63955 8.4895L7.75805 8.881L7.42255 8.6475L7.08705 8.881L7.20505 8.4895L6.87955 8.243L7.28805 8.2345L7.42255 7.8485ZM5.56855 9.4885L5.93655 9.6665L6.23105 9.3835L6.17555 9.7885L6.53555 9.9815L6.13355 10.0535L6.06155 10.4555L5.86855 10.0955L5.46355 10.151L5.74655 9.8565L5.56855 9.4885ZM3.50055 5.4755L3.96505 6.811L5.37805 6.84L4.25155 7.694L4.66105 9.047L3.50055 8.2395L2.34005 9.047L2.74955 7.694L1.62305 6.84L3.03605 6.811L3.50055 5.4755Z"
                                        fill="#FFDE02" />
                                </svg>
                            </div>
                            <span class="text-xs font-normal">Multispecialty supplier -- 7 yrs</span>
                            <div class="flex  gap-1">
                                <span
                                    class="md:text-sm text-xs font-medium items-center flex justify-center text-center"><?php echo esc_html($factory_name); ?></span>

                                <i class="items-center  fa-solid fa-industry text-[16px] text-[#3773C9]"></i>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Product Title -->
                    <h1 class="text-xl md:text-[30px] font-bold text-[#132846] md:leading-[60px] leading-9">
                        <?php the_title(); ?>
                    </h1>


                    <!-- Product Price -->
                    <h3 class="md:text-3xl text-lg font-bold text-[#3773C9]">
                        $ <?php echo esc_html($price); ?>
                    </h3>

                    <div class="flex flex-row items-center gap-2">

                        <img class="w-6 h-6"
                            src="<?php echo home_url(); ?>/wp-content/uploads/2025/07/1142117-Photoroom-1-1.png" alt="">

                        <span class="text-lg text-[#19345A] font-medium">
                            مطابق لسابر
                        </span>

                    </div>

                    <!-- Rating and Reviews -->
                    <div class="flex md:flex-row flex-col-reverse md:items-center items-start md:gap-8 gap-4  text-sm">
                        <span class="font-semibold text-sm text-[#545454] " style="direction: ltr;"> <span
                                class="text-[#3E9242]">93% </span>of buyers have recommended this</span>

                        <div class="flex items-center gap-3">



                            <div class="flex rounded-lg items-center py-[7px] px-[10px] flex-row gap-[7px] bg-[#EDF8F1]">

                                <span class="text-[#3A804E] font-semibold " style="direction: ltr;"> 247 sold</span>

                                <i class="fa-solid fa-basket-shopping text-[#3A804E]"></i>


                            </div>

                            <div class="flex rounded-lg items-center py-[7px] px-[10px] flex-row gap-[7px] bg-[#EDF0F8]">

                                <span class="text-[#3A4980] font-semibold " style="direction: ltr;"> 67 Reviews</span>

                                <i class="fa-regular fa-comment-dots text-[#3A4980]"></i>

                            </div>


                            <div class="flex rounded-lg items-center py-[7px] px-[10px] flex-row gap-[7px] bg-[#FBF3EA]">

                                <span class="text-[#D48D3B] font-semibold">4.8</span>

                                <i class="text-[#D48D3B] fa-regular fa-star"></i>

                            </div>


                        </div>
                    </div>

                    <!-- Product Description -->
                    <div class="text-[#132846] leading-relaxed font-cairo md:text-[20px] text-lg ">
                        <?php
                        $content = get_the_content();
                        if ($content) {
                            echo apply_filters('the_content', $content);
                        } else {
                            echo '<p>نظام وحدة رفع للتلفزيون خوربائية داخلية لوحدة آمنة ومتوازنة...</p>';
                        }
                        ?>
                    </div>



                </div>


               <div class="md:w-1/2 h-fit">

                    <!-- Supplier Badge -->
                    <?php if ($factory_name): ?>
                        <div
                            class="flex md:hidden mb-4  md:gap-0 gap-2 flex-col-reverse items-center justify-between w-full font-roboto ">
                            <div class="flex flex-row items-center justify-center gap-1">
                                <span class="text-xs font-medium">CN</span>


                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 13.5C18 14.0304 17.7893 14.5391 17.4142 14.9142C17.0391 15.2893 16.5304 15.5 16 15.5H2C1.46957 15.5 0.960859 15.2893 0.585786 14.9142C0.210714 14.5391 0 14.0304 0 13.5V4.5C0 3.96957 0.210714 3.46086 0.585786 3.08579C0.960859 2.71071 1.46957 2.5 2 2.5H16C16.5304 2.5 17.0391 2.71071 17.4142 3.08579C17.7893 3.46086 18 3.96957 18 4.5V13.5Z"
                                        fill="#DE2910" />
                                    <path
                                        d="M5.56855 4.4885L5.93655 4.6665L6.23105 4.3835L6.17555 4.7885L6.53555 4.9815L6.13355 5.0535L6.06155 5.4555L5.86855 5.0955L5.46355 5.151L5.74655 4.8565L5.56855 4.4885ZM7.90105 5.959L7.72305 6.3265L8.00605 6.6215L7.60155 6.5655L7.40855 6.926L7.33655 6.5235L6.93405 6.4515L7.29455 6.2585L7.23855 5.854L7.53355 6.137L7.90105 5.959ZM7.42255 7.8485L7.55655 8.2345L7.96505 8.243L7.63955 8.4895L7.75805 8.881L7.42255 8.6475L7.08705 8.881L7.20505 8.4895L6.87955 8.243L7.28805 8.2345L7.42255 7.8485ZM5.56855 9.4885L5.93655 9.6665L6.23105 9.3835L6.17555 9.7885L6.53555 9.9815L6.13355 10.0535L6.06155 10.4555L5.86855 10.0955L5.46355 10.151L5.74655 9.8565L5.56855 9.4885ZM3.50055 5.4755L3.96505 6.811L5.37805 6.84L4.25155 7.694L4.66105 9.047L3.50055 8.2395L2.34005 9.047L2.74955 7.694L1.62305 6.84L3.03605 6.811L3.50055 5.4755Z"
                                        fill="#FFDE02" />
                                </svg>
                            </div>
                            <span class="text-xs font-normal">Multispecialty supplier -- 7 yrs</span>
                            <div class="flex  gap-1">
                                <span
                                    class="md:text-sm text-xs font-medium items-center flex justify-center text-center"><?php echo esc_html($factory_name); ?></span>

                                <i class="items-center  fa-solid fa-industry text-[16px] text-[#3773C9]"></i>
                            </div>
                        </div>
                    <?php endif; ?>


                    <!-- Swiper Gallery -->

                    <?php if (!empty($gallery_images) || $featured_image): ?>
                        <!-- Main Swiper -->
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper product-swiper-main">
                            <div class="swiper-wrapper">
                                <?php if ($featured_image): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($gallery_images as $image_id): ?>
                                    <?php $large_url = wp_get_attachment_image_src($image_id, 'large')[0]; ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($large_url); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Thumbnail Swiper -->
                        <div thumbsSlider="" class="swiper product-swiper-thumbs">
                            <div class="swiper-wrapper">
                                <?php if ($featured_image): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($gallery_images as $image_id): ?>
                                    <?php $thumb_url = wp_get_attachment_image_src($image_id, 'medium')[0]; ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next-thumb"></div>
                            <div class="swiper-button-prev-thumb"></div>
                        </div>
                    <?php else: ?>
                        <!-- Fallback if no images -->
                        <div class="bg-gray-50 rounded-lg overflow-hidden aspect-square">
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>


            <div class="flex flex-col gap-6 md:w-2/5 w-full">

                <!-- form -->
                <div class="form">
                    <!-- Contact Form Section -->
                    <div class="bg-[#F8FBFF] border border-[#3773C9] rounded-lg p-6">
                        <h3 class="text-[#132846] text-xl font-bold mb-4 text-center">يرجاء تعبئة بيانات الطلب</h3>

                        <form id="product-inquiry-form" class="space-y-4">

                            <!-- Quantity Field -->
                            <div class="flex flex-col">
                                <label for="quantity" class="text-[#132846] font-medium mb-2">عدد القطع</label>
                                <div class="relative">
                                    <select id="quantity" name="quantity"
                                        class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846] appearance-none pr-10">
                                        <option value="">اختر الكمية</option>
                                        <?php if (!empty($quantity_options)): ?>
                                            <?php foreach ($quantity_options as $quantity_option): ?>
                                                <?php if (isset($quantity_option_names[$quantity_option])): ?>
                                                    <option value="<?php echo esc_attr($quantity_option); ?>">
                                                        <?php echo esc_html($quantity_option_names[$quantity_option]); ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <!-- Fallback options if none are set -->
                                            <option value="1">قطعة واحدة</option>
                                            <option value="1-5">1-5 قطع</option>
                                            <option value="10-50">10-50 قطعة</option>
                                            <option value="100-500">100-500 قطعة</option>
                                            <option value="1000+">1000+ قطعة</option>
                                            <option value="custom">كمية مخصصة</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-[#7A7A7A]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- City Field -->
                            <div class="flex flex-col">
                                <label for="city" class="text-[#132846] font-medium mb-2">المدينة</label>
                                <div class="relative">
                                    <select id="city" name="city"
                                        class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846] appearance-none pr-10">
                                        <option value="">اختر المدينة</option>
                                        <option value="riyadh">الرياض</option>
                                        <option value="jeddah">جدة</option>
                                        <option value="dammam">الدمام</option>
                                        <option value="mecca">مكة المكرمة</option>
                                        <option value="medina">المدينة المنورة</option>
                                        <option value="tabuk">تبوك</option>
                                        <option value="abha">أبها</option>
                                        <option value="khobar">الخبر</option>
                                        <option value="other">أخرى</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-[#7A7A7A]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Field -->
                            <div class="flex flex-col">
                                <label for="shipping" class="text-[#132846] font-medium mb-2">الشحن</label>
                                <div class="relative">
                                    <select id="shipping" name="shipping"
                                        class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846] appearance-none pr-10">
                                        <option value="">اختر طريقة الشحن</option>
                                        <?php if (!empty($shipping_methods) && is_array($shipping_methods)): ?>
                                            <?php foreach ($shipping_methods as $method_key): ?>
                                                <?php if (isset($shipping_method_names[$method_key])): ?>
                                                    <option value="<?php echo esc_attr($method_key); ?>">
                                                        <?php echo esc_html($shipping_method_names[$method_key]); ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <!-- Fallback shipping options if no specific methods are set -->
                                            <option value="express">شحن سريع (1-2 أيام)</option>
                                            <option value="standard">شحن عادي (3-5 أيام)</option>
                                            <option value="economy">شحن اقتصادي (5-7 أيام)</option>
                                            <option value="pickup">استلام من المعرض</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-[#7A7A7A]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <?php if (empty($shipping_methods)): ?>
                                    <p class="text-xs text-[#7A7A7A] mt-1">طرق الشحن الافتراضية متاحة</p>
                                <?php endif; ?>
                            </div>

                            <!-- Product Variations Fields -->
                            <?php if (!empty($product_variations) && is_array($product_variations)): ?>
                                <?php foreach ($product_variations as $variation_index => $variation): ?>
                                    <?php if (isset($variation['name']) && !empty($variation['name']) && isset($variation['values']) && is_array($variation['values'])): ?>
                                        <div class="flex flex-col">
                                            <label for="variation-<?php echo esc_attr($variation_index); ?>"
                                                class="text-[#132846] font-medium mb-2"><?php echo esc_html($variation['name']); ?></label>

                                            <?php if (isset($variation['is_color']) && $variation['is_color']): ?>
                                                <!-- Custom Color Dropdown -->
                                                <div class="relative">
                                                    <div class="custom-select-color"
                                                        data-name="variation_<?php echo esc_attr($variation_index); ?>">
                                                        <div
                                                            class="select-trigger w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846] cursor-pointer flex items-center justify-between">
                                                            <span class="selected-text">اختر
                                                                <?php echo esc_html($variation['name']); ?></span>
                                                            <svg class="w-5 h-5 text-[#7A7A7A]" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="select-options absolute top-full left-0 right-0 bg-white border border-[#E1EFFE] rounded-lg mt-1 shadow-lg z-50 hidden">
                                                            <?php foreach ($variation['values'] as $value_index => $color_value): ?>
                                                                <?php if (!empty($color_value)): ?>
                                                                    <div class="option flex items-center px-4 py-3 hover:bg-gray-50 cursor-pointer"
                                                                        data-value="<?php echo esc_attr($color_value); ?>">
                                                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 mr-3"
                                                                            style="background-color: <?php echo esc_attr($color_value); ?>;"></div>
                                                                        <span><?php echo esc_html($color_value); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <input type="hidden" name="variation_<?php echo esc_attr($variation_index); ?>"
                                                            value="">
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <!-- Regular Dropdown for non-color variations -->
                                                <div class="relative">
                                                    <select id="variation-<?php echo esc_attr($variation_index); ?>"
                                                        name="variation_<?php echo esc_attr($variation_index); ?>"
                                                        class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846] appearance-none pr-10">
                                                        <option value="">اختر <?php echo esc_html($variation['name']); ?></option>
                                                        <?php foreach ($variation['values'] as $value_index => $value): ?>
                                                            <?php if (!empty($value)): ?>
                                                                <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($value); ?>
                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg class="w-5 h-5 text-[#7A7A7A]" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Fallback: Default color selection if no variations exist -->
                                <div class="flex flex-col">
                                    <label for="product-color" class="text-[#132846] font-medium mb-2">لون المنتج</label>
                                    <div class="relative">
                                        <select id="product-color" name="product_color"
                                            class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846] appearance-none pr-10">
                                            <option value="">اختر اللون</option>
                                            <option value="black">أسود</option>
                                            <option value="white">أبيض</option>
                                            <option value="silver">فضي</option>
                                            <option value="gray">رمادي</option>
                                            <option value="custom">لون مخصص</option>
                                        </select>
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-[#7A7A7A]" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Contact Information Fields -->
                            <div class="flex flex-col">
                                <label for="customer-name" class="text-[#132846] font-medium mb-2">الاسم</label>
                                <div class="relative">
                                    <input type="text" id="customer-name" name="customer_name" required
                                        class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846]"
                                        placeholder="أدخل اسمك الكامل">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <label for="customer-phone" class="text-[#132846] font-medium mb-2">رقم الهاتف</label>
                                <div class="relative">
                                    <input type="tel" id="customer-phone" name="customer_phone" required
                                        class="w-full px-4 py-3 border border-[#E1EFFE] rounded-lg focus:outline-none focus:border-[#3773C9] focus:ring-1 focus:ring-[#3773C9] bg-white text-[#132846]"
                                        placeholder="05xxxxxxxx" pattern="[0-9]{10,}">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit"
                                    class="whatsapp-button w-full bg-[#3773C9] text-white py-4 px-6 rounded-lg font-semibold text-lg hover:bg-[#2563EB] transition-colors duration-200 flex items-center justify-center gap-2">
                                    <span>إرسال عبر واتساب</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.785" />
                                    </svg>
                                </button>
                            </div>
                        </form>


                    </div>
                </div>


                <!-- Product Details -->
                <div class="bg-gray-50 rounded-lg text-sm text-gray-700 leading-relaxed">

                    <p class="text-[16px]">
                        السعر الظاهر هو سعر المنتج من المصنع في الصين. التكاليف النهائية (الشحن، الجمارك، الضرائب) تختلف حسب
                        الكمية، الميناء، وطريقة الشحن.يرجى التواصل معنا للحصول على عرض سعر شامل ومفصل حسب طلبك.
                    </p>
                </div>


            </div>

            <!-- Product Tabs Section -->
            <div class="mt-16  border-gray-200 ">
                <div class="flex justify-between border-b border-gray-200">
                    <button class="font-semibold tab-button py-3 px-1 border-b-2 border-blue-600 text-blue-600 "
                        onclick="showTab('details')">
                        المواصفات الفنية
                    </button>
                    <button
                        class="font-semibold tab-button py-3 px-1 border-b-2 border-transparent text-gray-500  hover:text-gray-700"
                        onclick="showTab('performance')">
                        بيانات المورد
                    </button>
                    <button
                        class="font-semibold tab-button py-3 px-1 border-b-2 border-transparent text-gray-500  hover:text-gray-700"
                        onclick="showTab('reviews')">
                        التقييمات
                    </button>
                </div>

                <div class="mt-8 py-8">
                    <div id="details-tab" class="tab-content">
                        <div class="prose max-w-none text-gray-700">
                            <?php if (!empty($technical_details)): ?>
                                <div
                                    class="flex flex-col  text-sm md:w-1/3 text-[#19345A]  mx-auto border border-[#3773C9] rounded-lg">
                                    <div
                                        class="rounded-t-lg p-4 bg-[#D8ECFD] flex justify-between items-center border-b border-[#D1D1D1] ">
                                        <span class="font-bold">البند</span>
                                        <span class="font-bold">التفاصيل</span>
                                    </div>
                                    <?php foreach ($technical_details as $detail): ?>

                                        <div class="flex justify-between items-center px-2 py-4 ">
                                            <span class="font-semibold "><?php echo esc_html($detail['key']); ?></span>
                                            <span class="font-bold "><?php echo esc_html($detail['value']); ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <ul class="space-y-2">
                                    <li>• متوافق مع جميع أنواع التلفزيونات من 32 إلى 75 بوصة</li>
                                    <li>• نظام رفع كهربائي صامت وسلس</li>
                                    <li>• تحكم عن بعد بريموت كنترول</li>
                                    <li>• حمولة قصوى 50 كيلوجرام</li>
                                    <li>• مقاوم للرطوبة والغبار</li>
                                    <li>• تركيب سهل مع دليل التعليمات</li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div id="performance-tab" class="tab-content hidden">
                        <div class="flex flex-col md:gap-8 gap-6 px-2 md:px-8 ">
                            <h3 class="text-xl text-[#132846] font-bold">أداء المتجر :</h3>

                            <div class=" grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                                <div class="flex flex-col gap-4 text-[#19345A] justify-center items-center">
                                    <span class="md:text-xl text-lg font-medium">
                                        نسبة التسليم في الوقت المحدد
                                    </span>
                                    <span class="md:text-xl text-lg font-semibold">
                                        <?php echo number_format($supplier_metrics['delivery_rate'], 1); ?>%
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4 text-center text-[#19345A] justify-center items-center">
                                    <span class="md:text-xl text-lg font-medium">
                                        إجمالي المبيعات على الإنترنت
                                    </span>
                                    <span class="md:text-xl text-lg font-semibold">
                                        +<?php echo number_format($supplier_metrics['total_sales']); ?>$
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4 text-center text-[#19345A] justify-center items-center">
                                    <span class="md:text-xl text-lg font-medium">
                                        متوسط وقت الرد
                                    </span>
                                    <span class="md:text-xl text-lg font-semibold">
                                        <?php
                                        if ($supplier_metrics['response_hours'] == 1) {
                                            echo 'أقل من ساعة';
                                        } else {
                                            echo $supplier_metrics['response_hours'] . ' ساعات';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4 text-center text-[#19345A] justify-center items-center">
                                    <span class="md:text-xl text-lg font-medium">
                                        تقييم المتجر
                                    </span>
                                    <span class="md:text-xl text-lg font-semibold">
                                        <?php echo number_format($supplier_metrics['rating'], 1); ?>/5
                                    </span>
                                </div>
                            </div>

                        </div>
                        <hr class="h-[3px] bg-[#C1D4EE] md:my-8 my-4">


                        <div class="flex flex-col md:gap-8 gap-6 px-2 md:px-8 ">
                            <h3 class="text-xl text-[#132846] font-bold">نبذة عن المصنع :</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M3 19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V5C21 4.46957 20.7893 3.96086 20.4142 3.58579C20.0391 3.21071 19.5304 3 19 3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19ZM12 6H18V12H16V8H12V6ZM6 12H8V16H12V18H6V12Z"
                                            fill="#3773C9" />
                                    </svg>
                                    <span class="text-lg font-semibold">3,500 متر مربع</span>
                                </div>

                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M2.04708 14.6669C2.11579 14.9231 2.28341 15.1414 2.51308 15.2739L4.42208 16.3779V18.5769C4.42208 18.8422 4.52744 19.0965 4.71497 19.284C4.90251 19.4716 5.15686 19.5769 5.42208 19.5769H7.62108L8.72508 21.4869C8.85769 21.7166 9.07611 21.8842 9.33228 21.9528C9.58845 22.0215 9.8614 21.9855 10.0911 21.8529L12.0001 20.7499L13.9101 21.8539C14.1398 21.9865 14.4127 22.0225 14.6689 21.9538C14.9251 21.8852 15.1435 21.7176 15.2761 21.4879L16.3791 19.5789H18.5781C18.8433 19.5789 19.0976 19.4736 19.2852 19.286C19.4727 19.0985 19.5781 18.8442 19.5781 18.5789V16.3799L21.4871 15.2759C21.7168 15.1433 21.8843 14.9249 21.953 14.6687C22.0216 14.4126 21.9857 14.1396 21.8531 13.9099L20.7501 11.9999L21.8541 10.0909C21.9867 9.86126 22.0226 9.58832 21.954 9.33214C21.8853 9.07597 21.7178 8.85755 21.4881 8.72494L19.5791 7.62094V5.42194C19.5791 5.15672 19.4737 4.90237 19.2862 4.71483C19.0986 4.5273 18.8443 4.42194 18.5791 4.42194H16.3801L15.2771 2.51294C15.1445 2.28327 14.9262 2.11565 14.6701 2.04694C14.5432 2.01294 14.4109 2.00428 14.2806 2.02143C14.1504 2.03859 14.0248 2.08124 13.9111 2.14694L12.0001 3.24994L10.0911 2.14594C9.86152 2.01326 9.58867 1.97717 9.33251 2.04562C9.07635 2.11406 8.85786 2.28144 8.72508 2.51094L7.62108 4.42094H5.42208C5.15686 4.42094 4.90251 4.5263 4.71497 4.71384C4.52744 4.90137 4.42208 5.15573 4.42208 5.42094V7.61994L2.51308 8.72494C2.28358 8.85772 2.1162 9.07621 2.04775 9.33237C1.97931 9.58853 2.01539 9.86138 2.14808 10.0909L3.25108 11.9999L2.14708 13.9089C2.01466 14.1384 1.97869 14.411 2.04708 14.6669Z"
                                            fill="#3268B5" />
                                    </svg>
                                    <span class="text-lg font-semibold">تم التحقق من قبل: SGS Group</span>
                                </div>

                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M2 9C2 7.114 2 6.172 2.586 5.586C3.172 5 4.114 5 6 5H18C19.886 5 20.828 5 21.414 5.586C22 6.172 22 7.114 22 9C22 9.471 22 9.707 21.854 9.854C21.707 10 21.47 10 21 10H3C2.529 10 2.293 10 2.146 9.854C2 9.707 2 9.47 2 9ZM2 18C2 19.886 2 20.828 2.586 21.414C3.172 22 4.114 22 6 22H18C19.886 22 20.828 22 21.414 21.414C22 20.828 22 19.886 22 18V13C22 12.529 22 12.293 21.854 12.146C21.707 12 21.47 12 21 12H3C2.529 12 2.293 12 2.146 12.146C2 12.293 2 12.53 2 13V18Z"
                                            fill="#3268B5" />
                                        <path d="M7 3V6M17 3V6" stroke="#3268B5" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    <span class="text-lg font-semibold">تاريخ التأسيس: 2014</span>
                                </div>

                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <g clip-path="url(#clip0_1487_4296)">
                                            <path
                                                d="M11.4941 11.642C11.6707 11.826 11.8571 11.999 12.0531 12.161C12.3621 12.44 12.6711 12.659 12.9401 12.938C12.9722 12.9797 13.0137 13.013 13.0613 13.0354C13.1089 13.0577 13.1612 13.0683 13.2137 13.0664C13.2663 13.0644 13.3176 13.0499 13.3634 13.0241C13.4092 12.9983 13.4482 12.962 13.4771 12.918C13.5114 12.8638 13.528 12.8001 13.5246 12.736C13.5212 12.6719 13.4979 12.6104 13.4581 12.56C13.2757 12.1871 13.0623 11.8302 12.8201 11.493C12.7146 11.3509 12.5979 11.2175 12.4711 11.094C12.347 10.9644 12.2103 10.8475 12.0631 10.745L11.8031 10.595C12.4636 9.97103 12.971 9.20289 13.2858 8.35052C13.6007 7.49815 13.7144 6.58458 13.6181 5.68104C13.4081 2.86904 11.5041 0.207041 8.11506 0.257041C4.19706 0.387041 2.02306 3.10804 1.93406 5.83004C1.89559 6.904 2.19535 7.96292 2.79104 8.85735C3.38673 9.75179 4.24827 10.4366 5.25406 10.815C4.35297 11.3553 3.50488 11.9794 2.72106 12.679C2.07394 13.2355 1.50391 13.8758 1.02606 14.583C0.602645 15.1779 0.301002 15.8506 0.138481 16.5625C-0.0240404 17.2744 -0.0442335 18.0113 0.0790627 18.731C0.0884966 18.7748 0.10675 18.8163 0.132709 18.8528C0.158669 18.8893 0.191792 18.9201 0.230059 18.9434C0.268326 18.9667 0.310937 18.982 0.355294 18.9883C0.39965 18.9946 0.444824 18.9918 0.488063 18.98C0.570075 18.9653 0.643492 18.9202 0.693573 18.8536C0.743654 18.787 0.766692 18.7039 0.758063 18.621C0.70921 17.362 1.12813 16.1295 1.93406 15.161C2.3914 14.5397 2.89306 13.955 3.43906 13.407C4.24791 12.5838 5.10688 11.8113 6.01106 11.094C6.60406 11.254 7.21206 11.348 7.82606 11.374C7.86357 11.3766 7.90121 11.3716 7.93675 11.3593C7.97228 11.347 8.00497 11.3277 8.03287 11.3025C8.06078 11.2773 8.08332 11.2468 8.09916 11.2127C8.115 11.1786 8.12381 11.1416 8.12506 11.104C8.128 11.0304 8.10274 10.9583 8.05444 10.9026C8.00614 10.8468 7.93842 10.8116 7.86506 10.804C4.39606 10.516 2.81106 8.30304 2.88106 6.04904H2.96106C3.44417 6.27296 3.96466 6.4052 4.49606 6.43904C4.7214 6.46304 4.9474 6.46304 5.17406 6.43904C5.39806 6.40571 5.6174 6.35237 5.83206 6.27904C6.34806 6.0938 6.81493 5.79316 7.19706 5.40004C7.24019 5.34696 7.26456 5.28111 7.26637 5.21274C7.26818 5.14437 7.24733 5.07733 7.20706 5.02204C7.46373 5.17604 7.72973 5.31204 8.00506 5.43004C8.48606 5.65604 8.99106 5.82704 9.51006 5.93904C10.5751 6.14241 11.6663 6.16943 12.7401 6.01904C12.8901 8.81004 11.2851 10.794 9.00206 11.103C8.92876 11.1234 8.86509 11.1691 8.82247 11.2321C8.77986 11.2951 8.76108 11.3713 8.7695 11.4469C8.77793 11.5225 8.81301 11.5926 8.86846 11.6447C8.9239 11.6967 8.99608 11.7274 9.07206 11.731C9.77324 11.6769 10.454 11.4693 11.0661 11.123C11.1961 11.303 11.3351 11.472 11.4941 11.641M6.75006 4.92204C6.44402 5.10323 6.1052 5.22218 5.75306 5.27204C5.58306 5.27204 5.41306 5.27204 5.23406 5.35204L4.45706 5.46204C4.01633 5.54097 3.56862 5.57414 3.12106 5.56104C3.08857 5.54437 3.05258 5.53568 3.01606 5.53568C2.97955 5.53568 2.94355 5.54437 2.91106 5.56104C3.00131 4.90823 3.22501 4.28099 3.56824 3.71841C3.91146 3.15583 4.36686 2.66995 4.90606 2.29104C5.32869 3.16384 5.92562 3.94081 6.66006 4.57404C6.79006 4.68404 6.93006 4.77404 7.06906 4.87404C7.01639 4.85193 6.95863 4.84481 6.90216 4.85345C6.84569 4.8621 6.79271 4.88618 6.74906 4.92304M9.73906 4.92304C8.85226 4.66231 8.01392 4.25868 7.25706 3.72804C6.54675 3.24343 5.929 2.63549 5.43306 1.93304C6.27602 1.52934 7.20048 1.32474 8.13506 1.33504C10.7761 1.24504 12.3021 3.20904 12.6711 5.37304C11.6887 5.3763 10.7112 5.23478 9.77006 4.95304L9.73906 4.92304Z"
                                                fill="#3268B5" />
                                            <path
                                                d="M8.39415 13.2571C8.40202 13.2153 8.40059 13.1724 8.38995 13.1312C8.37932 13.0901 8.35975 13.0518 8.33263 13.0191C8.30551 12.9864 8.27151 12.9601 8.23306 12.942C8.1946 12.9239 8.15264 12.9146 8.11015 12.9146C8.06766 12.9146 8.0257 12.9239 7.98725 12.942C7.94879 12.9601 7.9148 12.9864 7.88768 13.0191C7.86056 13.0518 7.84099 13.0901 7.83035 13.1312C7.81972 13.1724 7.81828 13.2153 7.82615 13.2571C7.72615 13.7661 7.61615 14.2541 7.55615 14.7931V16.1191C7.60615 16.6371 7.69615 17.1161 7.76615 17.6541C7.769 17.7422 7.80594 17.8257 7.86918 17.8871C7.93242 17.9485 8.01702 17.9829 8.10515 17.9831C8.19058 17.9802 8.27157 17.9444 8.33107 17.883C8.39057 17.8216 8.42394 17.7396 8.42415 17.6541C8.47415 17.1361 8.54415 16.6571 8.58415 16.1191V14.8131C8.54415 14.2641 8.45415 13.7661 8.39415 13.2571ZM22.9602 15.6401C23.1192 15.5301 23.2582 15.4101 23.2982 15.3801C23.508 15.2005 23.6783 14.9794 23.7984 14.7307C23.9186 14.482 23.9859 14.2111 23.9962 13.9351C24.0289 13.3946 23.8584 12.8613 23.5182 12.4401C23.3018 12.1905 23.0457 11.9783 22.7602 11.8121C22.6377 11.7349 22.5073 11.6712 22.3712 11.6221C22.2327 11.5697 22.0888 11.5328 21.9422 11.5121C21.7092 11.4556 21.4669 11.4495 21.2315 11.4944C20.9961 11.5392 20.773 11.6339 20.5772 11.7721C20.3734 11.9565 20.2044 12.176 20.0782 12.4201C19.9848 12.6028 19.8685 12.7691 19.7292 12.9191C19.643 12.8509 19.5532 12.7875 19.4602 12.7291L17.9752 11.2741C17.9212 11.2227 17.8496 11.1941 17.7752 11.1941C17.7007 11.1941 17.6291 11.2227 17.5752 11.2741C17.5494 11.3124 17.5264 11.3525 17.5062 11.3941C17.4553 11.3623 17.3966 11.3455 17.3367 11.3455C17.2767 11.3455 17.218 11.3623 17.1672 11.3941C16.9372 11.5931 16.1102 12.2011 15.6722 12.6491C15.4991 12.8054 15.3713 13.0054 15.3022 13.2281C15.2922 13.3321 15.3172 13.4381 15.3722 13.5271C15.4622 13.6871 15.7722 13.9751 15.8322 14.0851C16.0012 14.3881 16.0702 14.7371 16.0302 15.0821C16.0267 15.2192 15.9779 15.3512 15.8914 15.4576C15.8049 15.564 15.6856 15.6387 15.5522 15.6701C15.3773 15.6993 15.1977 15.6785 15.0342 15.6101C14.7251 15.4811 14.4335 15.3138 14.1662 15.1121C13.9868 14.952 13.7933 14.8084 13.5882 14.6831C13.4462 14.6015 13.2787 14.5765 13.1192 14.6131C12.6898 14.7254 12.2897 14.9287 11.9457 15.209C11.6016 15.4894 11.3218 15.8403 11.1252 16.2381C10.906 16.6773 10.8205 17.1712 10.8791 17.6586C10.9378 18.1459 11.138 18.6054 11.4552 18.9801C12.3066 20.161 13.2784 21.2502 14.3552 22.2301C15.1166 22.8978 16.0104 23.3973 16.9782 23.6961C17.3792 23.7961 17.8032 23.7381 18.1642 23.5361C18.7811 23.1704 19.3363 22.7093 19.8092 22.1701C20.0292 21.9228 20.2352 21.6638 20.4272 21.3931C20.5083 21.2757 20.5458 21.1336 20.533 20.9914C20.5202 20.8493 20.458 20.7161 20.3572 20.6151C20.0828 20.3891 19.8558 20.1111 19.6892 19.7971C19.635 19.7014 19.6127 19.5909 19.6252 19.4817C19.6378 19.3725 19.6847 19.27 19.7592 19.1891C19.845 19.1128 19.947 19.057 20.0575 19.0259C20.168 18.9947 20.2841 18.989 20.3972 19.0091C20.7142 19.0401 21.0222 19.1311 21.3042 19.2791C21.4242 19.3291 21.7432 19.5891 21.9122 19.6581C22.0182 19.7081 22.1352 19.7281 22.2522 19.7181C22.4164 19.6849 22.5661 19.601 22.6802 19.4781C22.8342 19.3041 22.9772 19.1214 23.1092 18.9301C23.4742 18.5401 23.6922 18.0371 23.7272 17.5041C23.6971 16.9794 23.4898 16.4806 23.1392 16.0891C23.1092 15.9891 23.0202 15.8091 22.9602 15.6401ZM21.8822 15.8401C22.0508 16.1228 22.2435 16.3884 22.4602 16.6371C22.6752 16.8741 22.8052 17.1761 22.8292 17.4941C22.787 17.806 22.6349 18.0925 22.4002 18.3021L22.1302 18.6311C21.8817 18.389 21.584 18.2032 21.2574 18.0862C20.9308 17.9692 20.5828 17.9238 20.2372 17.9531C19.7865 17.9574 19.3559 18.1405 19.0402 18.4621C18.8528 18.6467 18.7179 18.8778 18.6496 19.1318C18.5812 19.3858 18.5817 19.6534 18.6512 19.9071C18.7992 20.3751 19.0592 20.8001 19.4092 21.1431C19.3018 21.2431 19.1888 21.3364 19.0702 21.4231C18.7888 21.7538 18.4765 22.0528 18.1332 22.3201C17.8632 22.5301 17.5852 22.7381 17.3262 22.6591C16.4919 22.3956 15.7235 21.9572 15.0722 21.3731C14.0352 20.4721 13.0906 19.4702 12.2522 18.3821C12.0475 18.1587 11.9091 17.8827 11.8526 17.5851C11.7961 17.2874 11.8236 16.9799 11.9322 16.6971C12.0575 16.4338 12.2354 16.1989 12.4548 16.0068C12.6742 15.8147 12.9306 15.6695 13.2082 15.5801C13.6952 15.9401 14.2242 16.2371 14.7832 16.4681C15.1032 16.5871 15.4492 16.6081 15.7802 16.5281C16.0176 16.481 16.237 16.3681 16.4133 16.2022C16.5896 16.0364 16.7157 15.8242 16.7772 15.5901C16.9232 14.9875 16.8304 14.3518 16.5182 13.8161C16.4682 13.7361 16.2182 13.4561 16.0992 13.3271C16.2412 13.1731 16.3942 13.0301 16.5582 12.8981C16.9772 12.5201 17.4752 12.1211 17.6542 11.9711C17.7021 11.9325 17.737 11.8802 17.7542 11.8211L18.9702 13.1481C19.1102 13.3041 19.2602 13.4501 19.4202 13.5861C19.4796 13.624 19.5486 13.6442 19.6192 13.6442C19.6897 13.6442 19.7587 13.624 19.8182 13.5861C20.4662 13.2181 20.5362 12.5891 20.9642 12.2801C21.092 12.2083 21.2331 12.1633 21.3789 12.1479C21.5247 12.1324 21.6721 12.1467 21.8122 12.1901C21.9055 12.2034 21.9952 12.2301 22.0812 12.2701C22.1712 12.3061 22.2578 12.3494 22.3412 12.4001L22.6392 12.6301L22.8992 12.8981C23.1092 13.1851 23.1992 13.5431 23.1482 13.8951C23.144 14.0531 23.1052 14.2082 23.0345 14.3495C22.9638 14.4909 22.863 14.615 22.7392 14.7131C22.5218 14.8124 22.2992 14.8991 22.0712 14.9731C21.9908 15.0091 21.9196 15.0627 21.8627 15.1298C21.8058 15.1969 21.7646 15.276 21.7422 15.3611C21.7249 15.527 21.7598 15.6941 21.8422 15.8391L21.8822 15.8401Z"
                                                fill="#3268B5" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1487_4296">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="text-lg font-semibold">الموردون المتعاونون: 15 مورد</span>
                                </div>
                            </div>

                        </div>
                        <hr class="h-[3px] bg-[#C1D4EE] md:my-8 my-4">


                        <div class="flex flex-col md:gap-8 gap-6 px-2 md:px-8 ">
                            <h3 class="text-xl text-[#132846] font-bold">الخدمات المقدمة :</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M9.5501 18.0001L3.8501 12.3001L5.2751 10.8751L9.5501 15.1501L18.7251 5.9751L20.1501 7.4001L9.5501 18.0001Z"
                                            fill="#06AC00" />
                                    </svg>
                                    <span class="text-lg font-semibold"> تخصيص جزئي (Minor customization) </span>
                                </div>

                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M9.5501 18.0001L3.8501 12.3001L5.2751 10.8751L9.5501 15.1501L18.7251 5.9751L20.1501 7.4001L9.5501 18.0001Z"
                                            fill="#06AC00" />
                                    </svg>
                                    <span class="text-lg font-semibold"> تخصيص كامل (Full customization)</span>
                                </div>

                            </div>

                        </div>
                        <hr class="h-[3px] bg-[#C1D4EE] md:my-8 my-4">


                        <div class="flex flex-col md:gap-8 gap-6 px-2 md:px-8 ">
                            <h3 class="text-xl text-[#132846] font-bold"> ضبط الجودة :</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex items-center gap-3 text-[#19345A]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M9.5501 18.0001L3.8501 12.3001L5.2751 10.8751L9.5501 15.1501L18.7251 5.9751L20.1501 7.4001L9.5501 18.0001Z"
                                            fill="#06AC00" />
                                    </svg>
                                    <span class="text-lg font-semibold"> الضمان متوفر (Warranty available) </span>
                                </div>



                            </div>

                        </div>
                        <hr class="h-[3px] bg-[#C1D4EE] md:my-8 my-4">

                        <?php
                        $certificate_images = get_post_meta(get_the_ID(), '_product_certificates_gallery', true);
                        if (!empty($certificate_images)): ?>
                            <div class="certificates flex flex-col md:gap-8 gap-6 px-2 md:px-8">
                                <h3 class="text-xl text-[#132846] font-bold"> شهادات الجودة والاعتماد :</h3>
                                <div class="grid md:grid-cols-5 grid-cols-2 items-center gap-5 text-[#19345A]">
                                    <?php foreach ($certificate_images as $idx => $image_id):
                                        $img_url = wp_get_attachment_image_url($image_id, 'medium'); ?>
                                        <div class="rounded-lg md:w-[200px] md:h-[180px] w-[150px] h-[150px] overflow-hidden flex items-center justify-center">
                                            <img src="<?php echo esc_url($img_url); ?>" alt="Certificate <?php echo $idx + 1; ?>" class="object-cover">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <hr class="h-[3px] bg-[#C1D4EE] md:my-8 my-4">
                        <?php endif; ?>



						 <?php
                        $production_video_url = get_post_meta(get_the_ID(), '_production_video_url', true);
                        if (!empty($production_video_url)):
                            // Extract YouTube video ID
                            $video_id = '';
                            if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $production_video_url, $match)) {
                                $video_id = $match[1];
                            }
                            if (!empty($video_id)):
                        ?>
                        <div class="production-line flex flex-col md:gap-8 gap-6 px-2 md:px-8">
                            <h3 class="text-xl text-[#132846] font-bold">من داخل خطوط الإنتاج :</h3>

                            <div class="relative w-full aspect-video rounded-lg overflow-hidden">
                                <!-- Thumbnail with play button overlay -->
                                <div class="video-container relative w-full h-full cursor-pointer" data-video-id="<?php echo esc_attr($video_id); ?>">
                                    <img
                                        src="https://img.youtube.com/vi/<?php echo esc_attr($video_id); ?>/maxresdefault.jpg"
                                        alt="Production Video"
                                        class="w-full h-full object-cover"
                                    >
                                    <div class="play-button absolute inset-0 flex items-center justify-center">
                                        <div class="rounded-full bg-white bg-opacity-80 w-16 h-16 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="#3773C9">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hidden iframe that will be shown when play is clicked -->
                                <div class="youtube-player hidden w-full h-full absolute top-0 left-0">
                                    <!-- YouTube iframe will be inserted here via JavaScript -->
                                </div>
                            </div>
                        </div>
                        <hr class="h-[3px] bg-[#C1D4EE] md:my-8 my-4">

						<?php endif; endif; ?>


                    </div>

                    <div id="reviews-tab" class="tab-content hidden" style="direction: ltr;">
                        <div class="max-w-none text-gray-700 px-2 md:px-8">
                            <?php
                            $product_reviews = get_post_meta(get_the_ID(), '_product_reviews', true);
                            if (!empty($product_reviews) && is_array($product_reviews)):
                                ?>
                                <div class="flex flex-col gap-6">
                                    <?php foreach ($product_reviews as $review): ?>
                                        <?php
                                        // Generate star rating
                                        $rating = isset($review['rating']) ? intval($review['rating']) : 5;
                                        $stars = str_repeat('⭐', $rating);

                                        // Format date
                                        $review_date = isset($review['date']) ? $review['date'] : date('Y-m-d');
                                        $formatted_date = date('F j, Y h:i A', strtotime($review_date));

                                        // Get avatar image
                                        $avatar_url = '';
                                        if (!empty($review['avatar_id'])) {
                                            $avatar_url = wp_get_attachment_image_src($review['avatar_id'], 'thumbnail')[0];
                                        }

                                        // Default avatar if none provided
                                        if (empty($avatar_url)) {
                                            $avatar_url = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face&auto=format';
                                        }
                                        ?>

                                        <div class="border-b border-dashed border-[#E5E7EB] rounded-lg p-4 bg-white shadow-sm">
                                            <div class="flex items-start gap-6 flex-col">
                                                <!-- Review Content -->
                                                <div class="flex flex-col flex-1">
                                                    <div class="flex flex-col justify-between gap-4">
                                                        <span class="text-yellow-400 text-xl"><?php echo esc_html($stars); ?></span>
                                                        <p class="text-[#081F5C] font-roboto text-lg">
                                                            <?php echo esc_html($review['content']); ?>
                                                        </p>
                                                    </div>
                                                    <span
                                                        class="text-base font-roboto text-gray-400"><?php echo esc_html($formatted_date); ?></span>
                                                </div>

                                                <!-- Avatar -->
                                                <div class="flex justify-center gap-3 items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="<?php echo esc_url($avatar_url); ?>"
                                                            alt="<?php echo esc_attr($review['name']); ?>"
                                                            class="w-10 h-10 rounded-full object-cover">
                                                    </div>
                                                    <span
                                                        class="text-[#081F5C] font-roboto text-lg"><?php echo esc_html($review['name']); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-8">
                                    <p class="text-gray-500 text-lg">لا توجد تقييمات لهذا المنتج حتى الآن.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


			<!-- CTA Section -->
			<div class="bg-[#F8FBFF] rounded-lg p-6 md:p-10 my-8">
				<div class="max-w-5xl mx-auto flex flex-col items-center justify-between gap-8">
					<div class="text-center  md:w-2/3">
						<h3 class="text-lg md:text-xl font-bold text-[#19345A] mb-4">هل لديك مشروع؟</h3>
						<p class="text-[#19345A] font-bold text-lg md:text-xl">
							تواصل معنا الآن واحصل على تسعيرة شاملة مع الشحن حتى باب مستودعك.
						</p>
					</div>
					<div class="md:w-1/3 flex justify-center">
						<?php
						$whatsapp_number = get_post_meta(get_the_ID(), '_whatsapp_number', true);
						$whatsapp_url = !empty($whatsapp_number) ? 'https://api.whatsapp.com/send/?phone=' . preg_replace('/[^0-9]/', '', $whatsapp_number) : '#';
						$product_title = get_the_title();
						$message = "مرحباً، أنا مهتم بالمنتج: " . $product_title;
						if (!empty($whatsapp_number)) {
							$whatsapp_url .= '&text=' . urlencode($message) . '&type=phone_number&app_absent=0';
						}
						?>
						<a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" class="bg-[#3268B5] hover:bg-[#2c5da3] transition duration-300 text-white py-3 px-8 rounded-lg text-lg font-medium flex items-center gap-2">
							<span>اطلب عرض سعر الآن</span>
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M5 12h14M12 5l7 7-7 7"/>
							</svg>
						</a>
					</div>
				</div>
			</div>

        </div>
    </div>

    <script>
        // Initialize Swiper Gallery and Form functionality
        document.addEventListener('DOMContentLoaded', function () {
            // Get WhatsApp number from product meta data
            <?php
            $whatsapp_number = get_post_meta(get_the_ID(), '_whatsapp_number', true);
            $whatsapp_number_clean = !empty($whatsapp_number) ? preg_replace('/[^0-9]/', '', $whatsapp_number) : '966509825040';
            ?>
            const WHATSAPP_NUMBER = '<?php echo esc_js($whatsapp_number_clean); ?>'; // Get number from PHP

            // Initialize thumbnails swiper
            var swiperThumbs = new Swiper(".product-swiper-thumbs", {
                loop: true,
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,

            });

            // Initialize main swiper
            var swiperMain = new Swiper(".product-swiper-main", {
                loop: true,
                spaceBetween: 10,
                thumbs: {
                    swiper: swiperThumbs,

                },
                navigation: {
                    nextEl: ".swiper-button-next-thumb",
                    prevEl: ".swiper-button-prev-thumb",
                },
            });

            // Initialize custom color dropdowns
            initCustomColorDropdowns();

            // Initialize form submission
            initFormSubmission();

            // Form Submission to WhatsApp
            function initFormSubmission() {
                const form = document.getElementById('product-inquiry-form');
                if (form) {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        sendToWhatsApp();
                    });
                }
            }

            function sendToWhatsApp() {
                // Clear previous errors
                clearFormErrors();

                // Get form data
                const formData = new FormData(document.getElementById('product-inquiry-form'));
                const productTitle = '<?php echo esc_js(get_the_title()); ?>';
                const productUrl = '<?php echo esc_url(get_permalink()); ?>';

                // Collect form values
                const customerName = formData.get('customer_name') || '';
                const customerPhone = formData.get('customer_phone') || '';
                const quantity = formData.get('quantity') || '';
                const city = formData.get('city') || '';
                const shipping = formData.get('shipping') || '';

                // TEST: Log collected form data for debugging
                console.log('🧪 FORM DATA TEST:', {
                    productTitle,
                    productUrl,
                    customerName,
                    customerPhone,
                    quantity,
                    city,
                    shipping,
                    whatsappNumber: WHATSAPP_NUMBER
                });

                // Collect selected variations
                let variations = '';
                const variationInputs = document.querySelectorAll('input[name^="variation_"], select[name^="variation_"]');
                variationInputs.forEach(input => {
                    if (input.value) {
                        const labelElement = document.querySelector(`label[for="${input.id}"]`) ||
                            input.closest('.flex-col').querySelector('label');
                        const labelText = labelElement ? labelElement.textContent.trim() : input.name;
                        variations += `${labelText}: ${input.value}\n`;
                    }
                });

                // Handle fallback color selection if no variations
                const productColor = formData.get('product_color');
                if (productColor && !variations) {
                    variations += `لون المنتج: ${productColor}\n`;
                }

                // Validate required fields
                let hasErrors = false;

                if (!customerName.trim()) {
                    showFieldError('customer-name', 'الاسم مطلوب');
                    hasErrors = true;
                }

                if (!customerPhone.trim()) {
                    showFieldError('customer-phone', 'رقم الهاتف مطلوب');
                    hasErrors = true;
                } else if (!isValidPhoneNumber(customerPhone)) {
                    showFieldError('customer-phone', 'رقم الهاتف غير صحيح');
                    hasErrors = true;
                }

                if (hasErrors) {
                    return;
                }

                // Build WhatsApp message
                let message = `🛍️ *طلب منتج جديد*\n\n`;
                message += `📦 *المنتج:* ${productTitle}\n`;
                message += `🔗 *رابط المنتج:* ${productUrl}\n\n`;
                message += `👤 *بيانات العميل:*\n`;
                message += `الاسم: ${customerName}\n`;
                message += `الهاتف: ${customerPhone}\n\n`;

                if (quantity) {
                    message += `📊 *الكمية:* ${quantity}\n`;
                }

                if (city) {
                    message += `🏙️ *المدينة:* ${city}\n`;
                }

                if (shipping) {
                    message += `🚚 *طريقة الشحن:* ${shipping}\n`;
                }

                if (variations.trim()) {
                    message += `\n🎨 *المواصفات المطلوبة:*\n${variations}`;
                }

                message += `\n📅 *تاريخ الطلب:* ${new Date().toLocaleDateString('ar-SA')}`;
                message += `\n⏰ *وقت الطلب:* ${new Date().toLocaleTimeString('ar-SA')}`;

                // Encode message for URL
                const encodedMessage = encodeURIComponent(message);

                // Format WhatsApp number (remove any spaces, + signs, and ensure proper format)
                const cleanWhatsAppNumber = WHATSAPP_NUMBER.replace(/[\s\+\-\(\)]/g, '');

                // Create WhatsApp URL - using the API format that works better with Arabic text
                const whatsappUrl = `https://api.whatsapp.com/send/?phone=${cleanWhatsAppNumber}&text=${encodedMessage}&type=phone_number&app_absent=0`;

                // TEST: Log the final WhatsApp URL and message for debugging
                console.log('📱 WHATSAPP MESSAGE TEST:');
                console.log('Clean Number:', cleanWhatsAppNumber);
                console.log('URL:', whatsappUrl);
                console.log('Raw Message:', message);
                console.log('Encoded Message:', encodedMessage.substring(0, 200) + '...');

                // Try to open WhatsApp using multiple methods for better compatibility
                try {
                    // Method 1: Try to open WhatsApp directly
                    const opened = window.open(whatsappUrl, '_blank');

                    // Method 2: If popup was blocked, try location assignment
                    if (!opened || opened.closed || typeof opened.closed == 'undefined') {
                        console.log('Popup blocked, trying alternative method...');
                        // Create a temporary link and click it
                        const tempLink = document.createElement('a');
                        tempLink.href = whatsappUrl;
                        tempLink.target = '_blank';
                        tempLink.rel = 'noopener noreferrer';
                        document.body.appendChild(tempLink);
                        tempLink.click();
                        document.body.removeChild(tempLink);
                    }

                    console.log('✅ WhatsApp URL opened successfully');
                } catch (error) {
                    console.error('❌ Error opening WhatsApp:', error);
                    // Fallback: Copy URL to clipboard and show message
                    if (navigator.clipboard) {
                        navigator.clipboard.writeText(whatsappUrl).then(() => {
                            alert('تم نسخ رابط الواتساب إلى الحافظة. الصق الرابط في المتصفح لإرسال الرسالة.');
                        });
                    } else {
                        alert('حدث خطأ في فتح الواتساب. يرجى المحاولة مرة أخرى.');
                    }
                }

                // Show success message
                showSuccessMessage();
            }

            function clearFormErrors() {
                const errorFields = document.querySelectorAll('.form-field-error');
                errorFields.forEach(field => {
                    field.classList.remove('form-field-error');
                });

                const errorMessages = document.querySelectorAll('.error-message');
                errorMessages.forEach(message => {
                    message.remove();
                });
            }

            function showFieldError(fieldId, message) {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.classList.add('form-field-error');
                    field.focus();

                    // Add error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'error-message';
                    errorDiv.textContent = message;

                    // Insert after the field's parent div
                    const parentDiv = field.closest('.relative');
                    if (parentDiv && parentDiv.parentNode) {
                        parentDiv.parentNode.insertBefore(errorDiv, parentDiv.nextSibling);
                    }
                }
            }

            function isValidPhoneNumber(phone) {
                // Basic Saudi phone number validation
                const phoneRegex = /^(05|5)[0-9]{8}$|^(\+966|966)[5][0-9]{8}$/;
                return phoneRegex.test(phone.replace(/\s+/g, ''));
            }

            function showSuccessMessage() {
                const button = document.querySelector('#product-inquiry-form button[type="submit"]');
                const originalText = button.innerHTML;

                // Add success animation
                button.classList.add('success-animation');

                button.innerHTML = `
                <span>تم الإرسال ✓</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                </svg>
            `;
                button.classList.add('bg-green-600', 'hover:bg-green-700');
                button.classList.remove('bg-[#3773C9]', 'hover:bg-[#2563EB]');

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-green-600', 'hover:bg-green-700', 'success-animation');
                    button.classList.add('bg-[#3773C9]', 'hover:bg-[#2563EB]');
                }, 3000);
            }

            // Custom Color Dropdown Functionality
            function initCustomColorDropdowns() {
                const customSelects = document.querySelectorAll('.custom-select-color');

                customSelects.forEach(select => {
                    const trigger = select.querySelector('.select-trigger');
                    const options = select.querySelector('.select-options');
                    const hiddenInput = select.querySelector('input[type="hidden"]');
                    const selectedText = select.querySelector('.selected-text');

                    if (!trigger || !options || !hiddenInput || !selectedText) {
                        return; // Skip if elements are missing
                    }

                    // Toggle dropdown
                    trigger.addEventListener('click', function (e) {
                        e.stopPropagation();

                        // Close all other dropdowns
                        customSelects.forEach(otherSelect => {
                            if (otherSelect !== select) {
                                const otherOptions = otherSelect.querySelector('.select-options');
                                if (otherOptions) {
                                    otherOptions.classList.add('hidden');
                                }
                            }
                        });

                        // Toggle current dropdown
                        options.classList.toggle('hidden');
                    });

                    // Handle option selection
                    const optionElements = select.querySelectorAll('.option');
                    optionElements.forEach(option => {
                        option.addEventListener('click', function (e) {
                            e.stopPropagation();

                            const value = this.getAttribute('data-value');
                            const colorDiv = this.querySelector('div');
                            const textSpan = this.querySelector('span');

                            if (!value || !textSpan) return;

                            // Update hidden input
                            hiddenInput.value = value;

                            // Update trigger display
                            selectedText.innerHTML = '';

                            if (colorDiv) {
                                const colorClone = colorDiv.cloneNode(true);
                                selectedText.appendChild(colorClone);
                            }

                            const textElement = document.createElement('span');
                            textElement.textContent = textSpan.textContent;
                            textElement.style.marginLeft = '8px';
                            selectedText.appendChild(textElement);

                            // Close dropdown
                            options.classList.add('hidden');

                            // Remove selected class from all options
                            optionElements.forEach(opt => opt.classList.remove('selected'));
                            // Add selected class to current option
                            this.classList.add('selected');
                        });
                    });
                });

                // Close dropdowns when clicking outside
                document.addEventListener('click', function (e) {
                    if (!e.target.closest('.custom-select-color')) {
                        customSelects.forEach(select => {
                            const options = select.querySelector('.select-options');
                            if (options) {
                                options.classList.add('hidden');
                            }
                        });
                    }
                });
            }
        });

        // Global functions for onclick handlers
        window.selectVariation = function (element) {
            var variationName = element.getAttribute('data-variation');
            var variationValue = element.getAttribute('data-value');

            // Remove active class from other options in the same variation group
            var variationGroup = element.parentElement;
            var allOptions = variationGroup.querySelectorAll('.variation-option');
            allOptions.forEach(function (option) {
                if (option.classList.contains('color-option')) {
                    option.classList.remove('selected');
                    option.style.borderColor = '';
                    option.style.borderWidth = '';
                    option.style.transform = '';
                    option.style.boxShadow = '';
                } else {
                    option.classList.remove('selected');
                }
            });

            // Add active class to selected option
            if (element.classList.contains('color-option')) {
                element.classList.add('selected');
            } else {
                element.classList.add('selected');
            }

            // Store the selected variation
            window.selectedVariations = window.selectedVariations || {};
            window.selectedVariations[variationName] = variationValue;

            console.log('Selected variations:', window.selectedVariations);
        };

        window.showTab = function (tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });

            // Show selected tab
            const targetTab = document.getElementById(tabName + '-tab');
            if (targetTab) {
                targetTab.classList.remove('hidden');
            }

            // Handle YouTube video functionality
            document.querySelectorAll('.video-container').forEach(container => {
                container.addEventListener('click', function() {
                    const videoId = this.getAttribute('data-video-id');
                    const playerContainer = this.nextElementSibling;

                    // Create the iframe
                    const iframe = document.createElement('iframe');
                    iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
                    iframe.setAttribute('frameborder', '0');
                    iframe.setAttribute('allowfullscreen', '1');
                    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                    iframe.style.width = '100%';
                    iframe.style.height = '100%';

                    // Add the iframe to the player container
                    playerContainer.innerHTML = '';
                    playerContainer.appendChild(iframe);

                    // Show the player and hide the thumbnail with play button
                    playerContainer.classList.remove('hidden');
                    this.classList.add('hidden');
                });
            });

            // Update tab buttons - find the clicked button
            const clickedButton = event ? event.target : document.querySelector(`[onclick="showTab('${tabName}')"]`);
            if (clickedButton) {
                // Update all tab buttons
                document.querySelectorAll('.tab-button').forEach(button => {
                    button.classList.remove('border-blue-600', 'text-blue-600');
                    button.classList.add('border-transparent', 'text-gray-500');
                });

                // Update clicked button
                clickedButton.classList.add('border-blue-600', 'text-blue-600');
                clickedButton.classList.remove('border-transparent', 'text-gray-500');
            }
        };
    </script>

<?php endwhile; ?>

<?php get_footer(); ?>
