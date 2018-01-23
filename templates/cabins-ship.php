<?php 
$prefix = 'gg_';
$cabin__dispoID = strtoupper(get_post_meta($cabina->ID, $prefix.'cabin_dispo_ID', true));
$cabinaLocacion = get_post_meta( $cabina->ID, $prefix . 'cabin_deck_location_image', true);
$cabinaRenders = get_post_meta( $cabina->ID, $prefix . 'cabin_render', false);
?>
    <div class="fullpage-slide cabin-profile-container">
        <div class="container-fluid info-container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="element-title"><?= $cabina->post_title ?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="cabin-description-placeholder">
                        <!--p><?= get_the_excerpt($cabina->ID); ?></p-->
                        <ul class="cabin-feature-list">
                            <?php
                                $caracteristicas = get_post_meta( $cabina->ID, $prefix . 'cabin_featurelist', true);
                                foreach($caracteristicas as $caracteristica){
                                    echo '<li>'.$caracteristica.'</li>';
                                }
                            ?>
                        </ul>
                        <a href="#" class="btn btn-cabin-modal" data-element="floor-plan-<?= $cabina->post_name; ?>"><?php _e('3D Floor Plan','gogalapagos'); ?></a>
                        <a href="#" class="btn btn-cabin-modal" data-element="cabin-location-<?= $cabina->post_name; ?>"><?php _e('Cabin Location','gogalapagos'); ?></a>
                        <br />
                        <?php
                            $fecha = date('U', strtotime('+1 Week'));
                            //echo $cabin__dispoID;
                            //echo $barco;
                        ?>
                        <a href="https://quote.gogalapagos.com/en/site/cruceroAcomodacion?date=<?= $fecha ?>&ship=<?= $barco ?>&cabin=<?= $cabin__dispoID ?>" class="btn btn-cabin-request" target="_blank"><?php _e('Request a Quote','gogalapagos'); ?></a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="cabin-thumbnail-placeholder">
                        <img class="cabin-thumbnail" src="<?= get_the_post_thumbnail_url($cabina->ID); ?>" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <div id="floor-plan-<?= $cabina->post_name; ?>" class="cabin-floor-location-placeholder hidden">
                <span class="fa fa-times close-cabin-placeholder"></span>
                <?php 
                    if (count($cabinaRenders) > 1){
                        echo '<div class="row">';
                        echo '<div class="col-sm-6" style="height: 100vh; display: flex; align-content: center;">';
                        $rutaImagen = wp_get_attachment_image_src( $cabinaRenders[0], 'full', false );
                        echo '<img src="'.$rutaImagen[0].'" class="img-responsive">';
                        echo '</div>';
                        echo '<div class="col-sm-6" style="height: 100vh; display: flex; align-content: center;">';
                        $rutaImagen = wp_get_attachment_image_src( $cabinaRenders[1], 'full', false );
                        echo '<img src="'.$rutaImagen[0].'" class="img-responsive">';
                        echo '</div>';
                        echo '</div>';
                    }else{
                        $rutaImagen = wp_get_attachment_image_src( $cabinaRenders[0], 'full', false );
                        echo '<img src="'.$rutaImagen[0].'" class="img-responsive">';      
                    }
                ?>
            </div>
            <div id="cabin-location-<?= $cabina->post_name; ?>" class="cabin-floor-location-placeholder hidden">
                <span class="fa fa-times close-cabin-placeholder"></span>
                <img src="<?= $cabinaLocacion ?>" class="img-responsive">
            </div>
    </div>