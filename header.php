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
        
        <?php get_template_part('templates/alter-nav') ?>
        <?php get_template_part('templates/search-box') ?>
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
        <div id="gogafullpage">