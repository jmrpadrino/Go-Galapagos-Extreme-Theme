<?php get_header(); the_post(); $prefix = 'gg_';?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-1">
                <div class="row">
                    <div class="col-sm-12">
                        <?php the_title('<h1 class="island-title">', '</h1>'); ?>
                        <span class="single-separator"></span>
                        <p class="single-excerpt"><?= get_the_excerpt() ?></p>
                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div>
                </div>
                <div class="single-hero-convertion-area">
                    <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                    <p><a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title  ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <h3>From: $ <?= get_post_meta( get_the_ID(), $prefix . 'tour_price', true) ?> <small>per person</small></h3>
                <img src="<?= wp_get_attachment_url( get_post_meta( get_the_ID(), $prefix . 'package_map', true) ) ?>" class="img-responsive">
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
                    if (has_post_thumbnail()){
                        echo '<div class="item active">';
                        echo the_post_thumbnail('full', array('class' => 'post-thumbnail'));
                        echo '</div>';

                    }
                ?>
            </div>
        </div>
    </div>
    <!--div class="rear-slider-controllers">
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
    </div-->
</div>
<div class="sections section single-more-content" <?= (get_post_meta ( get_the_ID(), $prefix . 'background_image_content', true)) ? 'style="background-image: url('.get_post_meta ( get_the_ID(), $prefix . 'background_image_content', true).'); background-repeat: no-repeat; background-position: bottom right; background-size: contain;"' : ''; ?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <?php include ( TEMPLATEPATH . '/templates/breadcrumbs.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-md-7 col-md-offset-1">
                <h2 class="single-more-about-content"><?php _e('More about ', 'gogalapagos') . the_title(); ?></h2>
                <span class="separator"></span>
                <div id="main_content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-sm-5 col-md-3">
                <h3 class="single-sidebar-title"><?php _e('Enjoy the journey', 'gogalapagos'); ?></h3>
                <span class="separator"></span>
                <a href="<?= home_url('request-a-quote') . '?for=' . $post->post_title  ?>" class="itinerary-plan-your-trip-btn"><?= _e('Request a Quote','gogalapagos'); ?></a>                
            </div>
        </div>
    </div>
</div>
<?php 
$args = array(
    'post_type' => 'ggtour',
    'posts_per_page' => -1,
    'post__not_in' => array(get_the_id())
);
$islands = query_posts($args);
?>
<div class="sections section more-items-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center single-more-island-section-title"><?php _e('Other Packages','gogalapagos'); ?></h2>
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
                                <span class="separator white left"></span>
                                <?php 
                                $phrase = get_post_meta($island->ID, $prefix . 'island_phrase', true); 
                                if ( !empty($phrase) ){
                                    echo '<p>'.esc_html($phrase).'</p>';
                                }
                                ?>
                                <a class="view-more-about-this-island-link" href="<?php echo get_post_permalink($island->ID); ?>"><?php _e('View more about this tour', 'gogalapagos'); ?></a>       
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
                        <li><span class="text-between-controllers"><?php _e('Move through the tours','gogalapagos'); ?></span></li>
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