(function () {
  'use strict';

  var cfg = window.hcCalendyData || {
    ajaxUrl: '/wp-admin/admin-ajax.php',
    nonce: '',
    blogId: 1,
    cityName: 'Barquisimeto',
    shortCity: 'Barquisimeto',
    whatsappNumber: '584143733486',
    whatsappDisplay: '+58 414-3733486',
    availableDays: [1, 2, 3, 4, 5],
    monthlyRule: 'weekly',
    specificDates: [],
    slots: [],
    bookedMap: {}
  };

  var monthNames = [
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
  ];

  var today = new Date();
  var currentYear = today.getFullYear();
  var currentMonth = today.getMonth();
  var selectedDate = '';
  var selectedSlot = '';

  function pad(n) {
    return n < 10 ? '0' + n : '' + n;
  }

  function formatDateISO(year, month, day) {
    return year + '-' + pad(month + 1) + '-' + pad(day);
  }

  function getSlotsForDate(isoDate) {
    var allSlots = cfg.slots || [];
    if (!isoDate) {
      return allSlots;
    }
    var parts = isoDate.split('-');
    var dObj = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
    var dow = dObj.getDay();

    return allSlots.filter(function (slotObj) {
      if (Array.isArray(slotObj.days) && slotObj.days.length > 0) {
        var allowedDays = slotObj.days.map(function (x) { return parseInt(x, 10); });
        return allowedDays.indexOf(dow) !== -1;
      }
      return true;
    });
  }

  function isDayAvailable(year, month, day) {
    var d = new Date(year, month, day);
    var todayMidnight = new Date(today.getFullYear(), today.getMonth(), today.getDate());
    if (d < todayMidnight) {
      return false;
    }

    var iso = formatDateISO(year, month, day);
    var specific = Array.isArray(cfg.specificDates) ? cfg.specificDates : [];
    var rule = cfg.monthlyRule || 'weekly';

    if (specific.indexOf(iso) !== -1) {
      return true;
    }
    if (rule === 'specific_only') {
      return false;
    }

    var dow = d.getDay();
    var allowed = (cfg.availableDays || [1, 2, 3, 4, 5]).map(function (x) { return parseInt(x, 10); });
    if (allowed.indexOf(dow) === -1) {
      return false;
    }

    // Check nth occurrence of this weekday in the month (1st, 2nd, 3rd, 4th, 5th)
    var nthInMonth = Math.ceil(day / 7);
    if (rule === 'biweekly_2_4') {
      return nthInMonth === 2 || nthInMonth === 4;
    }
    if (rule === 'biweekly_1_3') {
      return nthInMonth === 1 || nthInMonth === 3;
    }

    return getSlotsForDate(iso).length > 0;
  }

  function findFirstAvailableDate(year, month) {
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    for (var d = 1; d <= daysInMonth; d++) {
      if (isDayAvailable(year, month, d)) {
        return formatDateISO(year, month, d);
      }
    }
    return '';
  }

  function updateSelectionBanner() {
    var dateInput = document.getElementById('hc-input-date');
    var slotInput = document.getElementById('hc-input-slot');
    var summaryEl = document.getElementById('hc-selected-summary');

    if (dateInput) {
      dateInput.value = selectedDate;
    }
    if (slotInput) {
      slotInput.value = selectedSlot;
    }
    if (summaryEl) {
      summaryEl.textContent = (selectedDate || 'Selecciona un dia disponible') + ' · ' + (selectedSlot || 'Selecciona horario') + ' (' + cfg.shortCity + ')';
    }
  }

  function renderSlots() {
    var container = document.getElementById('hc-slots-container');
    if (!container) {
      return;
    }
    container.innerHTML = '';

    var slots = getSlotsForDate(selectedDate);
    var bookedForDate = (cfg.bookedMap && cfg.bookedMap[selectedDate]) ? cfg.bookedMap[selectedDate] : [];

    if (!selectedSlot && slots.length > 0) {
      for (var i = 0; i < slots.length; i++) {
        if (bookedForDate.indexOf(slots[i].time) === -1) {
          selectedSlot = slots[i].time;
          break;
        }
      }
    }

    slots.forEach(function (slotObj) {
      var isBooked = bookedForDate.indexOf(slotObj.time) !== -1;
      var isSelected = !isBooked && selectedSlot === slotObj.time;

      var card = document.createElement('div');
      card.className = 'hc-slot-card' + (isSelected ? ' is-selected' : '') + (isBooked ? ' is-booked' : '');

      var left = document.createElement('div');
      left.className = 'hc-slot-left';

      var icon = document.createElement('div');
      icon.className = 'hc-slot-icon';
      icon.textContent = slotObj.icon || slotObj.time.slice(0, 2);

      var textWrap = document.createElement('div');
      var title = document.createElement('span');
      title.className = 'hc-slot-title';
      title.textContent = slotObj.time;

      var sub = document.createElement('span');
      sub.className = 'hc-slot-sub';
      sub.textContent = (slotObj.sub || 'Consulta de Terapia') + (isBooked ? ' · Reservado' : ' · Disponible');

      textWrap.appendChild(title);
      textWrap.appendChild(sub);

      left.appendChild(icon);
      left.appendChild(textWrap);

      var arrow = document.createElement('div');
      arrow.className = 'hc-slot-arrow';
      arrow.textContent = isBooked ? '×' : '›';

      card.appendChild(left);
      card.appendChild(arrow);

      if (!isBooked) {
        card.addEventListener('click', function () {
          selectedSlot = slotObj.time;
          renderSlots();
          updateSelectionBanner();
        });
      }

      container.appendChild(card);
    });

    updateSelectionBanner();
  }

  function renderCalendar() {
    var monthLabel = document.getElementById('hc-cal-month-label');
    var daysGrid = document.getElementById('hc-cal-days-grid');
    if (!monthLabel || !daysGrid) {
      return;
    }

    monthLabel.textContent = monthNames[currentMonth] + ' ' + currentYear;
    daysGrid.innerHTML = '';

    var firstDay = new Date(currentYear, currentMonth, 1).getDay();
    var startOffset = (firstDay === 0) ? 6 : firstDay - 1;
    var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    for (var i = 0; i < startOffset; i++) {
      var emptyCell = document.createElement('span');
      emptyCell.className = 'hc-cal-day is-empty';
      emptyCell.textContent = '';
      daysGrid.appendChild(emptyCell);
    }

    for (var day = 1; day <= daysInMonth; day++) {
      (function (dNum) {
        var iso = formatDateISO(currentYear, currentMonth, dNum);
        var avail = isDayAvailable(currentYear, currentMonth, dNum);
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.textContent = pad(dNum);

        var cls = 'hc-cal-day';
        if (avail) {
          cls += ' is-available';
        } else {
          cls += ' is-disabled';
        }
        if (iso === selectedDate) {
          cls += ' is-selected';
        }
        btn.className = cls;

        if (avail) {
          btn.addEventListener('click', function () {
            selectedDate = iso;
            selectedSlot = '';
            renderCalendar();
            renderSlots();
          });
        } else {
          btn.disabled = true;
        }

        daysGrid.appendChild(btn);
      })(day);
    }
  }

  function initMobileMenu() {
    var toggle = document.getElementById('hc-mobile-menu-toggle');
    var nav = document.getElementById('hc-main-nav');
    if (!toggle || !nav) {
      return;
    }
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  function initBookingForm() {
    var form = document.getElementById('hc-booking-form');
    var feedback = document.getElementById('hc-booking-feedback');
    var waBtn = document.getElementById('hc-direct-wa-btn');

    if (!form) {
      return;
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!feedback) {
        return;
      }

      var submitBtn = form.querySelector('button[type="submit"]');
      var originalText = submitBtn ? submitBtn.textContent : 'Reservar Cita';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Registrando cita...';
      }

      var formData = new FormData(form);
      formData.append('action', 'hc_book_appointment');
      formData.append('nonce', cfg.nonce);

      fetch(cfg.ajaxUrl, {
        method: 'POST',
        body: formData
      })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
          }
          feedback.classList.add('is-visible');
          if (res && res.success) {
            feedback.className = 'hc-form-feedback is-visible is-success';
            feedback.innerHTML = '';
            var msgP = document.createElement('div');
            msgP.textContent = res.data.message;
            feedback.appendChild(msgP);

            if (res.data.whatsappUrl) {
              var waLink = document.createElement('a');
              waLink.href = res.data.whatsappUrl;
              waLink.target = '_blank';
              waLink.rel = 'noopener';
              waLink.className = 'hc-btn hc-btn-mint hc-btn-sm';
              waLink.style.marginTop = '10px';
              waLink.textContent = 'Enviar confirmacion por WhatsApp (' + cfg.whatsappDisplay + ')';
              feedback.appendChild(waLink);
            }

            if (res.data.bookedMap) {
              cfg.bookedMap = res.data.bookedMap;
              selectedSlot = '';
              renderSlots();
            }
            form.reset();
            updateSelectionBanner();
          } else {
            feedback.className = 'hc-form-feedback is-visible is-error';
            feedback.textContent = (res && res.data && res.data.message) ? res.data.message : 'Ocurrio un error al registrar la cita.';
          }
        })
        .catch(function () {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
          }
          feedback.className = 'hc-form-feedback is-visible is-error';
          feedback.textContent = 'Error de conexion. Puedes escribirnos directamente por WhatsApp al ' + cfg.whatsappDisplay;
        });
    });

    if (waBtn) {
      waBtn.addEventListener('click', function () {
        var nameVal = (document.getElementById('hc-field-name') || {}).value || '';
        var modVal = (document.getElementById('hc-field-modality') || {}).value || 'Presencial';
        var msg = 'Hola Psic. Angelica De Gennaro, deseo consultar disponibilidad en la sede ' +
          cfg.shortCity + ' para el dia ' + (selectedDate || 'proximo disponible') +
          ' en el horario ' + (selectedSlot || 'a convenir') + ' (' + modVal + ').' +
          (nameVal ? ' Mi nombre es ' + nameVal + '.' : '');
        waBtn.href = 'https://wa.me/' + cfg.whatsappNumber + '?text=' + encodeURIComponent(msg);
      });
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    initMobileMenu();
    selectedDate = findFirstAvailableDate(currentYear, currentMonth);
    if (!selectedDate) {
      currentMonth++;
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      selectedDate = findFirstAvailableDate(currentYear, currentMonth);
    }
    renderCalendar();
    renderSlots();
    initBookingForm();

    var prevBtn = document.getElementById('hc-cal-prev');
    var nextBtn = document.getElementById('hc-cal-next');

    if (prevBtn) {
      prevBtn.addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
          currentMonth = 11;
          currentYear--;
        }
        selectedDate = findFirstAvailableDate(currentYear, currentMonth);
        selectedSlot = '';
        renderCalendar();
        renderSlots();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
          currentMonth = 0;
          currentYear++;
        }
        selectedDate = findFirstAvailableDate(currentYear, currentMonth);
        selectedSlot = '';
        renderCalendar();
        renderSlots();
      });
    }
  });
})();
