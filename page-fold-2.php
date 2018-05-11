<?php get_header(); $prefix = 'gg_'; ?>
<?php if ( !wp_is_mobile() ) {  ?>
<section id="top-page" data-anchor="top" class="sections section hero-video">
    <div class="video-placeholer">
        <video id="hero-video" data-keepplaying class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster-2.jpg" muted>
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
        <a href="#" class="btn btn-warning hero-mobile-request-btn"><?php _e('Request a quote','gogalapagos'); ?></a>
    </div>
</section>
<?php } //END if is mobile ?>
<?php get_footer(); ?>
<script>
    $(document).ready( function(){

        console.clear();

        var ancho_viewport = $(window).width();
        var inlove_slides = $('.home-get-in-love-slide');
        var products_slides = $('#index-carousel-products').children('.carousel-inner').children('.item');
        var blog_posts = $('.home-blog-article');
        var video_frame = $('#hero-video');
        document.getElementById('hero-video').addEventListener('ended',alFinalizarVideo,false);

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
            ---------------*/
            $.each(inlove_slides, function(){

                var imagen_url = $(this).children('div').children('.get-in-love-bkg-img');

                acomodarFondo(imagen_url, $(this));

            });

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