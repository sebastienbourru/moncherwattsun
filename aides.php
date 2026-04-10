<?php
$page_title  = "Aides financières panneaux solaires 2026 — MaPrimeRénov', TVA, Prime autoconsommation";
$meta_desc   = "Toutes les aides pour financer vos panneaux solaires en 2026 : MaPrimeRénov', prime à l'autoconsommation EDF OA, TVA réduite, éco-PTZ. Guides sourcés ADEME et France Rénov.";
$canonical   = "https://moncherwattsun.fr/aides";
$active_page = 'aides';

$extra_head = '
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Accueil","item":"https://moncherwattsun.fr/"},{"@type":"ListItem","position":2,"name":"Aides financières 2026","item":"https://moncherwattsun.fr/aides"}]}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Peut-on bénéficier de MaPrimeRénov pour des panneaux solaires ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui, sous conditions. MaPrimeRénov couvre principalement le solaire thermique (chauffe-eau solaire individuel, CESI). Pour le photovoltaïque en autoconsommation, consultez le simulateur officiel france-renov.gouv.fr car les conditions évoluent régulièrement."
      }
    },
    {
      "@type": "Question",
      "name": "Qu\'est-ce que la prime à l\'autoconsommation ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "C\'est une aide versée par EDF OA pour les installations photovoltaïques raccordées au réseau. Le montant dépend de la puissance (kWc), versé sur 5 ans, cumulable avec la vente du surplus."
      }
    },
    {
      "@type": "Question",
      "name": "La TVA est-elle réduite pour les panneaux solaires ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Oui. La pose de panneaux solaires sur une résidence principale de plus de 2 ans bénéficie d\'une TVA à 10% pour les installations de moins de 3 kWc. La fourniture et pose par un professionnel RGE est obligatoire."
      }
    }
  ]
}
</script>';

require 'header.php';
?>

<!-- HERO -->
<section class="aide-hero">
  <div class="container">
    <nav class="breadcrumb" style="justify-content:center; margin-bottom:24px;">
      <a href="/">Accueil</a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">Aides financières 2026</span>
    </nav>
    <span class="badge badge-sky" style="margin-bottom:16px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      Mis à jour avril 2026
    </span>
    <h1>Aides financières pour le solaire en 2026</h1>
    <p>Ce que l'État finance — sourcé ADEME, France Rénov et services officiels.</p>
    <div class="notice notice-warning" style="max-width:600px; margin:24px auto 0; text-align:left;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      <div><strong>Important :</strong> les montants affichés sont indicatifs. Les barèmes changent régulièrement. Utilisez les simulateurs officiels pour un calcul personnalisé à jour.</div>
    </div>
  </div>
</section>

