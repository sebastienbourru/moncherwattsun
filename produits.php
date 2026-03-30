<?php
// produits.php — Produits solaires affilié Amazon
$page_title  = "Produits solaires 2026 — Panneaux, kits, batteries, portables | Mon cher WattSun";
$meta_desc   = "Panneaux solaires, kits résidentiels, kits balcon, stations portables pour van et rando, batteries LiFePO4, micro-onduleurs. Fiches techniques et liens marchands.";
$canonical   = "https://moncherwattsun.fr/produits";
$active_page = 'produits';

// Tag Amazon affilié
define('AMAZON_TAG', 'moncherwattsun-21');

function amazon_url(string $asin): string {
    return "https://www.amazon.fr/dp/{$asin}?tag=" . AMAZON_TAG . "&linkCode=ogi&th=1";
}

// ── Catalogue produits ──
$products = [

    // ── Panneaux solaires
    [
        'id'       => 'panneau-renogy-400w',
        'cat'      => 'panneaux',
        'cat_label'=> 'Panneau solaire',
        'name'     => 'Renogy 400W Monocristallin',
        'brand'    => 'Renogy',
        'desc'     => 'Panneau monocristallin 400 Wc haute efficacité. Idéal toiture, abri, pergola. Connecteurs MC4 inclus, cadre aluminium anodisé.',
        'specs'    => ['400 Wc', 'Rendement 21%', 'IP68', 'MC4'],
        'price'    => '~189 €',
        'badge'    => 'Best-seller',
        'badge_type'=> 'sun',
        'asin'     => 'B09TGWX8BW',
        'features' => ['Garantie 25 ans puissance', 'Résistance grêle et vent', 'Câble 1,2 m inclus'],
    ],
    [
        'id'       => 'panneau-ecoflow-100w',
        'cat'      => 'panneaux',
        'cat_label'=> 'Panneau solaire',
        'name'     => 'EcoFlow 100W Panneau rigide',
        'brand'    => 'EcoFlow',
        'desc'     => 'Panneau rigide 100 Wc compatible stations EcoFlow River et Delta. Léger (2,8 kg), installation facile.',
        'specs'    => ['100 Wc', '21,6% rendement', 'IP68', '2,8 kg'],
        'price'    => '~129 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B09TPMC4VN',
        'features' => ['Compatible River / Delta / PowerStream', 'Connecteur XT60 inclus', 'Garantie 5 ans'],
    ],

    // ── Kits résidentiels
    [
        'id'       => 'kit-ecoflow-powerstream-800',
        'cat'      => 'kit-residentiel',
        'cat_label'=> 'Kit résidentiel',
        'name'     => 'EcoFlow PowerStream 800W',
        'brand'    => 'EcoFlow',
        'desc'     => 'Micro-onduleur + 2 panneaux 400 Wc. Kit balcon ou terrasse plug-and-play. Compatible batterie EcoFlow pour stocker le surplus.',
        'specs'    => ['800 Wc', '2 panneaux', 'Plug & Play', 'Wi-Fi inclus'],
        'price'    => '~799 €',
        'badge'    => 'Populaire',
        'badge_type'=> 'sky',
        'asin'     => 'B0CF6SH819',
        'features' => ['Installation sans électricien', 'Suivi temps réel app EcoFlow', 'Compatible stockage Delta'],
    ],
    [
        'id'       => 'kit-renogy-3kwc',
        'cat'      => 'kit-residentiel',
        'cat_label'=> 'Kit résidentiel',
        'name'     => 'Kit solaire toiture 6 kWc Renogy',
        'brand'    => 'Renogy',
        'desc'     => '12 panneaux monocristallins 500 Wc + onduleur hybride + câblage. Pour maison principale. Installation par professionnel RGE recommandée.',
        'specs'    => ['6 000 Wc', '12 panneaux', 'Onduleur hybride', 'Monocristallin'],
        'price'    => '~5 800 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B09NNMKXY7',
        'features' => ['Rendement > 21%', 'Garantie 25 ans puissance', 'Compatible stockage batterie'],
    ],

    // ── Kits balcon
    [
        'id'       => 'kit-balcon-anker-solix',
        'cat'      => 'kit-balcon',
        'cat_label'=> 'Kit balcon',
        'name'     => 'Anker SOLIX RS40P Kit Balcon 800W',
        'brand'    => 'Anker',
        'desc'     => 'Kit balcon 2 × 400 Wc + micro-onduleur 800 W. Prise CEE 7/5 directe. Suivi via app. Idéal appartement ou terrasse sans autorisation.',
        'specs'    => ['800 Wc', '2 panneaux', 'Prise normale', 'App incluse'],
        'price'    => '~699 €',
        'badge'    => 'Coup de cœur',
        'badge_type'=> 'sun',
        'asin'     => 'B0CXPBC12R',
        'features' => ['Installation en 30 min', 'Monitoring temps réel', 'Garantie 5 ans'],
    ],
    [
        'id'       => 'kit-balcon-beem-400',
        'cat'      => 'kit-balcon',
        'cat_label'=> 'Kit balcon',
        'name'     => 'Beem Energy Kit Balcon 400W',
        'brand'    => 'Beem Energy',
        'desc'     => 'Kit balcon 1 panneau 400 Wc + micro-onduleur. Solution d\'entrée pour commencer à produire depuis son balcon sans engagement.',
        'specs'    => ['400 Wc', '1 panneau', 'Plug & Play', 'Prise normale'],
        'price'    => '~399 €',
        'badge'    => 'Entrée de gamme',
        'badge_type'=> 'orange',
        'asin'     => 'B0CXYZ5678',
        'features' => ['Pose rapide sans outil', 'Compatible tout balcon', 'Garantie 2 ans'],
    ],

    // ── Kits portables
    [
        'id'       => 'jackery-solar-1000-plus',
        'cat'      => 'kit-portable',
        'cat_label'=> 'Kit portable',
        'name'     => 'Jackery Solar Generator 1000 Plus',
        'brand'    => 'Jackery',
        'desc'     => 'Station 1 kWh LiFePO4 + 2 panneaux SolarSaga 100W. Van, camping, coupures. Recharge complète en 1h45 plein soleil.',
        'specs'    => ['1 kWh', '200 Wc', 'LiFePO4', '14,6 kg'],
        'price'    => '~1 199 €',
        'badge'    => 'Top van life',
        'badge_type'=> 'green',
        'asin'     => 'B0CQS91BSC',
        'features' => ['3 000 cycles LiFePO4', 'Application Jackery', 'Garantie 5 ans'],
    ],
    [
        'id'       => 'bluetti-ac180-pv200',
        'cat'      => 'kit-portable',
        'cat_label'=> 'Kit portable',
        'name'     => 'Bluetti AC180 + Panneau PV200',
        'brand'    => 'Bluetti',
        'desc'     => 'Station 1 152 Wh LiFePO4 + panneau pliant 200 Wc. 3 500 cycles garantis. Idéal autonomie prolongée ou backup maison.',
        'specs'    => ['1 152 Wh', '200 Wc', 'LiFePO4', 'IP65 panneau'],
        'price'    => '~1 099 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B0BNQFQX6Y',
        'features' => ['3 500+ cycles', 'MPPT 700W max', 'Garantie 5 ans'],
    ],
    [
        'id'       => 'ecoflow-river3-80w',
        'cat'      => 'kit-portable',
        'cat_label'=> 'Kit portable',
        'name'     => 'EcoFlow River 3 + 80W',
        'brand'    => 'EcoFlow',
        'desc'     => 'Station compacte 245 Wh + panneau pliant 80W. Ultra-léger (3,5 kg). Festival, trekking, van débutant.',
        'specs'    => ['245 Wh', '80 Wc', 'LiFePO4', '3,5 kg'],
        'price'    => '~299 €',
        'badge'    => 'Ultra compact',
        'badge_type'=> 'orange',
        'asin'     => 'B0D1QWERTY',
        'features' => ['Recharge en 3h soleil', 'Port USB-C 100W', 'Garantie 5 ans'],
    ],

    // ── Batteries
    [
        'id'       => 'pylontech-us3000c',
        'cat'      => 'batterie',
        'cat_label'=> 'Batterie de stockage',
        'name'     => 'Pylontech US3000C 3,5 kWh',
        'brand'    => 'Pylontech',
        'desc'     => 'Batterie rack LiFePO4 pour installation solaire résidentielle. Compatible onduleurs hybrides majeurs (Goodwe, SMA, Huawei, Victron…).',
        'specs'    => ['3,5 kWh', 'LiFePO4', '6 000 cycles', 'Rack 19"'],
        'price'    => '~1 450 €',
        'badge'    => 'Référence pro',
        'badge_type'=> 'dark',
        'asin'     => 'B09GDK3JZP',
        'features' => ['Compatible tous onduleurs hybrides majeurs', 'BMS intégré', 'Extensible jusqu\'à 74 kWh'],
    ],
    [
        'id'       => 'growatt-ark-5kwh',
        'cat'      => 'batterie',
        'cat_label'=> 'Batterie de stockage',
        'name'     => 'Growatt ARK 5.1H-A1',
        'brand'    => 'Growatt',
        'desc'     => 'Batterie haute tension LiFePO4 empilable 5,1 kWh. Conçue pour les onduleurs hybrides Growatt MIN, MID, MAX.',
        'specs'    => ['5,1 kWh', 'Haute tension', 'LiFePO4', 'Empilable ×4'],
        'price'    => '~2 100 €',
        'badge'    => '',
        'badge_type'=> '',
        'asin'     => 'B0B12ABCDE',
        'features' => ['IP55', '10 ans de garantie', 'BUS haute tension'],
    ],

    // ── Micro-onduleurs
    [
        'id'       => 'enphase-iq8a',
        'cat'      => 'micro-onduleur',
        'cat_label'=> 'Micro-onduleur',
        'name'     => 'Enphase IQ8A',
        'brand'    => 'Enphase',
        'desc'     => 'Micro-onduleur de référence, 1 par panneau. Maximisation individuelle, résistance à l\'ombre partielle, monitoring par panneau.',
        'specs'    => ['366 W AC', 'MPPT individuel', 'Monitoring inclus', 'IP67'],
        'price'    => '~165 €/unité',
        'badge'    => 'Standard industrie',
        'badge_type'=> 'sky',
        'asin'     => 'B0BMNPQRST',
        'features' => ['25 ans de garantie', 'Pas de point de défaillance unique', 'Rapport Envoy Cloud'],
    ],
    [
        'id'       => 'aps-ds3-1000w',
        'cat'      => 'micro-onduleur',
        'cat_label'=> 'Micro-onduleur',
        'name'     => 'APS DS3 1 000W',
        'brand'    => 'APS',
        'desc'     => 'Micro-onduleur double entrée 1 000W AC. 2 panneaux par unité. Bon rapport qualité/prix pour installations résidentielles.',
        'specs'    => ['1 000 W AC', 'Double MPPT', 'IP67', '10 ans'],
        'price'    => '~129 €/unité',
        'badge'    => 'Bon rapport Q/P',
        'badge_type'=> 'sun',
        'asin'     => 'B09ABCDEF1',
        'features' => ['2 panneaux / micro-onduleur', 'Monitoring ECU inclus', 'Compatible AC Bus'],
    ],
];

