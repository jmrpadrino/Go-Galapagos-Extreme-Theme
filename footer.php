<?php 
    $prefix = 'gg_';
?>
<section id="footer" class="sections section footer-section">
    <?php if( wp_is_mobile() ){ ?>
    <div class="container-fluid nopadding top-bar" style="background-color: #3D3D3D; padding: 16px 0px;">
        <div class="row">
            <div class="col-xs-4 text-center">
                <a class="footer-top-bar-link" href="#"><?php _e('Login','gogalapagos'); ?></a>
            </div>
            <div class="col-xs-4 text-center">
                <a class="footer-top-bar-link" href="#"><?php _e('Register','gogalapagos'); ?></a>
            </div>
            <div class="col-xs-4 text-center">
                <a class="footer-top-bar-link" href="#"><?php _e('Rates','gogalapagos'); ?></a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-7">
                        <h4 class="body-font"><?php _e('Site Map','gogalapagos')?></h4>
                        <ul class="two-columns">
                            <?php 
                                $main_menu_args = array(
                                    'theme_location'  => 'footer-sitemap',	
                                    'menu' => 'footer-sitemap',
                                    //'container_class' => 'top-side-navigation col-sm-5 text-right',
                                    //'container_id' => 'top-side-navigation',
                                    //'menu_class' => 'list-inline'
                                );
                                wp_nav_menu( $main_menu_args ); 
                            ?>
                            <!--
                            <li><a href="#">Galapagos Legend</a></li>
                            <li><a href="#">Coral Yachts</a></li>
                            <li><a href="#">Experience</a></li>
                            <li><a href="#">Go Fun - on-board activities</a></li>
                            <li><a href="#">Ecuador</a></li>
                            <li><a href="#">Karanki Magdalena</a></li>
                            <li><a href="#">Adventure Tours</a></li>
                            <li><a href="#">Tours in Ecuador</a></li>
                            <li><a href="#">Special Deals</a></li>
                            <li><a href="#">Cruise Availability</a></li>
                            <li><a href="#">Plan Your Trip</a></li>
                            <li><a href="#">Edit Booking</a></li>
                            <li><a href="#">Go Packages</a></li>
                            <li><a href="#">Peru</a></li>
                            -->
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="body-font"><?php _e('Contact Us','gogalapagos')?></h4>
                        <ul>
                            <li>USA: 1888 50 KLEIN / CANADA: 1-866-9785990</li>
                            <li>EUROPA: 34-900-300-123 / UK: 00 44-8455-281-389</li>
                            <li>Ph: (593) 2 - 2267000 / (593) 2 - 2267080</li>
                            <li><strong>Go Galapagos by Kleintours</strong></li>
                            <li>Av. Eloy Alfaro N 34-111 &amp; Catalina Aldaz.</li>
                            <li>170515 Quito - Ecuador.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center social-media-icons">
                        <span class="fa fa-2x fa-facebook"></span>
                        <span class="fa fa-2x fa-youtube"></span>
                        <span class="fa fa-2x fa-instagram"></span>
                        <span class="fa fa-2x fa-twitter"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid orgs-logos">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2><?php _e('Proud member of:','gogalapagos'); ?></h2>
                <ul class="list-inline">
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                    <li><img src="http://placehold.it/180x64?text=Logo" alt="" class="img-responsive"></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-xs-12 text-center">
                <p><?php _e('Go Galapagos Ltda. All rights reserved. 1980 - 2017','gogalapagos'); ?></p>
            </div>
        </div>
    </div>
    <?php }else{ ?>
    <div class="customer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="customer-section-title" style="margin-bottom:36px;"><?php _e ('Our customers say','gogalapagos'); ?></h2>
                </div>
            </div>
            <?php
                $args = array(
                    'post_type' => 'ggtestimonial',
                    'posts_poer_page' => 5,
                );
                $comments = get_posts($args);
                //var_dump($comments);
                $commentsCount = 0;
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div id="carousel-customer" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                                foreach($comments as $comment){
                                    $rate = get_post_meta($comment->ID, $prefix . 'testimonial_rate', true);
                                    if ($commentsCount == 0){
                            ?>
                            <div class="item active">
                                <div class="row">
                                    <div class="col-xs-12 text-center" style="margin-bottom: 18px; color: gold;">
                                        <?php draw_stars($rate) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                                        <p class="customer-section-comment"><?= esc_html(get_the_excerpt($comment->ID)); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <h3 class="customer-section-title"><?= esc_html(get_the_title($comment->ID)); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }else{
                            ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-xs-12 text-center" style="margin-bottom: 18px; color: gold;">
                                        <?php draw_stars($rate) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                                        <p class="customer-section-title"><?= esc_html(get_the_excerpt($comment->ID)); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <h3 class="customer-section-title"><?= esc_html(get_the_title($comment->ID)); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php       
                                    }
                                    $commentsCount++;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a class="customer-carousel-control left" href="#carousel-customer" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                    <a class="customer-carousel-control right" href="#carousel-customer" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
    <?php if(is_front_page()){ ?>
    <div class="counters" style="background-image: url(<?= get_template_directory_uri() ?>/images/estadisticas-fondo.jpg); ">
        <div class="counter-mask"></div>
        <div class="container statistics">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="progress yellow">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span id="customers" >98</span>%</div>
                    </div>
                    <br />
                    <span class="counter-name">Satisfied Customers</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 text-center">
                    <span class="fa fa-4x fa-ship"></span>
                    <h4 id="depart" class="statistic-value text-center">7632</h4>
                    <span class="counter-name">Ship's Departures</span>
                </div>
                <div class="col-sm-6 text-center">
                    <span class="fa fa-4x fa-calendar"></span>
                    <h4 id="years-old" class="statistic-value text-center">36</h4>
                    <span class="counter-name">Years of Experience</span>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="container-fluid footer-background">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="body-font"><?php _e('Members Site','gogalapagos'); ?></h4>    
                        <ul>
                            <li><a href="#"><?php _e('Login','gogalapagos'); ?></a></li>
                            <li><a href="#"><?php _e('Register','gogalapagos'); ?></a></li>
                            <li><a href="#"><?php _e('Rates','gogalapagos'); ?></a></li>
                        </ul>
                        <h4 class="body-font"><?php _e('Suscribe to our news','gogalapagos')?></h4>
                        <div class="suscribe-form">
                        <?php 
                            dynamic_sidebar( 'suscribe' );
                        ?>
                            <!--
                            <form role="form" action="<?php echo home_url(); ?>/thanks-for-suscribing/">
                                <input class="suscribe-input" type="email" name="suscriber-mail" placeholder="<?php _e('Enter your Email','gogalapagos')?>" required>
                                <input class="btn btn-warning pull-right suscribe-btn" type="submit" value="<?php _e('Send','gogalapagos')?>">
                            </form>
                            -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="body-font"><?php _e('Site Map','gogalapagos')?></h4>
                        <ul class="three-columns">
                            <?php 
                                $main_menu_args = array(
                                    'theme_location'  => 'footer-sitemap',	
                                    'menu' => 'footer-sitemap',
                                    //'container_class' => 'top-side-navigation col-sm-5 text-right',
                                    //'container_id' => 'top-side-navigation',
                                    //'menu_class' => 'list-inline'
                                );
                                wp_nav_menu( $main_menu_args ); 
                            ?>
                            <!--
                            <li><a href="#">Galapagos Legend</a></li>
                            <li><a href="#">Coral Yachts</a></li>
                            <li><a href="#">Experience</a></li>
                            <li><a href="#">Go Fun - on-board activities</a></li>
                            <li><a href="#">Ecuador</a></li>
                            <li><a href="#">Karanki Magdalena</a></li>
                            <li><a href="#">Adventure Tours</a></li>
                            <li><a href="#">Tours in Ecuador</a></li>
                            <li><a href="#">Special Deals</a></li>
                            <li><a href="#">Cruise Availability</a></li>
                            <li><a href="#">Plan Your Trip</a></li>
                            <li><a href="#">Edit Booking</a></li>
                            <li><a href="#">Go Packages</a></li>
                            <li><a href="#">Peru</a></li>
                            -->
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="body-font"><?php _e('Contact Us','gogalapagos')?></h4>
                        <ul>
                            <li>USA: 1888 50 KLEIN / CANADA: 1-866-9785990</li>
                            <li>EUROPA: 34-900-300-123 / UK: 00 44-8455-281-389</li>
                            <li>Ph: (593) 2 - 2267000 / (593) 2 - 2267080</li>
                        </ul>
                        <h4 class="body-font">Go Galapagos by Kleintours</h4>
                        <ul>
                            <li>Av. Eloy Alfaro N 34-111 &amp; Catalina Aldaz.</li>
                            <li>170515 Quito - Ecuador.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid orgs-logos">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2><?php _e('Proud member of:','gogalapagos'); ?></h2>
                <ul class="list-inline">
                    <?php 
                        $args = array(
                            'post_type' => 'ggmembership',
                            'posts_per_page' => -1
                        );
                        $memberships = get_posts($args);
                
                        foreach($memberships as $membership){
                            echo '<li><img src="'.get_the_post_thumbnail_url( $membership->ID, 'thumbnail' ).'" alt="" class="img-responsive"></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-xs-12 text-center">
                <p><?php _e('Go Galapagos Ltda. All rights reserved. 1980 - 2017','gogalapagos'); ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
</div><!-- END fullpage -->
<script type="application/ld+json">
<?php if ( is_home() ){ ?>
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "<?php echo bloginfo('name'); ?>",
        "alternateName": "<?php echo bloginfo('name'); ?> - <?php echo bloginfo('description'); ?>",
        "url": "<?php echo bloginfo('url'); ?>"
    }
<?php }else{ ?>
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "<?php wp_title('&raquo;', TRUE, 'left'); ?>",
        "alternateName": "<?php echo the_title(); ?> - Go Galapagos",
        "image": "<?php echo get_the_post_thumbnail_url(); ?>",
        "url": "<?php echo get_permalink(); ?>"
    }
<?php } ?>
</script>
<?php
if ( is_page_template() ){
    $pagetemplate = get_page_template_slug($post->ID);
    if ($pagetemplate == 'templates/template-itinerarios.php'){
?>
<script>
    var map,marker,line,pathsLastIndex;
    var styles = [
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#1d2c4d"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#8ec3b9"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#1a3646"
                }
            ]
        },
        {
            "featureType": "administrative.country",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#4b6878"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#64779e"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#4b6878"
                }
            ]
        },
        {
            "featureType": "landscape.man_made",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#334e87"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#023e58"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#283d6a"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#6f9ba5"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#1d2c4d"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#023e58"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#3C7680"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#304a7d"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#98a5be"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#1d2c4d"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#2c6675"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#255763"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#b0d5ce"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#023e58"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#98a5be"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#1d2c4d"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#283d6a"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#3a4762"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#0e1626"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#4e6d70"
                }
            ]
        }
    ];
    var icon = '<?= get_template_directory_uri() ?>/images/marcador-map.png';
    function initMultipleMaps(){
<?php for ( $i=0; $i <= $GLOBALS['cantidaddemapasenitinerarios']; $i++ ){ ?>
        map = new google.maps.Map(document.getElementById('g-map<?= $i ?>'), {
            zoom: 8,
            styles: styles,
            center: {lat: -0.255823, lng: -90.268706},
            mapTypeId: 'roadmap',
            disableDefaultUI: true
        });
        var markerStart = new google.maps.Marker({
            position: {lat: mapasParaItinerario[<?= $i?>].paths[0].lat, lng: mapasParaItinerario[<?= $i?>].paths[0].lng},
            map: map,
            icon: icon,
            title: mapasParaItinerario[<?= $i?>].mrkTitle
        });
        pathsLastIndex = mapasParaItinerario[<?= $i?>].paths.length;
        console.log(pathsLastIndex);
        var markerEnd = new google.maps.Marker({
            position: {lat: mapasParaItinerario[<?= $i?>].paths[pathsLastIndex-1].lat, lng: mapasParaItinerario[<?= $i?>].paths[pathsLastIndex-1].lng},
            map: map,
            icon: icon,
            title: mapasParaItinerario[<?= $i?>].mrkTitle
        });
        line = new google.maps.Polyline({
            path: mapasParaItinerario[<?= $i?>].paths,
            /*icons: [{
                        offset: '100%'
                    }],*/
            geodesic: true,
            strokeColor: mapasParaItinerario[<?= $i?>].pathColor,
            strokeOpacity: 0.5,
            map: map
        });
        <?php } ?>
    }
    //initMultipleMaps(mapasParaItinerario);
