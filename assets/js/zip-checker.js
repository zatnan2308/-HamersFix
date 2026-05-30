/* HamersFix — real ZIP coverage checker.
   Replaces the mock's fake "always covered" behavior. Reads coverage data
   and copy from window.HF_ZIP (localized in inc/enqueue.php). Client-side:
   the ZIP list is public marketing info, so no round-trip is needed. */
(function () {
  'use strict';

  var form = document.getElementById('hf-zipbox');
  if (!form) return;

  var input = form.querySelector('input[name="zip"]');
  var msg = form.querySelector('.zipbox__msg');
  if (!input || !msg) return;

  var data = window.HF_ZIP || {};
  // Force strings so the strict indexOf() match works even if a ZIP arrives as
  // a number (PHP can emit numeric array keys/values as JSON numbers).
  var zips = (Array.isArray(data.zips) ? data.zips : []).map(function (z) { return String(z); });

  var COPY = {
    success: data.success || "You're covered — earliest slot today, 4–6 PM",
    fail: data.fail || "We're not in that ZIP yet — call us and we'll check the nearest crew.",
    invalid: data.invalid || 'Please enter a valid 5-digit ZIP code.'
  };

  var ICONS = {
    ok: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',
    warn: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><line x1="12" y1="8" x2="12" y2="13"/><line x1="12" y1="16.4" x2="12.01" y2="16.4"/></svg>'
  };

  function escapeText(s) {
    var d = document.createElement('div');
    d.textContent = String(s == null ? '' : s);
    return d.innerHTML;
  }

  function show(state, text, extraHTML) {
    form.classList.add('has-msg');
    msg.className = 'zipbox__msg is-' + state;
    var icon = state === 'ok' ? ICONS.ok : ICONS.warn;
    msg.innerHTML = icon + '<span>' + escapeText(text) + (extraHTML || '') + '</span>';
    msg.setAttribute('tabindex', '-1');
    try { msg.focus({ preventScroll: true }); } catch (e) { msg.focus(); }
  }

  function reset() {
    form.classList.remove('has-msg');
    input.classList.remove('input--err');
    msg.className = 'zipbox__msg';
    msg.innerHTML = '';
    msg.removeAttribute('tabindex');
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var raw = (input.value || '').trim();

    if (!/^\d{5}$/.test(raw)) {
      input.classList.add('input--err');
      show('err', COPY.invalid);
      return;
    }
    input.classList.remove('input--err');

    if (zips.indexOf(raw) !== -1) {
      var book = '';
      if (data.bookingUrl && data.bookingUrl !== '#') {
        book = ' <a href="' + encodeURI(data.bookingUrl) + '">Book now →</a>';
      }
      show('ok', COPY.success, book);
    } else {
      var call = '';
      if (data.phoneDisplay && data.phoneLink) {
        call = ' <a href="tel:' + escapeText(data.phoneLink) + '">' + escapeText(data.phoneDisplay) + '</a>';
      }
      show('warn', COPY.fail, call);
    }
  });

  // Clear the message as soon as the visitor edits the field again.
  input.addEventListener('input', function () {
    if (form.classList.contains('has-msg')) reset();
  });
})();
