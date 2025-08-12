<?php
/**
 * Product Post Type
 *
 * Custom post type for products with all related functionality
 *
 * @package Moahal
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Register Custom Post Type for Products
function create_product_post_type() {
    register_post_type('product',
        array(
            'labels' => array(
                'name' => 'Products',
                'singular_name' => 'Product',
                'add_new' => 'Add New Product',
                'add_new_item' => 'Add New Product',
                'edit_item' => 'Edit Product',
                'new_item' => 'New Product',
                'view_item' => 'View Product',
                'search_items' => 'Search Products',
                'not_found' => 'No products found',
                'not_found_in_trash' => 'No products found in Trash'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'products',
                'with_front' => false
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-cart',
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
        )
    );
}
add_action('init', 'create_product_post_type');

// Register Product Categories Taxonomy
function create_product_categories_taxonomy() {
    register_taxonomy(
        'product_category',
        'product',
        array(
            'labels' => array(
                'name' => 'Product Categories',
                'singular_name' => 'Product Category',
                'search_items' => 'Search Categories',
                'all_items' => 'All Categories',
                'parent_item' => 'Parent Category',
                'parent_item_colon' => 'Parent Category:',
                'edit_item' => 'Edit Category',
                'update_item' => 'Update Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => 'New Category Name',
                'menu_name' => 'Categories',
            ),
            'hierarchical' => true, // Like categories (not tags)
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'show_tagcloud' => true,
            'rewrite' => array(
                'slug' => 'product-category',
                'with_front' => false,
                'hierarchical' => true
            ),
        )
    );
}
add_action('init', 'create_product_categories_taxonomy');

// Force flush rewrite rules when needed
function moahal_force_flush_rewrites() {
    if (get_option('moahal_flush_rewrite_rules', false)) {
        flush_rewrite_rules();
        delete_option('moahal_flush_rewrite_rules');
    }
}
add_action('init', 'moahal_force_flush_rewrites');

// Add Meta Boxes for Product Fields
function add_product_meta_boxes() {
    add_meta_box(
        'product_gallery',
        'Product Images Gallery',
        'product_gallery_callback',
        'product',
        'normal',
        'high'
    );

    add_meta_box(
        'product_technical_details',
        'Technical Specifications',
        'product_technical_details_callback',
        'product',
        'normal',
        'high'
    );

    add_meta_box(
        'product_variations',
        'Product Variations',
        'product_variations_callback',
        'product',
        'normal',
        'high'
    );

    add_meta_box(
        'product_shipping_methods',
        'Shipping Methods',
        'product_shipping_methods_callback',
        'product',
        'normal',
        'high'
    );

    add_meta_box(
        'product_reviews',
        'Product Reviews',
        'product_reviews_callback',
        'product',
        'normal',
        'high'
    );

    add_meta_box(
        'product_quantity_options',
        'Quantity Options',
        'product_quantity_options_callback',
        'product',
        'normal',
        'high'
    );

    add_meta_box(
        'product_certificates_gallery',
        'شهادات الجودة والاعتماد',
        'product_certificates_gallery_callback',
        'product',
        'normal',
        'high'
    );

    // Add product details meta box last with a unique ID
    add_meta_box(
        'product_basic_details',
        'Product Details',
        'product_details_callback',
        'product',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_product_meta_boxes');

// Certificates Gallery Meta Box Callback
function product_certificates_gallery_callback($post) {
    wp_nonce_field('save_product_certificates_gallery', 'product_certificates_gallery_nonce');

    $certificate_images = get_post_meta($post->ID, '_product_certificates_gallery', true);
    $certificate_images = $certificate_images ? $certificate_images : array();

    echo '<div id="product-certificates-container">';
    echo '<p><strong>أضف شهادات الجودة والاعتماد لهذا المنتج:</strong></p>';
    echo '<button type="button" class="button" id="add-certificate-image">إضافة شهادة</button>';
    echo '<div id="certificate-images" style="margin-top: 15px;">';

    if (!empty($certificate_images)) {
        foreach ($certificate_images as $index => $image_id) {
            $image_url = wp_get_attachment_image_src($image_id, 'thumbnail')[0];
            echo '<div class="certificate-image-item" style="display: inline-block; margin: 5px; position: relative;">';
            echo '<img src="' . esc_url($image_url) . '" style="width: 150px; height: 150px; object-fit: cover;">';
            echo '<input type="hidden" name="product_certificates_gallery[]" value="' . esc_attr($image_id) . '">';
            echo '<button type="button" class="remove-certificate-image" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>';
            echo '</div>';
        }
    }

    echo '</div>';
    echo '</div>';

    // Add JavaScript for certificates gallery functionality
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Add certificate image functionality
        $('#add-certificate-image').click(function(e) {
            e.preventDefault();

            var image_frame;
            if(image_frame){
                image_frame.open();
            }

            image_frame = wp.media({
                title: 'اختر شهادات الجودة',
                multiple: true,
                library: {
                    type: 'image',
                }
            });

            image_frame.on('close',function() {
                var selection = image_frame.state().get('selection');
                var certificate_ids = [];
                var my_index = 0;
                selection.each(function(attachment) {
                    certificate_ids[my_index] = attachment['id'];
                    my_index++;
                });

                var ids = certificate_ids.join(",");
                if(ids.length > 0) {
                    jQuery.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {
                            ids: ids,
                            action: 'get_certificate_images'
                        },
                        success: function(data) {
                            $('#certificate-images').append(data);
                        }
                    });
                }
            });

            image_frame.on('open',function() {
                var selection = image_frame.state().get('selection');
                var ids = $('#certificate-images input').map(function(){
                    return this.value;
                }).get();

                ids.forEach(function(id) {
                    var attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add( attachment ? [ attachment ] : [] );
                });
            });

            image_frame.open();
        });

        // Remove certificate image functionality
        $(document).on('click', '.remove-certificate-image', function() {
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}

// Force remove any conflicting meta boxes and ensure proper positioning
function remove_conflicting_product_meta_boxes() {
    if (get_current_screen()->post_type === 'product') {
        // Remove any default WordPress meta boxes that might interfere
        remove_meta_box('submitdiv', 'product', 'side');
        remove_meta_box('submitdiv', 'product', 'normal');

        // Re-add the publish meta box to the side where it belongs
        add_meta_box('submitdiv', __('Publish'), 'post_submit_meta_box', 'product', 'side', 'high');

        // Move product categories to a more visible position
        remove_meta_box('product_categorydiv', 'product', 'side');
        add_meta_box('product_categorydiv', 'Product Categories', 'post_categories_meta_box', 'product', 'side', 'high', array('taxonomy' => 'product_category'));
    }
}
add_action('add_meta_boxes', 'remove_conflicting_product_meta_boxes', 99);

// Meta Box Callback Function
function product_details_callback($post) {
    wp_nonce_field('save_product_details', 'product_details_nonce');

    $price = get_post_meta($post->ID, '_product_price', true);
    $factory_name = get_post_meta($post->ID, '_factory_name', true);
    $production_video_url = get_post_meta($post->ID, '_production_video_url', true);
    $whatsapp_number = get_post_meta($post->ID, '_whatsapp_number', true);

    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="product_price">Price</label></th>';
    echo '<td><input type="number" step="0.01" id="product_price" name="product_price" value="' . esc_attr($price) . '" size="25" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="factory_name">Factory Name</label></th>';
    echo '<td><input type="text" id="factory_name" name="factory_name" value="' . esc_attr($factory_name) . '" size="25" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="production_video_url">Production Line Video URL (YouTube)</label></th>';
    echo '<td><input type="url" id="production_video_url" name="production_video_url" value="' . esc_attr($production_video_url) . '" size="60" placeholder="https://www.youtube.com/watch?v=XXXXXXXXXXX" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="whatsapp_number">WhatsApp Number</label></th>';
    echo '<td><input type="text" id="whatsapp_number" name="whatsapp_number" value="' . esc_attr($whatsapp_number) . '" size="25" placeholder="+966123456789" /></td>';
    echo '</tr>';
    echo '</table>';
}

// Product Gallery Meta Box Callback
function product_gallery_callback($post) {
    wp_nonce_field('save_product_gallery', 'product_gallery_nonce');

    $gallery_images = get_post_meta($post->ID, '_product_gallery', true);
    $gallery_images = $gallery_images ? $gallery_images : array();

    echo '<div id="product-gallery-container">';
    echo '<p><strong>Add multiple images for this product:</strong></p>';
    echo '<button type="button" class="button" id="add-gallery-image">Add Image</button>';
    echo '<div id="gallery-images" style="margin-top: 15px;">';

    if (!empty($gallery_images)) {
        foreach ($gallery_images as $index => $image_id) {
            $image_url = wp_get_attachment_image_src($image_id, 'thumbnail')[0];
            echo '<div class="gallery-image-item" style="display: inline-block; margin: 5px; position: relative;">';
            echo '<img src="' . esc_url($image_url) . '" style="width: 150px; height: 150px; object-fit: cover;">';
            echo '<input type="hidden" name="product_gallery[]" value="' . esc_attr($image_id) . '">';
            echo '<button type="button" class="remove-gallery-image" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>';
            echo '</div>';
        }
    }

    echo '</div>';
    echo '</div>';

    // Add JavaScript for gallery functionality
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Add image functionality
        $('#add-gallery-image').click(function(e) {
            e.preventDefault();

            var image_frame;
            if(image_frame){
                image_frame.open();
            }

            image_frame = wp.media({
                title: 'Select Product Images',
                multiple: true,
                library: {
                    type: 'image',
                }
            });

            image_frame.on('close',function() {
                var selection =  image_frame.state().get('selection');
                var gallery_ids = [];
                var my_index = 0;
                selection.each(function(attachment) {
                    gallery_ids[my_index] = attachment['id'];
                    my_index++;
                });

                var ids = gallery_ids.join(",");
                if(ids.length > 0) {
                    jQuery.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {
                            ids: ids,
                            action: 'get_gallery_images'
                        },
                        success: function(data) {
                            $('#gallery-images').append(data);
                        }
                    });
                }
            });

            image_frame.on('open',function() {
                var selection =  image_frame.state().get('selection');
                var ids = $('#gallery-images input').map(function(){
                    return this.value;
                }).get();

                ids.forEach(function(id) {
                    var attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add( attachment ? [ attachment ] : [] );
                });
            });

            image_frame.open();
        });

        // Remove image functionality
        $(document).on('click', '.remove-gallery-image', function() {
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}

// Product Technical Details Meta Box Callback
function product_technical_details_callback($post) {
    wp_nonce_field('save_product_technical_details', 'product_technical_details_nonce');

    $technical_details = get_post_meta($post->ID, '_product_technical_details', true);
    $technical_details = $technical_details ? $technical_details : array();

    echo '<div id="product-technical-details-container">';
    echo '<p><strong>Add technical specifications as key-value pairs:</strong></p>';
    echo '<button type="button" class="button" id="add-technical-detail">Add Specification</button>';
    echo '<div id="technical-details" style="margin-top: 15px;">';

    if (!empty($technical_details)) {
        foreach ($technical_details as $index => $detail) {
            echo '<div class="technical-detail-item" style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">';
            echo '<div style="display: flex; gap: 10px; align-items: center;">';
            echo '<input type="text" name="technical_detail_key[]" value="' . esc_attr($detail['key']) . '" placeholder="Specification Name (e.g., Screen Size)" style="width: 40%;" />';
            echo '<input type="text" name="technical_detail_value[]" value="' . esc_attr($detail['value']) . '" placeholder="Value (e.g., 32-75 inches)" style="width: 40%;" />';
            echo '<button type="button" class="button-link-delete remove-technical-detail" style="color: red;">Remove</button>';
            echo '</div>';
            echo '</div>';
        }
    }

    echo '</div>';
    echo '</div>';

    // Add JavaScript for technical details functionality
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Add technical detail functionality
        $('#add-technical-detail').click(function(e) {
            e.preventDefault();

            var newDetail = '<div class="technical-detail-item" style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">' +
                           '<div style="display: flex; gap: 10px; align-items: center;">' +
                           '<input type="text" name="technical_detail_key[]" value="" placeholder="Specification Name (e.g., Screen Size)" style="width: 40%;" />' +
                           '<input type="text" name="technical_detail_value[]" value="" placeholder="Value (e.g., 32-75 inches)" style="width: 40%;" />' +
                           '<button type="button" class="button-link-delete remove-technical-detail" style="color: red;">Remove</button>' +
                           '</div>' +
                           '</div>';

            $('#technical-details').append(newDetail);
        });

        // Remove technical detail functionality
        $(document).on('click', '.remove-technical-detail', function() {
            $(this).closest('.technical-detail-item').remove();
        });
    });
    </script>
    <?php
}

// Product Variations Meta Box Callback
function product_variations_callback($post) {
    wp_nonce_field('save_product_variations', 'product_variations_nonce');

    $product_variations = get_post_meta($post->ID, '_product_variations', true);
    $product_variations = $product_variations ? $product_variations : array();

    echo '<div id="product-variations-container">';
    echo '<p><strong>Add product variations (e.g., Colors, Sizes, Materials):</strong></p>';
    echo '<button type="button" class="button" id="add-variation">Add Variation</button>';
    echo '<div id="variations-list" style="margin-top: 15px;">';

    if (!empty($product_variations)) {
        foreach ($product_variations as $variation_index => $variation) {
            echo '<div class="variation-item" style="margin-bottom: 20px; padding: 15px; border: 2px solid #ddd; border-radius: 8px; background: #f9f9f9;">';
            echo '<div style="margin-bottom: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Variation Name:</label>';
            echo '<input type="text" name="variation_name[]" value="' . esc_attr($variation['name']) . '" placeholder="e.g., Color, Size, Material" style="width: 300px;" />';
            echo '<label style="margin-left: 20px;"><input type="checkbox" name="variation_is_color[' . $variation_index . ']" value="1" ' . (isset($variation['is_color']) && $variation['is_color'] ? 'checked' : '') . '> This is a color variation</label>';
            echo '<button type="button" class="button-link-delete remove-variation" style="color: red; margin-left: 10px;">Remove Variation</button>';
            echo '</div>';

            echo '<div class="variation-values" style="margin-top: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Values:</label>';
            echo '<button type="button" class="button add-variation-value">Add Value</button>';
            echo '<div class="values-list" style="margin-top: 10px;">';

            if (!empty($variation['values'])) {
                foreach ($variation['values'] as $value_index => $value) {
                    echo '<div class="value-item" style="margin-bottom: 8px; display: flex; align-items: center; gap: 10px;">';
                    echo '<input type="text" name="variation_values[' . $variation_index . '][]" value="' . esc_attr($value) . '" placeholder="Value (for colors use hex code like #FF0000)" style="width: 200px;" />';
                    if (isset($variation['is_color']) && $variation['is_color']) {
                        echo '<div class="color-preview" style="width: 30px; height: 30px; border: 1px solid #ccc; border-radius: 4px; background-color: ' . esc_attr($value) . ';"></div>';
                    }
                    echo '<button type="button" class="button-link-delete remove-value" style="color: red;">Remove</button>';
                    echo '</div>';
                }
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

    echo '</div>';
    echo '</div>';

    // Add JavaScript for variations functionality
    ?>
    <script>
    jQuery(document).ready(function($) {
        var variationIndex = <?php echo count($product_variations); ?>;

        // Add variation functionality
        $('#add-variation').click(function(e) {
            e.preventDefault();

            var newVariation = '<div class="variation-item" style="margin-bottom: 20px; padding: 15px; border: 2px solid #ddd; border-radius: 8px; background: #f9f9f9;">' +
                              '<div style="margin-bottom: 10px;">' +
                              '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Variation Name:</label>' +
                              '<input type="text" name="variation_name[]" value="" placeholder="e.g., Color, Size, Material" style="width: 300px;" />' +
                              '<label style="margin-left: 20px;"><input type="checkbox" name="variation_is_color[' + variationIndex + ']" value="1"> This is a color variation</label>' +
                              '<button type="button" class="button-link-delete remove-variation" style="color: red; margin-left: 10px;">Remove Variation</button>' +
                              '</div>' +
                              '<div class="variation-values" style="margin-top: 10px;">' +
                              '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Values:</label>' +
                              '<button type="button" class="button add-variation-value">Add Value</button>' +
                              '<div class="values-list" style="margin-top: 10px;"></div>' +
                              '</div>' +
                              '</div>';

            $('#variations-list').append(newVariation);
            variationIndex++;
        });

        // Remove variation functionality
        $(document).on('click', '.remove-variation', function() {
            $(this).closest('.variation-item').remove();
        });

        // Add variation value functionality
        $(document).on('click', '.add-variation-value', function() {
            var variationItem = $(this).closest('.variation-item');
            var variationIdx = variationItem.index();
            var isColor = variationItem.find('input[type="checkbox"]').is(':checked');

            var colorPreview = isColor ? '<div class="color-preview" style="width: 30px; height: 30px; border: 1px solid #ccc; border-radius: 4px; background-color: #ffffff;"></div>' : '';

            var newValue = '<div class="value-item" style="margin-bottom: 8px; display: flex; align-items: center; gap: 10px;">' +
                          '<input type="text" name="variation_values[' + variationIdx + '][]" value="" placeholder="Value (for colors use hex code like #FF0000)" style="width: 200px;" />' +
                          colorPreview +
                          '<button type="button" class="button-link-delete remove-value" style="color: red;">Remove</button>' +
                          '</div>';

            $(this).siblings('.values-list').append(newValue);
        });

        // Remove variation value functionality
        $(document).on('click', '.remove-value', function() {
            $(this).closest('.value-item').remove();
        });

        // Update color preview when color input changes
        $(document).on('input', 'input[type="text"]', function() {
            var colorPreview = $(this).siblings('.color-preview');
            if (colorPreview.length && $(this).val().match(/^#[0-9A-F]{6}$/i)) {
                colorPreview.css('background-color', $(this).val());
            }
        });

        // Toggle color preview when checkbox changes
        $(document).on('change', 'input[type="checkbox"]', function() {
            var variationItem = $(this).closest('.variation-item');
            var valueItems = variationItem.find('.value-item');

            if ($(this).is(':checked')) {
                valueItems.each(function() {
                    if (!$(this).find('.color-preview').length) {
                        var input = $(this).find('input[type="text"]');
                        var colorValue = input.val() || '#ffffff';
                        var colorPreview = '<div class="color-preview" style="width: 30px; height: 30px; border: 1px solid #ccc; border-radius: 4px; background-color: ' + colorValue + ';"></div>';
                        input.after(colorPreview);
                    }
                });
            } else {
                valueItems.find('.color-preview').remove();
            }
        });
    });
    </script>
    <?php
}

// Product Shipping Methods Meta Box Callback
function product_shipping_methods_callback($post) {
    wp_nonce_field('save_product_shipping_methods', 'product_shipping_methods_nonce');

    $selected_shipping_methods = get_post_meta($post->ID, '_product_shipping_methods', true);
    $selected_shipping_methods = $selected_shipping_methods ? $selected_shipping_methods : array();

    // Define available shipping methods
    $available_shipping_methods = array(
        'express' => array(
            'name' => 'شحن سريع (1-2 أيام)',
            'description' => 'توصيل سريع خلال يوم إلى يومين عمل'
        ),
        'standard' => array(
            'name' => 'شحن عادي (3-5 أيام)',
            'description' => 'توصيل عادي خلال 3 إلى 5 أيام عمل'
        ),
        'economy' => array(
            'name' => 'شحن اقتصادي (5-7 أيام)',
            'description' => 'توصيل اقتصادي خلال 5 إلى 7 أيام عمل'
        ),
        'pickup' => array(
            'name' => 'استلام من المعرض',
            'description' => 'استلام المنتج مباشرة من المعرض'
        ),
        'sea_freight' => array(
            'name' => 'شحن بحري (15-30 يوم)',
            'description' => 'شحن بحري للكميات الكبيرة'
        ),
        'air_freight' => array(
            'name' => 'شحن جوي (3-7 أيام)',
            'description' => 'شحن جوي سريع للكميات المتوسطة'
        ),
        'custom' => array(
            'name' => 'طريقة شحن مخصصة',
            'description' => 'طريقة شحن يتم تحديدها حسب الطلب'
        )
    );

    echo '<div id="product-shipping-methods-container">';
    echo '<p><strong>اختر طرق الشحن المتاحة لهذا المنتج:</strong></p>';
    echo '<div style="margin-top: 15px;">';

    foreach ($available_shipping_methods as $method_key => $method_info) {
        $checked = in_array($method_key, $selected_shipping_methods) ? 'checked' : '';

        echo '<div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background: #f9f9f9;">';
        echo '<label style="display: flex; align-items: flex-start; cursor: pointer;">';
        echo '<input type="checkbox" name="product_shipping_methods[]" value="' . esc_attr($method_key) . '" ' . $checked . ' style="margin-top: 2px; margin-left: 10px;">';
        echo '<div>';
        echo '<strong>' . esc_html($method_info['name']) . '</strong>';
        echo '<br><small style="color: #666;">' . esc_html($method_info['description']) . '</small>';
        echo '</div>';
        echo '</label>';
        echo '</div>';
    }

    echo '</div>';
    echo '<div style="margin-top: 20px; padding: 15px; background: #e7f3ff; border: 1px solid #bee5eb; border-radius: 5px;">';
    echo '<p style="margin: 0; color: #0c5460;"><strong>ملاحظة:</strong> طرق الشحن المحددة هنا ستظهر في نموذج الطلب على صفحة المنتج.</p>';
    echo '</div>';
    echo '</div>';
}

// Product Reviews Meta Box Callback
function product_reviews_callback($post) {
    wp_nonce_field('save_product_reviews', 'product_reviews_nonce');

    $product_reviews = get_post_meta($post->ID, '_product_reviews', true);
    $product_reviews = $product_reviews ? $product_reviews : array();

    echo '<div id="product-reviews-container">';
    echo '<p><strong>Add customer reviews for this product:</strong></p>';
    echo '<button type="button" class="button" id="add-review">Add Review</button>';
    echo '<div id="reviews-list" style="margin-top: 15px;">';

    if (!empty($product_reviews)) {
        foreach ($product_reviews as $review_index => $review) {
            echo '<div class="review-item" style="margin-bottom: 20px; padding: 15px; border: 2px solid #ddd; border-radius: 8px; background: #f9f9f9;">';

            // Review Header
            echo '<div style="display: flex; justify-content: between; align-items: center; margin-bottom: 15px;">';
            echo '<h4 style="margin: 0;">Review #' . ($review_index + 1) . '</h4>';
            echo '<button type="button" class="button-link-delete remove-review" style="color: red; margin-left: auto;">Remove Review</button>';
            echo '</div>';

            // Reviewer Name
            echo '<div style="margin-bottom: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Reviewer Name:</label>';
            echo '<input type="text" name="review_name[]" value="' . esc_attr($review['name']) . '" placeholder="e.g., Ahmed Ali" style="width: 300px;" />';
            echo '</div>';

            // Rating
            echo '<div style="margin-bottom: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Rating (1-5 stars):</label>';
            echo '<select name="review_rating[]" style="width: 100px;">';
            for ($i = 1; $i <= 5; $i++) {
                $selected = (isset($review['rating']) && $review['rating'] == $i) ? 'selected' : '';
                echo '<option value="' . $i . '" ' . $selected . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
            }
            echo '</select>';
            echo '</div>';

            // Review Content
            echo '<div style="margin-bottom: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Review Content:</label>';
            echo '<textarea name="review_content[]" rows="4" style="width: 100%;" placeholder="Write the review content here...">' . esc_textarea($review['content']) . '</textarea>';
            echo '</div>';

            // Review Date
            echo '<div style="margin-bottom: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Review Date:</label>';
            echo '<input type="date" name="review_date[]" value="' . esc_attr($review['date']) . '" style="width: 200px;" />';
            echo '</div>';

            // Reviewer Avatar Image
            echo '<div style="margin-bottom: 10px;">';
            echo '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Reviewer Avatar:</label>';

            if (!empty($review['avatar_id'])) {
                $avatar_url = wp_get_attachment_image_src($review['avatar_id'], 'thumbnail')[0];
                echo '<div class="review-avatar-preview" style="margin-bottom: 10px;">';
                echo '<img src="' . esc_url($avatar_url) . '" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">';
                echo '<br><button type="button" class="button remove-review-avatar" style="margin-top: 5px;">Remove Avatar</button>';
                echo '</div>';
            }

            echo '<button type="button" class="button select-review-avatar">Select Avatar Image</button>';
            echo '<input type="hidden" name="review_avatar_id[]" class="review-avatar-id" value="' . esc_attr($review['avatar_id']) . '" />';
            echo '</div>';

            echo '</div>';
        }
    }

    echo '</div>';
    echo '</div>';

    // Add JavaScript for reviews functionality
    ?>
    <script>
    jQuery(document).ready(function($) {
        var reviewIndex = <?php echo count($product_reviews); ?>;

        // Add review functionality
        $('#add-review').click(function(e) {
            e.preventDefault();

            reviewIndex++;
            var newReview = '<div class="review-item" style="margin-bottom: 20px; padding: 15px; border: 2px solid #ddd; border-radius: 8px; background: #f9f9f9;">' +
                           '<div style="display: flex; justify-content: between; align-items: center; margin-bottom: 15px;">' +
                           '<h4 style="margin: 0;">Review #' + reviewIndex + '</h4>' +
                           '<button type="button" class="button-link-delete remove-review" style="color: red; margin-left: auto;">Remove Review</button>' +
                           '</div>' +
                           '<div style="margin-bottom: 10px;">' +
                           '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Reviewer Name:</label>' +
                           '<input type="text" name="review_name[]" value="" placeholder="e.g., Ahmed Ali" style="width: 300px;" />' +
                           '</div>' +
                           '<div style="margin-bottom: 10px;">' +
                           '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Rating (1-5 stars):</label>' +
                           '<select name="review_rating[]" style="width: 100px;">' +
                           '<option value="1">1 Star</option>' +
                           '<option value="2">2 Stars</option>' +
                           '<option value="3">3 Stars</option>' +
                           '<option value="4">4 Stars</option>' +
                           '<option value="5" selected>5 Stars</option>' +
                           '</select>' +
                           '</div>' +
                           '<div style="margin-bottom: 10px;">' +
                           '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Review Content:</label>' +
                           '<textarea name="review_content[]" rows="4" style="width: 100%;" placeholder="Write the review content here..."></textarea>' +
                           '</div>' +
                           '<div style="margin-bottom: 10px;">' +
                           '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Review Date:</label>' +
                           '<input type="date" name="review_date[]" value="<?php echo date('Y-m-d'); ?>" style="width: 200px;" />' +
                           '</div>' +
                           '<div style="margin-bottom: 10px;">' +
                           '<label style="display: block; margin-bottom: 5px; font-weight: bold;">Reviewer Avatar:</label>' +
                           '<button type="button" class="button select-review-avatar">Select Avatar Image</button>' +
                           '<input type="hidden" name="review_avatar_id[]" class="review-avatar-id" value="" />' +
                           '</div>' +
                           '</div>';

            $('#reviews-list').append(newReview);
        });

        // Remove review functionality
        $(document).on('click', '.remove-review', function() {
            $(this).closest('.review-item').remove();
        });

        // Select avatar image functionality
        $(document).on('click', '.select-review-avatar', function() {
            var button = $(this);
            var reviewItem = button.closest('.review-item');
            var hiddenInput = reviewItem.find('.review-avatar-id');

            var image_frame = wp.media({
                title: 'Select Reviewer Avatar',
                multiple: false,
                library: {
                    type: 'image',
                }
            });

            image_frame.on('select', function() {
                var attachment = image_frame.state().get('selection').first().toJSON();
                hiddenInput.val(attachment.id);

                // Remove existing preview
                reviewItem.find('.review-avatar-preview').remove();

                // Add new preview
                var preview = '<div class="review-avatar-preview" style="margin-bottom: 10px;">' +
                             '<img src="' + attachment.sizes.thumbnail.url + '" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">' +
                             '<br><button type="button" class="button remove-review-avatar" style="margin-top: 5px;">Remove Avatar</button>' +
                             '</div>';
                button.before(preview);
            });

            image_frame.open();
        });

        // Remove avatar functionality
        $(document).on('click', '.remove-review-avatar', function() {
            var reviewItem = $(this).closest('.review-item');
            reviewItem.find('.review-avatar-id').val('');
            $(this).closest('.review-avatar-preview').remove();
        });
    });
    </script>
    <?php
}

// Product Quantity Options Meta Box Callback
function product_quantity_options_callback($post) {
    wp_nonce_field('save_product_quantity_options', 'product_quantity_options_nonce');

    $selected_quantity_options = get_post_meta($post->ID, '_product_quantity_options', true);
    $selected_quantity_options = $selected_quantity_options ? $selected_quantity_options : array();

    // Define available quantity options
    $available_quantity_options = array(
        '1' => array(
            'name' => 'قطعة واحدة',
            'description' => 'طلب قطعة واحدة فقط'
        ),
        '1-5' => array(
            'name' => '1-5 قطع',
            'description' => 'كمية صغيرة من 1 إلى 5 قطع'
        ),
        '10-50' => array(
            'name' => '10-50 قطعة',
            'description' => 'كمية متوسطة من 10 إلى 50 قطعة'
        ),
        '100-500' => array(
            'name' => '100-500 قطعة',
            'description' => 'كمية كبيرة من 100 إلى 500 قطعة'
        ),
        '1000+' => array(
            'name' => '1000+ قطعة',
            'description' => 'كمية جملة أكثر من 1000 قطعة'
        ),
        'custom' => array(
            'name' => 'كمية مخصصة',
            'description' => 'كمية محددة حسب الطلب'
        )
    );

    echo '<div id="product-quantity-options-container">';
    echo '<p><strong>اختر خيارات الكمية المتاحة لهذا المنتج:</strong></p>';
    echo '<div style="margin-top: 15px;">';

    foreach ($available_quantity_options as $option_key => $option_info) {
        $checked = in_array($option_key, $selected_quantity_options) ? 'checked' : '';

        echo '<div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background: #f9f9f9;">';
        echo '<label style="display: flex; align-items: flex-start; cursor: pointer;">';
        echo '<input type="checkbox" name="product_quantity_options[]" value="' . esc_attr($option_key) . '" ' . $checked . ' style="margin-top: 2px; margin-left: 10px;">';
        echo '<div>';
        echo '<strong>' . esc_html($option_info['name']) . '</strong>';
        echo '<br><small style="color: #666;">' . esc_html($option_info['description']) . '</small>';
        echo '</div>';
        echo '</label>';
        echo '</div>';
    }

    echo '</div>';
    echo '<div style="margin-top: 20px; padding: 15px; background: #e7f3ff; border: 1px solid #bee5eb; border-radius: 5px;">';
    echo '<p style="margin: 0; color: #0c5460;"><strong>ملاحظة:</strong> خيارات الكمية المحددة هنا ستظهر في نموذج الطلب على صفحة المنتج.</p>';
    echo '</div>';
    echo '</div>';
}

// AJAX handler for getting gallery images
add_action('wp_ajax_get_gallery_images', 'get_gallery_images_callback');
function get_gallery_images_callback() {
    $ids = explode(',', $_POST['ids']);
    $html = '';

    foreach($ids as $id) {
        $image_url = wp_get_attachment_image_src($id, 'thumbnail')[0];
        $html .= '<div class="gallery-image-item" style="display: inline-block; margin: 5px; position: relative;">';
        $html .= '<img src="' . esc_url($image_url) . '" style="width: 150px; height: 150px; object-fit: cover;">';
        $html .= '<input type="hidden" name="product_gallery[]" value="' . esc_attr($id) . '">';
        $html .= '<button type="button" class="remove-gallery-image" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>';
        $html .= '</div>';
    }

    echo $html;
    wp_die();
}

// AJAX handler for getting certificate images
add_action('wp_ajax_get_certificate_images', 'get_certificate_images_callback');
function get_certificate_images_callback() {
    $ids = explode(',', $_POST['ids']);
    $html = '';

    foreach($ids as $id) {
        $image_url = wp_get_attachment_image_src($id, 'thumbnail')[0];
        $html .= '<div class="certificate-image-item" style="display: inline-block; margin: 5px; position: relative;">';
        $html .= '<img src="' . esc_url($image_url) . '" style="width: 150px; height: 150px; object-fit: cover;">';
        $html .= '<input type="hidden" name="product_certificates_gallery[]" value="' . esc_attr($id) . '">';
        $html .= '<button type="button" class="remove-certificate-image" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>';
        $html .= '</div>';
    }

    echo $html;
    wp_die();
}

// Save Product Meta Data
function save_product_details($post_id) {
    // Check if this is a product post type
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    // Check for main product details nonce OR variations nonce
    $has_main_nonce = isset($_POST['product_details_nonce']) && wp_verify_nonce($_POST['product_details_nonce'], 'save_product_details');
    $has_variations_nonce = isset($_POST['product_variations_nonce']) && wp_verify_nonce($_POST['product_variations_nonce'], 'save_product_variations');
    $has_technical_nonce = isset($_POST['product_technical_details_nonce']) && wp_verify_nonce($_POST['product_technical_details_nonce'], 'save_product_technical_details');
    $has_shipping_nonce = isset($_POST['product_shipping_methods_nonce']) && wp_verify_nonce($_POST['product_shipping_methods_nonce'], 'save_product_shipping_methods');
    $has_reviews_nonce = isset($_POST['product_reviews_nonce']) && wp_verify_nonce($_POST['product_reviews_nonce'], 'save_product_reviews');
    $has_quantity_nonce = isset($_POST['product_quantity_options_nonce']) && wp_verify_nonce($_POST['product_quantity_options_nonce'], 'save_product_quantity_options');

    if (!$has_main_nonce && !$has_variations_nonce && !$has_technical_nonce && !$has_shipping_nonce && !$has_reviews_nonce && !$has_quantity_nonce) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['product_price'])) {
        update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
    }

    if (isset($_POST['factory_name'])) {
        update_post_meta($post_id, '_factory_name', sanitize_text_field($_POST['factory_name']));
    }

    if (isset($_POST['production_video_url'])) {
        update_post_meta($post_id, '_production_video_url', esc_url_raw($_POST['production_video_url']));
    }

    if (isset($_POST['whatsapp_number'])) {
        update_post_meta($post_id, '_whatsapp_number', sanitize_text_field($_POST['whatsapp_number']));
    }

    // Save gallery images
    if (isset($_POST['product_gallery'])) {
        $gallery_images = array_map('intval', $_POST['product_gallery']);
        update_post_meta($post_id, '_product_gallery', $gallery_images);
    } else {
        delete_post_meta($post_id, '_product_gallery');
    }

    // Save technical details
    if (isset($_POST['technical_detail_key']) && isset($_POST['technical_detail_value'])) {
        $technical_details = array();
        $keys = $_POST['technical_detail_key'];
        $values = $_POST['technical_detail_value'];

        for ($i = 0; $i < count($keys); $i++) {
            if (!empty($keys[$i]) && !empty($values[$i])) {
                $technical_details[] = array(
                    'key' => sanitize_text_field($keys[$i]),
                    'value' => sanitize_text_field($values[$i])
                );
            }
        }

        if (!empty($technical_details)) {
            update_post_meta($post_id, '_product_technical_details', $technical_details);
        } else {
            delete_post_meta($post_id, '_product_technical_details');
        }
    } else {
        delete_post_meta($post_id, '_product_technical_details');
    }

    // Save product variations (only if variations nonce is valid)
    if (isset($_POST['product_variations_nonce']) && wp_verify_nonce($_POST['product_variations_nonce'], 'save_product_variations') && isset($_POST['variation_name'])) {
        $variations = array();
        $variation_names = $_POST['variation_name'];
        $variation_is_color = isset($_POST['variation_is_color']) ? $_POST['variation_is_color'] : array();
        $variation_values = isset($_POST['variation_values']) ? $_POST['variation_values'] : array();

        for ($i = 0; $i < count($variation_names); $i++) {
            if (!empty($variation_names[$i])) {
                $variation = array(
                    'name' => sanitize_text_field($variation_names[$i]),
                    'is_color' => isset($variation_is_color[$i]) ? true : false,
                    'values' => array()
                );

                if (isset($variation_values[$i]) && is_array($variation_values[$i])) {
                    foreach ($variation_values[$i] as $value) {
                        if (!empty($value)) {
                            $variation['values'][] = sanitize_text_field($value);
                        }
                    }
                }

                if (!empty($variation['values'])) {
                    $variations[] = $variation;
                }
            }
        }

        if (!empty($variations)) {
            update_post_meta($post_id, '_product_variations', $variations);
        } else {
            delete_post_meta($post_id, '_product_variations');
        }
    }

    // Save shipping methods
    if (isset($_POST['product_shipping_methods_nonce']) && wp_verify_nonce($_POST['product_shipping_methods_nonce'], 'save_product_shipping_methods')) {
        if (isset($_POST['product_shipping_methods']) && is_array($_POST['product_shipping_methods'])) {
            $shipping_methods = array_map('sanitize_text_field', $_POST['product_shipping_methods']);
            update_post_meta($post_id, '_product_shipping_methods', $shipping_methods);
        } else {
            delete_post_meta($post_id, '_product_shipping_methods');
        }
    }

    // Save product reviews
    if (isset($_POST['product_reviews_nonce']) && wp_verify_nonce($_POST['product_reviews_nonce'], 'save_product_reviews')) {
        if (isset($_POST['review_name']) && is_array($_POST['review_name'])) {
            $reviews = array();
            $review_names = $_POST['review_name'];
            $review_ratings = isset($_POST['review_rating']) ? $_POST['review_rating'] : array();
            $review_contents = isset($_POST['review_content']) ? $_POST['review_content'] : array();
            $review_dates = isset($_POST['review_date']) ? $_POST['review_date'] : array();
            $review_avatar_ids = isset($_POST['review_avatar_id']) ? $_POST['review_avatar_id'] : array();

            for ($i = 0; $i < count($review_names); $i++) {
                if (!empty($review_names[$i]) && !empty($review_contents[$i])) {
                    $review = array(
                        'name' => sanitize_text_field($review_names[$i]),
                        'rating' => isset($review_ratings[$i]) ? intval($review_ratings[$i]) : 5,
                        'content' => sanitize_textarea_field($review_contents[$i]),
                        'date' => isset($review_dates[$i]) ? sanitize_text_field($review_dates[$i]) : date('Y-m-d'),
                        'avatar_id' => isset($review_avatar_ids[$i]) ? intval($review_avatar_ids[$i]) : 0
                    );

                    $reviews[] = $review;
                }
            }

            if (!empty($reviews)) {
                update_post_meta($post_id, '_product_reviews', $reviews);
            } else {
                delete_post_meta($post_id, '_product_reviews');
            }
        } else {
            delete_post_meta($post_id, '_product_reviews');
        }
    }

    // Save quantity options
    if (isset($_POST['product_quantity_options_nonce']) && wp_verify_nonce($_POST['product_quantity_options_nonce'], 'save_product_quantity_options')) {
        if (isset($_POST['product_quantity_options']) && is_array($_POST['product_quantity_options'])) {
            $quantity_options = array_map('sanitize_text_field', $_POST['product_quantity_options']);
            update_post_meta($post_id, '_product_quantity_options', $quantity_options);
        } else {
            delete_post_meta($post_id, '_product_quantity_options');
        }
    }

    // Save certificates gallery
    if (isset($_POST['product_certificates_gallery_nonce']) && wp_verify_nonce($_POST['product_certificates_gallery_nonce'], 'save_product_certificates_gallery')) {
        if (isset($_POST['product_certificates_gallery']) && is_array($_POST['product_certificates_gallery'])) {
            $certificate_images = array_map('intval', $_POST['product_certificates_gallery']);
            update_post_meta($post_id, '_product_certificates_gallery', $certificate_images);
        } else {
            delete_post_meta($post_id, '_product_certificates_gallery');
        }
    }
}
add_action('save_post', 'save_product_details');

// Flush rewrite rules on theme activation
function moahal_flush_rewrites() {
    create_product_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'moahal_flush_rewrites');

// Add duplicate product functionality
function add_duplicate_product_action($actions, $post) {
    if ($post->post_type === 'product' && current_user_can('edit_posts')) {
        $duplicate_url = wp_nonce_url(
            admin_url('admin.php?action=duplicate_product&post=' . $post->ID),
            'duplicate_product_' . $post->ID
        );

        $actions['duplicate'] = sprintf(
            '<a href="%s" title="%s">%s</a>',
            $duplicate_url,
            esc_attr__('Duplicate this product'),
            __('Duplicate')
        );
    }
    return $actions;
}
add_filter('post_row_actions', 'add_duplicate_product_action', 10, 2);

// Handle duplicate product action
function handle_duplicate_product_action() {
    if (!isset($_GET['action']) || $_GET['action'] !== 'duplicate_product') {
        return;
    }

    if (!isset($_GET['post']) || !is_numeric($_GET['post'])) {
        wp_die('Invalid product ID.');
    }

    $post_id = intval($_GET['post']);

    if (!wp_verify_nonce($_GET['_wpnonce'], 'duplicate_product_' . $post_id)) {
        wp_die('Security check failed.');
    }

    if (!current_user_can('edit_posts')) {
        wp_die('You do not have permission to duplicate products.');
    }

    $original_post = get_post($post_id);

    if (!$original_post || $original_post->post_type !== 'product') {
        wp_die('Invalid product.');
    }

    // Create the duplicate post
    $new_post_args = array(
        'post_title'     => $original_post->post_title . ' (Copy)',
        'post_content'   => $original_post->post_content,
        'post_excerpt'   => $original_post->post_excerpt,
        'post_status'    => 'draft', // Set as draft for review
        'post_type'      => $original_post->post_type,
        'post_author'    => get_current_user_id(),
        'post_parent'    => $original_post->post_parent,
        'menu_order'     => $original_post->menu_order
    );

    $new_post_id = wp_insert_post($new_post_args);

    if (is_wp_error($new_post_id)) {
        wp_die('Failed to duplicate product: ' . $new_post_id->get_error_message());
    }

    // Duplicate all meta data
    $meta_keys = array(
        '_product_price',
        '_factory_name',
        '_production_video_url',
        '_whatsapp_number',
        '_product_gallery',
        '_product_technical_details',
        '_product_variations',
        '_product_shipping_methods',
        '_product_reviews',
        '_product_quantity_options',
        '_product_certificates_gallery'
    );

    foreach ($meta_keys as $meta_key) {
        $meta_value = get_post_meta($post_id, $meta_key, true);
        if (!empty($meta_value)) {
            update_post_meta($new_post_id, $meta_key, $meta_value);
        }
    }

    // Duplicate featured image
    $featured_image_id = get_post_thumbnail_id($post_id);
    if ($featured_image_id) {
        set_post_thumbnail($new_post_id, $featured_image_id);
    }

    // Duplicate taxonomies (product categories)
    $taxonomies = array('product_category');
    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_post_terms($post_id, $taxonomy, array('fields' => 'ids'));
        if (!empty($terms) && !is_wp_error($terms)) {
            wp_set_post_terms($new_post_id, $terms, $taxonomy);
        }
    }

    // Redirect to edit the new product
    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_duplicate_product', 'handle_duplicate_product_action');

// Add duplicate button to product edit page
function add_duplicate_button_to_product_edit() {
    global $post;

    if ($post && $post->post_type === 'product' && $post->post_status !== 'auto-draft') {
        $duplicate_url = wp_nonce_url(
            admin_url('admin.php?action=duplicate_product&post=' . $post->ID),
            'duplicate_product_' . $post->ID
        );
        ?>
        <script>
        jQuery(document).ready(function($) {
            // Add duplicate button next to the "Move to Trash" button
            $('#delete-action').after(
                '<div id="duplicate-action">' +
                '<a class="submitduplicate duplication" href="<?php echo esc_url($duplicate_url); ?>" style="color: #2271b1; text-decoration: none;">' +
                'Duplicate Product' +
                '</a>' +
                '</div>'
            );

            // Add some spacing
            $('#duplicate-action').css({
                'margin-top': '10px',
                'padding-top': '10px',
                'border-top': '1px solid #ddd'
            });
        });
        </script>
        <?php
    }
}
add_action('admin_footer-post.php', 'add_duplicate_button_to_product_edit');

// Add bulk duplicate action
function add_bulk_duplicate_action($bulk_actions) {
    $bulk_actions['duplicate_products'] = 'Duplicate Selected Products';
    return $bulk_actions;
}
add_filter('bulk_actions-edit-product', 'add_bulk_duplicate_action');

// Handle bulk duplicate action
function handle_bulk_duplicate_action($redirect_to, $doaction, $post_ids) {
    if ($doaction !== 'duplicate_products') {
        return $redirect_to;
    }

    if (!current_user_can('edit_posts')) {
        return $redirect_to;
    }

    $duplicated_count = 0;

    foreach ($post_ids as $post_id) {
        $original_post = get_post($post_id);

        if (!$original_post || $original_post->post_type !== 'product') {
            continue;
        }

        // Create the duplicate post
        $new_post_args = array(
            'post_title'     => $original_post->post_title . ' (Copy)',
            'post_content'   => $original_post->post_content,
            'post_excerpt'   => $original_post->post_excerpt,
            'post_status'    => 'draft',
            'post_type'      => $original_post->post_type,
            'post_author'    => get_current_user_id(),
            'post_parent'    => $original_post->post_parent,
            'menu_order'     => $original_post->menu_order
        );

        $new_post_id = wp_insert_post($new_post_args);

        if (is_wp_error($new_post_id)) {
            continue;
        }

        // Duplicate all meta data
        $meta_keys = array(
            '_product_price',
            '_factory_name',
            '_production_video_url',
            '_whatsapp_number',
            '_product_gallery',
            '_product_technical_details',
            '_product_variations',
            '_product_shipping_methods',
            '_product_reviews',
            '_product_quantity_options',
            '_product_certificates_gallery'
        );

        foreach ($meta_keys as $meta_key) {
            $meta_value = get_post_meta($post_id, $meta_key, true);
            if (!empty($meta_value)) {
                update_post_meta($new_post_id, $meta_key, $meta_value);
            }
        }

        // Duplicate featured image
        $featured_image_id = get_post_thumbnail_id($post_id);
        if ($featured_image_id) {
            set_post_thumbnail($new_post_id, $featured_image_id);
        }

        // Duplicate taxonomies (product categories)
        $taxonomies = array('product_category');
        foreach ($taxonomies as $taxonomy) {
            $terms = wp_get_post_terms($post_id, $taxonomy, array('fields' => 'ids'));
            if (!empty($terms) && !is_wp_error($terms)) {
                wp_set_post_terms($new_post_id, $terms, $taxonomy);
            }
        }

        $duplicated_count++;
    }

    // Add success notice
    $redirect_to = add_query_arg('bulk_duplicated', $duplicated_count, $redirect_to);
    return $redirect_to;
}
add_filter('handle_bulk_actions-edit-product', 'handle_bulk_duplicate_action', 10, 3);

// Display admin notice for bulk duplicate
function bulk_duplicate_admin_notice() {
    if (!empty($_REQUEST['bulk_duplicated'])) {
        $count = intval($_REQUEST['bulk_duplicated']);
        printf(
            '<div id="message" class="updated notice is-dismissible"><p>' .
            _n('Successfully duplicated %d product.', 'Successfully duplicated %d products.', $count) .
            ' All duplicated products have been saved as drafts for review.</p></div>',
            $count
        );
    }
}
add_action('admin_notices', 'bulk_duplicate_admin_notice');

// Add products link to admin bar
function add_products_admin_bar_link($wp_admin_bar) {
    if (!current_user_can('edit_posts')) {
        return;
    }

    $wp_admin_bar->add_node(array(
        'id' => 'view-products',
        'title' => 'عرض المنتجات',
        'href' => get_post_type_archive_link('product'),
        'meta' => array(
            'target' => '_blank'
        )
    ));
}
add_action('admin_bar_menu', 'add_products_admin_bar_link', 999);

// Custom excerpt length for products
function product_excerpt_length($length) {
    if (is_post_type_archive('product')) {
        return 20;
    }
    return $length;
}
add_filter('excerpt_length', 'product_excerpt_length');

// Add custom CSS for product pages
function product_custom_styles() {
    if (is_singular('product') || is_post_type_archive('product')) {
        ?>
        <style>
        .aspect-w-1 {
            position: relative;
            padding-bottom: 100%;
        }
        .aspect-w-1 > * {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
        .product-gallery img {
            transition: all 0.3s ease;
        }
        .product-gallery img:hover {
            transform: scale(1.05);
        }
        </style>
        <?php
    }
}
add_action('wp_head', 'product_custom_styles');

// Add product count to dashboard glance
function add_product_count_to_dashboard() {
    $num_products = wp_count_posts('product');
    $num = number_format_i18n($num_products->publish);
    $text = _n('Product', 'Products', $num_products->publish);

    if (current_user_can('edit_posts')) {
        $text = sprintf('<a href="edit.php?post_type=product">%1$s %2$s</a>', $num, $text);
    } else {
        $text = sprintf('%1$s %2$s', $num, $text);
    }

    echo '<li class="product-count">' . $text . '</li>';
}
add_action('dashboard_glance_items', 'add_product_count_to_dashboard');

// Shortcode to display products
function display_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 8,
        'columns' => 4,
        'show_price' => 'yes',
        'show_excerpt' => 'yes'
    ), $atts);

    $query = new WP_Query(array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['limit']),
        'post_status' => 'publish'
    ));

    if (!$query->have_posts()) {
        return '<p>لا توجد منتجات للعرض.</p>';
    }

    $columns_class = '';
    switch($atts['columns']) {
        case '2':
            $columns_class = 'grid-cols-1 sm:grid-cols-2';
            break;
        case '3':
            $columns_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
            break;
        case '4':
        default:
            $columns_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4';
            break;
    }

    ob_start();
    ?>
    <div class="products-shortcode">
        <div class="grid <?php echo esc_attr($columns_class); ?> gap-6">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $price = get_post_meta(get_the_ID(), '_product_price', true);
                $factory_name = get_post_meta(get_the_ID(), '_factory_name', true);
                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                ?>

                <div class="group relative bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                        <?php if ($featured_image) : ?>
                            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" class="h-48 w-full object-cover object-center group-hover:opacity-75">
                        <?php else : ?>
                            <div class="h-48 w-full bg-gray-300 flex items-center justify-center">
                                <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <?php if ($factory_name) : ?>
                            <p class="text-sm text-gray-500 mb-2"><?php echo esc_html($factory_name); ?></p>
                        <?php endif; ?>

                        <?php if ($atts['show_price'] === 'yes' && $price) : ?>
                            <p class="text-lg font-medium text-gray-900 mb-2"><?php echo esc_html($price); ?> ريال</p>
                        <?php endif; ?>

                        <?php if ($atts['show_excerpt'] === 'yes' && has_excerpt()) : ?>
                            <p class="text-sm text-gray-600 mb-3"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            عرض التفاصيل
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('products', 'display_products_shortcode');
