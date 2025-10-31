<?php get_header(); ?>

    <div id="content">
        <?php get_sidebar( 'primary' ); ?>
        <?php
        // Collect anchor data for all posts
        $anchors = array();
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                $anchors[] = get_the_title() . ',' . 'post-' . get_the_ID();
            endwhile;
            // Reset loop
            rewind_posts();
        ?>
        <?php if (count($anchors) > 0): ?>
            <?php echo do_shortcode('[anchor_links anchors="' . esc_attr(implode(';', $anchors)) . '"]'); ?>
        <?php endif; ?>
        <?php
            while ( have_posts() ) : the_post();
                echo do_shortcode('[anchor_target id="post-' . get_the_ID() . '"]');
        ?>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
        <?php
            endwhile;
        else :
            echo '<p>Geen berichten gevonden.</p>';
        endif;
        ?>
    </div>

    <?php get_sidebar( 'primary' ); ?>

<?php get_footer(); ?>

