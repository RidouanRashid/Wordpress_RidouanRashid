<?php get_header(); ?>

    <div id="content">
        <?php get_sidebar( 'primary' ); ?>
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
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

