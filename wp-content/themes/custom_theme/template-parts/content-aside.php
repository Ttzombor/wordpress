<article class="post <?php if ( has_post_thumbnail() ) { ?>has_thumbnail <?php } ?> post-aside">

    <!-- post-thumbnail -->
    <div class="post_thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnails'); ?></a>
    </div><!-- /post-thumbnail -->
    <h2>Aside </h2>
    <?php echo get_the_content(); ?>

</article>