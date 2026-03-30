<?php
http_response_code(404);
$page_title  = "Page introuvable — Mon cher WattSun";
$meta_desc   = "Cette page n'existe pas ou a été déplacée.";
$canonical   = "https://moncherwattsun.fr/404";
require 'header.php';
?>
<div class="error-page">
  <div>
    <div class="error-num">404</div>
    <h1 style="margin-bottom:12px;">Élémentaire, cette page n'existe pas.</h1>
    <p style="max-width:420px; margin:0 auto 32px;">On n'a pas trouvé ce que vous cherchez. Mais on a tout le reste sur le solaire — promis.</p>
    <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap;">
      <a href="/" class="btn btn-primary">Retour à l'accueil</a>
      <a href="/simulateur" class="btn btn-outline">Simulateur solaire</a>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>