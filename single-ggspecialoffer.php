<?php get_header(); the_post(); $prefix = 'gg_' ?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-lg-offset-1">
                <?php the_title('<h1 class="animal-title">', '</h1>'); ?>
                <span class="separator"></span>
                <p><?= get_the_excerpt( get_the_ID() ) ?></p>
                <p><a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title  ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
            <div class="col-sm-5 col-lg-4">
                <div class="offer-main-content">
                    <?= the_content() ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $g_images = get_post_meta ( get_the_ID(), $prefix . 'offer_gallery', true);
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