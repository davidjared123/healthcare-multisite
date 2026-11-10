<?php
/**
 * Main fallback template for Healthcare Calendy
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_front_page() || is_home() ) {
	require get_template_directory() . '/front-page.php';
	return;
}

get_header();
?>

<main class="hc-section hc-section-mint">
	<div class="hc-container">
		<?php if ( have_posts() ) : ?>
			<div class="hc-blog-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'hc-blog-card' ); ?>>
						<div class="hc-blog-body">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
							<a href="<?php the_permalink(); ?>" class="hc-blog-link">Leer mas →</a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
