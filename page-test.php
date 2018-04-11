<?php 
get_header(); 
the_post();
$prefix = 'gg_';
?>
<div class="sections section">
    <div class="container">
        <div class="row">
            <?php
            //OBTENER LOS ITINERARIOS ASIGNADOS A ESTE BARCO POR EL ID DEL BARCO
            $args = array(
                'post_type' => 'ggitineraries',
                'meta_query' => array(
                    array(
                        'key'     => $prefix . 'itinerary_ship_id',
                        'value'   => '153',
                        'compare' => 'LIKE',
                    ),
                ),
                'orderby' => 'post_date',
                'order' => 'ASC'
            );
            $itinerariosSimples = get_posts($args);
            echo '<pre>';
            //var_dump($itinerariosSimples);
            echo '</pre>';

            ?>
        </div>
        <div class="row">
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <?php
            
            $coutItinerarios = count($itinerariosSimples); 
            $itinerarioLargo = array();

            for ($i = 0; $i < $coutItinerarios; $i++){
                
                $next = $i + 1;

                if( $next == $coutItinerarios){
                    $next = 0;
                }
                
                $diasPrimero = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_duration', true );
                $diasSegundo = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_duration', true );
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
                    
                    $itinerarioLargo[$itinerariosSimples[$i]->post_name .'+'.$itinerariosSimples[$next]->post_name][$j] = array(
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
                    
                    $itinerarioLargo[$itinerariosSimples[$i]->post_name .'+'.$itinerariosSimples[$next]->post_name][$k + $diasPrimero - 1] = array(
                        'sitiosam' => $sitiosFinalAM,
                        'sitiospm' => $sitiosFinalPM
                    );
                }
            }

            /*
            
            $coutItinerarios = count($itinerariosSimples); 
            $itinerarioLargo = array();

            for ($i = 0; $i < $coutItinerarios; $i++){

                $next = $i + 1;

                if( $next == $coutItinerarios){
                    $next = 0;
                }
                for ($j = 1; $j <= 5 ; $j++){
                    $sitiosInicialAM = [];
                    $sitiosInicialPM = [];
                    $sitiosFinalAM = [];
                    $sitiosFinalPM = [];

                    // obtener los meta del primer itinerario dias am y pm
                    $itinerarioInicial_activo = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_active_day_' . $j, true );
                    $itinerarioFinal_activo = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_active_day_' . $j, true );

                    if ($itinerarioInicial_activo == 1){

                        $actividadesAM = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_am_activities_list_day_' . $j, false );
                        foreach( $actividadesAM as $sitio ){
                            $sitiosInicialAM[] = get_the_title($sitio[0]);
                        }
                        $actividadesPM = get_post_meta( $itinerariosSimples[$i]->ID, $prefix . 'itinerary_pm_activities_list_day_' . $j, false );
                        foreach( $actividadesPM as $sitio ){
                            $sitiosInicialPM[] = get_the_title($sitio[0]);
                        }
                        $itinerarioLargo[$i][$itinerariosSimples[$i]->post_title][$j] = array(
                            'sitiosam' => $sitiosInicialAM,
                            'sitiospm' => $sitiosInicialPM
                        );

                    }
                    if ($itinerarioFinal_activo == 1){

                        $actividadesAM = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_am_activities_list_day_' . $j, false );
                        foreach( $actividadesAM as $sitio ){
                            $sitiosFinalAM[] = get_the_title($sitio[0]);
                        }
                        $actividadesPM = get_post_meta( $itinerariosSimples[$next]->ID, $prefix . 'itinerary_pm_activities_list_day_' . $j, false );
                        foreach( $actividadesPM as $sitio ){
                            $sitiosFinalPM[] = get_the_title($sitio[0]);
                        }

                        $itinerarioLargo[$i][$itinerariosSimples[$next]->post_title][$j - 1] = array(
                            'sitiosam' => $sitiosFinalAM,
                            'sitiospm' => $sitiosFinalPM 
                        );

                    }
                    if ($j == 5){
                        $itinerarioLargo[$i][$itinerariosSimples[$i]->post_title][$j - 1]['sitiospm'] = $itinerarioLargo[$i][$itinerariosSimples[$next]->post_title][0]['sitiospm'];
                    }


                }
                //quitar el primer elemento del itinerario final
                unset($itinerarioLargo[$i][$itinerariosSimples[$next]->post_title][0]);
            }
            
            */
            echo '<pre>';
            //echo $itinerariosSimples[$i]->post_title . ' | ' . $itinerariosSimples[$next]->post_title . ' | ' . $next;
            print_r($itinerarioLargo);
            echo '</pre>';
            ?>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">left</div>
            <div class="col-sm-4 text-center">center</div>
            <div class="col-sm-4 text-center">right</div>
        </div>
        <style>
            .flex-ejemplo{
                display: flex; width: 100%; background: green; justify-content: space-between; padding: 36px 0; 
            }
            @media screen and (max-width: 768px){
                .flex-ejemplo{
                    flex-direction: column-reverse;

                }
            }
        </style>
        <div class="row">
            <div class="col-xs-12">
                <div class="flex-ejemplo">
                    <div class="div1 text-center" style="background: red; flex: 1; padding: 36px;">             
                        <div>
                            <img src="http://placehold.it/80x80">
                        </div>
                    </div>
                    <div class="div1" style="background: blue; flex: 1;">cosa</div>
                    <div class="div1" style="background: yellow; flex: 1; ">cosa</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?xml version="1.0" encoding="utf-8"?>
                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 1500 700" style="enable-background:new 0 0 1500 700;" xml:space="preserve">
                    <style type="text/css">
                        .st0{opacity:0.4;fill:#00AEE9;}
                        .st1{opacity:0.4;fill:#41BDEE;}
                    </style>
                    <g id="Capa_1">
                        <image style="overflow:visible;" width="4469" height="1440" xlink:href="<?= get_template_directory_uri() ?>/images/9E6FE0E4.png"  transform="matrix(0.3493 0 0 0.3493 -30.9836 98.5128)"></image>
                    </g>
                    <g id="c-59">
                        <polygon class="st0" points="734.7,163.3 632.3,163.3 632.2,242.7 604.7,243.3 604.7,341.3 734.7,341.3 	"/>
                    </g>
                    <g id="c-57">
                        <rect x="734.7" y="163.3" class="st0" width="102" height="178"/>
                    </g>
                    <g id="c-55">
                        <path class="st0" d="M961.3,281.8v-42.5c7.8-3.9,14.7-13.4,21.3-24.8l17.5,0.5v-51.7H836.7v178H1000V330v-47.5L961.3,281.8z"/>
                    </g>
                    <g id="c-53">
                        <path class="st0" d="M1000,330h104V163.3h-104V215l-17.5-0.5c-6.6,11.3-13.5,20.8-21.3,24.8v42.5l38.8,0.8V330z"/>
                    </g>
                    <g id="c-51">
                        <polygon class="st0" points="1104,326.3 1219,326.3 1219,287.7 1212.9,287.5 1212.9,163.3 1104,163.3 	"/>
                    </g>
                    <g id="c-50">
                        <polygon class="st1" points="1206.7,547 1122,547 1122,392.3 1115.3,392.7 1115.3,357 1211.3,357 1211.3,494 1206.7,497.3 	"/>
                    </g>
                    <g id="c-52">
                        <rect x="1003.6" y="394" class="st0" width="118.4" height="153"/>
                    </g>
                    <g id="c-54">
                        <rect x="872.5" y="365" class="st0" width="131.1" height="182"/>
                    </g>
                    <g id="c-56">
                        <rect x="749.5" y="365" class="st0" width="123" height="182"/>
                    </g>
                    <g id="c-58">
                        <polygon class="st0" points="750,547 637,547 637,504.3 627,504.3 627,365 750,365 	"/>
                    </g>
                </svg>

            </div>
        </div>
    </div>
</div>
<?php
    get_footer(); 
?>