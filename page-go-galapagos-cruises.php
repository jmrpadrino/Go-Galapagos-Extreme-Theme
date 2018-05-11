<?php 
get_header(); 
the_post();
$prefix = 'gg_';
?>
<section class="sections section thumbnail-page">
    <div class="container-fluid nopadding text-center" style="height: 60vh; background-image: url(<?php echo the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; padding-top: 30vh; position: relative;">
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?= the_title('<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">','</h1>') ?>
                <p class="page-hero-text"><?= _e('The Go Galapagos Difference') ?></p>
                <span class="home-get-in-love-separator"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="height: 40vh;">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 inner-page-content" style="margin-top: 30px;">
                <h2 class="cruises-page-title body-font"><?= _e('Experience the best of The Pacific Coast','gogalapagos'); ?></h2>
                <div class="cruise-page-content">    
                    <?php 
                    $threethousands = get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_after_content', true);
                    echo $threethousands;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$args = array(
    'post_type' => 'ggships',
    'posts_per_page' => 2,
);
$barcos = get_posts($args);
?>
<section class="section sections">
    <div class="container-fluid">
        <div class="row">
            <?php foreach($barcos as $barco){ ?>
            <?php
    $slogan = get_post_meta($barco->ID, $prefix . 'ship_slogan', true);
    $thumbnail = get_the_post_thumbnail_url($barco->ID , 'full' );
    $link = get_post_permalink($barco->ID); 
            ?>
            <div class="col-sm-6 nopadding">
                <div class="ggcruises-thumbnail-placeholder">
                    <img src="<?= $thumbnail ?>" class="img-responsive" alt="<?= $barco->post_title ?>" style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto;">
                    <div class="hero-mask"></div>
                    <h2><?= $barco->post_title ?></h2>
                    <span class="slogan"><?= $slogan ?></span>
                    <span class="separator"></span>
                </div>
                <p class="cruise-excerpt"><?= esc_html(get_the_excerpt($barco->ID)) ?></p>
                <a class="cruise-link" href="<?= $link ?>"><?= _e('View More','gogalapagos')?></a>
            </div>
            <?php } ?>
        </div>
    </div>    
</section>
<section class="section sections">
    <div class="nextSlide">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide">
        <span class="fa fa-chevron-left"></span>
    </div>
    <div class="fullpage-slide">
        <div class="container centered-elements">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2><?= _e('Services aboard our fleet','gogalapagos') ?></h2>
                            <span class="separator"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="body-font text-center"><?= _e('Onboard service and facilities', 'gogalapagos') ?></h3>
                            <?php 
    $onboards = get_post_meta(get_the_ID(), $prefix . 'ship_facilities_onboard', false);
                            ?>
                            <ul class="service-facilities-list">
                                <?php 
                                $onboards = array_shift($onboards);
                                foreach ($onboards as $onboard){ 
                                ?>
                                <li><?= $onboard ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="body-font text-center"><?= _e('Cabin service and facilities', 'gogalapagos') ?></h3>
                            <?php 
    $oncabins = get_post_meta(get_the_ID(), $prefix . 'ship_facilities_cabin', false);
                            ?>
                            <ul class="service-facilities-list">
                                <?php 
                                $oncabins = array_shift($oncabins);
                                foreach ($oncabins as $oncabin){ 
                                ?>
                                <li><?= $oncabin ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            * <?= _e('Services available in the Galapagos Legend only', 'gogalapagos'); ?>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div class="container-fluid centered-elements">
            <div class="row">
                <div class="col-sm-6 nopadding">
                    <?php $ecoImage = get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_eco_image', true); ?>
                    <div class="side-image-placeholder">
                        <img src="<?= $ecoImage ?>" alt="Go Galapagos - Eco Luxury" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="galapagos-cruises-inner-sections-title"><?= get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_eco_title', true) ?></h2>
                                    <span class="separator"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><?= get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_eco_content', true) ?></p>
                                    <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section sections crew">
    <div class="container-fluid centered-elements">
        <div class="row">
            <div class="col-md-6">
               <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="galapagos-cruises-inner-sections-title"><?= get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_crew_title', true) ?></h2>
                                <span class="separator"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><?= get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_crew_content', true) ?></p>
                                <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                            </div>
                        </div>
                   </div>
                </div>    
            </div>
            <div class="col-md-6 hidden-xs noppading">
                <?php $crewImage = get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_crew_image', true); ?>
                <div class="side-image-placeholder">
                    <img src="<?= $crewImage ?>" alt="Go Galapagos - Eco Luxury" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section sections activities">
    <div class="nextSlide">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide">
        <span class="fa fa-chevron-left"></span>
    </div>
    <div class="fullpage-slide">
        <div class="container centered-elements">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h2><?= _e('Have fun on the Galapagos Islands','gogalapagos'); ?></h2>
                    <span class="separator"></span>
                    <p><?= _e('These two yachts are the intimate experience guest are looking for, with their respective capacity of 19 and 12, their cabins offer a sense of an intimate and private yacht experience. In small spaces, the service is more personalized and meeting fellow travelers are easy to share the experience of the trip. All social areas are designed with style and comfort, as well as the cabins that include excellent amenities. The external open deck areas have perfect spaces designed to socialize, relax and enjoy the best of the Pacific sun.'.'gogalapagos'); ?></p>
                    <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div class="container centered-elements">
            <div class="row">
                <div class="col-xs-12">
                    <h2><?= _e('A Typical Cruise Day', 'gogalapagos') ?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <p>A soothing morning wakeup call signals a freshly prepared al fresco breakfast on deck. Armed with snorkel gear, sunblock and camera we then board our pangas and head towards shore for our morning adventure. Every excursion is different, but might include a visit where we squeeze past boobies nesting on the narrow trail, sit and watch endemic waved albatross absorbed in their intricate courtship ritual, or stare into the eyes of a curious sea lion underwater as it peers into our face mask.</p>
                    <p>Returning aboard for a sumptuous, buffet-style, lunch we are able to enjoy time to relax in the pool, jacuzzi or on deck looking for wildlife and watching the scenery change as we cruise to our afternoon destination.</p>
                    <p>With every new visitor site being different from the last, we can once again expect another uniquely Galapagos experience for the afternoon hike. This could quite possibly be followed by another fabulous snorkel with turtles, large schools of yellow-tailed surgeonfish or even penguins! Some might choose to follow the dramatic shoreline in a kayak or effortlessly glide over the sea bed from the comfort of our motorized glass-bottom boat.
                    <p>Return to the vessel to enjoy a delicious BBQ on deck as the sun sets on the horizon or, a sophisticated a la carte dinner. After dinner is a time to enjoy one of our many onboard activities, relax or be outside stargazing.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <img src="http://placehold.it/2000x600?text=Soles" class="img-responsive" style="margin: 36px auto;">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section sections">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
                <div style="margin: 80px 0;">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php get_footer(); ?>