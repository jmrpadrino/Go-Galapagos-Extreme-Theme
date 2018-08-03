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

$itis = array(
    '0' => 'ab',
    '1' => 'bc',
    '2' => 'cd',
    '3' => 'da'
);
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
    //'orderby' => 'post_id',
    //'order' => 'DESC'
);
$elementos = get_posts($args);

// CARGAR ARRAY DE LOS BARCOS
foreach ($elementos as $key => $elemento){
    $metas[] = get_post_meta( $elemento->ID );
    
    //var_dump( $metas[$key][$prefix . 'ship_group_code'][0] . $metas[$key+1][$prefix . 'ship_group_code'][0] );
    
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
            //$cabinasInfo[$key][] = array(
            $cabinasInfo[0][] = array(
                'id' => $cabin->ID,
                'dispo_code' => get_post_meta($cabin->ID, $prefix . 'dispo_ID', true),
                'alias' => get_post_meta($cabin->ID, $prefix . 'cabin_quote_system_alias', true),
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
            'nombre' => get_post_meta($deck->ID, $prefix . 'deck_frontend_name', true),
            'nombre_web' => $deck->post_title,
            'slug' => $deck->post_name,
            'descripcionCorta' => esc_html(get_the_excerpt($deck->ID)),
            'distribucion_cabinas' => get_post_meta($deck->ID, $prefix . 'deck_plan_image', true),
            'cabinas' =>$cabinasInfo,
            'areas_sociales' => $areassocialesinfo
        );
    }

    // AGREGAR ITINERARIOS AL JSON
    $elbarco = $elemento->ID;
    $codigoBarco = $metas[$key][$prefix.'dispo_ID'][0];
    if ($codigoBarco == 'BAR001' or $codigoBarco == 'BAR002'){
        $codigoBarco = 'BAR001';
        $posttypeParaitinerarios = 'ggships';
        $args1 = array(
            'post_type' => $posttypeParaitinerarios,
            'posts_per_page' => 1,
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'     => $prefix . 'dispo_ID',
                    'value'   => $codigoBarco,
                    'compare' => 'LIKE',
                ),
            )
        );
        $elbarco = get_posts($args1);
        $elbarco = $elbarco[0]->ID;
    }
        
    $posttype = 'ggitineraries';

    $args = array(
        'post_type' => $posttype,
        'posts_per_page' => -1,
        'orderby' => 'post_id',
        'order' => 'ASC',
        'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'     => $prefix . 'itinerary_ship_id',
                    'value'   => $elbarco,
                    'compare' => 'LIKE',
                ),
        )
    );
    
    if ($_GET['anio']){
        $anio = $_GET['anio'];

        $args = array(
            'post_type' => $posttype,
            'posts_per_page' => -1,
            'orderby' => 'post_id',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key'     => $prefix . 'itinerary_year',
                    'value'   => $anio,
                    'compare' => 'LIKE',
                ),
            ),
        );
    }

    $elementos = get_posts($args);
    $itinerarios = [];
    $it = 0;
    foreach($elementos as $itinerario){
        

        $duracion = get_post_meta($itinerario->ID, $prefix . 'itinerary_duration', true);

        $contenido = [];

        for ($i = 1; $i <= $duracion; $i++){
            $activo = get_post_meta($itinerario->ID, $prefix . 'itinerary_active_day_'.$i, true);
            if( $activo == 1){

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
            'imagen_ruta_extendido' => get_post_meta($elbarco, $prefix . 'ship_extended_img_' . $itis[$it], true),
            'color_brochure' => get_post_meta($itinerario->ID, $prefix . 'itinerary_frontend_color', true),
            'animales_recorrido' => get_post_meta($itinerario->ID, $prefix . 'itinerary_animal_list', false),
            'anio_operacion' => get_post_meta($itinerario->ID, $prefix . 'itinerary_year', false),
            'dia_inicio' => get_post_meta($itinerario->ID, $prefix . 'itinerary_start_day', true),
            'duracion' => array(
                'dias' => $duracion,
                'noches' => (string)($duracion - 1)
            ),
            'day_by_day' => $contenido,
        );
        $it++;
    }
    // FIN ITINERARIOS


    $response[$metas[$key][$prefix.'dispo_ID'][0]] = array(
        'id' => $elemento->ID,
        'elbarco' => $elbarco.'-'.$codigoBarco,
        'codigoAgrupado' => $metas[$key][$prefix. 'ship_group_code'][0],
        'titulo' => $elemento->post_title,
        'nombre' => $elemento->post_name,
        'nombreEligos' => get_post_meta($elemento->ID, $prefix . 'ship_section_tech_info_title', true),
        'slogan' => $metas[$key][$prefix. 'ship_slogan'][0],
        'imagenes' => $imagenes,
        'descripcionCorta' => $descripcionCorta,
        'descripcionLarga' => $elemento->post_content,
        'informacion_tecnica' => $technical_item,
        'logo' => $metas[$key][$prefix. 'ship_logo'][0],
        'capacidad' => $metas[$key][$prefix. 'ship_capacity'][0],
        'decks' => $deckInfo[$key],
        'itinerarios' => $itinerarios
        //"wpBarcometas" => $metas
    );
    
}


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

