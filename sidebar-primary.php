<aside id="sidebar-primary" class="sidebar">
    <?php if ( is_active_sidebar( 'primary' ) ) : ?>
        <?php dynamic_sidebar( 'primary' ); ?>
    <?php else : ?>
        <div class="widget">
            <h3>Sidebar</h3>
        </div>
    <?php endif; ?>
</aside>