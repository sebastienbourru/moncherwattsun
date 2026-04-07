<?php
// annuaire.php v3 — Carte interactive, mini-cartes, tri, filtrage strict
$page_title  = "Annuaire installateurs solaires — Lyon et agglomération | Mon cher WattSun";
$meta_desc   = "Trouvez un installateur de panneaux solaires à Lyon, Villeurbanne, Caluire, Vénissieux, Bron et communes limitrophes. Avis, notes et coordonnées vérifiées.";
$canonical   = "https://moncherwattsun.fr/annuaire";
$active_page = 'annuaire';

// Charger le .env pour la clé Maps JS
$env_file = __DIR__ . '/.env';
if (file_exists($env_file)) {
    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') === false) continue;
        list($key, $value) = array_map('trim', explode('=', $line, 2));
        putenv("$key=$value");
    }
}
$MAPS_KEY = getenv('GOOGLE_PLACES_API_KEY') ?: '';

// ── Villes ──
$VILLES_ANNUAIRE = [
    ['nom' => 'Lyon',               'cp' => '69000', 'slug' => 'lyon',               'lat' => 45.7640, 'lng' => 4.8357],
    ['nom' => 'Villeurbanne',        'cp' => '69100', 'slug' => 'villeurbanne',        'lat' => 45.7667, 'lng' => 4.8799],
    ['nom' => 'Caluire-et-Cuire',    'cp' => '69300', 'slug' => 'caluire-et-cuire',    'lat' => 45.7953, 'lng' => 4.8472],
    ['nom' => 'Vénissieux',          'cp' => '69200', 'slug' => 'venissieux',          'lat' => 45.6973, 'lng' => 4.8864],
    ['nom' => 'Bron',                'cp' => '69500', 'slug' => 'bron',                'lat' => 45.7386, 'lng' => 4.9131],
    ['nom' => 'Saint-Fons',          'cp' => '69190', 'slug' => 'saint-fons',          'lat' => 45.7097, 'lng' => 4.8531],
    ['nom' => 'Oullins',             'cp' => '69600', 'slug' => 'oullins',             'lat' => 45.7147, 'lng' => 4.8097],
    ['nom' => 'Saint-Genis-Laval',   'cp' => '69230', 'slug' => 'saint-genis-laval',   'lat' => 45.6942, 'lng' => 4.7925],
    ['nom' => 'Tassin-la-Demi-Lune', 'cp' => '69160', 'slug' => 'tassin-la-demi-lune', 'lat' => 45.7642, 'lng' => 4.7756],
    ['nom' => 'Craponne',            'cp' => '69290', 'slug' => 'craponne',            'lat' => 45.7456, 'lng' => 4.7228],
    ['nom' => 'Francheville',        'cp' => '69340', 'slug' => 'francheville',        'lat' => 45.7358, 'lng' => 4.7583],
    ['nom' => 'Sainte-Foy-lès-Lyon', 'cp' => '69110', 'slug' => 'sainte-foy-les-lyon', 'lat' => 45.7331, 'lng' => 4.7953],
    ['nom' => 'Pierre-Bénite',       'cp' => '69310', 'slug' => 'pierre-benite',       'lat' => 45.7044, 'lng' => 4.8256],
    ['nom' => 'Décines-Charpieu',    'cp' => '69150', 'slug' => 'decines-charpieu',    'lat' => 45.7694, 'lng' => 4.9586],
    ['nom' => 'Meyzieu',             'cp' => '69330', 'slug' => 'meyzieu',             'lat' => 45.7667, 'lng' => 5.0028],
];

// ── Ville sélectionnée ──
$selected_slug = isset($_GET['ville']) ? preg_replace('/[^a-z0-9-]/', '', strtolower($_GET['ville'])) : null;
$selected_ville = null;
if ($selected_slug) {
    foreach ($VILLES_ANNUAIRE as $v) {
        if ($v['slug'] === $selected_slug) {
            $selected_ville = $v;
            break;
        }
    }
}

// ── Lecture cache ──
$pros = [];
$api_error = null;
$cache_date = null;
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'note';

