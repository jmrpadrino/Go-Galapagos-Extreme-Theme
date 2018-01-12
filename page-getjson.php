<?php 
$usuario = wp_get_current_user();
echo '<pre>';
print_r($usuario);
echo '</pre>';
die();
$user = $_GET['user'];
$prefix = 'gg_';
echo $user;

var_dump($_COOKIE);
die();

// referencias de los idiomas
global $q_config;
global $wpdb;
$lenguajeDefault = $q_config[default_language];
$lenguajeConsulta = $q_config[language];

$lenguajesHabilitados = $q_config[enabled_languages];
$imagesSizes = get_intermediate_image_sizes();
//print_r($lenguajesHabilitados);
//obtener los barcos
$response = array();
$imagenes = array();
/*
if(!isset($_GET['posttipo'])){
    echo 'FALSE';
    exit;
}else{
    //hacer el swith
    $tipo = $_GET['posttipo'];
    switch($tipo){
        case 'barcos': 
            $posttype = 'ggships'; 
            break;
        case 'cabinas': 
            $posttype = 'ggcabins'; 
            break;
        case 'itinerarios': 
            $posttype = 'ggitineraries'; 
            break;
        default: 
            $posttype = 'post'; 
            break;
    }
}
*/
$posttype = 'ggships';
$args = array(
    'post_type' => $posttype,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);

// CARGAR ARRAY DE LOS BARCOS

foreach ($elementos as $key => $elemento){
    $metas[] = get_post_meta($elemento->ID);
    $descripcionCorta = returnLanguagestring($lenguajeConsulta ,splitLanguages($elemento->post_excerpt_ml));
    //obtener todas las imagenes de este post
    foreach($imagesSizes as $imagesSize){
        $imagenes[] = array(
            'size' => $imagesSize,
            'URL' => get_the_post_thumbnail_url( $elemento->ID, $imagesSize)
        );
    }
    $imagenes[] = array(
        'size' => 'original',
        'URL' => get_the_post_thumbnail_url( $elemento->ID)
    );
    
    //recuperar los decks del barco
    $args = array(
        'post_type' => 'ggdecks',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => $prefix . 'deck_ship_id',
                'value'   => $elemento->ID,
                'compare' => 'LIKE',
            ),
        ),
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    $decks = get_posts($args);
    foreach($decks as $deck){
        $deckInfo[$key][] = array(
            'id' => $deck->ID,
            'nombre' => $deck->post_title,
            'slug' => $deck->post_name,
            'descripcionCorta' => esc_html(get_the_excerpt($deck->ID)),
            'metadatos' => get_post_meta($deck->ID)
        );
    }
    
    //recuperar las cabinas del barco
    $args = array(
        'post_type' => 'ggcabins',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => $prefix . 'cabin_ship_id',
                'value'   => $elemento->ID,
                'compare' => 'LIKE',
            ),
        ),
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    $cabins = get_posts($args);
    foreach($cabins as $cabin){
        $cabinasInfo[$key][] = array(
            'id' => $cabin->ID,
            'nombre' => $cabin->post_title,
            'slug' => $cabin->post_name,
            'descripcionCorta' => esc_html(get_the_excerpt($cabin->ID)),
            'metadatos' => get_post_meta($cabin->ID)
        );
    }
    
    //recuperar las areas sociales del barco
    $args = array(
        'post_type' => 'ggsocialarea',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => $prefix . 'social_ship_id',
                'value'   => $elemento->ID,
                'compare' => 'LIKE',
            ),
        ),
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    $socialareas = get_posts($args);
    foreach($socialareas as $socialarea){
        $areassocialesinfo[$key][] = array(
            'id' => $socialarea->ID,
            'nombre' => $socialarea->post_title,
            'slug' => $socialarea->post_name,
            'descripcionCorta' => esc_html(get_the_excerpt($socialarea->ID)),
            'metadatos' => get_post_meta($socialarea->ID)
        );
    }
    
    
    
    $response[$metas[$key][$prefix.'dispo_ID'][0]] = array(
        'id' => $elemento->ID,
        'titulo' => $elemento->post_title,
        'nombre' => $elemento->post_name,
        'slogan' => $metas[$key][$prefix. 'ship_slogan'][0],
        'imagenes' => $imagenes,
        'descripcionCorta' => $descripcionCorta,
        'descripcionLarga' => $elemento->post_content,
        'logo' => $metas[$key][$prefix. 'ship_logo'][0],
        'decks' => $deckInfo[$key],
        'cabinas' => $cabinasInfo[$key],
        'areasSociales' => $areassocialesinfo[$key]
        //"wpBarcometas" => $metas
    );
    //print_r($metas);
}
echo '<pre>';
if( isset($_GET['barco']) && !empty($_GET['barco'])){
    $idBarco = $_GET['barco'];
    print_r($response[$idBarco]);
}else{
    print_r( $response );
}
echo '</pre>';
/* funciones */
/*--- DIVIDE LAS CADENAS MULTIIDIOMAS ---*/
function splitLanguages($cadena){

    $cadena = str_replace('[:]', '', $cadena);
    $cadena = str_replace(']', ':', $cadena);
    //$arrayIdiomas = preg_split('/\[:[a-z]{2}\]/', $cadena);
    $arrayIdiomas = preg_split('/\[:/', $cadena);
    
    //elimino el primer index del array y el ultimo
    unset($arrayIdiomas[0]);
    //unset($arrayIdiomas[count($arrayIdiomas)]);
    //devuelvo el array
    return $arrayIdiomas;
}

/*--- RETORNA LA CADENA EN EL LENGUAJE QUE SE CONSULTA ---*/
function returnLanguagestring($queryLang, array $array){
    foreach ($array as $key => $value) {
		if (stristr($value, $queryLang.':') === FALSE) {
			continue;
		} else {
			$cadena = $key;
		}
	}
    return str_replace($queryLang.':','',$array[$cadena]);
}

?>