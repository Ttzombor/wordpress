<?php

get_header();


query_posts(array(
    'showposts' => 10,
    'post_type' => 'page'));
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

endif;

get_footer();

?>

