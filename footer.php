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
        <div class="footer-info sitemap">
        <?php dynamic_sidebar( 'sidebar-footer-sitemap' ); ?>
        </div>
        <div class="footer-info legal-stuff">
        <?php dynamic_sidebar( 'sidebar-footer-legalstuff' ); ?>
				</div> <!--end footerinfo -->

		</footer><!-- #colophon -->
		</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