<!-- CONTENU PRINCIPAL -->
<section class="section">
  <div class="container">

    <!-- RÉSUMÉ -->
    <div class="notice notice-info reveal-on-scroll" style="margin-bottom:48px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <div><strong>En résumé :</strong> pour une installation photovoltaïque résidentielle, les 3 leviers principaux sont (1) la prime à l'autoconsommation EDF OA, (2) la TVA à taux réduit, et (3) l'éco-PTZ. MaPrimeRénov' couvre principalement le solaire <em>thermique</em> (chauffe-eau).</div>
    </div>

    <div class="aide-grid reveal-on-scroll">

      <!-- Prime autoconsommation -->
      <div class="aide-card">
        <div class="aide-card-header">
          <div class="aide-icon aide-icon-sun">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          </div>
          <div>
            <h3 class="aide-title">Prime à l'autoconsommation</h3>
            <div class="aide-subtitle">EDF OA — Arrêté tarifaire</div>
          </div>
        </div>
        <p style="font-size:.9rem; margin-bottom:16px;">Aide versée par EDF Obligation d'Achat pour toute installation photovoltaïque raccordée en autoconsommation avec vente du surplus. Versée en 5 fois sur 5 ans.</p>
        <div class="aide-amount">
          <div>
            <div class="aide-amount-label">Montant indicatif (barème trimestriel)</div>
            <div class="aide-amount-value">50–280 €/kWc installé *</div>
          </div>
        </div>
        <p style="font-size:.85rem; color:var(--gray);">Le montant dépend de la puissance (≤3 kWc, 3–9 kWc, 9–36 kWc, 36–100 kWc). Tarifs révisés trimestriellement par arrêté ministériel.</p>
        <div class="aide-steps">
          <div class="aide-step">Choisir un installateur certifié RGE</div>
          <div class="aide-step">Installer et raccorder au réseau</div>
          <div class="aide-step">Signer un contrat de vente avec EDF OA</div>
          <div class="aide-step">Recevoir la prime sur 5 ans automatiquement</div>
        </div>
        <div class="aide-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/></svg>
          * Barème révisé trimestriellement. Consultez l'arrêté en vigueur sur legifrance.gouv.fr
        </div>
        <a href="https://www.edf-oa.fr/fr/" target="_blank" rel="noopener noreferrer" class="aide-cta-official">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Simulateur EDF OA officiel
        </a>
      </div>

      <!-- MaPrimeRénov -->
      <div class="aide-card">
        <div class="aide-card-header">
          <div class="aide-icon aide-icon-sky">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          <div>
            <h3 class="aide-title">MaPrimeRénov'</h3>
            <div class="aide-subtitle">ANAH — france-renov.gouv.fr</div>
          </div>
        </div>
        <p style="font-size:.9rem; margin-bottom:16px;">MaPrimeRénov' finance principalement le <strong>solaire thermique</strong> (chauffe-eau solaire individuel, CESI, systèmes solaires combinés). Pour le photovoltaïque pur, l'éligibilité est conditionnée et évolue chaque année.</p>
        <div class="aide-amount">
          <div>
            <div class="aide-amount-label">CESI (chauffe-eau solaire individuel)</div>
            <div class="aide-amount-value">400–4 000 € selon revenus *</div>
          </div>
        </div>
        <p style="font-size:.85rem; color:var(--gray); margin-bottom:12px;">4 niveaux de revenus : Bleu (ménages modestes), Jaune, Violet, Rose. Le montant varie selon votre tranche.</p>
        <div class="aide-steps">
          <div class="aide-step">Créer un compte sur maprimerenov.gouv.fr</div>
          <div class="aide-step">Simuler votre éligibilité en ligne</div>
          <div class="aide-step">Sélectionner un artisan RGE</div>
          <div class="aide-step">Déposer votre dossier AVANT les travaux</div>
        </div>
        <div class="aide-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/></svg>
          Le dossier doit être déposé AVANT le début des travaux. Aucune dérogation.
        </div>
        <a href="https://www.maprimerenov.gouv.fr" target="_blank" rel="noopener noreferrer" class="aide-cta-official">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Simulateur MaPrimeRénov' officiel
        </a>
      </div>

      <!-- TVA réduite -->
      <div class="aide-card">
        <div class="aide-card-header">
          <div class="aide-icon aide-icon-green">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <div>
            <h3 class="aide-title">TVA à taux réduit</h3>
            <div class="aide-subtitle">Code général des impôts — Art. 279-0 bis</div>
          </div>
        </div>
        <p style="font-size:.9rem; margin-bottom:16px;">La pose de panneaux solaires sur une résidence principale de plus de 2 ans bénéficie d'une TVA réduite, appliquée directement par le professionnel sur la facture.</p>
        <div class="aide-amount">
          <div>
            <div class="aide-amount-label">Taux applicable selon puissance</div>
            <div class="aide-amount-value">10% (≤3 kWc) · 20% (&gt;3 kWc)</div>
          </div>
        </div>
        <p style="font-size:.85rem; color:var(--gray); margin-bottom:12px;">Sur une installation 3 kWc à 9 000 € TTC, la TVA à 10% représente une économie d'environ <strong>800 €</strong> vs taux normal.</p>
        <div class="aide-steps">
          <div class="aide-step">Résidence principale &gt; 2 ans : automatique</div>
          <div class="aide-step">Puissance ≤ 3 kWc : TVA 10% fourniture + pose</div>
          <div class="aide-step">Le professionnel applique le taux réduit directement</div>
          <div class="aide-step">Conservez la facture (contrôle fiscal possible)</div>
        </div>
        <div class="aide-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/></svg>
          Résidence principale &gt; 2 ans uniquement. Les résidences secondaires et constructions neuves sont au taux normal.
        </div>
        <a href="https://www.service-public.fr/particuliers/vosdroits/F35212" target="_blank" rel="noopener noreferrer" class="aide-cta-official">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Fiche Service-Public.fr
        </a>
      </div>

      <!-- Éco-PTZ -->
      <div class="aide-card">
        <div class="aide-card-header">
          <div class="aide-icon" style="background:#EDE9FE; color:#5B21B6;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
          </div>
          <div>
            <h3 class="aide-title">Éco-PTZ (éco-prêt à taux zéro)</h3>
            <div class="aide-subtitle">Banques partenaires — SGFGAS</div>
          </div>
        </div>
        <p style="font-size:.9rem; margin-bottom:16px;">Prêt sans intérêt pour financer des travaux de rénovation énergétique, dont l'installation solaire thermique. Disponible sans condition de ressources.</p>
        <div class="aide-amount">
          <div>
            <div class="aide-amount-label">Montant maximum empruntable</div>
            <div class="aide-amount-value">Jusqu'à 50 000 € · 20 ans</div>
          </div>
        </div>
        <p style="font-size:.85rem; color:var(--gray); margin-bottom:12px;">Le montant varie selon le type de travaux et si le logement est une passoire thermique (DPE E, F, G).</p>
        <div class="aide-steps">
          <div class="aide-step">Propriétaire occupant ou bailleur</div>
          <div class="aide-step">Résidence principale construite avant 1990</div>
          <div class="aide-step">Contacter une banque partenaire SGFGAS</div>
          <div class="aide-step">Devis d'un artisan RGE requis</div>
        </div>
        <a href="https://www.ecologie.gouv.fr/leco-pret-taux-zero" target="_blank" rel="noopener noreferrer" class="aide-cta-official">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Guide officiel Éco-PTZ
        </a>
      </div>

    </div>

    <!-- Simulateurs officiels -->
    <div style="background:var(--dark); border-radius:var(--radius-xl); padding:48px; margin-top:48px; text-align:center;" class="reveal-on-scroll">
      <h2 style="color:white; margin-bottom:12px;">Calculez votre aide personnalisée</h2>
      <p style="color:rgba(255,255,255,.6); margin-bottom:32px; max-width:560px; margin-left:auto; margin-right:auto;">Les simulateurs officiels sont les seuls outils fiables pour connaître vos droits réels.</p>
      <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
        <a href="https://france-renov.gouv.fr/aides/aides-disponibles" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          France Rénov' — Aides disponibles
        </a>
        <a href="https://mes-aides.gouv.fr" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Mes-aides.gouv.fr
        </a>
      </div>
    </div>

    <!-- FAQ -->
    <div style="margin-top:64px;" class="reveal-on-scroll">
      <h2 style="margin-bottom:32px; text-align:center;">Questions fréquentes</h2>
      <div class="faq-list" style="max-width:760px; margin:0 auto;">
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Peut-on cumuler plusieurs aides ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <div class="faq-answer-inner">
              Oui, dans la plupart des cas. La prime à l'autoconsommation est cumulable avec la TVA réduite et l'éco-PTZ. MaPrimeRénov' est cumulable avec l'éco-PTZ. Vérifiez toujours auprès de l'organisme concerné pour les règles de non-cumul locales.
            </div>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Faut-il obligatoirement un installateur RGE ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <div class="faq-answer-inner">
              Oui, pour toutes les aides publiques (MaPrimeRénov', éco-PTZ, prime à l'autoconsommation). Vérifiez la certification sur <a href="https://france-renov.gouv.fr/annuaire-rge" target="_blank" rel="noopener noreferrer" style="color:var(--sky);">france-renov.gouv.fr/annuaire-rge</a>.
            </div>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Les locataires peuvent-ils bénéficier d'aides ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <div class="faq-answer-inner">
              Pour le photovoltaïque fixe, non — les modifications structurelles nécessitent l'accord du propriétaire. En revanche, les locataires peuvent s'équiper de <strong>kits balcon plug-and-play</strong> (≤800W) sans autorisation. Certaines aides régionales existent pour ce cas.
            </div>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFaq(this)">
            Existe-t-il des aides régionales ou locales ?
            <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <div class="faq-answer-inner">
              Oui, de nombreuses régions, départements et communes proposent des aides complémentaires. Le simulateur <a href="https://mes-aides.gouv.fr" target="_blank" rel="noopener noreferrer" style="color:var(--sky);">mes-aides.gouv.fr</a> et <a href="https://france-renov.gouv.fr" target="_blank" rel="noopener noreferrer" style="color:var(--sky);">france-renov.gouv.fr</a> les recensent pour votre territoire.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA interne -->
    <div class="cta-strip reveal-on-scroll" style="border-radius:var(--radius-xl); margin-top:64px;">
      <div class="container" style="padding:48px;">
        <div class="cta-strip-inner">
          <div>
            <h2>Estimez d'abord votre production</h2>
            <p>Avant de calculer vos aides, simulez votre potentiel solaire avec les données PVGIS. 2 minutes.</p>
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

<script>
function toggleFaq(btn) {
  btn.classList.toggle('open');
  btn.nextElementSibling.classList.toggle('open');
}
</script>

<?php require 'footer.php'; ?>