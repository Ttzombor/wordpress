<?php

get_header();
?>
<div class="site-content clearfix">
    <div class="main-column">
        <?php
        get_template_part('template-parts/nav-content');

        query_posts(array(
            'showposts' => 10,
            'post_type' => array('page', 'post')));

        if (have_posts()) :
            while (have_posts()) : the_post();
                $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                if(get_the_title() != ucfirst($uriSegments[2])) {
                    get_template_part('template-parts/content', get_post_format());
                }
            endwhile;

        else :
            echo '<p>No content found</p>';

        endif;
        ?>
    </div>
   <?php get_sidebar();?>
</div>




<?php
get_footer();

?>
