<?php

get_header();
?>
    <div class="site-content clearfix">
    <div class="main-column">
<?php        if (have_posts()) :

        while (have_posts()) : the_post();
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if(get_the_title() != ucfirst($uriSegments[2])) {
        get_template_part('template-parts/content', get_post_format());
        }
        endwhile;

else :
    echo '<p>No content found</p>';

endif;

/*$recentComments = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'orderby' => 'rand'
));
if ($recentComments->have_posts()) :
    while ($recentComments->have_posts()) : $recentComments->the_post();
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if (get_the_title() != ucfirst($uriSegments[2])) {
            get_template_part('template-parts/content', get_post_format());
        }
    endwhile;
endif;
wp_reset_postdata();

*/?>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php
get_footer();
?>