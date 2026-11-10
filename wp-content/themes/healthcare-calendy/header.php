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
		<nav class="hc-branch-pills" aria-label="Seleccionar sucursal o ciudad">
			<?php foreach ( $hc_branches as $b ) : ?>
				<?php $is_active_top = ( (int) $b['blog_id'] === (int) $hc_branch['blog_id'] ); ?>
				<a href="<?php echo esc_url( $b['url'] ); ?>" class="hc-branch-pill <?php echo $is_active_top ? 'is-active' : ''; ?>" <?php echo $is_active_top ? 'aria-current="page"' : ''; ?>>
					<?php echo esc_html( $b['city'] ); ?>
				</a>
			<?php endforeach; ?>
		</nav>
	</div>
</div>

<!-- Main Sticky Header -->
<header class="hc-header">
	<div class="hc-container hc-header-inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hc-brand">
			<span class="hc-brand-title">
				Angelica <span>De Gennaro</span>
				<span class="hc-brand-heart" aria-hidden="true">♥</span>
			</span>
			<span class="hc-brand-sub">Psicologa Clinica · <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
		</a>

		<nav id="hc-main-nav" class="hc-nav" aria-label="Menu principal">
			<a href="<?php echo esc_url( home_url( '/#inicio' ) ); ?>" class="is-current">Inicio</a>
			<a href="<?php echo esc_url( home_url( '/#agendar-cita' ) ); ?>">Citas</a>
			<a href="<?php echo esc_url( home_url( '/#sobre-mi' ) ); ?>">Sobre Mi</a>
			<a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Servicios</a>
			<a href="<?php echo esc_url( home_url( '/#proceso' ) ); ?>">Proceso</a>
			<a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>">Blog</a>
			<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a>
		</nav>

		<div class="hc-header-actions">
			<a href="<?php echo esc_url( home_url( '/#agendar-cita' ) ); ?>" class="hc-btn hc-btn-mint hc-btn-sm">
				<span>Agendar Cita</span>
				<span aria-hidden="true">↗</span>
			</a>
			<button type="button" id="hc-mobile-menu-toggle" class="hc-mobile-toggle" aria-label="Abrir menu" aria-expanded="false">
				☰
			</button>
		</div>
	</div>
</header>
