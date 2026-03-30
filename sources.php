<?php
$page_title  = "Nos sources de données — Mon cher WattSun";
$meta_desc   = "Transparence totale sur les sources de données utilisées : PVGIS, RTE, ADEME, INSEE Sirene, CRE, France Rénov. Chaque chiffre a sa source.";
$canonical   = "https://moncherwattsun.fr/sources";
require 'header.php';

$sources = [
    [
        'name'   => 'PVGIS — Photovoltaic Geographical Information System',
        'org'    => 'Commission Européenne · Centre Commun de Recherche (JRC)',
        'url'    => 'https://re.jrc.ec.europa.eu/pvg_tools/fr/',
        'usage'  => 'Simulateur de production solaire. Données d\'irradiation satellitaires sur 20+ années. Référence académique et réglementaire pour le potentiel PV en Europe.',
        'color'  => 'sun',
    ],
    [
        'name'   => 'RTE — Réseau de Transport d\'Électricité',
        'org'    => 'Gestionnaire du réseau de transport français',
        'url'    => 'https://www.rte-france.com/eco2mix',
        'usage'  => 'Statistiques de production solaire nationale et régionale, mix énergétique, données Eco2mix, bilan électrique annuel.',
        'color'  => 'sky',
    ],
    [
        'name'   => 'CRE — Commission de Régulation de l\'Énergie',
        'org'    => 'Autorité administrative indépendante',
        'url'    => 'https://www.cre.fr',
        'usage'  => 'Tarifs réglementés de vente d\'électricité (TRV). Tarifs d\'achat EDF OA (arrêtés tarifaires trimestriels).',
        'color'  => 'green',
    ],
    [
        'name'   => 'ADEME — Agence de la Transition Écologique',
        'org'    => 'Établissement public sous tutelle MTES',
        'url'    => 'https://www.ademe.fr',
        'usage'  => 'Statistiques sur les installations résidentielles, facteurs d\'émission CO₂, données observatoire photovoltaïque.',
        'color'  => 'sun',
    ],
    [
        'name'   => 'France Rénov\' / ANAH',
        'org'    => 'Agence Nationale de l\'Habitat',
        'url'    => 'https://france-renov.gouv.fr',
        'usage'  => 'Barèmes MaPrimeRénov\', conditions d\'éligibilité, annuaire RGE officiel. Source unique pour les aides à la rénovation énergétique.',
        'color'  => 'sky',
    ],
    [
        'name'   => 'API Sirene / API Entreprises',
        'org'    => 'INSEE · Direction interministérielle du numérique (DINUM)',
        'url'    => 'https://recherche-entreprises.api.gouv.fr',
        'usage'  => 'Données d\'entreprises (SIREN, SIRET, adresse, code NAF) pour l\'annuaire des professionnels du solaire.',
        'color'  => 'dark',
    ],
    [
        'name'   => 'API Adresse — Base Adresse Nationale',
        'org'    => 'Direction interministérielle du numérique (DINUM)',
        'url'    => 'https://api-adresse.data.gouv.fr',
        'usage'  => 'Géocodage ville → coordonnées GPS pour le simulateur solaire.',
        'color'  => 'green',
    ],
];
?>
<section style="background:linear-gradient(160deg,var(--bg),#F1F5F9); padding:64px 0; border-bottom:1px solid var(--border);">
  <div class="container">
    <nav class="breadcrumb" style="margin-bottom:20px;">
      <a href="/">Accueil</a><span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">Nos sources</span>
    </nav>
    <h1 style="margin-bottom:12px;">Nos sources de données</h1>
    <p style="max-width:580px;">Chaque chiffre affiché sur ce site provient d'une source officielle vérifiable. Voici la liste complète.</p>
  </div>
</section>
<section class="section">
  <div class="container" style="max-width:900px;">
    <div style="display:flex; flex-direction:column; gap:16px;">
      <?php foreach ($sources as $s): ?>
      <div style="background:white; border:1px solid var(--border); border-radius:var(--radius-lg); padding:24px; display:flex; gap:16px; align-items:flex-start;">
        <div style="width:44px; height:44px; border-radius:var(--radius); background:<?= $s['color'] === 'sun' ? 'linear-gradient(135deg,var(--sun-light),#FDE68A)' : ($s['color'] === 'sky' ? 'linear-gradient(135deg,var(--sky-light),#BAE6FD)' : ($s['color'] === 'green' ? 'linear-gradient(135deg,#D1FAE5,#A7F3D0)' : 'var(--dark)')) ?>; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="<?= $s['color'] === 'dark' ? 'white' : ($s['color'] === 'sun' ? 'var(--sun-dark)' : ($s['color'] === 'sky' ? 'var(--sky-dark)' : '#065F46')) ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div style="flex:1;">
          <div style="display:flex; align-items:baseline; gap:10px; flex-wrap:wrap; margin-bottom:4px;">
            <strong style="font-size:.98rem;"><?= htmlspecialchars($s['name']) ?></strong>
            <span style="font-size:.76rem; color:var(--gray-light);"><?= htmlspecialchars($s['org']) ?></span>
          </div>
          <p style="font-size:.87rem; margin-bottom:10px;"><?= htmlspecialchars($s['usage']) ?></p>
          <a href="<?= $s['url'] ?>" target="_blank" rel="noopener noreferrer"
            style="font-size:.8rem; font-weight:600; color:var(--sky); display:inline-flex; align-items:center; gap:5px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            <?= htmlspecialchars($s['url']) ?>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php require 'footer.php'; ?>