<?php get_header(); the_post(); $prefix = 'gg_' ?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-10 col-lg-offset-1">
                <?php
                $term = get_the_terms( get_the_ID(), 'animalgroup' );
                ?>
                <span class="serif-font fold-backlink"><a href="<?= get_term_link( $term[0]->term_id, 'animalgroup' ) ?>"><?php echo $term[0]->name; ?></a></span>
                <?php the_title('<h1 class="animal-title">', '</h1>'); ?>
                <span class="separator"></span>
                <p class="single-excerpt"><?= get_the_excerpt() ?></p>
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                <p><a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title  ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
                <a href="#">Conservation of the Galapagos Islands</a>
            </div>
        </div>
    </div>
    <?php 
        $g_images = get_post_meta ( get_the_ID(), $prefix . 'animal_gallery', true);
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
    <!--div id="more-information-frame" class="more-information-frame">
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
</div-->
</div>
<div class="sections section" <?= (get_post_meta ( get_the_ID(), $prefix . 'background_image_content', true)) ? 'style="background-image: url('.get_post_meta ( get_the_ID(), $prefix . 'background_image_content', true).'); background-repeat: no-repeat; background-position: bottom right; background-size: contain;"' : ''; ?>>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <?php include ( TEMPLATEPATH . '/templates/breadcrumbs.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2><?php echo _e('More about ') . the_title(); ?></h2>
                <div id="the_content" class="the-content">
                    <?php echo the_content(); ?>
                    <ul class="visitor-site-fearured-information-list">
                        <?php
                        $groups = wp_get_post_terms( get_the_ID() , 'animalgroup' );
                        if ($groups) {
                            echo '<li><strong>';
                            if ( count($groups) > 1 ){
                                _e('Animal Groups', 'gogalapagos');
                            }else{
                                _e('Animal Group', 'gogalapagos');
                            }
                            echo ':</strong> ';
                            foreach ($groups as $group){
                                echo '<span class="item-featured"><a href="'.get_term_link($group->term_id, 'animalgroup').'">'.$group->name.'</a></span>';
                            }
                            echo '</li>';    
                        }
                        // scientific name
                        $s_name = get_post_meta(get_the_ID(), $prefix . 'scientific_name', true);
                        if (!empty($s_name)){
                            echo '<li><strong>';
                            _e('Scientific Name', 'gogalapagos');
                            echo ':</strong> ';
                            echo '<span class="item-featured">'.$s_name.'</span>';
                            echo '</li>';
                        }
                        // Animal size
                        $a_size = get_post_meta(get_the_ID(), $prefix . 'animal_size', true);
                        if (!empty($a_size)){
                            echo '<li><strong>';
                            _e('Animal Average Size', 'gogalapagos');
                            echo ':</strong> ';
                            echo '<span class="item-featured">'.$a_size.'</span>';
                            echo '</li>';
                        }
                        // Animal Weight
                        $a_weight = get_post_meta(get_the_ID(), $prefix . 'animal_weight', true);
                        if (!empty($a_weight)){
                            echo '<li><strong>';
                            _e('Animal Average Weight', 'gogalapagos');
                            echo ':</strong> ';
                            echo '<span class="item-featured">'.$a_weight.'</span>';
                            echo '</li>';
                        }
                        ?>
                        <?php if(!wp_is_mobile()){ ?>
                        <li><strong><?php _e('Places where you may see this animal','gogalapagos'); ?>:</strong></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php if(!wp_is_mobile()){ ?>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
<?php
    $coords = get_post_meta(get_the_ID(), $prefix . 'gmap_coords', true);
    $marker = 0;
?>
                <div id="g-map" class="g-map" style="height: 40vh; margin-bottom: 36px;"></div>
                <script>
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('g-map'), {
                            zoom: 8,
                            styles: styles,
                            center: {lat: -0.450030, lng: -90.268706},
                            mapTypeId: 'roadmap'
                        });
<?php 
foreach($coords as $coord){ 
    $coord = trim($coord);
    $gcords = explode(',',$coord);
?>
                        var marker<?php echo $marker; ?> = new google.maps.Marker({
                            position: {<?php echo 'lat: '.$gcords[0].', lng: '.$gcords[1]; ?>},
                            icon: icon,
                            map: map,
                            title: '<?php echo the_title(); ?>'
                        });
<?php
    $marker++;
}
?>
                        
                    }
                </script>
            </div>
        </div>
        <?php } ?>
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
                $('.single-carousel').remove();
                $('.rear-slider-controllers').remove();
            }
        }
    });
</script>