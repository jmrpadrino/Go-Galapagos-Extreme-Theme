<?php get_header(); ?>
<?php if ( !wp_is_mobile() ) {  ?>
<section id="top-page" data-anchor="top" class="sections section hero-video">
    <div class="video-placeholer">
        <video id="hero-video" data-keepplaying class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster.jpg" loop autoplay>
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.webm" type='video/webm' />
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.mp4" type='video/mp4' />
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.ogv" type="video/ogv" />
        </video>
    </div>
    <div class="hero-content">
        <h1 class="home-hero-title animated fadeInDown wait3"><?php _e('Enjoy','gogalapagos'); ?></h1>
        <p class="home-hero-slogan"><?php _e('Join us in an <strong>unforgettable adventure</strong>','gogalapagos'); ?></p>
        <div class="text-center scroll-down-placeholder">
            <div class="scroll-down-indicator">
                <div class="scroll-indicator"></div>
            </div>
            <small>Scroll Down</small>
        </div>
        <div class="quote-filter">
            <button type="button" class="btn btn-primary getyourtrip-btn" data-toggle="modal" data-target="#tripFilter"><?php _e('Get your trip','gogalapagos'); ?></button>
        </div>
        
        <!--<form class="form-filter" role="form" action="http://quote.gogalapagos.com" method="get">
<div class="filter-transparent-box animated fadeInUp wait5">
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<div class="col-sm-5">
<label id="img_category_label"class="field"for="img_category"data-value="">
<span><?php _e('Choose your trip','gogalapagos'); ?></span>
<div id="img_category"class="psuedo_select"name="img_category">
<span class="selected"></span>
<ul id="img_category_options"class="options">
<li class="option"data-value="cruise">Cruise</li>
<li class="option"data-value="tour">Tour</li>
<li class="option"data-value="gopackage">Go Package</li>
</ul>
</div>
</label>
</div>
<div class="col-sm-5">
<label id="img_category_label"class="field"for="img_category"data-value="">
<span><?php _e('Choose your departure','gogalapagos'); ?></span>
<div id="img_category"class="psuedo_select"name="img_category">
<span class="selected"></span>
<ul id="img_category_options"class="options">
<li class="option"data-value="jan2018">Jan 2018</li>
<li class="option"data-value="jan2018">Feb 2018</li>
<li class="option"data-value="jan2018">Mar 2018</li>
<li class="option"data-value="jan2018">Apr 2018</li>
<li class="option"data-value="jan2018">May 2018</li>
<li class="option"data-value="jan2018">Jun 2018</li>
</ul>
</div>
</label>
</div>
<div class="col-sm-2">
<input type="submit" class="btn btn-default hero-filter-btn" value="<?php _e('Find','gogalapagos'); ?>">
</div>
</div>
</div>
</div>
</form>-->
        <?php /*
        <!--div class="filter-transparent-box animated fadeInUp wait5">
            <form class="form-filter" role="form" action="http://quote.gogalapagos.com" method="get">
                <ul class="list-inline">
                    <li>
                        <!--label for="trip"><?php _e('Choose your trip','gogalapagos'); ?></label>
<select id="trip" name="trip">
<option value=""></option>
<option value="1">Trip 1</option>
<option value="2">Trip 2</option>
<option value="3">Trip 3</option>
<option value="3">Trip 4</option>
</select-->

                    </li>
                    <li>
                        <!--label for="departures"><?php _e('Departures','gogalapagos'); ?></label>
                        <select id="departures" name="departures">
                            <option value=""></option>
                            <option value="1">Depar 1</option>
                            <option value="2">Depar 2</option>
                            <option value="3">Depar 3</option>
                            <option value="3">Depar 4</option>
                            <option value="3">Depar 5</option>
                            <option value="3">Depar 6</option>
                        </select-->

                    </li>
                    <li>
                        <input type="submit" class="btn btn-default hero-filter-btn" value="<?php _e('Find','gogalapagos'); ?>">
                    </li>
                </ul>
            </form>
        </div-->
        */?>
    </div>

</section>
<?php }else{ ?>
<section class="sections section text-center fold-mobile">
    <div class="hero-mobile-mask"></div>
    <div class="hero-mobile-content">
        <h1 class="home-hero-title animated fadeInDown wait3"><?php _e('Enjoy','gogalapagos'); ?></h1>
        <p class="home-hero-slogan"><?php _e('the Enchanted Islands','gogalapagos'); ?></p>
        <a href="#" class="btn btn-warning hero-mobile-request-btn"><?php _e('Request a quote','gogalapagos'); ?></a>
    </div>
</section>
<?php } //END if is mobile ?>
<section id="get-in-love" data-anchor="galapagos-experience" class="sections section get-in-love">
    <div class="nextSlide">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide">
        <span class="fa fa-chevron-left"></span>
    </div>
    <?php
    $numeroSlides = get_option( 'gg_home_carousel_slides' );
    for($i=1; $i <= $numeroSlides; $i++){
    ?>
    <div class="fullpage-slide text-center home-get-in-love-slide">
        <img class="get-in-love-bkg-img img-responsive" src="<?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_slide_background_image'.$i, true) ?>" alt="<?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_h1'.$i, true) ?>">
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title"><?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_h1'.$i, true) ?></h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph"><?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_subtitle'.$i, true) ?></p>
        </div>
    </div>
    <?php } ?>
    <!--div class="get-in-love-controls">
