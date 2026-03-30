<?php
// ══════════════════════════════════════════════════════════
// generate-annuaire.php v2
// Pré-charge les données Google Places pour les 15 villes
// avec filtrage strict par code postal
//
// Usage navigateur : ?token=wattsun2026
// Usage CLI : php generate-annuaire.php
// ══════════════════════════════════════════════════════════

$SECRET_TOKEN = 'wattsun2026';

if (php_sapi_name() !== 'cli') {
    if (!isset($_GET['token']) || $_GET['token'] !== $SECRET_TOKEN) {
        http_response_code(403);
        die('Accès interdit. Ajoutez ?token=votre_token à l\'URL.');
    }
    header('Content-Type: text/plain; charset=utf-8');
}

// Charger le .env
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

$API_KEY = getenv('GOOGLE_PLACES_API_KEY');
if (!$API_KEY) {
    die("ERREUR : GOOGLE_PLACES_API_KEY non trouvée dans .env\n");
}

// ── Les 15 villes avec codes postaux pour filtrage strict ──
$villes = [
    ['nom' => 'Lyon',               'cp' => ['69001','69002','69003','69004','69005','69006','69007','69008','69009'], 'slug' => 'lyon',               'lat' => 45.7640, 'lng' => 4.8357],
    ['nom' => 'Villeurbanne',        'cp' => ['69100'], 'slug' => 'villeurbanne',        'lat' => 45.7667, 'lng' => 4.8799],
    ['nom' => 'Caluire-et-Cuire',    'cp' => ['69300'], 'slug' => 'caluire-et-cuire',    'lat' => 45.7953, 'lng' => 4.8472],
    ['nom' => 'Vénissieux',          'cp' => ['69200'], 'slug' => 'venissieux',          'lat' => 45.6973, 'lng' => 4.8864],
    ['nom' => 'Bron',                'cp' => ['69500'], 'slug' => 'bron',                'lat' => 45.7386, 'lng' => 4.9131],
    ['nom' => 'Saint-Fons',          'cp' => ['69190'], 'slug' => 'saint-fons',          'lat' => 45.7097, 'lng' => 4.8531],
    ['nom' => 'Oullins',             'cp' => ['69600'], 'slug' => 'oullins',             'lat' => 45.7147, 'lng' => 4.8097],
    ['nom' => 'Saint-Genis-Laval',   'cp' => ['69230'], 'slug' => 'saint-genis-laval',   'lat' => 45.6942, 'lng' => 4.7925],
    ['nom' => 'Tassin-la-Demi-Lune', 'cp' => ['69160'], 'slug' => 'tassin-la-demi-lune', 'lat' => 45.7642, 'lng' => 4.7756],
    ['nom' => 'Craponne',            'cp' => ['69290'], 'slug' => 'craponne',            'lat' => 45.7456, 'lng' => 4.7228],
    ['nom' => 'Francheville',        'cp' => ['69340'], 'slug' => 'francheville',        'lat' => 45.7358, 'lng' => 4.7583],
    ['nom' => 'Sainte-Foy-lès-Lyon', 'cp' => ['69110'], 'slug' => 'sainte-foy-les-lyon', 'lat' => 45.7331, 'lng' => 4.7953],
    ['nom' => 'Pierre-Bénite',       'cp' => ['69310'], 'slug' => 'pierre-benite',       'lat' => 45.7044, 'lng' => 4.8256],
    ['nom' => 'Décines-Charpieu',    'cp' => ['69150'], 'slug' => 'decines-charpieu',    'lat' => 45.7694, 'lng' => 4.9586],
    ['nom' => 'Meyzieu',             'cp' => ['69330'], 'slug' => 'meyzieu',             'lat' => 45.7667, 'lng' => 5.0028],
];

$cache_dir = __DIR__ . '/cache/annuaire';
if (!is_dir($cache_dir)) {
    mkdir($cache_dir, 0755, true);
}

$ctx = stream_context_create([
    'http' => [
        'method'  => 'GET',
        'timeout' => 15,
        'header'  => ['User-Agent: MonCherWattSun/1.0'],
    ]
]);

$total_pros = 0;
$total_filtered = 0;
$errors = [];

echo "═══════════════════════════════════════════\n";
echo "  Mon cher WattSun — Génération annuaire v2\n";
echo "  Filtrage strict par code postal activé\n";
echo "═══════════════════════════════════════════\n\n";

