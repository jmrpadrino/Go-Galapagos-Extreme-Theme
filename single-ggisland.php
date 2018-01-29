<?php get_header(); the_post(); $prefix = 'gg_';?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2">
                <?php the_title('<h1 class="island-title">', '</h1>'); ?>
                <span class="single-separator"></span>
                <p><?php echo the_excerpt(); ?></p>
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
                <h2><?php _e('Visitor Sites', 'gogalapagos'); ?></h2>
                <?php }else{ ?>
                <h2><?php _e('Visitor Site', 'gogalapagos'); ?></h2>
                <?php       
                        } // end si es mas de uno
                ?>
                <ul class="visitors-site-list">
                    <?php 
                        foreach($visitor_sites as $site){
                            echo '<li>';
                            echo '<a href="' . get_the_permalink($site->ID) . '" title="'.esc_html($site->post_title).'">' . esc_html($site->post_title) . '</a>';
                            echo '</li>';
                        }
                    ?>
                </ul>
                <?php } ?>
                <div class="single-hero-convertion-area">
                    <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                    <p><a class="plan-your-trip-single-btn" href="#" target="_blank"><?= _e('Plan Your Trip Now','gogalapagos'); ?></a> or <a href="#" target="_blank"><?= _e('Request a quote','gogalapagos'); ?></a></p>
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
    <div class="container-fluid" style="height: 60vh;">
        <div class="row">
            <div class="col-xs-12">
                <?php include ( TEMPLATEPATH . '/templates/breadcrumbs.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                <h2 class="single-more-about-content"><?php _e('More about ', 'gogalapagos') . the_title(); ?></h2>
                <span class="separator"></span>
                <div id="main_content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-sm-2">
                <h3 class="single-sidebar-title"><?php _e('Go visit this Island', 'gogalapagos'); ?></h3>
                <span class="separator"></span>
                <p class="font-serif"><?= _e('Itineraries available','gogalapagos'); ?>:</p>
                <ul class="single-sidebar-product-list">
                    <li class="single-sidebar-product-item">
                        <h4 class="single-sidebar-product-title">Producto 1</h4>
                        <a href="#" class="btn btn-warning pull-right"><?= _e('ENJOY','gogalapagos'); ?></a>
                    </li>
                    <li>
                        <h4 class="single-sidebar-product-title">Producto 2</h4>
                        <a href="#" class="btn btn-default pull-right"><?= _e('ENJOY','gogalapagos'); ?></a>
                    </li>
                </ul>    
            </div>
        </div>
    </div>
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-xs-12">
                <div id="g-map" class="contact-page-google-map" style="height: 40vh;"></div>  
            </div>
        </div>
        <script>
<?php 
    $coords = get_post_meta(get_the_ID(), $prefix . 'island_location', true);
    $gcords = explode(',',$coords);
?>
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
        </script>
    </div>
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
                                <span class="separator"></span>
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