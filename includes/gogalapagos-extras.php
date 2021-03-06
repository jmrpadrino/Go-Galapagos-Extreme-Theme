<?php 
/**
* FUNCION PARA AGREGAR TODOS LOS CPT'S EN EL QUERY DE LA BUSQUEDA
*/
function gg_set_all_cpts( $query ) {
    if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){
        if(isset($_GET['blog'])){
            $query->set('post_type', array('post'));
        }else{
            $query->set('post_type', 
                        array(
                            'post', 
                            'page', 
                            'gganimal', 
                            'ggisland',
                            'ggactivity',
                            'ggships',
                            'ggpackage',
                            'ggtour')
                       );
        }

    }
    if (!is_admin()){
        if (is_archive('ggfaqs') or is_tax('go_faqs') ){
            $query->set('order', 'DESC');
            $query->set('orderby', 'rand');
            $query->set('posts_per_page', 16);

        }
    }
    return $query;
};

add_filter('pre_get_posts', 'gg_set_all_cpts');

/* SHORTCODES 
* 1. Para generar seccion fullpage
*/
add_shortcode('generar_seccion_fullpage', 'generador_de_seccion_fullpage');

function generador_de_seccion_fullpage($args, $content=null){
    $atts = shortcode_atts( array(
        'extraclasses' => 'algo',
    ), $args);
    ob_start();
?>
<section class="sections section <?php echo $atts['extraclasses']; ?>"><?php echo do_shortcode( $content ); ?></section>
<?php 
    return ob_get_clean();
}

function draw_stars($stars){
    $rate = '';
    if($stars < 5){
        $faltan = 5 - $stars;
        for ($i=0; $i<$stars; $i++){
            $rate .= '<span class="fa fa-star"></span> ';
        }
        for ($i=0; $i<$faltan; $i++){
            $rate .= '<span class="fa fa-star-o"></span> ';
        }
    }else{
        for($i = 0; $i < $stars; $i++){
            $rate .= '<span class="fa fa-star"></span> ';
        }
    }

    echo $rate;
}

/* QUERY VARS 
function gogalapagos_register_query_vars( $vars ) {
    $
	$vars[] = 'key1';
	$vars[] = 'key2';
	return $vars;
}
add_filter( 'query_vars', 'gogalapagos_register_query_vars' );
*/

/**
 * Register our sidebars and widgetized areas.
 *
 */
