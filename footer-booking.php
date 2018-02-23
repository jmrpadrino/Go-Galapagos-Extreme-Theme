<?php 
    $prefix = 'gg_';
?>
<?php if(is_front_page()){ get_template_part('templates/footer-customer'); }?>
<section id="footer" data-anchor="footer-page" class="sections section footer-section footer-background">
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
                    <?php 
                        $args = array(
                            'post_type' => 'ggmembership',
                            'posts_per_page' => -1
                        );
                        $memberships = get_posts($args);
                
                        foreach($memberships as $membership){
                            echo '<li><img src="'.get_the_post_thumbnail_url( $membership->ID, 'thumbnail' ).'" alt="Go Galapagos is member of '.$membership->post_title.'" class="img-responsive"></li>';
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
                            <li><a href="#"><?php _e('Login','gogalapagos'); ?></a></li>
                            <li><a href="#"><?php _e('Register','gogalapagos'); ?></a></li>
                            <li><a href="#"><?php _e('Rates','gogalapagos'); ?></a></li>
                        </ul>
                        <h4 class="body-font"><?php _e('Suscribe to our news','gogalapagos')?></h4>
                        <div class="suscribe-form">
                        <?php dynamic_sidebar( 'suscribe' ) ?>
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
<?php wp_footer(); ?>
</body>
</html>