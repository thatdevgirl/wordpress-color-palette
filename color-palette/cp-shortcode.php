<?php

function cp_add_styles() {
    wp_enqueue_style('cp-styles', plugin_dir_url( __FILE__ ) . 'frontend/css/cp-styles.css');
}

function cp_primary_shortcode() {
    $primaryColors = unserialize( get_option('primaryColors') );

    cp_add_styles();

    include_once('cp-utils.php');
    include('frontend/cp-primary.php');
}

function cp_accent_shortcode() {
    $accentColors = unserialize( get_option('accentColors') );

    cp_add_styles();

    include_once('cp-utils.php');
    include('frontend/cp-accent.php');
}

add_shortcode('primarycolors', 'cp_primary_shortcode');
add_shortcode('accentcolors',  'cp_accent_shortcode');