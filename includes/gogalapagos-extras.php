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
    if (is_archive('ggfaqs') or is_tax('go_faqs') ){
        $query->set('order', 'DESC');
        $query->set('orderby', 'rand');
        $query->set('posts_per_page', 16);

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
};
add_action( 'widgets_init', 'gogalapagos_widgets_init' );

/*----- GO GALAPAGOS THEME SETTINGS -----*/
add_action( 'admin_init', 'gg_ajustes_wordpress');
// CREA LOS CAMPOS EN LA DB
function gg_ajustes_wordpress(){
    
    /*add_settings_field(
        'gg_home_carousel_slides', //id
        'Home Experience Carousel Slides', // titulo
        'gg_home_carousel_slides_input', // la funcion
        //'go-galapagos-dashboard'
        'go-galapagos-dashboard'
    );*/
    register_setting( 'go-galapagos-theme-setings', 'gg_home_carousel_slides');
    register_setting( 'go-galapagos-theme-setings', 'gg_home_carousel_slides_test');
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
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="general">...</div>
        <div role="tabpanel" class="tab-pane fade" id="home">
            <div class="row">
                <div class="col-md-4 form-inline">
                    <div class="form-group">
                        <label for="gg_home_carousel_slides">Home Experience Slides</label>
                        <input class="form-control" type="number" name="gg_home_carousel_slides" min="1" max="10" value="<?php echo get_option( 'gg_home_carousel_slides' ); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="gg_home_carousel_slides_test">Home Experience Slides test</label>
                        <input class="form-control" type="number" name="gg_home_carousel_slides_test" min="1" max="10" value="<?php echo get_option( 'gg_home_carousel_slides_test' ); ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="profile">...</div>
        <div role="tabpanel" class="tab-pane fade" id="messages">...</div>
        <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
    </div>
</div>
</form>


<?php
}
add_action('admin_enqueue_scripts','gg_add_theme_settings_style_and_scripts');
function gg_add_theme_settings_style_and_scripts($hook){
    wp_enqueue_style( 'bootstrap', URLPLUGINGOGALAPAGOS . 'css/bootstrap.css', array(), '3.3' );
    wp_enqueue_style( 'goga_admin', URLPLUGINGOGALAPAGOS . 'css/bootstrap.css', array(), '3.3' );
    wp_enqueue_script('bootstrapjs');
}
/*----------------------------------------------*/

?>