// Catégories de filtre
$categories = [
    'all'            => 'Tous',
    'panneaux'       => 'Panneaux',
    'kit-residentiel'=> 'Kits résidentiels',
    'kit-balcon'     => 'Kits balcon',
    'kit-portable'   => 'Kits portables',
    'batterie'       => 'Batteries',
    'micro-onduleur' => 'Micro-onduleurs',
];

$extra_head = '
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Produits solaires 2026",
  "description": "Sélection de panneaux, kits résidentiels, kits balcon, portables, batteries et micro-onduleurs",
  "url": "https://moncherwattsun.fr/produits"
}
</script>';

require 'header.php';
?>

<!-- HERO -->
<section class="produits-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:20px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">Produits solaires</span>
    </nav>
    <span class="badge badge-green" style="margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/></svg>
      Sélection 2026
    </span>
    <h1>Produits <span class="grad-text">solaires</span></h1>
    <p>Panneaux, kits toiture, kits balcon, portables, batteries, micro-onduleurs.<br>Fiches techniques comparées — on ne vend rien, on oriente.</p>
  </div>
</section>

<!-- DISCLAIMER AFFILIÉ -->
<div style="background:var(--sky-xlight); border-bottom:1px solid var(--sky-light); padding:12px 0;">
  <div class="container">
    <div style="display:flex; gap:10px; align-items:flex-start; font-size:.8rem; color:var(--gray);">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; color:var(--sky-dark); margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <span><strong style="color:var(--sky-dark);">Transparence :</strong> Ce site participe au Programme Partenaires Amazon EU. Les liens "Voir sur Amazon" sont des liens affiliés (tag : <?= AMAZON_TAG ?>). Les prix sont indicatifs — vérifiez le prix actuel sur Amazon. Notre sélection est indépendante.</span>
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

    <!-- Ancres pour navigation -->
    <div id="panneaux"></div>
    <div id="kits-residentiel"></div>
    <div id="kits-balcon"></div>
    <div id="kits-portable"></div>
    <div id="batteries"></div>

    <!-- Grille produits -->
    <div class="product-grid reveal-on-scroll" id="product-grid">
      <?php foreach ($products as $p): ?>
      <article class="product-card" data-cat="<?= $p['cat'] ?>" itemscope itemtype="https://schema.org/Product">
        <div class="product-thumb">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <?php if ($p['cat'] === 'panneaux'): ?>
            <rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/>
            <?php elseif ($p['cat'] === 'kit-portable' || $p['cat'] === 'batterie'): ?>
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
            <?php elseif ($p['cat'] === 'micro-onduleur'): ?>
            <rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/>
            <?php elseif ($p['cat'] === 'kit-balcon'): ?>
            <rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
            <?php else: ?>
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
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
              Voir sur Amazon
            </a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <p id="no-results" style="display:none; text-align:center; padding:48px; color:var(--gray-light);">Aucun produit dans cette catégorie pour l'instant.</p>

    <!-- Note affilié -->
    <div class="amazon-disclaimer reveal-on-scroll" style="margin-top:36px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <span><strong>Liens affiliés Amazon.</strong> Les prix affichés sont indicatifs et peuvent varier. Ce site est membre du Programme Partenaires d'Amazon EU. En tant que Partenaire Amazon, nous réalisons un bénéfice sur les achats remplissant les conditions requises. Cela ne modifie pas notre sélection.</span>
    </div>

  </div>
