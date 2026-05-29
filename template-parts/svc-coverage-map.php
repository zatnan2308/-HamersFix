<?php if ( ! defined( "ABSPATH" ) ) { exit; } ?>
        <div class="map-card" role="img" aria-label="Northeast Georgia service map">
          <svg class="map" viewBox="0 0 600 460" preserveAspectRatio="xMidYMid slice">
            <!-- BG -->
            <rect width="600" height="460" fill="#EFF1F3"/>
            <!-- Subtle road grid -->
            <g stroke="#D6DCE3" stroke-width="1" fill="none" opacity=".7">
              <path d="M0,80 L600,70"/>
              <path d="M0,160 L600,170"/>
              <path d="M0,250 L600,240"/>
              <path d="M0,340 L600,350"/>
              <path d="M100,0 L80,460"/>
              <path d="M240,0 L260,460"/>
              <path d="M400,0 L380,460"/>
              <path d="M540,0 L560,460"/>
            </g>
            <!-- Highway -->
            <path d="M40,420 Q220,320 380,240 T580,80" fill="none" stroke="#B6BFCA" stroke-width="5" stroke-linecap="round" opacity=".6"/>
            <path d="M40,420 Q220,320 380,240 T580,80" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="8,6" stroke-linecap="round"/>
            <text x="280" y="280" font-family="IBM Plex Mono" font-size="10" font-weight="700" fill="#6B7682" transform="rotate(-20 280 280)">I-85</text>

            <!-- Coverage zones -->
            <path d="M150,260 Q130,230 170,200 Q210,180 260,195 Q320,200 350,250 Q370,310 330,360 Q280,400 220,380 Q160,360 145,310 Z"
                  fill="#F58241" fill-opacity=".25" stroke="#EE6B1F" stroke-width="2" stroke-linejoin="round"/>
            <path d="M360,130 Q400,100 460,115 Q510,135 510,180 Q500,230 450,240 Q400,235 380,200 Q360,165 360,130 Z"
                  fill="#3FB8AF" fill-opacity=".28" stroke="#1FA39A" stroke-width="2" stroke-linejoin="round"/>
            <path d="M60,150 Q90,110 150,120 Q200,135 210,180 Q205,225 165,240 Q110,250 80,215 Q50,180 60,150 Z"
                  fill="#8B6BD9" fill-opacity=".24" stroke="#6B4FBF" stroke-width="2" stroke-linejoin="round"/>

            <!-- COVERAGE BADGE -->
            <g transform="translate(490,20)">
              <rect width="92" height="50" rx="9" fill="#062B57"/>
              <text x="46" y="20" text-anchor="middle" font-family="IBM Plex Mono" font-size="8" font-weight="700" fill="#F58241" letter-spacing="1">COVERAGE</text>
              <text x="46" y="40" text-anchor="middle" font-family="Archivo" font-size="16" font-weight="800" fill="#fff">14 Cities</text>
            </g>

            <!-- Pin labels -->
            <g font-family="Public Sans" font-weight="700" font-size="11" fill="#fff">
              <g>
                <circle cx="250" cy="310" r="5" fill="#EE6B1F" stroke="#fff" stroke-width="2"/>
                <rect x="214" y="320" width="92" height="20" rx="10" fill="#062B57"/>
                <text x="260" y="334" text-anchor="middle">Bethlehem · HQ</text>
              </g>
              <g>
                <circle cx="200" cy="240" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
                <rect x="158" y="248" width="96" height="18" rx="9" fill="#0B4F9A"/>
                <text x="206" y="261" text-anchor="middle" font-size="10">Lawrenceville</text>
              </g>
              <g>
                <circle cx="290" cy="370" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
                <rect x="262" y="378" width="62" height="18" rx="9" fill="#0B4F9A"/>
                <text x="293" y="391" text-anchor="middle" font-size="10">Snellville</text>
              </g>
              <g>
                <circle cx="430" cy="160" r="4" fill="#1FA39A" stroke="#fff" stroke-width="1.5"/>
                <rect x="402" y="168" width="60" height="18" rx="9" fill="#0B4F9A"/>
                <text x="432" y="181" text-anchor="middle" font-size="10">Winder</text>
              </g>
              <g>
                <circle cx="455" cy="205" r="4" fill="#1FA39A" stroke="#fff" stroke-width="1.5"/>
                <rect x="422" y="213" width="66" height="18" rx="9" fill="#0B4F9A"/>
                <text x="455" y="226" text-anchor="middle" font-size="10">Hoschton</text>
              </g>
              <g>
                <circle cx="130" cy="190" r="4" fill="#6B4FBF" stroke="#fff" stroke-width="1.5"/>
                <rect x="100" y="198" width="62" height="18" rx="9" fill="#0B4F9A"/>
                <text x="131" y="211" text-anchor="middle" font-size="10">Monroe</text>
              </g>
              <g>
                <circle cx="155" cy="135" r="4" fill="#6B4FBF" stroke="#fff" stroke-width="1.5"/>
                <rect x="118" y="143" width="76" height="18" rx="9" fill="#0B4F9A"/>
                <text x="156" y="156" text-anchor="middle" font-size="10">Loganville</text>
              </g>
              <g>
                <circle cx="335" cy="260" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
                <rect x="306" y="268" width="62" height="18" rx="9" fill="#0B4F9A"/>
                <text x="337" y="281" text-anchor="middle" font-size="10">Dacula</text>
              </g>
              <g>
                <circle cx="355" cy="340" r="4" fill="#EE6B1F" stroke="#fff" stroke-width="1.5"/>
                <rect x="332" y="348" width="56" height="18" rx="9" fill="#0B4F9A"/>
                <text x="360" y="361" text-anchor="middle" font-size="10">Auburn</text>
              </g>
            </g>
          </svg>

          <div class="legend">
            <h4>Service area</h4>
            <div class="row"><span class="sw" style="background:#0B4F9A;opacity:.4"></span>Same-day coverage</div>
            <div class="row"><span class="sw" style="background:#EE6B1F"></span>City we serve</div>
            <div class="row"><span class="sw" style="background:#0B4F9A"></span>HQ · Bethlehem</div>
          </div>

          <div class="stat">
            <div class="num">14</div>
            <div class="lbl">Cities · Gwinnett, Barrow &amp; Athens area</div>
          </div>
        </div>
