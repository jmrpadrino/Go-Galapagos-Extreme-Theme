<?php 
    $prefix = 'gg_';
?>
<?php if(is_front_page()){ get_template_part('templates/footer-customer'); }?>
<section id="footer" <?= is_front_page() ? 'data-anchor="footer-page"': ''?> class="sections section footer-section footer-background">
    <?php if( wp_is_mobile() ){ ?>
    <div class="container-fluid nopadding top-bar" style="background-color: #3D3D3D; padding: 16px 0px;">
        <div class="row">
            <ul>
                <?php 
                    $main_menu_args = array(
                        'theme_location'  => 'parters-main-menu',	
                        'menu' => 'parters-main-menu',
                    );
                    wp_nav_menu( $main_menu_args ); 
                ?>
            </ul>
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
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="body-font"><?php _e('Contact Us','gogalapagos')?></h4>
                        <ul>
                            <li>USA: 1888 50 KLEIN / CANADA: 1-866-9785990</li>
                            <li>EUROPA: 34-900-300-123 / UK: 00 44-8455-281-389</li>
                            <li>Ph: (593) 2 - 2267000 / (593) 2 - 2267080</li>
                            <li><strong>Go Galapagos by Kleintours</strong></li>
                            <li>Av. Eloy Alfaro N&deg; 34-111 &amp; Catalina Aldaz.</li>
                            <li>170515 Quito - Ecuador.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-inline social-icons-list">
                            <?php
                                $facebook = get_option( 'gg_rrss_facebook' );
                                $twitter = get_option( 'gg_rrss_twitter' );
                                $youtube = get_option( 'gg_rrss_youtube' );
                                $instagram = get_option( 'gg_rrss_instagram' );
                                $googleplus = get_option( 'gg_rrss_google_plus' );
                            ?>
                            <?= ($facebook) ? '<li><a href="' . $facebook . '" target="_blank"><span class="fa fa-facebook"></span></a></li>' : ''; ?>
                            <?= ($twitter) ? '<li><a href="' . $twitter . '" target="_blank"><span class="fa fa-twitter"></span></a></li>' : ''; ?>
                            <?= ($youtube) ? '<li><a href="' . $youtube . '" target="_blank"><span class="fa fa-youtube-play"></span></a></li>' : ''; ?>
                            <?= ($instagram) ? '<li><a href="' . $instagram . '" target="_blank"><span class="fa fa-instagram"></span></a></li>' : ''; ?>
                            <?= ($googleplus) ? '<li><a href="' . $googleplus . '" target="_blank"><span class="fa fa-google-plus"></span></a></li>' : ''; ?>
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
                            $logoBlanco = get_post_meta($membership->ID, $prefix . 'membership_white_logo', false);
                            if($logoBlanco){
                                echo '<li><img src="'.$logoBlanco[0].'" alt="Go Galapagos is member of '.$membership->post_title.'" class="img-responsive"></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-xs-12 text-center">
                <p><?php _e('Go Galapagos Ltda. All rights reserved.','gogalapagos'); ?> 1980 - <?= date('Y') ?></p>
            </div>
        </div>
    </div>
    <?php }else{ ?>
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
                            $logoBlanco = get_post_meta($membership->ID, $prefix . 'membership_white_logo', false);
//                            var_dump($logoBlanco);
                            if($logoBlanco){
                                echo '<li><img width="150" src="'.$logoBlanco[0].'" alt="Go Galapagos is member of '.$membership->post_title.'" class="img-responsive"></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="body-font"><?php _e('Members Site','gogalapagos'); ?></h4>    
                        <ul>
                            <?php 
                                $main_menu_args = array(
                                    'theme_location'  => 'parters-main-menu',	
                                    'menu' => 'parters-main-menu',
                                );
                                wp_nav_menu( $main_menu_args ); 
                            ?>
                        </ul>
                        <h4 class="body-font"><?php _e('Suscribe to our news','gogalapagos')?></h4>
                        <div class="suscribe-form">
                        <?php dynamic_sidebar( 'suscribe' ) ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="body-font"><?php _e('Site Map','gogalapagos')?></h4>
                        <ul class="two-columns1">
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
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="body-font">Go Galapagos <?php _e('Legal','gogalapagos')?></h4>
                        <ul class="two-columns1">
                            <?php 
                                $main_menu_args = array(
                                    'theme_location'  => 'legal-sitemap',	
                                    'menu' => 'legal-sitemap',
                                    //'container_class' => 'top-side-navigation col-sm-5 text-right',
                                    //'container_id' => 'top-side-navigation',
                                    //'menu_class' => 'list-inline'
                                );
                                wp_nav_menu( $main_menu_args ); 
                            ?>
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
                            <li>Av. Eloy Alfaro N&deg; 34-111 &amp; Catalina Aldaz.</li>
                            <li>170515 Quito - Ecuador.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <p class="copy"><?php _e('Go Galapagos Ltda. All rights reserved.','gogalapagos'); ?> 1980 - <?= date('Y') ?></p>
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
    var styles=[{elementType:"geometry",stylers:[{color:"#1d2c4d"}]},{elementType:"labels.text.fill",stylers:[{color:"#8ec3b9"}]},{elementType:"labels.text.stroke",stylers:[{color:"#1a3646"}]},{featureType:"administrative.country",elementType:"geometry.stroke",stylers:[{color:"#4b6878"}]},{featureType:"administrative.land_parcel",elementType:"labels.text.fill",stylers:[{color:"#64779e"}]},{featureType:"administrative.province",elementType:"geometry.stroke",stylers:[{color:"#4b6878"}]},{featureType:"landscape.man_made",elementType:"geometry.stroke",stylers:[{color:"#334e87"}]},{featureType:"landscape.natural",elementType:"geometry",stylers:[{color:"#023e58"}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#283d6a"}]},{featureType:"poi",elementType:"labels.text.fill",stylers:[{color:"#6f9ba5"}]},{featureType:"poi",elementType:"labels.text.stroke",stylers:[{color:"#1d2c4d"}]},{featureType:"poi.park",elementType:"geometry.fill",stylers:[{color:"#023e58"}]},{featureType:"poi.park",elementType:"labels.text.fill",stylers:[{color:"#3C7680"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"#304a7d"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"#98a5be"}]},{featureType:"road",elementType:"labels.text.stroke",stylers:[{color:"#1d2c4d"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"#2c6675"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#255763"}]},{featureType:"road.highway",elementType:"labels.text.fill",stylers:[{color:"#b0d5ce"}]},{featureType:"road.highway",elementType:"labels.text.stroke",stylers:[{color:"#023e58"}]},{featureType:"transit",elementType:"labels.text.fill",stylers:[{color:"#98a5be"}]},{featureType:"transit",elementType:"labels.text.stroke",stylers:[{color:"#1d2c4d"}]},{featureType:"transit.line",elementType:"geometry.fill",stylers:[{color:"#283d6a"}]},{featureType:"transit.station",elementType:"geometry",stylers:[{color:"#3a4762"}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#0e1626"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{color:"#4e6d70"}]}];
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
        <?php if ( is_front_page() and !wp_is_mobile() /*or is_archive('ggpackage')*/ ) { ?>
        var video = document.getElementById("hero-video");
        // REPRODUCIR EL VIDEO
        video.addEventListener( "canplay", function() {
            video.play();
        });
        <?php } ?>
        var location = window.location.hash;
        // ACTIVAR LENGUAJE
        var theLanguage = $('html').attr('lang');
        theLanguage = theLanguage.split('-');
        if($('.lang-'+theLanguage[0]).length > 0){
            $('li.lang-'+theLanguage[0]).addClass('active');
        };
        <?php if (is_front_page()){ ?>
        var easingFn = function (t, b, c, d) {
        var ts = (t /= d) * t;
        var tc = ts * t;
        return b + c * (tc * ts + -5 * ts * ts + 10 * tc + -10 * ts + 5 * t);
        }
        var options = { useEasing: true, easingFn: easingFn, useGrouping: true, separator: ',', decimal: '.'};
        var customers = $('#customers').text();
        var departures = $('#depart').text();
        var yearsOld = $('#years-old').text();
        var customersCount = new CountUp('customers', 0, customers, 0, 2.5, options);
        var departuresCount = new CountUp('depart', 0, departures, 0, 2.5, options);
        var yearsOldCount = new CountUp('years-old', 0, yearsOld, 0, 2.5, options);
        <?php } ?>
        fullPageArea.fullpage({
            navigation: true,
            autoScrolling: true,
            animateAnchor: true,
            navigationPosition: 'right',
            slideSelector: '.fullpage-slide',
            <?php if (is_page('galapagos-legend') or is_page('coral-yachts')){?>
            anchors: ['top','experience','activities','socialareas','cabins','itineraries','moreinfo', 'footer-page'],
            <?php } ?>
            <?php if (is_page('about-us')){?>
            //anchors: ['top','our-history','galapagos-conservancy','social-investment','our-partners','lets-create-moments'],
            anchors: ['top','galapagos-conservancy','social-investment','our-partners','lets-create-moments'],
            <?php } ?>
            scrollBar: false,
            css3: false,
            keyboardScrolling: true,
            scrollOverflow: true,
            <?php if (is_page('go-galapagos-cruises')){?>
            verticalCentered: false,
            <?php } ?>
            afterRender: function(){
            },
            afterResponsive: function(isResponsive){
                alert("Is responsive: " + isResponsive);
            },
            afterLoad: function(anchorLink, index){
                var location = window.location.hash;
                if ($('#hero-video').length > 0){
                    anchorLink == 'experience' ? $('#hero-video').get(0).play() : $('#hero-video').get(0).pause();
                }
                paintHash(location);
                if(index == 1){
                    $('.getyourtrip-navbar-btn').addClass('hidden');
                    $('.navTrigger').removeClass('hidden');
                    $('.search-icon').removeClass('hidden');
                }
                if(index > 1){
                    $('.getyourtrip-navbar-btn').removeClass('hidden');
                    $('#header-logo').attr('src', goga_url.themeurl + '/images/go-logo.png');
                    $('#header-logo').css('max-width', '60px');
                    
                }
                <?php if (is_front_page()){ ?>
                if(index == 5){
                    $('.progress-left .progress-bar').addClass('now');
                    customersCount.start();
                    departuresCount.start();
                    yearsOldCount.start();
                }
                <?php } ?>
                <?php if(is_page('galapagos-legend') or is_page('coral-yachts')){?>
                var linkToactive = $('a[href="'+anchorLink+'"]');
                $('#phone-navbar-active-link').children('span').text(anchorLink)
                if(index == 6 || index == 7){                    
                    $('.itineraries-firts-tab').trigger('click');
                }
                if(index == 8){
                    $('#ship-alter-navbar').removeClass('active');
                }
                if (index == 3 || index == 4){
                    this.fullpage.moveTo(index, 0);
                }
                if (anchorLink == 'itineraries'){                    
                    $('#ship-itineraries-slider').carousel(0);
                }
                <?php } ?>
                <?php if( is_page('go-galapagos-cruises') ){?>
                if(index == 3){
                    $('#carousel-example-generic-3').carousel('cycle');
                    $('#carousel-example-generic-4').carousel('pause');
                }
                if(index == 4){
                    $('#carousel-example-generic-3').carousel('pause');
                    $('#carousel-example-generic-4').carousel('cycle');
                }
                
                <?php } ?>
            },
            onLeave: function (index, nextIndex, direction){
                //$('.itineraries-day-by-day-list').getNiceScroll().remove();
                //$('.day-placeholder').getNiceScroll().remove();
                <?php if (is_front_page()){ ?>
                $('.progress-left .progress-bar').removeClass('now');
                customersCount.reset();
                departuresCount.reset();
                yearsOldCount.reset();
                <?php } ?>
                //console.log($('.section').data('index'));
                if (index > 0 && direction == "down"){
                    $('.navTrigger').addClass('hidden');
                    $('.search-icon').addClass('hidden');
                    $('#headerelements').addClass('moveUp');
                }else{
                    
                    setTimeout(function(){
                        $('.navTrigger').removeClass('hidden');
                        $('.search-icon').removeClass('hidden');
                    },200);
                    $('#headerelements').removeClass('moveUp');
                }
                if (nextIndex > 1){
                    if($('#ship-alter-navbar').length > 0){
                        $('#ship-alter-navbar').addClass('active');
                    }
                }else{
                    $('#header-logo').attr('src', goga_url.themeurl + '/images/go-galapagos-logo.png');
                    $('#header-logo').css('max-width', 'auto');
                    if($('#ship-alter-navbar').length > 0){
                        $('#ship-alter-navbar').removeClass('active');
                    }
                }
            },
            onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){
            }
        });
        //MENSAJE GRACIAS POR VOTAR
        $('.post-ratings').change(function(){
            console.log('cambio');
        })
    });
    function paintHash(hash){
        $('a').parent('li').removeClass('active');
        $('a[href="'+hash+'"]').parent('li').addClass('active');
    }
</script>
</body>
</html>