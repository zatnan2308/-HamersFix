<?php
/**
 * Template Name: Contact
 * Transferred pixel-perfect from Contact.html. Global chrome + phone/booking/email
 * are dynamic (Theme Settings); section copy is static pending ACF-ization.
 * @package HamersFix
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<main id="main">

  <nav class="crumbs" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url("/")); ?>">Home</a><span>›</span><b>Contact</b></nav>

  <!-- 1 · HERO -->
  <section class="c-hero" aria-labelledby="hero-h">
    <div class="c-hero__inner">
      <span class="hero__eyebrow"><span class="pulse"></span>Open now · &lt; 60-second wait</span>
      <h1 id="hero-h">Get in touch — <em>four ways</em>, your call.</h1>
      <p class="lede">Phone is fastest. Booking online is most accurate. Forms are for non-urgent stuff. Pick what fits.</p>
    </div>
  </section>

  <!-- 2 · CHANNELS GRID -->
  <div class="channels">
    <a class="ch --primary" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
      <span class="badge"><span class="dot"></span>Fastest</span>
      <div class="ic"><svg viewBox="0 0 24 24" class="ic-stroke"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg></div>
      <h3>Call us</h3>
      <p class="ds">Real dispatcher, no IVR. Most callers reach a person in under 60 seconds. Best for same-day &amp; emergency.</p>
      <div class="action"><b><?php echo esc_html(hf_phone_display()); ?></b> <span>→</span></div>
    </a>

    <a class="ch" href="<?php echo esc_url(hf_booking_url()); ?>">
      <div class="ic"><svg viewBox="0 0 24 24" class="ic-stroke"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/></svg></div>
      <h3>Book online</h3>
      <p class="ds">6-step flow takes about 60 seconds. Pick appliance, brand, symptom, ZIP, slot. SMS confirmation immediately.</p>
      <div class="action">Start booking <span>→</span></div>
    </a>

    <a class="ch" href="#contact-form">
      <div class="ic"><svg viewBox="0 0 24 24" class="ic-stroke"><path d="M4 6l8 6 8-6M4 6v12h16V6"/></svg></div>
      <h3>Send a message</h3>
      <p class="ds">Quotes, brand-specific questions, warranty paperwork, anything that isn't urgent. We reply within 2 business hours.</p>
      <div class="action">Open form below ↓</div>
    </a>

    <a class="ch" href="#">
      <span class="badge" style="background:var(--cta-100);color:var(--cta-700)">B2B · 24/7</span>
      <div class="ic"><svg viewBox="0 0 24 24" class="ic-stroke"><path d="M3 21l3-3M21 21l-3-3M5 18h14M7 6h10v12H7zM10 6V3M14 6V3"/></svg></div>
      <h3>Commercial line</h3>
      <p class="ds">Restaurants, laundromats, property managers. Emergency dispatch around the clock. Dedicated account manager.</p>
      <div class="action">B2B portal <span>→</span></div>
    </a>
  </div>

  <!-- 3 · WAYS TO REACH US + INFO -->
  <section class="form-section" id="contact-form" aria-labelledby="form-h">
    <div class="form-section__inner">

      <div class="reach-card">
        <span class="eyebrow">Choose your channel</span>
        <h2 id="form-h">Four ways to reach us</h2>
        <p class="sub">No forms on our site — we route everything through real people or our scheduling platform. Pick what works.</p>

        <div class="reach-list">
          <a class="reach-link --cta" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg></div>
            <div class="body">
              <div class="ttl">Residential dispatch</div>
              <div class="val"><?php echo esc_html(hf_phone_display()); ?></div>
              <div class="ds">Real person · &lt; 60-second wait · 7 days a week</div>
            </div>
            <span class="chev">→</span>
          </a>

          <a class="reach-link" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg></div>
            <div class="body">
              <div class="ttl">Commercial line · 24/7</div>
              <div class="val"><?php echo esc_html(hf_phone_display()); ?></div>
              <div class="ds">B2B emergency dispatch · property managers · restaurants</div>
            </div>
            <span class="chev">→</span>
          </a>

          <a class="reach-link --g" href="<?php echo esc_url(hf_booking_url()); ?>" target="_blank" rel="noopener">
            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/></svg></div>
            <div class="body">
              <div class="ttl">Open booking form ↗</div>
              <div class="val" style="color: #1F7A4C">Schedule online</div>
              <div class="ds">60-second flow on our scheduling platform · opens new tab</div>
            </div>
            <span class="chev">→</span>
          </a>

          <a class="reach-link" href="mailto:<?php echo esc_attr(hf_email()); ?>">
            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M4 6l8 6 8-6M4 6v12h16V6"/></svg></div>
            <div class="body">
              <div class="ttl">Email · non-urgent</div>
              <div class="val"><?php echo esc_html(hf_email()); ?></div>
              <div class="ds">Quotes, warranty docs, brand-specific questions · 2-hr reply</div>
            </div>
            <span class="chev">→</span>
          </a>
        </div>

        <div class="note">
          <b>Why no contact form?</b> We've found phone &amp; SMS get you to a real dispatcher 10× faster than a form lying in someone's inbox. For scheduling, our external platform handles SMS confirmations &amp; calendar add — better than an HTML form can.
        </div>
      </div>

      <aside class="info-stack">
        <div class="info-card --dark">
          <h3><span class="ic"><svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>Hours of operation</h3>
          <div class="hours-list">
            <div class="row --today"><span class="day">Monday · Today</span><span class="time">7 AM – 9 PM</span></div>
            <div class="row"><span class="day">Tuesday</span><span class="time">7 AM – 9 PM</span></div>
            <div class="row"><span class="day">Wednesday</span><span class="time">7 AM – 9 PM</span></div>
            <div class="row"><span class="day">Thursday</span><span class="time">7 AM – 9 PM</span></div>
            <div class="row"><span class="day">Friday</span><span class="time">7 AM – 9 PM</span></div>
            <div class="row"><span class="day">Saturday</span><span class="time">8 AM – 6 PM</span></div>
            <div class="row"><span class="day">Sunday</span><span class="time">8 AM – 6 PM</span></div>
          </div>
          <p style="margin-top:14px; font-size: 12.5px;">Commercial (B2B): 24/7 emergency dispatch for active accounts.</p>
        </div>

        <div class="info-card">
          <h3><span class="ic"><svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 22s8-7 8-13a8 8 0 10-16 0c0 6 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg></span>Address &amp; service area</h3>
          <p class="nap-block">
            <b>HamersFix Appliance Repair</b><br>
            [Placeholder Street]<br>
            Bethlehem, GA 30620<br><br>
            Office is by appointment only — we're a service company, not a storefront. Tech &amp; van dispatch happens here.<br><br>
            <a href="<?php echo esc_url(hf_page_url("service-areas")); ?>">See full service area map →</a>
          </p>
        </div>

        <div class="info-card">
          <h3><span class="ic"><svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"/></svg></span>Two phone lines</h3>
          <p class="nap-block">
            <b>Residential:</b> <a href="tel:<?php echo esc_attr(hf_phone_link()); ?>"><?php echo esc_html(hf_phone_display()); ?></a><br>
            <b>Commercial (24/7):</b> <a href="tel:<?php echo esc_attr(hf_phone_link()); ?>"><?php echo esc_html(hf_phone_display()); ?></a><br><br>
            <b>Email:</b> <a href="mailto:<?php echo esc_attr(hf_email()); ?>"><?php echo esc_html(hf_email()); ?></a><br>
            <b>B2B email:</b> <a href="mailto:<?php echo esc_attr(hf_email()); ?>"><?php echo esc_html(hf_email()); ?></a>
          </p>
        </div>
      </aside>

    </div>
  </section>

  <!-- 4 · FINAL CTA -->
  <section class="final-cta" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow">Still here?</span>
        <h2 id="cta-h">Phone is faster than any form.</h2>
        <p>Real dispatcher, no IVR. Average wait under 60 seconds. We answer 7 days a week. Try us.</p>
      </div>
      <div class="phone-card">
        <div class="lbl">Call our dispatcher</div>
        <a class="num" href="tel:<?php echo esc_attr(hf_phone_link()); ?>"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg><div><div class="digits"><?php echo esc_html(hf_phone_display()); ?></div><div class="sub">Residential · &lt; 60 sec wait</div></div></a>
        <div class="or">or</div>
        <a class="book" href="<?php echo esc_url(hf_booking_url()); ?>">Book online — 60 second flow <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        <div class="hours-x"><span class="dot"></span>Open now · Mon–Fri 7 AM–9 PM · Sat 8 AM–8 PM · Sun 10 AM–8 PM</div>
      </div>
    </div>
  </section>

</main>
<?php get_footer();
