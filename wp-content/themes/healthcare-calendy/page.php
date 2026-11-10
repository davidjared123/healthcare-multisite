<?php
/**
 * Page template for Healthcare Calendy
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="hc-section hc-section-mint">
	<div class="hc-container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'hc-single-article' ); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="hc-single-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();
