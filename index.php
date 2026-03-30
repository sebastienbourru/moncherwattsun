<?php
$page_title = "Mon cher WattSun — Énergie solaire : simulateur, aides, produits & pros";
$meta_desc  = "Simulateur PVGIS gratuit, aides financières 2026, annuaire pros RGE et produits solaires. Passez au solaire — c'est maintenant.";
$canonical  = "https://moncherwattsun.fr/";
$active_page = 'home';
require 'header.php';
?>

<!-- ══════════════════════════════════
     HERO
══════════════════════════════════ -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="container">
    <div class="hero-grid">
      <div class="hero-content">
        <div class="hero-badge">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/></svg>
          Données PVGIS · Commission Européenne
        </div>
        <h1>Élémentaire,<br>mon cher <span class="highlight">WattSun.</span></h1>
        <p class="hero-desc">
          Votre toit produit de l'énergie solaire — vous le saviez ? Simulez votre potentiel, trouvez vos aides, équipez-vous.
        </p>
        <div class="hero-actions">
          <a href="/simulateur" class="btn btn-primary btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            Simuler mon potentiel
          </a>
          <a href="/aides" class="btn btn-primary btn-lg" style="background:linear-gradient(135deg,var(--sky) 0%,#38BDF8 100%); box-shadow:var(--shadow-sky);">
            Mes aides 2026
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
          </a>
        </div>
        <div class="hero-stats">
          <div>
            <div class="hero-stat-num">−40%</div>
            <div class="hero-stat-label">Coût des panneaux depuis 2014*</div>
          </div>
          <div>
            <div class="hero-stat-num">860 €</div>
            <div class="hero-stat-label">Économies annuelles en moyenne**</div>
          </div>
          <div>
            <div class="hero-stat-num">8–10 ans</div>
            <div class="hero-stat-label">Retour sur investissement typique</div>
          </div>
        </div>
        <p style="font-size:.72rem; color:var(--gray-light); margin-top:10px;">* Source : ADEME — Panorama des énergies renouvelables. ** Estimation indicative PVGIS sur 3 kWc plein sud, tarif CRE 2025.</p>
      </div>

      <div class="hero-visual">
        <div class="hero-sun-graphic">
          <div class="sun-ring sun-ring-1"></div>
          <div class="sun-ring sun-ring-2"></div>
          <div class="sun-ring sun-ring-3"></div>
          <div class="sun-core"></div>

          <!-- Floating cards -->
          <div class="panel-card-float card-1">
            <div class="float-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            </div>
            <div>
              <div class="float-value">4 200 kWh/an</div>
              <div class="float-label">Production estimée</div>
            </div>
          </div>

          <div class="panel-card-float card-2">
            <div class="float-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div>
              <div class="float-value">860 €/an</div>
              <div class="float-label">Économies estimées</div>
            </div>
          </div>

          <div class="panel-card-float card-3">
            <div class="float-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div>
              <div class="float-value">2,1 T CO₂</div>
              <div class="float-label">Évité / an</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════
     POURQUOI LE SOLAIRE MAINTENANT
══════════════════════════════════ -->
<section class="stats-section reveal-on-scroll">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <div class="stat-num">73 <span class="unit">GW</span></div>
        <div class="stat-label">Objectif national 2030</div>
        <div class="stat-source">Source : PPE — Loi énergie-climat</div>
      </div>
      <div class="stat-item">
        <div class="stat-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="stat-num">1 M <span class="unit">+</span></div>
        <div class="stat-label">Foyers équipés en France</div>
        <div class="stat-source">Source : ADEME — Observatoire 2025</div>
      </div>
      <div class="stat-item">
        <div class="stat-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
        </div>
        <div class="stat-num">−40 <span class="unit">%</span></div>
        <div class="stat-label">Baisse du prix des panneaux en 10 ans</div>
        <div class="stat-source">Source : ADEME — Panorama ENR 2024</div>
      </div>
      <div class="stat-item">
        <div class="stat-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div class="stat-num">8–10 <span class="unit">ans</span></div>
        <div class="stat-label">Retour sur investissement typique</div>
        <div class="stat-source">Estimation PVGIS — 3 kWc, plein sud</div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════
     INTRO SOLAIRE — INCITATION
