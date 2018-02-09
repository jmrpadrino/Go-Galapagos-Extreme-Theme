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
    '6' => _x('Sunday','gogalapagos')
);
?>
<section data-anchor="itineraries" class="section sections">
    <div class="container-fluid">
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
                        <li role="presentation" class="first active"><a href="#duration4or5nights" aria-controls="home" role="tab" data-toggle="tab"><?= '4 & 5'?> <?= _e('Days','gogalapagos') ?></a></li>
                        <li role="presentation"><a href="#durarion8nights" aria-controls="home" role="tab" data-toggle="tab">8 <?= _e('Days','gogalapagos') ?></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="duration4or5nights">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
                                    <?php if ($iti == 0){ ?>
                                    <div class="item active">
                                    <?php }else{ ?>
                                    <div class="item">
                                    <?php } //END IF ?>
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
                                                            <img src="<?= get_post_meta($itinerariosSimples[$iti]->ID, $prefix . 'itinerary_route_image', true ) ?>" class="img-responsive" alt="<?= $itinerariosSimples[$iti]->post_title ?>">
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
                                                <a href="#" class="itinerary-plan-your-trip-btn"><?php _e('Plan your trip now','gogalapagos'); ?></a>
                                                <a href="<?= get_permalink($itinerariosSimples[$iti]->ID) ?>" class="view-itinerary-btn" target="_blank"><?php _e('View Complete Itinerary','gogalapagos'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } //END FOR ?>
                                </div>
                                <div class="ship-itineraries-carousel-controls">
                                    <a class="left carousel-control itinerary-control" href="#carousel-example-generic" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                                    <a class="right carousel-control itinerary-control" href="#carousel-example-generic" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="durarion8nights">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>