<?php get_header(); $prefix = 'gg_'; ?>
<?php if ( !wp_is_mobile() ) {  ?>
<section id="top-page" data-anchor="top" class="sections section hero-video">
    <div class="video-placeholer">
        <video id="hero-video" data-keepplaying class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster-2.jpg" muted preload="none">
            <source src="<?php echo get_template_directory_uri(); ?>/videos/2016-Video-Go-Galapagos.mp4" type='video/mp4' />
            <source src="<?php echo get_template_directory_uri(); ?>/videos/2016-Video-Go-Galapagos.webm" type='video/webm' />
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.ogv" type="video/ogv" />
        </video>
    </div>
    <div class="hero-content">
        <h1 class="home-hero-title animated fadeInDown wait3"><?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_h1', true) ?></h1>
        <p class="home-hero-slogan"><?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_subtitle', true) ?></p>
        <div class="text-center scroll-down-placeholder">
            <div class="scroll-down-indicator">
                <div class="scroll-indicator"></div>
            </div>
            <small>Scroll Down</small>
        </div>
        <div class="quote-filter">
            <!--
<button type="button" class="btn btn-primary getyourtrip-btn" data-toggle="modal" data-target="#tripFilter"><?php _e('Get your trip','gogalapagos'); ?></button>
-->
            <span id="play-video" class="fa fa-play fold-video-control is-link text-white"></span>
            <br />
            <span id="mute-video" class="fa fa-volume-off fold-video-control is-link text-white"></span>
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
        <a href="<?= home_url('request-a-quote') ?>/" class="btn btn-warning hero-mobile-request-btn"><?php _e('Request a quote','gogalapagos'); ?></a>
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
    <div class="fullpage-slide text-center home-get-in-love-slide" <?= (wp_is_mobile()) ? 'style="background-image: url(' . get_post_meta( get_the_ID(), $prefix . 'homepage_fold_slide_background_image'.$i, true) . ');"' : '' ?>>
        <?php if (!wp_is_mobile() and get_post_meta( get_the_ID(), $prefix . 'homepage_fold_slide_background_image'.$i, true)){ ?>
        <img class="get-in-love-bkg-img img-responsive" src="<?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_slide_background_image'.$i, true) ?>" alt="<?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_h1'.$i, true) ?>">
        <?php } ?>
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title"><?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_h1'.$i, true) ?></h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph"><?= get_post_meta( get_the_ID(), $prefix . 'homepage_fold_subtitle'.$i, true) ?></p>
        </div>
    </div>
    <?php } ?>
