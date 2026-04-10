<?php
// simulateur.php — Simulateur solaire PVGIS
$page_title  = "Simulateur solaire gratuit — Production PV et économies estimées | Mon cher WattSun";
$meta_desc   = "Estimez la production annuelle de vos panneaux solaires avec les données PVGIS de la Commission Européenne. Sélectionnez votre ville, la puissance et l'orientation.";
$canonical   = "https://moncherwattsun.fr/simulateur";
$active_page = 'simulateur';

// ── Liste fermée de villes (Lyon + limitrophes) avec coordonnées exactes ──
// Coordonnées issues de l'API Adresse data.gouv.fr — vérifiées
$VILLES = [
    ['label' => 'Lyon (69001)', 'lat' => 45.7676, 'lon' => 4.8344, 'cp' => '69001'],
    ['label' => 'Lyon (69002)', 'lat' => 45.7494, 'lon' => 4.8280, 'cp' => '69002'],
    ['label' => 'Lyon (69003)', 'lat' => 45.7558, 'lon' => 4.8487, 'cp' => '69003'],
    ['label' => 'Lyon (69006)', 'lat' => 45.7680, 'lon' => 4.8528, 'cp' => '69006'],
    ['label' => 'Lyon (69007)', 'lat' => 45.7340, 'lon' => 4.8394, 'cp' => '69007'],
    ['label' => 'Lyon (69008)', 'lat' => 45.7268, 'lon' => 4.8603, 'cp' => '69008'],
    ['label' => 'Lyon (69009)', 'lat' => 45.7801, 'lon' => 4.8100, 'cp' => '69009'],
    ['label' => 'Villeurbanne', 'lat' => 45.7716, 'lon' => 4.8796, 'cp' => '69100'],
    ['label' => 'Caluire-et-Cuire', 'lat' => 45.7966, 'lon' => 4.8472, 'cp' => '69300'],
    ['label' => 'Vénissieux', 'lat' => 45.6974, 'lon' => 4.8864, 'cp' => '69200'],
    ['label' => 'Bron', 'lat' => 45.7352, 'lon' => 4.9133, 'cp' => '69500'],
    ['label' => 'Saint-Fons', 'lat' => 45.7077, 'lon' => 4.8594, 'cp' => '69190'],
    ['label' => 'Oullins', 'lat' => 45.7148, 'lon' => 4.8083, 'cp' => '69600'],
    ['label' => 'Saint-Genis-Laval', 'lat' => 45.6958, 'lon' => 4.7918, 'cp' => '69230'],
    ['label' => 'Tassin-la-Demi-Lune', 'lat' => 45.7589, 'lon' => 4.7740, 'cp' => '69160'],
    ['label' => 'Craponne', 'lat' => 45.7424, 'lon' => 4.7284, 'cp' => '69290'],
    ['label' => 'Francheville', 'lat' => 45.7313, 'lon' => 4.7698, 'cp' => '69340'],
    ['label' => 'Sainte-Foy-lès-Lyon', 'lat' => 45.7290, 'lon' => 4.7991, 'cp' => '69110'],
    ['label' => 'Pierre-Bénite', 'lat' => 45.7001, 'lon' => 4.8274, 'cp' => '69310'],
    ['label' => 'Décines-Charpieu', 'lat' => 45.7672, 'lon' => 4.9599, 'cp' => '69150'],
];

