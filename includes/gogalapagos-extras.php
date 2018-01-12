<?php 
/**
* FUNCION PARA AGREGAR TODOS LOS CPT'S EN EL QUERY DE LA BUSQUEDA
*/
function gg_set_all_cpts( $query ) {
    if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){
        if(isset($_GET['blog'])){
            $query->set('post_type', array('post'));
        }else{
            $query->set('post_type', 
                            array(
                                'post', 
                                'page', 
                                'gganimal', 
                                'ggisland',
                                'ggactivity',
                                'ggships',
                                'ggpackage',
                                'ggtour')
                       );
        }
        
    }
    return $query;
};

add_filter('pre_get_posts', 'gg_set_all_cpts');

/* SHORTCODES 
* 1. Para generar seccion fullpage
*/
add_shortcode('generar_seccion_fullpage', 'generador_de_seccion_fullpage');

function generador_de_seccion_fullpage($args, $content=null){
    $atts = shortcode_atts( array(
            'extraclasses' => 'algo',
        ), $args);
    ob_start();
    ?>
<section class="sections section <?php echo $atts['extraclasses']; ?>"><?php echo do_shortcode( $content ); ?></section>
    <?php 
    return ob_get_clean();
}

function draw_stars($stars){
    $rate = '';
    if($stars < 5){
        $faltan = 5 - $stars;
        for ($i=0; $i<$stars; $i++){
            $rate .= '<span class="fa fa-star"></span> ';
        }
        for ($i=0; $i<$faltan; $i++){
            $rate .= '<span class="fa fa-star-o"></span> ';
        }
    }else{
        for($i = 0; $i < $stars; $i++){
            $rate .= '<span class="fa fa-star"></span> ';
        }
    }
    
    echo $rate;
}

/* QUERY VARS 
function gogalapagos_register_query_vars( $vars ) {
    $
	$vars[] = 'key1';
	$vars[] = 'key2';
	return $vars;
}
add_filter( 'query_vars', 'gogalapagos_register_query_vars' );
*/
?>