<ul>
<li class="active">
<span class="get-in-love-control-circle" data-goto-slide="0"></span>
</li>
<li>
<span class="get-in-love-control-circle" data-goto-slide="1"></span>
</li>
<li>
<span class="get-in-love-control-circle" data-goto-slide="2"></span>
</li>
<li>
<span class="get-in-love-control-circle" data-goto-slide="3"></span>
</li>
<li>
<span class="get-in-love-control-circle" data-goto-slide="4"></span>
</li>
</ul>
</div-->
</section>
<?php 
    $specialArgs = array(
        'post_type' => 'ggspecialoffer',
        'posts_per_page' => -1,
    );
    $special = get_posts($specialArgs);
?>
<section id="offers-and-news" data-anchor="offers-news" class="sections section offers-and-news">
    <div class="section-ribbon">
        <span><?php _e('Offers &amp; News','gogalapagos'); ?></span>
    </div>
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-md-6 carousel">
                <div id="index-carousel-products" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            $specialCounter = 0;
                            foreach($special as $offer){ 
                        ?>
                        <?php if ($specialCounter == 0){ ?>
                        <div class="item active">
                        <?php }else{ ?>
                        <div class="item">
                        <?php } ?>
                            <?php if ( !wp_is_mobile() ) {  ?>
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php }else{ ?>
                            <img class="mobile-image" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php } ?>
                            <div class="gg-post-type">
                                <span class="product-type"></span>
                                <span class="alter-title serif-font font-shading"><?= $offer->post_title ?></span>
                                <div class="more-content">
                                    <a href="<?= get_permalink($offer->ID) ?>" title="New expedition cruises to Genovesa Island"><h2><?= $offer->post_title ?></h2></a>
                                    <span class="offers-and-news-hover-separator"></span>
                                    <?php if ( !wp_is_mobile() ) {  ?>
                                    <p><?= esc_html( get_the_excerpt($offer->ID) ) ?></p>
                                    <?php } ?>
                                    <a class="home-offers-btn" href="<?= get_permalink($offer->ID) ?>">Get the deal</a>
                                </div>
                            </div>
                        </div>
                        <?php $specialCounter++; } ?>
                    </div>
                    <?php if (count($special) > 1){ ?>
                    <a class="product-carousel-control left" href="#index-carousel-products" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                    <a class="product-carousel-control right" href="#index-carousel-products" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                    <?php } ?>
                </div>
            </div>
            <?php 
            // Recuperar los ultimos 4 posts del blog
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
            );
            $blogPosts = get_posts($args);
            //var_dump($blogPosts);
            ?>
            <div class="col-md-6 nopadding home-blog-section">
                <div class="row">
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[0]->ID, 'full' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[0]->post_title ?></span>
                        <div class="more-content upper-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[0]->ID)?>" title="<?= $blogPosts[0]->post_title ?>"><h2><?= $blogPosts[0]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[0]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[0]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[1]->ID, 'full' ) ?>" alt="<?= $blogPosts[1]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[1]->post_title ?></span>
                        <div class="more-content upper-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[1]->ID)?>" title="<?= $blogPosts[1]->post_title ?>"><h2><?= $blogPosts[1]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[1]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[1]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[2]->ID, 'full' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[2]->post_title ?></span>
                        <div class="more-content lower-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[2]->ID)?>" title="<?= $blogPosts[2]->post_title ?>"><h2><?= $blogPosts[2]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[2]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[2]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[3]->ID, 'full' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[3]->post_title ?></span>
                        <div class="more-content lower-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[3]->ID)?>" title="<?= $blogPosts[3]->post_title ?>"><h2><?= $blogPosts[3]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[3]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[3]->ID)?>">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
<section data-anchor="galapagos-cruises" class="sections section ships">
    <div class="section-ribbon">
        <span><?php _e('Our Vessels','gogalapagos'); ?></span>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php 
            $args = array(
                'post_type' => 'ggships',
                'posts_per_page' => 2,
                'orderby' => 'post_date',
                'order' => 'ASC'
            );
            $barcos = get_posts($args);
            ?>
            <?php foreach($barcos as $barco){ ?>
            <div class="col-md-6 nopadding ship-placeholder">
                <?php if ( !wp_is_mobile() ){ ?>
                <img class="img-responsive" src="<?= get_post_meta($barco->ID, $prefix . 'ship_home_image', true) ?>" alt="<?= $barco->post_title ?>">
                <?php }else{ ?>
                <img class="mobile-image" src="<?= get_post_meta($barco->ID, $prefix . 'ship_home_image', true) ?>" alt="<?= $barco->post_title ?>">
                <?php } ?>
                <div class="more-content lower-post">
                    <a href="<?= home_url($barco->post_name); ?>" title="Galapagos Legend"><h2><?= $barco->post_title ?></h2></a>
                    <span class="ship-slogan"><?= esc_html(get_post_meta($barco->ID, $prefix . 'ship_slogan', true)) ?></span>
                    <?php if( !wp_is_mobile() ) { ?>
                    <span class="offers-and-news-hover-separator"></span>
                    <p><?= esc_html__( get_the_excerpt($barco->ID) ) ?></p>
                    <a class="home-ship-btn" href="<?= home_url($barco->post_name); ?>">Learn More</a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>