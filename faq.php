<?php
$page_title  = "FAQ panneaux solaires — Questions fréquentes | Mon cher WattSun";
$meta_desc   = "Réponses aux questions les plus fréquentes sur les panneaux solaires : coût, rentabilité, aides, installation, autoconsommation, RGE. Guide clair et sourcé.";
$canonical   = "https://moncherwattsun.fr/faq";
$active_page = 'faq';

$faq_items = [
    [
        'question' => 'Combien coûte une installation de panneaux solaires ?',
        'answer'   => 'Pour une maison individuelle, comptez entre <strong>7 000 € et 14 000 €</strong> pour une installation de 3 à 6 kWc (pose incluse, avant aides). Les prix varient selon la puissance, le type de panneau, la complexité de la toiture et l\'installateur. Les aides (prime autoconsommation, TVA réduite) peuvent réduire la facture de 1 500 à 3 000 €.',
    ],
    [
        'question' => 'Est-ce rentable d\'installer des panneaux solaires ?',
        'answer'   => 'Oui, dans la majorité des cas. Avec un ensoleillement moyen en France (~1 500 à 2 000 h/an), le retour sur investissement se situe entre <strong>8 et 12 ans</strong>. Ensuite, les panneaux produisent de l\'électricité quasi-gratuite pendant encore 15 à 20 ans. La rentabilité s\'améliore avec la hausse du prix de l\'électricité.',
    ],
    [
        'question' => 'Qu\'est-ce que l\'autoconsommation solaire ?',
        'answer'   => 'C\'est le fait de <strong>consommer directement l\'électricité produite</strong> par vos panneaux. En pratique, vous couvrez 30 à 70 % de votre consommation selon votre profil. Le surplus peut être vendu à EDF OA (obligation d\'achat) à un tarif fixé par l\'État, ou stocké dans une batterie.',
    ],
    [
        'question' => 'Qu\'est-ce que la certification RGE ?',
        'answer'   => '<strong>RGE (Reconnu Garant de l\'Environnement)</strong> est une certification obligatoire pour que votre installation ouvre droit aux aides de l\'État (prime autoconsommation, TVA réduite, éco-PTZ). Vérifiez toujours la certification de votre installateur sur <a href="https://france-renov.gouv.fr/annuaire-rge" target="_blank" rel="noopener noreferrer">france-renov.gouv.fr</a>.',
    ],
    [
        'question' => 'Quelle puissance choisir pour ma maison ?',
        'answer'   => 'Cela dépend de votre consommation annuelle. En règle générale : <strong>3 kWc</strong> pour un foyer de 1-2 personnes (~3 000 kWh/an), <strong>6 kWc</strong> pour une famille de 3-4 personnes (~6 000 kWh/an), <strong>9 kWc</strong> pour une grande maison ou une consommation élevée. Utilisez notre <a href="/simulateur">simulateur gratuit</a> pour estimer votre production.',
    ],
    [
        'question' => 'Les panneaux solaires fonctionnent-ils quand il pleut ou qu\'il fait nuageux ?',
        'answer'   => 'Oui, mais avec un rendement réduit. Les panneaux produisent de l\'électricité dès qu\'il y a de la <strong>lumière (pas uniquement du soleil direct)</strong>. Par temps couvert, la production tombe à 10-25 % du maximum. C\'est pourquoi les estimations PVGIS prennent en compte la météo réelle sur plusieurs années.',
    ],
    [
        'question' => 'Quelle est la durée de vie des panneaux solaires ?',
        'answer'   => 'Les panneaux photovoltaïques modernes ont une durée de vie de <strong>30 à 40 ans</strong>. La plupart des fabricants garantissent 80 % de la puissance initiale après 25 ans. L\'onduleur (ou micro-onduleur) a une durée de vie plus courte : 10 à 15 ans pour un onduleur classique, 20 à 25 ans pour un micro-onduleur.',
    ],
    [
        'question' => 'Faut-il un permis de construire pour installer des panneaux ?',
        'answer'   => 'Pour une installation en toiture (intégrée ou surimposée), une <strong>simple déclaration préalable de travaux</strong> en mairie suffit. Un permis de construire n\'est nécessaire que pour les installations au sol de plus de 250 m² ou en zone protégée (ABF). Les kits balcon de moins de 800 W ne nécessitent aucune démarche.',
    ],
    [
        'question' => 'Puis-je installer des panneaux solaires en appartement ?',
        'answer'   => 'Oui, grâce aux <strong>kits solaires balcon (plug & play)</strong>. Ces kits de 400 à 800 W se branchent sur une prise secteur et produisent directement de l\'électricité. Pas besoin d\'autorisation pour les kits de moins de 800 W. Idéal pour réduire sa facture de 15 à 25 % sans travaux.',
    ],
    [
        'question' => 'Comment sont recyclés les panneaux solaires en fin de vie ?',
        'answer'   => 'En France, la collecte et le recyclage sont assurés par <strong>Soren (ex-PV Cycle)</strong>, un éco-organisme agréé. Les panneaux sont recyclables à 95 % : le verre, l\'aluminium, le silicium et le cuivre sont réutilisés. Le coût du recyclage est inclus dans le prix d\'achat (éco-participation).',
    ],
];

// Schema.org FAQ
$faq_schema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
foreach ($faq_items as $item) {
    $faq_schema['mainEntity'][] = [
        '@type' => 'Question',
        'name' => $item['question'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($item['answer'])],
    ];
}

$extra_head = '
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Accueil","item":"https://moncherwattsun.fr/"},{"@type":"ListItem","position":2,"name":"FAQ","item":"https://moncherwattsun.fr/faq"}]}
</script>
<script type="application/ld+json">
' . json_encode($faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '
</script>';

require 'header.php';
?>

<!-- HERO -->
<section class="aide-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:24px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">FAQ</span>
    </nav>
    <span class="badge badge-sky" style="margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      10 questions essentielles
    </span>
    <h1>Questions fréquentes sur le <span class="grad-text">solaire</span></h1>
    <p>Tout ce qu'il faut savoir avant de passer au photovoltaïque — en clair, sourcé, sans jargon.</p>
  </div>
</section>

<!-- FAQ -->
<section class="section">
  <div class="container" style="max-width:800px;">

    <?php foreach ($faq_items as $i => $item): ?>
    <details class="faq-item reveal-on-scroll" <?= $i === 0 ? 'open' : '' ?>>
      <summary class="faq-question">
        <span><?= htmlspecialchars($item['question']) ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><polyline points="6 9 12 15 18 9"/></svg>
      </summary>
      <div class="faq-answer">
        <p><?= $item['answer'] ?></p>
      </div>
    </details>
    <?php endforeach; ?>

    <!-- CTA -->
    <div class="cta-strip reveal-on-scroll" style="border-radius:var(--radius-xl); margin-top:64px;">
      <div class="container" style="padding:48px;">
        <div class="cta-strip-inner">
          <div>
            <h2>Prêt à passer au solaire ?</h2>
            <p>Simulez votre production en 2 minutes — c'est gratuit et basé sur les données PVGIS.</p>
          </div>
          <div class="cta-strip-btns">
            <a href="/simulateur" class="btn btn-primary btn-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
              Lancer le simulateur
            </a>
            <a href="/aides" class="btn btn-ghost btn-lg">Voir les aides 2026</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<?php require 'footer.php'; ?>
