<?php
/**
 * All Records Page Template
 * 
 * Template Name: All Records Page
 * 
 * Deze pagina template toont alle atletiek records in een responsive grid.
 * Kan worden ingesteld via "Custom Page Templates" in WordPress page editor.
 */

get_header(); 
?>

<main class="records-page">
    <!-- Header sectie met titel -->
    <div class="records-header">
        <h1>Wereldrecords</h1>
        <p>Bekijk alle wereldrecords hieronder.</p>
    </div>

    <!-- Records grid container -->
    <div class="records-grid">
        <?php
        /**
         * WP_Query Arguments
         * 
         * Query voor alle record posts
         * post_type: atletiek en records (beide post types)
         * posts_per_page: -1 = toon alle records
         * orderby: date = sorteer op publicatiedatum
         * order: DESC = nieuwste records eerst
         */
        $args = array(
            'post_type' => array('atletiek', 'records'),  // Post types om te queryen
            'posts_per_page' => -1,                        // Toon alle posts
            'orderby' => 'date',                           // Sorteer op datum
            'order' => 'DESC'                              // Nieuwste eerst
        );
        
        // Maak de query aan
        $records = new WP_Query($args);

        // Check of er results zijn
        if ($records->have_posts()) :
            // Loop door alle records
            while ($records->have_posts()) : $records->the_post(); ?>

                <!-- Record kaart -->
                <div class="record-card">
                    <a href="<?php the_permalink(); ?>">
                        <!-- Afbeelding (if present) -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="record-thumb">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Titel -->
                        <h2><?php the_title(); ?></h2>
                        
                        <!-- Excerpt/preview tekst -->
                        <div class="record-excerpt"><?php the_excerpt(); ?></div>
                        
                        <!-- Read more link -->
                        <span class="read-more">Bekijk record →</span>
                    </a>
                </div>

            <?php 
            endwhile;
        else :
            // Bericht als geen records gevonden
            echo '<p>Geen records gevonden.</p>';
        endif;

        // Reset de post data om veilig terug te keren naar hoofdloop
        wp_reset_postdata();
        ?>
    </div>
</main>

<?php get_footer(); ?>

<style>
    /**
     * All Records Page Styling
     * 
     * CSS voor de records overzichtspagina
     * Grid layout, kaarten, hover effects
     */

    .records-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
    }

    /* Header sectie */
    .records-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .records-header h1 {
        font-size: 2.4em;
        color: #222;
        margin-bottom: 10px;
    }

    /* Grid layout: responsive colommen */
    .records-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    /* Record kaart styling */
    .record-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    /* Hover effect: kaart tilt omhoog met meer shadow */
    .record-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0,0,0,0.15);
    }

    /* Link styling in kaart */
    .record-card a {
        color: inherit;
        text-decoration: none;
        display: block;
        height: 100%;
        padding: 20px;
    }

    /* Thumbnail afbeelding */
    .record-thumb img {
        width: 100%;
        border-bottom: 2px solid #eee;
        margin-bottom: 15px;
    }

    /* Kaart titel */
    .record-card h2 {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    /* Excerpt preview */
    .record-excerpt {
        color: #555;
        font-size: 0.95em;
        margin-bottom: 10px;
    }

    /* Read more link styling */
    .read-more {
        color: #0073aa;
        font-weight: bold;
    }
</style>
