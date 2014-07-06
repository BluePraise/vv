<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 */
?>
</div><!-- #main -->

	<footer id="colophon" class="site-footer purple" role="contentinfo">
		<div class="footer-info address-stuff">
      <?php dynamic_sidebar( 'sidebar-footer-address' ); ?>
    </div>


    <div class="footer-info links">
        <?php dynamic_sidebar( 'sidebar-footer-legalstuff' ); ?>
    </div> <!--end footerinfo -->

    <div class="footer-info copyright">
        <span>Alle Rechten Voorbehouden <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Email"><?php echo bloginfo();?> </a> <?php echo date('Y'); ?>.</span>
        <span>Vormgeving door Linda van Sommeren.</span>
        <span class="magalielinda">Deze site is gebouwd door <a href="http://mayconnect.org" title="Website Bouw Arnhem">Magalie Linda</a>.</span>
    </div> <!--end footerinfo -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
