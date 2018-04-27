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
            .request-video-placeholer,
            .request-form-placeholder{
                height: 100vh;
                display: flex;
                flex-direction: column;
            }
            .request-form-placeholder{
                background: #191919;
                color: white;
            }
            .video-placeholer{
                width: 100%;
                overflow: hidden;
                display: flex;
                align-content: center;
                align-items: center;
                justify-content: center;
            }
            .video-placeholer1 video{
                margin: auto;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 nopadding request-video-placeholer">
                    <div class="video-placeholer">
                        <video id="hero-video" data-keepplaying class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster.jpg" loop autoplay>
                            <source src="<?php echo get_template_directory_uri(); ?>/videos/family-walking.webm" type='video/webm' />
                            <source src="<?php echo get_template_directory_uri(); ?>/videos/family-walking.mp4" type='video/mp4' />
                            <source src="<?php echo get_template_directory_uri(); ?>/videos/family-walking.ogv" type="video/ogv" />
                        </video>
                    </div>
                </div>
                <div class="col-sm-4 request-form-placeholder">
                    <h1><?= _e('Request a Quote') ?></h1>
                    <p>Find out which option is the best for you and your family.</p>
                    <p>Please complete all the information:</p>
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
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
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
    </body>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?= get_template_directory_uri() ?>/js/moment.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/transition.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/collapse.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?= get_template_directory_uri() ?>/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                'format'                :   'YYYY MMMM DD',
                'dayViewHeaderFormat'   :   'YYYY',
                'collapse'              :   false
            });
        });
    </script>
</html>