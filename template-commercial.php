<?php
/**
 * Template Name: Commercial
 * Transferred pixel-perfect from Commercial.html. Global chrome + phone/booking/email
 * are dynamic (Theme Settings); section copy is static pending ACF-ization.
 * @package HamersFix
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<main id="main">

  <nav class="crumbs" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url("/")); ?>">Home</a><span>›</span><b>Commercial</b></nav>

  <!-- 1 · HERO -->
  <section class="c-hero" aria-labelledby="hero-h">
    <div class="c-hero__grid">
      <div>
        <span class="hero__eyebrow"><span class="pulse"></span>4.9 Google rating · Licensed &amp; Insured</span>
        <h1 id="hero-h">Commercial appliance repair in <em>Northeast Georgia</em></h1>
        <p class="lede">Restaurants, cafés, offices, rentals, and local businesses — we help keep commercial refrigeration, kitchen equipment, and laundry running.</p>

        <div class="issues">
          <span>Refrigeration issues</span>
          <span>Cooking equipment</span>
          <span>Laundry / dishwashing</span>
          <span>Downtime emergency</span>
        </div>

        <div class="ctas">
          <a class="btn btn--cta btn--lg" href="<?php echo esc_url(hf_booking_url()); ?>">Schedule Service</a>
          <a class="btn btn--ghost btn--lg" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
            Call Now
          </a>
        </div>
        <p class="note">Not sure what's wrong? Just describe the symptoms — we'll help guide you.</p>

        <div class="qpills">
          <span>Same-day availability</span>
          <span>Residential &amp; commercial</span>
          <span>Transparent pricing</span>
        </div>
      </div>

      <figure class="c-hero__photo">
        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1100&auto=format&fit=crop&q=80"
             alt="Commercial kitchen with stainless steel appliances"
             loading="eager" fetchpriority="high">
        <span class="badge">B2B · 24/7 emergency</span>
        <div class="tag">
          <div class="lbl">Commercial dispatch</div>
          <h3>Restaurants · cafés · laundromats · property managers</h3>
        </div>
      </figure>
    </div>
  </section>

  <!-- 2 · OUR SERVICES (3 cards) -->
  <section class="s" aria-labelledby="svc-h">
    <div class="s__head">
      <span class="eyebrow">Our services</span>
      <h2 id="svc-h">Commercial repairs we offer</h2>
      <p>Choose the appliance or equipment you need help with.</p>
    </div>
    <div class="s__body">
      <div class="com-svc-grid">

        <a class="com-svc" href="#book">
          <div class="com-svc__art" style="background: linear-gradient(135deg, #0B4F9A, #062B57);">
            <div class="ic"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="20" height="24" rx="2"/><line x1="6" y1="14" x2="26" y2="14"/><line x1="9" y1="8" x2="9" y2="11"/></svg></div>
          </div>
          <div class="com-svc__bd">
            <h3>Commercial refrigeration</h3>
            <p>Reach-ins, walk-ins, prep tables, ice makers, undercounter &amp; display units.</p>
            <div class="chips"><span>Temperature loss</span><span>Compressor</span><span>Ice makers</span></div>
            <div class="more"><span>Learn more</span><span>→</span></div>
          </div>
        </a>

        <a class="com-svc" href="#book">
          <div class="com-svc__art" style="background: linear-gradient(135deg, #C7501A, #082C58);">
            <div class="ic"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="5" width="22" height="22" rx="2"/><rect x="9" y="10" width="14" height="13" rx="1"/><circle cx="11" cy="8" r=".8"/><circle cx="16" cy="8" r=".8"/></svg></div>
          </div>
          <div class="com-svc__bd">
            <h3>Commercial kitchen equipment</h3>
            <p>Ovens, ranges, grills, fryers, steamers, mixers, prep equipment.</p>
            <div class="chips"><span>Heat / ignition</span><span>Controls</span><span>Mechanical</span></div>
            <div class="more"><span>Learn more</span><span>→</span></div>
          </div>
        </a>

        <a class="com-svc" href="#book">
          <div class="com-svc__art" style="background: linear-gradient(135deg, #1F7A4C, #062B57);">
            <div class="ic"><svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="18" r="7"/><circle cx="16" cy="18" r="3"/></svg></div>
          </div>
          <div class="com-svc__bd">
            <h3>Commercial laundry &amp; dishwashers</h3>
            <p>Washers, dryers, dishwashers, glasswashers, ironing equipment.</p>
            <div class="chips"><span>Drain / fill</span><span>Heat</span><span>Error codes</span></div>
            <div class="more"><span>Learn more</span><span>→</span></div>
          </div>
        </a>

      </div>
    </div>
  </section>

  <!-- 3 · COMMON DOWNTIME -->
  <section class="s s--bg" aria-labelledby="down-h">
    <div class="s__head">
      <span class="eyebrow">Common downtime</span>
      <h2 id="down-h">Commercial equipment issues we see most</h2>
      <p>The most frequent commercial repair calls — restaurants, cafés, rentals, and local businesses.</p>
    </div>
    <div class="s__body">
      <div class="down-grid">
        <div class="down-card">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2"/><line x1="4" y1="11" x2="20" y2="11"/></svg></div>
          <h3>Walk-in temperature loss</h3>
          <p>Walk-in coolers and freezers warming up with product inside.</p>
        </div>
        <div class="down-card">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2"/></svg></div>
          <h3>Compressor / refrigeration</h3>
          <p>Reach-ins, prep tables, ice machines short-cycling or down.</p>
        </div>
        <div class="down-card">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c-3 5-6 9-6 12a6 6 0 0 0 12 0c0-3-3-7-6-12z"/></svg></div>
          <h3>Cooking line issues</h3>
          <p>Ovens, fryers, grills, and steamers losing heat or controls.</p>
        </div>
        <div class="down-card">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="12" height="16" rx="2"/><circle cx="12" cy="12" r="4"/></svg></div>
          <h3>Commercial laundry</h3>
          <p>Washers, dryers, and dishwashers not draining or heating.</p>
        </div>
        <div class="down-card">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l4 2"/></svg></div>
          <h3>Mechanical failure</h3>
          <p>Loud bearings, motors, fans, or vibration in commercial gear.</p>
        </div>
        <div class="down-card">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="7" y1="9" x2="17" y2="9"/><line x1="7" y1="13" x2="13" y2="13"/></svg></div>
          <h3>Controls / sensors</h3>
          <p>Error codes, electronic controls, or safety lockouts.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 4 · TRUST & UPTIME -->
  <section class="s" aria-labelledby="trust-h">
    <div class="s__body">
      <div class="trust-band">
        <div class="trust-band__head">
          <span class="eyebrow">Trust &amp; uptime</span>
          <h2 id="trust-h">Clear, friendly commercial equipment support</h2>
          <p>Downtime costs money. We work to get you scheduled fast, explain the issue clearly, and respect your operating hours.</p>
        </div>
        <div class="pillars">
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
            <div class="val">Licensed</div>
            <div class="lbl">+ Bonded &amp; Insured</div>
            <div class="sub">$2M general liability + workers' comp on every employee</div>
          </div>
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15 9 22 10 17 15 18 22 12 18 6 22 7 15 2 10 9 9 12 2"/></svg></div>
            <div class="val">4.9★</div>
            <div class="lbl">Local reviews</div>
            <div class="sub">Verified rating from Northeast Georgia customers</div>
          </div>
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></div>
            <div class="val">Same-day</div>
            <div class="lbl">Availability</div>
            <div class="sub">Subject to your location, schedule, and equipment</div>
          </div>
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 9v12h14V9"/><rect x="9" y="13" width="6" height="8"/></svg></div>
            <div class="val">Both</div>
            <div class="lbl">Residential + Commercial</div>
            <div class="sub">Homes, restaurants, cafés, rentals, offices</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5 · BRANDS -->
  <section class="s s--bg" aria-labelledby="brands-h">
    <div class="s__head">
      <span class="eyebrow">Brands we service</span>
      <h2 id="brands-h">Commercial equipment brands we service</h2>
      <p>Selected commercial refrigeration, kitchen, and laundry equipment brands used by Northeast Georgia restaurants, cafés, and local businesses.</p>
    </div>
    <div class="s__body">
      <div class="com-brand-card">
        <div class="head">
          <div>
            <h3>Commercial equipment</h3>
            <div class="meta">Local business equipment · Restaurants · Cafés · Rentals</div>
          </div>
        </div>
        <div class="com-brand-list">
          <span>True</span><span>Hoshizaki</span><span>Traulsen</span><span>Beverage-Air</span>
          <span>Turbo Air</span><span>Manitowoc</span><span>Scotsman</span><span>Hobart</span>
          <span>Vulcan</span><span>Blodgett</span><span>Garland</span><span>Southbend</span>
        </div>
        <div class="footnote">Built for restaurants, cafés, rentals, and busy local commercial spaces. Brand names are used for identification purposes only. HamersFix is an independent appliance repair service unless otherwise stated.</div>
      </div>

      <div class="ask-band">
        <div class="tx">
          <h4>Don't see your brand?</h4>
          <p>There's a good chance we can still help. Tell us your appliance brand and model, and we'll point you in the right direction. No pressure — just clear guidance.</p>
        </div>
        <a class="btn btn--cta" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">Ask About My Brand</a>
      </div>
    </div>
  </section>

  <!-- 6 · WHAT TO EXPECT -->
  <section class="s" aria-labelledby="proc-h">
    <div class="s__head">
      <span class="eyebrow">Simple, clear, stress-free repair</span>
      <h2 id="proc-h">What to expect when you book service</h2>
      <p>From your first call to diagnosis and repair, we keep commercial service clear and minimize downtime.</p>
    </div>
    <div class="s__body">
      <div class="proc">
        <div class="pstep">
          <h3>Schedule service</h3>
          <p>Call us or request service online and describe the equipment issue.</p>
          <div class="tag">Online booking or phone support</div>
        </div>
        <div class="pstep">
          <h3>We confirm the details</h3>
          <p>We review the equipment type, brand, location, and operating hours.</p>
          <div class="tag">Clear communication before the visit</div>
        </div>
        <div class="pstep">
          <h3>Diagnosis &amp; clear estimate</h3>
          <p>A technician checks the equipment, explains the issue, and gives an estimate.</p>
          <div class="tag">No confusing surprises</div>
        </div>
        <div class="pstep">
          <h3>Repair &amp; back to service</h3>
          <p>Once approved, we complete the repair when possible to get you running again.</p>
          <div class="tag">Minimize downtime</div>
        </div>
      </div>
    </div>
  </section>

  <!-- 7 · LOCAL COVERAGE -->
  <section class="s s--bg" aria-labelledby="areas-h">
    <div class="s__head">
      <span class="eyebrow">Local coverage</span>
      <h2 id="areas-h">Commercial appliance repair across Northeast Georgia</h2>
      <p>HamersFix helps local businesses across Gwinnett, Barrow, Walton, Jackson and Oconee counties get equipment repair support when they need it.</p>
    </div>
    <div class="s__body">
      <div class="areas-list">
        <a class="area-card" href="<?php echo esc_url(hf_page_url("service-areas")); ?>">
          <div class="num">Area 1 · HQ region</div>
          <h4>Bethlehem &amp; Gwinnett Core</h4>
          <div class="cities">Bethlehem · Lawrenceville · Snellville · Dacula · Grayson · Auburn</div>
          <div class="arrow"><span>View area</span><span>→</span></div>
        </a>
        <a class="area-card" href="<?php echo esc_url(hf_page_url("service-areas")); ?>">
          <div class="num">Area 2 · Daily routes</div>
          <h4>Barrow &amp; Jackson</h4>
          <div class="cities">Winder · Statham · Braselton · Hoschton</div>
          <div class="arrow"><span>View area</span><span>→</span></div>
        </a>
        <a class="area-card" href="<?php echo esc_url(hf_page_url("service-areas")); ?>">
          <div class="num">Area 3 · Outer ring</div>
          <h4>Walton &amp; Oconee</h4>
          <div class="cities">Monroe · Loganville · Bogart · Watkinsville</div>
          <div class="arrow"><span>View area</span><span>→</span></div>
        </a>
        <a class="area-card" href="<?php echo esc_url(hf_page_url("service-areas")); ?>">
          <div class="num">Area 4 · Full map</div>
          <h4>14 cities · 18 ZIPs</h4>
          <div class="cities">Full coverage map with response times by zone</div>
          <div class="arrow"><span>View map</span><span>→</span></div>
        </a>
      </div>

      <div class="areas-cta">
        <p><b>Don't see your city?</b> Call us and we'll check availability for your exact location.</p>
        <a class="btn btn--cta" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">Call <?php echo esc_html(hf_phone_display()); ?></a>
      </div>
    </div>
  </section>

  <!-- 8 · FAQ -->
  <section class="s" aria-labelledby="faq-h">
    <div class="s__head">
      <span class="eyebrow">FAQ</span>
      <h2 id="faq-h">Questions before you book?</h2>
      <p>Have questions about scheduling, pricing, brands, or service areas? Here are quick answers to help you feel confident before booking.</p>
    </div>
    <div class="s__body">
      <div class="faq-list">
        <details open>
          <summary>Do you service commercial appliances and equipment?</summary>
          <p>Yes. We service commercial refrigeration, kitchen equipment, and laundry / dishwashing equipment for restaurants, cafés, offices, and local businesses across Northeast Georgia.</p>
        </details>
        <details>
          <summary>How fast can you respond to commercial equipment downtime?</summary>
          <p>Same-day availability for most commercial calls. After-hours emergency dispatch is available for active commercial accounts — call our line directly and we'll route the closest technician.</p>
        </details>
        <details>
          <summary>What types of commercial refrigeration do you service?</summary>
          <p>Reach-in coolers and freezers, walk-ins, prep tables, ice makers, undercounter units, display cases, beverage units. We handle compressor work, temperature loss, ice production issues, and electronic controls.</p>
        </details>
        <details>
          <summary>Do you service commercial kitchen and cooking equipment?</summary>
          <p>Yes — ovens, ranges, grills, fryers, steamers, mixers, and prep equipment. Common issues include heat / ignition problems, electronic controls, and mechanical failures.</p>
        </details>
        <details>
          <summary>How is pricing handled for commercial repair?</summary>
          <p>We provide a clear estimate after diagnosis. Multi-unit operators and property managers get volume pricing; Net-30 terms available for active commercial accounts.</p>
        </details>
        <details>
          <summary>Do you offer maintenance contracts for restaurants?</summary>
          <p>Yes. Preventative maintenance contracts are available for restaurants, cafés, and multi-unit operators — quarterly or semi-annual visits to inspect, clean, and replace common wear parts before they fail.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- 9 · FINAL CTA -->
  <section class="final-cta" id="book" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow">Ready when you need help</span>
        <h2 id="cta-h">Let's get your equipment running again.</h2>
        <p>Tell us what's going on with your equipment. We'll guide you to the right next step for your restaurant, café, or business. Not sure what's wrong? Just describe the symptoms — we'll help guide you.</p>
      </div>
      <div class="phone-card">
        <div class="lbl">Commercial dispatch</div>
        <a class="num" href="tel:<?php echo esc_attr(hf_phone_link()); ?>"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg><div><div class="digits"><?php echo esc_html(hf_phone_display()); ?></div><div class="sub">Real person · &lt; 60 sec wait</div></div></a>
        <div class="or">or</div>
        <a class="book" href="<?php echo esc_url(hf_booking_url()); ?>">Schedule Service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        <div class="hours"><span class="dot"></span>Open now · Mon–Fri 7 AM–9 PM · Sat 8 AM–8 PM · Sun 10 AM–8 PM</div>
      </div>
    </div>
  </section>

</main>
<?php get_footer();