// ── Traitement AJAX simulation PVGIS ──
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'simulate') {
    header('Content-Type: application/json');

    $lat    = floatval($_POST['lat'] ?? 45.7676);
    $lon    = floatval($_POST['lon'] ?? 4.8344);
    $peakp  = floatval($_POST['peakp'] ?? 3);
    $angle  = intval($_POST['angle'] ?? 35);
    $aspect = intval($_POST['aspect'] ?? 0);
    $loss   = floatval($_POST['loss'] ?? 14);

    // Validation coordonnées (zone France)
    if ($lat < 35 || $lat > 52 || $lon < -6 || $lon > 10) {
        echo json_encode(['error' => 'Coordonnées hors de France métropolitaine.']);
        exit;
    }
    if ($peakp < 0.5 || $peakp > 100) {
        echo json_encode(['error' => 'Puissance crête entre 0.5 et 100 kWc.']);
        exit;
    }

    // Appel API PVGIS — Commission Européenne (gratuite, pas de clé)
    $pvgis_url = "https://re.jrc.ec.europa.eu/api/v5_2/PVcalc?" . http_build_query([
        'lat'          => $lat,
        'lon'          => $lon,
        'peakpower'    => $peakp,
        'pvtechchoice' => 'crystSi',
        'mountingplace'=> 'building',
        'angle'        => $angle,
        'aspect'       => $aspect,
        'loss'         => $loss,
        'outputformat' => 'json',
        'browser'      => 0,
    ]);

    $ctx = stream_context_create([
        'http' => [
            'method'  => 'GET',
            'timeout' => 15,
            'header'  => ['User-Agent: MonCherWattSun/1.0 (https://moncherwattsun.fr)'],
        ]
    ]);

    $raw = @file_get_contents($pvgis_url, false, $ctx);

    if ($raw === false) {
        echo json_encode(['error' => "L'API PVGIS est temporairement inaccessible. Réessayez dans quelques instants."]);
        exit;
    }

    $data = json_decode($raw, true);
    if (!$data || !isset($data['outputs']['totals']['fixed']['E_y'])) {
        echo json_encode(['error' => "Données PVGIS indisponibles pour cette localisation. Essayez une autre ville."]);
        exit;
    }

    $e_y  = round($data['outputs']['totals']['fixed']['E_y']);
    $e_m  = round($e_y / 12);
    $h_y  = round($data['outputs']['totals']['fixed']['H(i)_y']);
    $pr   = round($data['outputs']['totals']['fixed']['PR'] * 100, 1);

    // Estimations indicatives
    $tarif_kwh    = 0.2516; // tarif réglementé indicatif 2026 (source : CRE)
    $economies_an = round($e_y * $tarif_kwh * 0.7);
    $co2_evite    = round($e_y * 0.057 / 1000, 2);

    echo json_encode([
        'e_y'      => $e_y,
        'e_m'      => $e_m,
        'h_y'      => $h_y,
        'pr'       => $pr,
        'economies'=> $economies_an,
        'co2'      => $co2_evite,
        'peakp'    => $peakp,
        'lat'      => $lat,
        'lon'      => $lon,
    ]);
    exit;
}

$extra_head = '
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Accueil","item":"https://moncherwattsun.fr/"},{"@type":"ListItem","position":2,"name":"Simulateur solaire","item":"https://moncherwattsun.fr/simulateur"}]}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Simulateur solaire PVGIS — Mon cher WattSun",
  "url": "https://moncherwattsun.fr/simulateur",
  "applicationCategory": "UtilityApplication",
  "description": "Estimez la production annuelle de vos panneaux solaires grâce aux données PVGIS de la Commission Européenne.",
  "offers": {"@type": "Offer", "price": "0", "priceCurrency": "EUR"}
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {"@type": "Question", "name": "Comment fonctionne le simulateur solaire ?", "acceptedAnswer": {"@type": "Answer", "text": "Le simulateur utilise l\u0027API PVGIS de la Commission Européenne. Vous sélectionnez votre ville, la puissance souhaitée et l\u0027orientation de vos panneaux. L\u0027outil calcule la production annuelle estimée en kWh, les économies et le CO2 évité."}},
    {"@type": "Question", "name": "Les données PVGIS sont-elles fiables ?", "acceptedAnswer": {"@type": "Answer", "text": "Oui. PVGIS est développé par le Centre Commun de Recherche (JRC) de la Commission Européenne. Il utilise des données satellite d\u0027irradiation solaire sur plus de 10 ans. C\u0027est la référence utilisée par les professionnels du solaire."}},
    {"@type": "Question", "name": "Quelle puissance de panneaux solaires choisir ?", "acceptedAnswer": {"@type": "Answer", "text": "Pour une maison individuelle, 3 kWc couvrent environ 30-50% de la consommation d\u0027un foyer moyen. 6 kWc permettent une autoconsommation plus importante. La puissance idéale dépend de votre consommation, de la surface disponible et de votre budget."}}
  ]
}
</script>';

