    <?php
get_header();
?>
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">

<?php
query_posts(array(
        'showposts' => 10,
         'post_type' => 'page'));
if (have_posts()):
    while(have_posts()):
        the_post();?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"  alt="Thumbnail [100%x225]"
                             style="height: 225px; width: 100%; display: block;"
                             src="<?php if(has_post_thumbnail()): the_post_thumbnail_url('small-thumbnails');
                                    else: bloginfo('template_directory'); ?>/images/default-image.jpg"; <?php endif?>"
                             data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text"><?php  the_title()?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php the_permalink(); ?>">View</a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    endwhile;
    else:
        echo '<p>No Posts</p>';
    endif;
wp_reset_query();
?>
                </div>
            </div>

                    <?php
get_footer();
    ?>
</main>