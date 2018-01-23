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
?>
<div class="sections section single-itinerary itinerary-hero">
    <div class="single-thumbnail-container">
        <?php echo the_post_thumbnail(); ?>
    </div>
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?php
                $term = get_post_meta( get_the_ID(), $prefix . 'itinerary_ship_id', true );
                ?>
                <span class="body-font text-center itinerary-ship-owner"><?php echo get_the_title( $term ); ?></span>
                <?php the_title('<h1 class="itinerary-title text-center">', '</h1>'); ?>
                <span class="separator"></span>
                <p><?php echo get_the_excerpt(); ?></p>
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                <p><a class="plan-your-trip-single-btn">Plan Your Trip Now</a> or <a href="#">Request a Quote</a></p>
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
            <div class="col-sm-6">
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
            echo '<li><strong>'. __('Disembarking', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Difficulty Level', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Type of Terrain', 'gogalapagos') .':</strong> Valor</li>';
            //echo '<li><strong>'. __('Physical Conditions Required', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Duration', 'gogalapagos') .':</strong> Valor</li>';
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
            echo '<ul>';
            echo '<li><strong>'. __('Disembarking', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Difficulty Level', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Type of Terrain', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Physical Conditions Required', 'gogalapagos') .':</strong> Valor</li>';
            echo '<li><strong>'. __('Duration', 'gogalapagos') .':</strong> Valor</li>';
            echo '</ul>';
        }
                    ?>
                </div>
            </div>
            <div class="col-sm-6 nopadding">
                <?php
        $featuredImage = get_post_meta( get_the_ID(), $prefix . 'itinerary_featured_image_day_'.$i, true);
        $rutaImagen = wp_get_attachment_image_src( $featuredImage, 'full', false );
                ?>
                <div class="day-image-placeholder" style="display: flex; justify-content: center; flex-direction: column; align-items: center; height: 100vh;">
                    <img src="<?= $rutaImagen[0] ?>" alt="" style="margin: auto; height: 100%; width: auto;">
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
    <img src="<?= $ruta ?>" class="img-responsive" alt="<?php echo __('Itineraty route', 'gogalapagos') ?> <?= the_title(); ?>">
</div>
<?php } // fin si tiene imagne de la ruta ?>
<div class="sections section">
<p>Slider de los otros itinerarios</p>
</div>
<?php get_footer(); ?>
