<?php 
/*
Template Name: InteractiveTouch - Itineraries
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

$dias_de_la_semana = array(
    '0' => _x('Monday','gogalapagos'),
    '1' => _x('Tuesday','gogalapagos'),
    '2' => _x('Wednesday','gogalapagos'),
    '3' => _x('Thursday','gogalapagos'),
    '4' => _x('Friday','gogalapagos'),
    '5' => _x('Saturday','gogalapagos'),
    '6' => _x('Sunday','gogalapagos'),
    '7' => _x('Monday','gogalapagos'),
    '8' => _x('Tuesday','gogalapagos'),
    '9' => _x('Wednesday','gogalapagos'),
    '10' => _x('Thursday','gogalapagos'),
    '11' => _x('Friday','gogalapagos'),
    '12' => _x('Saturday','gogalapagos'),
    '13' => _x('Sunday','gogalapagos')
);

$metas = get_post_meta( $itinerarios[0]->ID );
//    echo '<pre>';
//    print_r( $metas );
//    echo '</pre>';
//die();
$empieza = $metas['gg_itinerary_start_day'][0];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $post->post_title;?></title>
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
            /*----------------------*/
            .touch-navbar{
                border-radius: 0px;
                border: none;

                background: rgba(1,52,77,1);
                background: -moz-linear-gradient(top, rgba(1,52,77,1) 0%, rgba(2,42,58,1) 100%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(1,52,77,1)), color-stop(100%, rgba(2,42,58,1)));
                background: -webkit-linear-gradient(top, rgba(1,52,77,1) 0%, rgba(2,42,58,1) 100%);
                background: -o-linear-gradient(top, rgba(1,52,77,1) 0%, rgba(2,42,58,1) 100%);
                background: -ms-linear-gradient(top, rgba(1,52,77,1) 0%, rgba(2,42,58,1) 100%);
                background: linear-gradient(to bottom, rgba(1,52,77,1) 0%, rgba(2,42,58,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#01344d', endColorstr='#022a3a', GradientType=0 );

            }
            .touch-navbar .glyphicon{
                color: #6B939F;
            }
            .touch-navbar .navbar-brand{
                color: white;
            }
            .glyphicon{
                transform: rotateZ(0deg);
                transition: transform .2s linear;
            }
            .glyphicon.opened{
                transform: rotateZ(180deg);
                transition: transform .2s linear;
            }
            .itinerary-information-placeholder{
                margin-top: 70px;
            }
            .panel, .panel-group.panel{
                border-radius: 0px!important;
            }
            .panel-heading{
                padding: 20px 15px;
            }
            .panel-group .panel+.panel{
                border-top: 0px;
                margin-top: 0px;
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
            .itinerary-title{
                color: white;
                display: inline-block;
                line-height: 18px;
                font-size: 18px;
            }
            .options-menu.open{
                top: 70px;
            }
            @media screen and ( max-width: 480px ){
                .touch-navbar{
                }
                .itinerary-title{
                    line-height: 14px;
                    font-size: 14px;
                }
                .item-title{
                    font-size: 12px;
                    margin: 0px;
                }
            }
        </style>
    </head>
    <body>
        <nav class="touch-navbar">
            <div class="navbar-icon-placeholder"><i class="glyphicon glyphicon-arrow-left"></i></div>
            <div class="navbar-icon-placeholder text-left"><span class="itinerary-title"><?= $itinerarios[0]->post_title ?></span></div>
            <div id="alter-nav" class="navbar-icon-placeholder"><i class="glyphicon glyphicon-option-vertical"></i></div>
            <ul class="options-menu">
                <li><a href="#" data-toggle="modal" data-target="#langModal">Languaje Selector</a></li>
                <li class="divider"></li>
                <li><a href="#" data-toggle="modal" data-target="#itinerariesModal">More Itineraries</a></li>
            </ul>
        </nav>

        <section class="itinerary-information-placeholder">
            <div class="itinerary-map-placeholder">
                <img src="<?= $metas[ $prefix . 'itinerary_route_image' ][0] ?>" class="img-responsive" alt="<?= $itinerarios[0]->post_title ?>">
            </div>
            <div class="day-by-day-placeholder">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php for ($i = 1; $i <= $metas['gg_itinerary_duration'][0]; $i++){ ?>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $i ?>" aria-expanded="<?= $i == 1 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
                                    <?= $dias_de_la_semana[$empieza + $i - 1] ?>
                                </a>
                                <a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>" aria-expanded="<?= $i == 1 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
                                    <i class="glyphicon glyphicon-chevron-down <?= $i == 1 ? 'opened' : 'closed' ?>"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-<?= $i ?>" class="panel-collapse collapse <?= $i == 1 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?= $i ?>">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3>AM</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <h4>TIME</h4>
                                    </div>
                                    <div class="col-xs-9">
                                        <h4>ACTIVITIES</h4>
                                    </div>
                                </div>
                                <?php
    $actividadesAm = get_post_meta( $itinerarios[0]->ID, $prefix . 'itinerary_am_activities_list_day_'. $i, true);
                                                                                       $activity = get_post($actividadesAm[0]);           
                                ?>
                                <div class="row">
                                    <div class="col-xs-3">
                                        07:00
                                    </div>
                                    <div class="col-xs-7">
                                        <h2 class="item-title"><?= get_the_title( $actividadesAm[0] ) ?></h2>
                                    </div>
                                    <div class="col-xs-2 text-center">
                                        <a class="text-warning" href="<?= get_permalink($post->ID) ?>/activity/<?= $activity->post_name ?>"><i class="glyphicon glyphicon-new-window"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3>PM</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <h4>TIME</h4>
                                    </div>
                                    <div class="col-xs-9">
                                        <h4>ACTIVITIES</h4>
                                    </div>
                                </div>
                                <?php
                                    $actividadesPm = get_post_meta( $itinerarios[0]->ID, $prefix . 'itinerary_pm_activities_list_day_'. $i, true);
                                    $activity = get_post($actividadesPm[0]); 
                                ?>                                
                                <div class="row">
                                    <div class="col-xs-3">
                                        13:00
                                    </div>
                                    <div class="col-xs-7">
                                        <h2 class="item-title"><?= get_the_title( $actividadesPm[0] ) ?></h2>
                                    </div>
                                    <div class="col-xs-2 text-center">
                                        <a class="text-warning" href="<?= get_permalink($post->ID) ?>/activity/<?= $activity->post_name ?>"><i class="glyphicon glyphicon-new-window"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>        
        </section>

        <!-- Modal -->
        <div class="modal fade" id="langModal" tabindex="-1" role="dialog" aria-labelledby="langModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal for languajes</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Español</li>
                            <li>English</li>
                            <li>Francois</li>
                            <li>Italiano</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="itinerariesModal" tabindex="-1" role="dialog" aria-labelledby="itinerariesModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Galapagos Legend Itineraries</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>A</li>
                            <li>B</li>
                            <li>C</li>
                            <li>D</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            $(document).ready( function(){
                //console.log(window.location.href);
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
                })
            })
        </script>
    </body>
</html>