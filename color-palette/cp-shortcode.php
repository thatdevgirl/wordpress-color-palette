<?php

function cp_primary_shortcode() {
    echo '<p>hello world</p>';
}

add_shortcode('primarycolors', 'cp_primary_shortcode');