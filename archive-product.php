<?php get_header(); ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 py-20 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-32 h-32 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
        <div class="absolute top-40 right-20 w-40 h-40 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-20 left-20 w-36 h-36 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-4000"></div>
    </div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
            منتجاتنا المتميزة
        </h1>
        <p class="md:text-xl text-lg text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
            اكتشف مجموعة واسعة من المنتجات عالية الجودة المستوردة بعناية فائقة لتلبية احتياجاتك
        </p>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto">
            <div class="relative">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 search-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text"
                       id="product-search"
                       placeholder="ابحث في المنتجات..."
                       class="block w-full pr-10 pl-4 py-4 text-lg border-0 rounded-2xl bg-white/90 backdrop-blur-sm shadow-lg focus:ring-2 focus:ring-blue-300 focus:bg-white focus:text-blue-800 focus:placeholder-blue-400 transition-all duration-300 text-right text-gray-800 placeholder-gray-500">
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                    <div id="search-loading" class="hidden">
                        <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></div>
                    </div>
                </div>
            </div>

            <!-- Search Results Count -->
            <div id="search-results-count" class="mt-4 text-white/80 text-sm hidden">
                <span id="results-text"></span>
            </div>
        </div>

        <!-- Quick Filter Buttons -->
        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <button class="filter-btn md:text-base text-sm active px-6 py-2 bg-white/20 backdrop-blur-sm text-white rounded-full hover:bg-white/30 transition-all duration-300" data-filter="all">
                جميع المنتجات
            </button>
            <?php
            // Get product categories dynamically
            $product_categories = get_terms(array(
                'taxonomy' => 'product_category',
                'hide_empty' => true,
            ));

            if (!is_wp_error($product_categories) && !empty($product_categories)) :
                foreach ($product_categories as $category) :
            ?>
                <button class="filter-btn md:text-base text-sm px-6 py-2 bg-white/20 backdrop-blur-sm text-white rounded-full hover:bg-white/30 transition-all duration-300" data-filter="<?php echo esc_attr($category->slug); ?>">
                    <?php echo esc_html($category->name); ?>
                </button>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">تصفح منتجاتنا</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <?php if (have_posts()) : ?>
            <!-- Products Grid -->
            <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    // Get product meta data
                    $price = get_post_meta(get_the_ID(), '_product_price', true);
                    $factory_name = get_post_meta(get_the_ID(), '_factory_name', true);
                    $gallery_images = get_post_meta(get_the_ID(), '_product_gallery', true);
                    $whatsapp_number = get_post_meta(get_the_ID(), '_whatsapp_number', true);

                    // Get product categories
                    $product_categories = wp_get_post_terms(get_the_ID(), 'product_category');
                    $category_slugs = !empty($product_categories) ? array_map(function($cat) { return $cat->slug; }, $product_categories) : array();
                    $category_names = !empty($product_categories) ? array_map(function($cat) { return $cat->name; }, $product_categories) : array();

                    // Get featured image
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');

                    // Get first gallery image as fallback
                    $display_image = $featured_image;
                    if (!$display_image && !empty($gallery_images) && is_array($gallery_images)) {
                        $display_image = wp_get_attachment_image_url($gallery_images[0], 'medium');
                    }
                    ?>

                    <div class="product-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden"
                         data-title="<?php echo esc_attr(strtolower(get_the_title())); ?>"
                         data-factory="<?php echo esc_attr(strtolower($factory_name)); ?>"
                         data-price="<?php echo esc_attr($price); ?>"
                         data-categories="<?php echo esc_attr(implode(',', $category_slugs)); ?>">

                        <!-- Product Image -->
                        <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-100 to-gray-200">
                            <?php if ($display_image) : ?>
                                <img src="<?php echo esc_url($display_image); ?>"
                                     alt="<?php the_title(); ?>"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">
                                    <svg class="h-16 w-16 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>

                            <!-- Overlay with Quick Actions -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="flex gap-2">
                                    <a href="<?php the_permalink(); ?>"
                                       class="bg-white text-gray-800 p-3 rounded-full shadow-lg hover:bg-blue-50 transition-colors duration-200">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <?php if ($whatsapp_number) : ?>
                                        <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' '], '', $whatsapp_number)); ?>?text=<?php echo urlencode('مرحباً، أريد الاستفسار عن منتج: ' . get_the_title()); ?>"
                                           target="_blank"
                                           class="bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition-colors duration-200">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.382"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Product Content -->
                        <div class="p-6">
                            <!-- Category and Factory Badges -->
                            <div class="mb-3 flex flex-wrap gap-2">
                                <?php if (!empty($category_names)) : ?>
                                    <?php foreach ($category_names as $category_name) : ?>
                                        <span class="inline-block px-3 py-1 text-xs font-medium text-purple-700 bg-purple-100 rounded-full text-center">
                                            <?php echo esc_html($category_name); ?>
                                        </span>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php if ($factory_name) : ?>
                                    <span class="inline-block px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full text-center">
                                        <?php echo esc_html($factory_name); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Product Title -->
                            <h3 class="md:text-xl text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                <a href="<?php the_permalink(); ?>" class="hover:underline">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <!-- Product Description -->
                            <?php if (has_excerpt()) : ?>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Price and Action -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="" style="direction: ltr;">
                                    <?php if ($price) : ?>
                                        <span class="text-2xl font-bold text-blue-600">
                                            <?php echo esc_html($price); ?> <span class="text-sm text-gray-500">$</span>
                                        </span>
                                    <?php else : ?>
                                        <span class="text-lg font-medium text-gray-500">اتصل للسعر</span>
                                    <?php endif; ?>
                                </div>

                                <a href="<?php the_permalink(); ?>"
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-xl hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-md hover:shadow-lg">
                                    <span>عرض التفاصيل</span>
                                    <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

            <!-- No Search Results Message -->
            <div id="no-results" class="hidden text-center py-16">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">لم يتم العثور على نتائج</h3>
                    <p class="text-gray-500">جرب البحث بكلمات مختلفة أو تصفح جميع المنتجات</p>
                    <button onclick="clearSearch()" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        مسح البحث
                    </button>
                </div>
            </div>

            <!-- Pagination -->
            <?php if (have_posts()) : ?>
                <div id="wp-pagination" class="mt-16 flex justify-center">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<svg class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg> السابق',
                        'next_text' => 'التالي <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>',
                        'before_page_number' => '<span class="pagination-number">',
                        'after_page_number' => '</span>',
                    ));
                    ?>
                </div>

                <!-- Client-side pagination for filtered results -->
                <div id="filter-pagination" class="mt-16 flex justify-center hidden">
                    <nav class="pagination" role="navigation" aria-label="Pagination">
                        <a href="#" id="filter-prev" class="page-numbers prev" style="display: none;">
                            <svg class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            السابق
                        </a>
                        <div id="filter-page-numbers"></div>
                        <a href="#" id="filter-next" class="page-numbers next" style="display: none;">
                            التالي
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </nav>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <!-- No products found -->
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-20 w-20 text-gray-400 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="text-2xl font-medium text-gray-900 mb-3">لا توجد منتجات حالياً</h3>
                    <p class="text-gray-500 mb-8">نعمل على إضافة منتجات جديدة قريباً. تابعونا للحصول على آخر التحديثات.</p>
                    <a href="<?php echo home_url(); ?>"
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                        <svg class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        العودة للرئيسية
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Custom CSS and JavaScript for Live Search -->
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.filter-btn.active {
    background: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(10px);
	font-size: 16px;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.product-card {
    opacity: 1;
    transform: scale(1);
    transition: all 0.3s ease;
}

.product-card.hidden {
    opacity: 0;
    transform: scale(0.95);
    pointer-events: none;
}

/* Modern Pagination Styles */
.pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin: 0;
    padding: 0;
    list-style: none;
}

