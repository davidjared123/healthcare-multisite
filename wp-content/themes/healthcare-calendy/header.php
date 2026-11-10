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
$hc_meta_desc = sprintf(
	'Psicologa Clinica Angelica De Gennaro en %s (%s). Psicoterapia individual, de pareja, manejo de ansiedad, depresion y consulta online. Agenda tu cita en linea o por WhatsApp al %s.',
	$hc_branch['city_name'],
	$hc_branch['state_name'],
	$hc_branch['whatsapp_display']
);
if ( is_singular( 'post' ) && has_excerpt() ) {
	$hc_meta_desc = wp_strip_all_tags( get_the_excerpt() );
}
$hc_img_base  = get_template_directory_uri() . '/assets/images/';
$hc_font_url  = get_template_directory_uri() . '/assets/fonts/manrope/Manrope-VariableFont_wght.woff2';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo esc_attr( $hc_meta_desc ); ?>">
	<link rel="preload" href="<?php echo esc_url( $hc_font_url ); ?>" as="font" type="font/woff2" crossorigin>
	<?php if ( is_front_page() || is_home() ) : ?>
		<link
			rel="preload"
			as="image"
			type="image/webp"
			href="<?php echo esc_url( $hc_img_base . 'angelica-de-gennaro-480.webp' ); ?>"
			imagesrcset="<?php echo esc_url( $hc_img_base . 'angelica-de-gennaro-280.webp' ); ?> 280w, <?php echo esc_url( $hc_img_base . 'angelica-de-gennaro-480.webp' ); ?> 480w, <?php echo esc_url( $hc_img_base . 'angelica-de-gennaro-640.webp' ); ?> 640w"
			imagesizes="(max-width: 680px) 280px, 430px"
			fetchpriority="high"
		>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a href="#inicio" class="visually-hidden">Saltar al contenido principal</a>

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
