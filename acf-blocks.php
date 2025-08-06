<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a Example block.
        acf_register_block_type(array(
            'name'              => 'example-block',
            'title'             => __('Moahal Example Section'),
            'description'       => __('A Example block.'),
            'render_template'   => 'template-parts/blocks/example-block.php',
            'category'          => 'formatting',
            'mode'              => 'edit',
            'icon'              => 'admin-media',
            'keywords'          => array('Example', 'Home'),
        ));

        acf_register_block_type(array(
            'name'              => 'editor-block',
            'title'             => __('Moahal Editor Section'),
            'description'       => __('A Editor block.'),
            'render_template'   => 'template-parts/blocks/editor-block.php',
            'category'          => 'formatting',
            'mode'              => 'edit',
            'icon'              => 'gala:editor',
            'keywords'          => array('Editor', 'Home'),
        ));

    acf_register_block_type(array(
        'name'              => 'hero-home-block',
        'title'             => __('Moahal Hero-Home Section'),
        'description'       => __('A Hero-Home block.'),
        'render_template'   => 'template-parts/blocks/hero-home-block.php',
        'category'          => 'formatting',
        'mode'              => 'edit',
        'icon'              => 'admin-media',
        'keywords'          => array('Hero-Home', 'Home'),
    ));


	acf_register_block_type(array(
		'name'              => 'purpose-block',
        'title'             => __('Moahal Purpose-Home Section'),
        'description'       => __('A Purpose-Home block.'),
        'render_template'   => 'template-parts/blocks/purpose-of-import-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Purpose', 'Home'),
	));


    acf_register_block_type(array(
		'name'              => 'services-block',
        'title'             => __('Moahal services-Home Section'),
        'description'       => __('A Services-Home block.'),
        'render_template'   => 'template-parts/blocks/services-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Purpose', 'Home'),
	));

      acf_register_block_type(array(
		'name'              => 'how-we-work-block',
        'title'             => __('Moahal How-we-work-Home Section'),
        'description'       => __('A How-we-work-Home block.'),
        'render_template'   => 'template-parts/blocks/how-we-work-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('How-we-work', 'Home'),
	));
	acf_register_block_type(array(
		'name'              => 'Why-Us-block',
		'title'             => __('Moahal Why-Us-Home Section'),
		'description'       => __('A Why-Us-Home block.'),
		'render_template'   => 'template-parts/blocks/why-us-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Why-Us', 'Home'),
	));

	acf_register_block_type(array(
		'name'              => 'Faqs-block',
		'title'             => __('Moahal Faqs-Home Section'),
		'description'       => __('A Faqs-Home block.'),
		'render_template'   => 'template-parts/blocks/faqs-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Faqs', 'Home'),
	));


    // who is us page blocks
acf_register_block_type(array(
		'name'              => 'Who-is-us-hero-block',
		'title'             => __('Moahal Who-is-us-hero Section'),
		'description'       => __('A Who-is-us-hero block.'),
		'render_template'   => 'template-parts/blocks/who-is-us-page/hero-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Who-is-us-hero', 'Home' ),
	));


    acf_register_block_type(array(
		'name'              => 'Who-is-us-welcome-block',
		'title'             => __('Moahal Who-is-us-welcome Section'),
		'description'       => __('A Who-is-us-welcome block.'),
		'render_template'   => 'template-parts/blocks/who-is-us-page/welcome-section-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Who-is-us-welcome', 'Home'),
	));

      acf_register_block_type(array(
		'name'              => 'Who-is-us-vision-block',
		'title'             => __('Moahal Who-is-us-vision Section'),
		'description'       => __('A Who-is-us-vision block.'),
		'render_template'   => 'template-parts/blocks/who-is-us-page/vision-section-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Who-is-us-vision', 'Home'),
	));


     acf_register_block_type(array(
		'name'              => 'Who-is-us-message-block',
		'title'             => __('Moahal Who-is-us-message Section'),
		'description'       => __('A Who-is-us-message block.'),
		'render_template'   => 'template-parts/blocks/who-is-us-page/message-section-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Who-is-us-message', 'Home'),
	));


     acf_register_block_type(array(
		'name'              => 'Who-is-us-value-block',
		'title'             => __('Moahal Who-is-us-value Section'),
		'description'       => __('A Who-is-us-value block.'),
		'render_template'   => 'template-parts/blocks/who-is-us-page/value-section-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Who-is-us-value', 'Home'),
	));


// shipping prices page blocks
	acf_register_block_type(array(
		'name'              => 'Shipping-prices-hero-block',
		'title'             => __('Moahal Shipping-prices-hero Section'),
		'description'       => __('A Shipping-prices-hero block.'),
		'render_template'   => 'template-parts/blocks/shipping-prices-page/hero-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Shipping-prices-hero', 'Home' ),
	));

	acf_register_block_type(array(
		'name'              => 'Shipping-prices-ports-options-block',
		'title'             => __('Moahal Shipping-prices-ports-options Section'),
		'description'       => __('A Shipping-prices-ports-options block.'),
		'render_template'   => 'template-parts/blocks/shipping-prices-page/shipping-ports-options-block.php',
		'category'          => 'formatting',
		'mode'              => 'edit',
		'icon'              => 'gala:editor',
		'keywords'          => array('Shipping-prices-ports-options', 'Home' ),
	));

	}



}



// Register options page for Notifications
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Site Notifications',
        'menu_title'    => 'Notifications',
        'menu_slug'     => 'site-notifications',
        'capability'    => 'edit_posts',
        'redirect'      => false,
    ));
}

// Example to store notifications in options
if (get_option('site_notifications')) {
    $notifications = get_option('site_notifications');
}


