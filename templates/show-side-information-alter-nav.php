<?php
    switch ($info){
        case 'islands':
            $the_post_type_is = 'ggisland';
            $the_section_title = _x('Galapagos Islands', 'gogalapagos');
            break;
        case 'activities':
            $the_post_type_is = 'ggactivity';
            $the_section_title = _x('#MustDo', 'gogalapagos');
            break;
        case 'animals':
            $the_post_type_is = 'gganimal';
            $the_section_title = _x('Animals & Wildlife', 'gogalapagos');
            break;
    }
?>
<?php if ($the_post_type_is == 'gganimal'){ ?>
<div class="container alter-nav-content" style="overflow: hidden;">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="alter-section-title animated fadeInLeft"><?php echo $the_section_title; ?></h2>    
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="alter-preview-info animated fadeInLeft">
                <?= _e('Adaptation, evolution, endemism and fearlessness are probably the concepts that best describe the only animals that complement the natural magic of the Galapagos Islands. The species that by chance were carried by ocean or air currents, managed to reach these isolated and remote islands, facing a very different and extreme environment.', 'gogalapagos'); ?>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="pull-right alter-nav-layout-upper-image-placeholder animated fadeInRight">
                <img class="img-responsive" src="<?= get_template_directory_uri() ?>/images/animals-preview-alter-nav.jpg" alt="Galapagos Animals">
            </div>
        </div>
    </div>
    <div class="row lower-info">
        <div class="col-sm-6">
            <div class="alter-nav-layout-lower-image-placeholder animated fadeInUp">
                <img class="img-responsive" src="<?= get_template_directory_uri() ?>/images/ballena-galapagos.jpg" alt="Galapagos Animal">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="animated fadeInRight"><?php _e('Animals Grouped By','gogalapagos'); ?></h3>
                </div>
            </div>
            <?php
    //OBTENER LOS GRUPOS DE ANIMALES
    $animal_groups = array (
        'taxonomy' => 'animalgroup',
        'hide_empty' => false
    );
    $groups = get_terms( $animal_groups );
            ?>
            <div class="row">
                <?php 
                    foreach($groups as $group){
                        echo '<div class="col-sm-4 animated fadeInDown">';
                        echo '<a class="alter-taxonomy-link" href="' . get_term_link( $group->term_id ) . '">';
                        echo '<div class="taxonomy-link-box">';
                        echo '<span>'. $group->name . '</span>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-12 animated fadeInUp text-right">
                    <a class="conservation-link" href="#"><span class="conservation-info-icon">i</span>Conservation of The Galapagos Islands</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } //Fin grilla animales
    if ($the_post_type_is == 'ggisland'){
?>
<div class="container alter-nav-content" style="overflow: hidden;">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="alter-section-title animated fadeInLeft"><?php echo $the_section_title; ?></h2>    
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="alter-preview-info animated fadeInLeft">
                <?= _e('Every island in the Galapagos is different one from the other and all this is due to how they were formed. If the 4,600 million years of Earth´s history will be simulated in 24 hours, the Galapagos Islands had been formed in the last two minutes of that day. The 19 islands and 219 islets were created by successive volcanic eruptions over a hot spot located on the seafloor of the Nazca Plate. The first of them emerged in the middle of the Pacific Ocean about 5 million years ago. The islands are settled on the Nazca Plate and move about 5 centimeters a year eastward. ', 'gogalapagos'); ?>
            </div>
            <a href="<?php echo get_post_type_archive_link('ggisland') ?>" class="plan-your-trip-single-btn alter-nav-link"><?= _e('See more Islands','gogalapagos')?></a>
        </div>
        <div class="col-sm-8">
            <div class="pull-right alter-nav-layout-upper-image-placeholder animated fadeInRight">
                <img class="img-responsive" src="<?= get_template_directory_uri() ?>/images/island-preview-alter-nav.jpg" alt="Galapagos Animals">
            </div>
        </div>
    </div>
</div>
<?php } //fin grilla islas?>