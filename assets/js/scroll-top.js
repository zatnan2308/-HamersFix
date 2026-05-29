/* HamersFix — scroll to top. Extracted from mocks/Home-desktop.html. */
(function () {
  'use strict';
  var btn = document.getElementById('scrollTopBtn');
  if (!btn) return;
  btn.hidden = false;
  var update = function () {
    if (window.scrollY > 400) btn.classList.add('is-visible');
    else btn.classList.remove('is-visible');
  };
  update();
  window.addEventListener('scroll', update, { passive: true });
  btn.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
})();
