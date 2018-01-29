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
    '0' => 'Sandy',
    '1' => 'Volcanic',
    '2' => 'Rocky',
    '3' => 'Hard',
    '4' => 'Water',
    '5' => 'Sandy',
    '6' => 'Flat',
    '7' => 'Sandy and Flat',
    '8' => 'Lava',
    '9' => 'Dinghy Ride',
    '10' => 'Steep',
    '11' => 'Semi Rocky',
    '12' => 'Windings',
    '13' => 'Wooded Path',
    '14' => 'Walking Path',
    '15' => 'White Sandy Beach',
    '16' => 'Red Sandy Beach',
    '17' => 'Eroded Tuff',
    '18' => 'Muddy',
    '19' => 'Slippery'
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
            <div class="col-sm-6 col-md-4 col-lg-3 col-lg-offset-1">
                <?php the_title('<h1 class="animal-title">', '</h1>'); ?>
                <span class="separator"></span>
                <?php 
                if ( has_excerpt( get_the_ID() ) ){ 
                    echo '<p>'. get_the_excerpt(). '</p>';
                } 
                ?>
                <!--p id="more-to-show" class="more-to-show"><span class="conservation-info-icon">i</span><span class="single-more-info-action"><?php _e('More Information','gogalapagos'); ?></span></p-->
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                <p><span class="btn btn-warning">Plan your Trip</span> or <a href="#">Request a Quote</a></p>
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
                        echo '<img src="'.wp_get_attachment_url( $imagenes[0][$i] ).'">';
                        echo '</div>';
                        $i++;
                    }
                }else{
                    if (has_post_thumbnail()){
                        echo '<div class="item active">';
                        echo the_post_thumbnail();
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
<div class="sections section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <?php include ( TEMPLATEPATH . '/templates/breadcrumbs.php'); ?>
            </div>
        </div>
    </div>
    <div class="container">
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
                        $d_levels = get_post_meta(get_the_ID(), $prefix . 'visitors_site_difficulty', false);
                        if (!empty($d_levels)){
                            echo '<li><strong>';
                            _e('Difficulty Level', 'gogalapagos');
                            echo ':</strong> ';
                            foreach ($d_levels as $d_level){
                                echo '<span class="item-featured">'.$difficulty_options[$d_level].'</span>';
                            }
                            echo '</li>';
                        }
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
                            _e('Duration', 'gogalapagos');
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