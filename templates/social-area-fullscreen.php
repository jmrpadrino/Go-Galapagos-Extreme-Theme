<?php
    $thumbnail = get_the_post_thumbnail_url( $areasocialInfo->ID );
?>
    <div class="fullpage-slide" style="background-image: url(<?= $thumbnail ?>); position: relative; background-size: cover; background-position: center;">
        <div style="width: 100%; height: 100%; display: flex; position: relative; align-items: center; justify-content: center; color: white;">
            <div class="hero-mask" style="opacity: .5;"></div>
            <!--h2 style="z-index: 99999;"><?= _e('Anothers Social Areas', 'gogalalagos'); ?></h2-->
        </div>
    </div>