function gogalapagos_widgets_init(){
    register_sidebar( 
        array(
            'name'          => __( 'Multi Idioma', 'gogalapagos' ),
            'id'            => 'translation',
            'description'   => __( 'Uso exclusivo del qTranslate-x', 'gogalapagos' ),
            'before_widget' => '<div class="qtranxs_widget">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) 
    );
    register_sidebar( array(
        'name'          => __( 'Suscribe', 'gogalapagos' ),
        'id'            => 'suscribe',
        'description'   => __( 'Uso exclusivo de Constant Contact', 'gogalapagos' ),
        'before_widget' => '<div class="cc_widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Contact Section', 'gogalapagos' ),
        'id'            => 'gogalapagos-contact',
        'description'   => __( 'Uso exclusivo del footer Contact', 'gogalapagos' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
};
add_action( 'widgets_init', 'gogalapagos_widgets_init' );

/*----- GO GALAPAGOS THEME SETTINGS -----*/
add_action( 'admin_init', 'gg_ajustes_wordpress');
// CREA LOS CAMPOS EN LA DB
function gg_ajustes_wordpress(){
    global $wp_post_types;

    /*add_settings_field(
        'gg_home_carousel_slides', //id
        'Home Experience Carousel Slides', // titulo
        'gg_home_carousel_slides_input', // la funcion
        //'go-galapagos-dashboard'
        'go-galapagos-dashboard'
    );*/
    register_setting( 'go-galapagos-theme-setings', 'gg_home_carousel_slides');
    register_setting( 'go-galapagos-theme-setings', 'gg_home_carousel_slides_test');
    register_setting( 'go-galapagos-theme-setings', 'gg_why_galapagos_sections');
    register_setting( 'go-galapagos-theme-setings', 'gg_rrss_facebook');
    register_setting( 'go-galapagos-theme-setings', 'gg_rrss_twitter');
    register_setting( 'go-galapagos-theme-setings', 'gg_rrss_youtube');
    register_setting( 'go-galapagos-theme-setings', 'gg_rrss_instagram');
    register_setting( 'go-galapagos-theme-setings', 'gg_rrss_google_plus');
    register_setting( 'go-galapagos-theme-setings', 'gg_404_message');
    register_setting( 'go-galapagos-theme-setings', 'goquoting-link-system');
    
    foreach ($wp_post_types as $post_type){  
        if( 
            $post_type->name != 'post'                  and 
            $post_type->name != 'page'                  and 
            $post_type->name != 'attachment'            and
            $post_type->name != 'revision'              and
            $post_type->name != 'nav_menu_item'         and
            $post_type->name != 'custom_css'            and
            $post_type->name != 'customize_changeset'   and
            $post_type->name != 'user_request'          and
            $post_type->name != 'ggships'               and
            $post_type->name != 'ggdecks'               and
            $post_type->name != 'ggcabins'              and
            $post_type->name != 'ggsocialarea'          and
            $post_type->name != 'gglocation'            and
            $post_type->name != 'ggitineraries'         and
            $post_type->name != 'ggtestimonial'         and
            $post_type->name != 'ggsalesexpert'         and
            $post_type->name != 'oembed_cache'          and
            $post_type->name != 'wp_log'
        ){
            register_setting( 'go-galapagos-theme-setings', 'gg_archive_excerpt_' . $post_type->name);
            register_setting( 'go-galapagos-theme-setings', 'gg_archive_fold_background_' . $post_type->name);
        }
    }
}

function gg_theme_dashboard(){

?>
<form method="post" action="options.php">
    <h1>Go Galapagos WordPress Theme Settings</h1>
    <?php submit_button(); ?>
    <div>
        <?php settings_fields( 'go-galapagos-theme-setings' ); ?>
        <?php do_settings_sections( 'go-galapagos-theme-setings' ); ?>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Front Page</a></li>
            <li role="presentation"><a href="#archives" aria-controls="archives" role="tab" data-toggle="tab">Archives</a></li>
            <li role="presentation"><a href="#inner-pages" aria-controls="inner-pages" role="tab" data-toggle="tab">Inner Pages</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
            <li role="presentation"><a href="#revisions" aria-controls="settings" role="tab" data-toggle="tab">Revisions</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="general">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>General Settings</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h3>GOQuoting status <span class="badge"><?= (is_plugin_active('goquoting/index.php') ? 'Activated' : 'Deactivated') ?></span></h3>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides">Link booking system</label>
                            <input class="form-control" type="checkbox" name="goquoting-link-system" <?= (get_option( 'goquoting-link-system' ) == 'on') ? 'checked' : ''; ?> <?= (is_plugin_active('goquoting/index.php') ? '' : 'disabled') ?>/>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="home">
                <div class="row">
                    <div class="col-md-4 form-inline">
                        <h2>Front Page Settings</h2>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides">Home Experience Slides</label>
                            <input class="form-control" type="number" name="gg_home_carousel_slides" min="1" max="10" value="<?php echo get_option( 'gg_home_carousel_slides' ); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="archives">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <?php 
                              global $wp_post_types;
                              $i = 0;
                              foreach ($wp_post_types as $post_type){  
                                  if( 
                                      $post_type->name != 'post'                  and 
                                      $post_type->name != 'page'                  and 
                                      $post_type->name != 'attachment'            and
                                      $post_type->name != 'revision'              and
                                      $post_type->name != 'nav_menu_item'         and
                                      $post_type->name != 'custom_css'            and
                                      $post_type->name != 'customize_changeset'   and
                                      $post_type->name != 'user_request'          and
                                      $post_type->name != 'ggships'               and
                                      $post_type->name != 'ggdecks'               and
                                      $post_type->name != 'ggcabins'              and
                                      $post_type->name != 'ggsocialarea'          and
                                      $post_type->name != 'gglocation'            and
                                      $post_type->name != 'ggitineraries'         and
                                      $post_type->name != 'ggtestimonial'         and
                                      $post_type->name != 'ggsalesexpert'         and
                                      $post_type->name != 'oembed_cache'          and
                                      $post_type->name != 'wp_log'
                                  ){
                                      //echo $post_type->name . '<br />';
                            ?>
                            <li role="presentation" <?= $i == 0 ? 'class="active"' : '' ?>><a href="#<?= $post_type->name ?>" aria-controls="<?= $post_type->name ?>" role="tab" data-toggle="tab"><?= $post_type->label ?></a></li>
                            <?php
                                  }
                                  $i++;
                              }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <?php

                              foreach ($wp_post_types as $post_type){  
                                  if( 
                                      $post_type->name != 'post'                  and 
                                      $post_type->name != 'page'                  and 
                                      $post_type->name != 'attachment'            and
                                      $post_type->name != 'revision'              and
                                      $post_type->name != 'nav_menu_item'         and
                                      $post_type->name != 'custom_css'            and
                                      $post_type->name != 'customize_changeset'   and
                                      $post_type->name != 'user_request'          and
                                      $post_type->name != 'ggships'               and
                                      $post_type->name != 'ggdecks'               and
                                      $post_type->name != 'ggcabins'              and
                                      $post_type->name != 'ggsocialarea'          and
                                      $post_type->name != 'gglocation'            and
                                      $post_type->name != 'ggitineraries'         and
                                      $post_type->name != 'ggtestimonial'         and
                                      $post_type->name != 'ggsalesexpert'         and
                                      $post_type->name != 'oembed_cache'          and
                                      $post_type->name != 'wp_log'
                                  ){
                                      //echo $post_type->name . '<br />';
                                      echo '<div role="tabpanel" class="tab-pane" id="' . $post_type->name . '">';
                                      echo '<div class="row">';
                                      echo '<div class="col-xs-12">';
                                      echo '<h3>' . $post_type->label . ' archive page Settings</h3>';
                                      echo '<textarea rows="8" class="form-control" name="gg_archive_excerpt_' . $post_type->name . '">'. get_option( 'gg_archive_excerpt_' . $post_type->name ) .'</textarea>';
                            ?>
                            <p style="margin-top: 36px;">
                                <input type="number" value="<?php echo get_option( 'gg_archive_fold_background_' . $post_type->name ); ?>" class="regular-text process_custom_images" id="process_custom_images" name="gg_archive_fold_background_<?= $post_type->name ?>" max="" min="1" step="1">
                                <button class="set_custom_images button">Set Image ID</button>
                            </p>
                            <?php
                                echo '</div>';
                                      echo '</div>';
                                      echo '</div>';
                                  }
                              }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="inner-pages">
                <div class="row">
                    <div class="col-sm-3">
                        <h2>Inner Pages Setings</h2>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Why Galapagos Sections</label>
                            <input class="form-control" type="number" name="gg_why_galapagos_sections" min="1" max="10" value="<?php echo get_option( 'gg_why_galapagos_sections' ); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="messages">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>WordPress pages message</h2>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Error 404</label>
                            <textarea rows="6" class="form-control rwmb-textarea" type="url" name="gg_404_message"><?php echo get_option( 'gg_404_message' ); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Social Networks Setings</h2>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Facebook URL</label>
                            <input class="form-control" type="url" name="gg_rrss_facebook" value="<?php echo get_option( 'gg_rrss_facebook' ); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Twitter URL</label>
                            <input class="form-control" type="url" name="gg_rrss_twitter" value="<?php echo get_option( 'gg_rrss_twitter' ); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Youtube URL</label>
                            <input class="form-control" type="url" name="gg_rrss_youtube" value="<?php echo get_option( 'gg_rrss_youtube' ); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Instagram URL</label>
                            <input class="form-control" type="url" name="gg_rrss_instagram" value="<?php echo get_option( 'gg_rrss_instagram' ); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="gg_home_carousel_slides_test">Google Plus URL</label>
                            <input class="form-control" type="url" name="gg_rrss_google_plus" value="<?php echo get_option( 'gg_rrss_google_plus' ); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="revisions">
                <?php
                              global $wpdb;
                              $sql = "SELECT * FROM $wpdb->posts WHERE post_type = 'revision' ORDER BY post_date DESC";
                              $revisiones = $wpdb->get_results($sql);
                              $sql_users = "SELECT * FROM $wpdb->users";
                              $usuarios = $wpdb->get_results($sql_users);
                ?>
                <div class="row">
                    <div class="col-xs-12" style="color: white;">
                        <h2>Revisions</h2>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Post ID</strong></td>
                                    <td><strong>Post Author</strong></td>
                                    <td><strong>Post Title</strong></td>
                                    <td><strong>Last Revision</strong></td>
                                    <td><strong>Actions</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $revisiones as $revision ) { ?>
                                <tr>
                                    <td><?= $revision->post_parent ?></td>
                                    <td><?php 
                    $revision->post_author;
                                                                            foreach ($usuarios as $usuario){
                                                                                echo $usuario->ID == $revision->post_author ? $usuario->display_name : '';
                                                                            }
                                        ?></td>
                                    <td><?= esc_html($revision->post_title) ?></td>
                                    <td><?= $revision->post_date ?></td>
                                    <td>
                                        <ul class="list-inline">
                                            <li><a href="<?= get_edit_post_link($revision->ID) ?>"><i class="glyphicon glyphicon-eye-open" title="View Revisions"></i></a></li>
                                            <li><a href="<?= get_edit_post_link($revision->post_parent) ?>"><i class="glyphicon glyphicon-pencil" title="Edit post parent"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    jQuery(document).ready(function() {
        var $ = jQuery;
        if ($('.set_custom_images').length > 0) {
            if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
                $(document).on('click', '.set_custom_images', function(e) {
                    e.preventDefault();
                    var button = $(this);
                    var id = button.prev();
                    wp.media.editor.send.attachment = function(props, attachment) {
                        id.val(attachment.id);
                    };
                    wp.media.editor.open(button);
                    return false;
                });
            }
        }
    });
</script>

<?php
                             }
/*
add_action('admin_enqueue_scripts','gg_add_theme_settings_style_and_scripts');
function gg_add_theme_settings_style_and_scripts($hook){
    wp_enqueue_style( 'bootstrap', URLPLUGINGOGALAPAGOS . 'css/bootstrap.css', array(), '3.3' );
    wp_enqueue_style( 'goga_admin', URLPLUGINGOGALAPAGOS . 'css/bootstrap.css', array(), '3.3' );
    wp_enqueue_script('bootstrapjs');
}
*/
/*----------------------------------------------*/
//function disable_new_posts() {
//    // Hide sidebar link
//    global $submenu;
//    unset($submenu['edit.php?post_type=ggcabins'][10]);
//
//    // Hide link on listing page
//    if (isset($_GET['post_type']) && $_GET['post_type'] == 'ggcabins') {
//        echo '<style type="text/css">
//    #favorite-actions, .add-new-h2, .tablenav, .page-title-action { display:none; }
//    </style>';
//    }
//}
//add_action('admin_menu', 'disable_new_posts');
/* Send ajax mail */
function send_contact_mail_via_ajax(){

    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $request = filter_input(INPUT_POST, 'request');
    $textmessage = filter_input(INPUT_POST, 'textmessage');
    $terms = filter_input(INPUT_POST, 'terms');

    ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
      xmlns="http://www.w3.org/TR/REC-html40">
    <head>
        <meta http-equiv=Content-Type content="text/html; charset=unicode">
        <meta name=ProgId content=Word.Document>
        <meta name=Generator content="Microsoft Word 15">
        <meta name=Originator content="Microsoft Word 15">
        <!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
        <title>Contact Request</title>
        <!--[if gte mso 9]><xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
</o:OfficeDocumentSettings>
</xml><![endif]-->
        <style>
            .mail-title{
                margin: 36px auto;
                text-align: center;
            }
        </style>
        <meta name=viewport
              content="width=device-width, user-scalable=no,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name=format-detection content="telephone=no">
        <!--[if gte mso 9]><xml>
<o:shapedefaults v:ext="edit" spidmax="1027"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
<o:shapelayout v:ext="edit">
<o:idmap v:ext="edit" data="1"/>
</o:shapelayout></xml><![endif]-->
    </head>
    <body>        
        <table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana, Helvetica;">
                <tr style="background-color: #232323;">
                    <td align="center">
                        <h1 class="mail-title">Contact Request</h1>
                    </td>
                </tr>
                <tr>
                    <td style="color:#222222!important; padding: 30px;">
                        <h2 style="color:#003956; text-transform:uppercase; font-weight:800; margin-top: 35px;">Contact Information</h2>
                        <p><strong>Full Name:</strong> <?php echo $fname .' '. $lname ?></p>
                        <p><strong>Phone:</strong> <a href="phone:<?php echo $phone ?>"><?php echo $phone ?></a></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                        <p><strong>Request:</strong> <a href="mailto:<?php echo $request ?>"><?php echo $request ?></a></p>

                        <h2 style="color:#003956; text-transform:uppercase; font-weight:800; margin-top: 70px;">Message</h2>
                        <p><?= $textmessage; ?></p>
                    </td>
                </tr>
                <tr style="background-color: #003956; color: #ffffff; margin-top: 35px;">
                    <td align="center">
                        <p style="margin-top:35px;margin-bottom:35px; max-width: 450px;">This email was sent from Go Galapagos Website, on <?php echo date("d/m/Y") ?> <?php echo date("h:i") ?></p>
                    </td>
                </tr>
            </table>
        </table>
    </body>
</html>
<?php

        $body = ob_get_clean();

    $subject = 'User Contact';

    require_once ABSPATH . WPINC . '/class-phpmailer.php';

    $mail = new PHPMailer( true );

    $mail->AddAddress('web@kleintours.com.ec', 'Webmaster');
    //    $mail->AddAddress('websales@kleintours.com.ec', 'Web Sales');
    //    $mail->AddAddress('websales1@kleintours.com.ec', 'Web Sales 1');
    //    $mail->AddAddress('websales6@kleintours.com.ec', 'Web Sales 4');
    //    $mail->AddAddress('emilkb@yahoo.com', 'Emil Klein');
    $mail->FromName = 'Contact Go Galapagos';
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->IsHTML();
    $mail->CharSet = 'utf-8';
    $mail->Send();

    echo 'TRUE';

    die();

}
add_action('wp_ajax_send_contact_mail_via_ajax', 'send_contact_mail_via_ajax');
add_action('wp_ajax_nopriv_send_contact_mail_via_ajax', 'send_contact_mail_via_ajax');
/* Send ajax mail */
function send_mail_via_ajax(){

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $departure = filter_input(INPUT_POST, 'departure');
    $adults = filter_input(INPUT_POST, 'adults');
    $children = filter_input(INPUT_POST, 'children');
    $duration = filter_input(INPUT_POST, 'duration');    
    $interested = filter_input(INPUT_POST, 'interested');
    $textmessage = filter_input(INPUT_POST, 'textmessage');
    $terms = filter_input(INPUT_POST, 'terms');

    ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <style>
            .mail-title{
                margin: 36px auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana, Helvetica;">
                <tr style="background-color: #232323;">
                    <td align="center">
                        <h1 class="mail-title">Web Quote Request</h1>
                    </td>
                </tr>
                <tr>
                    <td style="color:#222222!important; padding: 30px;">
                        <h2 style="color:#003956; text-transform:uppercase; font-weight:800; margin-top: 35px;">Contact Information</h2>
                        <p><strong>Full Name:</strong> <?php echo $name ?></p>
                        <p><strong>Phone:</strong> <a href="phone:<?php echo $phone ?>"><?php echo $phone ?></a></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>

                        <h2 style="color:#003956; text-transform:uppercase; font-weight:800; margin-top: 70px;">Inquiry</h2>
                        <ul>
                            <li><strong>Departure date:</strong> <?php echo $departure ?></li>
                            <li><strong>Adults:</strong> <?php echo $adults ?></li>
                            <li><strong>Children:</strong> <?php echo $children ?></li>
                            <li><strong>Duration:</strong> <?php echo $duration ?></li>
                        </ul>
                        <?php if(!empty($interested)){ ?>
                        <h4 style="color:#003956; text-transform:uppercase; font-weight:800; margin-top: 70px;">The client is interested in:</h4>
                        <p><?= $interested ?></p>
                        <?php } ?>
                        <?php if(!empty($interested)){ ?>
                        <h4 style="color:#003956; text-transform:uppercase; font-weight:800; margin-top: 70px;">The client also wrote:</h4>
                        <p><?= $textmessage ?></p>
                        <?php } ?>
                    </td>
                </tr>
                <tr style="background-color: #003956; color: #ffffff; margin-top: 35px;">
                    <td align="center">
                        <p style="margin-top:35px;margin-bottom:35px; max-width: 450px;">This email was sent from Go Galapagos Website, on <?php echo date("d/m/Y") ?> <?php echo date("h:i") ?></p>
                    </td>
                </tr>
            </table>
        </table>
    </body>
</html>
<?php

        $body = ob_get_clean();

    $subject = 'Quote inquiry';

    require_once ABSPATH . WPINC . '/class-phpmailer.php';

    $mail = new PHPMailer( true );

    $mail->AddAddress('web@kleintours.com.ec', 'Webmaster');
    //    $mail->AddAddress('websales@kleintours.com.ec', 'Web Sales');
    //    $mail->AddAddress('websales1@kleintours.com.ec', 'Web Sales 1');
    //    $mail->AddAddress('websales6@kleintours.com.ec', 'Web Sales 4');
    //    $mail->AddAddress('emilkb@yahoo.com', 'Emil Klein');
    $mail->FromName = 'Web Go Galapagos';
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->IsHTML();
    $mail->CharSet = 'utf-8';
    $mail->Send();

    echo 'TRUE';

    die();

}
add_action('wp_ajax_send_mail_via_ajax', 'send_mail_via_ajax');
add_action('wp_ajax_nopriv_send_mail_via_ajax', 'send_mail_via_ajax');


?>