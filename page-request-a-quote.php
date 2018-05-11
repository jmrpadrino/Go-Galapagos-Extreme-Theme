<?php the_post(); $prefix = 'gg_'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= get_the_title() ?> | <?= bloginfo('name') ?></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/gogalapagos-elements.css">
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/bootstrap-datetimepicker.min.css">
        <style>
            .main-flex-container{
                display: flex;
            }
            .request-video-placeholer,
            .request-form-placeholder{
                display: flex;
                flex-direction: column;
            }
            .request-video-placeholer{
                display: flex;
                align-content: center;
                align-items: center;
                justify-content: center;
            }
            .request-form-placeholder{
                flex-grow: 1;
                background: #191919;
                color: white;
                padding: 0 100px;
                position: relative;
                display: flex;
                align-content: center;
                align-items: center;
                justify-content: center;
            }
            .request-form-placeholder2{
                background: rgba(25, 25, 25, 0.7);
                color: white;
                padding: 0 100px;
                position: absolute;
                top: 0;
                right: 0;
                display: flex;
                height: 100vh;
                width: 30%;
                flex-direction: column;
                align-content: center;
                align-items: center;
                justify-content: center;
            }
            .request-form-logo-img{
                width: auto;
                margin: 18px auto;

            }
            .video-placeholer{
                position: relative;
                width: 100%;
                height: 100vh;
                overflow: hidden;
                display: flex;
                align-content: center;
                align-items: center;
                justify-content: center;
            }
            .video-placeholer video{
                width: 100%;
            }
            .play-control-placeholder{
                position: absolute;
                z-index: 22;
                margin: auto;
                cursor: pointer;
                opacity: .2;
                transition: opacity linear .2s;
            }
            .play-control-placeholder:hover{
                opacity: 1;
                transition: opacity linear .2s;
            }
            .go-back-placeholder{
                position: absolute;
                z-index: 22;
                top: 36px;
                left: 36px;
                cursor: pointer;
            }
            .play-control-placeholder:hover{
                cursor: pointer;
            }            }
            .video-placeholer1 video{
                margin: auto;
            }
            @media screen and (max-width: 1400px){
                .request-form-placeholder{
                    padding: 0 36px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 nopadding main-flex-container1">
                    <div class="request-video-placeholer hidden-sm hidden-xs">
                        <div class="go-back-placeholder" onclick="window.history.back()">
                            <a href="<?= home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/request-a-quote-go-back-icon.png" alt="Go Galapagos - Play Video NOW!"></a>
                        </div>
                        <div id="video-control" class="play-control-placeholder" onclick="playVid()">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/request-a-quote-play-icon.png" alt="Go Galapagos - Play Video NOW!">
                        </div>
                        <div class="video-placeholer">
                            <video id="hero-video" class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster-dark.png" loop>
                                <source src="<?php echo get_template_directory_uri(); ?>/videos/2016-Video-Go-Galapagos.webm" type='video/webm' />
                                <source src="<?php echo get_template_directory_uri(); ?>/videos/2016-Video-Go-Galapagos.mp4" type='video/mp4' />
                                <source src="<?php echo get_template_directory_uri(); ?>/videos/family-walking.ogv" type="video/ogv" />
                            </video>
                        </div>
                    </div>
                    <div class="request-form-placeholder1 request-form-placeholder2">
                        <img class="request-form-logo-img" src="<?= get_template_directory_uri() ?>/images/go-galapagos-logo.png" alt="Go Galapagos - Logo">
                        <h1 class="text-right"><?= _e('Please fill the form') ?></h1>
                        <p class="text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni rerum laudantium, inventore, veritatis repellat, expedita in qui enim a, ex cum voluptates. Nemo non ad iure consequuntur dignissimos ut animi?</p>
                        <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail *</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone *</label>
                                <input type="phone" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <label for="exampleInputEmail1">Departure *</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adults *</label>
                                        <input type="number" class="form-control" min="0" max="9" value="2" id="exampleInputEmail1" required>
                                    </div>  
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Children *</label>
                                        <input type="number" class="form-control" min="0" max="9" value="0" id="exampleInputEmail1" required>
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Duration *</label>
                                <select name="duration" class="form-control" required>
                                    <option>Select duration</option>
                                    <option>3D / 4N</option>
                                    <option>4D / 5N</option>
                                    <option>7D / 8N</option>
                                    <option>More than 8 nights</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Accept the <a href="#">terms to continue.</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?= get_template_directory_uri() ?>/js/moment.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/transition.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/collapse.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?= get_template_directory_uri() ?>/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        //Player para el video
        var vid = document.getElementById("hero-video"); 

        function playVid() { 
            vid.play(); 
            $('#video-control').remove();
        } 

        $(function () {
            $('#datetimepicker1').datetimepicker({
                'format'                :   'YYYY MMMM',
                'dayViewHeaderFormat'   :   'YYYY',
                'collapse'              :   false
            });

        });
    </script>
</html>