<!-- Footer section -->
<footer>
    <!-- Copyright notice met dynamic year -->
    <p>&copy; <?php echo date("Y"); ?> 
        <!-- Site name via WordPress -->
        <?php bloginfo('name'); ?></p>
</footer>

<!-- WordPress footer hook: voegt scripts en andere footer content toe -->
<?php wp_footer(); ?>

</body>

</html>