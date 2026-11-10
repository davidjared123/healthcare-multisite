<?php
/**
 * Footer template for Healthcare Calendy
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hc_branch   = hc_get_branch_config();
$hc_branches = hc_get_network_branches();
$wa_link     = 'https://wa.me/' . $hc_branch['whatsapp_number'] . '?text=' . rawurlencode( 'Hola Psic. Angelica De Gennaro, escribo desde el portal de ' . $hc_branch['short_city'] . ' para consultar disponibilidad de cita.' );
?>

<footer class="hc-footer">
	<div class="hc-container">
		<div class="hc-footer-grid">
			<div class="hc-footer-col">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hc-brand" style="margin-bottom: 12px;">
					<span class="hc-brand-title">
						Angelica <span>De Gennaro</span>
						<span class="hc-brand-heart" aria-hidden="true">♥</span>
					</span>
					<span class="hc-brand-sub">Psicologa Clinica · Venezolana</span>
				</a>
				<p style="font-size: 0.88rem;">
					Espacio psicoterapeutico confidencial, calido y basado en evidencia cientifica. Atencion presencial en Barquisimeto, Cabudare y Valencia, y consulta online.
				</p>
			</div>

			<div class="hc-footer-col">
				<h4>Nuestras Sedes</h4>
				<ul class="hc-footer-links">
					<?php foreach ( $hc_branches as $b ) : ?>
						<li>
							<a href="<?php echo esc_url( $b['url'] ); ?>">
								<?php echo esc_html( $b['label'] ); ?> (<?php echo esc_html( $b['city'] ); ?>)
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="hc-footer-col">
				<h4>Navegacion</h4>
				<ul class="hc-footer-links">
					<li><a href="<?php echo esc_url( home_url( '/#agendar-cita' ) ); ?>">Calendario de Citas</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#sobre-mi' ) ); ?>">Sobre la Psicologa</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Terapia de Ansiedad y Depresion</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>">Articulos de Salud Mental</a></li>
				</ul>
			</div>

			<div class="hc-footer-col">
				<h4>Contacto Directo (<?php echo esc_html( $hc_branch['short_city'] ); ?>)</h4>
				<ul class="hc-footer-links">
					<li><a href="<?php echo esc_url( $wa_link ); ?>" target="_blank" rel="noopener">WhatsApp: <?php echo esc_html( $hc_branch['whatsapp_display'] ); ?></a></li>
					<li><a href="mailto:<?php echo esc_attr( $hc_branch['email'] ); ?>"><?php echo esc_html( $hc_branch['email'] ); ?></a></li>
					<li><span><?php echo esc_html( $hc_branch['schedule_summary'] ); ?></span></li>
				</ul>
			</div>
		</div>

		<div class="hc-footer-bottom">
			<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $hc_branch['doctor_name'] ); ?> · Sede <?php echo esc_html( $hc_branch['short_city'] ); ?>. Todos los derechos reservados.</span>
			<span>Tema WordPress Multisite: Healthcare Calendy</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