</section>
<?php 
    $special_items = get_post_meta($post->ID, $prefix . 'front_page_special_offers', false);

    array_shift($special_items); 
    $specialArgs = array(
        'post_type' => 'ggspecialoffer',
        'posts_per_page' => -1,
        'post__in' => $special_items
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
                        <div class="item <?= $specialCounter == 0 ? 'active' : '' ?> <?= (wp_is_mobile()) ? '' : 'not-mobile' ?>" <?= 'style="background-image: url('.get_the_post_thumbnail_url( $offer->ID, 'large' ).');"'?>>
                            <?php if ( wp_is_mobile() ) {  ?>
                            <img class="img-responsive mobile-image" src="<?= get_the_post_thumbnail_url( $offer->ID, 'full' ) ?>" alt="The pack Title">
                            <?php } ?>
                            <div class="gg-post-type">
                                <span class="product-type"></span>
                                <span class="alter-title serif-font font-shading"><?= $offer->post_title ?></span>
                                <div class="more-content">
                                    <a href="<?= get_permalink($offer->ID) ?>" title="<?= $offer->post_title ?>"><h2><?= $offer->post_title ?></h2></a>
                                    <span class="offers-and-news-hover-separator"></span>
                                    <?php if ( !wp_is_mobile() ) {  ?>
                                    <p><?= esc_html( get_the_excerpt($offer->ID) ) ?></p>
                                    <?php } ?>
                                    <a class="plan-your-trip-single-btn" href="<?= home_url( 'request-a-quote' ) .'?offerid='.$offer->ID ?>"><?php _e('Get the deal','gogalapagos'); ?></a> <?php _e('or','gogalapagos'); ?> <a class="home-offers-btn" href="<?= get_post_type_archive_link( 'ggspecialoffer' ) ?>"><?php _e('See more offers','gogalapagos'); ?></a>
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
                    <div class="col-sm-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[0]->ID, 'medium_large' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[0]->post_title ?></span>
                        <div class="more-content upper-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[0]->ID)?>" title="<?= $blogPosts[0]->post_title ?>"><h2><?= $blogPosts[0]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[0]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[0]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[1]->ID, 'medium_large' ) ?>" alt="<?= $blogPosts[1]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[1]->post_title ?></span>
                        <div class="more-content upper-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[1]->ID)?>" title="<?= $blogPosts[1]->post_title ?>"><h2><?= $blogPosts[1]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[1]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[1]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[2]->ID, 'medium_large' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[2]->post_title ?></span>
                        <div class="more-content lower-post">
                            <span class="say-blog">BLOG</span>
                            <a href="<?= get_permalink( $blogPosts[2]->ID)?>" title="<?= $blogPosts[2]->post_title ?>"><h2><?= $blogPosts[2]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[2]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_permalink( $blogPosts[2]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6 nopadding home-blog-article">
                        <img class="blog-home-thumbnail img-responsive1" src="<?= get_the_post_thumbnail_url( $blogPosts[3]->ID, 'medium_large' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
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
            );
            $barcos = get_posts($args);
            ?>
            <?php foreach($barcos as $barco){ ?>
            <div class="col-md-6 nopadding ship-placeholder <?= (wp_is_mobile()) ? '' : 'not-mobile' ?>" <?= (wp_is_mobile()) ? '' : 'style="background-image: url('.get_post_meta($barco->ID, $prefix . 'ship_home_image', true).');"' ?>>
                <?php if ( wp_is_mobile() ){ ?>
                <img class="mobile-image" src="<?= get_post_meta($barco->ID, $prefix . 'ship_home_image', true) ?>" alt="<?= $barco->post_title ?>">
                <?php } ?>
                <div class="more-content lower-post">
                    <a href="<?= home_url($barco->post_name); ?>/" title="<?= $barco->post_title ?>"><h2><?= $barco->post_title ?></h2></a>
                    <span class="ship-slogan"><?= esc_html(get_post_meta($barco->ID, $prefix . 'ship_slogan', true)) ?></span>
                    <?php if( !wp_is_mobile() ) { ?>
                    <span class="offers-and-news-hover-separator"></span>
                    <p><?= esc_html__( get_the_excerpt($barco->ID) ) ?></p>
                    <a class="home-ship-btn" href="<?= home_url($barco->post_name); ?>/">Learn More</a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script>
    $(document).ready( function(){

        console.clear();

        var ancho_viewport = $(window).width();
        var inlove_slides = $('.home-get-in-love-slide');
        var products_slides = $('#index-carousel-products').children('.carousel-inner').children('.item');
        var blog_posts = $('.home-blog-article');
        var video_frame = $('#hero-video');
        var video_tag = document.getElementById('hero-video');
        if(video_tag){
            video_tag.addEventListener('ended',alFinalizarVideo,false);
        }

        /*---------------
        / FUNCION PARA SILENCIAR VIDEO
        ---------------*/
        $('#mute-video').click( function(){
            if (video_frame.prop('muted') == false){ 
                video_frame.prop('muted', true);
                $(this).addClass('fa-volume-off');
                $(this).removeClass('fa-volume-up');
            }else{
                video_frame.prop('muted', false);
                $(this).removeClass('fa-volume-off');
                $(this).addClass('fa-volume-up');
            }
        });

        /*---------------
        / FUNCION PARA DETENER VIDEO
        ---------------*/
        $('#play-video').click( function(){
            if ($("#hero-video").get(0).paused) {
                $('.home-hero-title').hide();
                $('.home-hero-slogan').hide();
                $('.scroll-down-placeholder').hide();
                $("#hero-video").get(0).play();
                $(this).removeClass('fa-play');
                $(this).addClass('fa-stop');
            } else {
                $('.home-hero-title').show();
                $('.home-hero-slogan').show();
                $('.scroll-down-placeholder').show();
                $("#hero-video").get(0).pause();
                $(this).addClass('fa-play');
                $(this).removeClass('fa-stop');
            }
        });
        
        /*---------------
        / FUNCION SI FINALIZA VIDEO
        ---------------*/
        function alFinalizarVideo(e){
            $('.home-hero-title').show();
            $('.home-hero-slogan').show();
            $('.scroll-down-placeholder').show();
            $("#hero-video").load();
            $("#hero-video").pause();
            $('#play-video').addClass('fa-play');
            $('#play-video').removeClass('fa-stop');
        }

        /*-----------------
        / SI LA PANTALLA ES MOVIL PORTRAIT
        -----------------*/
        if(window.innerHeight > window.innerWidth){

            /*---------------
            / CAMBIAR IMAGENES A FONDOS PARA SECCION DE GET-IN-LOVE
            $.each(inlove_slides, function(){

                var imagen_url = $(this).children('div').children('.get-in-love-bkg-img');

                acomodarFondo(imagen_url, $(this));

            });
            ---------------*/

            /*---------------
            / CAMBIAR IMAGENES A FONDOS PARA SECCION DE GET-IN-LOVE
            ---------------*/
            $.each(products_slides, function(){

                var imagen_url = $(this).children('.mobile-image');

                acomodarFondo(imagen_url, $(this));

            });

            /*---------------
            / CAMBIAR IMAGENES A FONDOS PARA SECCION DE GET-IN-LOVE
            ---------------*/
            $.each(blog_posts, function(){

                var imagen_url = $(this).children('.blog-home-thumbnail');

                acomodarFondo(imagen_url, $(this));

            });
        }
    })
    /*---------------
    / FUNCION PARA CAMBIAR IMAGENES A FONDOS
    ---------------*/
    function acomodarFondo(elemento, item){

        item.addClass('now-mobile');
        item.css(
            {
                'background-image'      :   'url('+elemento.attr('src')+')',
                'background-position'   :   'center bottom',
                'background-size'       :   'cover'
            }
        );

        elemento.remove();

    }
</script>