<?php 
/*$usuario = wp_get_current_user();
echo '<pre>';
print_r($usuario);
echo '</pre>';
die();
$user = $_GET['user'];
echo $user;

var_dump($_COOKIE);
die();*/
$prefix = 'gg_';
if ( !isset($_GET['token']) ){
    echo 'Missing token';
    exit();
}else{
    if ( empty( $_GET['token'] ) ){
        echo 'Missing data';
        exit();
    }else{
        $token = $_GET['token'];
    }
}

// validar token de usuario
$args = array(
    'meta_key' => 'token', 
    'meta_value' => $token
);
$user_query = get_users( $args );
if (!$user_query){
    echo 'Invalid token';
    exit();
}


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
    // informacion tecnica del barco
    $technicals = get_post_meta($elemento->ID, $prefix . 'ship_section_tech_info', false);
    foreach($technicals[0] as $technical){
        $item = explode(':', $technical);
        $technical_item[] = array(
            'nombre' => $item[0],
            'descripcion' => $item[1]
        );
    }
    
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
                array(
                    'key'     => $prefix . 'cabin_decks_location',
                    'value'   => $deck->ID,
                    'compare' => 'LIKE',
                ),
            ),
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $cabins = get_posts($args);
        $cabinasInfo = '';
        foreach($cabins as $cabin){
            $imagenesCabinas = '';
            foreach($imagesSizes as $imagesSize){
                $imagenesCabinas[] = array(
                    'size' => $imagesSize,
                    'URL' => get_the_post_thumbnail_url( $cabin->ID, $imagesSize)
                );
            }
            $imagenesCabinas[] = array(
                'size' => 'original',
                'URL' => get_the_post_thumbnail_url( $cabin->ID)
            );
            $cabinasInfo[$key][] = array(
                'id' => $cabin->ID,
                'dispo_code' => get_post_meta($cabin->ID, $prefix . 'dispo_ID', true),
                'nombre' => $cabin->post_title,
                'slug' => $cabin->post_name,
                'url' => get_permalink( $cabin->ID ),
                'color' => get_post_meta($cabin->ID, $prefix . 'cabin_category_color', true),
                'descripcionCorta' => esc_html(get_the_excerpt($cabin->ID)),
                //'imagen_destacada' => get_the_post_thumbnail_url( $cabin->ID ),
                'imagenes' => $imagenesCabinas,
                'imagen_locacion_cabina' => get_post_meta($cabin->ID, $prefix . 'cabin_deck_location_image', true),
                'imagen_3d' => get_post_meta($cabin->ID, $prefix . 'cabin_deck_location_image', true),
                'especificaciones' => get_post_meta($cabin->ID, $prefix . 'cabin_featurelist', false)
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
                array(
                    'key'     => $prefix . 'cabin_decks_location',
                    'value'   => $deck->ID,
                    'compare' => 'LIKE',
                ),
            ),
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $socialareas = get_posts($args);
        foreach($socialareas as $socialarea){
            $galeria = get_post_meta($socialarea->ID, $prefix . 'social_gallery', false);
            foreach($galeria as $imagen){
                $pics[] = wp_get_attachment_url( $imagen );
            }
            
            $areassocialesinfo[$key][] = array(
                'id' => $socialarea->ID,
                'nombre' => $socialarea->post_title,
                'slug' => $socialarea->post_name,
                'descripcionCorta' => esc_html(get_the_excerpt($socialarea->ID)),
                'galeria' => $pics
            );
        }
        $deckInfo[$key][] = array(
            'id' => $deck->ID,
            'nombre' => $deck->post_title,
            'slug' => $deck->post_name,
            'descripcionCorta' => esc_html(get_the_excerpt($deck->ID)),
            'distribucion_cabinas' => get_post_meta($deck->ID, $prefix . 'deck_plan_image', true),
            'cabinas' =>$cabinasInfo,
            'areas_sociales' => $areassocialesinfo
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
        'informacion_tecnica' => $technical_item,
        'logo' => $metas[$key][$prefix. 'ship_logo'][0],
        'decks' => $deckInfo[$key],
        //"wpBarcometas" => $metas
    );
}



