<?php
/**
 * Healthcare Calendy - Functions and Multisite Branch Appointment System
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HC_CALENDY_VERSION', '1.1.0' );

/**
 * Default branch configuration based on Multisite blog_id or URL path.
 *
 * Schedule rules requested by user:
 * - Cabudare (blog_id 3): Lunes en la tarde y Miercoles en la tarde.
 * - Valencia (blog_id 4): 2 veces al mes (2do y 4to Viernes/Sabado del mes, mas fechas puntuales configurables).
 * - Barquisimeto (blog_id 2): Los otros dias libres (Martes, Jueves, Viernes y Lunes/Miercoles en la manana) y Virtual.
 * - Portal Nacional / Online (blog_id 1): Lunes a Sabado (Presencial en las 3 sedes y Consulta Online).
 */
function hc_get_branch_defaults() {
	$blog_id = get_current_blog_id();
	$path    = trim( parse_url( home_url(), PHP_URL_PATH ) ?? '', '/' );

	$branches = array(
		1 => array(
			'city_name'        => 'Barquisimeto y Cabudare',
			'short_city'       => 'Portal General',
			'state_name'       => 'Estado Lara y Consulta Online',
			'branch_badge'     => 'Portal General y Consulta Online',
			'address'          => 'Consultorios en Barquisimeto y Cabudare (Edo. Lara) + Consulta Online por Videollamada',
			'schedule_summary' => 'Lunes a Viernes · Manana (9:00 a 12:00) y Tarde (2:00 PM a 6:00 PM)',
			'available_days'   => array( 1, 2, 3, 4, 5 ),
			'monthly_rule'     => 'weekly',
			'specific_dates'   => '',
			'slots'            => array(
				array(
					'time'  => '09:00 AM - 10:00 AM',
					'title' => '09:00 AM - 10:00 AM',
					'sub'   => 'Consulta de Terapia · Turno Manana',
					'icon'  => '09',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '10:00 AM - 11:00 AM',
					'title' => '10:00 AM - 11:00 AM',
					'sub'   => 'Consulta de Terapia · Turno Manana',
					'icon'  => '10',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '11:00 AM - 12:00 PM',
					'title' => '11:00 AM - 12:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Manana',
					'icon'  => '11',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '02:00 PM - 03:00 PM',
					'title' => '02:00 PM - 03:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde',
					'icon'  => '02',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '03:00 PM - 04:00 PM',
					'title' => '03:00 PM - 04:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde',
					'icon'  => '03',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '04:00 PM - 05:00 PM',
					'title' => '04:00 PM - 05:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde',
					'icon'  => '04',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '05:00 PM - 06:00 PM',
					'title' => '05:00 PM - 06:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde',
					'icon'  => '05',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
			),
		),
		2 => array(
			'city_name'        => 'Barquisimeto',
			'short_city'       => 'Barquisimeto',
			'state_name'       => 'Estado Lara',
			'branch_badge'     => 'Consultorio Barquisimeto · Edo. Lara y Virtual',
			'address'          => 'Av. Los Leones, Centro Empresarial Barquisimeto, Piso 3, Consultorio 304, Barquisimeto',
			'schedule_summary' => 'Martes, Jueves y Viernes todo el dia · Lunes y Miercoles en la manana (Presencial y Virtual)',
			'available_days'   => array( 1, 2, 3, 4, 5 ),
			'monthly_rule'     => 'weekly',
			'specific_dates'   => '',
			'slots'            => array(
				array(
					'time'  => '09:00 AM - 10:00 AM',
					'title' => '09:00 AM - 10:00 AM',
					'sub'   => 'Consulta de Terapia · Turno Manana (Barquisimeto / Virtual)',
					'icon'  => '09',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '10:00 AM - 11:00 AM',
					'title' => '10:00 AM - 11:00 AM',
					'sub'   => 'Consulta de Terapia · Turno Manana (Barquisimeto / Virtual)',
					'icon'  => '10',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '11:00 AM - 12:00 PM',
					'title' => '11:00 AM - 12:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Manana (Barquisimeto / Virtual)',
					'icon'  => '11',
					'days'  => array( 1, 2, 3, 4, 5 ),
				),
				array(
					'time'  => '02:00 PM - 03:00 PM',
					'title' => '02:00 PM - 03:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde (Barquisimeto / Virtual)',
					'icon'  => '02',
					'days'  => array( 2, 4, 5 ),
				),
				array(
					'time'  => '03:00 PM - 04:00 PM',
					'title' => '03:00 PM - 04:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde (Barquisimeto / Virtual)',
					'icon'  => '03',
					'days'  => array( 2, 4, 5 ),
				),
				array(
					'time'  => '04:00 PM - 05:00 PM',
					'title' => '04:00 PM - 05:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde (Barquisimeto / Virtual)',
					'icon'  => '04',
					'days'  => array( 2, 4, 5 ),
				),
				array(
					'time'  => '05:00 PM - 06:00 PM',
					'title' => '05:00 PM - 06:00 PM',
					'sub'   => 'Consulta de Terapia · Turno Tarde (Barquisimeto / Virtual)',
					'icon'  => '05',
					'days'  => array( 2, 4, 5 ),
				),
			),
		),
		3 => array(
			'city_name'        => 'Cabudare',
			'short_city'       => 'Cabudare',
			'state_name'       => 'Estado Lara',
			'branch_badge'     => 'Consultorio Cabudare · Edo. Lara (2:00 PM a 6:00 PM)',
			'address'          => 'Urb. Valle Hondo, Centro Profesional Agua Viva, Nivel 2, Local 12, Cabudare',
			'schedule_summary' => 'Lunes y Miercoles en la tarde · Bloques de 2:00 PM a 6:00 PM',
			'available_days'   => array( 1, 3 ),
			'monthly_rule'     => 'weekly',
			'specific_dates'   => '',
			'slots'            => array(
				array(
					'time'  => '02:00 PM - 03:00 PM',
					'title' => '02:00 PM - 03:00 PM',
					'sub'   => 'Consulta de Terapia · Sede Cabudare',
					'icon'  => '02',
					'days'  => array( 1, 3 ),
				),
				array(
					'time'  => '03:00 PM - 04:00 PM',
					'title' => '03:00 PM - 04:00 PM',
					'sub'   => 'Consulta de Terapia · Sede Cabudare',
					'icon'  => '03',
					'days'  => array( 1, 3 ),
				),
				array(
					'time'  => '04:00 PM - 05:00 PM',
					'title' => '04:00 PM - 05:00 PM',
					'sub'   => 'Consulta de Terapia · Sede Cabudare',
					'icon'  => '04',
					'days'  => array( 1, 3 ),
				),
				array(
					'time'  => '05:00 PM - 06:00 PM',
					'title' => '05:00 PM - 06:00 PM',
					'sub'   => 'Consulta de Terapia · Sede Cabudare',
					'icon'  => '05',
					'days'  => array( 1, 3 ),
				),
			),
		),
	);

	if ( isset( $branches[ $blog_id ] ) ) {
		return $branches[ $blog_id ];
	}
	if ( false !== strpos( $path, 'barquisimeto' ) ) {
		return $branches[2];
	}
	if ( false !== strpos( $path, 'cabudare' ) ) {
		return $branches[3];
	}

	return $branches[1];
}

/**
 * Return merged branch settings (saved option + Customizer + defaults).
 */
function hc_get_branch_config() {
	$defaults = hc_get_branch_defaults();
	$saved    = get_option( 'hc_branch_settings', array() );
	if ( ! is_array( $saved ) ) {
		$saved = array();
	}

	$city_name        = get_theme_mod( 'hc_city_name', $saved['city_name'] ?? $defaults['city_name'] );
	$short_city       = get_theme_mod( 'hc_short_city', $saved['short_city'] ?? $defaults['short_city'] );
	$state_name       = get_theme_mod( 'hc_state_name', $saved['state_name'] ?? $defaults['state_name'] );
	$branch_badge     = get_theme_mod( 'hc_branch_badge', $saved['branch_badge'] ?? $defaults['branch_badge'] );
	$address          = get_theme_mod( 'hc_address', $saved['address'] ?? $defaults['address'] );
	$schedule_summary = get_theme_mod( 'hc_schedule_summary', $saved['schedule_summary'] ?? $defaults['schedule_summary'] );
	$whatsapp_display = get_theme_mod( 'hc_whatsapp_display', $saved['whatsapp_display'] ?? '+58 414-3733486' );
	$whatsapp_number  = get_theme_mod( 'hc_whatsapp_number', $saved['whatsapp_number'] ?? '584143733486' );
	$doctor_name      = get_theme_mod( 'hc_doctor_name', $saved['doctor_name'] ?? 'Psic. Angelica De Gennaro' );
	$doctor_role      = get_theme_mod( 'hc_doctor_role', $saved['doctor_role'] ?? 'Psicologa Clinica · Psicoterapia Individual y de Pareja' );
	$email            = get_theme_mod( 'hc_email', $saved['email'] ?? 'citas@healthcare.eurekraftve.com' );

	$available_days = isset( $saved['available_days'] ) && is_array( $saved['available_days'] ) && ! empty( $saved['available_days'] )
		? array_map( 'intval', $saved['available_days'] )
		: $defaults['available_days'];

	$monthly_rule   = $saved['monthly_rule'] ?? $defaults['monthly_rule'];
	$specific_dates = $saved['specific_dates'] ?? $defaults['specific_dates'];

	$slots = isset( $saved['slots'] ) && is_array( $saved['slots'] ) && ! empty( $saved['slots'] )
		? $saved['slots']
		: $defaults['slots'];

	return array(
		'blog_id'          => get_current_blog_id(),
		'city_name'        => $city_name,
		'short_city'       => $short_city,
		'state_name'       => $state_name,
		'branch_badge'     => $branch_badge,
		'address'          => $address,
		'schedule_summary' => $schedule_summary,
		'whatsapp_display' => $whatsapp_display,
		'whatsapp_number'  => preg_replace( '/[^0-9]/', '', $whatsapp_number ),
		'doctor_name'      => $doctor_name,
		'doctor_role'      => $doctor_role,
		'email'            => $email,
		'available_days'   => array_values( $available_days ),
		'monthly_rule'     => $monthly_rule,
		'specific_dates'   => $specific_dates,
		'slots'            => array_values( $slots ),
		'photo_url'        => get_template_directory_uri() . '/assets/images/angelica-de-gennaro.png',
	);
}

/**
 * Get all network branches for navigation switcher.
 */
function hc_get_network_branches() {
	$base_url = network_home_url( '/' );
	return array(
		array(
			'blog_id' => 1,
			'label'   => 'Portal General y Online',
			'city'    => 'Portal General',
			'url'     => $base_url,
		),
		array(
			'blog_id' => 2,
			'label'   => 'Sede Barquisimeto',
			'city'    => 'Barquisimeto',
			'url'     => trailingslashit( $base_url . 'barquisimeto' ),
		),
		array(
			'blog_id' => 3,
			'label'   => 'Sede Cabudare',
			'city'    => 'Cabudare',
			'url'     => trailingslashit( $base_url . 'cabudare' ),
		),
	);
}

/**
 * Theme Setup.
 */
function hc_calendy_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus(
		array(
			'primary' => __( 'Menu Principal', 'healthcare-calendy' ),
		)
	);
}
add_action( 'after_setup_theme', 'hc_calendy_setup' );