if ($selected_ville) {
    $cache_file = __DIR__ . '/cache/annuaire/' . $selected_ville['slug'] . '.json';
    if (file_exists($cache_file)) {
        $pros = json_decode(file_get_contents($cache_file), true) ?: [];
        $cache_date = date('d/m/Y', filemtime($cache_file));
        // Filtrer les entreprises fermées
        $pros = array_values(array_filter($pros, function($p) {
            $s = $p['statut'] ?? 'OPERATIONAL';
            return $s !== 'CLOSED_TEMPORARILY' && $s !== 'CLOSED_PERMANENTLY';
        }));
    }

    // Tri selon le paramètre
    if ($tri === 'avis') {
        usort($pros, fn($a, $b) => ($b['nb_avis'] ?? 0) <=> ($a['nb_avis'] ?? 0));
    } else {
        usort($pros, function($a, $b) {
            if (($b['note'] ?? 0) !== ($a['note'] ?? 0)) {
                return ($b['note'] ?? 0) <=> ($a['note'] ?? 0);
            }
            return ($b['nb_avis'] ?? 0) <=> ($a['nb_avis'] ?? 0);
        });
    }

    if (empty($pros)) {
        $api_error = "Aucun installateur référencé pour " . htmlspecialchars($selected_ville['nom']) . " dans cette commune. Consultez <a href='https://france-renov.gouv.fr/annuaire-rge' target='_blank' rel='noopener noreferrer'>l'annuaire RGE France Rénov'</a> ou <a href='https://www.google.com/maps/search/installateur+panneaux+solaires+" . urlencode($selected_ville['nom']) . "' target='_blank' rel='noopener noreferrer'>Google Maps</a>.";
    }
}

// JSON pour la carte JS
$pros_json = json_encode($pros, JSON_UNESCAPED_UNICODE);

$extra_head = '';
if ($selected_ville && !empty($pros)) {
    $extra_head = '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>';
    $extra_head .= '<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>';
}

