<?php
// annuaire.php — Annuaire des pros solaires via cache JSON pré-généré
// Les données sont chargées depuis /cache/annuaire/{slug}.json
// Générez les caches avec : generate-annuaire.php
$page_title  = "Annuaire installateurs solaires — Lyon et agglomération | Mon cher WattSun";
$meta_desc   = "Trouvez un installateur de panneaux solaires à Lyon, Villeurbanne, Caluire, Vénissieux, Bron et communes limitrophes. Avis, notes et coordonnées vérifiées.";
$canonical   = "https://moncherwattsun.fr/annuaire";
$active_page = 'annuaire';

// ── Villes couvertes (Lyon + 14 communes limitrophes) ──
$VILLES_ANNUAIRE = [
    ['nom' => 'Lyon',               'cp' => '69000', 'slug' => 'lyon'],
    ['nom' => 'Villeurbanne',        'cp' => '69100', 'slug' => 'villeurbanne'],
    ['nom' => 'Caluire-et-Cuire',    'cp' => '69300', 'slug' => 'caluire-et-cuire'],
    ['nom' => 'Vénissieux',          'cp' => '69200', 'slug' => 'venissieux'],
    ['nom' => 'Bron',                'cp' => '69500', 'slug' => 'bron'],
    ['nom' => 'Saint-Fons',          'cp' => '69190', 'slug' => 'saint-fons'],
    ['nom' => 'Oullins',             'cp' => '69600', 'slug' => 'oullins'],
    ['nom' => 'Saint-Genis-Laval',   'cp' => '69230', 'slug' => 'saint-genis-laval'],
    ['nom' => 'Tassin-la-Demi-Lune', 'cp' => '69160', 'slug' => 'tassin-la-demi-lune'],
    ['nom' => 'Craponne',            'cp' => '69290', 'slug' => 'craponne'],
    ['nom' => 'Francheville',        'cp' => '69340', 'slug' => 'francheville'],
    ['nom' => 'Sainte-Foy-lès-Lyon', 'cp' => '69110', 'slug' => 'sainte-foy-les-lyon'],
    ['nom' => 'Pierre-Bénite',       'cp' => '69310', 'slug' => 'pierre-benite'],
    ['nom' => 'Décines-Charpieu',    'cp' => '69150', 'slug' => 'decines-charpieu'],
    ['nom' => 'Meyzieu',             'cp' => '69330', 'slug' => 'meyzieu'],
];

// ── Ville sélectionnée ? ──
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

// ══════════════════════════════════════════════════════════
// LECTURE DU CACHE JSON (aucun appel API ici)
// ══════════════════════════════════════════════════════════
$pros = [];
$api_error = null;
$cache_date = null;

if ($selected_ville) {
    $cache_file = __DIR__ . '/cache/annuaire/' . $selected_ville['slug'] . '.json';

    if (file_exists($cache_file)) {
        $pros = json_decode(file_get_contents($cache_file), true) ?: [];
        $cache_date = date('d/m/Y', filemtime($cache_file));
    }

    if (empty($pros)) {
        $api_error = "Aucun installateur référencé pour " . htmlspecialchars($selected_ville['nom']) . " pour le moment. Consultez directement <a href='https://france-renov.gouv.fr/annuaire-rge' target='_blank' rel='noopener noreferrer'>l'annuaire RGE France Rénov'</a> ou <a href='https://www.google.com/maps/search/installateur+panneaux+solaires+" . urlencode($selected_ville['nom']) . "' target='_blank' rel='noopener noreferrer'>Google Maps</a>.";
    }
}

$extra_head = '
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SearchResultsPage",
  "name": "Annuaire installateurs solaires — Lyon et agglomération",
  "url": "https://moncherwattsun.fr/annuaire",
  "description": "Trouvez un installateur solaire à Lyon et dans les communes limitrophes."
}
</script>';

require 'header.php';
?>

<!-- HERO -->
<section class="annuaire-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:20px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">Annuaire installateurs</span>
    </nav>
    <span class="badge" style="background:#EDE9FE; color:#5B21B6; margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Lyon &amp; agglomération
    </span>
    <h1>Trouvez un installateur <span class="grad-text">panneaux solaires</span></h1>
    <p>Résultats issus de Google Maps. Notes, avis clients et coordonnées vérifiées.</p>
  </div>
</section>

