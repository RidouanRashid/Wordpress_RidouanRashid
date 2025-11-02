<!-- Primary Sidebar -->
<aside id="sidebar-primary" class="sidebar">
    <?php 
    /**
     * Check of de primary sidebar actief is (widgets bevat)
     * is_active_sidebar() - controleer of sidebar widgets heeft
     */
    if ( is_active_sidebar( 'primary' ) ) : 
    ?>
        <!-- Render alle widgets in deze sidebar -->
        <?php dynamic_sidebar( 'primary' ); ?>
    <?php 
    else : 
    ?>
        <!-- Fallback: toon placeholder als geen widgets -->
        <div class="widget">
            <h3>Sidebar</h3>
        </div>
    <?php endif; ?>
</aside>