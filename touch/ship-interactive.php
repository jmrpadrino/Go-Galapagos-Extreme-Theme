<?php 
/*
Template Name: InteractiveTouch
*/
$prefix = 'gg_';
$barco_meta_ID = get_post_meta($post->ID, $prefix . 'touch_itinerary_ship_id', true);
$barco = get_post($barco_meta_ID);
$barco_metas = get_post_meta($barco->ID);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $barco->post_title ?> Itineraries</title>
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
                padding: 0; 
                margin: 0;
                background: rgba(0,57,86,1);
                background: -moz-linear-gradient(top, rgba(0,57,86,1) 0%, rgba(2,41,56,1) 100%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0,57,86,1)), color-stop(100%, rgba(2,41,56,1)));
                background: -webkit-linear-gradient(top, rgba(0,57,86,1) 0%, rgba(2,41,56,1) 100%);
                background: -o-linear-gradient(top, rgba(0,57,86,1) 0%, rgba(2,41,56,1) 100%);
                background: -ms-linear-gradient(top, rgba(0,57,86,1) 0%, rgba(2,41,56,1) 100%);
                background: linear-gradient(to bottom, rgba(0,57,86,1) 0%, rgba(2,41,56,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#003956', endColorstr='#022938', GradientType=0 );
                
                color: white;
                font-family: 'Roboto', sans-serif;
            }
            .container-flex{                
                height: 100vh;
                flex-direction: column;
                justify-content: space-between;
                display: -webkit-box;
                display: -moz-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: center;
                -moz-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                -webkit-box-align: center;
                -moz-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                align-items: center;
            }
            .logo-container{
                width: 100%;
                padding: 18px;
            }
            .ship-logo-container,
            .welcome-message-container,
            .loeader-container,
            .alter-message-container{
                margin: auto;
            }


            .welcome-message-container p{
                max-width: 50%;
                margin: 0 auto;
                text-align: center;
                font-size: 28px;
            }

            .loeader-container{
                height: 40px;
                display: block;
            }
            .preloader-2 {
                margin: 36px auto;
            }
            .preloader-2 .line {
                width: 1px;
                height: 40px;
                background: #fff;
                margin: 0 1px;
                display: inline-block;
                animation: opacity-2 1000ms infinite ease-in-out;
            }
            .preloader-2 .line-1 { animation-delay: 800ms; }
            .preloader-2 .line-2 { animation-delay: 600ms; }
            .preloader-2 .line-3 { animation-delay: 400ms; }
            .preloader-2 .line-4 { animation-delay: 200ms; }
            .preloader-2 .line-6 { animation-delay: 200ms; }
            .preloader-2 .line-7 { animation-delay: 400ms; }
            .preloader-2 .line-8 { animation-delay: 600ms; }
            .preloader-2 .line-9 { animation-delay: 800ms; }
            @keyframes opacity-2 { 
                0% { 
                    opacity: 1;
                    height: 40px;
                }
                50% { 
                    opacity: 0;
                    height: 20px;
                }
                100% { 
                    opacity: 1;
                    height: 40px;
                }  
            }
            /*----- RESPONSIVE ISSUES -----*/
            @media screen and (max-width: 767px){
                .ship-logo-container{
                    margin: 80px auto;
                }
                .welcome-message-container p{
                    max-width: 90%;
                    font-size: 24px; 
                    line-height: 26px;
                }
                .preloader-2 {
                    margin: auto;
                }
                .alter-message-container{
                    width: 90%;
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <?php
            $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
            );
            
            $paginas = get_posts($args);
        ?>
        <div class="container-flex">
            <div class="logo-container">
                <img src="<?= get_template_directory_uri() ?>/touch/go-galapagos-logo.png" alt="Go Galapagos - Ecuador"> 
            </div>
            <div class="ship-logo-container">
                <img src="<?= array_shift( $barco_metas[ $prefix. 'ship_logo' ] )?>" alt="Galapagos Legend"> 
            </div>
            <div class="welcome-message-container">
                <p><?= _e('Welcome to experience Galapagos, the islands that changed the world') ?></p>
            </div>
            <div class="loeader-container">
                <div class="preloader-2">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                    <span class="line line-4"></span>
                    <span class="line line-5"></span>
                    <span class="line line-6"></span>
                    <span class="line line-7"></span>
                    <span class="line line-8"></span>
                    <span class="line line-9"></span>
                </div>
            </div>
            <div class="alter-message-container">
                <p><sup>*</sup><?= _e('Schedule subject to change at any time due to park regulations and weather.') ?></p>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            $(document).ready( function(){
                console.log(window.location.href);
                setTimeout(function(){
                    window.location = '<?= get_post_permalink( $paginas[0]->ID ) ?>';
                }, 2000);
            })
        </script>
    </body>
</html>