══════════════════════════════════ -->
<section class="section" style="background:var(--white);">
  <div class="container">
    <div class="split-section reveal-on-scroll">
      <div class="split-text">
        <span class="badge badge-sun" style="margin-bottom:18px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/></svg>
          Pourquoi maintenant ?
        </span>
        <h2>Le solaire n'a jamais<br>été aussi accessible</h2>
        <p>En 2026, un kit solaire 3 kWc coûte moitié moins cher qu'en 2014. Avec les aides de l'État — prime à l'autoconsommation, TVA réduite, éco-PTZ — le reste à charge peut descendre sous les 3 000 €.</p>
        <p style="margin-top:14px;">Et ça ne s'arrête pas aux panneaux sur le toit : kits de balcon plug-and-play, stations solaires pour le van, batteries de stockage… Il y a une solution pour chaque situation.</p>
        <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:28px;">
          <a href="/simulateur" class="btn btn-primary">Calculer ma production</a>
          <a href="/aides" class="btn btn-outline">Voir les aides 2026</a>
        </div>
      </div>
      <div class="split-visual">
        <div class="split-cards">
          <div class="split-stat-card">
            <div class="split-stat-icon" style="background:linear-gradient(135deg,var(--sun-light),#FDE68A); color:var(--sun-dark);">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M2 12h20"/></svg>
            </div>
            <div>
              <div style="font-size:1.6rem; font-weight:800; color:var(--dark); line-height:1;">1 500 h</div>
              <div style="font-size:.8rem; color:var(--gray); margin-top:3px;">d'ensoleillement/an à Lyon*</div>
            </div>
          </div>
          <div class="split-stat-card">
            <div class="split-stat-icon" style="background:linear-gradient(135deg,var(--sky-light),#BAE6FD); color:var(--sky-dark);">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div>
              <div style="font-size:1.6rem; font-weight:800; color:var(--dark); line-height:1;">Jusqu'à 5 000 €</div>
              <div style="font-size:.8rem; color:var(--gray); margin-top:3px;">d'aides cumulables</div>
            </div>
          </div>
          <div class="split-stat-card">
            <div class="split-stat-icon" style="background:#D1FAE5; color:#065F46;">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <div style="font-size:1.6rem; font-weight:800; color:var(--dark); line-height:1;">25–30 ans</div>
              <div style="font-size:.8rem; color:var(--gray); margin-top:3px;">de durée de vie des panneaux</div>
            </div>
          </div>
        </div>
        <p style="font-size:.72rem; color:var(--gray-light); margin-top:14px; text-align:right;">* Source PVGIS — données historiques 1994-2023.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════
     OUTILS
══════════════════════════════════ -->
<section class="section modules-section">
  <div class="container">
    <div class="section-header reveal-on-scroll">
      <span class="badge badge-sun">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/></svg>
        Vos outils
      </span>
      <h2>De la simulation à l'installation</h2>
      <p>Quatre outils pour vous accompagner à chaque étape.</p>
    </div>

    <div class="modules-grid reveal-on-scroll">

      <!-- Simulateur — featured -->
      <div class="module-card featured">
        <div class="module-num">01</div>
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="module-title">Simulateur de potentiel solaire</h3>
        <p class="module-desc">Entrez votre ville, l'orientation et la puissance souhaitée. L'API PVGIS calcule votre production annuelle, vos économies estimées et le CO₂ évité. <strong style="color:rgba(255,255,255,.85);">Données Commission Européenne.</strong></p>
        <a href="/simulateur" class="module-link">
          Calculer ma production
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>

      <!-- Aides -->
      <div class="module-card">
        <div class="module-num">02</div>
        <div class="card-icon" style="background:var(--sky-light); color:var(--sky-dark);">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <h3 class="module-title">Aides financières 2026</h3>
        <p class="module-desc">Prime à l'autoconsommation, TVA réduite, éco-PTZ, MaPrimeRénov'. Guides sourcés ADEME &amp; France Rénov avec liens vers les simulateurs officiels.</p>
        <a href="/aides" class="module-link">
          Voir mes aides
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>

      <!-- Produits -->
      <div class="module-card">
        <div class="module-num">03</div>
        <div class="card-icon" style="background:#D1FAE5; color:#065F46;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        </div>
        <h3 class="module-title">Produits solaires</h3>
        <p class="module-desc">Kits résidentiels, kits balcon, portables van/rando, batteries, panneaux, micro-onduleurs. Fiches techniques, comparatifs et liens marchands.</p>
        <a href="/produits" class="module-link">
          Explorer les produits
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>

      <!-- Annuaire -->
      <div class="module-card">
        <div class="module-num">04</div>
        <div class="card-icon" style="background:#EDE9FE; color:#5B21B6;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h3 class="module-title">Annuaire des pros RGE</h3>
        <p class="module-desc">Trouvez un installateur certifié RGE dans votre secteur. Fiches entreprises avec données SIRET vérifiées via l'API Sirene INSEE.</p>
        <a href="/annuaire" class="module-link">
          Trouver un installateur
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════
     POUR QUI ?
