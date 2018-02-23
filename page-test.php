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
</div>
<?php
    get_footer(); 
?>