/* Enhanced Search Bar Styles */
#product-search {
    color: #374151 !important;
    border: 3px solid transparent !important;
    outline: none !important;
}

#product-search::placeholder {
    color: #9ca3af !important;
}

#product-search:focus {
    color: #1e40af !important;
    border: 3px solid #3b82f6 !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1), 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    transform: translateY(-2px);
    outline: none !important;
}

#product-search:focus::placeholder {
    color: #60a5fa !important;
}

/* Search icon styling */
.search-icon {
    color: #6b7280;
    transition: color 0.3s ease;
}

#product-search:focus + div .search-icon {
    color: #2563eb;
}

.pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 8px 16px;
    margin: 0;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    color: #374151;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.pagination .page-numbers:hover {
    color: #2563eb;
    background: #f3f4f6;
    border-color: #d1d5db;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.pagination .page-numbers.current {
    color: #ffffff;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    border-color: #2563eb;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.pagination .page-numbers.prev,
.pagination .page-numbers.next {
    padding: 8px 20px;
    font-weight: 600;
    color: #6b7280;
    background: #ffffff;
    border: 2px solid #e5e7eb;
}

.pagination .page-numbers.prev:hover,
.pagination .page-numbers.next:hover {
    color: #2563eb;
    border-color: #2563eb;
    background: #f8fafc;
}