</script>
<?php }} ?>
<?php wp_footer(); ?>
<script type="text/javascript">
    $(document).ready( function (){
        <?php if (is_front_page()){ ?>
        var easingFn = function (t, b, c, d) {
        var ts = (t /= d) * t;
        var tc = ts * t;
        return b + c * (tc * ts + -5 * ts * ts + 10 * tc + -10 * ts + 5 * t);
        }
        var options = {
          useEasing: true, 
          easingFn: easingFn, 
          useGrouping: true, 
          separator: ',', 
          decimal: '.', 
        };
        var customers = $('#customers').text();
        var departures = $('#depart').text();
        var yearsOld = $('#years-old').text();
        var customersCount = new CountUp('customers', 0, customers, 0, 2.5, options);
        var departuresCount = new CountUp('depart', 0, departures, 0, 2.5, options);
        var yearsOldCount = new CountUp('years-old', 0, yearsOld, 0, 2.5, options);
        <?php } ?>
        <?php if ( is_front_page() and !wp_is_mobile() /*or is_archive('ggpackage')*/ ) { ?>
        var video = document.getElementById("hero-video");
        // REPRODUCIR EL VIDEO
        video.addEventListener( "canplay", function() {
            video.play();
        });
        
        <?php } ?>
        fullPageArea.fullpage({
            navigation: false,
            slideSelector: '.fullpage-slide',
            <?php if (is_singular('ggships')){?>
            anchors: ['top','experience','socialareas','cabins','moreinfo'],
            <?php } ?>
            <?php if (is_page('about-us')){?>
            anchors: ['top','our-history','galapagos-conservancy','social-investment','our-partners','lets-create-moments'],
            <?php } ?>
            <?php if (is_archive('ggtour')){?>
            anchors: ['top','our-history','galapagos-conservancy','social-investment','our-partners','lets-create-moments'],
            <?php } ?>
            scrollBar: false,
            css3: true,
            keyboardScrolling: true,
            scrollOverflow: true,
            afterLoad: function(anchorLink, index){
                var location = window.location.hash;
                paintHash(location);
                console.log(index);
                <?php if (is_front_page()){ ?>
                if (index == 5){
                    $('.progress-left .progress-bar').addClass('now');
                    customersCount.start();
                    departuresCount.start();
                    yearsOldCount.start();
                }
                <?php } ?>
                <?php if (is_singular('ggships')){?>
                if (index == 6){
                    $('#ship-alter-navbar').removeClass('active');
                }
                <?php } ?>
                
            },
            onLeave: function (index, nextIndex, direction){
                <?php if (is_front_page()){ ?>
                $('.progress-left .progress-bar').removeClass('now');
                customersCount.reset();
                departuresCount.reset();
                yearsOldCount.reset();
                <?php } ?>
                //console.log(index, nextIndex);
                //console.log($('.section').data('index'));
                if (index > 0 && direction == "down"){
                    $('#headerelements').addClass('moveUp');
                }else{
                    $('#headerelements').removeClass('moveUp');
                }
                if (nextIndex > 1){
                    if($('#ship-alter-navbar').length > 0){
                        $('#ship-alter-navbar').addClass('active');
                    }
                }else{
                    if($('#ship-alter-navbar').length > 0){
                        $('#ship-alter-navbar').removeClass('active');
                    }
                }
            }
        });
        <?php /*if ( is_singular( 'gganimal' ) ){ ?>
        $('#the_content').niceScroll({
            autohidemode: false,
            cursorwidth: 8,
            cursorborder:'none',
            background:"rgba(255, 255, 255, 0.3)",
            cursorcolor:"rgba(255, 255, 255, 0.6)"
        });
<?php }*/ ?>
    });
    function paintHash(hash){
        $('a').parent('li').removeClass('active');
        $('a[href="'+hash+'"]').parent('li').addClass('active');
    }
</script>
</body>
</html>