/**
 * Enqueue Styles and Interactive Calendar JS.
 */
function hc_calendy_scripts() {
	wp_enqueue_style(
		'healthcare-calendy-style',
		get_stylesheet_uri(),
		array(),
		HC_CALENDY_VERSION
	);

	// Dequeue default WP core inline preset palettes and wp-emoji script so emojis never expand to giant SVGs
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'classic-theme-styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	wp_enqueue_script(
		'healthcare-calendy-booking',
		get_template_directory_uri() . '/assets/js/booking-calendar.js',
		array(),
		HC_CALENDY_VERSION,
		true
	);

	$branch = hc_get_branch_config();

	$specific_list = array();
	if ( ! empty( $branch['specific_dates'] ) ) {
		$parts = preg_split( '/[\s,]+/', $branch['specific_dates'] );
		foreach ( $parts as $p ) {
			$p = trim( $p );
			if ( preg_match( '/^\d{4}-\d{2}-\d{2}$/', $p ) ) {
				$specific_list[] = $p;
			}
		}
	}

	wp_localize_script(
		'healthcare-calendy-booking',
		'hcCalendyData',
		array(
			'ajaxUrl'         => admin_url( 'admin-ajax.php' ),
			'nonce'           => wp_create_nonce( 'hc_book_appointment_nonce' ),
			'blogId'          => $branch['blog_id'],
			'cityName'        => $branch['city_name'],
			'shortCity'       => $branch['short_city'],
			'stateName'       => $branch['state_name'],
			'address'         => $branch['address'],
			'whatsappNumber'  => $branch['whatsapp_number'],
			'whatsappDisplay' => $branch['whatsapp_display'],
			'availableDays'   => $branch['available_days'],
			'monthlyRule'     => $branch['monthly_rule'],
			'specificDates'   => $specific_list,
			'slots'           => $branch['slots'],
			'bookedMap'       => hc_get_booked_slots_map(),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'hc_calendy_scripts' );
add_action(
	'init',
	function () {
		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
		remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
		remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
);

/**
 * Register Native Custom Post Type `hc_cita` on each site so each branch
 * stores and manages its appointments independently.
 */
function hc_register_appointment_cpt() {
	register_post_type(
		'hc_cita',
		array(
			'labels'          => array(
				'name'               => 'Citas de la Sede',
				'singular_name'      => 'Cita',
				'add_new'            => 'Nueva Cita Manual',
				'add_new_item'       => 'Registrar Nueva Cita',
				'edit_item'          => 'Editar Cita del Paciente',
				'new_item'           => 'Nueva Cita',
				'view_item'          => 'Ver Cita',
				'search_items'       => 'Buscar Citas',
				'not_found'          => 'No hay citas registradas en esta sede todavia.',
				'not_found_in_trash' => 'No hay citas en la papelera.',
				'menu_name'          => 'Citas de Sede',
			),
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'menu_icon'       => 'dashicons-calendar-alt',
			'capability_type' => 'post',
			'supports'        => array( 'title' ),
		)
	);
}
add_action( 'init', 'hc_register_appointment_cpt' );

/**
 * Build map of booked slots for the current branch:
 * [ '2026-11-12' => [ '09:00 - 09:50', ... ] ]
 */
function hc_get_booked_slots_map() {
	$posts = get_posts(
		array(
			'post_type'      => 'hc_cita',
			'post_status'    => 'publish',
			'posts_per_page' => 250,
		)
	);

	$map = array();
	foreach ( $posts as $post ) {
		$date   = get_post_meta( $post->ID, '_hc_cita_date', true );
		$slot   = get_post_meta( $post->ID, '_hc_cita_slot', true );
		$status = get_post_meta( $post->ID, '_hc_cita_status', true );
		if ( 'cancelada' === strtolower( $status ) ) {
			continue;
		}
		if ( $date && $slot ) {
			if ( ! isset( $map[ $date ] ) ) {
				$map[ $date ] = array();
			}
			$map[ $date ][] = $slot;
		}
	}
	return $map;
}

/**
 * Get recent appointments for the current branch to display in the schedule table.
 */
function hc_get_recent_appointments( $limit = 5 ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		return array();
	}

	$posts = get_posts(
		array(
			'post_type'      => 'hc_cita',
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);

	$items = array();
	foreach ( $posts as $p ) {
		$items[] = array(
			'id'       => $p->ID,
			'date'     => get_post_meta( $p->ID, '_hc_cita_date', true ),
			'slot'     => get_post_meta( $p->ID, '_hc_cita_slot', true ),
			'name'     => get_post_meta( $p->ID, '_hc_cita_name', true ),
			'phone'    => get_post_meta( $p->ID, '_hc_cita_phone', true ),
			'modality' => get_post_meta( $p->ID, '_hc_cita_modality', true ) ?: 'Presencial',
			'city'     => get_post_meta( $p->ID, '_hc_cita_city', true ),
			'status'   => get_post_meta( $p->ID, '_hc_cita_status', true ) ?: 'Confirmada',
		);
	}
	return $items;
}

/**
 * AJAX Handler: Book an appointment on the current branch (`hc_cita`).
 */
function hc_ajax_book_appointment() {
	check_ajax_referer( 'hc_book_appointment_nonce', 'nonce' );

	$name     = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$phone    = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
	$email    = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$date     = sanitize_text_field( wp_unslash( $_POST['date'] ?? '' ) );
	$slot     = sanitize_text_field( wp_unslash( $_POST['slot'] ?? '' ) );
	$modality = sanitize_text_field( wp_unslash( $_POST['modality'] ?? 'Presencial' ) );
	$notes    = sanitize_textarea_field( wp_unslash( $_POST['notes'] ?? '' ) );

	if ( empty( $name ) || empty( $phone ) || empty( $date ) || empty( $slot ) ) {
		wp_send_json_error(
			array(
				'message' => 'Por favor completa tu nombre, telefono de WhatsApp, fecha y horario.',
			)
		);
	}

	$booked = hc_get_booked_slots_map();
	if ( isset( $booked[ $date ] ) && in_array( $slot, $booked[ $date ], true ) ) {
		wp_send_json_error(
			array(
				'message' => 'Ese horario ya fue reservado en esta sede. Por favor selecciona otro bloque disponible.',
			)
		);
	}

	$branch  = hc_get_branch_config();
	$post_id = wp_insert_post(
		array(
			'post_type'   => 'hc_cita',
			'post_status' => 'publish',
			'post_title'  => sprintf( '%s - %s (%s)', $name, $date, $slot ),
		)
	);

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		wp_send_json_error(
			array(
				'message' => 'No se pudo registrar la cita en este momento. Intenta nuevamente.',
			)
		);
	}

	update_post_meta( $post_id, '_hc_cita_name', $name );
	update_post_meta( $post_id, '_hc_cita_phone', $phone );
	update_post_meta( $post_id, '_hc_cita_email', $email );
	update_post_meta( $post_id, '_hc_cita_date', $date );
	update_post_meta( $post_id, '_hc_cita_slot', $slot );
	update_post_meta( $post_id, '_hc_cita_modality', $modality );
	update_post_meta( $post_id, '_hc_cita_notes', $notes );
	update_post_meta( $post_id, '_hc_cita_city', $branch['short_city'] );
	update_post_meta( $post_id, '_hc_cita_status', 'Pendiente por Confirmar' );

	$wa_text = sprintf(
		'Hola Psic. Angelica De Gennaro, acabo de agendar una cita en la sede %s para el dia %s en el horario %s (%s). Mi nombre es %s, mi telefono es %s. Motivo: %s',
		$branch['short_city'],
		$date,
		$slot,
		$modality,
		$name,
		$phone,
		$notes ? $notes : 'Consulta psicologica'
	);
	$wa_url  = 'https://wa.me/' . $branch['whatsapp_number'] . '?text=' . rawurlencode( $wa_text );

	wp_send_json_success(
		array(
			'message'       => sprintf(
				'Cita registrada con exito en %s para el %s (%s). Te contactaremos al %s para confirmar.',
				$branch['short_city'],
				$date,
				$slot,
				$phone
			),
			'appointmentId' => $post_id,
			'whatsappUrl'   => $wa_url,
			'bookedMap'     => hc_get_booked_slots_map(),
		)
	);
}
add_action( 'wp_ajax_hc_book_appointment', 'hc_ajax_book_appointment' );
add_action( 'wp_ajax_nopriv_hc_book_appointment', 'hc_ajax_book_appointment' );

/**
 * Custom Columns & Meta Box for `hc_cita` in WP-Admin.
 */
function hc_cita_admin_columns( $columns ) {
	return array(
		'cb'       => '<input type="checkbox" />',
		'title'    => 'Paciente y Cita',
		'hc_date'  => 'Fecha y Hora',
		'hc_phone' => 'WhatsApp / Telefono',
		'hc_mod'   => 'Modalidad / Sede',
		'hc_stat'  => 'Estado',
		'date'     => 'Registrada',
	);
}
add_filter( 'manage_hc_cita_posts_columns', 'hc_cita_admin_columns' );

function hc_cita_admin_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'hc_date':
			echo esc_html( get_post_meta( $post_id, '_hc_cita_date', true ) . ' · ' . get_post_meta( $post_id, '_hc_cita_slot', true ) );
			break;
		case 'hc_phone':
			$phone = get_post_meta( $post_id, '_hc_cita_phone', true );
			$clean = preg_replace( '/[^0-9]/', '', $phone );
			echo esc_html( $phone );
			if ( $clean ) {
				echo ' <a href="https://wa.me/' . esc_attr( $clean ) . '" target="_blank" rel="noopener">Escribir WhatsApp</a>';
			}
			break;
		case 'hc_mod':
			echo esc_html( get_post_meta( $post_id, '_hc_cita_modality', true ) . ' (' . get_post_meta( $post_id, '_hc_cita_city', true ) . ')' );
			break;
		case 'hc_stat':
			echo '<strong>' . esc_html( get_post_meta( $post_id, '_hc_cita_status', true ) ) . '</strong>';
			break;
	}
}
add_action( 'manage_hc_cita_posts_custom_column', 'hc_cita_admin_column_content', 10, 2 );

