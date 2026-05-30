<?php
/**
 * Template Name: Brands
 * Transferred pixel-perfect from Brands.html. Global chrome + phone/booking/email
 * are dynamic (Theme Settings); section copy is static pending ACF-ization.
 * @package HamersFix
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<main id="main">

  <nav class="crumbs" aria-label="Breadcrumb">
    <a href="<?php echo esc_url(home_url("/")); ?>">Home</a>
    <span>›</span>
    <b>Brands We Service</b>
  </nav>

  <!-- ════════════════════════════════════════════════════════
       1 · HERO — Appliance Brands Homes & Businesses Rely On
       ════════════════════════════════════════════════════════ -->
  <section class="b-hero" aria-labelledby="hero-h">
    <div class="b-hero__grid">
      <div>
        <span class="hero__eyebrow"><span class="pulse"></span>Factory-authorized · OEM parts only</span>
        <h1 id="hero-h">Appliance brands <em>homes &amp; businesses</em> rely on.</h1>
        <p class="lede">We service 25+ residential brands and 14+ commercial equipment makers across Northeast Georgia. Factory-authorized on premium, OEM-certified on mainstream — every repair backed by a 1-year warranty.</p>

        <div class="ctas">
          <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
            Call <?php echo esc_html(hf_phone_display()); ?>
          </a>
          <a class="btn btn--ghost btn--lg" href="#book">Book online →</a>
        </div>

        <div class="b-hero__stats">
          <div class="stat"><div class="n">25<small>+</small></div><div class="l">Residential brands</div></div>
          <div class="stat"><div class="n">7</div><div class="l">Factory-authorized</div></div>
          <div class="stat"><div class="n">14<small>+</small></div><div class="l">Commercial makers</div></div>
        </div>
      </div>

      <figure class="logo-cluster" aria-hidden="false" style="padding:0">
        <img src="<?php echo esc_url($hero_url); ?>"
             alt="<?php echo esc_attr($hero_alt); ?>"
             style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"
             loading="eager" fetchpriority="high">
        <span class="badge-top" style="z-index:2">25+ brands</span>
        <div style="position:absolute;left:24px;bottom:24px;z-index:2;background:rgba(6,43,87,.92);color:#fff;padding:16px 20px;border-radius:12px;backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);max-width:300px;">
          <div style="font:700 11px/1 var(--ff-mono);letter-spacing:.12em;color:var(--cta-500);text-transform:uppercase">Factory-authorized</div>
          <div style="margin-top:8px;font:700 16px/1.3 var(--ff-disp)">Sub-Zero · Wolf · Viking · Thermador · Miele</div>
        </div>
      </figure>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       2 · BRANDS WE REPAIR (intro / scope)
       ════════════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="scope-h">
    <div class="s__head">
      <span class="eyebrow">Our scope</span>
      <h2 id="scope-h">Brands we repair</h2>
      <p>Every brand we work on is covered by genuine OEM parts, manufacturer procedures, and our 1-year parts &amp; labor warranty. Here's what that scope looks like in practice.</p>
    </div>
    <div class="s__body">
      <div class="scope-row">
        <div class="scope-card">
          <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M3 12l3-9 4 6 4-3 4 9 3-3"/></svg></div>
          <div><div class="n">25<span style="color:var(--brand-700)">+</span></div><div class="l">Residential brands</div></div>
          <p>From Whirlpool and GE to Bosch and KitchenAid — every major maker sold in U.S. homes.</p>
        </div>
        <div class="scope-card">
          <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><polygon points="12 2 15 9 22 10 17 15 18 22 12 18 6 22 7 15 2 10 9 9 12 2"/></svg></div>
          <div><div class="n">7</div><div class="l">Factory-authorized</div></div>
          <p>Direct certification from Sub-Zero, Wolf, Viking, Thermador, Miele, Dacor, and Fisher &amp; Paykel.</p>
        </div>
        <div class="scope-card">
          <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><rect x="3" y="6" width="18" height="14" rx="2"/><path d="M3 12h18M8 6V4M16 6V4"/></svg></div>
          <div><div class="n">14<span style="color:var(--brand-700)">+</span></div><div class="l">Commercial makers</div></div>
          <p>True, Hoshizaki, Vulcan, Hobart, and more — for restaurants, laundromats, and prep kitchens.</p>
        </div>
        <div class="scope-card">
          <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg></div>
          <div><div class="n">100<span style="color:var(--brand-700)">%</span></div><div class="l">OEM parts</div></div>
          <p>We never use aftermarket parts. Always genuine, always with the manufacturer's spec sheet.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       3 · HOME APPLIANCE BRANDS
       ════════════════════════════════════════════════════════ -->
  <section class="s s--bg" aria-labelledby="home-h">
    <div class="s__head">
      <span class="eyebrow">Tier 2 · Mainstream</span>
      <h2 id="home-h">Home appliance brands</h2>
      <p>The brands you'll find in most American kitchens and laundry rooms. We carry common-failure parts for the top 12 on every service van — meaning most repairs happen on the first visit.</p>
    </div>
    <div class="s__body">
      <div class="brand-grid">

        <a class="brand-card" href="#"><div class="nm">Whirlpool</div><p class="ds">U.S. mainstream leader. Solid parts availability. Strong on top-load washers and side-by-side fridges.</p><div class="tags"><span>Fridge</span><span>Washer</span><span>Dryer</span><span>+3</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">KitchenAid</div><p class="ds">Whirlpool's premium label. Built-in dishwashers, French-door fridges, gas ranges.</p><div class="tags"><span>Fridge</span><span>Dishwasher</span><span>Range</span><span>+3</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">GE Appliances</div><p class="ds">Smart connectivity, Profile sub-line for high-end. Watch for control-board failures on 2015+ models.</p><div class="tags"><span>Fridge</span><span>Range</span><span>Washer</span><span>+4</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Samsung</div><p class="ds">Strong on smart fridges and front-load washers. Common: ice-maker, control board, drain pump.</p><div class="tags"><span>Fridge</span><span>Washer</span><span>Dryer</span><span>+3</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">LG</div><p class="ds">Direct-drive washers, ThinQ smart line, French-door fridges. Common: linear compressor, board.</p><div class="tags"><span>Fridge</span><span>Washer</span><span>Dryer</span><span>+3</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Bosch</div><p class="ds">German engineering, quiet dishwashers, 800 Series and benchmark fridges. OEM parts only.</p><div class="tags"><span>Dishwasher</span><span>Fridge</span><span>Cooktop</span><span>+2</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Maytag</div><p class="ds">Whirlpool sub-brand. Heavy-duty washers/dryers. Famous Maytag Man = our entire crew.</p><div class="tags"><span>Washer</span><span>Dryer</span><span>Fridge</span><span>+2</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Frigidaire</div><p class="ds">Electrolux subsidiary. Affordable mainstream. Common: defrost system, water valve, control board.</p><div class="tags"><span>Fridge</span><span>Range</span><span>Dishwasher</span><span>+2</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Electrolux</div><p class="ds">European-style design, IQ-Touch controls. Service-friendly with modular sub-assemblies.</p><div class="tags"><span>Fridge</span><span>Washer</span><span>Dryer</span><span>+2</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Kenmore</div><p class="ds">Sears-era OEM-rebadged units. We identify the actual manufacturer (Whirlpool, LG, Samsung) and parts.</p><div class="tags"><span>Fridge</span><span>Washer</span><span>Dryer</span><span>+2</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Amana</div><p class="ds">Whirlpool budget label. Top-load washers, basic fridges. Very repairable, parts plentiful.</p><div class="tags"><span>Fridge</span><span>Washer</span><span>Range</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

        <a class="brand-card" href="#"><div class="nm">Hisense</div><p class="ds">Newer entrant in U.S. mainstream. Compact fridges, induction ranges. Parts via authorized distributor.</p><div class="tags"><span>Fridge</span><span>Range</span><span>Cooktop</span></div><div class="arrow"><span>View repairs</span><span>→</span></div></a>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       4 · PREMIUM KITCHEN BRANDS
       ════════════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="prem-h">
    <div class="s__head">
      <span class="eyebrow">Tier 1 · Factory-authorized</span>
      <h2 id="prem-h">Premium kitchen brands</h2>
      <p>Luxury and built-in appliances require manufacturer-trained technicians and OEM parts sourced directly from the brand's distribution center. We hold factory authorization on all seven.</p>
    </div>
    <div class="s__body">
      <div class="prem-grid">

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Sub-Zero</div>
          <div class="ds">The benchmark for built-in refrigeration. Dual-compressor sealed systems, 20+ year service life.</div>
          <div class="focus">Specialty: refrigeration · wine</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Wolf</div>
          <div class="ds">Pro-grade ranges, dual-fuel ovens, signature red knobs. Owned by Sub-Zero Group.</div>
          <div class="focus">Specialty: ranges · ovens</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Viking</div>
          <div class="ds">Commercial-style pro ranges, built-in fridges, range hoods. Old-school robust.</div>
          <div class="focus">Specialty: ranges · refrigeration</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Thermador</div>
          <div class="ds">BSH luxury sub-brand. Star-burner cooktops, Freedom induction, French-door fridges.</div>
          <div class="focus">Specialty: cooktops · ovens</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Miele</div>
          <div class="ds">German engineering top-tier. Dishwashers, coffee systems, washers, ovens. 20-year design spec.</div>
          <div class="focus">Specialty: dishwashers · laundry</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Dacor</div>
          <div class="ds">Now part of Samsung. Pro-style luxury ranges and built-in refrigeration with smart connectivity.</div>
          <div class="focus">Specialty: ranges · fridges</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Factory-authorized</span>
          <div class="nm">Fisher &amp; Paykel</div>
          <div class="ds">New Zealand brand. DishDrawer dishwashers, Active Smart refrigeration, ergonomic French-door units.</div>
          <div class="focus">Specialty: refrigeration · dishwashers</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

        <a class="prem" href="#">
          <span class="seal">Authorized parts</span>
          <div class="nm">JennAir</div>
          <div class="ds">Whirlpool's luxury label. Downdraft cooktops, wall ovens, refrigerated columns. Distinct silver finish.</div>
          <div class="focus">Specialty: cooktops · wall ovens</div>
          <div class="more"><span>Repair specs</span><span>→</span></div>
        </a>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       5 · COMMERCIAL EQUIPMENT BRANDS
       ════════════════════════════════════════════════════════ -->
  <section class="s s--bg" id="commercial" aria-labelledby="com-h">
    <div class="s__head">
      <span class="eyebrow">B2B · Commercial</span>
      <h2 id="com-h">Commercial equipment brands</h2>
      <p>For restaurants, laundromats, multi-family property managers, and prep kitchens. NSF-compliant repairs, insurance billing, and Net-30 terms available.</p>
    </div>
    <div class="s__body">
      <div class="com-row">

        <div class="com-promo">
          <span class="eyebrow">Commercial repair</span>
          <h3>Same-day. After-hours. Net-30.</h3>
          <p>We work with multi-unit operators, single restaurants, laundromats, and property managers. A broken cooler at 11 PM doesn't wait for a 9–5 service window.</p>
          <ul>
            <li>After-hours emergency dispatch</li>
            <li>NSF/health-code-compliant work</li>
            <li>Insurance &amp; warranty billing</li>
            <li>Maintenance contracts</li>
            <li>Multi-unit volume pricing</li>
            <li>COI on request</li>
          </ul>
          <a href="#" class="cta-btn">
            Request a B2B quote
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
        </div>

        <div class="com-brands">
          <h3>Commercial brands we service</h3>
          <div class="meta">14+ makers across refrigeration, cooking, &amp; laundry</div>

          <div class="com-cat">
            <h4>Refrigeration &amp; ice</h4>
            <div class="list">
              <span>True</span><span>Hoshizaki</span><span>Manitowoc</span>
              <span>Continental</span><span>Traulsen</span><span>Beverage-Air</span>
              <span>Turbo Air</span><span>Scotsman</span>
            </div>
          </div>

          <div class="com-cat">
            <h4>Cooking equipment</h4>
            <div class="list">
              <span>Vulcan</span><span>Garland</span><span>Hobart</span>
              <span>Pitco</span><span>Frymaster</span><span>Wolf Range</span>
              <span>Imperial</span><span>Southbend</span>
            </div>
          </div>

          <div class="com-cat">
            <h4>Commercial laundry</h4>
            <div class="list">
              <span>Speed Queen</span><span>Huebsch</span><span>UniMac</span>
              <span>Continental Girbau</span><span>Wascomat</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       6 · FIND BRANDS BY THE APPLIANCE YOU NEED REPAIRED
       ════════════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="matrix-h">
    <div class="s__head">
      <span class="eyebrow">Cross-reference</span>
      <h2 id="matrix-h">Find brands by the appliance you need repaired</h2>
      <p>Pick your appliance type — we'll show you every brand we service in that category. Dark-blue chips are factory-authorized; the rest are OEM-certified.</p>
    </div>
    <div class="s__body">

      <div class="matrix" role="table" aria-label="Brands by appliance type">
        <div class="matrix__hd">
          <div>Appliance</div>
          <div>Brands we repair</div>
        </div>

        <div class="matrix__row">
          <a class="matrix__appl" href="<?php echo esc_url(home_url("/services/refrigerator-repair/")); ?>">
            <div class="ic"><svg viewBox="0 0 32 32" class="ic-stroke"><rect x="7" y="3" width="18" height="26" rx="2"/><line x1="7" y1="13" x2="25" y2="13"/></svg></div>
            <div><div class="nm">Refrigerator</div><div class="ct">21 brands</div></div>
          </a>
          <div class="matrix__brands">
            <a class="--prem" href="#">Sub-Zero ★</a>
            <a class="--prem" href="#">Viking ★</a>
            <a class="--prem" href="#">Thermador ★</a>
            <a class="--prem" href="#">Miele ★</a>
            <a class="--prem" href="#">Dacor ★</a>
            <a class="--prem" href="#">Fisher &amp; Paykel ★</a>
            <a href="#">Whirlpool</a><a href="#">KitchenAid</a><a href="#">GE</a><a href="#">Samsung</a>
            <a href="#">LG</a><a href="#">Bosch</a><a href="#">Maytag</a><a href="#">Frigidaire</a>
            <a class="more" href="#">+7 more →</a>
          </div>
        </div>

        <div class="matrix__row">
          <a class="matrix__appl" href="#">
            <div class="ic"><svg viewBox="0 0 32 32" class="ic-stroke"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="18" r="6"/></svg></div>
            <div><div class="nm">Washer</div><div class="ct">13 brands</div></div>
          </a>
          <div class="matrix__brands">
            <a class="--prem" href="#">Miele ★</a>
            <a href="#">Whirlpool</a><a href="#">Maytag</a><a href="#">GE</a><a href="#">Samsung</a>
            <a href="#">LG</a><a href="#">Bosch</a><a href="#">Frigidaire</a><a href="#">Electrolux</a>
            <a href="#">Speed Queen</a><a href="#">Amana</a><a href="#">Kenmore</a>
            <a class="more" href="#">+1 more →</a>
          </div>
        </div>

        <div class="matrix__row">
          <a class="matrix__appl" href="#">
            <div class="ic"><svg viewBox="0 0 32 32" class="ic-stroke"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="17" r="7"/><circle cx="16" cy="17" r="3"/></svg></div>
            <div><div class="nm">Dryer</div><div class="ct">11 brands</div></div>
          </a>
          <div class="matrix__brands">
            <a class="--prem" href="#">Miele ★</a>
            <a href="#">Whirlpool</a><a href="#">Maytag</a><a href="#">GE</a><a href="#">Samsung</a>
            <a href="#">LG</a><a href="#">Bosch</a><a href="#">Electrolux</a><a href="#">Frigidaire</a>
            <a href="#">Speed Queen</a><a href="#">Kenmore</a>
          </div>
        </div>

        <div class="matrix__row">
          <a class="matrix__appl" href="#">
            <div class="ic"><svg viewBox="0 0 32 32" class="ic-stroke"><rect x="6" y="5" width="20" height="22" rx="2"/><path d="M10 11h12M10 17h12"/></svg></div>
            <div><div class="nm">Dishwasher</div><div class="ct">14 brands</div></div>
          </a>
          <div class="matrix__brands">
            <a class="--prem" href="#">Miele ★</a>
            <a class="--prem" href="#">Thermador ★</a>
            <a class="--prem" href="#">Fisher &amp; Paykel ★</a>
            <a href="#">Bosch</a><a href="#">KitchenAid</a><a href="#">Whirlpool</a>
            <a href="#">GE</a><a href="#">Samsung</a><a href="#">LG</a><a href="#">Maytag</a>
            <a href="#">Frigidaire</a><a href="#">JennAir</a>
            <a class="more" href="#">+2 more →</a>
          </div>
        </div>

        <div class="matrix__row">
          <a class="matrix__appl" href="#">
            <div class="ic"><svg viewBox="0 0 32 32" class="ic-stroke"><rect x="5" y="5" width="22" height="22" rx="2"/><rect x="9" y="10" width="14" height="13" rx="1"/></svg></div>
            <div><div class="nm">Oven / Range</div><div class="ct">16 brands</div></div>
          </a>
          <div class="matrix__brands">
            <a class="--prem" href="#">Wolf ★</a>
            <a class="--prem" href="#">Viking ★</a>
            <a class="--prem" href="#">Thermador ★</a>
            <a class="--prem" href="#">Miele ★</a>
            <a class="--prem" href="#">Dacor ★</a>
            <a href="#">KitchenAid</a><a href="#">GE Profile</a><a href="#">Whirlpool</a>
            <a href="#">Samsung</a><a href="#">LG</a><a href="#">Bosch</a><a href="#">Frigidaire</a>
            <a class="more" href="#">+4 more →</a>
          </div>
        </div>

        <div class="matrix__row">
          <a class="matrix__appl" href="#">
            <div class="ic"><svg viewBox="0 0 32 32" class="ic-stroke"><circle cx="10" cy="11" r="3.5"/><circle cx="22" cy="11" r="3.5"/><circle cx="10" cy="22" r="3.5"/><circle cx="22" cy="22" r="3.5"/></svg></div>
            <div><div class="nm">Cooktop</div><div class="ct">12 brands</div></div>
          </a>
          <div class="matrix__brands">
            <a class="--prem" href="#">Wolf ★</a>
            <a class="--prem" href="#">Thermador ★</a>
            <a class="--prem" href="#">Viking ★</a>
            <a class="--prem" href="#">Miele ★</a>
            <a href="#">Bosch</a><a href="#">GE</a><a href="#">KitchenAid</a><a href="#">Whirlpool</a>
            <a href="#">Samsung</a><a href="#">JennAir</a>
            <a class="more" href="#">+2 more →</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       7 · APPLIANCE BRAND REPAIR — why us
       ════════════════════════════════════════════════════════ -->
  <section class="s s--bg" aria-labelledby="why-h">
    <div class="s__head">
      <span class="eyebrow">How brand repair works at HamersFix</span>
      <h2 id="why-h">Appliance brand repair</h2>
      <p>Generic repair shops can't legally — or skillfully — touch a Sub-Zero sealed system or a Miele control board. Here's what proper brand-specific repair actually looks like.</p>
    </div>
    <div class="s__body">
      <div class="why-grid">

        <div class="why-card">
          <div class="num">1</div>
          <h3>Brand-trained technicians</h3>
          <p>Our techs go through factory training programs for each premium brand we service. That's how Sub-Zero, Wolf, Viking, Thermador, Miele, Dacor, and Fisher &amp; Paykel authorize us — they trained us first.</p>
          <ul>
            <li>Annual recertification with factory updates</li>
            <li>Brand-specific diagnostic tooling on every van</li>
            <li>Direct manufacturer tech-support line</li>
          </ul>
        </div>

        <div class="why-card">
          <div class="num">2</div>
          <h3>Genuine OEM parts only</h3>
          <p>Aftermarket parts are cheaper — and they void manufacturer warranties, fail faster, and damage adjacent components. We source parts directly from manufacturer distribution centers.</p>
          <ul>
            <li>Common-failure parts stocked on every van</li>
            <li>Specialty parts ordered same-day from distributor</li>
            <li>Original spec sheets followed for every install</li>
          </ul>
        </div>

        <div class="why-card">
          <div class="num">3</div>
          <h3>Warranty-friendly procedures</h3>
          <p>If your appliance is still under manufacturer warranty, we follow their service protocol so coverage isn't voided. We also handle the paperwork on extended warranties and home-protection plans.</p>
          <ul>
            <li>Authorized service for AHS, Choice, Sears</li>
            <li>Manufacturer warranty work direct-billed</li>
            <li>1-year HamersFix warranty stacks on top</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       8 · QUESTIONS BEFORE YOU BOOK?
       ════════════════════════════════════════════════════════ -->
  <section class="s" aria-labelledby="faq-h">
    <div class="s__head">
      <span class="eyebrow">FAQ</span>
      <h2 id="faq-h">Questions before you book?</h2>
      <p>The brand-specific questions our dispatcher hears most. Don't see yours? Call <a href="tel:<?php echo esc_attr(hf_phone_link()); ?>" style="color:var(--brand-700);font-weight:700"><?php echo esc_html(hf_phone_display()); ?></a>.</p>
    </div>
    <div class="s__body">
      <div class="faq-list">

        <details open>
          <summary>What does "factory-authorized" actually mean?</summary>
          <p>It means the manufacturer has certified our technicians, audited our procedures, and granted us access to their OEM parts distribution. For Sub-Zero, Wolf, Viking, Thermador, Miele, Dacor, and Fisher &amp; Paykel, we're on the brand's official service-network roster — which protects your warranty.</p>
        </details>

        <details>
          <summary>Do you charge more for premium brands?</summary>
          <p>The diagnostic fee is the same ($89, waived with repair). Parts cost more on luxury brands — a Sub-Zero compressor is genuinely more expensive than a Whirlpool — but the labor flat-rate is consistent with what the brand publishes.</p>
        </details>

        <details>
          <summary>My fridge is from a brand not on your list — can you still fix it?</summary>
          <p>Probably yes. We service 25+ residential brands and 14+ commercial makers, but our parts network extends further. Call us with the make and model — most lesser-known brands are rebadged from a major maker, and we can usually source parts in 1–2 days.</p>
        </details>

        <details>
          <summary>Why won't generic shops touch my Sub-Zero?</summary>
          <p>Sub-Zero sealed-system work requires EPA Section 608 certification (a federal license) plus brand-specific training. Without authorization, shops can't source OEM parts and can't legally open the refrigerant system. Working without 608 is a federal violation.</p>
        </details>

        <details>
          <summary>Can you service smart appliances (Wi-Fi connected)?</summary>
          <p>Yes — Samsung SmartThings, LG ThinQ, GE SmartHQ, Bosch Home Connect, and Whirlpool's smart line. Our diagnostic tablets pair directly with these systems to read error codes and run remote tests.</p>
        </details>

        <details>
          <summary>What if my appliance is under manufacturer warranty?</summary>
          <p>Bring it up when you call. For factory-authorized brands we can perform warranty work direct-billed to the manufacturer. For others, we can perform repairs the manufacturer recommends, with you handling the reimbursement.</p>
        </details>

        <details>
          <summary>Do you work with home warranty companies?</summary>
          <p>Yes — we're an approved technician for American Home Shield, Choice Home Warranty, Sears Home Services, and several smaller plans. We'll coordinate with your warranty company directly.</p>
        </details>

        <details>
          <summary>Will using your repair void my appliance warranty?</summary>
          <p>No. Magnuson-Moss Warranty Act protects your right to use independent service without voiding the warranty, as long as parts and procedures are manufacturer-spec — which ours always are. For factory-authorized brands, we're literally the manufacturer's chosen service network.</p>
        </details>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════
       9 · LET'S GET YOUR APPLIANCE WORKING AGAIN
       ════════════════════════════════════════════════════════ -->
  <section class="final-cta" id="book" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow">Ready when you are</span>
        <h2 id="cta-h">Let's get your appliance working again.</h2>
        <p>One call, technician at your door today. We're open 7 days a week. Real dispatcher answers — every brand we listed is in our daily rotation.</p>

        <div class="signals">
          <div class="sig">
            <div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="tx"><b>Factory-authorized</b>7 premium brands</div>
          </div>
          <div class="sig">
            <div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="tx"><b>100% OEM parts</b>No aftermarket</div>
          </div>
          <div class="sig">
            <div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="tx"><b>1-year warranty</b>Parts &amp; labor</div>
          </div>
          <div class="sig">
            <div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="tx"><b>$89 diagnostic</b>Waived with repair</div>
          </div>
        </div>
      </div>

      <div class="phone-card">
        <div class="lbl">Call our dispatcher</div>
        <a class="num" href="tel:<?php echo esc_attr(hf_phone_link()); ?>">
          <svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
          <div>
            <div class="digits"><?php echo esc_html(hf_phone_display()); ?></div>
            <div class="sub">Real person · &lt; 60-second wait</div>
          </div>
        </a>
        <div class="or">or</div>
        <a class="book" href="<?php echo esc_url(hf_booking_url()); ?>">
          Book online — 60 second flow
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
        <div class="hours">
          <span class="dot"></span>
          Open now · Mon–Fri 7 AM–9 PM · Sat 8 AM–8 PM · Sun 10 AM–8 PM
        </div>
      </div>
    </div>
  </section>

</main>
<?php get_footer();
