<?php

get_header();


query_posts(array(
    'showposts' => 10,
    'post_type' => 'page'));
if (have_posts()) :
    while (have_posts()) : the_post();
        if (get_post_format() == false) {
        get_template_part('content', 'single');
        } else {
        get_template_part('content', get_post_format());
        }?>


    <?php endwhile;

else :
    echo '<p>No content found</p>';

endif;

get_footer();

?>

