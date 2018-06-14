<?php get_header(); the_post(); $prefix = 'gg_';?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                <div class="row">
                    <div class="col-sm-8 col-md-7">
                        <?php the_title('<h1 class="island-title">', '</h1>'); ?>
                        <span class="single-separator"></span>
                        <p class="single-excerpt"><?= get_the_excerpt() ?></p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-md-offset-1">
                        <?php 
                        $args = array(
                            'post_type' => 'gglocation',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                    'key' => $prefix . 'visitors_site_island',
                                    'value' => get_the_ID(),
                                    'compare' => 'LIKE'
                                )
                            )
                        );
                        $visitor_sites = get_posts($args);
                        //var_dump($visitor_sites);
                        if ($visitor_sites){
                            if ( count($visitor_sites) > 1 ){ //si es mas de un sitio de visita cambia el titulo
                        ?>
                        <h2 class="visitor-site-title" style="font-size: 24px; margin-top: 33px;"><?php _e('Visitor Sites', 'gogalapagos'); ?></h2>
                        <?php }else{ ?>
                        <h2 class="visitor-site-title" style="font-size: 24px; margin-top: 33px;"><?php _e('Visitor Site', 'gogalapagos'); ?></h2>
                        <?php       
                                   } // end si es mas de uno
                        ?>
                        <span class="single-separator"></span>
                        <ul class="visitors-site-list" style="padding: 0; margin-left: 18px; margin-top: 12px;">
                            <?php 
                            foreach($visitor_sites as $site){
                                echo '<li>';
                                echo '<a href="' . get_the_permalink($site->ID) . '" title="'.esc_html($site->post_title).'">' . esc_html($site->post_title) . '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="single-hero-convertion-area">
                    <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                    <p><a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
                    <a href="#"><span class="conservation-icon"></span>Conservation of the Galapagos Islands</a>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $g_images = get_post_meta ( get_the_ID(), $prefix . 'island_gallery', true);
    ?>
    <div class="single-carousel">
        <div id="single-hero-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
            <div class="carousel-inner" role="listbox">
                <?php
                if ( count($g_images[0]) > 0 ){ //Si tiene fotos en la galeria del item
                    $i = 0;
                    while( $i < count( $g_images[0] ) ){
                        //echo $imagenes[0][$i] . '</br>';
                        if( $i == 0){
                            echo '<div class="item active">';
                        }else{
                            echo '<div class="item">';
                        }
                        echo '<img src="'.wp_get_attachment_url( $g_images[0][$i] ).'">';
                        echo '</div>';
                        $i++;
                    }
                }else{
                    if (has_post_thumbnail()){
                        echo '<div class="item active">';
                        echo get_the_post_thumbnail(get_the_ID(), 'full');
                        echo '</div>';

                    }else{
                        echo '<div class="item active"></div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="rear-slider-controllers">
        <ul class="list-inline ">
            <li>
                <a class="left" href="#single-hero-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li><span class="text-between-controllers"><?php _e('Move through the images','gogalapagos'); ?></span></li>
            <li>
                <a class="right" href="#single-hero-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="sections section single-more-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <?php include ( TEMPLATEPATH . '/templates/breadcrumbs.php'); ?>
            </div>
        </div>
        <div class="row">
            <?php
                //Locaciones de esta isla
                $args = array(
                    'post_type' => 'gglocation',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key'     => $prefix . 'visitors_site_island',
                            'value'   => $post->ID,
                        ),
                    ),
                );

                $locaciones = get_posts($args);

                $itinerarios_disponibles = [];

                $args = array(
                    'post_type' => 'ggitineraries',
                    'posts_per_page' => -1
                );
                $itinerarios_isla = get_posts($args);
                foreach ( $itinerarios_isla as $itinerario ){

                    $duracion = get_post_meta( $itinerario->ID , $prefix . 'itinerary_duration', true);

                    for ($i = 1; $i <= $duracion; $i++ ){
                        $meta_isla_am = get_post_meta( $itinerario->ID , $prefix . 'itinerary_am_activities_list_day_' . $i , true );
                        $meta_isla_pm = get_post_meta( $itinerario->ID , $prefix . 'itinerary_pm_activities_list_day_' . $i , true );

                        //print_r($meta_isla_am);
                        //print_r($meta_isla_pm);

                        foreach ( $locaciones as $locacion ){
                            if (in_array($locacion->ID, $meta_isla_am) or in_array($locacion->ID, $meta_isla_pm)){
                                $itinerarios_disponibles[] = $itinerario->ID;
                            }
                        }
                    }
                }
            ?>
        </div>
        <div class="row">
            <div class="col-sm-7 col-md-7 col-md-offset-1">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="single-more-about-content"><?php _e('More about ', 'gogalapagos') . the_title(); ?></h2>
                        <span class="separator"></span>
                        <div id="main_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div id="g-map" class="contact-page-google-map" style="height: 40vh; margin: 36px 0;"></div>  
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-3">
                <h3 class="single-sidebar-title"><?php _e('Go visit this Island', 'gogalapagos'); ?></h3>
                <span class="separator"></span>
                <p class="font-serif"><?= _e('Itineraries available','gogalapagos'); ?>:</p>
                <ul class="single-sidebar-product-list">
                    <?php 
                        foreach( array_unique($itinerarios_disponibles) as $elemento ){  
                            $item_itinerario = get_post($elemento);
                    ?>
                    <li class="single-sidebar-product-item"> 
                        <h4 class="single-sidebar-product-title"><?= get_post_meta( $item_itinerario->ID, $prefix . 'itinerary_single_name', true) ?> <br/><small><?= $item_itinerario->post_title ?></small></h4>
                        <br />
                        <a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title ?>" class="itinerary-plan-your-trip-btn"><?= _e('Request a Quote','gogalapagos'); ?></a>
                    </li>
                    <?php } ?>
                </ul>    
            </div>
        </div>
    </div>
    <script>
        <?php 
        $coords = get_post_meta(get_the_ID(), $prefix . 'island_location', true);
        $gcords = explode(',',$coords);
        if (!$coords) {
        ?>
        console.warn('Coordenadas vacias en el wordpress. Revise la isla ' + '<?= get_the_title() ?>' );
        <?php }else{ ?>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('g-map'), {
                zoom: 8,
                styles: styles,
                center: {<?php echo 'lat: '.$gcords[0].', lng: '.$gcords[1]; ?>},
                mapTypeId: 'roadmap',
                disableDefaultUI: true
            });
            var marker<?php echo $marker; ?> = new google.maps.Marker({
                position: {<?php echo 'lat: '.$gcords[0].', lng: '.$gcords[1]; ?>},
                icon: icon,
                map: map,
                title: '<?php echo the_title(); ?>'
            });
        }
        <?php } ?>
    </script>
