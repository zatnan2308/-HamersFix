<?php
/**
 * Template Name: About
 * Transferred pixel-perfect from About.html. Global chrome + phone/booking/email
 * are dynamic (Theme Settings); section copy is static pending ACF-ization.
 * @package HamersFix
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<main id="main">

  <nav class="crumbs" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url("/")); ?>">Home</a><span>›</span><b>About</b></nav>

  <!-- ════════════════════════════════════════════════
       1 · HERO
       ════════════════════════════════════════════════ -->
  <section class="ab-hero" aria-labelledby="hero-h">
    <div class="ab-hero__inner">
      <span class="eyebrow">About HamersFix</span>
      <h1 id="hero-h">Helping <em>Northeast Georgia</em> homes &amp; businesses get back to normal.</h1>
      <p class="lede">HamersFix provides reliable appliance repair for homes, rentals, restaurants, cafés, and local businesses across Gwinnett, Barrow &amp; the Athens area. When an appliance breaks down, we help make the next step simple, clear, and less stressful.</p>
      <div class="ctas">
        <a class="btn btn--cta btn--lg" href="<?php echo esc_url(hf_booking_url()); ?>">Schedule Service</a>
        <a class="btn btn--ghost btn--lg" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
          <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
          Call <?php echo esc_html(hf_phone_display()); ?>
        </a>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       2 · WHO WE ARE
       ════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="who-h">
    <div class="s__head">
      <span class="eyebrow">Who we are</span>
      <h2 id="who-h">A local appliance repair team built around clear service</h2>
    </div>
    <div class="s__body">
      <div class="who-grid">
        <div>
          <p>HamersFix was created to make appliance repair feel simple, professional, and easy to understand. Whether you are dealing with a refrigerator that is not cooling, a washer that will not drain, an oven that will not heat, or commercial equipment that needs attention, our goal is to help you move forward with confidence.</p>
          <p>We work with homeowners, landlords, restaurants, cafés, offices, and local businesses across Northeast Georgia. Our approach is simple: listen carefully, diagnose the issue, explain the repair options clearly, and help you get your home or business running smoothly again.</p>
          <div class="who-tags">
            <span>Homes &amp; rental properties</span>
            <span>Restaurants &amp; cafés</span>
            <span>Local businesses</span>
            <span>Residential &amp; commercial</span>
          </div>
        </div>
        <aside class="who-vis" aria-hidden="true">
          <div class="grid-bg"></div>
          <span class="lbl">Local service for everyday appliance problems</span>
          <h3>One team. One number. One promise.</h3>
          <ul>
            <li>
              <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12l3-9 4 6 4-3 4 9 3-3"/></svg></span>
              <span class="tx">Same-day service available<small>Most ZIPs · book before noon</small></span>
            </li>
            <li>
              <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-7 8-13a8 8 0 10-16 0c0 6 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg></span>
              <span class="tx">14 cities · 18 ZIPs<small>Gwinnett, Barrow &amp; Athens area</small></span>
            </li>
            <li>
              <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              <span class="tx">1-year parts &amp; labor warranty<small>On every completed repair</small></span>
            </li>
            <li>
              <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>
              <span class="tx">Open 7 days a week<small>Mon–Fri 7 AM–9 PM · weekends too</small></span>
            </li>
          </ul>
        </aside>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       3 · OUR VALUES
       ════════════════════════════════════════════════ -->
  <section class="s s--bg" aria-labelledby="vals-h">
    <div class="s__head">
      <span class="eyebrow">Our values</span>
      <h2 id="vals-h">Service that feels clear, respectful, and reliable</h2>
      <p>Appliance problems can interrupt real life. Our values are built around making the repair experience easier from the first call to the final update.</p>
    </div>
    <div class="s__body">
      <div class="values">
        <div class="value">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
          <h3>Clear communication</h3>
          <p>We explain what we find, what your options are, and what to expect before repair work begins.</p>
        </div>
        <div class="value">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 9v12h14V9"/></svg></div>
          <h3>Respect for your home</h3>
          <p>We treat homes, kitchens, laundry rooms, and workspaces with care and professionalism.</p>
        </div>
        <div class="value">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9 9c0-1.5 1.5-3 3-3s3 1.5 3 3-3 2-3 4"/><circle cx="12" cy="17" r=".5" fill="currentColor"/></svg></div>
          <h3>Honest guidance</h3>
          <p>You don't need to know the exact problem before calling. Tell us the symptoms and we'll help guide you.</p>
        </div>
        <div class="value">
          <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></div>
          <h3>Fast local support</h3>
          <p>Same-day appointments may be available depending on location, schedule, and appliance issue.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       4 · TRUST & PEACE OF MIND
       ════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="trust-h">
    <div class="s__body">
      <div class="trust-band">
        <div class="trust-band__head">
          <span class="eyebrow">Trust &amp; peace of mind</span>
          <h2 id="trust-h">Licensed, insured, and ready to help</h2>
          <p>Choosing an appliance repair company means trusting someone in your home or business. HamersFix is built around professionalism, clear communication, and reliable local service.</p>
        </div>
        <div class="pillars">
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
            <div class="val">Licensed</div>
            <div class="lbl">+ Bonded &amp; Insured</div>
            <div class="sub">Licensing in progress · $2M general liability + workers' comp</div>
          </div>
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15 9 22 10 17 15 18 22 12 18 6 22 7 15 2 10 9 9 12 2"/></svg></div>
            <div class="val">4.9★</div>
            <div class="lbl">Local reviews</div>
            <div class="sub">Verified Google rating across Gwinnett &amp; Barrow customers</div>
          </div>
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></div>
            <div class="val">Same-day</div>
            <div class="lbl">Availability</div>
            <div class="sub">Subject to your location, schedule, and appliance issue</div>
          </div>
          <div class="pillar">
            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 9v12h14V9"/><rect x="9" y="13" width="6" height="8"/></svg></div>
            <div class="val">Both</div>
            <div class="lbl">Residential + Commercial</div>
            <div class="sub">Homes, rentals, restaurants, cafés, offices, local businesses</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       5 · HOMES & BUSINESSES
       ════════════════════════════════════════════════ -->
  <section class="s s--bg" id="commercial" aria-labelledby="hb-h">
    <div class="s__head">
      <span class="eyebrow">Homes &amp; businesses</span>
      <h2 id="hb-h">Repair support for everyday homes and local businesses</h2>
      <p>From family kitchens and laundry rooms to cafés, restaurants, rentals, and commercial spaces, HamersFix helps keep essential appliances and equipment working.</p>
    </div>
    <div class="s__body">
      <div class="hb-grid">
        <article class="hb-card">
          <div class="photo --res" aria-hidden="true">
            <svg viewBox="0 0 200 140" fill="none">
              <rect x="20" y="10" width="56" height="120" rx="6" fill="currentColor" opacity=".25"/>
              <rect x="22" y="12" width="52" height="38" rx="4" fill="#fff"/>
              <rect x="22" y="54" width="52" height="74" rx="4" fill="#fff"/>
              <rect x="90" y="40" width="48" height="60" rx="4" fill="currentColor" opacity=".25"/>
              <circle cx="114" cy="70" r="14" fill="#fff"/>
              <rect x="148" y="20" width="40" height="100" rx="4" fill="currentColor" opacity=".25"/>
              <rect x="150" y="22" width="36" height="50" rx="3" fill="#fff"/>
              <rect x="150" y="74" width="36" height="44" rx="3" fill="#fff"/>
            </svg>
          </div>
          <span class="eyebrow">Residential</span>
          <h3>Residential appliance repair</h3>
          <p>We help homeowners and landlords with the appliances people rely on every day.</p>
          <ul>
            <li>Refrigerator &amp; Wine Cooler Repair</li>
            <li>Washer &amp; Dryer Repair</li>
            <li>Dishwasher Repair</li>
            <li>Oven, Stove &amp; Cooktop Repair</li>
            <li>Microwave &amp; Small Appliances</li>
          </ul>
          <div class="more"><a href="<?php echo esc_url(home_url("/services/refrigerator-repair/")); ?>">View Residential Services <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg></a></div>
        </article>

        <article class="hb-card">
          <div class="photo --com" aria-hidden="true">
            <svg viewBox="0 0 200 140" fill="none">
              <rect x="20" y="20" width="160" height="100" rx="6" fill="rgba(255,255,255,.12)"/>
              <rect x="30" y="30" width="36" height="80" rx="3" fill="rgba(255,255,255,.25)"/>
              <rect x="74" y="30" width="36" height="80" rx="3" fill="rgba(255,255,255,.18)"/>
              <rect x="118" y="30" width="62" height="80" rx="3" fill="rgba(255,255,255,.25)"/>
              <rect x="124" y="42" width="50" height="14" rx="2" fill="rgba(238,107,31,.4)"/>
              <rect x="124" y="62" width="50" height="14" rx="2" fill="rgba(238,107,31,.4)"/>
              <rect x="124" y="82" width="50" height="14" rx="2" fill="rgba(238,107,31,.4)"/>
              <circle cx="48" cy="55" r="6" fill="#fff"/>
              <circle cx="48" cy="80" r="6" fill="#fff"/>
            </svg>
          </div>
          <span class="eyebrow">Commercial</span>
          <h3>Commercial equipment repair</h3>
          <p>We support local restaurants, cafés, rentals, offices, and business spaces with commercial equipment.</p>
          <ul>
            <li>Commercial Refrigeration</li>
            <li>Commercial Kitchen Equipment</li>
            <li>Commercial Laundry &amp; Dishwashers</li>
          </ul>
          <div class="more"><a href="#">View Commercial Services <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg></a></div>
        </article>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       6 · OUR PROMISE (4-step process)
       ════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="prom-h">
    <div class="s__head">
      <span class="eyebrow">Our promise</span>
      <h2 id="prom-h">We keep appliance repair simple</h2>
      <p>Our goal is to make the service experience clear from the moment you reach out.</p>
    </div>
    <div class="s__body">
      <div class="promise">
        <div class="pstep">
          <h3>Listen first</h3>
          <p>Tell us what's happening with your appliance or equipment.</p>
        </div>
        <div class="pstep">
          <h3>Confirm the details</h3>
          <p>We review the appliance type, brand, location, and preferred timing.</p>
        </div>
        <div class="pstep">
          <h3>Diagnose &amp; explain</h3>
          <p>A technician checks the issue and explains repair options clearly.</p>
        </div>
        <div class="pstep">
          <h3>Help you move forward</h3>
          <p>Once approved, we complete the repair when possible and help get things back to normal.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       7 · LOCAL SERVICE AREAS
       ════════════════════════════════════════════════ -->
  <section class="s s--bg" aria-labelledby="areas-h">
    <div class="s__head">
      <span class="eyebrow">Local service areas</span>
      <h2 id="areas-h">Proudly serving Northeast Georgia and nearby communities</h2>
      <p>HamersFix helps homeowners and local businesses across Gwinnett, Barrow, Walton, Jackson and Oconee counties get appliance repair support when they need it.</p>
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

  <!-- ════════════════════════════════════════════════
       8 · BRANDS & EQUIPMENT
       ════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="brands-h">
    <div class="s__head">
      <span class="eyebrow">Brands &amp; equipment</span>
      <h2 id="brands-h">We service many major appliance brands</h2>
      <p>From everyday home appliances to premium and commercial equipment, HamersFix works with many of the brands Northeast Georgia homes and businesses rely on.</p>
    </div>
    <div class="s__body">
      <div class="brand-cols">
        <div class="brand-col">
          <h3>Everyday home</h3>
          <div class="sub">Mainstream brands</div>
          <ul>
            <li>Whirlpool</li><li>GE</li><li>Samsung</li><li>LG</li>
            <li>KitchenAid</li><li>Maytag</li><li>Frigidaire</li><li>Bosch</li>
          </ul>
        </div>
        <div class="brand-col --prem">
          <h3>Premium</h3>
          <div class="sub">Factory-authorized</div>
          <ul>
            <li>Sub-Zero</li><li>Wolf</li><li>Viking</li>
            <li>Thermador</li><li>Miele</li><li>JennAir</li>
          </ul>
        </div>
        <div class="brand-col">
          <h3>Commercial</h3>
          <div class="sub">B2B equipment</div>
          <ul>
            <li>True</li><li>Hoshizaki</li>
            <li>Vulcan</li><li>Hobart</li><li>Manitowoc</li>
          </ul>
        </div>
      </div>

      <div class="brand-cols__cta">
        <a class="btn btn--primary" href="<?php echo esc_url(hf_page_url("brands")); ?>">View All Brands We Service →</a>
      </div>

      <p class="brand-cols__foot">Brand names are used for identification purposes only. HamersFix is an independent appliance repair service unless otherwise stated.</p>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       9 · FRIENDLY & LOCAL
       ════════════════════════════════════════════════ -->
  <section class="s s--bg" aria-labelledby="friendly-h">
    <div class="s__body">
      <div class="friendly">
        <figure class="friendly__vis" aria-hidden="true">
          <svg viewBox="0 0 240 240" fill="none">
            <circle cx="120" cy="100" r="44" fill="currentColor" opacity=".25"/>
            <circle cx="120" cy="100" r="36" fill="currentColor" opacity=".55"/>
            <rect x="76" y="138" width="88" height="78" rx="12" fill="currentColor" opacity=".4"/>
            <rect x="76" y="138" width="88" height="78" rx="12" fill="currentColor" opacity=".5"/>
            <path d="M120 102l-12 12 12 12 12-12-12-12z" fill="#fff"/>
            <rect x="86" y="160" width="68" height="6" rx="3" fill="#fff" opacity=".8"/>
            <rect x="100" y="174" width="40" height="6" rx="3" fill="#fff" opacity=".6"/>
          </svg>
          <div class="stamp">
            <div class="av">HF</div>
            <div>
              <div class="nm">Local team</div>
              <div class="role">Northeast Georgia</div>
            </div>
          </div>
        </figure>

        <div>
          <span class="eyebrow" style="color:var(--brand-700)">Friendly &amp; local</span>
          <h2 id="friendly-h">Professional help with a friendly local approach</h2>
          <p>Honest, careful service from people who live and work in the Northeast Georgia area.</p>
          <ul>
            <li>
              <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              Clear explanations of every issue we find
            </li>
            <li>
              <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              Estimates shared before any work begins
            </li>
            <li>
              <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              Respect for your home, kitchen, and time
            </li>
            <li>
              <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              Honest options instead of pressure to upsell
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════
       10 · FINAL CTA
       ════════════════════════════════════════════════ -->
  <section class="final-cta" id="book" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow">Ready when you need help</span>
        <h2 id="cta-h">Let's get your appliance working again.</h2>
        <p>Tell us what's going on with your appliance. We'll guide you to the right next step for your home or business. Not sure what's wrong? Just describe the symptoms — we'll help guide you.</p>
      </div>
      <div class="phone-card">
        <div class="lbl">Call our dispatcher</div>
        <a class="num" href="tel:<?php echo esc_attr(hf_phone_link()); ?>"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg><div><div class="digits"><?php echo esc_html(hf_phone_display()); ?></div><div class="sub">Real person · &lt; 60 sec wait</div></div></a>
        <div class="or">or</div>
        <a class="book" href="<?php echo esc_url(hf_booking_url()); ?>">Schedule Service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        <div class="hours"><span class="dot"></span>Open now · Mon–Fri 7 AM–9 PM · Sat 8 AM–8 PM · Sun 10 AM–8 PM</div>
      </div>
    </div>
  </section>

</main>
<?php get_footer();