══════════════════════════════════ -->
<section class="section" style="background:linear-gradient(160deg,#FFFBEB 0%,#F0F9FF 100%);">
  <div class="container">
    <div class="section-header reveal-on-scroll">
      <span class="badge badge-sky">Le solaire, c'est pour vous</span>
      <h2>Quelle que soit votre situation</h2>
    </div>
    <div class="grid-3 reveal-on-scroll">
      <div class="card" style="text-align:center;">
        <div class="card-icon" style="margin:0 auto 20px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <h3>Propriétaire avec toit</h3>
        <p>Installation en toiture pour couvrir 40–80% de votre consommation. Retour sur investissement en 8 à 10 ans, puis 20 ans d'électricité quasi-gratuite.</p>
        <a href="/simulateur" class="module-link" style="justify-content:center; margin-top:14px;">Simuler mon toit →</a>
      </div>
      <div class="card" style="text-align:center;">
        <div class="card-icon" style="margin:0 auto 20px; background:var(--sky-light); color:var(--sky-dark);">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3>Locataire ou appartement</h3>
        <p>Kit balcon plug-and-play jusqu'à 800 W, sans autorisation. Production directe sur prise secteur. Idéal pour réduire sa facture sans travaux.</p>
        <a href="/produits#kits-balcon" class="module-link" style="justify-content:center; margin-top:14px; color:var(--sky-dark);">Voir les kits balcon →</a>
      </div>
      <div class="card" style="text-align:center;">
        <div class="card-icon" style="margin:0 auto 20px; background:#D1FAE5; color:#065F46;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        </div>
        <h3>Van, camping &amp; nomade</h3>
        <p>Stations solaires portables de 200 Wh à 2 kWh. Rechargez en déplacement, alimentez vos appareils n'importe où. Technologie LiFePO4.</p>
        <a href="/produits#kits-portable" class="module-link" style="justify-content:center; margin-top:14px; color:#065F46;">Voir les kits portables →</a>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════
     CTA SIMULATEUR
══════════════════════════════════ -->
<section class="cta-strip reveal-on-scroll">
  <div class="container">
    <div class="cta-strip-inner">
      <div>
        <h2>Combien peut produire votre toit ?</h2>
        <p>2 minutes, votre ville, l'orientation — et l'API PVGIS fait le reste.</p>
      </div>
      <div class="cta-strip-btns">
        <a href="/simulateur" class="btn btn-primary btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          Lancer le simulateur
        </a>
        <a href="/aides" class="btn btn-primary btn-lg" style="background:linear-gradient(135deg,var(--sky) 0%,#38BDF8 100%); box-shadow:var(--shadow-sky);">
          Voir mes aides
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════
     CONFIANCE
══════════════════════════════════ -->
<section class="section" style="background:var(--sky-xlight);">
  <div class="container">
    <div class="section-header reveal-on-scroll">
      <span class="badge badge-dark">Comment on travaille</span>
      <h2>Des données, pas des promesses</h2>
    </div>

    <div class="grid-3 reveal-on-scroll">
      <div class="card" style="text-align:center;">
        <div class="card-icon" style="margin:0 auto 20px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Sources officielles</h3>
        <p>PVGIS (Commission Européenne), RTE, ADEME, France Rénov, API Sirene INSEE. Chaque donnée affichée est sourcée.</p>
      </div>
      <div class="card" style="text-align:center;">
        <div class="card-icon" style="margin:0 auto 20px; background:var(--sky-light); color:var(--sky-dark);">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3>Transparence affilié</h3>
        <p>Ce site est affilié Amazon. On le dit clairement. Notre sélection de produits reste indépendante.</p>
      </div>
      <div class="card" style="text-align:center;">
        <div class="card-icon" style="margin:0 auto 20px; background:#D1FAE5; color:#065F46;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3>Estimations, pas certitudes</h3>
        <p>Nos simulateurs sont des outils d'aide à la décision. Chaque installation est unique — on le précise toujours.</p>
      </div>
    </div>
  </div>
</section>

<!-- Schema.org Website -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Mon cher WattSun",
  "url": "https://moncherwattsun.fr",
  "description": "Simulateur solaire PVGIS, aides financières, annuaire pros RGE, produits solaires en France.",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://moncherwattsun.fr/annuaire?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<?php require 'footer.php'; ?>