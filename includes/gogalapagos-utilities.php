<?php
// Variables globales
$GLOBALS['cantidaddemapasenitinerarios'] = 0;
// Register Theme Features
function gogalapagos_support()  {

    // Add theme support for Post Formats
    add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside' ) );

    // Add theme support for Featured Images
    add_theme_support( 'post-thumbnails' );

    // Add theme support for HTML5 Semantic Markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Add theme support for custom CSS in the TinyMCE visual editor
    add_editor_style( 'gogalapagos-alt.css' );

    // Add theme support for Translation
    load_theme_textdomain( 'gogalapagos', get_template_directory() . '/languages/' );
}
add_action( 'after_setup_theme', 'gogalapagos_support' );
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
?>