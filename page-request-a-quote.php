<?php 
    the_post(); 
    $prefix = 'gg_'; 
    $rutatemplate = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= get_the_title() ?> | <?= bloginfo('name') ?></title>
        <?php wp_head() ?>
        <!-- Optional theme -->
        <!--link rel="stylesheet" href="<?= $rutatemplate ?>/css/bootstrap-datetimepicker.min.css"-->
        <style>
            body{
                overflow: auto;
                overflow-x: hidden!important;
                background-position: center bottom;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-image: url(<?= $rutatemplate ?>/images/get-in-love-default-background.jpg);
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
                background: rgba(25, 25, 25, 0.4);
                color: white;
                padding: 36px;
                display: flex;
                max-width: 35%;
                min-height: 100vh;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                flex-direction: column;
                align-content: center;
                align-items: center;
                justify-content: center;
                overflow: auto;
                opacity: 1;
                transition: opacity ease-in .2s;
            }
            .request-form-logo-img{
                width: auto;
                margin: 18px auto;
            }
            .go-back-placeholder, .stop-video-icon{
                position: fixed;
                z-index: 22;
                cursor: pointer;
            }
            .go-back-placeholder{
                top: 36px;
                left: 36px;
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
                    align-content: center;
                    align-items: center;
                    justify-content: center;
                }
            }
        </style>
    </head>
    <body>
        <div class="go-back-placeholder" onclick="window.history.back()">
            <a href="<?= home_url() ?>"><img src="<?= $rutatemplate ?>/images/request-a-quote-go-back-icon.png" alt="Go Galapagos - Play Video NOW!"></a>
        </div>
        <div class="row">
            <div class="col-xs-12 nopadding main-flex-container1">
                <div class="request-form-placeholder1 request-form-placeholder2">
                    <a href="<?php echo home_url(); ?>" class="request-form-logo-img">
                        <img src="<?= $rutatemplate ?>/images/go-galapagos-logo.png" alt="Go Galapagos - Logo">
                    </a>
                    <h1 class="text-right"><?= _e('Please fill the form') ?></h1>
                    <!--p class="text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni rerum laudantium, inventore, veritatis repellat, expedita in qui enim a, ex cum voluptates. Nemo non ad iure consequuntur dignissimos ut animi?</p-->
                    <form id="request-a-quote-form" role="form" class="col-xs-12">
                        <input type="hidden" name="interested" value="<?= $_GET['for'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= _e('Full Name','gogalapagos') ?> *</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= _e('E-mail','gogalapagos') ?> *</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= _e('Phone','gogalapagos') ?></label>
                                    <input name="phone" type="phone" class="form-control" id="exampleInputEmail1">
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= _e('Departure','gogalapagos') ?></label>
                                    <input name="departure" type="date" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= _e('Adults','gogalapagos') ?> *</label>
                                    <input name="adults" type="number" class="form-control" min="0" max="9" value="2" id="exampleInputEmail1" required>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= _e('Children','gogalapagos') ?> *</label>
                                    <input name="children" type="number" class="form-control" min="0" max="9" value="0" id="exampleInputEmail1" required>
                                    <p class="help-block" style="font-size: 12px;"><?= _e('Children under 12 year old.','gogalapagos') ?></p>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?= _e('Something you want to share?','gogalapagos') ?></label>
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
                            <label><?= _e('Required','gogalapagos') ?> *</label>
                        </div>
                        <p id="form-message" class="form-message-box bg-info"></p>
                        <button type="submit" class="btn btn-default"><?= _e('SEND MY REQUEST','gogalapagos') ?></button>
                    </form>
                </div>
            </div>
        </div>
        <?php wp_footer() ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <!--script src="<?= get_template_directory_uri() ?>/js/moment.min.js"></script-->
        <!--script src="<?= get_template_directory_uri() ?>/js/transition.js"></script-->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--script src="<?= get_template_directory_uri() ?>/js/bootstrap-datetimepicker.min.js"></script-->
        <script type="text/javascript">
            //Player para el video
            var mensajebox = $('#form-message');
            $(document).ready( function(){
                                
                mensajebox.hide();

                /*----------------
                // ENVIO DE MAIL 
                ----------------*/
                $('#request-a-quote-form').submit( function(e) {
                    
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
                            mensajebox.html('Sending message');
                            mensajebox.show();
                        },
                        error       : function(data){
                            mensajebox.removeClass('bg-info');
                            mensajebox.addClass('bg-danger');
                            mensajebox.html('Error sending message');
                        },
                        success     : function(data){
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
        </script>
    </body>
</html>