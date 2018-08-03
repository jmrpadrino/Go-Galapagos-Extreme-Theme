<?php 
get_header(); 
the_post(); 
$prefix = 'gg_'; 
$disembarking_options = array(
    '0' => 'None',
    '1' => 'Dry',
    '2' => 'Wet',
    '3' => 'Dry or Wet Landing',
    '4' => 'Dry Landing',
    '5' => 'Wet Landing',
    '6' => 'Wet Landing (Difficult)',
    '7' => 'Dry Landing (Slipery Surface)',
    '8' => 'Dry Landing (On Tuff)'
);
$terrain_options = array(
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
$difficulty_options = array(
    '0' => 'Low',
    '1' => 'High',
    '2' => 'Intermediate',
    '3' => 'Easy',
    '4' => 'Moderate',
    '5' => 'Difficult'
);
$physical_options = array(
    '0' => 'Low',
    '1' => 'High',
    '2' => 'Medium',
    '3' => 'Medium / High'
);
?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-10 col-lg-offset-1">
               <?php
                $parent_island = get_post_meta( get_the_ID(), $prefix . 'visitors_site_island', true);
                ?>
                <?php the_title('<h1 class="animal-title">', '</h1>'); ?>
                <span class="serif-font fold-backlink"><a href="<?= get_permalink( $parent_island ) ?>"><?php echo get_the_title( $parent_island ) ?> Island</a></span>
                <span class="separator white left"></span>
                <?php if (has_excerpt(get_the_ID())) {?>
                <p class="single-excerpt"><?= get_the_excerpt() ?></p>
                <?php } ?>
                <div class="visitors-icons-placeholder">
                    <?php $sugerencias = get_post_meta( get_the_ID(), $prefix . 'visitors_site_recomendation', false); ?>
                    <ul class="list-inline">
                        <?php foreach($sugerencias as $sugerencia){ ?>
                        <li><img width="50" src="<?= get_template_directory_uri() ?>/images/icono-<?= $sugerencia ?>.png" alt="<?= $sugerencia ?>" title="<?= $sugerencia ?>"></li>
                        <?php } ?>
                    </ul>
                </div>
                <!--p id="more-to-show" class="more-to-show"><span class="conservation-info-icon">i</span><span class="single-more-info-action"><?php _e('More Information','gogalapagos'); ?></span></p-->
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                <p><a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title  ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-lg-offset-1">
                <a href="#">Conservation of the Galapagos Islands</a>
            </div>
        </div>
    </div>
    <?php
    /* OBTENER LAS IMAGENES DE LA GALERIA */
    $imagenes = get_post_meta( get_the_ID(), $prefix . 'visitors_site_gallery', true);
    ?>
    <div class="single-carousel">
        <div id="single-hero-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
            <div class="carousel-inner" role="listbox">
                <?php
                if ( count($imagenes[0]) > 0 ){ //Si tiene fotos en la galeria del item
                    $i = 0;
                    while( $i < count( $imagenes[0] ) ){
                        //echo $imagenes[0][$i] . '</br>';
                        if( $i == 0){
                            echo '<div class="item active">';
                        }else{
                            echo '<div class="item">';
                        }
                        echo '<img src="'.wp_get_attachment_url( $imagenes[0][$i] ).'" alt="'.get_the_title().'">';
                        echo '</div>';
                        $i++;
                    }
                }else{
                    if (has_post_thumbnail()){
                        echo '<div class="item active">';
                        echo get_the_post_thumbnail(get_the_ID(), 'full', array( 'alt' => get_the_title() ));
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
        <ul class="list-inline">
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
    <!--
<div id="more-information-frame" class="more-information-frame">
<div id="close-more-information-frame" class="close-more-information-frame" title="<?php _e('Close','gogalapagos'); ?>">
<span></span>
<span></span> 
</div>
<h2><?php echo _e('More about ') . the_title(); ?></h2>
<div id="the_content" class="the-content">
<?php echo the_content(); ?>
</div>
<div class="aside">
<ul>
<li class="item-feature"><strong>Valor</strong> El valor 1</li>
<li class="item-feature"><strong>Valor</strong> El valor 2</li>
<li class="item-feature"><strong>Valor</strong> El valor 3</li>
<li class="item-feature"><strong>Valor</strong> El valor 4</li>
</ul>
<img class="img-respinsive" src="http://placehold.it/230x200?text=AnimalEnIsla" alt="<?php the_title(); ?> <?php _e('at the Galapagos Islands'); ?>">
</div>
</div>
-->
</div>
<div class="sections section" <?= (get_post_meta ( get_the_ID(), $prefix . 'background_image_content', true)) ? 'style="background-image: url('.get_post_meta ( get_the_ID(), $prefix . 'background_image_content', true).'); background-repeat: no-repeat; background-position: bottom right; background-size: contain;"' : ''; ?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?php include ( TEMPLATEPATH . '/templates/breadcrumbs.php'); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2><?php echo _e('More about ') . the_title(); ?></h2>
                <div id="the_content" class="the-content">
                    <?php echo the_content(); ?>
                    <ul class="visitor-site-fearured-information-list">
                        <?php
                        // Disembarking feature
                        $disembarking = get_post_meta(get_the_ID(), $prefix . 'visitors_site_disembarking', false);
                        if (!empty($disembarking)){
                            echo '<li class="item-featured"><strong>';
                            _e('Disembarking', 'gogalapagos');
                            echo ':</strong> ';
                            foreach ($disembarking as $disembark){
                                echo '<span class="featured-value">'.$disembarking_options[$disembark].'</span>';
                            }
                            echo '</li>';
                        }
                        // Type of terrain feature
                        $terrains = get_post_meta(get_the_ID(), $prefix . 'visitors_site_terrain', false);
                        if (!empty($terrains)){
                            echo '<li><strong>';
                            _e('Type of Terrain', 'gogalapagos');
                            echo ':</strong> ';
                            foreach ($terrains as $terrain){
                                echo '<span class="item-featured">'.$terrain_options[$terrain].'</span>';
                            }
                            echo '</li>';
                        }
                        // Difficulty feature
                        /*$d_levels = get_post_meta(get_the_ID(), $prefix . 'visitors_site_difficulty', false);
                        if (!empty($d_levels)){
                            echo '<li><strong>';
                            _e('Difficulty Level', 'gogalapagos');
                            echo ':</strong> ';
                            foreach ($d_levels as $d_level){
                                echo '<span class="item-featured">'.$difficulty_options[$d_level].'</span>';
                            }
                            echo '</li>';
                        }*/
                        // Physical feature
                        $p_levels = get_post_meta(get_the_ID(), $prefix . 'visitors_site_physical', false);
                        if (!empty($p_levels)){
                            echo '<li><strong>';
                            _e('Physical Conditions Required', 'gogalapagos');
                            echo ':</strong> ';
                            foreach ($p_levels as $p_level){
                                echo '<span class="item-featured">'.$physical_options[$p_level].'</span>';
                            }
                            echo '</li>';
                        }
                        // Duration feature
                        $duration = get_post_meta(get_the_ID(), $prefix . 'visitors_site_duration', true);
                        if (!empty($duration)){
                            echo '<li><strong>';
                            _e('Activities', 'gogalapagos');
                            echo ':</strong> ';
                            echo '<span class="item-featured">'.$duration.'</span>';
                            echo '</li>';
                        }
                        // Highlights feature
                        $highlights = get_post_meta(get_the_ID(), $prefix . 'visitors_site_highlights', true);
                        if (!empty($highlights)){
                            echo '<li><strong>';
                            _e('Highlights', 'gogalapagos');
                            echo ':</strong> ';
                            echo '<span class="item-featured">'.$highlights.'</span>';
                            echo '</li>';
                        }
                        ?>
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