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
            <div class="col-xs-12 col-lg-10 col-lg-offset-1 inner-page-content" style="margin-top: 30px;">
                <h2 class="cruises-page-title body-font"><?= _e('Experience the best of The Pacific Coast','gogalapagos'); ?></h2>
                <div class="cruise-page-content">    
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$args = array(
    'post_type' => 'ggships',
    'posts_per_page' => 2,
    'orderby' => 'post_title',
    'order' => 'DESC'
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
                <div class="ggcruises-thumbnail-placeholder" style="position: relative; height: 50vh; color: white; overflow: hidden;">
                    <img src="<?= $thumbnail ?>" class="img-responsive" alt="<?= $barco->post_title ?>" style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto;">
                    <div class="hero-mask"></div>
                    <h2><?= $barco->post_title ?></h2>
                    <span class="slogan"><?= $slogan ?></span>
                    <span class="separator"></span>
                </div>
                <p class="cruise-excerpt"><?= get_the_excerpt($barco->ID) ?></p>
                <a class="cruise-link" href="<?= $link ?>"><?= _e('View More','gogalapagos')?></a>
            </div>
            <?php } ?>
        </div>
    </div>    
</section>
<section class="section sections activities">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"> </li>
            <li data-target="#carousel-example-generic" data-slide-to="1"> </li>
            <li data-target="#carousel-example-generic" data-slide-to="2"> </li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img class="img-responsive slide-background" src="http://placehold.it/2000x1333" alt="First slide"/>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                            <h2><?= _e('Have fun on the Galapagos Islands','gogalapagos'); ?></h2>
                            <p><?= _e('These two yachts are the intimate experience guest are looking for, with their respective capacity of 19 and 12, their cabins offer a sense of an intimate and private yacht experience. In small spaces, the service is more personalized and meeting fellow travelers are easy to share the experience of the trip. All social areas are designed with style and comfort, as well as the cabins that include excellent amenities. The external open deck areas have perfect spaces designed to socialize, relax and enjoy the best of the Pacific sun.'.'gogalapagos'); ?></p>
                            <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive slide-background" src="http://placehold.it/2000x1333" alt="First slide"/>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                            <h2><?= _e('Have fun on the Galapagos Islands','gogalapagos'); ?></h2>
                            <p><?= _e('These two yachts are the intimate experience guest are looking for, with their respective capacity of 19 and 12, their cabins offer a sense of an intimate and private yacht experience. In small spaces, the service is more personalized and meeting fellow travelers are easy to share the experience of the trip. All social areas are designed with style and comfort, as well as the cabins that include excellent amenities. The external open deck areas have perfect spaces designed to socialize, relax and enjoy the best of the Pacific sun.'.'gogalapagos'); ?></p>
                            <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive slide-background" src="http://placehold.it/2000x1333" alt="First slide"/>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                            <h2><?= _e('Have fun on the Galapagos Islands','gogalapagos'); ?></h2>
                            <p><?= _e('These two yachts are the intimate experience guest are looking for, with their respective capacity of 19 and 12, their cabins offer a sense of an intimate and private yacht experience. In small spaces, the service is more personalized and meeting fellow travelers are easy to share the experience of the trip. All social areas are designed with style and comfort, as well as the cabins that include excellent amenities. The external open deck areas have perfect spaces designed to socialize, relax and enjoy the best of the Pacific sun.'.'gogalapagos'); ?></p>
                            <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</section>
<section class="section sections crew">
    <div id="carousel-example-generic-2" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic-2" data-slide-to="0" class="active"> </li>
            <li data-target="#carousel-example-generic-2" data-slide-to="1"> </li>
            <li data-target="#carousel-example-generic-2" data-slide-to="2"> </li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img class="img-responsive slide-background" src="http://placehold.it/2000x1333" alt="First slide"/>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h2 class="text-center"><?= _e('Crew & Guides','gogalapagos'); ?></h2>
                            <span class="separator"></span>
                            <h3 class="body-font"><?= _e('ON BOARD STAFF', 'gogalapagos')?></h3>
                            <p><?= _e('Every crew member is trained to provide a first-class service with exceptional professionalism. Genuinely friendly individuals, fully dedicated to providing the best hospitality services, with attention to detail and personalized assistance, our crew’s passion and commitment creates a one of a kind experience for our guests.'); ?></p>
                            <h3 class="body-font"><?= _e('NATURALIST GUIDES', 'gogalapagos')?></h3>
                            <p><?= _e('We fully understand how important your Galapagos experience is to you and as such, our team of naturalist guides has been carefully selected and trained to make it complete. Having been certified by the Galapagos National Park Service, our expert guides are ready to conduct informative walks covering every aspect of biology, geology, oceanography and human history relevant to the islands. Our group size ranges from an average of 12 to a maximum of 16 clients per guide. English or Spanish speaking groups are standard with many other languages available on previous request. Go Galapagos – Kleintours runs a series of specialist conferences, delivered by renown experts, aimed at the naturalist guides to further expand their knowledge in different fields such as geology, biology, photography, ornithology, and other related studies.'); ?></p>
                            <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive slide-background" src="http://placehold.it/2000x1333" alt="First slide"/>
            </div>
            <div class="item">
                <img class="img-responsive slide-background" src="http://placehold.it/2000x1333" alt="First slide"/>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic-2" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-example-generic-2" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</section>
<?php 
get_footer(); 
?>