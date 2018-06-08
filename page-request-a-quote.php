<?php the_post(); $prefix = 'gg_'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= get_the_title() ?> | <?= bloginfo('name') ?></title>
        <?php wp_head() ?>
        <!-- Optional theme -->
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/bootstrap-datetimepicker.min.css">
        <style>
            body{
                overflow-x: hidden!important;
            }
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
                padding: 36px 60px;
                position: absolute;
                top: 0;
                right: 0;
                display: flex;
                height: 100vh;
                width: 40%;
                flex-direction: column;
                align-content: flex-start;
                align-items: flex-start;
                justify-content: flex-start;
                overflow: hidden;
                overflow-y: visible;
                opacity: 1;
                transition: opacity ease-in .2s;
            }
            .request-form-placeholder2.showing-video{
                opacity: 0;
                transition: opacity ease-out .2s;
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
            .go-back-placeholder, .stop-video-icon{
                position: absolute;
                z-index: 22;
                cursor: pointer;
            }
            .go-back-placeholder{
                top: 36px;
                left: 36px;
            }
            .stop-video-icon{
                bottom: 48px;
                left: 36px;
                opacity: 0;
                transition: opacity ease-out .2s;
            }
            .stop-video-icon.showing-video{
                opacity: 1;
                transition: opacity ease-in .2s;
            }
            .play-control-placeholder:hover{
                cursor: pointer;
            }            }
            .video-placeholer1 video{
                margin: auto;
            }
            .form-message-box{
                padding: 15px;
                opacity: 1;
                border-radius: 6px;
                display: none;
                color: black;
            }
            @media screen and (min-width: 1400px){
                .request-form-placeholder2{
                    padding: 0 48px;
                    width: 25%;
                    overflow: hidden;
                    align-content: center;
                    align-items: center;
                    justify-content: center;
                }
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-xs-12 nopadding main-flex-container1">
                <div class="request-video-placeholer hidden-sm hidden-xs">
                    <div class="go-back-placeholder" onclick="window.history.back()">
                        <a href="<?= home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/request-a-quote-go-back-icon.png" alt="Go Galapagos - Play Video NOW!"></a>
                    </div>
                    <div class="stop-video-icon" onclick="stopVid()">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gogalapagos-request-a-quote-stop-video-icon.png" alt="Go Galapagos - Play Video NOW!">
                    </div>
                    <div id="video-control" class="play-control-placeholder" onclick="playVid()">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/request-a-quote-play-icon.png" alt="Go Galapagos - Play Video NOW!">
                    </div>
                    <div class="video-placeholer">
                        <video id="hero-video" class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster-2.jpg" loop>
                            <source src="<?php echo get_template_directory_uri(); ?>/videos/2016-Video-Go-Galapagos.webm" type='video/webm' />
                            <source src="<?php echo get_template_directory_uri(); ?>/videos/2016-Video-Go-Galapagos.mp4" type='video/mp4' />
                            <source src="<?php echo get_template_directory_uri(); ?>/videos/family-walking.ogv" type="video/ogv" />
                        </video>
                    </div>
                </div>
                <div class="request-form-placeholder1 request-form-placeholder2">
                    <a href="<?php echo home_url(); ?>" class="request-form-logo-img">
                        <img src="<?= get_template_directory_uri() ?>/images/go-galapagos-logo.png" alt="Go Galapagos - Logo">
                    </a>
                    <h1 class="text-right"><?= _e('Please fill the form') ?></h1>
                    <!--p class="text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni rerum laudantium, inventore, veritatis repellat, expedita in qui enim a, ex cum voluptates. Nemo non ad iure consequuntur dignissimos ut animi?</p-->
                    <form id="request-a-quote-form" role="form" class="col-xs-12">
                        <input type="hidden" name="interested" value="<?= $_GET['for'] ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name *</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail *</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone </label>
                            <input name="phone" type="phone" class="form-control" id="exampleInputEmail1">
                        </div>
                        
                            <label for="exampleInputEmail1">Departure</label>
                            <input name="departure" type="date" class="form-control" id="exampleInputEmail1">
                        
                        <!--label for="exampleInputEmail1">Departure</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input name="departure" type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adults *</label>
                                    <input name="adults" type="number" class="form-control" min="0" max="9" value="2" id="exampleInputEmail1" required>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Children *</label>
                                    <input name="children" type="number" class="form-control" min="0" max="9" value="0" id="exampleInputEmail1" required>
                                    <p class="help-block" style="font-size: 12px;">Children under 12 year old.</p>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Duration</label>
                            <select name="duration" class="form-control">
                                <option value="3D / 4N">4 Days / 3 Nights</option>
                                <option value="4D / 5N">5 Days / 4 Nights</option>
                                <option value="7D / 8N">8 Days / 7 Nights</option>
                                <option value="More than 8 nights">More than 8 nights</option>
                            </select>
                            <!--p class="help-block" style="font-size: 12px;">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p-->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Something you want to share?</label>
                            <textarea rows="6" name="textmessage" class="form-control"></textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="terms" type="checkbox" required><?php _e('Accept the') ?> <a href="<?= home_url('terms-and-coditions')?>" target="_blank"><?php _e('terms and coditions') ?></a> <?php _e('to continue') ?>.
                                <br />
                                <input name="termsGDPR" type="checkbox" required><?php _e('Accept the') ?> <a href="<?= home_url('terms-and-coditions')?>" target="_blank"><?php _e('GDPR Policies') ?></a> <?php _e('to continue') ?>.
                                <br />
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Required *</label>
                        </div>
                        <p id="form-message" class="form-message-box bg-info"></p>
                        <button type="submit" class="btn btn-default">SEND</button>
                    </form>
                </div>
            </div>
        </div>
        <?php wp_footer() ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="<?= get_template_directory_uri() ?>/js/moment.min.js"></script>
        <script src="<?= get_template_directory_uri() ?>/js/transition.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="<?= get_template_directory_uri() ?>/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
            //Player para el video
            var vid = $("#hero-video"); 
            var mensajebox = $('#form-message');
            $(document).ready( function(){
                vid.bind('ended', alFinalizarVideo());
                $('#datetimepicker1').datetimepicker({
                    'format'                :   'YYYY MMMM',
                    'dayViewHeaderFormat'   :   'YYYY',
                    'collapse'              :   false
                });
                
                mensajebox.hide();

                /*----------------
                // ENVIO DE MAIL 
                ----------------*/
                $('#request-a-quote-form').submit( function(e) {
                    console.log('enviando');
                    
                    var interested = $('input[name="interested"]');
                    var name = $('input[name="name"]');
                    var email = $('input[name="email"]');
                    var phone = $('input[name="phone"]');
                    var departure = $('input[name="departure"]');
                    var adults = $('input[name="adults"]');
                    var children = $('input[name="children"]');
                    var duration = $('select[name="duration"]');
                    var textmessage = $('textarea[name="textmessage"]');
                    var terms = $('input[name="terms"]');
                    var termsGDPR = $('input[name="termsGDPR"]');
                    
                    $.ajax({
                        type        : 'POST', 
                        url         : goga_url.ajaxurl, 
                        data        : 
                        {
                            'action': 'send_mail_via_ajax',
                            'name' : name.val(),
                            'email' : email.val(),
                            'phone' : phone.val(),
                            'departure' : departure.val(),
                            'adults' : adults.val(),
                            'children' : children.val(),
                            'duration' : duration.val(),
                            'interested' : interested.val(),
                            'textmessage' : textmessage.val(),
                            'terms' : terms.val()
                        },
                        dataType: 'text',
                        beforeSend  : function(data){
                            console.log('enviando', data);
                            mensajebox.html('Sending message');
                            mensajebox.show();
                        },
                        error       : function(data){
                            console.log('error', data);
                            mensajebox.removeClass('bg-info');
                            mensajebox.addClass('bg-danger');
                            mensajebox.html('Error sending message');
                        },
                        success     : function(data){
                            console.log('good', data);
                            
                            name.val('');
                            email.val('');
                            phone.val('');
                            departure.val('');
                            adults.val('');
                            children.val('');
                            duration.val('');
                            interested.val('');
                            textmessage.val('');
                            terms.prop('checked', false);
                            termsGDPR.prop('checked', false);
                            
                            mensajebox.removeClass('bg-info');
                            mensajebox.removeClass('bg-danger');
                            mensajebox.addClass('bg-success');
                            mensajebox.html('Message sent');
                            
                            setInterval( function(){
                                mensajebox.hide();
                            }, 2000);
                            
                        }
                    });
                    e.preventDefault();
                });
                
                
            });
            function playVid() { 
                vid.get(0).play(); 
                $('#video-control').hide();
                $('.stop-video-icon').addClass('showing-video');
                $('.request-form-placeholder2').addClass('showing-video');
            }
            function stopVid() { 
                vid.get(0).pause(); 
                $('#video-control').show();
                $('.stop-video-icon').removeClass('showing-video');
                $('.request-form-placeholder2').removeClass('showing-video');
            }
            function alFinalizarVideo(e){
                console.log('hola');
    //            $('.stop-video-icon').addClass('showing-video');
    //            $('.request-form-placeholder2').addClass('showing-video');
    //            vid.load();
    //            vid.pause();
            }
        </script>
    </body>
</html>