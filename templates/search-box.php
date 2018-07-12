        <div id="search-box" class="search-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="search-box-title"><?php _e('Tell us what are you looking for?','gogalapagos'); ?></h2>
                        <form id="search-form" class="search-form" role="form" action="<?php echo home_url(); ?>/">
                            <label for="s"><?php _e('Type here and press enter','gogalapagos'); ?></label>
                            <input id="s" type="text" name="s" width="100%">
                        </form>
                        <h2 class="search-box-title-smaller"><?php _e('You may also be interested in','gogalapagos'); ?></h2>
                        <?php
                            $alter_menu_args = array(
                                'theme_location'  => 'search-area-top',
                                'menu' => 'search-area-top',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'list-inline tag-list'
                            );
                            wp_nav_menu( $alter_menu_args ); 
                        ?>
                        <?php
                            $alter_menu_args = array(
                                'theme_location'  => 'search-area-bottom',
                                'menu' => 'search-area-bottom',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'list-inline tag-list'
                            );
                            wp_nav_menu( $alter_menu_args ); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-icon" title="Open searh box">
            <div class="search__circle"></div>
            <div class="search__rectangle"></div>  
        </div>