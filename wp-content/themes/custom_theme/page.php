<?php

get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article class="post page">
                <nav class="site-nav children-links clearfix">
                    <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
                    <ul>
                        <?php

                        $args = array(
                            'child_of' => get_top_ancestor_id(),
                            'title_li' => ''
                        );

                        ?>
                        <?php wp_list_pages($args); ?>
                    </ul>
                </nav>

            <?php the_post_thumbnail('banner-thumbnails') ?>

            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile;

else :
    echo '<p>No content found</p>';

endif;?>
<?php
    $recentComments = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 2,
            'orderby' => 'rand'
    ));
if ($recentComments->have_posts()) :
    while ($recentComments->have_posts()) : $recentComments->the_post();
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if(get_the_title() != ucfirst($uriSegments[2])) {
            get_template_part('template-parts/content', get_post_format());
        }
    endwhile;

else :
    echo '<p>No content found</p>';

endif;

    wp_reset_postdata();
?>
<?php
get_footer();
?>