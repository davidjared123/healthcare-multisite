<?php
/**
 * Front Page template for Healthcare Calendy
 *
 * Combines the warm pastel mint landing aesthetic (Reference 2) with the
 * simplified, full-width Doctor Profile & Multi-Branch Appointment Calendar (Reference 1).
 *
 * @package Healthcare_Calendy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$hc_branch       = hc_get_branch_config();
$hc_branches     = hc_get_network_branches();
$hc_recent_citas = hc_get_recent_appointments( 5 );
$wa_hero_url     = 'https://wa.me/' . $hc_branch['whatsapp_number'] . '?text=' . rawurlencode( 'Hola Psic. Angelica De Gennaro, te escribo desde la web de ' . $hc_branch['short_city'] . ' para agendar una consulta psicologica.' );
?>

<main id="inicio">

	<!-- 1. HERO SECTION (Reference 2 Pastel Mint Aesthetic + Cutout Photo flush to bottom of section) -->
	<section class="hc-hero">
		<div class="hc-container hc-hero-grid">
			<div class="hc-hero-copy">
				<div class="hc-hero-greeting">
					<span>Hola, soy</span>
					<span aria-hidden="true">👋</span>
				</div>

				<h1 class="hc-hero-title">
					Angelica <span>De Gennaro</span>
				</h1>

				<div class="hc-hero-role">
					<span>Psicologa Clinica · Sede <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
					<span aria-hidden="true">♥</span>
				</div>

				<p class="hc-hero-desc">
					Acompano a adultos, jovenes, parejas y familias en <strong><?php echo esc_html( $hc_branch['city_name'] ); ?></strong> (<?php echo esc_html( $hc_branch['state_name'] ); ?>) y en modalidad online a construir bienestar emocional, superar la ansiedad y recuperar el equilibrio en su vida diaria.
				</p>

				<div class="hc-hero-ctas">
					<a href="#agendar-cita" class="hc-btn hc-btn-coral">
						<span>Agendar Cita en <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
						<span aria-hidden="true">→</span>
					</a>
					<a href="<?php echo esc_url( $wa_hero_url ); ?>" target="_blank" rel="noopener" class="hc-btn hc-btn-outline">
						<span>WhatsApp <?php echo esc_html( $hc_branch['whatsapp_display'] ); ?></span>
					</a>
				</div>

				<div class="hc-hero-connect">
					<span>Selecciona tu ciudad:</span>
					<?php foreach ( $hc_branches as $b ) : ?>
						<a href="<?php echo esc_url( $b['url'] ); ?>#agendar-cita" class="hc-social-chip <?php echo ( (int) $b['blog_id'] === (int) $hc_branch['blog_id'] ) ? 'is-active' : ''; ?>">
							<?php echo esc_html( $b['city'] ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="hc-hero-visual">
				<div class="hc-floating-card hc-floating-card-left">
					<strong>Espacio seguro y empatico</strong>
					<span>Psicoterapia confidencial adaptada a tu ritmo en <?php echo esc_html( $hc_branch['short_city'] ); ?> ♥</span>
				</div>

				<div class="hc-hero-blob">
					<img
						src="<?php echo esc_url( $hc_branch['photo_url'] ); ?>"
						alt="<?php echo esc_attr( $hc_branch['doctor_name'] . ' - Psicologa en ' . $hc_branch['short_city'] ); ?>"
						class="hc-hero-photo"
						width="560"
						height="660"
					/>
				</div>

				<div class="hc-floating-card hc-floating-card-right">
					<span class="hc-star-badge" aria-hidden="true">★</span>
					<strong>Atencion Clinica</strong>
					<span>Barquisimeto · Cabudare · Online</span>
				</div>
			</div>
		</div>
	</section>

	<!-- 2. INTERACTIVE DOCTOR PROFILE & CALENDAR BOOKING DASHBOARD (Simplified & Full-Width, No Left Sidebar) -->
	<section id="agendar-cita" class="hc-section">
		<div class="hc-container">
			<div class="hc-section-header">
				<h2 class="hc-section-title">
					Agenda tu <span>Consulta en <?php echo esc_html( $hc_branch['short_city'] ); ?></span> ♥
				</h2>
				<p class="hc-section-sub">
					Cada sede cuenta con su propio calendario independiente. Selecciona tu ciudad, elige el dia y bloque disponible y deja tus datos para confirmar tu cita.
				</p>
			</div>

			<div class="hc-booking-shell">
				<div class="hc-booking-main">
					<!-- Topbar: Multisite City Switcher + Specialist Pill -->
					<div class="hc-booking-topbar">
						<nav class="hc-city-tabs" aria-label="Cambiar de ciudad o sucursal">
							<?php foreach ( $hc_branches as $b ) : ?>
								<?php $is_current_branch = ( (int) $b['blog_id'] === (int) $hc_branch['blog_id'] ); ?>
								<a
									href="<?php echo esc_url( $b['url'] ); ?>#agendar-cita"
									class="hc-city-tab <?php echo $is_current_branch ? 'is-active' : ''; ?>"
									<?php echo $is_current_branch ? 'aria-current="page"' : ''; ?>
								>
									<span aria-hidden="true">●</span>
									<span><?php echo esc_html( $b['label'] ); ?></span>
								</a>
							<?php endforeach; ?>
						</nav>

						<div class="hc-doctor-mini">
							<img src="<?php echo esc_url( $hc_branch['photo_url'] ); ?>" alt="<?php echo esc_attr( $hc_branch['doctor_name'] ); ?>" />
							<div class="hc-doctor-mini-text">
								<strong><?php echo esc_html( $hc_branch['doctor_name'] ); ?></strong>
								<span>Sede Activa: <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
							</div>
						</div>
					</div>

					<!-- 2-Column Clinical Dashboard -->
					<div class="hc-dashboard-grid">
						<!-- Left Column: Doctor Card + Stats + Booking Form + Branch Appointments -->
						<div class="hc-dashboard-left">
							<!-- Doctor Profile Card -->
							<div class="hc-doc-card">
								<div class="hc-doc-photo-wrap">
									<img src="<?php echo esc_url( $hc_branch['photo_url'] ); ?>" alt="<?php echo esc_attr( $hc_branch['doctor_name'] ); ?>" />
								</div>
								<div class="hc-doc-info">
									<h3 class="hc-doc-name"><?php echo esc_html( $hc_branch['doctor_name'] ); ?></h3>
									<div class="hc-doc-specialty"><?php echo esc_html( $hc_branch['doctor_role'] ); ?></div>

									<div class="hc-doc-badges">
										<span class="hc-badge-mint">Sede <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
										<span class="hc-badge-mint">Ansiedad y Depresion</span>
										<span class="hc-badge-peach">Presencial y Online</span>
									</div>

									<p class="hc-doc-bio">
										<strong>Ubicacion:</strong> <?php echo esc_html( $hc_branch['address'] ); ?><br>
										<strong>Horario en esta sede:</strong> <?php echo esc_html( $hc_branch['schedule_summary'] ); ?>
									</p>

									<div class="hc-doc-actions">
										<a href="<?php echo esc_url( $wa_hero_url ); ?>" target="_blank" rel="noopener" class="hc-btn hc-btn-mint hc-btn-sm">
											Escribir al <?php echo esc_html( $hc_branch['whatsapp_display'] ); ?>
										</a>
										<?php if ( current_user_can( 'manage_options' ) ) : ?>
											<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=hc_cita&page=hc-branch-schedule' ) ); ?>" class="hc-btn hc-btn-outline hc-btn-sm">
												Configurar Dias y Horarios
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<!-- 4 Mini Stat Cards -->
							<div class="hc-stats-row">
								<div class="hc-stat-card">
									<div class="hc-stat-icon">◎</div>
									<div>
										<span class="hc-stat-label">Sede Actual</span>
										<strong class="hc-stat-value"><?php echo esc_html( $hc_branch['short_city'] ); ?></strong>
									</div>
								</div>
								<div class="hc-stat-card">
									<div class="hc-stat-icon">◷</div>
									<div>
										<span class="hc-stat-label">Duracion Sesion</span>
										<strong class="hc-stat-value">50 Minutos</strong>
									</div>
								</div>
								<div class="hc-stat-card">
									<div class="hc-stat-icon">✦</div>
									<div>
										<span class="hc-stat-label">Modalidad</span>
										<strong class="hc-stat-value">Presencial / Online</strong>
									</div>
								</div>
								<div class="hc-stat-card">
									<div class="hc-stat-icon">☏</div>
									<div>
										<span class="hc-stat-label">Contacto Directo</span>
										<strong class="hc-stat-value">0414-3733486</strong>
									</div>
								</div>
							</div>

							<!-- Patient Booking & Contact Form Panel -->
							<div class="hc-panel-card">
								<div class="hc-panel-title">
									<span>Datos del Paciente para Confirmar Cita</span>
									<span class="hc-badge-mint">Sede <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
								</div>
								<p style="font-size: 0.86rem; margin-bottom: 12px;">
									Selecciona un dia y horario en el calendario y completa tus datos para reservar tu espacio y recibir confirmacion por WhatsApp.
								</p>

								<div class="hc-booking-selection-banner">
									<span>Horario seleccionado:</span>
									<strong id="hc-selected-summary">Cargando disponibilidad...</strong>
								</div>

								<form id="hc-booking-form" class="hc-booking-form">
									<input type="hidden" name="date" id="hc-input-date" value="" />
									<input type="hidden" name="slot" id="hc-input-slot" value="" />

									<div class="hc-form-grid">
										<div class="hc-form-field">
											<label for="hc-field-name">Nombre y Apellido *</label>
											<input type="text" id="hc-field-name" name="name" required placeholder="Ej. Maria Fernanda Perez" />
										</div>

										<div class="hc-form-field">
											<label for="hc-field-phone">Telefono / WhatsApp *</label>
											<input type="tel" id="hc-field-phone" name="phone" required placeholder="Ej. +58 414-0000000" />
										</div>

										<div class="hc-form-field">
											<label for="hc-field-email">Correo Electronico</label>
											<input type="email" id="hc-field-email" name="email" placeholder="tucorreo@ejemplo.com" />
										</div>

										<div class="hc-form-field">
											<label for="hc-field-modality">Modalidad de Consulta</label>
											<select id="hc-field-modality" name="modality">
												<option value="Presencial en <?php echo esc_attr( $hc_branch['short_city'] ); ?>">Presencial en <?php echo esc_html( $hc_branch['short_city'] ); ?></option>
												<option value="Consulta Online (Videollamada)">Consulta Online (Videollamada)</option>
												<option value="Terapia de Pareja Presencial">Terapia de Pareja Presencial</option>
											</select>
										</div>

										<div class="hc-form-field is-full">
											<label for="hc-field-notes">Breve motivo de consulta o comentario (Opcional)</label>
											<textarea id="hc-field-notes" name="notes" rows="2" placeholder="Cuentanos brevemente en que podemos ayudarte (ansiedad, estado de animo, pareja, orientacion familiar)..."></textarea>
										</div>
									</div>

									<div class="hc-form-actions">
										<button type="submit" class="hc-btn hc-btn-coral">
											<span>Reservar Cita en <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
											<span aria-hidden="true">→</span>
										</button>
										<a
											href="<?php echo esc_url( $wa_hero_url ); ?>"
											id="hc-direct-wa-btn"
											target="_blank"
											rel="noopener"
											class="hc-btn hc-btn-outline"
										>
											<span>Confirmar por WhatsApp (<?php echo esc_html( $hc_branch['whatsapp_display'] ); ?>)</span>
										</a>
									</div>

									<div id="hc-booking-feedback" class="hc-form-feedback" role="status" aria-live="polite"></div>
								</form>

								<?php if ( current_user_can( 'manage_options' ) ) : ?>
									<!-- Admin-only Registered Appointments in this Branch (Private, hidden from public visitors) -->
									<div class="hc-appointments-table-wrap">
										<div class="hc-panel-title" style="margin-top: 10px; font-size: 0.92rem;">
											<span>Panel Privado Admin: Citas de Sede <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
											<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=hc_cita' ) ); ?>" style="font-size: 0.78rem; color: var(--hc-accent-dark);">Administrar citas en WP-Admin →</a>
										</div>
										<table class="hc-table">
											<thead>
												<tr>
													<th>No</th>
													<th>Fecha</th>
													<th>Paciente (Solo visible para ti)</th>
													<th>Horario</th>
													<th>Modalidad</th>
													<th>Estado</th>
												</tr>
											</thead>
											<tbody>
												<?php if ( ! empty( $hc_recent_citas ) ) : ?>
													<?php foreach ( $hc_recent_citas as $idx => $cita ) : ?>
														<tr>
															<td><?php echo esc_html( str_pad( (string) ( $idx + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></td>
															<td><?php echo esc_html( $cita['date'] ); ?></td>
															<td><strong><?php echo esc_html( $cita['name'] ); ?></strong></td>
															<td><?php echo esc_html( $cita['slot'] ); ?></td>
															<td><?php echo esc_html( $cita['modality'] ); ?></td>
															<td><span class="hc-badge-mint"><?php echo esc_html( $cita['status'] ); ?></span></td>
														</tr>
													<?php endforeach; ?>
												<?php else : ?>
													<tr>
														<td colspan="6">No hay citas registradas todavia en esta sede.</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<!-- Right Column: Interactive Monthly Calendar + Time Slot Cards -->
						<div class="hc-dashboard-right">
							<div class="hc-calendar-card">
								<div class="hc-cal-header">
									<span id="hc-cal-month-label" class="hc-cal-month-label">Mes Actual</span>
									<div class="hc-cal-nav">
										<button type="button" id="hc-cal-prev" class="hc-cal-btn" aria-label="Mes anterior">‹</button>
										<button type="button" id="hc-cal-next" class="hc-cal-btn is-next" aria-label="Mes siguiente">›</button>
									</div>
								</div>

								<div class="hc-cal-weekdays">
									<span>Lun</span>
									<span>Mar</span>
									<span>Mie</span>
									<span>Jue</span>
									<span>Vie</span>
									<span>Sab</span>
									<span>Dom</span>
								</div>

								<div id="hc-cal-days-grid" class="hc-cal-days"></div>

								<p style="font-size: 0.78rem; margin: 14px 0 0 0; text-align: center; line-height: 1.45;">
									<strong>Atencion en <?php echo esc_html( $hc_branch['short_city'] ); ?>:</strong><br>
									<?php echo esc_html( $hc_branch['schedule_summary'] ); ?>
								</p>
							</div>

							<!-- Clickable Time Slot Cards -->
							<div id="hc-slots-container" class="hc-slots-list" role="group" aria-label="Horarios disponibles para la fecha seleccionada"></div>

							<div style="margin-top: 12px;">
								<a href="<?php echo esc_url( $wa_hero_url ); ?>" target="_blank" rel="noopener" class="hc-btn hc-btn-outline hc-btn-sm" style="width: 100%;">
									+ Consultar otro horario por WhatsApp
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 3. ABOUT ME SECTION -->
	<section id="sobre-mi" class="hc-section hc-section-mint">
		<div class="hc-container">
			<div class="hc-about-grid">
				<div class="hc-about-illus">
					<div class="hc-about-icon-circle" aria-hidden="true">
						<svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22v-8"/><path d="M12 14c-4.5 0-7-3-7-7 4 0 7 2.5 7 7Z"/><path d="M12 14c4.5 0 7-3 7-7-4 0-7 2.5-7 7Z"/></svg>
					</div>
					<strong style="display: block; font-size: 1rem; color: var(--hc-ink);">Crecimiento y Calma</strong>
					<span style="font-size: 0.82rem; color: var(--hc-muted);">Psicologia clinica centrada en la persona</span>
				</div>

				<div class="hc-about-copy">
					<h2 class="hc-section-title" style="text-align: left;">
						Sobre <span>Mi</span> ♥
					</h2>
					<p>
						Soy <strong>Angelica De Gennaro</strong>, Psicologa Clinica dedicada a brindar un espacio seguro, libre de juicios y respaldado por herramientas terapeuticas basadas en evidencia. Mi proposito es acompanarte a comprender tus emociones, gestionar la ansiedad, fortalecer tu autoestima y construir relaciones mas saludables.
					</p>
					<p>
						A traves de nuestros consultorios en <strong>Barquisimeto y Cabudare</strong> (Estado Lara), puedes agendar tu sesion presencial o conectarte desde cualquier lugar mediante consulta online.
					</p>

					<div class="hc-about-pills">
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon" aria-hidden="true">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
							</span>
							<span>Barquisimeto y Cabudare (Edo. Lara)</span>
						</div>
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon" aria-hidden="true">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
							</span>
							<span>Licenciada en Psicologia Clinica</span>
						</div>
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon" aria-hidden="true">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
							</span>
							<span>Enfoque empatico y confidencial</span>
						</div>
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon" aria-hidden="true">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
							</span>
							<span>Atencion Presencial y Online</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 4. SERVICES SECTION (Powered by Advanced Custom Fields - ACF) -->
	<?php $hc_services = hc_get_services_section_data(); ?>
	<section id="servicios" class="hc-section">
		<div class="hc-container">
			<div class="hc-section-header">
				<h2 class="hc-section-title">
					<?php
					$s_words = explode( ' ', trim( $hc_services['heading'] ) );
					$s_last  = array_pop( $s_words );
					$s_first = implode( ' ', $s_words );
					echo esc_html( $s_first ? $s_first . ' ' : '' );
					?>
					<span><?php echo esc_html( $s_last ); ?></span> ♥
				</h2>
				<p class="hc-section-sub">
					<?php echo esc_html( $hc_services['subtitle'] ); ?>
				</p>
				<?php if ( current_user_can( 'manage_options' ) && ! empty( $hc_services['front_id'] ) ) : ?>
					<div style="margin-top: 10px;">
						<a href="<?php echo esc_url( admin_url( 'post.php?post=' . (int) $hc_services['front_id'] . '&action=edit' ) ); ?>" class="hc-badge-mint" style="text-decoration: none;">
							✎ Editar estas tarjetas con ACF (Advanced Custom Fields)
						</a>
					</div>
				<?php endif; ?>
			</div>

			<div class="hc-services-grid">
				<?php foreach ( $hc_services['cards'] as $card ) : ?>
					<div class="hc-service-card">
						<div class="hc-service-icon"><?php echo esc_html( $card['icon'] ); ?></div>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['desc'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- 5. THERAPEUTIC PROCESS SECTION -->
	<section id="proceso" class="hc-section hc-section-mint">
		<div class="hc-container">
			<div class="hc-section-header">
				<h2 class="hc-section-title">
					Mi Proceso <span>Terapeutico</span> ♥
				</h2>
				<p class="hc-section-sub">
					Un camino claro, colaborativo y estructurado desde tu primera cita hasta tu bienestar sostenible.
				</p>
			</div>

			<div class="hc-process-grid">
				<div class="hc-process-step">
					<div class="hc-process-circle">♡</div>
					<span class="hc-process-num">01</span>
					<h3>Escucha y Empatia</h3>
					<p>Conocemos tu motivo de consulta en un ambiente confidencial, calido y sin juicios.</p>
				</div>

				<div class="hc-process-step is-coral">
					<div class="hc-process-circle">◎</div>
					<span class="hc-process-num">02</span>
					<h3>Evaluacion Clinica</h3>
					<p>Identificamos patrones emocionales, factores de estres y objetivos terapeuticos claros.</p>
				</div>

				<div class="hc-process-step">
					<div class="hc-process-circle">✦</div>
					<span class="hc-process-num">03</span>
					<h3>Herramientas Practicas</h3>
					<p>Trabajamos estrategias cognitivas y emocionales aplicables a tu vida cotidiana.</p>
				</div>

				<div class="hc-process-step is-coral">
					<div class="hc-process-circle">✓</div>
					<span class="hc-process-num">04</span>
					<h3>Autonomia y Bienestar</h3>
					<p>Consolidamos tus avances para que cuentes con recursos solidos a largo plazo.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- 6. BLOG SECTION -->
	<section id="blog" class="hc-section">
		<div class="hc-container">
			<div class="hc-section-header">
				<h2 class="hc-section-title">
					<span>Blog</span> ♥
				</h2>
				<p class="hc-section-sub">
					Lecturas y guias practicas sobre ansiedad, depresion, uso de pantallas y bienestar emocional.
				</p>
			</div>

			<div class="hc-blog-grid">
				<?php
				$blog_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => 4,
					)
				);

				if ( $blog_query->have_posts() ) :
					while ( $blog_query->have_posts() ) :
						$blog_query->the_post();
						$cats     = get_the_category();
						$cat_name = ! empty( $cats ) ? $cats[0]->name : 'Salud Mental';
						?>
						<article class="hc-blog-card">
							<div class="hc-blog-thumb">
								<div>
									<span class="hc-blog-tag"><?php echo esc_html( $cat_name ); ?></span>
									<div style="font-size: 0.78rem; color: var(--hc-muted); margin-top: 6px;">
										Por Psic. Angelica De Gennaro · <?php echo esc_html( get_the_date() ); ?>
									</div>
								</div>
								<div class="hc-blog-icon-badge" aria-hidden="true">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22v-8"/><path d="M12 14c-4.5 0-7-3-7-7 4 0 7 2.5 7 7Z"/><path d="M12 14c4.5 0 7-3 7-7-4 0-7 2.5-7 7Z"/></svg>
								</div>
							</div>
							<div class="hc-blog-body">
								<h3>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
								<a href="<?php the_permalink(); ?>" class="hc-blog-link">
									Leer articulo completo →
								</a>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>

	<!-- 7. TESTIMONIALS SECTION -->
	<section class="hc-section hc-section-mint">
		<div class="hc-container">
			<div class="hc-section-header">
				<h2 class="hc-section-title">
					Lo que Dicen <span>Mis Pacientes</span> ♥
				</h2>
				<p class="hc-section-sub">
					Experiencias reales de personas que han iniciado su proceso psicoterapeutico en nuestras sedes.
				</p>
			</div>

			<div class="hc-testimonials-grid">
				<div class="hc-testimonial-card">
					<p>"Iniciar terapia con la Psic. Angelica en Barquisimeto me ayudo a entender mis episodios de ansiedad y recuperar la tranquilidad en mi trabajo y con mi familia."</p>
					<div class="hc-testimonial-author">
						<strong>Mariana G.</strong>
						<span>Paciente en Sede Barquisimeto</span>
						<div class="hc-stars" aria-label="5 estrellas">★★★★★</div>
					</div>
				</div>

				<div class="hc-testimonial-card">
					<p>"Excelente profesional, muy calida y puntual. Poder agendar nuestra cita en Cabudare desde la web y confirmar por WhatsApp hizo todo el proceso sumamente sencillo."</p>
					<div class="hc-testimonial-author">
						<strong>Carlos y Daniela R.</strong>
						<span>Terapia de Pareja · Sede Cabudare</span>
						<div class="hc-stars" aria-label="5 estrellas">★★★★★</div>
					</div>
				</div>

				<div class="hc-testimonial-card">
					<p>"Nos oriento con mucha empatia sobre el uso de pantallas y ansiedad en nuestro hijo adolescente en modalidad online. Un espacio realmente humano y recomendable."</p>
					<div class="hc-testimonial-author">
						<strong>Laura M.</strong>
						<span>Orientacion Familiar · Consulta Online</span>
						<div class="hc-stars" aria-label="5 estrellas">★★★★★</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 8. CONTACT CTA BANNER -->
	<section id="contacto" class="hc-section">
		<div class="hc-container">
			<div class="hc-cta-banner">
				<div class="hc-cta-left">
					<div class="hc-cta-envelope" aria-hidden="true">
						<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="3"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
					</div>

					<div class="hc-cta-copy">
						<h2 class="hc-cta-title">
							Demos el primer paso hacia tu <span>bienestar emocional</span> ♥
						</h2>
						<p class="hc-cta-desc">
							Agenda en linea en el calendario de tu ciudad o escribeme directamente por WhatsApp para coordinar tu consulta.
						</p>
					</div>
				</div>

				<div class="hc-cta-contacts">
					<div class="hc-cta-contact-item">
						<span class="hc-cta-contact-icon" aria-hidden="true">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
						</span>
						<span><?php echo esc_html( $hc_branch['email'] ); ?></span>
					</div>
					<div class="hc-cta-contact-item">
						<span class="hc-cta-contact-icon" aria-hidden="true">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						</span>
						<span><?php echo esc_html( $hc_branch['whatsapp_display'] ); ?></span>
					</div>
					<div class="hc-cta-contact-item">
						<span class="hc-cta-contact-icon" aria-hidden="true">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
						</span>
						<span>Sede <?php echo esc_html( $hc_branch['short_city'] ); ?> (<?php echo esc_html( $hc_branch['state_name'] ); ?>)</span>
					</div>
				</div>

				<div class="hc-cta-action">
					<a href="<?php echo esc_url( $wa_hero_url ); ?>" target="_blank" rel="noopener" class="hc-btn hc-btn-coral">
						<span>Escribir por WhatsApp</span>
						<span aria-hidden="true">↗</span>
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
