<?php
/**
 * Header template for Healthcare Calendy
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hc_branch   = hc_get_branch_config();
$hc_branches = hc_get_network_branches();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Multisite Branch Selector Bar -->
<div class="hc-branch-topbar">
	<div class="hc-container hc-branch-topbar-inner">
		<div class="hc-branch-current">
			<span class="hc-branch-dot"></span>
			<span>Estas viendo: <strong><?php echo esc_html( $hc_branch['branch_badge'] ); ?></strong> · WhatsApp: <?php echo esc_html( $hc_branch['whatsapp_display'] ); ?></span>
		</div>
		<div class="hc-branch-pills" aria-label="Seleccionar sucursal o ciudad">
			<?php foreach ( $hc_branches as $b ) : ?>
				<a href="<?php echo esc_url( $b['url'] ); ?>" class="hc-branch-pill <?php echo ( (int) $b['blog_id'] === (int) $hc_branch['blog_id'] ) ? 'is-active' : ''; ?>">
					<?php echo esc_html( $b['city'] ); ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- Main Sticky Header (Reference 2 Style) -->
<header class="hc-header">
	<div class="hc-container hc-header-inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hc-brand">
			<span class="hc-brand-title">
				Angelica <span>De Gennaro</span>
				<span class="hc-brand-heart" aria-hidden="true">♥</span>
			</span>
			<span class="hc-brand-sub">Psicologa Clinica · <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
		</a>

		<nav class="hc-nav" aria-label="Menu principal">
			<a href="<?php echo esc_url( home_url( '/#inicio' ) ); ?>" class="is-current">Inicio</a>
			<a href="<?php echo esc_url( home_url( '/#agendar-cita' ) ); ?>">Calendario y Citas</a>
			<a href="<?php echo esc_url( home_url( '/#sobre-mi' ) ); ?>">Sobre Mi</a>
			<a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Areas de Atencion</a>
			<a href="<?php echo esc_url( home_url( '/#proceso' ) ); ?>">Proceso</a>
			<a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>">Blog Salud Mental</a>
			<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a>
		</nav>

		<div class="hc-header-actions">
			<a href="<?php echo esc_url( home_url( '/#agendar-cita' ) ); ?>" class="hc-btn hc-btn-mint hc-btn-sm">
				Agendar Cita ↗
			</a>
		</div>
	</div>
</header>