foreach ($villes as $i => $ville) {
    $num = $i + 1;
    echo "[{$num}/15] {$ville['nom']} (CP: " . implode(', ', $ville['cp']) . ")... ";

    // ── Text Search ──
    $query = urlencode("installateur panneaux solaires " . $ville['nom']);
    $api_url = "https://maps.googleapis.com/maps/api/place/textsearch/json"
             . "?query={$query}"
             . "&location={$ville['lat']},{$ville['lng']}"
             . "&radius=5000"
             . "&language=fr"
             . "&region=fr"
             . "&key={$API_KEY}";

    $raw = @file_get_contents($api_url, false, $ctx);

    if (!$raw) {
        echo "ERREUR (pas de réponse API)\n";
        $errors[] = $ville['nom'];
        continue;
    }

    $data = json_decode($raw, true);

    if (!isset($data['results']) || empty($data['results'])) {
        echo "0 résultats\n";
        file_put_contents($cache_dir . '/' . $ville['slug'] . '.json', json_encode([], JSON_PRETTY_PRINT));
        continue;
    }

    $pros = [];
    $skipped = 0;

    foreach ($data['results'] as $place) {
        $place_id = $place['place_id'] ?? null;
        $address = $place['formatted_address'] ?? '';

        // ── Filtrage strict par code postal ──
        $match_cp = false;
        foreach ($ville['cp'] as $cp) {
            if (strpos($address, $cp) !== false) {
                $match_cp = true;
                break;
            }
        }
        if (!$match_cp) {
            $skipped++;
            continue;
        }

        // ── Place Details ──
        $details = null;
        if ($place_id) {
            $details_url = "https://maps.googleapis.com/maps/api/place/details/json"
                         . "?place_id={$place_id}"
                         . "&fields=formatted_phone_number,website,opening_hours,url,geometry"
                         . "&language=fr"
                         . "&key={$API_KEY}";

            $details_raw = @file_get_contents($details_url, false, $ctx);
            if ($details_raw) {
                $details_data = json_decode($details_raw, true);
                $details = $details_data['result'] ?? null;
            }
            usleep(200000);
        }

        // Coordonnées GPS pour la carte
        $lat = $place['geometry']['location']['lat'] ?? $ville['lat'];
        $lng = $place['geometry']['location']['lng'] ?? $ville['lng'];

        $pros[] = [
            'nom'       => $place['name'] ?? 'Entreprise',
            'adresse'   => $address,
            'note'      => $place['rating'] ?? null,
            'nb_avis'   => $place['user_ratings_total'] ?? 0,
            'ouvert'    => $place['opening_hours']['open_now'] ?? null,
            'telephone' => $details['formatted_phone_number'] ?? null,
            'site_web'  => $details['website'] ?? null,
            'url_maps'  => $details['url'] ?? ('https://www.google.com/maps/place/?q=place_id:' . $place_id),
            'horaires'  => $details['opening_hours']['weekday_text'] ?? [],
            'place_id'  => $place_id,
            'lat'       => $lat,
            'lng'       => $lng,
            'initiale'  => strtoupper(mb_substr($place['name'] ?? 'E', 0, 1)),
        ];

        if (count($pros) >= 20) break;
    }

    // Tri par note décroissante, puis par nombre d'avis
    usort($pros, function($a, $b) {
        if (($b['note'] ?? 0) !== ($a['note'] ?? 0)) {
            return ($b['note'] ?? 0) <=> ($a['note'] ?? 0);
        }
        return ($b['nb_avis'] ?? 0) <=> ($a['nb_avis'] ?? 0);
    });

    // Sauvegarder le JSON
    $cache_file = $cache_dir . '/' . $ville['slug'] . '.json';
    file_put_contents($cache_file, json_encode($pros, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    $nb = count($pros);
    $total_pros += $nb;
    $total_filtered += $skipped;
    echo "{$nb} pros ✓ ({$skipped} filtrés hors commune)\n";

    usleep(500000);
}

// ── Générer le fichier meta (stats globales) ──
$meta = [
    'generated_at' => date('Y-m-d H:i:s'),
    'total_pros'   => $total_pros,
    'total_villes'  => count($villes),
    'filtered_out' => $total_filtered,
];
file_put_contents($cache_dir . '/_meta.json', json_encode($meta, JSON_PRETTY_PRINT));

echo "\n═══════════════════════════════════════════\n";
echo "  Terminé !\n";
echo "  Total : {$total_pros} professionnels sur 15 villes\n";
echo "  Filtrés (hors commune) : {$total_filtered}\n";
echo "  Cache : {$cache_dir}/\n";

if (!empty($errors)) {
    echo "\n  ⚠ Erreurs sur : " . implode(', ', $errors) . "\n";
}

echo "═══════════════════════════════════════════\n";