</section>

<!-- CTA SIMULATEUR -->
<section class="cta-strip reveal-on-scroll">
  <div class="container">
    <div class="cta-strip-inner">
      <div>
        <h2>Quelle puissance pour votre situation ?</h2>
        <p>Simulez votre production avant d'acheter — c'est gratuit et ça prend 2 minutes.</p>
      </div>
      <div class="cta-strip-btns">
        <a href="/simulateur" class="btn btn-primary btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          Simuler ma production
        </a>
        <a href="/aides" class="btn btn-ghost btn-lg">Aides 2026</a>
      </div>
    </div>
  </div>
</section>

<script>
function filterProducts(cat, btn) {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const cards = document.querySelectorAll('.product-card');
  let visible = 0;
  cards.forEach(card => {
    const show = cat === 'all' || card.dataset.cat === cat;
    card.style.display = show ? 'flex' : 'none';
    if (show) visible++;
  });
  document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
}

// Gestion ancres depuis homepage
window.addEventListener('DOMContentLoaded', function() {
  const hash = window.location.hash;
  if (hash) {
    const catMap = {
      '#panneaux': 'panneaux',
      '#kits-residentiel': 'kit-residentiel',
      '#kits-balcon': 'kit-balcon',
      '#kits-portable': 'kit-portable',
      '#batteries': 'batterie',
    };
    if (catMap[hash]) {
      const btn = document.querySelector('[data-cat="' + catMap[hash] + '"]');
      if (btn) filterProducts(catMap[hash], btn);
    }
  }
});
</script>

<?php require 'footer.php'; ?>