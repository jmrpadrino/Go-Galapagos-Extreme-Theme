    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <h2 class="text-center element-title"><?= $areasocialInfo->post_title ?></h2>
                    <span class="separator"></span>
                    <p class="social-area-description"><?= $areasocialInfo->post_excerpt ?></p>
                    <?php
                        $imagenLeft = wp_get_attachment_image_src( $areasocialGalery[1], '', false );
                        $imagenRight = wp_get_attachment_image_src( $areasocialGalery[0], 'full', false );
                    ?>
                </div>
            </div>
        </div>
        <div class="container-social-area">
            <div class="row">
                <div class="col-sm-7">
                    <div class="first-template-social-area-image right">
                        <img src="<?= $imagenLeft[0] ?>" class="img-responsive set-full-image">
                    </div>
                </div>
                <div class="col-sm-5 hidden-xs">
                    <div class="first-template-social-area-image left">
                        <img src="<?= $imagenRight[0] ?>" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>