$extra_head .= '
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SearchResultsPage",
  "name": "Annuaire installateurs solaires — Lyon et agglomération",
  "url": "https://moncherwattsun.fr/annuaire"
}
</script>
<style>
.annuaire-map{width:100%;height:400px;border-radius:16px;margin-bottom:32px;border:1px solid #e5e7eb;overflow:hidden;}
.pro-minimap{width:100%;height:180px;border-radius:12px;margin-top:12px;border:1px solid #e5e7eb;overflow:hidden;}
.tri-bar{display:flex;gap:8px;margin-bottom:24px;align-items:center;flex-wrap:wrap;}
.tri-bar span{font-size:.85rem;color:var(--gray);font-weight:500;}
.tri-btn{padding:6px 16px;border-radius:20px;font-size:.82rem;border:1px solid #e5e7eb;background:#fff;color:var(--dark);cursor:pointer;text-decoration:none;transition:all .2s;}
.tri-btn:hover{border-color:var(--sky);color:var(--sky);}
.tri-btn.active{background:var(--sky);color:#fff;border-color:var(--sky);}
.pro-card-v2{background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:24px;margin-bottom:20px;transition:box-shadow .2s,transform .2s;}
.pro-card-v2:hover{box-shadow:0 8px 30px rgba(0,0,0,.08);transform:translateY(-2px);}
.pro-header{display:flex;align-items:flex-start;gap:16px;}
.pro-logo-v2{width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:1.2rem;background:#f3f4f6;color:var(--dark);flex-shrink:0;}
.pro-logo-top{background:linear-gradient(135deg,#f59e0b,#f97316);color:#fff;}
.pro-info{flex:1;min-width:0;}
.pro-name-v2{font-size:1.1rem;font-weight:700;color:var(--dark);margin-bottom:4px;}
.pro-rating{display:inline-flex;align-items:center;gap:4px;background:#FEF3C7;color:#92400E;padding:3px 10px;border-radius:8px;font-size:.82rem;font-weight:600;}
.pro-avis{font-size:.82rem;color:var(--gray);margin-left:6px;}
.pro-details{margin-top:12px;display:grid;gap:6px;}
.pro-detail{font-size:.85rem;display:flex;align-items:center;gap:6px;}
.pro-detail svg{flex-shrink:0;color:var(--gray);}
.pro-detail a{color:var(--dark);text-decoration:none;}
.pro-detail a:hover{color:var(--sky);}
.pro-actions{display:flex;gap:8px;margin-top:16px;flex-wrap:wrap;}
.pro-bottom{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px;}
.pro-types{display:flex;flex-wrap:wrap;gap:5px;margin-top:6px;}
.pro-type-tag{background:#EDE9FE;color:#5B21B6;font-size:.72rem;font-weight:600;padding:2px 9px;border-radius:6px;}
.pro-reviews{margin-top:16px;padding-top:16px;border-top:1px solid #e5e7eb;}
.pro-reviews-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;}
.pro-reviews-title{font-size:.82rem;font-weight:700;color:var(--dark);}
.pro-reviews-nav{display:flex;gap:4px;}
.review-arrow{width:28px;height:28px;border-radius:50%;border:1px solid #e5e7eb;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s;color:var(--gray);}
.review-arrow:hover{border-color:var(--sky);color:var(--sky);background:var(--sky-xlight,#f0f9ff);}
.pro-review-card{background:#f9fafb;border-radius:10px;padding:14px 16px;}
.review-meta{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:6px;font-size:.8rem;}
.review-meta strong{color:var(--dark);}
.review-stars{color:#f59e0b;font-size:.78rem;letter-spacing:1px;}
.review-date{color:var(--gray);font-size:.72rem;}
.review-text{font-size:.82rem;color:var(--gray);line-height:1.6;margin:0;}
@media(max-width:768px){
  .pro-bottom{grid-template-columns:1fr;}
  .pro-header{flex-wrap:wrap;}
  .annuaire-map{height:280px;}
}
</style>';

require 'header.php';
?>

<!-- HERO -->
<section class="annuaire-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:20px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <?php if ($selected_ville): ?>
      <a href="/annuaire">Annuaire</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current"><?= htmlspecialchars($selected_ville['nom']) ?></span>
      <?php else: ?>
      <span class="breadcrumb-current">Annuaire installateurs</span>
      <?php endif; ?>
    </nav>
    <span class="badge" style="background:#EDE9FE; color:#5B21B6; margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Lyon &amp; agglomération
    </span>
    <?php if ($selected_ville): ?>
    <h1>Installateurs solaires à <span class="grad-text"><?= htmlspecialchars($selected_ville['nom']) ?></span></h1>
    <p><?= count($pros) ?> professionnel<?= count($pros) > 1 ? 's' : '' ?> trouvé<?= count($pros) > 1 ? 's' : '' ?> · Source&nbsp;: Google Maps · Données du <?= $cache_date ?? '—' ?></p>
    <?php else: ?>
    <h1>Trouvez un installateur <span class="grad-text">panneaux solaires</span></h1>
    <p>Résultats issus de Google Maps. Notes, avis clients et coordonnées vérifiées.</p>
    <?php endif; ?>
  </div>
</section>

<section class="section">
  <div class="container">

    <?php if (!$selected_ville): ?>
    <!-- ══════ LISTE DES VILLES ══════ -->
    <div class="section-header reveal-on-scroll" style="margin-bottom:36px;">
      <span class="badge badge-dark">Zone couverte</span>
      <h2>Choisissez votre commune</h2>
      <p>15 communes de l'agglomération lyonnaise. Extension prévue progressivement.</p>
    </div>

    <div class="city-grid reveal-on-scroll">
      <?php foreach ($VILLES_ANNUAIRE as $v): ?>
      <a href="/annuaire/<?= $v['slug'] ?>" class="city-card">
        <div class="city-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div>
          <div class="city-name"><?= htmlspecialchars($v['nom']) ?></div>
          <div class="city-meta"><?= $v['cp'] ?></div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="notice notice-info reveal-on-scroll" style="margin-top:48px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <div>
        <strong>Certification RGE</strong>&nbsp;: obligatoire pour bénéficier des aides de l'État. Vérifiez toujours la certification sur <a href="https://france-renov.gouv.fr/annuaire-rge" target="_blank" rel="noopener noreferrer" style="color:var(--sky-dark);">france-renov.gouv.fr</a>.
      </div>
    </div>

    <?php else: ?>
    <!-- ══════ PAGE VILLE ══════ -->

    <!-- Notice RGE -->
    <div class="notice notice-warning reveal-on-scroll" style="margin-bottom:24px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      <div>Cet annuaire liste des professionnels trouvés sur Google Maps. <strong>Vérifiez toujours la certification RGE</strong> sur <a href="https://france-renov.gouv.fr/annuaire-rge" target="_blank" rel="noopener noreferrer" style="color:#92400E; font-weight:700;">france-renov.gouv.fr</a> avant de signer un devis.</div>
    </div>

    <?php if ($api_error): ?>
    <div class="notice notice-info reveal-on-scroll" style="margin-bottom:32px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <div><?= $api_error ?></div>
    </div>
    <?php else: ?>

    <!-- ══════ CARTE INTERACTIVE VILLE ══════ -->
    <div id="map-ville" class="annuaire-map reveal-on-scroll"></div>

    <!-- ══════ BARRE DE TRI ══════ -->
    <div class="tri-bar reveal-on-scroll">
      <span>Trier par&nbsp;:</span>
      <a href="/annuaire/<?= $selected_slug ?>?tri=note" class="tri-btn <?= $tri === 'note' ? 'active' : '' ?>">★ Meilleure note</a>
      <a href="/annuaire/<?= $selected_slug ?>?tri=avis" class="tri-btn <?= $tri === 'avis' ? 'active' : '' ?>">💬 Plus d'avis</a>
    </div>

    <!-- ══════ LISTE DES PROS ══════ -->
    <div class="reveal-on-scroll">
      <?php foreach ($pros as $idx => $pro): ?>
      <div class="pro-card-v2" id="pro-<?= $idx ?>">
        <div class="pro-header">
          <div class="pro-logo-v2 <?= isset($pro['note']) && $pro['note'] >= 4.5 ? 'pro-logo-top' : '' ?>">
            <?= htmlspecialchars($pro['initiale'] ?? 'E') ?>
          </div>
          <div class="pro-info">
            <div class="pro-name-v2"><?= htmlspecialchars($pro['nom']) ?></div>
            <?php if (!empty($pro['note'])): ?>
            <span class="pro-rating">★&nbsp;<?= number_format($pro['note'], 1, ',', '') ?></span>
            <span class="pro-avis"><?= $pro['nb_avis'] ?>&nbsp;avis Google</span>
            <?php endif; ?>
            <?php if (!empty($pro['types'])): ?>
            <div class="pro-types">
              <?php foreach ($pro['types'] as $type): ?>
              <span class="pro-type-tag"><?= htmlspecialchars($type) ?></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="pro-details">
          <!-- Adresse -->
          <div class="pro-detail">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?= htmlspecialchars($pro['adresse']) ?>
          </div>
          <!-- Téléphone -->
          <?php if (!empty($pro['telephone'])): ?>
          <div class="pro-detail">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $pro['telephone'])) ?>"><?= htmlspecialchars($pro['telephone']) ?></a>
          </div>
          <?php endif; ?>
          <!-- Site web -->
          <?php if (!empty($pro['site_web'])): ?>
          <div class="pro-detail">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            <a href="<?= htmlspecialchars($pro['site_web']) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars(parse_url($pro['site_web'], PHP_URL_HOST) ?: 'Site web') ?></a>
          </div>
          <?php endif; ?>
        </div>

        <!-- Boutons + Mini-carte -->
        <div class="pro-bottom">
          <div>
            <div class="pro-actions">
              <a href="<?= htmlspecialchars($pro['url_maps'] ?? '#') ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="font-size:.82rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Voir sur Google Maps
              </a>
            </div>
            <?php if (!empty($pro['horaires'])): ?>
            <details style="margin-top:12px;font-size:.82rem;">
              <summary style="cursor:pointer;color:var(--sky);font-weight:500;">Voir les horaires</summary>
              <ul style="margin-top:8px;padding-left:16px;color:var(--gray);line-height:1.8;">
                <?php foreach ($pro['horaires'] as $h): ?>
                <li><?= htmlspecialchars($h) ?></li>
                <?php endforeach; ?>
              </ul>
            </details>
            <?php endif; ?>
          </div>
          <!-- Mini-carte -->
          <?php if (!empty($pro['lat']) && !empty($pro['lng'])): ?>
          <div class="pro-minimap" id="minimap-<?= $idx ?>"></div>
          <?php endif; ?>
        </div>

        <!-- Avis Google -->
        <?php if (!empty($pro['reviews'])): ?>
        <div class="pro-reviews">
          <div class="pro-reviews-header">
            <span class="pro-reviews-title">Avis Google</span>
            <div class="pro-reviews-nav">
              <button class="review-arrow review-prev" onclick="slideReview(<?= $idx ?>, -1)" aria-label="Avis précédent">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
              </button>
              <button class="review-arrow review-next" onclick="slideReview(<?= $idx ?>, 1)" aria-label="Avis suivant">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              </button>
            </div>
          </div>
          <div class="pro-reviews-track" id="reviews-<?= $idx ?>">
            <?php foreach ($pro['reviews'] as $ri => $review): ?>
            <div class="pro-review-card" <?= $ri > 0 ? 'style="display:none;"' : '' ?>>
              <div class="review-meta">
                <strong><?= htmlspecialchars($review['auteur']) ?></strong>
                <?php if (!empty($review['note'])): ?>
                <span class="review-stars"><?= str_repeat('★', (int)$review['note']) ?><?= str_repeat('☆', 5 - (int)$review['note']) ?></span>
                <?php endif; ?>
                <?php if (!empty($review['date'])): ?>
                <span class="review-date"><?= htmlspecialchars($review['date']) ?></span>
                <?php endif; ?>
              </div>
              <?php if (!empty($review['texte'])): ?>
              <p class="review-text"><?= htmlspecialchars(mb_strimwidth($review['texte'], 0, 300, '…')) ?></p>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

      </div>
      <?php endforeach; ?>
    </div>

    <p style="text-align:center; font-size:.85rem; color:var(--gray); margin-top:24px;">
      <?= count($pros) ?> résultat<?= count($pros) > 1 ? 's' : '' ?> strictement dans la commune
      · Source&nbsp;: Google Maps
      <?php if ($cache_date): ?>· Données du <?= $cache_date ?><?php endif; ?>
    </p>

    <?php endif; ?>

    <!-- Autres villes -->
    <div style="margin-top:48px;" class="reveal-on-scroll">
      <h3 style="margin-bottom:20px;">Autres communes</h3>
      <div style="display:flex; flex-wrap:wrap; gap:10px;">
        <?php foreach ($VILLES_ANNUAIRE as $v): ?>
          <?php if ($v['slug'] !== $selected_slug): ?>
          <a href="/annuaire/<?= $v['slug'] ?>" class="badge badge-sky" style="text-transform:none; font-size:.82rem; padding:7px 14px;">
            <?= htmlspecialchars($v['nom']) ?>
          </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <?php endif; ?>

    <!-- CTA -->
    <div class="cta-strip reveal-on-scroll" style="border-radius:var(--radius-xl); margin-top:64px;">
      <div class="container" style="padding:48px;">
        <div class="cta-strip-inner">
          <div>
            <h2>Simulez d'abord votre potentiel</h2>
            <p>Avant de contacter un installateur, estimez votre production avec les données PVGIS.</p>
          </div>
          <a href="/simulateur" class="btn btn-primary btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            Lancer le simulateur
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ══════ LEAFLET MAPS JS ══════ -->
<?php if ($selected_ville && !empty($pros)): ?>
<script>
(function() {
    const prosData = <?= $pros_json ?>;
    const villeLat = <?= $selected_ville['lat'] ?>;
    const villeLng = <?= $selected_ville['lng'] ?>;
    const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    const tileAttr = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>';

    function createNumberIcon(number) {
        return L.divIcon({
            className: 'leaflet-numbered-icon',
            html: '<div style="background:#0284c7;color:#fff;width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;border:2px solid #fff;box-shadow:0 2px 6px rgba(0,0,0,.3);">' + number + '</div>',
            iconSize: [28, 28],
            iconAnchor: [14, 14],
            popupAnchor: [0, -16]
        });
    }

    // ── Carte principale de la ville ──
    const mapVille = L.map('map-ville', {
        center: [villeLat, villeLng],
        zoom: 13
    });
    L.tileLayer(tileUrl, { attribution: tileAttr, maxZoom: 19 }).addTo(mapVille);

    const bounds = [];

    prosData.forEach(function(pro, idx) {
        if (!pro.lat || !pro.lng) return;

        bounds.push([pro.lat, pro.lng]);

        const rating = pro.note ? ' · ★ ' + pro.note.toFixed(1) : '';
        const phone = pro.telephone ? '<br>' + pro.telephone : '';
        const popupContent = '<div style="font-family:sans-serif;max-width:240px;">'
            + '<strong style="font-size:14px;">' + pro.nom + '</strong>' + rating
            + '<br><span style="font-size:12px;color:#666;">' + pro.adresse + '</span>'
            + '<span style="font-size:12px;">' + phone + '</span>'
            + '<br><a href="#pro-' + idx + '" style="font-size:12px;color:#0284c7;">Voir la fiche ↓</a>'
            + '</div>';

        L.marker([pro.lat, pro.lng], { icon: createNumberIcon(idx + 1), title: pro.nom })
            .addTo(mapVille)
            .bindPopup(popupContent);

        // ── Mini-carte pour chaque pro ──
        const minimapEl = document.getElementById('minimap-' + idx);
        if (minimapEl) {
            const minimap = L.map(minimapEl, {
                center: [pro.lat, pro.lng],
                zoom: 16,
                zoomControl: false,
                dragging: false,
                scrollWheelZoom: false,
                doubleClickZoom: false,
                touchZoom: false,
                attributionControl: false
            });
            L.tileLayer(tileUrl, { maxZoom: 19 }).addTo(minimap);
            L.marker([pro.lat, pro.lng], { title: pro.nom }).addTo(minimap);
        }
    });

    // Ajuster le zoom pour voir tous les marqueurs
    if (bounds.length > 1) {
        mapVille.fitBounds(bounds, { padding: [50, 50] });
    }
})();
</script>
<?php endif; ?>

<!-- Carousel avis -->
<script>
function slideReview(proIdx, dir) {
    var track = document.getElementById('reviews-' + proIdx);
    if (!track) return;
    var cards = track.querySelectorAll('.pro-review-card');
    if (cards.length <= 1) return;
    var current = -1;
    for (var i = 0; i < cards.length; i++) {
        if (cards[i].style.display !== 'none') { current = i; break; }
    }
    if (current === -1) return;
    cards[current].style.display = 'none';
    var next = (current + dir + cards.length) % cards.length;
    cards[next].style.display = '';
}
</script>

<!-- Schema.org -->
<?php if ($selected_ville && !empty($pros)): ?>
<script type="application/ld+json">
<?php
$items = [];
$pos = 1;
foreach ($pros as $pro) {
    $item = [
        '@type' => 'ListItem',
        'position' => $pos,
        'item' => [
            '@type' => 'LocalBusiness',
            'name' => $pro['nom'],
            'address' => $pro['adresse'],
        ]
    ];
    if (!empty($pro['note'])) {
        $item['item']['aggregateRating'] = [
            '@type' => 'AggregateRating',
            'ratingValue' => $pro['note'],
            'reviewCount' => $pro['nb_avis'],
        ];
    }
    if (!empty($pro['telephone'])) $item['item']['telephone'] = $pro['telephone'];
    if (!empty($pro['site_web'])) $item['item']['url'] = $pro['site_web'];
    if (!empty($pro['lat'])) {
        $item['item']['geo'] = [
            '@type' => 'GeoCoordinates',
            'latitude' => $pro['lat'],
            'longitude' => $pro['lng'],
        ];
    }
    $items[] = $item;
    $pos++;
}

echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Installateurs panneaux solaires à ' . $selected_ville['nom'],
    'url' => 'https://moncherwattsun.fr/annuaire/' . $selected_slug,
    'numberOfItems' => count($pros),
    'itemListElement' => $items,
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
</script>
<?php endif; ?>

<?php require 'footer.php'; ?>