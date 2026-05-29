<?php
/**
 * 404 — not found.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

get_header();
?>
<main id="main">
  <section class="s" style="text-align:center">
    <div class="s__body">
      <span class="eyebrow" style="color:var(--brand-700)">404</span>
      <h1 class="t-display-m" style="margin:12px 0"><?php esc_html_e('Page not found', 'hamersfix'); ?></h1>
      <p class="t-muted" style="max-width:520px;margin:0 auto 28px"><?php esc_html_e('That page moved or never existed. Call us and we\'ll point you the right way.', 'hamersfix'); ?></p>
      <p style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
        <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr(hf_phone_link()); ?>"><?php echo esc_html(sprintf(__('Call %s', 'hamersfix'), hf_phone_display())); ?></a>
        <a class="btn btn--ghost btn--lg" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back home', 'hamersfix'); ?></a>
      </p>
    </div>
  </section>
</main>
<?php
get_footer();
