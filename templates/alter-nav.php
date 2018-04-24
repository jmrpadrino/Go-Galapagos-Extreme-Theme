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