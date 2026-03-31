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

    // ── Kits solaires résidentiels (autoconsommation)
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'Panneau Solaire 400W Monocristallin Autoconsommation',
        'brand' => 'Générique', 'price' => '129 €', 'spec' => '400W',
        'asin' => 'B0BYS3V334',
    ],
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'ECO-WORTHY Kit Panneau Solaire 240W + Régulateur 30A',
        'brand' => 'ECO-WORTHY', 'price' => '189 €', 'spec' => '240W',
        'asin' => 'B0DKWH9CKR',
    ],
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'ECO-WORTHY Kit Solaire 800W avec 4 Panneaux 195W',
        'brand' => 'ECO-WORTHY', 'price' => '599 €', 'spec' => '800W',
        'asin' => 'B0CG5MHQWG',
    ],
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'Zendure Kit Solaire Balcon 800W avec Micro-onduleur',
        'brand' => 'Zendure', 'price' => '699 €', 'spec' => '800W',
        'asin' => 'B0D7TCLMVZ',
    ],
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'EcoFlow PowerStream Kit Solaire Balcon 800W',
        'brand' => 'EcoFlow', 'price' => '899 €', 'spec' => '800W',
        'asin' => 'B0D3K5R84J',
    ],
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'Kit Autoconsommation 3000Wc Portrait Micro-onduleurs Enphase',
        'brand' => 'VMH / Enphase', 'price' => '4 500 €', 'spec' => '3000W',
        'asin' => 'B00NHT68MA',
    ],
    [
        'cat' => 'kits-residentiels', 'cat_label' => 'Kit résidentiel',
        'name' => 'enjoy solar Panneau Solaire Monocristallin 200W PERC 9BB',
        'brand' => 'enjoy solar', 'price' => '89 €', 'spec' => '200W',
        'asin' => 'B0CRPZP3WV',
    ],

    // ── Kits solaires portables (rando, camping, van)
    [
        'cat' => 'kits-portables', 'cat_label' => 'Kit portable',
        'name' => 'Jackery SolarSaga 100W Panneau Solaire Portable Pliable',
        'brand' => 'Jackery', 'price' => '299 €', 'spec' => '100W',
        'asin' => 'B09YWCB7JY',
    ],
    [
        'cat' => 'kits-portables', 'cat_label' => 'Kit portable',
        'name' => 'BLUETTI PV200 Panneau Solaire Portable 200W',
        'brand' => 'BLUETTI', 'price' => '449 €', 'spec' => '200W',
        'asin' => 'B0B5YPCLJT',
    ],
    [
        'cat' => 'kits-portables', 'cat_label' => 'Kit portable',
        'name' => 'EcoFlow 160W Panneau Solaire Portable Pliable',
        'brand' => 'EcoFlow', 'price' => '369 €', 'spec' => '160W',
        'asin' => 'B09WB2KGLF',
    ],
    [
        'cat' => 'kits-portables', 'cat_label' => 'Kit portable',
        'name' => 'DOKIO 100W Panneau Solaire Pliable pour Camping-Car',
        'brand' => 'DOKIO', 'price' => '99 €', 'spec' => '100W',
        'asin' => 'B0B8ZK1QNK',
    ],
    [
        'cat' => 'kits-portables', 'cat_label' => 'Kit portable',
        'name' => 'ECO-WORTHY Kit Solaire 120W Pliable Camping avec Régulateur',
        'brand' => 'ECO-WORTHY', 'price' => '149 €', 'spec' => '120W',
        'asin' => 'B0BN1HP6HG',
    ],
    [
        'cat' => 'kits-portables', 'cat_label' => 'Kit portable',
        'name' => 'ALLPOWERS 200W Panneau Solaire Pliable Portable',
        'brand' => 'ALLPOWERS', 'price' => '259 €', 'spec' => '200W',
        'asin' => 'B0CDY4FQ7F',
    ],

    // ── Batteries de stockage domestique
    [
        'cat' => 'batteries-stockage', 'cat_label' => 'Batterie de stockage',
        'name' => 'ECO-WORTHY Batterie LiFePO4 12V 100Ah',
        'brand' => 'ECO-WORTHY', 'price' => '259 €', 'spec' => '100Ah / 1280Wh',
        'asin' => 'B0C5LFN2KR',
    ],
    [
        'cat' => 'batteries-stockage', 'cat_label' => 'Batterie de stockage',
        'name' => 'BLUETTI B300 Batterie Extension 3072Wh LiFePO4',
        'brand' => 'BLUETTI', 'price' => '2 199 €', 'spec' => '3072Wh',
        'asin' => 'B0BTFLRZ35',
    ],
    [
        'cat' => 'batteries-stockage', 'cat_label' => 'Batterie de stockage',
        'name' => 'EcoFlow DELTA 2 Max Batterie Supplémentaire 2048Wh',
        'brand' => 'EcoFlow', 'price' => '1 599 €', 'spec' => '2048Wh',
        'asin' => 'B0BXJV25WQ',
    ],
    [
        'cat' => 'batteries-stockage', 'cat_label' => 'Batterie de stockage',
        'name' => 'LIONTRON Batterie LiFePO4 12V 200Ah',
        'brand' => 'LIONTRON', 'price' => '799 €', 'spec' => '200Ah / 2560Wh',
        'asin' => 'B09N3WNXLG',
    ],
    [
        'cat' => 'batteries-stockage', 'cat_label' => 'Batterie de stockage',
        'name' => 'Redodo Batterie LiFePO4 12V 100Ah Mini',
        'brand' => 'Redodo', 'price' => '199 €', 'spec' => '100Ah / 1280Wh',
        'asin' => 'B0CNXQJYFH',
    ],
    [
        'cat' => 'batteries-stockage', 'cat_label' => 'Batterie de stockage',
        'name' => 'Zendure SolarFlow Batterie AB2000 1920Wh',
        'brand' => 'Zendure', 'price' => '799 €', 'spec' => '1920Wh',
        'asin' => 'B0B7F3GYW8',
    ],

    // ── Micro-onduleurs
    [
        'cat' => 'micro-onduleurs', 'cat_label' => 'Micro-onduleur',
        'name' => 'Hoymiles HMS-800W-2T Micro-onduleur',
        'brand' => 'Hoymiles', 'price' => '179 €', 'spec' => '800W',
        'asin' => 'B0CQ1NFSBC',
    ],
    [
        'cat' => 'micro-onduleurs', 'cat_label' => 'Micro-onduleur',
        'name' => 'Hoymiles HM-400 Micro-onduleur 400W',
        'brand' => 'Hoymiles', 'price' => '119 €', 'spec' => '400W',
        'asin' => 'B0BPLNXKZ4',
    ],
    [
        'cat' => 'micro-onduleurs', 'cat_label' => 'Micro-onduleur',
        'name' => 'EcoFlow PowerStream Micro-onduleur 800W',
        'brand' => 'EcoFlow', 'price' => '299 €', 'spec' => '800W',
        'asin' => 'B0D3K5GGPQ',
    ],
    [
        'cat' => 'micro-onduleurs', 'cat_label' => 'Micro-onduleur',
        'name' => 'Deye SUN600G3-EU-230 Micro-onduleur 600W',
        'brand' => 'Deye', 'price' => '139 €', 'spec' => '600W',
        'asin' => 'B0CCQP91RJ',
    ],
    [
        'cat' => 'micro-onduleurs', 'cat_label' => 'Micro-onduleur',
        'name' => 'Zendure Micro-onduleur 900W avec App',
        'brand' => 'Zendure', 'price' => '249 €', 'spec' => '900W',
        'asin' => 'B0D7TCMHKV',
    ],

    // ── Chargeurs solaires (téléphone, laptop)
    [
        'cat' => 'chargeurs-solaires', 'cat_label' => 'Chargeur solaire',
        'name' => 'Anker 625 Panneau Solaire 100W USB',
        'brand' => 'Anker', 'price' => '199 €', 'spec' => '100W',
        'asin' => 'B09TVVKWFV',
    ],
    [
        'cat' => 'chargeurs-solaires', 'cat_label' => 'Chargeur solaire',
        'name' => 'BigBlue Chargeur Solaire 28W USB 3 Ports',
        'brand' => 'BigBlue', 'price' => '59 €', 'spec' => '28W',
        'asin' => 'B0B7G3J7N1',
    ],
    [
        'cat' => 'chargeurs-solaires', 'cat_label' => 'Chargeur solaire',
        'name' => 'Nekteck Chargeur Solaire 28W USB Pliable',
        'brand' => 'Nekteck', 'price' => '49 €', 'spec' => '28W',
        'asin' => 'B08DFXPS4J',
    ],
    [
        'cat' => 'chargeurs-solaires', 'cat_label' => 'Chargeur solaire',
        'name' => 'Jackery SolarSaga 40W Mini Panneau USB-C + USB-A',
        'brand' => 'Jackery', 'price' => '79 €', 'spec' => '40W',
        'asin' => 'B0CGJ3X5C8',
    ],
    [
        'cat' => 'chargeurs-solaires', 'cat_label' => 'Chargeur solaire',
        'name' => 'EcoFlow 220W Panneau Solaire Bifacial Portable',
        'brand' => 'EcoFlow', 'price' => '449 €', 'spec' => '220W',
        'asin' => 'B0BQST9Y9B',
    ],

    // ── Panneaux solaires piscine / chauffage eau
    [
        'cat' => 'solaire-piscine', 'cat_label' => 'Solaire piscine',
        'name' => 'Bestway Chauffage Solaire Piscine 110x171cm',
        'brand' => 'Bestway', 'price' => '39 €', 'spec' => 'Tapis chauffant',
        'asin' => 'B0828C8CYN',
    ],
    [
        'cat' => 'solaire-piscine', 'cat_label' => 'Solaire piscine',
        'name' => 'Intex Chauffage Solaire pour Piscine Hors-Sol',
        'brand' => 'Intex', 'price' => '49 €', 'spec' => 'Panneau chauffant',
        'asin' => 'B00B1OS4WC',
    ],
    [
        'cat' => 'solaire-piscine', 'cat_label' => 'Solaire piscine',
        'name' => 'KESSER Chauffage Solaire Piscine XXL Lot de 2',
        'brand' => 'KESSER', 'price' => '79 €', 'spec' => 'Collecteur solaire',
        'asin' => 'B09X1NKSH6',
    ],
    [
        'cat' => 'solaire-piscine', 'cat_label' => 'Solaire piscine',
        'name' => 'Bâche Solaire Ronde 366cm pour Piscine (8mm)',
        'brand' => 'Générique', 'price' => '29 €', 'spec' => 'Bâche solaire',
        'asin' => 'B01DSTCMR0',
    ],
    [
        'cat' => 'solaire-piscine', 'cat_label' => 'Solaire piscine',
        'name' => 'Steinbach Chauffage Solaire Speed Solar 49123',
        'brand' => 'Steinbach', 'price' => '89 €', 'spec' => 'Collecteur solaire',
        'asin' => 'B0CP4H7V56',
    ],

    // ── Accessoires (câbles, fixations, monitoring)
    [
        'cat' => 'accessoires', 'cat_label' => 'Accessoire',
        'name' => 'ECO-WORTHY Régulateur de Charge MPPT 30A 12V/24V',
        'brand' => 'ECO-WORTHY', 'price' => '69 €', 'spec' => 'Régulateur MPPT',
        'asin' => 'B0BVHXKBLV',
    ],
    [
        'cat' => 'accessoires', 'cat_label' => 'Accessoire',
        'name' => 'Câbles MC4 Extension 5m (lot de 2)',
        'brand' => 'Générique', 'price' => '12 €', 'spec' => 'Câble MC4',
        'asin' => 'B08R5BDHGP',
    ],
    [
        'cat' => 'accessoires', 'cat_label' => 'Accessoire',
        'name' => 'Kit Fixation Z Panneaux Solaires (lot de 4)',
        'brand' => 'Générique', 'price' => '15 €', 'spec' => 'Fixation',
        'asin' => 'B0BTJM8NFF',
    ],
    [
        'cat' => 'accessoires', 'cat_label' => 'Accessoire',
        'name' => 'Victron SmartSolar MPPT 100/20 Régulateur Bluetooth',
        'brand' => 'Victron Energy', 'price' => '139 €', 'spec' => 'Régulateur MPPT',
        'asin' => 'B0B4N2T2H1',
    ],
    [
        'cat' => 'accessoires', 'cat_label' => 'Accessoire',
        'name' => 'Shelly EM Compteur d\'Énergie WiFi pour Monitoring Solaire',
        'brand' => 'Shelly', 'price' => '39 €', 'spec' => 'Monitoring',
        'asin' => 'B0BG7DB8KM',
    ],
    [
        'cat' => 'accessoires', 'cat_label' => 'Accessoire',
        'name' => 'Connecteurs MC4 Mâle/Femelle (lot de 5 paires)',
        'brand' => 'Générique', 'price' => '9 €', 'spec' => 'Connecteur',
        'asin' => 'B0CNW84HYN',
    ],

    // ── Stations électriques portables
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'BLUETTI AC180 Générateur 1152Wh LiFePO4 1800W',
        'brand' => 'BLUETTI', 'price' => '799 €', 'spec' => '1152Wh',
        'asin' => 'B09QKMFT1W',
    ],
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'EcoFlow DELTA 2 Station Portable 1024Wh LFP',
        'brand' => 'EcoFlow', 'price' => '849 €', 'spec' => '1024Wh',
        'asin' => 'B09PPMXZPG',
    ],
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'Jackery Explorer 1000 Centrale Portable 1002Wh',
        'brand' => 'Jackery', 'price' => '999 €', 'spec' => '1002Wh',
        'asin' => 'B09N3Q1R14',
    ],
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'BLUETTI EB3A Station Portable 268Wh LiFePO4 600W',
        'brand' => 'BLUETTI', 'price' => '249 €', 'spec' => '268Wh',
        'asin' => 'B09YRZG7J9',
    ],
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'EcoFlow RIVER 2 Max Station 512Wh 500W',
        'brand' => 'EcoFlow', 'price' => '449 €', 'spec' => '512Wh',
        'asin' => 'B09PPKY4KK',
    ],
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'BLUETTI AC200MAX 2048Wh LiFePO4 2200W',
        'brand' => 'BLUETTI', 'price' => '1 599 €', 'spec' => '2048Wh',
        'asin' => 'B0BTFLRZ35',
    ],
    [
        'cat' => 'stations-electriques', 'cat_label' => 'Station portable',
        'name' => 'Anker SOLIX C1000 Station Portable 1056Wh',
        'brand' => 'Anker', 'price' => '699 €', 'spec' => '1056Wh',
        'asin' => 'B0D1CZ17Y5',
    ],
];

