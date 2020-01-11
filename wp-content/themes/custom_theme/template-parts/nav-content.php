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