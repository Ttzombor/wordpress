
            <article class="post <?php if ( has_post_thumbnail() ) { ?>has_thumbnail <?php } ?>">

                <!-- post-thumbnail -->
                <div class="post_thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnails'); ?></a>
                </div><!-- /post-thumbnail -->
                    <h2><?php the_title(); ?></h2>
                    <?php echo get_the_excerpt(); ?>
                    <a href="<?php the_permalink() ?>">Read more...</a>

            </article>