function hc_cita_add_meta_boxes() {
	add_meta_box(
		'hc_cita_details',
		'Datos del Paciente y de la Cita',
		'hc_cita_render_meta_box',
		'hc_cita',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'hc_cita_add_meta_boxes' );

function hc_cita_render_meta_box( $post ) {
	wp_nonce_field( 'hc_cita_save_meta', 'hc_cita_meta_nonce' );
	$fields = array(
		'_hc_cita_name'     => 'Nombre y Apellido',
		'_hc_cita_phone'    => 'Telefono / WhatsApp',
		'_hc_cita_email'    => 'Correo Electronico',
		'_hc_cita_date'     => 'Fecha (YYYY-MM-DD)',
		'_hc_cita_slot'     => 'Bloque Horario (ej. 09:00 - 09:50)',
		'_hc_cita_modality' => 'Modalidad (Presencial / Online)',
		'_hc_cita_city'     => 'Sede',
		'_hc_cita_status'   => 'Estado (Pendiente por Confirmar / Confirmada / Cancelada)',
		'_hc_cita_notes'    => 'Motivo de consulta / Notas',
	);
	echo '<table class="form-table"><tbody>';
	foreach ( $fields as $key => $label ) {
		$val = get_post_meta( $post->ID, $key, true );
		echo '<tr><th><label for="' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label></th><td>';
		if ( '_hc_cita_notes' === $key ) {
			echo '<textarea name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" rows="3" class="large-text">' . esc_textarea( $val ) . '</textarea>';
		} else {
			echo '<input type="text" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" class="regular-text" />';
		}
		echo '</td></tr>';
	}
	echo '</tbody></table>';
}

function hc_cita_save_meta_box( $post_id ) {
	if ( ! isset( $_POST['hc_cita_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['hc_cita_meta_nonce'] ) ), 'hc_cita_save_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	$keys = array(
		'_hc_cita_name',
		'_hc_cita_phone',
		'_hc_cita_email',
		'_hc_cita_date',
		'_hc_cita_slot',
		'_hc_cita_modality',
		'_hc_cita_city',
		'_hc_cita_status',
		'_hc_cita_notes',
	);
	foreach ( $keys as $k ) {
		if ( isset( $_POST[ $k ] ) ) {
			update_post_meta( $post_id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) );
		}
	}
}
add_action( 'save_post_hc_cita', 'hc_cita_save_meta_box' );

/**
 * Submenu Page under `Citas de Sede`: "Horarios y Datos de esta Sede"
 * Allows Angelica to configure which days, monthly frequency (e.g. 2 times a month for Valencia),
 * specific dates, and morning/afternoon slots she attends in each branch.
 */
function hc_register_branch_settings_page() {
	add_submenu_page(
		'edit.php?post_type=hc_cita',
		'Horarios y Datos de la Sede',
		'Horarios de la Sede',
		'manage_options',
		'hc-branch-schedule',
		'hc_render_branch_settings_page'
	);
}
add_action( 'admin_menu', 'hc_register_branch_settings_page' );

function hc_render_branch_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_POST['hc_save_branch_settings'] ) && check_admin_referer( 'hc_branch_settings_nonce' ) ) {
		$days = isset( $_POST['available_days'] ) && is_array( $_POST['available_days'] )
			? array_map( 'intval', wp_unslash( $_POST['available_days'] ) )
			: array( 1, 3, 5 );

		$raw_slots = isset( $_POST['slots'] ) && is_array( $_POST['slots'] ) ? wp_unslash( $_POST['slots'] ) : array();
		$slots     = array();
		foreach ( $raw_slots as $s ) {
			$time      = sanitize_text_field( $s['time'] ?? '' );
			$sub       = sanitize_text_field( $s['sub'] ?? 'Consulta de Terapia' );
			$slot_days = isset( $s['days'] ) && is_array( $s['days'] )
				? array_values( array_map( 'intval', $s['days'] ) )
				: $days;
			if ( $time ) {
				$slots[] = array(
					'time'  => $time,
					'title' => $time,
					'sub'   => $sub,
					'icon'  => substr( $time, 0, 2 ),
					'days'  => $slot_days,
				);
			}
		}

		$new_settings = array(
			'city_name'        => sanitize_text_field( wp_unslash( $_POST['city_name'] ?? '' ) ),
			'short_city'       => sanitize_text_field( wp_unslash( $_POST['short_city'] ?? '' ) ),
			'state_name'       => sanitize_text_field( wp_unslash( $_POST['state_name'] ?? '' ) ),
			'branch_badge'     => sanitize_text_field( wp_unslash( $_POST['branch_badge'] ?? '' ) ),
			'address'          => sanitize_text_field( wp_unslash( $_POST['address'] ?? '' ) ),
			'schedule_summary' => sanitize_text_field( wp_unslash( $_POST['schedule_summary'] ?? '' ) ),
			'whatsapp_display' => sanitize_text_field( wp_unslash( $_POST['whatsapp_display'] ?? '+58 414-3733486' ) ),
			'whatsapp_number'  => sanitize_text_field( wp_unslash( $_POST['whatsapp_number'] ?? '584143733486' ) ),
			'available_days'   => $days,
			'monthly_rule'     => sanitize_text_field( wp_unslash( $_POST['monthly_rule'] ?? 'weekly' ) ),
			'specific_dates'   => sanitize_textarea_field( wp_unslash( $_POST['specific_dates'] ?? '' ) ),
			'slots'            => $slots,
		);

		update_option( 'hc_branch_settings', $new_settings );
		echo '<div class="notice notice-success is-dismissible"><p>Horarios, frecuencia mensual y datos de la sede guardados correctamente.</p></div>';
	}

	$cfg      = hc_get_branch_config();
	$weekdays = array(
		1 => 'Lunes',
		2 => 'Martes',
		3 => 'Miercoles',
		4 => 'Jueves',
		5 => 'Viernes',
		6 => 'Sabado',
		0 => 'Domingo',
	);
	?>
	<div class="wrap">
		<h1>Configuracion de Horarios y Consultorio: <?php echo esc_html( $cfg['short_city'] ); ?></h1>
		<p>Configura que dias de la semana, frecuencia mensual (por ejemplo 2 veces al mes en Valencia) o fechas exactas atiendes en esta sede.</p>
		<form method="post">
			<?php wp_nonce_field( 'hc_branch_settings_nonce' ); ?>
			<table class="form-table">
				<tr>
					<th><label>Ciudad / Nombre de Sede</label></th>
					<td><input type="text" name="city_name" value="<?php echo esc_attr( $cfg['city_name'] ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label>Nombre Corto de Ciudad</label></th>
					<td><input type="text" name="short_city" value="<?php echo esc_attr( $cfg['short_city'] ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label>Estado</label></th>
					<td><input type="text" name="state_name" value="<?php echo esc_attr( $cfg['state_name'] ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label>Etiqueta de Sede</label></th>
					<td><input type="text" name="branch_badge" value="<?php echo esc_attr( $cfg['branch_badge'] ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label>Direccion del Consultorio</label></th>
					<td><input type="text" name="address" value="<?php echo esc_attr( $cfg['address'] ); ?>" class="large-text" /></td>
				</tr>
				<tr>
					<th><label>Resumen de Horario</label></th>
					<td><input type="text" name="schedule_summary" value="<?php echo esc_attr( $cfg['schedule_summary'] ); ?>" class="large-text" /></td>
				</tr>
				<tr>
					<th><label>WhatsApp Visible</label></th>
					<td><input type="text" name="whatsapp_display" value="<?php echo esc_attr( $cfg['whatsapp_display'] ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label>Numero WhatsApp (solo digitos)</label></th>
					<td><input type="text" name="whatsapp_number" value="<?php echo esc_attr( $cfg['whatsapp_number'] ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label>Dias de la Semana Activos en esta Sede</label></th>
					<td>
						<?php foreach ( $weekdays as $num => $label ) : ?>
							<label style="margin-right: 16px; display: inline-block;">
								<input type="checkbox" name="available_days[]" value="<?php echo esc_attr( $num ); ?>" <?php checked( in_array( $num, $cfg['available_days'], true ) ); ?> />
								<?php echo esc_html( $label ); ?>
							</label>
						<?php endforeach; ?>
					</td>
				</tr>
				<tr>
					<th><label>Frecuencia Mensual</label></th>
					<td>
						<select name="monthly_rule">
							<option value="weekly" <?php selected( $cfg['monthly_rule'], 'weekly' ); ?>>Todas las semanas del mes (Semanal)</option>
							<option value="biweekly_2_4" <?php selected( $cfg['monthly_rule'], 'biweekly_2_4' ); ?>>2 veces al mes: 2da y 4ta semana del mes (Ideal para Valencia)</option>
							<option value="biweekly_1_3" <?php selected( $cfg['monthly_rule'], 'biweekly_1_3' ); ?>>2 veces al mes: 1ra y 3ra semana del mes</option>
							<option value="specific_only" <?php selected( $cfg['monthly_rule'], 'specific_only' ); ?>>Solo habilitar las fechas exactas indicadas abajo</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label>Fechas Exactas Adicionales o Especificas (YYYY-MM-DD)</label></th>
					<td>
						<textarea name="specific_dates" rows="2" class="large-text" placeholder="Ej: 2026-11-14, 2026-11-28"><?php echo esc_textarea( $cfg['specific_dates'] ); ?></textarea>
						<p class="description">Puedes escribir fechas puntuales separadas por coma (ej. los 2 dias del mes que viajas a Valencia). Si eliges "Solo habilitar las fechas exactas", el calendario mostrara unicamente esas fechas.</p>
					</td>
				</tr>
			</table>

			<h2>Bloques de Horarios para esta Sede (Manana / Tarde y Dias por Bloque)</h2>
			<p>Elige los horarios permitidos (por ejemplo de 02:00 PM a 06:00 PM) y marca en que dias de la semana aplica cada bloque.</p>
			<table class="widefat striped" style="max-width: 1100px;">
				<thead>
					<tr>
						<th>Horario (ej. 02:00 PM - 03:00 PM)</th>
						<th>Descripcion / Turno (ej. Consulta de Terapia · Turno Tarde)</th>
						<th>Dias en que aplica este horario</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$slots = $cfg['slots'];
					for ( $i = 0; $i < 8; $i++ ) :
						$slot      = $slots[ $i ] ?? array( 'time' => '', 'title' => '', 'sub' => '', 'days' => $cfg['available_days'] );
						$slot_days = isset( $slot['days'] ) && is_array( $slot['days'] ) ? array_map( 'intval', $slot['days'] ) : $cfg['available_days'];
						?>
						<tr>
							<td><input type="text" name="slots[<?php echo esc_attr( $i ); ?>][time]" value="<?php echo esc_attr( $slot['time'] ); ?>" class="regular-text" style="width: 190px;" placeholder="02:00 PM - 03:00 PM" /></td>
							<td><input type="text" name="slots[<?php echo esc_attr( $i ); ?>][sub]" value="<?php echo esc_attr( $slot['sub'] ); ?>" class="regular-text" placeholder="Consulta de Terapia" /></td>
							<td>
								<?php foreach ( $weekdays as $d_num => $d_label ) : ?>
									<label style="margin-right: 8px; font-size: 12px; display: inline-block;">
										<input type="checkbox" name="slots[<?php echo esc_attr( $i ); ?>][days][]" value="<?php echo esc_attr( $d_num ); ?>" <?php checked( in_array( $d_num, $slot_days, true ) ); ?> />
										<?php echo esc_html( substr( $d_label, 0, 3 ) ); ?>
									</label>
								<?php endforeach; ?>
							</td>
						</tr>
					<?php endfor; ?>
				</tbody>
			</table>
			<p class="submit">
				<button type="submit" name="hc_save_branch_settings" class="button button-primary button-hero">Guardar Configuracion de la Sede</button>
			</p>
		</form>
	</div>
	<?php
}

