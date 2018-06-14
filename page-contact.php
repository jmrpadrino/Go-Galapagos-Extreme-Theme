<?php 
get_header(); 
the_post();
$prefix = 'gg_';
$options = array(
    '0' => _x('Direct Sales','gogalapagos'),
    '1' => _x('Incoming Sales','gogalapagos'),
    '2' => _x('Business Development','gogalapagos'),
);
?>
<style>
    /*---------- CONTACT US ------------*/.contact-page-folder{background-position: center top; background-size: cover; color: white; position: relative;}.mask{position: absolute; top: 0; width: 100%; display: -webkit-box; display: -ms-flexbox; display: flex; background: rgba(29, 29, 29, .6); height: 100%;}.contact-page-title{margin-top: 120px;}.contact-form [type="text"],.contact-form [type="phone"],.contact-form [type="email"]{border-radius: 0px; border: none; border-bottom: 1px solid white; background: transparent; color: white;}.contact-folder-btn{display: block; margin: 0 auto; background: #038bae; color: white; border: none; padding: 14px 17px; min-width: 200px; margin-bottom: 36px; text-transform: uppercase;}.separator{border-bottom: 4px solid #292929; margin: 0 auto; margin-top: 20px; margin-bottom: 36px; -webkit-box-shadow: none; box-shadow: none;}.tollfree{margin-bottom: 72px;}.directions{background: #f5f3f3; margin-top: 72px;}.salesexpert-area-title{margin-bottom: 36px;}.contact-form-responsive{padding: 48px 0;}@media screen and(max-width: 480px){.contact-page-title{margin-top: 80px;}}
</style>
<section class="sections section contact-page-folder" style="background-image: url(<?= get_template_directory_uri() ?>/images/contacto-bkg.jpg)">
    <div class="mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-lg-8 col-lg-offset-2 text-center">
                <?php echo the_title('<h1 class="contact-page-title">','</h1>'); ?>
                <span class="contact-fold-separator"></span>
                <p><?php _e('Stay in touch with us by calling (593) 2-2267000 or by completing the following form:','gogalapagos'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form id="contact-form" role="form" class="contact-form">
                    <div class="form-group">
                        <label><?php _e('First Name','gogalapagos'); ?>*</label>
                        <input class="form-control" type="text" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label><?php _e('Last Name','gogalapagos'); ?>*</label>
                        <input class="form-control" type="text" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label><?php _e('Email Address','gogalapagos'); ?>*</label>
                        <input class="form-control" type="email" name="vemail" required>
                    </div>
                    <div class="form-group">
                        <label><?php _e('Phone Number','gogalapagos'); ?>*</label>
                        <input class="form-control" type="phone" name="vphone" required>
                    </div>
                    <div class="form-group">
                        <label><?php _e('Request','gogalapagos'); ?></label>
                        <input class="form-control" type="text" name="vrequest">
                    </div>
                    <div class="form-group">
                        <label><?php _e('Description','gogalapagos'); ?></label>
                        <input class="form-control" type="text" name="vdescription">
                    </div>
                    <input class="contact-folder-btn" type="submit" name="send-contact-mail" value="<?php _e('Send','gogalapagos'); ?>">
                </form>
            </div>
        </div>
    </div>
    <div class="scroll-down-indicator hidden-xs hidden-sm hidden-md">
        <div class="scroll-indicator"></div>
    </div>
</section>
<section class="sections section">
    <div class="container contacts-begins">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center"><?php _e('Emergency contact','gogalapagos'); ?> 24/7</h2>
                <span class="separator"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <img width="80" src="<?= get_template_directory_uri() ?>/images/recurso-mail.png">
                <h3 class="body-font"><?php _e('Land Operations Manager','gogalapagos'); ?></h3>
                <span class="contact-separator"></span>
                <p><a href="mailto:ops3@gogalapagos.com.ec"><strong>ops3@gogalapagos.com.ec</strong></a></p>
            </div>
            <div class="col-sm-4 text-center">
                <img width="60" src="<?= get_template_directory_uri() ?>/images/recurso-phone.png">
                <h3 class="body-font"><?php _e('From outside','gogalapagos'); ?> Ecuador</h3>
                <p><strong><a href="tel:+593999456205">(593-9) 9945-6205</a></strong></p>
            </div>
            <div class="col-sm-4 text-center">
                <img width="60" src="<?= get_template_directory_uri() ?>/images/recurso-phone.png">
                <h3 class="body-font"><?php _e('From','gogalapagos'); ?> Ecuador</h3>
                <p><strong><a href="tel:+593999456205">(09) 9945-6205</a></strong></p>

            </div>
        </div>
    </div>
    <div class="directions">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="text-center"><?php _e('Directions & Toll Free Numbers','gogalapagos'); ?></h2>
                    <span class="contact-separator"></span>
                </div>
            </div>
            <div class="row tollfree">
                <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                    <h3 class="body-font text-center"><?php _e('Main Office','gogalapagos'); ?></h3>
                    <h4 class="body-font"><?= _e('Address'); ?>:</h4>
                    <p>Eloy Alfaro Ave. N34-111 &amp; Catalina Aldaz St. <br/> Quito - Ecuador</p>
                    <h4 class="body-font"><?= _e('Phone (Area Code)','gogalapagos'); ?>:</h4>
                    <p>(593-2) 2267 000</p>
                    <h4 class="body-font"><?= _e('Fax', 'gogalapagos'); ?>:</h4>
                    <p>(593-2) 2442 389</p>
                    <h4 class="body-font"><?= _e('Office Schedule', 'gogalapagos'); ?>:</h4>
                    <p>8:30 - 17:30 (<?= _e('Quito time', 'gogalapagos'); ?></p>
                </div>
                <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                    <h3 class="body-font text-center"><?php _e('Galapagos Office','gogalapagos'); ?></h3>
                    <h4 class="body-font"><?= _e('Address'); ?>:</h4>
                    <p>Rabida s/n &amp; Floreana &amp; Piqueros <br /> Santa Cruz Island - Galapagos</p>
                    <h4 class="body-font"><?= _e('Phone (Area Code)','gogalapagos'); ?>:</h4>
                    <p>(593-5) 252 6327</p>
                    <h4 class="body-font"><?= _e('Fax', 'gogalapagos'); ?>:</h4>
                    <p>(593-5) 252 6327</p>
                    <h4 class="body-font"><?= _e('Office Schedule', 'gogalapagos'); ?>:</h4>
                    <p>(593-5) 252 6327 (<?= _e('Galapagos time', 'gogalapagos'); ?></p>
                </div>
                <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                    <h3 class="body-font text-center"><?php _e('Toll Free Numbres','gogalapagos'); ?></h3>
                    <h4 class="body-font"><?= _e('Partners'); ?>:</h4>
                    <ul>
                        <li>US: 1-888-50 KLEIN (55346)</li>
                        <li>CA: 1-866-978-5990</li>
                        <li>UK: 44 - 8455281389</li>
                        <li>PE: 51-1-7088735</li>
                        <li>Fax: 51-1-7088735</li>
                    </ul>
                    <h4 class="body-font"><?= _e('Direct Passengers','gogalapagos'); ?>:</h4>
                    <ul>
                        <li>US &amp; CA: 1-888-8106909 / 1 888-8167820</li>
                        <li>Spain: 34-900300123</li>
                        <li>Fax: 1-7188899348</li>
                    </ul>
                    <h4 class="body-font"><?= _e('Local Phone Numbers', 'gogalapagos'); ?>:</h4>
                    <ul>
                        <li>FR, Paris: 33-17-6660237</li>
                        <li>IT, Roma: 39-06-89385139</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sections section">
    <div id="contact-page-google-map" class="contact-page-google-map" style="height: 100vh;"></div>
    <script type="text/javascript">
        function initMap() {
            var styles=[{"elementType": "geometry", "stylers": [{"color": "#1d2c4d"}]},{"elementType": "labels.text.fill", "stylers": [{"color": "#8ec3b9"}]},{"elementType": "labels.text.stroke", "stylers": [{"color": "#1a3646"}]},{"featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{"color": "#4b6878"}]},{"featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{"color": "#64779e"}]},{"featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [{"color": "#4b6878"}]},{"featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{"color": "#334e87"}]},{"featureType": "landscape.natural", "elementType": "geometry", "stylers": [{"color": "#023e58"}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#283d6a"}]},{"featureType": "poi", "elementType": "labels.text.fill", "stylers": [{"color": "#6f9ba5"}]},{"featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{"color": "#1d2c4d"}]},{"featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{"color": "#023e58"}]},{"featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{"color": "#3C7680"}]},{"featureType": "road", "elementType": "geometry", "stylers": [{"color": "#304a7d"}]},{"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#98a5be"}]},{"featureType": "road", "elementType": "labels.text.stroke", "stylers": [{"color": "#1d2c4d"}]},{"featureType": "road.highway", "elementType": "geometry", "stylers": [{"color": "#2c6675"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#255763"}]},{"featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [{"color": "#b0d5ce"}]},{"featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [{"color": "#023e58"}]},{"featureType": "transit", "elementType": "labels.text.fill", "stylers": [{"color": "#98a5be"}]},{"featureType": "transit", "elementType": "labels.text.stroke", "stylers": [{"color": "#1d2c4d"}]},{"featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{"color": "#283d6a"}]},{"featureType": "transit.station", "elementType": "geometry", "stylers": [{"color": "#3a4762"}]},{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#0e1626"}]},{"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#4e6d70"}]}];
            var myLatLng = {lat: -0.748015, lng: -90.313712}; //-0.748015, -90.313712
            var map = new google.maps.Map(document.getElementById('contact-page-google-map'), {
                zoom: 17,
                styles: styles,
                center: myLatLng,
                mapTypeId: 'roadmap'
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: '<?= get_template_directory_uri() ?>/images/marcador-map.png',
                title: 'Go Galapagos'
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGds9FjlnAoR3dpbkG7iH-c7CYoYWHk1o&callback=initMap"></script>
</section>
<section class="sections section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center salesexpert-area-title"><?php _e('Our Sales Team Email Adresses','gogalapagos'); ?></h2>
                <span class="contact-separator"></span>
            </div>
        </div>
        <div class="row">
            <?php 
                $args = array(
                    'post_type' => 'ggsalesexpert',
                    'posts_per_page' => -1
                );
                $salesExperts = get_posts($args);
                
                foreach ($salesExperts as $expert){
            ?>
            <div id="<?= $expert->ID?>" class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img width="59" src="<?= get_template_directory_uri() ?>/images/recurso-mail-gris.png">
                    </div>
                    <div class="col-sm-8">
                        <?php if ($correo = get_post_meta($expert->ID, $prefix . 'salesexpert_email', true)){ ?>
                        <p><strong><a href="mailto:<?= $correo ?>"><?= $correo ?></a></strong></p>
                        <?php } ?>
                        <p><strong><?= $expert->post_title ?> <small>Ext. <?= get_post_meta($expert->ID, $prefix . 'salesexpert_ext', true) ?></small></strong></p>
                        <p><?= $options[get_post_meta($expert->ID, $prefix . 'salesexpert_charge', true)] ?> - <?= get_post_meta($expert->ID, $prefix . 'salesexpert_region', true) ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script>
    $(document).ready( function(){
        console.log('hola');
        var window_width = $(window).width();
        cambiarFormularioDeLugar(window_width);
    })
    function cambiarFormularioDeLugar(window_width){
        
        if (window_width <= 768){
            
            var htmlCode = '';
            
            htmlCode        =   '<div class="container">';
            htmlCode        +=  '<div class="row">';
            htmlCode        +=  '<div class="col-sm-10 col-sm-offset-1">';
            
            htmlCode        +=  '<div id="form-responsive" class="contact-form-responsive"></div>';
            
            htmlCode        +=  '</div>';
            htmlCode        +=  '</div>';
            htmlCode        +=  '</div>';
            
            
            //$('.contacts-begins').prepend(htmlCode);
            $(htmlCode).insertBefore('.contacts-begins');
            $('#contact-form').appendTo('#form-responsive');
            
        }
        
    }
</script>