require 'header.php';

// Encoder les villes pour JS
$villes_json = json_encode($VILLES, JSON_UNESCAPED_UNICODE);
?>

<!-- HERO -->
<section class="simulateur-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:20px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">Simulateur solaire</span>
    </nav>
    <span class="badge badge-sun" style="margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
      Données PVGIS · Commission Européenne
    </span>
    <h1>Combien peut produire <span class="grad-text">votre toit ?</span></h1>
    <p>Sélectionnez votre ville, la surface et l'orientation de votre installation.<br>Le simulateur interroge l'API PVGIS en temps réel.</p>
    <p style="font-size:.8rem; margin-top:12px; color:var(--gray-light);">⚠️ Résultats indicatifs. Chaque installation est unique — consultez un professionnel RGE pour un devis précis.</p>
    <p style="font-size:.78rem; color:var(--gray-light); margin-top:6px;">📍 Zone couverte : Lyon et communes limitrophes (extension progressive)</p>
  </div>
</section>

<!-- SIMULATEUR -->
<section class="section">
  <div class="container">
    <div class="sim-layout">

      <!-- Formulaire -->
      <div class="sim-form-card reveal-on-scroll">
        <h2 style="margin-bottom:8px; font-size:1.4rem;">Paramètres de l'installation</h2>
        <p style="margin-bottom:28px; font-size:.88rem;">Données calculées sur la base des irradiations solaires historiques PVGIS (20+ années).</p>

        <!-- Localisation — liste fermée -->
        <div class="form-group">
          <label class="form-label" for="ville-select">
            Commune
          </label>
          <select id="ville-select" class="form-select" onchange="selectVilleFromList(this)">
            <option value="">— Choisissez votre commune —</option>
            <?php foreach ($VILLES as $v): ?>
            <option value="<?= $v['lat'] ?>|<?= $v['lon'] ?>|<?= htmlspecialchars($v['label']) ?>">
              <?= htmlspecialchars($v['label']) ?>
            </option>
            <?php endforeach; ?>
          </select>
          <input type="hidden" id="lat-val" value="45.7676">
          <input type="hidden" id="lon-val" value="4.8344">
          <p id="ville-selected" style="font-size:.78rem; color:var(--sun-dark); margin-top:6px; display:none; align-items:center; gap:5px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display:inline;"><polyline points="20 6 9 17 4 12"/></svg>
            <span id="ville-name"></span> sélectionnée
          </p>
          <p style="font-size:.75rem; color:var(--gray-light); margin-top:6px;">
            Zone couverte : Lyon et ~15 communes limitrophes. D'autres villes seront ajoutées prochainement.
          </p>
        </div>

        <!-- Puissance crête -->
        <div class="form-group">
          <label class="form-label" for="peakp-range">
            Puissance crête installée
            <span>(<span id="peakp-label">3.0</span> kWc)</span>
          </label>
          <input type="range" id="peakp-range" class="form-range" min="1" max="30" step="0.5" value="3"
            oninput="document.getElementById('peakp-label').textContent = parseFloat(this.value).toFixed(1); updatePanels(this.value)">
          <div class="range-labels">
            <span>1 kWc</span>
            <span style="color:var(--sun-dark); font-weight:600;">≈ <span id="panels-count">6</span> panneaux 500W</span>
            <span>30 kWc</span>
          </div>
          <p style="font-size:.77rem; color:var(--gray-light); margin-top:6px;">1 panneau résidentiel ≈ 400–500 Wc. Maison type : 3–6 kWc.</p>
        </div>

        <!-- Inclinaison -->
        <div class="form-group">
          <label class="form-label" for="angle-range">
            Inclinaison du toit
            <span>(<span id="angle-label">35</span>°)</span>
          </label>
          <input type="range" id="angle-range" class="form-range" min="0" max="90" step="5" value="35"
            oninput="document.getElementById('angle-label').textContent = this.value">
          <div class="range-labels">
            <span>0° (plat)</span>
            <span style="color:var(--sun-dark); font-weight:600;">Optimal : 30–40°</span>
            <span>90° (vertical)</span>
          </div>
        </div>

        <!-- Orientation -->
        <div class="form-group">
          <label class="form-label" for="aspect-select">Orientation du pan de toit</label>
          <select id="aspect-select" class="form-select">
            <option value="0">Plein Sud (optimal) — 0°</option>
            <option value="-45">Sud-Est — −45°</option>
            <option value="45">Sud-Ouest — +45°</option>
            <option value="-90">Est — −90°</option>
            <option value="90">Ouest — +90°</option>
            <option value="180">Plein Nord — +180°</option>
          </select>
          <p style="font-size:.77rem; color:var(--gray-light); margin-top:6px;">Le plein Sud maximise la production. ±45° réduit d'environ 5–8%.</p>
        </div>

        <!-- Pertes système -->
        <div class="form-group">
          <label class="form-label" for="loss-range">
            Pertes système estimées
            <span>(<span id="loss-label">14</span>%)</span>
          </label>
          <input type="range" id="loss-range" class="form-range" min="5" max="30" step="1" value="14"
            oninput="document.getElementById('loss-label').textContent = this.value">
          <div class="range-labels">
            <span>5% (optimal)</span>
            <span>14% (standard)</span>
            <span>30% (dégradé)</span>
          </div>
          <p style="font-size:.77rem; color:var(--gray-light); margin-top:6px;">Câblage, onduleur, ombrage, température. 14% est la valeur par défaut PVGIS.</p>
        </div>

        <button id="sim-btn" onclick="lancerSimulation()" class="btn btn-primary btn-lg" style="width:100%; justify-content:center;" disabled>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          <span id="sim-btn-text">Sélectionnez d'abord une commune</span>
        </button>

        <p style="text-align:center; font-size:.74rem; color:var(--gray-light); margin-top:12px;">
          Données : <a href="https://re.jrc.ec.europa.eu/pvg_tools/fr/" target="_blank" rel="noopener noreferrer" style="color:var(--sky);">PVGIS</a> — JRC, Commission Européenne.
        </p>
      </div>

      <!-- Résultats -->
      <div class="sim-results-card">
        <h3 style="color:var(--white); margin-bottom:6px;">Résultats de la simulation</h3>
        <p style="color:rgba(255,255,255,.45); font-size:.82rem; margin-bottom:24px;">Estimation sur données météo historiques PVGIS (20+ années)</p>

        <div id="result-placeholder" class="result-placeholder">
          <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          <p>Choisissez votre commune et lancez le calcul.</p>
        </div>

        <div id="result-data" style="display:none;">
          <div class="result-grid">
            <div class="result-item featured-result">
              <div class="result-value" id="r-ey">—</div>
              <div class="result-label">kWh produits / an *</div>
            </div>
            <div class="result-item">
              <div class="result-value" id="r-em">—</div>
              <div class="result-label">kWh / mois (moy.)</div>
            </div>
            <div class="result-item">
              <div class="result-value" id="r-eco">—</div>
              <div class="result-label">€ économies / an **</div>
            </div>
            <div class="result-item">
              <div class="result-value" id="r-co2">—</div>
              <div class="result-label">T CO₂ évitées / an ***</div>
            </div>
          </div>

          <div style="background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.1); border-radius:var(--radius); padding:14px; margin-bottom:16px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
              <span style="font-size:.78rem; color:rgba(255,255,255,.45);">Irradiation sur l'inclinaison</span>
              <span style="font-weight:700; color:var(--white); font-size:.9rem;" id="r-hy">—</span>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center;">
              <span style="font-size:.78rem; color:rgba(255,255,255,.45);">Performance Ratio (PVGIS)</span>
              <span style="font-weight:700; color:var(--sun); font-size:.9rem;" id="r-pr">—</span>
            </div>
          </div>

          <div style="background:rgba(245,158,11,.08); border:1px solid rgba(245,158,11,.2); border-radius:var(--radius); padding:14px; font-size:.76rem; color:rgba(255,255,255,.5); line-height:1.6;">
            * Production estimée, conditions météo moyennes historiques. Valeur réelle ±15–20%.<br>
            ** Tarif indicatif 0,2516 €/kWh (source : CRE, estimation 2026) · 70% d'autoconsommation.<br>
            *** Facteur d'émission 57 gCO₂eq/kWh (source : RTE — Bilan Carbone 2024).
          </div>

          <div style="margin-top:20px; display:flex; flex-direction:column; gap:10px;">
            <a href="/aides" class="btn btn-primary" style="justify-content:center;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
              Voir mes aides financières
            </a>
            <a href="/annuaire" class="btn btn-ghost" style="justify-content:center;">
              Trouver un installateur RGE
            </a>
          </div>
        </div>

        <div id="result-error" style="display:none; text-align:center; padding:24px;">
          <p style="color:#FCA5A5;" id="error-msg"></p>
          <button onclick="resetResults()" style="color:rgba(255,255,255,.5); font-size:.82rem; margin-top:10px; cursor:pointer; background:none; border:none;">Réessayer</button>
        </div>
      </div>

    </div>

    <!-- FAQ PVGIS -->
    <div style="max-width:760px; margin:80px auto 0;" class="reveal-on-scroll">
      <h2 style="text-align:center; margin-bottom:32px;">Questions sur le simulateur</h2>
      <div class="faq-list">
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            D'où viennent les données ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer"><div class="faq-answer-inner">
            L'API <strong>PVGIS</strong> du Centre Commun de Recherche (JRC) de la Commission Européenne. Données satellitaires d'irradiation solaire sur 20+ ans. C'est la référence académique et réglementaire pour estimer le potentiel photovoltaïque en Europe. <a href="https://re.jrc.ec.europa.eu/pvg_tools/fr/" target="_blank" rel="noopener noreferrer" style="color:var(--sky);">Accéder à l'outil officiel →</a>
          </div></div>
        </div>
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Quelle précision pour les estimations ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer"><div class="faq-answer-inner">
            Les estimations PVGIS ont une incertitude typique de <strong>±15 à 20%</strong>. Les facteurs locaux (ombrage, salissures, qualité des équipements, câblage) peuvent faire varier la production réelle. Ce sont des ordres de grandeur pour aider à la décision.
          </div></div>
        </div>
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Comment est calculée l'économie estimée ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer"><div class="faq-answer-inner">
            Basé sur un tarif indicatif de 0,2516 €/kWh (source CRE, estimation 2026) et un taux d'autoconsommation de 70%. Votre situation réelle (contrat, habitudes, stockage) peut faire varier significativement ce chiffre.
          </div></div>
        </div>
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Pourquoi seulement Lyon et ses environs ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer"><div class="faq-answer-inner">
            Nous avons commencé par la région lyonnaise pour garantir la qualité des coordonnées géographiques utilisées. L'extension à d'autres villes françaises est prévue progressivement. L'API PVGIS, elle, couvre toute l'Europe — c'est notre liste de villes que nous élargissons.
          </div></div>
        </div>
      </div>
    </div>

    <!-- CTA interne -->
    <div style="margin-top:64px; text-align:center;" class="reveal-on-scroll">
      <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap;">
        <a href="/aides" class="btn btn-outline">Aides financières 2026</a>
        <a href="/annuaire" class="btn btn-secondary">Trouver un installateur</a>
      </div>
    </div>
  </div>
