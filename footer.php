<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Slasse
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar('footer'); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'slasse' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'slasse' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'slasse' ), 'Slasse', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			<span class="sep"> | </span>
			<a href="<?php echo wp_login_url(); ?>" title="Login">Login</a>
			<span class="sep"> | </span>
			<p> Copyright &copy;<?php echo date('Y'); ?>: Kidisti Slasse Seattle</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
