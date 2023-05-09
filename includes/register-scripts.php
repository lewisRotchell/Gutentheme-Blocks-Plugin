<?php

function pb_register_scripts() {
    $blocks_dir = PB_PLUGIN_PATH . 'build/blocks';
    $blocks = scandir($blocks_dir);
    
    foreach ($blocks as $block) {

        if ($block === '.' || $block === '..') {
            continue;
        }
        
        $frontend_js_path = "$blocks_dir/$block/frontend.js";
        if(file_exists($frontend_js_path)) {
            wp_register_script("$block-script-frontend", PB_PLUGIN_URL . "build/blocks/$block/frontend.js", [], filemtime($frontend_js_path), true);
        }
        
        $style_index_path = "$blocks_dir/$block/style-index.css";
        if(file_exists($style_index_path)) {
            wp_register_style("$block-style-frontend", PB_PLUGIN_URL . "build/blocks/$block/style-index.css", [], filemtime($style_index_path));
        }
      
        
        $frontend_css_path = "$blocks_dir/$block/frontend.css";
        if (file_exists($frontend_css_path)) {
            wp_register_style("$block-style-frontend2", PB_PLUGIN_URL . "build/blocks/$block/frontend.css", [], filemtime($frontend_css_path));
        }
    }
}