<?php 
/*
Template Name: InteractiveTouch - Activity
*/
?>
<?php

$prefix = 'gg_';

$barcoId = get_post_meta( $post->ID, $prefix . 'touch_itinerary_ship_id', true);

$args = array(
    'post_type' => 'ggitineraries',
    'meta_query' => array(
        array(
            'key'     => $prefix . 'itinerary_ship_id',
            'value'   => $barcoId,
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'post_date',
    'order' => 'ASC'
);
$itinerarios = get_posts($args);

set_query_var('itinerarios_array', $itinerarios);

$actividad = get_post($_GET['activityid']);

$metas = get_post_meta( $actividad->ID );

$disembarking_options = array(
    '0' => 'None',
    '1' => 'Dry',
    '2' => 'Wet',
    '3' => 'Dry or Wet Landing',
    '4' => 'Dry Landing',
    '5' => 'Wet Landing',
    '6' => 'Wet Landing (Difficult)',
    '7' => 'Dry Landing (Slipery Surface)',
    '8' => 'Dry Landing (On Tuff)'
);
$terrain_options = array(
    '0' => 'Sandy',
    '1' => 'Volcanic',
    '2' => 'Rocky',
    '3' => 'Hard',
    '4' => 'Water',
    '5' => 'Sandy',
    '6' => 'Flat',
    '7' => 'Sandy and Flat',
    '8' => 'Lava',
    '9' => 'Dinghy Ride',
    '10' => 'Steep',
    '11' => 'Semi Rocky',
    '12' => 'Windings',
    '13' => 'Wooded Path',
    '14' => 'Walking Path',
    '15' => 'White Sandy Beach',
    '16' => 'Red Sandy Beach',
    '17' => 'Eroded Tuff',
    '18' => 'Muddy',
    '19' => 'Slippery'
);
$difficulty_options = array(
    '0' => 'Low',
    '1' => 'High',
    '2' => 'Intermediate',
    '3' => 'Easy',
    '4' => 'Moderate',
    '5' => 'Difficult'
);
$physical_options = array(
    '0' => 'Low',
    '1' => 'High',
    '2' => 'Medium',
    '3' => 'Medium / High'
);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= esc_html($actividad->post_title); ?></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
        <style>
            @font-face{
                font-family: myraid;
                src: url(<?= get_template_directory_uri() ?>/fonts/MyriadPro-Regular.otf); 
            }
            body{
                font-family: 'Roboto', sans-serif;
            }
            /*---- MODAL WINDOW ----*/
            .modal {
                text-align: center;
                padding: 0!important;
            }

            .modal:before {
                content: '';
                display: inline-block;
                height: 100%;
                vertical-align: middle;
                margin-right: -4px;
            }

            .modal-dialog {
                display: inline-block;
                text-align: left;
                vertical-align: middle;
            }
            .modal-list{
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .modal-itinerary-item{
                text-align: center;
            }
            .modal-itinerary-item a{
                padding: 14px 17px;
                display: block;
                background: #008C96;
                border-radius: 6px;
                color: white;
                text-decoration: none;
                margin-bottom: 8px;
            }
            /*----------------------*/
            .touch-navbar{
                border-radius: 0px;
                border: none;

                background: rgba(0,140,150,1);
                background: -moz-linear-gradient(top, rgba(0,140,150,1) 0%, rgba(0,107,115,1) 100%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0,140,150,1)), color-stop(100%, rgba(0,107,115,1)));
                background: -webkit-linear-gradient(top, rgba(0,140,150,1) 0%, rgba(0,107,115,1) 100%);
                background: -o-linear-gradient(top, rgba(0,140,150,1) 0%, rgba(0,107,115,1) 100%);
                background: -ms-linear-gradient(top, rgba(0,140,150,1) 0%, rgba(0,107,115,1) 100%);
                background: linear-gradient(to bottom, rgba(0,140,150,1) 0%, rgba(0,107,115,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#008c96', endColorstr='#006b73', GradientType=0 );

            }
            .touch-navbar .glyphicon{
                color: #8acacf;
            }
            .touch-navbar .navbar-brand{
                color: white;
            }
            .touch-navbar{
                position: fixed;
                display: -webkit-box;
                display: -moz-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: space-between;
                -moz-box-pack: space-between;
                -ms-flex-pack: space-between;
                -webkit-justify-content: space-between;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                justify-content: space-between;
                align-items: center;
                padding: 25px 12px;
                width: 100%;
                top: 0;
                z-index: 1020;
            }
            .options-menu{
                position: absolute;
                top: -170px;
                list-style: none;
                right: 0;
                background: white;
                padding: 12px;
                line-height: 28px;
                border-left: 1px solid black;
                border-bottom: 1px solid black;
            }
            .options-menu.open{
                top: 70px;
            }
            .itinerary-title{
                color: white;
                display: inline-block;
                line-height: 18px;
                font-size: 18px;
            }
            .activity-main-info-containe{
                margin-top: 80px;
            }
            .activity-textcontent-container{
                padding: 20px 25px;
                text-align: center;
                font-size: 12px;
                line-height: 1.5;
            }
            .tabs-container{
                display: flex;
                align-content: center;
                justify-content: space-between;
                align-items: center;
                background: #008c96;
                box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.4);
            }
            .tabs-container a{
                display: block;
                padding: 17px 14px;
                margin: auto;
                color: white;
                text-decoration: none;
            }
            .tab-link{
                border-bottom: 2px solid transparent;
            }
            .tab-link.active{
                border-color: white;
            }
            .more-content{
                padding: 30px 25px;
                
            }
            .touch-site-information-list, .touch-site-icon-list{
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .touch-site-information-list li{
                margin-bottom: 9px;
            }
            .touch-site-icon-list{
                
            }
            .animal-placeholder{
                box-shadow: -1px 3px 12px rgba(0, 0, 0, 0.3);
                display: block;
                margin: 12px auto;
                margin-bottom: 0px;
                width: auto;
            }
            .animal-placeholder:first-child{
                margin-top: 36px;
            }
            .animal-placeholder:last-child{
                margin-bottom: 18px;
            }
            .animal-placeholder .animal-pic{
                width: 100%;
            }
            .animal-placeholder .animal-name{
                padding: 12px;
                margin-bottom: 36px;
            }
            @media screen and ( min-width: 480px ) and ( max-width: 768px ) {

            }
            @media screen and ( max-width: 480px ){
                .animal-placeholder{
                    width: 90vw;
                }
            }
        </style>
    </head>
    <body>
        <nav class="touch-navbar">
            <div onclick="window.history.back();" class="navbar-icon-placeholder"><i class="glyphicon glyphicon-arrow-left"></i></div>
            <div class="navbar-icon-placeholder text-left"><span class="itinerary-title"><?= esc_html($actividad->post_title); ?></span></div>
            <div id="alter-nav" class="navbar-icon-placeholder"><i class="glyphicon glyphicon-option-vertical"></i></div>
            <ul class="options-menu">
                <li><a href="#" data-toggle="modal" data-target="#langModal">Languaje Selector</a></li>
                <li class="divider"></li>
                <li><a href="#" data-toggle="modal" data-target="#itinerariesModal">More Itineraries</a></li>
            </ul>
        </nav>
        <?php   
            $galeria = get_post_meta( $actividad->ID , $prefix . 'visitors_site_gallery', true );
            
//            echo '<pre>';
//            print_r(array_shift($galeria));
//            echo '</pre>';
            $counter = 0;
            $fotos = array_shift($galeria);
        
        ?>
        <section class="activity-information-placeholder">
            <div class="activity-main-info-container">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    
                    <ol class="carousel-indicators">
                        <?php foreach ( $fotos as $imagen ){ ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?= $counter ?>" <?= $counter == 0 ? 'class="active"' : ''?>></li>
                        <?php $counter++; } ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $counter = 0; ?>
                        <?php foreach ( $fotos as $imagen ){ ?>
                        <div class="item <?= $counter == 0 ? 'active' : ''?>">
                            <img class="img-responsive" src="<?= wp_get_attachment_url( $imagen ) ?>" alt="<?= $actividad->post_title ?>">
                        </div>
                        <?php $counter++; } ?>
                    </div>
                    
                </div>
                <div class="activity-textcontent-container">
                    <?php echo htmlspecialchars_decode( esc_html( get_post_field('post_content', $actividad->ID ) ) )?>
                </div>
            </div>

            <div>
                
                <div class="tabs-container" role="tablist">
                    <a class="tab-link active" href="#more" aria-controls="more" role="tab" data-toggle="tab"><?= _e('More Information', 'gogalapagos') ?></a>
                    <a class="tab-link" href="#map" aria-controls="map" role="tab" data-toggle="tab"><?= _e('Map', 'gogalapagos') ?></a>
                    <a class="tab-link" href="#naturals" aria-controls="naturals" role="tab" data-toggle="tab"><?= _e('Fauna', 'gogalapagos') ?></a>
                </div>
                
                <!-- Nav tabs 
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= _e('More Information', 'gogalapagos') ?></a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?= _e('Map', 'gogalapagos') ?></a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?= _e('Flora &amp; Fauna', 'gogalapagos') ?></a></li>
                </ul>
                -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane more-content active" id="more">
                        <ul class="touch-site-information-list">
                            <?php
                            // Disembarking feature
                            $disembarking = get_post_meta($actividad->ID, $prefix . 'visitors_site_disembarking', false);
                            if (!empty($disembarking)){
                                echo '<li class="item-featured"><strong>';
                                _e('Disembarking', 'gogalapagos');
                                echo ':</strong> ';
                                foreach ($disembarking as $disembark){
                                    echo '<span class="featured-value">'.$disembarking_options[$disembark].'</span>';
                                }
                                echo '</li>';
                            }
                            // Type of terrain feature
                            $terrains = get_post_meta($actividad->ID, $prefix . 'visitors_site_terrain', false);
                            if (!empty($terrains)){
                                echo '<li><strong>';
                                _e('Type of Terrain', 'gogalapagos');
                                echo ':</strong> ';
                                foreach ($terrains as $terrain){
                                    echo '<span class="item-featured">'.$terrain_options[$terrain].'</span>';
                                }
                                echo '</li>';
                            }
                            // Difficulty feature
                            $d_levels = get_post_meta($actividad->ID, $prefix . 'visitors_site_difficulty', false);
                            if (!empty($d_levels)){
                                echo '<li><strong>';
                                _e('Difficulty Level', 'gogalapagos');
                                echo ':</strong> ';
                                foreach ($d_levels as $d_level){
                                    echo '<span class="item-featured">'.$difficulty_options[$d_level].'</span>';
                                }
                                echo '</li>';
                            }
                            // Physical feature
                            $p_levels = get_post_meta($actividad->ID, $prefix . 'visitors_site_physical', false);
                            if (!empty($p_levels)){
                                echo '<li><strong>';
                                _e('Physical Conditions Required', 'gogalapagos');
                                echo ':</strong> ';
                                foreach ($p_levels as $p_level){
                                    echo '<span class="item-featured">'.$physical_options[$p_level].'</span>';
                                }
                                echo '</li>';
                            }
                            // Duration feature
                            $duration = get_post_meta($actividad->ID, $prefix . 'visitors_site_duration', true);
                            if (!empty($duration)){
                                echo '<li><strong>';
                                _e('Duration', 'gogalapagos');
                                echo ':</strong> ';
                                echo '<span class="item-featured">'.$duration.'</span>';
                                echo '</li>';
                            }
                            // Highlights feature
                            $highlights = get_post_meta($actividad->ID, $prefix . 'visitors_site_highlights', true);
                            if (!empty($highlights)){
                                echo '<li><strong>';
                                _e('Highlights', 'gogalapagos');
                                echo ':</strong> ';
                                echo '<span class="item-featured">'.$highlights.'</span>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                        <ul class="list-inline">
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                           <li><i class="fas fa-camera"></i></li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="map">
                        <img class="img-responsive" src="http://placehold.it/768x480?text=Map" alt="<?= $actividad->post_title ?>">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="naturals">
                        <div class="container">
                            <div class="row">        
                            <?php 
                                $animals = get_post_meta($actividad->ID, $prefix . 'itinerary_animal_list', false);
                                $i_cont = 1;
                                foreach ($animals as $animal){
                                    $item = get_post($animal);
                                    echo '<div class="col-sm-6">';
                                    echo '<div class="animal-placeholder">';
                                    echo '<img class="img-responsive animal-pic" src="'.get_the_post_thumbnail_url( $item->ID , 'medium' ).'" alt="'.$item->post_title.'">';
                                    echo '<div class="animal-name"><strong>' . esc_html( $item->post_title ) . '</strong></div>';
                                    echo'</div>';
                                    echo'</div>';
                                    if ($i_cont % 2 == 0){
                                        echo '<div class="hidden-xs clearfix"></div>';
                                    }
                                    $i_cont++;
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <?= get_template_part('touch/templates/modal-idiomas')?>
        <?= get_template_part('touch/templates/modal-itinerarios')?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
        <script>
            $(document).ready( function(){
                console.log(window.location.href);
                $('.collapse').on('hide.bs.collapse', function () {
                    $(this).siblings('.panel-heading').find('.glyphicon').toggleClass('opened');
                });
                $('.collapse').on('show.bs.collapse', function () {
                    console.log($(this).offset().top);
                    $(this).siblings('.panel-heading').find('.glyphicon').toggleClass('opened');
                });
                $('#alter-nav').click( function(){
                    $('.options-menu').toggleClass('open');
                });
                $('.options-menu').click( function(){
                    $(this).toggleClass('open');
                })
                $(window).scroll( function(){
                    $('.options-menu').removeClass('open');
                });
            });
            
            $('.tab-link').click( function() {
                $('.tab-link').removeClass('active');
                $(this).addClass('active');
            })

            $(".panel").on("show.bs.collapse hide.bs.collapse", function(e) {
                if (e.type=='show'){
                    $(this).addClass('active');
                    $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').removeClass('fa-plus');
                    $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').addClass('fa-minus');
                }else{
                    $(this).removeClass('active');
                    $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').removeClass('fa-minus');
                    $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').addClass('fa-plus');
                }
            });

        </script>
    </body>
</html>