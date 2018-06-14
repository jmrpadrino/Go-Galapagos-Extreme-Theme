<?php get_header(); the_post(); $prefix = 'gg_';?>
<?php 
/* METADATOS DEL BARCO 
* @barcoID  ID del barco (Wordpress)
* EL ATRIBUTO DE "TRUE" EN LOS POST META SE USA 
* CUANDO EL INPUT VA A DEVOLVER UN ARRAY,
* CASO CONTRARIO SE USA "FALSE"
*/

$the_slug = 'galapagos-legend';
$args = array(
    'name'        => $the_slug,
    'post_type'   => 'ggships',
    'post_status' => 'publish',
    'posts_per_page' => 1
);
$my_ship = get_posts($args);

$barcoID = $my_ship[0]->ID;//$post->ID; // ID del barco (wordpress)
$barcoNombre = $post->post_title; // Nombre del Barco
$barcoSlug = $post->post_name; // SHORT URL del barco
$barcoCPT = $post->post_type; // Unidad de información del barco
$barcoURL = $post->guid; // LONG URL del barco

// INFORMACION METABOXES DEL BARCO
$barco__resumen = get_the_excerpt($barcoID);
$barco__logo = get_post_meta( $barcoID, $prefix . 'ship_logo', true); // Imagen -> LOGO del barco
$barco__slogan = get_post_meta( $barcoID, $prefix . 'ship_slogan', true); // Texto -> slogan del barco
$barco__foldpicture = get_post_meta( $barcoID, $prefix . 'ship_fold_picture', true); // URL   -> slogan del barco
$barco__foldbkg = get_post_meta( $barcoID, $prefix . 'ship_fold_bkg', true); // URL   -> slogan del barco
$barco__foldbkg_lower = get_post_meta( $barcoID, $prefix . 'ship_fold_lower_bkg', true); // URL   -> slogan del barco
$barco__dispoID = get_post_meta($barcoID, $prefix . 'ship_dispo_ID', true); // Texto -> ID del sistema DISPO Kleintours
$barco__bookNowURL = get_post_meta($barcoID, $prefix . 'ship_bookurl', true); // URL -> URL para el cotizador
$barco__virtualURL = get_post_meta($barcoID, $prefix . 'ship_section_360_link', true); // URL -> URL para la herramienta virtual
$barco__technicalINFO = get_post_meta($barcoID, $prefix . 'ship_section_tech_info', true); // HTML -> Información tecnica del barco
$barco__securityINFO = get_post_meta($barcoID, $prefix . 'ship_section_security_info', true); // HTML -> Información de seguridad del barco
$technicals = get_post_meta($barcoID, $prefix . 'ship_section_tech_info', true);
$segundaLista = get_post_meta($barcoID, $prefix . 'ship_section_tech_info_second', true);
$seguridad = get_post_meta($barcoID, $prefix . 'ship_section_sec_info', true);

/* INFORMACION COMPONENTES FISICOS DEL BARCO 
* ESTOS COMPONENTES SON UNIDADES DE INFORMACION QUE ESTAN VINCULADAS CON UN METABOX AL BARCO
* 1. AREAS SOCIALES     -> @post_type = ggsocialarea    -> $areassociales (array)
* 2. CABINAS            -> @post_type = ggcabins        -> $cabinas (array)
* 3. DECKS              -> @post_type = ggdecks         -> $decks (array)
*/

// actividades
$args = array(
    'post_type' => 'ggactivity',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$actividades = get_posts($args);

// areas sociales
$args = array(
    'post_type' => 'ggsocialarea',
    'posts_per_page' => -1,
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
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key'     => $prefix . 'cabin_ship_id',
            'value'   => $barcoID,
            'compare' => 'LIKE',
        ),
    ),
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


/****** more *****/
set_query_var( 'barcoID', $barcoID );

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

