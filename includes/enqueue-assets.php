<?php
/**
 * Enqueue CSS & JS for custom slider
 */

add_action('wp_enqueue_scripts', function () {

    /** Register custom CSS */
    $styleName = 'elementor-style-custom';
    wp_register_style("$styleName-carousel", additional_blocks_assets_url('/dist/css/_carousel.css'), [], null);
    wp_register_style("$styleName-gallery", additional_blocks_assets_url('/dist/css/_gallery.css'), [], null);
    wp_register_style("$styleName-image-overlay", additional_blocks_assets_url('/dist/css/_image-overlay.css'), [], null);
    wp_register_style("$styleName-itrac", additional_blocks_assets_url('/dist/css/_itrac.css'), [], null);
    wp_register_style("$styleName-map-control", additional_blocks_assets_url('/dist/css/_map-control.css'), [], null);
    wp_register_style("$styleName-slider", additional_blocks_assets_url('/dist/css/_slider.css'), [], null);
    wp_register_style("$styleName-team", additional_blocks_assets_url('/dist/css/_team.css'), [], null);
    wp_register_style("$styleName-text-hover", additional_blocks_assets_url('/dist/css/_text-hover.css'), [], null);
    wp_register_style("$styleName-slick-extra", additional_blocks_assets_url('/dist/css/_slick-extra.css'), [], null);
    wp_register_style("$styleName-form-success", additional_blocks_assets_url('/dist/css/_form-success.css'), [], null);
    wp_enqueue_style("$styleName-contact", additional_blocks_assets_url('/dist/css/_contact.css'), [], null);

    /** Register custom JS */
    $scriptName = 'elementor-script-custom';
    wp_register_script("$scriptName-carousel", additional_blocks_assets_url('/dist/js/carousel.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-gallery", additional_blocks_assets_url('/dist/js/gallery.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-image-overlay", additional_blocks_assets_url('/dist/js/image-overlay.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-itrac", additional_blocks_assets_url('/dist/js/itrac.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-map-control", additional_blocks_assets_url('/dist/js/map-control.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-slider", additional_blocks_assets_url('/dist/js/slider.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-text-hover", additional_blocks_assets_url('/dist/js/text-hover.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-slick-extra", additional_blocks_assets_url('/dist/js/slick-extra.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_register_script("$scriptName-form-success", additional_blocks_assets_url('/dist/js/form-success.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_enqueue_script("$scriptName-contact", additional_blocks_assets_url('/dist/js/contact.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_enqueue_script("$scriptName-menu-manipulation", additional_blocks_assets_url('/dist/js/menu-manipulation.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
    wp_enqueue_script("$scriptName-slick-extra", additional_blocks_assets_url('/dist/js/slick-extra.js'), [], null, ['in_footer' => true, 'strategy' => 'defer']);
});