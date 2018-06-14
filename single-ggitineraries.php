<?php
get_header();
$prefix = 'gg_';

$dias_de_la_semana = array(
    _x('Monday','gogalapagos'),
    _x('Tuesday','gogalapagos'),
    _x('Wednesday','gogalapagos'),
    _x('Thursday','gogalapagos'),
    _x('Friday','gogalapagos'),
    _x('Saturday','gogalapagos'),
    _x('Sunday','gogalapagos'),
);
$desembarqueCatalogo = array(
    '0' => _x('None','gogalapagos'),
    '1' => _x('Dry Landing','gogalapagos'),
    '2' => _x('Wet Landing','gogalapagos'),
    '3' => _x('Dry or Wet Landing','gogalapagos'),
    '4' => _x('Circumnavigation','gogalapagos'),
);
$terrenoCatalogo = array(
    '0' => _x('None','gogalapagos'),
    '1' => _x('Eroded Tuff','gogalapagos'),
    '2' => _x('Flat','gogalapagos'),
    '3' => _x('Flat & Muddy','gogalapagos'),
    '4' => _x('Flat & Petrified Lava','gogalapagos'),
    '5' => _x('Flat & Sandy','gogalapagos'),
    '6' => _x('Flat & Semi-rocky','gogalapagos'),
    '7' => _x('Hill/mountain','gogalapagos'),
    '8' => _x('Marsh','gogalapagos'),
    '9' => _x('Muddy','gogalapagos'),
    '10' => _x('Petrified Lava','gogalapagos'),
    '11' => _x('Rocky','gogalapagos'),
    '12' => _x('Rocky & Petrified Lava','gogalapagos'),
    '13' => _x('Rocky & Sandy','gogalapagos'),
    '14' => _x('Sandy','gogalapagos'),
    '15' => _x('Shallow Ocean','gogalapagos'),
    '16' => _x('Slippery','gogalapagos'),
    '17' => _x('Steep','gogalapagos'),
    '18' => _x('Steep & Petrified Lava','gogalapagos'),
    '19' => _x('Water','gogalapagos'),
    '20' => _x('Wooden Trail','gogalapagos'),
);
$dificultadCatalogo = array(
    '0' => _x('Low'),
    '1' => _x('High'),
    '2' => _x('Medium'),
    '3' => _x('Medium / High')
);
?>
<div class="sections section single-itinerary itinerary-hero">
    <div class="single-thumbnail-container">
        <?php echo the_post_thumbnail(); ?>
    </div>
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
                <?php
                $term = get_post_meta( get_the_ID(), $prefix . 'itinerary_ship_id', true );
                ?>
                <span class="body-font text-center itinerary-ship-owner"><?php echo get_the_title( $term ); ?></span>
                <?php the_title('<h1 class="itinerary-title text-center">', '</h1>'); ?>
                <span class="separator white"></span>
                <p><?php echo get_the_excerpt(); ?></p>
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?php $sugerencias = get_post_meta( get_the_ID(), $prefix . 'pax_sugerencia', false); ?>
                <ul class="list-inline">
                    <?php foreach($sugerencias as $sugerencia){ ?>
                    <li><img width="50" src="<?= get_template_directory_uri() ?>/images/icono-<?= $sugerencia ?>.png" alt="<?= $sugerencia ?>" title="<?= $sugerencia ?>"></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
                <p><a href="<?= home_url('request-a-quote') ?>/" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <a href="#map"><?php _e('View Itinerary Map'); ?></a>
            </div>
            <div class="col-sm-4">
                <div class="scroll-indicator"></div>
            </div>
            <div class="col-sm-4 text-right">
                <a href="#">Conservation of the Galapagos Islands</a>
            </div>            
        </div>
    </div>
</div>

<?php
// recuperar los dias activos
for($i=1; $i<=5; $i++){

    // validar si el dia está activo
    $diaActivo = get_post_meta( get_the_ID(), $prefix . 'itinerary_active_day_'.$i, true);

    if( $diaActivo == 1 ){


        // Dia Activo
?>
<div class="sections section <?= $i % 2 == 0 ? 'darker' : '' ?>">
    <div class="container-fluid">
        <div class="row nopadding">
            <div class="col-md-12 col-lg-6">
                <div class="day-placeholder">
                    <h2><?= _e('Day','gogalapagos'); ?> <?= $i ?>. <?= $dias_de_la_semana[$i-1]?></h2>
                    <span class="serif-font" style="display: block;">AM</span>
                    <?php
            // obtener los datos del metaDIA para obtener los metas de los posts de sitios de visita
            $sitiosAm = get_post_meta( get_the_ID(), $prefix . 'itinerary_am_activities_list_day_'.$i, true);
        foreach( $sitiosAm as $sitioAm ){

            $content_post = get_post($sitioAm);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);

            echo '<h3>' . esc_html($content_post->post_title) . '</h3>';
            echo '<p>' . $content . '</p>';
            //echo '<p>' . esc_html($content_post->post_excerpt) . '</p>';
            echo '<ul>';
            $disembarking = get_post_meta($content_post->ID, $prefix . 'visitors_site_disembarking', false);
            $terrain = get_post_meta($content_post->ID, $prefix . 'visitors_site_terrain', false);
            $difficulty = get_post_meta($content_post->ID, $prefix . 'visitors_site_difficulty', false);
            $duration = get_post_meta($content_post->ID, $prefix . 'visitors_site_duration', false);
            $physical = get_post_meta($content_post->ID, $prefix . 'visitors_site_physical', false);
            if( $disembarking ){
            echo '<li><strong>'. __('Disembarking', 'gogalapagos') .':</strong> '.$desembarqueCatalogo[$disembarking[0]].'</li>';
            }
            if( $terrain ){
            echo '<li><strong>'. __('Type of Terrain', 'gogalapagos') .':</strong> '.$terrenoCatalogo[$terrain[0]].'</li>';
            }
            if( $physical ){
            echo '<li><strong>'. __('Physical Conditions Required', 'gogalapagos') .':</strong> '.$dificultadCatalogo[$physical[0]].'</li>';
            }
            if( $duration ){
            echo '<li><strong>'. __('Activities', 'gogalapagos') .':</strong> '.$duration[0].'</li>';
            }
            echo '</ul>';
            //echo '<h4>'. __('Highlights','gogalalagos') .'</h4>';
        }
                    ?>
                    <span class="serif-font" style="display: block;">PM</span>
                    <?php
        // obtener los datos del metaDIA para obtener los metas de los posts de sitios de visita
        $sitiosAm = get_post_meta( get_the_ID(), $prefix . 'itinerary_pm_activities_list_day_'.$i, true);
        foreach( $sitiosAm as $sitioAm ){

            $content_post = get_post($sitioAm);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);

            echo '<h3>' . esc_html($content_post->post_title) . '</h3>';
            //echo '<p>' . esc_html($content_post->post_excerpt) . '</p>';
            echo '<p>' . $content . '</p>';
            $metas = get_post_meta($content_post->ID);
            echo '<ul>';
            $disembarking = get_post_meta($content_post->ID, $prefix . 'visitors_site_disembarking', false);
            $terrain = get_post_meta($content_post->ID, $prefix . 'visitors_site_terrain', false);
            $difficulty = get_post_meta($content_post->ID, $prefix . 'visitors_site_difficulty', false);
            $duration = get_post_meta($content_post->ID, $prefix . 'visitors_site_disembarking', false);
            $physical = get_post_meta($content_post->ID, $prefix . 'visitors_site_disembarking', false);
            if( $disembarking ){
            echo '<li><strong>'. __('Disembarking', 'gogalapagos') .':</strong> '.$desembarqueCatalogo[$disembarking[0]].'</li>';
            }
            if( $terrain ){
            echo '<li><strong>'. __('Type of Terrain', 'gogalapagos') .':</strong> '.$terrenoCatalogo[$terrain[0]].'</li>';
            }
            if( $physical ){
            echo '<li><strong>'. __('Physical Conditions Required', 'gogalapagos') .':</strong> '.$dificultadCatalogo[$physical[0]].'</li>';
            }
            if( $duration ){
            echo '<li><strong>'. __('Activities', 'gogalapagos') .':</strong> '.$duration[0].'</li>';
            }
            echo '</ul>';
        }
                    ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 nopadding">
                <?php
        $featuredImage = get_post_meta( get_the_ID(), $prefix . 'itinerary_featured_image_day_'.$i, true);
        $rutaImagen = wp_get_attachment_image_src( $featuredImage, 'full', false );
                ?>
                <div class="day-image-placeholder">
                    <img src="<?= $rutaImagen[0] ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>
<?php 
    $ruta = get_post_meta( get_the_ID(), $prefix. 'itinerary_route_image', true); 
    if ($ruta){
?>
<div class="sections section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <img src="<?= $ruta ?>" class="img-responsive single-itinerary-map-image" alt="<?php echo __('Itineraty route', 'gogalapagos') ?> <?= the_title(); ?>">
            </div>
        </div>
    </div>
</div>
<?php } // fin si tiene imagne de la ruta ?>
<div class="sections section more-items-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center single-more-island-section-title"><?php echo get_the_title( $term ); ?> <?php _e('Itineraries','gogalapagos'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="single-carousel-islands">
                    <div id="more-items-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php 
                            $args = array(
                                'post_type' => 'ggitineraries',
                                'meta_query' => array(
                                    array(
                                        'key'     => $prefix . 'itinerary_ship_id',
                                        'value'   => $term,
                                        'compare' => 'LIKE',
                                    ),
                                ),
                                'post__not_in' => array(get_the_ID()),
                                'orderby' => 'post_date',
                                'order' => 'ASC'
                            );
                            $demasItinerarios = get_posts($args);
                            $cont = 0;
                            foreach($demasItinerarios as $demasItinerario){
                                if ($cont < 1){
                                    echo '<div class="item more-islands active">';
                                }else{
                                    echo '<div class="item more-islands">';
                                }
                            ?>
                            <div class="more-island-caption">
                                <h3 class="more-island-title"><?php echo $demasItinerario->post_title; ?></h3>
                                <span class="separator"></span>
                                <?php 
                                    $phrase = get_post_meta($demasItinerario->ID, $prefix . 'island_phrase', true); 
                                    if ( !empty($phrase) ){
                                        echo '<p>'.esc_html($phrase).'</p>';
                                    }
                                ?>
                                <a class="view-more-about-this-island-link" href="<?php echo get_post_permalink($demasItinerario->ID); ?>"><?php _e('View more about this island', 'gogalapagos'); ?></a>       
                            </div>
                            <?php
                                echo get_the_post_thumbnail($demasItinerario->ID);
                                echo '</div>';
                                $cont++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="rear-slider-controllers">
                    <ul class="list-inline">
                        <li>
                            <a class="left" href="#more-items-carousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li><span class="text-between-controllers"><?php _e('Move through the islands','gogalapagos'); ?></span></li>
                        <li>
                            <a class="right" href="#more-items-carousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>       
    </div>
</div>
<?php get_footer(); ?>
<script>
    $(document).ready( function(){
        // pasa la imagen destacada como fondo del FOLD y luego elimina la imagen destacada del DOM 
        // solo en pantallas menores a 1024 (tablets)
        if( $(window).width() < 1025 ){
            $('.single-thumbnail-container').parents('.section').css('background-image','url('+ $('.single-thumbnail-container').children('img').attr('src') +')');
            $('.single-thumbnail-container').css('background-position', 'center');
            $('.single-thumbnail-container').remove();
        }
    });
</script>