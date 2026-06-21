<?php
define('WP_USE_THEMES', false);
require('./wp-load.php');

$args = array(
    'post_type' => array('wp_template', 'wp_template_part'),
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        echo 'ID: ' . get_the_ID() . ' | Type: ' . get_post_type() . ' | Slug: ' . get_post_field('post_name') . ' | Title: ' . get_the_title() . "\n";
    }
} else {
    echo "No customized templates or template parts found in the database.\n";
}
wp_reset_postdata();
