<?php
/**
 * Go Galapagos Extreme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Go_Galapagos_Extreme
 * @since 1.0
 */
setlocale(LC_MONETARY, 'en_US');

// Soporte de Wordpress y demas utilidades
require_once('includes/gogalapagos-utilities.php'); 
// Ajustes de plugins, tamaños de imagenes
require_once('includes/gogalapagos-extras.php'); 
// Soporte para Menues
require_once('includes/gogalapagos-menues.php');
require_once('includes/gogalapagos-menu-walker.php');
// Carga de scripts y adicionales
require_once('includes/gogalapagos-scripts.php');
// Traducciones
require_once('includes/gogalapagos-string-translations.php'); 
// Soporte para llamados de AJAX
require_once('includes/gogalapagos-ajax-calls.php');
// Mecanismos para el API REST
add_action( 'rest_api_init', 'crear_api_posts_meta_field' );
function crear_api_posts_meta_field(){
    // register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
    $prefix = 'gg_';
    register_rest_field(
        'ggcabins',
        'cabin_meta_data',
        array(
            'get_callback' => 'get_post_meta_for_api',
            'schema' => null,
        )
    );
};
function get_post_meta_for_api( $object ) {
    //get the id of the post object array
    $post_id = $object['id'];

    //return the post meta
    return get_post_meta( $post_id );
}


function gogalapagos_posts_per_page(){
    global $wp_query;
    if ( is_post_type_archive( 'ggisland' ) ) {
        // Display 50 posts for a custom post type called 'movie'
        $wp_query->set( 'posts_per_page', -1 );
        return;
    }
}
add_action('pre_get_posts', 'gogalapagos_posts_per_page' );

add_filter('style_loader_tag', 'add_id_to_style', 10, 3);
function add_id_to_style($html, $handle, $href, $media){
    $html = str_replace(' type=\'text/css\'', '', $html);
    
    return $html;
}

add_filter('script_loader_tag', 'add_id_to_script', 10, 3);
function add_id_to_script( $tag, $handle, $src ) {

    $diferidos = array(
        //'nicescroll',
        //'countJs',
        'jquery-migrate',
        'placeholder',
        'goga_ajax_booking',
        'postratings',
        'cc-widget'
    );

    $tag = str_replace(' type=\'text/javascript\'', '', $tag);
    
    foreach($diferidos as $diferido) {
        if ($diferido === $handle) {
            return str_replace(' src', ' async defer src', $tag);
        }
    }

//    echo '<pre>';
//    //var_dump($tag);
//    var_dump($handle);
//    echo '</pre>';

    return $tag;
}

?>