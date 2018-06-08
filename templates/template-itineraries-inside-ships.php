<?php
$post_barco = get_post($barcoID);
$prefix = 'gg_';

$dias_de_la_semana = array(
    '0' => _x('Monday','gogalapagos'),
    '1' => _x('Tuesday','gogalapagos'),
    '2' => _x('Wednesday','gogalapagos'),
    '3' => _x('Thursday','gogalapagos'),
    '4' => _x('Friday','gogalapagos'),
    '5' => _x('Saturday','gogalapagos'),
    '6' => _x('Sunday','gogalapagos'),
    '7' => _x('Monday','gogalapagos'),
    '8' => _x('Tuesday','gogalapagos'),
    '9' => _x('Wednesday','gogalapagos'),
    '10' => _x('Thursday','gogalapagos'),
    '11' => _x('Friday','gogalapagos'),
    '12' => _x('Saturday','gogalapagos'),
    '13' => _x('Sunday','gogalapagos'),
    '14' => _x('Monday','gogalapagos'),
    '15' => _x('Tuesday','gogalapagos'),
    '16' => _x('Wednesday','gogalapagos'),
    '17' => _x('Thursday','gogalapagos'),
    '18' => _x('Friday','gogalapagos'),
    '19' => _x('Saturday','gogalapagos'),
    '20' => _x('Sunday','gogalapagos'),
    '21' => _x('Monday','gogalapagos'),
    '22' => _x('Tuesday','gogalapagos'),
    '23' => _x('Wednesday','gogalapagos'),
    '24' => _x('Thursday','gogalapagos'),
    '25' => _x('Friday','gogalapagos'),
    '26' => _x('Saturday','gogalapagos'),
    '27' => _x('Sunday','gogalapagos'),
);
$imagen_extendidos = array(
    0 => 'ab',
    1 => 'bc',
    2 => 'cd',
    3 => 'da'
);
?>
<div class="container-fluid info-container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="ship-itinerary-title"><?= $post_barco->post_title ?> <?= _e('Itineraries','gogalapagos') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php
                //OBTENER LOS ITINERARIOS ASIGNADOS A ESTE BARCO POR EL ID DEL BARCO
                $args = array(
                    'post_type' => 'ggitineraries',
                    'meta_query' => array(
                        array(
                            'key'     => $prefix . 'itinerary_ship_id',
                            'value'   => $post_barco->ID,
                            'compare' => 'LIKE',
                        ),
                    ),
                    'orderby' => 'post_date',
                    'order' => 'ASC'
                );
                $itinerariosSimples = get_posts($args);
            ?>
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="first active"><a class="itineraries-firts-tab" href="#duration4or5nights" aria-controls="home" role="tab" data-toggle="tab"><?= '4 & 5'?> <?= _e('Days','gogalapagos') ?></a></li>
                    <li role="presentation"><a href="#durarion8nights" aria-controls="home" role="tab" data-toggle="tab">8 <?= _e('Days','gogalapagos') ?></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="duration4or5nights">
                        <div id="ship-itineraries-slider" class="carousel slide" data-ride="carousel">
                            <?php /*
                                <ol class="carousel-indicators">
                                    <?php for($iti = 0; $iti < count($itinerariosSimples); $iti++ ){ ?>
                                    <?php if ($iti == 0){ ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?= $iti ?>" class="active" style="background:red;"> </li>
                                    <?php }else{ ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?= $iti ?>"> </li>
                                    <?php } //END IF ?>
                                    <?php } //END FOR ?>
                                </ol>
                                */ ?>
                            <div class="carousel-inner ship-itineraries-slider">
                                <?php for($iti = 0; $iti < count($itinerariosSimples); $iti++ ){ ?>
                                <div class="item <?= $iti == 0 ? 'active' : ''?>">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-7 hidden-xs">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <h3 class=""><?= $itinerariosSimples[$iti]->post_title ?></h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="itinerary-placeholder">
                                                            <img src="<?= get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_route_image', true ) ?>" class="img-responsive side-itinerary-image" alt="<?= $itinerariosSimples[$iti]->post_title ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-5 itineraries-day-by-day">
                                                <?php
                                                    //Day by day corto...
                                                    $dayactive_1 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_active_day_1', true);
                                                    $dayactive_2 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_active_day_2', true);
                                                    $dayactive_3 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_active_day_3', true);
                                                    $dayactive_4 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_active_day_4', true);
                                                    $dayactive_5 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_active_day_5', true);
                                                    $daysLong = $dayactive_1 + $dayactive_2 + $dayactive_3 + $dayactive_4 + $dayactive_5;
                                                    $nightsLong = $daysLong - 1;
                                                    $startDay = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_start_day', true);
                                                    $total = $startDay + $daysLong;
                                                    if ($total > 7){
                                                        $total = 0;
                                                    }else{
                                                        $total--;
                                                    }
                                                    //if ($total){}
                                                ?>
                                                <!-- info itinerario -->
                                                <div class="itinerary-duration itinerary-a" style="color:<?= $dayactive_5 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_frontend_color', true); ?>">                    
                                                    <p><?= $daysLong ?> days / <?= $nightsLong ?> Nights</p>
                                                    <p><?= $dias_de_la_semana[ $startDay ] ?> <?= _e('to', 'gogalapagos') ?> <?= $dias_de_la_semana[ $total ] ?></p>
                                                </div>
                                                <ul class="itineraries-day-by-day-list">
                                                    <?php for($i=0; $i<$daysLong; $i++){ ?>
                                                    <?php
                                                    if($i > 0){
                                                        $startDay++;
                                                    }
                                                    ?>
                                                    <li>
                                                        <h4 class="day-name body-font"><?= $dias_de_la_semana[ $startDay ] ?>:</h4>
                                                        <ul class="list-inline">
                                                            <li><span>am.</span></li>
                                                            <?php
                                                        // obtener lista de sitios de la mañana
                                                        $listDay = $i +1;
                                                    $morningListitems = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_am_activities_list_day_'.$listDay , true);
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
                                                    $morningListitems = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_pm_activities_list_day_'.$listDay , true);
                                                    //var_dump($morningListitems);
                                                    foreach($morningListitems as $morningListitem){
                                                        echo '<li><a href="'.get_permalink($morningListitem).'" title="'.get_the_title( $morningListitem ).'" target="_blank">'.get_the_title( $morningListitem ).'</a></li>';
                                                    }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                    <?php } //fin for de los dias ?>
                                                </ul>
                                                <a href="<?= home_url('request-a-quote')?>?itid=<?= $itinerariosSimples[$iti]->ID ?>" class="itinerary-plan-your-trip-btn"><?php _e('Request a Quote','gogalapagos'); ?></a>
                                                <a href="<?= get_permalink($itinerariosSimples[$iti]->ID) ?>" class="view-itinerary-btn" target="_blank"><?php _e('View Complete Itinerary','gogalapagos'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } //END FOR ?>
                                </div>
                                <div class="ship-itineraries-carousel-controls">
                                    <a class="left carousel-control itinerary-control" href="#ship-itineraries-slider" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                                    <a class="right carousel-control itinerary-control" href="#ship-itineraries-slider" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="durarion8nights">
                            <div id="ship-extended-itineraries-slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner ship-itineraries-slider">
                                
                                <?php
                                    $coutItinerarios = count($itinerariosSimples); 
                                    $itinerarioLargo = array();

                                    for ($i = 0; $i < $coutItinerarios; $i++){
                                    
                                        $startDay = get_post_meta($itinerariosSimples[$i]->ID, $prefix . 'itinerary_start_day', true);
                                        
                                        echo $i == 0 ? '<div class="item active">' : '<div class="item">';
                                        
                                        $next = $i + 1;

                                        if( $next == $coutItinerarios){
                                            $next = 0;
                                        }
                                        $diasPrimero = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_duration', true );
                                        $diasSegundo = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_duration', true );
                                        echo '<div class="row">';
                                            echo '<div class="col-xs-12">';
                                                echo '<h3>'.$itinerariosSimples[$i]->post_title.' '._x('and','gogalapagos').' '.$itinerariosSimples[$next]->post_title.'</h3>';
                                                echo '<small>' . _e('Extended Cruise', 'gogalapagos') . '</small>';
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="row">';
                                            echo '<div class="col-sm-8">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-sm-12">';
                                                        echo '<img src="' . get_post_meta($barcoID, $prefix . 'ship_extended_img_'. $imagen_extendidos[$i], true ) . '" class="img-responsive">';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        ?>
                                            <div class="col-sm-4">
                                                <div class="itinerary-duration itinerary-a" style="color:<?= $dayactive_5 = get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_frontend_color', true); ?>">                    
                                                    <p><?= $diasPrimero + $diasSegundo - 1 ?> days / <?= $diasPrimero + $diasSegundo - 2 ?> Nights</p>
                                                    <p><?= $dias_de_la_semana[ $startDay ] ?> <?= _e('to', 'gogalapagos') ?> <?= $dias_de_la_semana[ $startDay ] ?></p>
                                                </div>
                                        <?php  
                                        //echo $diasPrimero . ' ' . $diasSegundo;

                                        //arreglo primer itinerario
                                        for ($j = 1; $j <= $diasPrimero ; $j++){

                                            if($j == $diasPrimero){
                                                break;
                                            }

                                            $sitiosInicialAM = [];
                                            $sitiosInicialPM = [];

                                            $actividadesAM = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_am_activities_list_day_' . $j, false );
                                            foreach( $actividadesAM as $sitio ){
                                                $sitiosInicialAM[] = get_the_title($sitio[0]);
                                            }
                                            $actividadesPM = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_pm_activities_list_day_' . $j, false );
                                            foreach( $actividadesPM as $sitio ){
                                                $sitiosInicialPM[] = get_the_title($sitio[0]);
                                            }

                                            $itinerarioLargo[$i][$j] = array(
                                                'sitiosam' => $sitiosInicialAM,
                                                'sitiospm' => $sitiosInicialPM
                                            );
                                        }

                                        //arreglo segundo itinerario
                                        for ($k = 1; $k <= $diasSegundo ; $k++){
                                            $sitiosFinalAM = [];
                                            $sitiosFinalPM = [];

                                            $actividadesAM = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_am_activities_list_day_' . $k, false );

                                            if($k == 1){
                                                $extendedAM = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_am_activities_list_extended_day_' . $k, false );
                                                if ($extendedAM){
                                                    $actividadesAM = $extendedAM;
                                                }
                                            }

                                            foreach( $actividadesAM as $sitio ){
                                                $sitiosFinalAM[] = get_the_title($sitio[0]);
                                            }
                                            $actividadesPM = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_pm_activities_list_day_' . $k, false );
                                            if($k == 1){
                                                $extendedPM = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_pm_activities_list_extended_day_' . $k, false );
                                                if($extendedPM){
                                                    $actividadesPM = $extendedPM;
                                                }
                                            }
                                            foreach( $actividadesPM as $sitio ){
                                                $sitiosFinalPM[] = get_the_title($sitio[0]);
                                            }

                                            $itinerarioLargo[$i][$k + $diasPrimero - 1] = array(
                                                'sitiosam' => $sitiosFinalAM,
                                                'sitiospm' => $sitiosFinalPM
                                            );
                                        }
                                        ?>
                                        <ul class="itineraries-day-by-day-list extended">
                                        <li>
                                        <?php
                                        $dayadd = 0;
                                        foreach($itinerarioLargo[$i] as $sitio){
                                            if($dayadd > 0){
                                                $startDay++;
                                            }
                                            $dayadd++;
                                        ?>
                                                <h4 class="day-name body-font"><?= $dias_de_la_semana[ $startDay ] ?>:</h4>
                                                <ul class="list-inline">
                                                    <li><span>am.</span></li>
                                            <?php 
                                                /*foreach($morningListitems as $morningListitem){
                                                    echo '<li><a href="'.get_permalink($morningListitem).'" title="'.get_the_title( $morningListitem ).'" target="_blank">'.get_the_title( $morningListitem ).'</a></li>';
                                                }*/
                                                echo $sitio['sitiosam'][0]; //get_the_title($sitio[0])
                                                //print_r($sitio['sitiosam']);
                                                    echo '</li></ul></li>';
                                        ?>
                                            <li>
                                                <ul class="list-inline">
                                                    <li><span>pm.</span></li>
                                        <?php
                                                echo $sitio['sitiospm'][0]; //get_the_title($sitio[0])
                                                //print_r($sitio['sitiosam']);
                                                    echo '</li></ul>';
                                        };
                                        echo '</li></ul>';
                                        echo '</div>';
                                        echo '</div>'; // FIN col-sm-4
                                        echo '</div>'; // FIN ROW
                                    } //END FOR ITEMS CAROUSEL
                                    /*echo '<pre>';
                                    //echo $itinerariosSimples[$i]->post_title . ' | ' . $itinerariosSimples[$next]->post_title . ' | ' . $next;
                                    print_r($itinerarioLargo);
                                    echo '</pre>';*/
                                ?>
                                </div>
                                <div class="ship-itineraries-carousel-controls">
                                    <a class="left carousel-control itinerary-control" href="#ship-extended-itineraries-slider" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                                    <a class="right carousel-control itinerary-control" href="#ship-extended-itineraries-slider" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                                </div>
                            </div>
                            <!--div id="ship-itineraries-slider-8" class="carousel slide" data-ride="carousel">
<div class="carousel-inner ship-itineraries-slider">
<div class="item active">
uno
</div>
<div class="item">
dos
</div>
</div>
<div class="ship-itineraries-carousel-controls">
<a class="left carousel-control itinerary-control" href="#ship-itineraries-slider-8" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
<a class="right carousel-control itinerary-control" href="#ship-itineraries-slider-8" data-slide="next"><span class="fa fa-chevron-right"></span></a>
</div>
</div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>