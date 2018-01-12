<?php get_header(); the_post(); $prefix = 'gg_';?>
<?php 
/* METADATOS DEL BARCO 
* @barcoID  ID del barco (Wordpress)
* EL ATRIBUTO DE "TRUE" EN LOS POST META SE USA 
* CUANDO EL INPUT VA A DEVOLVER UN ARRAY,
* CASO CONTRARIO SE USA "FALSE"
*/
$barcoID = $post->ID; // ID del barco (wordpress)
$barcoNombre = $post->post_title; // Nombre del Barco
$barcoSlug = $post->post_name; // SHORT URL del barco
$barcoCPT = $post->post_type; // Unidad de información del barco
$barcoMenuOrden = $post->menu_order; // Orden Jerarquico del barco
$barcoURL = $post->guid; // LONG URL del barco

// INFORMACION METABOXES DEL BARCO
$barco__resumen = get_the_excerpt($barcoID);
$barco__logo = get_post_meta( $barcoID, $prefix . 'ship_logo', true); // Imagen -> LOGO del barco
$barco__slogan = get_post_meta( $barcoID, $prefix . 'ship_slogan', true); // Texto -> slogan del barco
$barco__foldpicture = get_post_meta( $barcoID, $prefix . 'ship_fold_picture', true); // URL   -> slogan del barco
$barco__foldbkg = get_post_meta( $barcoID, $prefix . 'ship_fold_bkg', true); // URL   -> slogan del barco
$barco__dispoID = get_post_meta($barcoID, $prefix . 'ship_dispo_ID', true); // Texto -> ID del sistema DISPO Kleintours
$barco__bookNowURL = get_post_meta($barcoID, $prefix . 'ship_bookurl', true); // URL -> URL para el cotizador
$barco__virtualURL = get_post_meta($barcoID, $prefix . 'ship_section_360_link', true); // URL -> URL para la herramienta virtual
$barco__technicalINFO = get_post_meta($barcoID, $prefix . 'ship_section_tech_info', true); // HTML -> Información tecnica del barco
$barco__securityINFO = get_post_meta($barcoID, $prefix . 'ship_section_security_info', true); // HTML -> Información de seguridad del barco

/* INFORMACION COMPONENTES FISICOS DEL BARCO 
* ESTOS COMPONENTES SON UNIDADES DE INFORMACION QUE ESTAN VINCULADAS CON UN METABOX AL BARCO
* 1. AREAS SOCIALES     -> @post_type = ggsocialarea    -> $areassociales (array)
* 2. CABINAS            -> @post_type = ggcabins        -> $cabinas (array)
* 3. DECKS              -> @post_type = ggdecks         -> $decks (array)
*/