?>
<section id="top-page" data-anchor="top" class="sections section single-ship ship-hero">
    <div class="middle-fold" style="background-image: url(<?= $barco__foldbkg ?>);">
        <div class="ship-fold-mask" style="position: absolute; height: 100%; width:100%; background: #00000070; top: 0: left: 0;"></div>
        <div class="container-fluid nopadding">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <?php echo the_title('<h1 class="ship-name" style="margin-top: 30vh; ">','</h1>'); ?>
                    <?php echo !empty($barco__slogan) ? '<span class="slogan">'. $barco__slogan .'</span>' : ''; ?>
                    <span class="separator"></span>
                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-fold" style="background-image: url(<?= $barco__foldbkg_lower ?> ); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="the-excerpt text-justify">
                        <p class="fold-text"><?php echo !empty($barco__resumen) ? esc_html($barco__resumen) : ''; ?></p>
                    </div>
                    <?php if($barco__foldpicture){ ?>
                    <div class="deckplan-placeholder">
                        <img src="<?= $barco__foldpicture ?>" class="img-responsive center-block">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="experience-section" data-anchor="experience" data-index="2" class="sections section">
    <div class="experience-video-placeholder" style="overflow: hidden;">
        <div class="video-placeholer">
            <video id="hero-video" data-keepplaying class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster-2.jpg">
                <source src="<?php echo get_template_directory_uri(); ?>/videos/dia-a-bordo-Legend-borr-03.mp4" type='video/mp4' />
                <source src="<?php echo get_template_directory_uri(); ?>/videos/dia-a-bordo-Legend-borr-03.webm" type='video/webm' />
                <source src="<?php echo get_template_directory_uri(); ?>/videos/dia-a-bordo-Legend-borr-03.ogv" type="video/ogv" />
            </video>
        </div>
    </div>
</section>
<section id="activities-section" data-anchor="activities" data-index="3" class="sections section activities">
    <div class="nextSlide hidden-xs">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide hidden-xs">
        <span class="fa fa-chevron-left"></span>
    </div>
    <?php   
    //$socialAreaCounter = 0;
    foreach ($actividades as $actividad){
        $gallery = get_post_meta($actividad->ID, $prefix . 'activity_gallery', false);
        $mostrar = get_post_meta($actividad->ID, $prefix . 'activity_ship_id', false);
        if (in_array($barcoID, $mostrar)) {
            set_query_var( 'activityInfo', $actividad );
            set_query_var( 'activityGalery', $gallery );        
            //if ($socialAreaCounter < 5){

            $template = get_post_meta($actividad->ID, $prefix . 'social_template', true);
            $template == 1 ? get_template_part('templates/activity-left-small') : get_template_part('templates/activity-left-big');
            /*}else{
                 get_template_part('templates/social-area-fullscreen');
            }
            $socialAreaCounter++;*/   
        }
    }
    ?>
</section>
<section id="socialareas-section" data-anchor="socialareas" data-index="3" class="sections section socialarea">
    <div class="nextSlide hidden-xs">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide hidden-xs">
        <span class="fa fa-chevron-left"></span>
    </div>
    <?php   
    //$socialAreaCounter = 0;
    foreach ($areassociales as $areasocial){
        $gallery = get_post_meta($areasocial->ID, $prefix . 'social_gallery', false);
        set_query_var( 'areasocialInfo', $areasocial );
        set_query_var( 'areasocialGalery', $gallery );        
        //if ($socialAreaCounter < 5){
        $template = get_post_meta($areasocial->ID, $prefix . 'social_template', true);
        $template == 1 ? get_template_part('templates/social-area-left-small') : get_template_part('templates/social-area-left-big');
        /*}else{
             get_template_part('templates/social-area-fullscreen');
        }
        $socialAreaCounter++;*/
    }
    ?>
</section>
<section id="cabins-section" data-anchor="cabins" data-index="3" class="sections section cabins">
    <div class="nextSlide hidden-xs">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide hidden-xs">
        <span class="fa fa-chevron-left"></span>
    </div>
    <?php 
    foreach ($cabinas as $cabina){
        set_query_var( 'barco', $barco__dispoID );
        set_query_var( 'cabina', $cabina );
        get_template_part('templates/cabins-ship');
    } 
    ?>
</section>
<section id="itineraries-section" data-anchor="itineraries" class="section sections">
    <?php    
    get_template_part('templates/template-itineraries-inside-ships');
    ?>
</section>
<section id="moreinfo-section" data-anchor="moreinfo" class="sections section moreinfo">
    <div class="nextSlide hidden-xs">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide hidden-xs">
        <span class="fa fa-chevron-left"></span>
    </div>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="deck-plan-title element-title"><?php echo the_title(); ?> <?php _e('Deck Plan');?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    <div class="tabpanel" role="tabpanel">
                        <div class="row">

                            <div class="col-sm-6 col-sm-offset-4 text-center">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php 
                                    foreach($decks as $deck){
                                        if ($deckCounter == 0){
                                    ?>
                                    <li role="presentation">
                                        <a class="itineraries-firts-tab" href="#<?= $deck->post_name ?>" aria-controls="home" role="tab" data-toggle="tab"><?= get_post_meta($deck->ID, $prefix . 'deck_frontend_name', true); ?></a>
                                    </li>
                                    <?php
                                        }else{
                                    ?>
                                    <li role="presentation">
                                        <a href="#<?= $deck->post_name ?>" aria-controls="tab" role="tab" data-toggle="tab"><?= get_post_meta($deck->ID, $prefix . 'deck_frontend_name', true); ?></a>
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
                            <div role="tabpanel" class="tab-content tab-pane fade" id="<?= $deck->post_name ?>">
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
    <div class="fullpage-slide">
        <div class="container">
            <?php
            
            if(!($segundaLista)){
            ?>
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
            <?php }else{ ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2 class="element-title"><?= get_post_meta($barcoID, $prefix . 'ship_section_tech_info_title', true) ?> <?php _e('Technical Information');?></h2>
                            <span class="separator"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <dl class="two-columns1">
                                <?php
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
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2 class="element-title"><?= get_post_meta($barcoID, $prefix . 'ship_section_tech_info_title_second', true) ?> <?php _e('Technical Information');?></h2>
                            <span class="separator"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <dl class="two-columns1">
                                <?php
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
            <?php } ?>
        </div>
    </div>
    <?php
    if(($seguridad)){
    ?>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="element-title"><?php echo the_title(); ?> <?php _e('Security Information');?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <p><?= $seguridad ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
<?php get_footer(); ?>
