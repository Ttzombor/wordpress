<?php
get_header();
?>
<main role="main">
    <div class="container">
        <div class="row">

            <?php
            if (have_posts()):
                while(have_posts()):
                    the_post();?>
                    <h2><?php the_title()?></h2>
                    <h4>Disclaimer title</h4>

                    <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Sequitur disserendi ratio cognitioque naturae.</article>

                    <article><?php the_content() ?></article>
                <?php
                endwhile;
            else:
                echo '<p>No Posts</p>';
            endif;
            ?>
        </div>
    </div>

    <?php
    get_footer();
    ?>
</main>