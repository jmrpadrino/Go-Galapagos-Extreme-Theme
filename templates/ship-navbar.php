<?php
    $prefix = 'gg_';
    $virtual360Link = get_post_meta($post->ID, $prefix . 'ship_section_360_link', true);
?>
<div id="ship-alter-navbar" class="contanier-fluid ship-alter-navbar">
    <div class="row">
        <div class="col-xs-12">
            <ul class="list-inline ship-navbar-items">
                <li>
                    <a class="navTrigger-ship">
                        <i style="border: 2px solid white; border-radius: 2px; display: block; width: 28px; margin-bottom: 5px;"></i>
                        <i style="border: 2px solid white; border-radius: 2px; display: block; width: 28px; margin-bottom: 5px;"></i>
                        <i style="border: 2px solid white; border-radius: 2px; display: block; width: 28px; margin-bottom: 5px;"></i>
                    </a>
                </li>
                <li><a class="regular-link" href="#experience"><span><?php _e('Experience','gogalapagos'); ?></span></a></li>
                <li><a class="regular-link" href="#socialareas"><span><?php _e('Social Areas','gogalapagos'); ?></span></a></li>
                <li><a class="regular-link" href="#cabins"><span><?php _e('Cabins','gogalapagos'); ?></span></a></li>
                <li><a class="regular-link" href="#moreinfo"><span><?php _e('Technical Information & Deck Plan','gogalapagos'); ?></span></a></li>
                <li><a class="regular-link" href="<?= $virtual360Link ?>" target="_blank"><span><?php _e('360 Virtual Tour','gogalapagos'); ?></span></a></li>
                <li><a class="regular-link" href="<?php echo home_url($post->post_name . '-itineraries/'); ?>" target="_blank"><span><?php _e('Itineraries','gogalapagos'); ?></span></a></li>
                <li><a class="plan-your-trip-btn" href="#"><span><?php _e('Plan Your Trip Now!','gogalapagos'); ?></span></a></li>
            </ul>
        </div>
    </div>
</div>