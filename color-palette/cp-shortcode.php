<?php

function cp_primary_shortcode() {
    $primaryColors = unserialize( get_option('primaryColors') );

    wp_enqueue_style('cp-styles', plugin_dir_url( __FILE__ ) . 'frontend/css/cp-styles.css');

    require('cp-utils.php');
    include('frontend/cp-primary.php');
}

add_shortcode('primarycolors', 'cp_primary_shortcode');