/**
 * WordPress Customizer support for native live editing.
 */
function hc_calendy_customize_register( $wp_customize ) {
	$defaults = hc_get_branch_defaults();

	$wp_customize->add_section(
		'hc_branch_section',
		array(
			'title'       => 'Datos y Horarios de esta Sede',
			'description' => 'Personaliza los textos, direccion, horario y WhatsApp de esta sucursal.',
			'priority'    => 30,
		)
	);

	$fields = array(
		'hc_doctor_name'      => array( 'Nombre de la Especialista', 'Psic. Angelica De Gennaro' ),
		'hc_doctor_role'      => array( 'Especialidad Principal', 'Psicologa Clinica · Psicoterapia Individual y de Pareja' ),
		'hc_city_name'        => array( 'Ciudad de esta Sede', $defaults['city_name'] ),
		'hc_short_city'       => array( 'Nombre Corto de Sede', $defaults['short_city'] ),
		'hc_state_name'       => array( 'Estado', $defaults['state_name'] ),
		'hc_branch_badge'     => array( 'Etiqueta Superior de Sede', $defaults['branch_badge'] ),
		'hc_address'          => array( 'Direccion del Consultorio', $defaults['address'] ),
		'hc_schedule_summary' => array( 'Resumen de Horarios', $defaults['schedule_summary'] ),
		'hc_whatsapp_display' => array( 'Telefono / WhatsApp Visible', '+58 414-3733486' ),
		'hc_whatsapp_number'  => array( 'WhatsApp para Enlace Directo', '584143733486' ),
		'hc_email'            => array( 'Correo de Contacto', 'citas@healthcare.eurekraftve.com' ),
	);

	foreach ( $fields as $id => $info ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $info[1],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $info[0],
				'section' => 'hc_branch_section',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'hc_calendy_customize_register' );

/**
 * Default 5 Service Cards for "Areas de Atencion" (used as defaults for ACF fields).
 */
function hc_get_default_services_cards() {
	return array(
		1 => array(
			'icon'  => '✿',
			'title' => 'Manejo de la Ansiedad',
			'desc'  => 'Herramientas practicas para regular crisis de ansiedad, preocupacion constante, insomnio y estres laboral.',
		),
		2 => array(
			'icon'  => '☀',
			'title' => 'Depresion y Estado de Animo',
			'desc'  => 'Acompanamiento clinico ante tristeza persistente, desmotivacion, agotamiento emocional y procesos de duelo.',
		),
		3 => array(
			'icon'  => '✦',
			'title' => 'Uso de Pantallas y Salud Digital',
			'desc'  => 'Equilibrio saludable frente a redes sociales, hiperconectividad e impacto de pantallas en jovenes y adultos.',
		),
		4 => array(
			'icon'  => '♡',
			'title' => 'Terapia de Pareja',
			'desc'  => 'Comunicacion asertiva, resolucion de conflictos, acuerdos afectivos y fortalecimiento del vinculo.',
		),
		5 => array(
			'icon'  => '◎',
			'title' => 'Autoestima y Proyecto de Vida',
			'desc'  => 'Autoconocimiento, limites sanos, toma de decisiones y acompanamiento en transiciones vitales.',
		),
	);
}

/**
 * Register Advanced Custom Fields (ACF) Field Group for the Front Page:
 * "Seccion Areas de Atencion y Contenido de Portada (ACF)"
 */
function hc_register_acf_service_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$defaults = hc_get_default_services_cards();
	$fields   = array(
		array(
			'key'           => 'field_hc_services_heading',
			'label'         => 'Titulo de la Seccion Areas de Atencion',
			'name'          => 'hc_services_heading',
			'type'          => 'text',
			'default_value' => 'Areas de Atencion',
		),
		array(
			'key'           => 'field_hc_services_subtitle',
			'label'         => 'Subtitulo de la Seccion Areas de Atencion',
			'name'          => 'hc_services_subtitle',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'Acompanamiento clinico personalizado para cada etapa de tu bienestar emocional y familiar.',
		),
	);

	for ( $i = 1; $i <= 5; $i++ ) {
		$fields[] = array(
			'key'           => 'field_hc_service_' . $i . '_icon',
			'label'         => 'Tarjeta ' . $i . ' · Icono / Simbolo',
			'name'          => 'hc_service_' . $i . '_icon',
			'type'          => 'text',
			'default_value' => $defaults[ $i ]['icon'],
			'wrapper'       => array( 'width' => '20' ),
		);
		$fields[] = array(
			'key'           => 'field_hc_service_' . $i . '_title',
			'label'         => 'Tarjeta ' . $i . ' · Titulo del Area de Atencion',
			'name'          => 'hc_service_' . $i . '_title',
			'type'          => 'text',
			'default_value' => $defaults[ $i ]['title'],
			'wrapper'       => array( 'width' => '35' ),
		);
		$fields[] = array(
			'key'           => 'field_hc_service_' . $i . '_desc',
			'label'         => 'Tarjeta ' . $i . ' · Descripcion',
			'name'          => 'hc_service_' . $i . '_desc',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => $defaults[ $i ]['desc'],
			'wrapper'       => array( 'width' => '45' ),
		);
	}

	acf_add_local_field_group(
		array(
			'key'                   => 'group_hc_areas_atencion',
			'title'                 => 'ACF · Areas de Atencion Psicologica (Tarjetas Editables)',
			'fields'                => $fields,
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page',
					),
				),
			),
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);
}
add_action( 'acf/init', 'hc_register_acf_service_fields' );