.pagination .page-numbers.dots {
    border: none;
    background: transparent;
    color: #9ca3af;
    cursor: default;
    box-shadow: none;
}

.pagination .page-numbers.dots:hover {
    background: transparent;
    transform: none;
    box-shadow: none;
}

/* RTL Support for Pagination */
.pagination .page-numbers svg {
    width: 16px;
    height: 16px;
}

/* Responsive Pagination */
@media (max-width: 640px) {
    .pagination {
        gap: 4px;
    }

    .pagination .page-numbers {
        min-width: 40px;
        height: 40px;
        padding: 6px 12px;
        font-size: 13px;
    }

    .pagination .page-numbers.prev,
    .pagination .page-numbers.next {
        padding: 6px 16px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search');
    const searchLoading = document.getElementById('search-loading');
    const resultsCount = document.getElementById('search-results-count');
    const resultsText = document.getElementById('results-text');
    const noResults = document.getElementById('no-results');
    const productsGrid = document.getElementById('products-grid');
    const productCards = document.querySelectorAll('.product-card');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const wpPagination = document.getElementById('wp-pagination');
    const filterPagination = document.getElementById('filter-pagination');

    // Pagination settings
    const itemsPerPage = 6; // Number of products per page for filtered results
    let currentPage = 1;
    let filteredProducts = [];
    let isFiltering = false;

    let searchTimeout;

    // Live search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();

        // Clear previous timeout
        clearTimeout(searchTimeout);

        // Show loading indicator
        searchLoading.classList.remove('hidden');

        // Debounce search
        searchTimeout = setTimeout(() => {
            performSearch(searchTerm);
            searchLoading.classList.add('hidden');
        }, 300);
    });

    function performSearch(searchTerm) {
        isFiltering = searchTerm !== '';
        let visibleProducts = [];

        productCards.forEach(card => {
            const title = card.dataset.title || '';
            const factory = card.dataset.factory || '';

            const isMatch = searchTerm === '' ||
                           title.includes(searchTerm) ||
                           factory.includes(searchTerm);

            if (isMatch) {
                visibleProducts.push(card);
            }
            card.classList.add('hidden'); // Hide all initially
        });

        filteredProducts = visibleProducts;
        currentPage = 1;

        if (isFiltering) {
            showPaginatedResults();
            updatePaginationControls();
        } else {
            // Show all products when no search term
            productCards.forEach(card => card.classList.remove('hidden'));
            showWordPressPagination();
        }

        // Update results count
        updateResultsCount(filteredProducts.length, searchTerm);

        // Show/hide no results message
        if (filteredProducts.length === 0 && searchTerm !== '') {
            noResults.classList.remove('hidden');
            productsGrid.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            productsGrid.classList.remove('hidden');
        }
    }

    function updateResultsCount(count, searchTerm) {
        if (searchTerm === '') {
            resultsCount.classList.add('hidden');
        } else {
            resultsCount.classList.remove('hidden');
            if (count === 0) {
                resultsText.textContent = 'لم يتم العثور على نتائج';
            } else if (count === 1) {
                resultsText.textContent = 'تم العثور على منتج واحد';
            } else {
                resultsText.textContent = `تم العثور على ${count} منتج`;
            }
        }
    }

    // Filter buttons functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.dataset.filter;
            filterProducts(filter);
        });
    });

    function filterProducts(filter) {
        // Clear search input
        searchInput.value = '';
        resultsCount.classList.add('hidden');

        isFiltering = filter !== 'all';
        let visibleProducts = [];

        productCards.forEach(card => {
            if (filter === 'all') {
                visibleProducts.push(card);
            } else {
                // Check if the product belongs to the selected category
                const productCategories = card.dataset.categories || '';
                const categoryArray = productCategories.split(',');

                if (categoryArray.includes(filter)) {
                    visibleProducts.push(card);
                }
            }
            card.classList.add('hidden'); // Hide all initially
        });

        filteredProducts = visibleProducts;
        currentPage = 1;

        if (isFiltering) {
            showPaginatedResults();
            updatePaginationControls();
        } else {
            // Show all products when "all" is selected
            productCards.forEach(card => card.classList.remove('hidden'));
            showWordPressPagination();
        }

        // Show/hide no results message
        if (filteredProducts.length === 0 && filter !== 'all') {
            noResults.classList.remove('hidden');
            productsGrid.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            productsGrid.classList.remove('hidden');
        }
    }

    // Pagination helper functions
    function showPaginatedResults() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        filteredProducts.forEach((card, index) => {
            if (index >= startIndex && index < endIndex) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });

        showFilterPagination();
    }

    function updatePaginationControls() {
        const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
        const pageNumbersContainer = document.getElementById('filter-page-numbers');
        const prevButton = document.getElementById('filter-prev');
        const nextButton = document.getElementById('filter-next');

        // Clear existing page numbers
        pageNumbersContainer.innerHTML = '';

        if (totalPages <= 1) {
            hideFilterPagination();
            return;
        }

        // Show/hide prev button
        if (currentPage > 1) {
            prevButton.style.display = 'inline-flex';
        } else {
            prevButton.style.display = 'none';
        }

        // Show/hide next button
        if (currentPage < totalPages) {
            nextButton.style.display = 'inline-flex';
        } else {
            nextButton.style.display = 'none';
        }

        // Generate page numbers
        const maxVisiblePages = 5;
        let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageButton = document.createElement('a');
            pageButton.href = '#';
            pageButton.className = `page-numbers ${i === currentPage ? 'current' : ''}`;
            pageButton.textContent = i;
            pageButton.addEventListener('click', function(e) {
                e.preventDefault();
                currentPage = i;
                showPaginatedResults();
                updatePaginationControls();
                scrollToTop();
            });
            pageNumbersContainer.appendChild(pageButton);
        }
    }

    function showWordPressPagination() {
        if (wpPagination) wpPagination.style.display = 'flex';
        hideFilterPagination();
    }

    function showFilterPagination() {
        if (wpPagination) wpPagination.style.display = 'none';
        if (filterPagination) filterPagination.classList.remove('hidden');
    }

    function hideFilterPagination() {
        if (filterPagination) filterPagination.classList.add('hidden');
    }

    function scrollToTop() {
        const productsSection = document.querySelector('#products-grid');
        if (productsSection) {
            productsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Pagination button event listeners
    document.getElementById('filter-prev').addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPaginatedResults();
            updatePaginationControls();
            scrollToTop();
        }
    });

    document.getElementById('filter-next').addEventListener('click', function(e) {
        e.preventDefault();
        const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            showPaginatedResults();
            updatePaginationControls();
            scrollToTop();
        }
    });

    // Clear search function
    window.clearSearch = function() {
        searchInput.value = '';
        performSearch('');
        filterButtons[0].click(); // Reset to "all products"
        currentPage = 1;
        isFiltering = false;
        showWordPressPagination();
    };
});
</script>

<?php get_footer(); ?>