// AGREGAR SITIOS DE VISITA AL JSON
$posttype = 'gglocation';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
foreach($elementos as $sitio){
    $sitios[$sitio->ID] = array(
        'id' => $sitio->ID,
        'nombre' => $sitio->post_title,
        'descripcion' => $sitio->post_content,
        'resumen' => $sitio->post_excerpt,
        'isla' => get_post_meta($sitio->ID, $prefix . 'visitors_site_island', true),
        'desembarque' => get_post_meta($sitio->ID, $prefix. 'visitors_site_disembarking', false),
        'terreno' => get_post_meta($sitio->ID, $prefix. 'visitors_site_terrain', false),
        'dificultad' => get_post_meta($sitio->ID, $prefix. 'visitors_site_difficulty', false),
        'condicion_fisica' => get_post_meta($sitio->ID, $prefix. 'visitors_site_physical', false),
        'duracion' => get_post_meta($sitio->ID, $prefix. 'visitors_site_duration', true),
        'destacados' => get_post_meta($sitio->ID, $prefix. 'visitors_site_highlights', true),
        'url' => get_permalink( $sitio->ID )
    );
}
$response['sitios_visita'] = $sitios;
// FIN SITIOS DE VISITA

$response['desembarque'] = array(
    '0' => 'None',
    '1' => 'Dry Landing',
    '2' => 'Wet Landing',
    '3' => 'Dry or Wet Landing',
    '4' => 'Circumnavigation',
);


$response['terreno'] = array(
    '0' => 'None',
    '1' => 'Eroded Tuff',
    '2' => 'Flat',
    '3' => 'Flat & Muddy',
    '4' => 'Flat & Petrified Lava',
    '5' => 'Flat & Sandy',
    '6' => 'Flat & Semi-rocky',
    '7' => 'Hill/mountain',
    '8' => 'Marsh',
    '9' => 'Muddy',
    '10' => 'Petrified Lava',
    '11' => 'Rocky',
    '12' => 'Rocky & Petrified Lava',
    '13' => 'Rocky & Sandy',
    '14' => 'Sandy',
    '15' => 'Shallow Ocean',
    '16' => 'Slippery',
    '17' => 'Steep',
    '18' => 'Steep & Petrified Lava',
    '19' => 'Water',
    '20' => 'Wooden Trail',
);

$response['dificultad'] = array(
    '0' => 'Low',
    '1' => 'High',
    '2' => 'Intermediate',
    '3' => 'Easy',
    '4' => 'Moderate',
    '5' => 'Difficult'
);

$response['condicion_fisica'] = array(
    '0' => 'Low',
    '1' => 'High',
    '2' => 'Medium',
    '3' => 'Medium / High',
);

$response['dias'] = array(
    '0' => 'Monday',
    '1' => 'Tuesday',
    '2' => 'Wednesday',
    '3' => 'Thrusday',
    '4' => 'Friday',
    '5' => 'Saturday',
    '6' => 'Sunday',
);

// AGREGAR PAQUETES GO AL JSON
$posttype = 'ggpackage';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
$pack_count = 0;
foreach($elementos as $pack){
    $paquetes_go[$pack_count] = array(
        'id' => $pack->ID,
        'nombre' => $pack->post_title,
        'descripcion' => $pack->post_content,
        'resumen' => $pack->post_excerpt,
        'url' => get_permalink( $pack->ID ),
        'dispo_code' => get_post_meta($pack->ID, $prefix . 'dispo_code', true),
        'precio' => get_post_meta($pack->ID, $prefix . 'tour_price', true)
    );
    $pack_count++;
}
$response['gopackages'] = $paquetes_go;
// FIN PAQUETES GO

// AGREGAR TOURS LAND AL JSON
$posttype = 'ggtour';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
$pack_count = 0;
foreach($elementos as $tour){
    $tours[$pack_count] = array(
        'id' => $tour->ID,
        'nombre' => $tour->post_title,
        'descripcion' => esc_html($tour->post_content),
        'resumen' => $tour->post_excerpt,
        'url' => get_permalink( $tour->ID ),
        'dispo_code' => get_post_meta($tour->ID, $prefix . 'dispo_code', true),
        'precio' => get_post_meta($tour->ID, $prefix . 'tour_price', true)
    );
    $pack_count++;
}
$response['tours'] = $tours;
// FIN TOURS LAND

// AGREGAR TOURS LAND AL JSON
$posttype = 'ggsatour';
$args = array(
    'post_type' => $posttype,
    'posts_per_page' => -1,
    'orderby' => 'post_id',
    'order' => 'ASC'
);
$elementos = get_posts($args);
$pack_count = 0;
foreach($elementos as $satour){
    $satours[$pack_count] = array(
        'id' => $satour->ID,
        'nombre' => $satour->post_title,
        'descripcion' => esc_html($satour->post_content),
        'resumen' => $satour->post_excerpt,
        'url' => get_permalink( $satour->ID ),
        'dispo_code' => get_post_meta($satour->ID, $prefix . 'dispo_code', true),
        'precio' => get_post_meta($satour->ID, $prefix . 'tour_price', true),
        'duracion' => get_post_meta($satour->ID, $prefix . 'sa_tourduration', true),
        'highlights' => get_post_meta($satour->ID, $prefix . 'sa_highlights', true),
        'incluye' => get_post_meta($satour->ID, $prefix . 'sa_included', true),
        'pais' => get_the_terms($satour->ID, 'go_sa_tours')
    );
    $pack_count++;
}
$response['satours'] = $satours;
// FIN TOURS LAND

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