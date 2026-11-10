<?php
/**
 * Healthcare Calendy - Functions and Multisite Branch Appointment System
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HC_CALENDY_VERSION', '1.0.0' );

/**
 * Default branch configuration based on Multisite blog_id or URL path.
 */
function hc_get_branch_defaults() {
	$blog_id = get_current_blog_id();
	$path    = trim( parse_url( home_url(), PHP_URL_PATH ) ?? '', '/' );

	$branches = array(
		1 => array(
			'city_name'        => 'Barquisimeto, Cabudare y Valencia',
			'short_city'       => 'Portal Nacional',
			'state_name'       => 'Venezuela y Consulta Online',
			'branch_badge'     => 'Sede Principal y Consulta Online',
			'address'          => 'Atencion Presencial en Barquisimeto, Cabudare y Valencia + Consulta Online Internacional',
			'schedule_summary' => 'Lunes a Sabado: 09:00 a 18:00 (Previa Cita)',
			'available_days'   => array( 1, 2, 3, 4, 5, 6 ),
			'slots'            => array(
				array(
					'time'  => '09:00 - 09:50',
					'title' => 'Terapia Individual (Ansiedad y Estres)',
					'sub'   => 'Psic. Angelica De Gennaro · Presencial / Online',
					'icon'  => '09',
				),
				array(
					'time'  => '11:00 - 11:50',
					'title' => 'Evaluacion Psicologica Inicial',
					'sub'   => 'Psic. Angelica De Gennaro · Primera Consulta',
					'icon'  => '11',
				),
				array(
					'time'  => '14:30 - 15:20',
					'title' => 'Terapia de Pareja y Familia',
					'sub'   => 'Psic. Angelica De Gennaro · Sesion Clinica',
					'icon'  => '14',
				),
				array(
					'time'  => '16:30 - 17:20',
					'title' => 'Bienestar Emocional y Pantallas',
					'sub'   => 'Psic. Angelica De Gennaro · Seguimiento',
					'icon'  => '16',
				),
			),
		),
		2 => array(
			'city_name'        => 'Barquisimeto',
			'short_city'       => 'Barquisimeto',
			'state_name'       => 'Estado Lara',
			'branch_badge'     => 'Consultorio Barquisimeto · Edo. Lara',
			'address'          => 'Av. Los Leones, Centro Empresarial Barquisimeto, Piso 3, Consultorio 304, Barquisimeto',
			'schedule_summary' => 'Lunes, Miercoles y Viernes: 09:00 a 17:30',
			'available_days'   => array( 1, 3, 5 ),
			'slots'            => array(
				array(
					'time'  => '09:00 - 09:50',
					'title' => 'Terapia Clinica Individual (Barquisimeto)',
					'sub'   => 'Psic. Angelica De Gennaro · Consultorio 304',
					'icon'  => '09',
				),
				array(
					'time'  => '10:30 - 11:20',
					'title' => 'Manejo de Ansiedad y Estado de Animo',
					'sub'   => 'Psic. Angelica De Gennaro · Barquisimeto',
					'icon'  => '10',
				),
				array(
					'time'  => '14:00 - 14:50',
					'title' => 'Terapia de Pareja y Vinculos',
					'sub'   => 'Psic. Angelica De Gennaro · Barquisimeto',
					'icon'  => '14',
				),
				array(
					'time'  => '16:00 - 16:50',
					'title' => 'Consulta Vespertina / Online',
					'sub'   => 'Psic. Angelica De Gennaro · Barquisimeto',
					'icon'  => '16',
				),
			),
		),
		3 => array(
			'city_name'        => 'Cabudare',
			'short_city'       => 'Cabudare',
			'state_name'       => 'Estado Lara',
			'branch_badge'     => 'Consultorio Cabudare · Edo. Lara',
			'address'          => 'Urb. Valle Hondo, Centro Profesional Agua Viva, Nivel 2, Local 12, Cabudare',
			'schedule_summary' => 'Martes, Jueves y Sabados: 09:00 a 17:00',
			'available_days'   => array( 2, 4, 6 ),
			'slots'            => array(
				array(
					'time'  => '09:30 - 10:20',
					'title' => 'Terapia Individual (Sede Cabudare)',
					'sub'   => 'Psic. Angelica De Gennaro · Valle Hondo',
					'icon'  => '09',
				),
				array(
					'time'  => '11:00 - 11:50',
					'title' => 'Orientacion Familiar y Uso de Pantallas',
					'sub'   => 'Psic. Angelica De Gennaro · Cabudare',
					'icon'  => '11',
				),
				array(
					'time'  => '14:30 - 15:20',
					'title' => 'Acompanamiento en Depresion y Duelo',
					'sub'   => 'Psic. Angelica De Gennaro · Cabudare',
					'icon'  => '14',
				),
				array(
					'time'  => '16:00 - 16:50',
					'title' => 'Terapia Cognitivo-Conductual',
					'sub'   => 'Psic. Angelica De Gennaro · Cabudare',
					'icon'  => '16',
				),
			),
		),
		4 => array(
			'city_name'        => 'Valencia',
			'short_city'       => 'Valencia',
			'state_name'       => 'Estado Carabobo',
			'branch_badge'     => 'Consultorio Valencia · Edo. Carabobo',
			'address'          => 'Urb. El Vinedo, Torre Clinica Carabobo, Piso 5, Consultorio 5B, Valencia',
			'schedule_summary' => 'Jueves, Viernes y Sabados: 09:00 a 18:00',
			'available_days'   => array( 4, 5, 6 ),
			'slots'            => array(
				array(
					'time'  => '09:00 - 09:50',
					'title' => 'Primera Evaluacion Clinica (Valencia)',
					'sub'   => 'Psic. Angelica De Gennaro · El Vinedo',
					'icon'  => '09',
				),
				array(
					'time'  => '11:00 - 11:50',
					'title' => 'Psicoterapia para Ansiedad y Estres Laboral',
					'sub'   => 'Psic. Angelica De Gennaro · Valencia',
					'icon'  => '11',
				),
				array(
					'time'  => '14:00 - 14:50',
					'title' => 'Terapia de Pareja y Comunicacion',
					'sub'   => 'Psic. Angelica De Gennaro · Valencia',
					'icon'  => '14',
				),
				array(
					'time'  => '16:00 - 16:50',
					'title' => 'Higiene Digital y Salud Mental',
					'sub'   => 'Psic. Angelica De Gennaro · Valencia',
					'icon'  => '16',
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
	if ( false !== strpos( $path, 'valencia' ) ) {
		return $branches[4];
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
			'label'   => 'Todas las Sedes',
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
		array(
			'blog_id' => 4,
			'label'   => 'Sede Valencia',
			'city'    => 'Valencia',
			'url'     => trailingslashit( $base_url . 'valencia' ),
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

	// Dequeue default WP core inline preset palettes so only Healthcare Calendy's palette is output on frontend
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'classic-theme-styles' );

	wp_enqueue_script(
		'healthcare-calendy-booking',
		get_template_directory_uri() . '/assets/js/booking-calendar.js',
		array(),
		HC_CALENDY_VERSION,
		true
	);

	$branch = hc_get_branch_config();

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
		if ( 'cancelada' === $status ) {
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
		$name     = get_post_meta( $p->ID, '_hc_cita_name', true );
		$parts    = explode( ' ', trim( $name ) );
		$initials = $parts[0] . ( isset( $parts[1] ) ? ' ' . mb_substr( $parts[1], 0, 1 ) . '.' : '' );
		$items[]  = array(
			'id'       => $p->ID,
			'date'     => get_post_meta( $p->ID, '_hc_cita_date', true ),
			'slot'     => get_post_meta( $p->ID, '_hc_cita_slot', true ),
			'name'     => current_user_can( 'manage_options' ) ? $name : $initials,
			'phone'    => current_user_can( 'manage_options' ) ? get_post_meta( $p->ID, '_hc_cita_phone', true ) : 'Reservado',
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

	$branch    = hc_get_branch_config();
	$post_id   = wp_insert_post(
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
 * Custom Columns & Meta Box for `hc_cita` in WP-Admin so Angelica can manage appointments easily.
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
 * Allows Angelica to configure which days & time slots she attends in Barquisimeto, Cabudare, or Valencia independently.
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
			$time  = sanitize_text_field( $s['time'] ?? '' );
			$title = sanitize_text_field( $s['title'] ?? '' );
			$sub   = sanitize_text_field( $s['sub'] ?? '' );
			if ( $time && $title ) {
				$slots[] = array(
					'time'  => $time,
					'title' => $title,
					'sub'   => $sub,
					'icon'  => substr( $time, 0, 2 ),
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
			'slots'            => $slots,
		);

		update_option( 'hc_branch_settings', $new_settings );
		echo '<div class="notice notice-success is-dismissible"><p>Horarios y datos de la sede guardados correctamente.</p></div>';
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
		<p>Cada sitio del Multisite (Barquisimeto, Cabudare y Valencia) guarda su propia disponibilidad y citas de forma independiente.</p>
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
					<td><input type="text" name="schedule_summary" value="<?php echo esc_attr( $cfg['schedule_summary'] ); ?>" class="regular-text" /></td>
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
					<th><label>Dias con Citas Disponibles en esta Sede</label></th>
					<td>
						<?php foreach ( $weekdays as $num => $label ) : ?>
							<label style="margin-right: 16px; display: inline-block;">
								<input type="checkbox" name="available_days[]" value="<?php echo esc_attr( $num ); ?>" <?php checked( in_array( $num, $cfg['available_days'], true ) ); ?> />
								<?php echo esc_html( $label ); ?>
							</label>
						<?php endforeach; ?>
					</td>
				</tr>
			</table>

			<h2>Bloques de Horarios para esta Sede</h2>
			<table class="widefat striped" style="max-width: 900px;">
				<thead>
					<tr>
						<th>Hora (ej. 09:00 - 09:50)</th>
						<th>Modalidad / Tipo de Consulta</th>
						<th>Subtitulo / Ubicacion</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$slots = $cfg['slots'];
					for ( $i = 0; $i < 5; $i++ ) :
						$slot = $slots[ $i ] ?? array( 'time' => '', 'title' => '', 'sub' => '' );
						?>
						<tr>
							<td><input type="text" name="slots[<?php echo esc_attr( $i ); ?>][time]" value="<?php echo esc_attr( $slot['time'] ); ?>" class="regular-text" placeholder="09:00 - 09:50" /></td>
							<td><input type="text" name="slots[<?php echo esc_attr( $i ); ?>][title]" value="<?php echo esc_attr( $slot['title'] ); ?>" class="regular-text" placeholder="Terapia Individual" /></td>
							<td><input type="text" name="slots[<?php echo esc_attr( $i ); ?>][sub]" value="<?php echo esc_attr( $slot['sub'] ); ?>" class="regular-text" placeholder="Psic. Angelica De Gennaro" /></td>
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
