<?php 
/**
 * Index Template
 * 
 * Dit is de main template file voor de WordPress homepage.
 * Toont posts en widgets voor de atletiek wereldrecords website.
 */
?>
<?php get_header(); ?>

    <div id="content">
        <!-- Primary sidebar met widgets (Info blokken) -->
        <?php get_sidebar( 'primary' ); ?>
        
        <?php
        // Initialize anchors array (voor toekomstige anchor links)
        $anchors = array();
        
        // Check of er posts zijn
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                // Verzamel anchor data per post
            endwhile;
            
            // Reset de post loop pointer
            rewind_posts();
        ?>
        
        <!-- Toon link naar alle records pagina als er anchors zijn -->
        <?php if (count($anchors) > 0): ?>
            <ul class="record-links">
                <li><a href="/records/">Bekijk alle wereldrecords →</a></li>
            </ul>
        <?php endif; ?>
        
        <?php
            // Loop door alle posts en toon ze
            while ( have_posts() ) : the_post();
        ?>
                <!-- Post titel -->
                <h2><?php the_title(); ?></h2>
                
                <!-- Post inhoud -->
                <div><?php the_content(); ?></div>
        <?php
            endwhile;
        else :
            // Als er geen posts zijn, toon niets
        endif;
        ?>
    </div>

    <!-- Secondary sidebar (optioneel) -->
    <?php get_sidebar( 'primary' ); ?>

<?php get_footer(); ?>