// AGREGAR ITINERARIOS AL JSON
$posttype = 'ggitineraries';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
foreach($elementos as $itinerario){
    
    $diasActivos = 0;
    
    for ($i = 0; $i < 5; $i++){
        if( get_post_meta($itinerario->ID, $prefix . 'itinerary_active_day_'.$i, true) == 1){
            // sumar dia activo
            $diasActivos++;
            
            // Imagen destacada
            $featuredImage = get_post_meta($itinerario->ID, $prefix . 'itinerary_featured_image_day_'.$i, true);
            $rutaImagen = wp_get_attachment_image_src( $featuredImage, 'full', true );
            
            // llenar variable contenido
            $contenido[$i] = array(
                'descripcion' => get_post_meta($itinerario->ID, $prefix . 'itinerary_description_day_'.$i, true),
                'imagen_destacada' => $rutaImagen,
                'am' => get_post_meta($itinerario->ID, $prefix . 'itinerary_am_activities_list_day_'.$i, true),
                'pm' => get_post_meta($itinerario->ID, $prefix . 'itinerary_pm_activities_list_day_'.$i, true)
            );
        };
    }
    
    $itinerarios[$itinerario->ID] = array(
        'id' => $itinerario->ID,
        'nombre' => $itinerario->post_title,
        'subtitulo' => get_post_meta($itinerario->ID, $prefix . 'itinerary_single_name', true),
        'descripcion' => $itinerario->post_excerpt,
        'imagen_destacada' => get_the_post_thumbnail_url($itinerario->ID),
        'barco' => get_post_meta($itinerario->ID, $prefix . 'itinerary_ship_id', true),
        'barco_dispoid' => get_post_meta(get_post_meta($itinerario->ID, $prefix . 'itinerary_ship_id', true), $prefix . 'dispo_ID', true),
        'url' => get_permalink( $itinerario->ID ),
        'imagen_ruta' => get_post_meta($itinerario->ID, $prefix . 'itinerary_route_image', true),
        'color_brochure' => get_post_meta($itinerario->ID, $prefix . 'itinerary_frontend_color', true),
        'animales_recorrido' => get_post_meta($itinerario->ID, $prefix . 'itinerary_animal_list', false),
        'dia_inicio' => get_post_meta($itinerario->ID, $prefix . 'itinerary_start_day', true),
        'duracion' => array(
            'dias' => $diasActivos,
            'noches' => $diasActivos -1
        ),
        'day_by_day' => $contenido,
    );
}
$response['itinerarios'] = $itinerarios;
// FIN ITINERARIOS



// AGREGAR ISLAS AL JSON
$posttype = 'ggisland';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
foreach($elementos as $isla){
    $islas[$isla->ID] = array(
        'id' => $isla->ID,
        'nombre' => $isla->post_title,
        'descripcion' => $isla->post_content,
        'resumen' => $isla->post_excerpt,
        'actividades' => '',
        'imagen' => '',
        'galeria' => '',
        'url' => get_permalink( $isla->ID )
    );
}
$response['islas'] = $islas;
// FIN ISLAS



// AGREGAR ANIMALES AL JSON
$posttype = 'gganimal';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
foreach($elementos as $animal){
    $animales[$animal->ID] = array(
        'id' => $animal->ID,
        'nombre' => $animal->post_title,
        'descripcion' => $animal->post_content,
        'resumen' => $animal->post_excerpt,
        'actividades' => '',
        'imagen' => '',
        'galeria' => '',
        'url' => get_permalink( $animal->ID )
    );
}
$response['animales'] = $animales;
// FIN ANIMALES


$response['dias'] = array(
    '0' => 'Monday',
    '1' => 'Tuesday',
    '2' => 'Wednesday',
    '3' => 'Thrusday',
    '4' => 'Friday',
    '5' => 'Saturday',
    '6' => 'Sunday',
);
// TRANSFORMACION A FORMATO JSON Y ENVIO

header('Content-Type: application/json');
if( isset($_GET['barco']) && !empty($_GET['barco'])){
    $idBarco = $_GET['barco'];
    echo json_encode($response[$idBarco]);
}else{
    echo json_encode($response);
}






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