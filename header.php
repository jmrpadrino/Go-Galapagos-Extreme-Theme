<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <?php wp_head(); ?>        
    </head>
    <body <?php body_class(); ?>>
        <?php 
        /**
        / Navigation
        */
        ?>
        <header id="headerelements" class="headerelements gradient">
            <div class="navTrigger">
                <i></i><i></i><i></i> <span class="menu-word" title="Go Galapagos alternate menu"><?php _e('Menu','gogalapagos'); ?></span>
            </div>
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
                                echo '<div class="col-sm-9 alter-nav-container"></div>';
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
            <?php if( $post->post_type == 'ggisland' ){?>
            <div class="island-inner-navigation">
                <ul>
                    <li>
                        <a class="inner-navigation-icon" href="#"><span>O</span></a>
                    </li>
                    <li>
                        <a class="inner-navigation-icon" href="#"><span>O</span></a>
                    </li>
                    <li>
                        <a class="inner-navigation-icon" href="#"><span>O</span></a>
                    </li>
                    <li>
                        <a class="inner-navigation-icon" href="#"><span>O</span></a>
                    </li>
                </ul>
            </div>        
            <?php } ?>
        </header>
<?php
    if(!wp_is_mobile()){
        if (is_singular('ggships') or is_page('galapagos-legend')){
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