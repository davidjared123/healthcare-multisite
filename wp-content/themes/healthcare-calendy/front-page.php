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
					<span>Barquisimeto · Cabudare · Valencia</span>
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
						<div class="hc-city-tabs" role="tablist" aria-label="Cambiar de ciudad o sucursal">
							<?php foreach ( $hc_branches as $b ) : ?>
								<a
									href="<?php echo esc_url( $b['url'] ); ?>#agendar-cita"
									class="hc-city-tab <?php echo ( (int) $b['blog_id'] === (int) $hc_branch['blog_id'] ) ? 'is-active' : ''; ?>"
								>
									<span>●</span>
									<span><?php echo esc_html( $b['label'] ); ?></span>
								</a>
							<?php endforeach; ?>
						</div>

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

								<!-- Latest Registered Appointments in this Branch -->
								<div class="hc-appointments-table-wrap">
									<div class="hc-panel-title" style="margin-top: 10px; font-size: 0.92rem;">
										<span>Registro Reciente de Agenda · Sede <?php echo esc_html( $hc_branch['short_city'] ); ?></span>
										<?php if ( current_user_can( 'manage_options' ) ) : ?>
											<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=hc_cita' ) ); ?>" style="font-size: 0.78rem; color: var(--hc-accent-dark);">Administrar citas →</a>
										<?php endif; ?>
									</div>
									<table class="hc-table">
										<thead>
											<tr>
												<th>No</th>
												<th>Fecha</th>
												<th>Paciente</th>
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
													<td>01</td>
													<td><?php echo esc_html( gmdate( 'Y-m-d', strtotime( '+2 days' ) ) ); ?></td>
													<td><strong>Agenda Abierta</strong></td>
													<td><?php echo esc_html( $hc_branch['slots'][0]['time'] ?? '09:00 - 09:50' ); ?></td>
													<td>Presencial · <?php echo esc_html( $hc_branch['short_city'] ); ?></td>
													<td><span class="hc-badge-mint">Disponible</span></td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
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
							<div id="hc-slots-container" class="hc-slots-list" aria-label="Horarios disponibles para la fecha seleccionada"></div>

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
					<div style="font-size: 3.6rem; line-height: 1; margin-bottom: 10px;" aria-hidden="true">🌱</div>
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
						A traves de nuestra red de consultorios en <strong>Barquisimeto, Cabudare y Valencia</strong>, puedes agendar tu sesion en la ciudad mas cercana a ti o conectarte desde cualquier lugar mediante consulta online.
					</p>

					<div class="hc-about-pills">
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon">📍</span>
							<span>Barquisimeto, Cabudare y Valencia</span>
						</div>
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon">🎓</span>
							<span>Licenciada en Psicologia Clinica</span>
						</div>
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon">♥</span>
							<span>Enfoque empatico y confidencial</span>
						</div>
						<div class="hc-about-pill">
							<span class="hc-about-pill-icon">💬</span>
							<span>Atencion Presencial y Online</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 4. SERVICES SECTION -->
	<section id="servicios" class="hc-section">
		<div class="hc-container">
			<div class="hc-section-header">
				<h2 class="hc-section-title">
					Areas de <span>Atencion</span> ♥
				</h2>
				<p class="hc-section-sub">
					Acompanamiento clinico personalizado para cada etapa de tu bienestar emocional y familiar.
				</p>
			</div>

			<div class="hc-services-grid">
				<div class="hc-service-card">
					<div class="hc-service-icon">✿</div>
					<h3>Manejo de la Ansiedad</h3>
					<p>Herramientas practicas para regular crisis de ansiedad, preocupacion constante, insomnio y estres laboral.</p>
				</div>

				<div class="hc-service-card">
					<div class="hc-service-icon">☀</div>
					<h3>Depresion y Estado de Animo</h3>
					<p>Acompanamiento clinico ante tristeza persistente, desmotivacion, agotamiento emocional y procesos de duelo.</p>
				</div>

				<div class="hc-service-card">
					<div class="hc-service-icon">📱</div>
					<h3>Uso de Pantallas y Salud Digital</h3>
					<p>Equilibrio saludable frente a redes sociales, hiperconectividad e impacto de pantallas en jovenes y adultos.</p>
				</div>

				<div class="hc-service-card">
					<div class="hc-service-icon">♡</div>
					<h3>Terapia de Pareja</h3>
					<p>Comunicacion asertiva, resolucion de conflictos, acuerdos afectivos y fortalecimiento del vinculo.</p>
				</div>

				<div class="hc-service-card">
					<div class="hc-service-icon">✦</div>
					<h3>Autoestima y Proyecto de Vida</h3>
					<p>Autoconocimiento, limites sanos, toma de decisiones y acompanamiento en transiciones vitales.</p>
				</div>
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
								<div style="font-size: 2rem;" aria-hidden="true">🌿</div>
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
					<p>"Nos oriento con mucha empatia sobre el uso de pantallas y ansiedad en nuestro hijo adolescente en Valencia. Un espacio realmente humano y recomendable."</p>
					<div class="hc-testimonial-author">
						<strong>Laura M.</strong>
						<span>Orientacion Familiar · Sede Valencia</span>
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
				<div class="hc-cta-envelope" aria-hidden="true">✉</div>

				<div>
					<h2 class="hc-cta-title">
						Demos el primer paso hacia tu <span>bienestar emocional</span> ♥
					</h2>
					<p style="margin: 0; font-size: 0.92rem;">
						Agenda en linea en el calendario de tu ciudad o escribeme directamente por WhatsApp para coordinar tu consulta.
					</p>
				</div>

				<div class="hc-cta-contacts">
					<span>✉ <?php echo esc_html( $hc_branch['email'] ); ?></span>
					<span>☏ <?php echo esc_html( $hc_branch['whatsapp_display'] ); ?></span>
					<span>📍 Sede <?php echo esc_html( $hc_branch['short_city'] ); ?> (<?php echo esc_html( $hc_branch['state_name'] ); ?>)</span>
				</div>

				<div>
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
