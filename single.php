<?php 
/**
 * Single Record Template
 * 
 * Template voor weergave van individuele atletiek records.
 * Toont record details in een twee-kolommen layout met SCF data.
 */
?>
<?php get_header(); ?>

<main>
<?php 
    // Check of er posts zijn en loop door ze
    if ( have_posts() ) : 
        while ( have_posts() ) : 
            the_post(); 
?>

    <div class="record-container">

        <!-- Linkerkant: Record titel, beschrijving en gegevens -->
        <div class="record-info">
            
            <!-- Header box met titel en post content -->
            <div class="record-header-box">
                <h1><?php the_title(); ?></h1>
                <div class="record-content">
                    <?php the_content(); ?>
                </div>
            </div>

            <?php
            /**
             * Retrieve Secure Custom Fields (SCF) data
             * Deze velden worden ingevuld in WordPress admin
             * get_post_meta('post_id', 'field_name', true) haalt de waarde op
             */
            $atleet = get_post_meta( get_the_ID(), 'atleet', true );     // Recordhouder naam
            $datum = get_post_meta( get_the_ID(), 'datum', true );       // Datum van record
            $evenement = get_post_meta( get_the_ID(), 'evenement', true ); // Atletische discipline
            $tijd = get_post_meta( get_the_ID(), 'tijd', true );         // Recordtijd/afstand
            $land = get_post_meta( get_the_ID(), 'land', true );         // Land van recordhouder
            $afbeelding = get_post_meta( get_the_ID(), 'afbeelding', true ); // Atleet/evenement afbeelding
            ?>

            <!-- Record details box met alle SCF gegevens -->
            <div class="record-details-box">
                <h2>Record Info</h2>
                
                <!-- Atleet veld -->
                <?php if ( $atleet ) : ?>
                    <p><strong>Atleet:</strong> <?php echo esc_html( $atleet ); ?></p>
                <?php endif; ?>

                <!-- Datum veld -->
                <?php if ( $datum ) : ?>
                    <p><strong>Datum:</strong> <?php echo esc_html( $datum ); ?></p>
                <?php endif; ?>

                <!-- Evenement/discipline veld -->
                <?php if ( $evenement ) : ?>
                    <p><strong>Evenement:</strong> <?php echo esc_html( $evenement ); ?></p>
                <?php endif; ?>

                <!-- Recordtijd/afstand veld -->
                <?php if ( $tijd ) : ?>
                    <p><strong>Tijd:</strong> <?php echo esc_html( $tijd ); ?></p>
                <?php endif; ?>

                <!-- Land veld -->
                <?php if ( $land ) : ?>
                    <p><strong>Land:</strong> <?php echo esc_html( $land ); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Rechterkant: Record afbeelding -->
        <?php if ( $afbeelding ) : ?>
            <?php
            /**
             * Verwerk de afbeelding URL
             * Check of het een attachment ID of een directe URL is
             */
            if ( is_numeric( $afbeelding ) ) {
                // Als het een ID is, get de attachment URL
                $img_url = wp_get_attachment_url( $afbeelding );
            } else {
                // Otherwis treat it as a direct URL en escape het
                $img_url = esc_url( $afbeelding );
            }
            ?>
            <div class="record-image">
                <img src="<?php echo $img_url; ?>" 
                     alt="<?php echo esc_attr( $atleet ); ?>">
            </div>
        <?php endif; ?>

    </div>

<?php 
        endwhile; 
    endif; 
?>
</main>

<?php get_footer(); ?>

<style>
    /**
     * Single Record Styling
     * 
     * CSS voor de twee-kolommen layout van record details
     */
    
    /* === Layout === */
    /**
     * Record container: CSS Grid layout
     * Twee gelijke kolommen op desktop, een kolom op mobile
     */
    .record-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        padding: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* === Header box (titel + content) === */
    /**
     * Record header box styling
     * Witte achtergrond met shadow voor titel en intro tekst
     */
    .record-header-box {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin-bottom: 25px;
    }

    .record-header-box h1 {
        font-size: 2.2em;
        margin-top: 0;
        color: #222;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .record-content {
        font-size: 1.05em;
        color: #444;
        line-height: 1.6;
    }

    /* === Record Info Details === */
    /**
     * Record details box: bevat SCF velden
     * Witte box met shadow
     */
    .record-details-box {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .record-info h2 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #333;
        font-size: 1.8em;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    .record-info p {
        margin: 12px 0;
        font-size: 16px;
        line-height: 1.6;
    }

    .record-info strong {
        color: #555;
        display: inline-block;
        width: 100px;
    }

    /* === Image box === */
    /**
     * Afbeelding container: gecentreerd in rechterkant kolom
     * Witte box met shadow
     */
    .record-image {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .record-image img {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
    }

    /* === Responsive Design === */
    /**
     * Mobile responsiviteit
     * Op screens kleiner dan 768px: één kolom layout
     */
    @media (max-width: 768px) {
        .record-container {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 15px;
        }
    }
</style>
