<?php
/**
 * Single Post template for Healthcare Calendy
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$hc_branch = hc_get_branch_config();
?>

<main class="hc-section hc-section-mint">
	<div class="hc-container">
		<?php
		while ( have_posts() ) :
			the_post();
			$cats     = get_the_category();
			$cat_name = ! empty( $cats ) ? $cats[0]->name : 'Salud Mental';
			?>
			<article <?php post_class( 'hc-single-article' ); ?>>
				<div style="margin-bottom: 14px;">
					<a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>" class="hc-blog-link">← Volver al inicio y blog</a>
				</div>
				<span class="hc-badge-mint" style="display: inline-block; margin-bottom: 12px;"><?php echo esc_html( $cat_name ); ?></span>
				<h1><?php the_title(); ?></h1>
				<div class="hc-single-meta">
					<span>Escrito por <strong><?php echo esc_html( $hc_branch['doctor_name'] ); ?></strong></span>
					<span>·</span>
					<span><?php echo esc_html( get_the_date() ); ?></span>
					<span>·</span>
					<span>Sede <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
				</div>

				<div class="hc-single-content">
					<?php the_content(); ?>
				</div>

				<div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--hc-border); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
					<div>
						<strong>¿Te identificas con este tema y deseas apoyo profesional?</strong>
						<p style="margin: 4px 0 0 0; font-size: 0.88rem;">Agenda tu consulta presencial en <?php echo esc_html( $hc_branch['short_city'] ); ?> o en modalidad online.</p>
					</div>
					<a href="<?php echo esc_url( home_url( '/#agendar-cita' ) ); ?>" class="hc-btn hc-btn-coral">
						Agendar Cita Ahora →
					</a>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();
