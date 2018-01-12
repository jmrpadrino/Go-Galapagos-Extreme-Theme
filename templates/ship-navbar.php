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
                <li><a class="regular-link" href="#experience"><?php _e('Experience','gogalapagos'); ?></a></li>
                <li><a class="regular-link" href="#socialareas"><?php _e('Social Areas','gogalapagos'); ?></a></li>
                <li><a class="regular-link" href="#cabins"><?php _e('Cabins','gogalapagos'); ?></a></li>
                <li><a class="regular-link" href="#moreinfo"><?php _e('Technical Information & Deck Plan','gogalapagos'); ?></a></li>
                <li><a class="regular-link" href="<?= $virtual360Link ?>" target="_blank"><?php _e('360 Virtual Tour','gogalapagos'); ?></a></li>
                <li><a class="regular-link" href="<?php echo home_url($post->post_name . '-itineraries/'); ?>"><?php _e('Itineraries','gogalapagos'); ?></a></li>
                <li><a class="plan-your-trip-btn" href="#"><?php _e('Plan Your Trip Now!','gogalapagos'); ?></a></li>
            </ul>
        </div>
    </div>
</div>