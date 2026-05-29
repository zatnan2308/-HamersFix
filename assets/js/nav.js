/* HamersFix — navigation: mega-menu, mobile drawer, header shadow.
   Extracted verbatim (behavior-preserving) from mocks/Home-desktop.html. */
(function () {
  'use strict';

  /* ---- Mega-menu: hover + click + ESC + focus management ---- */
  (function () {
    var items = document.querySelectorAll('.nav-item[data-menu]');
    var closeT;

    function closeAll(except) {
      items.forEach(function (it) {
        if (it !== except) {
          it.classList.remove('is-open');
          var btn = it.querySelector('.nav-item__link');
          if (btn) btn.setAttribute('aria-expanded', 'false');
        }
      });
    }

    items.forEach(function (item) {
      var btn = item.querySelector('.nav-item__link');
      var mega = item.querySelector('.mega');
      if (!btn || !mega) return;

      var open = function () {
        clearTimeout(closeT);
        closeAll(item);
        item.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
      };
      var close = function () {
        item.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'false');
      };
      var closeWithDelay = function () { closeT = setTimeout(close, 150); };

      item.addEventListener('mouseenter', open);
      item.addEventListener('mouseleave', closeWithDelay);
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        item.classList.contains('is-open') ? close() : open();
      });
      btn.addEventListener('focus', open);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeAll();
    });
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.nav-item')) closeAll();
    });
  })();

  /* ---- Mobile drawer ---- */
  (function () {
    var burger = document.getElementById('burger');
    var drawer = document.getElementById('drawer');
    var scrim = document.getElementById('drawerScrim');
    var closeBtn = document.getElementById('drawerClose');
    if (!burger || !drawer || !scrim) return;

    var open = function () {
      drawer.classList.add('is-open');
      scrim.classList.add('is-open');
      burger.setAttribute('aria-expanded', 'true');
      drawer.setAttribute('aria-hidden', 'false');
      document.body.classList.add('drawer-locked');
    };
    var close = function () {
      drawer.classList.remove('is-open');
      scrim.classList.remove('is-open');
      burger.setAttribute('aria-expanded', 'false');
      drawer.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('drawer-locked');
    };

    burger.addEventListener('click', function () {
      drawer.classList.contains('is-open') ? close() : open();
    });
    scrim.addEventListener('click', close);
    if (closeBtn) closeBtn.addEventListener('click', close);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });

    // Close on internal link click
    drawer.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { setTimeout(close, 80); });
    });
  })();

  /* ---- Header shadow on scroll ---- */
  (function () {
    var hd = document.getElementById('siteHeader');
    if (!hd) return;
    var update = function () {
      if (window.scrollY > 4) hd.classList.add('is-scrolled');
      else hd.classList.remove('is-scrolled');
    };
    update();
    window.addEventListener('scroll', update, { passive: true });
  })();
})();
