<?php

/**
 * Laravel Mix Assets helper
 */
function additional_blocks_assets_url($path)
{
    $plugin_dir = WP_PLUGIN_DIR . '/elementor-additional-blocks/assets';
    if (file_exists($plugin_dir . '/hot')) {
        // var_dump(WP_SITEURL);
        // $url = file_get_contents($plugin_dir . '/hot');
        
        return "//localhost:8080{$path}";
    }
    
    $manifestPath = $plugin_dir . '/mix-manifest.json';
    $manifest = json_decode(file_get_contents($manifestPath), true);
    
    if (isset($manifest[$path])) {
        return WP_CONTENT_URL . '/plugins/elementor-additional-blocks/assets' . $manifest[$path];
    } else {
        return WP_CONTENT_URL . '/plugins/elementor-additional-blocks/assets' . $path;
    }
}
