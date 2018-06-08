<?php 
get_header(); 
the_post();
$prefix = 'gg_';
?>
<section class="sections section thumbnail-page">
    <div class="container-fluid nopadding text-center" style="height: 60vh; background-image: url(<?php echo the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; padding-top: 30vh; position: relative;">
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?= the_title('<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">','</h1>') ?>
                <span class="home-get-in-love-separator"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="height: 40vh;">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 inner-page-content" style="margin-top: 30px;">
                <div class="cruise-page-content">    
                    <?= get_post_meta(get_the_ID(), $prefix . 'page_first_section_content', true); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$i = 1;
$whyGalapagosnumberofsections = get_option('gg_why_galapagos_sections');
while ($i <= $whyGalapagosnumberofsections){
    $titulo = get_post_meta(get_the_ID(), $prefix . 'why_galapagos_section_h2_'. $i, true);
    $contenido = get_post_meta(get_the_ID(), $prefix . 'why_galapagos_section_content_'. $i, true);
    $link = get_post_meta(get_the_ID(), $prefix . 'why_galapagos_section_link_'. $i, true);
    $imagen = get_post_meta(get_the_ID(), $prefix . 'why_galapagos_section_image_'. $i, true);
?>
<section class="sections section <?= $i % 2 == 0 ? 'darker' : '' ?>">
    <div class="container-fluid">
        <div class="row nopadding">
            <div class="col-md-6">
                <div class="day-placeholder">
                    <h2><?= $titulo ?></h2>
                    <div class="why-galapagos-section-paragrahp">
                        <?= $contenido ?>
                    </div>
                    <?php if(!empty($link)){ ?>
                    <a class="itinerary-plan-your-trip-btn" href="<?= $link ?>"><?= _e('Learn More', 'gogalapagos') ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6 nopadding">
                <?php if($imagen){ ?>
                <div class="day-image-placeholder">
                    <img src="<?= $imagen ?>" alt="">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php $i++; } //end While ?>
<?php get_footer(); ?>