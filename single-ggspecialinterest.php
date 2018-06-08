<?php get_header(); the_post(); $prefix = 'gg_' ?>
<div class="sections section single-hero single-island">
    <div class="hero-mask"></div>
    <div class="container-fluid single-hero-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-4 col-lg-11 col-lg-offset-1">
                <?php the_title('<h1 class="animal-title">', '</h1>'); ?>
                <span class="separator"></span>
                <p class="single-excerpt"><?= get_the_excerpt() ?></p>
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                <p><a href="<?= home_url('request-a-quote') . '/?for=' . $post->post_title  ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
                <a href="#">Conservation of the Galapagos Islands</a>
            </div>
        </div>
    </div>
    
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
    <?php if($hero_controls){ ?>
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
    <?php } ?>
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
<div class="sections section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2><?php echo _e('More about ') . the_title(); ?></h2>
                <div id="the_content" class="the-content">
                    <?php echo the_content(); ?>
                    <?php /*
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
                    */ ?>
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
                $('.single-hero').css({
                    'background-image': 'url(' + ruta_imagen_primer_slide + ')',
                    'background-position' : 'center'
                });
                $('.single-carousel').remove();
                $('.rear-slider-controllers').remove();
            }
        }
    });
</script>