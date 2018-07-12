<?php

$directorio = get_template_directory_uri();

if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
    ob_start( "ob_gzhandler" );
}
else {
    ob_start();
}
?>
<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style media="screen">
            body{
                position: relative;
                overflow: hidden;
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
                overflow: hidden;
            }
            .loader-text{
                display: block;
                margin: auto;
                font-size: 48px;
                color: white;
                font-weight: 900;
            }
        </style>
        <?php
            echo '<style media="screen">';
            if(is_home() or is_front_page()){
                $css .= file_get_contents ($directorio . '/minified/gogalapagos-home.min.css');
            }
            if(is_page()){
                $css .= file_get_contents ($directorio . '/minified/gogalapagos-basic-pages.min.css');
            }
            echo $css;
            echo '</style>';
            
        ?>
        <?php wp_head(); ?>
        <?php /*
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?php echo $directorio ?>/images/favicon/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="<?php echo $directorio ?>/images/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="<?php echo $directorio ?>/images/favicon/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo $directorio ?>/images/favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="<?php echo $directorio ?>/images/favicon/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="Go Galapagos"/>
        <meta name="msapplication-TileColor" content="#003a57" />
        <meta name="msapplication-TileImage" content="<?php echo $directorio ?>/images/favicon/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="<?php echo $directorio ?>/images/favicon/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="<?php echo $directorio ?>/images/favicon/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="<?php echo $directorio ?>/images/favicon/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="<?php echo $directorio ?>/images/favicon/mstile-310x310.png" />
        */ ?>
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $directorio ?>/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $directorio ?>/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $directorio ?>/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $directorio ?>/images/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php echo $directorio ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <?php flush(); ?>
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
                            <img id="header-logo" src="<?php echo $directorio ?>/images/go-galapagos-logo.png" alt="Go Galapagos Logo">
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
        
//        if (is_post_type_archive('ggtour')){
//            get_template_part('templates/land-tours-navbar');
//        }
    }
        ?>
        <div id="gogafullpage">