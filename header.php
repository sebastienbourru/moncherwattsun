<?php
// header.php — Partial partagé
$site_name = "Mon cher WattSun";
$site_url  = "https://moncherwattsun.fr";
$default_og = $site_url . "/assets/og-default.jpg";
$og_image   = $og_image ?? $default_og;
$canonical  = $canonical ?? $site_url . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title ?? $site_name) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_desc ?? 'Mon cher WattSun — simulateur solaire PVGIS, aides financières, annuaire installateurs. Données fiables, sources officielles.') ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Mon cher WattSun">
  <meta property="og:title" content="<?= htmlspecialchars($page_title ?? $site_name) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta_desc ?? 'Simulateur solaire PVGIS, aides financières, annuaire pros RGE.') ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:locale" content="fr_FR">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title ?? $site_name) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($meta_desc ?? 'Simulateur solaire PVGIS, aides financières, annuaire pros RGE.') ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">

  <!-- Favicon -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><defs><radialGradient id='g' cx='50%' cy='50%' r='50%'><stop offset='0%' stop-color='%23FEF08A'/><stop offset='100%' stop-color='%23F59E0B'/></radialGradient></defs><circle cx='50' cy='50' r='30' fill='url(%23g)'/><g stroke='%23F59E0B' stroke-width='6' stroke-linecap='round'><line x1='50' y1='5' x2='50' y2='18'/><line x1='50' y1='82' x2='50' y2='95'/><line x1='5' y1='50' x2='18' y2='50'/><line x1='82' y1='50' x2='95' y2='50'/><line x1='18' y1='18' x2='27' y2='27'/><line x1='73' y1='73' x2='82' y2='82'/><line x1='82' y1='18' x2='73' y2='27'/><line x1='18' y1='82' x2='27' y2='73'/></g></svg>">

  <!-- CSS -->
  <link rel="stylesheet" href="/styles.css">

  <!-- Schema.org Organisation -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Mon cher WattSun",
    "url": "https://moncherwattsun.fr",
    "description": "Simulateur solaire PVGIS, aides financières, annuaire pros RGE en France",
    "sameAs": []
  }
  </script>

  <?= $extra_head ?? '' ?>
</head>
<body>

<!-- ── NAVBAR ── -->
<nav class="navbar" id="navbar">
  <div class="container">
    <div class="navbar-inner">
      <a href="/" class="navbar-logo">
        <div class="logo-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </div>
        <span class="logo-text">Mon cher <span>WattSun</span></span>
      </a>

      <ul class="navbar-nav" id="navMenu">
        <li><a href="/simulateur" class="nav-link <?= ($active_page ?? '') === 'simulateur' ? 'active' : '' ?>">Simulateur</a></li>
        <li><a href="/aides" class="nav-link <?= ($active_page ?? '') === 'aides' ? 'active' : '' ?>">Aides 2026</a></li>
        <li><a href="/annuaire" class="nav-link <?= ($active_page ?? '') === 'annuaire' ? 'active' : '' ?>">Annuaire pros</a></li>
      </ul>

      <div class="navbar-cta" id="navCta">
        <a href="/simulateur" class="btn btn-primary btn-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          Simuler mon potentiel
        </a>
      </div>

      <button class="hamburger" id="hamburger" aria-label="Menu" onclick="toggleMenu()">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</nav>

<script>
function toggleMenu() {
  document.getElementById('navMenu').classList.toggle('open');
  document.getElementById('navCta').classList.toggle('open');
}
window.addEventListener('scroll', function() {
  document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 10);
});
</script>