// Catégories de filtre
$categories = [
    'all'                 => 'Tous',
    'kits-residentiels'   => 'Kits résidentiels',
    'kits-portables'      => 'Kits portables',
    'batteries-stockage'  => 'Batteries',
    'micro-onduleurs'     => 'Micro-onduleurs',
    'chargeurs-solaires'  => 'Chargeurs',
    'solaire-piscine'     => 'Piscine',
    'accessoires'         => 'Accessoires',
    'stations-electriques'=> 'Stations portables',
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

    <!-- Grille produits -->
    <div class="product-grid reveal-on-scroll" id="product-grid">
      <?php foreach ($products as $p): ?>
      <article class="product-card" data-cat="<?= $p['cat'] ?>" itemscope itemtype="https://schema.org/Product">
        <div class="product-thumb">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <?php if ($p['cat'] === 'kits-residentiels'): ?>
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
            <?php elseif ($p['cat'] === 'kits-portables'): ?>
            <rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
            <?php elseif ($p['cat'] === 'batteries-stockage' || $p['cat'] === 'stations-electriques'): ?>
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
            <?php elseif ($p['cat'] === 'micro-onduleurs'): ?>
            <rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/>
            <?php elseif ($p['cat'] === 'chargeurs-solaires'): ?>
            <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>
            <?php elseif ($p['cat'] === 'solaire-piscine'): ?>
            <circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
            <?php else: ?>
            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
            <?php endif; ?>
          </svg>
        </div>
        <div class="product-body">
          <div class="product-category"><?= htmlspecialchars($p['cat_label']) ?> · <?= htmlspecialchars($p['brand']) ?></div>
          <h3 class="product-name" itemprop="name"><?= htmlspecialchars($p['name']) ?></h3>
          <div class="product-specs">
            <span class="spec-chip"><?= htmlspecialchars($p['spec']) ?></span>
          </div>
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
      '#kits-residentiels': 'kits-residentiels',
      '#kits-portables': 'kits-portables',
      '#batteries-stockage': 'batteries-stockage',
      '#micro-onduleurs': 'micro-onduleurs',
      '#chargeurs-solaires': 'chargeurs-solaires',
      '#solaire-piscine': 'solaire-piscine',
      '#accessoires': 'accessoires',
      '#stations-electriques': 'stations-electriques',
    };
    if (catMap[hash]) {
      const btn = document.querySelector('[data-cat="' + catMap[hash] + '"]');
      if (btn) filterProducts(catMap[hash], btn);
    }
  }
});
</script>

<?php require 'footer.php'; ?>