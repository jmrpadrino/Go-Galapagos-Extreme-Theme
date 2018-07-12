    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="text-center element-title"><?= $activityInfo->post_title ?></h2>
                    <span class="separator"></span>
                    <p class="social-area-description"><?= $activityInfo->post_excerpt ?></p>
                    <?php
                        $imagenLeft = wp_get_attachment_image_src( $activityGalery[1], 'medium_large', false );
                        $imagenRight = wp_get_attachment_image_src( $activityGalery[0], 'medium_large', false );
                    ?>
                </div>
            </div>
        </div>
        <div class="container-social-area">
            <div class="row">
                <div class="col-sm-5">
                    <div class="first-template-social-area-image left">
                        <img src="<?= $imagenLeft[0] ?>" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-7 hidden-xs">
                    <div class="first-template-social-area-image right">
                        <img src="<?= $imagenRight[0] ?>" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>