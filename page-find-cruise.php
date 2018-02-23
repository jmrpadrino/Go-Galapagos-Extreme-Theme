<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <style>
            body{
                position: relative;
            }
            .loader{
                height: 100vh;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #191919;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 99999999999;
            }
            .loader-text{
                display: block;
                margin: auto;
                font-size: 48px;
                color: white;
                font-weight: 999;
            }
        </style>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="loader" class="loader">
            <span class="loader-text"><?= _e('Loading', 'gogalapagos') ?></span>
        </div>
        <?php 
        /**
        / Navigation
        */
        ?>
        <header id="headerelements" class="headerelements gradient">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5">
                        <a href="<?php echo home_url(); ?>" class="gogalapagos-logo text-center">
                            <img id="header-logo" src="<?php echo get_template_directory_uri(); ?>/images/go-galapagos-logo.png" alt="Go Galapagos Logo">
                        </a>
                    </div>
                    <?php
                    if ( !wp_is_mobile() ){
                        $main_menu_args = array(
                            'theme_location'  => 'desktop-top-main-menu',	
                            'menu' => 'desktop-top-main-menu',
                            'container_class' => 'top-side-navigation col-sm-5 text-right hidden-xs hidden-sm',
                            'container_id' => 'top-side-navigation',
                            'menu_class' => 'list-inline'
                        );
                        wp_nav_menu( $main_menu_args ); 
                    }
                    ?>               
                </div>
            </div>
        </header>
        <!--button type="button" class="btn btn-primary getyourtrip-navbar-btn hidden" data-toggle="modal" data-target="#tripFilter"><?php _e('Get your trip','gogalapagos'); ?></button-->
        <div class="navTrigger">
            <i></i><i></i><i></i> <span class="menu-word" title="Go Galapagos alternate menu"><?php _e('Menu','gogalapagos'); ?></span>
        </div>
        <div id="alter-nav" class="alter-nav">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if ( !wp_is_mobile() ){
                        echo '<div class="col-sm-3 menu-placeholder">';
                        $alter_menu_args = array(
                            'theme_location'  => 'desktop-side-alter-menu',
                            'menu' => 'desktop-side-alter-menu',
                            'container_class' => 'desktop-side-alter-menu',
                            'container_id' => 'desktop-side-alter-menu'
                        );
                        wp_nav_menu( $alter_menu_args ); 
                    ?>
                    <div class="social-and-credits">
                        <?php if ( is_active_sidebar( 'translation' ) ) : ?>
                            <div id="languages_widget" class="languages_widget widget-area" role="complementary">
                                <?php dynamic_sidebar( 'translation' ); ?>
                            </div><!-- #primary-sidebar -->
                        <?php endif; ?>
                        <ul class="list-inline social-icons-list">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-youtube-play"></span></a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                        <div class="credits">
                            <p>GO Galapagos / Kleintours</p>
                            <p>All rights reserved. 2018</p>
                        </div>
                    </div>
                    <?php
                        echo '</div>';
                        get_template_part('/templates/alter-nav-default-side-container');
                    }else{
                        echo '<div class="col-xs-12 menu-placeholder">';
                        $alter_menu_args = array(
                            'theme_location'  => 'mobile-main-menu',
                            'menu' => 'desktop-side-alter-menu',
                            'container_class' => 'mobile-menu',
                            'container_id' => 'mobile-menu'
                        );
                        wp_nav_menu( $alter_menu_args );
                    ?>
                    <div class="social-and-credits">
                        <ul class="list-inline text-center social-icons-list">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-youtube-play"></span></a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                        <div class="credits">
                            <p>GO Galapagos / Kleintours</p>
                            <p>All rights reserved. 2018</p>
                        </div>
                    </div>
                    <?php
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="search-box" class="search-box">
            <div class="container-fluid">
                <h2 class="search-box-title"><?php _e('Tell us what are you looking for?','gogalapagos'); ?></h2>
                <form id="search-form" class="search-form" role="form" action="<?php echo home_url(); ?>/">
                    <label for="s"><?php _e('Type here and press enter','gogalapagos'); ?></label>
                    <input id="s" type="text" name="s" width="100%">
                </form>
                <h2 class="search-box-title-smaller"><?php _e('You may also be interested in','gogalapagos'); ?></h2>
                <ul class="list-inline tag-list">
                    <li><a href="#">Galapagos Animals</a></li>
                    <li><a href="#">Galapagos Islands</a></li>
                    <li><a href="#">Galapagos Climate</a></li>
                    <li><a href="#">Charles Darwin</a></li>
                    <li><a href="#">Galapagos Facts</a></li>
                </ul>
                <ul class="list-inline tag-list">
                    <li><a href="#">Go Galapagos Cruises</a></li>
                    <li><a href="#">Galapagos Legend</a></li>
                    <li><a href="#">Coral Yachts</a></li>
                </ul>
            </div>
        </div>
        <div class="search-icon" title="Open searh box">
            <div class="search__circle"></div>
            <div class="search__rectangle"></div>  
        </div>
        <?php
        if(!wp_is_mobile()){
            if (is_singular('ggships') or is_page('galapagos-legend') or is_page('coral-yachts') ){
                get_template_part('templates/ship-navbar');
            }
            if (is_page('about-us')){
                get_template_part('templates/about-us-navbar');
            }
            if (is_post_type_archive('ggtour')){
                get_template_part('templates/land-tours-navbar');
            }
        }
        ?>
        <div id="gogafullpage"><div class="booking-system-wrapper">
    <div id="btn-order-details" class="btn-order-details">
        <span class="fa fa-2x fa-ellipsis-v"></span>
    </div>
    <div class="container-fluid no-padding booking-filters-view">
    <div class="booking-filters-header">
        <div class="row">
            <div class="col-xs-12">
                <h1>Find your cruise in Galapagos!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>Please choose beetwen the items below</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="col-xs-7 text-center" role="presentation" class="active"><a href="#legend" aria-controls="legend" role="tab" data-toggle="tab">Galapagos Legend</a></li>
                <li class="col-xs-5 text-center" role="presentation"><a href="#corals" aria-controls="corals" role="tab" data-toggle="tab">Coral Yachts</a></li>
            </ul>
        </div>
        <div class="col-xs-12">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="legend">
                    <img src="http://placehold.it/480x150?text=ImageLegend" class="img-responsive">
                    <button id="select-month-btn" class="btn btn-default btn-lg btn-choose-month"><span class="fa fa-calendar"></span> Select your departure date</button>
                </div>
                <div role="tabpanel" class="tab-pane" id="corals">
                    <img src="http://placehold.it/480x150?text=ImageCorals" class="img-responsive">
                    <button id="select-month-btn" class="btn btn-default btn-lg btn-choose-month"><span class="fa fa-calendar"></span> Select your departure date</button>
                </div>            
            </div>
        </div>
    </div>
</div>
<div id="month-picker" class="month-picker">
    <div id="btn-go-back" class="btn-go-back">
        <span class="fa fa-long-arrow-left"></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2><span class="fa fa-calendar"></span> Select departure date</h2>
            </div>
        </div>
        <div class="row">
            <div class="months-placeholder">
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month disable"><span>1</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month disable"><span>2</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month disable"><span>3</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month disable"><span>4</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>5</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>6</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>7</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month selected"><span>8</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>9</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>10</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>11</span></div></div>
                <div class="col-xs-4 no-padding text-center month-placeholder"><div class="inner-month"><span>12</span></div></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button id="btn-ok-date" class="btn btn-success">OK</button>
            </div>
        </div>
    </div>
</div>
<div id="order-details-box" class="order-details-box">
    <div id="btn-go-back-sumary" class="btn-go-back">
        <span class="fa fa-long-arrow-left"></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>Sumary</h2>
                
            </div>
        </div>
    </div>
</div>
<div id="show-calendar" class="btn-alter btn-right-upper">
    <span class="fa fa-calendar"></span>
</div>
<div class="btn-alter btn-order-details_2">
    <span class="fa fa-ellipsis-v"></span>
</div>    </div><!-- cierre div principal -->
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