</div>
<!--div class="sections section single-island-activities-section">
<h2 class="single-island-activities-title"><?php _e('Activities on the ') . the_title(); ?></h2>
<div class="single-carousel">
<div id="single-island-activities-carousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<div class="item active">
<img src="<?php echo get_template_directory_uri(); ?>/images/Discover-galapagos-Snorkeling.jpg" alt="Titulo de la imagen 1">
<div class="single-island-activity-text-container">
<h3 class="single-island-activity-title">Snorkeling <span class="activity-marker">*</span></h3>
<span class="separator"></span>
<div class="activity-excerpt">
<p>Id laborum distinctio minus tempore, voluptatem praesentium dolorem officia.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi temporibus nisi ipsam pariatur harum qui ab asperiores eveniet maxime ut nihil accusantium rerum amet dolore consequuntur vel fugit iure, beatae.</p>
</div>
<a class="more-about-this-activity-link" href="#"><?php _e('More about this activity', 'gogalapagos'); ?></a>
</div>
</div>
<div class="item">
<img src="<?php echo get_template_directory_uri(); ?>/images/Discover-Land-Iguana.jpg" alt="Titulo de la imagen 2">
<div class="single-island-activity-text-container">
<h3 class="single-island-activity-title">Hiking</h3>
<span class="separator"></span>
<div class="activity-excerpt">
<p>Id laborum distinctio minus tempore, voluptatem praesentium dolorem officia.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi temporibus nisi ipsam pariatur harum qui ab asperiores eveniet maxime ut nihil accusantium rerum amet dolore consequuntur vel fugit iure, beatae.</p>
</div>
<a class="more-about-this-activity-link" href="#"><?php _e('More about this activity', 'gogalapagos'); ?></a>
</div>
</div>
<div class="item">
<img src="<?php echo get_template_directory_uri(); ?>/images/Discover-galapagos-photography.jpg" alt="Titulo de la imagen 2">
<div class="single-island-activity-text-container">
<h3 class="single-island-activity-title">Photography</h3>
<span class="separator"></span>
<div class="activity-excerpt">
<p>Id laborum distinctio minus tempore, voluptatem praesentium dolorem officia.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi temporibus nisi ipsam pariatur harum qui ab asperiores eveniet maxime ut nihil accusantium rerum amet dolore consequuntur vel fugit iure, beatae.</p>
</div>
<a class="more-about-this-activity-link" href="#"><?php _e('More about this activity', 'gogalapagos'); ?></a>
</div>
</div>
</div>
</div>
</div>
<div class="rear-slider-controllers">
<ul class="list-inline">
<li>
<a class="left" href="#single-island-activities-carousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
</li>
<li><span class="text-between-controllers"><?php _e('Move through the activities','gogalapagos'); ?></span></li>
<li>
<a class="right" href="#single-island-activities-carousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</li>
</ul>
</div>
</div-->
<?php 
$args = array(
    'post_type' => 'ggisland',
    'posts_per_page' => -1,
    'post__not_in' => array(get_the_id())
);
$islands = query_posts($args);
?>
<div class="sections section more-items-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center single-more-island-section-title"><?php _e('The Galapagos Islands','gogalapagos'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="single-carousel-islands">
                    <div id="more-items-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php 
                            $cont = 0;
                            foreach($islands as $island){
                                if ($cont < 1){
                                    echo '<div class="item more-islands active">';
                                }else{
                                    echo '<div class="item more-islands">';
                                }
                            ?>
                            <div class="more-island-caption">
                                <h3 class="more-island-title"><?php echo $island->post_title; ?></h3>
                                <span class="separator left white"></span>
                                <?php 
                                $phrase = get_post_meta($island->ID, $prefix . 'island_phrase', true); 
                                if ( !empty($phrase) ){
                                    echo '<p>'.esc_html($phrase).'</p>';
                                }
                                ?>
                                <a class="view-more-about-this-island-link" href="<?php echo get_post_permalink($island->ID); ?>"><?php _e('View more about this island', 'gogalapagos'); ?></a>       
                            </div>
                            <?php
                                echo get_the_post_thumbnail($island->ID);
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
            if ( $('.single-carousel') ){
                var ruta_imagen_primer_slide = $('.carousel-inner').children('.item').find('img').attr('src');
                $('.single-hero').css('background-image', 'url(' + ruta_imagen_primer_slide + ')');
                $('.single-hero').css('background-position', 'center');
                $('.single-carousel').remove();
                $('.rear-slider-controllers').remove();
            }
        }
    });
</script>