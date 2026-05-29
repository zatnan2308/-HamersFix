<?php if ( ! defined( "ABSPATH" ) ) { exit; } ?>
      <div class="map-frame" role="img" aria-label="Northeast Georgia service coverage map">
        <svg class="map" viewBox="0 0 800 500" preserveAspectRatio="xMidYMid slice">
          <!-- BG -->
          <rect width="800" height="500" fill="#EFF1F3"/>

          <!-- Subtle road grid -->
          <g stroke="#D6DCE3" stroke-width="1" fill="none" opacity=".8">
            <path d="M0,90 L800,80"/>
            <path d="M0,160 L800,170"/>
            <path d="M0,240 L800,230"/>
            <path d="M0,330 L800,340"/>
            <path d="M0,420 L800,410"/>
            <path d="M120,0 L100,500"/>
            <path d="M260,0 L240,500"/>
            <path d="M420,0 L440,500"/>
            <path d="M580,0 L560,500"/>
            <path d="M720,0 L700,500"/>
          </g>

          <!-- Highway: I-85 -->
          <path d="M60,460 Q280,360 480,260 T780,80" fill="none" stroke="#B6BFCA" stroke-width="6" stroke-linecap="round" opacity=".6"/>
          <path d="M60,460 Q280,360 480,260 T780,80" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="10,8" stroke-linecap="round"/>
          <text x="360" y="320" font-family="IBM Plex Mono" font-size="11" font-weight="700" fill="#6B7682" transform="rotate(-22 360 320)">I-85</text>

          <!-- Secondary route: US-78 -->
          <path d="M0,260 Q200,290 400,280 T800,300" fill="none" stroke="#C9D2DE" stroke-width="4" stroke-linecap="round" opacity=".7"/>
          <text x="120" y="280" font-family="IBM Plex Mono" font-size="10" font-weight="700" fill="#99A2AD">US-78</text>

          <!-- ZONE 1: Gwinnett Core (orange/coral) -->
          <path d="M180,280 Q160,250 200,220 Q240,200 290,210 Q340,200 380,240 Q420,290 400,360 Q380,420 320,440 Q260,460 210,430 Q160,400 170,340 Z"
                fill="#F58241" fill-opacity=".28" stroke="#EE6B1F" stroke-width="2" stroke-linejoin="round"/>

          <!-- ZONE 2: Barrow / Jackson (teal) -->
          <path d="M420,140 Q460,110 520,120 Q580,130 600,170 Q620,220 590,260 Q540,290 480,280 Q430,270 410,220 Q400,170 420,140 Z"
                fill="#3FB8AF" fill-opacity=".30" stroke="#1FA39A" stroke-width="2" stroke-linejoin="round"/>

          <!-- ZONE 3: Walton & Oconee (purple) -->
          <path d="M80,160 Q110,120 170,130 Q230,140 250,180 Q260,230 240,260 Q200,290 150,280 Q90,270 70,220 Q60,180 80,160 Z"
                fill="#8B6BD9" fill-opacity=".26" stroke="#6B4FBF" stroke-width="2" stroke-linejoin="round"/>

          <!-- City "patch" subtle fills -->
          <ellipse cx="290" cy="360" rx="42" ry="20" fill="#EE6B1F" fill-opacity=".18"/>
          <ellipse cx="510" cy="200" rx="36" ry="18" fill="#1FA39A" fill-opacity=".18"/>
          <ellipse cx="150" cy="210" rx="34" ry="16" fill="#6B4FBF" fill-opacity=".18"/>

          <!-- COVERAGE BADGE (top-right) -->
          <g transform="translate(680,30)">
            <rect width="100" height="56" rx="10" fill="#062B57"/>
            <text x="50" y="22" text-anchor="middle" font-family="IBM Plex Mono" font-size="9" font-weight="700" fill="#F58241" letter-spacing="1.2">COVERAGE</text>
            <text x="50" y="44" text-anchor="middle" font-family="Archivo" font-size="18" font-weight="800" fill="#fff">14 Cities</text>
          </g>

          <!-- City labels (dark navy pills with white text) -->
          <g font-family="Public Sans" font-weight="700" font-size="12" fill="#fff">
            <!-- Zone 1: Gwinnett Core -->
            <g>
              <circle cx="290" cy="360" r="5" fill="#EE6B1F" stroke="#fff" stroke-width="2"/>
              <rect x="250" y="372" width="100" height="22" rx="11" fill="#062B57"/>
              <text x="300" y="387" text-anchor="middle">Bethlehem · HQ</text>
            </g>
            <g>
              <circle cx="220" cy="300" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
              <rect x="186" y="308" width="78" height="20" rx="10" fill="#0B4F9A"/>
              <text x="225" y="322" text-anchor="middle" font-size="11">Snellville</text>
            </g>
            <g>
              <circle cx="265" cy="245" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
              <rect x="222" y="252" width="98" height="20" rx="10" fill="#0B4F9A"/>
              <text x="271" y="266" text-anchor="middle" font-size="11">Lawrenceville</text>
            </g>
            <g>
              <circle cx="340" cy="280" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
              <rect x="318" y="287" width="62" height="20" rx="10" fill="#0B4F9A"/>
              <text x="349" y="301" text-anchor="middle" font-size="11">Dacula</text>
            </g>
            <g>
              <circle cx="280" cy="410" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
              <rect x="248" y="418" width="68" height="20" rx="10" fill="#0B4F9A"/>
              <text x="282" y="432" text-anchor="middle" font-size="11">Grayson</text>
            </g>
            <g>
              <circle cx="375" cy="395" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
              <rect x="354" y="402" width="56" height="20" rx="10" fill="#0B4F9A"/>
              <text x="382" y="416" text-anchor="middle" font-size="11">Auburn</text>
            </g>

            <!-- Zone 2: Barrow/Jackson -->
            <g>
              <circle cx="510" cy="200" r="4" fill="#1FA39A" stroke="#fff" stroke-width="1.5"/>
              <rect x="478" y="208" width="64" height="20" rx="10" fill="#0B4F9A"/>
              <text x="510" y="222" text-anchor="middle" font-size="11">Winder</text>
            </g>
            <g>
              <circle cx="445" cy="225" r="4" fill="#1FA39A" stroke="#fff" stroke-width="1.5"/>
              <rect x="410" y="232" width="68" height="20" rx="10" fill="#0B4F9A"/>
              <text x="444" y="246" text-anchor="middle" font-size="11">Statham</text>
            </g>
            <g>
              <circle cx="555" cy="155" r="4" fill="#1FA39A" stroke="#fff" stroke-width="1.5"/>
              <rect x="520" y="162" width="74" height="20" rx="10" fill="#0B4F9A"/>
              <text x="557" y="176" text-anchor="middle" font-size="11">Braselton</text>
            </g>
            <g>
              <circle cx="575" cy="245" r="4" fill="#1FA39A" stroke="#fff" stroke-width="1.5"/>
              <rect x="542" y="252" width="70" height="20" rx="10" fill="#0B4F9A"/>
              <text x="577" y="266" text-anchor="middle" font-size="11">Hoschton</text>
            </g>

            <!-- Zone 3: Walton & Oconee -->
            <g>
              <circle cx="150" cy="210" r="4" fill="#6B4FBF" stroke="#fff" stroke-width="1.5"/>
              <rect x="120" y="218" width="62" height="20" rx="10" fill="#0B4F9A"/>
              <text x="151" y="232" text-anchor="middle" font-size="11">Monroe</text>
            </g>
            <g>
              <circle cx="105" cy="165" r="4" fill="#6B4FBF" stroke="#fff" stroke-width="1.5"/>
              <rect x="68" y="172" width="78" height="20" rx="10" fill="#0B4F9A"/>
              <text x="107" y="186" text-anchor="middle" font-size="11">Loganville</text>
            </g>
            <g>
              <circle cx="215" cy="170" r="4" fill="#6B4FBF" stroke="#fff" stroke-width="1.5"/>
              <rect x="190" y="178" width="54" height="20" rx="10" fill="#0B4F9A"/>
              <text x="217" y="192" text-anchor="middle" font-size="11">Bogart</text>
            </g>
            <g>
              <circle cx="195" cy="245" r="4" fill="#6B4FBF" stroke="#fff" stroke-width="1.5"/>
              <rect x="156" y="252" width="86" height="20" rx="10" fill="#0B4F9A"/>
              <text x="199" y="266" text-anchor="middle" font-size="11">Watkinsville</text>
            </g>
          </g>
        </svg>

        <div class="map-overlay">
          <h3>Coverage zones</h3>
          <div class="sub">Northeast Georgia · 14 cities</div>
          <div class="row"><span class="sw" style="background:#0B4F9A;opacity:.3"></span>Same-day priority</div>
          <div class="row"><span class="sw" style="background:#EE6B1F"></span>City we serve</div>
          <div class="row"><span class="sw" style="background:#0B4F9A"></span>HQ · Bethlehem</div>
          <div class="row"><span class="sw" style="border:1.5px dashed #0B4F9A;background:transparent"></span>Service boundary</div>
        </div>

        <div class="map-callout">
          <div class="lbl">8 vans on the road</div>
          <div class="val">2.4 hr avg arrival</div>
          <p>Across all 14 cities, 6 days a week. Emergency commercial coverage: 24/7.</p>
        </div>

        <div class="map-stat">
          <span class="dot"></span>
          <span class="txt">Live: <b>3 vans within 5 mi of Bethlehem</b><small>Updated · 11:47 AM</small></span>
        </div>
      </div>
