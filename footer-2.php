<section class="sections section footer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 style="margin-top:100px; margin-bottom: 40px;"><?php _e('Proud member of:','gogalapagos'); ?></h2>
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
    <div class="container-fluid footer-background" style="height: calc(100vh - 300px);">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-2">
                        <h4 class="body-font"><?php _e('Members Site','gogalapagos'); ?></h4>    
                        <ul>
                            <li><a href="#"><?php _e('Login','gogalapagos'); ?></a></li>
                            <li><a href="#"><?php _e('Register','gogalapagos'); ?></a></li>
                            <li><a href="#"><?php _e('Rates','gogalapagos'); ?></a></li>
                        </ul>
                        <h4 class="body-font"><?php _e('Suscribe to our news','gogalapagos')?></h4>
                        <div class="suscribe-form">
                            <form role="form" action="<?php echo home_url(); ?>/thanks-for-suscribing/">
                                <input class="suscribe-input"type="email" name="suscriber-mail" placeholder="<?php _e('Enter your email','gogalapagos')?>" required>
                                <input class="btn btn-warning pull-right suscribe-btn" type="submit" value="<?php _e('Send','gogalapagos')?>">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="body-font"><?php _e('Site Map','gogalapagos')?></h4>
                        <ul class="three-columns">
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
                        </ul>
                    </div>
                    <div class="col-md-4">
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
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-xs-12 text-center">
                <p><?php _e('Go Galapagos Ltda. All rights reserved. 1980 - 2017','gogalapagos'); ?></p>
            </div>
        </div>
    </div>
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
<?php wp_footer(); ?>
<!--script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullPage.js"></script-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullPage.extensions.min.js"></script>
<script type="text/javascript">
    $('.navTrigger').click(function(){
        $(this).toggleClass('active');
        $('#alter-nav').toggleClass('active');
        if( $('.navTrigger').hasClass('active') ){
            console.log('esta activo');
            $('.menu-word').html('Esc');
            $('.menu-word').prop('title','Press Esc to exit menu');
        }else{
            console.log('NO esta activo');
            $('.menu-word').prop('title','Go Galapagos alternate menu');
            $('.menu-word').html('Menu');
        }
    });
    $('.search-icon').click(function(){
        console.log('buscar');
        $(this).toggleClass('active');
        if( $(this).hasClass('active') ){
            $('.search-icon').css('z-index',10000);
            $('.search-box').addClass('active');
        }else{
            $('.search-box').removeClass('active');
            setTimeout( function(){
                $('.search-icon').css('z-index',999);
            },400);
        }
    });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            if( $('.navTrigger').hasClass('active') ){
                $('#alter-nav').removeClass('active');
                $('.navTrigger').toggleClass('active');
                $('.menu-word').html('Menu');
                $('.menu-word').prop('title','Go Galapagos alternate menu');
            }
            if( $('.search-icon').hasClass('active') ){
                $('.search-box').removeClass('active');
                $('.search-icon').removeClass('active');
                setTimeout( function(){
                    $('.search-icon').css('z-index',999);
                },400);
            }
        }
    });
    $(document).ready( function(){
        $('#gogafullpage').fullpage({
            navigation: false,
            navigationPosition: 'left',
            autoScrolling:true,
            scrollBar:false,
        });
        $('#search-form input').val('') ;
        $('#search-form input').focusin( function(){            
            $('#search-form label').toggleClass('infocus')
        });
        $('#search-form input').focusout( function(){            
            $('#search-form label').toggleClass('infocus')
        });
        $('.filter-transparent-box ul li select[name="trip"]').focusin( function(){
            $('.filter-transparent-box ul li label[for="trip"]').addClass('infocus');
        });
        $('.filter-transparent-box ul li select[name="departures"]').focusin( function(){
            $('.filter-transparent-box ul li label[for="departures"]').addClass('infocus');
        });
        $('.filter-transparent-box ul li select[name="trip"]').focusout( function(){
            if ( $(this).val().length == 0){
                $('.filter-transparent-box ul li label[for="trip"]').removeClass('infocus');
            }
        });
        $('.filter-transparent-box ul li select[name="departures"]').focusout( function(){
            if ( $(this).val().length == 0){
                $('.filter-transparent-box ul li label[for="departures"]').removeClass('infocus');
            }
        });
    });
    // Listener Scroll event
    $(window).scroll( function(){
        console.log('moviendo');
        if( $(window).scrollTop == 0 ){
            video.play();
        }
    });
</script>
<script type="text/javascript">
    var video = document.getElementById("hero-video");
    video.addEventListener( "canplay", function() {
        video.play();
    });
</script>
</body>
</html>