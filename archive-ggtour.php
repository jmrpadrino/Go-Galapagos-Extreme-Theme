<?php get_header(); ?>
<section class="sections section">    
<div id="land-tours-fold" class="blog-fold land-tours" style="background-image: url(<?= get_template_directory_uri() ?>/images/blogBkg.jpg);">
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="blog-archive-title"><?= _e('Land Tours', 'gogalapagos'); ?></h1>
                <p class="page-hero-text"><?= _e('Enjoy new experiences','gogalapagos'); ?></p>
                <span class="separator"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="scroll-down-indicator">
                <div class="scroll-indicator"></div>
            </div>  
        </div>
    </div>
</div>
</section>
<section class="sections section">
    <div class="container">
        <div class="row">
            <div id="show-tours" class="col-xs-12"></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>

