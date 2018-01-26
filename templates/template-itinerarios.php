<?php 
/*
Template Name: Itinerarios
*/
?>
<?php
get_header();

// se recuperan los datos y metadatos del barco para cargar las relaciones con los metaboxes

$prefix = 'gg_';
$ship = get_post_meta($post->ID, $prefix . 'page_template_ship_id', true);
$barco = get_post($ship);
$nombreDelBarco = get_the_title( $barco->ID );

$dias_de_la_semana = array(
    '0' => _x('Monday','gogalapagos'),
    '1' => _x('Tuesday','gogalapagos'),
    '2' => _x('Wednesday','gogalapagos'),
    '3' => _x('Thursday','gogalapagos'),
    '4' => _x('Friday','gogalapagos'),
    '5' => _x('Saturday','gogalapagos'),
    '6' => _x('Sunday','gogalapagos')
);


?>
<div class="sections section single-itinerary itinerary-hero">
    <div class="single-thumbnail-container">
        <?php 
            if(wp_is_mobile()){
                echo get_the_post_thumbnail(get_the_ID(), 'medium'); 
            }else{
                echo the_post_thumbnail();
            }
        ?>
    </div>
    <div class="hero-mask"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <span class="body-font text-center itinerary-ship-owner"><?php echo $nombreDelBarco; ?></span>
                <h1 class="itinerary-title text-center"><?php _e('Itineraries','gogalapagos'); ?></h1>
                <span class="separator"></span>
                <div class="text-justify itinerary-ship-description">
                    <?php echo get_post_meta($barco->ID, $prefix . 'ship_description', true); ?>
                </div>
                <a class="explore-the-ship-link" href="<?php echo get_post_permalink($barco->ID); ?>"><?php echo __('Explore the ','gogalapagos') . $nombreDelBarco; ?></a>
                <a class="itinerary-check-departure-dates" href=""><?php _e('Check departure dates '); ?>2018 - 2019</a>
            </div>
        </div>
        <div class="row hero-items-controls">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="scroll-indicator"></div>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <a href="#">Conservation of the Galapagos Islands</a>
            </div>            
        </div>
    </div>
    <script>
        var mapasParaItinerario = [];
    </script>
