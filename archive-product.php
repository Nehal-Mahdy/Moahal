<?php get_header(); ?>

<div class="bg-white">
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">منتجاتنا</h1>
            <p class="mt-4 text-lg text-gray-600">تصفح مجموعة واسعة من المنتجات عالية الجودة</p>
        </div>

        <?php if (have_posts()) : ?>
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    // Get product meta data
                    $price = get_post_meta(get_the_ID(), '_product_price', true);
                    $factory_name = get_post_meta(get_the_ID(), '_factory_name', true);
                    $gallery_images = get_post_meta(get_the_ID(), '_product_gallery', true);
                    
                    // Get featured image
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    ?>
                    
                    <div class="group relative bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                            <?php if ($featured_image) : ?>
                                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" class="h-64 w-full object-cover object-center group-hover:opacity-75">
                            <?php else : ?>
                                <div class="h-64 w-full bg-gray-300 flex items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <?php if ($factory_name) : ?>
                                <p class="mt-1 text-sm text-gray-500"><?php echo esc_html($factory_name); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($price) : ?>
                                <p class="mt-2 text-lg font-medium text-gray-900"><?php echo esc_html($price); ?> ريال</p>
                            <?php endif; ?>
                            
                            <!-- Short description -->
                            <?php if (has_excerpt()) : ?>
                                <p class="mt-2 text-sm text-gray-600"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <?php endif; ?>
                            
                            <!-- View Details Button -->
                            <div class="mt-4">
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    عرض التفاصيل
                                    <svg class="mr-2 -ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '&larr; السابق',
                    'next_text' => 'التالي &rarr;',
                    'class' => 'pagination flex space-x-2',
                ));
                ?>
            </div>

        <?php else : ?>
            <!-- No products found -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">لا توجد منتجات</h3>
                <p class="mt-1 text-sm text-gray-500">لم يتم العثور على أي منتجات في هذا القسم.</p>
                <div class="mt-6">
                    <a href="<?php echo home_url(); ?>" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        العودة للرئيسية
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
