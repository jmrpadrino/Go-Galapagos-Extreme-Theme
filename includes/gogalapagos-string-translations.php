<?php
function gg_js_translations(){
    $translations = array(
        'total_estimated' => __('Total Estimated', 'gogalapagos'),
        'rates' => __('Rates', 'gogalapagos'),
        'per_person' => __('per person', 'gogalapagos'),
        'request_quote' => __('Request a Quote', 'gogalapagos'),
        'adults' => __('Adults', 'gogalapagos'),
        'children' => __('Children', 'gogalapagos'),
    );
    wp_localize_script( 'goga_ajax', 'translations', $translations );
}
add_action('wp_enqueue_scripts', 'gg_js_translations');
?>
