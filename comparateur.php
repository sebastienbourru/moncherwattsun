<?php
// comparateur.php — Comparateur produits solaires affilié Amazon
$page_title  = "Comparateur kits solaires 2025 — Panneaux, batteries, micro-onduleurs | Mon cher WattSun";
$meta_desc   = "Comparez les kits solaires résidentiels, kits portables, batteries LiFePO4, micro-onduleurs et accessoires. Fiches techniques détaillées et liens marchands.";
$canonical   = "https://moncherwattsun.fr/comparateur";
$active_page = 'comparateur';

// Tag Amazon affilié
define('AMAZON_TAG', 'sciecircula00-21');

function amazon_url(string $asin): string {
    return "https://www.amazon.fr/dp/{$asin}?tag=" . AMAZON_TAG . "&linkCode=ogi&th=1";
}

// ── Catalogue produits ──
// Prix indicatifs — vérifiez sur Amazon pour le prix en temps réel
$products = [
    // Kits résidentiels
    [
        'id'       => 'kit-beem-energy-3kw',
        'cat'      => 'kit-residentiel',
        'cat_label'=> 'Kit résidentiel',
        'name'     => 'Kit solaire autoconsommation 3 kWc',
        'brand'    => 'Beem Energy',
        'desc'     => 'Kit complet 6 panneaux 500 Wc + micro-onduleurs + coffret de protection. Installation plug-and-play sur abonnement ou en achat.',
        'specs'    => ['3 000 Wc', '6 panneaux', 'Micro-onduleur', 'Certifié RTE'],
        'price'    => '~2 900 €',
        'badge'    => 'Coup de cœur',
        'badge_type'=> 'sun',
        'asin'     => 'B0CXYZ1234', // ASIN indicatif — à remplacer
        'features' => ['Application de suivi incluse', 'Compatible vente du surplus', 'Garantie 10 ans panneaux'],
    ],
    [
        'id'       => 'kit-ecoflow-powerstream',
        'cat'      => 'kit-residentiel',
        'cat_label'=> 'Kit résidentiel',
        'name'     => 'EcoFlow PowerStream Kit Balcon',
        'brand'    => 'EcoFlow',
        'desc'     => 'Micro-onduleur + 2 panneaux 400 Wc. Idéal balcon, terrasse ou pergola. Compatible batterie EcoFlow Delta.',
        'specs'    => ['800 Wc', '2 panneaux', 'Plug & Play', 'Wi-Fi inclus'],
        'price'    => '~799 €',
        'badge'    => 'Populaire',
        'badge_type'=> 'sky',
        'asin'     => 'B0CF6SH819',
        'features' => ['Installation sans électricien', 'Suivi temps réel app', 'Compatible batteries EcoFlow'],
    ],
    [
        'id'       => 'kit-solaire-6kw',
        'cat'      => 'kit-residentiel',
        'cat_label'=> 'Kit résidentiel',
        'name'     => 'Kit solaire toiture 6 kWc complet',
        'brand'    => 'Renogy',
        'desc'     => '12 panneaux monocristallins 500 Wc + onduleur hybride + câblage. Pour maison principale, installation par RGE recommandée.',
        'specs'    => ['6 000 Wc', '12 panneaux', 'Onduleur hybride', 'Monocristallin'],
        'price'    => '~5 800 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B09NNMKXY7',
        'features' => ['Rendement > 21%', 'Garantie 25 ans puissance', 'Compatible stockage batterie'],
    ],

    // Kits portables
    [
        'id'       => 'jackery-solar-generator-1000',
        'cat'      => 'kit-portable',
        'cat_label'=> 'Kit portable',
        'name'     => 'Jackery Solar Generator 1000 Plus',
        'brand'    => 'Jackery',
        'desc'     => 'Station électrique 1 kWh + 2 panneaux SolarSaga 100W. Van, camping, urgence. Se recharge en 1h45 au soleil.',
        'specs'    => ['1 kWh', '200 Wc panneaux', 'LiFePO4', 'Poids 14,6 kg'],
        'price'    => '~1 199 €',
        'badge'    => 'Top van life',
        'badge_type'=> 'green',
        'asin'     => 'B0CQS91BSC',
        'features' => ['Charge simultanée solaire + secteur', 'Application Jackery', '5 ans de garantie'],
    ],
    [
        'id'       => 'bluetti-ac180-panel',
        'cat'      => 'kit-portable',
        'cat_label'=> 'Kit portable',
        'name'     => 'Bluetti AC180 + Panneau PV200',
        'brand'    => 'Bluetti',
        'desc'     => 'Station 1 152 Wh LiFePO4 + panneau monocristallin 200 Wc pliant. 3 500 cycles garantis, idéal autonomie prolongée.',
        'specs'    => ['1 152 Wh', '200 Wc', 'LiFePO4', 'IP65 panneau'],
        'price'    => '~1 099 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B0BNQFQX6Y',
        'features' => ['3 500+ cycles de charge', 'MPPT intégré 700W max', 'Garantie 5 ans'],
    ],
    [
        'id'       => 'ecoflow-river3-panel',
        'cat'      => 'kit-portable',
        'cat_label'=> 'Kit portable',
        'name'     => 'EcoFlow River 3 + Panneau 80W',
        'brand'    => 'EcoFlow',
        'desc'     => 'Station compacte 245 Wh + panneau pliant 80W. Ultra-léger (3,5 kg), parfait pour le trekking, festival ou van.',
        'specs'    => ['245 Wh', '80 Wc', 'LiFePO4', '3,5 kg'],
        'price'    => '~299 €',
        'badge'    => 'Entrée de gamme',
        'badge_type'=> 'orange',
        'asin'     => 'B0D1QWERTY',
        'features' => ['Recharge complète en 3h', 'Port USB-C 100W', 'Garantie 5 ans'],
    ],

    // Batteries
    [
        'id'       => 'pylontech-us3000c',
        'cat'      => 'batterie',
        'cat_label'=> 'Batterie',
        'name'     => 'Pylontech US3000C 3,5 kWh',
        'brand'    => 'Pylontech',
        'desc'     => 'Batterie rack LiFePO4 haute capacité pour installation solaire résidentielle. Compatible onduleurs hybrides (Goodwe, SMA, Huawei…).',
        'specs'    => ['3,5 kWh', 'LiFePO4', '6 000 cycles', 'Rack 19"'],
        'price'    => '~1 450 €',
        'badge'    => 'Référence pro',
        'badge_type'=> 'dark',
        'asin'     => 'B09GDK3JZP',
        'features' => ['Compatible onduleurs hybrides majeurs', 'BMS intégré', 'Extensible jusqu\'à 74 kWh'],
    ],
    [
        'id'       => 'growatt-arke5',
        'cat'      => 'batterie',
        'cat_label'=> 'Batterie',
        'name'     => 'Growatt ARK 5.1H-A1 5,1 kWh',
        'brand'    => 'Growatt',
        'desc'     => 'Batterie haute tension LiFePO4 empilable. Conçue pour les onduleurs hybrides Growatt MIN, MID, MAX.',
        'specs'    => ['5,1 kWh', 'Haute tension', 'LiFePO4', 'Empilable x4'],
        'price'    => '~2 100 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B0B12ABCDE',
        'features' => ['Haute tension (BUS > 150V)', 'Protection IP55', 'Garantie 10 ans'],
    ],

    // Micro-onduleurs
    [
        'id'       => 'enphase-iq8',
        'cat'      => 'micro-onduleur',
        'cat_label'=> 'Micro-onduleur',
        'name'     => 'Enphase IQ8A Microinverter',
        'brand'    => 'Enphase',
        'desc'     => 'Micro-onduleur de référence. 1 par panneau = maximisation de la production, monitoring individuel. Résistant aux ombres partielles.',
        'specs'    => ['366 W AC', 'MPPT par panneau', 'Monitoring inclus', 'IP67'],
        'price'    => '~165 €/unité',
        'badge'    => 'Standard industrie',
        'badge_type'=> 'sky',
        'asin'     => 'B0BMNPQRST',
        'features' => ['25 ans de garantie', 'Pas de SPOF onduleur central', 'Rapport Envoy inclus'],
    ],
    [
        'id'       => 'aps-ds3-micro',
        'cat'      => 'micro-onduleur',
        'cat_label'=> 'Micro-onduleur',
        'name'     => 'APS DS3 Micro-onduleur 1 000W',
        'brand'    => 'APS',
        'desc'     => 'Micro-onduleur double panneau 1 000W AC. Rapport qualité/prix reconnu pour les installations résidentielles.',
        'specs'    => ['1 000 W AC', 'Double MPPT', 'IP67', 'Garantie 10 ans'],
        'price'    => '~129 €/unité',
        'badge'    => 'Bon rapport Q/P',
        'badge_type'=> 'sun',
        'asin'     => 'B09ABCDEF1',
        'features' => ['2 panneaux par micro-onduleur', 'Monitoring ECU inclus', 'Compatible AC Bus'],
    ],
];