<!-- CONTENU -->
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
    <nav class="breadcrumb reveal-on-scroll" style="margin-bottom:32px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <a href="/annuaire">Annuaire</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current"><?= htmlspecialchars($selected_ville['nom']) ?></span>
    </nav>

    <div class="reveal-on-scroll" style="margin-bottom:36px;">
      <h2>Installateurs panneaux solaires à <?= htmlspecialchars($selected_ville['nom']) ?> <span style="font-size:1.1rem; font-weight:400; color:var(--gray);">(<?= $selected_ville['cp'] ?>)</span></h2>
      <p style="margin-top:8px;">Résultats issus de <strong>Google Maps</strong>. Notes et avis clients réels.</p>
    </div>

    <!-- Notice RGE -->
    <div class="notice notice-warning reveal-on-scroll" style="margin-bottom:32px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      <div>Cet annuaire liste des professionnels trouvés sur Google Maps. <strong>Vérifiez toujours la certification RGE</strong> sur <a href="https://france-renov.gouv.fr/annuaire-rge" target="_blank" rel="noopener noreferrer" style="color:#92400E; font-weight:700;">france-renov.gouv.fr</a> avant de signer un devis.</div>
    </div>

    <?php if ($api_error): ?>
    <div class="notice notice-info reveal-on-scroll" style="margin-bottom:32px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <div><?= $api_error ?></div>
    </div>
    <?php else: ?>

    <!-- ══════ LISTE DES PROS ══════ -->
    <div class="reveal-on-scroll">
      <?php foreach ($pros as $pro): ?>
      <div class="pro-card">
        <div class="pro-logo" style="<?= isset($pro['note']) && $pro['note'] >= 4.5 ? 'background:linear-gradient(135deg,#f59e0b,#f97316); color:#fff;' : '' ?>">
          <?= htmlspecialchars($pro['initiale'] ?? 'E') ?>
        </div>
        <div class="pro-body">
          <div class="pro-name"><?= htmlspecialchars($pro['nom']) ?></div>

          <?php if (!empty($pro['note'])): ?>
          <div class="pro-tags" style="margin-top:4px;">
            <span class="pro-tag" style="background:#FEF3C7; color:#92400E; font-weight:600;">
              ★&nbsp;<?= number_format($pro['note'], 1, ',', '') ?>
            </span>
            <span style="font-size:.82rem; color:var(--gray);">
              <?= $pro['nb_avis'] ?>&nbsp;avis
            </span>
          </div>
          <?php endif; ?>

          <div class="pro-address">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?= htmlspecialchars($pro['adresse']) ?>
          </div>

          <?php if (!empty($pro['telephone'])): ?>
          <div style="font-size:.85rem; margin-top:4px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:-1px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $pro['telephone'])) ?>" style="color:var(--dark); text-decoration:none;">
              <?= htmlspecialchars($pro['telephone']) ?>
            </a>
          </div>
          <?php endif; ?>

          <?php if (!empty($pro['site_web'])): ?>
          <div style="font-size:.82rem; margin-top:2px;">
            <a href="<?= htmlspecialchars($pro['site_web']) ?>" target="_blank" rel="noopener noreferrer" style="color:var(--sky);">
              Voir le site web&nbsp;→
            </a>
          </div>
          <?php endif; ?>
        </div>

        <div style="flex-shrink:0; display:flex; flex-direction:column; gap:8px; align-items:flex-end;">
          <a href="<?= htmlspecialchars($pro['url_maps'] ?? '#') ?>" target="_blank" rel="noopener noreferrer"
             class="btn btn-primary btn-sm" style="font-size:.78rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            Voir sur Maps
          </a>
          <a href="https://france-renov.gouv.fr/annuaire-rge" target="_blank" rel="noopener noreferrer"
             class="btn btn-outline btn-sm" style="font-size:.78rem;">
            Vérifier RGE
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <p style="text-align:center; font-size:.85rem; color:var(--gray); margin-top:24px;">
      <?= count($pros) ?> résultat<?= count($pros) > 1 ? 's' : '' ?>
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

<!-- Schema.org (si page ville avec résultats) -->
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
    if (!empty($pro['telephone'])) {
        $item['item']['telephone'] = $pro['telephone'];
    }
    if (!empty($pro['site_web'])) {
        $item['item']['url'] = $pro['site_web'];
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