// areas sociales
$args = array(
    'post_type' => 'ggsocialarea',
    'meta_query' => array(
        array(
            'key'     => $prefix . 'social_ship_id',
            'value'   => $barcoID,
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$areassociales = get_posts($args);

// cabinas
$args = array(
    'post_type' => 'ggcabins',
    'meta_query' => array(
        array(
            'key'     => $prefix . 'cabin_ship_id',
            'value'   => $barcoID,
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$cabinas = get_posts($args);

//dekcs
$args = array(
    'post_type' => 'ggdecks',
    'meta_query' => array(
        array(
            'key'     => $prefix . 'deck_ship_id',
            'value'   => $barcoID,
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$decks = get_posts($args);

/*echo '<pre>';
print_r($areassociales);
echo '</pre>';
die();*/

?>
<section data-anchor="top" class="sections section single-ship ship-hero">
    <div class="middle-fold" style="background-image: url(<?= $barco__foldbkg ?>); background-position: center top; background-size: cover; min-height: 65vh; margin-bottom: 36px; color: white; position: relative;">
        <div class="ship-fold-mask" style="position: absolute; height: 100%; width:100%; background: #00000070; top: 0: left: 0;"></div>
        <div class="container-fluid nopadding">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <?php echo the_title('<h1 class="ship-name" style="margin-top: 30vh; ">','</h1>'); ?>
                    <?php echo !empty($barco__slogan) ? '<span class="slogan">'. $barco__slogan .'</span>' : ''; ?>
                    <span class="separator"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="the-excerpt text-justify">
                    <p style="margin-bottom: 36px;"><?php echo !empty($barco__resumen) ? $barco__resumen : ''; ?></p>
                </div>
                <?php if($barco__foldpicture){ ?>
                <div class="deckplan-placeholder">
                    <img src="<?= $barco__foldpicture ?>" class="img-responsive center-block">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section data-anchor="experience" data-index="2" class="sections section">
    <div class="pagination">
        <span class="fa fa-chevron-left prevSlide"></span>
        <span><?= _e('Enjoy the experience'); ?></span>
        <span class="fa fa-chevron-right nextSlide"></span>
    </div>
    <div class="fullpage-slide" style="overflow: hidden;">
        <img src="http://placehold.it/2000x1200?text=VideoExperience" class="img-responsive">
    </div>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Experience</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2><?= _e('Services aboard our fleet','gogalapagos') ?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h3><?= _e('Onboard service and facilities', 'gogalapagos') ?></h3>
                    <ul class="two-columns">
                        <li>Item content alternative 1</li>
                        <li>Item content alternative 2</li>
                        <li>Item content alternative 3</li>
                        <li>Item content alternative 4</li>
                        <li>Item content alternative 5</li>
                        <li>Item content alternative 6</li>
                        <li>Item content alternative 7</li>
                        <li>Item content alternative 8</li>
                        <li>Item content alternative 9</li>
                        <li>Item content alternative 10</li>
                        <li>Item content alternative 11</li>
                        <li>Item content alternative 12</li>
                        <li>Item content alternative 13</li>
                        <li>Item content alternative 14</li>
                    </ul>
                    <h3><?= _e('Cabin service and facilities', 'gogalapagos') ?></h3>
                    <ul class="two-columns">
                        <li>Item content alternative 1</li>
                        <li>Item content alternative 2</li>
                        <li>Item content alternative 3</li>
                        <li>Item content alternative 4</li>
                        <li>Item content alternative 5</li>
                        <li>Item content alternative 6</li>
                        <li>Item content alternative 7</li>
                        <li>Item content alternative 8</li>
                        <li>Item content alternative 9</li>
                        <li>Item content alternative 10</li>
                        <li>Item content alternative 11</li>
                        <li>Item content alternative 12</li>
                        <li>Item content alternative 13</li>
                        <li>Item content alternative 14</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"> </li>
                <li data-target="#carousel-example-generic" data-slide-to="1"> </li>
                <li data-target="#carousel-example-generic" data-slide-to="2"> </li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="http://placehold.it/2000x1333?text=VideoExperience1" class="img-responsive">
                </div>
                <div class="item">
                    <img src="http://placehold.it/2000x1333?text=VideoExperience2" class="img-responsive">
                </div>
                <div class="item">
                    <img src="http://placehold.it/2000x1333?text=VideoExperience3" class="img-responsive">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
</section>
<section data-anchor="socialareas" data-index="3" class="sections section socialarea">
    <div class="pagination">
        <span class="fa fa-chevron-left prevSlide"></span>
        <span><?= _e('Move through the Social Areas'); ?></span>
        <span class="fa fa-chevron-right nextSlide"></span>
    </div>
    <?php   
    /*echo '<pre>';
        print_r($areassociales);
        echo '</pre>';*/

    foreach ($areassociales as $areasocial){
        $gallery = get_post_meta($areasocial->ID, $prefix . 'social_gallery', false);
        set_query_var( 'areasocialInfo', $areasocial );
        set_query_var( 'areasocialGalery', $gallery );

        $template = get_post_meta($areasocial->ID, $prefix . 'social_template', true);
        $template == 1 ? get_template_part('templates/social-area-left-small') : get_template_part('templates/social-area-left-big');
    }

    ?>
    <!--

<div class="fullpage-slide">
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<h2 class="text-center">Open spaces are our Specialty</h2>
<span class="separator"></span>
<p class="social-area-description">The Galapagos are meant to be experienced outdoors.</p>
<ul class="two-columns">
<li>Area 1</li>
<li>Area 2</li>
<li>Area 3</li>
<li>Area 4</li>
<li>Area 5</li>
</ul>
<p class="text-right">7,244 ft2 ( 673 m2) of Outdoor Space.</p>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-7">
<div class="first-template-social-area-image right">
<img src="http://placehold.it/1024x768?text=Right-Image" class="img-responsive">
</div>
</div>
<div class="col-sm-5">
<div class="first-template-social-area-image left">
<img src="http://placehold.it/800x600?text=Left-Image" class="img-responsive">
</div>
</div>
</div>
</div>
</div>
<div class="fullpage-slide">
<div class="container-fluid">
<div class="row">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"> </li>
<li data-target="#carousel-example-generic" data-slide-to="1"> </li>
<li data-target="#carousel-example-generic" data-slide-to="2"> </li>
</ol>
<div class="carousel-inner">
<div class="item active" style="max-height: 100vh;">
<img src="http://placehold.it/2000x1333?text=More+Social+Areas" class="img-responsive" alt="First slide"/>
</div>
<div class="item" style="max-height: 100vh;">
<img src="http://placehold.it/2000x1333?text=More+Social+Areas" class="img-responsive" alt="Second slide"/>
</div>
<div class="item" style="max-height: 100vh;">
<img src="http://placehold.it/2000x1333?text=More+Social+Areas" class="img-responsive" alt="Third slide"/>
</div>
</div>
<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</div>
</div>
</div>
-->
</section>
<section data-anchor="cabins" data-index="3" class="sections section cabins">
    <div class="pagination">
        <span class="fa fa-chevron-left prevSlide"></span>
        <span><?= _e('Move through the Cabins'); ?></span>
        <span class="fa fa-chevron-right nextSlide"></span>
    </div>
    <?php 
    foreach ($cabinas as $cabina){
        set_query_var( 'cabina', $cabina );
        set_query_var( 'barco', $barco__dispoID );
        get_template_part('templates/cabins-ship');
    } 
    ?>
</section>
<section data-anchor="moreinfo" class="sections section moreinfo">
    <div class="fullpage-slide">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="element-title"><?php echo the_title(); ?> <?php _e('Technical Information');?></h2>
                <span class="separator"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <dl class="two-columns1">
                    <?php
                        $technicals = geT_post_meta($barcoID, $prefix . 'ship_section_tech_info', true);
                        $item = '';
                        foreach($technicals as $technical){
                            $item = explode(':', $technical);
                            echo '<dt>'.$item[0].':</dt>';
                            echo '<dd>'.$item[1].'</dd>';
                        }
                    ?>
                </dl>
            </div>
        </div>
    </div>
    </div>
    <div class="fullpage-slide">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="deck-plan-title element-title"><?php echo the_title(); ?> <?php _e('Deck Plan');?></h2>
                <span class="separator"></span>
            </div>
        </div>
        <?php
        // Seleccionar los decks y areas sociales de este barco
        //Obtener los decks del barco
        $args = array(
            'post_type' => 'ggdecks',
            'meta_query' => array(
                array(
                    'key'     => 'gg_deck_ship_id',
                    'value'   => $barcoID,
                    'compare' => 'LIKE',
                ),
            ),
            'posts_per_page' => -1
        );
        // Query
        $decks = get_posts($args);
/*        echo '<pre>';
        print_r($decks);
        echo '</pre>';*/
        $deckCounter = 0;
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabpanel" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4 text-center">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php 
                                    foreach($decks as $deck){
                                        if ($deckCounter == 0){
                                ?>
                                <li role="presentation" class="active">
                                    <a href="#<?= $deck->post_name ?>" aria-controls="home" role="tab" data-toggle="tab"><?= $deck->post_title ?></a>
                                </li>
                                <?php
                                        }else{
                                ?>
                                <li role="presentation">
                                    <a href="#<?= $deck->post_name ?>" aria-controls="tab" role="tab" data-toggle="tab"><?= $deck->post_title ?></a>
                                </li>
                                <?php
                                        }
                                        $deckCounter++;
                                    }
                                    $deckCounter = 0;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php 
                            foreach($decks as $deck){
                                $deckPlanimage = get_post_meta($deck->ID, $prefix . 'deck_plan_image', true);
                                if ($deckCounter == 0){
                        ?>
                        <div role="tabpanel" class="tab-pane active" id="<?= $deck->post_name ?>">
                            <img src="<?= $deckPlanimage ?>" class="img-responsive deckplan-img" alt="<?= $barcoNombre . ' - ' . $deck->post_title ?>">
                        </div>
                        <?php
                                }else{
                        ?>
                        <div role="tabpanel" class="tab-pane fade" id="<?= $deck->post_name ?>">
                            <img src="<?= $deckPlanimage ?>" class="img-responsive deckplan-img" alt="<?= $barcoNombre . ' - ' . $deck->post_title ?>">
                        </div>
                        <?php
                                }
                                $deckCounter++;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php get_footer(); ?>
