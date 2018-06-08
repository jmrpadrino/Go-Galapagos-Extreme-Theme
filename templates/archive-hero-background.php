<?php
    $fondo = wp_get_attachment_url( get_option('gg_archive_fold_background_' . $post_type) );
?>
<img src="<?php echo ($fondo) ? $fondo : get_template_directory_uri() . '/images/archive-island-background.jpg' ?>" class="archive-island-background-img">