/**
 * Helper to read the 5 "Areas de Atencion" cards via ACF `get_field()` (with fallback).
 */
function hc_get_services_section_data() {
	$front_id = (int) get_option( 'page_on_front' );
	if ( ! $front_id ) {
		$inicio_page = get_page_by_path( 'inicio' );
		if ( $inicio_page ) {
			$front_id = (int) $inicio_page->ID;
		} else {
			$front_id = 2;
		}
	}

	$defaults = hc_get_default_services_cards();
	$use_acf  = function_exists( 'get_field' );

	$heading  = $use_acf ? get_field( 'hc_services_heading', $front_id ) : '';
	$subtitle = $use_acf ? get_field( 'hc_services_subtitle', $front_id ) : '';

	if ( empty( $heading ) ) {
		$heading = get_post_meta( $front_id, 'hc_services_heading', true ) ?: 'Areas de Atencion';
	}
	if ( empty( $subtitle ) ) {
		$subtitle = get_post_meta( $front_id, 'hc_services_subtitle', true ) ?: 'Acompanamiento clinico personalizado para cada etapa de tu bienestar emocional y familiar.';
	}

	$cards = array();
	for ( $i = 1; $i <= 5; $i++ ) {
		$icon  = $use_acf ? get_field( 'hc_service_' . $i . '_icon', $front_id ) : '';
		$title = $use_acf ? get_field( 'hc_service_' . $i . '_title', $front_id ) : '';
		$desc  = $use_acf ? get_field( 'hc_service_' . $i . '_desc', $front_id ) : '';

		if ( empty( $icon ) ) {
			$icon = get_post_meta( $front_id, 'hc_service_' . $i . '_icon', true ) ?: $defaults[ $i ]['icon'];
		}
		if ( empty( $title ) ) {
			$title = get_post_meta( $front_id, 'hc_service_' . $i . '_title', true ) ?: $defaults[ $i ]['title'];
		}
		if ( empty( $desc ) ) {
			$desc = get_post_meta( $front_id, 'hc_service_' . $i . '_desc', true ) ?: $defaults[ $i ]['desc'];
		}

		$cards[] = array(
			'icon'  => $icon,
			'title' => $title,
			'desc'  => $desc,
		);
	}

	return array(
		'front_id' => $front_id,
		'heading'  => $heading,
		'subtitle' => $subtitle,
		'cards'    => $cards,
	);
}