</section>

<script>
function selectVilleFromList(sel) {
  const val = sel.value;
  if (!val) {
    document.getElementById('ville-selected').style.display = 'none';
    document.getElementById('sim-btn').disabled = true;
    document.getElementById('sim-btn-text').textContent = 'Sélectionnez d\'abord une commune';
    return;
  }
  const parts = val.split('|');
  document.getElementById('lat-val').value = parts[0];
  document.getElementById('lon-val').value = parts[1];
  document.getElementById('ville-name').textContent = parts[2];
  document.getElementById('ville-selected').style.display = 'flex';
  document.getElementById('sim-btn').disabled = false;
  document.getElementById('sim-btn-text').textContent = 'Calculer ma production';
}

function updatePanels(kw) {
  document.getElementById('panels-count').textContent = Math.round(parseFloat(kw) / 0.5);
}

function resetResults() {
  document.getElementById('result-error').style.display = 'none';
  document.getElementById('result-placeholder').style.display = 'block';
}

async function lancerSimulation() {
  const lat    = parseFloat(document.getElementById('lat-val').value);
  const lon    = parseFloat(document.getElementById('lon-val').value);
  const peakp  = parseFloat(document.getElementById('peakp-range').value);
  const angle  = parseInt(document.getElementById('angle-range').value);
  const aspect = parseInt(document.getElementById('aspect-select').value);
  const loss   = parseInt(document.getElementById('loss-range').value);

  if (!lat || !lon) {
    alert('Veuillez sélectionner une commune dans la liste.');
    return;
  }

  const btn = document.getElementById('sim-btn');
  const btnText = document.getElementById('sim-btn-text');
  btn.disabled = true;
  btnText.textContent = 'Calcul en cours…';

  document.getElementById('result-placeholder').style.display = 'none';
  document.getElementById('result-data').style.display = 'none';
  document.getElementById('result-error').style.display = 'none';

  // Loader
  const loaderDiv = document.createElement('div');
  loaderDiv.id = 'result-loader';
  loaderDiv.style.cssText = 'text-align:center; padding:40px 24px;';
  loaderDiv.innerHTML = `
    <div style="width:40px;height:40px;border:3px solid rgba(255,255,255,.15);border-top-color:var(--sun);border-radius:50%;animation:spin 1s linear infinite;margin:0 auto 16px;"></div>
    <p style="color:rgba(255,255,255,.4);font-size:.84rem;">Interrogation de l'API PVGIS…</p>
    <style>@keyframes spin{to{transform:rotate(360deg)}}</style>`;
  document.querySelector('.sim-results-card').appendChild(loaderDiv);

  const fd = new FormData();
  fd.append('action', 'simulate');
  fd.append('lat', lat);
  fd.append('lon', lon);
  fd.append('peakp', peakp);
  fd.append('angle', angle);
  fd.append('aspect', aspect);
  fd.append('loss', loss);

  try {
    const r = await fetch('/simulateur', { method: 'POST', body: fd });
    const data = await r.json();
    loaderDiv.remove();
    btn.disabled = false;
    btnText.textContent = 'Recalculer';

    if (data.error) {
      document.getElementById('error-msg').textContent = data.error;
      document.getElementById('result-error').style.display = 'block';
      return;
    }

    document.getElementById('r-ey').textContent = data.e_y.toLocaleString('fr-FR') + ' kWh';
    document.getElementById('r-em').textContent = data.e_m.toLocaleString('fr-FR') + ' kWh';
    document.getElementById('r-eco').textContent = data.economies.toLocaleString('fr-FR') + ' €';
    document.getElementById('r-co2').textContent = data.co2 + ' T';
    document.getElementById('r-hy').textContent = data.h_y.toLocaleString('fr-FR') + ' kWh/m²/an';
    document.getElementById('r-pr').textContent = data.pr + '%';
    document.getElementById('result-data').style.display = 'block';

  } catch(e) {
    loaderDiv.remove();
    btn.disabled = false;
    btnText.textContent = 'Calculer ma production';
    document.getElementById('error-msg').textContent = "Erreur de connexion. Vérifiez votre réseau et réessayez.";
    document.getElementById('result-error').style.display = 'block';
  }
}

function toggleFaq(btn) {
  btn.classList.toggle('open');
  btn.nextElementSibling.classList.toggle('open');
}
</script>

<?php require 'footer.php'; ?>