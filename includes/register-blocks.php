<?php

function pb_register_blocks()
{
    if (is_dir(PB_PLUGIN_PATH . 'build/blocks')) {
        foreach (scandir(PB_PLUGIN_PATH . 'build/blocks') as $file) {
            if ($file === '.' || $file === '..' || $file === '.gitkeep') continue;
            $options = [];
            if (file_exists(PB_PLUGIN_PATH . "src/blocks/$file/render.php")) {
                $options['render_callback'] = $file . '_render_cb';
            }
            register_block_type(PB_PLUGIN_PATH . "build/blocks/$file", $options);
        }
    }
}
