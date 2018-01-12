<?php
/* _____FUNCIONALIDAD DE AJAX_____ */
function getAlterSectionInfo(){
    // RECUPERAR EL ARRAY POST
    $info = $_POST['info'];
    /*
    $args = array(
        'post_type' => $the_post_type_is
    );    
    $posts = get_posts($args);
    ob_start();
    */
    set_query_var( 'info', $info );
    get_template_part( 'templates/show-side-information-alter-nav' );
    die();
    /*
    $render = ob_get_clean();
    echo $render;
    die();*/
}
add_action('wp_ajax_getAlterSectionInfo', 'getAlterSectionInfo');
add_action('wp_ajax_nopriv_getAlterSectionInfo', 'getAlterSectionInfo');

//Obtener via ajax los land tours de la categoria X
function getLandtours(){
    $prefix = 'gg_';
    $landTours = [];
    $info = $_POST['info'];
    $categoryInfo = get_term_by('slug', $info, 'go_tours');
    $categoryInfo = array(
        'name' => $categoryInfo->name,
        'description' => esc_html($categoryInfo->description)
    );
    $landTours['info_categoria'] = $categoryInfo;
    $args = array(
        'post_type' => 'ggtour',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'go_tours',
                'field'    => 'slug',
                'terms'    => $info,
            ),
        )
    );
    $tours = get_posts($args);
    foreach($tours as $key => $tour){
        $thumbnail = get_the_post_thumbnail_url( $tour->ID, 'medium' );
        $tours[$key]->thumbnail = $thumbnail;
        //Buscar datos de metaboxes
        $precio = get_post_meta($tour->ID, $prefix . 'tour_price', true);
        $tours[$key]->precio = $precio;
        $tours[$key]->dispo_code = get_post_meta($tour->ID, $prefix . 'dispo_code', true);
    }
    $landTours['tours'] = $tours;
    echo json_encode($landTours);
    die();
}
add_action('wp_ajax_getLandtours', 'getLandtours');
add_action('wp_ajax_nopriv_getLandtours', 'getLandtours');
?>