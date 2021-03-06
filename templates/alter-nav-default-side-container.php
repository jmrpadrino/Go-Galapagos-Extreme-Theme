<?php $prefix = 'gg_'; ?>
<?php 
$args = array(
    'post_type' => 'ggships',
    'posts_per_page' => 2
);
$barcos = get_posts($args);
?>
<div class="col-md-9 hidden-sm hidde-xs alter-nav-container">
    <div class="contenedor">
        <div class="row">
            <div class="col-xs-12">
                <h2><?= _e('The Go Galapagos Experience', 'gogalapagos') ?></h2>
            </div>
        </div>
        <div class="row">
            <div style="display: flex;">
                <div style="max-width: 30vw; margin: 0 18px; display: flex;"> 
                    <div class="alter-preview-info animated fadeInLeft">
                        <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, perspiciatis exercitationem accusamus laudantium ab dolorum consectetur reiciendis totam, maxime nam velit, modi! Atque sint, nostrum officia eaque doloribus! Nam, nobis.</p-->
                        <?php foreach($barcos as $barco){ ?>        
                        <h3><?= _e('The','gogalapagos') ?> <?= $barco->post_title ?></h3>
                        <p><?= esc_html( get_the_excerpt($barco->ID) ) ?></p>
                        <?php } ?>
                    </div>      
                </div>
                <div style="width: 35vw;">
                    <div class="row">
                        <div class="col-xs-12">
                            <img class="img-responsive" style="margin-bottom: 18px; width: 100%;" src="<?= get_template_directory_uri() ?>/images/alter-nav-default-experience.jpg" alt="<?= _e('The Go Galapagos Experience', 'gogalapagos') ?>">
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($barcos as $barco){ ?>
                        <div class="col-md-6 ship-placeholder">
                            <div class="alter-nav-container-ship-logo">
                                <img class="img-responsive" width="120" src="<?= get_post_meta($barco->ID, $prefix . 'ship_logo', true) ?>" alt="<?= $barco->post_title ?>">
                            </div>
                            <a class="home-ship-btn" href="<?= home_url($barco->post_name); ?>">
                            <img class="img-responsive" src="<?= get_post_meta($barco->ID, $prefix . 'ship_wiki_image', true) ?>" alt="<?= $barco->post_title ?>">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>