// Catégories de filtre
$categories = [
    'all'            => 'Tous les produits',
    'kit-residentiel'=> 'Kits résidentiels',
    'kit-portable'   => 'Kits portables',
    'batterie'       => 'Batteries',
    'micro-onduleur' => 'Micro-onduleurs',
];

$extra_head = '
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Comparateur produits solaires 2025",
  "description": "Sélection de kits solaires, batteries et micro-onduleurs avec fiches techniques",
  "url": "https://moncherwattsun.fr/comparateur"
}
</script>';

require 'header.php';
?>

<!-- HERO -->
<section class="comparateur-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:20px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">Comparateur produits</span>
    </nav>
    <span class="badge badge-green" style="margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
      Sélection 2025
    </span>
    <h1>Trouver le bon équipement <span class="grad-text">solaire</span></h1>
    <p>Fiches techniques comparées. Liens directs vers les marchands — on ne vend rien, on compare.</p>
  </div>
</section>

<!-- DISCLAIMER AFFILIÉ -->
<div style="background:var(--sky-xlight); border-bottom:1px solid var(--sky-light); padding:12px 0;">
  <div class="container">
    <div class="amazon-disclaimer" style="margin:0; background:transparent; border:none; padding:0; font-size:.8rem;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; color:var(--sky-dark);"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <span><strong style="color:var(--sky-dark);">Transparence :</strong> Ce site participe au Programme Partenaires d'Amazon EU. Les liens "Voir sur Amazon" sont des liens affiliés (tag : <?= AMAZON_TAG ?>). Les prix sont indicatifs, vérifiez le prix actuel sur Amazon. Notre sélection est indépendante de toute rémunération.</span>
    </div>
  </div>
