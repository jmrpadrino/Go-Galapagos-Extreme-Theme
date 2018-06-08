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
        <header id="headerelements" class="slides-singles">
            <div class="navTrigger">
                <i></i><i></i><i></i> <span class="menu-word" title="Go Galapagos alternate menu"><?php _e('Menu','gogalapagos'); ?></span>
            </div>
            <div class="search-icon" title="Open searh box">
                <div class="search__circle"></div>
                <div class="search__rectangle"></div>                            
            </div>
            <div class="top-navbar gradient">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5">
                            <a href="<?php echo home_url(); ?>" class="gogalapagos-logo text-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/go-galapagos-logo.png" alt="Go Galapagos Logo">
                            </a>
                        </div>
                        <!--
                        <div class="top-side-navigation col-sm-5 text-right">
                            <ul class="list-inline">
                                <li><a href="#">Why Galapagos?</a></li>
                                <li><a href="#">Go Galapagos</a></li>
                                <li><a href="#" class="plan-your-trip-link">Request a Quote</a></li>
                                <li><a href="#">Request a quote</a></li>
                            </ul>
                        </div>
                        -->
                        <?php
                            $main_menu_args = array(
                                'theme_location'  => 'desktop-top-main-menu',	
                                'menu' => 'desktop-top-main-menu',
                                'container_class' => 'top-side-navigation col-sm-5 text-right',
                                'container_id' => 'top-side-navigation',
                                'menu_class' => 'list-inline'
                            );
                            wp_nav_menu( $main_menu_args ); 
                        ?>               
                    </div>
                </div>
            </div>
            <div id="alter-nav" class="alter-nav">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3 menu-placeholder">
                            <?php
                            $alter_menu_args = array(
                                'theme_location'  => 'desktop-side-alter-menu',
                                'menu' => 'desktop-side-alter-menu',
                                'container_class' => 'desktop-side-alter-menu',
                                'container_id' => 'desktop-side-alter-menu'
                            );
                            wp_nav_menu( $alter_menu_args ); 
                            ?>
                        </div>
                        <div class="col-sm-9 alter-nav-container"></div>
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
        </header>
        <div id="gogafullpage">