</div>
<?php
//OBTENER LOS ITINERARIOS ASIGNADOS A ESTE BARCO POR EL ID DEL BARCO
$args = array(
    'post_type' => 'ggitineraries',
    'meta_query' => array(
        array(
            'key'     => $prefix . 'itinerary_ship_id',
            'value'   => $barco->ID,
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'post_date',
    'order' => 'ASC'
);
$itinerarios = get_posts($args);
$mapaIndex = 0;

// hacer bucle de itinerarios
foreach( $itinerarios as $itinetario ){
    // Recuperar los metadatos
    $subtitulo = get_post_meta($itinetario->ID, $prefix . 'itinerary_single_name', true );
    $animalList = '';
?>
<div class="sections section ship-itinerary">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2 class="itinerary-route-title"><?= $itinetario->post_title ?></h2>
<?php 
    if ($subtitulo){
        echo '<p>'. $subtitulo . '</p>';
    }
?>
                <span class="separator itinerary-item-separator"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- mapa y fauna -->
            <div class="col-lg-9 col-md-8 col-sm-7 hidden-xs">
                <div class="row">
                    <div class="col-sm-12 nopadding">
                        <!--div id="g-map<?= $mapaIndex ?>" class="gmap-itineary"></div-->
                        <div class="itinerary-placeholder">
                            <img src="<?= get_post_meta($itinetario->ID, $prefix . 'itinerary_route_image', true ) ?>" class="img-responsive" alt="<?= $itinetario->post_title ?>">
                        </div>
                    </div>
                </div>
                <?php
                    $animalList = get_post_meta($itinetario->ID, $prefix . 'itinerary_animal_list', false);
                    //print_r($animalList);
                    $args = array(
                        'post_type' => 'gganimal',
                        'include' => $animalList
                    );
                    $animales = get_posts($args);
                    $slides = count($animales) / 4;
                    $conteoAnimal = 0;
                    /*echo '<pre>';
                    print_r($animales);
                    echo '</pre>';*/
                ?>
                <div class="row">
                    <div class="col-sm-12 carousel-container">
                        <div class="row">
                            <div class="col-xs-1 control-container">
                                <a class="left carousel-control" href="#itinerary-animal-carousel-<?= $itinetario->ID ?>" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                            <div class="col-xs-10">
                                <div id="itinerary-animal-carousel-<?= $itinetario->ID ?>" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                    <?php for($slide = 0; $slide < $slides; $slide++){ ?>
                                        <?php if ($slide == 0){ ?>
                                        <div class="item active">
                                            <div class="row">
                                                <?php for ($animal = 0; $animal < 4; $animal++){ ?>
                                                <div class="col-sm-3 animal-placeholder">
                                                    <a href="<?= get_permalink($animales[$animal]->ID) ?>" target="_blank" title="<?= $animales[$animal]->post_title ?>">
                                                        <img src="<?= get_the_post_thumbnail_url( $animales[$animal]->ID, 'thumbnail' )?>" alt="<?= get_the_title( $animales[$animal]->ID ) ?>" class="img-responsive"/>
                                                        <div class="animal-name-placeholder">
                                                            <?= esc_html($animales[$animal]->post_title) ?>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php $conteoAnimal++; } ?>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="item">
                                            <div class="row">
                                                <?php 
                                                    $faltan = count($animales) - $conteoAnimal;
                                                    if ( $faltan < 4 ){
                                                        $limite = $faltan;
                                                    }else{
                                                        $limite = 4;
                                                    }
                                                    for ($animal = 0; $animal < $limite; $animal++){ ?>
                                                <div class="col-sm-3 animal-placeholder">
                                                    <a href="<?= get_permalink($animales[$conteoAnimal]->ID) ?>" target="_blank" title="<?= $animales[$animal]->post_title ?>">
                                                        <img src="<?= get_the_post_thumbnail_url( $animales[$conteoAnimal]->ID, 'thumbnail' )?>" alt="<?= get_the_title( $animales[$conteoAnimal]->ID ) ?>" class="img-responsive"/>
                                                        <div class="animal-name-placeholder">
                                                            <?= esc_html($animales[$conteoAnimal]->post_title) ?>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php $conteoAnimal++; } ?>
                                            </div>
                                        </div>
                                        <?php } // fin si slide es cero ?>
                                    <?php } // fin for Slide ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1 control-container">
                                <a class="right carousel-control" href="#itinerary-animal-carousel-<?= $itinetario->ID ?>" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                //Day by day corto...
                $dayactive_1 = get_post_meta($itinetario->ID, $prefix . 'itinerary_active_day_1', true);
                $dayactive_2 = get_post_meta($itinetario->ID, $prefix . 'itinerary_active_day_2', true);
                $dayactive_3 = get_post_meta($itinetario->ID, $prefix . 'itinerary_active_day_3', true);
                $dayactive_4 = get_post_meta($itinetario->ID, $prefix . 'itinerary_active_day_4', true);
                $dayactive_5 = get_post_meta($itinetario->ID, $prefix . 'itinerary_active_day_5', true);
                $daysLong = $dayactive_1 + $dayactive_2 + $dayactive_3 + $dayactive_4 + $dayactive_5;
                $nightsLong = $daysLong - 1;
                $startDay = get_post_meta($itinetario->ID, $prefix . 'itinerary_start_day', true);
                $total = $startDay + $daysLong;
                if ($total > 7){
                    $total = 0;
                }else{
                    $total--;
                }

                //if ($total){}
            ?>
            <!-- info itinerario -->
            <div class="col-lg-3 col-md-4 col-sm-5 itineraries-day-by-day">
                <div class="itinerary-duration itinerary-a">                    
                    <p><?= $daysLong ?> days / <?= $nightsLong ?> Nights</p>
                    <p><?= $dias_de_la_semana[ $startDay ] ?> - <?= $dias_de_la_semana[ $total ] ?></p>
                </div>
                <ul class="itineraries-day-by-day-list">
                <?php for($i=0; $i<$daysLong; $i++){ ?>
                <?php
                    if($startDay + $i == 7){
                        $dia = 0;
                    }else{
                        $dia = $startDay + $i;
                    }
                ?>
                    <li>
                        <h4 class="day-name body-font"><?= $dias_de_la_semana[ $dia ] ?>:</h4>
                        <ul class="list-inline">
                            <li><span>am.</span></li>
                            <?php
                                // obtener lista de sitios de la mañana
                                $listDay = $i +1;
                                $morningListitems = get_post_meta($itinetario->ID, $prefix . 'itinerary_am_activities_list_day_'.$listDay , true);
                                //var_dump($morningListitems);
                                foreach($morningListitems as $morningListitem){
                                    echo '<li><a href="'.get_permalink($morningListitem).'" title="'.get_the_title( $morningListitem ).'" target="_blank">'.get_the_title( $morningListitem ).'</a></li>';
                                }
                            ?>
                        </ul>
                        <ul class="list-inline">
                            <li><span>pm.</span></li>
                            <?php
                                // obtener lista de sitios de la mañana
                                $listDay = $i +1;
                                $morningListitems = get_post_meta($itinetario->ID, $prefix . 'itinerary_pm_activities_list_day_'.$listDay , true);
                                //var_dump($morningListitems);
                                foreach($morningListitems as $morningListitem){
                                    echo '<li><a href="'.get_permalink($morningListitem).'" title="'.get_the_title( $morningListitem ).'" target="_blank">'.get_the_title( $morningListitem ).'</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                <?php } //fin for de los dias ?>
                </ul>
                <a href="#" class="itinerary-plan-your-trip-btn"><?php _e('Plan your trip now','gogalapagos'); ?></a>
                <a href="<?= get_permalink($itinetario->ID) ?>" class="view-itinerary-btn" target="_blank"><?php _e('View Complete Itinerary','gogalapagos'); ?></a>
            </div>
        </div>
    </div>
    <!--script>
        mapasParaItinerario[<?=$mapaIndex?>] = {
            'mapaIndex': '<?=$mapaIndex?>',
            /*'mapLat': -0.450030,
            'mapLng': -90.268706,
            'mrkLat': -0.255823,
            'mrkLng': -90.716505,*/
            'mrkTitle': '<?= $itinetario->post_title; ?>',
            'pathColor': '#d0de2d',
            'paths': [
                {lat: -0.450030, lng: -90.268706},  // 0 Baltra Airport
                {lat: -0.687953, lng: -90.324999},  // 1 Highlands
                {lat: -0.494422, lng: -90.344748},  // 2 Black Turtle Cove
                {lat: -0.343724, lng: -90.316823}, // Curva
                {lat: 0.323613, lng: -89.936712},  // 4 El Barranco
                {lat: 0.316512, lng: -89.955587},  // 5 Darwin Bay
                {lat: 0.099005, lng: -90.258918}, // Curva
                {lat: -0.286546, lng: -90.471527}, // Curva
                {lat: -0.526064, lng: -90.489190}, // 8 Dragons Hiull
                {lat: -0.519776, lng: -90.561965}, // Curva
                {lat: -0.580065, lng: -90.593698}, // Curva
                {lat: -0.681604, lng: -90.585765}, // Curva
                {lat: -0.784727, lng: -90.512779}, // Curva
                {lat: -0.837097, lng: -90.333400}, // Curva
                {lat: -0.785685, lng: -90.096602}, // Curva
                {lat: -0.789354, lng: -90.042648}, // Curva
                {lat: -0.808621, lng: -90.051395}, // 16 Isla Santa Fe
                {lat: -0.791536, lng: -90.003875}, // Curva
                {lat: -0.654657, lng: -90.020220}, // Curva
                {lat: -0.489567, lng: -90.167393}, // Curva
                {lat: -0.468813, lng: -90.238150}, // Curva
                {lat: -0.479482, lng: -90.260622}, // Curva
                {lat: -0.484902, lng: -90.275382}, // Curva
                {lat: -0.488491, lng: -90.375056}, // Curva
                {lat: -0.503721, lng: -90.414502}, // Curva
                {lat: -0.509080, lng: -90.418569}]

        }
        //initMultipleMaps('g-map<?=$mapaIndex?>',123,456);
        //console.log(mapasParaItinerario);
        /*function initMap() {
            <?php for($i=0;$i<$mapaIndex; $i++){ ?>
            var map<?=$i?> = new google.maps.Map(document.getElementById('g-map<?= $i ?>'), {
                zoom: 8,
                styles: styles,
                center: {lat: -0.450030, lng: -90.268706},
                mapTypeId: 'roadmap'
            });
            var marker<?=$i?> = new google.maps.Marker({
                position: {lat: -0.255823, lng: -90.716505},
                map: map<?=$i?>,
                title: '<?php echo the_title(); ?>'
            });
            <?php } ?>
        }*/
    </script-->
</div>
<?php
    //$mapaIndex++;
    //$GLOBALS['cantidaddemapasenitinerarios'] = $mapaIndex;
} // FIN foreach de los itinerarios
?>
<?php get_footer(); ?>