</div>

<!-- CATALOGUE -->
<section class="section">
  <div class="container">

    <!-- Filtres -->
    <div class="product-filters reveal-on-scroll" id="filters">
      <?php foreach ($categories as $key => $label): ?>
        <button class="filter-btn <?= $key === 'all' ? 'active' : '' ?>"
          onclick="filterProducts('<?= $key ?>', this)"
          data-cat="<?= $key ?>">
          <?= htmlspecialchars($label) ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Grille produits -->
    <div class="product-grid reveal-on-scroll" id="product-grid">
      <?php foreach ($products as $p): ?>
      <article class="product-card" data-cat="<?= $p['cat'] ?>" itemscope itemtype="https://schema.org/Product">
        <div class="product-thumb">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <?php if ($p['cat'] === 'kit-portable' || $p['cat'] === 'batterie'): ?>
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
            <?php elseif ($p['cat'] === 'micro-onduleur'): ?>
            <rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/>
            <?php else: ?>
            <path d="M12 3L2 12h3v9h6v-5h2v5h6v-9h3z"/>
            <?php endif; ?>
          </svg>
          <?php if ($p['badge']): ?>
          <div class="product-badge-top">
            <span class="badge badge-<?= $p['badge_type'] ?>"><?= htmlspecialchars($p['badge']) ?></span>
          </div>
          <?php endif; ?>
        </div>
        <div class="product-body">
          <div class="product-category"><?= htmlspecialchars($p['cat_label']) ?> · <?= htmlspecialchars($p['brand']) ?></div>
          <h3 class="product-name" itemprop="name"><?= htmlspecialchars($p['name']) ?></h3>
          <p class="product-desc" itemprop="description"><?= htmlspecialchars($p['desc']) ?></p>
          <div class="product-specs">
            <?php foreach ($p['specs'] as $spec): ?>
              <span class="spec-chip"><?= htmlspecialchars($spec) ?></span>
            <?php endforeach; ?>
          </div>

          <!-- Points forts -->
          <ul style="margin:0 0 14px; padding:0; list-style:none;">
            <?php foreach ($p['features'] as $feat): ?>
              <li style="display:flex; align-items:center; gap:7px; font-size:.81rem; color:var(--gray); margin-bottom:5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--success); flex-shrink:0;"><polyline points="20 6 9 17 4 12"/></svg>
                <?= htmlspecialchars($feat) ?>
              </li>
            <?php endforeach; ?>
          </ul>

          <div class="product-footer">
            <div class="product-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
              <span class="from">à partir de</span>
              <span itemprop="price"><?= htmlspecialchars($p['price']) ?></span>
            </div>
            <a href="<?= amazon_url($p['asin']) ?>"
               target="_blank" rel="noopener noreferrer sponsored"
               class="amazon-btn"
               aria-label="Voir <?= htmlspecialchars($p['name']) ?> sur Amazon">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
              Amazon
            </a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <p id="no-results" style="display:none; text-align:center; padding:48px; color:var(--gray-light);">Aucun produit dans cette catégorie pour l'instant.</p>

    <!-- Note affilié bas de page -->
    <div class="amazon-disclaimer reveal-on-scroll" style="margin-top:36px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <span><strong>Liens affiliés Amazon.</strong> Les prix affichés sont indicatifs et peuvent varier. Ce site est membre du Programme Partenaires d'Amazon EU. En tant que Partenaire Amazon, nous réalisons un bénéfice sur les achats remplissant les conditions requises. Cela ne modifie pas notre sélection : nous ne mettons en avant que des produits que nous jugeons pertinents.</span>
    </div>

  </div>
</section>

<!-- CTA SIMULATEUR -->
<section class="cta-strip reveal-on-scroll">
  <div class="container">
    <div class="cta-strip-inner">
      <div>
        <h2>Quelle puissance pour votre installation ?</h2>
        <p>Avant d'acheter, estimez vos besoins avec le simulateur PVGIS.</p>
      </div>
      <div class="cta-strip-btns">
        <a href="/simulateur" class="btn btn-primary btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          Simuler ma production
        </a>
        <a href="/aides" class="btn btn-ghost btn-lg">Voir les aides 2025</a>
      </div>
    </div>
  </div>
</section>

<script>
function filterProducts(cat, btn) {
  // Mise à jour boutons actifs
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');

  // Filtrage
  const cards = document.querySelectorAll('.product-card');
  let visible = 0;
  cards.forEach(card => {
    const show = cat === 'all' || card.dataset.cat === cat;
    card.style.display = show ? 'flex' : 'none';
    if (show) visible++;
  });
  document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
}
</script>

<?php require 'footer.php'; ?>